-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jan-2023 às 11:39
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

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
  `description` varchar(5000) NOT NULL,
  `filename` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aboutme`
--

INSERT INTO `aboutme` (`id`, `description`, `filename`) VALUES
(2, 'Hello, i\'m Diogo Andrade, i\'m 23 years old and i\'m an Informatic Engineer Student at                 Instituto Politécnico de Viana do Castelo.                                       Since I was a kid, I always liked Informatics, started playing pc games very early, searching about the                 tech world and started using                 some tech tools at a very young age.</p>                                   I had the oportunity to follow a good part of the thecnology evolution, and that fast evolotuion made me                 want to know more about informatic                 As soon as I entered Highschool, I started my informatics world jorney, as you can see on my Education.                                           Speaking about hobbies, since I was kid, I was a roller hockey goalkeeper and currently I am a                 Coach.                 I had the oportunity to win some titles, including national and european trophies, and being honored                 by the town hall for my team achievments.                 But most importantly, I got values ​​and mates that will accompany me for the rest of my life.', 'fotodiogo.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `social` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `socialref` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `social`, `location`, `socialref`) VALUES
(2, '912909140', 'diogoandrade@ipvc.pt', 'Linkedin', 'Braga', 'https://www.linkedin.com/in/diogo-andrade-0b50401a4/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactsform`
--

CREATE TABLE `contactsform` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contactsform`
--

INSERT INTO `contactsform` (`id`, `name`, `email`, `message`) VALUES
(1, 'holland', 'diogoandrade@ipvc.pt', 'ola'),
(2, 'holland', 'diogoandrade@ipvc.pt', 'ola'),
(3, 'holland', 'diogoandrade@ipvc.pt', 'ola'),
(4, 'holland', 'diogoandrade@ipvc.pt', 'ola'),
(5, 'holland', 'diogoandrade@ipvc.pt', 'ola'),
(6, 'holland', 'diogoandrade@ipvc.pt', 'ola'),
(7, 'holland', 'diogoandrade@ipvc.pt', 'osl'),
(8, 'php', 'diogoandrade@ipvc.pt', 'osl'),
(9, 'php', 'diogoandrade@ipvc.pt', 'osl'),
(10, 'deutch', 'diogomiguel1699@hotmail.com', 'ola'),
(11, 'deutch', 'diogomiguel1699@hotmail.com', 'ola'),
(12, 'deutch', 'diogomiguel1699@hotmail.com', 'ola'),
(13, 'deutch', 'diogomiguel1699@hotmail.com', 'ola'),
(14, 'deutch', 'diogomiguel1699@hotmail.com', 'ola'),
(15, 'deutch', 'diogomiguel1699@hotmail.com', 'ola');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `education`
--

INSERT INTO `education` (`id`, `schoolname`, `date`, `coursename`, `location`, `filename`) VALUES
(2, 'Instituto Politécnico De Viana Do Castelo', '2020-2023', 'Informatic Engineer', 'Viana, Portugal ', '733c3f37aad7746a5111d5573d43bc62.jpg'),
(3, 'Instituto Politécnico De Cávado e Ave', '2018 - 2020', 'Tesp - Informatic Secutiry and Network', 'Barcelos, Porgual', '70ae7306879c3449d3476c5c7b23b449.jpg'),
(4, 'Escola Secundária Sá de Miranda', '2014 - 2017', 'Highschool - Informatic Systems', 'Braga, Portugal', '638c1f686bb42cd72a58371fd9387699.png');

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
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `experience`
--

INSERT INTO `experience` (`id`, `jobname`, `date`, `companyname`, `location`, `filename`) VALUES
(2, 'Hardware Technician', 'mar 2022 - Present', 'Chip7- Half Period', 'Famalicão, Portugal', '1065e83f0e11f81c5f4362509d0b9f83.png'),
(3, 'Roller Hockey Coach', 'set 2021 - Present', 'Hoquei Clube de Braga - Half Period', 'Braga, Portugal', '1a9666006a635c07dbcac64aefc1f3d4.png'),
(4, 'Goods Flow Co-Worker', 'jun 2021 - nov 2021', 'IKEA - Half Period', 'Braga, Portugal', '10d66d647a35346d6ebbdda8fb2b74fa.png'),
(5, 'Internship Trainee', 'fev 2020 - ago 2020', 'Lucemplast LDA', 'Braga, Portugal', '59c9e6a5813bf82ae9f14922a36492c9.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `hobbies`
--

INSERT INTO `hobbies` (`id`, `filename`, `description`) VALUES
(2, '2.jpg', 'Last Season'),
(3, 'f28175f381046947bbd7e18f8a85b200.jpg', 'European Champion'),
(4, '5968381de67cc77ac6c3422c9d29600c.jpg', 'National Champ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `projectname` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `ref1` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects`
--

INSERT INTO `projects` (`id`, `filename`, `projectname`, `description`, `ref1`) VALUES
(2, 'icon.png', 'Travel Agency', 'This application was made in ionic, with the goal to simulate a travel agency, where the client can                      choose a destination, see the prices, chose a hotel and room and finally pay the booking.                     One of the goals was to develop a good looking application and start working more on front end area.                     As i said, the application was made in ionic, but the site prototype was made in figma.                     Check more down bellow.', 'https://github.com/Big1699'),
(3, 'java.jpg', 'Order Delevery', 'This project is a java application that the goal is to order delevery. The application has                  a user login, with different options for the differente users, like, order update, existing stock and more.                 Check more down bellow.', 'https://github.com/Big1699'),
(4, 'java.jpg', 'Sports Venue Rental', 'As the name said, this project consists in java application of sports venue rental,                     where the client can rental different type of sports fields, like tenis, football, roller hockey, and others.                     The price of the rental changes with the sports and some others conditions that were estipulated.                     Check more down bellow.', 'https://github.com/Big1699'),
(7, '63836379164b3ccb07dc0a4876bd2f90.jpeg', 'Financial asset manager', 'This project was developed in c#, where that consists in web application that is capable to                  create, edit and delete financial assets, with differente type of users and their corresponding operations.                 Check more down bellow.', 'https://github.com/Big1699');

-- --------------------------------------------------------

--
-- Estrutura da tabela `skillslanguages`
--

CREATE TABLE `skillslanguages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `type` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `skillslanguages`
--

INSERT INTO `skillslanguages` (`id`, `name`, `level`, `type`) VALUES
(3, 'PHP', 80, 0),
(4, 'JAVA', 80, 0),
(5, 'C#', 80, 0),
(6, 'C', 60, 0),
(7, 'IONIC', 70, 0),
(8, 'Portuguese', 100, 1),
(9, 'English', 90, 1),
(10, 'Spanish', 70, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(0, 'adminteste123', '', 1),
(1, 'admin', '$2y$10$KEguNjbFiZswlVSjuWWAaOkVjABWfAeu0OWh1omabKFtyK7n2TUza', 1),
(8, 'nelsonadmin', '$2y$10$mFF8wEjvTk3qJtVhfl2Fh.3ZcrCRvZmdQNQWWp55BWl7XGpcU/I22', 0),
(9, 'filipeadmin', '', 1),
(11, 'ratomanager', '$2y$10$LpH0vmSY1V3OrsgSNIjmiOULdpfkf42C86qCoxrkZRxCjZore1ceC', 0),
(12, 'diogoadmin', '', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `contactsform`
--
ALTER TABLE `contactsform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `skillslanguages`
--
ALTER TABLE `skillslanguages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
