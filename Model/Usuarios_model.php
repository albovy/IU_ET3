<?php
    
    //Clase: Usuario
    
    class Usuarios_model{
        
        var $login;
        var $password;
        var $nombre;
        var $apellidos;
        var $email;
        var $dni;
        var $telefono;
        var $fechaNac;
        var $titulacion;
        var $grupoPractico;
        var $curso;
        var $mysqli;
        
        
        function __construct($dni, $telefono, $login, $password, $fechaNac, $grupoPractico, $email, $nombre, $apellidos, $titulacion, $curso ){
            $this->login = $login;
            $this->dni = $dni;
            $this->telefono = $telefono;
            $this->fechaNac = $fechaNac;
            $this->password = $password;
	        $this->nombre = $nombre;
	        $this->apellidos = $apellidos;
            $this->email = $email;
            $this->titulacion = $titulacion;
            $this->grupoPractico = $grupoPractico;
            $this->curso = $curso;

            include_once '../Model/Access_DB.php';
	        $this->mysqli = ConnectDB();
        }



        function login(){

            $sql = "SELECT *
                    FROM USUARIOS
                    WHERE (
                        (login = '$this->login') 
                    )";
        
            $resultado = $this->mysqli->query($sql);
            if ($resultado->num_rows == 0){
                return 'El login no existe';
            }
            else{
                
                $tupla = $resultado->fetch_array();
                if ($tupla['password'] == $this->password){
                    
                    return 'true';
                }
                else{
                    return 'La password para este usuario no es correcta';
                }
            }
        }//fin metodo login

        function checkIsValidForRegister(){
            $sql = "SELECT *
                    FROM USUARIOS
                    WHERE login = '$this->login' OR dni = '$this->dni'";
            $resultado = $this->mysqli->query($sql);

            if($resultado->num_rows == 1){
                return 'Login en uso';
            }else{
                return 'true';
            }

            
        }
        function register(){
            $fech = $this->fechaNac;
            $fech = str_replace("/","-",$fech);
            
            var_dump($fech);
            
            $sql = "INSERT INTO USUARIOS VALUES('$this->dni','$this->telefono','$this->login','$this->password','$fech'
            ,'$this->grupoPractico','$this->email','$this->nombre','$this->apellidos','$this->titulacion','$this->curso')";

            var_dump($sql);

            if(!$this->mysqli->query($sql)){
                return 'Error de inserccion';
            }else{
                return 'Registrado';
            }
        }
    }
    
    

    
    

?>
