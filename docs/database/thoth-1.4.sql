-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Fev-2019 às 12:49
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thoth`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `activity_log`
--

CREATE TABLE `activity_log` (
  `id_activity_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `activity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `activity_log`
--

INSERT INTO `activity_log` (`id_activity_log`, `id_user`, `activity`, `created_at`, `id_module`) VALUES
(1, 1, 'Guilherme Bolfe added the termTerm 01', '2019-02-12 00:22:11', 1),
(2, 1, 'Guilherme Bolfe deleted the termTerm 01', '2019-02-12 00:57:04', 1),
(3, 1, 'Guilherme Bolfe added the termTerm 01', '2019-02-12 00:57:14', 1),
(4, 1, 'Guilherme Bolfe deleted the termTerm 01', '2019-02-12 01:03:52', 1),
(5, 1, 'Guilherme Bolfe added the termTerm 02', '2019-02-12 01:03:52', 1),
(6, 1, 'Guilherme Bolfe added the termTerm 01', '2019-02-12 01:04:01', 1),
(7, 1, 'Guilherme Bolfe added the synonymSynonym 01', '2019-02-12 01:15:48', 1),
(8, 1, 'Guilherme Bolfe added the synonymSynonym 02', '2019-02-12 01:16:22', 1),
(9, 1, 'Guilherme Bolfe added the termTerm 03', '2019-02-12 01:19:36', 1),
(10, 1, 'Guilherme Bolfe edited the domain Domain 05 for Domain 04', '2019-02-12 03:15:26', 1),
(11, 1, 'Guilherme Bolfe edited the domain Domain 03 for Domain 05', '2019-02-12 03:15:41', 1),
(12, 1, 'Guilherme Bolfe edited the domain Domain 02 for Domain 06', '2019-02-12 03:15:51', 1),
(13, 1, 'Guilherme Bolfe edited the domain Domain 03 for Domain 06', '2019-02-12 03:16:19', 1),
(14, 1, 'Guilherme Bolfe edited the domain Domain 03 for Domain 06', '2019-02-12 03:18:48', 1),
(15, 1, 'Guilherme Bolfe edited the domain Domain 03 for Domain 06', '2019-02-12 03:19:44', 1),
(16, 1, 'Guilherme Bolfe edited the domain Domain 03 for Domain 06', '2019-02-12 03:20:08', 1),
(17, 1, 'Guilherme Bolfe edited the domain Domain 03 for Domain 08', '2019-02-12 03:21:50', 1),
(18, 1, 'Guilherme Bolfe edited the domain Domain 03 for Domain 06', '2019-02-12 03:26:59', 1),
(19, 1, 'Guilherme Bolfe edited the domain Domain 03 for Domain 04', '2019-02-12 03:31:08', 1),
(20, 1, 'Guilherme Bolfe edited the domain Domain 03 for Domain 06', '2019-02-12 03:33:35', 1),
(21, 1, 'Guilherme Bolfe edited the domain Domain 05 for Domain 04', '2019-02-12 03:36:14', 1),
(22, 1, 'Guilherme Bolfe edited the keywords Keyword 02 for Keyword 04', '2019-02-12 03:42:03', 1),
(23, 1, 'Guilherme Bolfe edited the keywords Keyword 03 for Keyword 05', '2019-02-12 03:42:18', 1),
(24, 1, 'Guilherme Bolfe edited the keywords Keyword 05 for Keyword 06', '2019-02-12 03:42:30', 1),
(25, 1, 'Guilherme Bolfe edited the research_question RQ 01', '2019-02-12 03:58:43', 1),
(26, 1, 'Guilherme Bolfe edited the research_question RQ 04', '2019-02-12 03:59:16', 1),
(27, 1, 'Guilherme Bolfe edited the research_question RQ 01', '2019-02-12 03:59:27', 1),
(28, 1, 'Guilherme Bolfe added the database IEEE', '2019-02-12 04:00:05', 1),
(29, 1, 'Guilherme Bolfe added the database SCIENCE DIRECT', '2019-02-12 04:00:06', 1),
(30, 1, 'Guilherme Bolfe deleted the termTerm 03', '2019-02-12 04:00:52', 1),
(31, 1, 'Guilherme Bolfe added the termTerm 03', '2019-02-12 04:01:08', 1),
(32, 1, 'Guilherme Bolfe deleted the term', '2019-02-12 04:01:13', 1),
(33, 1, 'Guilherme Bolfe deleted the termTerm 03', '2019-02-12 04:01:33', 1),
(34, 1, 'Guilherme Bolfe edited the term Term 02 for Term 03', '2019-02-12 04:08:17', 1),
(35, 1, 'Guilherme Bolfe deleted the termTerm 01', '2019-02-12 04:09:53', 1),
(36, 1, 'Guilherme Bolfe added the synonymSynonym 03', '2019-02-12 04:10:17', 1),
(37, 1, 'Guilherme Bolfe logged in', '2019-02-12 16:10:16', 2),
(38, 1, 'Guilherme Bolfe added the database GOOGLE', '2019-02-12 16:10:36', 1),
(39, 1, 'Guilherme Bolfe deleted the term', '2019-02-12 16:30:11', 1),
(40, 1, 'Guilherme Bolfe deleted the synonymSynonym 01', '2019-02-12 16:32:33', 1),
(41, 1, 'Guilherme Bolfe deleted the termTerm 03', '2019-02-12 16:34:23', 1),
(42, 1, 'Guilherme Bolfe added the termTerm 01', '2019-02-12 16:34:32', 1),
(43, 1, 'Guilherme Bolfe added the synonymSynonym 01', '2019-02-12 16:34:38', 1),
(44, 1, 'Guilherme Bolfe added the synonymSynonym 02', '2019-02-12 16:34:41', 1),
(45, 1, 'Guilherme Bolfe deleted the termTerm 01', '2019-02-12 16:35:11', 1),
(46, 1, 'Guilherme Bolfe added the termTerm 01', '2019-02-12 16:35:21', 1),
(47, 1, 'Guilherme Bolfe added the synonymsdsad', '2019-02-12 16:35:22', 1),
(48, 1, 'Guilherme Bolfe added the synonymasdasd', '2019-02-12 16:35:47', 1),
(49, 1, 'Guilherme Bolfe deleted the synonymsdsad', '2019-02-12 16:35:49', 1),
(50, 1, 'Guilherme Bolfe deleted the synonymasdasd', '2019-02-12 16:35:50', 1),
(51, 1, 'Guilherme Bolfe added the synonymADASDA', '2019-02-12 16:35:57', 1),
(52, 1, 'Guilherme Bolfe deleted the synonymADASDA', '2019-02-12 16:36:16', 1),
(53, 1, 'Guilherme Bolfe added the synonymSADSAD', '2019-02-12 16:36:19', 1),
(54, 1, 'Guilherme Bolfe added the synonymASDASD', '2019-02-12 16:36:30', 1),
(55, 1, 'Guilherme Bolfe deleted the synonymASDASD', '2019-02-12 16:36:32', 1),
(56, 1, 'Guilherme Bolfe deleted the synonymASDASD', '2019-02-12 16:37:11', 1),
(57, 1, 'Guilherme Bolfe deleted the synonymSADSAD', '2019-02-12 16:37:12', 1),
(58, 1, 'Guilherme Bolfe deleted the synonymSADSAD', '2019-02-12 16:37:17', 1),
(59, 1, 'Guilherme Bolfe deleted the synonymASDASD', '2019-02-12 16:37:19', 1),
(60, 1, 'Guilherme Bolfe deleted the synonymSADSAD', '2019-02-12 16:38:23', 1),
(61, 1, 'Guilherme Bolfe deleted the synonymSADSAD', '2019-02-12 16:39:01', 1),
(62, 1, 'Guilherme Bolfe deleted the synonymASDASD', '2019-02-12 16:39:05', 1),
(63, 1, 'Guilherme Bolfe added the synonymdasdas', '2019-02-12 16:40:41', 1),
(64, 1, 'Guilherme Bolfe deleted the synonymdasdas', '2019-02-12 16:42:58', 1),
(65, 1, 'Guilherme Bolfe added the synonymadasd', '2019-02-12 16:43:04', 1),
(66, 1, 'Guilherme Bolfe added the synonymasdasd', '2019-02-12 16:43:05', 1),
(67, 1, 'Guilherme Bolfe deleted the synonymadasd', '2019-02-12 16:50:03', 1),
(68, 1, 'Guilherme Bolfe deleted the synonymasdasd', '2019-02-12 16:50:04', 1),
(69, 1, 'Guilherme Bolfe added the synonymdasdasd\'', '2019-02-12 16:50:24', 1),
(70, 1, 'Guilherme Bolfe deleted the synonymdasdasd\'', '2019-02-12 16:50:34', 1),
(71, 1, 'Guilherme Bolfe added the synonymsdqed', '2019-02-12 16:50:39', 1),
(72, 1, 'Guilherme Bolfe deleted the synonymsdqed', '2019-02-12 16:50:48', 1),
(73, 1, 'Guilherme Bolfe added the termTerm 02', '2019-02-12 16:50:59', 1),
(74, 1, 'Guilherme Bolfe added the synonymSynonym 01', '2019-02-12 16:51:04', 1),
(75, 1, 'Guilherme Bolfe added the synonymSynonym 02', '2019-02-12 16:51:10', 1),
(76, 1, 'Guilherme Bolfe added the synonymSynonym 01', '2019-02-12 16:51:14', 1),
(77, 1, 'Guilherme Bolfe added the synonymSynonym 02', '2019-02-12 16:51:17', 1),
(78, 1, 'Guilherme Bolfe deleted the synonymSynonym 01', '2019-02-12 16:51:22', 1),
(79, 1, 'Guilherme Bolfe deleted the synonymSynonym 02', '2019-02-12 16:51:27', 1),
(80, 1, 'Guilherme Bolfe deleted the synonymSynonym 01', '2019-02-12 17:03:29', 1),
(81, 1, 'Guilherme Bolfe added the synonymSynonym 01', '2019-02-12 17:04:03', 1),
(82, 1, 'Guilherme Bolfe logged in', '2019-02-13 00:36:25', 2),
(83, 1, 'Guilherme Bolfe logged in', '2019-02-13 10:51:03', 2),
(84, 1, 'Guilherme Bolfe added the synonymSynonym 02', '2019-02-13 11:05:31', 1),
(85, 1, 'Guilherme Bolfe edited the synonym Synonym 02 for Synonym 03', '2019-02-13 11:17:13', 1),
(86, 1, 'Guilherme Bolfe edited the synonym Synonym 02 for Synonym 03', '2019-02-13 11:17:56', 1),
(87, 1, 'Guilherme Bolfe edited the synonym Synonym 03 for Synonym 02', '2019-02-13 11:18:53', 1),
(88, 1, 'Guilherme Bolfe edited the synonym Synonym 02 for Synonym 01', '2019-02-13 11:19:06', 1),
(89, 1, 'Guilherme Bolfe deleted the synonymSynonym 01', '2019-02-13 11:19:13', 1),
(90, 1, 'Guilherme Bolfe deleted the termTerm 02', '2019-02-13 11:19:17', 1),
(91, 1, 'Guilherme Bolfe deleted the termTerm 01', '2019-02-13 11:19:19', 1),
(92, 1, 'Guilherme Bolfe added the termTerm 01', '2019-02-13 11:19:27', 1),
(93, 1, 'Guilherme Bolfe added the synonymSynonym 01', '2019-02-13 11:19:33', 1),
(94, 1, 'Guilherme Bolfe added the synonymSynonym 02', '2019-02-13 11:19:38', 1),
(95, 1, 'Guilherme Bolfe added the termTerm 02', '2019-02-13 11:19:46', 1),
(96, 1, 'Guilherme Bolfe added the synonymSynonym 01', '2019-02-13 11:19:53', 1),
(97, 1, 'Guilherme Bolfe added the synonymSynonym 02', '2019-02-13 11:19:57', 1),
(98, 1, 'Guilherme Bolfe added the database SCOPUS', '2019-02-13 11:43:47', 1),
(99, 1, 'Guilherme Bolfe added the database ENGINEERING VILLAGE', '2019-02-13 11:44:14', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `data_base`
--

CREATE TABLE `data_base` (
  `id_database` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `data_base`
--

INSERT INTO `data_base` (`id_database`, `name`, `link`) VALUES
(1, 'GOOGLE', 'https://scholar.google.com.br/'),
(2, 'IEEE', 'https://ieeexplore.ieee.org/Xplore/home.jsp'),
(3, 'SCOPUS', 'https://www.scopus.com/home.uri'),
(4, 'SCIENCE DIRECT', 'https://www.sciencedirect.com/'),
(5, 'ACM', 'https://dl.acm.org/'),
(6, 'ENGINEERING VILLAGE', 'https://www.engineeringvillage.com/home.url'),
(8, 'SPRINGER LINK', 'https://link.springer.com/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `domain`
--

CREATE TABLE `domain` (
  `id_domain` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `domain`
--

INSERT INTO `domain` (`id_domain`, `description`, `id_project`) VALUES
(6, 'Domain 02', 1),
(7, 'Domain 06', 1),
(9, 'Domain 04', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `keyword`
--

CREATE TABLE `keyword` (
  `id_keyword` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `keyword`
--

INSERT INTO `keyword` (`id_keyword`, `description`, `id_project`) VALUES
(7, 'Keyword 04', 1),
(8, 'Keyword 06', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `language`
--

CREATE TABLE `language` (
  `id_language` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `language`
--

INSERT INTO `language` (`id_language`, `description`) VALUES
(1, 'Portuguese'),
(2, 'English'),
(3, 'Spanish'),
(4, 'French'),
(5, 'Russian');

-- --------------------------------------------------------

--
-- Estrutura da tabela `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `module`
--

INSERT INTO `module` (`id_module`, `description`) VALUES
(1, 'Planning'),
(2, 'User Management');

-- --------------------------------------------------------

--
-- Estrutura da tabela `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `objectives` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `project`
--

INSERT INTO `project` (`id_project`, `title`, `description`, `objectives`, `created_by`, `start_date`, `end_date`) VALUES
(1, 'Project 01', 'Project Test 01', 'Objectives 01', 1, '2019-02-17', '2019-03-01'),
(2, 'Project 02', 'Project Test 02', 'Objectives 02', 1, '0000-00-00', '0000-00-00'),
(3, 'Project 03', 'Project Test 03', 'Objectives 03', 1, '0000-00-00', '0000-00-00'),
(4, 'Project 04', 'Project Test 04', 'Objectives 04', 2, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_databases`
--

CREATE TABLE `project_databases` (
  `id_project_database` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_database` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `project_databases`
--

INSERT INTO `project_databases` (`id_project_database`, `id_project`, `id_database`) VALUES
(1, 1, 2),
(2, 1, 4),
(3, 1, 1),
(4, 1, 3),
(5, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_languages`
--

CREATE TABLE `project_languages` (
  `id_project_lang` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `project_languages`
--

INSERT INTO `project_languages` (`id_project_lang`, `id_project`, `id_language`) VALUES
(3, 1, 1),
(8, 1, 2),
(9, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_study_types`
--

CREATE TABLE `project_study_types` (
  `id_project_study_types` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_study_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `project_study_types`
--

INSERT INTO `project_study_types` (`id_project_study_types`, `id_project`, `id_study_type`) VALUES
(2, 1, 2),
(4, 1, 4),
(5, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `research_question`
--

CREATE TABLE `research_question` (
  `id_research_question` int(11) NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `research_question`
--

INSERT INTO `research_question` (`id_research_question`, `id`, `description`, `id_project`) VALUES
(7, 'RQ 01', 'Description 05', 1),
(8, 'RQ 04', 'Description 02', 1),
(9, 'RQ 03', 'Description 03', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `study_type`
--

CREATE TABLE `study_type` (
  `id_study_type` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `study_type`
--

INSERT INTO `study_type` (`id_study_type`, `description`) VALUES
(1, 'All types'),
(2, 'Book'),
(3, 'Thesis'),
(4, 'Article in Press'),
(5, 'Article'),
(6, 'Conference Paper');

-- --------------------------------------------------------

--
-- Estrutura da tabela `synonym`
--

CREATE TABLE `synonym` (
  `id_synonym` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_term` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `synonym`
--

INSERT INTO `synonym` (`id_synonym`, `description`, `id_term`) VALUES
(22, 'Synonym 01', 7),
(23, 'Synonym 02', 7),
(24, 'Synonym 01', 8),
(25, 'Synonym 02', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `term`
--

CREATE TABLE `term` (
  `id_term` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `term`
--

INSERT INTO `term` (`id_term`, `description`, `id_project`) VALUES
(7, 'Term 01', 1),
(8, 'Term 02', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lattes_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `name`, `institution`, `lattes_link`, `created_at`, `updated_at`) VALUES
(1, 'guilhermebolfe11@gmail.com', 'f781ca982eb8b25bbb7fcd2cdc0798ca', 'Guilherme Bolfe', NULL, NULL, '2019-01-28 17:44:40', '2019-01-28 22:53:54'),
(2, 'silviobolfe19@gmail.com', '9641fe65a41b6d722443bc12e796d52a', 'Silvio Bolfe', NULL, NULL, '2019-01-28 17:52:54', '2019-01-28 22:54:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id_activity_log`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `data_base`
--
ALTER TABLE `data_base`
  ADD PRIMARY KEY (`id_database`);

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id_domain`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`id_keyword`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id_language`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `project_databases`
--
ALTER TABLE `project_databases`
  ADD PRIMARY KEY (`id_project_database`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_database` (`id_database`);

--
-- Indexes for table `project_languages`
--
ALTER TABLE `project_languages`
  ADD PRIMARY KEY (`id_project_lang`),
  ADD KEY `id_language` (`id_language`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `project_study_types`
--
ALTER TABLE `project_study_types`
  ADD PRIMARY KEY (`id_project_study_types`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_study_type` (`id_study_type`);

--
-- Indexes for table `research_question`
--
ALTER TABLE `research_question`
  ADD PRIMARY KEY (`id_research_question`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `study_type`
--
ALTER TABLE `study_type`
  ADD PRIMARY KEY (`id_study_type`);

--
-- Indexes for table `synonym`
--
ALTER TABLE `synonym`
  ADD PRIMARY KEY (`id_synonym`),
  ADD KEY `id_term` (`id_term`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id_term`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id_activity_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `data_base`
--
ALTER TABLE `data_base`
  MODIFY `id_database` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `id_domain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `id_keyword` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_databases`
--
ALTER TABLE `project_databases`
  MODIFY `id_project_database` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_languages`
--
ALTER TABLE `project_languages`
  MODIFY `id_project_lang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_study_types`
--
ALTER TABLE `project_study_types`
  MODIFY `id_project_study_types` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `research_question`
--
ALTER TABLE `research_question`
  MODIFY `id_research_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `study_type`
--
ALTER TABLE `study_type`
  MODIFY `id_study_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `synonym`
--
ALTER TABLE `synonym`
  MODIFY `id_synonym` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id_term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `activity_log_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Limitadores para a tabela `domain`
--
ALTER TABLE `domain`
  ADD CONSTRAINT `domain_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Limitadores para a tabela `keyword`
--
ALTER TABLE `keyword`
  ADD CONSTRAINT `keyword_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Limitadores para a tabela `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`);

--
-- Limitadores para a tabela `project_databases`
--
ALTER TABLE `project_databases`
  ADD CONSTRAINT `project_databases_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `project_databases_ibfk_2` FOREIGN KEY (`id_database`) REFERENCES `data_base` (`id_database`);

--
-- Limitadores para a tabela `project_languages`
--
ALTER TABLE `project_languages`
  ADD CONSTRAINT `project_languages_ibfk_1` FOREIGN KEY (`id_language`) REFERENCES `language` (`id_language`),
  ADD CONSTRAINT `project_languages_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Limitadores para a tabela `project_study_types`
--
ALTER TABLE `project_study_types`
  ADD CONSTRAINT `project_study_types_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `project_study_types_ibfk_2` FOREIGN KEY (`id_study_type`) REFERENCES `study_type` (`id_study_type`);

--
-- Limitadores para a tabela `research_question`
--
ALTER TABLE `research_question`
  ADD CONSTRAINT `research_question_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Limitadores para a tabela `synonym`
--
ALTER TABLE `synonym`
  ADD CONSTRAINT `synonym_ibfk_1` FOREIGN KEY (`id_term`) REFERENCES `term` (`id_term`);

--
-- Limitadores para a tabela `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `term_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
