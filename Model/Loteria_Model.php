<?php
    
    //clase loteria

    class Loteria_Model{

        var $email;
        var $nombre;
        var $apellidos;
        var $participacion;
        var $ingresado;
        var $resguardo;
        var $premiPersonal;
        var $pagado;
        var $mysqli;

        function __construct($email=null,$nombre=null,$apellidos=null,$resguardo=null,$participacion=null,$ingresado=null,$premiPersonal=null,$pagado=null){
            $this->email = $email;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->resguardo = $resguardo;
            $this->participacion = $participacion;
            $this->ingresado = $ingresado;
            $this->premiPersonal = $premiPersonal;
            $this->pagado = $pagado;


            include_once '../Model/Access_DB.php';
	        $this->mysqli = ConnectDB();
        }

        function getEmail(){
            return $this->email;
        }
        function getNombre(){
            return $this->nombre;
        }

        function getParticipacion(){
            return $this->participacion;
        }
        function getResguardo(){
            return $this->resguardo;
        }

        function getIngresado(){
            return $this->ingresado;
        }

        function getPremioPersonal(){
            return $this->premiPersonal;
        }

        function getApellidos(){
            return $this->apellidos;
        }

        function getPagado(){
            return $this->pagado;
        }

        function findByEmail(){
            
            $sql = "SELECT *
                    FROM LOTERIAIU
                    WHERE `lot.email` = '$this->email'";

            $resultado = $this->mysqli->query($sql);
            if($resultado->num_rows == 0){
                return 'Email incorrecto';

            }else{
                

                $tupla = $resultado->fetch_array();
                $this->nombre = $tupla['lot.nombre'];
                $this->apellidos = $tupla['lot.apellidos'];
                $this->resguardo = $tupla['lot.resguardo'];
                $this->participacion = $tupla['lot.participacion'];
                $this->ingresado = $tupla['lot.ingresado'];
                $this->premiPersonal = $tupla['lot.premiopersonal'];
                $this->pagado = $tupla['lot.pagado'];

                return $this;

            }
        }

        function findAll(){
            $sql = "SELECT *
                    FROM LOTERIAIU";

            $resultado = $this->mysqli->query($sql);
            
            $participaciones_db = $resultado->fetch_All(MYSQLI_ASSOC);
            $participaciones = array();

           
            foreach($participaciones_db as $participacionLot){
                
                array_push($participaciones, new Loteria_Model($participacionLot['lot.email']
                            ,$participacionLot['lot.nombre'],$participacionLot['lot.apellidos']
                            ,$participacionLot['lot.resguardo'],$participacionLot['lot.participacion']
                            ,$participacionLot['lot.ingresado']
                            ,$participacionLot['lot.premiopersonal'],$participacionLot['lot.pagado']));
                            
            }

            return $participaciones;
        }

        function checkIsValidForInsert(){
            $sql = "SELECT *
                    FROM LOTERIAIU
                    WHERE `lot.email` = '$this->email'";
                   
            $resultado = $this->mysqli->query($sql);
            
            if($resultado->num_rows == 1){
                return "Ya existe una participación con ese email";
            }else{
                return 'true';
            }
        }

        function insert(){
            $sql = "INSERT INTO LOTERIAIU VALUES('$this->email','$this->nombre','$this->apellidos',$this->participacion,'$this->resguardo'
                                                ,'$this->ingresado',$this->premiPersonal,'$this->pagado')";
            if(!$this->mysqli->query($sql)){
                return "Error insertando";
            }else{
                $this->openfile();
                return "Insertado";
            }
        }

        function update(){
            $sql="UPDATE LOTERIAIU
                 SET `lot.nombre` = '$this->nombre', `lot.apellidos` = '$this->apellidos', `lot.participacion` = $this->participacion
                 , `lot.resguardo` = '$this->resguardo', `lot.ingresado` = '$this->ingresado', `lot.premiopersonal` = $this->premiPersonal, `lot.pagado` = '$this->pagado'
                 WHERE `lot.email` = '$this->email'";

            if(!$this->mysqli->query($sql)){
                return "Error editando";
            }else{
        
                return "Editado";
            }



            
        }
        function delete(){

            $sql="DELETE FROM LOTERIAIU
                 WHERE `lot.email` = '$this->email'";


            if(!$this->mysqli->query($sql)){
                return "Error borrando";
            }else{
                $this->deleteFile();
                return "Borrado";
            }

            
        }

        function search(){
            $sql = "SELECT * FROM LOTERIAIU
                    WHERE `lot.email` LIKE '%$this->email%' AND `lot.nombre` LIKE '%$this->nombre%' AND `lot.apellidos` LIKE '%$this->apellidos%'
                    AND `lot.participacion` LIKE '%$this->participacion%' AND `lot.resguardo` LIKE '%$this->resguardo%' AND `lot.ingresado` LIKE '%$this->ingresado%' AND
                    `lot.premiopersonal` LIKE '%$this->premiPersonal%' AND `lot.pagado` LIKE '%$this->pagado%'";

                $resultado = $this->mysqli->query($sql);
               
            
                $participaciones_db = $resultado->fetch_All(MYSQLI_ASSOC);
                $participaciones = array();

                foreach($participaciones_db as $participacionLot){
    
                array_push($participaciones, new Loteria_Model($participacionLot['lot.email']
                    ,$participacionLot['lot.nombre'],$participacionLot['lot.apellidos']
                    ,$participacionLot['lot.resguardo'],$participacionLot['lot.participacion']
                    ,$participacionLot['lot.ingresado']
                    ,$participacionLot['lot.premiopersonal'],$participacionLot['lot.pagado']));
                
                }

                return $participaciones;

        }

        function openFile(){
            fopen("../Files/$this->resguardo","w+");
        }
        function deleteFile(){
            unlink("../Files/$this->resguardo");
        }







    }
?>