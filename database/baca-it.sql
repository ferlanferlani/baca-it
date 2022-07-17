-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 09:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baca-it`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$meVnSZ5EwZAMMeQKCdZjeOzpQwPgSw4C0bvECCwNAMUNNd5EpqXB2'),
(3, 'ferlan', '$2y$10$exBLllbytzTzMalUAyJ9pucNbTVG05dQjnda3h5YQ9AfbuVFyr8wS'),
(4, 'ferlan', '$2y$10$wa4YxVbScyLliYdETqWC9On/T1cSE.kyG43371D6Ys7HtdmNhlt.e'),
(5, '', '$2y$10$gqoFt6XISAZBMbxujS8NJuNfoOKHuhWCAEBfFc7xxPqCT7ujF82ae'),
(6, 'sfsadf', '$2y$10$aHexM7v8SpoVKlr7cKNgNe8Ulsxh8M.6AwtSMWaklB.CeOMT1GE9W');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `id` int(11) NOT NULL,
  `judul` varchar(99) NOT NULL,
  `deskripsi` varchar(999) NOT NULL,
  `pdf` varchar(999) NOT NULL,
  `cover` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`id`, `judul`, `deskripsi`, `pdf`, `cover`) VALUES
(3, 'Mengenal javascript', 'ebook belajar bahasa pemerogramman javascript', 'Mengenaljavascript.pdf', 'js.png');

-- --------------------------------------------------------

--
-- Table structure for table `multi_user`
--

CREATE TABLE `multi_user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('admin','users') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multi_user`
--

INSERT INTO `multi_user` (`id`, `username`, `password`, `level`) VALUES
(3, 'admin', '$2y$10$meVnSZ5EwZAMMeQKCdZjeOzpQwPgSw4C0bvECCwNAMUNNd5EpqXB2', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_user`
--
ALTER TABLE `multi_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `multi_user`
--
ALTER TABLE `multi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
