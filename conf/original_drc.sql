-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Dez-2022 às 21:01
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `drc`
--

-- create database (run only once)

CREATE DATABASE drc;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atleta`
--

CREATE TABLE `atleta` (
  `id_utilizador` varchar(120) NOT NULL,
  `posicao` varchar(120) NOT NULL,
  `minutos_jogo` varchar(120) NOT NULL,
  `nº_jogos_epoca` int(120) NOT NULL,
  `pontuacao_epoca` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `competicao`
--

CREATE TABLE `competicao` (
  `nome` varchar(120) NOT NULL,
  `categoria` varchar(120) NOT NULL,
  `epoca` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomenda`
--

CREATE TABLE `encomenda` (
  `id_utilizador` varchar(120) NOT NULL,
  `data` date NOT NULL,
  `valor_final` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipa`
--

CREATE TABLE `equipa` (
  `Nome` varchar(120) NOT NULL,
  `Cidade` varchar(120) NOT NULL,
  `Morada` varchar(120) NOT NULL,
  `Telefone` int(9) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Foto(emblema)` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipa_competicao`
--

CREATE TABLE `equipa_competicao` (
  `id_equipa` varchar(120) NOT NULL,
  `id_competicao` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE `jogo` (
  `adversario_equipa` varchar(120) NOT NULL,
  `local` varchar(120) NOT NULL,
  `data` date NOT NULL,
  `hora` time(6) NOT NULL,
  `resultado_final` varchar(120) NOT NULL,
  `competicao` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `ut_user` varchar(50) NOT NULL,
  `ut_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`ut_user`, `ut_pass`) VALUES
('tiago', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` varchar(120) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `preco` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_encomenda`
--

CREATE TABLE `produto_encomenda` (
  `id_produto` varchar(120) NOT NULL,
  `id_encomenda` varchar(120) NOT NULL,
  `quantidade` int(120) NOT NULL,
  `tamanho` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registo`
--

CREATE TABLE `registo` (
  `ut_user` varchar(50) NOT NULL,
  `ut_pass` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nif` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registo`
--

INSERT INTO `registo` (`ut_user`, `ut_pass`, `Email`, `Nif`) VALUES
('tiago', '123', 'tiagomcafigueiredo@gmail.com', 123456789);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `ut_user` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ut_pass` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Email` varchar(120) NOT NULL,
  `Nif` int(9) NOT NULL,
  `Socio` tinyint(1) NOT NULL,
  `Dirigente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`ut_user`, `ut_pass`, `Email`, `Nif`, `Socio`, `Dirigente`) VALUES
('diogo', '147', 'd@gmail.com', 156423789, 14, 21),
('tiago', '123', 'tf@gmail.com', 13456789, 125, 30);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atleta`
--
ALTER TABLE `atleta`
  ADD PRIMARY KEY (`id_utilizador`);

--
-- Índices para tabela `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`adversario_equipa`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ut_user`);

--
-- Índices para tabela `registo`
--
ALTER TABLE `registo`
  ADD PRIMARY KEY (`ut_user`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`ut_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
