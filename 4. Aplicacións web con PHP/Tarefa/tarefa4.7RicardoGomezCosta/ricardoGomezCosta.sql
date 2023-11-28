-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 02-02-2023 a las 23:39:42
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
-- Base de datos: `tarefa4.7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `idProduto` int NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `dataCreacion` datetime NOT NULL,
  `dataModeracion` datetime DEFAULT NULL,
  `moderado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produto`
--

CREATE TABLE `produto` (
  `idProduto` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricion` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `familia` varchar(50) NOT NULL,
  `imaxe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `descricion`, `familia`, `imaxe`) VALUES
(1, 'Minions', 'En plena década de los 70, luciendo una gran cabellera y pantalones de campana, Gru, un muchacho de los suburbios, es un gran fan de un supergrupo de supervillanos conocido como Los 6 Viciosos.', 'Animación', 'minions.jpg'),
(2, 'Jurassic World: Dominion', 'Tercera parte de la franquicia Jurassic World. Cuatro años después de la destrucción de Isla Nublar, los dinosaurios ahora viven y cazan junto a los humanos en todo el mundo.', 'Ciencia Ficción', 'jurassicWorld.jpg'),
(3, 'Lightyear', 'La historia de origen de Buzz Lightyear, el héroe que inspiró el juguete, y que nos da a conocer al legendario Guardián Espacial que acabaría contando con generaciones de fans.', 'Animación', 'lightyear.jpg'),
(4, 'Top Gun: Maverick', 'Después de más de treinta años de servicio como uno de los mejores aviadores de la Armada, Pete Mitchell (Tom Cruise) está donde pertenece, empujando los límites como un valiente piloto de pruebas y esquivando el ascenso de rango que lo dejaría en tierra.\r\n', 'Ciencia Ficción', 'topGun.jpg'),
(5, 'Doctor Strange en el multiverso de la locura', 'Tras los sucesos de Avengers: Juego final, el Dr. Stephen Strange continúa la busqueda de la Pierda del Tiempo. Pero un viejo amigo se convierte en enemigo ya que tratará de destruir toda vida humana dela Tierra, con ello el Dr. Strange empezará a convertirse en un ser malvado para vengarse.', 'Ciencia Ficción', 'doctorStrange.jpg'),
(6, 'Thor: Love and Thunder', 'La película encuentra a Thor (Chris Hemsworth) en un viaje diferente a todo lo que ha enfrentado: Una búsqueda de la paz interior. Pero su retiro es interrumpido por un asesino galáctico conocido como Gorr el carnicero de dioses (Christian Bale), que busca la extinción de los dioses.', 'Ciencia Ficción', 'thor.jpg'),
(7, 'Black Phone', 'Una adaptación de un cuento del Best Seller del New York Times, JOE HILL. Un sádico asesino secuestra a Finney Shaw, un chico tímido e inteligente de 13 años, y le encierra en un sótano insonorizado donde de nada sirven sus gritos.', 'Terror', 'blackPhone.jpg'),
(8, 'Animales fantásticos: Los secretos de Dumbledore', 'Tercera parte de la saga Animales Fantásticos y Dónde Encontrarlos que sigue las aventuras de Newt Scamander.', 'Ciencia Ficción', 'animalesFantasticos.jpg'),
(9, 'Spider-Man: No Way Home', 'Una continuación de Spider-Man Lejos de Casa.Por primera vez en la historia cinematográfica de Spider-Man, nuestro amigable héroe vecino está desenmascarado y ya no puede separar su vida normal de las grandes apuestas de ser un superhéroe.', 'Ciencia Ficción', 'spiderman.jpg'),
(10, 'La ciudad perdida', 'Una escritora de novelas románticas se encuentra en plan gira de promoción de su libro por todo el país. Acompañada del modelo que acapara la portada de su bestseller.', 'Acción', 'ciudadPerdida.jpg'),
(11, 'Morbius', 'El bioquímico Michael Morbius intenta curarse a sí mismo de una rara enfermedad de la sangre, pero inadvertidamente se infecta a sí mismo con una forma de vampirismo.', 'Ciencia Ficción', 'morbius.jpg'),
(12, 'El hombre del norte', 'Película sobre los vikingos que nos transporta a la Islandia del siglo X. Un joven príncipe vikingo inicia una cruzada para vengar la muerte de su padre.', 'Aventuras', 'hombreNorte.jpg'),
(13, 'Uncharted: Fuera del mapa', 'Un descendiente del ¨explorador¨ Sir Francis Drake (o mejor dicho, habilidoso pirata a las órdenes de ¨su majestad¨) vive empeñado en encontrar el paradero de El Dorado, la legendaria ciudad cubierta totalmente de oro. ', 'Aventuras', 'uncharted.jpg'),
(14, 'The Batman', 'Cuando Enigma, un sádico asesino en serie, comienza a matar a figuras políticas clave en Gotham, Batman se ve obligado a investigar la corrupción oculta de la ciudad y cuestionar la participación de su familia.\r\n', 'Ciencia Ficción', 'batman.jpg'),
(15, 'La memoria de un asesino', 'Un asesino a sueldo descubre que se ha convertido en un objetivo después de que se niega a completar un trabajo para una peligrosa organización criminal. Una nueva versión de la película belga de 2003 \'The Memory of a Killer\'.', 'Terror', 'memory.jpg'),
(16, 'La cabeza de la araña', 'La historia se desarrolla en un futuro cercano donde los convictos pueden acortar sus penas ejerciendo de voluntarios para someterse a distintas pruebas médicas.', 'Acción', 'cabezaAraña.jpg'),
(17, 'Encanto', 'Una joven colombiana tiene que afrontar la frustración de ser el único miembro de su familia sin poderes mágicos.\r\n', 'Aventuras', 'encanto.jpg'),
(18, 'Moonfall', 'La Luna. Controla nuestras noches, nuestros días, las estaciones y las mareas del océano. Y desde el principio de la humanidad, sus fases han sido un símbolo de iluminación, de conocimiento interior y de nuestra propia inmortalidad.', 'Acción', 'moonfall.jpg'),
(19, 'Interceptor', 'Cuando se lanzan 16 misiles nucleares en los EE. UU. Y un ataque violento amenaza simultáneamente su estación interceptora de misiles remota, un teniente del ejército debe utilizar su entrenamiento táctico y experiencia militar para salvar a la humanidad.\r\n', 'Acción', 'interceptor.jpg'),
(20, 'Los tipos malos', 'Cuenta la historia de cinco famosos delincuentes que tratan de realizar su empresa más complicada hasta la fecha: portarse bien. Se basa en los libros ilustrado homónimos de Aaron Blabey.\r\n', 'Acción', 'tiposMalos.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contrasinal` varchar(300) NOT NULL,
  `nomeCompleto` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contrasinal`, `nomeCompleto`, `email`, `fecha`, `rol`) VALUES
('administrador', '$2y$10$bgmupPbG1pPnFIBJLznxiOG8e000U7SMe4yt9LEATTPpnrzLGGIOi', 'administrador', 'administrador@mail.com', '2023-02-03 00:36:18', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `idProducto` (`idProduto`),
  ADD KEY `idComentario` (`idComentario`) USING BTREE;

--
-- Indices de la tabla `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
