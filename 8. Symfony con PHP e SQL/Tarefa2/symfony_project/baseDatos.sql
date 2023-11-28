-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 16-05-2023 a las 14:16:52
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rutas`
--
CREATE DATABASE IF NOT EXISTS `rutas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `rutas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230512133857', '2023-05-15 15:37:51', 37),
('DoctrineMigrations\\Version20230512134354', '2023-05-15 15:37:51', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comunidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modalidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dificultad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapa` varchar(700) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id`, `nombre`, `comunidad`, `lugar`, `modalidad`, `dificultad`, `imagen`, `mapa`, `slug`) VALUES
(1, 'Montaña Palentina', 'Castilla y León', 'Palencia', 'Montaña, Gravel', 'Media', 'palencia.jpg', 'https://www.komoot.com/es-es/collection/1197536/embed', 'palencia'),
(2, 'Pirineos Catalanes', 'Cataluña', 'Cataluña', 'Montaña', 'Media-Alta', 'cataluna.jpg', 'https://www.komoot.com/es-es/collection/1091707/embed', 'cataluna'),
(3, 'Faros Vascos', 'País Vasco', 'País Vasco', 'Carretera, Montaña, Gravel', 'Media', 'euskadi.jpg', 'https://www.komoot.com/es-es/collection/1085242/embed', 'euskadi'),
(4, 'Sierra de Tramuntana', 'Mallorca', 'Mallorca', 'Carretera, Montaña, Gravel', 'Media-Alta', 'mallorca.jpg', 'https://www.komoot.com/es-es/collection/1296569/embed', 'mallorca'),
(5, 'Bosques del Sur', 'Andalucía', 'Andalucía', 'Montaña, Gravel', 'Media-Alta', 'andalucia.jpg', 'https://www.komoot.com/es-es/collection/1356406/embed', 'andalucia'),
(6, 'Montsec Bikepacking Loop', 'Aragón', 'Aragón y Cataluña', 'Montaña, Gravel', 'Media-Alta', 'aragon.jpg', 'https://www.komoot.com/es-es/collection/1370137/embed', 'aragon'),
(7, 'Lanzarote', 'Canarias', 'Lanzarote', 'Montaña, Gravel', 'Media', 'lanzarote.jpg', 'https://www.komoot.com/es-es/collection/1095778/embed', 'lanzarote'),
(8, 'Summits9', 'Cataluña', 'Girona', 'Montaña, Gravel', 'Media-Alta', 'girona.jpg', 'https://www.komoot.com/es-es/collection/1152408/embed', 'girona'),
(9, 'Transfronteriza por Cataluña', 'Cataluña', 'Cataluña', 'Montaña, Gravel', 'Media', 'cataluna2.jpg', 'https://www.komoot.com/es-es/collection/1369158/embed', 'palencia'),
(10, 'La Rioja', 'La Rioja', 'La Rioja', 'Montaña, Gravel', 'Media', 'rioja.jpg', 'https://www.komoot.com/es-es/collection/1176612/embed', 'rioja');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
