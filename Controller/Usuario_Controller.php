<?php 

include "../Functions/Authentication.php";
include '../View/Login_View.php';
include '../View/Register_View.php';
include '../Model/Usuarios_Model.php';
include '../View/Message_View.php';

// if(!isset($_SESSION['login']){
//     session_start();
// }

session_start();




if(!isset($_GET['action'])){
    $action = '';
} else {
    $action = $_GET['action'];
}

switch ($action) {

case 'register':

    if(!$_POST){
        new Register();
    }else{
        $usuario = new Usuarios_Model($_POST['dni'],$_POST['telefono'],$_POST['login'],$_POST['password'],$_POST['fechaNac'],$_POST['grupoPractico'],$_POST['email'],$_POST['nombre'],$_POST['apellidos'],$_POST['titulacion'],$_POST['curso']);
       
        $respuesta = $usuario->checkIsValidForRegister();

        if($respuesta == 'true'){
            $respuesta = $usuario->register();
            if($respuesta == 'Registradro'){
                var_dump("hola");
            }
            else{
                var_dump($respuesta);
            }
        }else{
            new Message($respuesta, './Usuario_Controller.php');
        }


    }
    break;

default: //login

    if(!$_POST){
        new Login();
    } else {
        
        $usuario = new Usuarios_Model('','',$_POST['login'],$_POST['password'],'','','','','','',0);
        
        $respuesta = $usuario->login();
        
        if($respuesta == 'true'){
            $_SESSION['login'] = $_POST['login'];
            //header('Location:../index.php');
        }else{
            new Message($respuesta, './Usuario_Controller.php');
        }
    
    }

break;

}

?>