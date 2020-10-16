-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Set-2020 às 14:53
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curriculos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `cpf` int(20) NOT NULL,
  `data_nascimento` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `estado_civil` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(10) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefone1` int(30) NOT NULL,
  `telefone2` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `senha`, `sexo`, `cpf`, `data_nascimento`, `estado`, `estado_civil`, `cidade`, `rua`, `numero`, `bairro`, `email`, `telefone1`, `telefone2`) VALUES
(13, 'Fernando Santana Santos', '010102', 'M', 8732611, '2001-06-17', 'CE', 'S', 'Juazeiro do Norte', 'Rua Domingos Sávio', 231, 'Pio XII', 'cool.fernando23@gmail.com', 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipoPessoa` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `objetivo` varchar(200) NOT NULL,
  `tipo_empresa` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE `escola` (
  `id` int(11) NOT NULL,
  `nome_instituicao` varchar(255) NOT NULL,
  `nivel_instituicao` varchar(255) NOT NULL,
  `curso_autorizado` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `nome_contato` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `tipo_contato` varchar(255) NOT NULL,
  `ddd` int(10) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cargo_contato` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fone` varchar(14) NOT NULL,
  `ramal` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `escola`
--
ALTER TABLE `escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
