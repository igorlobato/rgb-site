-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09/09/2024 às 00:14
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `Comentarios`
--

CREATE TABLE `Comentarios` (
  `id` int(20) NOT NULL,
  `id_post` int(100) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `data` varchar(200) NOT NULL,
  `hora` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `Comentarios`
--

INSERT INTO `Comentarios` (`id`, `id_post`, `nome`, `comentario`, `data`, `hora`) VALUES
(12, 1, 'igor', 'teste', 'agora', 'nao'),
(13, 42, 'eita', 'funfa', 'hoje', 'agora'),
(25, 1, 'Nome do Usuário', 'Eita', 'dataFormatada', 'horaFormatada'),
(26, 42, 'Nome do Usuário', 'Qual o bug da vez?', 'dataFormatada', 'horaFormatada'),
(27, 1, 'Nome do Usuário', 'Será que agora foi?', 'dataFormatada', 'horaFormatada'),
(28, 43, 'Nome do Usuário', 'Que felicidade', 'dataFormatada', 'horaFormatada'),
(29, 53, 'Nome do Usuário', 'Testando o último aqui', 'dataFormatada', 'horaFormatada'),
(30, 52, 'Nome do Usuário', 'Teste do penúltimo', 'dataFormatada', 'horaFormatada'),
(31, 42, 'Eita', 'kkkkkkk', '2024-08-17', '21:06:24'),
(32, 42, 'igor', 'Teste', '17-08-2024', '16:15:59'),
(33, 42, 'igor', 'aaaa', '17-08-2024', '16:16:55'),
(34, 42, 'igor', 'Attatate', '17-08-2024', '16:20:28'),
(35, 42, 'igor', 'teste java', '17-08-2024', '16:22:43'),
(36, 42, 'igor', 'Foi?', '17-08-2024', '16:22:55'),
(37, 42, 'igor', 'Teste direto', '17-08-2024', '16:23:36'),
(38, 42, 'b', 'comentario', '17-08-2024', '16:58:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Curtidas`
--

CREATE TABLE `Curtidas` (
  `id` int(20) NOT NULL,
  `id_post` int(100) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `Curtidas`
--

INSERT INTO `Curtidas` (`id`, `id_post`, `id_usuario`) VALUES
(1, 17, NULL),
(2, 1, NULL),
(26, 49, NULL),
(27, 49, NULL),
(28, 49, NULL),
(29, 49, NULL),
(30, 49, NULL),
(31, 0, NULL),
(32, 42, NULL),
(33, 17, NULL),
(34, 17, NULL),
(35, 42, 37),
(36, 43, 37),
(37, 44, 37),
(38, 89, 37),
(39, 90, 37),
(40, 92, 37),
(41, 42, 52);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Posts`
--

CREATE TABLE `Posts` (
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
-- Despejando dados para a tabela `Posts`
--

INSERT INTO `Posts` (`id`, `titulo`, `descricao`, `imagem`, `data`, `hora`, `postador`, `topico`) VALUES
(42, 'Como colocar mais ram no pc?', 'Titulo auto-explicativo', 'imagens/uploads/2016-07-19-memoria-ram-1.webp', '27/01/2023', '13:01:14', 'Usuario de Teste2', 'Hardware'),
(43, 'Comprei o processador pra placa mãe errada e agora?', 'Esqueci de ver na hora.', 'imagens/uploads/download.jfif', '27/01/2023', '13:08:15', 'Usuario de Teste2', 'Intel'),
(44, 'Eu já sabia que Amd esquentava, mas isso é passar dos limites', 'Tocou fogo na casa.', 'imagens/uploads/vga-esquentando.jpg', '27/01/2023', '13:09:32', 'Usuario de Teste2', 'Radeon'),
(89, 'Teste sem foto', 'aaaaaaaaaa', '', '16/08/2024', '21:35:09', 'oi', 'Outros'),
(90, 'teste sem foto de novo', 'aaa', '', '16/08/2024', '21:42:47', 'oi', 'Geforce'),
(92, 'Teste com foto aaa', 'aaa', 'imagens/uploads/logo', '16/08/2024', '21:44:08', 'oi', 'Intel'),
(93, 'intel faliu', 'intel quebrou', 'imagens/uploads/logo', '17/08/2024', '17:01:04', 'b', 'Intel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `adm` tinyint(1) NOT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `nome`, `email`, `senha`, `adm`, `foto`) VALUES
(37, 'igor', 'igor_stm@yahoo.com.br', '1234', 1, 'imagens/fotosdeperfil/37.jpg'),
(38, 'oi', 'oi@oi.com', 'oi', 0, 'imagens/fotosdeperfil/38.jpg'),
(43, 'a', 'a@aa', 'a', 0, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Curtidas`
--
ALTER TABLE `Curtidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Comentarios`
--
ALTER TABLE `Comentarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `Curtidas`
--
ALTER TABLE `Curtidas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `Posts`
--
ALTER TABLE `Posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de tabela `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
