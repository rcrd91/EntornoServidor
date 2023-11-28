-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Xerado en: 14 de Mar de 2023 ás 17:24
-- Versión do servidor: 8.0.28
-- Versión do PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proba`
--

-- --------------------------------------------------------

--
-- Estrutura da táboa `cliente`
--

CREATE TABLE `clientes` (
  `codcliente` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `apelidos` varchar(45) DEFAULT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A extraer os datos da táboa `clientes`
--

INSERT INTO `clientes` (`codCliente`, `nome`, `apelidos`, `email`) VALUES
(1, 'Eva', 'García', 'eva@gmail.com'),
(2, 'Xan', 'Xiao', 'xiao@gmail.com'),
(3, 'María', 'Pérez', 'maria@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
