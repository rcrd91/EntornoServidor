-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: dbXdebug
-- Tiempo de generación: 07-12-2022 a las 14:44:30
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
-- Base de datos: `tarefa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aluga`
--

CREATE TABLE `aluga` (
  `idAluga` int NOT NULL,
  `codCliente` int DEFAULT NULL,
  `idArtigo` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `numDiasAlugados` int DEFAULT NULL,
  `prezo` decimal(6,2) DEFAULT NULL,
  `devolto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `aluga`
--

INSERT INTO `aluga` (`idAluga`, `codCliente`, `idArtigo`, `fecha`, `numDiasAlugados`, `prezo`, `devolto`) VALUES
(38, NULL, 1, NULL, NULL, NULL, 1),
(39, NULL, 2, NULL, NULL, NULL, 1),
(60, NULL, 3, NULL, NULL, NULL, 1),
(61, NULL, 4, NULL, NULL, NULL, 1),
(62, NULL, 5, NULL, NULL, NULL, 1),
(63, NULL, 6, NULL, NULL, NULL, 1),
(64, NULL, 7, NULL, NULL, NULL, 1),
(65, NULL, 8, NULL, NULL, NULL, 1),
(66, NULL, 9, NULL, NULL, NULL, 1),
(67, NULL, 10, NULL, NULL, NULL, 1),
(68, NULL, 11, NULL, NULL, NULL, 1),
(69, NULL, 12, NULL, NULL, NULL, 1),
(70, NULL, 13, NULL, NULL, NULL, 1),
(71, NULL, 14, NULL, NULL, NULL, 1),
(72, NULL, 15, NULL, NULL, NULL, 1),
(73, NULL, 16, NULL, NULL, NULL, 1),
(74, NULL, 17, NULL, NULL, NULL, 1),
(75, NULL, 18, NULL, NULL, NULL, 1),
(76, NULL, 19, NULL, NULL, NULL, 1),
(77, NULL, 20, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artigo`
--

CREATE TABLE `artigo` (
  `idArtigo` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nomelongo` varchar(50) NOT NULL,
  `detalle` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prezo` decimal(4,2) NOT NULL,
  `imaxe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `artigo`
--

INSERT INTO `artigo` (`idArtigo`, `nome`, `nomelongo`, `detalle`, `prezo`, `imaxe`) VALUES
(1, 'Minions', 'Minions: El origen de Gru', 'En plena década de los 70, luciendo una gran cabellera y pantalones de campana, Gru, un muchacho de los suburbios, es un gran fan de un supergrupo de supervillanos conocido como Los 6 Viciosos.', '1.99', 'minions.jpg'),
(2, 'Jurassic World', 'Jurassic World: Dominion', 'Tercera parte de la franquicia Jurassic World. Cuatro años después de la destrucción de Isla Nublar, los dinosaurios ahora viven y cazan junto a los humanos en todo el mundo.', '2.99', 'jurassicWorld.jpg'),
(3, 'Lightyear', 'Lightyear', 'La historia de origen de Buzz Lightyear, el héroe que inspiró el juguete, y que nos da a conocer al legendario Guardián Espacial que acabaría contando con generaciones de fans.', '1.99', 'lightyear.jpg'),
(4, 'Top Gun', 'Top Gun: Maverick', 'Después de más de treinta años de servicio como uno de los mejores aviadores de la Armada, Pete Mitchell (Tom Cruise) está donde pertenece, empujando los límites como un valiente piloto de pruebas y esquivando el ascenso de rango que lo dejaría en tierra.\r\n\r\n', '2.99', 'topGun.jpg'),
(5, 'Doctor Strange', 'Doctor Strange en el multiverso de la locura', 'Tras los sucesos de Avengers: Juego final, el Dr. Stephen Strange continúa la busqueda de la Pierda del Tiempo. Pero un viejo amigo se convierte en enemigo ya que tratará de destruir toda vida humana dela Tierra, con ello el Dr. Strange empezará a convertirse en un ser malvado para vengarse.', '2.99', 'doctorStrange.jpg'),
(6, 'Thor', 'Thor: Love and Thunder', 'La película encuentra a Thor (Chris Hemsworth) en un viaje diferente a todo lo que ha enfrentado: Una búsqueda de la paz interior. Pero su retiro es interrumpido por un asesino galáctico conocido como Gorr el carnicero de dioses (Christian Bale), que busca la extinción de los dioses.', '1.99', 'thor.jpg'),
(7, 'Black Phone', 'Black Phone', 'Una adaptación de un cuento del Best Seller del New York Times, JOE HILL. Un sádico asesino secuestra a Finney Shaw, un chico tímido e inteligente de 13 años, y le encierra en un sótano insonorizado donde de nada sirven sus gritos.', '1.99', 'blackPhone.jpg'),
(8, 'Animales fantasticos', 'Animales fantásticos: Los secretos de Dumbledore', 'Tercera parte de la saga Animales Fantásticos y Dónde Encontrarlos que sigue las aventuras de Newt Scamander.', '1.99', 'animalesFantasticos.jpg'),
(9, 'Spider-Man', 'Spider-Man: No Way Home', 'Una continuación de Spider-Man Lejos de Casa.Por primera vez en la historia cinematográfica de Spider-Man, nuestro amigable héroe vecino está desenmascarado y ya no puede separar su vida normal de las grandes apuestas de ser un superhéroe.', '2.99', 'spiderman.jpg'),
(10, 'La ciudad perdida', 'La ciudad perdida', 'Una escritora de novelas románticas se encuentra en plan gira de promoción de su libro por todo el país. Acompañada del modelo que acapara la portada de su bestseller, la protagonista sufrirá un intento de secuestro, lo que les llevará a ambos a adentrarse en la selva para poder sobrevivir a este misterioso ataque.', '1.99', 'ciudadPerdida.jpg'),
(11, 'Morbius', 'Morbius', 'El bioquímico Michael Morbius intenta curarse a sí mismo de una rara enfermedad de la sangre, pero inadvertidamente se infecta a sí mismo con una forma de vampirismo.', '0.99', 'morbius.jpg'),
(12, 'El hombre del norte', 'El hombre del norte', 'Película sobre los vikingos que nos transporta a la Islandia del siglo X. Un joven príncipe vikingo inicia una cruzada para vengar la muerte de su padre.', '1.99', 'hombreNorte.jpg'),
(13, 'Uncharted', 'Uncharted: Fuera del mapa', 'Un descendiente del ¨explorador¨ Sir Francis Drake (o mejor dicho, habilidoso pirata a las órdenes de ¨su majestad¨) vive empeñado en encontrar el paradero de El Dorado, la legendaria ciudad cubierta totalmente de oro. La búsqueda se convierte en una dura lucha con otro cazador de tesoros. Si a todo esto le añadimos unas criaturas mutantes de extraños (e hilarantes) orígenes, ya tenemos la aventura montada.', '1.99', 'uncharted.jpg'),
(14, 'The Batman', 'The Batman', 'Cuando Enigma, un sádico asesino en serie, comienza a matar a figuras políticas clave en Gotham, Batman se ve obligado a investigar la corrupción oculta de la ciudad y cuestionar la participación de su familia.\r\n\r\n', '2.99', 'batman.jpg'),
(15, 'Memory', 'La memoria de un asesino', 'Un asesino a sueldo descubre que se ha convertido en un objetivo después de que se niega a completar un trabajo para una peligrosa organización criminal. Una nueva versión de la película belga de 2003 \'The Memory of a Killer\'.', '1.99', 'memory.jpg'),
(16, 'La cabeza de la araña', 'La cabeza de la araña', 'La historia se desarrolla en un futuro cercano donde los convictos pueden acortar sus penas ejerciendo de voluntarios para someterse a distintas pruebas médicas. Cuando uno de estos sujetos se somete a una prueba que teóricamente genera grandes sentimientos de amor, éste comenzará a cuestionarse el mundo que le rodea e incluso la verdad sobre sus emociones.\r\n\r\n', '0.99', 'cabezaAraña.jpg'),
(17, 'Encanto', 'Encanto', 'Una joven colombiana tiene que afrontar la frustración de ser el único miembro de su familia sin poderes mágicos.\r\n\r\n', '0.99', 'encanto.jpg'),
(18, 'Moonfall', 'Moonfall', 'La Luna. Controla nuestras noches, nuestros días, las estaciones y las mareas del océano. Y desde el principio de la humanidad, sus fases han sido un símbolo de iluminación, de conocimiento interior y de nuestra propia inmortalidad. Hasta ahora. De repente y sin previo aviso, una fuerza misteriosa saca a la Luna de su órbita alrededor de la Tierra y la envía a toda velocidad en curso de colisión con la vida tal y como la conocemos.\r\n\r\n', '0.99', 'moonfall.jpg'),
(19, 'Interceptor', 'Interceptor', 'Cuando se lanzan 16 misiles nucleares en los EE. UU. Y un ataque violento amenaza simultáneamente su estación interceptora de misiles remota, un teniente del ejército debe utilizar su entrenamiento táctico y experiencia militar para salvar a la humanidad.\r\n\r\n', '1.99', 'interceptor.jpg'),
(20, 'Tipos malos', 'Los tipos malos', 'Cuenta la historia de cinco famosos delincuentes que tratan de realizar su empresa más complicada hasta la fecha: portarse bien. Se basa en los libros ilustrado homónimos de Aaron Blabey.\r\n\r\n', '0.99', 'tiposMalos.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codCliente` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `apelidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codCliente`, `nome`, `apelidos`, `email`) VALUES
(1, 'Xoán', 'Álvarez Amoeiro', 'xoanalvarez@mail.com'),
(2, 'Lucía', 'Costa Fernández', 'luciabarros@mail.com'),
(3, 'Antón', 'Castro Faxín', 'antoncastro@mail.com'),
(4, 'María', 'López Ramos', 'marialopez@mail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aluga`
--
ALTER TABLE `aluga`
  ADD PRIMARY KEY (`idAluga`),
  ADD KEY `FK_idArtigo` (`idArtigo`),
  ADD KEY `FK_codCliente` (`codCliente`) USING BTREE;

--
-- Indices de la tabla `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`idArtigo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aluga`
--
ALTER TABLE `aluga`
  MODIFY `idAluga` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `artigo`
--
ALTER TABLE `artigo`
  MODIFY `idArtigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codCliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aluga`
--
ALTER TABLE `aluga`
  ADD CONSTRAINT `aluga_ibfk_3` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codCliente`),
  ADD CONSTRAINT `aluga_ibfk_4` FOREIGN KEY (`idArtigo`) REFERENCES `artigo` (`idArtigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
