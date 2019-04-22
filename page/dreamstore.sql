-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 05:00 AM
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
-- Database: `dreamstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `nn_chungloai`
--

CREATE TABLE `nn_chungloai` (
  `idCL` int(255) NOT NULL,
  `TenCL` varchar(255) NOT NULL,
  `ThuTu` int(4) NOT NULL,
  `AnHien` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nn_chungloai`
--

INSERT INTO `nn_chungloai` (`idCL`, `TenCL`, `ThuTu`, `AnHien`) VALUES
(1, 'Điện Thoại', 1, 1),
(2, 'Máy Tính', 2, 1),
(3, 'Phụ Kiện Điện Thoại', 5, 1),
(4, 'Phụ Kiện Laptop', 5, 1),
(5, 'Kỹ Thuật Số', 5, 1),
(9, 'Chăm sóc sức khoẻ', 4, 1),
(10, 'Điện gia đình', 5, 0),
(12, 'Sinh tố, Xay, Ép, Pha', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nn_donhang`
--

CREATE TABLE `nn_donhang` (
  `idDH` int(255) NOT NULL,
  `idNguoiDung` int(255) NOT NULL,
  `ThoiGianDat` datetime NOT NULL,
  `TenNguoiNhan` varchar(100) NOT NULL,
  `DiaDiemGiao` varchar(500) NOT NULL,
  `NgayGiaoHang` datetime NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DienThoai` varchar(100) NOT NULL,
  `GhiChu` varchar(500) DEFAULT NULL,
  `TinhTrang` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nn_donhang`
--

INSERT INTO `nn_donhang` (`idDH`, `idNguoiDung`, `ThoiGianDat`, `TenNguoiNhan`, `DiaDiemGiao`, `NgayGiaoHang`, `Email`, `DienThoai`, `GhiChu`, `TinhTrang`) VALUES
(7, 106, '2013-03-06 20:48:42', 'Teo', '', '2013-03-07 00:00:00', 'abc@abc.abc', '0901234567', '', 0),
(8, 0, '2013-03-08 20:14:30', '', '', '0000-00-00 00:00:00', '', '', '', 0),
(5, 100, '2013-03-06 19:34:13', 'Lê Văn Test', '49 Hoàng Văn Thụ, Phường 2, Quận Phú Nhuận, TP. Hồ Chí Minh', '2013-07-04 00:00:00', 'admin@gmail.com', '0901234567', 'Goi dien truoc khi giao', -1),
(6, 100, '2013-03-06 19:51:28', 'Lê Văn Test', '49 Hoàng Văn Thụ, Phường 2, Quận Phú Nhuận, TP. Hồ Chí Minh', '2013-03-07 00:00:00', 'admin@gmail.com', '0901234567', '', 4),
(9, 100, '2014-01-04 20:10:05', 'Lê Văn Test', '49 Hoàng Văn Thụ, Phường 2, Quận Phú Nhuận, TP. Hồ Chí Minh', '2013-03-07 00:00:00', 'admin@gmail.com', '0901234567', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nn_donhangchitiet`
--

CREATE TABLE `nn_donhangchitiet` (
  `idDH` int(255) NOT NULL,
  `idSP` int(255) NOT NULL,
  `SoLuong` int(255) NOT NULL,
  `Gia` decimal(15,4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nn_donhangchitiet`
--

INSERT INTO `nn_donhangchitiet` (`idDH`, `idSP`, `SoLuong`, `Gia`) VALUES
(5, 382, 10, '13199000.0000'),
(5, 371, 1, '14799000.0000'),
(6, 382, 1, '13199000.0000'),
(6, 371, 1, '14799000.0000'),
(7, 375, 1, '13599000.0000'),
(8, 4, 1, '9799000.0000'),
(8, 382, 1, '13199000.0000'),
(8, 136, 1, '4599000.0000'),
(5, 4, 1, '9799000.0000'),
(9, 2, 2, '9899000.0000'),
(9, 1, 1, '11449000.0000');

-- --------------------------------------------------------

--
-- Table structure for table `nn_hangsanxuat`
--

CREATE TABLE `nn_hangsanxuat` (
  `idHSX` int(255) NOT NULL,
  `idCL` int(255) NOT NULL,
  `TenHang` varchar(255) NOT NULL,
  `ThuTu` int(4) NOT NULL,
  `AnHien` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nn_hangsanxuat`
--

INSERT INTO `nn_hangsanxuat` (`idHSX`, `idCL`, `TenHang`, `ThuTu`, `AnHien`) VALUES
(1, 1, 'Nokia', 1, 1),
(2, 1, 'Motorola', 1, 1),
(3, 1, 'LG', 1, 1),
(4, 1, 'K-Touch', 1, 1),
(5, 1, 'Samsung', 1, 1),
(6, 1, 'Cayon', 1, 1),
(7, 1, 'Sony Ericsson', 1, 1),
(8, 1, 'WellcoM', 1, 1),
(9, 1, 'HTC', 1, 1),
(10, 1, 'Mobell', 1, 1),
(26, 1, 'Dopod', 1, 1),
(27, 1, 'HQ', 1, 1),
(28, 1, 'Toplux', 1, 1),
(29, 1, 'I-mobile', 1, 1),
(30, 1, 'Sharp', 1, 1),
(31, 1, 'G-Plus', 1, 1),
(32, 1, 'HP', 1, 1),
(33, 1, 'Huawei', 1, 1),
(34, 1, 'Panasonic', 1, 1),
(35, 1, 'BenQ-Siemens', 1, 1),
(36, 1, 'Mobiado', 1, 1),
(37, 1, 'ITALK', 1, 1),
(38, 1, 'Vertu', 1, 1),
(39, 1, 'G-Tide', 1, 1),
(40, 1, 'Apple', 1, 1),
(41, 1, 'O2', 1, 1),
(42, 1, 'Asus', 1, 1),
(43, 1, 'Gionee', 1, 1),
(44, 1, 'Toshiba', 1, 1),
(45, 1, 'Q-Mobile', 1, 1),
(46, 1, 'BlackBerry', 1, 1),
(47, 1, 'Bavapen', 1, 1),
(48, 1, 'Sfone-CDMA', 1, 1),
(49, 1, 'Umeox', 1, 1),
(50, 1, 'Gigabyte', 1, 1),
(51, 1, 'Siemens', 1, 1),
(52, 2, 'Acer', 1, 1),
(53, 2, 'Toshiba ', 1, 1),
(54, 2, 'Asus ', 1, 1),
(55, 2, 'Samsung ', 1, 1),
(56, 2, 'HP-Compaq ', 1, 1),
(57, 2, 'BenQ ', 1, 1),
(58, 2, 'Dell ', 1, 1),
(59, 2, 'Gateway ', 1, 1),
(60, 2, 'IBM - Lenovo ', 1, 1),
(61, 2, 'Sony ', 1, 1),
(62, 2, 'Apple ', 1, 1),
(63, 2, 'Logitech ', 1, 1),
(64, 2, 'CMS ', 1, 1),
(65, 2, 'Elitegroup ', 1, 1),
(66, 2, 'Axioo ', 1, 1),
(67, 2, 'Fujitsu ', 1, 1),
(68, 2, 'MSI ', 1, 1),
(69, 2, 'Nec ', 1, 1),
(70, 2, 'Panasonic ', 1, 1),
(71, 2, 'Twinhead ', 1, 1),
(72, 2, 'Sharp ', 1, 1),
(73, 2, 'Hãng khác... ', 1, 1),
(74, 2, 'Suzuki ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nn_loaisp`
--

CREATE TABLE `nn_loaisp` (
  `idLoai` int(255) NOT NULL,
  `idCL` int(255) NOT NULL,
  `TenLoai` varchar(255) NOT NULL,
  `ThuTu` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nn_sanpham`
--

CREATE TABLE `nn_sanpham` (
  `idSP` int(255) NOT NULL,
  `idLoai` int(255) NOT NULL,
  `TenSP` varchar(255) NOT NULL,
  `Gia` decimal(15,4) NOT NULL,
  `ChiTiet` text,
  `UrlHinh` varchar(255) NOT NULL,
  `NgayDang` date NOT NULL,
  `SoLanMua` int(255) NOT NULL DEFAULT '0',
  `TonKho` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nn_sanpham`
--

INSERT INTO `nn_sanpham` (`idSP`, `idLoai`, `TenSP`, `Gia`, `ChiTiet`, `UrlHinh`, `NgayDang`, `SoLanMua`, `TonKho`) VALUES
(489, 0, '', '0.0000', NULL, '', '0000-00-00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nn_chungloai`
--
ALTER TABLE `nn_chungloai`
  ADD PRIMARY KEY (`idCL`);

--
-- Indexes for table `nn_donhang`
--
ALTER TABLE `nn_donhang`
  ADD PRIMARY KEY (`idDH`);

--
-- Indexes for table `nn_donhangchitiet`
--
ALTER TABLE `nn_donhangchitiet`
  ADD PRIMARY KEY (`idDH`,`idSP`);

--
-- Indexes for table `nn_hangsanxuat`
--
ALTER TABLE `nn_hangsanxuat`
  ADD PRIMARY KEY (`idHSX`);

--
-- Indexes for table `nn_loaisp`
--
ALTER TABLE `nn_loaisp`
  ADD PRIMARY KEY (`idLoai`);

--
-- Indexes for table `nn_sanpham`
--
ALTER TABLE `nn_sanpham`
  ADD PRIMARY KEY (`idSP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nn_chungloai`
--
ALTER TABLE `nn_chungloai`
  MODIFY `idCL` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `nn_donhang`
--
ALTER TABLE `nn_donhang`
  MODIFY `idDH` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nn_hangsanxuat`
--
ALTER TABLE `nn_hangsanxuat`
  MODIFY `idHSX` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `nn_loaisp`
--
ALTER TABLE `nn_loaisp`
  MODIFY `idLoai` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `nn_sanpham`
--
ALTER TABLE `nn_sanpham`
  MODIFY `idSP` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
