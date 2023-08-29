-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2023 às 16:28
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pife`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admini`
--

CREATE TABLE `admini` (
  `id` int(5) NOT NULL,
  `nome` tinytext DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `corrige`
--

CREATE TABLE `corrige` (
  `nickname` varchar(50) DEFAULT NULL,
  `codigo_erro` int(5) NOT NULL,
  `admin_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cumulativo`
--

CREATE TABLE `cumulativo` (
  `numero` int(20) NOT NULL,
  `pontuacao` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `erro`
--

CREATE TABLE `erro` (
  `codigo_erro` int(5) NOT NULL,
  `assunto` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `statuss` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `nickname` varchar(50) DEFAULT NULL,
  `pontuacao` int(7) DEFAULT NULL,
  `mao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`nickname`, `pontuacao`, `mao`) VALUES
('gustavo', 0, '105'),
('gabriel', 0, '4;8;52;91;70;30;44;6;26'),
('gabriela', 0, '13;34;49;102;39;79;84;69;72');

-- --------------------------------------------------------

--
-- Estrutura da tabela `partida`
--

CREATE TABLE `partida` (
  `nickname` varchar(204) NOT NULL,
  `duracao` int(10) DEFAULT NULL,
  `deck` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `partida`
--

INSERT INTO `partida` (`nickname`, `duracao`, `deck`) VALUES
('gustavo;gabriel;gabriela', 0, '0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;48;51;57;90;71;83;31;95;37;99;24;11;46;68;85;17;29;33;58;3;1;22;15;97;5;36;80;92;18;35;59;96;19;23;82;41;38;7;45;54;43;47;74;89;88;94;27;9;81;66;2;12;10;87;76;53;25;98;32;93;73;67;64;28;77;86;56;14;78;21;65;55;75;101;42;16;62;100;104;63;103;61;40;20;50;60');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranking`
--

CREATE TABLE `ranking` (
  `numero` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reporta`
--

CREATE TABLE `reporta` (
  `nickname` varchar(50) DEFAULT NULL,
  `codigo_erro` int(5) DEFAULT NULL,
  `Datad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `semanal`
--

CREATE TABLE `semanal` (
  `numero` int(20) NOT NULL,
  `semana` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `numero` int(5) DEFAULT NULL,
  `Nome` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(25) DEFAULT NULL,
  `pontos` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`numero`, `Nome`, `email`, `senha`, `pontos`) VALUES
(0, 'gabriela', 'gab@gmail.com', 'kpkpkp', 0),
(0, 'gustavo', 'gustavo@gmail.com', 'p@rraSit3', 0),
(0, 'matheus', 'mat@gmail.com', '1234567', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admini`
--
ALTER TABLE `admini`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `corrige`
--
ALTER TABLE `corrige`
  ADD PRIMARY KEY (`codigo_erro`);

--
-- Índices para tabela `cumulativo`
--
ALTER TABLE `cumulativo`
  ADD PRIMARY KEY (`numero`);

--
-- Índices para tabela `erro`
--
ALTER TABLE `erro`
  ADD PRIMARY KEY (`codigo_erro`);

--
-- Índices para tabela `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`nickname`);

--
-- Índices para tabela `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`numero`);

--
-- Índices para tabela `semanal`
--
ALTER TABLE `semanal`
  ADD PRIMARY KEY (`numero`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Nome`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admini`
--
ALTER TABLE `admini`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `erro`
--
ALTER TABLE `erro`
  MODIFY `codigo_erro` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
