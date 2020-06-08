-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Out-2017 às 22:03
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estagio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `textoaluno`
--

CREATE TABLE `textoaluno` (
  `id_textoA` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `resumo` varchar(600) NOT NULL,
  `arquivo` text NOT NULL,
  `nomeA` varchar(50) NOT NULL,
  `aluno` tinyint(1) NOT NULL,
  `idP` int(11) NOT NULL,
  `idM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `textoaluno`
--

INSERT INTO `textoaluno` (`id_textoA`, `nome`, `resumo`, `arquivo`, `nomeA`, `aluno`, `idP`, `idM`) VALUES
(1, 'Teste', 'Qwert', 'upload/5/Aluno/17558180767.pdf', 'Eu', 1, 5, 0),
(2, 'SÃ³ vai e volta', 'Deve ta uma bosta', 'upload/14/Aluno/Consulta .pdf', '', 1, 14, 0),
(3, 'Muita Coisa', 'Pode ler, eu deixo', 'upload/14/Aluno/17558180767.pdf', 'SÃ³ Deus sabe', 1, 14, 0),
(4, 'SÃ³ vai 2', 'Um, dois, trÃªs ', 'upload/14/Aluno/Consulta .pdf', 'Bla', 0, 14, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `textoaluno`
--
ALTER TABLE `textoaluno`
  ADD PRIMARY KEY (`id_textoA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `textoaluno`
--
ALTER TABLE `textoaluno`
  MODIFY `id_textoA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
