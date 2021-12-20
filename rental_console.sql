-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 01:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_console`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_console`
--

CREATE TABLE `tb_console` (
  `ID_console` int(10) NOT NULL,
  `Nama` varchar(15) NOT NULL,
  `Pembuat` varchar(10) NOT NULL,
  `Tahun_Produksi` varchar(5) NOT NULL,
  `Harga_Sewa` varchar(15) NOT NULL,
  `kapasitas` varchar(10) NOT NULL,
  `Gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_console`
--

INSERT INTO `tb_console` (`ID_console`, `Nama`, `Pembuat`, `Tahun_Produksi`, `Harga_Sewa`, `kapasitas`, `Gambar`) VALUES
(1, 'Playstation 1', 'Sony', '1995', 'Rp.1000/Jam', '125GB', 'https://wallpaper-house.com/data/out/5/wallpaper2you_62497.jpg'),
(2, 'Playstation 2', 'Sony', '2000', 'Rp.2000/Jam', '250GB', 'https://p4.wallpaperbetter.com/wallpaper/825/717/97/playstation-wallpaper-preview.jpg'),
(3, 'Playstation 3', 'Sony', '2006', 'Rp.3000/Jam', '500GB', 'https://images8.alphacoders.com/380/thumb-1920-380309.jpg'),
(4, 'Playstation 4', 'Sony', '2013', 'Rp.5000/Jam', '500GB', 'https://wallpapercave.com/wp/wp1841765.jpg'),
(5, 'Playstation 5', 'Sony', '2020', 'Rp.8000/Jam', '1TB', 'https://wallpapers.com/images/high/playstation-ps5-console-nsndc8ewygduy1nh.jpg'),
(6, 'Xbox 360', 'Xbox', '2015', 'Rp.2000/Jam', '5TB', 'https://news.microsoft.com/wp-content/uploads/prod/sites/68/2017/06/Xbox-One-X_Console-Controller_FrontTilt-Top-960x640.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_console`
--
ALTER TABLE `tb_console`
  ADD PRIMARY KEY (`ID_console`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_console`
--
ALTER TABLE `tb_console`
  MODIFY `ID_console` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
