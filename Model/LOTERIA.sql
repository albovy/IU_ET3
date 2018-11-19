DROP DATABASE IF EXISTS `IU2018`;
CREATE DATABASE `IU2018` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--
-- SELECCIONAMOS PARA USAR
--
USE `IU2018`;
--
-- DAMOS PERMISO USO Y BORRAMOS EL USUARIO QUE QUEREMOS CREAR POR SI EXISTE
--
GRANT USAGE ON * . * TO `iu2018`@`localhost`;
	DROP USER `iu2018`@`localhost`;
--
-- CREAMOS EL USUARIO Y LE DAMOS PASSWORD,DAMOS PERMISO DE USO Y DAMOS PERMISOS SOBRE LA BASE DE DATOS.
--
CREATE USER IF NOT EXISTS `iu2018`@`localhost` IDENTIFIED BY 'pass2018';
GRANT USAGE ON *.* TO `iu2018`@`localhost` REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `IU2018`.* TO `iu2018`@`localhost` WITH GRANT OPTION;


CREATE TABLE IF NOT EXISTS `USUARIOS` (

`DNI` varchar(9) NOT NULL,
`telefono` varchar(11) NOT NULL,
`login` varchar(15) NOT NULL,
`password` varchar(128) NOT NULL,
`FechaNacimiento` date NOT NULL,
`GrupoPrácticas` varchar(10) NOT NULL,
`email` varchar(60) NOT NULL,
`nombre` varchar(30) NOT NULL,
`apellidos` varchar(50) NOT NULL,
`titulacion` varchar(60) NOT NULL,
`CursoAcademico` varchar(5) NOT NULL,
PRIMARY KEY (`login`),
UNIQUE KEY `DNI` (`DNI`),
UNIQUE KEY `email` (`email`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8;


 CREATE TABLE `LOTERIAIU` (
  `lot.email` varchar(60) COLLATE latin1_spanish_ci NOT NULL COMMENT 'email del que participa en la loteria',
  `lot.nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL COMMENT 'nombre del que participa en la loteria',
  `lot.apellidos` varchar(40) COLLATE latin1_spanish_ci NOT NULL COMMENT 'apellidos del que participa en la loteria',
  `lot.participacion` int(3) NOT NULL COMMENT 'importe con el que participa en la loteria',
  `lot.resguardo` varchar(50) COLLATE latin1_spanish_ci NOT NULL COMMENT 'resguardo de la participación en la loteria',
  `lot.ingresado` enum('SI','NO') COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'ha ingresado la participación',
  `lot.premiopersonal` int(6) DEFAULT NULL COMMENT 'premio que le corresponde por la participacion jugada',
  `lot.pagado` enum('SI','NO') COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'se le ha pagado el premio que el corresponde'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Tabla de participaciones en la loteria de la gente de IU';


INSERT INTO  USUARIOS VALUES('45142934Y','680913308','albovy','albovy','16-04-1997','1','albovy@hotmail.com','Alex','Borrajo','Esei','2');

INSERT INTO LOTERIAIU VALUES('albovy@hotmail.com','albovy','Borrajo',20,'fdsfdsfd','SI',200,'SI');
INSERT INTO LOTERIAIU VALUES('albovy2@hotmail.com','albovy','Borrajo',20,'fdsfdsfd','SI',200,'SI');