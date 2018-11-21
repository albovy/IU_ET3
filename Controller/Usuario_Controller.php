<?php 

include "../Functions/Authentication.php";
include '../View/Login_View.php';
include '../View/Register_View.php';
include '../Model/Usuarios_Model.php';
include '../View/Message_View.php';



session_start();

if(IsAuthenticated()){
    header('Location:../index.php');
}


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



        $usuario = new Usuarios_Model($_POST['dni'],$_POST['telefono'],$_POST['login'],$_POST['password'],$_POST['fechaNac'],$_FILES['foto'],$_POST['email'],$_POST['nombre'],$_POST['apellidos'],$_POST['sexo']);
       
        $respuesta = $usuario->checkIsValidForRegister();

        if($respuesta == 'true'){
            $respuesta = $usuario->register();
            if($respuesta == 'Registrado'){
                new Message($respuesta, './Usuario_Controller.php');
            }
            else{
                new Message($respuesta, './Usuario_Controller.php');
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

        $usuario = new Usuarios_Model('','',$_POST['login'],$_POST['password']);
        
        $respuesta = $usuario->login();
        
        if($respuesta == 'true'){
            $_SESSION['login'] = $_POST['login'];
            header('Location:../index.php');
        }else{
            new Message($respuesta, './Usuario_Controller.php');
        }
    
    }

break;

}

?>
