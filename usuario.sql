-- SCRIPT PARA INSERTAR EN LA BASE DE DATOS, USAR USUARIO ADMINISTRADOR

-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-02-2025 a las 23:23:23
-- Versión del servidor: 9.2.0
-- Versión de PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebatecnica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int NOT NULL,
  `usuario_nombre` varchar(70) COLLATE utf8mb3_spanish_ci NOT NULL,
  `usuario_apellido` varchar(70) COLLATE utf8mb3_spanish_ci NOT NULL,
  `usuario_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `usuario_usuario` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `usuario_clave` varchar(200) COLLATE utf8mb3_spanish_ci NOT NULL,
  `usuario_creado` timestamp NOT NULL,
  `usuario_actualizado` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_email`, `usuario_usuario`, `usuario_clave`, `usuario_creado`, `usuario_actualizado`) VALUES
(1, 'Administrador', 'Principal', 'admin@admin.com', 'Administrador', '$2y$10$AeTpHFyYqrsvSbC9qyQ3uuAow40EGIRrKhooZX3vZq/7zVo5JxJ16', '2025-02-02 23:11:50', '2025-02-02 23:11:50'),
(2, 'Ivanna', 'Carmona', 'ivanna@gmail.com', 'ivannacc', '$2y$10$KjMUrFO4rNcGV5a8ZbWdiuBDwLg6K24lmz43BS1WOT.0HVJ6NgfMi', '2025-02-02 23:16:54', '2025-02-02 23:20:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
