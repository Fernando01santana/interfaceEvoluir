-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2020 às 10:43
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id_curriculo` int(33) NOT NULL,
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
  `telefone2` int(30) NOT NULL,
  `cep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `id_curriculo`, `nome`, `senha`, `sexo`, `cpf`, `data_nascimento`, `estado`, `estado_civil`, `cidade`, `rua`, `numero`, `bairro`, `email`, `telefone1`, `telefone2`, `cep`) VALUES
(0, 0, 'Fernando santana santos', '123', '0', 8732611, '', 'CE', '0', 'Juazeiro do Norte', 'Rua Domingos Sávio', 231, 'Pio XII', 'cool.fernando23@gmail.com', 2147483647, 2147483647, '63150000'),
(14, 0, 'Fernando Santna Santos', '123', 'M', 76982, '2001-06-17', 'CE', 'S', 'Juazeiro do Norte', 'Rua Domingos Sávio', 374, 'Pio XII', 'minions@gmail.com', 222, 12312312, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE `candidato` (
  `id` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculos`
--

CREATE TABLE `curriculos` (
  `id` int(11) NOT NULL,
  `id_aluno` int(33) NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `entidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `ano_conclusao` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `idioma` varchar(255) NOT NULL,
  `nivel_idioma` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `entidade_curso` varchar(255) NOT NULL,
  `data_inicio_curso` varchar(255) NOT NULL,
  `data_termino_curso` varchar(255) NOT NULL,
  `emrpesa` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `data_inicio_emrpesa` varchar(255) NOT NULL,
  `data_termino_empresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curriculos`
--

INSERT INTO `curriculos` (`id`, `id_aluno`, `nivel`, `entidade`, `estado`, `ano_conclusao`, `periodo`, `idioma`, `nivel_idioma`, `curso`, `entidade_curso`, `data_inicio_curso`, `data_termino_curso`, `emrpesa`, `cargo`, `data_inicio_emrpesa`, `data_termino_empresa`) VALUES
(1, 14, '', '', '', '', '', '', '', '[\"informatica\"]', '[\"Evoluir\"]', '[\"2020-10-14\"]', '[\"2020-10-14\"]', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `objetivo` varchar(200) NOT NULL,
  `tipo_empresa` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `cnpj`, `estado`, `objetivo`, `tipo_empresa`, `senha`, `email`) VALUES
(6, 'Fernando Santana Souza', '00000000000000', '0', 'Abetura de Oportunidade para Aprendiz', '0', '123', 'teste@teste.com');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `requisitos` varchar(255) NOT NULL,
  `horario` datetime NOT NULL,
  `idade` int(10) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `salario` decimal(6,2) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `contato` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `id_empresa`, `nome`, `descricao`, `requisitos`, `horario`, `idade`, `tipo`, `salario`, `empresa`, `contato`) VALUES
(5, 6, 'Atendente de caixa', 'Deve ter excelentes habilidades de comunicação oral e escrita e ser capaz de organizar seu trabalho usando ferramentas, como o MS Excel. Se também tiver experiência anterior na função e familiaridade em nosso setor, gostaríamos de conhecer você.', '[\"Curso preparatorio de prostitui\\u00e7\\u00e3o\",\"Curso de informatica basica\",\"informatica basica\"]', '2020-11-26 00:00:00', 18, 'Estágio', '99.99', 'Evoluir', '88996658820'),
(6, 6, 'Atendente de caixa', 'Deve ter excelentes habilidades de comunicação oral e escrita e ser capaz de organizar seu trabalho usando ferramentas, como o MS Excel. Se também tiver experiência anterior na função e familiaridade em nosso setor, gostaríamos de conhecer você.', '[\"Curso preparatorio de prostitui\\u00e7\\u00e3o\",\"Curso de informatica basica\",\"informatica basica\"]', '2020-11-26 00:00:00', 18, 'Estágio', '99.99', 'Evoluir', '88996658820'),
(7, 6, 'Atendente de telemarketing', 'Deve ter excelentes habilidades de comunicação oral e escrita e ser capaz de organizar seu trabalho usando ferramentas, como o MS Excel. Se também tiver experiência anterior na função e familiaridade em nosso setor, gostaríamos de conhecer você.', '[\"informatica basica\",\"No\\u00e7\\u00f5es basicas de informatica\"]', '2020-11-18 00:00:00', 18, 'Estágio', '99.99', 'Evoluir', '88996658820'),
(8, 6, 'Atendente de telemarketing', 'Deve ter excelentes habilidades de comunicação oral e escrita e ser capaz de organizar seu trabalho usando ferramentas, como o MS Excel. Se também tiver experiência anterior na função e familiaridade em nosso setor, gostaríamos de conhecer você.', '[\"informatica basica\",\"No\\u00e7\\u00f5es basicas de informatica\",\"Corel\"]', '2020-11-27 00:00:00', 18, 'Estágio', '99.99', 'Evoluir', '88996658820');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_PesCarro` (`id_vaga`);

--
-- Índices para tabela `curriculos`
--
ALTER TABLE `curriculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Curriculos` (`id_aluno`);

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
-- Índices para tabela `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `curriculos`
--
ALTER TABLE `curriculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `escola`
--
ALTER TABLE `escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `candidato`
--
ALTER TABLE `candidato`
  ADD CONSTRAINT `fk_PesCarro` FOREIGN KEY (`id_vaga`) REFERENCES `vagas` (`id`);

--
-- Limitadores para a tabela `curriculos`
--
ALTER TABLE `curriculos`
  ADD CONSTRAINT `fk_Curriculos` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id`);

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
