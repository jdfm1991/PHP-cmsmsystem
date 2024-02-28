<?php
session_name('smcwebside');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../conexion/conexion.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("webcontent_model.php");

//INSTANCIAMOS EL MODELO
$webcontent = new Webcontents();

$target  = (isset($_POST['target'])) ? $_POST['target'] : '';



switch($_GET["op"]){

    case 'menuitems':

        $data = $webcontent->getwebitems();

        $dato = Array();

        if (empty($data)) {

            $sub_array = array();
            $sub_array['vacio'] =  'vacio';
            $dato[] = $sub_array;

        }else {
            foreach ($data as $row) {

                $sub_array = array();
                $sub_array['menu'] = $row['menu'];
                $sub_array['object'] = $row['object'];
                $dato[] = $sub_array;               
             
            }
           
        }

        
        echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
        break;

    case 'menucontent':

        $data = $webcontent->getwebcontents($target);

        $dato = Array();

        if (empty($data)) {

            $sub_array = array();
            $sub_array['vacio'] =  'vacio';
            $dato[] = $sub_array;
            
        }else {
            foreach ($data as $row) {

                $sub_array = array();
                $sub_array['object'] = $row['object'];
                $sub_array['webcontent'] = $row['webcontent'];
                $dato[] = $sub_array;               
                
            }
            
        }

        
        echo json_encode($dato, JSON_UNESCAPED_UNICODE); 
        break;
    

    case 'delete':

        $delete = $webcontent->deletewebcontent($titleid);
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

   

    

}

//echo json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
