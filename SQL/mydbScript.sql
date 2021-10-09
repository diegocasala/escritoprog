CREATE DATABASE `escrito`
use `escrito`;

CREATE TABLE `usuarios` (
  `CedulaUsuario` decimal(8,0) NOT NULL,
  `NombreUsuario` varchar(45) NOT NULL,
  `ApellidoUsuario` varchar(45) NOT NULL,
  `ContraseñaUsuario` varchar(255) NOT NULL,
    PRIMARY KEY (`CedulaUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `souvenirs` (
  `id` int(11) NOT NULL ,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(255) NULL,
  `stock` decimal(8,0) NOT NULL ,
  `precio` decimal(8,0) NOT NULL,
  `fechadealta` date NOT NULL,
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fechadecompra` date NOT NULL,
  `souvenirs` decimal(8,0) NOT NULL ,
  `cantidad` decimal(8,0) NOT NULL ,
  PRIMARY KEY (`id`),
    CONSTRAINT `fkcomprassouvenirs` FOREIGN KEY (`souvenirs`) REFERENCES `souvenirs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

