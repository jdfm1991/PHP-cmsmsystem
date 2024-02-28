<?php
session_name('smcwebside');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../conexion/conexion.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("users_model.php");

//INSTANCIAMOS EL MODELO
$users = new Users();


$userid   = (isset($_POST['userid'])) ? $_POST['userid'] : '';
$nameuser = (isset($_POST['nameuser'])) ? $_POST['nameuser'] : '';
$mailuser = (isset($_POST['mailuser'])) ? $_POST['mailuser'] : '';
$passuser = (isset($_POST['passuser'])) ? $_POST['passuser'] : '';


switch($_GET["op"]){

    case 'delete':

        $delete = $users->deleteUsers($userid);
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

    case 'enlist':

        $data = $users->getusers();
        echo json_encode($data, JSON_UNESCAPED_UNICODE); 

        break;

    

}

//echo json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
