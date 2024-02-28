<?php
session_name('smcwebside');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../conexion/conexion.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("menu_model.php");

//INSTANCIAMOS EL MODELO
$admin = new Admin();

//Datos de menu de opciones 
$titleid   = (isset($_POST['titleid'])) ? $_POST['titleid'] : '';
$titlemenu = (isset($_POST['titlemenu'])) ? $_POST['titlemenu'] : '';
$titleobj  = (isset($_POST['titleobj'])) ? $_POST['titleobj'] : '';
$titleview = (isset($_POST['titleview'])) ? $_POST['titleview'] : '';

//Datos de Login
$login = (isset($_POST['login'])) ? $_POST['login'] : '';
$pass = (isset($_POST['passw'])) ? $_POST['passw'] : '';
$passw = md5($pass);

//Datos de Usarios
$userid   = (isset($_POST['userid'])) ? $_POST['userid'] : '';
$nameuser = (isset($_POST['nameuser'])) ? $_POST['nameuser'] : '';
$mailuser = (isset($_POST['mailuser'])) ? $_POST['mailuser'] : '';
$passuser = (isset($_POST['passuser'])) ? $_POST['passuser'] : '';

$md5 = $admin->countUsers($userid,$passuser);
if ($md5) {
    $pass2 = $passuser;
} else {
    $pass2 = md5($passuser);
}

switch($_GET["op"]){

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * FUNCIONES PARA GESTION DE INICIO DE SESION DE USUARIO * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    case 'login':

        $session = $admin->login($login,$passw);
        if (is_array($session) AND count($session) > 0) {

            $dato = array();
            
            foreach ($session as $usuario) {
                

                $_SESSION['nombre']   = $usuario['nombre'];
                $_SESSION['apellido'] = $usuario['apellido'];
                $_SESSION['correo']   = $usuario['correo'];
                $_SESSION['login']    = $usuario['login'];
                $_SESSION['type']     = $usuario['type'];
                $_SESSION['views']    = $usuario['views'];
            }

            $dato['status']  = true;
            $dato['message'] = 'ok';
            $dato['data']    = $session;

        }else {
            $dato = array();
           
            $dato['status']  = false;
            $dato['message'] = 'El Usuario y/o password es incorrecto o no tienes permiso!';
            $dato['data']    = array();
        }
        
        
        echo json_encode($dato);
        break;

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * FUNCIONES PARA GESTION DE INFOMACION DE USUARIO * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    case 'users':
        $data = $admin->getusers();

        $dato = Array();

        if (empty($data)) {
            $sub_array = array();
            $sub_array[] =  'vacio';
        }else {
            foreach ($data as $row) {
                $sub_array = array();
             
                $sub_array[] = $row['correo'];
                $sub_array[] = $row['login'];
                $sub_array[] = $row['pass'];

                $dato[] = $sub_array;
             
            }
           
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'save_edit_user':

        $contar = $admin->countuser($userid);
        $n = count($contar);


        if ($n==0) {
            $admin->saveuser($nameuser,$mailuser,$pass2);
        }
        if ($n==1) {
          
            $admin->updateUsers($userid,$nameuser,$mailuser,$pass2); 
        }
        break;


    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * FUNCIONES PARA GESTIONAR MENU DE OPCIONES * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    case 'menu':
        $data = $admin->getmenus();

        $dato = Array();

        if (empty($data)) {
            $sub_array = array();
            $sub_array[] =  'vacio';
        }else {
            foreach ($data as $row) {
                $sub_array = array();
             
                $sub_array[] = $row['menu'];
                $sub_array[] = $row['object'];
                $sub_array[] = $row['view'];
                $sub_array[] = $row['icon'];

                $dato[] = $sub_array;
             
            }
           
        }

        echo json_encode($dato, JSON_UNESCAPED_UNICODE);
        break;

    case 'save_edit':

        $contar = $admin->countmenu($titleid);
        $n = count($contar);


        if ($n==0) {
            $admin->savemenu($titlemenu,$titleobj,$titleview);
        }
        if ($n==1) {
            $admin->updatemenu($titleid,$titlemenu,$titleobj,$titleview); 
        }
        break;

    case 'menu_list':
        $data = $admin->getmenus();
            echo '<ul class="nav nav-tabs row  g-2 d-flex">';
            if ($_SESSION) {
                foreach ($data as $row){
                    echo '
                        <li class="nav-item col">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#'.$row['object'].'">
                            <h4 class="d-none d-lg-block">'.$row['menu'].'</h4>
                            </a>
                        </li>
                    ';
                }
            }
            echo '</ul>';
        
        break;
    

    
    case 'eliminar':
        $users->deleteUsers($prodcod);                                 
        break;
    case 'listar':
        $data = $users->getusers();
        break;

}

//echo json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
