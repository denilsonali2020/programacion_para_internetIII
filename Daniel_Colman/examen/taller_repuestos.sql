-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2026 a las 03:16:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_repuestos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_repuesto`
--

CREATE TABLE `categorias_repuesto` (
  `id` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_repuesto`
--

INSERT INTO `categorias_repuesto` (`id`, `nombre_categoria`, `descripcion`) VALUES
(1, 'Motor', 'Piezas relacionadas al motor'),
(2, 'Suspensión', 'Amortiguadores, resortes, etc.'),
(3, 'Eléctrico', 'Sistema eléctrico del vehículo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id` int(11) NOT NULL,
  `codigo_pieza` varchar(50) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `precio` decimal(10,2) NOT NULL,
  `estado_activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id`, `codigo_pieza`, `nombre`, `id_categoria`, `stock`, `precio`, `estado_activo`) VALUES
(1, '567', 'daniel colman', 2, 5, 300.00, 0),
(2, '567', 'daniel colman', 2, 5, 300.00, 1),
(3, '567', 'daniel colman', 2, 5, 340.00, 1),
(4, '254', 'paulethe', 2, 2, 788.00, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_repuesto`
--
ALTER TABLE `categorias_repuesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias_repuesto`
--
ALTER TABLE `categorias_repuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `repuestos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_repuesto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
