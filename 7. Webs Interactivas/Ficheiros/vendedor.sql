

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
-- Estrutura da táboa `vendedor`
--

CREATE TABLE `vendedor` (
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A extraer os datos da táboa `vendedor`
--

INSERT INTO `vendedor` (`nome`, `email`) VALUES
('eva', 'eva@gmail.com]'),
('Nacho', 'nacho@iessanclemente.net'),
('Xan', 'xan@iessanclemente.net');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
