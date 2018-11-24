<?php

include "../Functions/Authentication.php";
include '../View/Loteriaiu_SHOWALL_View.php';
include '../View/Loteriaiu_SHOWCURRENT_View.php';
include '../View/Loteriaiu_ADD_View.php';
include '../View/Loteriaiu_DELETE_View.php';
include '../View/Loteriaiu_EDIT_View.php';
include '../View/Loteriaiu_SEARCH_View.php';
include '../Model/Loteria_Model.php';
include '../View/MESSAGE_View.php';




session_start();

if(!IsAuthenticated()){
    header('Location:../index.php');
}

if(!isset($_GET['action'])){
    $action = '';
} else {
    $action = $_GET['action'];
}

switch ($action) {

    case 'search':
    if(!$_POST){
        new Search();
    }else{
        $loteria = new Loteria_Model($_POST['email'], $_POST['nombre'],$_POST['apellidos'], $_FILES['resguardo'] ,$_POST['participación'], $_POST['ingresado'],$_POST['premio'],$_POST['pagado']);
        

        $resultado = $loteria->search();
        if($_GET['results']){
            new Search($resultado);
        }

    }

    break;


    case 'delete':
    if(!isset($_GET['email'])){
        new Message($respuesta,'../index.php');
    }
    else{
        $loteria = new Loteria_Model($_GET['email']);
        $loteria = $loteria->findByEmail();
        
        
        if(isset($_GET['delete'])){

            $respuesta = $loteria->delete();
            new Message($respuesta , '../index.php');

        }else{

            new DeleteCurrent($loteria);

        
        }
    }

    break;




    case 'showcurrent':
        if(!isset($_GET['email'])){
            new Message($respuesta,'../index.php');
        }else{
            $loteria = new Loteria_Model($_GET['email']);
            $loteria = $loteria->findByEmail();

            new ShowCurrent($loteria);



    }

    break;


    case 'edit':
        if(!isset($_GET['email'])){
            new Message($respuesta,'../index.php');
        }else{
            $loteria = new Loteria_Model($_GET['email']);
            $loteria = $loteria->findByEmail();
            $resguardo = $loteria->getResguardo();

            if(!$_POST){
                $loteria = new Loteria_Model($_GET['email']);
                $loteria = $loteria->findByEmail();
                new EditLot($loteria);
            }else{
                $loteria = new Loteria_Model($_GET['email'], $_POST['nombre'],$_POST['apellidos'], $resguardo ,$_POST['participación'], $_POST['ingresado'],$_POST['premio'],$_POST['pagado']);
                
                $respuesta = $loteria->update();

                if($respuesta == 'Editado'){
                    new Message($respuesta,'../index.php');

                }else{
                    new Message($respuesta,'../index.php');
                }


            }
        }

        break;
    

    case 'add':
    if(!$_POST){
        new AddLot();
    }else{
        
        $loteria = new Loteria_Model($_POST['email'], $_POST['nombre'],$_POST['apellidos'], $_FILES['resguardo'],$_POST['participación'], $_POST['ingresado'],$_POST['premio'],$_POST['pagado']);
        
        $respuesta = $loteria->checkIsValidForInsert();
        

        if($respuesta == 'true'){
           $respuesta = $loteria->insert();
            if($respuesta == 'Insertado'){
                new Message($respuesta,'../index.php');
            }else{
                new Message($respuesta,'../index.php');
            }
        }else{
            new Message($respuesta, '../index.php');
        }
        
    }


    break;

    default: //showall



    $loteria = new Loteria_Model();
    $participaciones = $loteria->findAll();
  

    new ShowAll($participaciones);

    break;



}


?>