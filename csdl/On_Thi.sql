-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 10:25 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `On_Thi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cauthu`
--

CREATE TABLE `cauthu` (
  `id` int(11) NOT NULL,
  `mact` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `namsinh` int(11) NOT NULL,
  `quequan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cauthu`
--

INSERT INTO `cauthu` (`id`, `mact`, `hoten`, `namsinh`, `quequan`, `sdt`) VALUES
(1, 'CT01', 'Nguyen Tuyen Giang', 1997, 'Bắc ninh', '0965565742'),
(2, 'CT02', 'Pham quuang hieu', 1978, 'Hà nội', '86532'),
(3, 'CT03', 'Nguyen the anh', 1982, 'Hà nội', '0852585');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `manv` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `quequan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `namtuyendung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `manv`, `hoten`, `gioitinh`, `quequan`, `namtuyendung`) VALUES
(1, 'NV01', 'Nguyen Tuyen Giang', 'Nam', 'Bac Ninh', 2018),
(2, 'NV02', 'Nguyen the anh', 'Nam', 'ha noi', 1995),
(3, 'NV03', 'Pham quuang hieu', 'Nữ ', 'Ha noi', 1992);

-- --------------------------------------------------------

--
-- Table structure for table `qlsv`
--

CREATE TABLE `qlsv` (
  `id` int(11) NOT NULL,
  `masv` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `quequan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qlsv`
--

INSERT INTO `qlsv` (`id`, `masv`, `hoten`, `quequan`, `gioitinh`) VALUES
(1, 'SV01', 'Nguyen tuyen giang', 'Bac Ninh', 'Nam'),
(2, 'Sv02', 'Nguyen the anh', 'Ha noi', 'Nam'),
(3, 'Sv02', 'Nguyen the anh', 'Ha noi', 'Nam'),
(4, 'Sv02', 'Nguyen the anh', 'Ha noi', 'Nam'),
(5, 'Sv02', 'Nguyen the anh', 'Ha noi', 'Nam'),
(6, 'SV03', 'Vu thi hong hai', 'Hai phong', 'Nữ'),
(7, 'SV03', 'Pham quang hieu', 'Ha noi', 'Nữ'),
(8, 'asdf', 'asdf', 'asdf', 'Nữ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'giang', 'a6ea8471c120fe8cc35a2954c9b9c595'),
(3, 'ad', 'a6ea8471c120fe8cc35a2954c9b9c595'),
(4, 't', '2410'),
(5, 'g', 'a6ea8471c120fe8cc35a2954c9b9c595'),
(7, 'asdfg', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cauthu`
--
ALTER TABLE `cauthu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qlsv`
--
ALTER TABLE `qlsv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cauthu`
--
ALTER TABLE `cauthu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `qlsv`
--
ALTER TABLE `qlsv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
