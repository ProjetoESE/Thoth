-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2019 at 05:04 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.2.13

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
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
