<?php
//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../conexion/conexion.php");

//LLAMAMOS AL MODELO 
require_once("cm_model.php");

//INSTANCIAMOS EL MODELO
$cmanager = new Cmanager();

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * * *INFOMACION ENVIADA DESDE AJAX A TRAVES DE POST * * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * * * * * * * * * PORFOLIOS * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$cmportid   = (isset($_POST['cmportid'])) ? $_POST['cmportid'] : '';
$cmportcat  = (isset($_POST['cmportcat'])) ? $_POST['cmportcat'] : '';
$cmportaut  = (isset($_POST['cmportaut'])) ? $_POST['cmportaut'] : '';
$cmportname = (isset($_POST['cmportname'])) ? $_POST['cmportname'] : '';
$cmportigc  = (isset($_POST['cmportigc'])) ? $_POST['cmportigc'] : '';
$cmportligc = (isset($_POST['cmportligc'])) ? $_POST['cmportligc'] : '';



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * * *INFOMACION ENVIADA DESDE AJAX A TRAVES DE POST * * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * * * * * * * * * SERVICES* * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$cmservid    = (isset($_POST['cmservid'])) ? $_POST['cmservid'] : '';
$cmservcat   = (isset($_POST['cmservcat'])) ? $_POST['cmservcat'] : '';
$cmservname  = (isset($_POST['cmservname'])) ? $_POST['cmservname'] : '';
$cmservprice = (isset($_POST['cmservprice'])) ? $_POST['cmservprice'] : '';
$cmservdesc  = (isset($_POST['cmservdesc'])) ? $_POST['cmservdesc'] : '';


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * * *INFOMACION ENVIADA DESDE AJAX A TRAVES DE POST * * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * * * * * * * * * PLANS* * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$plansid    = (isset($_POST['plansid'])) ? $_POST['plansid'] : '';
$catplans   = (isset($_POST['catplans'])) ? $_POST['catplans'] : '';
$nameplans  = (isset($_POST['nameplans'])) ? $_POST['nameplans'] : '';
$costplans = (isset($_POST['costplans'])) ? $_POST['costplans'] : '';
$viewplans  = (isset($_POST['viewplans'])) ? $_POST['viewplans'] : '';



switch($_GET["op"]){

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * *CASOS DE USO PARA GESTION DE INFOMACION DE GENERAL * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    case 'selectcat':

        $data = $cmanager->getselectcat();
    
        $dato = Array();

        if (empty($data)) {
            $sub_array = array();
            $sub_array['vacio'] =  'vacio';

            $dato[] = $sub_array;
        }else {
            foreach ($data as $row) {

                $sub_array = array();
            
                $sub_array['id']         = $row['id'];
                $sub_array['category']   = $row['category'];

                $dato[] = $sub_array;

            }
        
        
        }
        
        echo json_encode($dato); 

        break;


    case 'selectaut':

        $data = $cmanager->getselectaut();
    
        $dato = Array();

        if (empty($data)) {
            $sub_array = array();
            $sub_array['vacio'] =  'vacio';

            $dato[] = $sub_array;
        }else {
            foreach ($data as $row) {

                $sub_array = array();
            
                $sub_array['id']  = $row['id'];
                $sub_array['own'] = $row['own'];

                $dato[] = $sub_array;

            }
        
        
        }
        
        echo json_encode($dato); 

        break;
    
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * *CASOS DE USO PARA GESTION DE INFOMACION DE PORFOLIO* * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    case 'list_cmport':
        
        $data = $cmanager->getprofolio();

        $dato = Array();

        
        foreach ($data as $row) {
            $sub_array = array();
            
            $sub_array['id']        = $row['id'];
            $sub_array['own']       = $row['own'];
            $sub_array['category']  = $row['category'];
            $sub_array['job']       = $row['job'];
            $sub_array['customer']  = $row['customer'];
            $sub_array['acustomer'] = $row['acustomer'];


            $dato[] = $sub_array;
            
        }
        
       
        
        echo json_encode($dato); 

        break;

    case 'save_edit_cmport':

        //VARIABLE PARA CAPTURAR IMAGENES
        $countfiles = count($_FILES['pimagecm']['name']);
        $destino = "../../assets/img/cm/";
        //Parámetros optimización, resolución máxima permitida
        $max_ancho = 300;
        $max_alto  = 300;

        $files_arr = array();

        $count = $cmanager->countcmport($cmportid);
        $data = Array();

        if ($count == 0) {
            $new = $cmanager->savecmport($cmportcat,$cmportaut,$cmportname,$cmportigc,$cmportligc);
            $lastinset = $cmanager->lastinset();
             //INICIO DE OPERACION PARA CARGAR Y GUARDAR IMAGENES
             for($index = 0;$index < $countfiles;$index++){
                // File name
                $filename = $_FILES['pimagecm']['name'][$index];
                // Get extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                // Valid image extension
                $valid_ext = array("png","jpeg","jpg");
                // Check extension
                if(in_array($ext, $valid_ext)){
                    // File path
                    $path = $destino.$filename;
                    // Upload file
        
                    $medidasimagen= getimagesize($_FILES['pimagecm']['tmp_name'][$index]);
        
                     //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                    if($medidasimagen[$index] < 500 && $_FILES['pimagecm']['size'][$index] < 10000){
                        
                        move_uploaded_file($_FILES['pimagecm']['tmp_name'][$index],$path);
                            
                    } 
                    
                    //Redimensionar
                    $rtOriginal=$_FILES['pimagecm']['tmp_name'][$index];
            
                    if($_FILES['pimagecm']['type'][$index]=='image/jpeg'){
                        $original = imagecreatefromjpeg($rtOriginal);
                    }else if($_FILES['pimagecm']['type'][$index]=='image/png'){
                        $original = imagecreatefrompng($rtOriginal);
                    }else if($_FILES['pimagecm']['type'][$index]=='image/gif'){
                        $original = imagecreatefromgif($rtOriginal);
                    }
        
                    list($ancho,$alto)=getimagesize($rtOriginal);
        
                    $x_ratio = $max_ancho / $ancho;
                    $y_ratio = $max_alto / $alto;
        
                    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
                        $ancho_final = $ancho;
                        $alto_final = $alto;
                    }
                    elseif (($x_ratio * $alto) < $max_alto){
                        $alto_final = ceil($x_ratio * $alto);
                        $ancho_final = $max_ancho;
                    }
                    else{
                        $ancho_final = ceil($y_ratio * $ancho);
                        $alto_final = $max_alto;
                    }
        
                    $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
        
                    imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
                                    
                    $cal=8;
            
                    if($_FILES['pimagecm']['type'][$index]=='image/jpeg'){
                        imagejpeg($lienzo,$path);
                    }else if($_FILES['pimagecm']['type'][$index]=='image/png'){
                        imagepng($lienzo,$path);
                    }
                    else if($_FILES['pimagecm']['type'][$index]=='image/gif'){
                    imagegif($lienzo,$path);
                    }
                    
                    $image = $cmanager->saveimage($filename,$lastinset);

                }
            }
            $sub_array = array();
            $sub_array['status'] =  'ok';
            $sub_array['tags']   =  'new';
            $sub_array['porfol'] =  $cmportname;
        
            $dato[] = $sub_array;

        } else {
            $update = $cmanager->updacmport($cmportid,$cmportcat,$cmportaut,$cmportname,$cmportigc,$cmportligc);
            //INICIO DE OPERACION PARA CARGAR Y GUARDAR IMAGENES
            for($index = 0;$index < $countfiles;$index++){
                // File name
                $filename = $_FILES['pimagecm']['name'][$index];
                // Get extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                // Valid image extension
                $valid_ext = array("png","jpeg","jpg");
                // Check extension
                if(in_array($ext, $valid_ext)){
                    // File path
                    $path = $destino.$filename;
                    // Upload file
        
                    $medidasimagen= getimagesize($_FILES['pimagecm']['tmp_name'][$index]);
        
                        //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                    if($medidasimagen[$index] < 500 && $_FILES['pimagecm']['size'][$index] < 10000){
                        
                        move_uploaded_file($_FILES['pimagecm']['tmp_name'][$index],$path);
                            
                    } 
                    
                    //Redimensionar
                    $rtOriginal=$_FILES['pimagecm']['tmp_name'][$index];
            
                    if($_FILES['pimagecm']['type'][$index]=='image/jpeg'){
                        $original = imagecreatefromjpeg($rtOriginal);
                    }else if($_FILES['pimagecm']['type'][$index]=='image/png'){
                        $original = imagecreatefrompng($rtOriginal);
                    }else if($_FILES['pimagecm']['type'][$index]=='image/gif'){
                        $original = imagecreatefromgif($rtOriginal);
                    }
        
                    list($ancho,$alto)=getimagesize($rtOriginal);
        
                    $x_ratio = $max_ancho / $ancho;
                    $y_ratio = $max_alto / $alto;
        
                    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
                        $ancho_final = $ancho;
                        $alto_final = $alto;
                    }
                    elseif (($x_ratio * $alto) < $max_alto){
                        $alto_final = ceil($x_ratio * $alto);
                        $ancho_final = $max_ancho;
                    }
                    else{
                        $ancho_final = ceil($y_ratio * $ancho);
                        $alto_final = $max_alto;
                    }
        
                    $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
        
                    imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
                                    
                    $cal=8;
            
                    if($_FILES['pimagecm']['type'][$index]=='image/jpeg'){
                        imagejpeg($lienzo,$path);
                    }else if($_FILES['pimagecm']['type'][$index]=='image/png'){
                        imagepng($lienzo,$path);
                    }
                    else if($_FILES['pimagecm']['type'][$index]=='image/gif'){
                    imagegif($lienzo,$path);
                    }
                    
                    $image = $cmanager->saveimage($filename,$cmportid);

                    if ($image) {
                        $sub_array = array();
                        $sub_array['status'] =  'ok';
                        $sub_array['tags']   =  'update';
                        $sub_array['porfol'] =  $cmportname;
                    }else {
                        $sub_array = array();
                        $sub_array['status'] =  'error';
                        $sub_array['tags']   =  'update';
                        $sub_array['porfol'] =  $cmportname;
                    
                    }
                
                }
            }
            
            $dato[] = $sub_array;
        } 
                  
        
        echo json_encode($dato);

        break;

    case 'searchcat1':

        $data = $cmanager->searchcat1($cmportcat);

        $dato = Array();

        if (empty($data)) {
            $sub_array = array();
            $sub_array['vacio'] =  'vacio';
            $dato[] = $sub_array;
        }else {
            foreach ($data as $row) {
                $sub_array = array();
                
                $sub_array['id']           = $row['id'];
                $sub_array['category'] = $row['category'];

                $dato[] = $sub_array;
                
            }
            
        }
        echo json_encode($dato); 
        break;

    case 'searchaut':

        $data = $cmanager->searchaut($cmportaut);

        $dato = Array();

        if (empty($data)) {
            $sub_array = array();
            $sub_array['vacio'] =  'vacio';
            $dato[] = $sub_array;
        }else {
            foreach ($data as $row) {
                $sub_array = array();
                
                $sub_array['id']  = $row['id'];
                $sub_array['own'] = $row['own'];

                $dato[] = $sub_array;
                
            }
            
        }
        echo json_encode($dato); 
        break;
        



    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * *CASOS DE USO PARA GESTION DE INFOMACION DE SERVICIOS * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    case 'list_cmserv':

        $data = $cmanager->getservices();

        $dato = Array();

        
        foreach ($data as $row) {
            $sub_array = array();
            
            $sub_array['id']           = $row['id'];
            $sub_array['servcategory'] = $row['servcategory'];
            $sub_array['servname']     = $row['servname'];
            $sub_array['servprice']    = $row['servprice'];
            $sub_array['servdesc']     = $row['servdesc'];
            $sub_array['servimage']    = $row['servimage'];


            $dato[] = $sub_array;
            
        }
        
       
        
        echo json_encode($dato); 

        break;


    

    case 'searchcat':

            $data = $cmanager->searchcat($cmservcat);
    
            $dato = Array();
    
            if (empty($data)) {
                $sub_array = array();
                $sub_array['vacio'] =  'vacio';
                $dato[] = $sub_array;
            }else {
                foreach ($data as $row) {
                    $sub_array = array();
                 
                    $sub_array['id']           = $row['id'];
                    $sub_array['servcategory'] = $row['servcategory'];
    
                    $dato[] = $sub_array;
                 
                }
               
            }
            echo json_encode($dato); 
            break;

    case 'save_edit_cmserv':

        $destino = "../../assets/img/cm/"; 
        //Parámetros optimización, resolución máxima permitida
        $max_ancho = 300;
        $max_alto  = 300;

        $medidasimagen= getimagesize($_FILES['simagecm']['tmp_name']);

        //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
        if($medidasimagen[0] < 500 && $_FILES['simagecm']['size'] < 10000){
         
            $nombre_img = $_FILES['simagecm']['name'];
            move_uploaded_file($_FILES['simagecm']['tmp_name'], $destino.'/'.$nombre_img);
                
        } 
        //Si no, se generan nuevas imagenes optimizadas
        else {
            $nombre_img = $_FILES['simagecm']['name'];
    
            //Redimensionar
            $rtOriginal=$_FILES['simagecm']['tmp_name'];
    
            if($_FILES['simagecm']['type']=='image/jpeg'){
                $original = imagecreatefromjpeg($rtOriginal);
            }else if($_FILES['simagecm']['type']=='image/png'){
                $original = imagecreatefrompng($rtOriginal);
            }else if($_FILES['simagecm']['type']=='image/gif'){
                $original = imagecreatefromgif($rtOriginal);
            }
    
            list($ancho,$alto)=getimagesize($rtOriginal);
    
            $x_ratio = $max_ancho / $ancho;
            $y_ratio = $max_alto / $alto;
    
            if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
                $ancho_final = $ancho;
                $alto_final = $alto;
            }
            elseif (($x_ratio * $alto) < $max_alto){
                $alto_final = ceil($x_ratio * $alto);
                $ancho_final = $max_ancho;
            }
            else{
                $ancho_final = ceil($y_ratio * $ancho);
                $alto_final = $max_alto;
            }
    
            $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
    
            imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
            
            //imagedestroy($original);
            
            $cal=8;
    
            if($_FILES['simagecm']['type']=='image/jpeg'){
                imagejpeg($lienzo,$destino."/".$nombre_img);
            }else if($_FILES['simagecm']['type']=='image/png'){
                imagepng($lienzo,$destino."/".$nombre_img);
            }
            else if($_FILES['simagecm']['type']=='image/gif'){
            imagegif($lienzo,$destino."/".$nombre_img);
            }
    
        }

        $count = $cmanager->countcmserv($cmservid);
        $data = Array();

        if ($count == 0) {
            $new = $cmanager->savecmserv($cmservcat,$cmservname,$cmservprice,$cmservdesc,$nombre_img);
            
                $sub_array = array();
                $sub_array['status'] =  'new';
                $sub_array['servic'] =  $cmservname;
           
            
            $dato[] = $sub_array;
        } else {
            if(empty($_FILES['simagecm'])){
                $update = $cmanager->updacmserv2($cmservid,$cmservcat,$cmservname,$cmservprice,$cmservdesc);
            }else {
                $update = $cmanager->updacmserv($cmservid,$cmservcat,$cmservname,$cmservprice,$cmservdesc,$nombre_img);
            }
            
           
                $sub_array = array();
                $sub_array['status'] =  'update';
                $sub_array['servic'] =  $cmservname;
                $dato[] = $sub_array;
            }           
            
        

        echo json_encode($dato);

        break;

    case 'delete_cmserv':

        $delete = $cmanager->delecmserv($cmservid);
        if ($delete) {
            $data = array();
           
            $data['status']  = true;
            $data['message'] = '¡Se elimino usuario Exitosamente!';
            
        }else {
            $data = array();
           
            $data['status']  = false;
            $data['message'] = '¡Error eliminar usuario!';
            
        }
        echo json_encode($data);                         
        break;


        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * *CASOS DE USO PARA GESTION DE INFOMACION DE PLANES * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */


    
    case 'selectcat_plans':

        $data = $cmanager->getselectcat_plans();
    
        $dato = Array();

        if (empty($data)) {
            $sub_array = array();
            $sub_array['vacio'] =  'vacio';

            $dato[] = $sub_array;
        }else {
            foreach ($data as $row) {

                $sub_array = array();
            
                $sub_array['id']         = $row['id'];
                $sub_array['name']   = $row['category'];

                $dato[] = $sub_array;

            }
        
        
        }
        
        echo json_encode($dato); 

        break;


        case 'list_cmplans':
        
            $data = $cmanager->getcatplans();
    
            $dato = Array();
            
            foreach ($data as $row) {
                $j=1;$i=0;
                $sub_array = array();
                $sub_array_item = array();

                $data_item = $cmanager->getplansitems($row['Id']);
                
                $sub_array['id']        = $row['Id'];
                $sub_array['category']  = $row['name'];
                $sub_array['description'] = $row['description'];
                foreach ($data_item as $row_item) {
             
                    $sub_array_item[$i]       =  '<div class="col text-center">
                                                     <button type="button" onClick="mostrar(\'' . $row_item["Id"] . '\', \'' . $row_item["description"] . '\',\''. $row_item["Idplan"] . '\');"  id="' . $row_item["Id"] . '" class="btn btn-info btn-sm update">ITEM #'. $j .'</button>' . " " . '
                                                    </div>';
                    $i++; $j++;
                }
                $sub_array['items']  =$sub_array_item;
                $sub_array['cost']  = $row['cost'];
    
    
                $dato[] = $sub_array;
                
            }
            
            
            echo json_encode($dato); 
    
            break;


            case 'save_edit_cmplans':

                $creationdate= date('Y-m-d');

                $count = $cmanager->countcmplans($plansid);

                if ($count == 0) {
                    $new = $cmanager->savecmplans($catplans,$nameplans,$costplans,$creationdate,$viewplans);
                    
                        $sub_array = array();
                        $sub_array['status'] =  'new';
                        $sub_array['plans'] =  $nameplans;
                   
                    
                    $dato[] = $sub_array;
                } else {
                   
                        $update = $cmanager->updacmplans($catplans,$nameplans,$costplans,$creationdate,$viewplans, $plansid);
                   
                        $sub_array = array();
                        $sub_array['status'] =  'update';
                        $sub_array['plans'] =  $nameplans;
                        $dato[] = $sub_array;
                }  

                
        
            break;


            case 'searchcat2':

                $cmplanscat = $_POST["cmplanscat"];

                $data = $cmanager->searchcat2($cmplanscat);
        
                $dato = Array();
        
                if (empty($data)) {
                    $sub_array = array();
                    $sub_array['vacio'] =  'vacio';
                    $dato[] = $sub_array;
                }else {
                    foreach ($data as $row) {
                        $sub_array = array();
                        
                        $sub_array['id']           = $row['id'];
                        $sub_array['category'] = $row['category'];
        
                        $dato[] = $sub_array;
                        
                    }
                    
                }
                echo json_encode($dato); 
                break;


                case 'delete_cmplans':

                    $cmplansid = $_POST["cmplansid"];

                    $delete = $cmanager->delecmplans($cmplansid);
                    if ($delete) {
                        $data = array();
                       
                        $data['status']  = true;
                        $data['message'] = '¡Se elimino Plan Exitosamente!';
                        
                    }else {
                        $data = array();
                       
                        $data['status']  = false;
                        $data['message'] = '¡Error eliminar Plan!';
                        
                    }
                    echo json_encode($data);                         
                    break;


                    case 'save_edit_cmplansItem':

                        $itemplansid = $_POST["itemplansid"];
                        $nameitemplans = $_POST["nameitemplans"];
                        $Idplan = $_POST["Idplan"];
                        $creationdate= date('Y-m-d');
        
                        $count = $cmanager->countcmplansItem($itemplansid);
        
                        if ($count == 0) {
                            
                            $new = $cmanager->savecmplansItem($itemplansid,$nameitemplans,$Idplan, $creationdate);
                            
                                $sub_array = array();
                                $sub_array['status'] =  'new';
                                $sub_array['plansItem'] =  $nameitemplans;
                           
                            
                        } else {
                           
                                $update = $cmanager->updacmplansItem($itemplansid,$nameitemplans,$Idplan, $creationdate);
                           
                                $sub_array = array();
                                $sub_array['status'] =  'update';
                                $sub_array['plansItem'] =  $nameitemplans;
                        }  
        
                        echo json_encode($sub_array);  
                
                    break;


                    case 'delete_cmplans_item':

                        $cmplansid = $_POST["cmplansid"];
    
                        $delete = $cmanager->delecmplansItem($cmplansid);
                        if ($delete) {
                            $data = array();
                           
                            $data['status']  = true;
                            $data['message'] = '¡Se elimino Plan Exitosamente!';
                            
                        }else {
                            $data = array();
                           
                            $data['status']  = false;
                            $data['message'] = '¡Error eliminar Plan!';
                            
                        }
                        echo json_encode($data);                         
                        break;

    
}



?>