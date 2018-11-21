<?php
    
    //Clase: Usuario
    
    class Usuarios_Model{
        
        var $login;
        var $password;
        var $nombre;
        var $apellidos;
        var $email;
        var $dni;
        var $telefono;
        var $fechaNac;
        var $foto;
        var $sexo;
        
        var $mysqli;
        
        
        function __construct($dni=null, $telefono=null, $login=null, $password=null, $fechaNac=null, $foto=null, $email=null, $nombre=null, $apellidos=null, $sexo=null){
            $this->login = $login;
            $this->dni = $dni;
            $this->telefono = $telefono;
            $this->fechaNac = $fechaNac;
            $this->password = $password;
	        $this->nombre = $nombre;
	        $this->apellidos = $apellidos;
            $this->email = $email;
            $this->foto = $foto;
            $this->sexo = $sexo;

            include_once '../Model/Access_DB.php';
	        $this->mysqli = ConnectDB();
        }



        function login(){

            $sql = "SELECT *
                    FROM USUARIOS
                    WHERE (
                        (login = '$this->login') 
                    )";

            if(!isset($this->login)){
                return 'login vacio';
            }
        
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
            

            if(!isset($this->login) || !isset($this->email) || !isset($this->dni)){
                return 'Algunos datos vacios';
            }

            $sql = "SELECT *
                    FROM USUARIOS
                    WHERE login = '$this->login' OR dni = '$this->dni' OR email = '$this->email'";
            $resultado = $this->mysqli->query($sql);

            

            if($resultado->num_rows == 1){
                return 'Login, email o dni ya existen';
            }else{
                return 'true';
            }

            
        }
        function register(){
            $foto = $this->photoDir();
           
            $sql = "INSERT INTO USUARIOS VALUES('$this->login','$this->password','$this->dni','$this->nombre','$this->apellidos'
            ,'$this->telefono','$this->email','$this->fechaNac','$foto','$this->sexo')";


            if(!$this->mysqli->query($sql)){
                return 'Error de inserción';
            }else{
                return 'Registrado';
            }
        }

        function photoDir(){
            $foto = '../Files/'. $this->email . '/Photo/' . $this->foto['name'];
            $dirUsuario = '../Files/'. $this->email .'/Photo/';

            if(!file_exists($dirUsuario)){
                mkdir($dirUsuario,0777,true);
            }
            move_uploaded_file($this->foto['tmp_name'], $foto);

            return $foto;
            
        }


        
        
    }
    
    

    
    

?>
