-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jan-2023 às 19:38
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbsir2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aboutme`
--

CREATE TABLE `aboutme` (
  `id` int(11) NOT NULL,
  `description` varchar(800) NOT NULL,
  `filename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aboutme`
--

INSERT INTO `aboutme` (`id`, `description`, `filename`) VALUES
(2, 'ola2', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `social` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `social`, `location`) VALUES
(1, '912909140', 'diogoandrade16@gmail.com', 'facebook', 'Braga');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactsform`
--

CREATE TABLE `contactsform` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `schoolname` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `education`
--

INSERT INTO `education` (`id`, `schoolname`, `date`, `coursename`, `location`, `filename`) VALUES
(1, 'ipvc', '2020-2023', 'enginner', 'Braga', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `jobname` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `filename` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `experience`
--

INSERT INTO `experience` (`id`, `jobname`, `date`, `companyname`, `location`, `filename`) VALUES
(8, 'engineer', '2020-2023', 'emdep', 'Lisboa', ''),
(9, 'engineer', '2020-2022', 'emdep', 'Viana', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `projectname` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `projects`
--

INSERT INTO `projects` (`id`, `filename`, `projectname`, `description`) VALUES
(1, '', 'trabalho sir', 'ola2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `skillslanguages`
--

CREATE TABLE `skillslanguages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `type` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `skillslanguages`
--

INSERT INTO `skillslanguages` (`id`, `name`, `level`, `type`) VALUES
(4, 'english', 91, 1),
(5, 'holland', 28, 1),
(6, 'c#', 90, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(0, 'adminteste123', '', 1),
(1, 'admin', '$2y$10$KEguNjbFiZswlVSjuWWAaOkVjABWfAeu0OWh1omabKFtyK7n2TUza', 1),
(9, 'filipeadmin', '', 1),
(11, 'ratomanager', '$2y$10$LpH0vmSY1V3OrsgSNIjmiOULdpfkf42C86qCoxrkZRxCjZore1ceC', 0),
(12, 'diogoadmin', '', 1),
(16, 'guiadmin', '$2y$10$M1YhUHBvbE617MVTYItQd.M3jmH6lutAfh2xuCsHYMMNoRtoOI9sK', 1),
(17, 'nelson', '$2y$10$KtKdPSssFW7yVT6beM8YCu4an/r4Og9M0xspObldKMXqtrQ.nyRW6', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aboutme`
--
ALTER TABLE `aboutme`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contactsform`
--
ALTER TABLE `contactsform`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `skillslanguages`
--
ALTER TABLE `skillslanguages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aboutme`
--
ALTER TABLE `aboutme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contactsform`
--
ALTER TABLE `contactsform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `skillslanguages`
--
ALTER TABLE `skillslanguages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
