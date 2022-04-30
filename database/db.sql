-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 12:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Pegawai','Operator','Administrator','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id`, `username`, `email`, `nama_lengkap`, `password`, `level`) VALUES
(1, 'admin', 'admin@mail.com', 'Venica Yulia', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'operator', 'operator@mail.com', 'Nur Dheanty', '4b583376b2767b923c3e1da60d10de59', 'Operator'),
(3, 'pegawai', 'pegawai@mail.com', 'Laila Taviv', '047aeeb234644b9e2d4138ed3bc7976a', 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `username`, `userIp`, `loginTime`) VALUES
(22, 0, 'Venica Yulia', 0x3a3a31, '2022-04-30 10:39:49'),
(23, 0, 'Laila Taviv', 0x3a3a31, '2022-04-30 10:44:10'),
(24, 0, 'Nur Dheanty', 0x3a3a31, '2022-04-30 10:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_token`
--

CREATE TABLE `usuarios_token` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `hash` varchar(32) DEFAULT NULL,
  `used` tinyint(1) DEFAULT 0,
  `expirado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios_token`
--

INSERT INTO `usuarios_token` (`id`, `id_usuario`, `hash`, `used`, `expirado_em`) VALUES
(13, 1, '8e0687bf87af132bb9cd092313c363b5', 1, '2022-06-30 12:38:00'),
(14, 2, '4c9045d081ebdafd81e768cd8964028a', 1, '2022-06-30 12:41:00'),
(15, 3, 'b726cdcff3c5468e3c2542e0feef4af3', 1, '2022-06-30 12:42:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `email_3` (`email`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_token`
--
ALTER TABLE `usuarios_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usuarios_token`
--
ALTER TABLE `usuarios_token`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
