create database `mvc`;

USE `mvc`;

CREATE TABLE `articulos` (
  `id_articulo` int NOT NULL AUTO_INCREMENT,
  `nombre_articulo` varchar(45) COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '',
  `notas` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '',
  `precio` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `fecha_hora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_hora_modificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

CREATE TABLE `configuracion` (
  `id_configuracion` int NOT NULL AUTO_INCREMENT,
  `Iva` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id_configuracion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO configuracion (Iva) VALUES (16.0000);