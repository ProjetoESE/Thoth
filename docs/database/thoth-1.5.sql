-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Fev-2019 às 14:42
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
(99, 1, 'Guilherme Bolfe added the database ENGINEERING VILLAGE', '2019-02-13 11:44:14', 1),
(100, 1, 'Guilherme Bolfe logged in', '2019-02-13 14:39:07', 2),
(101, 1, 'Guilherme Bolfe deleted the database SCOPUS', '2019-02-13 14:43:03', 1),
(102, 1, 'Guilherme Bolfe added the database SCOPUS', '2019-02-13 14:46:43', 1),
(103, 1, 'Guilherme Bolfe added the database ACM', '2019-02-13 14:59:38', 1),
(104, 1, 'Guilherme Bolfe deleted the database IEEE', '2019-02-13 15:02:37', 1),
(105, 1, 'Guilherme Bolfe deleted the database SCIENCE DIRECT', '2019-02-13 15:02:38', 1),
(106, 1, 'Guilherme Bolfe deleted the database GOOGLE', '2019-02-13 15:02:38', 1),
(107, 1, 'Guilherme Bolfe deleted the database ENGINEERING VILLAGE', '2019-02-13 15:02:39', 1),
(108, 1, 'Guilherme Bolfe added the database GOOGLE', '2019-02-13 15:02:48', 1),
(109, 1, 'Guilherme Bolfe deleted the database GOOGLE', '2019-02-13 15:03:45', 1),
(110, 1, 'Guilherme Bolfe added the database ENGINEERING VILLAGE', '2019-02-13 15:03:57', 1),
(111, 1, 'Guilherme Bolfe logged in', '2019-02-15 20:26:09', 2),
(112, 1, 'Guilherme Bolfe logged out', '2019-02-15 20:27:40', 2),
(113, 1, 'Guilherme Bolfe logged in', '2019-02-16 00:04:57', 2),
(114, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-16 01:23:57', 1),
(115, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-16 01:36:54', 1),
(116, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-16 01:37:19', 1),
(117, 1, 'Guilherme Bolfe logged in', '2019-02-18 01:42:40', 2),
(118, 1, 'Guilherme Bolfe edited the synonym Synonym 01 for Synonym 02', '2019-02-18 01:43:20', 1),
(119, 1, 'Guilherme Bolfe edited the synonym Synonym 02 for Synonym 02', '2019-02-18 01:43:28', 1),
(120, 1, 'Guilherme Bolfe edited the synonym Synonym 01 for Synonym 02', '2019-02-18 01:43:44', 1),
(121, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 01:43:56', 1),
(122, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 01:43:58', 1),
(123, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 01:44:00', 1),
(124, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 01:44:01', 1),
(125, 1, 'Guilherme Bolfe logged in', '2019-02-18 10:49:17', 2),
(126, 1, 'Guilherme Bolfe deleted the database ', '2019-02-18 10:49:43', 1),
(127, 1, 'Guilherme Bolfe deleted the database ', '2019-02-18 10:50:59', 1),
(128, 1, 'Guilherme Bolfe edited the synonym Synonym 02 for Synonym 02', '2019-02-18 10:57:03', 1),
(129, 1, 'Guilherme Bolfe edited the synonym Synonym 02 for Synonym 03', '2019-02-18 10:57:08', 1),
(130, 1, 'Guilherme Bolfe edited the synonym Synonym 02 for Synonym 03', '2019-02-18 10:57:13', 1),
(131, 1, 'Guilherme Bolfe edited the synonym Synonym 03 for Synonym 04', '2019-02-18 10:57:35', 1),
(132, 1, 'Guilherme Bolfe edited the synonym Synonym 03 for Synonym 04', '2019-02-18 10:57:39', 1),
(133, 1, 'Guilherme Bolfe edited the synonym Synonym 04 for Synonym 05', '2019-02-18 10:59:15', 1),
(134, 1, 'Guilherme Bolfe edited the synonym Synonym 02 for Synonym 01', '2019-02-18 10:59:19', 1),
(135, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:00:31', 1),
(136, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:00:31', 1),
(137, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:00:32', 1),
(138, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:00:33', 1),
(139, 1, 'Guilherme Bolfe deleted the database SCOPUS', '2019-02-18 11:08:54', 1),
(140, 1, 'Guilherme Bolfe deleted the database ACM', '2019-02-18 11:08:54', 1),
(141, 1, 'Guilherme Bolfe deleted the database ENGINEERING VILLAGE', '2019-02-18 11:08:55', 1),
(142, 1, 'Guilherme Bolfe added the database GOOGLE', '2019-02-18 11:09:06', 1),
(143, 1, 'Guilherme Bolfe added the database IEEE', '2019-02-18 11:09:08', 1),
(144, 1, 'Guilherme Bolfe added the database SCOPUS', '2019-02-18 11:09:10', 1),
(145, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:10:26', 1),
(146, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:12:01', 1),
(147, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:12:02', 1),
(148, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:12:04', 1),
(149, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:12:05', 1),
(150, 1, 'Guilherme Bolfe added the database ENGINEERING VILLAGE', '2019-02-18 11:12:20', 1),
(151, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:12:28', 1),
(152, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:12:29', 1),
(153, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:12:30', 1),
(154, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:12:31', 1),
(155, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:13:28', 1),
(156, 1, 'Guilherme Bolfe deleted the database ENGINEERING VILLAGE', '2019-02-18 11:17:21', 1),
(157, 1, 'Guilherme Bolfe added the database ENGINEERING VILLAGE', '2019-02-18 11:17:30', 1),
(158, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:17:35', 1),
(159, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:17:35', 1),
(160, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:17:36', 1),
(161, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:17:37', 1),
(162, 1, 'Guilherme Bolfe deleted the database ENGINEERING VILLAGE', '2019-02-18 11:18:54', 1),
(163, 1, 'Guilherme Bolfe added the database SPRINGER LINK', '2019-02-18 11:19:00', 1),
(164, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:19:03', 1),
(165, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:19:07', 1),
(166, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:19:08', 1),
(167, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:19:10', 1),
(168, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:19:11', 1),
(169, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:40:45', 1),
(170, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:40:53', 1),
(171, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:40:54', 1),
(172, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:41:23', 1),
(173, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:41:41', 1),
(174, 1, 'Guilherme Bolfe generated search string ASD', '2019-02-18 11:41:45', 1),
(175, 1, 'Guilherme Bolfe generated search string ASDfd', '2019-02-18 11:42:54', 1),
(176, 1, 'Guilherme Bolfe generated search string ASDfd', '2019-02-18 11:42:56', 1),
(177, 1, 'Guilherme Bolfe generated search string ASDfd', '2019-02-18 11:42:57', 1),
(178, 1, 'Guilherme Bolfe generated search string ASDfd', '2019-02-18 11:43:03', 1),
(179, 1, 'Guilherme Bolfe generated search string ASDfd', '2019-02-18 11:43:04', 1),
(180, 1, 'Guilherme Bolfe added the database ACM', '2019-02-18 11:43:32', 1),
(181, 1, 'Guilherme Bolfe generated search string ASDfd', '2019-02-18 11:45:42', 1),
(182, 1, 'Guilherme Bolfe added the database SCIENCE DIRECT', '2019-02-18 11:45:48', 1),
(183, 1, 'Guilherme Bolfe generated search string ASDfd', '2019-02-18 11:45:52', 1),
(184, 1, 'Guilherme Bolfe edited search strategy 1', '2019-02-18 11:58:48', 1),
(185, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:13:55', 1),
(186, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:13:59', 1),
(187, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:14:01', 1),
(188, 1, 'Guilherme Bolfe generated search string TITLE-ABS-KEY (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:14:02', 1),
(189, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:14:03', 1),
(190, 1, 'Guilherme Bolfe generated search string (\"Term 01\" \"Synonym 04\" \"Synonym 05\") AND (\"Term 02\" \"Synonym 02\" \"Synonym 01\")', '2019-02-18 12:14:04', 1),
(191, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:14:05', 1),
(192, 1, 'Guilherme Bolfe added the database ENGINEERING VILLAGE', '2019-02-18 12:14:11', 1),
(193, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:14:14', 1),
(194, 1, 'Guilherme Bolfe generated search string TITLE-ABS-KEY (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:15:07', 1),
(195, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:15:08', 1),
(196, 1, 'Guilherme Bolfe generated search string (\"Term 01\" \"Synonym 04\" \"Synonym 05\") AND (\"Term 02\" \"Synonym 02\" \"Synonym 01\")', '2019-02-18 12:15:08', 1),
(197, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:15:10', 1),
(198, 1, 'Guilherme Bolfe generated search string (((\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") WN KY) AND ((\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\") WN KY) AND ({english} WN LA)', '2019-02-18 12:15:12', 1),
(199, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:16:32', 1),
(200, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:16:36', 1),
(201, 1, 'Guilherme Bolfe generated search string TITLE-ABS-KEY (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:16:40', 1),
(202, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:16:41', 1),
(203, 1, 'Guilherme Bolfe generated search string (\"Term 01\" \"Synonym 04\" \"Synonym 05\") AND (\"Term 02\" \"Synonym 02\" \"Synonym 01\")', '2019-02-18 12:16:47', 1),
(204, 1, 'Guilherme Bolfe generated search string (\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") AND (\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\")', '2019-02-18 12:16:48', 1),
(205, 1, 'Guilherme Bolfe generated search string (((\"Term 01\" OR \"Synonym 04\" OR \"Synonym 05\") WN KY) AND ((\"Term 02\" OR \"Synonym 02\" OR \"Synonym 01\") WN KY) AND ({english} WN LA)', '2019-02-18 12:16:51', 1),
(206, 1, 'Guilherme Bolfe logged in', '2019-02-18 15:54:40', 2),
(207, 1, 'Guilherme Bolfe logged in', '2019-02-20 12:20:23', 2),
(208, 1, 'Guilherme Bolfe edited inclusion rule 1', '2019-02-20 12:28:11', 1),
(209, 1, 'Guilherme Bolfe edited exclusion rule 1', '2019-02-20 12:28:15', 1),
(210, 1, 'Guilherme Bolfe added inclusion criteria 1', '2019-02-20 12:48:57', 1),
(211, 1, 'Guilherme Bolfe added exclusion criteria 1', '2019-02-20 12:49:37', 1),
(212, 1, 'Guilherme Bolfe logged out', '2019-02-20 13:06:29', 2),
(213, 1, 'Guilherme Bolfe logged in', '2019-02-20 13:07:12', 2);

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
-- Estrutura da tabela `exclusion_criteria`
--

CREATE TABLE `exclusion_criteria` (
  `id_exclusion_criteria` int(11) NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pre_selected` tinyint(1) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `exclusion_criteria`
--

INSERT INTO `exclusion_criteria` (`id_exclusion_criteria`, `id`, `description`, `pre_selected`, `id_project`) VALUES
(1, 'EC 01', 'Description 02', 0, 1);

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
(1, 3, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inclusion_criteria`
--

CREATE TABLE `inclusion_criteria` (
  `id_inclusion_criteria` int(11) NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pre_selected` tinyint(1) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `inclusion_criteria`
--

INSERT INTO `inclusion_criteria` (`id_inclusion_criteria`, `id`, `description`, `pre_selected`, `id_project`) VALUES
(1, 'IC 01', 'Description 01', 0, 1);

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
(1, 2, 1),
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
-- Indexes for table `exclusion_criteria`
--
ALTER TABLE `exclusion_criteria`
  ADD PRIMARY KEY (`id_exclusion_criteria`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  ADD PRIMARY KEY (`id_exclusion_rule`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_rule` (`id_rule`);

--
-- Indexes for table `inclusion_criteria`
--
ALTER TABLE `inclusion_criteria`
  ADD PRIMARY KEY (`id_inclusion_criteria`),
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
  MODIFY `id_activity_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

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
-- AUTO_INCREMENT for table `exclusion_criteria`
--
ALTER TABLE `exclusion_criteria`
  MODIFY `id_exclusion_criteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  MODIFY `id_exclusion_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inclusion_criteria`
--
ALTER TABLE `inclusion_criteria`
  MODIFY `id_inclusion_criteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Limitadores para a tabela `domain`
--
ALTER TABLE `domain`
  ADD CONSTRAINT `domain_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Limitadores para a tabela `exclusion_criteria`
--
ALTER TABLE `exclusion_criteria`
  ADD CONSTRAINT `exclusion_criteria_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Limitadores para a tabela `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  ADD CONSTRAINT `exclusion_rule_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `exclusion_rule_ibfk_2` FOREIGN KEY (`id_rule`) REFERENCES `rule` (`id_rule`);

--
-- Limitadores para a tabela `inclusion_criteria`
--
ALTER TABLE `inclusion_criteria`
  ADD CONSTRAINT `inclusion_criteria_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

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
