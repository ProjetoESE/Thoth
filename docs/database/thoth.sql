-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Abr-2019 às 19:10
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
-- Database: `u648750589_thoth`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `activity_log`
--

CREATE TABLE `activity_log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `activity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bib_upload`
--

CREATE TABLE `bib_upload` (
  `id_bib` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project_database` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(8, 'SPRINGER LINK', 'https://link.springer.com/'),
(10, 'SIEPE', 'http://seer.unipampa.edu.br/index.php/siepe/issue/archive');

-- --------------------------------------------------------

--
-- Estrutura da tabela `domain`
--

CREATE TABLE `domain` (
  `id_domain` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evaluation_criteria`
--

CREATE TABLE `evaluation_criteria` (
  `id_evaluation_criteria` int(11) NOT NULL,
  `id_paper` int(11) NOT NULL,
  `id_criteria` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exclusion_rule`
--

CREATE TABLE `exclusion_rule` (
  `id_exclusion_rule` int(11) NOT NULL,
  `id_rule` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `general_score`
--

CREATE TABLE `general_score` (
  `id_general_score` int(11) NOT NULL,
  `start` float NOT NULL,
  `end` float NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inclusion_rule`
--

CREATE TABLE `inclusion_rule` (
  `id_inclusion_rule` int(11) NOT NULL,
  `id_rule` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `keyword`
--

CREATE TABLE `keyword` (
  `id_keyword` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Estrutura da tabela `levels`
--

CREATE TABLE `levels` (
  `id_level` int(11) NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `levels`
--

INSERT INTO `levels` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Viewer'),
(3, 'Researcher'),
(4, 'Revisor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `members`
--

CREATE TABLE `members` (
  `id_members` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `min_to_app`
--

CREATE TABLE `min_to_app` (
  `id_min_to_app` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_general_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(2, 'User Management'),
(3, 'Conducting');

-- --------------------------------------------------------

--
-- Estrutura da tabela `options_extraction`
--

CREATE TABLE `options_extraction` (
  `id_option` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_de` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `papers`
--

CREATE TABLE `papers` (
  `id_paper` int(11) NOT NULL,
  `id_bib` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_pages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `doi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `journal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `issn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isbn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bib_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_base` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `status_selection` int(11) NOT NULL DEFAULT '3',
  `check_status_selection` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `papers_selection`
--

CREATE TABLE `papers_selection` (
  `id_paper_sel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paper` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `end_date` date NOT NULL,
  `c_papers` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_databases`
--

CREATE TABLE `project_databases` (
  `id_project_database` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_database` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_languages`
--

CREATE TABLE `project_languages` (
  `id_project_lang` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `project_study_types`
--

CREATE TABLE `project_study_types` (
  `id_project_study_types` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_study_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `question_extraction`
--

CREATE TABLE `question_extraction` (
  `id_de` int(11) NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `question_quality`
--

CREATE TABLE `question_quality` (
  `id_qa` int(11) NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` float NOT NULL,
  `min_to_app` int(11) DEFAULT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Estrutura da tabela `score_quality`
--

CREATE TABLE `score_quality` (
  `id_score` int(11) NOT NULL,
  `score_rule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `id_qa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `search_strategy`
--

CREATE TABLE `search_strategy` (
  `id_search_strategy` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `search_string_generics`
--

CREATE TABLE `search_string_generics` (
  `id_search_string_generics` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_extraction`
--

CREATE TABLE `status_extraction` (
  `id_status` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_selection`
--

CREATE TABLE `status_selection` (
  `id_status` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `status_selection`
--

INSERT INTO `status_selection` (`id_status`, `description`) VALUES
(1, 'Accepted'),
(2, 'Rejected'),
(3, 'Unclassified'),
(4, 'Duplicate'),
(5, 'Removed');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `term`
--

CREATE TABLE `term` (
  `id_term` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `types_question`
--

CREATE TABLE `types_question` (
  `id_type` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `types_question`
--

INSERT INTO `types_question` (`id_type`, `type`) VALUES
(1, 'Text'),
(2, 'Multiple Choice List'),
(3, 'Pick One List');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `bib_upload`
--
ALTER TABLE `bib_upload`
  ADD PRIMARY KEY (`id_bib`),
  ADD KEY `id_project_database` (`id_project_database`);

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
-- Indexes for table `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  ADD PRIMARY KEY (`id_evaluation_criteria`),
  ADD KEY `id_criteria` (`id_criteria`),
  ADD KEY `id_paper` (`id_paper`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  ADD PRIMARY KEY (`id_exclusion_rule`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_rule` (`id_rule`);

--
-- Indexes for table `general_score`
--
ALTER TABLE `general_score`
  ADD PRIMARY KEY (`id_general_score`),
  ADD KEY `id_project` (`id_project`);

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
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_members`),
  ADD KEY `members_ibfk_1` (`id_project`),
  ADD KEY `members_ibfk_2` (`id_user`),
  ADD KEY `members_ibfk_3` (`level`);

--
-- Indexes for table `min_to_app`
--
ALTER TABLE `min_to_app`
  ADD PRIMARY KEY (`id_min_to_app`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_general_score` (`id_general_score`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Indexes for table `options_extraction`
--
ALTER TABLE `options_extraction`
  ADD PRIMARY KEY (`id_option`),
  ADD KEY `id_de` (`id_de`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id_paper`),
  ADD KEY `id_bib` (`id_bib`),
  ADD KEY `data_base` (`data_base`),
  ADD KEY `status_selection` (`status_selection`);

--
-- Indexes for table `papers_selection`
--
ALTER TABLE `papers_selection`
  ADD PRIMARY KEY (`id_paper_sel`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_paper` (`id_paper`);

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
-- Indexes for table `question_extraction`
--
ALTER TABLE `question_extraction`
  ADD PRIMARY KEY (`id_de`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `question_quality`
--
ALTER TABLE `question_quality`
  ADD PRIMARY KEY (`id_qa`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `question_quality_ibfk_2` (`min_to_app`);

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
-- Indexes for table `score_quality`
--
ALTER TABLE `score_quality`
  ADD PRIMARY KEY (`id_score`),
  ADD KEY `id_qa` (`id_qa`);

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
-- Indexes for table `status_extraction`
--
ALTER TABLE `status_extraction`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_selection`
--
ALTER TABLE `status_selection`
  ADD PRIMARY KEY (`id_status`);

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
-- Indexes for table `types_question`
--
ALTER TABLE `types_question`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bib_upload`
--
ALTER TABLE `bib_upload`
  MODIFY `id_bib` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id_criteria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_base`
--
ALTER TABLE `data_base`
  MODIFY `id_database` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `id_domain` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  MODIFY `id_evaluation_criteria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  MODIFY `id_exclusion_rule` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_score`
--
ALTER TABLE `general_score`
  MODIFY `id_general_score` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inclusion_rule`
--
ALTER TABLE `inclusion_rule`
  MODIFY `id_inclusion_rule` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `id_keyword` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_members` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `min_to_app`
--
ALTER TABLE `min_to_app`
  MODIFY `id_min_to_app` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `options_extraction`
--
ALTER TABLE `options_extraction`
  MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id_paper` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `papers_selection`
--
ALTER TABLE `papers_selection`
  MODIFY `id_paper_sel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_databases`
--
ALTER TABLE `project_databases`
  MODIFY `id_project_database` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_languages`
--
ALTER TABLE `project_languages`
  MODIFY `id_project_lang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_study_types`
--
ALTER TABLE `project_study_types`
  MODIFY `id_project_study_types` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_extraction`
--
ALTER TABLE `question_extraction`
  MODIFY `id_de` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_quality`
--
ALTER TABLE `question_quality`
  MODIFY `id_qa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_question`
--
ALTER TABLE `research_question`
  MODIFY `id_research_question` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `score_quality`
--
ALTER TABLE `score_quality`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_strategy`
--
ALTER TABLE `search_strategy`
  MODIFY `id_search_strategy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_string`
--
ALTER TABLE `search_string`
  MODIFY `id_search_string` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_string_generics`
--
ALTER TABLE `search_string_generics`
  MODIFY `id_search_string_generics` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_extraction`
--
ALTER TABLE `status_extraction`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_selection`
--
ALTER TABLE `status_selection`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `study_type`
--
ALTER TABLE `study_type`
  MODIFY `id_study_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `synonym`
--
ALTER TABLE `synonym`
  MODIFY `id_synonym` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id_term` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types_question`
--
ALTER TABLE `types_question`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_log_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_log_ibfk_3` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `bib_upload`
--
ALTER TABLE `bib_upload`
  ADD CONSTRAINT `bib_upload_ibfk_1` FOREIGN KEY (`id_project_database`) REFERENCES `project_databases` (`id_project_database`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `criteria`
--
ALTER TABLE `criteria`
  ADD CONSTRAINT `criteria_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `domain`
--
ALTER TABLE `domain`
  ADD CONSTRAINT `domain_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  ADD CONSTRAINT `evaluation_criteria_ibfk_1` FOREIGN KEY (`id_criteria`) REFERENCES `criteria` (`id_criteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_criteria_ibfk_2` FOREIGN KEY (`id_paper`) REFERENCES `papers` (`id_paper`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_criteria_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  ADD CONSTRAINT `exclusion_rule_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exclusion_rule_ibfk_2` FOREIGN KEY (`id_rule`) REFERENCES `rule` (`id_rule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `general_score`
--
ALTER TABLE `general_score`
  ADD CONSTRAINT `general_score_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `inclusion_rule`
--
ALTER TABLE `inclusion_rule`
  ADD CONSTRAINT `inclusion_rule_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inclusion_rule_ibfk_2` FOREIGN KEY (`id_rule`) REFERENCES `rule` (`id_rule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `keyword`
--
ALTER TABLE `keyword`
  ADD CONSTRAINT `keyword_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`level`) REFERENCES `levels` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `min_to_app`
--
ALTER TABLE `min_to_app`
  ADD CONSTRAINT `min_to_app_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `min_to_app_ibfk_2` FOREIGN KEY (`id_general_score`) REFERENCES `general_score` (`id_general_score`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `options_extraction`
--
ALTER TABLE `options_extraction`
  ADD CONSTRAINT `options_extraction_ibfk_1` FOREIGN KEY (`id_de`) REFERENCES `question_extraction` (`id_de`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_ibfk_1` FOREIGN KEY (`id_bib`) REFERENCES `bib_upload` (`id_bib`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_ibfk_3` FOREIGN KEY (`data_base`) REFERENCES `data_base` (`id_database`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_ibfk_4` FOREIGN KEY (`status_selection`) REFERENCES `status_selection` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `papers_selection`
--
ALTER TABLE `papers_selection`
  ADD CONSTRAINT `papers_selection_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_selection_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status_selection` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_selection_ibfk_3` FOREIGN KEY (`id_paper`) REFERENCES `papers` (`id_paper`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `project_databases`
--
ALTER TABLE `project_databases`
  ADD CONSTRAINT `project_databases_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_databases_ibfk_2` FOREIGN KEY (`id_database`) REFERENCES `data_base` (`id_database`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `project_languages`
--
ALTER TABLE `project_languages`
  ADD CONSTRAINT `project_languages_ibfk_1` FOREIGN KEY (`id_language`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_languages_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `project_study_types`
--
ALTER TABLE `project_study_types`
  ADD CONSTRAINT `project_study_types_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_study_types_ibfk_2` FOREIGN KEY (`id_study_type`) REFERENCES `study_type` (`id_study_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `question_extraction`
--
ALTER TABLE `question_extraction`
  ADD CONSTRAINT `question_extraction_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_extraction_ibfk_2` FOREIGN KEY (`type`) REFERENCES `types_question` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `question_quality`
--
ALTER TABLE `question_quality`
  ADD CONSTRAINT `question_quality_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_quality_ibfk_2` FOREIGN KEY (`min_to_app`) REFERENCES `score_quality` (`id_score`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Limitadores para a tabela `research_question`
--
ALTER TABLE `research_question`
  ADD CONSTRAINT `research_question_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `score_quality`
--
ALTER TABLE `score_quality`
  ADD CONSTRAINT `score_quality_ibfk_1` FOREIGN KEY (`id_qa`) REFERENCES `question_quality` (`id_qa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `search_strategy`
--
ALTER TABLE `search_strategy`
  ADD CONSTRAINT `search_strategy_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `search_string`
--
ALTER TABLE `search_string`
  ADD CONSTRAINT `search_string_ibfk_1` FOREIGN KEY (`id_project_database`) REFERENCES `project_databases` (`id_project_database`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `search_string_generics`
--
ALTER TABLE `search_string_generics`
  ADD CONSTRAINT `search_string_generics_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `synonym`
--
ALTER TABLE `synonym`
  ADD CONSTRAINT `synonym_ibfk_1` FOREIGN KEY (`id_term`) REFERENCES `term` (`id_term`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `term_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
