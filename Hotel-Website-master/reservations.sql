-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 06:46:38
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
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `arrival_fecha` date NOT NULL,
  `departure_fecha` date NOT NULL,
  `huespedes` int(11) NOT NULL,
  `tipo_cuarto` varchar(50) NOT NULL,
  `id_cuarto` int(11) DEFAULT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservations`
--

INSERT INTO `reservations` (`id`, `nombre`, `apellido`, `email`, `arrival_fecha`, `departure_fecha`, `huespedes`, `tipo_cuarto`, `id_cuarto`, `reservation_date`) VALUES
(45, 'Ana Sofía ', 'sdfasdf', 'pacoglzh@gmail.com', '2024-06-05', '2024-06-07', 1, 'Cuarto Superior', 3, '2024-06-05 04:54:40'),
(46, 'Ana Sofía ', 'sdas', 'yadoday13@hotmail.com', '2024-06-08', '2024-06-20', 2, 'Cuarto Superior', 2, '2024-06-05 06:29:16'),
(47, 'asdfasd', 'asdfas', 'ajve83@hotmail.com', '2024-06-07', '2024-06-10', 2, 'Cuarto Inferior', 9, '2024-06-05 07:18:26'),
(48, 'asd', 'asf', 'asgv100@gmail.com', '2024-06-06', '2024-06-07', 2, 'Cuarto Superior', 5, '2024-06-05 07:48:08'),
(49, 'Ana Sofía ', 'González Valerio', 'pacoglzh@gmail.com', '2024-06-06', '2024-06-08', 2, 'Cuarto Inferior', 10, '2024-06-05 08:29:03'),
(50, 'sdaf', 'sds', 'alu.21131365@correo.itlalaguna.edu.mx', '2024-06-18', '2024-06-22', 2, 'Cuarto Superior', 4, '2024-06-05 08:34:01'),
(51, 'Ana Sofía ', 'asd', 'pacoglz@gmail.com', '2024-06-17', '2024-06-14', 1, 'Cuarto Superior', 1, '2024-06-05 10:21:29'),
(52, 'Ana Sofía González Valerio', 'asdf', 'pacoglzh@gmail.com', '2024-06-15', '2024-06-07', 2, 'Cuarto Máximo', 14, '2024-06-05 15:56:12'),
(53, 'Ana Sofía González Valerio', 'ddasd', 'yadoday13@hotmail.com', '2024-06-13', '2024-06-12', 2, 'Cuarto Máximo', 12, '2024-06-05 15:59:16'),
(54, 'adsa', 'asd', 'pacoglzh@gmail.com', '2024-06-22', '2024-06-28', 1, 'Cuarto Inferior', 6, '2024-06-05 16:08:47'),
(55, 'adsa', 'asd', 'pacoglzh@gmail.com', '2024-06-22', '2024-06-28', 1, 'Cuarto Inferior', 8, '2024-06-05 16:09:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cuarto` (`id_cuarto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_cuarto`) REFERENCES `habitaciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
