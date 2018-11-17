<?php
    /* function IsAuthenticated()
     abvieitez2
     
     Esta funcion valida si existe la variable de session login.
     Si no existe redirige a la pagina del login.
     */
    function IsAuthenticated(){
        if(!isset($_SESSION['login'])){
            return false;
        }else{
            return true;
        }
    }
    
    
?>
