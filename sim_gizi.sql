-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2026 at 08:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_gizi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kandungan_gizi`
--

CREATE TABLE `kandungan_gizi` (
  `id_gizi` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `kalori` decimal(10,2) DEFAULT NULL,
  `protein` decimal(10,2) DEFAULT NULL,
  `lemak` decimal(10,2) DEFAULT NULL,
  `karbohidrat` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kandungan_gizi`
--

INSERT INTO `kandungan_gizi` (`id_gizi`, `id_menu`, `kalori`, `protein`, `lemak`, `karbohidrat`) VALUES
(2, 3, 990.00, 277.00, 455.00, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `menu_makanan`
--

CREATE TABLE `menu_makanan` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_makanan`
--

INSERT INTO `menu_makanan` (`id_menu`, `nama_menu`, `kategori`, `harga`, `deskripsi`) VALUES
(1, 'Nasi Goreng', NULL, NULL, NULL),
(2, 'Mie Ayam', NULL, NULL, NULL),
(3, 'Bakso', NULL, NULL, NULL),
(4, 'Sate Ayam', NULL, NULL, NULL),
(5, 'Ayam Geprek', NULL, NULL, NULL),
(6, 'Soto Ayam', NULL, NULL, NULL),
(7, 'Rendang', NULL, NULL, NULL),
(8, 'Gado-Gado', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kandungan_gizi`
--
ALTER TABLE `kandungan_gizi`
  ADD PRIMARY KEY (`id_gizi`),
  ADD KEY `fk_gizi_menu` (`id_menu`);

--
-- Indexes for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  ADD PRIMARY KEY (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kandungan_gizi`
--
ALTER TABLE `kandungan_gizi`
  MODIFY `id_gizi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kandungan_gizi`
--
ALTER TABLE `kandungan_gizi`
  ADD CONSTRAINT `fk_gizi_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu_makanan` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
