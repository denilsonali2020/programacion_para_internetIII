-- -------------------------------------------------------------
-- TablePlus 26.8.6(752)
--
-- https://tableplus.com/
--
-- Database: ticketsoporte
-- Generation Time: 2026-08-06 19:34:29.7260
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `prioridad` enum('Baja','Media','Alta') NOT NULL,
  `estado` enum('Pendiente','En Proceso','Resuelto') NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('usuario','tecnico') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tickets` (`id`, `id_usuario`, `titulo`, `descripcion`, `prioridad`, `estado`, `departamento`, `fecha_creacion`) VALUES
(1, 1, 'Problema con acceso al correo', 'No puedo ingresar al correo institucional desde mi equipo.', 'Alta', 'Resuelto', 'TI', '2026-08-06 18:45:22'),
(2, 1, 'Impresora no responde', 'La impresora de la oficina no imprime desde ayer.', 'Media', 'Pendiente', 'Soporte', '2026-08-06 18:45:22'),
(3, 2, 'Error en sistema de ventas', 'El sistema muestra un error al guardar ventas.', 'Alta', 'En Proceso', 'Desarrollo', '2026-08-06 18:45:22'),
(4, 2, 'Impresora empieza a fallar', 'Decoloracion desigual en imagenes a color', 'Media', 'Resuelto', 'Comunicaciones', '2026-08-06 19:12:17');

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`) VALUES
(1, 'Ali', 'ali@ali.com', '$2a$12$C8z2z5YEe8yLYcVHa8j4AuuhdBfJLE6rAtFj0GXxQIY7Oj361825W', 'usuario'),
(2, 'Tuli', 'tuli@tuli.com', '$2a$12$C8z2z5YEe8yLYcVHa8j4AuuhdBfJLE6rAtFj0GXxQIY7Oj361825W', 'tecnico');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;