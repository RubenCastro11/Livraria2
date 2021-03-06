-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jan-2021 às 16:21
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livraria2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nacionalidade` varchar(20) DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `fotografia` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autores`
--

INSERT INTO `autores` (`id_autor`, `nome`, `nacionalidade`, `data_nascimento`, `fotografia`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Luis Borges Gouveia', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(2, 'João Ranito', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(4, 'Paulo Rurato', 'Português', NULL, NULL, NULL, NULL, NULL),
(5, 'Sofia Gaio', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(6, 'Rui Moreira', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(7, 'Margarida Bairrão', 'Português', NULL, NULL, NULL, NULL, NULL),
(8, 'Judite Gonçalves de Freitas', 'Português', NULL, NULL, NULL, NULL, NULL),
(9, 'António Borges Regedor', 'Português', NULL, NULL, NULL, NULL, NULL),
(10, 'José Dias Coelho', 'Português', NULL, NULL, NULL, NULL, NULL),
(11, 'Paula Moura', 'Português', NULL, NULL, NULL, NULL, NULL),
(12, 'Luis Cunha', 'Português', NULL, NULL, NULL, NULL, NULL),
(13, 'Pereira Alfredo', 'Angolano', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores_livros`
--

CREATE TABLE `autores_livros` (
  `id_al` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autores_livros`
--

INSERT INTO `autores_livros` (`id_al`, `id_autor`, `id_livro`, `updated_at`, `created_at`) VALUES
(1, 1, 16, '2020-12-04 15:16:29', '2020-12-04 15:16:29'),
(2, 2, 16, '2020-12-04 15:16:29', '2020-12-04 15:16:29'),
(3, 3, 16, '2020-12-04 15:16:29', '2020-12-04 15:16:29'),
(4, 4, 15, '2020-12-04 16:01:56', '2020-12-04 16:01:56'),
(6, 2, 3, '2020-12-04 16:23:29', '2020-12-04 16:23:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicoes`
--

CREATE TABLE `edicoes` (
  `id_livro` int(11) NOT NULL,
  `id_editora` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras`
--

CREATE TABLE `editoras` (
  `id_editora` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `editoras`
--

INSERT INTO `editoras` (`id_editora`, `nome`, `morada`, `observacoes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SPI-Principia', '', NULL, NULL, NULL, NULL),
(2, 'Edições Universidade Fernando Pessoa', '', NULL, NULL, NULL, NULL),
(3, 'Edições GestKnowing', '', NULL, NULL, NULL, NULL),
(4, 'VDM - Verlag Dr. Muller', '', NULL, NULL, NULL, NULL),
(5, 'Sílabo', '', NULL, NULL, NULL, NULL),
(6, 'Green Lines Instituto', '', NULL, NULL, NULL, NULL),
(7, 'Lambert Academic Publishing', '', NULL, NULL, NULL, NULL),
(8, 'Kwigia editora', '', NULL, NULL, NULL, NULL),
(9, 'hhhh', NULL, NULL, '2020-12-04 17:08:48', '2020-12-04 17:08:48', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras_livros`
--

CREATE TABLE `editoras_livros` (
  `id_editora` int(11) NOT NULL,
  `id_livro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `designacao` varchar(30) NOT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id_genero`, `designacao`, `observacoes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Memórias e Testemunhos', NULL, NULL, NULL, NULL),
(2, 'Direito Civil ', NULL, NULL, NULL, NULL),
(3, 'Culinária', NULL, NULL, NULL, NULL),
(4, 'Romance', NULL, NULL, NULL, NULL),
(5, 'Policial e Thriller', NULL, NULL, NULL, NULL),
(6, 'pafdf', 'fgggggg', '2020-11-27 15:35:03', '2020-11-27 15:35:03', NULL),
(7, 'pafdf', 'fgggggg', '2020-11-27 15:35:27', '2020-11-27 15:35:27', NULL),
(8, 'nnmnn', 'nnn', '2020-12-04 16:53:53', '2020-12-04 16:53:53', NULL),
(9, 'nnmnn', 'nnn', '2020-12-04 16:54:04', '2020-12-04 16:54:04', NULL),
(10, 'nnmnn', 'nnn', '2020-12-04 16:54:34', '2020-12-04 16:54:34', NULL),
(11, 'gfggg', 'ggg', '2020-12-17 13:49:28', '2020-12-17 13:49:28', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `idioma` varchar(10) NOT NULL,
  `total_paginas` int(11) DEFAULT NULL,
  `data_edicao` datetime DEFAULT NULL,
  `isbn` varchar(13) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `imagem_capa` varchar(255) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `sinopse` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `excerto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `idioma`, `total_paginas`, `data_edicao`, `isbn`, `observacoes`, `imagem_capa`, `id_genero`, `id_autor`, `sinopse`, `created_at`, `updated_at`, `deleted_at`, `id_user`, `excerto`) VALUES
(1, 'sistema de informação de apoio a gestão', 'Português', NULL, NULL, '1234567890123', NULL, NULL, 1, 1, NULL, NULL, '2020-11-27 16:14:04', NULL, 0, ''),
(2, 'cidades e regiões digitais:impacte na cidade e nas pessoas', 'Portugês', NULL, NULL, '9728830033111', NULL, '1610031710_Tulips.jpg', 2, 1, NULL, NULL, '2021-01-07 15:01:50', NULL, 0, ''),
(5, 'Sociedade da Informação: balanço e implicações', 'Português', NULL, NULL, '9789728830182', NULL, 'C:\\xampp\\tmp\\php7EF3.tmp', 3, 7, NULL, NULL, '2021-01-07 14:19:30', NULL, 0, ''),
(6, 'O Tribunal de Contas e as Autarquias Locais', 'Portugês', NULL, NULL, '9789899936614', NULL, NULL, 2, 7, NULL, NULL, NULL, NULL, 0, ''),
(7, 'Informática e Competências Tecnológicas para a Sociedade da Informação 2ed', 'Português', NULL, NULL, '9789728830304', NULL, NULL, 2, 8, NULL, NULL, NULL, NULL, 0, ''),
(8, 'Negócio Eletrónico - conceitos e perspetivas de desenvolvimento', 'Português', NULL, NULL, '9789899552258', NULL, NULL, 1, 8, NULL, NULL, NULL, NULL, 0, ''),
(9, 'Gestão da Informação na Biblioteca Escolar', 'Português', NULL, NULL, '9789722314916', NULL, NULL, 1, 9, NULL, NULL, NULL, NULL, 0, ''),
(10, 'A virtual environment to share knowledge', 'Inglês', NULL, NULL, '9781351729901', NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, 0, ''),
(11, 'Ciência da Informação: contributos para o seu estudo', 'Português', NULL, NULL, '9789896430900', NULL, NULL, 1, 4, NULL, NULL, NULL, NULL, 0, ''),
(12, 'Repensar a Sociedade da Informação e do Conhecimento no Início do Século XXI', 'Português', NULL, NULL, '9789726186953', NULL, NULL, 3, 4, NULL, NULL, NULL, NULL, 0, ''),
(13, 'Gestão da Informação em Museus: uma contribuição para o seu estudo', 'Português', NULL, NULL, '9789899901394', NULL, NULL, 2, 4, NULL, NULL, NULL, NULL, 0, ''),
(14, 'Web 2.0 and Higher Education. A psychological perspective', 'Inglês', NULL, NULL, '9783659683466', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 0, ''),
(17, 'fhh', 'fdffddf', 43423, '2020-12-03 00:00:00', '1235467834524', NULL, 'hhg', NULL, NULL, NULL, '2020-12-04 17:25:06', '2020-12-04 17:25:06', NULL, 0, ''),
(18, 'fsfggff', 'ptt', 13, '2020-12-17 00:00:00', '1234567890111', NULL, NULL, NULL, NULL, NULL, '2020-12-17 13:45:01', '2020-12-17 13:45:01', NULL, NULL, ''),
(19, 'dasdsa', 'ptt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-07 10:16:16', '2021-01-07 10:16:16', NULL, 1, ''),
(20, 'dasdsa', 'ptt', 5665, '2021-01-14 00:00:00', '1234567891111', NULL, '1610027947_Koala.jpg', NULL, NULL, NULL, '2021-01-07 13:59:07', '2021-01-07 13:59:07', NULL, 1, ''),
(21, 'dasdsa', 'ptt', 5665, '2021-01-14 00:00:00', '1234567891111', NULL, '1610028151_Koala.jpg', NULL, NULL, NULL, '2021-01-07 14:02:31', '2021-01-07 14:02:31', NULL, 1, ''),
(22, 'dasdsa', 'ptt', 5665, NULL, '1234567891111', NULL, 'C:\\xampp\\tmp\\php204B.tmp', NULL, NULL, NULL, '2021-01-07 14:11:55', '2021-01-07 14:14:44', NULL, 1, ''),
(23, 'dasdsa', 'ptt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-07 14:16:29', '2021-01-07 14:16:29', NULL, 1, ''),
(24, 'dasdsa', 'ptt', NULL, NULL, NULL, NULL, '1610028996_Lighthouse.jpg', NULL, NULL, NULL, '2021-01-07 14:16:36', '2021-01-07 14:16:36', NULL, 1, ''),
(25, 'dasdsa', 'ptt', 5665, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-07 14:55:31', '2021-01-07 14:55:31', NULL, 1, NULL),
(26, 'dasdsa', 'ptt', 5665, NULL, NULL, NULL, '1610031350_Hydrangeas.jpg', NULL, NULL, NULL, '2021-01-07 14:55:40', '2021-01-07 14:55:50', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal' COMMENT 'admin ou normal',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `tipo_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Neixan', 'neixan11@gmail.com', NULL, '$2y$10$VOHyv5DUxW/NK3UDwgh9p.l/KHpKj2KVxYxSLqpXgmZ8RomU.O.Cu', 'admin', NULL, '2020-12-10 13:56:02', '2020-12-10 13:56:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `autores_livros`
--
ALTER TABLE `autores_livros`
  ADD PRIMARY KEY (`id_al`);

--
-- Indexes for table `edicoes`
--
ALTER TABLE `edicoes`
  ADD PRIMARY KEY (`id_livro`,`id_editora`);

--
-- Indexes for table `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`id_editora`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `autores_livros`
--
ALTER TABLE `autores_livros`
  MODIFY `id_al` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `editoras`
--
ALTER TABLE `editoras`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
