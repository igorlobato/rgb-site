-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/10/2023 às 23:32
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
(1, 25, 'Usuario de Teste', '        teste', '22/01/2023', '17:17:59'),
(2, 26, 'Usuario de Teste', '        aaiaia', '23/01/2023', '21:09:47'),
(3, 26, 'Usuario de Teste', '        cccccc', '23/01/2023', '21:10:44'),
(4, 26, 'Usuario de Teste', '        aaaaaaa', '23/01/2023', '21:10:47'),
(5, 26, 'Usuario de Teste', '        kkkkkkkkkk', '23/01/2023', '21:10:51'),
(6, 1, 'Usuario de Teste2', '        Qualquer coisa', '26/01/2023', '22:15:01'),
(7, 1, 'Usuario de Teste2', '        Nehuma coisa', '26/01/2023', '22:15:08'),
(8, 1, 'Usuario de Teste2', '        Nehuma coisa', '26/01/2023', '22:15:26'),
(9, 33, 'Usuario de Teste2', '        Tá tudo bugado kkkkkkkk', '26/01/2023', '22:46:57'),
(10, 40, 'eu', '        Que demais', '27/01/2023', '12:45:22'),
(11, 42, 'Usuario de Teste2', '        Não faço ideia meu nobre.', '27/01/2023', '13:01:30'),
(12, 44, 'oi', '        Agora é comprar uma casa nova.', '27/01/2023', '13:10:13'),
(13, 44, 'oi', '        Agora é comprar uma casa nova.', '27/01/2023', '13:10:21'),
(14, 43, 'oi', '        Vende no mercado livre.', '27/01/2023', '13:10:51'),
(15, 42, 'eu', '        Testando', '20/09/2023', '15:47:19'),
(16, 48, 'eu', '        kkkkkkkkkk', '26/09/2023', '12:49:59'),
(17, 44, 'eu', '        duplica?', '26/09/2023', '14:00:19'),
(18, 42, 'eu', 'eita\r\nk\r\n', '18/10/2023', '17:09:21');

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
(2, 25),
(3, 25),
(4, 25),
(5, 25),
(6, 25),
(7, 26),
(8, 26),
(9, 26),
(10, 17),
(11, 1),
(12, 33),
(13, 35),
(14, 39),
(15, 40),
(16, 36),
(17, 42),
(18, 44),
(19, 43),
(20, 42),
(21, 44),
(22, 44),
(23, 44),
(24, 48),
(25, 43),
(26, 49);

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
(46, 'gt 710', 'top demais kkkk', 'imagens/uploads/', '26/09/2023', '12:22:12', 'eu', 'Geforce'),
(48, 'teste', 'foto menor', 'imagens/uploads/592538.jpg', '26/09/2023', '12:49:42', 'eu', 'Intel'),
(49, 'teste sem foto', 'uiui', 'imagens/uploads/', '26/09/2023', '14:06:14', 'eu', 'Software');

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
(20, '', 'oi', '', 0, ''),
(22, 'bam', 'bambam@bam.com', 'bam', 0, 'imagens/fotosdeperfil/bam.jpg'),
(23, 'igor', 'igor_stm@yahoo.com.br', 'igor', 0, ''),
(24, '', '', '', 0, ''),
(25, 'oi', 'oi@oi.com', 'oi', 0, 'imagens/fotosdeperfil/oi.jpg');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `curtidas`
--
ALTER TABLE `curtidas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
