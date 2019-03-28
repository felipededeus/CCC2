-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Out-2018 às 16:40
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idaluno` int(6) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `snome` varchar(150) NOT NULL,
  `nomeresp` varchar(220) NOT NULL,
  `teleresp` int(12) NOT NULL,
  `dtnasc` date NOT NULL,
  `sexo` int(11) DEFAULT NULL,
  `matriescol` int(11) DEFAULT NULL,
  `emailresp` varchar(100) NOT NULL,
  `cgm` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idaluno`, `nome`, `snome`, `nomeresp`, `teleresp`, `dtnasc`, `sexo`, `matriescol`, `emailresp`, `cgm`) VALUES
(1, 'Igor', 'Nóbrega Paz', 'Rose', 0, '2001-02-27', 1, 0, 'felipeamadodedeus@gmail.com', 45645456),
(6, 'Alessandra', 'Genocidio', 'thisisolyatest', 0, '2018-10-04', 0, 2147483647, 'hehehe@hehe.com', 64654654),
(7, 'Bruno', 'Henrique Lemes', 'hhhhh', 0, '2018-10-02', 1, 2147483647, 'hehehe@hehe.com', 98798798),
(8, 'Denner', 'Domingues', 'hhh', 0, '2018-10-02', 1, 2147483647, 'hehehe@hehe.com', 87687687),
(9, 'Djessica', 'Guliana', 'jkjlkjlkj', 0, '0005-03-06', 0, 2147483647, 'hehehe@hehe.com', 65465465),
(10, 'Emily', 'não lembro', 'Rose', 0, '3223-03-31', 0, 2147483647, 'hehehe@hehe.com', 65465465),
(11, 'Felipe', 'Lacerda Amado de Deus', 'thisisolyatest', 0, '2001-02-27', 1, 2147483647, 'hehehe@hehe.com', 65465465),
(12, 'Henrique', 'Iaschjowokdje', 'sla', 0, '0003-05-22', 1, 2147483647, 'hehehe@hehe.com', 35465465),
(13, 'Gustavo ', 'Berto', 'hgjhg', 0, '4654-05-06', 1, 2147483647, 'hehehe@hehe.com', 65465465),
(14, 'Gustavo', 'Vi las Booolas', 'sla', 0, '8888-12-31', 1, 2147483647, 'hehehe@hehe.com', 46546546),
(15, 'Kalize', 'Dressler', 'sla', 0, '0005-05-06', 0, 564654654, 'hehehe@hehe.com', 65465465);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idaluno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idaluno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
