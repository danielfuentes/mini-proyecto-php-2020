-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2020 a las 01:39:58
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curso-php-lun-jue`
--
CREATE DATABASE IF NOT EXISTS `curso-php-lun-jue` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `curso-php-lun-jue`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfil` int(11) NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `first_name`, `last_name`, `email`, `password`, `perfil`, `avatar`) VALUES
(1, 'Daniel', 'Fuentes', 'cedavilu@gmail.com', '$2y$10$aJhabi4PdtWHzGVuBJn58u2lcl/DCFgGIKfaCebe5LAij4EGcIc52', 9, 'avatar-5f9195f8259bc.jpg'),
(2, 'Luis', 'Fuentes', 'luis@gmail.com', '$2y$10$ax17Nmzy0LNnlD5b5Wap4.O3LU/TWknnYua5pCjaF2YSeyoQ06kjG', 1, 'avatar-5f886b7d736db.jpg'),
(3, 'Victor', 'Fuentes', 'victor@gmail.com', '$2y$10$061hA2CVdFZshh2s56FQVukyfJpUegN5tYA1aAXoTd26yVFg8dVUi', 1, 'avatar-5f886ac3004be.jpg'),
(4, 'Gloria', 'Medina', 'gloria@gmail.com', '$2y$10$2hGSriFwnEJSJcQ7ISPG5.Tnl.pT2.oxXJMc6ky04gOqfceHLcQC2', 1, 'avatar-5f99f45f7d10f.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
