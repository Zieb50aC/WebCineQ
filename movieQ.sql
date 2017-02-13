-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2017 a las 13:29:41
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cineq`
--
CREATE DATABASE IF NOT EXISTS `cineq` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cineq`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `migrations`:
--

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jugador1` int(11) NOT NULL,
  `jugador2` int(11) NOT NULL,
  `ganador` enum('Empate','Jugador1','Jugador2') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `partida`:
--   `jugador1`
--       `users` -> `id`
--   `jugador2`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `password_resets`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `textoPregunta` varchar(255) NOT NULL,
  `respuestaCorrecta` varchar(255) NOT NULL,
  `respuestaIncorrecta1` varchar(255) NOT NULL,
  `respuestaIncorrecta2` varchar(255) NOT NULL,
  `respuestaIncorrecta3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `pregunta`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntaspartida`
--

CREATE TABLE IF NOT EXISTS `preguntaspartida` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idPartida` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `preguntaspartida`:
--   `idPartida`
--       `partida` -> `id`
--   `idPregunta`
--       `pregunta` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `users`:
--

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$cH1BnD8Ye4xZpC0lDyyx0OmZHmN5LgZT8X4JsdCKoCnkdrduFKU3i', 'V0VL3ktVhwXCgE6hqXKGmTocucawGOXfKjoA7ChVIFz85X8ZGVoYWJUQPYgF', '2017-01-21 18:19:49', '2017-02-06 10:13:54'),
(2, 'Ana', 'hola@hola.com', '$2y$10$y3R58QdmLKt7PT/hRC/lqeSADiQkrBc5rRCvGbaY8h3UFYHBLTRBy', '7YquccWEuCuO2tvpQdnAXZzr55Z10jc0w4w3seihh0eT1T2St1dC7OWKEcgV', '2017-02-06 10:54:00', '2017-02-06 10:54:19'),
(3, 'Prueba', '1@1.com', '$2y$10$wkga/8.DrgKRxTLNJfn.Y.4PPBuH4PFfOmZOEZsXeO./6tteJZUtq', 'RlMS67Te26waKYfMbW03dk73AykNKLisThdKv85j5RSqeep82fNb5PNUIKHt', '2017-02-06 11:00:39', '2017-02-06 11:00:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
