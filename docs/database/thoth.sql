-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 04:05 PM
-- Server version: 10.1.34-MariaDB
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
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `activity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id_log`, `id_user`, `id_module`, `activity`, `id_project`, `time`) VALUES
(1, 1, 2, 'Logged in', NULL, '2019-05-09 11:43:58'),
(2, 1, 1, 'Created the project Projeto 01', 1, '2019-05-09 11:44:29'),
(3, 1, 1, 'Added the domain Dominio 01', 1, '2019-05-09 11:44:42'),
(4, 1, 1, 'Added the language Portuguese', 1, '2019-05-09 11:44:45'),
(5, 1, 1, 'Added the study type All types', 1, '2019-05-09 11:44:46'),
(6, 1, 1, 'Added the keywords Palavra Chave 01', 1, '2019-05-09 11:44:59'),
(7, 1, 1, 'Added the start date 2019-05-09 and end date 2019-12-31', 1, '2019-05-09 11:45:13'),
(8, 1, 1, 'Added the research question RQ 01', 1, '2019-05-09 11:45:37'),
(9, 1, 1, 'Added the database IEEE', 1, '2019-05-09 11:45:43'),
(10, 1, 1, 'Added the termTermo 01', 1, '2019-05-09 11:45:54'),
(11, 1, 1, 'Added the synonymSinonimo 01', 1, '2019-05-09 11:46:00'),
(12, 1, 1, 'Added the synonymSinonimo 02', 1, '2019-05-09 11:46:06'),
(13, 1, 1, 'Added the termTermo 02', 1, '2019-05-09 11:46:09'),
(14, 1, 1, 'Added the synonymSinonimo 01', 1, '2019-05-09 11:46:15'),
(15, 1, 1, 'Added the synonymSinonimo 02', 1, '2019-05-09 11:46:19'),
(16, 1, 1, 'Edited search strategy', 1, '2019-05-09 11:46:41'),
(17, 1, 1, 'Added inclusion criteria IC 01', 1, '2019-05-09 11:46:58'),
(18, 1, 1, 'Added inclusion criteria IC 02', 1, '2019-05-09 11:47:16'),
(19, 1, 1, 'Added inclusion criteria EC 01', 1, '2019-05-09 11:47:52'),
(20, 1, 1, 'Added inclusion criteria EC 02', 1, '2019-05-09 11:48:03'),
(21, 1, 1, 'Edited inclusion rule', 1, '2019-05-09 11:48:06'),
(22, 1, 1, 'Selected criteria IC 01', 1, '2019-05-09 11:48:06'),
(23, 1, 1, 'Edited exclusion rule', 1, '2019-05-09 11:48:09'),
(24, 1, 1, 'Selected criteria EC 01', 1, '2019-05-09 11:48:09'),
(25, 1, 1, 'Selected criteria EC 02', 1, '2019-05-09 11:48:09'),
(26, 1, 1, 'Edited exclusion rule', 1, '2019-05-09 11:48:13'),
(27, 1, 1, 'Selected criteria EC 02', 1, '2019-05-09 11:48:13'),
(28, 1, 1, 'Selected criteria EC 01', 1, '2019-05-09 11:48:13'),
(29, 1, 1, 'Added general quality score Muito Ruim', 1, '2019-05-09 11:48:50'),
(30, 1, 1, 'Added general quality score Ruim', 1, '2019-05-09 11:48:57'),
(31, 1, 1, 'Added general quality score Bom', 1, '2019-05-09 11:49:05'),
(32, 1, 1, 'Added general quality score Muito Bom', 1, '2019-05-09 11:49:13'),
(33, 1, 1, 'Added general quality score Excelente', 1, '2019-05-09 11:49:24'),
(34, 1, 1, 'Edited min general quality score to approved Bom', 1, '2019-05-09 11:49:26'),
(35, 1, 1, 'Added the question quality QQ 01', 1, '2019-05-09 11:49:45'),
(36, 1, 1, 'Edited the question quality QQ 01', 1, '2019-05-09 11:49:56'),
(37, 1, 1, 'Added the question quality QQ 02', 1, '2019-05-09 11:50:17'),
(38, 1, 1, 'Added the score quality Não', 1, '2019-05-09 11:50:41'),
(39, 1, 1, 'Added the score quality Parcial', 1, '2019-05-09 11:50:50'),
(40, 1, 1, 'Added the score quality Total', 1, '2019-05-09 11:51:01'),
(41, 1, 1, 'Added the score quality Não', 1, '2019-05-09 11:53:02'),
(42, 1, 1, 'Added the score quality Parcial', 1, '2019-05-09 11:53:09'),
(43, 1, 1, 'Added the score quality Total', 1, '2019-05-09 11:53:18'),
(44, 1, 1, 'Edited the minimum score quality ', 1, '2019-05-09 11:53:21'),
(45, 1, 1, 'Edited the minimum score quality ', 1, '2019-05-09 11:53:24'),
(46, 1, 1, 'Added question extraction QE 01', 1, '2019-05-09 11:53:41'),
(47, 1, 1, 'Added question extraction QE 02', 1, '2019-05-09 11:53:54'),
(48, 1, 1, 'Added option to question extraction QE 02', 1, '2019-05-09 11:54:02'),
(49, 1, 1, 'Added option to question extraction QE 02', 1, '2019-05-09 11:54:06'),
(50, 1, 1, 'Added option to question extraction QE 02', 1, '2019-05-09 11:54:20'),
(51, 1, 1, 'Added the database ACM', 1, '2019-05-09 11:56:31'),
(52, 1, 3, 'Delete papers at ACM for file ACMDL201905097245615.bib', 1, '2019-05-09 11:57:34'),
(53, 1, 3, 'Delete papers at IEEE for file ACMDL201905097245615.bib', 1, '2019-05-09 11:58:22'),
(54, 1, 3, 'Delete papers at IEEE for file ACMDL201905097245615.bib', 1, '2019-05-09 11:58:54'),
(55, 1, 3, 'Added 169 papers at IEEE for file ACMDL201905097245615.bib', 1, '2019-05-09 11:58:58'),
(56, 1, 3, 'Added 100 papers at IEEE for file ieee.bib', 1, '2019-05-09 12:01:06'),
(57, 1, 3, 'Delete papers at IEEE for file ACMDL201905097245615.bib', 1, '2019-05-09 12:01:11'),
(58, 1, 3, 'Added 169 papers at ACM for file ACMDL201905097245615.bib', 1, '2019-05-09 12:01:16'),
(59, 1, 3, 'Edited status selection 12 papers', 1, '2019-05-09 12:01:29'),
(60, 1, 3, 'Edited status selection to paper 169', 1, '2019-05-09 12:06:56'),
(61, 1, 3, 'Edited status selection to paper 170', 1, '2019-05-09 12:07:00'),
(62, 1, 3, 'Selected criteria EC 01 to paper 171', 1, '2019-05-09 12:07:05'),
(63, 1, 3, 'Selected criteria IC 02 to paper 172', 1, '2019-05-09 12:07:09'),
(64, 1, 3, 'Selected criteria EC 01 to paper 172', 1, '2019-05-09 12:07:10'),
(65, 1, 3, 'Selected criteria IC 01 to paper 173', 1, '2019-05-09 12:07:12'),
(66, 1, 3, 'Selected criteria EC 02 to paper 173', 1, '2019-05-09 12:07:13'),
(67, 1, 3, 'Deselected criteria EC 02 to paper 173', 1, '2019-05-09 12:07:15'),
(68, 1, 3, 'Selected criteria IC 01 to paper 174', 1, '2019-05-09 12:07:17'),
(69, 1, 3, 'Selected criteria IC 02 to paper 174', 1, '2019-05-09 12:07:19'),
(70, 1, 1, 'Edited the minimum score quality QQ 01', 1, '2019-05-09 12:08:49'),
(71, 1, 1, 'Edited the minimum score quality QQ 02', 1, '2019-05-09 12:08:51'),
(72, 1, 1, 'Edited the minimum score quality QQ 02', 1, '2019-05-09 12:09:13'),
(73, 1, 1, 'Edited the minimum score quality QQ 01', 1, '2019-05-09 12:09:15'),
(74, 1, 1, 'Edited the minimum score quality QQ 01', 1, '2019-05-09 12:09:31'),
(75, 1, 1, 'Edited the minimum score quality QQ 02', 1, '2019-05-09 12:09:34'),
(76, 1, 2, 'Logged in', NULL, '2019-05-09 16:16:53'),
(77, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:26:39'),
(78, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:33:39'),
(79, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:36:07'),
(80, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:36:45'),
(81, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:37:02'),
(82, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:37:18'),
(83, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:38:06'),
(84, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:38:09'),
(85, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:38:15'),
(86, 1, 3, 'Edited status quality to paper 174', 1, '2019-05-09 16:38:28'),
(87, 1, 3, 'Edited status quality to paper 174', 1, '2019-05-09 16:38:32'),
(88, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:38:35'),
(89, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:43:51'),
(90, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-09 16:43:54'),
(91, 1, 2, 'Logged in', NULL, '2019-05-09 16:58:09'),
(92, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 173', 1, '2019-05-09 18:09:30'),
(93, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 173', 1, '2019-05-09 18:15:42'),
(94, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 174', 1, '2019-05-09 18:19:16'),
(95, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-09 18:21:32'),
(96, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-09 18:24:38'),
(97, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-09 18:25:08'),
(98, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-09 19:01:56'),
(99, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-09 19:04:50'),
(100, 1, 1, 'Edited the minimum score quality QQ 02', 1, '2019-05-09 19:28:59'),
(101, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-09 19:42:38'),
(102, 1, 2, 'Logged in', NULL, '2019-05-10 00:57:24'),
(103, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 00:57:50'),
(104, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:01:52'),
(105, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:03:59'),
(106, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:06:14'),
(107, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 01:06:14'),
(108, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:14:30'),
(109, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 01:14:30'),
(110, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:15:56'),
(111, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 01:15:56'),
(112, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 173', 1, '2019-05-10 01:16:30'),
(113, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:18:21'),
(114, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 01:18:21'),
(115, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:22:42'),
(116, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 01:22:42'),
(117, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:24:30'),
(118, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 01:24:30'),
(119, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:27:33'),
(120, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 01:27:33'),
(121, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:29:57'),
(122, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 01:29:57'),
(123, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 01:29:57'),
(124, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 173', 1, '2019-05-10 01:30:40'),
(125, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 173', 1, '2019-05-10 01:30:40'),
(126, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 173', 1, '2019-05-10 01:30:40'),
(127, 1, 2, 'Logged in', NULL, '2019-05-10 10:32:52'),
(128, 1, 3, 'Selected criteria IC 01 to paper 173', 1, '2019-05-10 10:35:44'),
(129, 1, 3, 'Selected criteria IC 01 to paper 174', 1, '2019-05-10 10:35:47'),
(130, 1, 3, 'Selected criteria IC 02 to paper 174', 1, '2019-05-10 10:35:48'),
(131, 1, 3, 'Selected criteria EC 02 to paper 172', 1, '2019-05-10 10:35:51'),
(132, 1, 3, 'Selected criteria EC 01 to paper 172', 1, '2019-05-10 10:35:52'),
(133, 1, 3, 'Selected criteria EC 01 to paper 171', 1, '2019-05-10 10:35:54'),
(134, 1, 3, 'Selected criteria EC 02 to paper 171', 1, '2019-05-10 10:35:54'),
(135, 1, 3, 'Selected criteria IC 01 to paper 175', 1, '2019-05-10 10:35:57'),
(136, 1, 3, 'Selected criteria EC 02 to paper 176', 1, '2019-05-10 10:36:00'),
(137, 1, 3, 'Selected criteria IC 01 to paper 177', 1, '2019-05-10 10:36:04'),
(138, 1, 3, 'Selected criteria IC 01 to paper 178', 1, '2019-05-10 10:36:08'),
(139, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 10:54:11'),
(140, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 10:54:11'),
(141, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 10:58:50'),
(142, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 10:58:50'),
(143, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:01:09'),
(144, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:01:09'),
(145, 1, 3, 'Selected score Parcialto quality question QQ 02 to paper 173', 1, '2019-05-10 11:02:13'),
(146, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:02:26'),
(147, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:03:26'),
(148, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:03:26'),
(149, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:05:00'),
(150, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:05:00'),
(151, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:07:57'),
(152, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:07:57'),
(153, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:08:00'),
(154, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:09:48'),
(155, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:09:48'),
(156, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:09:50'),
(157, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:09:50'),
(158, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:09:55'),
(159, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:09:55'),
(160, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 173', 1, '2019-05-10 11:09:57'),
(161, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 173', 1, '2019-05-10 11:10:02'),
(162, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:10:02'),
(163, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:10:09'),
(164, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:10:12'),
(165, 1, 3, 'Selected score to quality question QQ 01 to paper 173', 1, '2019-05-10 11:10:13'),
(166, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:21:47'),
(167, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:21:47'),
(168, 1, 3, 'Selected score Parcialto quality question QQ 02 to paper 173', 1, '2019-05-10 11:21:53'),
(169, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:22:06'),
(170, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:22:09'),
(171, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:22:09'),
(172, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 173', 1, '2019-05-10 11:22:14'),
(173, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:22:16'),
(174, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:26:26'),
(175, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:26:26'),
(176, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:28:32'),
(177, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:28:32'),
(178, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:30:17'),
(179, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:30:17'),
(180, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:30:20'),
(181, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:30:20'),
(182, 1, 3, 'Selected score Parcialto quality question QQ 02 to paper 173', 1, '2019-05-10 11:30:26'),
(183, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:30:26'),
(184, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:30:59'),
(185, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:30:59'),
(186, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:31:05'),
(187, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:31:05'),
(188, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:31:12'),
(189, 1, 3, 'Selected score Parcialto quality question QQ 02 to paper 173', 1, '2019-05-10 11:31:15'),
(190, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 173', 1, '2019-05-10 11:31:17'),
(191, 1, 3, 'Selected score to quality question QQ 01 to paper 173', 1, '2019-05-10 11:31:19'),
(192, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:31:24'),
(193, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:47:47'),
(194, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:47:47'),
(195, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:47:47'),
(196, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:47:50'),
(197, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:47:51'),
(198, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:47:51'),
(199, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:48:01'),
(200, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:48:01'),
(201, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:48:02'),
(202, 1, 3, 'Selected score to quality question QQ 01 to paper 173', 1, '2019-05-10 11:48:18'),
(203, 1, 3, 'Selected score to quality question QQ 01 to paper 173', 1, '2019-05-10 11:48:18'),
(204, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:48:18'),
(205, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:48:27'),
(206, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:48:27'),
(207, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:48:27'),
(208, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:48:42'),
(209, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:48:42'),
(210, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:48:42'),
(211, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:50:00'),
(212, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:50:00'),
(213, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:50:13'),
(214, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:50:18'),
(215, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 173', 1, '2019-05-10 11:50:27'),
(216, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:50:27'),
(217, 1, 3, 'Selected score to quality question QQ 01 to paper 173', 1, '2019-05-10 11:50:55'),
(218, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:56:02'),
(219, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:56:02'),
(220, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:56:05'),
(221, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:56:05'),
(222, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:56:16'),
(223, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:56:16'),
(224, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:56:19'),
(225, 1, 3, 'Selected score Parcialto quality question QQ 02 to paper 173', 1, '2019-05-10 11:56:21'),
(226, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 173', 1, '2019-05-10 11:56:23'),
(227, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 173', 1, '2019-05-10 11:56:25'),
(228, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:56:25'),
(229, 1, 3, 'Selected score to quality question QQ 01 to paper 173', 1, '2019-05-10 11:56:27'),
(230, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 173', 1, '2019-05-10 11:56:37'),
(231, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:56:42'),
(232, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:56:42'),
(233, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 173', 1, '2019-05-10 11:56:46'),
(234, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:56:46'),
(235, 1, 3, 'Selected score Parcialto quality question QQ 02 to paper 173', 1, '2019-05-10 11:56:48'),
(236, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:56:50'),
(237, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 173', 1, '2019-05-10 11:56:53'),
(238, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 173', 1, '2019-05-10 11:56:54'),
(239, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:56:54'),
(240, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:56:57'),
(241, 1, 3, 'Selected score to quality question QQ 01 to paper 173', 1, '2019-05-10 11:56:59'),
(242, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:56:59'),
(243, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 11:57:03'),
(244, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:57:03'),
(245, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:57:06'),
(246, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:57:06'),
(247, 1, 3, 'Selected score to quality question QQ 01 to paper 173', 1, '2019-05-10 11:57:11'),
(248, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:57:11'),
(249, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 11:59:54'),
(250, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 11:59:54'),
(251, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 173', 1, '2019-05-10 11:59:56'),
(252, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 173', 1, '2019-05-10 12:13:36'),
(253, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 12:13:38'),
(254, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 173', 1, '2019-05-10 12:20:30'),
(255, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 12:20:43'),
(256, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 173', 1, '2019-05-10 12:23:35'),
(257, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 12:23:40'),
(258, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 12:23:40'),
(259, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 174', 1, '2019-05-10 12:23:48'),
(260, 1, 3, 'Edited status quality to paper 174', 1, '2019-05-10 12:23:48'),
(261, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 174', 1, '2019-05-10 12:23:48'),
(262, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 174', 1, '2019-05-10 12:23:48'),
(263, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 174', 1, '2019-05-10 12:23:48'),
(264, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 174', 1, '2019-05-10 12:23:50'),
(265, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 174', 1, '2019-05-10 12:23:50'),
(266, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 174', 1, '2019-05-10 12:23:50'),
(267, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 174', 1, '2019-05-10 12:23:50'),
(268, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 175', 1, '2019-05-10 12:23:57'),
(269, 1, 3, 'Edited status quality to paper 175', 1, '2019-05-10 12:23:57'),
(270, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 175', 1, '2019-05-10 12:23:57'),
(271, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 175', 1, '2019-05-10 12:23:57'),
(272, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 175', 1, '2019-05-10 12:23:57'),
(273, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 175', 1, '2019-05-10 12:23:57'),
(274, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 175', 1, '2019-05-10 12:23:59'),
(275, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 175', 1, '2019-05-10 12:23:59'),
(276, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 175', 1, '2019-05-10 12:23:59'),
(277, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 175', 1, '2019-05-10 12:23:59'),
(278, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 175', 1, '2019-05-10 12:23:59'),
(279, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 177', 1, '2019-05-10 12:24:04'),
(280, 1, 3, 'Edited status quality to paper 177', 1, '2019-05-10 12:24:04'),
(281, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 177', 1, '2019-05-10 12:24:05'),
(282, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 177', 1, '2019-05-10 12:24:05'),
(283, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 177', 1, '2019-05-10 12:24:05'),
(284, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 177', 1, '2019-05-10 12:24:05'),
(285, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 177', 1, '2019-05-10 12:24:05'),
(286, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 177', 1, '2019-05-10 12:24:07'),
(287, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 177', 1, '2019-05-10 12:24:07'),
(288, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 177', 1, '2019-05-10 12:24:07'),
(289, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 177', 1, '2019-05-10 12:24:07'),
(290, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 177', 1, '2019-05-10 12:24:07'),
(291, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 177', 1, '2019-05-10 12:24:07'),
(292, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 178', 1, '2019-05-10 12:24:11'),
(293, 1, 3, 'Edited status quality to paper 178', 1, '2019-05-10 12:24:11'),
(294, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 178', 1, '2019-05-10 12:24:11'),
(295, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 178', 1, '2019-05-10 12:24:11'),
(296, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 178', 1, '2019-05-10 12:24:12'),
(297, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 178', 1, '2019-05-10 12:24:12'),
(298, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 178', 1, '2019-05-10 12:24:12'),
(299, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 178', 1, '2019-05-10 12:24:12'),
(300, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 178', 1, '2019-05-10 12:24:13'),
(301, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 178', 1, '2019-05-10 12:24:13'),
(302, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 178', 1, '2019-05-10 12:24:13'),
(303, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 178', 1, '2019-05-10 12:24:13'),
(304, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 178', 1, '2019-05-10 12:24:13'),
(305, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 178', 1, '2019-05-10 12:24:13'),
(306, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 178', 1, '2019-05-10 12:24:14'),
(307, 1, 3, 'Selected criteria IC 01 to paper 181', 1, '2019-05-10 12:24:50'),
(308, 1, 3, 'Edited status quality to paper 181', 1, '2019-05-10 12:28:13'),
(309, 1, 3, 'Update note to paper 174', 1, '2019-05-10 12:31:13'),
(310, 1, 3, 'Update note to paper 174', 1, '2019-05-10 12:35:38'),
(311, 1, 3, 'Selected score to quality question QQ 01 to paper 173', 1, '2019-05-10 12:38:18'),
(312, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 12:38:18'),
(313, 1, 3, 'Selected score to quality question QQ 02 to paper 173', 1, '2019-05-10 12:38:20'),
(314, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 12:38:20'),
(315, 1, 3, 'Selected score to quality question QQ 01 to paper 175', 1, '2019-05-10 12:38:23'),
(316, 1, 3, 'Edited status quality to paper 175', 1, '2019-05-10 12:38:23'),
(317, 1, 3, 'Selected score to quality question QQ 01 to paper 175', 1, '2019-05-10 12:38:23'),
(318, 1, 3, 'Selected score to quality question QQ 01 to paper 177', 1, '2019-05-10 12:38:28'),
(319, 1, 3, 'Edited status quality to paper 177', 1, '2019-05-10 12:38:28'),
(320, 1, 3, 'Selected score to quality question QQ 01 to paper 177', 1, '2019-05-10 12:38:28'),
(321, 1, 3, 'Selected score to quality question QQ 01 to paper 177', 1, '2019-05-10 12:38:28'),
(322, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 173', 1, '2019-05-10 12:38:41'),
(323, 1, 3, 'Edited status quality to paper 173', 1, '2019-05-10 12:38:41'),
(324, 1, 3, 'Selected score Parcialto quality question QQ 02 to paper 173', 1, '2019-05-10 12:38:42'),
(325, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 175', 1, '2019-05-10 12:38:49'),
(326, 1, 3, 'Edited status quality to paper 175', 1, '2019-05-10 12:38:49'),
(327, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 175', 1, '2019-05-10 12:38:49'),
(328, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 175', 1, '2019-05-10 12:38:49'),
(329, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 177', 1, '2019-05-10 12:38:56'),
(330, 1, 3, 'Edited status quality to paper 177', 1, '2019-05-10 12:38:56'),
(331, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 177', 1, '2019-05-10 12:38:56'),
(332, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 177', 1, '2019-05-10 12:38:56'),
(333, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 177', 1, '2019-05-10 12:38:56'),
(334, 1, 1, 'Added member bolfeguilherme@gmail.com', 1, '2019-05-10 13:11:04'),
(335, 1, 1, 'Added member lucianomarchezan94@gmail.com', 1, '2019-05-10 13:11:13'),
(336, 11, 2, 'Logged in', NULL, '2019-05-10 13:12:13'),
(337, 11, 2, 'Logged out', NULL, '2019-05-10 13:13:16'),
(338, 5, 2, 'Logged in', NULL, '2019-05-10 13:13:33'),
(339, 5, 3, 'Selected criteria IC 01 to paper 169', 1, '2019-05-10 13:13:51'),
(340, 5, 3, 'Selected criteria IC 01 to paper 170', 1, '2019-05-10 13:13:58'),
(341, 5, 3, 'Selected criteria IC 01 to paper 171', 1, '2019-05-10 13:14:05'),
(342, 5, 3, 'Selected criteria IC 01 to paper 172', 1, '2019-05-10 13:14:08'),
(343, 5, 3, 'Edited status selection 12 papers', 1, '2019-05-10 13:14:37'),
(344, 5, 3, 'Selected criteria IC 01 to paper 173', 1, '2019-05-10 13:14:42'),
(345, 1, 3, 'Delete papers at IEEE for file ieee.bib', 1, '2019-05-10 13:15:23'),
(346, 1, 3, 'Delete papers at ACM for file ACMDL201905097245615.bib', 1, '2019-05-10 13:15:25'),
(347, 1, 3, 'Added 100 papers at IEEE for file ieee.bib', 1, '2019-05-10 13:15:31'),
(348, 1, 3, 'Added 169 papers at ACM for file ACMDL201905097245615.bib', 1, '2019-05-10 13:15:37'),
(349, 1, 3, 'Edited status selection 12 papers', 1, '2019-05-10 13:15:42'),
(350, 5, 3, 'Edited status selection 12 papers', 1, '2019-05-10 13:16:12'),
(351, 5, 3, 'Selected criteria IC 01 to paper 439', 1, '2019-05-10 13:16:16'),
(352, 5, 3, 'Selected criteria IC 01 to paper 438', 1, '2019-05-10 13:16:19'),
(353, 5, 3, 'Selected criteria IC 01 to paper 440', 1, '2019-05-10 13:16:22'),
(354, 5, 3, 'Selected criteria IC 01 to paper 441', 1, '2019-05-10 13:16:27'),
(355, 1, 3, 'Selected criteria IC 01 to paper 438', 1, '2019-05-10 13:16:33'),
(356, 1, 3, 'Selected criteria IC 01 to paper 439', 1, '2019-05-10 13:16:38'),
(357, 1, 3, 'Selected criteria IC 01 to paper 440', 1, '2019-05-10 13:16:40'),
(358, 1, 3, 'Selected criteria IC 01 to paper 441', 1, '2019-05-10 13:16:43'),
(359, 1, 3, 'Delete papers at IEEE for file ieee.bib', 1, '2019-05-10 13:20:04'),
(360, 1, 3, 'Delete papers at ACM for file ACMDL201905097245615.bib', 1, '2019-05-10 13:20:06'),
(361, 1, 3, 'Added 169 papers at IEEE for file ACMDL201905097245615.bib', 1, '2019-05-10 13:20:11'),
(362, 1, 3, 'Delete papers at IEEE for file ACMDL201905097245615.bib', 1, '2019-05-10 13:20:13'),
(363, 1, 3, 'Added 100 papers at IEEE for file ieee.bib', 1, '2019-05-10 13:20:18'),
(364, 1, 3, 'Added 169 papers at IEEE for file ACMDL201905097245615.bib', 1, '2019-05-10 13:20:23'),
(365, 1, 3, 'Delete papers at IEEE for file ACMDL201905097245615.bib', 1, '2019-05-10 13:20:26'),
(366, 1, 3, 'Added 169 papers at ACM for file ACMDL201905097245615.bib', 1, '2019-05-10 13:20:32'),
(367, 1, 3, 'Edited status selection 12 papers', 1, '2019-05-10 13:20:40'),
(368, 5, 3, 'Edited status selection 12 papers', 1, '2019-05-10 13:20:56'),
(369, 5, 3, 'Added 100 papers at IEEE for file ieee.bib', 1, '2019-05-10 13:31:03'),
(370, 5, 3, 'Delete papers at IEEE for file ieee.bib', 1, '2019-05-10 13:33:24'),
(371, 5, 3, 'Added 100 papers at IEEE for file ieee.bib', 1, '2019-05-10 13:33:31'),
(372, 1, 3, 'Added 169 papers at ACM for file ACMDL201905097245615.bib', 1, '2019-05-10 13:34:02'),
(373, 1, 3, 'Edited status selection 12 papers', 1, '2019-05-10 13:34:06'),
(374, 5, 3, 'Edited status selection 12 papers', 1, '2019-05-10 13:34:47'),
(375, 1, 3, 'Selected criteria IC 01 to paper 1414', 1, '2019-05-10 13:35:18'),
(376, 5, 3, 'Selected criteria EC 01 to paper 1414', 1, '2019-05-10 13:35:24'),
(377, 1, 3, 'Resolved conflict to paper 1414', 1, '2019-05-10 13:40:43'),
(378, 1, 3, 'Deselected criteria IC 01 to paper 1414', 1, '2019-05-10 13:42:26'),
(379, 1, 3, 'Edited status selection to paper 1414', 1, '2019-05-10 13:42:28'),
(380, 1, 3, 'Resolved conflict to paper 1414', 1, '2019-05-10 13:42:38'),
(381, 1, 3, 'Selected criteria IC 01 to paper 1415', 1, '2019-05-10 13:42:47'),
(382, 1, 3, 'Selected criteria IC 01 to paper 1416', 1, '2019-05-10 13:42:50'),
(383, 1, 3, 'Selected criteria IC 01 to paper 1417', 1, '2019-05-10 13:42:54'),
(384, 5, 3, 'Selected criteria IC 01 to paper 1415', 1, '2019-05-10 13:43:06'),
(385, 5, 3, 'Selected criteria IC 01 to paper 1416', 1, '2019-05-10 13:43:09'),
(386, 5, 3, 'Selected criteria IC 01 to paper 1417', 1, '2019-05-10 13:43:12'),
(387, 1, 3, 'Selected score Parcialto quality question QQ 01 to paper 1415', 1, '2019-05-10 13:43:39'),
(388, 1, 3, 'Edited status quality to paper 1415', 1, '2019-05-10 13:43:39'),
(389, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 1415', 1, '2019-05-10 13:43:41'),
(390, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 1416', 1, '2019-05-10 13:43:46'),
(391, 1, 3, 'Edited status quality to paper 1416', 1, '2019-05-10 13:43:46'),
(392, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 1416', 1, '2019-05-10 13:43:46'),
(393, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 1416', 1, '2019-05-10 13:43:48'),
(394, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 1416', 1, '2019-05-10 13:43:48'),
(395, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 1417', 1, '2019-05-10 13:43:51'),
(396, 1, 3, 'Edited status quality to paper 1417', 1, '2019-05-10 13:43:51'),
(397, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 1417', 1, '2019-05-10 13:43:51'),
(398, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 1417', 1, '2019-05-10 13:43:51'),
(399, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 1417', 1, '2019-05-10 13:43:53'),
(400, 1, 3, 'Edited status quality to paper 1417', 1, '2019-05-10 13:43:53'),
(401, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 1417', 1, '2019-05-10 13:43:53'),
(402, 1, 3, 'Selected score Totalto quality question QQ 01 to paper 1417', 1, '2019-05-10 13:43:53'),
(403, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 1417', 1, '2019-05-10 13:43:56'),
(404, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 1417', 1, '2019-05-10 13:43:56'),
(405, 1, 3, 'Selected score Totalto quality question QQ 02 to paper 1417', 1, '2019-05-10 13:43:56'),
(406, 5, 3, 'Selected score Nãoto quality question QQ 01 to paper 1415', 1, '2019-05-10 13:44:16'),
(407, 5, 3, 'Edited status quality to paper 1415', 1, '2019-05-10 13:44:16'),
(408, 5, 3, 'Selected score Totalto quality question QQ 02 to paper 1415', 1, '2019-05-10 13:44:18'),
(409, 5, 3, 'Selected score Totalto quality question QQ 01 to paper 1416', 1, '2019-05-10 13:44:23'),
(410, 5, 3, 'Edited status quality to paper 1416', 1, '2019-05-10 13:44:23'),
(411, 5, 3, 'Selected score Totalto quality question QQ 01 to paper 1416', 1, '2019-05-10 13:44:23'),
(412, 5, 3, 'Selected score Nãoto quality question QQ 02 to paper 1416', 1, '2019-05-10 13:44:26'),
(413, 5, 3, 'Selected score Nãoto quality question QQ 02 to paper 1416', 1, '2019-05-10 13:44:26'),
(414, 5, 3, 'Selected score Totalto quality question QQ 01 to paper 1417', 1, '2019-05-10 13:44:29'),
(415, 5, 3, 'Edited status quality to paper 1417', 1, '2019-05-10 13:44:29'),
(416, 5, 3, 'Selected score Totalto quality question QQ 01 to paper 1417', 1, '2019-05-10 13:44:29'),
(417, 5, 3, 'Selected score Totalto quality question QQ 01 to paper 1417', 1, '2019-05-10 13:44:29'),
(418, 5, 3, 'Selected score Totalto quality question QQ 02 to paper 1417', 1, '2019-05-10 13:44:31'),
(419, 5, 3, 'Selected score Totalto quality question QQ 02 to paper 1417', 1, '2019-05-10 13:44:32'),
(420, 5, 3, 'Selected score Totalto quality question QQ 02 to paper 1417', 1, '2019-05-10 13:44:32'),
(421, 1, 3, 'Resolved conflict to paper 1415', 1, '2019-05-10 14:00:23'),
(422, 1, 3, 'Resolved conflict to paper 1416', 1, '2019-05-10 14:00:43'),
(423, 1, 3, 'Selected criteria IC 01 to paper 1418', 1, '2019-05-10 14:02:01'),
(424, 5, 3, 'Selected criteria IC 01 to paper 1418', 1, '2019-05-10 14:02:13'),
(425, 5, 3, 'Edited status quality to paper 1418', 1, '2019-05-10 14:02:20'),
(426, 1, 3, 'Selected score Nãoto quality question QQ 01 to paper 1418', 1, '2019-05-10 14:02:37'),
(427, 1, 3, 'Edited status quality to paper 1418', 1, '2019-05-10 14:02:37'),
(428, 1, 3, 'Selected score Nãoto quality question QQ 02 to paper 1418', 1, '2019-05-10 14:02:39'),
(429, 1, 3, 'Resolved conflict to paper 1418', 1, '2019-05-10 14:03:12'),
(430, 1, 2, 'Logged out', NULL, '2019-05-10 14:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `bib_upload`
--

CREATE TABLE `bib_upload` (
  `id_bib` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project_database` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bib_upload`
--

INSERT INTO `bib_upload` (`id_bib`, `name`, `id_project_database`) VALUES
(14, 'ieee.bib', 1),
(15, 'ACMDL201905097245615.bib', 2);

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
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
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id_criteria`, `id`, `description`, `pre_selected`, `id_project`, `type`) VALUES
(1, 'IC 01', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 1, 1, 'Inclusion'),
(2, 'IC 02', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 0, 1, 'Inclusion'),
(3, 'EC 01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 1, 'Exclusion'),
(4, 'EC 02', 'ulla congue, ligula non scelerisque ornare, arcu erat condimentum tortor, vel tincidunt ante erat ac nulla. Phasellus et efficitur leo, nec eleifend est. ', 0, 1, 'Exclusion');

-- --------------------------------------------------------

--
-- Table structure for table `data_base`
--

CREATE TABLE `data_base` (
  `id_database` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_base`
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
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `id_domain` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`id_domain`, `description`, `id_project`) VALUES
(1, 'Dominio 01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_criteria`
--

CREATE TABLE `evaluation_criteria` (
  `id_evaluation_criteria` int(11) NOT NULL,
  `id_paper` int(11) NOT NULL,
  `id_criteria` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evaluation_criteria`
--

INSERT INTO `evaluation_criteria` (`id_evaluation_criteria`, `id_paper`, `id_criteria`, `id_member`) VALUES
(34, 1415, 3, 3),
(35, 1416, 1, 1),
(36, 1417, 1, 1),
(37, 1418, 1, 1),
(38, 1416, 1, 3),
(39, 1417, 1, 3),
(40, 1418, 1, 3),
(41, 1419, 1, 1),
(42, 1419, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_qa`
--

CREATE TABLE `evaluation_qa` (
  `id_ev_qa` int(11) NOT NULL,
  `id_qa` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_score_qa` int(11) NOT NULL,
  `id_paper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evaluation_qa`
--

INSERT INTO `evaluation_qa` (`id_ev_qa`, `id_qa`, `id_member`, `id_score_qa`, `id_paper`) VALUES
(89, 1, 1, 2, 1416),
(90, 2, 1, 4, 1416),
(91, 1, 1, 1, 1417),
(92, 2, 1, 6, 1417),
(93, 1, 1, 3, 1418),
(94, 2, 1, 6, 1418),
(95, 1, 3, 1, 1416),
(96, 2, 3, 6, 1416),
(97, 1, 3, 3, 1417),
(98, 2, 3, 4, 1417),
(99, 1, 3, 3, 1418),
(100, 2, 3, 6, 1418),
(101, 1, 1, 1, 1419),
(102, 2, 1, 4, 1419);

-- --------------------------------------------------------

--
-- Table structure for table `exclusion_rule`
--

CREATE TABLE `exclusion_rule` (
  `id_exclusion_rule` int(11) NOT NULL,
  `id_rule` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exclusion_rule`
--

INSERT INTO `exclusion_rule` (`id_exclusion_rule`, `id_rule`, `id_project`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `general_score`
--

CREATE TABLE `general_score` (
  `id_general_score` int(11) NOT NULL,
  `start` float NOT NULL,
  `end` float NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_score`
--

INSERT INTO `general_score` (`id_general_score`, `start`, `end`, `description`, `id_project`) VALUES
(1, 0, 1, 'Muito Ruim', 1),
(2, 1.1, 2, 'Ruim', 1),
(3, 2.1, 3, 'Bom', 1),
(4, 3.1, 4, 'Muito Bom', 1),
(5, 4.1, 5, 'Excelente', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inclusion_rule`
--

CREATE TABLE `inclusion_rule` (
  `id_inclusion_rule` int(11) NOT NULL,
  `id_rule` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inclusion_rule`
--

INSERT INTO `inclusion_rule` (`id_inclusion_rule`, `id_rule`, `id_project`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `id_keyword` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`id_keyword`, `description`, `id_project`) VALUES
(1, 'Palavra Chave 01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id_language` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id_language`, `description`) VALUES
(1, 'Portuguese'),
(2, 'English'),
(3, 'Spanish'),
(4, 'French'),
(5, 'Russian');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id_level` int(11) NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Viewer'),
(3, 'Researcher'),
(4, 'Reviser');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_members` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_members`, `id_user`, `id_project`, `level`) VALUES
(1, 1, 1, 1),
(2, 11, 1, 4),
(3, 5, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `min_to_app`
--

CREATE TABLE `min_to_app` (
  `id_min_to_app` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_general_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `min_to_app`
--

INSERT INTO `min_to_app` (`id_min_to_app`, `id_project`, `id_general_score`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `description`) VALUES
(1, 'Planning'),
(2, 'User Management'),
(3, 'Conducting');

-- --------------------------------------------------------

--
-- Table structure for table `options_extraction`
--

CREATE TABLE `options_extraction` (
  `id_option` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_de` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options_extraction`
--

INSERT INTO `options_extraction` (`id_option`, `description`, `id_de`) VALUES
(1, 'Curabitur ', 2),
(2, 'rutrum ', 2),
(3, 'Molestie ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
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
  `check_status_selection` tinyint(1) NOT NULL DEFAULT '0',
  `status_qa` int(11) NOT NULL,
  `id_gen_score` int(11) NOT NULL,
  `check_qa` tinyint(1) NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id_paper`, `id_bib`, `title`, `author`, `book_title`, `volume`, `pages`, `num_pages`, `abstract`, `keywords`, `doi`, `journal`, `issn`, `location`, `isbn`, `address`, `type`, `bib_key`, `url`, `publisher`, `year`, `added_at`, `update_at`, `data_base`, `id`, `status_selection`, `check_status_selection`, `status_qa`, `id_gen_score`, `check_qa`, `score`) VALUES
(1415, 14, 'The control system of KHz SLR under Windows\' XP environment', 'X. Dong and X. Han and C. Fan and C. Liu', '2012 International Conference on Systems and Informatics (ICSAI2012)', '', '474-477', '', 'This paper introduces the principles, composing, and control system (hardware and software control) of Satellite Laser Ranging (SLR) system on real-time at Kilohertz rate under Windows XP environment. The method used in this system is designed for different frequency, and the theory concerned in this paper is different from the traditional one. The hardware and software design are specified partly in this paper. The system provides good practicability, strong dependability, and wide compatibility. At last, the observing result under this control system is shown for the readers.', 'artificial satellites;control engineering computing;laser ranging;satellite tracking;user interfaces;control system;KHz SLR;Windows XP environment;hardware control;software control;satellite laser ranging system;kilohertz rate;system design;hardware design;software design;Logic gates;Control systems;Lasers;Fires;Distance measurement;Satellites;Software;Windows XP;Repeat Frequency;SLR;Real-Time', '10.1109/ICSAI.2012.6223039', '', '', '', '', '', 'inproceedings', '6223039', '', '', '2012', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1414, 5, 1, 3, 1, 0, 0),
(1416, 14, 'Construction of SLR(1) Parser with Error Diagnosis and Recovery Mechanism', 'H. Luo', '2013 5th International Conference on Intelligent Human-Machine Systems and Cybernetics', '1', '144-146', '', 'SLR(1) parser is a kind of important formal syntax parser. Error diagnosis and recovery mechanism is very important to SLR(1) parser. Without error diagnosis and recovery mechanism, SLR(1) parser will be paralyzed when syntax errors are confronted. With error diagnosis and recovery mechanism, syntax errors can be promptly reported and SLR(1) parser can recover from errors as soon as possible when syntax errors are confronted. In this article, two of kinds of methods of constructing error diagnosis and recovery mechanism were introduced and the syntax parsing process of SLR(1) parser with each kind of error diagnosis and recovery mechanism was analyzed by an example. The two of kinds of methods of constructing error diagnosis and recovery mechanism are not only applied to SLR(1) parser but also applied to other LR parser.', 'formal specification;program compilers;program diagnostics;SLR(1) parser;error diagnosis;recovery mechanism;formal syntax parser;LR parser;syntax errors;Syntactics;Grammar;Law;Educational institutions;Presses;Computers;SLR(1) parser;error dignosis and recover mechnism;SLR(1) parsing list;error processing procedure', '10.1109/IHMSC.2013.41', '', '', '', '', '', 'inproceedings', '6643853', '', '', '2013', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1415, 1, 0, 1, 2, 1, 1.875),
(1417, 14, 'Gravity Probe-B: New Methods to Determine Spin Parameters From kHz SLR Data', 'G. Kirchner and D. Kucharski and E. Cristea', '', '47', '370-375', '', 'Using kilohertz data of the satellite laser ranging (SLR) station Graz only, the spin parameters of the Gravity Probe-B (GP-B) satellite are derived; these include the spin period over the course of the 1.5-year mission period, as well as spin direction and spin axis orientation. The results are compared to the actual data sets-as determined by the GP-B mission itself-thus allowing independent confirmation of the kilohertz SLR derived results.', 'celestial mechanics;geophysical techniques;laser ranging;kilohertz SLR data;satellite laser ranging station Graz;Gravity Probe-B satellite;spin direction;spin axis orientation;spin period;Gravity;Satellites;Extraterrestrial measurements;Vehicles;Earth;Spinning;Ring lasers;Optical pulses;Pulse measurements;Gunshot detection systems;Gravity Probe-B (GP-B);kilohertz satellite laser ranging (SLR);spectral analysis;spin axis orientation;spin direction;spin rate;Gravity Probe-B (GP-B);kilohertz satellite laser ranging (SLR);spectral analysis;spin axis orientation;spin direction;spin rate', '10.1109/TGRS.2008.2002770', 'IEEE Transactions on Geoscience and Remote Sensing', '', '', '', '', 'article', '4674628', '', '', '2009', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1416, 1, 0, 2, 3, 1, 2.5),
(1418, 14, 'A compact five-band SLR type metamaterial', 'O. Yurduseven and A. E. Yilmaz and G. Turhan-Sayan', '2012 6th European Conference on Antennas and Propagation (EUCAP)', '', '2865-2867', '', 'In this paper, a novel single-loop resonator (SLR) type metamaterial topology is proposed with five distinct resonance frequencies placed within the frequency band from 2.8 GHz to 5.1 GHz displaying two e-negative (ENG) and three �-negative (MNG) bands. This new SLR unit cell is obtained by slightly modifying the geometrical structure of the square-shaped SLR that is recently reported in literature with only three resonances. Transmission and reflection characteristics of both standard square-shaped SLR and its newly modified version are simulated by two different full wave electromagnetic solvers, Ansoft\'s HFSS and CST Microwave Studio, to verify the accuracy of numerical results. Effective permittivity and permeability parameters of these metamaterial structures are retrieved from simulated complex scattering parameters to verify the presence of distinct ENG and MNG regions. E-field distributions are computed over the conductive strips to investigate the mechanism of resonances. Finally, effects of substrate permittivity and substrate thickness on the values of resonance frequencies are inspected parametrically for the novel SLR topology.', 'metamaterials;resonance;topology;compact five-band SLR type metamaterial;single-loop resonator;metamaterial topology;resonance frequencies;geometrical structure;transmission characteristics;reflection characteristics;wave electromagnetic solvers;frequency 2.8 GHz to 5.1 GHz;Resonant frequency;Metamaterials;Magnetic materials;Standards;Permittivity;Strips;Substrates;Metamaterials;negative permittivity;negative permeability;single loop resonator (SLR)', '10.1109/EuCAP.2012.6206040', '', '', '', '', '', 'inproceedings', '6206040', '', '', '2012', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1417, 1, 0, 1, 5, 0, 5),
(1419, 14, 'Analysis of Twitter research trends based on SLR', 'I. Ha and H. Park and C. Kim', '16th International Conference on Advanced Communication Technology', '', '774-778', '', 'With the increasing interest in micro blogging services, extensive research has focused on Twitter for a variety of purposes. For effective research on Twitter, an investigation of academic research papers related with Twitter will be required in order to analyze research trends. However, it is not easy to review the vast data. Therefore, we extract the representative literature related to Twitter and investigate the trends in Twitter research by using the systematic literature review (SLR) method. The five most popular resource sites are selected to collect Twitter-related literature and the 106 papers selected based on SLR are analyzed to study interesting trends in Twitter research. To classify the research area, the selected papers are divided into five main research categories according to research topics. In addition, other valuable results such as the inclination of the authors are also understood.', 'social networking (online);Twitter research trends analysis;microblogging services;academic research papers;systematic literature review;SLR method;resource sites;Twitter-related literature;research area classification;Twitter;Market research;Educational institutions;Computers;Data mining;Unsolicited electronic mail;Systematics;Twitter;Twitter research;tweet;research trend;SNS;SLR', '10.1109/ICACT.2014.6779067', '', '', '', '', '', 'inproceedings', '6779067', '', '', '2014', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1418, 1, 0, 2, 1, 1, 0),
(1420, 14, 'Development of compact SLR BPF with cross-shaped I/O coupling', 'A. Munir and Edwar', '2017 International Symposium on Antennas and Propagation (ISAP)', '', '1-2', '', 'This paper deals with the development of compact square-loop-resonator (SLR) bandpass filter (BPF) with cross-shaped input/output (I/O) coupling. The proposed filter is designed for X-band frequency application with the center frequency of 9GHz and the -3dB fractional bandwidth larger than 4%. It is deployed on a 1.9mm thick high permittivity RT/duroid� 6010.2LM dielectric substrate with the dimension of 15mm � 15mm. From the characterization, it shows that the realized BPF has the -3dB working bandwidth of 427MHz ranges from the frequency of 8.82GHz to 9.247GHz comparable with the simulated one which has the -3dB working bandwidth of 571MHz ranges from the frequency of 8.729GHz to 9.3GHz.', 'band-pass filters;microwave filters;microwave resonators;resonator filters;waveguide couplers;compact SLR BPF;compact square-loop-resonator bandpass filter;X-band frequency application;RT/duroid� 6010.2LM dielectric substrate;cross-shaped input/output coupling;frequency 8.82 GHz to 9.247 GHz;frequency 8.729 GHz to 9.3 GHz;frequency 9.0 GHz;bandwidth 427.0 MHz;bandwidth 571.0 MHz;Band-pass filters;Couplings;Bandwidth;Frequency measurement;Resonant frequency;Dielectric substrates;Dielectric loss measurement;Bandpass Filter (BPF);cross-shaped I/O coupling;Square-Loop-Resonator (SLR);X-band frequency', '10.1109/ISANP.2017.8229061', '', '', '', '', '', 'inproceedings', '8229061', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1419, 3, 0, 3, 1, 0, 0),
(1421, 14, 'Test data on high-precision laser equipment for synchronization of the time scales of distributed SLR-stations and GLONASS satellite', 'M. V. Baryshnikov and A. S. Zhabin and S. A. Martynov and M. A. Sadovn�kov and A. A. Chubykin and V. D. Shargorodskiy', '2016 International Conference Laser Optics (LO)', '', 'R6-6-R6-6', '', 'This report represents results of high-precision (with the error of no more than 100 ps) comparison between the time scales of distributed SLR-stations using a GLONASS satellite equipped with the retroreflector system and laser pulse photodetector and also provides the guidelines to increase the LTT availability based on the use of a radio laser network.', 'laser ranging;optical communication equipment;photodetectors;radio networks;retroreflectors;satellite navigation;radio laser network;laser pulse photodetector;retroreflector system;GLONASS satellite;distributed SLR-stations;time scale synchronization;high-precision laser equipment;test data;Laser applications;Satellites;Satellite broadcasting;Photodetectors;Guidelines;Distance measurement;SLR;laser time transfer;laser ranging network;radio laser system', '10.1109/LO.2016.7549808', '', '', '', '', '', 'inproceedings', '7549808', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1420, 3, 0, 3, 1, 0, 0),
(1422, 14, 'Analysis of multilayer microstrip line of finite conductor thickness using Quasi-Static Spectral Domain Analysis (SDA) and Single Layer Reduction (SLR) method', 'P. Singh and A. K. Verma', '2011 Annual IEEE India Conference', '', '1-4', '', 'This paper presents a study of Multilayer Microstrip line of finite conductor thickness using Quasi-Static Spectral Domain Analysis (SDA) method. The finite conductor thickness of the strip is replaced by two parallel strips of zero conductor thickness. The Green\'s function for the multilayer microstrip line in Fourier domain is obtained by Transverse Transmission Line (TTL) technique. Galerkin\'s method is applied to find the effective dielectric constant and impedance. Dielectric Loss of multilayer microstrip line is calculated by converting multilayer microstrip line structure into single layer microstrip line using Single Layer Reduction (SLR) method. The Conductor Loss of microstrip line is calculated by Wheeler\'s incremental inductance method. The effect of finite conductor thickness is also analysed on the impedance, effective relative permittivity, dielectric loss and conductor loss.', 'Galerkin method;Green\'s function methods;microstrip lines;permittivity;multilayer microstrip line;finite conductor thickness;quasistatic spectral domain analysis;SDA method;single-layer reduction method;SLR method;Green function;Fourier domain;transverse transmission line technique;TTL technique;Galerkin method;dielectric constant;dielectric loss;single-layer microstrip line;Wheeler incremental inductance method;relative permittivity;conductor loss;Conductors;Microstrip;Dielectric losses;Nonhomogeneous media;Strips;Impedance;Quasi-Static Spectral Domain Analysis (SDA);Multilayer Microstrip Line;Single Layer Reduction (SLR);Transverse Transmission Line (TTL);Dielectric Loss;Conductor Loss', '10.1109/INDCON.2011.6139416', '', '', '', '', '', 'inproceedings', '6139416', '', '', '2011', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1421, 3, 0, 3, 1, 0, 0),
(1423, 14, 'Using Pulse Position Modulation in SLR stations to transmit data to satellites', 'G. Kirchner and F. Koidl and D. Kucharski and W. Steinegger and E. Leitgeb', 'Proceedings of the 11th International Conference on Telecommunications', '', '447-450', '', 'Satellite Laser Ranging (SLR) Stations determine distances to satellites by measuring the time-of-flight of short (10 ps to 100 ps) laser pulses, reflected from corner cube reflectors (CCR) on satellites. The laser repetition rates vary from 10 Hz to 2 kHz. At the Graz 2 kHz SLR station, we upgraded the software to modulate the - usually constant - interval between laser pulses; using such a Pulse Position Modulation (PPM) scheme, we successfully transmitted text files via a 4288 m distant CCR back to a Multi-Pixel Photon Counting (MPPC) module in our receiver telescope. With such a setup at any SLR station, and a suitable detector plus simple time tagging electronics at Low Earth Orbiting (LEO; <; 1000 km) satellites, it is possible for any kHz SLR station to transmit data to satellites with a rate of up to 2 kBytes/s - even during standard SLR tracking. As this technique is easy to implement and does not affect routine kHz SLR tracking, it can be applied to upload data to satellites, using the more than 30 available SLR stations around the world, and with higher data rates than some of the conventional microwave uplinks.', 'laser ranging;optical communication;optical tracking;photon counting;pulse position modulation;satellite communication;satellite tracking;pulse position modulation;SLR stations;satellite laser ranging stations;short laser pulses;corner cube reflectors;PPM scheme;multipixel photon counting module;low earth orbiting satellite;time tagging electronics;detector;receiver telescope;SLR tracking;microwave uplinks;time 10 ps to 100 ps;frequency 10 Hz to 2 kHz;Photonics;Lasers;Low earth orbit satellites;Detectors;Laser beams;Laser noise', '', '', '', '', '', '', 'inproceedings', '5969971', '', '', '2011', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1422, 3, 0, 3, 1, 0, 0),
(1424, 14, 'The Impact of Solar Irradiance on AJISAI\'s Spin Period Measured by the Graz 2-kHz SLR System', 'D. Kucharski and G. Kirchner and T. Otsubo and F. Koidl', '', '48', '1629-1633', '', 'The Graz kHz Satellite Laser Ranging (SLR) system is the first system operating with a 2-kHz-repetition-rate laser. Using Graz 2-kHz SLR data only, we applied a new analytical approach to determine the spin period of the passive satellite AJISAI. This method analyzes the range measurements to the single corner-cube-reflector panels of AJISAI, allowing accurate determination of an actual attitude of this satellite during day and night. Using Graz kHz SLR data of more than five years, we processed 877 passes of AJISAI (October 9, 2003-December 22, 2008) and calculated its spin period ( ~ 2 s) with an accuracy of 0.0042% (84 �s). This spin period (T) is increasing, following an exponential trend:T =1.9028 �Exp (0.014859 . (Year - 2003.0)) s. This slow down is mainly caused by the gravitational and magnetic fields of the Earth. The high accuracy allows, for the first time, the detection of small perturbations of the spin period caused by nongravitational effects related to the solar energy flux to which the satellite is exposed.', 'aerospace instrumentation;artificial satellites;laser ranging;remote sensing by laser beam;solar radiation;solar irradiance;satellite spin period;Graz SLR system;Graz Satellite Laser Ranging system;AJISAI passive satellite;range measurement;AD 2003 10 09 to 2008 12 22;Earth gravitational field;Earth magnetic field;solar energy flux;frequency 2 kHz;time 84 mus;Satellites;Photometry;Mirrors;Position measurement;Magnetic fields;Earth;Solar energy;Ring lasers;Extraterrestrial measurements;AJISAI;Graz kHz SLR;nongravitational perturbation;satellite laser ranging (SLR);satellite spin', '10.1109/TGRS.2009.2031229', 'IEEE Transactions on Geoscience and Remote Sensing', '', '', '', '', 'article', '5290038', '', '', '2010', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1423, 3, 0, 3, 1, 0, 0),
(1425, 14, 'Evaluation of DTRF2014, ITRF2014, and JTRF2014 by Precise Orbit Determination of SLR Satellites', 'S. Rudenko and M. Blo�feld and H. M�ller and D. Dettmering and D. Angermann and M. Seitz', '', '56', '3148-3158', '', 'In 2016, three new realizations of the International Terrestrial Reference System (ITRS), namely, DTRF2014, ITRF2014, and JTRF2014, have been released. In this paper, we evaluate these ITRS realizations for precise orbit determination of ten high and low Earth orbiting geodetic satellites using satellite laser ranging (SLR) observations. We show the reduction of observation residuals and estimated range biases, when using these new ITRS realizations, as compared with the previous ITRS realization for SLR stations-SLRF2008. Thus, the mean SLR root-mean-square (RMS) fits reduce (improve), on average over all satellites tested, by 3%, 3.6%, 8.1%, and 7.7% at 1993.0-2015.0, when using ITRF2014, DTRF2014, and DTRF2014 with non-tidal loading (NTL), and JTRF2014 realizations, respectively. The improvement of the RMS fits is even larger at 2015.0-2017.0: 14% and 15.5% using ITRF2014 and DTRF2014, respectively. For the altimetry satellite Jason-2, we found improvements in the RMS and mean of the sea surface height crossover differences with the new ITRS realizations, as compared with SLRF2008. We show that JTRF2014, after an editing done for SLR stations Conception and Zimmerwald, and DTRF2014 with NTL corrections result in the smallest RMS and absolute mean fits of SLR observations indicating the best performance among the ITRS realizations tested, while using SLRF2008 and ITRF2014 causes a 0.2-0.3 mm/y trend in the mean of SLR fits at 2001.0-2017.0.', 'artificial satellites;geodesy;oceanographic techniques;DTRF2014;ITRF2014;precise orbit determination;ITRS realizations;high Earth orbiting geodetic satellites;low Earth orbiting geodetic satellites;previous ITRS realization;mean SLR root-mean-square;JTRF2014 realizations;SLR observations;AD 2016;International Terrestrial Reference System;satellite laser ranging observations;nontidal loading;altimetry satellite Jason-2;sea surface height crossover differences;Conception;Zimmerwald;Satellites;Atmospheric modeling;Earth;Computational modeling;Time series analysis;Planetary orbits;Altimetry;DTRF2014;ITRF2014;Jason-2;JTRF2014;LAGEOS;orbit determination;satellite laser ranging (SLR);space geodesy;Starlette;terrestrial reference frames (TRFs)', '10.1109/TGRS.2018.2793358', 'IEEE Transactions on Geoscience and Remote Sensing', '', '', '', '', 'article', '8307769', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1424, 3, 0, 3, 1, 0, 0),
(1426, 14, 'SLR data quality analysis and assessment based on zero-difference kinematic orbit of GRACE satellites', 'Y. Honglei and X. Tianhe and J. Song', '2017 Forum on Cooperative Positioning and Service (CPGPS)', '', '239-244', '', 'In this paper, we use SLR normal point observations provided by EDC to validate AIUB zero-difference kinematic orbit of GRACE satellites. By selecting 4 representative SLR sites, they are analyzed in detail from the regularity of observed elevation angle, azimuth angle and residual value of GRACE-A/B satellites. The results show that the data quality of different SLR sites is uneven, and more than 97% of the SLR observed data are very stable. There is almost no systematic error in the SLR validation of GRACE kinematic orbits, and the accuracy is better than 2.5 cm for GRACE-A and 2.7 cm for GRACE-B respectively. Under the statistics of nearly 350,000 available observations for each satellite, the accuracy indicators have strong similarity in the same site. The SLR residuals of each site obey normal distribution. The number of SLR data is inversely proportional to the observed elevation angle, and the geometric distribution of spatial observation points has a periodicity of p at different azimuth angles.', 'artificial satellites;data analysis;remote sensing;SLR normal point observations;AIUB zero-difference kinematic orbit;SLR data quality analysis;GRACE-A-B satellites;SLR sites;SLR data quality assessment;GRACE satellite zero-difference kinematic orbit;Satellites;Orbits;Azimuth;Satellite broadcasting;Kinematics;Distance measurement;Extraterrestrial measurements;Satellite Laser Ranging;GRACE;Orbit Validation;Zero-Difference Kinematic Orbit', '10.1109/CPGPS.2017.8075132', '', '', '', '', '', 'inproceedings', '8075132', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1425, 3, 0, 3, 1, 0, 0),
(1427, 14, 'Analytical studies of laser parameters for ranging and illuminating satellites from H-SLR station', 'M. Ibrahim and A. M. A. El-Hameed and G. F. Attia', '7th International Symposium on High-capacity Optical Networks and Enabling Technologies', '', '133-137', '', 'In this paper, the laser system used at the Helwan Satellite Laser Ranging Station (H-SLR) will be used in satellite\'s illumination as well as for satellite ranging. The estimated model which describes the energy and number of photons as well as the number of photoelectrons are investigated from the received signals of laser beam. For the ranging purposes, the equipment used at the H-SLR is described and also the method used for its calibration. The Range corrections due to the effect of the atmosphere on the laser beam is also discussed and applied for some satellites observed from Helwan. The ranging and illuminating space satellites are modeled and computed from the H-SLR parameters. The numbers of photons, of photoelectrons are then computed from the ranging data.', 'artificial satellites;laser beams;laser ranging;laser parameters;H-SLR station;Helwan satellite laser ranging station;photoelectrons;laser beam received signals;range corrections;H-SLR parameters;photon numbers;space satellites ranging;space satellites illumination;Satellites;Distance measurement;Laser beams;Laser modes;Surface emitting lasers;Photonics;Measurement by laser beam;Satellite laser ranging;calibration of the Helwan-SLR station;Radar equation;Atmospheric correction', '10.1109/HONET.2010.5715760', '', '', '', '', '', 'inproceedings', '5715760', '', '', '2010', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1426, 3, 0, 3, 1, 0, 0),
(1428, 14, 'Dispersion characteristics of multilayer coplanar waveguide using Single Layer Reduction (SLR) technique', 'P. Singh and A. K. Verma', 'IEEE Technology Students\' Symposium', '', '71-74', '', 'In this paper the Single Layer Reduction (SLR) technique is presented to compute dispersion characteristics of multilayer coplanar waveguide (CPW) with finite conductor thickness. The effective relative permittivity for the multilayer structure is derived from conformal mapping. Then SLR technique is used to convert multilayer CPW structure to an equivalent single layer structure. The dispersion characteristic of equivalent CPW structure is calculated from the closed form expressions.', 'conformal mapping;coplanar waveguides;multilayer coplanar waveguide;single layer reduction technique;dispersion characteristics;finite conductor thickness;conformal mapping;Coplanar waveguides;Nonhomogeneous media;Single Layer Reduction (SLR);Coplanar Waveguide (CPW);Dispersion', '10.1109/TECHSYM.2011.5783804', '', '', '', '', '', 'inproceedings', '5783804', '', '', '2011', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1427, 3, 0, 3, 1, 0, 0),
(1429, 14, 'Relation-based algorithms for generating SLR(1) and LALR(1) parsers', 'G. Logothetis and M. E. Bermudez', 'Eighth Annual International Phoenix Conference on Computers and Communications. 1989 Conference Proceedings', '', '305-309', '', 'The authors characterize the lookahead symbols in terms of very simple relations that bring out substantial structural similarities between SLR(1) and LALR(1) lookaheads. They present algorithms for computing SLR(1) and LALR(1) lookahead that are substantially simpler than those currently known. In contrast to existing algorithms which compute a lookahead set for each reduce move, the authors\' algorithms compute all reduce moves that are triggered by each individual terminal symbol. This simplifies considerably both the characterizations and the algorithms. In particular, no expensive set operations are carried out, and no storage of lookahead sets is required.<>', 'grammars;parallel algorithms;relation based algorithms;parsers;lookahead symbols;SLR(1);LALR(1);reduce moves;Automata;Production;Terminology;Program processors;Computer languages', '10.1109/PCCC.1989.37405', '', '', '', '', '', 'inproceedings', '37405', '', '', '1989', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1428, 3, 0, 3, 1, 0, 0),
(1430, 14, 'SLR converter design for multi-cell battery charging', 'A. L. Julian and G. Oriti and M. E. Pfender', '2013 IEEE Energy Conversion Congress and Exposition', '', '743-748', '', 'Series connected battery cells can use balancing circuits so that each individual cell has the same state of charge (SOC) as the others. In this paper series-loaded resonant (SLR) converters are used to trickle charge individual cells to accomplish this charge equalization goal and increase the reliability of the battery pack. Analytical equations are used to support the design of an SLR converter laboratory prototype. Additionally a physics based model implemented in Matlab/Simulink predicts the hardware behavior. Both analytical solutions and simulations are validated by laboratory experiments.', 'reliability;resonant power convertors;secondary cells;multicell battery charging;series-loaded resonant converters;SLR converter;series connected battery cells;state of charge;SOC;charge equalization;reliability;battery pack;Matlab-Simulink;hardware behavior;Mathematical model;Batteries;Equations;Voltage measurement;Capacitors;Inductors;Switching frequency', '10.1109/ECCE.2013.6646776', '', '', '', '', '', 'inproceedings', '6646776', '', '', '2013', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1429, 3, 0, 3, 1, 0, 0),
(1431, 14, 'Multi-touch out-focus: A realization of SLR-like narrow DOF in mobile camera', 'J. P. Bhagat and C. H. S. Lakshmi and K. Ashish and S. K. Gara and S. Kar', '2013 IEEE Second International Conference on Image Information Processing (ICIIP-2013)', '', '305-308', '', 'Most of the mobile cameras support digital zoom but not the optical zoom. As a result, capturing images at narrow depth-of-field (DOF) is not possible. SLR cameras can capture such images with the help of optical zoom using multiple lens assembly. In this paper, we propose a technique to create SLR-like narrow DOF images using multiple frames focused at different regions or depths. The proposed method identifies the regions or objects focused in different frames and do necessary blurring or sharpening to virtually reduce the DOF of the image. A wavelet transform based information measure has been used to separate focused and de-focused regions in a single frame and also to identify a frame which is best focused in a specific region. The proposed solution will allow the users to create narrow DOF at single or multiple user specified points in a single image.', 'cameras;photographic lenses;smart phones;wavelet transforms;multitouch out-focus;mobile camera;digital zoom;image capturing;narrow depth-of-field;optical zoom;multiple lens assembly;SLR-like narrow DOF image;multiple frame;image blurring;image sharpening;wavelet transform;Cameras;Mobile communication;Lenses;Discrete wavelet transforms;Image resolution;Graphics processing units;Conferences;Out Focus;Multi-frame;Mobile Camera;Narrow DOF;DWT', '10.1109/ICIIP.2013.6707603', '', '', '', '', '', 'inproceedings', '6707603', '', '', '2013', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1430, 3, 0, 3, 1, 0, 0),
(1432, 14, 'Unified dispersion model for a composite substrate shielded parallel coupled microstrip line using SLR technique', 'A. K. Verma and A. Bhupal and R. Kumar', 'Proceedings of 1995 SBMO/IEEE MTT-S International Microwave and Optoelectronics Conference', '2', '711-714 vol.2', '', 'A unified dispersion model for coupled microstrip line on the composite substrate with a top shield is presented by using the single layer reduction (SLR) technique and Kirschning-Jansen (1984) dispersion model for even-odd modes. Results have been compared against the results of Krage and Haddad (1972) within 3% deviation for three couplers. The present model is suitable for MIC and MMIC CAD application.', 'microstrip lines;electromagnetic shielding;dispersion (wave);waveguide theory;microwave integrated circuits;MMIC;circuit CAD;microstrip couplers;composite substrate;shielded parallel coupled microstrip line;SLR technique;unified dispersion model;coupled microstrip line;top shield;single layer reduction technique;even-odd modes;microstrip couplers;MMIC CAD application;MIC CAD application;Microstrip;Permittivity;Conductors;Dielectric substrates;Frequency dependence;Capacitance;Filling;Couplers;Microwave integrated circuits;Coupled mode analysis', '10.1109/SBMOMO.1995.509704', '', '', '', '', '', 'inproceedings', '509704', '', '', '1995', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1431, 3, 0, 3, 1, 0, 0),
(1433, 14, 'A spaceborne coherent SLR for remote sensing in a strip mode', 'A. S. Gavrilenko and A. S. Kurekin and V. N. Tsymbal and V. I. Soroka and A. P. Evdokimov and V. V. Kryzhanovsky and V. I. Dranovsky and V. V. Andrienko', 'Radar 97 (Conf. Publ. No. 449)', '', '276-279', '', 'The present paper discusses the project of the X-band coherent spaceborne remote sensing sidelooking radar (SLR) that operates with a 2/spl times/700 km swath and 1.5 to 2.5 km spatial resolution. This system is distinguished by its wide swath coverage and strip-mode operation. The strip image mode is ensured by low radar power consumption and the onboard signal processing. It is basically for this reason that the whole system can be highly efficient in solving numerous practical problems. The radar in question is designed to be installed on a platform following its orbit at 600 to 850 km and inclined at 80 to 100 degrees.', 'spaceborne radar;spaceborne coherent SLR;remote sensing;low radar power consumption;sidelooking radar;X-band radar;spatial resolution;wide swath coverage;strip image mode;onboard signal processing;600 to 850 km;Spaceborne radar', '10.1049/cp:19971678', '', '', '', '', '', 'inproceedings', '629140', '', '', '1997', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1432, 3, 0, 3, 1, 0, 0),
(1434, 14, 'Accelerated first pass cardiac perfusion MRI using improved k - t SLR', 'S. G. Lingala and Y. Hu and E. Dibella and M. Jacob', '2011 IEEE International Symposium on Biomedical Imaging: From Nano to Macro', '', '1280-1283', '', 'Routinely trade-offs between the spatio-temporal resolution, volume coverage and SNR are done in first pass cardiac perfusion MRI due to the restricted imaging acquisition window (usually of the order of 300 to 400 msec per heart beat). In this paper, we demonstrate the use a low rank and sparse reconstruction scheme (k - t SLR) in obtaining highly accelerated first pass perfusion MR images and hence aim to reduce the above mentioned trade-offs. We introduce non-convex spectral norms and use a spatio-temporal total variation norm in recovering the dynamic signal matrix. We introduce an augmented Lagrangian optimization scheme in the context of matrix recovery to speed up the convergence of the algorithm. Extensive validations on in-vivo data are done to demonstrate the performance improvement of the proposed frame work.', 'biomedical MRI;cardiology;haemorheology;image reconstruction;medical image processing;spatiotemporal phenomena;accelerated first pass cardiac perfusion MRI;improved k-t SLR;spatiotemporal resolution;imaging acquisition window;sparse reconstruction scheme;spatiotemporal total variation norm;dynamic signal matrix;augmented Lagrangian optimization scheme;matrix recovery;Acceleration;Image reconstruction;TV;Magnetic resonance imaging;Convergence;Optimization', '10.1109/ISBI.2011.5872635', '', '', '', '', '', 'inproceedings', '5872635', '', '', '2011', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1433, 3, 0, 3, 1, 0, 0),
(1435, 14, 'Comparison of power efficiency and signal regeneration impact in the SLR DWDM transmission systems with different spectral band', 'D. Pavlovs and R. Parts and D. Muratbeck and V. Bobrovs', '2017 Progress in Electromagnetics Research Symposium - Fall (PIERS - FALL)', '', '1122-1127', '', 'The power consumption issue in the wired optical networks has become a major challenge, due to its considerable economic impact and potential adverse influence on the environment. Based on many researches and analytic studies the global internet traffic will continue to increase annually, on the grounds of continuous improvement of bandwidth-intensive applications like transmission of high quality multimedia and capacious data exchange opportunities, which stipulates the requirement of increased information transmission speed at all system layers. In the Wavelength Division Multiplexing (WDM) systems, transmission speed can be enchased by reduction of channel spacing or increment of channel transmission speed. However, owing to interference between operating channels, reduction of sub-band spacing can adversely affect system\'s transmission reach, by increased number of signal regeneration procedures, which determines the higher power consumption values. In addition, due to the limitations in the spectral band appropriate for data transmission, an available spectral band differs from one network to another, based on the initial requirements for particular system, which can be fulfilled by different network designs with different power consumption values. Therefore the tradeoff between spectral efficiency and required energy consumption should be evaluated. In this work authors compare the Single-Line-Rate (SLR) WDM systems with different available spectral band, which operates on the most commonly used transmission signals, in order to demonstrate relation between the enchased spectral efficiency and its impact on the relevant systems power consumption by means of power efficiency and 3Rs\' (reamplification, retiming, reshaping) power ratio evaluation. The results are presented as functions cross-channel intervals and data transmission speed for systems that utilizes entire C-Band (4.4 THz) and systems with limited spectral band.', 'optical repeaters;power consumption;telecommunication traffic;wavelength division multiplexing;energy consumption;Single-Line-Rate WDM systems;enchased spectral efficiency;relevant systems power consumption;power efficiency;power ratio evaluation;functions cross-channel intervals;signal regeneration impact;SLR DWDM transmission systems;wired optical networks;bandwidth-intensive applications;high quality multimedia;capacious data exchange opportunities;increased information transmission speed;Wavelength Division Multiplexing systems;channel spacing;channel transmission speed;operating channels;sub-band spacing;signal regeneration procedures;frequency 4.4 THz;Power demand;Wavelength division multiplexing;Channel spacing;Nonlinear optics;Optical attenuators;Optical noise;Optical propagation', '10.1109/PIERS-FALL.2017.8293302', '', '', '', '', '', 'inproceedings', '8293302', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1434, 3, 0, 3, 1, 0, 0),
(1436, 14, 'Development of Air Quality Monitoring Remote Sensor Using a Digital SLR Camera', 'C. J. Wong and M. Z. MatJafri and K. Abdullah and H. S. Lim and K. L. Low', '2008 IEEE Aerospace Conference', '', '1-6', '', 'This paper reports that a digital single-lens reflex (SLR) camera can be applied as a remote sensor for monitoring the concentrations of particulate matter less than 10 micron (PM10). An algorithm was developed based on the regression analysis of relationship between the measured reflectance and the reflected components from a surface material and the atmosphere. This algorithm converts multispectral image pixel values acquired from this camera into quantitative values of the concentrations of PM10. These computed PM10values were compared to other standard values measured by a DustTrak� meter. The correlation results showed that the newly develop algorithm produced a high degree of accuracy as indicated by high correlation coefficient (R2) of 0.75 and low root-mean- square-error (RMS) of �5 �g/m3.', 'air pollution measurement;cameras;photographic lenses;remote sensing;air quality monitoring;remote sensor;digital SLR camera;single lens reflex;particulate matter;regression analysis;surface material;multispectral image pixel values;correlation coefficient;root mean square error;Remote monitoring;Digital cameras;Atmospheric measurements;Regression analysis;Reflectivity;Atmosphere;Image converters;Multispectral imaging;Pixel;Measurement standards', '10.1109/AERO.2008.4526397', '', '', '', '', '', 'inproceedings', '4526397', '', '', '2008', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1435, 3, 0, 3, 1, 0, 0),
(1437, 14, 'Precoding strategy based on SLR for secure communication in MUME wiretap systems', ' Kun Xie and Wen Chen', '2012 IEEE Global Communications Conference (GLOBECOM)', '', '783-788', '', 'Secure communication in the Multi-user and Multi-eavesdropper (MUME) scenario is considered in this paper. It has be shown that secrecy can be improved when the transmitter simultaneously transmits information signal to the legitimate receivers and artificial noise to confuse the eavesdroppers. Several processing schemes have been proposed to limit the co-channel interference (CCI). The conventional method and the ZF beamforming method are simple but of little ideal performance. While the block diagonalization (BD) method is of ideal performance but too complex. In this paper, we propose a new alternative approach based on maximizing the signal-to-leakage ratio (SLR). Simulations demonstrates that the proposed SLR method can achieve compromise between the secrecy performance and complexity.', 'cochannel interference;computational complexity;precoding;radio networks;telecommunication security;precoding strategy;SLR method;signal-to-leakage ratio;secure communication;MUME wiretap systems;multiuser-and-multieavesdropper scenario;information signal transmission;artificial noise;cochannel interference;CCI;ZF beamforming method;block diagonalization method;BD method;secrecy performance;secrecy complexity;wireless communications;MUME;artificial noise;block diagonalization;ZF beam-forming;SLR;secrecy capacity', '10.1109/GLOCOM.2012.6503208', '', '', '', '', '', 'inproceedings', '6503208', '', '', '2012', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1436, 3, 0, 3, 1, 0, 0),
(1438, 14, 'On the cost efficiency of flexible optical networking compared to conventional SLR/MLR WDM networks', 'I. Stiakogiannakis and E. Palkopoulou and I. Tomkos', '2013 15th International Conference on Transparent Optical Networks (ICTON)', '', '1-4', '', 'Flexible optical networking solutions try to utilize the available amplifier\'s bandwidth/spectrum more effectively (compared to the fixed-grid WDM counterparts) by properly adapting the channel capacity to the actual traffic requirements of each connection at any given point in time (as this is the case in wireless networks where bandwidth was always considered as a scarce resource). The flexibility in dynamic bandwidth allocation is enabled by novel physical layer technologies and advanced algorithms that take advantage of the new capabilities of the optical layer. In this paper we provide detailed justification on the cost-benefits introduced in core networks due to the added flexibility from elastic software-defined network technologies.', 'bandwidth allocation;channel capacity;cost-benefit analysis;optical fibre networks;telecommunication traffic;wavelength division multiplexing;flexible optical network;SLR WDM network;spectrum allocation;channel capacity;traffic requirement;dynamic bandwidth allocation flexibility;physical layer technology;optical layer;cost-benefit analysis;elastic software defined network technology;MLR WDM network;single line rate;multiline rate;cost efficiency;Transponders;Optical fiber networks;Integrated optics;Optical amplifiers;OFDM;Repeaters;Planning;flexible optical networks;heterogeneous optical networks;cost analysis;techno-economic evaluation;CAPEX;OPEX', '10.1109/ICTON.2013.6602828', '', '', '', '', '', 'inproceedings', '6602828', '', '', '2013', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1437, 3, 0, 3, 1, 0, 0),
(1439, 14, 'Modeling for dispersion of shielded microstrip line using SLR technique', 'A. K. Verma and R. Kumar', 'Proceedings of ISSE\'95 - International Symposium on Signals, Systems and Electronics', '', '355-358', '', 'We report a new dispersion model for shielded microstrip lint in the range 1/spl les/W/h/sub 1//spl les/10, 2/spl les/h/sub 2//h/sub 1/, 0/spl les/f/spl les/20 GHz. Model has maximum deviation within 4% against the result of SDA. It has average of maximum deviation within 3.23%. Method is based upon reduction of shielded microstrip line into an equivalent open microstrip line with virtual permittivity which is a function of width of line, shield height and frequency. Over this equivalent virtual substrate Kirchning-Jansen dispersion model has been used. The present model is useful for fast interactive CAD, on the desk top computer.', 'shielding;microstrip lines;equivalent circuits;permittivity;dispersion (wave);electromagnetic wave propagation;waveguide theory;shielded microstrip line;SLR technique;interactive CAD;equivalent open microstrip line;virtual permittivity;line width;shield height;equivalent virtual substrate;Kirchning-Jansen dispersion model;Microstrip;Permittivity;Frequency dependence;Plastics;Tolerance analysis;Packaging;Watches;Microwave Theory and Techniques Society;Dielectric constant;Electrons', '10.1109/ISSSE.1995.498007', '', '', '', '', '', 'inproceedings', '498007', '', '', '1995', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1438, 3, 0, 3, 1, 0, 0),
(1440, 14, 'Optical implementation of a multi-layer neural network by SLR and MSLM', ' McAulay and Xu and Wang', 'IEEE 1991 International Conference on Systems Engineering', '', '197-200', '', 'An optical implementation of a multilayer neural network by spatial light rebroadcaster (SLR) and microchannel spatial light modulation (MSLM) is presented. In the system, the SLR is used as a buffer, which is an optical storage material that can be written with an Ar laser and read with an IR laser. The MSLM has a very sharp low-level boundary, and is used for thresholding. Since SLR and MSLM are used to handle data and thresholding instead of using a computer, a high-speed processing system can be achieved. The speed limitation of the system is the response times of the SLR and MLSM.<>', 'laser beam applications;neural nets;optical information processing;optical modulation;optical computing;multilayer neural network;spatial light rebroadcaster;microchannel spatial light modulation;Ar laser;IR laser;thresholding;Laser applications;Neural networks;Optical data processing;Optical modulation', '10.1109/ICSYSE.1991.161112', '', '', '', '', '', 'inproceedings', '161112', '', '', '1991', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1439, 3, 0, 3, 1, 0, 0),
(1441, 14, 'Accelerated Dynamic MRI Exploiting Sparsity and Low-Rank Structure: k-t SLR', 'S. G. Lingala and Y. Hu and E. DiBella and M. Jacob', '', '30', '1042-1054', '', 'We introduce a novel algorithm to reconstruct dynamic magnetic resonance imaging (MRI) data from under-sampled k-t space data. In contrast to classical model based cine MRI schemes that rely on the sparsity or banded structure in Fourier space, we use the compact representation of the data in the Karhunen Louve transform (KLT) domain to exploit the correlations in the dataset. The use of the data-dependent KL transform makes our approach ideally suited to a range of dynamic imaging problems, even when the motion is not periodic. In comparison to current KLT-based methods that rely on a two-step approach to first estimate the basis functions and then use it for reconstruction, we pose the problem as a spectrally regularized matrix recovery problem. By simultaneously determining the temporal basis functions and its spatial weights from the entire measured data, the proposed scheme is capable of providing high quality reconstructions at a range of accelerations. In addition to using the compact representation in the KLT domain, we also exploit the sparsity of the data to further improve the recovery rate. Validations using numerical phantoms and in vivo cardiac perfusion MRI data demonstrate the significant improvement in performance offered by the proposed scheme over existing methods.', 'biomedical MRI;cardiology;image reconstruction;Karhunen-Loeve transforms;medical image processing;numerical analysis;phantoms;low-rank structure;accelerated dynamic MRI exploiting sparsity;k-t SLR;image reconstruction;undersampled k-t space data;classical model;Fourier space;Karhunen Louve transform domain;spectrally regularized matrix recovery problem;numerical phantoms;in vivo cardiac perfusion MRI data;Magnetic resonance imaging;Optimization;Heuristic algorithms;Image reconstruction;Transforms;Minimization;Data driven transforms;dynamic magnetic resonance imaging (MRI);low rank and sparse matrix recovery;k-t SLR;Algorithms;Computer Simulation;Heart;Heart;Humans;Image Processing, Computer-Assisted;Magnetic Resonance Imaging, Cine;Models, Cardiovascular;Phantoms, Imaging;Reproducibility of Results;Respiratory Mechanics;Signal Processing, Computer-Assisted', '10.1109/TMI.2010.2100850', 'IEEE Transactions on Medical Imaging', '', '', '', '', 'article', '5705578', '', '', '2011', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1440, 3, 0, 3, 1, 0, 0),
(1442, 14, 'Dielectric loss of multilayer coplanar waveguide using the single layer reduction (SLR) formulation', 'A. K. Verma and Nasimuddin and H. Singh', '2005 Asia-Pacific Microwave Conference Proceedings', '1', '3 pp.-', '', 'The single layer reduction (SLR) formulation is presented to compute the dielectric loss of a multilayer coplanar waveguide (CPW). The SLR computes the dielectric loss with good agreement against the computed results obtained with help of the method of moment (MoM) based software LINPAR. Accuracy of the SLR is comparable to the MoM. It is computationally faster than the MoM.', 'coplanar waveguides;multilayers;method of moments;dielectric losses;dielectric waveguides;dielectric loss;multilayer coplanar waveguide;single layer reduction formulation;method of moment;LINPAR software;Dielectric losses;Nonhomogeneous media;Coplanar waveguides;Dielectric substrates;Permittivity;Conductors;MMICs;Electromagnetic waveguides;Moment methods;Electromagnetic heating', '10.1109/APMC.2005.1606321', '', '', '', '', '', 'inproceedings', '1606321', '', '', '2005', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1441, 3, 0, 3, 1, 0, 0);
INSERT INTO `papers` (`id_paper`, `id_bib`, `title`, `author`, `book_title`, `volume`, `pages`, `num_pages`, `abstract`, `keywords`, `doi`, `journal`, `issn`, `location`, `isbn`, `address`, `type`, `bib_key`, `url`, `publisher`, `year`, `added_at`, `update_at`, `data_base`, `id`, `status_selection`, `check_status_selection`, `status_qa`, `id_gen_score`, `check_qa`, `score`) VALUES
(1443, 14, 'Synchrotron Light Recordings (SLR\'S) from birkeland current electrons observed in antiquity', 'A. L. Peratt and A. H. Qoyawayma', '2010 Abstracts IEEE International Conference on Plasma Science', '', '1-1', '', 'On Earth, a plethora of 112, 56, and 28-rayed or pointed, linear or concentric artifacts are found; ampere\'s law of attraction pulling south polar plasma filaments together in two\'s and three\'s, with quasi-equilibria at 56 and 28, ending at 4, as recorded by mankind. These objects, Synchrotron Light Recordings (SLR\'s) possess the same concentric diameter ratios, range in size from centimeter petroglyphs to large carved granite disks (often thought as \'calendars\'). On a larger scale, megaliths of a hundred meters diameter or more were constructed in the Mesolithic, or later, as they are concurrently. Other SLR\'s are \'Lines on the Landscape\' traversing tens of kilometers of any terrain as if marked for digging by laser surveying instruments.', 'archaeology;atmospheric electricity;magnetosphere;synchrotron radiation;synchrotron light recording;Birkeland current electron;linear artifacts;concentric artifacts;Ampere law;south polar plasma filaments;concentric diameter ratio;centimeter petroglyphs;large carved granite disks;Mesolithic age;laser surveying instruments;Synchrotrons;Electrons;USA Councils;Plasmas;Laboratories;Life members;Ceramics;Earth;Disk recording;Calendars', '10.1109/PLASMA.2010.5534367', '', '', '', '', '', 'inproceedings', '5534367', '', '', '2010', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1442, 3, 0, 3, 1, 0, 0),
(1444, 14, 'Equivalent circuit analysis of square-loop-resonator BPF with cross-shaped I/O coupling for X-band frequency application', ' Edwar and A. Munir', '2017 International Conference on Control, Electronics, Renewable Energy and Communications (ICCREC)', '', '66-69', '', 'The equivalent circuit of square-loop-resonator (SLR) bandpass filter (BPF) with cross-shaped I/O coupling is investigated to be analyzed and compared with the 3D electromagnetics (EM) simulator result. The proposed SLR BPF is designed for X-band frequency application with the center frequency of 9GHz and the -3dB fractional bandwidth larger than 3%. The analysis method is carried out by separating the proposed SLR BPF into few parts and then translating each part into RLC circuit to build all filter structures. From the analysis result, the proposed equivalent circuit of SLR BPF has the -3dB working bandwidth of 330MHz with the center frequency of 9GHz where this is slightly narrower than the result of 3D EM simulator. In addition, although the equivalent circuit of SLR BPF has a large number of lumped elements, however it is beneficial in obtaining high accuracy result of the filter characteristic which is useful for X-band frequency application.', 'band-pass filters;equivalent circuits;microstrip filters;microstrip resonators;resonator filters;RLC circuits;SLR BPF;X-band frequency application;equivalent circuit analysis;square-loop-resonator BPF;I/O coupling;square-loop-resonator bandpass filter;RLC circuit;frequency 9.0 GHz;bandwidth 330.0 MHz;Equivalent circuits;Band-pass filters;Microstrip;Couplings;Three-dimensional displays;Bandwidth;Capacitors;Bandpass filter (BPF);cross-shaped I/O coupling;equivalent circuit;RLC circuit;square-loop-resonator (SLR);X-band frequency', '10.1109/ICCEREC.2017.8226670', '', '', '', '', '', 'inproceedings', '8226670', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1443, 3, 0, 3, 1, 0, 0),
(1445, 14, 'Improvements to the Function Point Analysis Method: A Systematic Literature Review', 'M. de Freitas Junior and M. Fantinato and V. Sun', '', '62', '495-506', '', 'Function point analysis (FPA) is a standardized method to systematically measure the functional size of software. This method is proposed by an international organization and it is currently recommended by governments and organizations as a standard method to be adopted for this type of measurement. This paper presents a compilation of improvements, focused on increasing the accuracy of the FPA method, which have been proposed over the past 13 years. The methodology used was a systematic literature review (SLR), which was conducted with four research questions aligned with the objectives of this study. As a result of the SLR, of the 1600 results returned by the search engines, 454 primary studies were preselected according to the criteria established for the SLR. Among these studies, only 18 specifically referred to accuracy improvements for FPA, which was the goal of this study. The low number of studies that propose FPA improvements might demonstrate the maturity of the method in the current scenario of software metrics. Specifically in terms of found issues, it was found that the step for calculating the functional size exhibited the highest number of problems, indicating the need to revise FPA in order to encompass the possible improvements suggested by the researchers.', 'government;organisational aspects;reviews;search engines;software cost estimation;software metrics;government;FPA improvements;systematic literature review;software metrics;standardized method;SLR;software functional size;function point analysis method;international organization;time 13 year;Software;Complexity theory;Accuracy;Artificial intelligence;Software measurement;ISO Standards;Accuracy improvement;function point analysis (FPA);systematic literature review (SLR);Accuracy improvement;function point analysis (FPA);systematic literature review (SLR)', '10.1109/TEM.2015.2453354', 'IEEE Transactions on Engineering Management', '', '', '', '', 'article', '7165621', '', '', '2015', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1444, 3, 0, 3, 1, 0, 0),
(1446, 14, 'SLR: A scalable latent role model for attribute completion and tie prediction in social networks', 'L. Liao and Q. Ho and J. Jiang and E. Lim', '2016 IEEE 32nd International Conference on Data Engineering (ICDE)', '', '1062-1073', '', 'Social networks are an important class of networks that span a wide variety of media, ranging from social websites such as Facebook and Google Plus, citation networks of academic papers and patents, caller networks in telecommunications, and hyperlinked document collections such as Wikipedia - to name a few. Many of these social networks now exceed millions of users or actors, each of which may be associated with rich attribute data such as user profiles in social websites and caller networks, or subject classifications in document collections and citation networks. Such attribute data is often incomplete for a number of reasons - for example, users may be unwilling to spend the effort to complete their profiles, while in the case of document collections, there may be insufficient human labor to accurately classify all documents. At the same time, the tie or link information in these networks may also be incomplete - in social websites, users may simply be unaware of potential acquaintances, while in citation networks, authors may be unaware of appropriate literature that should be referenced. Completing and predicting these missing attributes and ties is important to a spectrum of applications, such as recommendation, personalized search, and targeted advertising, yet large social networks can pose a scalability challenge to existing algorithms designed for this task. Towards this end, we propose an integrative probabilistic model, SLR, that captures both attribute and tie information simultaneously, and can be used for attribute completion and tie prediction, in order to enable the above mentioned applications. A key innovation in our model is the use of triangle motifs to represent ties in the network, in order to scale to networks with millions of nodes and beyond. Experiments on real world datasets show that SLR significantly improves the accuracy of attribute prediction and tie prediction compared to well-known methods, and our distributed, multi-machine implementation easily scales up to millions of users. In addition to fast and accurate attribute and tie prediction, we also demonstrate how SLR can identify the attributes most responsible for homophily within the network, thus revealing which attributes drive network tie formation.', 'document handling;probability;social networking (online);SLR;scalable latent role model;attribute completion;tie prediction;social networks;social Web sites;Facebook;Google Plus;citation networks;academic papers;patents;hyperlinked document collections;Wikipedia;rich attribute data;document classification;integrative probabilistic model;triangle motifs;attribute prediction;distributed multimachine implementation;Predictive models;Probabilistic logic;Scalability;Algorithm design and analysis;Facebook;Patents', '10.1109/ICDE.2016.7498313', '', '', '', '', '', 'inproceedings', '7498313', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1445, 3, 0, 3, 1, 0, 0),
(1447, 14, 'Robust SLR-based beamformer for a multi-user SC-FDE-MIMO system', 'A. Aljohani and J. Chambers', '2008 5th International Conference on Broadband Communications, Networks and Systems', '', '496-499', '', 'We address the problem of transmit beamforming under channel uncertainty for a multiuser (MU), single carrier frequency domain equalization multiple input multiple output (SC-FDE-MIMO) system. SC-FDE-MIMO scheme is effective solution with relative low complexity to combat inter -symbol interference (ISI) whilst exploiting multi antennas diversity gain. In our system, the signal to leakage ratio (SLR) criterion is used to design the transmit beamformer and the minimum mean square error (MMSE) criterion is employed for the receiver equalization and combining. Non-robust beamforming techniques require perfect channel state information (CSI) knowledge which is not available in practice. In this paper, we propose a robust transmit beamformer which can successfully tolerate CSI imperfection. Diagonal loading is employed to introduce robustness to channel state information errors. The novelty of this work, however, is the application of the robust beamforming in the context of downlink MU-SC transmission. Average bit error (BER) simulations are presented to verify the efficiency of the proposed method.', 'cochannel interference;diversity reception;equalisers;error statistics;intersymbol interference;least mean squares methods;MIMO systems;multiuser channels;radio receivers;receiving antennas;transmitting antennas;single carrier frequency domain equalization;multiuser SC-FDE-MIMO system;intersymbol interference;transmit beamforming;multi-antennas diversity gain;minimum mean square error method;receiver equalization;channel state information;diagonal loading;average bit error;cochannel interference;Robustness;Array signal processing;Channel state information;Uncertainty;Frequency domain analysis;MIMO;Intersymbol interference;Diversity methods;Signal design;Mean square error methods;Broadband networks;Robust beamformer;Multiuser detection;MIMO;SC-FDE;SLR;ISI;CCI;diagonal loading', '10.1109/BROADNETS.2008.4769132', '', '', '', '', '', 'inproceedings', '4769132', '', '', '2008', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1446, 3, 0, 3, 1, 0, 0),
(1448, 14, 'Attitude and Spin Period of Space Debris Envisat Measured by Satellite Laser Ranging', 'D. Kucharski and G. Kirchner and F. Koidl and C. Fan and R. Carman and C. Moore and A. Dmytrotsa and M. Ploner and G. Bianco and M. Medvedskij and A. Makeyev and G. Appleby and M. Suzuki and J. Torre and Z. Zhongping and L. Grunwaldt and Q. Feng', '', '52', '7651-7657', '', 'The Environmental Satellite (Envisat) mission was finished on April 8, 2012, and since that time, the attitude of the satellite has undergone significant changes. During the International Laser Ranging Service campaign, the Satellite Laser Ranging (SLR) stations have performed the range measurements to the satellite that allowed determination of the attitude and the spin period of Envisat during seven months of 2013. The spin axis of the satellite is stable within the radial coordinate system (RCS; fixed with the orbit) and is pointing in the direction opposite to the normal vector of the orbital plane in such a way that the spin axis makes an angle of 61.86� with the nadir vector and 90.69� with the along-track vector. The offset between the symmetry axis of the retroreflector panel and the spin axis of the satellite is 2.52 m and causes the meter-scale oscillations of the range measurements between the ground SLR system and the satellite during a pass. Envisat rotates in the counterclockwise (CCW) direction, with an inertial period of 134.74 s (September 25, 2013), and the spin period increases by 36.7 ms/day.', 'artificial satellites;remote sensing by laser beam;space debris;space debris attitude;space debris spin period;satellite laser ranging;Environmental Satellite mission;Envisat mission;AD 2012 04 08;International Laser Ranging Service campaign;Satellite Laser Ranging stations;Envisat attitude determination;Envisat spin period;radial coordinate system;orbital plane normal vector;retroreflector panel;ground SLR system;Satellites;Extraterrestrial measurements;Measurement by laser beam;Vectors;Space vehicles;Earth;Laser beams;Envisat;satellite laser ranging (SLR);satellite spin;space debris;Envisat;satellite laser ranging (SLR);satellite spin;space debris', '10.1109/TGRS.2014.2316138', 'IEEE Transactions on Geoscience and Remote Sensing', '', '', '', '', 'article', '6809997', '', '', '2014', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1447, 3, 0, 3, 1, 0, 0),
(1449, 14, 'Multimode Resonator-Fed Dual-Polarized Antenna Array With Enhanced Bandwidth and Selectivity', 'C. Mao and S. Gao and Y. Wang and F. Qin and Q. Chu', '', '63', '5492-5499', '', 'A novel design concept of multimode filtering antenna, which is realized by integrating a multimode resonator and an antenna, has been applied to the design of dual-polarized antenna arrays for achieving a compact size and high performance in terms of broad bandwidth, high-frequency selectivity and out-of-band rejection. To verify the concept, a 2�2 array at C-band is designed and fabricated. The stub-loaded resonator (SLR) is employed as the feed of the antenna. The resonant characteristics of SLR and patch as well as the coupling between them are presented. The method of designing the integrated resonator-patch module is explained. This integrated design not only removes the need for separated filters and traditional 50 -O interfaces but also improves the frequency response of the module. A comparison with the traditional patch array has been made, showing that the proposed design has a more compact size, wider bandwidth, better frequency selectivity, and out-of-band rejection. Such low-profile light weight broadband dual-polarized arrays are useful for space-borne synthetic aperture radar (SAR) and wireless communication applications. The simulated and measured results agree well, demonstrating a good performance in terms of impedance bandwidth, frequency selectivity, isolation, radiation pattern, and antenna gain.', 'antenna radiation patterns;microwave antenna arrays;resonators;multimode resonator-fed dual-polarized antenna array;multimode filtering antenna;high-frequency selectivity;stub-loaded resonator;SLR;integrated resonator-patch module;space-borne synthetic aperture radar;low-profile light weight broadband dual-polarized arrays;wireless communication applications;Band-pass filters;Arrays;Bandwidth;Resonant frequency;Couplings;Broadband antennas;Antenna arrays;Antenna array;broadband;dual-polarization;filtering antenna;synthetic aperture radar (SAR);stub-loaded resonator (SLR);Antenna array;broadband;dual-polarization;filtering antenna;stub-loaded resonator (SLR);synthetic aperture radar (SAR)', '10.1109/TAP.2015.2496099', 'IEEE Transactions on Antennas and Propagation', '', '', '', '', 'article', '7312434', '', '', '2015', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1448, 3, 0, 3, 1, 0, 0),
(1450, 14, '[Journal First] Challenges and Pitfalls on Surveying Evidence in the Software Engineering Technical Literature: An Exploratory Study with Novices', 'T. Vieira Ribeiro and J. Massollar and G. Horta Travassos', '2018 IEEE/ACM 40th International Conference on Software Engineering (ICSE)', '', '1194-1194', '', 'The evidence-based software engineering approach advocates the use of evidence from empirical studies to support the decisions on the adoption of software technologies by practitioners in the software industry. To this end, many guidelines have been proposed to contribute to the execution and repeatability of literature reviews, and to the confidence of their results, especially regarding systematic literature reviews (SLR). To investigate similarities and differences, and to characterize the challenges and pitfalls of the planning and generated results of SLR research protocols dealing with the same research question and performed by similar teams of novice researchers in the context of the software engineering field. We qualitatively compared (using Jaccard and Kappa coefficients) and evaluated (using DARE) same goal SLR research protocols and outcomes undertaken by similar research teams. Seven similar SLR protocols regarding quality attributes for use cases executed in 2010 and 2012 enabled us to observe unexpected differences in their planning and execution. Even when the participants reached some agreement in the planning, the outcomes were different. The research protocols and reports allowed us to observe six challenges contributing to the divergences in the results: researchers\' inexperience in the topic, researchers\' inexperience in the method, lack of clearness and completeness of the papers, lack of a common terminology regarding the problem domain, lack of research verification procedures, and lack of commitment to the SLR. According to our findings, it is not possible to rely on results of SLRs performed by novices. Also, similarities at a starting or intermediate step during different SLR executions may not directly translate to the next steps, since non-explicit information might entail differences in the outcomes, hampering the repeatability and confidence of the SLR process and results. Although we do have expectations that the presence and follow-up of a senior researcher can contribute to increasing SLRs\' repeatability, this conclusion can only be drawn upon the existence of additional studies on this topic. Yet, systematic planning, transparency of decisions and verification procedures are key factors to guarantee the reliability of SLRs.', 'DP industry;project management;software engineering;unexpected differences;research verification procedures;similar SLR protocols;software engineering field;SLR research protocols;systematic literature reviews;software industry;software technologies;evidence-based software engineering approach;software engineering technical literature;systematic planning;additional studies;senior researcher;SLR process;Software engineering;Software;Planning;Protocols;Knowledge engineering;Systematics;Terminology;Novice researchers;Systematic literature review;Evidence based software engineering;Exploratory study', '10.1145/3180155.3182557', '', '', '', '', '', 'inproceedings', '8453200', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1449, 3, 0, 3, 1, 0, 0),
(1451, 14, 'A joint algorithm of parameters estimation for frequency-hopping signal based on sparse recovery', 'X. Zhang and X. Hu and X. Dong', '2017 9th International Conference on Wireless Communications and Signal Processing (WCSP)', '', '1-5', '', 'Parameters estimation is a crucial and challenging component for Frequency-Hopping (FH) communication. Time-frequency analysis is a valid signal processing tool to estimate parameters of FH signal. However, the existing Time-Frequency analysis methods have several shortcomings such as weak suppression noise interference and feeble concentration of Time-Frequency, resulting in inaccurate parameter estimation. To tackle these challenges, we propose a novel joint algorithm by incorporating the approximation of L0 norm (AL0) and sparse linear regression (SLR). In detail, AL0 is used to obtain accurate frequency sets from the Time-Frequency representation, and SLR is used to estimate the hop period, combined with the frequency sets got from AL0 algorithm. Finally, an accurate estimation of the frequency hopping pattern is achieved. Simulation results demonstrate that the joint algorithm can effectively obtain the frequencies and hop period. Besides, the joint algorithm outperforms the SLR algorithm in estimating the period with low Signal Noise Ratio (SNR). Finally accurately recover the FH pattern.', 'frequency hop communication;parameter estimation;signal processing;time-frequency analysis;parameters estimation;frequency-hopping signal;sparse recovery;FH pattern;low Signal Noise Ratio;SLR algorithm;frequency hopping pattern;hop period;Time-Frequency representation;accurate frequency sets;sparse linear regression;AL0;novel joint algorithm;inaccurate parameter estimation;weak suppression noise interference;existing Time-Frequency analysis methods;FH signal;valid signal;Frequency-Hopping communication;FH;Time-frequency analysis;Frequency estimation;Signal processing algorithms;Estimation;Signal to noise ratio;Approximation algorithms;FH signal;parameter estimation;approximation L0 norm(AL0);sparse linear regression(SLR);FH pattern', '10.1109/WCSP.2017.8170897', '', '', '', '', '', 'inproceedings', '8170897', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1450, 3, 0, 3, 1, 0, 0),
(1452, 14, 'Research and Implementation of Subscriber Location Register in Media Switch', 'J. Guo-song and H. Xiao-ling', '2011 International Conference on Intelligence Science and Information Engineering', '', '382-385', '', 'The SLR is an important module in TS, which communicate with NMS, Message Engine, SAM, USC and ESM. In Media switch system, SLR is serviced as subscriber Installation, Authentication, Subscriber profile management, and Subscriber presence and location management for USC. In Media switch system, two or more SLRs are configured as a cluster environment to satisfy the requirements from USC and to improve system performance.', 'multimedia communication;telecommunication network management;telecommunication switching;subscriber location register;media switch system;SLR;TS;NMS;message engine;SAM;USC;ESM;subscriber installation;authentication;subscriber profile management;subscriber presence;location management;Message systems;Indexes;Process control;Switches;Media;Monitoring;SLR;SAM;USC', '10.1109/ISIE.2011.117', '', '', '', '', '', 'inproceedings', '5997461', '', '', '2011', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1451, 3, 0, 3, 1, 0, 0),
(1453, 14, 'Motivation in software architecture and software project management', 'S. U. Gardazi and H. Khan and S. F. Gardazi and A. A. Shahid', '2009 International Conference on Emerging Technologies', '', '403-409', '', 'Software architecture (SA) is considered an active research area nowadays, although it is not a new activity while developing software. Software architecture is a structure represented using Architecture Description Languages (ADLs) and graphical diagrams of the system, showing different components and relationships among them. Software Project Management (SPM) pertains to the management and controlling activities involved in Software Development Life Cycle (SDLC) and includes planning, organizing, staffing, leading and controlling the software processes. This paper aims to identify the motivational factors affecting software architects and software project managers using the survey technique. We have collected results from questionnaire surveys technique which will help software project managers and software architects to understand the factors that can affect the overall quality of the software and its architecture. The last step will be to propose an updated framework for Systematic Literature Review (SLR). This new concept of using Clustering, Genetic Algorithm and Agents in SLR was proposed to produce an efficient and optimized query search strings and searches for search engines.', 'genetic algorithms;pattern clustering;project management;software agents;software architecture;software architecture;software project management;architecture description languages;system graphical diagram;software development life cycle;software architects;software project managers;systematic literature review;clustering concept;genetic algorithm;SLR agents;Software architecture;Project management;Software quality;Architecture description languages;Scanning probe microscopy;Software development management;Programming;Process planning;Organizing;Process control;Software Architecture (SA);Software Project Management (SPM);Motivation;Systematic Literature Review (SLR);Genetic Algorithm (GA)', '10.1109/ICET.2009.5353138', '', '', '', '', '', 'inproceedings', '5353138', '', '', '2009', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1452, 3, 0, 3, 1, 0, 0),
(1454, 14, 'The application of MEMS GPS receiver in APOD precise orbit determination', 'C. Jianfeng and M. Haijun and L. Xie and T. Geshi and L. Shushi', '2017 Forum on Cooperative Positioning and Service (CPGPS)', '', '140-143', '', 'APOD is a Nano satellite manufactured by DFH co., and carries dual-frequency GNSS (GPS/BD) receiver, density detector, SLR reflector and VLBI beacon. In this paper, the inflight performance of the MEMS GPS receiver has been assessed, including the multi-channel satellite ability and orbital accuracy. The average number of tracking GPS satellites for dual-frequency is only 5 due to the low tracking ability of L2 frequency. The mean RMS of ionosphere-free combination carrier phase is approximately 1-2 cm. The routine orbit determination with 36 hours tracking data has been performed using NPOD, the orbital accuracy is assessed by overlap comparison and SLR validation. The results show that the orbital accuracy is better than 20cm in three dimensions in most cases, which is helpful for the study of atmosphere density.', 'artificial satellites;Global Positioning System;micromechanical devices;radio receivers;satellite navigation;satellite tracking;MEMS GPS receiver;APOD precise orbit determination;ionosphere-free combination carrier phase;GPS satellite tracking;multichannel satellite;VLBI beacon;SLR reflector;GPS/BD receiver;dual-frequency GNSS receiver;Global Positioning System;Orbits;Satellites;Receivers;Aerospace control;Micromechanical devices;Aerodynamics;APOD;MEMS GPS;precise orbit determination;SLR validation', '10.1109/CPGPS.2017.8075112', '', '', '', '', '', 'inproceedings', '8075112', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1453, 3, 0, 3, 1, 0, 0),
(1455, 14, 'Secure lightweight routing(SLR) strategy for wireless body area networks', 'M. Roy and C. Chowdhury and A. Kundu and N. Aslam', '2017 IEEE International Conference on Advanced Networks and Telecommunications Systems (ANTS)', '', '1-4', '', 'Wireless Body Area Networks (WBANs) are becoming a popular choice for a wide range of monitoring applications such as healthcare, sport activity and rehabilitation systems. However, lack of security in WBANs may hamper the wide public acceptance of this technology. Open nature of the wireless medium, makes the patients\' data prone to eavesdropping, modification, or loss. Few existing WBAN routing protocols can be found on providing secure authentication using encryption mechanisms, however they do not consider lightweight communication approach. In this paper we propose an energy efficient mechanism that prevents malicious intruders from dropping data packets or forwarding fake data. The mechanism is applied to Adhoc On-demand Distance Vector (AODV) protocol though it can work with any other reactive WBAN routing protocol. The protocol is simulated and results show its effectiveness in detecting malicious nodes with low overhead.', 'body area networks;cryptography;routing protocols;telecommunication security;wireless body area networks;monitoring applications;wireless medium;secure authentication;energy efficient mechanism;WBAN routing protocols;fake data;secure lightweight routing strategy;malicious intruders;data packets;Adhoc On-demand Distance Vector;AODV protocol;malicious nodes;Wireless communication;Body area networks;Delays;Security;Routing protocols;Relays;security;WBAN;AODV;energy efficiency', '10.1109/ANTS.2017.8384119', '', '', '', '', '', 'inproceedings', '8384119', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1454, 3, 0, 3, 1, 0, 0),
(1456, 14, 'A 4-channel 20-to300 Mpixel/s analog front-end with sampled thermal noise below kT/C for digital SLR cameras', 'R. Kapusta and H. Shinozaki and E. Ibaragi and K. Ni and R. Wang and M. Sayuk and L. Singer and K. Nakamura', '2009 IEEE International Solid-State Circuits Conference - Digest of Technical Papers', '', '42-43,43a', '', 'We present a 4-channel analog front-end (AFE) designed specifically for multichannel sensors used in digital single-lens reflex (DSLR) cameras. Multichannel sensors have been adopted as a solution to the increasing requirements for higher throughput in imaging systems. Single-channel AFEs have been published; however, there are drawbacks to using multiple discrete single-channel AFEs in a multichannel system. For example, column readout patterns are particularly sensitive to mismatch between AFE channels. Also, DSLR cameras support many different frame capture modes and read-out patterns, requiring clock rates from below 10MS/s to over 70MS/s, and previous AFEs have not been designed to operate over such a wide range. This paper describes several design techniques developed for the DSLR application, including adaptive power scaling, an integrated reference buffer, and a low-noise sampling technique with sampled thermal noise below kT/C.', 'analogue integrated circuits;cameras;image sensors;thermal noise;analog front-end;sampled thermal noise;digital single-lens reflex cameras;imaging systems;multiple discrete single-channel AFE;multichannel sensors;column readout patterns;DSLR cameras;frame capture modes;clock rates;adaptive power scaling;integrated reference buffer;low-noise sampling technique;Digital cameras;Crosstalk;Sampling methods;Noise cancellation;Bandwidth;Circuit noise;Capacitors;Parasitic capacitance;Switches;Dynamic range', '10.1109/ISSCC.2009.4977298', '', '', '', '', '', 'inproceedings', '4977298', '', '', '2009', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1455, 3, 0, 3, 1, 0, 0),
(1457, 14, 'A Deep Learning Approach for Analyzing Video and Skeletal Features in Sign Language Recognition', 'D. Konstantinidis and K. Dimitropoulos and P. Daras', '2018 IEEE International Conference on Imaging Systems and Techniques (IST)', '', '1-6', '', 'Sign language recognition (SLR) refers to the classification of signs with a specific meaning performed by the deaf and/or hearing-impaired people in their everyday communication. In this work, we propose a deep learning based framework, in which we examine and analyze the contribution of video (image and optical flow) and skeletal (body, hand and face) features in the challenging task of isolated SLR, in which each signed video corresponds to a single word. Moreover, we employ various fusion schemes in order to identify the optimal way to combine the information obtained from the various feature representations and propose a robust SLR methodology. Our experimentation on two sign language datasets and the comparison with state-of-the-art SLR methods reveals the superiority of optimally combining skeletal and video features for SLR tasks.', 'feature extraction;image classification;learning (artificial intelligence);sign language recognition;video signal processing;deep learning approach;skeletal features;sign language recognition;everyday communication;deep learning based framework;isolated SLR;feature representations;robust SLR methodology;sign language datasets;state-of-the-art SLR methods;SLR tasks;hearing-impaired people;Information technology;Instrumentation and measurement;Optical flow;Optimization;deep learning;optical flow;probability fusion;sign language;skeletal data', '10.1109/IST.2018.8577085', '', '', '', '', '', 'inproceedings', '8577085', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1456, 3, 0, 3, 1, 0, 0),
(1458, 14, 'Compact Balanced Dual- and Tri-band Bandpass Filters Based on Stub Loaded Resonators', 'F. Wei and Y. Jay Guo and P. Qin and X. Wei Shi', '', '25', '76-78', '', 'A stub loaded resonator (SLR) is presented in this letter, which can achieve dual-band or tri-band differential-mode (DM) bandpass response with a high common-mode (CM) suppression. By changing the length of the center-loaded stub, the resonant frequency of the CM can be varied without affecting that of the DM. This helps in simplifying the design and tuning processes of the balanced filters. In order to validate its practicalbility, two balanced bandpass filters (BPFs) with two and three DM passbands and good CM suppression are designed. Good agreement between simulated and measured results is observed. To our best knowledge, the proposed balanced tri-band BPF is the first ever reported.', 'band-pass filters;circuit tuning;resonator filters;compact balanced dual-band bandpass filters;tri-band bandpass filters;stub loaded resonators;SLR;DM bandpass response;tri-band differential-mode bandpass response;high common-mode suppression;CM suppression;center-loaded stub;resonant frequency;balanced filter design;balanced filter tuning process;balanced tri-band BPF;Band-pass filters;Dual band;Resonant frequency;Passband;Loss measurement;Wireless communication;Bandwidth;Balanced bandpass filter (BPF);common-mode (CM);differential mode (DM);stub loaded resonator (SLR);tri-band', '10.1109/LMWC.2014.2370233', 'IEEE Microwave and Wireless Components Letters', '', '', '', '', 'article', '6960916', '', '', '2015', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1457, 3, 0, 3, 1, 0, 0),
(1459, 14, 'Detecting and temporarily recovering lost packets in Ad-hoc network by using Bypass routing', 'P. Ashok and N. Purushothaman and K. Elumalai', '2012 International Conference on Radar, Communication and Computing (ICRCC)', '', '264-267', '', 'Ad hoc network is a temporary network connection that can change locations and configure itself on the fly. Packet may loss in network due to frequent link failure in ad hoc network. In this paper, we maintaining log at each router to find out where the loss actually occurred and a special scheme used is Bypass routing which discover a temporary path during link failure. The node then forwards the buffered packets to the destination without any loss. The significant nodes are assumed and implemented by using SLR (Source Routing with Local Recovery)as a prototype. This model achieves significantly higher throughput while maintaining acceptable overhead.', 'ad hoc networks;radio links;telecommunication network routing;packet recovery;ad-hoc network;bypass routing;temporary network connection;packet loss;link failure;router;path discover;buffered packet;SLR;source routing with local recovery;network throughput;Routing protocols;Routing;Ad hoc networks;Maintenance engineering;Educational institutions;Mobile communication;Log record;local recovery;bypass routing;SLR', '10.1109/ICRCC.2012.6450592', '', '', '', '', '', 'inproceedings', '6450592', '', '', '2012', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1458, 3, 0, 3, 1, 0, 0),
(1460, 14, 'SLR: Sustainable Longevity Routing Protocol for ad hoc networks', 'K. Srinivas and A. A. Chari', '2013 IEEE International Conference on Signal Processing, Communication and Computing (ICSPCC 2013)', '', '1-6', '', 'Ad hoc structure has a special characteristic because of which the nodes in the wireless ad hoc networks depend on batteries for power resources that restrain in giving power resources. Apart from QoS metrics like mobility and bandwidth, node survivability and power usage form the main feature in routing as hoc networks. Here we will dwell upon the issues of knowing the course with sources that sustainable and are essential in supporting excellence in wireless ad hoc networks. By routing path with highest obtainable power and less energy use can result in maintainable routing. A novel energy proficient weighted path routing protocol known as Sustainable Longevity Routing (SLR) Protocol is what we put forward. Our primary aim is to officially establish that the recommended weighted path routing protocol will meet the loop-freeness necessities and reliability. The maintainable asset assures that every nodule will make the right packet forwarding choice for the data packet to pass through the proposed path. Several wide mock-up experiments conducted by us proved that our projected weighted path routing protocol gives exemplary performance to know the high-throughput paths.', 'ad hoc networks;routing protocols;telecommunication power management;SLR routing protocol;sustainable longevity routing protocol;ad hoc networks;QoS metrics;node survivability;power usage;wireless ad hoc network;highest obtainable power;less energy use;energy proficient weighted path routing protocol;maintainable asset;Batteries;Routing protocols;Routing;Jitter;Ad hoc networks;Measurement;Mobile Ad Hoc Network;Power-aware;Overhearing;battery capacity aware;transmission frequency range;jitter ratio;transmission power', '10.1109/ICSPCC.2013.6664088', '', '', '', '', '', 'inproceedings', '6664088', '', '', '2013', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1459, 3, 0, 3, 1, 0, 0),
(1461, 14, 'Communication risks in GSD during RCM: Results from SLR', 'A. A. Khan and S. Basri and P. D. D. Dominic', '2014 International Conference on Computer and Information Sciences (ICCOINS)', '', '1-6', '', 'Majority of the software production companies are adopting Global Software Development (GSD) and it is incessantly getting fast. Most of Software development organizations are trying to globalize their study worldwide in order to get the various benefits. However, GSD is not a simple task and the organizations face different challenges. But Communication is a major issue and it becomes more complicated during the process of Requirements Change Management (RCM). This research will result to explore different communication risks, their causes, negative effects and mitigation strategies to allay the identified communication risks during the RCM process by conducting the Systematic Literature Review (SLR). In this study total 31 risks are identified their causes 31 and negative effects 29. Total 10 best practices are identified which are used to mitigate the identified communication risks.', 'management of change;risk analysis;software engineering;software reviews;communication risks;GSD;RCM;SLR;global software development;software production companies;software development organizations;requirement change management process;systematic literature review;Software;Cultural differences;Global communication;Organizations;Software engineering;Face;Systematics;Communication;global software development;requirements change management;risks;causes;negative effects;mitigation practices', '10.1109/ICCOINS.2014.6868448', '', '', '', '', '', 'inproceedings', '6868448', '', '', '2014', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1460, 3, 0, 3, 1, 0, 0),
(1462, 14, 'Spoken Language Recognition With Prosodic Features', 'R. W. M. Ng and T. Lee and C. Leung and B. Ma and H. Li', '', '21', '1841-1853', '', 'Speech prosody is believed to carry much language-specific information that can be used for spoken language recognition (SLR). In the past, the use of prosodic features for SLR has been studied sporadically and the reported performances were considered unsatisfactory. In this paper, we exploit a wide range of prosodic attributes for large-scale SLR tasks. These attributes describe the multifaceted variations of F0, intensity and duration in different spoken languages. Prosodic attributes are modeled by the bag of n-grams approach with support vector machine (SVM) as in the conventional phonotactic SLR systems. Experimental results on OGI and NIST-LRE tasks showed that the use of proposed attributes gives significantly better SLR performance than those previously reported. The full feature set includes 87 prosodic attributes and redundancy among attributes may exist. Attributes are broken down into particular bigrams called bins. Four entropy-based feature selection metrics with different selection criteria are derived. Attributes can be selected by individual bins, or by attributes as batches of bins. It can also be done in a language-dependent or language-independent manner. By comparing different selection sizes and criteria, an optimal attribute subset comprising 5,000 bins is found by using a bin-level language-independent criterion. Feature selection reduces model size by 2.5 times and shortens the runtime by 6 times. The optimal subset of bins gives the lowest EER of 20.18% on NIST-LRE 2007 SLR task in a prosodic attribute model (PAM) system which exclusively modeled prosodic attributes. In a phonotactic-prosodic fusion SLR system, the detection cost, Cavg is 2.09%. The relative detection cost reduction is 23%.', 'feature extraction;speech recognition;support vector machines;spoken language recognition;prosodic features;speech prosody;language-specific information;prosodic attributes;large-scale SLR tasks;F0 multifaceted variations;support vector machine;SVM;n-grams approach;OGI tasks;entropy-based feature selection metrics;individual bins;language-independent manner;optimal attribute subset;bin-level language-independent criterion;NIST-LRE 2007 SLR task;prosodic attribute model system;PAM system;phonotactic-prosodic fusion SLR system;relative detection cost reduction;Speech;Speech recognition;Feature extraction;Quantization (signal);Speech processing;Measurement;Training;Language identification;mutual information;prosody', '10.1109/TASL.2013.2260157', 'IEEE Transactions on Audio, Speech, and Language Processing', '', '', '', '', 'article', '6508858', '', '', '2013', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1461, 3, 0, 3, 1, 0, 0),
(1463, 14, 'A data driven approach for SLR service volume design and implementation', 'E. Boci', '2017 Integrated Communications, Navigation and Surveillance Conference (ICNS)', '', '4C1-1-4C1-9', '', 'In 2016, Harris Inc. designed and implemented the ADS-R Same Link Rebroadcast (SLR) airport service in support of the Federal Aviation Administration (FAA) Surveillance & Broadcast Services program. Airport structures can block reception of direct aircraft to aircraft ADS-B messages between aircraft on an airport surface that need to participate in an application such as Surface Indications and Alerts (SURF IA). In addition, severe multipath interference on direct aircraft to aircraft ADS-B messages may impact the reception of ADS-B messages on the surface. SLR service mitigates such risks by rebroadcasting targets in the same link, that is, 1090 Targets are rebroadcasted on 1090, and UAT targets are rebroadcasted on UAT. In this paper, we describe the SLR service and the data driven approach taken to optimize the design of SLR for airport surface service volumes.', 'FAA;Airports;Cascading style sheets;Aircraft;Wide area measurements;Atmospheric modeling;Algorithm design and analysis', '10.1109/ICNSURV.2017.8011924', '', '', '', '', '', 'inproceedings', '8011924', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1462, 3, 0, 3, 1, 0, 0),
(1464, 14, 'A compact quad-band bandpass filter with high skirt selectivity based on stub-loaded resonators and ?/4 resonators', 'Y. Ma and B. Liu and Z. Guo and R. Zhao and X. Wei and W. Xing and Y. Wang', '2018 IEEE MTT-S International Wireless Symposium (IWS)', '', '1-4', '', 'In this paper, a quad-band bandpass filter (BPF) with compact size and high skirt selectivity is proposed by using j both stub-loaded resonators (SLRs) and ?/4 resonators. One set of SLRs is utilized not only to generate the lower passbands but also to feed the ?/4 resonators. Three extra transmission zeros (TZs) are created in the stopband by using a zero feed structure. For demonstration, a exemplary filter has been designed and fabricated. Good agreement is observed between the simulated and measured results.', 'band-pass filters;microwave filters;resonator filters;UHF filters;stub-loaded resonators;?/4 resonators;zero feed structure;compact quad-band bandpass filter;skirt selectivity;SLR;transmission zeros;Resonators;Passband;Band-pass filters;Feeds;Wireless communication;Couplings;Filtering theory;Bandpass filter (BPF);quad-band;stub-loaded resonator (SLR);?/4 resonator', '10.1109/IEEE-IWS.2018.8401009', '', '', '', '', '', 'inproceedings', '8401009', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1463, 3, 0, 3, 1, 0, 0),
(1465, 14, 'A Low-Cost Real-Time Research Platform for EMG Pattern Recognition-Based Prosthetic Hand', 'P. Geethanjali and K. K. Ray', '', '20', '1948-1955', '', 'The focus of this paper is the development of a low-cost research platform for a surface electromyogram (EMG)-based prosthetic hand control to evaluate various pattern recognition techniques and to study the real-time implementation. This comprehensible research platform may enlighten the biomedical research in developing countries for analyzing and evaluating the surface EMG signals. Major challenges in this work were as follows: the design and development of an EMG signal conditioning module, a pattern recognition module, and a prosthetic hand at low cost. Besides, EMG pattern recognition techniques were evaluated for identifying six hand motions in offline with signals acquired from ten healthy subjects and two transradial amputees. Features calculated from EMG signals were grouped into six ensembles to apprehend the vitality of the ensemble in classifiers namely simple logistic regression (SLR), J48 algorithm for decision tree, logistic model tree, neural network, linear discriminant analysis, and support vector machine. The classification performance was also evaluated with the prolonged EMG data recorded on a day at every 1 h interval to study the robustness of the classifier. The results show the average classification accuracy, processing time and memory requirement of the SLR was found to be better and robust with time-domain features consisting of statistical as well as autoregression coefficients. The statistical analysis of variance test also showed that computation time and memory space required for SLR were significantly less compared to the other classifiers. The performance of the classifier was tested in online with transradial amputee for actuation of prosthetic hand for two intended motions with a TMS320F28335 controller. This proposed research platform for evaluation of EMG pattern recognition and real-time implementation has been achieved at a cost of 25 000 Indian rupee (INR).', 'autoregressive processes;control engineering computing;decision trees;electromyography;medical signal processing;neural nets;pattern recognition;prosthetics;regression analysis;signal classification;support vector machines;time-domain analysis;low-cost real-time research platform;EMG pattern recognition-based prosthetic hand;surface electromyogram-based prosthetic hand control;biomedical research;EMG signal conditioning module;hand motions;transradial amputees;simple logistic regression;J48 algorithm;decision tree;logistic model tree;neural network;linear discriminant analysis;support vector machine;classification performance;autoregression coefficients;variance test statistical analysis;TMS320F28335 controller;time-domain features;Electromyography;Feature extraction;Pattern recognition;Logistics;Support vector machines;Accuracy;Training;Decision tree (DT);electromyogram (EMG);feature ensemble (FE);linear discriminant analysis (LDA);logistic model tree (LMT);neural network (NN);simple logistic regression (SLR);support vector machine (SVM);Decision tree (DT);electromyogram (EMG);feature ensemble (FE);linear discriminant analysis (LDA);logistic model tree (LMT);neural network (NN);simple logistic regression (SLR);support vector machine (SVM)', '10.1109/TMECH.2014.2360119', 'IEEE/ASME Transactions on Mechatronics', '', '', '', '', 'article', '6922555', '', '', '2015', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1464, 3, 0, 3, 1, 0, 0);
INSERT INTO `papers` (`id_paper`, `id_bib`, `title`, `author`, `book_title`, `volume`, `pages`, `num_pages`, `abstract`, `keywords`, `doi`, `journal`, `issn`, `location`, `isbn`, `address`, `type`, `bib_key`, `url`, `publisher`, `year`, `added_at`, `update_at`, `data_base`, `id`, `status_selection`, `check_status_selection`, `status_qa`, `id_gen_score`, `check_qa`, `score`) VALUES
(1466, 14, 'Impact of the Atmospheric Non-tidal Pressure Loading on Global Geodetic Parameters Based on Satellite Laser Ranging to GNSS', 'G. Bury and K. Sosnica and R. Zajdel', '', '', '1-17', '', 'Atmospheric pressure loading plays a crucial role in precise space geodesy, thus its omission, especially the nontidal loading (ANTL) part, leads to the inconsistency between solutions based on the microwave [Global Navigation Satellite Systems (GNSS)] and optical [satellite laser ranging (SLR)] observations. SLR observations are performed only during the cloudless conditions coincident with high values of air pressure that deforms the earth\'s crust downward. The systematic shift of the estimated SLR station coordinates, which arises from the ANTL omission, is called the Blue-Sky effect. The offset is related to the long-term averaging of ANTL for SLR observations which are provided in sparse intervals, unlike GNSS, which observes continuously. Based on the ANTL model applied on SLR observations to GNSS, we determined the values of the Blue-Sky effect. The largest values of the Blue-Sky effect are observed for the inland stations, i.e., 2.3, 2.1, 2.0, and 1.9 mm for Svetloe, Potsdam, Baikonur, and Altay, respectively. We also investigate the impact of the omission of ANTL corrections on geodetic parameters, i.e., earth rotation parameters, geocenter motion, precise GNSS orbits, as well as on the global SLR network. The negligence of ANTL causes a systematic effect on geocenter coordinates with the amplitude of the annual signal at the level of 1.9 mm for the Z-component. The omission of ANTL corrections causes also a systematic shift of the multi-GNSS orbit constellation with the amplitude of the annual signal at the level of 2.7 mm for the Z-component.', 'Satellites;Global navigation satellite system;Satellite broadcasting;Space vehicles;Orbits;Systematics;Atmospheric non-tidal loading (ANTL);atmospheric pressure loading;Blue-Sky effect;multi-Global Navigation Satellite System (GNSS);satellite laser ranging (SLR).', '10.1109/TGRS.2018.2885845', 'IEEE Transactions on Geoscience and Remote Sensing', '', '', '', '', 'article', '8605502', '', '', '2019', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1465, 3, 0, 3, 1, 0, 0),
(1467, 14, 'An Ontology-Based Approach to Semi-Automate Systematic Literature Reviews', 'A. Ali and C. Gravino', '2018 12th International Conference on Open Source Systems and Technologies (ICOSST)', '', '09-16', '', 'A Systematic Literature Review (SLR) allows us to combine and analyze data from multiple (published and unpublished) studies. Though it provides a complete and comprehensive empirical evidence of an area of interest, the results we usually get from the data synthesis phase of an SLR include huge tables and graphs and thus, for users, it is a tedious and time-consuming job to get the required results. In this work, we propose to semi-automate some steps which can be used to fetch the information from an SLR, beyond the traditional tables, graphs, and plots. The automation is performed using Semantic Web technologies like ontology, Jena API and SPARQL queries. The Semantic Web, also called Web 3.0, provides a common framework and thus allows us to share and re-use the data across the applications and enterprises. It can be used to integrate, extract, and infer the most relevant data required by the users, which are hidden behind the huge information on the Web. We also provide an easy-to-use user interface in order to allow users to perform different searches and find their required SLR results easily and quickly. Finally, we present the results of a preliminary user study performed to analyze the amount of time users need to extract their required information, both via the SLR tables and our proposal. The results revealed that with our system the users get their required information in less time compared to the manual system.', 'application program interfaces;data analysis;graph theory;Internet;ontologies (artificial intelligence);query processing;semantic Web;user interfaces;semantic Web technologies;semi-automate systematic literature reviews;data analysis;Jena API;SPARQL queries;Web 3.0;data synthesis phase;ontology-based approach;SLR tables;easy-to-use user interface;relevant data;graphs;Ontologies;Semantic Web;Data mining;Software;Maximum likelihood estimation;Protocols;Ontology;Semantic Web;SLR;Jena;User Interface', '10.1109/ICOSST.2018.8632205', '', '', '', '', '', 'inproceedings', '8632205', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1466, 3, 0, 3, 1, 0, 0),
(1468, 14, 'A Sign-Component-Based Framework for Chinese Sign Language Recognition Using Accelerometer and sEMG Data', 'Y. Li and X. Chen and X. Zhang and K. Wang and Z. J. Wang', '', '59', '2695-2704', '', 'Identification of constituent components of each sign gesture can be beneficial to the improved performance of sign language recognition (SLR), especially for large-vocabulary SLR systems. Aiming at developing such a system using portable accelerometer (ACC) and surface electromyographic (sEMG) sensors, we propose a framework for automatic Chinese SLR at the component level. In the proposed framework, data segmentation, as an important preprocessing operation, is performed to divide a continuous sign language sentence into subword segments. Based on the features extracted from ACC and sEMG data, three basic components of sign subwords, namely the hand shape, orientation, and movement, are further modeled and the corresponding component classifiers are learned. At the decision level, a sequence of subwords can be recognized by fusing the likelihoods at the component level. The overall classification accuracy of 96.5% for a vocabulary of 120 signs and 86.7% for 200 sentences demonstrate the feasibility of interpreting sign components from ACC and sEMG data and clearly show the superior recognition performance of the proposed method when compared with the previous SLR method at the subword level. The proposed method seems promising for implementing large-vocabulary portable SLR systems.', 'accelerometers;electromyography;feature extraction;gesture recognition;hidden Markov models;medical signal processing;signal classification;Chinese sign language recognition;accelerometer;sEMG;surface electromyography;data segmentation;feature extraction;ACC;subwords;large-vocabulary portable SLR systems;Shape;Handicapped aids;Sensors;Hidden Markov models;Electromyography;Muscles;Feature extraction;Accelerometer (ACC);hidden Markov model (HMM);sign component;sign language recognition (SLR);surface electromyography;Accelerometry;Accelerometry;Adult;Arm;Electromyography;Electromyography;Female;Hand;Humans;Male;Markov Chains;Pattern Recognition, Automated;Sign Language;Signal Processing, Computer-Assisted', '10.1109/TBME.2012.2190734', 'IEEE Transactions on Biomedical Engineering', '', '', '', '', 'article', '6170877', '', '', '2012', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1467, 3, 0, 3, 1, 0, 0),
(1469, 14, 'Two-Color Satellite Laser Ranging Measurements at 10 Hz and 100 Hz at TIGO', 'C. O. Guaitiao and M. H�fner and S. K. Sobarzo and S. Riepl and S. N. Torres and F. Pedreros and L. Arias', '', '52', '4707-4716', '', 'In this paper, a detailed comparative performance analysis of the two-color satellite laser ranging (SLR) systems of the Transportable Integrated Geodetic Observatory (TIGO) is presented. The study is based on four years of continuous measurement data and a comparison of two different layouts of the laser system. The focus lies on a quantitative analysis of measurement precision, range accuracy, and data production for the two laser system layouts. Main findings include a significant gain in temporal stability due to removal of active elements in the oscillator, an improvement of range measurement accuracy by a factor of 2, and an important increase in data productivity. The analysis presented here provides a valuable input for the design of future SLR systems, as well as related topics such as time transfer applications and optical communications to satellites.', 'artificial satellites;laser ranging;satellite communication;two-color satellite laser ranging measurements;Transportable Integrated Geodetic Observatory;measurement precision;range accuracy;data production;laser system layouts;temporal stability;oscillator;frequency 10 Hz;frequency 100 Hz;Oscillators;Laser excitation;Measurement by laser beam;Pump lasers;Crystals;Satellites;Laser stability;Satellite laser ranging (SLR);short-laser-pulse remote sensing;space geodesy;two-color atmospheric refraction correction;Satellite laser ranging (SLR);short-laser-pulse remote sensing;space geodesy;two-color atmospheric refraction correction', '10.1109/TGRS.2013.2283771', 'IEEE Transactions on Geoscience and Remote Sensing', '', '', '', '', 'article', '6680724', '', '', '2014', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1468, 3, 0, 3, 1, 0, 0),
(1470, 14, 'Greedy Projected Gradient-Newton Method for Sparse Logistic Regression', 'R. Wang and N. Xiu and C. Zhang', '', '', '1-12', '', 'Sparse logistic regression (SLR), which is widely used for classification and feature selection in many fields, such as neural networks, deep learning, and bioinformatics, is the classical logistic regression model with sparsity constraints. In this paper, we perform theoretical analysis on the existence and uniqueness of the solution to the SLR, and we propose a greedy projected gradient-Newton (GPGN) method for solving the SLR. The GPGN method is a combination of the projected gradient method and the Newton method. The following characteristics show that the GPGN method achieves not only elegant theoretical results but also a remarkable numerical performance in solving the SLR: 1) the full iterative sequence generated by the GPGN method converges to a global/local minimizer of the SLR under weaker conditions; 2) the GPGN method has the properties of afinite identification for an optimal support set and local quadratic convergence; and 3) the GPGN method achieves higher accuracy and higher speed compared with a number of state-of-the-art solvers according to numerical experiments.', 'Convergence analysis;greedy projected gradient-Newton (GPGN) algorithm;model analysis;numerical experiment;sparse logistic regression (SLR).', '10.1109/TNNLS.2019.2905261', 'IEEE Transactions on Neural Networks and Learning Systems', '', '', '', '', 'article', '8688642', '', '', '2019', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1469, 3, 0, 3, 1, 0, 0),
(1471, 14, 'Preliminary Results of an Investigation into the Potential Application of X-Band SLR Images for Crop-Type Inventory Purposes', 'M. K. Smit', '', '17', '303-308', '', 'Preliminary results are reported of an investigation into the potential application of SLR images (by which we mean both SAR and SLAR images) for crop-inventory purposes employing temporal dependency to obtain multi-dimensional observations. To evaluate this potential, SLR-image data are simulated, and subsequently classified. The results, which are restricted to VV-polarized X-band data, taken at a typical SLAR angle of 20� (grazing), indicate that an overall average error fraction of less than 20 percent can be reached for the region involved, with less than 5-percent error for some crops.', 'Crops;Optical scattering;Fluctuations;Radar imaging;Spaceborne radar;Radar scattering;Pixel;Frequency;Optical sensors;Geoscience', '10.1109/TGE.1979.294659', 'IEEE Transactions on Geoscience Electronics', '', '', '', '', 'article', '4072016', '', '', '1979', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1470, 3, 0, 3, 1, 0, 0),
(1472, 14, 'Social Networks Peacebuilding Event Mining: A Systematic Literature Review', 'M. Shaikh and N. Salleh and L. Marziana', '2014 3rd International Conference on Advanced Computer Science Applications and Technologies', '', '119-124', '', 'Social Networks (SNs) becomes one of the essential platform for reporting real time events now a days. SNs has been used by millions of people around the world for sharing thoughts and daily life events on many topics, either it is political, crisis, Peace building (Pb). The objective of this paper is to get insight of Pb Event Mining (EM) from SNs (e.g., Tweets, Fb posts, etc) by conducting the Systematic Literature Review (SLR) process. The paper aims to answer some research questions (RQs) that includes, 1) Which SN\'s has been widely used for Textual Pb Event Mining PbEM?, 2) What Context or setting has been focussed of PbEM studies and how to categorize Pb events?, and 3) What other types of events (non-Pb) are reported? The SLR process has been used to identify the related literature and for analysis of evidences in order to answer the RQs. This paper concluded on the basis of SLR studies that the Twitter is widely used SN for Textual PbEM because 54 out of 64 studies on PbEM uses Twitter. SLR resulted that earth quake (EQ) events are the major concerned events that effect country\'s economy and peace therefore most of studies uses the EQ as context/setting. The paper presents the details on categories of Pb events, contexts/settings and the list of other types of events or topics that are the center of the research now a days based on synthesis of evidences.', 'Internet;real-time systems;social networking (online);social networks peacebuilding event mining;systematic literature review;SN;Pb;Pb event mining;SLR process;research questions;RQ;Twitter;earth quake;Tin;Lead;Data mining;Context;Twitter;Media;Social Networks (SNs);Peacebuilding (Pb);Event Mining (EM);Systematic literature review (SLR);Peacebuilding Event Mining (PbEM)', '10.1109/ACSAT.2014.28', '', '', '', '', '', 'inproceedings', '7076880', '', '', '2014', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1471, 3, 0, 3, 1, 0, 0),
(1473, 14, 'A Novel Chinese Sign Language Recognition Method Based on Keyframe-Centered Clips', 'S. Huang and C. Mao and J. Tao and Z. Ye', '', '25', '442-446', '', 'Isolated sign language recognition (SLR) is a long-standing research problem. The existing methods consider inclusively ambiguous data to represent a sign and ignore the fact that only scarce key information can represent the sign efficiently since most information are redundant. Furthermore, inclusion of redundant information may result in inefficiency and difficulty in modeling the long-term dependency for SLR. This letter delivers a novel sequence-to-sequence learning method based on keyframe centered clips (KCCs) for Chinese SLR. Different from conventional methods, only key information is considered to represent a sign significantly. The frames-to-word task is transformed into a KCCs-to-subwords task successfully, to allow for different attention in the input data. The empirical results of the proposed method outperform significantly the state-of-the-art SLR systems on our dataset containing 310 Chinese sign language words.', 'feature extraction;learning (artificial intelligence);natural language processing;sign language recognition;long-term dependency;sequence-to-sequence learning method;keyframe centered clips;Chinese SLR;KCCs-to-subwords task;novel Chinese sign language recognition method;isolated sign language recognition;Chinese sign language words;Assistive technology;Gesture recognition;Hidden Markov models;Feature extraction;Trajectory;Task analysis;Adaptation models;Efficient;keyframe centered clip (KCC);key information;sequence-to-sequence;sign language recognition (SLR)', '10.1109/LSP.2018.2797228', 'IEEE Signal Processing Letters', '', '', '', '', 'article', '8267225', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1472, 3, 0, 3, 1, 0, 0),
(1474, 14, 'A Shared-Aperture Dual-Band Dual-Polarized Filtering-Antenna-Array With Improved Frequency Response', 'C. Mao and S. Gao and Y. Wang and Q. Luo and Q. Chu', '', '65', '1836-1844', '', 'In this paper, a novel dual-band dual-polarized array antenna with low frequency ratio and integrated filtering characteristics is proposed. By employing a dual-mode stub-loaded resonator (SLR) to feed and tune with two patches, the two feed networks for each polarization can be combined, resulting in the reduction of the feed networks and the input ports. In addition, owing to the native dual resonant features of the SLR, the proposed antenna exhibits second-order filtering characteristics with improved bandwidth and out-of-band rejections. The antenna is synthesized and the design methodology is explained. The coupling coefficients between the SLR and the patches are investigated. To verify the design concept, a C-/X-band element and a $2 times 2$ array are optimized and prototyped. Measured results agree well with the simulations, showing good performance in terms of bandwidth, filtering, harmonic suppression, and radiation at both bands. Such an integrated array design can be used to simplify the feed of a reflector antenna. To prove the concept, a paraboloid reflector fed by the proposed array is conceived and measured directivities of 24.6 dBi (24.7 dBi) and 28.6 dBi (29.2 dBi) for the X-polarization (Y-polarization) are obtained for the low- and high-band operations, respectively.', 'antenna radiation patterns;aperture antennas;electromagnetic wave polarisation;frequency response;interference suppression;microwave filters;microwave resonators;multifrequency antennas;reflector antenna feeds;shared aperture dual band dual polarized filtering antenna array;frequency response;dual mode stub loaded resonator;SLR;two feed networks;second order filtering;out-of-band rejections;C-band;X-band;harmonic suppression;reflector antenna;paraboloid reflector;Couplings;Dual band;Resonant frequency;Feeds;Filtering;Antenna arrays;Antenna array;dual-band;dual-polarized;filtering;integrated;stub-loaded resonator (SLR)', '10.1109/TAP.2017.2670325', 'IEEE Transactions on Antennas and Propagation', '', '', '', '', 'article', '7857740', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1473, 3, 0, 3, 1, 0, 0),
(1475, 14, 'Impairment-aware optical network virtualization in single-line-rate and mixed-line-rate WDM networks', 'S. Peng and R. Nejabati and D. Simeonidou', '', '5', '283-293', '', 'Optical network virtualization enables network operators to compose and operate multiple independent and application-specific virtual optical networks (VONs) sharing a common physical infrastructure. To achieve this capability, the virtualization mechanism must guarantee isolation between coexisting VONs. In order to satisfy this fundamental requirement, the VON composition mechanism must take into account the impact of physical layer impairments (PLIs). In this paper we propose a new infrastructure as a service architecture utilizing optical network virtualization. We introduce novel PLI-aware VON composition algorithms suitable for single-line-rate (SLR) and mixed-line-rate (MLR) network scenarios. In order to assess the impact of PLIs and guarantee the isolation of multiple coexisting VONs, PLI assessment models for intra- and inter-VON impairments are proposed and adopted in the VON composition process for both SLR and MLR networks. In the SLR networks, the PLI-aware VON composition mechanisms with both heuristic and optimal (MILP) mapping methods are proposed. A replanning strategy is proposed for the MILP mapping method in order to increase its efficiency. In the MLR networks, a new virtual link mapping method suitable for the MLR network scenario and two line rate distribution methods are proposed. With the proposed PLI-aware VON composition methods, multiple coexisting and cost-effective VONs with guaranteed transmission quality can be dynamically composed. We evaluate and compare the performance of the proposed VON composition methods through extensive simulation studies with various network scenarios.', 'integer programming;linear programming;optical fibre networks;virtualisation;wavelength division multiplexing;impairment-aware optical network virtualization;single-line-rate WDM network;mixed-line-rate WDM network;application-specific virtual optical networks;multiple independent VON;PLI-aware VON composition mechanism;physical layer impairments;service architecture;PLI-aware VON composition algorithm;SLR network;MLR network;PLI assessment model;intraVON impairment;interVON impairment;heuristic-optimal mapping method;replanning strategy;MILP mapping method;virtual link mapping method;line rate distribution method;transmission quality;Mixed integer linear programming (MILP);Mixed-line-rate (MLR) WDM networks;Optical network virtualization;Physical layer impairments (PLIs);Singleline-rate (SLR)', '10.1364/JOCN.5.000283', 'IEEE/OSA Journal of Optical Communications and Networking', '', '', '', '', 'article', '6496224', '', '', '2013', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1474, 3, 0, 3, 1, 0, 0),
(1476, 14, 'Solution to the quadratic assignment problem using semi-lagrangian relaxation', 'H. Zhang and C. Beltran-Royo and B. Wang and L. Ma and Z. Zhang', '', '27', '1063-1072', '', 'The semi-Lagrangian relaxation (SLR), a new exact method for combinatorial optimization problems with equality constraints, is applied to the quadratic assignment problem (QAP). A dual ascent algorithm with finite convergence is developed for solving the semi-Lagrangian dual problem associated to the QAP. We perform computational experiments on 30 moderately difficult QAP instances by using the mixed integer programming solvers, Cplex, and SLR+Cplex, respectively. The numerical results not only further illustrate that the SLR and the developed dual ascent algorithm can be used to solve the QAP reasonably, but also disclose an interesting fact: comparing with solving the unreduced problem, the reduced oracle problem cannot be always effectively solved by using Cplex in terms of the CPU time.', 'combinatorial mathematics;integer programming;quadratic programming;CPU time;reduced oracle problem;SLR+Cplex;mixed integer programming solvers;QAP;semiLagrangian dual problem;finite convergence;dual ascent algorithm;combinatorial optimization problems;semiLagrangian relaxation;quadratic assignment problem;Optimization;Linear programming;Systems engineering and theory;Operations research;Convergence;Algorithm design and analysis;Wiring;quadratic assignment problem (QAP);semi-Lagrangian relaxation (SLR);Lagrangian relaxation;dual ascent', '10.21629/JSEE.2016.05.14', 'Journal of Systems Engineering and Electronics', '', '', '', '', 'article', '7784189', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1475, 3, 0, 3, 1, 0, 0),
(1477, 14, 'Measure Movements of Simeiz-1873 Station in 2002-2005 by GNSS', 'A. I. Dmytrotsa', '2007 17th International Crimean Conference - Microwave Telecommunication Technology', '', '835-836', '', 'Results of measurements of movements of Simeiz-1873 SLR station are shown for 2002-2005 years.', 'satellite navigation;measure movements;SIMEIZ-1873 station;GNSS;Motion measurement;Satellite navigation systems;Global Positioning System;Turing machines;Extraterrestrial measurements;Sea measurements;Observatories;Marine technology;Intelligent networks', '10.1109/CRMICO.2007.4368966', '', '', '', '', '', 'inproceedings', '4368966', '', '', '2007', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1476, 3, 0, 3, 1, 0, 0),
(1478, 14, 'Analysing the Use of Graphs to Represent the Results of Systematic Reviews in Software Engineering', 'K. R. Felizardo and M. Riaz and M. Sulayman and E. Mendes and S. G. MacDonell and J. C. Maldonado', '2011 25th Brazilian Symposium on Software Engineering', '', '174-183', '', 'The presentation of results from Systematic Literature Reviews (SLRs) is generally done using tables. Prior research suggests that results summarized in tables are often difficult for readers to understand. One alternative to improve results\' comprehensibility is to use graphical representations. The aim of this work is twofold: first, to investigate whether graph representations result is better comprehensibility than tables when presenting SLR results; second, to investigate whether interpretation using graphs impacts on performance, as measured by the time consumed to analyse and understand the data. We selected an SLR published in the literature and used two different formats to represent its results - tables and graphs, in three different combinations: (i) table format only; (ii) graph format only; and (iii) a mixture of tables and graphs. We conducted an experiment that compared the performance and capability of experts in SLR, as well as doctoral and masters students, in analysing and understanding the results of the SLR, as presented in one of the three different forms. We were interested in examining whether there is difference between the performance of participants using tables and graphs. The graphical representation of SLR data led to a reduction in the time taken for its analysis, without any loss in data comprehensibility. For our sample the analysis of graphical data proved to be faster than the analysis of tabular data. However, we found no evidence of a difference in comprehensibility whether using tables, graphical format or a combination. Overall we argue that graphs are a suitable alternative to tables when it comes to representing the results of an SLR.', 'data analysis;graphs;reviews;software engineering;systematic literature review;SLR;table format;graph format;graphical representation;SLR data;data comprehensibility;graphical data analysis;tabular data;software engineering;Visualization;Systematics;Data visualization;Educational institutions;Context;Computer science;Software engineering;Systematic Literature Review;Visual Text Mining', '10.1109/SBES.2011.9', '', '', '', '', '', 'inproceedings', '6065161', '', '', '2011', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1477, 3, 0, 3, 1, 0, 0),
(1479, 14, 'Cost-sensitive sparse linear regression for crowd counting with imbalanced training data', 'X. Huang and Y. Zou and Y. Wang', '2016 IEEE International Conference on Multimedia and Expo (ICME)', '', '1-6', '', 'Video-based crowd counting (VCC) is a high demanded technique in many video applications. Existing supervised VCC methods essentially learn an intrinsic mapping function between image features and corresponding crowd counts. However, imbalanced training dataset degrades the performance of VCC significantly. Encouraged by recent success in cost-sensitive learning for image classification with imbalance dataset, we propose a novel cost-sensitive sparse linear regression VCC method (CS-SLR-VCC). Specifically, a sparse linear regression (SLR) model is firstly learned and the modelling errors associated with each training data are calculated accordingly. Then, aiming to eliminate the adverse effect of the high modelling errors of SLR model due to imbalanced data, all modelling errors are taken as prior knowledge to design sample-related weighting factors. Thus, a cost-sensitive SLR model is reformulated and its optimal solution is derived. Extensive experiments conducted on public UCSD and Mall benchmarks demonstrate the superior performance of our proposed CS-SLR-VCC method.', 'learning (artificial intelligence);regression analysis;video signal processing;video-based crowd counting;supervised VCC methods;intrinsic mapping function;cost-sensitive learning;image classification;cost-sensitive sparse linear regression VCC method;CS-SLR-VCC method;SLR model learning;Feature extraction;Linear regression;Data models;Training;Training data;Image edge detection;Testing;Video-based crowd counting;sparse linear regression;cost-sensitive learning;imbalanced data;model fitting', '10.1109/ICME.2016.7552905', '', '', '', '', '', 'inproceedings', '7552905', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1478, 3, 0, 3, 1, 0, 0),
(1480, 14, 'Text-Mining Techniques and Tools for Systematic Literature Reviews: A Systematic Literature Review', 'L. Feng and Y. K. Chiam and S. K. Lo', '2017 24th Asia-Pacific Software Engineering Conference (APSEC)', '', '41-50', '', 'Despite the importance of conducting systematic literature reviews (SLRs) for identifying the research gaps in software engineering (SE) research, SLRs are a complex, multi-stage, and time-consuming process if performed manually. Conducting an SLR in line with the guidelines and practice in the SE domain requires considerable effort and expertise. The objective of this SLR is to identify and classify text-mining techniques and tools that can help facilitate SLR activities. This study also investigates the adoption of text-mining (TM) techniques to support SLR in the SE domain. We performed a mixed search strategy to identify relevant studies published from January 1, 2004, to December 31, 2016. We shortlisted 32 papers into the final set of relevant studies published in the SE, medicine and social science disciplines. The majority of the text-mining techniques attempted to support the study selection stage. Only 12 out of the 14 studies in the SE domain applied text-mining techniques, focusing primarily on facilitating the search and study selection stages. By learning from the experience of applying TM techniques in clinical medicine and social science fields, we believe that SE researchers can adopt appropriate SLR automation strategies for use in the SE field.', 'data mining;software engineering;text analysis;text-mining techniques;mixed search strategy;appropriate SLR automation strategies;SLR activities;software engineering research;systematic literature review;Tools;Data mining;Bibliographies;Systematics;Guidelines;Search problems;Text mining techniques;Systematic Literature Review;Tool support', '10.1109/APSEC.2017.10', '', '', '', '', '', 'inproceedings', '8305926', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1479, 3, 0, 3, 1, 0, 0),
(1481, 14, 'Swing leg retraction using virtual apex method for the ParkourBot climbing robot', 'O. Nir and A. Gaathon and A. Degani', '2017 IEEE/RSJ International Conference on Intelligent Robots and Systems (IROS)', '', '3352-3358', '', 'This paper describes a simple control scheme for the two-legged dynamic climbing robot, the ParkourBot. Inspired by the swing leg retraction (SLR) method used on running robots, we propose to implement an SLR controller that does not require an actual apex crossing event as an initiator. The familiar SLR control for running is initiated when the center of mass (CoM) of the robot reaches the apex of its trajectory. Often, dynamic climbing gaits do not reach an apex. We therefore define an alternative initiator named, the virtual apex. We evaluate two simple models, the conservative spring loaded inverted pendulum (SLIP) model, and the more realistic non-conservative SLIP model. We show, in simulation, that using SLR we are able to stabilize and control the otherwise unstable conservative SLIP model. We also show, that using the SLR significantly increases the robustness of the non-conservative SLIP model. Finally, we validate our results through experiments on the ParkourBot climbing robot.', 'legged locomotion;mechanical stability;nonlinear control systems;open loop systems;pendulums;robot dynamics;robust control;springs (mechanical);virtual apex method;ParkourBot climbing robot;simple control scheme;two-legged dynamic climbing robot;swing leg retraction method;running robots;SLR controller;actual apex crossing event;familiar SLR control;dynamic climbing gaits;alternative initiator;nonconservative SLIP model;unstable conservative SLIP model;robot center-of-mass;robot CoM;conservative spring loaded inverted pendulum;Legged locomotion;Trajectory;Load modeling;Climbing robots;Robustness;Robot kinematics', '10.1109/IROS.2017.8206173', '', '', '', '', '', 'inproceedings', '8206173', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1480, 3, 0, 3, 1, 0, 0),
(1482, 14, 'Design of dual-band bandpass filter using stub-loaded resonator with source-load coupling and spur-line at 2.45/5.5 GHz for WLAN applications', 'Y. Lo and L. Chen and K. Lin', '2014 IEEE International Workshop on Electromagnetics (iWEM)', '', '193-194', '', 'A microstrip-line dual-band bandpass filter using stub-loaded resonator (SLR) with good selectivity in first pass band and wide bandwidth in second pass band is proposed in this paper. By properly adjusting the gap between source-load and SLR, good return loss at lower frequencies can be achieved. To further improve the rejection level between the first pass band and second pass band, the spur-line in the coupled feeding line is etched to produce the another transmission zero at 4.3 GHz. Based on the proposed SLR, a dual-band bandpass filter with three transmission zeros is implemented. The upper stopband extends widely to 10.75 GHz to have good suppression below -20 dB.', 'band-pass filters;microstrip filters;microwave filters;resonator filters;UHF filters;wireless LAN;dual band filter;band-pass filter;stub loaded resonator;source load coupling;spur line;WLAN applications;microstrip line filter;feeding line;frequency 2.45 GHz;frequency 5.5 GHz;frequency 10.75 GHz;Band-pass filters;Dual band;Resonant frequency;Microstrip filters;Resonator filters;Insertion loss;Filtering theory;bandpass filter(BPF);dual-band;spurline;stub-loaded resonator(SLR)', '10.1109/iWEM.2014.6963702', '', '', '', '', '', 'inproceedings', '6963702', '', '', '2014', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1481, 3, 0, 3, 1, 0, 0),
(1483, 14, 'Preliminary tests and performance estimate of PFMA-1, the first prototype of a plasma focus device for SLR production', 'M. Sumini and D. Mostacci and F. Rocchi and S. Mannucci and A. Tartari and E. Angeli', '2007 IEEE Nuclear Science Symposium Conference Record', '2', '1637-1642', '', 'PFMA-1 (Plasma Focus for Medical Applications - 1) is the first prototype of a new application of the plasma focus technology conceived to produce short lived radioisotopes (SLR) for medical PET-TAC imaging applications. The device is a 30 kV, 150 kJ, 40 nH Mather-type plasma focus designed for repetition frequencies up to 1 Hz and dedicated to the neutron- free endogenous production of 18F by 3He-16O reactions. This paper describes some preliminary tests related to the pressure optimization of the gases used in PFMA-1, and presents some final considerations about performance improvements.', 'plasma focus;radioactive sources;radioisotope imaging;PFMA-1;plasma focus device;short lived radioisotope production;Plasma Focus for Medical Applications - 1;medical PET-TAC imaging;pressure optimization;voltage 30 kV;energy 150 kJ;Testing;Prototypes;Plasma devices;Production;Plasma applications;Focusing;Medical services;Biomedical equipment;Radioactive materials;Biomedical imaging', '10.1109/NSSMIC.2007.4437313', '', '', '', '', '', 'inproceedings', '4437313', '', '', '2007', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1482, 3, 0, 3, 1, 0, 0),
(1484, 14, 'A Systematic Literature Review of Cloud Computing Adoption and Impacts among Small Medium Enterprises (SMEs)', 'N. A. Salleh and H. Hussin and M. A. Suhaimi and A. Md Ali', '2018 International Conference on Information and Communication Technology for the Muslim World (ICT4M)', '', '278-284', '', 'Although cloud computing is one of the most significant trends in information technology acquisition today, its adoption amongst the SMEs is still behind the larger conterparts. Additionally, among those that use, many face challenges to gain benefits as what is normally claimed. More research is needed to understand the issue. The purpose of this paper is to present the findings of a Systematic Literature Review (SLR) conducted related to cloud computing adoption among SMEs, particularly focusing on the post adoption stage. SLR method was employed as this method enable the review been done in a more comprehensive and rigorous manner. A total of 39 relevant articles were reviewed and the findings indicate that most past researches on cloud computing and SMEs focused on adoption, exploring factors that affect the adoption. Very few studies looked at the post adoption stage or the impacts of cloud computing on SMEs.', 'cloud computing;information technology;organisational aspects;reviews;small-to-medium enterprises;systematic literature review;cloud computing adoption;post adoption stage;SLR method;small medium enterprises;SME;information technology;Cloud computing;Systematics;Protocols;Encoding;Bibliographies;Market research;Cloud computing;Systematic Literature Review (SLR);Small and Medium Enterprises (SMEs);Post Adoption', '10.1109/ICT4M.2018.00058', '', '', '', '', '', 'inproceedings', '8567134', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1483, 3, 0, 3, 1, 0, 0),
(1485, 14, 'Virtual team management challenges mitigation model (VTMCMM)', 'M. Khan and A. W. Khan', '2018 International Conference on Computing, Mathematics and Engineering Technologies (iCoMET)', '', '1-6', '', 'Teams that are managed by an organization and its members are located at remote places, connected by modern communication technologies are gaining popularity day by day. The main purpose of this research work is to develop a model of Virtual Team Management Challenges mitigation (VTMCMM), to assist virtual team members for their team management. This model will be useful for outsourcing vendor industries in addressing the problems in virtual team management for offshore software development. The method which we have used in development of Virtual team management challenges mitigation model (VTMCMM) is Systematic literature review and empirical methods. We will use SLR for identifying the challenges faced by outsourcing vendors in virtual team management and practices to handle the identified challenges. We will conduct questionnaire survey in software industry for validation of the SLR findings and tried to identify some new ones apart from the identified ones. We will also conduct case study in outsourcing software industry for evaluation of our developed model through some industry experts. The expected outcome of this project is a model for virtual team management challenges that will assist virtual team members in proper management of outsourcing software development activities.', 'DP industry;outsourcing;software development management;team working;virtual enterprises;VTMCMM;virtual team members;Virtual team management challenges mitigation model;organization;communication technologies;offshore software development;software industry;SLR findings;software development activities;outsourcing;Virtual groups;Organizations;Software;Bibliographies;Outsourcing;Systematics;Cultural differences;Global software development (GSD);Virtual team management challenges mitigation model (VTMCMM);Systematic literature review (SLR)', '10.1109/ICOMET.2018.8346328', '', '', '', '', '', 'inproceedings', '8346328', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1484, 3, 0, 3, 1, 0, 0),
(1486, 14, 'Spin Axis Precession of LARES Measured by Satellite Laser Ranging', 'D. Kucharski and H. Lim and G. Kirchner and T. Otsubo and G. Bianco and J. Hwang', '', '11', '646-650', '', 'Satellite laser ranging (SLR) is an efficient technique to measure spin parameters of the fully passive satellite LARES. Analysis of the laser range measurements gives information about the spin rate of the spacecraft and the orientation of its spin axis. A frequency analysis applied to the SLR data indicates an exponential increase of the satellite\'s spin period: T = 11.7612 �exp(0.00293327 �D) , RMS = 0.115 s, where D is in days since launch. The initial spin period of LARES is calculated from the spin observations during the first 30 days after launch and is equal to T0 = 11.7131, RMS = 0.073 s. The spin axis of the satellite is precessing around the initial coordinates of right ascension RAinitial = 186.5�, RMSRA = 3.1�, and Declination Decinitial = - 73.0�, RMSDec = 0.7� (J2000 inertial reference frame), with a period of 211.7 days. The precession of the spin axis may be responsible for the observed oscillation of the slowing down rate: the spin half-life period (the time after which the spin period has doubled) varies between 209 and 267 days. The measured spin parameters of LARES are compared-and show good agreement-with the theoretical predictions given by the satellite spin model. Information about the spin parameters of LARES is necessary for the accurate modeling of the forces and torques that are affecting the orbital motion of the satellite.', 'artificial satellites;frequency-domain analysis;laser ranging;spin axis precession;satellite laser ranging;spin parameter measurement;passive satellite LARES;laser range measurement;spin rate;spacecraft;frequency analysis;SLR;satellite spin period;spin half life period;satellite spin model;satellite orbital motion;force modeling;torque modeling;Satellites;Market research;Extraterrestrial measurements;Space vehicles;Distance measurement;Measurement by laser beam;Predictive models;LARES;satellite laser ranging (SLR);satellite spin', '10.1109/LGRS.2013.2273561', 'IEEE Geoscience and Remote Sensing Letters', '', '', '', '', 'article', '6575147', '', '', '2014', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1485, 3, 0, 3, 1, 0, 0),
(1487, 14, 'Software evolution visualization techniques and methods - a systematic review', 'H. B. Salameh and A. Ahmad and A. Aljammal', '2016 7th International Conference on Computer Science and Information Technology (CSIT)', '', '1-6', '', 'Background: Software is an important asset for organizations and development teams. It must evolve over time in order to meet different changes in its environment, satisfy the developers\' needs, and adapt to new requirements. Software developers and team members face difficulties tracking the changes others made to their software. Software visualization is one of the effective techniques that help stakeholders to better understand how software evolves, and which parts of the software are most affected by the change. Many visualization tools and techniques have been introduced by researchers and organizations to facilitate such understanding. Method: This article presents a systematic literature review (SLR) on software evolution visualization (SEV) tools. The SLR\'s main focus is to: (1) explore the main target of SEV, (2) analyze the classifications and taxonomies that are used to represent SEV tools, and (3) find out what are the main sources of information used to visualize software\'s evolution. Result: 29 papers were analyzed out of 55 papers. The result showed that SEV tools can be classified into five different groups: graph-based, notation-based, matrix-based, and metaphor-based and others. Graph-based are most popular while Notation-based are the least. SEVs focus can be either Artifact-centric visualization, Metric-centric visualization, Feature-centric visualization, or Architecture-centric visualization. The main source of information used to ex-tract information are the software repositories. Conclusion: This work can help developer, maintainer, researcher to get good knowledge about the state of software evolution and visualization as a whole.', 'data visualisation;graph theory;matrix algebra;software tools;software evolution visualization techniques;software development;visualization tools;systematic literature review;SLR;SEV tools;graph-based tools;notation-based tools;matrix-based tools;metaphor-based tools;artifact-centric visualization;metric-centric visualization;feature-centric visualization;architecture-centric visualization;Software;Visualization;Data visualization;Unified modeling language;Object oriented modeling;Systematics;History;Evolution;History;CVS;Repository;Systematic Literature Review (SLR);Software;Tools;Visualization;SEV', '10.1109/CSIT.2016.7549475', '', '', '', '', '', 'inproceedings', '7549475', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1486, 3, 0, 3, 1, 0, 0),
(1488, 14, 'A Systematic Literature Review of Hardware Neural Networks', 'D. Parra and C. Camargo', '2018 IEEE 1st Colombian Conference on Applications in Computational Intelligence (ColCACI)', '', '1-6', '', 'Although Neural Networks (NN) are extremely useful for the solution of several problems such as object recognition and semantic segmentation, the NN libraries usually target devices which face several drawbacks such as memory bottlenecks and limited efficiency (e.g. GPUs, multi-core processors). Fortunately, the recent implementation of Hardware Neural Networks aims to tackle down this problem and for that reason several researchers had turn back their attention to them. This paper presents the Systematic Literature Review (SLR) of the most relevant HNN works presented in the last few years. The main sources chosen for the SLR were the IEEE Computer Society Digital Library and the SCOPUS indexing system, from which 61 papers were reviewed according to the inclusion and exclusion criteria, and of which after a detail assessment, only 20 papers remained. Moreover, the increase in the number of papers per year reflects that the interest in HNN had been growing up. Finally, the results show that the most popular NN hardware platforms are the FPGAs-based.', 'digital libraries;field programmable gate arrays;indexing;neural nets;Hardware Neural Networks;object recognition;semantic segmentation;NN libraries;memory bottlenecks;multicore processors;SLR;IEEE Computer Society Digital Library;popular NN hardware platforms;HNN;SCOPUS indexing system;Hardware;Artificial neural networks;Conferences;Bibliographies;Field programmable gate arrays;Libraries;HNN;SLR;Framework;FPGA;Neural Networks', '10.1109/ColCACI.2018.8484858', '', '', '', '', '', 'inproceedings', '8484858', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1487, 3, 0, 3, 1, 0, 0),
(1489, 14, 'Energy consumption analysis in multi-legged robots based on gait planning', 'X. Du and S. Wang and X. Zong and J. Wang', '2016 35th Chinese Control Conference (CCC)', '', '6183-6188', '', 'Currently, the multi-legged robots have to confront the problem of low energy utilization that restricts the moving radius of robots. Aimed at the problem of energy consumption for mobile robots, this paper provides the analysis in terms of the gait planning. Firstly, two kinds of gait curves Respectively, cycloid curve and Bezier curve are introduced and the main difference of two gait patterns is that the Bezier curve can achieve the swing leg retraction (SLR). The length of step (S), the height of step (H) and the duty ratio of gait cycle (�) are set as the primary research points about the gait of mobile robot. In this work, we formulate two indexes to quantitatively describe the performance of the quadruped robot and related simulations are carried out for gait parameters. Finally, the results provide some recommendations for the gait planning of the quadruped robot, that is, the changes of gait parameters influence the index of energy consumption and SLR can effectively reduce energy consumption.', 'biomechanics;energy consumption;legged locomotion;position control;energy consumption analysis;multilegged robots;low energy utilization problem;mobile robots;gait planning;gait curves;cycloid curve;Bezier curve;gait patterns;swing leg retraction;SLR;duty ratio;quadruped robot;gait parameters;energy consumption reduction;Three-dimensional displays;Energy consumption;Multi-legged robot;Gait planning;SLR;Gait parameters', '10.1109/ChiCC.2016.7554327', '', '', '', '', '', 'inproceedings', '7554327', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1488, 3, 0, 3, 1, 0, 0);
INSERT INTO `papers` (`id_paper`, `id_bib`, `title`, `author`, `book_title`, `volume`, `pages`, `num_pages`, `abstract`, `keywords`, `doi`, `journal`, `issn`, `location`, `isbn`, `address`, `type`, `bib_key`, `url`, `publisher`, `year`, `added_at`, `update_at`, `data_base`, `id`, `status_selection`, `check_status_selection`, `status_qa`, `id_gen_score`, `check_qa`, `score`) VALUES
(1490, 14, 'Smart campus features, technologies, and applications: A systematic literature review', 'W. Muhamad and N. B. Kurniawan and Suhardi and S. Yazid', '2017 International Conference on Information Technology Systems and Innovation (ICITSI)', '', '384-391', '', 'Research in the smart campus area is still growing, where every researcher defines the concept of smart campus with a less thorough perspective that has not been conical in the same conception of the concept. In this paper, we summarize the existing condition of smart campus development in term of features, supported technologies, and applications were built using systematic literature review (SLR) as the standard methodology used to solve any problems by tracing the results of previous research. The problems declared in SLR are commonly called as research question (RQ). To achieve that goal, we define some RQs related to that scope and clarify each question by tracing previous research papers which are indexed in reputable journal databases such as IEEE Xplore, Scopus, Springerlink, and ScienceDirect. After synthesizing 29 articles, the results are: contactless technology provides an easier way to enter data when accessing a particular room or equipment than using a keyboard; IoT supports an easier way to report real-time environment status; cloud computing is used to organize various information effectively and provide data services; iCampus becomes a popular smart campus model and if we map the applications that have been built into iCampus; there is no applications as part of iHealth domain. The main contribution of smart campus development based on previous research is to make easier in all campus aspect life. The contribution expected through this paper is to provide an overview for researchers who want to build applications in a campus as research challenge so that they can use appropriate technology and meet the characteristics of smart campus.', 'cloud computing;educational institutions;Internet of Things;RQ;journal databases;IEEE Xplore;Scopus;Springerlink;ScienceDirect;IoT;cloud computing;iCampus;campus aspect life;contactless technology;research question;SLR;systematic literature review;smart campus features;smart campus;SLR;summary;research challenge', '10.1109/ICITSI.2017.8267975', '', '', '', '', '', 'inproceedings', '8267975', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1489, 3, 0, 3, 1, 0, 0),
(1491, 14, 'A new system for Chinese sign language recognition', 'J. Zhang and W. Zhou and H. Li', '2015 IEEE China Summit and International Conference on Signal and Information Processing (ChinaSIP)', '', '534-538', '', 'In this paper, we propose a new system for isolated sign language recognition (SLR) and continuous SLR. In isolated SLR, Histogram of Oriented Displacement is used to describe the trajectories, and multi-SVM is adopted for classification. In continuous SLR, we propose a Dynamic Programming method with warping templates obtained by Dynamic Time Warping (DTW) algorithm. We evaluate our approach with 450 phrases and 180 sentences recorded by Kinect and compare with classical methods, including Hidden Markov Models and state-of-the-art Conditional Random Fields (CRF), Hidden CRF and Latent Dynamic CRF. The experiments demonstrate the effectiveness of our method.', 'dynamic programming;image classification;natural language processing;sign language recognition;support vector machines;Chinese sign language recognition;isolated sign language recognition;isolated SLR;continuous SLR;histogram of oriented displacement;multiSVM;image classification;dynamic programming method;warping templates;dynamic time warping;DTW algorithm;Kinect;Assistive technology;Gesture recognition;Hidden Markov models;Trajectory;Accuracy;Histograms;Skeleton;Sign language recognition;Histogram of Oriented Displacement;Dynamic Time Warping;Dynamic Programming', '10.1109/ChinaSIP.2015.7230460', '', '', '', '', '', 'inproceedings', '7230460', '', '', '2015', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1490, 3, 0, 3, 1, 0, 0),
(1492, 14, 'Review in Sign Language Recognition Systems', 'M. Ebrahim Al-Ahdal and M. T. Nooritawati', '2012 IEEE Symposium on Computers Informatics (ISCI)', '', '52-57', '', 'The Sign Language Recognition System (SLR) is highly desired due to its ability to overcome the barrier between deaf and hearing people. At present, a robust SLR is still unavailable in the real world due to numerous obstacles. Additionally, as we know, Sign Language recognition has emerged as one of the most important research areas in the field of human computer interaction (HCI). Hence, this paper presents an overview of the main research works based on the Sign Language recognition system, and the developed system classified into the sign capturing method and recognition techniques is discussed. The strengths and disadvantages that contribute to the system functioning perfectly or otherwise will be highlighted by invoking major problems associated with the developed systems. Next, a novel method for designing SLR system based on combining EMG sensors with a data glove is proposed. This method is based on electromyography signals recorded from hands muscles for allocating word boundaries for streams of words in continuous SLR. The proposed system is expected to resolve words segmentation problem, which will contribute to enhanced recognition capability for the continuous sign recognition system.', 'data gloves;electromyography;gesture recognition;handicapped aids;human computer interaction;sign language recognition system;robust SLR system;human computer interaction;HCI;sign capturing method;EMG sensors;data glove;electromyography signals;word boundary allocation;word streams;continuous SLR;word segmentation problem;enhanced recognition capability;continuous sign recognition system;Hidden Markov models;Handicapped aids;Electromyography;Feature extraction;Artificial neural networks;Training;Muscles;ASR;Data-glove;EMG;ANN;HMM', '10.1109/ISCI.2012.6222666', '', '', '', '', '', 'inproceedings', '6222666', '', '', '2012', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1491, 3, 0, 3, 1, 0, 0),
(1493, 14, 'Slice Profile Experimental Comparison of Shinnar-Le Roux Pulse and SINC Pulse in Magnetic Resonance Imaging', 'M. Gao and W. Yang and S. Wei and W. Tang', '2016 8th International Conference on Information Technology in Medicine and Education (ITME)', '', '286-289', '', 'In this study, Shinnar-Le Roux algorithm is used for designing the radio frequency pulses in MRI in order to reduce the nonlinearity effect of the Bloch equation. Some MRI experiments are conducted to show the effectiveness of Shinnar-Le Roux algorithm by comparing the difference between SLR pulsed slice profile and SINC pulsed slice profile. The experimental results indicates that the slice profile of SLR pulse has smaller ripples and is more uniform than SINC pulse. By reducing the interference of slices, the SLR pulse can improve the imaging quality to a great extent.', 'biomedical MRI;polynomials;Shinnar-Le Roux pulse;magnetic resonance imaging;MRI;Shinnar-Le Roux algorithm;radio frequency pulses;nonlinearity effect;Bloch equation;SINC pulsed slice profile;imaging quality;Passband;Algorithm design and analysis;Radio frequency;Magnetic resonance imaging;Mathematical model;Magnetization;Transforms;SLR;RF pulse;slice profile;SINC', '10.1109/ITME.2016.0071', '', '', '', '', '', 'inproceedings', '7976485', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1492, 3, 0, 3, 1, 0, 0),
(1494, 14, 'Study of Sea Level Rise Using Tide Gauge Data Year 1996 to 2015 at Semarang and Prigi Stations', 'M. Faridatunnisa and L. S. Heliani', '2018 4th International Conference on Science and Technology (ICST)', '', '1-4', '', 'Sea level rise monitoring using tide gauge data is done continuously so that long period data is available. The objective of this research is to analyze sea level rise from long period tide gauge data. This research uses tide gauge data in Semarang and Prigi station period 1996 to 2015. Data processing is done using Matlab 2013b to plot sea level rise data and to calculate the the trend of sea level rise. Initial stage of data processing is quality control of tide gauge data by eliminating outlier data with confidence level of three sigmas and filled empty data with NaN (Not A Number). Shifting correction is done if there is reference bias at some period of data recording at a station. Processing followed by calculation of monthly MSL (Mean Sea Level) and SLR (Sea Level Rise) with linear regression to calculate trend value of sea level rise. The result of this research is at Semarang tidal station produces SLR 4,4 mm/year with SEE 0,1 mm. At Prigi station, SLR calculation is divided into three periods namely 1996 to 1999, 2002 to 2009 and 2010 to 2015 due to more than 1 year data vacuum. Data period 1996 to 1999 shows the falling in sea level about 10.2 mm/yr with SEE 0.3 mm, 2002 to 2009 data period produces sea level rise 25.5 mm/yr with SEE 0.2 mm, and 2010 to 2015 data period shows the falling in sea level about 0.07 mm/yr with SEE 0.08 mm. The conclusions of this study are the rise and fall of sea level influenced by EI Nino and La Nina phenomena and climate change.', 'climatology;oceanographic regions;quality control;regression analysis;sea level;tides;tide gauge data year;Sea level rise monitoring;long period data;long period tide gauge data;data processing;plot sea level rise data;Mean Sea Level;1 year data vacuum;2009 data period;size 0.3 mm;size 0.2 mm;size 0.08 mm;size 1.0 mm;time 1.0 year;Sea level;Tides;Market research;Mathematical model;Linear regression;Ocean temperature;tide gauge data;monthly MSL;SLR', '10.1109/ICSTC.2018.8528668', '', '', '', '', '', 'inproceedings', '8528668', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1493, 3, 0, 3, 1, 0, 0),
(1495, 14, 'Quad-Band Superconducting Bandpass Filter Using Quad-Mode Stub-Loaded Resonators With Controllable Frequencies and Bandwidths', 'F. Song and L. Zhu and B. Wei and B. Cao and L. Jiang and B. Li', '', '26', '1-10', '', 'Two quad-band high-temperature superconducting (HTS) bandpass filters (BPFs) using quad-mode stub-loaded resonators (QMSLRs) and quad-feeding structures are presented. The quad-mode resonators are found to be advantageous because the couplings of four resonant frequencies can be easily adjusted by four coupling areas. The quad-feeding structure, containing two coupled lines and two tapped lines, can offer the adequate degrees of freedom to achieve the desired external quality factor$Q_e$. Therefore, it can independently control external couplings and coupling coefficients. Moreover, the proposed QMSLRs can conveniently be utilized to tune the four passband frequencies. Both the frequencies and bandwidths of each passband can be easily controlled. The first third-order filter prototype with a fractional bandwidth of 1% is initially designed and implemented to verify the theory. Afterward, the second fourth-order filter with an absolute bandwidth of 10 MHz is realized to certify the capacity of a high-order quad-band BPF. Finally, two HTS BPFs are fabricated, and the measured results agree well with the theory.', 'Resonant frequency;Band-pass filters;Superconducting filters;High-temperature superconductors;Passband;Resonator filters;Controllable bandwidths;bandpass filter (BPF);quad band;high-temperature superconducting (HTS);stub-loaded resonator (SLR);Controllable bandwidths;bandpass filter (BPF);quad-band;high-temperature superconducting (HTS);stub-loaded resonator (SLR)', '10.1109/TASC.2016.2577607', 'IEEE Transactions on Applied Superconductivity', '', '', '', '', 'article', '7486026', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1494, 3, 0, 3, 1, 0, 0),
(1496, 14, 'Time-to-Digital Converter With 2.1-ps RMS Single-Shot Precision and Subpicosecond Long-Term and Temperature Stability', 'D. Vyhlidal and M. Cech', '', '65', '328-335', '', 'This paper presents the design and performance measurement results of a prototype time-to-digital converter (TDC) implemented using commercially available components. The TDC is based on an interpolation principle. In this principle, the time interval is first roughly digitized by a coarse counter driven by a high-stability reference clock, and the fractions between the clock periods are measured by two high-resolution interpolators based on the time-to-amplitude conversion method. This principle ensures theoretically unlimited measurement range with fine time resolution. The TDC achieves 2.1-ps rms time interval measurement precision with a resolution of 0.17 ps and the maximum measurement rate of 200 Hz. The estimated single-channel precision is 1.5-ps rms. A unique circuit structure was developed to allow individual channel calibration after each event. During the calibration, a value corresponding to one reference clock period is obtained. This gives the TDC an outstanding long-term stability of 110 fs peak-peak and a long-term drift of 0.2 fs/h over a 24-h interval. The calibration also helps to obtain a high temperature stability of 0.2 ps/�C. The power consumption is 10 W. The circuit structure allows for programmable customization of the TDC to satisfy many potential applications in time-of-flight systems, such as laser range finding or event counting.', 'calibration;clocks;interpolation;stability;time measurement;time-digital conversion;time-to-digital converter;RMS single-shot precision;subpicosecond long-term;temperature stability;TDC;interpolation principle;high-stability reference clock;time-to-amplitude conversion method;time interval measurement precision;single-channel precision estimation;channel calibration;time-of-flight system;time 2.1 ps;time 0.17 ps;frequency 200 Hz;time 1.5 ps;time 110 fs;power 10 W;Clocks;Field programmable gate arrays;Calibration;Measurement uncertainty;Capacitors;Pulse generation;Event counter;laser radar;laser range finder;satellite laser ranging (SLR);time of flight;time-to-amplitude conversion (TAC);time-to-digital converter (TDC).;Event counter;laser radar;laser range finder;satellite laser ranging (SLR);time of flight;time-to-amplitude conversion (TAC);time-to-digital converter (TDC)', '10.1109/TIM.2015.2490418', 'IEEE Transactions on Instrumentation and Measurement', '', '', '', '', 'article', '7312477', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1495, 3, 0, 3, 1, 0, 0),
(1497, 14, 'Dual-Band High-Temperature Superconducting Bandpass Filter Using Quint-Mode Stub-Loaded Resonators', 'F. Song and B. Wei and L. Zhu and B. Cao and X. Lu', '', '25', '1-10', '', 'Two dual-band high-temperature superconducting (HTS) bandpass filters (BPFs) using quint-mode stub-loaded resonators are presented. The quint-mode resonator is formed by loading four open-circuit stubs in shunt. By properly adjusting the lengths of the resonator, three transmission zeros separate five resonant frequencies into two groups. The first three resonant frequencies form the first passband. The two other frequencies are combined to create the second passband. In addition, a novel approach is proposed to extract the external quality factor Qe based on the group delay of S21. A magnetic coupling is introduced to adjust external coupling to meet the desired external Qe. The first filter prototype is initially designed and implemented to verify the theory. Afterward, the second filter is constituted by introducing an additional half-wavelength resonator, resulting to improve the isolation between two desired passbands. Finally, two HTS BPFs are fabricated, and measured results agree well with theory.', 'band-pass filters;high-temperature superconductors;magnetic circuits;resonator filters;superconducting filters;dual-band high-temperature superconducting bandpass filter;quintmode stub-loaded resonator;HTS;BPF;open-circuit stub;transmission zero;external quality factor;magnetic coupling;half-wavelength resonator;Resonant frequency;Band-pass filters;Superconducting filters;Dual band;Resonator filters;Couplings;Filtering theory;Bandpass filter (BPF);dual band;external quality factor;high-temperature superconducting (HTS);stub-loaded resonator (SLR);Bandpass filter (BPF);dual band;external quality factor;high-temperature superconducting (HTS);stub-loaded resonator (SLR)', '10.1109/TASC.2015.2427358', 'IEEE Transactions on Applied Superconductivity', '', '', '', '', 'article', '7097000', '', '', '2015', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1496, 3, 0, 3, 1, 0, 0),
(1498, 14, 'Dual-Band Bandpass Filters Using Stub-Loaded Resonators', 'X. Y. Zhang and J. Chen and Q. Xue and S. Li', '', '17', '583-585', '', 'Dual-band bandpass filters using novel stub-loaded resonators (SLRs) are presented in this letter. Characterized by both theoretical analysis and full-wave simulation, the proposed SLR is found to have the advantage that the even-mode resonant frequencies can be flexibly controlled whereas the odd-mode resonant frequencies are fixed. Based on the proposed SLR, a dual-band filter is implemented with three transmission zeros. To further improve the selectivity, a filter with four transmission zeros on either side of both passbands is designed by introducing spur-line. The measured results validate the proposed design.', 'band-pass filters;resonator filters;dual-band bandpass filters;stub-loaded resonators;full-wave simulation;even-mode resonant frequencies;odd-mode resonant frequencies;transmission zeros;Dual band;Band pass filters;Resonator filters;Resonant frequency;Filtering theory;Equivalent circuits;Passband;Analytical models;Microstrip resonators;Admittance;Bandpass filter (BPF);dual-band;stub-loaded resonator (SLR)', '10.1109/LMWC.2007.901768', 'IEEE Microwave and Wireless Components Letters', '', '', '', '', 'article', '4285683', '', '', '2007', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1497, 3, 0, 3, 1, 0, 0),
(1499, 14, 'Blockchain Technology and Implementation : A Systematic Literature Review', 'H. R. Andrian and N. B. Kurniawan and Suhardi', '2018 International Conference on Information Technology Systems and Innovation (ICITSI)', '', '370-374', '', 'As research on blockchain continues to grow, blockchain technology was adopted to develop several information systems. There are many opportunities to examine the utilization of blockchain technology to be used in developing systems as needed. This paper summarizes the conditions of blockchain research in terms of technology and its implementation. This paper was written using a systematic literature review (SLR) as one of the methodologies used to solve problems by tracing the results of previous studies. The problem that you want to study in SLR is usually referred to as a research question (RQ). The defined RQ is related to the topic and clarifies each question by tracing previous research papers indexed in reputable journal databases such as IEEE Xplore, Springerlink, Scopus, and ScienceDirect. After synthesizing 41 articles, the result is: blockchain can be used in many applications, some applications that adopt blockchain technology are banking applications, e-voting applications and digital forensic applications. Often, applications that use blockchain technology only focus on developing one of the blockchain technologies that suits their needs. Some developers maximize the components of the contract on the blockchain, some further develop the data structure of the blockchain itself. The use of blockchain technology is still wide open for the implementation of other information systems. The expected contribution of this paper is to provide a general overview for researchers who want to build applications that use blockchain as a basis for researching so they can conduct further studies to better understand whether the applications they will develop are suitable for using blockchain technology as a basis.', 'Blockchain;Smart contracts;Peer-to-peer computing;Cryptography;Distributed databases;Digital forensics;Blockchain;SLR;technology', '10.1109/ICITSI.2018.8695939', '', '', '', '', '', 'inproceedings', '8695939', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1498, 3, 0, 3, 1, 0, 0),
(1500, 14, 'High-Selective Compact UWB Bandpass Filter With Dual Notch Bands', 'P. Sarkar and R. Ghatak and M. Pal and D. R. Poddar', '', '24', '448-450', '', 'In this letter, a novel high selective UWB band pass filter (BPF) with dual notch bands is presented. UWB BPF is realized using open stub and short stub loaded resonator (SLR). The resonators are realized to incorporate four resonating modes in the UWB passband extending from 3.14 to 10.53 GHz. Two transmission zeroes at 3.01 and 10.68 GHz, near to the UWB passband, increases the selectivity of the filter. Half wavelength long spiral resonators as slots are implemented in ground plane to achieve notch band at 5.13 GHz and an inward folded resonator is placed near to the open SLR to achieve notch at 8.0 GHz. Measured passband insertion loss is within 1.5 dB. The prototype of the proposed UWB BPF is fabricated and measured. Simulated response of the designed BPF agrees well with the measured result.', 'band-pass filters;microwave filters;resonator filters;high selective compact UWB band-pass filter;dual notch bands;open stub loaded resonator;short stub loaded resonator;half wavelength long spiral resonators;inward folded resonator;frequency 3.14 GHz to 10.53 GHz;loss 1.5 dB;Band-pass filters;Passband;Resonant frequency;Wireless communication;Filtering theory;Spirals;Prototypes;Bandpass filter (BPF);notch band;stub loaded resonator (SLR) and spiral resonator;ultrawideband (UWB)', '10.1109/LMWC.2014.2316214', 'IEEE Microwave and Wireless Components Letters', '', '', '', '', 'article', '6809861', '', '', '2014', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1499, 3, 0, 3, 1, 0, 0),
(1501, 14, 'Design of Tri-Band Filter Based on Stub Loaded Resonator and DGS Resonator', 'X. Lai and C. Liang and H. Di and B. Wu', '', '20', '265-267', '', 'A tri-band bandpass filter using stub loaded resonator (SLR) and defected ground structure (DGS) resonator is proposed in this letter. The DGS resonator on the lower plane constructs the first pass-band, and the SLR on the upper plane forms the second and third pass-bands, in which a DGS loop is properly used to provide the coupling between the SLRs. The three pass-bands are combined together with a common T-shaped feed line, and a reasonable tuning method is adopted to tune the three pass-bands with smooth responses. A compact tri-band filter with three pass-bands centered at 2.45, 3.5, and 5.25 GHz is designed and fabricated. The measurement results agree well with the full-wave electromagnetic designed responses.', 'band-pass filters;resonator filters;stub loaded resonator;DGS resonator;triband bandpass filter;defected ground structure resonator;DGS loop;T-shaped feed line;reasonable tuning method;full-wave electromagnetic designed response;frequency 2.45 GHz;frequency 3.5 GHz;frequency 5.25 GHz;Resonator filters;Band pass filters;Feeds;Dual band;Microwave filters;Radio frequency;Microwave technology;Wireless LAN;Design methodology;Resonant frequency;Defected ground structure (DGS) resonator;stub-loaded resonator (SLR);tri-band filter;T-shaped feed line', '10.1109/LMWC.2010.2045584', 'IEEE Microwave and Wireless Components Letters', '', '', '', '', 'article', '5445051', '', '', '2010', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1500, 3, 0, 3, 1, 0, 0),
(1502, 14, 'Ajisai Spin Parameter Determination Using Graz Kilohertz Satellite Laser Ranging Data', 'G. Kirchner and W. Hausleitner and E. Cristea', '', '45', '201-205', '', 'The spin rate and direction of the spherical satellite Ajisai and its slowdown between October 2003 and June 2005 were determined using Graz full-rate kilohertz satellite laser ranging (SLR) data. The high density of the kilohertz data results in a precise scanning of the satellite\'s retroreflector panel orientation during the spin motion. Applying spectral analysis methods, the resulting frequencies allow the identification of the arrangement of the involved laser retroreflector panels at any instant in time during the pass. Using this method, the spin rate with a high accuracy (a root mean square of 4.03times10-4 Hz) and the slowdown of the spin rate during the investigated period with a magnitude of 0.0077497 Hz/year were calculated. These results were obtained in near real time from automatically performed analysis procedures during routine SLR tracking, i.e., day and night observations without any additional hardware', 'artificial satellites;geophysical techniques;laser ranging;Ajisai spin parameter determination;AD 2003 10;AD 2005 06;Graz full-rate kilohertz satellite laser ranging data;satellite retroreflector panel orientation;spectral analysis methods;laser retroreflector panels;spherical satellite spin rate;spherical satellite spin direction;Spectral analysis;Mirrors;Photometry;Satellite ground stations;Timing;Extraterrestrial measurements;Magnetic field measurement;Frequency;Root mean square;Performance analysis;Ajisai;kilohertz satellite laser ranging (SLR);satellite spin parameters;spectral analysis;spherical satellites', '10.1109/TGRS.2006.882254', 'IEEE Transactions on Geoscience and Remote Sensing', '', '', '', '', 'article', '4039622', '', '', '2007', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1501, 3, 0, 3, 1, 0, 0),
(1503, 14, 'Triangular-Shaped Single-Loop Resonator: A Triple-Band Metamaterial With MNG and ENG Regions in S/C Bands', 'O. Yurduseven and A. E. Yilmaz and G. Turhan-Sayan', '', '10', '701-704', '', 'A new metamaterial topology, called triangular-shaped single-loop resonator (SLR), is introduced with two distinct �-negative (MNG) regions and one e-negative (ENG) region over the S/C frequency bands. Transmission and reflection characteristics of the suggested subwavelength resonator are analyzed using full-wave electromagnetic solvers, Ansoft HFSS and CST Microwave Studio (MWS), to demonstrate the presence of four closely located resonance frequencies within the 3.3-5.1 GHz range. Effective permittivity and permeability parameters of the resulting composite medium are retrieved from simulated complex scattering parameters to verify the existence of fully developed MENG and ENG regions. Dependence of the resonance frequencies on the design parameters of the triangular SLR unit cell and on the presence of its gaps are also investigated in detail.', 'computational electromagnetics;metamaterials;microwave resonators;permeability;permittivity;S-parameters;triangular shaped single loop resonator;triple band metamaterial topology;MNG region;ENG region;�-negative region;e-negative region;S/C frequency band;Transmission characteristics;reflection characteristics;subwavelength resonator;full wave electromagnetic solver;Ansoft HFSS;CST Microwave Studio;permeability parameter;permittivity parameter;scattering parameter;frequency 3.3 GHz to 5.1 GHz;Metamaterials;Magnetic materials;Permittivity;Magnetic resonance;Substrates;Permeability;Metamaterials;negative permeability;negative permittivity;single-loop resonator (SLR)', '10.1109/LAWP.2011.2161742', 'IEEE Antennas and Wireless Propagation Letters', '', '', '', '', 'article', '5951730', '', '', '2011', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1502, 3, 0, 3, 1, 0, 0),
(1504, 14, 'On the ability to cover LR(k) grammars with LR(1), SLR(1), and (1,1) bounded-context grammars', 'M. D. Mickunas and V. B. Schneider', '14th Annual Symposium on Switching and Automata Theory (swat 1973)', '', '109-121', '', '', 'Vocabulary;Production', '10.1109/SWAT.1973.21', '', '', '', '', '', 'inproceedings', '4569735', '', '', '1973', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1503, 3, 0, 3, 1, 0, 0),
(1505, 14, 'SLR: Semi-Coupled Locality Constrained Representation for Very Low Resolution Face Recognition and Super Resolution', 'T. Lu and X. Chen and Y. Zhang and C. Chen and Z. Xiong', '', '6', '56269-56281', '', 'Although face recognition algorithms have been greatly successful recently, in real applications of very low-resolution (VLR) images, both super-resolution (SR) and recognition tasks are more challenging than those in high-resolution (HR) images. Given the rare discriminative information in VLR images, the one-to-many mapping relationship between HR and VLR images degrades the SR and recognition performances. In this paper, we propose a novel semi-coupled dictionary learning scheme to promote discriminative and representative abilities for face recognition and SR simultaneously by relaxing coupled dictionary learning. Specifically, we use semi-coupled locality-constrained representation to enhance the consistency between VLR and HR local manifold geometries, thereby overcoming the negative effects of one-to-many mapping. Given the learned task-oriented mapping function, we feed these discriminative features into a collaborative representation-based classifier to output their labels, and combine a locality-induced approach to hallucinate the HR images. Extensive experimental results demonstrate that the proposed approach outperforms a number of state-of-the-art face recognition and SR algorithms.', 'face recognition;feature extraction;geometry;image classification;image representation;image resolution;learning (artificial intelligence);task-oriented mapping function;semicoupled locality-constrained representation;coupled dictionary learning;one-to-many mapping relationship;very low-resolution images;very low resolution face recognition;HR images;locality-induced approach;collaborative representation-based classifier;discriminative features;representative abilities;discriminative abilities;novel semicoupled dictionary learning scheme;VLR images;rare discriminative information;face recognition algorithms;super resolution;semicoupled locality constrained representation;Image resolution;Face recognition;Face;Manifolds;Task analysis;Image recognition;Dictionaries;Very low-resolution;semi-coupled locality-constrained representation;face recognition;face hallucination', '10.1109/ACCESS.2018.2872761', 'IEEE Access', '', '', '', '', 'article', '8476616', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1504, 3, 0, 3, 1, 0, 0),
(1506, 14, 'Towards a fuzzy multiagent tutoring system for M-learners\' emotion regulation', 'M. Abdelkefi and I. Kallel', '2017 16th International Conference on Information Technology Based Higher Education and Training (ITHET)', '', '1-6', '', 'An intelligent Tutoring System (ITS) is a computer-based instructional system, involving intelligent algorithms and strategies, which brings a remarkable progress in the learning processes when the internet is �always on�. In fact, ITS makes inferences about a student\'s proficiency level in order to dynamically adapt the learning content or the tutoring style. Around the same time, emotions, whether positive or negative, affect the learning process. Accordingly, the regulation of learners\' negative emotional state, is an imperious factor in learning, in order to optimize learners\' performances and to improve learning productivity during an ITS episode. Firstly, this paper presents a systematic literature review (SLR) on strategies for regulating the emotional state of learners in the point of view of (a) emotion recognition, (b) emotion modelling, (c) emotion recognition theories, and (d) emotion recognition approaches and methods. Secondly, the paper proposes a new intelligent method, and presents its architecture as a Fuzzy Emotional Regulation for ITS distributed under the Multiagent Approach. This architecture will be used to generate an Emotionally Intelligent Tutoring Sys-tem (EITS) allowing learner to achieve his educational purpose adaptively, anywhere and at any time.', 'distance learning;emotion recognition;intelligent tutoring systems;Internet;multi-agent systems;learning process;imperious factor;learning productivity;systematic literature review;emotion modelling;emotion recognition theories;intelligent method;Fuzzy Emotional Regulation;Multiagent Approach;Emotionally Intelligent Tutoring Sys-tem;fuzzy multiagent tutoring system;M-learners\' emotion regulation;instructional system;student;learning content;tutoring style;EITS;educational purpose;SLR;Motorcycles;Psychology;Bibliographies;Emotion recognition;Education;Cognition;systematic literature review (SLR);Intelligent Tutoring Systems (ITS);M-learning;Emotion Regulation;Multiagent system;Fuzzy Logic', '10.1109/ITHET.2017.8067821', '', '', '', '', '', 'inproceedings', '8067821', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1505, 3, 0, 3, 1, 0, 0),
(1507, 14, 'AVSS 2011 demo session: Intelligent crossing sensor and vehicle detector', 'M. Rosner', '2011 8th IEEE International Conference on Advanced Video and Signal Based Surveillance (AVSS)', '', '535-535', '', 'Summary form only given. The availability of protocol features with iterative configurability is central to the successful adoption of reusable IP in SoC development. However, the promise of ultimately shrinking the SoC development TTM whilst also allowing greater resourcing efficiency can only be realized with a comprehensive approach to delivering the software, digital and analog components of the protocol to the SoC top level integration as IP subsystems with the correct integration views. This talk will discuss quantitatively how the combination of configurability, quality and integration at the IO protocol can systematically reduce the SoC development and resource plan. It will be demonstrated with examples for DDR and PCIe IO protocols as well as examples from application specific SoC\'s.', '', '10.1109/AVSS.2011.6027404', '', '', '', '', '', 'inproceedings', '6027404', '', '', '2011', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1506, 3, 0, 3, 1, 0, 0),
(1508, 14, 'LED module corresponding standard light', 'E. M. Gutzeit and V. E. Maslov', '2012 International Conference on Actual Problems of Electron Devices Engineering', '', '277-281', '', 'The possibilities of obtaining CRI LED devices above 90 by simulating the spectra of standard daylight sources and Planckian radiators are analized.', 'daylighting;light emitting diodes;LED module;standard light;CRI LED devices;standard daylight source spectra;Planckian radiators', '10.1109/APEDE.2012.6478061', '', '', '', '', '', 'inproceedings', '6478061', '', '', '2012', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1507, 3, 0, 3, 1, 0, 0),
(1509, 14, 'Pseudoelliptic Combline Filter in a Circularly Shaped Tube', 'R. Tkadlec and G. Macchiarella', '2018 IEEE/MTT-S International Microwave Symposium - IMS', '', '1099-1102', '', 'A new configuration of inline combline filter with pseudoelliptic response is presented in this paper. The proposed filter consists of transversally placed and mutually rotated com-bline resonators inside a cylindrical tube. Various filter configurations with arbitrary placed transmission zeros (TZ) can be obtained by proper resonators arrangement. Furthermore, in comparison to conventional cross-coupled filters, the proposed configuration does not require any additional coupling elements and provides more compact overall dimensions. To validate the proposed configuration a fifth-order filter with two TZ has been designed, manufactured, and measured.', 'Resonator filters;Resonators;Couplings;Microwave filters;Filtering theory;Magnetic separation;Resonant frequency;Bandpass filters;combline filters;cross-coupling;inline filter;transmission zeros;tubular filter', '10.1109/MWSYM.2018.8439446', '', '', '', '', '', 'inproceedings', '8439446', '', '', '2018', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1508, 3, 0, 3, 1, 0, 0),
(1510, 14, 'Novel dual open-loop ring resonator for compact planar filters', 'R. Tkadlec and G. Macchiarella', '2016 46th European Microwave Conference (EuMC)', '', '449-452', '', 'A novel suspended stripline dual open-loop ring resonator is proposed for the realization of compact bandpass filters. Resonator size below lambda/16 (where lambda is a wavelength in free space) and reasonably high unloaded Q factor can be achieved. First, resonator has been characterized through accurate 3D electromagnetic simulations and suitable guidelines for dimensioning have been derived. Then, based on the new resonator, two 3-pole bandpass filters have been designed and verified by full-wave 3D analysis. Finally, both filters were fabricated and measured. The measured results are in good agreement with the simulated one.', 'band-pass filters;resonator filters;strip line filters;compact planar filters;stripline dual open-loop ring resonator;compact bandpass filters;3D electromagnetic simulations;Resonator filters;Microwave filters;Filtering theory;Resonant frequency;Couplings;Band-pass filters;Optical ring resonators;suspended stripline;ring resonator;open-loop resonator;compact filter;low PIM resonator', '10.1109/EuMC.2016.7824376', '', '', '', '', '', 'inproceedings', '7824376', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1509, 3, 0, 3, 1, 0, 0),
(1511, 14, 'Analytical control parameters of the swing leg retraction method using an instantaneous SLIP model', 'N. Shemer and A. Degani', '2014 IEEE/RSJ International Conference on Intelligent Robots and Systems', '', '4065-4070', '', 'The Spring-Loaded Inverted Pendulum (SLIP) is a widely used model for the description of humans and animals running motion. The SLIP model is, however, sensitive to impact angle for various terrain heights. One known method for increasing the model\'s robustness to terrain changes is the Swing Leg Retraction (SLR) method. Despite its popularity, an analytic formulation of this method has yet been provided. In this work, using an instantaneous stance phase assumption, we present the increase in robustness of the swing method. This analysis provides a way to isolate the optimal parameters of the SLR. We validate these optimal parameters in simulations and proof-of-concept experiments in a planar environment.', 'legged locomotion;motion control;nonlinear control systems;pendulums;robot dynamics;analytical control parameters;swing leg retraction method;instantaneous SLIP model;spring-loaded inverted pendulum;swing leg retraction;SLR method;instantaneous stance phase assumption;SLR parameters;planar environment;Mathematical model;Approximation methods;Steady-state;Robots;Robustness;Stability analysis;Equations', '10.1109/IROS.2014.6943134', '', '', '', '', '', 'inproceedings', '6943134', '', '', '2014', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1510, 3, 0, 3, 1, 0, 0),
(1512, 14, 'Compact dual-band bandpass filter based on fractal stub-loaded resonator', 'H. T. Ziboon and J. K. Ali', '2017 Progress In Electromagnetics Research Symposium - Spring (PIERS)', '', '1815-1819', '', 'Fractal geometries have shown to be a suitable choice for the antenna and microwave circuit designers to produce compact size microwave devices and components. Moreover, the multimode resonators are found advantageous in the design of reduced size multiband bandpass filters. In this paper, a stub loaded resonator (SLR) based on modified Minkowski fractal geometry, is suggested to produce a compact microstrip bandpass filter with dual-band response for wireless communication applications. Based on the second iteration Minkowski fractal geometry, dual-band compact microstrip BPF has been presented. The proposed filter structure is composed of two fractal based symmetrical SLRs. The filter structure has been etched using a substrate with dielectric constant of 3.02 and thickness of 1.425 mm. Simulation results show that the proposed fractal based SLR can be used to construct compact microstrip BPFs with dual-band responses. The lower resonant band is centered at about 1.875 GHz, and the upper resonant band is positioned at 5.575 GHz. The corresponding bandwidths of the two bands extend from 1.841-1.918 GHz and 5.438-5.650 GHz respectively. Besides the compact size, the suggested filter offers reasonable performance responses.', 'band-pass filters;fractals;iterative methods;microstrip filters;microwave filters;permittivity;resonator filters;UHF filters;multiband bandpass filters;compact microstrip BPF;fractal based symmetrical SLR;fractal geometries;fractal stub-loaded resonator;compact dual-band bandpass filter;upper resonant band;lower resonant band;filter structure;dual-band compact microstrip BPF;iteration Minkowski fractal geometry;wireless communication applications;dual-band response;compact microstrip bandpass filter;modified Minkowski fractal geometry;SLR;multimode resonators;compact size microwave devices;microwave circuit designers;frequency 1.841 GHz to 1.918 GHz;frequency 5.438 GHz to 5.65 GHz;Fractals;Microstrip;Dual band;Band-pass filters;Microwave filters', '10.1109/PIERS.2017.8262046', '', '', '', '', '', 'inproceedings', '8262046', '', '', '2017', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1511, 3, 0, 3, 1, 0, 0),
(1513, 14, 'Stub-loaded resonator-fed filtering patch antenna with improved bandwidth', 'C. Mao and S. Gao and Y. Wang', '2016 46th European Microwave Conference (EuMC)', '', '317-320', '', 'A method of designing a patch antenna with wideband and filtering characteristics is proposed in this paper. Different from traditional aperture-coupled patch antenna, a stub loaded resonator (SLR) is employed as the feed. This coupled SLR-patch produces three reflection zeros (dual-mode from the SLR and one from the patch) and therefore a wider bandwidth. Due to the resonant property of the SLR, the antenna exhibits a filtering performance and good out-of-band rejection. This integration approach eliminates the 50 Ohm interfaces between the traditionally cascaded filter and antenna. This contributes to a more compact and simplified RF frontend. Methods to control the modes of the SLR are investigated. The simulation and measurement results agree well with each other, showing an excellent performance in terms of bandwidth, frequency selectivity and radiation patterns.', 'filtering theory;microstrip antennas;resonators;stub-loaded resonator-fed filtering patch antenna;SLR;filtering performance;radiation patterns;frequency selectivity;simplified RF frontend;Patch antennas;Bandwidth;Antenna measurements;Band-pass filters;Resonator filters;Filtering;stub-loaded resonator;patch antenna;bandwidth', '10.1109/EuMC.2016.7824342', '', '', '', '', '', 'inproceedings', '7824342', '', '', '2016', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1512, 3, 0, 3, 1, 0, 0),
(1514, 14, 'Systematic literature reviews in global software development: A tertiary study', 'J. M. Verner and O. P. Brereton and B. A. Kitchenham and M. Turner and M. Niazi', '16th International Conference on Evaluation Assessment in Software Engineering (EASE 2012)', '', '2-11', '', 'Context: There has been an increase in research into global software development (GSD) and in the number of systematic literature reviews (SLRs) addressing this topic. Objective: The aim of this research is to catalogue GSD SLRs in order to identify the topics covered, the active researchers, the publication vehicles, and to assess the quality of the SLRs identified. Method: We performed a broad automated search to find SLRs dealing with GSD. We differentiate between SLR studies and papers reporting those studies. Data relating to each of the following was extracted and synthesized from each study: authors and their affiliation at the time of publication, the journal or conference in which the paper was published, the quality of each study and the main GSD study topic. Results: Twenty-four GSD SLR studies and 37 papers reporting those studies were identified. Major GSD topics covered include: (1) organizational environment, (2) project execution, and (3) project planning and control. The main research groups are based in Brazil (17), Ireland (8), and Sweden (7). Conclusions: GSD SLR studies are most frequently reported in the International Conference on Global Software Engineering and IEEE Software; the two most popular topics for research are risk factors due to the organizational environment and the development process. The most active researchers are based in Brazil. The quality of the SLR studies has not changed over time.', 'software engineering;software reviews;systematic literature reviews;global software development;GSD;SLR;broad automated search;project execution;organizational environment;project planning;global software engineering;IEEE software;global software development;systematic review;tertiary review;distributed development;mapping study', '10.1049/ic.2012.0001', '', '', '', '', '', 'inproceedings', '6272490', '', '', '2012', '2019-05-10 13:33:31', '2019-05-10 13:33:31', 2, 1513, 3, 0, 3, 1, 0, 0),
(1515, 15, 'Collaborative Exchange of Systematic Literature Review Results: The Case of Empirical Software Engineering', 'Ekaputra, Fajar J. and Sabou, Marta and Serral, Estefanía and Biffl, Stefan', 'Proceedings of the 24th International Conference on World Wide Web', '', '1055--1056', '2', '', 'collaboration, emse, research publication, slr', '10.1145/2740908.2742027', '', '', 'Florence, Italy', '978-1-4503-3473-0', 'New York, NY, USA', 'inproceedings', 'Ekaputra:2015:CES:2740908.2742027', 'http://doi.acm.org/10.1145/2740908.2742027', 'WWW \'15 Companion', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1514, 3, 0, 3, 1, 0, 0),
(1516, 15, 'Benefits and Limitations of Job Rotation in Software Organizations: A Systematic Literature Review', 'Santos, Ronnie E. S. and da Silva, Fabio Q. B. and de Magalhães, Cleyton V. C.', 'Proceedings of the 20th International Conference on Evaluation and Assessment in Software Engineering', '', '16:1--16:12', '12', '', 'SLR, job rotation, software engineering', '10.1145/2915970.2915988', '', '', 'Limerick, Ireland', '978-1-4503-3691-8', 'New York, NY, USA', 'inproceedings', 'Santos:2016:BLJ:2915970.2915988', 'http://doi.acm.org/10.1145/2915970.2915988', 'EASE \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1515, 3, 0, 3, 1, 0, 0),
(1517, 15, 'SESRA: A Web-based Automated Tool to Support the Systematic Literature Review Process', 'Moll\'eri, Jefferson Seide and Benitti, Fabiane Barreto Vavassori', 'Proceedings of the 19th International Conference on Evaluation and Assessment in Software Engineering', '', '24:1--24:6', '6', '', 'SLR, automated tool, systematic literature review', '10.1145/2745802.2745825', '', '', 'Nanjing, China', '978-1-4503-3350-4', 'New York, NY, USA', 'inproceedings', 'Molleri:2015:SWA:2745802.2745825', 'http://doi.acm.org/10.1145/2745802.2745825', 'EASE \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1516, 3, 0, 3, 1, 0, 0),
(1518, 15, 'A Systematic Review of Design Diversity-based Solutions for Fault-tolerant SOAs', 'Nascimento, Amanda S. and Rubira, Cecília M. F. and Burrows, Rachel and Castor, Fernando', 'Proceedings of the 17th International Conference on Evaluation and Assessment in Software Engineering', '', '107--118', '12', '', 'SLR, SOA, composite services, fault tolerance', '10.1145/2460999.2461015', '', '', 'Porto de Galinhas, Brazil', '978-1-4503-1848-8', 'New York, NY, USA', 'inproceedings', 'Nascimento:2013:SRD:2460999.2461015', 'http://doi.acm.org/10.1145/2460999.2461015', 'EASE \'13', '2013', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1517, 3, 0, 3, 1, 0, 0),
(1519, 15, 'An Empirical Study for Adopting Social Computing in Global Software Development', 'Butt, Ateeq Ur Rehman and Asif, Muhammad and Ahmad, Shahbaz and Imdad, Ulfat', 'Proceedings of the 2018 7th International Conference on Software and Computer Applications', '', '31--35', '5', '', 'ACM IEEE social computing, GSD, SLR, Survey', '10.1145/3185089.3185105', '', '', 'Kuantan, Malaysia', '978-1-4503-5414-1', 'New York, NY, USA', 'inproceedings', 'Butt:2018:ESA:3185089.3185105', 'http://doi.acm.org/10.1145/3185089.3185105', 'ICSCA 2018', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1518, 3, 0, 3, 1, 0, 0),
(1520, 15, 'A Systematic Literature Review on Interaction Flow Modeling Language (IFML)', 'Hamdani, Maryum and Butt, Wasi Haider and Anwar, Muhammad Waseem and Azam, Farooque', 'Proceedings of the 2018 2Nd International Conference on Management Engineering, Software Engineering and Service Sciences', '', '134--138', '5', '', 'IFML, Interaction flow modeling language, MDA, SLR', '10.1145/3180374.3181333', '', '', 'Wuhan, China', '978-1-4503-5431-8', 'New York, NY, USA', 'inproceedings', 'Hamdani:2018:SLR:3180374.3181333', 'http://doi.acm.org/10.1145/3180374.3181333', 'ICMSS 2018', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1519, 3, 0, 3, 1, 0, 0),
(1521, 15, 'Application of Model Driven Engineering in Cloud Computing: A Systematic Literature Review', 'Muzaffar, Abdul Wahab and Mir, Shumyla Rasheed and Anwar, Muhammad Waseem and Ashraf, Adeela', 'Proceedings of the Second International Conference on Internet of Things, Data and Cloud Computing', '', '137:1--137:6', '6', '', 'MDE, MDE cloud computing, SLR, cloud computing', '10.1145/3018896.3036380', '', '', 'Cambridge, United Kingdom', '978-1-4503-4774-7', 'New York, NY, USA', 'inproceedings', 'Muzaffar:2017:AMD:3018896.3036380', 'http://doi.acm.org/10.1145/3018896.3036380', 'ICC \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1520, 3, 0, 3, 1, 0, 0);
INSERT INTO `papers` (`id_paper`, `id_bib`, `title`, `author`, `book_title`, `volume`, `pages`, `num_pages`, `abstract`, `keywords`, `doi`, `journal`, `issn`, `location`, `isbn`, `address`, `type`, `bib_key`, `url`, `publisher`, `year`, `added_at`, `update_at`, `data_base`, `id`, `status_selection`, `check_status_selection`, `status_qa`, `id_gen_score`, `check_qa`, `score`) VALUES
(1522, 15, 'Study of Senone-based Deep Neural Network Approaches for Spoken Language Recognition', 'Ferrer, Luciana and Lei, Yun and McLaren, Mitchell and Scheffer, Nicolas', '', '24', '105--116', '12', '', 'deep neural networks (DNNs), senones, spoken language recognition (SLR)', '10.1109/TASLP.2015.2496226', 'IEEE/ACM Trans. Audio, Speech and Lang. Proc.', '2329-9290', '', '', 'Piscataway, NJ, USA', 'article', 'Ferrer:2016:SSD:2886825.2886834', 'http://dx.doi.org/10.1109/TASLP.2015.2496226', '', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1521, 3, 0, 3, 1, 0, 0),
(1523, 15, 'SLR Tools for Teaching Compiler Construction', 'Meyer, R. Mark and Keller, Roy F.', '', '17', '120--129', '10', '', 'LR parser, SLR grammar, compiler, postfix translation', '10.1145/323275.323303', 'SIGCSE Bull.', '0097-8418', '', '', 'New York, NY, USA', 'article', 'Meyer:1985:STT:323275.323303', 'http://doi.acm.org/10.1145/323275.323303', '', '1985', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1522, 3, 0, 3, 1, 0, 0),
(1524, 15, 'SLR Tools for Teaching Compiler Construction', 'Meyer, R. Mark and Keller, Roy F.', 'Proceedings of the Sixteenth SIGCSE Technical Symposium on Computer Science Education', '', '120--129', '10', '', 'LR parser, SLR grammar, compiler, postfix translation', '10.1145/323287.323303', '', '', 'New Orleans, Louisiana, USA', '0-89791-152-0', 'New York, NY, USA', 'inproceedings', 'Meyer:1985:STT:323287.323303', 'http://doi.acm.org/10.1145/323287.323303', 'SIGCSE \'85', '1985', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1523, 4, 0, 3, 1, 0, 0),
(1525, 15, 'Mercedes SLR 300: Out of This World', 'de Fries, Betsy', 'ACM SIGGRAPH 2010 Computer Animation Festival', '', '70--70', '1', '', '', '10.1145/1836623.1836669', '', '', 'Los Angeles, California', '978-1-4503-0389-7', 'New York, NY, USA', 'inproceedings', 'deFries:2010:MSO:1836623.1836669', 'http://doi.acm.org/10.1145/1836623.1836669', 'SIGGRAPH \'10', '2010', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1524, 3, 0, 3, 1, 0, 0),
(1526, 15, 'Design and Implementation of Laser Beam Monitoring System for Day-Time KHz Satellite Laser Ranging', 'An, Ning and Liu, Yuan and Liu, Cheng Zhi and Wen, Guan Yu and Ma, Lei and Zhang, Hai Tao', 'Proceedings of the International Conference on Information Technology and Electrical Engineering 2018', '', '9:1--9:5', '5', '', 'CCD Observation, Day-Time SLR, Image Processing, Laser Beam Monitoring', '10.1145/3148453.3306248', '', '', 'Xiamen, Fujian, China', '978-1-4503-6352-5', 'New York, NY, USA', 'inproceedings', 'An:2018:DIL:3148453.3306248', 'http://doi.acm.org/10.1145/3148453.3306248', 'ICITEE \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1525, 3, 0, 3, 1, 0, 0),
(1527, 15, 'E-Government Usability Evaluation: Insights from A Systematic Literature Review', 'Lyzara, Ria and Purwandari, Betty and Zulfikar, Muhammad Fadhil and Santoso, Harry Budi and Solichah, Iis', 'Proceedings of the 2Nd International Conference on Software Engineering and Information Management', '', '249--253', '5', '', 'E-government, Systematic Literature Review (SLR), Usability Evaluation', '10.1145/3305160.3305178', '', '', 'Bali, Indonesia', '978-1-4503-6642-7', 'New York, NY, USA', 'inproceedings', 'Lyzara:2019:EUE:3305160.3305178', 'http://doi.acm.org/10.1145/3305160.3305178', 'ICSIM 2019', '2019', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1526, 3, 0, 3, 1, 0, 0),
(1528, 15, 'A Survey on Aims and Environments of Diversification and Obfuscation in Software Security', 'Hosseinzadeh, Shohreh and Rauti, Sampsa and Laur\'en, Samuel and Mäkelä, Jari-Matti and Holvitie, Johannes and Hyrynsalmi, Sami and Leppänen, Ville', 'Proceedings of the 17th International Conference on Computer Systems and Technologies 2016', '', '113--120', '8', '', 'Software security, diversification, obfuscation, systematic literature review (SLR)', '10.1145/2983468.2983479', '', '', 'Palermo, Italy', '978-1-4503-4182-0', 'New York, NY, USA', 'inproceedings', 'Hosseinzadeh:2016:SAE:2983468.2983479', 'http://doi.acm.org/10.1145/2983468.2983479', 'CompSysTech \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1527, 3, 0, 3, 1, 0, 0),
(1529, 15, 'Transforming LR(K) Grammars to LR(1), SLR(1), and (1,1) Bounded Right-Context Grammars', 'Mickunas, M. D. and Lancaster, R. L. and Schneider, V. B.', '', '23', '511--533', '23', '', '', '10.1145/321958.321972', 'J. ACM', '0004-5411', '', '', 'New York, NY, USA', 'article', 'Mickunas:1976:TLK:321958.321972', 'http://doi.acm.org/10.1145/321958.321972', '', '1976', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1528, 3, 0, 3, 1, 0, 0),
(1530, 15, 'Noncanonical SLR(1) Grammars', 'Tai, Kou-Chung', '', '1', '295--320', '26', '', '', '10.1145/357073.357083', 'ACM Trans. Program. Lang. Syst.', '0164-0925', '', '', 'New York, NY, USA', 'article', 'Tai:1979:NSG:357073.357083', 'http://doi.acm.org/10.1145/357073.357083', '', '1979', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1529, 3, 0, 3, 1, 0, 0),
(1531, 15, 'Decision Support Tools for SLR Search String Construction', 'Marcos-Pablos, Samuel and García-Peñalvo, Francisco Jos\'e', 'Proceedings of the Sixth International Conference on Technological Ecosystems for Enhancing Multiculturality', '', '660--667', '8', '', 'Systematic literature review, decision support tool, text mining', '10.1145/3284179.3284292', '', '', 'Salamanca, Spain', '978-1-4503-6518-5', 'New York, NY, USA', 'inproceedings', 'Marcos-Pablos:2018:DST:3284179.3284292', 'http://doi.acm.org/10.1145/3284179.3284292', 'TEEM\'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1530, 3, 0, 3, 1, 0, 0),
(1532, 15, 'Effective Regression Test Case Selection: A Systematic Literature Review', 'Kazmi, Rafaqut and Jawawi, Dayang N. A. and Mohamad, Radziah and Ghani, Imran', '', '50', '29:1--29:32', '32', '', 'SLR, Software testing, cost effectiveness, coverage, fault detection ability', '10.1145/3057269', 'ACM Comput. Surv.', '0360-0300', '', '', 'New York, NY, USA', 'article', 'Kazmi:2017:ERT:3071073.3057269', 'http://doi.acm.org/10.1145/3057269', '', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1531, 3, 0, 3, 1, 0, 0),
(1533, 15, 'The Necessary and Sufficient Condition for Compensating the SLR Error', 'Muyu, Hou and Xintong, Zhang and Shuhong, Gong', 'Proceedings of the 2017 2Nd International Conference on Communication and Information Systems', '', '111--115', '5', '', 'Compensating error, Necessary and sufficient condition, Qualitative and quantitative analysis, SLR, The order of mm', '10.1145/3158233.3159313', '', '', 'Wuhan, China', '978-1-4503-5348-9', 'New York, NY, USA', 'inproceedings', 'Muyu:2017:NSC:3158233.3159313', 'http://doi.acm.org/10.1145/3158233.3159313', 'ICCIS 2017', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1532, 3, 0, 3, 1, 0, 0),
(1534, 15, 'On the (Non-) Relationship Between SLR(1) and NQLALR(1) Grammars', 'Bermudez, Manuel E. and Schimpf, Karl M.', '', '10', '338--342', '5', '', '', '10.1145/42190.42276', 'ACM Trans. Program. Lang. Syst.', '0164-0925', '', '', 'New York, NY, USA', 'article', 'Bermudez:1988:RSN:42190.42276', 'http://doi.acm.org/10.1145/42190.42276', '', '1988', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1533, 3, 0, 3, 1, 0, 0),
(1535, 15, 'A Comparative Study of Critical Challenges of Outsourcing Contract Management Identified Through SLR and Empirical Study', 'Khan, Abdul Wahid and Imran, Muhammad', 'Proceedings of the International Conference on Advances in Image Processing', '', '161--164', '4', '', 'Software outsourcing, challenges, questionnaire survey, systematic literature review', '10.1145/3133264.3133306', '', '', 'Bangkok, Thailand', '978-1-4503-5295-6', 'New York, NY, USA', 'inproceedings', 'Khan:2017:CSC:3133264.3133306', 'http://doi.acm.org/10.1145/3133264.3133306', 'ICAIP 2017', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1534, 3, 0, 3, 1, 0, 0),
(1536, 15, 'Understanding the Bottom-up SLR Parser', 'Khuri, Sami and Williams, Jason', 'Proceedings of the Twenty-fifth SIGCSE Symposium on Computer Science Education', '', '339--343', '5', '', '', '10.1145/191029.191163', '', '', 'Phoenix, Arizona, USA', '0-89791-646-8', 'New York, NY, USA', 'inproceedings', 'Khuri:1994:UBS:191029.191163', 'http://doi.acm.org/10.1145/191029.191163', 'SIGCSE \'94', '1994', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1535, 3, 0, 3, 1, 0, 0),
(1537, 15, 'Understanding the Bottom-up SLR Parser', 'Khuri, Sami and Williams, Jason', '', '26', '339--343', '5', '', '', '10.1145/191033.191163', 'SIGCSE Bull.', '0097-8418', '', '', 'New York, NY, USA', 'article', 'Khuri:1994:UBS:191033.191163', 'http://doi.acm.org/10.1145/191033.191163', '', '1994', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1536, 4, 0, 3, 1, 0, 0),
(1538, 15, 'Data-Driven Approaches to Game Player Modeling: A Systematic Literature Review', 'Hooshyar, Danial and Yousefi, Moslem and Lim, Heuiseok', '', '50', '90:1--90:19', '19', '', 'Game player modeling, computational models, data-driven approaches, systematic literature review (SLR)', '10.1145/3145814', 'ACM Comput. Surv.', '0360-0300', '', '', 'New York, NY, USA', 'article', 'Hooshyar:2018:DAG:3161158.3145814', 'http://doi.acm.org/10.1145/3145814', '', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1537, 3, 0, 3, 1, 0, 0),
(1539, 15, 'Experience-based Guidelines for Effective and Efficient Data Extraction in Systematic Reviews in Software Engineering', 'Garousi, Vahid and Felderer, Michael', 'Proceedings of the 21st International Conference on Evaluation and Assessment in Software Engineering', '', '170--179', '10', '', 'SLR, SM, Systematic mapping studies, data extraction, empirical software engineering, research methodology, systematic literature reviews', '10.1145/3084226.3084238', '', '', 'Karlskrona, Sweden', '978-1-4503-4804-1', 'New York, NY, USA', 'inproceedings', 'Garousi:2017:EGE:3084226.3084238', 'http://doi.acm.org/10.1145/3084226.3084238', 'EASE\'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1538, 3, 0, 3, 1, 0, 0),
(1540, 15, 'The Need for Multivocal Literature Reviews in Software Engineering: Complementing Systematic Literature Reviews with Grey Literature', 'Garousi, Vahid and Felderer, Michael and Mäntylä, Mika V.', 'Proceedings of the 20th International Conference on Evaluation and Assessment in Software Engineering', '', '26:1--26:6', '6', '', 'MLR, SLR, empirical software engineering, grey literature, multivocal literature reviews, research methodology, systematic literature reviews', '10.1145/2915970.2916008', '', '', 'Limerick, Ireland', '978-1-4503-3691-8', 'New York, NY, USA', 'inproceedings', 'Garousi:2016:NML:2915970.2916008', 'http://doi.acm.org/10.1145/2915970.2916008', 'EASE \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1539, 3, 0, 3, 1, 0, 0),
(1541, 15, 'A Comprehensive Investigation of Natural Language Processing Techniques and Tools to Generate Automated Test Cases', 'Ahsan, Imran and Butt, Wasi Haider and Ahmed, Mudassar Adeel and Anwar, Muhammad Waseem', 'Proceedings of the Second International Conference on Internet of Things, Data and Cloud Computing', '', '132:1--132:10', '10', '', 'NLP, SLR, nature language processing, test case generation, test cases, text mining', '10.1145/3018896.3036375', '', '', 'Cambridge, United Kingdom', '978-1-4503-4774-7', 'New York, NY, USA', 'inproceedings', 'Ahsan:2017:CIN:3018896.3036375', 'http://doi.acm.org/10.1145/3018896.3036375', 'ICC \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1540, 3, 0, 3, 1, 0, 0),
(1542, 15, 'An Integral Approach to User Assistance', 'Fenchel, Robert S', '', '13', '98--104', '7', '', 'Context free languages, Ease of use, Help system, Interactive assistance, SLR(1) grammars, System design', '10.1145/1015579.810969', 'SIGSOC Bull.', '0163-5794', '', '', 'New York, NY, USA', 'article', 'Fenchel:1981:IAU:1015579.810969', 'http://doi.acm.org/10.1145/1015579.810969', '', '1981', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1541, 3, 0, 3, 1, 0, 0),
(1543, 15, 'An Integral Approach to User Assistance', 'Fenchel, Robert S', 'Proceedings of the Joint Conference on Easier and More Productive Use of Computer Systems. (Part - II): Human Interface and the User Interface - Volume 1981', '', '98--104', '7', '', 'Context free languages, Ease of use, Help system, Interactive assistance, SLR(1) grammars, System design', '10.1145/800276.810969', '', '', 'Ann Arbor, MI', '0-89791-064-8', 'New York, NY, USA', 'inproceedings', 'Fenchel:1981:IAU:800276.810969', 'http://doi.acm.org/10.1145/800276.810969', 'CHI \'81', '1981', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1542, 4, 0, 3, 1, 0, 0),
(1544, 15, 'Learning Automata and Formal Languages Interactively with JFLAP', 'Rodger, Susan', '', '38', '360--360', '1', '', 'JFLAP, L-system, LL parsing, SLR parsing, Turing machine, automata, grammar, pushdown automata', '10.1145/1140123.1140270', 'SIGCSE Bull.', '0097-8418', '', '', 'New York, NY, USA', 'article', 'Rodger:2006:LAF:1140123.1140270', 'http://doi.acm.org/10.1145/1140123.1140270', '', '2006', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1543, 3, 0, 3, 1, 0, 0),
(1545, 15, 'Learning Automata and Formal Languages Interactively with JFLAP', 'Rodger, Susan', 'Proceedings of the 11th Annual SIGCSE Conference on Innovation and Technology in Computer Science Education', '', '360--360', '1', '', 'JFLAP, L-system, LL parsing, SLR parsing, Turing machine, automata, grammar, pushdown automata', '10.1145/1140124.1140270', '', '', 'Bologna, Italy', '1-59593-055-8', 'New York, NY, USA', 'inproceedings', 'Rodger:2006:LAF:1140124.1140270', 'http://doi.acm.org/10.1145/1140124.1140270', 'ITICSE \'06', '2006', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1544, 4, 0, 3, 1, 0, 0),
(1546, 15, 'A Forward Move Algorithm for LR Error Recovery', 'Pennello, Thomas J. and DeRemer, Frank', 'Proceedings of the 5th ACM SIGACT-SIGPLAN Symposium on Principles of Programming Languages', '', '241--254', '14', '', 'LALR (k), LR (k), SLR (k), error recovery, parsing, syntax errors', '10.1145/512760.512786', '', '', 'Tucson, Arizona', '', 'New York, NY, USA', 'inproceedings', 'Pennello:1978:FMA:512760.512786', 'http://doi.acm.org/10.1145/512760.512786', 'POPL \'78', '1978', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1545, 3, 0, 3, 1, 0, 0),
(1547, 15, 'A Visual and Interactive Automata Theory Course with JFLAP 4.0', 'Cavalcante, Ryan and Finley, Thomas and Rodger, Susan H.', '', '36', '140--144', '5', '', 'JFLAP, L-system, LL parsing, SLR parsing, automata, grammar, pushdown automata, turing machine', '10.1145/1028174.971349', 'SIGCSE Bull.', '0097-8418', '', '', 'New York, NY, USA', 'article', 'Cavalcante:2004:VIA:1028174.971349', 'http://doi.acm.org/10.1145/1028174.971349', '', '2004', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1546, 3, 0, 3, 1, 0, 0),
(1548, 15, 'A Visual and Interactive Automata Theory Course with JFLAP 4.0', 'Cavalcante, Ryan and Finley, Thomas and Rodger, Susan H.', 'Proceedings of the 35th SIGCSE Technical Symposium on Computer Science Education', '', '140--144', '5', '', 'JFLAP, L-system, LL parsing, SLR parsing, automata, grammar, pushdown automata, turing machine', '10.1145/971300.971349', '', '', 'Norfolk, Virginia, USA', '1-58113-798-2', 'New York, NY, USA', 'inproceedings', 'Cavalcante:2004:VIA:971300.971349', 'http://doi.acm.org/10.1145/971300.971349', 'SIGCSE \'04', '2004', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1547, 4, 0, 3, 1, 0, 0),
(1549, 15, 'Turning Automata Theory into a Hands-on Course', 'Rodger, Susan H. and Bressler, Bart and Finley, Thomas and Reading, Stephen', '', '38', '379--383', '5', '', 'JFLAP, L-system, LL parsing, SLR parsing, automata, grammar, pushdown automata, turing machine', '10.1145/1124706.1121459', 'SIGCSE Bull.', '0097-8418', '', '', 'New York, NY, USA', 'article', 'Rodger:2006:TAT:1124706.1121459', 'http://doi.acm.org/10.1145/1124706.1121459', '', '2006', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1548, 3, 0, 3, 1, 0, 0),
(1550, 15, 'Turning Automata Theory into a Hands-on Course', 'Rodger, Susan H. and Bressler, Bart and Finley, Thomas and Reading, Stephen', 'Proceedings of the 37th SIGCSE Technical Symposium on Computer Science Education', '', '379--383', '5', '', 'JFLAP, L-system, LL parsing, SLR parsing, automata, grammar, pushdown automata, turing machine', '10.1145/1121341.1121459', '', '', 'Houston, Texas, USA', '1-59593-259-3', 'New York, NY, USA', 'inproceedings', 'Rodger:2006:TAT:1121341.1121459', 'http://doi.acm.org/10.1145/1121341.1121459', 'SIGCSE \'06', '2006', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1549, 4, 0, 3, 1, 0, 0),
(1551, 15, 'Slr on Identification & Classification of Non-Functional Requirements Attributes, and Its Representation in Functional Requirements', 'Nurbojatmiko and Budiardjo, Eko K. and Wibowo, Wahyu C.', 'Proceedings of the 2018 2Nd International Conference on Computer Science and Artificial Intelligence', '', '151--157', '7', '', 'Functional Requirements (FR), NFR attributes, Non-Functional Requirements (NFR), Requirements Engineering (RE)', '10.1145/3297156.3297200', '', '', 'Shenzhen, China', '978-1-4503-6606-9', 'New York, NY, USA', 'inproceedings', 'Nurbojatmiko:2018:SIC:3297156.3297200', 'http://doi.acm.org/10.1145/3297156.3297200', 'CSAI \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1550, 3, 0, 3, 1, 0, 0),
(1552, 15, 'A Systematic Literature Review of UML-based Domain-specific Modeling Languages for Self-adaptive Systems', 'da Silva, João Pablo S. and Ecar, Miguel and Pimenta, Marcelo S. and Guedes, Gilleanes T. A. and Franz, Luiz Paulo and Marchezan, Luciano', 'Proceedings of the 13th International Conference on Software Engineering for Adaptive and Self-Managing Systems', '', '87--93', '7', '', 'domain-specific modeling language (DSML), self-adaptive systems (SaS), snowballing technique, systematic literature review (SLR), unified modeling language (UML)', '10.1145/3194133.3194136', '', '', 'Gothenburg, Sweden', '978-1-4503-5715-9', 'New York, NY, USA', 'inproceedings', 'daSilva:2018:SLR:3194133.3194136', 'http://doi.acm.org/10.1145/3194133.3194136', 'SEAMS \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1551, 3, 0, 3, 1, 0, 0),
(1553, 15, 'Introductory Programming: A Systematic Literature Review', 'Luxton-Reilly, Andrew and Simon and Albluwi, Ibrahim and Becker, Brett A. and Giannakos, Michail and Kumar, Amruth N. and Ott, Linda and Paterson, James and Scott, Michael James and Sheard, Judy and Szabo, Claudia', 'Proceedings Companion of the 23rd Annual ACM Conference on Innovation and Technology in Computer Science Education', '', '55--106', '52', '', 'CS1, ITiCSE working group, SLR, introductory programming, literature review, novice programming, overview, review, systematic literature review, systematic review', '10.1145/3293881.3295779', '', '', 'Larnaca, Cyprus', '978-1-4503-6223-8', 'New York, NY, USA', 'inproceedings', 'Luxton-Reilly:2018:IPS:3293881.3295779', 'http://doi.acm.org/10.1145/3293881.3295779', 'ITiCSE 2018 Companion', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1552, 3, 0, 3, 1, 0, 0),
(1554, 15, 'Operations on Sparse Relations', 'Hunt,III, H. B. and Ullman, J. D. and Szymanski, T. G.', '', '20', '171--176', '6', '', 'Boolean matrix, SLR grammar, T-canomical precedence relation, Wirth-Weber precedence relation, computational complexity, directed graph, linear precedence function, sparse relation', '10.1145/359436.359446', 'Commun. ACM', '0001-0782', '', '', 'New York, NY, USA', 'article', 'Hunt:1977:OSR:359436.359446', 'http://doi.acm.org/10.1145/359436.359446', '', '1977', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1553, 3, 0, 3, 1, 0, 0),
(1555, 15, 'Using the SCAS Strategy to Perform the Initial Selection of Studies in Systematic Reviews: An Experimental Study', 'Octaviano, Fábio and Silva, Cleiton and Fabbri, Sandra', 'Proceedings of the 20th International Conference on Evaluation and Assessment in Software Engineering', '', '25:1--25:10', '10', '', 'StArt tool, evidence-based software engineering (EBSE), experiment, primary study selection activity, score citation automatic selection (SCAS), systematic literature review (SLR)', '10.1145/2915970.2916000', '', '', 'Limerick, Ireland', '978-1-4503-3691-8', 'New York, NY, USA', 'inproceedings', 'Octaviano:2016:USS:2915970.2916000', 'http://doi.acm.org/10.1145/2915970.2916000', 'EASE \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1554, 3, 0, 3, 1, 0, 0),
(1556, 15, 'Outcomes of a Community Workshop to Identify and Rank Barriers to the Systematic Literature Review Process', 'Hassler, Edgar and Carver, Jeffrey C. and Kraft, Nicholas A. and Hale, David', 'Proceedings of the 18th International Conference on Evaluation and Assessment in Software Engineering', '', '31:1--31:10', '10', '', 'empirical software engineering, systematic literature review, workshop', '10.1145/2601248.2601274', '', '', 'London, England, United Kingdom', '978-1-4503-2476-2', 'New York, NY, USA', 'inproceedings', 'Hassler:2014:OCW:2601248.2601274', 'http://doi.acm.org/10.1145/2601248.2601274', 'EASE \'14', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1555, 3, 0, 3, 1, 0, 0),
(1557, 15, 'Sign Transition Modeling and a Scalable Solution to Continuous Sign Language Recognition for Real-World Applications', 'Li, Kehuang and Zhou, Zhengyu and Lee, Chin-Hui', '', '8', '7:1--7:23', '23', '', 'Sign language recognition, hidden Markov models, speech recognition, transition modeling', '10.1145/2850421', 'ACM Trans. Access. Comput.', '1936-7228', '', '', 'New York, NY, USA', 'article', 'Li:2016:STM:2878628.2850421', 'http://doi.acm.org/10.1145/2850421', '', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1556, 3, 0, 3, 1, 0, 0),
(1558, 15, 'Systematic Review in Software Engineering: Where We Are and Where We Should Be Going', 'Kitchenham, Barbara A.', 'Proceedings of the 2Nd International Workshop on Evidential Assessment of Software Technologies', '', '1--2', '2', '', 'research methods, systematic literature review process', '10.1145/2372233.2372235', '', '', 'Lund, Sweden', '978-1-4503-1509-8', 'New York, NY, USA', 'inproceedings', 'Kitchenham:2012:SRS:2372233.2372235', 'http://doi.acm.org/10.1145/2372233.2372235', 'EAST \'12', '2012', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1557, 3, 0, 3, 1, 0, 0),
(1559, 15, 'Quality Assessment of Systematic Reviews in Software Engineering: A Tertiary Study', 'Zhou, You and Zhang, He and Huang, Xin and Yang, Song and Babar, Muhammad Ali and Tang, Hao', 'Proceedings of the 19th International Conference on Evaluation and Assessment in Software Engineering', '', '14:1--14:14', '14', '', 'quality assessment, software engineering, systematic (literature) review', '10.1145/2745802.2745815', '', '', 'Nanjing, China', '978-1-4503-3350-4', 'New York, NY, USA', 'inproceedings', 'Zhou:2015:QAS:2745802.2745815', 'http://doi.acm.org/10.1145/2745802.2745815', 'EASE \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1558, 3, 0, 3, 1, 0, 0),
(1560, 15, 'Recognition of Sign Language Subwords Based on Boosted Hidden Markov Models', 'Zhang, Liang-Guo and Chen, Xilin and Wang, Chunli and Chen, Yiqiang and Gao, Wen', 'Proceedings of the 7th International Conference on Multimodal Interfaces', '', '282--287', '6', '', 'AdaBoost, HMM, human-computer interaction, sign language recognition', '10.1145/1088463.1088511', '', '', 'Torento, Italy', '1-59593-028-0', 'New York, NY, USA', 'inproceedings', 'Zhang:2005:RSL:1088463.1088511', 'http://doi.acm.org/10.1145/1088463.1088511', 'ICMI \'05', '2005', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1559, 3, 0, 3, 1, 0, 0),
(1561, 15, 'Maintaining Systematic Literature Reviews: Benefits and Drawbacks', 'Nepomuceno, Vilmar and Soares, Sergio', 'Proceedings of the 12th ACM/IEEE International Symposium on Empirical Software Engineering and Measurement', '', '47:1--47:4', '4', '', 'evidence based software engineering, maintenance, systematic literature review, traceability', '10.1145/3239235.3267432', '', '', 'Oulu, Finland', '978-1-4503-5823-1', 'New York, NY, USA', 'inproceedings', 'Nepomuceno:2018:MSL:3239235.3267432', 'http://doi.acm.org/10.1145/3239235.3267432', 'ESEM \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1560, 3, 0, 3, 1, 0, 0),
(1562, 15, 'Matching and Retrieving Sequential Patterns Under Regression', 'Lei, Hansheng and Govindaraju, Venu', 'Proceedings of the 2004 IEEE/WIC/ACM International Conference on Web Intelligence', '', '84--90', '7', '', '', '10.1109/WI.2004.93', '', '', '', '0-7695-2100-2', 'Washington, DC, USA', 'inproceedings', 'Lei:2004:MRS:1025132.1026303', 'http://dx.doi.org/10.1109/WI.2004.93', 'WI \'04', '2004', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1561, 3, 0, 3, 1, 0, 0),
(1563, 15, 'Fusion of Face and Gait for Biometric Recognition: Systematic Literature Review', 'Oliveira, Edenilton L. and Lima, Clodoaldo A.M. and Peres, Sarajane M.', 'Proceedings of the XII Brazilian Symposium on Information Systems on Brazilian Symposium on Information Systems: Information Systems in the Cloud Computing Era - Volume 1', '', '15:108--15:115', '8', '', 'Face, Fusion, Gait, Multimodal Biometric System, Systematic Review', '', '', '', 'Florianopolis, Santa Catarina, Brazil', '978-85-7669-317-8', 'Porto Alegre, Brazil, Brazil', 'inproceedings', 'Oliveira:2016:FFG:3021955.3021974', 'http://dl.acm.org/citation.cfm?id=3021955.3021974', 'SBSI 2016', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1562, 3, 0, 3, 1, 0, 0),
(1564, 15, 'Using Forward Snowballing to Update Systematic Reviews in Software Engineering', 'Felizardo, Katia Romero and Mendes, Emilia and Kalinowski, Marcos and Souza, Érica Ferreira and Vijaykumar, Nandamudi L.', 'Proceedings of the 10th ACM/IEEE International Symposium on Empirical Software Engineering and Measurement', '', '53:1--53:6', '6', '', 'Systematic literature reviews, forward snowballing', '10.1145/2961111.2962630', '', '', 'Ciudad Real, Spain', '978-1-4503-4427-2', 'New York, NY, USA', 'inproceedings', 'Felizardo:2016:UFS:2961111.2962630', 'http://doi.acm.org/10.1145/2961111.2962630', 'ESEM \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1563, 3, 0, 3, 1, 0, 0),
(1565, 15, 'A Review of Meta-ethnographies in Software Engineering', 'Fu, Changlan and Zhang, He and Huang, Xin and Zhou, Xin and Li, Zhi', 'Proceedings of the Evaluation and Assessment on Software Engineering', '', '68--77', '10', '', 'meta-ethnography, qualitative research synthesis, systematic (literature) review', '10.1145/3319008.3319015', '', '', 'Copenhagen, Denmark', '978-1-4503-7145-2', 'New York, NY, USA', 'inproceedings', 'Fu:2019:RMS:3319008.3319015', 'http://doi.acm.org/10.1145/3319008.3319015', 'EASE \'19', '2019', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1564, 3, 0, 3, 1, 0, 0),
(1566, 15, 'Does Pareto\'s Law Apply to Evidence Distribution in Software Engineering? An Initial Report', 'Tang, Hao and Zhou, You and Huang, Xin and Rong, Guoping', 'Proceedings of the 2014 3rd International Workshop on Evidential Assessment of Software Technologies', '', '9--16', '8', '', 'Pareto\'s Law (80/20 Rule), evidence distribution, evidence-based software engineering, systematic (literature) review', '10.1145/2627508.2627510', '', '', 'Nanjing, China', '978-1-4503-2965-1', 'New York, NY, USA', 'inproceedings', 'Tang:2014:PLA:2627508.2627510', 'http://doi.acm.org/10.1145/2627508.2627510', 'EAST 2014', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1565, 3, 0, 3, 1, 0, 0),
(1567, 15, 'Dividing Patterns into Deterministic Regions', 'Duong, Binh and George, K. M.', 'Proceedings of the 1986 Workshop on Applied Computing', '', '53--57', '5', '', '', '10.1145/800239.807174', '', '', 'Stillwater, Oklahoma, USA', '', 'New York, NY, USA', 'inproceedings', 'Duong:1986:DPD:800239.807174', 'http://doi.acm.org/10.1145/800239.807174', 'SAC \'86', '1986', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1566, 3, 0, 3, 1, 0, 0),
(1568, 15, 'Investigating the Use of a Hybrid Search Strategy for Systematic Reviews', 'Mourão, Erica and Kalinowski, Marcos and Murta, Leonardo and Mendes, Emilia and Wohlin, Claes', 'Proceedings of the 11th ACM/IEEE International Symposium on Empirical Software Engineering and Measurement', '', '193--198', '6', '', 'hybrid strategy, search strategy, snowballing, systematic review', '10.1109/ESEM.2017.30', '', '', 'Markham, Ontario, Canada', '978-1-5090-4039-1', 'Piscataway, NJ, USA', 'inproceedings', 'Mourao:2017:IUH:3200492.3200523', 'https://doi.org/10.1109/ESEM.2017.30', 'ESEM \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1567, 3, 0, 3, 1, 0, 0),
(1569, 15, 'A Machine Learning Approach for Semi-Automated Search and Selection in Literature Studies', 'Ros, Rasmus and Bjarnason, Elizabeth and Runeson, Per', 'Proceedings of the 21st International Conference on Evaluation and Assessment in Software Engineering', '', '118--127', '10', '', 'Automation, Machine learning, Reinforcement learning, Research identification, Study selection, Systematic literature review', '10.1145/3084226.3084243', '', '', 'Karlskrona, Sweden', '978-1-4503-4804-1', 'New York, NY, USA', 'inproceedings', 'Ros:2017:MLA:3084226.3084243', 'http://doi.acm.org/10.1145/3084226.3084243', 'EASE\'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1568, 3, 0, 3, 1, 0, 0),
(1570, 15, 'SLuRp: A Tool to Help Large Complex Systematic Literature Reviews Deliver Valid and Rigorous Results', 'Bowes, David and Hall, Tracy and Beecham, Sarah', 'Proceedings of the 2Nd International Workshop on Evidential Assessment of Software Technologies', '', '33--36', '4', '', 'systematic literature review tool', '10.1145/2372233.2372243', '', '', 'Lund, Sweden', '978-1-4503-1509-8', 'New York, NY, USA', 'inproceedings', 'Bowes:2012:STH:2372233.2372243', 'http://doi.acm.org/10.1145/2372233.2372243', 'EAST \'12', '2012', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1569, 3, 0, 3, 1, 0, 0),
(1571, 15, 'Knowledge Management Diagnostics in Software Development Organizations: A Systematic Literature Review', 'Maciel, Claudia P. C. and de Souza, Érica Ferreira and de Almeia Falbo, Ricardo and Felizardo, Katia Romero and Vijaykumar, Nandamudi L.', 'Proceedings of the 17th Brazilian Symposium on Software Quality', '', '141--150', '10', '', 'Knowledge Management, Knowledge Management Diagnostic, Software Engineering', '10.1145/3275245.3275260', '', '', 'Curitiba, Brazil', '978-1-4503-6565-9', 'New York, NY, USA', 'inproceedings', 'Maciel:2018:KMD:3275245.3275260', 'http://doi.acm.org/10.1145/3275245.3275260', 'SBQS', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1570, 3, 0, 3, 1, 0, 0),
(1572, 15, 'Simple LR(K) Grammars', 'DeRemer, Franklin L.', '', '14', '453--460', '8', '', '<italic>LR(k)</italic> grammar, context-free grammar, deterministic pushdown automaton, finite-state machine, parser, parsing algorithm, precedence grammar, syntactic analysis', '10.1145/362619.362625', 'Commun. ACM', '0001-0782', '', '', 'New York, NY, USA', 'article', 'DeRemer:1971:SLG:362619.362625', 'http://doi.acm.org/10.1145/362619.362625', '', '1971', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1571, 3, 0, 3, 1, 0, 0),
(1573, 15, 'Automatic Recognition of Sign Language Subwords Based on Portable Accelerometer and EMG Sensors', 'Li, Yun and Chen, Xiang and Tian, Jianxun and Zhang, Xu and Wang, Kongqiao and Yang, Jihai', 'International Conference on Multimodal Interfaces and the Workshop on Machine Learning for Multimodal Interaction', '', '17:1--17:7', '7', '', 'accelerometer, gesture-based interfaces, sign language recognition, surface electromyography', '10.1145/1891903.1891926', '', '', 'Beijing, China', '978-1-4503-0414-6', 'New York, NY, USA', 'inproceedings', 'Li:2010:ARS:1891903.1891926', 'http://doi.acm.org/10.1145/1891903.1891926', 'ICMI-MLMI \'10', '2010', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1572, 3, 0, 3, 1, 0, 0),
(1574, 15, 'Interactive Data Visualization for Risk Assessment: Can There Be Too Much User Agency?', 'Stephens, Sonia H.', 'Proceedings of the 33rd Annual International Conference on the Design of Communication', '', '9:1--9:2', '2', '', 'agency, data visualization, risk', '10.1145/2775441.2775446', '', '', 'Limerick, Ireland', '978-1-4503-3648-2', 'New York, NY, USA', 'inproceedings', 'Stephens:2015:IDV:2775441.2775446', 'http://doi.acm.org/10.1145/2775441.2775446', 'SIGDOC \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1573, 3, 0, 3, 1, 0, 0),
(1575, 15, 'A Systematic Literature Review of Traceability Approaches Between Software Architecture and Source Code', 'Javed, Muhammad Atif and Zdun, Uwe', 'Proceedings of the 18th International Conference on Evaluation and Assessment in Software Engineering', '', '16:1--16:10', '10', '', 'software architecture, source code, systematic literature review, traceability', '10.1145/2601248.2601278', '', '', 'London, England, United Kingdom', '978-1-4503-2476-2', 'New York, NY, USA', 'inproceedings', 'Javed:2014:SLR:2601248.2601278', 'http://doi.acm.org/10.1145/2601248.2601278', 'EASE \'14', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1574, 3, 0, 3, 1, 0, 0),
(1576, 15, 'A Tertiary Study: Experiences of Conducting Systematic Literature Reviews in Software Engineering', 'Imtiaz, Salma and Bano, Muneera and Ikram, Naveed and Niazi, Mahmood', 'Proceedings of the 17th International Conference on Evaluation and Assessment in Software Engineering', '', '177--182', '6', '', 'empirical software engineering, experiences, lessons learnt, systematic literature reviews, tertiary study', '10.1145/2460999.2461025', '', '', 'Porto de Galinhas, Brazil', '978-1-4503-1848-8', 'New York, NY, USA', 'inproceedings', 'Imtiaz:2013:TSE:2460999.2461025', 'http://doi.acm.org/10.1145/2460999.2461025', 'EASE \'13', '2013', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1575, 3, 0, 3, 1, 0, 0),
(1577, 15, 'A Tool for Teaching LL and LR Parsing Algorithms', 'García-Osorio, C\'esar and Gómez-Palacios, Carlos and García-Pedrajas, Nicolás', '', '40', '317--317', '1', '', 'LL parsing, LR parsing, interactive teaching tool', '10.1145/1597849.1384360', 'SIGCSE Bull.', '0097-8418', '', '', 'New York, NY, USA', 'article', 'Garcia-Osorio:2008:TTL:1597849.1384360', 'http://doi.acm.org/10.1145/1597849.1384360', '', '2008', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1576, 3, 0, 3, 1, 0, 0),
(1578, 15, 'A Tool for Teaching LL and LR Parsing Algorithms', 'García-Osorio, C\'esar and Gómez-Palacios, Carlos and García-Pedrajas, Nicolás', 'Proceedings of the 13th Annual Conference on Innovation and Technology in Computer Science Education', '', '317--317', '1', '', 'LL parsing, LR parsing, interactive teaching tool', '10.1145/1384271.1384360', '', '', 'Madrid, Spain', '978-1-60558-078-4', 'New York, NY, USA', 'inproceedings', 'Garcia-Osorio:2008:TTL:1384271.1384360', 'http://doi.acm.org/10.1145/1384271.1384360', 'ITiCSE \'08', '2008', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1577, 4, 0, 3, 1, 0, 0),
(1579, 15, 'Analyzing Forty Years of Software Maintenance Models', 'Lenarduzzi, Valentina and Sillitti, Alberto and Taibi, Davide', 'Proceedings of the 39th International Conference on Software Engineering Companion', '', '146--148', '3', '', 'component, software maintenance, systematic literature review', '10.1109/ICSE-C.2017.122', '', '', 'Buenos Aires, Argentina', '978-1-5386-1589-8', 'Piscataway, NJ, USA', 'inproceedings', 'Lenarduzzi:2017:AFY:3098344.3098393', 'https://doi.org/10.1109/ICSE-C.2017.122', 'ICSE-C \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1578, 3, 0, 3, 1, 0, 0),
(1580, 15, 'Real-Time Depth-Camera Based Hand Tracking for ASL Recognition', 'Taylor, Brandon and Dey, Anind and Siewiorek, Daniel and Smailagic, Asim', 'Proceedings of the 19th International ACM SIGACCESS Conference on Computers and Accessibility', '', '337--338', '2', '', 'asl, hand tracking, sign recognition', '10.1145/3132525.3134777', '', '', 'Baltimore, Maryland, USA', '978-1-4503-4926-0', 'New York, NY, USA', 'inproceedings', 'Taylor:2017:RDB:3132525.3134777', 'http://doi.acm.org/10.1145/3132525.3134777', 'ASSETS \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1579, 3, 0, 3, 1, 0, 0),
(1581, 15, 'Software Process Simulation Modeling: Preliminary Results from an Updated Systematic Review', 'Gao, Chao and Jiang, Shu and Rong, Guoping', 'Proceedings of the 2014 International Conference on Software and System Process', '', '50--54', '5', '', 'QGS, Software process simulation modeling, systematic literature review', '10.1145/2600821.2600844', '', '', 'Nanjing, China', '978-1-4503-2754-1', 'New York, NY, USA', 'inproceedings', 'Gao:2014:SPS:2600821.2600844', 'http://doi.acm.org/10.1145/2600821.2600844', 'ICSSP 2014', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1580, 3, 0, 3, 1, 0, 0),
(1582, 15, 'Leveraging Motivational Theories for Designing Gamification for RE', 'Unkelos-Shpigel, Naomi and Hadar, Irit', 'Proceedings of the 11th International Workshop on Cooperative and Human Aspects of Software Engineering', '', '69--72', '4', '', 'engagement, gamification, motivation, requirement engineering', '10.1145/3195836.3195843', '', '', 'Gothenburg, Sweden', '978-1-4503-5725-8', 'New York, NY, USA', 'inproceedings', 'Unkelos-Shpigel:2018:LMT:3195836.3195843', 'http://doi.acm.org/10.1145/3195836.3195843', 'CHASE \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1581, 3, 0, 3, 1, 0, 0),
(1583, 15, 'Online Early-Late Fusion Based on Adaptive HMM for Sign Language Recognition', 'Guo, Dan and Zhou, Wengang and Li, Houqiang and Wang, Meng', '', '14', '8:1--8:18', '18', '', 'HMM, Sign language recognition, multi-modal feature fusion, online algorithm, query-adaptive', '10.1145/3152121', 'ACM Trans. Multimedia Comput. Commun. Appl.', '1551-6857', '', '', 'New York, NY, USA', 'article', 'Guo:2017:OEF:3173554.3152121', 'http://doi.acm.org/10.1145/3152121', '', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1582, 3, 0, 3, 1, 0, 0),
(1584, 15, 'A Systematic Review of Big Data Analytics Using Model Driven Engineering', 'Zafar, Muhammad Nouman and Azam, Farooque and Rehman, Saad and Anwar, Muhammad Waseem', 'Proceedings of the 2017 International Conference on Cloud and Big Data Computing', '', '1--5', '5', '', 'Big data, Big data predictive models, MDE, Model driven big data analytics', '10.1145/3141128.3141138', '', '', 'London, United Kingdom', '978-1-4503-5343-4', 'New York, NY, USA', 'inproceedings', 'Zafar:2017:SRB:3141128.3141138', 'http://doi.acm.org/10.1145/3141128.3141138', 'ICCBDC 2017', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1583, 3, 0, 3, 1, 0, 0),
(1585, 15, 'Hierarchical Voting Classification Scheme for Improving Visual Sign Language Recognition', 'Zhang, Liang-Guo and Chen, Xilin and Wang, Chunli and Gao, Wen', 'Proceedings of the 13th Annual ACM International Conference on Multimedia', '', '339--342', '4', '', 'classifiers ensemble, hidden Markov models, hierarchical voting classification, sign language recognition', '10.1145/1101149.1101220', '', '', 'Hilton, Singapore', '1-59593-044-2', 'New York, NY, USA', 'inproceedings', 'Zhang:2005:HVC:1101149.1101220', 'http://doi.acm.org/10.1145/1101149.1101220', 'MULTIMEDIA \'05', '2005', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1584, 3, 0, 3, 1, 0, 0),
(1586, 15, 'Usage Patterns and Latent Semantic Analyses for Task Goal Inference of Multimodal User Interactions', 'Hui, Pui-Yu and Lo, Wai-Kit and Meng, Helen', 'Proceedings of the 15th International Conference on Intelligent User Interfaces', '', '129--138', '10', '', 'latent semantic modeling, multimodal input, pen gesture, singular value decomposition, spoken input, task goal inference', '10.1145/1719970.1719989', '', '', 'Hong Kong, China', '978-1-60558-515-4', 'New York, NY, USA', 'inproceedings', 'Hui:2010:UPL:1719970.1719989', 'http://doi.acm.org/10.1145/1719970.1719989', 'IUI \'10', '2010', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1585, 3, 0, 3, 1, 0, 0),
(1587, 15, 'Coding-Data Portability in Systematic Literature Reviews: A W3C\'s Open Annotation Approach', 'Díaz, Oscar and Medina, Haritz and Anfurrutia, Felipe I.', 'Proceedings of the Evaluation and Assessment on Software Engineering', '', '178--187', '10', '', 'Data portability, Secondary Studies, Web Annotation', '10.1145/3319008.3319025', '', '', 'Copenhagen, Denmark', '978-1-4503-7145-2', 'New York, NY, USA', 'inproceedings', 'Diaz:2019:CPS:3319008.3319025', 'http://doi.acm.org/10.1145/3319008.3319025', 'EASE \'19', '2019', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1586, 3, 0, 3, 1, 0, 0),
(1588, 15, 'Man-Machine Interaction System for Subject Independent Sign Language Recognition', 'Darwish, Saad M.', 'Proceedings of the 9th International Conference on Computer and Automation Engineering', '', '121--125', '5', '', 'Hand Gesture Recognition, Hidden Markov Model, Sign Language, Type-2 Fuzzy Logic', '10.1145/3057039.3057040', '', '', 'Sydney, Australia', '978-1-4503-4809-6', 'New York, NY, USA', 'inproceedings', 'Darwish:2017:MIS:3057039.3057040', 'http://doi.acm.org/10.1145/3057039.3057040', 'ICCAE \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1587, 3, 0, 3, 1, 0, 0),
(1589, 15, 'Crowd-based Multi-Predicate Screening of Papers in Literature Reviews', 'Krivosheev, Evgeny and Casati, Fabio and Benatallah, Boualem', 'Proceedings of the 2018 World Wide Web Conference', '', '55--64', '10', '', 'crowdsourcing, human computation, literature reviews', '10.1145/3178876.3186036', '', '', 'Lyon, France', '978-1-4503-5639-8', 'Republic and Canton of Geneva, Switzerland', 'inproceedings', 'Krivosheev:2018:CMS:3178876.3186036', 'https://doi.org/10.1145/3178876.3186036', 'WWW \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1588, 3, 0, 3, 1, 0, 0),
(1590, 15, 'Evaluating Strategies for Forward Snowballing Application to Support Secondary Studies Updates: Emergent Results', 'Felizardo, Katia Romero and da Silva, Anderson Y. Iwazaki and de Souza, Érica Ferreira and Vijaykumar, Nandamudi L. and Nakagawa, Elisa Yumi', 'Proceedings of the XXXII Brazilian Symposium on Software Engineering', '', '184--189', '6', '', 'forward snowballing, search evidence, secondary studies, systematic literature review, update', '10.1145/3266237.3266240', '', '', 'Sao Carlos, Brazil', '978-1-4503-6503-1', 'New York, NY, USA', 'inproceedings', 'Felizardo:2018:ESF:3266237.3266240', 'http://doi.acm.org/10.1145/3266237.3266240', 'SBES \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1589, 3, 0, 3, 1, 0, 0),
(1591, 15, 'A Vision-based Sign Language Recognition System Using Tied-mixture Density HMM', 'Zhang, Liang-Guo and Chen, Yiqiang and Fang, Gaolin and Chen, Xilin and Gao, Wen', 'Proceedings of the 6th International Conference on Multimodal Interfaces', '', '198--204', '7', '', 'computer vision, hidden Markov models, human-computer interaction, sign language recognition', '10.1145/1027933.1027967', '', '', 'State College, PA, USA', '1-58113-995-0', 'New York, NY, USA', 'inproceedings', 'Zhang:2004:VSL:1027933.1027967', 'http://doi.acm.org/10.1145/1027933.1027967', 'ICMI \'04', '2004', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1590, 3, 0, 3, 1, 0, 0),
(1592, 15, 'Synthesizing Qualitative Research in Software Engineering: A Critical Review', 'Huang, Xin and Zhang, He and Zhou, Xin and Babar, Muhammad Ali and Yang, Song', 'Proceedings of the 40th International Conference on Software Engineering', '', '1207--1218', '12', '', 'evidence-based software engineering, qualitative (synthesis) methods, research synthesis, systematic (literature) review', '10.1145/3180155.3180235', '', '', 'Gothenburg, Sweden', '978-1-4503-5638-1', 'New York, NY, USA', 'inproceedings', 'Huang:2018:SQR:3180155.3180235', 'http://doi.acm.org/10.1145/3180155.3180235', 'ICSE \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1591, 3, 0, 3, 1, 0, 0),
(1593, 15, 'A Comprehensive Investigation of Model Driven Architecture (MDA) for Reverse Engineering', 'Sabir, Umair and Azam, Farooque and Anwar, Muhammad Waseem', 'Proceedings of the 2017 International Conference on Software and e-Business', '', '43--48', '6', '', 'Model Driven Architecture, Model driven reverse engineering, Reverse Engineering, Systematic Literature Review', '10.1145/3178212.3178215', '', '', 'Hong Kong, Hong Kong', '978-1-4503-5488-2', 'New York, NY, USA', 'inproceedings', 'Sabir:2017:CIM:3178212.3178215', 'http://doi.acm.org/10.1145/3178212.3178215', 'ICSEB 2017', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1592, 3, 0, 3, 1, 0, 0),
(1594, 15, 'The Educational Value of Mapping Studies of Software Engineering Literature', 'Kitchenham, Barbara and Brereton, Pearl and Budgen, David', 'Proceedings of the 32Nd ACM/IEEE International Conference on Software Engineering - Volume 1', '', '589--598', '10', '', 'education, evidence-based software engineering, mapping studies, systematic literature review', '10.1145/1806799.1806887', '', '', 'Cape Town, South Africa', '978-1-60558-719-6', 'New York, NY, USA', 'inproceedings', 'Kitchenham:2010:EVM:1806799.1806887', 'http://doi.acm.org/10.1145/1806799.1806887', 'ICSE \'10', '2010', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1593, 3, 0, 3, 1, 0, 0),
(1595, 15, 'Environmental Factors Influencing Individual Decision-making Behavior in Software Projects: A Systematic Literature Review', 'Jia, Jingdong and Zhang, Pengnan and Capretz, Luiz Fernando', 'Proceedings of the 9th International Workshop on Cooperative and Human Aspects of Software Engineering', '', '86--92', '7', '', 'decision-making behavior, environmental factor, software project, systematic literature review', '10.1145/2897586.2897589', '', '', 'Austin, Texas', '978-1-4503-4155-4', 'New York, NY, USA', 'inproceedings', 'Jia:2016:EFI:2897586.2897589', 'http://doi.acm.org/10.1145/2897586.2897589', 'CHASE \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1594, 3, 0, 3, 1, 0, 0),
(1596, 15, 'Evaluation of Deep Learning Based Pose Estimation for Sign Language Recognition', 'Gattupalli, Srujana and Ghaderi, Amir and Athitsos, Vassilis', 'Proceedings of the 9th ACM International Conference on PErvasive Technologies Related to Assistive Environments', '', '12:1--12:7', '7', '', 'deep learning, human pose estimation, sign language recognition', '10.1145/2910674.2910716', '', '', 'Corfu, Island, Greece', '978-1-4503-4337-4', 'New York, NY, USA', 'inproceedings', 'Gattupalli:2016:EDL:2910674.2910716', 'http://doi.acm.org/10.1145/2910674.2910716', 'PETRA \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1595, 3, 0, 3, 1, 0, 0),
(1597, 15, 'A Systematic Literature Review for Agile Development Processes and User Centred Design Integration', 'Salah, Dina and Paige, Richard F. and Cairns, Paul', 'Proceedings of the 18th International Conference on Evaluation and Assessment in Software Engineering', '', '5:1--5:10', '10', '', 'agile software development processes, agile user centred design integration, user centred design', '10.1145/2601248.2601276', '', '', 'London, England, United Kingdom', '978-1-4503-2476-2', 'New York, NY, USA', 'inproceedings', 'Salah:2014:SLR:2601248.2601276', 'http://doi.acm.org/10.1145/2601248.2601276', 'EASE \'14', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1596, 3, 0, 3, 1, 0, 0),
(1598, 15, 'E-commerce Adoption Strategy for E-Library Development in Indonesia', 'Maryati, Ira and Purwandari, Betty and Solichah, Iis', 'Proceedings of the 2Nd International Conference on Business and Information Management', '', '44--49', '6', '', 'SWOT Analysis, Systematic Literature Review, e-Commerce Adoption, e-Commerce Strategy, e-Library', '10.1145/3278252.3278275', '', '', 'Barcelona, Spain', '978-1-4503-6545-1', 'New York, NY, USA', 'inproceedings', 'Maryati:2018:EAS:3278252.3278275', 'http://doi.acm.org/10.1145/3278252.3278275', 'ICBIM \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1597, 3, 0, 3, 1, 0, 0),
(1599, 15, 'Cross- vs. Within-company Cost Estimation Studies Revisited: An Extended Systematic Review', 'Mendes, Emilia and Kalinowski, Marcos and Martins, Daves and Ferrucci, Filomena and Sarro, Federica', 'Proceedings of the 18th International Conference on Evaluation and Assessment in Software Engineering', '', '12:1--12:10', '10', '', 'cost estimation models, cross-company data, estimation accuracy, systematic review, within-company data', '10.1145/2601248.2601284', '', '', 'London, England, United Kingdom', '978-1-4503-2476-2', 'New York, NY, USA', 'inproceedings', 'Mendes:2014:CVW:2601248.2601284', 'http://doi.acm.org/10.1145/2601248.2601284', 'EASE \'14', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1598, 3, 0, 3, 1, 0, 0),
(1600, 15, 'Risk Assessment for Big Data in Cloud: Security, Privacy and Trust', 'bt Yusof Ali, Hazirah Bee and bt Abdullah, Lili Marziana and Kartiwi, Mira and Nordin, Azlin', 'Proceedings of the 2018 Artificial Intelligence and Cloud Computing Conference', '', '63--67', '5', '', 'Big Data, Cloud, Privacy, Risk Assessment, Security, Trust', '10.1145/3299819.3299841', '', '', 'Tokyo, Japan', '978-1-4503-6623-6', 'New York, NY, USA', 'inproceedings', 'btYusofAli:2018:RAB:3299819.3299841', 'http://doi.acm.org/10.1145/3299819.3299841', 'AICCC \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1599, 3, 0, 3, 1, 0, 0);
INSERT INTO `papers` (`id_paper`, `id_bib`, `title`, `author`, `book_title`, `volume`, `pages`, `num_pages`, `abstract`, `keywords`, `doi`, `journal`, `issn`, `location`, `isbn`, `address`, `type`, `bib_key`, `url`, `publisher`, `year`, `added_at`, `update_at`, `data_base`, `id`, `status_selection`, `check_status_selection`, `status_qa`, `id_gen_score`, `check_qa`, `score`) VALUES
(1601, 15, 'Patterns for Integrating Agile Development Processes and User Centred Design', 'Salah, Dina and Paige, Richard and Cairns, Paul', 'Proceedings of the 20th European Conference on Pattern Languages of Programs', '', '19:1--19:10', '10', '', 'agile, agile user centred design integration, agile user centred design integration patterns, user centred design', '10.1145/2855321.2855341', '', '', 'Kaufbeuren, Germany', '978-1-4503-3847-9', 'New York, NY, USA', 'inproceedings', 'Salah:2015:PIA:2855321.2855341', 'http://doi.acm.org/10.1145/2855321.2855341', 'EuroPLoP \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1600, 3, 0, 3, 1, 0, 0),
(1602, 15, 'Is There a Place for Qualitative Studies when Identifying Effort Predictors?: A Case in Web Effort Estimation', 'Matos, Olavo and Conte, Tayana and Mendes, Emilia', 'Proceedings of the 18th International Conference on Evaluation and Assessment in Software Engineering', '', '40:1--40:10', '10', '', 'qualitative study, systematic literature review, web effort estimation, web effort predictors, web project management', '10.1145/2601248.2601281', '', '', 'London, England, United Kingdom', '978-1-4503-2476-2', 'New York, NY, USA', 'inproceedings', 'Matos:2014:PQS:2601248.2601281', 'http://doi.acm.org/10.1145/2601248.2601281', 'EASE \'14', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1601, 3, 0, 3, 1, 0, 0),
(1603, 15, 'Diversity in Software Engineering', 'Menezes, Álvaro and Prikladnicki, Rafael', 'Proceedings of the 11th International Workshop on Cooperative and Human Aspects of Software Engineering', '', '45--48', '4', '', 'diversity, software engineering, team, workplace', '10.1145/3195836.3195857', '', '', 'Gothenburg, Sweden', '978-1-4503-5725-8', 'New York, NY, USA', 'inproceedings', 'Menezes:2018:DSE:3195836.3195857', 'http://doi.acm.org/10.1145/3195836.3195857', 'CHASE \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1602, 3, 0, 3, 1, 0, 0),
(1604, 15, 'Environment Modeling in Model-based Testing: Concepts, Prospects and Research Challenges: A Systematic Literature Review', 'Siavashi, Faezeh and Truscan, Dragos', 'Proceedings of the 19th International Conference on Evaluation and Assessment in Software Engineering', '', '30:1--30:6', '6', '', 'environment model, model-based testing, software testing, systematic literature review', '10.1145/2745802.2745830', '', '', 'Nanjing, China', '978-1-4503-3350-4', 'New York, NY, USA', 'inproceedings', 'Siavashi:2015:EMM:2745802.2745830', 'http://doi.acm.org/10.1145/2745802.2745830', 'EASE \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1603, 3, 0, 3, 1, 0, 0),
(1605, 15, 'Systematic Review of Software Behavioral Model Consistency Checking', 'Muram, Faiz ul and Tran, Huy and Zdun, Uwe', '', '50', '17:1--17:39', '39', '', 'Software behavioral model, consistency checking, consistency types, systematic literature review', '10.1145/3037755', 'ACM Comput. Surv.', '0360-0300', '', '', 'New York, NY, USA', 'article', 'Muram:2017:SRS:3071073.3037755', 'http://doi.acm.org/10.1145/3037755', '', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1604, 3, 0, 3, 1, 0, 0),
(1606, 15, 'Virtual Reality and Its Uses: A Systematic Literature Review', 'Berntsen, Kristina and Palacios, Ricardo Colomo and Herranz, Eduardo', 'Proceedings of the Fourth International Conference on Technological Ecosystems for Enhancing Multiculturality', '', '435--439', '5', '', 'overview, systematic literature review, virtual reality', '10.1145/3012430.3012553', '', '', 'Salamanca, Spain', '978-1-4503-4747-1', 'New York, NY, USA', 'inproceedings', 'Berntsen:2016:VRU:3012430.3012553', 'http://doi.acm.org/10.1145/3012430.3012553', 'TEEM \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1605, 3, 0, 3, 1, 0, 0),
(1607, 15, 'On the Application of Genetic Algorithms for Test Case Prioritization: A Systematic Literature Review', 'Catal, Cagatay', 'Proceedings of the 2Nd International Workshop on Evidential Assessment of Software Technologies', '', '9--14', '6', '', 'evolutionary computation, genetic algorithms, regression testing, software engineering, software testing, systematic literature review, test case prioritization', '10.1145/2372233.2372238', '', '', 'Lund, Sweden', '978-1-4503-1509-8', 'New York, NY, USA', 'inproceedings', 'Catal:2012:AGA:2372233.2372238', 'http://doi.acm.org/10.1145/2372233.2372238', 'EAST \'12', '2012', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1606, 3, 0, 3, 1, 0, 0),
(1608, 15, 'Success Factors of Organizational Change in Software Process Improvement: A Systematic Literature Review', 'Zahra, Kinza and Azam, Farooque and Ilyas, Fauqia and Faisal, Huma and Ambreen, Nadia and Gondal, Nida', 'Proceedings of the 5th International Conference on Information and Education Technology', '', '155--160', '6', '', 'Software process improvements, organizational change, success factors', '10.1145/3029387.3029392', '', '', 'Tokyo, Japan', '978-1-4503-4803-4', 'New York, NY, USA', 'inproceedings', 'Zahra:2017:SFO:3029387.3029392', 'http://doi.acm.org/10.1145/3029387.3029392', 'ICIET \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1607, 3, 0, 3, 1, 0, 0),
(1609, 15, 'Latent Semantic Analysis for Multimodal User Input With Speech and Gestures', 'Pui-Yu Hui and Meng, Helen', '', '22', '417--429', '13', '', '', '10.1109/TASLP.2013.2294586', 'IEEE/ACM Trans. Audio, Speech and Lang. Proc.', '2329-9290', '', '', 'Piscataway, NJ, USA', 'article', 'Pui-YuHui:2014:LSA:2584479.2584494', 'http://dx.doi.org/10.1109/TASLP.2013.2294586', '', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1608, 3, 0, 3, 1, 0, 0),
(1610, 15, 'Understanding Software Process Improvement in Global Software Development: A Theoretical Framework of Human Factors', 'Khan, Arif Ali and Keung, Jacky and Hussain, Shahid and Niazi, Mahmood and Tamimy, Muhammad Manzoor Ilahi', '', '17', '5--15', '11', '', 'global software development, human, software process improvement, systematic literature review', '10.1145/3131080.3131081', 'SIGAPP Appl. Comput. Rev.', '1559-6915', '', '', 'New York, NY, USA', 'article', 'Khan:2017:USP:3131080.3131081', 'http://doi.acm.org/10.1145/3131080.3131081', '', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1609, 3, 0, 3, 1, 0, 0),
(1611, 15, 'Evidence in Software Architecture, a Systematic Literature Review', 'Qureshi, Nadia and Usman, Muhammad and Ikram, Naveed', 'Proceedings of the 17th International Conference on Evaluation and Assessment in Software Engineering', '', '97--106', '10', '', 'software architecture, state-of-the-art, systematic literature review', '10.1145/2460999.2461014', '', '', 'Porto de Galinhas, Brazil', '978-1-4503-1848-8', 'New York, NY, USA', 'inproceedings', 'Qureshi:2013:ESA:2460999.2461014', 'http://doi.acm.org/10.1145/2460999.2461014', 'EASE \'13', '2013', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1610, 3, 0, 3, 1, 0, 0),
(1612, 15, 'Cloud Computing Adoption Assessment Model (CAAM)', 'Nasir, Usman and Niazi, Mahmood', 'Proceedings of the 12th International Conference on Product Focused Software Development and Process Improvement', '', '34--37', '4', '', 'cloud adoption, cloud computing, enterprise cloud', '10.1145/2181101.2181110', '', '', 'Torre Canne, Brindisi, Italy', '978-1-4503-0783-3', 'New York, NY, USA', 'inproceedings', 'Nasir:2011:CCA:2181101.2181110', 'http://doi.acm.org/10.1145/2181101.2181110', 'Profes \'11', '2011', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1611, 3, 0, 3, 1, 0, 0),
(1613, 15, 'Identifying and Mitigating Risks of Software Project Management in Global Software Development', 'Chadli, Saad Yasser and Idri, Ali', 'Proceedings of the 27th International Workshop on Software Measurement and 12th International Conference on Software Process and Product Measurement', '', '12--22', '11', '', '', '10.1145/3143434.3143453', '', '', 'Gothenburg, Sweden', '978-1-4503-4853-9', 'New York, NY, USA', 'inproceedings', 'Chadli:2017:IMR:3143434.3143453', 'http://doi.acm.org/10.1145/3143434.3143453', 'IWSM Mensura \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1612, 3, 0, 3, 1, 0, 0),
(1614, 15, 'People Management in Software Agile Development', 'de Alcântara, Pedro Thiago R. and Canedo, Edna Dias and da Costa, Ruyther Parente', 'Proceedings of the XIV Brazilian Symposium on Information Systems', '', '48:1--48:10', '10', '', 'Agile Methodologies, People Management Model, People management, Software Development Process', '10.1145/3229345.3229396', '', '', 'Caxias do Sul, Brazil', '978-1-4503-6559-8', 'New York, NY, USA', 'inproceedings', 'deAlcantara:2018:PMS:3229345.3229396', 'http://doi.acm.org/10.1145/3229345.3229396', 'SBSI\'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1613, 3, 0, 3, 1, 0, 0),
(1615, 15, 'An Insight into the Capabilities of Professionals and Teams in Agile Software Development: A Systematic Literature Review', 'Vishnubhotla, Sai Datta and Mendes, Emilia and Lundberg, Lars', 'Proceedings of the 2018 7th International Conference on Software and Computer Applications', '', '10--19', '10', '', 'Systematic literature review, agile software development, capability measurement, capability prediction, competence, individual capability, team capability', '10.1145/3185089.3185096', '', '', 'Kuantan, Malaysia', '978-1-4503-5414-1', 'New York, NY, USA', 'inproceedings', 'Vishnubhotla:2018:ICP:3185089.3185096', 'http://doi.acm.org/10.1145/3185089.3185096', 'ICSCA 2018', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1614, 3, 0, 3, 1, 0, 0),
(1616, 15, 'Integrated NFV/SDN Architectures: A Systematic Literature Review', 'Bonfim, Michel S. and Dias, Kelvin L. and Fernandes, Stenio F. L.', '', '51', '114:1--114:39', '39', '', 'Software-defined networking, autonomic management, cloud computing, elasticity, mobile networks, network function virtualization, network virtualization, quality of service, reliability, resource management, resource provisioning, resource scheduling, scalability, security, service-level agreement', '10.1145/3172866', 'ACM Comput. Surv.', '0360-0300', '', '', 'New York, NY, USA', 'article', 'Bonfim:2019:INA:3303862.3172866', 'http://doi.acm.org/10.1145/3172866', '', '2019', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1615, 3, 0, 3, 1, 0, 0),
(1617, 15, 'Towards a Hypothetical Framework of Humans Related Success Factors for Process Improvement in Global Software Development: Systematic Review', 'Khan, Arif Ali and Keung, Jacky and Niazi, Mahmood and Hussain, Shahid', 'Proceedings of the Symposium on Applied Computing', '', '180--186', '7', '', 'global software development, human, software process improvement, systematic literature review', '10.1145/3019612.3019685', '', '', 'Marrakech, Morocco', '978-1-4503-4486-9', 'New York, NY, USA', 'inproceedings', 'Khan:2017:THF:3019612.3019685', 'http://doi.acm.org/10.1145/3019612.3019685', 'SAC \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1616, 3, 0, 3, 1, 0, 0),
(1618, 15, 'Scalability, Elasticity, and Efficiency in Cloud Computing: A Systematic Literature Review of Definitions and Metrics', 'Lehrig, Sebastian and Eikerling, Hendrik and Becker, Steffen', 'Proceedings of the 11th International ACM SIGSOFT Conference on Quality of Software Architectures', '', '83--92', '10', '', 'cloud, cloud computing, definitions, efficiency, elasticity, metrics, scalability, systematic literature review', '10.1145/2737182.2737185', '', '', 'Montr&#233;al, QC, Canada', '978-1-4503-3470-9', 'New York, NY, USA', 'inproceedings', 'Lehrig:2015:SEE:2737182.2737185', 'http://doi.acm.org/10.1145/2737182.2737185', 'QoSA \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1617, 3, 0, 3, 1, 0, 0),
(1619, 15, 'A Preliminary Structure of Software Outsourcing Vendors\' Readiness Model', 'Khan, Siffat Ullah and Niazi, Mahmood', 'Proceedings of the 11th International Conference on Product Focused Software', '', '76--79', '4', '', 'offshore software outsourcing, outsourcing, readiness, vendors\' readiness', '10.1145/1961258.1961277', '', '', 'Limerick, Ireland', '978-1-4503-0281-4', 'New York, NY, USA', 'inproceedings', 'Khan:2010:PSS:1961258.1961277', 'http://doi.acm.org/10.1145/1961258.1961277', 'PROFES \'10', '2010', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1618, 3, 0, 3, 1, 0, 0),
(1620, 15, 'A Comparative Study of Pairwise Regression Techniques for Problem Determination', 'Munawar, Mohammad A. and Ward, Paul A. S.', 'Proceedings of the 2007 Conference of the Center for Advanced Studies on Collaborative Research', '', '152--166', '15', '', '', '10.1145/1321211.1321227', '', '', 'Richmond Hill, Ontario, Canada', '', 'Riverton, NJ, USA', 'inproceedings', 'Munawar:2007:CSP:1321211.1321227', 'http://dx.doi.org/10.1145/1321211.1321227', 'CASCON \'07', '2007', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1619, 3, 0, 3, 1, 0, 0),
(1621, 15, 'The Register Allocation and Instruction Scheduling Challenge', 'Carvalho, João F. N. and Sousa, Bruno L. and Araújo, Marcus R. and Bigonha, Mariza A. S.', 'Proceedings of the 21st Brazilian Symposium on Programming Languages', '', '3:1--3:9', '9', '', 'code optimization, instruction scheduling, register allocation', '10.1145/3125374.3125380', '', '', 'Fortaleza, CE, Brazil', '978-1-4503-5389-2', 'New York, NY, USA', 'inproceedings', 'Carvalho:2017:RAI:3125374.3125380', 'http://doi.acm.org/10.1145/3125374.3125380', 'SBLP 2017', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1620, 3, 0, 3, 1, 0, 0),
(1622, 15, 'Identifying Design Features Using Combination of Requirements Elicitation Techniques', 'Murugesan, Latha Karthigaa and Hoda, Rashina and Salcic, Zoran', 'Proceedings of the 1st International Workshop on Design and Innovation in Software Engineering', '', '6--12', '7', '', 'crowdsourcing, energy savings, requirements elicitation, systematic literature review, user-centred design', '10.1109/DISE.2017.9', '', '', 'Buenos Aires, Argentina', '978-1-5386-0400-7', 'Piscataway, NJ, USA', 'inproceedings', 'Murugesan:2017:IDF:3100560.3100563', 'https://doi.org/10.1109/DISE.2017.9', 'DISE \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1621, 3, 0, 3, 1, 0, 0),
(1623, 15, 'Regulatory Requirements Compliance in e-Government System Development: An Ontology Framework', 'Hasan, M. Mahmudul and Aganostopoulos, Dimosthenis and Loucopoulos, Pericles and Nikolaidou, Mara', 'Proceedings of the 10th International Conference on Theory and Practice of Electronic Governance', '', '441--449', '9', '', 'Ontology Framework, Regulatory requirements Compliance, e-Government, e-Government regulation and policy', '10.1145/3047273.3047341', '', '', 'New Delhi AA, India', '978-1-4503-4825-6', 'New York, NY, USA', 'inproceedings', 'Hasan:2017:RRC:3047273.3047341', 'http://doi.acm.org/10.1145/3047273.3047341', 'ICEGOV \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1622, 3, 0, 3, 1, 0, 0),
(1624, 15, 'What Scope is There for Adopting Evidence-informed Teaching in SE?', 'Budgen, David and Drummond, Sarah and Brereton, Pearl and Holland, Nikki', 'Proceedings of the 34th International Conference on Software Engineering', '', '1205--1214', '10', '', '', '', '', '', 'Zurich, Switzerland', '978-1-4673-1067-3', 'Piscataway, NJ, USA', 'inproceedings', 'Budgen:2012:SAE:2337223.2337381', 'http://dl.acm.org/citation.cfm?id=2337223.2337381', 'ICSE \'12', '2012', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1623, 3, 0, 3, 1, 0, 0),
(1625, 15, 'Experiences in Secure Integration of Byod', 'Amoud, Mohamed and Roudies, Ounsa', 'Proceedings of the 7th International Conference on Information Communication and Management', '', '127--132', '6', '', 'Bring your own device, byod, enterprise mobility management, security, systematic literature review', '10.1145/3134383.3134394', '', '', 'Moscow, Russian Federation', '978-1-4503-5279-6', 'New York, NY, USA', 'inproceedings', 'Amoud:2017:ESI:3134383.3134394', 'http://doi.acm.org/10.1145/3134383.3134394', 'ICICM 2017', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1624, 3, 0, 3, 1, 0, 0),
(1626, 15, 'Passive Vision Region-Based Road Detection: A Literature Review', 'Rateke, Thiago and Justen, Karla A. and Chiarella, Vito F. and Sobieranski, Antonio C. and Comunello, Eros and Wangenheim, Aldo Von', '', '52', '31:1--31:34', '34', '', 'Systematic literature review, passive vision, road detection, road segmentation, visual navigation', '10.1145/3311951', 'ACM Comput. Surv.', '0360-0300', '', '', 'New York, NY, USA', 'article', 'Rateke:2019:PVR:3320149.3311951', 'http://doi.acm.org/10.1145/3311951', '', '2019', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1625, 3, 0, 3, 1, 0, 0),
(1627, 15, 'Exploring the Ensemble of Classifiers for Sentimental Analysis: A Systematic Literature Review', 'Athar, Ali and Butt, Wasi Haider and Anwar, Muhammad Waseem and Latif, Muhammad and Azam, Farooque', 'Proceedings of the 9th International Conference on Machine Learning and Computing', '', '410--414', '5', '', 'Sentimental analysis, classifiers ensemble, sentimental datasets, sentimental features', '10.1145/3055635.3056601', '', '', 'Singapore, Singapore', '978-1-4503-4817-1', 'New York, NY, USA', 'inproceedings', 'Athar:2017:EEC:3055635.3056601', 'http://doi.acm.org/10.1145/3055635.3056601', 'ICMLC 2017', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1626, 3, 0, 3, 1, 0, 0),
(1628, 15, 'Process Simulation for Software Engineering Education', 'Jiang, Shu and Zhang, He and Gao, Chao', 'Proceedings of the 8th ACM/IEEE International Symposium on Empirical Software Engineering and Measurement', '', '72:1--72:1', '1', '', 'simulation game, software engineering education, software process simulation, systematic literature review', '10.1145/2652524.2652601', '', '', 'Torino, Italy', '978-1-4503-2774-9', 'New York, NY, USA', 'inproceedings', 'Jiang:2014:PSS:2652524.2652601', 'http://doi.acm.org/10.1145/2652524.2652601', 'ESEM \'14', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1627, 3, 0, 3, 1, 0, 0),
(1629, 15, 'Degraded Service Provisioning in Mixed-line-rate WDM Backbone Networks Using Multipath Routing', 'Vadrevu, Chaitanya S. K. and Wang, Rui and Tornatore, Massimo and Martel, Charles U. and Mukherjee, Biswanath', '', '22', '840--849', '10', '', 'degraded service, mixed-line-rate (MLR) network, multipath routing, optical WDM network, partial protection', '10.1109/TNET.2013.2259638', 'IEEE/ACM Trans. Netw.', '1063-6692', '', '', 'Piscataway, NJ, USA', 'article', 'Vadrevu:2014:DSP:2674852.2674864', 'http://dx.doi.org/10.1109/TNET.2013.2259638', '', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1628, 3, 0, 3, 1, 0, 0),
(1630, 15, 'Generalized Left Corner Parsing', 'Demers, Alan J.', 'Proceedings of the 4th ACM SIGACT-SIGPLAN Symposium on Principles of Programming Languages', '', '170--182', '13', '', '', '10.1145/512950.512966', '', '', 'Los Angeles, California', '', 'New York, NY, USA', 'inproceedings', 'Demers:1977:GLC:512950.512966', 'http://doi.acm.org/10.1145/512950.512966', 'POPL \'77', '1977', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1629, 3, 0, 3, 1, 0, 0),
(1631, 15, 'ICTD Systems Development: Analysis of Requirements Elicitation Approaches', 'Hasan, M. Mahmudul', 'Proceedings of the Seventh International Conference on Information and Communication Technologies and Development', '', '39:1--39:4', '4', '', 'ICTD, information and communication technologies and development, requirements elicitation approaches, system development requirements, systematic literature review', '10.1145/2737856.2737886', '', '', 'Singapore, Singapore', '978-1-4503-3163-0', 'New York, NY, USA', 'inproceedings', 'Hasan:2015:ISD:2737856.2737886', 'http://doi.acm.org/10.1145/2737856.2737886', 'ICTD \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1630, 3, 0, 3, 1, 0, 0),
(1632, 15, 'Animating Parsing Algorithms', 'Khuri, Sami and Sugono, Yanti', '', '30', '232--236', '5', '', '', '10.1145/274790.274303', 'SIGCSE Bull.', '0097-8418', '', '', 'New York, NY, USA', 'article', 'Khuri:1998:APA:274790.274303', 'http://doi.acm.org/10.1145/274790.274303', '', '1998', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1631, 3, 0, 3, 1, 0, 0),
(1633, 15, 'Animating Parsing Algorithms', 'Khuri, Sami and Sugono, Yanti', 'Proceedings of the Twenty-ninth SIGCSE Technical Symposium on Computer Science Education', '', '232--236', '5', '', '', '10.1145/273133.274303', '', '', 'Atlanta, Georgia, USA', '0-89791-994-7', 'New York, NY, USA', 'inproceedings', 'Khuri:1998:APA:273133.274303', 'http://doi.acm.org/10.1145/273133.274303', 'SIGCSE \'98', '1998', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1632, 4, 0, 3, 1, 0, 0),
(1634, 15, 'Software Paradigms, Assessment Types and Non-functional Requirements in Model-based Integration Testing: A Systematic Literature Review', 'Häser, Florian and Felderer, Michael and Breu, Ruth', 'Proceedings of the 18th International Conference on Evaluation and Assessment in Software Engineering', '', '29:1--29:10', '10', '', 'assessment types, model-based integration testing, non-functional requirements, systematic literature review', '10.1145/2601248.2601257', '', '', 'London, England, United Kingdom', '978-1-4503-2476-2', 'New York, NY, USA', 'inproceedings', 'Haser:2014:SPA:2601248.2601257', 'http://doi.acm.org/10.1145/2601248.2601257', 'EASE \'14', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1633, 3, 0, 3, 1, 0, 0),
(1635, 15, 'LALR(K) Testing is PSPACE-complete', 'Ukkonen, Esko and Soisalon-Soininen, Eljas', 'Proceedings of the Thirteenth Annual ACM Symposium on Theory of Computing', '', '202--206', '5', '', 'Computational complexity, Context-free grammars, LALR(k) grammars, PSPACE-complete problems, Parsing', '10.1145/800076.802473', '', '', 'Milwaukee, Wisconsin, USA', '', 'New York, NY, USA', 'inproceedings', 'Ukkonen:1981:LTP:800076.802473', 'http://doi.acm.org/10.1145/800076.802473', 'STOC \'81', '1981', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1634, 3, 0, 3, 1, 0, 0),
(1636, 15, 'Research on Spherical Satellite Signature Effect on Satellite Laser Ranging Precision', 'Liu, Yuan and An, Ning and Dong, Xue and Fan, Cun Bo', 'Proceedings of the International Conference on Information Technology and Electrical Engineering 2018', '', '10:1--10:5', '5', '', 'Ranging Precision, Satellite Angle Reflector, Satellite Laser Ranging, Spherical Satellite Signature Effect', '10.1145/3148453.3306249', '', '', 'Xiamen, Fujian, China', '978-1-4503-6352-5', 'New York, NY, USA', 'inproceedings', 'Liu:2018:RSS:3148453.3306249', 'http://doi.acm.org/10.1145/3148453.3306249', 'ICITEE \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1635, 3, 0, 3, 1, 0, 0),
(1637, 15, 'Process Simulation for Software Engineering Education', 'Jiang, Shu and Zhang, He and Gao, Chao and Shao, Dong and Rong, Guoping', 'Proceedings of the 2015 International Conference on Software and System Process', '', '147--156', '10', '', 'computer game, non-game simulation, process simulation, software engineering education', '10.1145/2785592.2785606', '', '', 'Tallinn, Estonia', '978-1-4503-3346-7', 'New York, NY, USA', 'inproceedings', 'Jiang:2015:PSS:2785592.2785606', 'http://doi.acm.org/10.1145/2785592.2785606', 'ICSSP 2015', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1636, 4, 0, 3, 1, 0, 0),
(1638, 15, 'On the Complexity of LR(K) Testing', 'Hunt,III, Harry B. and Szymanski, Thomas G. and Ullman, Jeffrey D.', 'Proceedings of the 2Nd ACM SIGACT-SIGPLAN Symposium on Principles of Programming Languages', '', '130--136', '7', '', '', '10.1145/512976.512990', '', '', 'Palo Alto, California', '', 'New York, NY, USA', 'inproceedings', 'Hunt:1975:CLT:512976.512990', 'http://doi.acm.org/10.1145/512976.512990', 'POPL \'75', '1975', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1637, 3, 0, 3, 1, 0, 0),
(1639, 15, 'Methodologies and Evaluation Tools Used in Tangible User Interfaces: A Systematic Literature Review', 'da Costa, Vinicius Kruger and de Vasconcellos, Ana Priscila Valerão and Darley, Natalia Toralles and Tavares, Tatiana Aires', 'Proceedings of the 17th Brazilian Symposium on Human Factors in Computing Systems', '', '31:1--31:9', '9', '', 'Human Computer Interaction, Methodology and evaluation tools, Tangible User Interface', '10.1145/3274192.3274223', '', '', 'Bel&#233;m, Brazil', '978-1-4503-6601-4', 'New York, NY, USA', 'inproceedings', 'daCosta:2018:MET:3274192.3274223', 'http://doi.acm.org/10.1145/3274192.3274223', 'IHC 2018', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1638, 3, 0, 3, 1, 0, 0),
(1640, 15, 'IoT Architectural Concerns: A Systematic Review', 'Gill, Asif Qumer and Behbood, Vahid and Ramadan-Jradi, Rania and Beydoun, Ghassan', 'Proceedings of the Second International Conference on Internet of Things, Data and Cloud Computing', '', '117:1--117:9', '9', '', 'IoT, architecture, digital-physical ecosystem, enterprise architecture, internet of things', '10.1145/3018896.3025166', '', '', 'Cambridge, United Kingdom', '978-1-4503-4774-7', 'New York, NY, USA', 'inproceedings', 'Gill:2017:IAC:3018896.3025166', 'http://doi.acm.org/10.1145/3018896.3025166', 'ICC \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1639, 3, 0, 3, 1, 0, 0),
(1641, 15, 'Simplified Time-sharing Command Language (Interface)', 'Mitchell, Terrell K.', 'Proceedings of the 14th Annual Southeast Regional Conference', '', '27--32', '6', '', '', '10.1145/503561.503568', '', '', 'Birmingham, Alabama', '', 'New York, NY, USA', 'inproceedings', 'Mitchell:1976:STC:503561.503568', 'http://doi.acm.org/10.1145/503561.503568', 'ACM-SE 14', '1976', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1640, 3, 0, 3, 1, 0, 0),
(1642, 15, 'Practical SVBRDF Capture in the Frequency Domain', 'Aittala, Miika and Weyrich, Tim and Lehtinen, Jaakko', '', '32', '110:1--110:12', '12', '', 'SVBRDF, appearance capture, fourier analysis, reflectance', '10.1145/2461912.2461978', 'ACM Trans. Graph.', '0730-0301', '', '', 'New York, NY, USA', 'article', 'Aittala:2013:PSC:2461912.2461978', 'http://doi.acm.org/10.1145/2461912.2461978', '', '2013', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1641, 3, 0, 3, 1, 0, 0),
(1643, 15, 'On the Alignment of Source Code Quality Perspectives Through Experimentation: An Industrial Case', 'Ribeiro, Talita Vieira and Travassos, Guilherme Horta', 'Proceedings of the Third International Workshop on Conducting Empirical Studies in Industry', '', '26--33', '8', '', 'code quality, conceptual alignment, experimental studies, industry-academia collaboration', '', '', '', 'Florence, Italy', '', 'Piscataway, NJ, USA', 'inproceedings', 'Ribeiro:2015:ASC:2819303.2819313', 'http://dl.acm.org/citation.cfm?id=2819303.2819313', 'CESI \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1642, 3, 0, 3, 1, 0, 0),
(1644, 15, 'Effort Estimation in Agile Software Development: A Survey on the State of the Practice', 'Usman, Muhammad and Mendes, Emilia and Börstler, Jürgen', 'Proceedings of the 19th International Conference on Evaluation and Assessment in Software Engineering', '', '12:1--12:10', '10', '', 'agile software development, effort estimation, empirical study', '10.1145/2745802.2745813', '', '', 'Nanjing, China', '978-1-4503-3350-4', 'New York, NY, USA', 'inproceedings', 'Usman:2015:EEA:2745802.2745813', 'http://doi.acm.org/10.1145/2745802.2745813', 'EASE \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1643, 3, 0, 3, 1, 0, 0),
(1645, 15, 'Deterministic Left to Right Parsing of Tree Adjoining Languages', 'Schabes, Yves and Vijay-Shanker, K.', 'Proceedings of the 28th Annual Meeting on Association for Computational Linguistics', '', '276--283', '8', '', '', '10.3115/981823.981858', '', '', 'Pittsburgh, Pennsylvania', '', 'Stroudsburg, PA, USA', 'inproceedings', 'Schabes:1990:DLR:981823.981858', 'https://doi.org/10.3115/981823.981858', 'ACL \'90', '1990', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1644, 3, 0, 3, 1, 0, 0),
(1646, 15, 'A Systematic Review on Social Network Analysis: Tools, Algorithms and Frameworks', 'Aslam, Wajeeha and Butt, Wasi Haider and Anwar, Muhammad Waseem', 'Proceedings of the 2018 International Conference on Computing and Big Data', '', '92--97', '6', '', 'Organizational network analysis, SNA, Social Network Analysis', '10.1145/3277104.3277112', '', '', 'Charleston, SC, USA', '978-1-4503-6540-6', 'New York, NY, USA', 'inproceedings', 'Aslam:2018:SRS:3277104.3277112', 'http://doi.acm.org/10.1145/3277104.3277112', 'ICCBD \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1645, 3, 0, 3, 1, 0, 0),
(1647, 15, 'Characterizing Software Requirements Elicitation Processes: A Systematic Literature Review', 'Abreu, Lucas F. and Barbosa, Glivia A.R. and Silva, Ismael S. and Santos, Natalia S.', 'Proceedings of the XII Brazilian Symposium on Information Systems on Brazilian Symposium on Information Systems: Information Systems in the Cloud Computing Era - Volume 1', '', '26:192--26:199', '8', '', 'Requirements Elicitation Process, Systematic Literature Review', '', '', '', 'Florianopolis, Santa Catarina, Brazil', '978-85-7669-317-8', 'Porto Alegre, Brazil, Brazil', 'inproceedings', 'Abreu:2016:CSR:3021955.3021988', 'http://dl.acm.org/citation.cfm?id=3021955.3021988', 'SBSI 2016', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1646, 3, 0, 3, 1, 0, 0),
(1648, 15, 'A Model-Based Approach to Systematic Review of Research Literature', 'Barat, Souvik and Clark, Tony and Barn, Balbir and Kulkarni, Vinay', 'Proceedings of the 10th Innovations in Software Engineering Conference', '', '15--25', '11', '', 'Literature Review, Meta Modeling, Model Based Literature Review, Systematic Literature Review, Systematic Mapping Study', '10.1145/3021460.3021462', '', '', 'Jaipur, India', '978-1-4503-4856-0', 'New York, NY, USA', 'inproceedings', 'Barat:2017:MAS:3021460.3021462', 'http://doi.acm.org/10.1145/3021460.3021462', 'ISEC \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1647, 3, 0, 3, 1, 0, 0),
(1649, 15, 'A Systematic Literature Review of Improved Knowledge Management in Agile Software Development', 'Al Hafidz, Mochamad Umar and Sensuse, Dana Indra', 'Proceedings of the 2Nd International Conference on Software Engineering and Information Management', '', '102--105', '4', '', 'Systematic literature review, agile software development, improvement, knowledge management', '10.1145/3305160.3305192', '', '', 'Bali, Indonesia', '978-1-4503-6642-7', 'New York, NY, USA', 'inproceedings', 'AlHafidz:2019:SLR:3305160.3305192', 'http://doi.acm.org/10.1145/3305160.3305192', 'ICSIM 2019', '2019', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1648, 3, 0, 3, 1, 0, 0),
(1650, 15, 'Domolki\'s Algorithm Applied to Generalized Overlap Resolvable Grammars', 'Wise, David S.', 'Proceedings of the Third Annual ACM Symposium on Theory of Computing', '', '171--184', '14', '', '', '10.1145/800157.805049', '', '', 'Shaker Heights, Ohio, USA', '', 'New York, NY, USA', 'inproceedings', 'Wise:1971:DAA:800157.805049', 'http://doi.acm.org/10.1145/800157.805049', 'STOC \'71', '1971', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1649, 3, 0, 3, 1, 0, 0),
(1651, 15, 'Concept Maps Construction Using Natural Language Processing to Support Studies Selection', 'dos Santos, Vinicius', 'Proceedings of the 33rd Annual ACM Symposium on Applied Computing', '', '926--927', '2', '', '', '10.1145/3167132.3234663', '', '', 'Pau, France', '978-1-4503-5191-1', 'New York, NY, USA', 'inproceedings', 'dosSantos:2018:CMC:3167132.3234663', 'http://doi.acm.org/10.1145/3167132.3234663', 'SAC \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1650, 3, 0, 3, 1, 0, 0),
(1652, 15, 'Challenges and Recommendations for the Design and Conduct of Global Software Engineering Courses: A Systematic Review', 'Clear, Tony and Beecham, Sarah and Barr, John and Daniels, Mats and McDermott, Roger and Oudshoorn, Michael and Savickaite, Airina and Noll, John', 'Proceedings of the 2015 ITiCSE on Working Group Reports', '', '1--39', '39', '', 'capstone, global software development, global software engineering, international collaboration, open ended group project, systematic literature review, teaching and learning', '10.1145/2858796.2858797', '', '', 'Vilnius, Lithuania', '978-1-4503-4146-2', 'New York, NY, USA', 'inproceedings', 'Clear:2015:CRD:2858796.2858797', 'http://doi.acm.org/10.1145/2858796.2858797', 'ITICSE-WGR \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1651, 3, 0, 3, 1, 0, 0),
(1653, 15, 'Tickle: A Surface-independent Interaction Technique for Grasp Interfaces', 'Wolf, Katrin and Schleicher, Robert and Kratz, Sven and Rohs, Michael', 'Proceedings of the 7th International Conference on Tangible, Embedded and Embodied Interaction', '', '185--192', '8', '', 'back-of-device, gesture, grasp, pitch, rear, swipe', '10.1145/2460625.2460654', '', '', 'Barcelona, Spain', '978-1-4503-1898-3', 'New York, NY, USA', 'inproceedings', 'Wolf:2013:TSI:2460625.2460654', 'http://doi.acm.org/10.1145/2460625.2460654', 'TEI \'13', '2013', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1652, 3, 0, 3, 1, 0, 0),
(1654, 15, 'Reverse Engineering Variability from Natural Language Documents: A Systematic Literature Review', 'Li, Yang and Schulze, Sandro and Saake, Gunter', 'Proceedings of the 21st International Systems and Software Product Line Conference - Volume A', '', '133--142', '10', '', 'Feature Identification, Natural Language Documents, Reverse Engineering, Software Product Lines, Systematic Literature Review, Variability Extraction', '10.1145/3106195.3106207', '', '', 'Sevilla, Spain', '978-1-4503-5221-5', 'New York, NY, USA', 'inproceedings', 'Li:2017:REV:3106195.3106207', 'http://doi.acm.org/10.1145/3106195.3106207', 'SPLC \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1653, 3, 0, 3, 1, 0, 0),
(1655, 15, 'A Literature Review of Studies on Interactive 3D Information Visualization for the Web', 'Baglie, Luiz S. S. and Dias, Diego R. C. and Guimarães, Marcelo P. and Brega, Jos\'e R. F.', 'Proceedings of the 34th ACM/SIGAPP Symposium on Applied Computing', '', '2479--2488', '10', '', 'graphic cluster, multi-projection system, systematic literature review, web browser', '10.1145/3297280.3297524', '', '', 'Limassol, Cyprus', '978-1-4503-5933-7', 'New York, NY, USA', 'inproceedings', 'Baglie:2019:LRS:3297280.3297524', 'http://doi.acm.org/10.1145/3297280.3297524', 'SAC \'19', '2019', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1654, 3, 0, 3, 1, 0, 0),
(1656, 15, 'Conducting Systematic Literature Reviews and Systematic Mapping Studies', 'Barn, Balbir and Barat, Souvik and Clark, Tony', 'Proceedings of the 10th Innovations in Software Engineering Conference', '', '212--213', '2', '', 'Literature Review, Meta Modeling, Model Based Literature Review, Systematic Literature Review, Systematic Mapping Study', '10.1145/3021460.3021489', '', '', 'Jaipur, India', '978-1-4503-4856-0', 'New York, NY, USA', 'inproceedings', 'Barn:2017:CSL:3021460.3021489', 'http://doi.acm.org/10.1145/3021460.3021489', 'ISEC \'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1655, 3, 0, 3, 1, 0, 0),
(1657, 15, 'Characterisation of Challenges for Testing of Adaptive Systems', 'Siqueira, Bento Rafael and Ferrari, Fabiano Cutigi and Serikawa, Marcel Akira and Menotti, Ricardo and de Camargo, Valter Vieira', 'Proceedings of the 1st Brazilian Symposium on Systematic and Automated Software Testing', '', '11:1--11:10', '10', '', 'Adaptive systems, software testing, testing challenges', '10.1145/2993288.2993294', '', '', 'Maringa, Parana, Brazil', '978-1-4503-4766-2', 'New York, NY, USA', 'inproceedings', 'Siqueira:2016:CCT:2993288.2993294', 'http://doi.acm.org/10.1145/2993288.2993294', 'SAST', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1656, 3, 0, 3, 1, 0, 0),
(1658, 15, 'A Systematic Literature Review on Modified Condition and Decision Coverage', 'Paul, Tanay Kanti and Lau, Man Fai', 'Proceedings of the 29th Annual ACM Symposium on Applied Computing', '', '1301--1308', '8', '', 'fault class, fault-based testing, modified condition and decision coverage (MCDC), software testing, white-box testing', '10.1145/2554850.2555004', '', '', 'Gyeongju, Republic of Korea', '978-1-4503-2469-4', 'New York, NY, USA', 'inproceedings', 'Paul:2014:SLR:2554850.2555004', 'http://doi.acm.org/10.1145/2554850.2555004', 'SAC \'14', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1657, 3, 0, 3, 1, 0, 0),
(1659, 15, 'Analyses of Deterministic Parsing Algorithms', 'Cohen, Jacques and Roth, Martin S.', '', '21', '448--458', '11', '', 'analysis of algorithms, relative efficiencies, syntactic analysis, top-down and bottom-up parsing', '10.1145/359511.359517', 'Commun. ACM', '0001-0782', '', '', 'New York, NY, USA', 'article', 'Cohen:1978:ADP:359511.359517', 'http://doi.acm.org/10.1145/359511.359517', '', '1978', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1658, 3, 0, 3, 1, 0, 0),
(1660, 15, 'Dispersion, Coordination and Performance in Global Software Teams: A Systematic Review', 'Anh, Nguyen-Duc and Cruzes, Daniela S. and Conradi, Reidar', 'Proceedings of the ACM-IEEE International Symposium on Empirical Software Engineering and Measurement', '', '129--138', '10', '', 'communication, distribution, global software development, performance, systematic literature review, team coordination', '10.1145/2372251.2372274', '', '', 'Lund, Sweden', '978-1-4503-1056-7', 'New York, NY, USA', 'inproceedings', 'Anh:2012:DCP:2372251.2372274', 'http://doi.acm.org/10.1145/2372251.2372274', 'ESEM \'12', '2012', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1659, 3, 0, 3, 1, 0, 0),
(1661, 15, 'On the Use of Ontologies in Software Process Assessment: A Systematic Literature Review', 'Tarhan, Ayça and Giray, Görkem', 'Proceedings of the 21st International Conference on Evaluation and Assessment in Software Engineering', '', '2--11', '10', '', 'Software process, ontology, process assessment, systematic literature review', '10.1145/3084226.3084261', '', '', 'Karlskrona, Sweden', '978-1-4503-4804-1', 'New York, NY, USA', 'inproceedings', 'Tarhan:2017:UOS:3084226.3084261', 'http://doi.acm.org/10.1145/3084226.3084261', 'EASE\'17', '2017', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1660, 3, 0, 3, 1, 0, 0),
(1662, 15, 'A Systematic Approach for Identifying Requirement Change Management Challenges: Preliminary Results', 'Anwer, Sajid and Wen, Lian and Wang, Zhe', 'Proceedings of the Evaluation and Assessment on Software Engineering', '', '230--235', '6', '', 'Global software development, Requirement change management, Requirements evolution, Systematic literature review', '10.1145/3319008.3319031', '', '', 'Copenhagen, Denmark', '978-1-4503-7145-2', 'New York, NY, USA', 'inproceedings', 'Anwer:2019:SAI:3319008.3319031', 'http://doi.acm.org/10.1145/3319008.3319031', 'EASE \'19', '2019', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1661, 3, 0, 3, 1, 0, 0),
(1663, 15, 'Privacy: What is the Research Scenario in Brazilian Symposium IHC?', 'Silva, Edenildo and Torres, Bruno and Sacramento, Carolina and Capra, Eliane Pinheiro and Ferreira, Simone Bacellar Leal and Garcia, Ana Cristina Bicharra', 'Proceedings of the 17th Brazilian Symposium on Human Factors in Computing Systems', '', '34:1--34:8', '8', '', 'GranDIHC-BR, HCI, Privacy, systematic literature review', '10.1145/3274192.3274226', '', '', 'Bel&#233;m, Brazil', '978-1-4503-6601-4', 'New York, NY, USA', 'inproceedings', 'Silva:2018:PRS:3274192.3274226', 'http://doi.acm.org/10.1145/3274192.3274226', 'IHC 2018', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1662, 3, 0, 3, 1, 0, 0),
(1664, 15, 'The Scalability-efficiency/Maintainability-portability Trade-off in Simulation Software Engineering: Examples and a Preliminary Systematic Literature Review', 'Pflüger, Dirk and Mehl, Miriam and Valentin, Julian and Lindner, Florian and Pfander, David and Wagner, Stefan and Graziotin, Daniel and Wang, Yang', 'Proceedings of the Fourth International Workshop on Software Engineering for HPC in Computational Science and Engineering', '', '19--27', '9', '', '', '10.1109/SE-HPCCSE.2016.8', '', '', 'Salt Lake City, Utah', '978-1-5090-5224-0', 'Piscataway, NJ, USA', 'inproceedings', 'Pfluger:2016:STS:3019106.3019110', 'https://doi.org/10.1109/SE-HPCCSE.2016.8', 'SE-HPCCSE \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1663, 3, 0, 3, 1, 0, 0),
(1665, 15, 'The Use of Systematic Reviews in Evidence Based Software Engineering: A Systematic Mapping Study', 'Santos, Ronnie E. S. and de Magalhães, Cleyton V. C. and da Silva, Fabio Q. B.', 'Proceedings of the 8th ACM/IEEE International Symposium on Empirical Software Engineering and Measurement', '', '53:1--53:4', '4', '', 'evidence-based software engineering, mapping study, software engineering, systematic literature review', '10.1145/2652524.2652553', '', '', 'Torino, Italy', '978-1-4503-2774-9', 'New York, NY, USA', 'inproceedings', 'Santos:2014:USR:2652524.2652553', 'http://doi.acm.org/10.1145/2652524.2652553', 'ESEM \'14', '2014', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1664, 3, 0, 3, 1, 0, 0),
(1666, 15, 'Estimating Makespan Using Double Trust Thresholds for Workflow Applications', 'Tangudu, V. Santhosh Kumar and Mishra, Manoj', 'Proceedings of the CUBE International Information Technology Conference', '', '532--536', '5', '', 'DAG, grid schedsuling, trust', '10.1145/2381716.2381818', '', '', 'Pune, India', '978-1-4503-1185-4', 'New York, NY, USA', 'inproceedings', 'Tangudu:2012:EMU:2381716.2381818', 'http://doi.acm.org/10.1145/2381716.2381818', 'CUBE \'12', '2012', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1665, 3, 0, 3, 1, 0, 0),
(1667, 15, 'Systematic Literature Review: Ingenious Software Project Management While Narrowing the Impact Aspect', 'Ahmed, Mudassar Adeel and Ahsan, Imran and Abbas, Muhammad', 'Proceedings of the International Conference on Research in Adaptive and Convergent Systems', '', '165--168', '4', '', 'Software project management, Systematic literature review, ingenious software project management', '10.1145/2987386.2987422', '', '', 'Odense, Denmark', '978-1-4503-4455-5', 'New York, NY, USA', 'inproceedings', 'Ahmed:2016:SLR:2987386.2987422', 'http://doi.acm.org/10.1145/2987386.2987422', 'RACS \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1666, 3, 0, 3, 1, 0, 0),
(1668, 15, 'A Systematic Literature Review on the Description of Software Architectures for Systems of Systems', 'Guessi, Milena and Neto, Valdemar V. G. and Bianchi, Thiago and Felizardo, Katia R. and Oquendo, Flavio and Nakagawa, Elisa Y.', 'Proceedings of the 30th Annual ACM Symposium on Applied Computing', '', '1433--1440', '8', '', 'architecture description, software architecture, systematic literature review, systems of systems', '10.1145/2695664.2695795', '', '', 'Salamanca, Spain', '978-1-4503-3196-8', 'New York, NY, USA', 'inproceedings', 'Guessi:2015:SLR:2695664.2695795', 'http://doi.acm.org/10.1145/2695664.2695795', 'SAC \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1667, 3, 0, 3, 1, 0, 0),
(1669, 15, 'Motion Image De-blurring System Based on the Effectiveness Parameters of Point Spread Function', 'Lee, Chu-Hui and Qiu, Zhi-Yong', 'Proceedings of the Fifth International Conference on Network, Communication and Computing', '', '27--31', '5', '', 'image de-blurring, kalman filter, motion blur, point spread function', '10.1145/3033288.3033308', '', '', 'Kyoto, Japan', '978-1-4503-4793-8', 'New York, NY, USA', 'inproceedings', 'Lee:2016:MID:3033288.3033308', 'http://doi.acm.org/10.1145/3033288.3033308', 'ICNCC \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1668, 3, 0, 3, 1, 0, 0),
(1670, 15, 'On the Complexity of LR(K) Testing', 'Hunt,III, Harry B. and Szymanski, Thomas G. and Ullman, Jeffrey D.', '', '18', '707--716', '10', '', 'LR(k) grammars, NP-complete problems, computational complexity, context-free grammars, parsing', '10.1145/361227.361232', 'Commun. ACM', '0001-0782', '', '', 'New York, NY, USA', 'article', 'Hunt:1975:CLT:361227.361232', 'http://doi.acm.org/10.1145/361227.361232', '', '1975', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1669, 4, 0, 3, 1, 0, 0),
(1671, 15, 'Acquisition of Categorized Named Entities for Web Search', 'Pasca, Marius', 'Proceedings of the Thirteenth ACM International Conference on Information and Knowledge Management', '', '137--145', '9', '', 'information integration, lightweight text processing, named entity extraction, related names and categories, web information retrieval', '10.1145/1031171.1031194', '', '', 'Washington, D.C., USA', '1-58113-874-1', 'New York, NY, USA', 'inproceedings', 'Pasca:2004:ACN:1031171.1031194', 'http://doi.acm.org/10.1145/1031171.1031194', 'CIKM \'04', '2004', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1670, 3, 0, 3, 1, 0, 0),
(1672, 15, 'To Each His Own: Personalized Content Selection Based on Text Comprehensibility', 'Tan, Chenhao and Gabrilovich, Evgeniy and Pang, Bo', 'Proceedings of the Fifth ACM International Conference on Web Search and Data Mining', '', '233--242', '10', '', 'personalization, re-ranking, text comprehensibility, user modeling', '10.1145/2124295.2124325', '', '', 'Seattle, Washington, USA', '978-1-4503-0747-5', 'New York, NY, USA', 'inproceedings', 'Tan:2012:HOP:2124295.2124325', 'http://doi.acm.org/10.1145/2124295.2124325', 'WSDM \'12', '2012', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1671, 3, 0, 3, 1, 0, 0),
(1673, 15, 'A Preliminary Structure of Software Security Assurance Model', 'Khan, Rafiq Ahmad and Khan, Siffat Ullah', 'Proceedings of the 13th International Conference on Global Software Engineering', '', '137--140', '4', '', 'case study, empirical study, global software development, software development life cycle, software security, systematic literature review, systematic mapping study, vendors', '10.1145/3196369.3196385', '', '', 'Gothenburg, Sweden', '978-1-4503-5717-3', 'New York, NY, USA', 'inproceedings', 'Khan:2018:PSS:3196369.3196385', 'http://doi.acm.org/10.1145/3196369.3196385', 'ICGSE \'18', '2018', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1672, 3, 0, 3, 1, 0, 0),
(1674, 15, 'Stigmergic Landmark Routing: A Routing Algorithm for Wireless Mobile Ad-hoc Networks', 'Lemmens, Nyree and Tuyls, Karl', 'Proceedings of the 12th Annual Conference on Genetic and Evolutionary Computation', '', '47--54', '8', '', 'bee colony optimization, multi-agent systems, swarm intelligence, wireless mobile ad-hoc routing', '10.1145/1830483.1830491', '', '', 'Portland, Oregon, USA', '978-1-4503-0072-8', 'New York, NY, USA', 'inproceedings', 'Lemmens:2010:SLR:1830483.1830491', 'http://doi.acm.org/10.1145/1830483.1830491', 'GECCO \'10', '2010', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1673, 3, 0, 3, 1, 0, 0),
(1675, 15, 'Optimizing Virtual Machine Live Storage Migration in Heterogeneous Storage Environment', 'Zhou, Ruijin and Liu, Fang and Li, Chao and Li, Tao', '', '48', '73--84', '12', '', 'live vm storage migration, solid state drive, virtualization', '10.1145/2517326.2451529', 'SIGPLAN Not.', '0362-1340', '', '', 'New York, NY, USA', 'article', 'Zhou:2013:OVM:2517326.2451529', 'http://doi.acm.org/10.1145/2517326.2451529', '', '2013', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1674, 3, 0, 3, 1, 0, 0),
(1676, 15, 'Optimizing Virtual Machine Live Storage Migration in Heterogeneous Storage Environment', 'Zhou, Ruijin and Liu, Fang and Li, Chao and Li, Tao', 'Proceedings of the 9th ACM SIGPLAN/SIGOPS International Conference on Virtual Execution Environments', '', '73--84', '12', '', 'live vm storage migration, solid state drive, virtualization', '10.1145/2451512.2451529', '', '', 'Houston, Texas, USA', '978-1-4503-1266-0', 'New York, NY, USA', 'inproceedings', 'Zhou:2013:OVM:2451512.2451529', 'http://doi.acm.org/10.1145/2451512.2451529', 'VEE \'13', '2013', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1675, 4, 0, 3, 1, 0, 0),
(1677, 15, 'The Adoption of Capture-recapture in Software Engineering: A Systematic Literature Review', 'Liu, Gaoxuan and Rong, Guoping and Zhang, He and Shan, Qi', 'Proceedings of the 19th International Conference on Evaluation and Assessment in Software Engineering', '', '15:1--15:13', '13', '', 'capture-recapture method, defect estimation, software inspection, systematic literature review', '10.1145/2745802.2745816', '', '', 'Nanjing, China', '978-1-4503-3350-4', 'New York, NY, USA', 'inproceedings', 'Liu:2015:ACS:2745802.2745816', 'http://doi.acm.org/10.1145/2745802.2745816', 'EASE \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1676, 3, 0, 3, 1, 0, 0),
(1678, 15, 'Integrating a Breadth-first Curriculum with Relevant Programming Projects in CS1/CS2', 'Wilson, Ronald E.', '', '27', '214--217', '4', '', '', '10.1145/199691.199789', 'SIGCSE Bull.', '0097-8418', '', '', 'New York, NY, USA', 'article', 'Wilson:1995:IBC:199691.199789', 'http://doi.acm.org/10.1145/199691.199789', '', '1995', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1677, 3, 0, 3, 1, 0, 0),
(1679, 15, 'Integrating a Breadth-first Curriculum with Relevant Programming Projects in CS1/CS2', 'Wilson, Ronald E.', 'Proceedings of the Twenty-sixth SIGCSE Technical Symposium on Computer Science Education', '', '214--217', '4', '', '', '10.1145/199688.199789', '', '', 'Nashville, Tennessee, USA', '0-89791-693-X', 'New York, NY, USA', 'inproceedings', 'Wilson:1995:IBC:199688.199789', 'http://doi.acm.org/10.1145/199688.199789', 'SIGCSE \'95', '1995', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1678, 4, 0, 3, 1, 0, 0);
INSERT INTO `papers` (`id_paper`, `id_bib`, `title`, `author`, `book_title`, `volume`, `pages`, `num_pages`, `abstract`, `keywords`, `doi`, `journal`, `issn`, `location`, `isbn`, `address`, `type`, `bib_key`, `url`, `publisher`, `year`, `added_at`, `update_at`, `data_base`, `id`, `status_selection`, `check_status_selection`, `status_qa`, `id_gen_score`, `check_qa`, `score`) VALUES
(1680, 15, 'Capturing Cost Avoidance Through Reuse: Systematic Literature Review and Industrial Evaluation', 'Irshad, Mohsin and Torkar, Richard and Petersen, Kai and Afzal, Wasif', 'Proceedings of the 20th International Conference on Evaluation and Assessment in Software Engineering', '', '35:1--35:12', '12', '', 'cost avoidance, cost savings, software reuse', '10.1145/2915970.2915989', '', '', 'Limerick, Ireland', '978-1-4503-3691-8', 'New York, NY, USA', 'inproceedings', 'Irshad:2016:CCA:2915970.2915989', 'http://doi.acm.org/10.1145/2915970.2915989', 'EASE \'16', '2016', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1679, 3, 0, 3, 1, 0, 0),
(1681, 15, 'The TagAdvisor: Luring the Lurkers to Review Web Items', 'Nazi, Azade and Das, Mahashweta and Das, Gautam', 'Proceedings of the 2015 ACM SIGMOD International Conference on Management of Data', '', '531--543', '13', '', 'coverage, personalized tag advisor, polarity, relevance', '10.1145/2723372.2749457', '', '', 'Melbourne, Victoria, Australia', '978-1-4503-2758-9', 'New York, NY, USA', 'inproceedings', 'Nazi:2015:TLL:2723372.2749457', 'http://doi.acm.org/10.1145/2723372.2749457', 'SIGMOD \'15', '2015', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1680, 3, 0, 3, 1, 0, 0),
(1682, 15, 'Applied Image Science: From Consumers\' Digital Files to Tangible Products', 'Fageth, Reiner', 'Proceedings of the 15th ACM International Conference on Multimedia', '', '381--381', '1', '', 'color management, digital photography, image science, wholesale photo finishing', '10.1145/1291233.1291324', '', '', 'Augsburg, Germany', '978-1-59593-702-5', 'New York, NY, USA', 'inproceedings', 'Fageth:2007:AIS:1291233.1291324', 'http://doi.acm.org/10.1145/1291233.1291324', 'MM \'07', '2007', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1681, 3, 0, 3, 1, 0, 0),
(1683, 15, 'Elimination of Single Productions from LR Parsers in Conjunction with the Use of Default Reductions', 'Soisalon-Soininen, Eljas', 'Proceedings of the 4th ACM SIGACT-SIGPLAN Symposium on Principles of Programming Languages', '', '183--193', '11', '', '', '10.1145/512950.512967', '', '', 'Los Angeles, California', '', 'New York, NY, USA', 'inproceedings', 'Soisalon-Soininen:1977:ESP:512950.512967', 'http://doi.acm.org/10.1145/512950.512967', 'POPL \'77', '1977', '2019-05-10 13:34:02', '2019-05-10 13:34:02', 5, 1682, 3, 0, 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `papers_qa`
--

CREATE TABLE `papers_qa` (
  `id_paper_qa` int(11) NOT NULL,
  `id_paper` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_gen_score` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `papers_qa`
--

INSERT INTO `papers_qa` (`id_paper_qa`, `id_paper`, `id_member`, `id_gen_score`, `id_status`, `note`, `score`) VALUES
(3636, 1415, 1, 1, 3, '', 0),
(3637, 1416, 1, 2, 1, '', 1.25),
(3638, 1417, 1, 3, 2, '', 2.5),
(3639, 1418, 1, 5, 1, '', 5),
(3640, 1419, 1, 1, 2, '', 0),
(3641, 1420, 1, 1, 3, '', 0),
(3642, 1421, 1, 1, 3, '', 0),
(3643, 1422, 1, 1, 3, '', 0),
(3644, 1423, 1, 1, 3, '', 0),
(3645, 1424, 1, 1, 3, '', 0),
(3646, 1425, 1, 1, 3, '', 0),
(3647, 1426, 1, 1, 3, '', 0),
(3648, 1427, 1, 1, 3, '', 0),
(3649, 1428, 1, 1, 3, '', 0),
(3650, 1429, 1, 1, 3, '', 0),
(3651, 1430, 1, 1, 3, '', 0),
(3652, 1431, 1, 1, 3, '', 0),
(3653, 1432, 1, 1, 3, '', 0),
(3654, 1433, 1, 1, 3, '', 0),
(3655, 1434, 1, 1, 3, '', 0),
(3656, 1435, 1, 1, 3, '', 0),
(3657, 1436, 1, 1, 3, '', 0),
(3658, 1437, 1, 1, 3, '', 0),
(3659, 1438, 1, 1, 3, '', 0),
(3660, 1439, 1, 1, 3, '', 0),
(3661, 1440, 1, 1, 3, '', 0),
(3662, 1441, 1, 1, 3, '', 0),
(3663, 1442, 1, 1, 3, '', 0),
(3664, 1443, 1, 1, 3, '', 0),
(3665, 1444, 1, 1, 3, '', 0),
(3666, 1445, 1, 1, 3, '', 0),
(3667, 1446, 1, 1, 3, '', 0),
(3668, 1447, 1, 1, 3, '', 0),
(3669, 1448, 1, 1, 3, '', 0),
(3670, 1449, 1, 1, 3, '', 0),
(3671, 1450, 1, 1, 3, '', 0),
(3672, 1451, 1, 1, 3, '', 0),
(3673, 1452, 1, 1, 3, '', 0),
(3674, 1453, 1, 1, 3, '', 0),
(3675, 1454, 1, 1, 3, '', 0),
(3676, 1455, 1, 1, 3, '', 0),
(3677, 1456, 1, 1, 3, '', 0),
(3678, 1457, 1, 1, 3, '', 0),
(3679, 1458, 1, 1, 3, '', 0),
(3680, 1459, 1, 1, 3, '', 0),
(3681, 1460, 1, 1, 3, '', 0),
(3682, 1461, 1, 1, 3, '', 0),
(3683, 1462, 1, 1, 3, '', 0),
(3684, 1463, 1, 1, 3, '', 0),
(3685, 1464, 1, 1, 3, '', 0),
(3686, 1465, 1, 1, 3, '', 0),
(3687, 1466, 1, 1, 3, '', 0),
(3688, 1467, 1, 1, 3, '', 0),
(3689, 1468, 1, 1, 3, '', 0),
(3690, 1469, 1, 1, 3, '', 0),
(3691, 1470, 1, 1, 3, '', 0),
(3692, 1471, 1, 1, 3, '', 0),
(3693, 1472, 1, 1, 3, '', 0),
(3694, 1473, 1, 1, 3, '', 0),
(3695, 1474, 1, 1, 3, '', 0),
(3696, 1475, 1, 1, 3, '', 0),
(3697, 1476, 1, 1, 3, '', 0),
(3698, 1477, 1, 1, 3, '', 0),
(3699, 1478, 1, 1, 3, '', 0),
(3700, 1479, 1, 1, 3, '', 0),
(3701, 1480, 1, 1, 3, '', 0),
(3702, 1481, 1, 1, 3, '', 0),
(3703, 1482, 1, 1, 3, '', 0),
(3704, 1483, 1, 1, 3, '', 0),
(3705, 1484, 1, 1, 3, '', 0),
(3706, 1485, 1, 1, 3, '', 0),
(3707, 1486, 1, 1, 3, '', 0),
(3708, 1487, 1, 1, 3, '', 0),
(3709, 1488, 1, 1, 3, '', 0),
(3710, 1489, 1, 1, 3, '', 0),
(3711, 1490, 1, 1, 3, '', 0),
(3712, 1491, 1, 1, 3, '', 0),
(3713, 1492, 1, 1, 3, '', 0),
(3714, 1493, 1, 1, 3, '', 0),
(3715, 1494, 1, 1, 3, '', 0),
(3716, 1495, 1, 1, 3, '', 0),
(3717, 1496, 1, 1, 3, '', 0),
(3718, 1497, 1, 1, 3, '', 0),
(3719, 1498, 1, 1, 3, '', 0),
(3720, 1499, 1, 1, 3, '', 0),
(3721, 1500, 1, 1, 3, '', 0),
(3722, 1501, 1, 1, 3, '', 0),
(3723, 1502, 1, 1, 3, '', 0),
(3724, 1503, 1, 1, 3, '', 0),
(3725, 1504, 1, 1, 3, '', 0),
(3726, 1505, 1, 1, 3, '', 0),
(3727, 1506, 1, 1, 3, '', 0),
(3728, 1507, 1, 1, 3, '', 0),
(3729, 1508, 1, 1, 3, '', 0),
(3730, 1509, 1, 1, 3, '', 0),
(3731, 1510, 1, 1, 3, '', 0),
(3732, 1511, 1, 1, 3, '', 0),
(3733, 1512, 1, 1, 3, '', 0),
(3734, 1513, 1, 1, 3, '', 0),
(3735, 1514, 1, 1, 3, '', 0),
(3736, 1415, 3, 1, 3, '', 0),
(3737, 1416, 3, 3, 2, '', 2.5),
(3738, 1417, 3, 3, 1, '', 2.5),
(3739, 1418, 3, 5, 1, '', 5),
(3740, 1419, 3, 1, 4, '', 0),
(3741, 1420, 3, 1, 3, '', 0),
(3742, 1421, 3, 1, 3, '', 0),
(3743, 1422, 3, 1, 3, '', 0),
(3744, 1423, 3, 1, 3, '', 0),
(3745, 1424, 3, 1, 3, '', 0),
(3746, 1425, 3, 1, 3, '', 0),
(3747, 1426, 3, 1, 3, '', 0),
(3748, 1427, 3, 1, 3, '', 0),
(3749, 1428, 3, 1, 3, '', 0),
(3750, 1429, 3, 1, 3, '', 0),
(3751, 1430, 3, 1, 3, '', 0),
(3752, 1431, 3, 1, 3, '', 0),
(3753, 1432, 3, 1, 3, '', 0),
(3754, 1433, 3, 1, 3, '', 0),
(3755, 1434, 3, 1, 3, '', 0),
(3756, 1435, 3, 1, 3, '', 0),
(3757, 1436, 3, 1, 3, '', 0),
(3758, 1437, 3, 1, 3, '', 0),
(3759, 1438, 3, 1, 3, '', 0),
(3760, 1439, 3, 1, 3, '', 0),
(3761, 1440, 3, 1, 3, '', 0),
(3762, 1441, 3, 1, 3, '', 0),
(3763, 1442, 3, 1, 3, '', 0),
(3764, 1443, 3, 1, 3, '', 0),
(3765, 1444, 3, 1, 3, '', 0),
(3766, 1445, 3, 1, 3, '', 0),
(3767, 1446, 3, 1, 3, '', 0),
(3768, 1447, 3, 1, 3, '', 0),
(3769, 1448, 3, 1, 3, '', 0),
(3770, 1449, 3, 1, 3, '', 0),
(3771, 1450, 3, 1, 3, '', 0),
(3772, 1451, 3, 1, 3, '', 0),
(3773, 1452, 3, 1, 3, '', 0),
(3774, 1453, 3, 1, 3, '', 0),
(3775, 1454, 3, 1, 3, '', 0),
(3776, 1455, 3, 1, 3, '', 0),
(3777, 1456, 3, 1, 3, '', 0),
(3778, 1457, 3, 1, 3, '', 0),
(3779, 1458, 3, 1, 3, '', 0),
(3780, 1459, 3, 1, 3, '', 0),
(3781, 1460, 3, 1, 3, '', 0),
(3782, 1461, 3, 1, 3, '', 0),
(3783, 1462, 3, 1, 3, '', 0),
(3784, 1463, 3, 1, 3, '', 0),
(3785, 1464, 3, 1, 3, '', 0),
(3786, 1465, 3, 1, 3, '', 0),
(3787, 1466, 3, 1, 3, '', 0),
(3788, 1467, 3, 1, 3, '', 0),
(3789, 1468, 3, 1, 3, '', 0),
(3790, 1469, 3, 1, 3, '', 0),
(3791, 1470, 3, 1, 3, '', 0),
(3792, 1471, 3, 1, 3, '', 0),
(3793, 1472, 3, 1, 3, '', 0),
(3794, 1473, 3, 1, 3, '', 0),
(3795, 1474, 3, 1, 3, '', 0),
(3796, 1475, 3, 1, 3, '', 0),
(3797, 1476, 3, 1, 3, '', 0),
(3798, 1477, 3, 1, 3, '', 0),
(3799, 1478, 3, 1, 3, '', 0),
(3800, 1479, 3, 1, 3, '', 0),
(3801, 1480, 3, 1, 3, '', 0),
(3802, 1481, 3, 1, 3, '', 0),
(3803, 1482, 3, 1, 3, '', 0),
(3804, 1483, 3, 1, 3, '', 0),
(3805, 1484, 3, 1, 3, '', 0),
(3806, 1485, 3, 1, 3, '', 0),
(3807, 1486, 3, 1, 3, '', 0),
(3808, 1487, 3, 1, 3, '', 0),
(3809, 1488, 3, 1, 3, '', 0),
(3810, 1489, 3, 1, 3, '', 0),
(3811, 1490, 3, 1, 3, '', 0),
(3812, 1491, 3, 1, 3, '', 0),
(3813, 1492, 3, 1, 3, '', 0),
(3814, 1493, 3, 1, 3, '', 0),
(3815, 1494, 3, 1, 3, '', 0),
(3816, 1495, 3, 1, 3, '', 0),
(3817, 1496, 3, 1, 3, '', 0),
(3818, 1497, 3, 1, 3, '', 0),
(3819, 1498, 3, 1, 3, '', 0),
(3820, 1499, 3, 1, 3, '', 0),
(3821, 1500, 3, 1, 3, '', 0),
(3822, 1501, 3, 1, 3, '', 0),
(3823, 1502, 3, 1, 3, '', 0),
(3824, 1503, 3, 1, 3, '', 0),
(3825, 1504, 3, 1, 3, '', 0),
(3826, 1505, 3, 1, 3, '', 0),
(3827, 1506, 3, 1, 3, '', 0),
(3828, 1507, 3, 1, 3, '', 0),
(3829, 1508, 3, 1, 3, '', 0),
(3830, 1509, 3, 1, 3, '', 0),
(3831, 1510, 3, 1, 3, '', 0),
(3832, 1511, 3, 1, 3, '', 0),
(3833, 1512, 3, 1, 3, '', 0),
(3834, 1513, 3, 1, 3, '', 0),
(3835, 1514, 3, 1, 3, '', 0),
(3836, 1515, 1, 1, 3, '', 0),
(3837, 1516, 1, 1, 3, '', 0),
(3838, 1517, 1, 1, 3, '', 0),
(3839, 1518, 1, 1, 3, '', 0),
(3840, 1519, 1, 1, 3, '', 0),
(3841, 1520, 1, 1, 3, '', 0),
(3842, 1521, 1, 1, 3, '', 0),
(3843, 1522, 1, 1, 3, '', 0),
(3844, 1523, 1, 1, 3, '', 0),
(3845, 1524, 1, 1, 3, '', 0),
(3846, 1525, 1, 1, 3, '', 0),
(3847, 1526, 1, 1, 3, '', 0),
(3848, 1527, 1, 1, 3, '', 0),
(3849, 1528, 1, 1, 3, '', 0),
(3850, 1529, 1, 1, 3, '', 0),
(3851, 1530, 1, 1, 3, '', 0),
(3852, 1531, 1, 1, 3, '', 0),
(3853, 1532, 1, 1, 3, '', 0),
(3854, 1533, 1, 1, 3, '', 0),
(3855, 1534, 1, 1, 3, '', 0),
(3856, 1535, 1, 1, 3, '', 0),
(3857, 1536, 1, 1, 3, '', 0),
(3858, 1537, 1, 1, 3, '', 0),
(3859, 1538, 1, 1, 3, '', 0),
(3860, 1539, 1, 1, 3, '', 0),
(3861, 1540, 1, 1, 3, '', 0),
(3862, 1541, 1, 1, 3, '', 0),
(3863, 1542, 1, 1, 3, '', 0),
(3864, 1543, 1, 1, 3, '', 0),
(3865, 1544, 1, 1, 3, '', 0),
(3866, 1545, 1, 1, 3, '', 0),
(3867, 1546, 1, 1, 3, '', 0),
(3868, 1547, 1, 1, 3, '', 0),
(3869, 1548, 1, 1, 3, '', 0),
(3870, 1549, 1, 1, 3, '', 0),
(3871, 1550, 1, 1, 3, '', 0),
(3872, 1551, 1, 1, 3, '', 0),
(3873, 1552, 1, 1, 3, '', 0),
(3874, 1553, 1, 1, 3, '', 0),
(3875, 1554, 1, 1, 3, '', 0),
(3876, 1555, 1, 1, 3, '', 0),
(3877, 1556, 1, 1, 3, '', 0),
(3878, 1557, 1, 1, 3, '', 0),
(3879, 1558, 1, 1, 3, '', 0),
(3880, 1559, 1, 1, 3, '', 0),
(3881, 1560, 1, 1, 3, '', 0),
(3882, 1561, 1, 1, 3, '', 0),
(3883, 1562, 1, 1, 3, '', 0),
(3884, 1563, 1, 1, 3, '', 0),
(3885, 1564, 1, 1, 3, '', 0),
(3886, 1565, 1, 1, 3, '', 0),
(3887, 1566, 1, 1, 3, '', 0),
(3888, 1567, 1, 1, 3, '', 0),
(3889, 1568, 1, 1, 3, '', 0),
(3890, 1569, 1, 1, 3, '', 0),
(3891, 1570, 1, 1, 3, '', 0),
(3892, 1571, 1, 1, 3, '', 0),
(3893, 1572, 1, 1, 3, '', 0),
(3894, 1573, 1, 1, 3, '', 0),
(3895, 1574, 1, 1, 3, '', 0),
(3896, 1575, 1, 1, 3, '', 0),
(3897, 1576, 1, 1, 3, '', 0),
(3898, 1577, 1, 1, 3, '', 0),
(3899, 1578, 1, 1, 3, '', 0),
(3900, 1579, 1, 1, 3, '', 0),
(3901, 1580, 1, 1, 3, '', 0),
(3902, 1581, 1, 1, 3, '', 0),
(3903, 1582, 1, 1, 3, '', 0),
(3904, 1583, 1, 1, 3, '', 0),
(3905, 1584, 1, 1, 3, '', 0),
(3906, 1585, 1, 1, 3, '', 0),
(3907, 1586, 1, 1, 3, '', 0),
(3908, 1587, 1, 1, 3, '', 0),
(3909, 1588, 1, 1, 3, '', 0),
(3910, 1589, 1, 1, 3, '', 0),
(3911, 1590, 1, 1, 3, '', 0),
(3912, 1591, 1, 1, 3, '', 0),
(3913, 1592, 1, 1, 3, '', 0),
(3914, 1593, 1, 1, 3, '', 0),
(3915, 1594, 1, 1, 3, '', 0),
(3916, 1595, 1, 1, 3, '', 0),
(3917, 1596, 1, 1, 3, '', 0),
(3918, 1597, 1, 1, 3, '', 0),
(3919, 1598, 1, 1, 3, '', 0),
(3920, 1599, 1, 1, 3, '', 0),
(3921, 1600, 1, 1, 3, '', 0),
(3922, 1601, 1, 1, 3, '', 0),
(3923, 1602, 1, 1, 3, '', 0),
(3924, 1603, 1, 1, 3, '', 0),
(3925, 1604, 1, 1, 3, '', 0),
(3926, 1605, 1, 1, 3, '', 0),
(3927, 1606, 1, 1, 3, '', 0),
(3928, 1607, 1, 1, 3, '', 0),
(3929, 1608, 1, 1, 3, '', 0),
(3930, 1609, 1, 1, 3, '', 0),
(3931, 1610, 1, 1, 3, '', 0),
(3932, 1611, 1, 1, 3, '', 0),
(3933, 1612, 1, 1, 3, '', 0),
(3934, 1613, 1, 1, 3, '', 0),
(3935, 1614, 1, 1, 3, '', 0),
(3936, 1615, 1, 1, 3, '', 0),
(3937, 1616, 1, 1, 3, '', 0),
(3938, 1617, 1, 1, 3, '', 0),
(3939, 1618, 1, 1, 3, '', 0),
(3940, 1619, 1, 1, 3, '', 0),
(3941, 1620, 1, 1, 3, '', 0),
(3942, 1621, 1, 1, 3, '', 0),
(3943, 1622, 1, 1, 3, '', 0),
(3944, 1623, 1, 1, 3, '', 0),
(3945, 1624, 1, 1, 3, '', 0),
(3946, 1625, 1, 1, 3, '', 0),
(3947, 1626, 1, 1, 3, '', 0),
(3948, 1627, 1, 1, 3, '', 0),
(3949, 1628, 1, 1, 3, '', 0),
(3950, 1629, 1, 1, 3, '', 0),
(3951, 1630, 1, 1, 3, '', 0),
(3952, 1631, 1, 1, 3, '', 0),
(3953, 1632, 1, 1, 3, '', 0),
(3954, 1633, 1, 1, 3, '', 0),
(3955, 1634, 1, 1, 3, '', 0),
(3956, 1635, 1, 1, 3, '', 0),
(3957, 1636, 1, 1, 3, '', 0),
(3958, 1637, 1, 1, 3, '', 0),
(3959, 1638, 1, 1, 3, '', 0),
(3960, 1639, 1, 1, 3, '', 0),
(3961, 1640, 1, 1, 3, '', 0),
(3962, 1641, 1, 1, 3, '', 0),
(3963, 1642, 1, 1, 3, '', 0),
(3964, 1643, 1, 1, 3, '', 0),
(3965, 1644, 1, 1, 3, '', 0),
(3966, 1645, 1, 1, 3, '', 0),
(3967, 1646, 1, 1, 3, '', 0),
(3968, 1647, 1, 1, 3, '', 0),
(3969, 1648, 1, 1, 3, '', 0),
(3970, 1649, 1, 1, 3, '', 0),
(3971, 1650, 1, 1, 3, '', 0),
(3972, 1651, 1, 1, 3, '', 0),
(3973, 1652, 1, 1, 3, '', 0),
(3974, 1653, 1, 1, 3, '', 0),
(3975, 1654, 1, 1, 3, '', 0),
(3976, 1655, 1, 1, 3, '', 0),
(3977, 1656, 1, 1, 3, '', 0),
(3978, 1657, 1, 1, 3, '', 0),
(3979, 1658, 1, 1, 3, '', 0),
(3980, 1659, 1, 1, 3, '', 0),
(3981, 1660, 1, 1, 3, '', 0),
(3982, 1661, 1, 1, 3, '', 0),
(3983, 1662, 1, 1, 3, '', 0),
(3984, 1663, 1, 1, 3, '', 0),
(3985, 1664, 1, 1, 3, '', 0),
(3986, 1665, 1, 1, 3, '', 0),
(3987, 1666, 1, 1, 3, '', 0),
(3988, 1667, 1, 1, 3, '', 0),
(3989, 1668, 1, 1, 3, '', 0),
(3990, 1669, 1, 1, 3, '', 0),
(3991, 1670, 1, 1, 3, '', 0),
(3992, 1671, 1, 1, 3, '', 0),
(3993, 1672, 1, 1, 3, '', 0),
(3994, 1673, 1, 1, 3, '', 0),
(3995, 1674, 1, 1, 3, '', 0),
(3996, 1675, 1, 1, 3, '', 0),
(3997, 1676, 1, 1, 3, '', 0),
(3998, 1677, 1, 1, 3, '', 0),
(3999, 1678, 1, 1, 3, '', 0),
(4000, 1679, 1, 1, 3, '', 0),
(4001, 1680, 1, 1, 3, '', 0),
(4002, 1681, 1, 1, 3, '', 0),
(4003, 1682, 1, 1, 3, '', 0),
(4004, 1683, 1, 1, 3, '', 0),
(4005, 1515, 3, 1, 3, '', 0),
(4006, 1516, 3, 1, 3, '', 0),
(4007, 1517, 3, 1, 3, '', 0),
(4008, 1518, 3, 1, 3, '', 0),
(4009, 1519, 3, 1, 3, '', 0),
(4010, 1520, 3, 1, 3, '', 0),
(4011, 1521, 3, 1, 3, '', 0),
(4012, 1522, 3, 1, 3, '', 0),
(4013, 1523, 3, 1, 3, '', 0),
(4014, 1524, 3, 1, 3, '', 0),
(4015, 1525, 3, 1, 3, '', 0),
(4016, 1526, 3, 1, 3, '', 0),
(4017, 1527, 3, 1, 3, '', 0),
(4018, 1528, 3, 1, 3, '', 0),
(4019, 1529, 3, 1, 3, '', 0),
(4020, 1530, 3, 1, 3, '', 0),
(4021, 1531, 3, 1, 3, '', 0),
(4022, 1532, 3, 1, 3, '', 0),
(4023, 1533, 3, 1, 3, '', 0),
(4024, 1534, 3, 1, 3, '', 0),
(4025, 1535, 3, 1, 3, '', 0),
(4026, 1536, 3, 1, 3, '', 0),
(4027, 1537, 3, 1, 3, '', 0),
(4028, 1538, 3, 1, 3, '', 0),
(4029, 1539, 3, 1, 3, '', 0),
(4030, 1540, 3, 1, 3, '', 0),
(4031, 1541, 3, 1, 3, '', 0),
(4032, 1542, 3, 1, 3, '', 0),
(4033, 1543, 3, 1, 3, '', 0),
(4034, 1544, 3, 1, 3, '', 0),
(4035, 1545, 3, 1, 3, '', 0),
(4036, 1546, 3, 1, 3, '', 0),
(4037, 1547, 3, 1, 3, '', 0),
(4038, 1548, 3, 1, 3, '', 0),
(4039, 1549, 3, 1, 3, '', 0),
(4040, 1550, 3, 1, 3, '', 0),
(4041, 1551, 3, 1, 3, '', 0),
(4042, 1552, 3, 1, 3, '', 0),
(4043, 1553, 3, 1, 3, '', 0),
(4044, 1554, 3, 1, 3, '', 0),
(4045, 1555, 3, 1, 3, '', 0),
(4046, 1556, 3, 1, 3, '', 0),
(4047, 1557, 3, 1, 3, '', 0),
(4048, 1558, 3, 1, 3, '', 0),
(4049, 1559, 3, 1, 3, '', 0),
(4050, 1560, 3, 1, 3, '', 0),
(4051, 1561, 3, 1, 3, '', 0),
(4052, 1562, 3, 1, 3, '', 0),
(4053, 1563, 3, 1, 3, '', 0),
(4054, 1564, 3, 1, 3, '', 0),
(4055, 1565, 3, 1, 3, '', 0),
(4056, 1566, 3, 1, 3, '', 0),
(4057, 1567, 3, 1, 3, '', 0),
(4058, 1568, 3, 1, 3, '', 0),
(4059, 1569, 3, 1, 3, '', 0),
(4060, 1570, 3, 1, 3, '', 0),
(4061, 1571, 3, 1, 3, '', 0),
(4062, 1572, 3, 1, 3, '', 0),
(4063, 1573, 3, 1, 3, '', 0),
(4064, 1574, 3, 1, 3, '', 0),
(4065, 1575, 3, 1, 3, '', 0),
(4066, 1576, 3, 1, 3, '', 0),
(4067, 1577, 3, 1, 3, '', 0),
(4068, 1578, 3, 1, 3, '', 0),
(4069, 1579, 3, 1, 3, '', 0),
(4070, 1580, 3, 1, 3, '', 0),
(4071, 1581, 3, 1, 3, '', 0),
(4072, 1582, 3, 1, 3, '', 0),
(4073, 1583, 3, 1, 3, '', 0),
(4074, 1584, 3, 1, 3, '', 0),
(4075, 1585, 3, 1, 3, '', 0),
(4076, 1586, 3, 1, 3, '', 0),
(4077, 1587, 3, 1, 3, '', 0),
(4078, 1588, 3, 1, 3, '', 0),
(4079, 1589, 3, 1, 3, '', 0),
(4080, 1590, 3, 1, 3, '', 0),
(4081, 1591, 3, 1, 3, '', 0),
(4082, 1592, 3, 1, 3, '', 0),
(4083, 1593, 3, 1, 3, '', 0),
(4084, 1594, 3, 1, 3, '', 0),
(4085, 1595, 3, 1, 3, '', 0),
(4086, 1596, 3, 1, 3, '', 0),
(4087, 1597, 3, 1, 3, '', 0),
(4088, 1598, 3, 1, 3, '', 0),
(4089, 1599, 3, 1, 3, '', 0),
(4090, 1600, 3, 1, 3, '', 0),
(4091, 1601, 3, 1, 3, '', 0),
(4092, 1602, 3, 1, 3, '', 0),
(4093, 1603, 3, 1, 3, '', 0),
(4094, 1604, 3, 1, 3, '', 0),
(4095, 1605, 3, 1, 3, '', 0),
(4096, 1606, 3, 1, 3, '', 0),
(4097, 1607, 3, 1, 3, '', 0),
(4098, 1608, 3, 1, 3, '', 0),
(4099, 1609, 3, 1, 3, '', 0),
(4100, 1610, 3, 1, 3, '', 0),
(4101, 1611, 3, 1, 3, '', 0),
(4102, 1612, 3, 1, 3, '', 0),
(4103, 1613, 3, 1, 3, '', 0),
(4104, 1614, 3, 1, 3, '', 0),
(4105, 1615, 3, 1, 3, '', 0),
(4106, 1616, 3, 1, 3, '', 0),
(4107, 1617, 3, 1, 3, '', 0),
(4108, 1618, 3, 1, 3, '', 0),
(4109, 1619, 3, 1, 3, '', 0),
(4110, 1620, 3, 1, 3, '', 0),
(4111, 1621, 3, 1, 3, '', 0),
(4112, 1622, 3, 1, 3, '', 0),
(4113, 1623, 3, 1, 3, '', 0),
(4114, 1624, 3, 1, 3, '', 0),
(4115, 1625, 3, 1, 3, '', 0),
(4116, 1626, 3, 1, 3, '', 0),
(4117, 1627, 3, 1, 3, '', 0),
(4118, 1628, 3, 1, 3, '', 0),
(4119, 1629, 3, 1, 3, '', 0),
(4120, 1630, 3, 1, 3, '', 0),
(4121, 1631, 3, 1, 3, '', 0),
(4122, 1632, 3, 1, 3, '', 0),
(4123, 1633, 3, 1, 3, '', 0),
(4124, 1634, 3, 1, 3, '', 0),
(4125, 1635, 3, 1, 3, '', 0),
(4126, 1636, 3, 1, 3, '', 0),
(4127, 1637, 3, 1, 3, '', 0),
(4128, 1638, 3, 1, 3, '', 0),
(4129, 1639, 3, 1, 3, '', 0),
(4130, 1640, 3, 1, 3, '', 0),
(4131, 1641, 3, 1, 3, '', 0),
(4132, 1642, 3, 1, 3, '', 0),
(4133, 1643, 3, 1, 3, '', 0),
(4134, 1644, 3, 1, 3, '', 0),
(4135, 1645, 3, 1, 3, '', 0),
(4136, 1646, 3, 1, 3, '', 0),
(4137, 1647, 3, 1, 3, '', 0),
(4138, 1648, 3, 1, 3, '', 0),
(4139, 1649, 3, 1, 3, '', 0),
(4140, 1650, 3, 1, 3, '', 0),
(4141, 1651, 3, 1, 3, '', 0),
(4142, 1652, 3, 1, 3, '', 0),
(4143, 1653, 3, 1, 3, '', 0),
(4144, 1654, 3, 1, 3, '', 0),
(4145, 1655, 3, 1, 3, '', 0),
(4146, 1656, 3, 1, 3, '', 0),
(4147, 1657, 3, 1, 3, '', 0),
(4148, 1658, 3, 1, 3, '', 0),
(4149, 1659, 3, 1, 3, '', 0),
(4150, 1660, 3, 1, 3, '', 0),
(4151, 1661, 3, 1, 3, '', 0),
(4152, 1662, 3, 1, 3, '', 0),
(4153, 1663, 3, 1, 3, '', 0),
(4154, 1664, 3, 1, 3, '', 0),
(4155, 1665, 3, 1, 3, '', 0),
(4156, 1666, 3, 1, 3, '', 0),
(4157, 1667, 3, 1, 3, '', 0),
(4158, 1668, 3, 1, 3, '', 0),
(4159, 1669, 3, 1, 3, '', 0),
(4160, 1670, 3, 1, 3, '', 0),
(4161, 1671, 3, 1, 3, '', 0),
(4162, 1672, 3, 1, 3, '', 0),
(4163, 1673, 3, 1, 3, '', 0),
(4164, 1674, 3, 1, 3, '', 0),
(4165, 1675, 3, 1, 3, '', 0),
(4166, 1676, 3, 1, 3, '', 0),
(4167, 1677, 3, 1, 3, '', 0),
(4168, 1678, 3, 1, 3, '', 0),
(4169, 1679, 3, 1, 3, '', 0),
(4170, 1680, 3, 1, 3, '', 0),
(4171, 1681, 3, 1, 3, '', 0),
(4172, 1682, 3, 1, 3, '', 0),
(4173, 1683, 3, 1, 3, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `papers_selection`
--

CREATE TABLE `papers_selection` (
  `id_paper_sel` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_paper` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `papers_selection`
--

INSERT INTO `papers_selection` (`id_paper_sel`, `id_member`, `id_paper`, `id_status`, `note`) VALUES
(3636, 1, 1415, 5, ''),
(3637, 1, 1416, 1, ''),
(3638, 1, 1417, 1, ''),
(3639, 1, 1418, 1, ''),
(3640, 1, 1419, 1, ''),
(3641, 1, 1420, 3, ''),
(3642, 1, 1421, 3, ''),
(3643, 1, 1422, 3, ''),
(3644, 1, 1423, 3, ''),
(3645, 1, 1424, 3, ''),
(3646, 1, 1425, 3, ''),
(3647, 1, 1426, 3, ''),
(3648, 1, 1427, 3, ''),
(3649, 1, 1428, 3, ''),
(3650, 1, 1429, 3, ''),
(3651, 1, 1430, 3, ''),
(3652, 1, 1431, 3, ''),
(3653, 1, 1432, 3, ''),
(3654, 1, 1433, 3, ''),
(3655, 1, 1434, 3, ''),
(3656, 1, 1435, 3, ''),
(3657, 1, 1436, 3, ''),
(3658, 1, 1437, 3, ''),
(3659, 1, 1438, 3, ''),
(3660, 1, 1439, 3, ''),
(3661, 1, 1440, 3, ''),
(3662, 1, 1441, 3, ''),
(3663, 1, 1442, 3, ''),
(3664, 1, 1443, 3, ''),
(3665, 1, 1444, 3, ''),
(3666, 1, 1445, 3, ''),
(3667, 1, 1446, 3, ''),
(3668, 1, 1447, 3, ''),
(3669, 1, 1448, 3, ''),
(3670, 1, 1449, 3, ''),
(3671, 1, 1450, 3, ''),
(3672, 1, 1451, 3, ''),
(3673, 1, 1452, 3, ''),
(3674, 1, 1453, 3, ''),
(3675, 1, 1454, 3, ''),
(3676, 1, 1455, 3, ''),
(3677, 1, 1456, 3, ''),
(3678, 1, 1457, 3, ''),
(3679, 1, 1458, 3, ''),
(3680, 1, 1459, 3, ''),
(3681, 1, 1460, 3, ''),
(3682, 1, 1461, 3, ''),
(3683, 1, 1462, 3, ''),
(3684, 1, 1463, 3, ''),
(3685, 1, 1464, 3, ''),
(3686, 1, 1465, 3, ''),
(3687, 1, 1466, 3, ''),
(3688, 1, 1467, 3, ''),
(3689, 1, 1468, 3, ''),
(3690, 1, 1469, 3, ''),
(3691, 1, 1470, 3, ''),
(3692, 1, 1471, 3, ''),
(3693, 1, 1472, 3, ''),
(3694, 1, 1473, 3, ''),
(3695, 1, 1474, 3, ''),
(3696, 1, 1475, 3, ''),
(3697, 1, 1476, 3, ''),
(3698, 1, 1477, 3, ''),
(3699, 1, 1478, 3, ''),
(3700, 1, 1479, 3, ''),
(3701, 1, 1480, 3, ''),
(3702, 1, 1481, 3, ''),
(3703, 1, 1482, 3, ''),
(3704, 1, 1483, 3, ''),
(3705, 1, 1484, 3, ''),
(3706, 1, 1485, 3, ''),
(3707, 1, 1486, 3, ''),
(3708, 1, 1487, 3, ''),
(3709, 1, 1488, 3, ''),
(3710, 1, 1489, 3, ''),
(3711, 1, 1490, 3, ''),
(3712, 1, 1491, 3, ''),
(3713, 1, 1492, 3, ''),
(3714, 1, 1493, 3, ''),
(3715, 1, 1494, 3, ''),
(3716, 1, 1495, 3, ''),
(3717, 1, 1496, 3, ''),
(3718, 1, 1497, 3, ''),
(3719, 1, 1498, 3, ''),
(3720, 1, 1499, 3, ''),
(3721, 1, 1500, 3, ''),
(3722, 1, 1501, 3, ''),
(3723, 1, 1502, 3, ''),
(3724, 1, 1503, 3, ''),
(3725, 1, 1504, 3, ''),
(3726, 1, 1505, 3, ''),
(3727, 1, 1506, 3, ''),
(3728, 1, 1507, 3, ''),
(3729, 1, 1508, 3, ''),
(3730, 1, 1509, 3, ''),
(3731, 1, 1510, 3, ''),
(3732, 1, 1511, 3, ''),
(3733, 1, 1512, 3, ''),
(3734, 1, 1513, 3, ''),
(3735, 1, 1514, 3, ''),
(3736, 3, 1415, 2, ''),
(3737, 3, 1416, 1, ''),
(3738, 3, 1417, 1, ''),
(3739, 3, 1418, 1, ''),
(3740, 3, 1419, 1, ''),
(3741, 3, 1420, 3, ''),
(3742, 3, 1421, 3, ''),
(3743, 3, 1422, 3, ''),
(3744, 3, 1423, 3, ''),
(3745, 3, 1424, 3, ''),
(3746, 3, 1425, 3, ''),
(3747, 3, 1426, 3, ''),
(3748, 3, 1427, 3, ''),
(3749, 3, 1428, 3, ''),
(3750, 3, 1429, 3, ''),
(3751, 3, 1430, 3, ''),
(3752, 3, 1431, 3, ''),
(3753, 3, 1432, 3, ''),
(3754, 3, 1433, 3, ''),
(3755, 3, 1434, 3, ''),
(3756, 3, 1435, 3, ''),
(3757, 3, 1436, 3, ''),
(3758, 3, 1437, 3, ''),
(3759, 3, 1438, 3, ''),
(3760, 3, 1439, 3, ''),
(3761, 3, 1440, 3, ''),
(3762, 3, 1441, 3, ''),
(3763, 3, 1442, 3, ''),
(3764, 3, 1443, 3, ''),
(3765, 3, 1444, 3, ''),
(3766, 3, 1445, 3, ''),
(3767, 3, 1446, 3, ''),
(3768, 3, 1447, 3, ''),
(3769, 3, 1448, 3, ''),
(3770, 3, 1449, 3, ''),
(3771, 3, 1450, 3, ''),
(3772, 3, 1451, 3, ''),
(3773, 3, 1452, 3, ''),
(3774, 3, 1453, 3, ''),
(3775, 3, 1454, 3, ''),
(3776, 3, 1455, 3, ''),
(3777, 3, 1456, 3, ''),
(3778, 3, 1457, 3, ''),
(3779, 3, 1458, 3, ''),
(3780, 3, 1459, 3, ''),
(3781, 3, 1460, 3, ''),
(3782, 3, 1461, 3, ''),
(3783, 3, 1462, 3, ''),
(3784, 3, 1463, 3, ''),
(3785, 3, 1464, 3, ''),
(3786, 3, 1465, 3, ''),
(3787, 3, 1466, 3, ''),
(3788, 3, 1467, 3, ''),
(3789, 3, 1468, 3, ''),
(3790, 3, 1469, 3, ''),
(3791, 3, 1470, 3, ''),
(3792, 3, 1471, 3, ''),
(3793, 3, 1472, 3, ''),
(3794, 3, 1473, 3, ''),
(3795, 3, 1474, 3, ''),
(3796, 3, 1475, 3, ''),
(3797, 3, 1476, 3, ''),
(3798, 3, 1477, 3, ''),
(3799, 3, 1478, 3, ''),
(3800, 3, 1479, 3, ''),
(3801, 3, 1480, 3, ''),
(3802, 3, 1481, 3, ''),
(3803, 3, 1482, 3, ''),
(3804, 3, 1483, 3, ''),
(3805, 3, 1484, 3, ''),
(3806, 3, 1485, 3, ''),
(3807, 3, 1486, 3, ''),
(3808, 3, 1487, 3, ''),
(3809, 3, 1488, 3, ''),
(3810, 3, 1489, 3, ''),
(3811, 3, 1490, 3, ''),
(3812, 3, 1491, 3, ''),
(3813, 3, 1492, 3, ''),
(3814, 3, 1493, 3, ''),
(3815, 3, 1494, 3, ''),
(3816, 3, 1495, 3, ''),
(3817, 3, 1496, 3, ''),
(3818, 3, 1497, 3, ''),
(3819, 3, 1498, 3, ''),
(3820, 3, 1499, 3, ''),
(3821, 3, 1500, 3, ''),
(3822, 3, 1501, 3, ''),
(3823, 3, 1502, 3, ''),
(3824, 3, 1503, 3, ''),
(3825, 3, 1504, 3, ''),
(3826, 3, 1505, 3, ''),
(3827, 3, 1506, 3, ''),
(3828, 3, 1507, 3, ''),
(3829, 3, 1508, 3, ''),
(3830, 3, 1509, 3, ''),
(3831, 3, 1510, 3, ''),
(3832, 3, 1511, 3, ''),
(3833, 3, 1512, 3, ''),
(3834, 3, 1513, 3, ''),
(3835, 3, 1514, 3, ''),
(3836, 1, 1515, 3, ''),
(3837, 1, 1516, 3, ''),
(3838, 1, 1517, 3, ''),
(3839, 1, 1518, 3, ''),
(3840, 1, 1519, 3, ''),
(3841, 1, 1520, 3, ''),
(3842, 1, 1521, 3, ''),
(3843, 1, 1522, 3, ''),
(3844, 1, 1523, 3, ''),
(3845, 1, 1524, 4, ''),
(3846, 1, 1525, 3, ''),
(3847, 1, 1526, 3, ''),
(3848, 1, 1527, 3, ''),
(3849, 1, 1528, 3, ''),
(3850, 1, 1529, 3, ''),
(3851, 1, 1530, 3, ''),
(3852, 1, 1531, 3, ''),
(3853, 1, 1532, 3, ''),
(3854, 1, 1533, 3, ''),
(3855, 1, 1534, 3, ''),
(3856, 1, 1535, 3, ''),
(3857, 1, 1536, 3, ''),
(3858, 1, 1537, 4, ''),
(3859, 1, 1538, 3, ''),
(3860, 1, 1539, 3, ''),
(3861, 1, 1540, 3, ''),
(3862, 1, 1541, 3, ''),
(3863, 1, 1542, 3, ''),
(3864, 1, 1543, 4, ''),
(3865, 1, 1544, 3, ''),
(3866, 1, 1545, 4, ''),
(3867, 1, 1546, 3, ''),
(3868, 1, 1547, 3, ''),
(3869, 1, 1548, 4, ''),
(3870, 1, 1549, 3, ''),
(3871, 1, 1550, 4, ''),
(3872, 1, 1551, 3, ''),
(3873, 1, 1552, 3, ''),
(3874, 1, 1553, 3, ''),
(3875, 1, 1554, 3, ''),
(3876, 1, 1555, 3, ''),
(3877, 1, 1556, 3, ''),
(3878, 1, 1557, 3, ''),
(3879, 1, 1558, 3, ''),
(3880, 1, 1559, 3, ''),
(3881, 1, 1560, 3, ''),
(3882, 1, 1561, 3, ''),
(3883, 1, 1562, 3, ''),
(3884, 1, 1563, 3, ''),
(3885, 1, 1564, 3, ''),
(3886, 1, 1565, 3, ''),
(3887, 1, 1566, 3, ''),
(3888, 1, 1567, 3, ''),
(3889, 1, 1568, 3, ''),
(3890, 1, 1569, 3, ''),
(3891, 1, 1570, 3, ''),
(3892, 1, 1571, 3, ''),
(3893, 1, 1572, 3, ''),
(3894, 1, 1573, 3, ''),
(3895, 1, 1574, 3, ''),
(3896, 1, 1575, 3, ''),
(3897, 1, 1576, 3, ''),
(3898, 1, 1577, 3, ''),
(3899, 1, 1578, 4, ''),
(3900, 1, 1579, 3, ''),
(3901, 1, 1580, 3, ''),
(3902, 1, 1581, 3, ''),
(3903, 1, 1582, 3, ''),
(3904, 1, 1583, 3, ''),
(3905, 1, 1584, 3, ''),
(3906, 1, 1585, 3, ''),
(3907, 1, 1586, 3, ''),
(3908, 1, 1587, 3, ''),
(3909, 1, 1588, 3, ''),
(3910, 1, 1589, 3, ''),
(3911, 1, 1590, 3, ''),
(3912, 1, 1591, 3, ''),
(3913, 1, 1592, 3, ''),
(3914, 1, 1593, 3, ''),
(3915, 1, 1594, 3, ''),
(3916, 1, 1595, 3, ''),
(3917, 1, 1596, 3, ''),
(3918, 1, 1597, 3, ''),
(3919, 1, 1598, 3, ''),
(3920, 1, 1599, 3, ''),
(3921, 1, 1600, 3, ''),
(3922, 1, 1601, 3, ''),
(3923, 1, 1602, 3, ''),
(3924, 1, 1603, 3, ''),
(3925, 1, 1604, 3, ''),
(3926, 1, 1605, 3, ''),
(3927, 1, 1606, 3, ''),
(3928, 1, 1607, 3, ''),
(3929, 1, 1608, 3, ''),
(3930, 1, 1609, 3, ''),
(3931, 1, 1610, 3, ''),
(3932, 1, 1611, 3, ''),
(3933, 1, 1612, 3, ''),
(3934, 1, 1613, 3, ''),
(3935, 1, 1614, 3, ''),
(3936, 1, 1615, 3, ''),
(3937, 1, 1616, 3, ''),
(3938, 1, 1617, 3, ''),
(3939, 1, 1618, 3, ''),
(3940, 1, 1619, 3, ''),
(3941, 1, 1620, 3, ''),
(3942, 1, 1621, 3, ''),
(3943, 1, 1622, 3, ''),
(3944, 1, 1623, 3, ''),
(3945, 1, 1624, 3, ''),
(3946, 1, 1625, 3, ''),
(3947, 1, 1626, 3, ''),
(3948, 1, 1627, 3, ''),
(3949, 1, 1628, 3, ''),
(3950, 1, 1629, 3, ''),
(3951, 1, 1630, 3, ''),
(3952, 1, 1631, 3, ''),
(3953, 1, 1632, 3, ''),
(3954, 1, 1633, 4, ''),
(3955, 1, 1634, 3, ''),
(3956, 1, 1635, 3, ''),
(3957, 1, 1636, 3, ''),
(3958, 1, 1637, 4, ''),
(3959, 1, 1638, 3, ''),
(3960, 1, 1639, 3, ''),
(3961, 1, 1640, 3, ''),
(3962, 1, 1641, 3, ''),
(3963, 1, 1642, 3, ''),
(3964, 1, 1643, 3, ''),
(3965, 1, 1644, 3, ''),
(3966, 1, 1645, 3, ''),
(3967, 1, 1646, 3, ''),
(3968, 1, 1647, 3, ''),
(3969, 1, 1648, 3, ''),
(3970, 1, 1649, 3, ''),
(3971, 1, 1650, 3, ''),
(3972, 1, 1651, 3, ''),
(3973, 1, 1652, 3, ''),
(3974, 1, 1653, 3, ''),
(3975, 1, 1654, 3, ''),
(3976, 1, 1655, 3, ''),
(3977, 1, 1656, 3, ''),
(3978, 1, 1657, 3, ''),
(3979, 1, 1658, 3, ''),
(3980, 1, 1659, 3, ''),
(3981, 1, 1660, 3, ''),
(3982, 1, 1661, 3, ''),
(3983, 1, 1662, 3, ''),
(3984, 1, 1663, 3, ''),
(3985, 1, 1664, 3, ''),
(3986, 1, 1665, 3, ''),
(3987, 1, 1666, 3, ''),
(3988, 1, 1667, 3, ''),
(3989, 1, 1668, 3, ''),
(3990, 1, 1669, 3, ''),
(3991, 1, 1670, 4, ''),
(3992, 1, 1671, 3, ''),
(3993, 1, 1672, 3, ''),
(3994, 1, 1673, 3, ''),
(3995, 1, 1674, 3, ''),
(3996, 1, 1675, 3, ''),
(3997, 1, 1676, 4, ''),
(3998, 1, 1677, 3, ''),
(3999, 1, 1678, 3, ''),
(4000, 1, 1679, 4, ''),
(4001, 1, 1680, 3, ''),
(4002, 1, 1681, 3, ''),
(4003, 1, 1682, 3, ''),
(4004, 1, 1683, 3, ''),
(4005, 3, 1515, 3, ''),
(4006, 3, 1516, 3, ''),
(4007, 3, 1517, 3, ''),
(4008, 3, 1518, 3, ''),
(4009, 3, 1519, 3, ''),
(4010, 3, 1520, 3, ''),
(4011, 3, 1521, 3, ''),
(4012, 3, 1522, 3, ''),
(4013, 3, 1523, 3, ''),
(4014, 3, 1524, 4, ''),
(4015, 3, 1525, 3, ''),
(4016, 3, 1526, 3, ''),
(4017, 3, 1527, 3, ''),
(4018, 3, 1528, 3, ''),
(4019, 3, 1529, 3, ''),
(4020, 3, 1530, 3, ''),
(4021, 3, 1531, 3, ''),
(4022, 3, 1532, 3, ''),
(4023, 3, 1533, 3, ''),
(4024, 3, 1534, 3, ''),
(4025, 3, 1535, 3, ''),
(4026, 3, 1536, 3, ''),
(4027, 3, 1537, 4, ''),
(4028, 3, 1538, 3, ''),
(4029, 3, 1539, 3, ''),
(4030, 3, 1540, 3, ''),
(4031, 3, 1541, 3, ''),
(4032, 3, 1542, 3, ''),
(4033, 3, 1543, 4, ''),
(4034, 3, 1544, 3, ''),
(4035, 3, 1545, 4, ''),
(4036, 3, 1546, 3, ''),
(4037, 3, 1547, 3, ''),
(4038, 3, 1548, 4, ''),
(4039, 3, 1549, 3, ''),
(4040, 3, 1550, 4, ''),
(4041, 3, 1551, 3, ''),
(4042, 3, 1552, 3, ''),
(4043, 3, 1553, 3, ''),
(4044, 3, 1554, 3, ''),
(4045, 3, 1555, 3, ''),
(4046, 3, 1556, 3, ''),
(4047, 3, 1557, 3, ''),
(4048, 3, 1558, 3, ''),
(4049, 3, 1559, 3, ''),
(4050, 3, 1560, 3, ''),
(4051, 3, 1561, 3, ''),
(4052, 3, 1562, 3, ''),
(4053, 3, 1563, 3, ''),
(4054, 3, 1564, 3, ''),
(4055, 3, 1565, 3, ''),
(4056, 3, 1566, 3, ''),
(4057, 3, 1567, 3, ''),
(4058, 3, 1568, 3, ''),
(4059, 3, 1569, 3, ''),
(4060, 3, 1570, 3, ''),
(4061, 3, 1571, 3, ''),
(4062, 3, 1572, 3, ''),
(4063, 3, 1573, 3, ''),
(4064, 3, 1574, 3, ''),
(4065, 3, 1575, 3, ''),
(4066, 3, 1576, 3, ''),
(4067, 3, 1577, 3, ''),
(4068, 3, 1578, 4, ''),
(4069, 3, 1579, 3, ''),
(4070, 3, 1580, 3, ''),
(4071, 3, 1581, 3, ''),
(4072, 3, 1582, 3, ''),
(4073, 3, 1583, 3, ''),
(4074, 3, 1584, 3, ''),
(4075, 3, 1585, 3, ''),
(4076, 3, 1586, 3, ''),
(4077, 3, 1587, 3, ''),
(4078, 3, 1588, 3, ''),
(4079, 3, 1589, 3, ''),
(4080, 3, 1590, 3, ''),
(4081, 3, 1591, 3, ''),
(4082, 3, 1592, 3, ''),
(4083, 3, 1593, 3, ''),
(4084, 3, 1594, 3, ''),
(4085, 3, 1595, 3, ''),
(4086, 3, 1596, 3, ''),
(4087, 3, 1597, 3, ''),
(4088, 3, 1598, 3, ''),
(4089, 3, 1599, 3, ''),
(4090, 3, 1600, 3, ''),
(4091, 3, 1601, 3, ''),
(4092, 3, 1602, 3, ''),
(4093, 3, 1603, 3, ''),
(4094, 3, 1604, 3, ''),
(4095, 3, 1605, 3, ''),
(4096, 3, 1606, 3, ''),
(4097, 3, 1607, 3, ''),
(4098, 3, 1608, 3, ''),
(4099, 3, 1609, 3, ''),
(4100, 3, 1610, 3, ''),
(4101, 3, 1611, 3, ''),
(4102, 3, 1612, 3, ''),
(4103, 3, 1613, 3, ''),
(4104, 3, 1614, 3, ''),
(4105, 3, 1615, 3, ''),
(4106, 3, 1616, 3, ''),
(4107, 3, 1617, 3, ''),
(4108, 3, 1618, 3, ''),
(4109, 3, 1619, 3, ''),
(4110, 3, 1620, 3, ''),
(4111, 3, 1621, 3, ''),
(4112, 3, 1622, 3, ''),
(4113, 3, 1623, 3, ''),
(4114, 3, 1624, 3, ''),
(4115, 3, 1625, 3, ''),
(4116, 3, 1626, 3, ''),
(4117, 3, 1627, 3, ''),
(4118, 3, 1628, 3, ''),
(4119, 3, 1629, 3, ''),
(4120, 3, 1630, 3, ''),
(4121, 3, 1631, 3, ''),
(4122, 3, 1632, 3, ''),
(4123, 3, 1633, 4, ''),
(4124, 3, 1634, 3, ''),
(4125, 3, 1635, 3, ''),
(4126, 3, 1636, 3, ''),
(4127, 3, 1637, 4, ''),
(4128, 3, 1638, 3, ''),
(4129, 3, 1639, 3, ''),
(4130, 3, 1640, 3, ''),
(4131, 3, 1641, 3, ''),
(4132, 3, 1642, 3, ''),
(4133, 3, 1643, 3, ''),
(4134, 3, 1644, 3, ''),
(4135, 3, 1645, 3, ''),
(4136, 3, 1646, 3, ''),
(4137, 3, 1647, 3, ''),
(4138, 3, 1648, 3, ''),
(4139, 3, 1649, 3, ''),
(4140, 3, 1650, 3, ''),
(4141, 3, 1651, 3, ''),
(4142, 3, 1652, 3, ''),
(4143, 3, 1653, 3, ''),
(4144, 3, 1654, 3, ''),
(4145, 3, 1655, 3, ''),
(4146, 3, 1656, 3, ''),
(4147, 3, 1657, 3, ''),
(4148, 3, 1658, 3, ''),
(4149, 3, 1659, 3, ''),
(4150, 3, 1660, 3, ''),
(4151, 3, 1661, 3, ''),
(4152, 3, 1662, 3, ''),
(4153, 3, 1663, 3, ''),
(4154, 3, 1664, 3, ''),
(4155, 3, 1665, 3, ''),
(4156, 3, 1666, 3, ''),
(4157, 3, 1667, 3, ''),
(4158, 3, 1668, 3, ''),
(4159, 3, 1669, 3, ''),
(4160, 3, 1670, 4, ''),
(4161, 3, 1671, 3, ''),
(4162, 3, 1672, 3, ''),
(4163, 3, 1673, 3, ''),
(4164, 3, 1674, 3, ''),
(4165, 3, 1675, 3, ''),
(4166, 3, 1676, 4, ''),
(4167, 3, 1677, 3, ''),
(4168, 3, 1678, 3, ''),
(4169, 3, 1679, 4, ''),
(4170, 3, 1680, 3, ''),
(4171, 3, 1681, 3, ''),
(4172, 3, 1682, 3, ''),
(4173, 3, 1683, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `objectives` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `c_papers` int(11) NOT NULL DEFAULT '0',
  `planning` float NOT NULL DEFAULT '0',
  `import` float NOT NULL DEFAULT '0',
  `selection` float NOT NULL DEFAULT '0',
  `quality` float NOT NULL DEFAULT '0',
  `extraction` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `title`, `description`, `objectives`, `created_by`, `start_date`, `end_date`, `c_papers`, `planning`, `import`, `selection`, `quality`, `extraction`) VALUES
(1, 'Projeto 01', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 1, '2019-05-09', '2019-12-31', 1683, 100, 100, 6.32, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_databases`
--

CREATE TABLE `project_databases` (
  `id_project_database` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_database` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_databases`
--

INSERT INTO `project_databases` (`id_project_database`, `id_project`, `id_database`) VALUES
(1, 1, 2),
(2, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `project_languages`
--

CREATE TABLE `project_languages` (
  `id_project_lang` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_languages`
--

INSERT INTO `project_languages` (`id_project_lang`, `id_project`, `id_language`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_study_types`
--

CREATE TABLE `project_study_types` (
  `id_project_study_types` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_study_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_study_types`
--

INSERT INTO `project_study_types` (`id_project_study_types`, `id_project`, `id_study_type`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_extraction`
--

CREATE TABLE `question_extraction` (
  `id_de` int(11) NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_extraction`
--

INSERT INTO `question_extraction` (`id_de`, `id`, `description`, `type`, `id_project`) VALUES
(1, 'QE 01', 'In hac habitasse platea dictumst. ', 1, 1),
(2, 'QE 02', 'Fusce auctor placerat purus, quis porta augue luctus at.', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_quality`
--

CREATE TABLE `question_quality` (
  `id_qa` int(11) NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` float NOT NULL,
  `min_to_app` int(11) DEFAULT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_quality`
--

INSERT INTO `question_quality` (`id_qa`, `id`, `description`, `weight`, `min_to_app`, `id_project`) VALUES
(1, 'QQ 01', 'Morbi eget sem nisi. Cras lobortis hendrerit diam in ullamcorper. Morbi ultrices scelerisque arcu at pharetra.', 2.5, 2, 1),
(2, 'QQ 02', 'Sed semper leo vel porttitor maximus. Nunc in augue sed lectus lacinia ultrices.', 2.5, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `research_question`
--

CREATE TABLE `research_question` (
  `id_research_question` int(11) NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `research_question`
--

INSERT INTO `research_question` (`id_research_question`, `id`, `description`, `id_project`) VALUES
(1, 'RQ 01', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_rule`, `description`) VALUES
(1, 'All'),
(2, 'Any'),
(3, 'At Least');

-- --------------------------------------------------------

--
-- Table structure for table `score_quality`
--

CREATE TABLE `score_quality` (
  `id_score` int(11) NOT NULL,
  `score_rule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `id_qa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `score_quality`
--

INSERT INTO `score_quality` (`id_score`, `score_rule`, `description`, `score`, `id_qa`) VALUES
(1, 'Não', 'Donec iaculis at urna quis mattis', 0, 1),
(2, 'Parcial', 'Suspendisse non orci sem', 50, 1),
(3, 'Total', 'Praesent non libero in massa placerat tempus nec eget lacus.', 100, 1),
(4, 'Não', 'Donec iaculis at urna quis mattis', 0, 2),
(5, 'Parcial', 'Suspendisse non orci sem', 50, 2),
(6, 'Total', 'Praesent non libero in massa placerat tempus nec eget lacus.', 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `search_strategy`
--

CREATE TABLE `search_strategy` (
  `id_search_strategy` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `search_strategy`
--

INSERT INTO `search_strategy` (`id_search_strategy`, `description`, `id_project`) VALUES
(1, ' It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `search_string`
--

CREATE TABLE `search_string` (
  `id_search_string` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project_database` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `search_string`
--

INSERT INTO `search_string` (`id_search_string`, `description`, `id_project_database`, `update_at`) VALUES
(1, ' ', 1, '0000-00-00 00:00:00'),
(2, ' ', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `search_string_generics`
--

CREATE TABLE `search_string_generics` (
  `id_search_string_generics` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `search_string_generics`
--

INSERT INTO `search_string_generics` (`id_search_string_generics`, `description`, `id_project`) VALUES
(1, ' ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status_extraction`
--

CREATE TABLE `status_extraction` (
  `id_status` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_qa`
--

CREATE TABLE `status_qa` (
  `id_status` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_qa`
--

INSERT INTO `status_qa` (`id_status`, `status`) VALUES
(1, 'Accepted'),
(2, 'Rejected'),
(3, 'Unclassified'),
(4, 'Removed');

-- --------------------------------------------------------

--
-- Table structure for table `status_selection`
--

CREATE TABLE `status_selection` (
  `id_status` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_selection`
--

INSERT INTO `status_selection` (`id_status`, `description`) VALUES
(1, 'Accepted'),
(2, 'Rejected'),
(3, 'Unclassified'),
(4, 'Duplicate'),
(5, 'Removed');

-- --------------------------------------------------------

--
-- Table structure for table `study_type`
--

CREATE TABLE `study_type` (
  `id_study_type` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `study_type`
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
-- Table structure for table `synonym`
--

CREATE TABLE `synonym` (
  `id_synonym` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_term` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `synonym`
--

INSERT INTO `synonym` (`id_synonym`, `description`, `id_term`) VALUES
(1, 'Sinonimo 01', 1),
(2, 'Sinonimo 02', 1),
(3, 'Sinonimo 01', 2),
(4, 'Sinonimo 02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id_term` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id_term`, `description`, `id_project`) VALUES
(1, 'Termo 01', 1),
(2, 'Termo 02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `types_question`
--

CREATE TABLE `types_question` (
  `id_type` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types_question`
--

INSERT INTO `types_question` (`id_type`, `type`) VALUES
(1, 'Text'),
(2, 'Multiple Choice List'),
(3, 'Pick One List');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `name`, `institution`, `lattes_link`, `created_at`, `updated_at`) VALUES
(1, 'guilhermebolfe11@gmail.com', 'f781ca982eb8b25bbb7fcd2cdc0798ca', 'Guilherme Bolfe', NULL, NULL, '2019-01-28 17:44:40', '2019-01-28 22:53:54'),
(5, 'lucianomarchezan94@gmail.com', '466ff99d211a652f741fcca9d3d851f3', 'Luciano Marchezan ', NULL, NULL, '2019-04-01 13:39:09', NULL),
(11, 'bolfeguilherme@gmail.com', 'f781ca982eb8b25bbb7fcd2cdc0798ca', 'Gustavo Bolfe', NULL, NULL, '2019-04-04 21:47:33', NULL),
(12, 'eldermr@gmail.com', '0707d0577a799ea448c2f0e1604e1525', 'Elder', NULL, NULL, '2019-04-09 17:28:54', NULL),
(13, 'netoiiung@gmail.com', '5e75a1a330f96f4a8757ec4d8123ff6c', 'Aníbal Neto', NULL, NULL, '2019-04-10 21:32:03', NULL);

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
  ADD KEY `id_user` (`id_member`);

--
-- Indexes for table `evaluation_qa`
--
ALTER TABLE `evaluation_qa`
  ADD PRIMARY KEY (`id_ev_qa`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_qa` (`id_qa`),
  ADD KEY `id_score_qa` (`id_score_qa`),
  ADD KEY `id_paper` (`id_paper`);

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
  ADD KEY `status_selection` (`status_selection`),
  ADD KEY `status_qa` (`status_qa`),
  ADD KEY `id_gen_score` (`id_gen_score`);

--
-- Indexes for table `papers_qa`
--
ALTER TABLE `papers_qa`
  ADD PRIMARY KEY (`id_paper_qa`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_paper` (`id_paper`),
  ADD KEY `id_gen_score` (`id_gen_score`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `papers_selection`
--
ALTER TABLE `papers_selection`
  ADD PRIMARY KEY (`id_paper_sel`),
  ADD KEY `id_user` (`id_member`),
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
-- Indexes for table `status_qa`
--
ALTER TABLE `status_qa`
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
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT for table `bib_upload`
--
ALTER TABLE `bib_upload`
  MODIFY `id_bib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id_criteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_base`
--
ALTER TABLE `data_base`
  MODIFY `id_database` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `id_domain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  MODIFY `id_evaluation_criteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `evaluation_qa`
--
ALTER TABLE `evaluation_qa`
  MODIFY `id_ev_qa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  MODIFY `id_exclusion_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_score`
--
ALTER TABLE `general_score`
  MODIFY `id_general_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inclusion_rule`
--
ALTER TABLE `inclusion_rule`
  MODIFY `id_inclusion_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `id_keyword` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_members` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `min_to_app`
--
ALTER TABLE `min_to_app`
  MODIFY `id_min_to_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `options_extraction`
--
ALTER TABLE `options_extraction`
  MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id_paper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1684;

--
-- AUTO_INCREMENT for table `papers_qa`
--
ALTER TABLE `papers_qa`
  MODIFY `id_paper_qa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4174;

--
-- AUTO_INCREMENT for table `papers_selection`
--
ALTER TABLE `papers_selection`
  MODIFY `id_paper_sel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4174;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_databases`
--
ALTER TABLE `project_databases`
  MODIFY `id_project_database` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_languages`
--
ALTER TABLE `project_languages`
  MODIFY `id_project_lang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_study_types`
--
ALTER TABLE `project_study_types`
  MODIFY `id_project_study_types` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_extraction`
--
ALTER TABLE `question_extraction`
  MODIFY `id_de` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_quality`
--
ALTER TABLE `question_quality`
  MODIFY `id_qa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `research_question`
--
ALTER TABLE `research_question`
  MODIFY `id_research_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `score_quality`
--
ALTER TABLE `score_quality`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `search_strategy`
--
ALTER TABLE `search_strategy`
  MODIFY `id_search_strategy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `search_string`
--
ALTER TABLE `search_string`
  MODIFY `id_search_string` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `search_string_generics`
--
ALTER TABLE `search_string_generics`
  MODIFY `id_search_string_generics` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status_extraction`
--
ALTER TABLE `status_extraction`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_qa`
--
ALTER TABLE `status_qa`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_synonym` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id_term` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `types_question`
--
ALTER TABLE `types_question`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_log_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_log_ibfk_3` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bib_upload`
--
ALTER TABLE `bib_upload`
  ADD CONSTRAINT `bib_upload_ibfk_1` FOREIGN KEY (`id_project_database`) REFERENCES `project_databases` (`id_project_database`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `criteria`
--
ALTER TABLE `criteria`
  ADD CONSTRAINT `criteria_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `domain`
--
ALTER TABLE `domain`
  ADD CONSTRAINT `domain_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  ADD CONSTRAINT `evaluation_criteria_ibfk_1` FOREIGN KEY (`id_criteria`) REFERENCES `criteria` (`id_criteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_criteria_ibfk_2` FOREIGN KEY (`id_paper`) REFERENCES `papers` (`id_paper`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_criteria_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_members`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluation_qa`
--
ALTER TABLE `evaluation_qa`
  ADD CONSTRAINT `evaluation_qa_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_members`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_qa_ibfk_2` FOREIGN KEY (`id_qa`) REFERENCES `question_quality` (`id_qa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_qa_ibfk_3` FOREIGN KEY (`id_score_qa`) REFERENCES `score_quality` (`id_score`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_qa_ibfk_4` FOREIGN KEY (`id_paper`) REFERENCES `papers` (`id_paper`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exclusion_rule`
--
ALTER TABLE `exclusion_rule`
  ADD CONSTRAINT `exclusion_rule_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exclusion_rule_ibfk_2` FOREIGN KEY (`id_rule`) REFERENCES `rule` (`id_rule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general_score`
--
ALTER TABLE `general_score`
  ADD CONSTRAINT `general_score_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inclusion_rule`
--
ALTER TABLE `inclusion_rule`
  ADD CONSTRAINT `inclusion_rule_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inclusion_rule_ibfk_2` FOREIGN KEY (`id_rule`) REFERENCES `rule` (`id_rule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keyword`
--
ALTER TABLE `keyword`
  ADD CONSTRAINT `keyword_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`level`) REFERENCES `levels` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `min_to_app`
--
ALTER TABLE `min_to_app`
  ADD CONSTRAINT `min_to_app_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `min_to_app_ibfk_2` FOREIGN KEY (`id_general_score`) REFERENCES `general_score` (`id_general_score`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `options_extraction`
--
ALTER TABLE `options_extraction`
  ADD CONSTRAINT `options_extraction_ibfk_1` FOREIGN KEY (`id_de`) REFERENCES `question_extraction` (`id_de`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_ibfk_1` FOREIGN KEY (`id_bib`) REFERENCES `bib_upload` (`id_bib`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_ibfk_3` FOREIGN KEY (`data_base`) REFERENCES `data_base` (`id_database`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_ibfk_4` FOREIGN KEY (`status_selection`) REFERENCES `status_selection` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_ibfk_5` FOREIGN KEY (`status_qa`) REFERENCES `status_qa` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_ibfk_6` FOREIGN KEY (`status_qa`) REFERENCES `status_qa` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_ibfk_7` FOREIGN KEY (`id_gen_score`) REFERENCES `general_score` (`id_general_score`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `papers_qa`
--
ALTER TABLE `papers_qa`
  ADD CONSTRAINT `papers_qa_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_members`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_qa_ibfk_2` FOREIGN KEY (`id_paper`) REFERENCES `papers` (`id_paper`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_qa_ibfk_3` FOREIGN KEY (`id_gen_score`) REFERENCES `general_score` (`id_general_score`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_qa_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status_qa` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `papers_selection`
--
ALTER TABLE `papers_selection`
  ADD CONSTRAINT `papers_selection_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_members`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_selection_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status_selection` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `papers_selection_ibfk_3` FOREIGN KEY (`id_paper`) REFERENCES `papers` (`id_paper`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_databases`
--
ALTER TABLE `project_databases`
  ADD CONSTRAINT `project_databases_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_databases_ibfk_2` FOREIGN KEY (`id_database`) REFERENCES `data_base` (`id_database`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_languages`
--
ALTER TABLE `project_languages`
  ADD CONSTRAINT `project_languages_ibfk_1` FOREIGN KEY (`id_language`) REFERENCES `language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_languages_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_study_types`
--
ALTER TABLE `project_study_types`
  ADD CONSTRAINT `project_study_types_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_study_types_ibfk_2` FOREIGN KEY (`id_study_type`) REFERENCES `study_type` (`id_study_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_extraction`
--
ALTER TABLE `question_extraction`
  ADD CONSTRAINT `question_extraction_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_extraction_ibfk_2` FOREIGN KEY (`type`) REFERENCES `types_question` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_quality`
--
ALTER TABLE `question_quality`
  ADD CONSTRAINT `question_quality_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_quality_ibfk_2` FOREIGN KEY (`min_to_app`) REFERENCES `score_quality` (`id_score`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `research_question`
--
ALTER TABLE `research_question`
  ADD CONSTRAINT `research_question_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `score_quality`
--
ALTER TABLE `score_quality`
  ADD CONSTRAINT `score_quality_ibfk_1` FOREIGN KEY (`id_qa`) REFERENCES `question_quality` (`id_qa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `search_strategy`
--
ALTER TABLE `search_strategy`
  ADD CONSTRAINT `search_strategy_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `search_string`
--
ALTER TABLE `search_string`
  ADD CONSTRAINT `search_string_ibfk_1` FOREIGN KEY (`id_project_database`) REFERENCES `project_databases` (`id_project_database`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `search_string_generics`
--
ALTER TABLE `search_string_generics`
  ADD CONSTRAINT `search_string_generics_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `synonym`
--
ALTER TABLE `synonym`
  ADD CONSTRAINT `synonym_ibfk_1` FOREIGN KEY (`id_term`) REFERENCES `term` (`id_term`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `term_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
