-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/12/2023 às 00:39
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(20) NOT NULL,
  `id_post` int(100) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `data` varchar(200) NOT NULL,
  `hora` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_post`, `nome`, `comentario`, `data`, `hora`) VALUES
(12, 1, 'igor', 'teste', 'agora', 'nao'),
(13, 42, 'eita', 'funfa', 'hoje', 'agora'),
(25, 1, 'Nome do Usuário', 'Eita', 'dataFormatada', 'horaFormatada'),
(26, 42, 'Nome do Usuário', 'Qual o bug da vez?', 'dataFormatada', 'horaFormatada'),
(27, 1, 'Nome do Usuário', 'Será que agora foi?', 'dataFormatada', 'horaFormatada'),
(28, 43, 'Nome do Usuário', 'Que felicidade', 'dataFormatada', 'horaFormatada'),
(29, 53, 'Nome do Usuário', 'Testando o último aqui', 'dataFormatada', 'horaFormatada'),
(30, 52, 'Nome do Usuário', 'Teste do penúltimo', 'dataFormatada', 'horaFormatada');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curtidas`
--

CREATE TABLE `curtidas` (
  `id` int(20) NOT NULL,
  `id_post` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `curtidas`
--

INSERT INTO `curtidas` (`id`, `id_post`) VALUES
(1, 17),
(2, 1),
(26, 49),
(27, 49),
(28, 49),
(29, 49),
(30, 49),
(31, 0),
(32, 42),
(33, 17),
(34, 17);

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(20) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `data` varchar(200) DEFAULT NULL,
  `hora` varchar(200) DEFAULT NULL,
  `postador` varchar(200) DEFAULT NULL,
  `topico` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `descricao`, `imagem`, `data`, `hora`, `postador`, `topico`) VALUES
(1, 'Primeira postagem', 'Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa Qualquer coisa ', '', '04/12/2022', '18:11', 'oi', NULL),
(42, 'Como colocar mais ram no pc?', 'Titulo auto-explicativo', 'imagens/uploads/2016-07-19-memoria-ram-1.webp', '27/01/2023', '13:01:14', 'Usuario de Teste2', 'Hardware'),
(43, 'Comprei o processador pra placa mãe errada e agora?', 'Esqueci de ver na hora.', 'imagens/uploads/download.jfif', '27/01/2023', '13:08:15', 'Usuario de Teste2', 'Intel'),
(44, 'Eu já sabia que Amd esquentava, mas isso é passar dos limites', 'Tocou fogo na casa.', 'imagens/uploads/vga-esquentando.jpg', '27/01/2023', '13:09:32', 'Usuario de Teste2', 'Radeon'),
(50, 'TEste', 'tttteeeee', 'imagens/uploads/', '01/11/2023', '15:03:42', 'oi', ''),
(52, 'string', 'string', 'string', 'string', 'string', '0', 'string'),
(53, 'TesteAPI', 'descricaoAPI', '', '01/12/2023', '00:00', '1', 'API');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `adm` tinyint(1) NOT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `adm`, `foto`) VALUES
(1, 'eu', 'eu@eu.com', 'eu', 1, 'imagens/fotosdeperfil/eu.jpg'),
(26, 'nommeeee', 'emm@m.co', 'se', 1, 'dlajdlfj'),
(32, 'teste', 'igor_stm@yahoo.com.br', '123', 0, ''),
(33, 'Jarlison', 'jarlison@ufopa.edu.br', 'jarlison', 0, ''),
(34, 'oi', 'igor.oliveira@discente.ufopa.edu.br', 'oi', 0, ''),
(35, 'xablau', 'xa.com', 'xablau', 0, 'pin'),
(36, 'aa', 'oi@oi.com', 'a', 0, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `curtidas`
--
ALTER TABLE `curtidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `curtidas`
--
ALTER TABLE `curtidas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
