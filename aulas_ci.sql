-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 28/07/2016 às 20:18
-- Versão do servidor: 5.5.50-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `aulas_ci`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Fazendo dump de dados para tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `login`, `password`) VALUES
(12, 'Johnny Deep', 'jd@john.com', 'john', '202cb962ac59075b964b07152d234b70'),
(13, 'Paul Mccartney', 'paul@thebeatles.com', 'paulmc', '202cb962ac59075b964b07152d234b70'),
(14, 'Michael Jackson', 'mj@jackson.com', 'mc', '202cb962ac59075b964b07152d234b70'),
(15, 'Avril Lavigne', 'avril@lavigne.com', 'avril_sk8_no_more', '202cb962ac59075b964b07152d234b70'),
(16, 'Britney Spears', 'britney@bs.com', 'britney_s', '289dff07669d7a23de0ef88d2f7129e7');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
