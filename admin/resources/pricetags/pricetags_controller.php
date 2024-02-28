<?php
session_name('smcwebside');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../conexion/conexion.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("pricetags_model.php");

//INSTANCIAMOS EL MODELO
$pricetag = new Pricetags();


$tagsid   = (isset($_POST['tagsid'])) ? $_POST['tagsid'] : '';
$nametags = (isset($_POST['nametags'])) ? $_POST['nametags'] : '';
$costtags = (isset($_POST['costtags'])) ? $_POST['costtags'] : '';
$viewtags = (isset($_POST['viewtags'])) ? $_POST['viewtags'] : '';

$itemtagsid   = (isset($_POST['itemtagsid'])) ? $_POST['itemtagsid'] : '';
$nameitemtags = (isset($_POST['nameitemtags'])) ? $_POST['nameitemtags'] : '';
$itemtags     = (isset($_POST['itemtags'])) ? $_POST['itemtags'] : '';


switch($_GET["op"]){

    case 'delete':

        $delete = $pricetag->deletepricetags($tagsid);
        if ($delete) {
            $data = array();
           
            $data['status']  = true;
            $data['message'] = '¡Se elimino usuario Exitosamente!';
            
        }else {
            $data = array();
           
            $data['status']  = false;
            $data['message'] = '¡Error eliminar usuario!';
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);                            
        break;

    case 'listtags':

        $data = $pricetag->getpricetags();

        $dato = Array();

        if (empty($data)) {
            $sub_array = array();
            $sub_array['vacio'] =  'vacio';
        }else {
            foreach ($data as $row) {
                $sub_array = array();
             
                $sub_array['id']     = $row['id'];
                $sub_array['tags']   = $row['tags'];
                $sub_array['price']  = $row['price'];
                $sub_array['status'] = $row['status'];

                $dato[] = $sub_array;
             
            }
           
        }
        
        echo json_encode($dato, JSON_UNESCAPED_UNICODE); 

        break;

    case 'save_edit_tags':

        $count = $pricetag->countpricetags($tagsid);
        $n = count($count);

        if ($n==0) {
            $pricetag->savepricetags($nametags,$costtags,$viewtags);
        }
        if ($n==1) {
            $pricetag->updatepricetags($tagsid,$nametags,$costtags,$viewtags); 
        }
        break;

    case 'listitemtags':

        $data = $pricetag->getitemtags();

        $dato = Array();

        if (empty($data)) {
            $sub_array = array();
            $sub_array['vacio'] =  'vacio';
        }else {
            foreach ($data as $row) {
                $sub_array = array();
             
                $sub_array['id']    = $row['id'];
                $sub_array['item']  = $row['item'];
                $sub_array['itags'] = $row['itags'];
                $sub_array['dtags'] = $row['dtags'];

                $dato[] = $sub_array;
             
            }
           
        }
        echo json_encode($dato, JSON_UNESCAPED_UNICODE); 

        break;

    case 'save_edit_items_tags':

        $count = $pricetag->countitemstags($itemtagsid);
        $n = count($count);

        if ($n==0) {
            $pricetag->saveitemstags($nameitemtags,$itemtags);
        }
        if ($n==1) {
            $pricetag->updateitemtags($itemtagsid,$nameitemtags,$itemtags); 
        }
        break;

    case 'searchitem':

        $data = $pricetag->searchitem($itemtags);

        $dato = Array();

        if (empty($data)) {
            $sub_array = array();
            $sub_array['vacio'] =  'vacio';
        }else {
            foreach ($data as $row) {
                echo '<option id="default" name="default" value="'.$row['id'].'">'.$row['tags'].'</option>';
                $sub_array = array();
             
                $sub_array['id']     = $row['id'];
                $sub_array['tags']   = $row['tags'];
                $sub_array['price']  = $row['price'];
                $sub_array['status'] = $row['status'];

                $dato[] = $sub_array;
             
            }
           
        }
        //echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
        break;

    case 'selecttags':

            $data = $pricetag->getpricetags();
    
            $dato = Array();
    
            if (empty($data)) {
                $sub_array = array();
                $sub_array['vacio'] =  'vacio';
            }else {
                echo '<select class="form-control custom-select" id="itemtags" name="tags" style="width: 100%;" required>';
                echo '<option id="default" name="default" value="">Seleccione</option>';
                foreach ($data as $row) {
                    echo '<option name="'.$row['id'].'" value="">'.$row['tags'].'</option>';
                    /*
                    $sub_array = array();
                 
                    $sub_array['id']     = $row['id'];
                    $sub_array['tags']   = $row['tags'];
                    $sub_array['price']  = $row['price'];
                    $sub_array['status'] = $row['status'];
    
                    $dato[] = $sub_array;
                    */
                }
                echo '</select> ';
               
            }
            
            //echo json_encode($dato, JSON_UNESCAPED_UNICODE); 


        

    

}

//echo json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
