-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 06:43:34
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
-- Base de datos: `formulario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `Disponible` int(11) NOT NULL DEFAULT 1,
  `precio` decimal(50,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `tipo`, `Disponible`, `precio`) VALUES
(1, 'Cuarto Superior Serendipity', 0, 129),
(2, 'Cuarto Superior Serendipity', 0, 129),
(3, 'Cuarto Superior Serendipity', 0, 129),
(4, 'Cuarto Superior Serendipity', 0, 129),
(5, 'Cuarto Superior Serendipity', 0, 129),
(6, 'Cuarto Inferior Serendipity', 0, 100),
(7, 'Cuarto Inferior Serendipity', 1, 100),
(8, 'Cuarto Inferior Serendipity', 0, 100),
(9, 'Cuarto Inferior Serendipity', 0, 100),
(10, 'Cuarto Inferior Serendipity', 0, 100),
(11, 'Cuarto Máximo Serendipity', 1, 240),
(12, 'Cuarto Máximo Serendipity', 0, 240),
(13, 'Cuarto Máximo Serendipity', 1, 240),
(14, 'Cuarto Máximo Serendipity', 0, 240),
(15, 'Cuarto Máximo Serendipity', 1, 240);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
