-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 04:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kyura`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggaldibuat`, `userid`) VALUES
(1, 'cc', 'ccc', '2024-04-20', 10),
(2, 'xxx', 'xxx', '2024-04-21', 10),
(3, 'gdsdfsd', 'sdfsdfsdf', '2024-04-22', 10),
(4, 'cc', 'kwkwkw', '2024-04-22', 10),
(5, 'xxx', 'zzzzz', '2024-04-22', 10);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(26, 'tfytytfy', 'dfdsfsdfsdf', '2024-04-21', 'media/ridwan_0.png', 1, 10),
(29, 'kjhgffd', '', '2024-04-21', 'media/ridwan_29.png', 1, 10),
(30, 'bgfgjh', '', '2024-04-21', 'media/ridwan_30.png', 1, 10),
(31, 'fgfcyfyt', '', '2024-04-21', 'media/ridwan_31.png', 1, 10),
(32, 'jhvuduv', '', '2024-04-21', 'media/ridwan_32.png', NULL, 10),
(33, 'dsfsdfsdfsdfsdfdsf', 'sfsdfsdf', '2024-04-21', 'media/ridwan_33.png', NULL, 10),
(34, 'ghdfgfdh', 'dfhdfghfh', '2024-04-21', 'media/ridwan_34.png', NULL, 10),
(35, 'fhjfdh', 'dfhdgdsg', '2024-04-21', 'media/ridwan_35.png', NULL, 10),
(37, 'sdfhgfdh', 'fghdsggsdfg', '2024-04-21', 'media/ridwan_36.png', NULL, 10),
(38, 'jhdfsfgsg', 'sdfhagdfg', '2024-04-21', 'media/ridwan_38.png', 2, 10),
(39, 'jdfsggs', 'dsfhdsgdgdf', '2024-04-21', 'media/ridwan_39.png', 2, 10),
(40, 'sasghdf', 'dsfgsdg', '2024-04-21', 'media/ridwan_40.png', NULL, 10),
(41, 'kasfdasf', 'sdgafdsg', '2024-04-21', 'media/ridwan_41.png', NULL, 10),
(42, 'hfgyesr', 'tesrgdfg', '2024-04-21', 'media/ridwan_42.png', NULL, 10),
(43, 'jhfh', 'sdfgsdfg', '2024-04-21', 'media/ridwan_43.png', NULL, 10),
(45, 'sgafdasf', 'fasdgfdsgasdf', '2024-04-21', 'media/ridwan_45.png', NULL, 10),
(46, 'dsasfsdaf', 'adfgfdgsgf', '2024-04-21', 'media/ridwan_46.png', NULL, 10),
(48, 'sss', 'bagus', '2024-04-22', 'media/ridwan_47.png', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(1, 26, 10, 'ffcfcf', '2024-04-09'),
(2, 26, 10, 'aaaaa', '2024-04-21'),
(3, 26, 10, 'gg bang', '2024-04-22'),
(4, 34, 10, 'bagus bang', '2024-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(3, 32, 10, '2024-04-21'),
(4, 31, 10, '2024-04-21'),
(10, 30, 12, '2024-04-21'),
(12, 26, 12, '2024-04-21'),
(14, 34, 10, '2024-04-22'),
(16, 26, 10, '2024-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES
(8, 'yuraa', 'triyura10', 'sa@sa', 'aa bb', 'gg pelangi '),
(9, 'rozan', '3b4a6069f7df01b42526ca94de565290', 'qq@qq', 'qq ww', 'tasik'),
(10, 'ridwan', 'fe9e3203ad8d1387bf8c8d1d889b902b', 'qq@qq', 'qq ww', 'cimahi'),
(11, 'kk', '1ec12035e5b91874abca57cefbd59200', '', ' ', ''),
(12, 'qq', '4eae35f1b35977a00ebd8086c259d4c9', '', ' ', ''),
(13, 'agung', '202cb962ac59075b964b07152d234b70', 'qq@qqq', 'aa aa', 'tasik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
