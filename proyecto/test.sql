# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-12-09 15:44:23
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "provincias"
#

DROP TABLE IF EXISTS `provincias`;
CREATE TABLE `provincias` (
  `cod` char(2) NOT NULL DEFAULT '00' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia',
  PRIMARY KEY (`cod`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';

#
# Data for table "provincias"
#

INSERT INTO `provincias` VALUES ('01','Alava'),('02','Albacete'),('03','Alicante'),('04','Almera'),('05','Avila'),('06','Badajoz'),('07','Baleares'),('08','Barcelona'),('09','Burgos'),('10','Cáceres'),('11','Cádiz'),('12','Castellón'),('13','Ciudad Real'),('14','Córdoba'),('15','Coruña'),('16','Cuenca'),('17','Girona'),('18','Granada'),('19','Guadalajara'),('20','Guipzcoa'),('21','Huelva'),('22','Huesca'),('23','Jaén'),('24','León'),('25','Lleida'),('26','Rioja'),('27','Lugo'),('28','Madrid'),('29','Málaga'),('30','Murcia'),('31','Navarra'),('32','Ourense'),('33','Asturias'),('34','Palencia'),('35','Palmas'),('36','Pontevedra'),('37','Salamanca'),('38','Santa Cruz de Tenerife'),('39','Cantabria'),('40','Segovia'),('41','Sevilla'),('42','Soria'),('43','Tarragona'),('44','Teruel'),('45','Toledo'),('46','Valencia'),('47','Valladolid'),('48','Vizcaya'),('49','Zamora'),('50','Zaragoza'),('51','Ceuta'),('52','Melilla');

#
# Structure for table "tareas"
#

DROP TABLE IF EXISTS `tareas`;
CREATE TABLE `tareas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Persona_de_contacto` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT '',
  `Direccion` varchar(255) DEFAULT NULL,
  `Poblacion` varchar(255) DEFAULT NULL,
  `Codigo_Postal` varchar(255) DEFAULT NULL,
  `Provincia` varchar(255) DEFAULT NULL,
  `Estado` varchar(1) DEFAULT NULL,
  `Fecha_de_creacion` varchar(255) DEFAULT NULL,
  `Operario_encargado` varchar(255) DEFAULT NULL,
  `Fecha_de_realizacion` varchar(255) DEFAULT NULL,
  `Anotaciones_anteriores` varchar(255) DEFAULT NULL,
  `Anotaciones_posteriores` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

#
# Data for table "tareas"
#

INSERT INTO `tareas` VALUES (63,'Podar jardin','Paco','655-0050-5545','mijardincito@gmail.com','Calle sin jardin','Villa jardin','21021','13','P','09-12-2019','chacha','12-12-2019','Cuidado con las manos',NULL),(64,'Podar jardin','Fernando','654-0111-0101','mijardincito2@gmail.com','Calle sin jardin2','Villa jardin2','21323','51','P','09-12-2019','John','02-01-2020','',NULL);

#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `nick` varchar(20) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`nick`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "usuario"
#

INSERT INTO `usuario` VALUES ('chacha','123',0),('dani','asdasd',1),('idk','123',0),('John','123',0);

#
# Trigger "insertarFecha"
#

DROP TRIGGER IF EXISTS `insertarFecha`;
CREATE TRIGGER insertarFecha BEFORE INSERT ON tareas
FOR EACH ROW
BEGIN
  SET NEW.Fecha_de_creacion = (SELECT DATE_FORMAT(SYSDATE(), "%d-%m-%Y"));
END;
