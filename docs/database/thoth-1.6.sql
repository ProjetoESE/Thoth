-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Mar-2019 às 20:36
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
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `activity` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `activity_log`
--

INSERT INTO `activity_log` (`id_log`, `id_user`, `id_module`, `activity`) VALUES
(1, 1, 1, 'Guilherme Bolfe updated criteria IC 01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `criteria`
--

CREATE TABLE `criteria` (
  `id_criteria` int(11) NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pre_selected` tinyint(1) NOT NULL,
  `id_project` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `criteria`
--

INSERT INTO `criteria` (`id_criteria`, `id`, `description`, `pre_selected`, `id_project`, `type`) VALUES
(1, 'IC 01', 'Description 01', 0, 1, 'Inclusion');

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
-- Estrutura da tabela `exclusion_rule`
--

CREATE TABLE `exclusion_rule` (
  `id_exclusion_rule` int(11) NOT NULL,
  `id_rule` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `exclusion_rule`
--

INSERT INTO `exclusion_rule` (`id_exclusion_rule`, `id_rule`, `id_project`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inclusion_rule`
--

CREATE TABLE `inclusion_rule` (
  `id_inclusion_rule` int(11) NOT NULL,
  `id_rule` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `inclusion_rule`
--

INSERT INTO `inclusion_rule` (`id_inclusion_rule`, `id_rule`, `id_project`) VALUES
(1, 3, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 3);

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
(10, 1, 1),
(11, 1, 2),
(12, 1, 3),
(15, 1, 8),
(16, 1, 5),
(17, 1, 4),
(18, 1, 6);

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
-- Estrutura da tabela `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `rule`
--

INSERT INTO `rule` (`id_rule`, `description`) VALUES
(1, 'All'),
(2, 'Any'),
(3, 'At Least');

-- --------------------------------------------------------

--
-- Estrutura da tabela `search_strategy`
--

CREATE TABLE `search_strategy` (
  `id_search_strategy` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `search_strategy`
--

INSERT INTO `search_strategy` (`id_search_strategy`, `description`, `id_project`) VALUES
(1, 'ASDASDD', 1),
(2, ' ', 2),
(3, ' ', 3),
(4, ' ', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `search_string`
--

CREATE TABLE `search_string` (
  `id_search_string` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project_database` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `search_string`
--

INSERT INTO `search_string` (`id_search_string`, `description`, `id_project_database`, `update_at`) VALUES
(11, '(\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', 10, '2019-02-18 12:13:59'),
(12, '(\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', 11, '2019-02-18 12:14:01'),
(13, 'TITLE-ABS-KEY (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', 12, '2019-02-18 12:14:02'),
(16, '(\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', 15, '2019-02-18 12:14:03'),
(17, '(\"Term 01\" \"Synonym 04\" \"Synonym 05\") AND (\"Term 02\" \"Synonym 02\" \"Synonym 01\")', 16, '2019-02-18 12:14:04'),
(18, '(\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', 17, '2019-02-18 12:14:05'),
(19, '(((\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") WN KY) AND ((\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\") WN KY) AND ({english} WN LA)', 18, '2019-02-18 12:15:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `search_string_generics`
--

CREATE TABLE `search_string_generics` (
  `id_search_string_generics` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `search_string_generics`
--

INSERT INTO `search_string_generics` (`id_search_string_generics`, `description`, `id_project`) VALUES
(4, '(\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', 1),
(5, ' ', 2),
(6, ' ', 3),
(7, ' ', 4);

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
(22, 'Synonym 04', 7),
(23, 'Synonym 05', 7),
(24, 'Synonym 02', 8),
(25, 'Synonym 01', 8);

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
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id_criteria`),
  ADD KEY `id_project` (`id_project`);

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
-- Indexes for table `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  ADD PRIMARY KEY (`id_exclusion_rule`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_rule` (`id_rule`);

--
-- Indexes for table `inclusion_rule`
--
ALTER TABLE `inclusion_rule`
  ADD PRIMARY KEY (`id_inclusion_rule`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_rule` (`id_rule`);

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
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `search_strategy`
--
ALTER TABLE `search_strategy`
  ADD PRIMARY KEY (`id_search_strategy`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `search_string`
--
ALTER TABLE `search_string`
  ADD PRIMARY KEY (`id_search_string`),
  ADD KEY `id_data_base_project` (`id_project_database`);

--
-- Indexes for table `search_string_generics`
--
ALTER TABLE `search_string_generics`
  ADD PRIMARY KEY (`id_search_string_generics`),
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
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id_criteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  MODIFY `id_exclusion_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inclusion_rule`
--
ALTER TABLE `inclusion_rule`
  MODIFY `id_inclusion_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_project_database` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `search_strategy`
--
ALTER TABLE `search_strategy`
  MODIFY `id_search_strategy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `search_string`
--
ALTER TABLE `search_string`
  MODIFY `id_search_string` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `search_string_generics`
--
ALTER TABLE `search_string_generics`
  MODIFY `id_search_string_generics` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Limitadores para a tabela `criteria`
--
ALTER TABLE `criteria`
  ADD CONSTRAINT `criteria_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Limitadores para a tabela `domain`
--
ALTER TABLE `domain`
  ADD CONSTRAINT `domain_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Limitadores para a tabela `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  ADD CONSTRAINT `exclusion_rule_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `exclusion_rule_ibfk_2` FOREIGN KEY (`id_rule`) REFERENCES `rule` (`id_rule`);

--
-- Limitadores para a tabela `inclusion_rule`
--
ALTER TABLE `inclusion_rule`
  ADD CONSTRAINT `inclusion_rule_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `inclusion_rule_ibfk_2` FOREIGN KEY (`id_rule`) REFERENCES `rule` (`id_rule`);

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
-- Limitadores para a tabela `search_strategy`
--
ALTER TABLE `search_strategy`
  ADD CONSTRAINT `search_strategy_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Limitadores para a tabela `search_string`
--
ALTER TABLE `search_string`
  ADD CONSTRAINT `search_string_ibfk_1` FOREIGN KEY (`id_project_database`) REFERENCES `project_databases` (`id_project_database`);

--
-- Limitadores para a tabela `search_string_generics`
--
ALTER TABLE `search_string_generics`
  ADD CONSTRAINT `search_string_generics_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

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
