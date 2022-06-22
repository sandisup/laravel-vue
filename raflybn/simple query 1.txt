-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 09:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `obat_2`
--

CREATE TABLE `obat_2` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(32) NOT NULL,
  `cara_pemakaian` text NOT NULL,
  `harga` char(13) NOT NULL,
  `id_pembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_2`
--

INSERT INTO `obat_2` (`id`, `nama_obat`, `cara_pemakaian`, `harga`, `id_pembeli`) VALUES
(1, 'mylanta', '3 kali sehari sesudah makan', '10.000', 1),
(2, 'konidin', '3 kali sehari sesudah makan', '3.500', 2),
(3, 'antangin', '1 kali sehari sesudah makan', '3.500', 3),
(4, 'bodrex', '2 kali sehari sesudah makan', '3.500', 4),
(5, 'insto', '2 kali tetes ', '5.000', 5),
(6, 'sanmol', '3 kali sehari sesudah makan', '10.000', 6),
(7, 'propolis', '2 kali sebelum makan', '10.000', 9),
(8, 'parasetamol', '1 kali sehari sesudah makan', '3.500', 10),
(9, 'strepsil', '2 kali sehari sebelum makan', '10.000', 11),
(10, 'catavlam', '2 kali sehari sebelum makan', '6.000', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli_obat`
--

CREATE TABLE `pembeli_obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL,
  `no_tlp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli_obat`
--

INSERT INTO `pembeli_obat` (`id`, `nama`, `alamat`, `tanggal`, `no_tlp`) VALUES
(1, 'rafly baenu', 'pagojengan', '2022-06-02', '087724107959'),
(2, 'wahyu', 'pagojengan', '2022-06-09', '087754635467'),
(3, 'anggun', 'paguyangan', '2022-06-23', '087724107763'),
(4, 'laras', 'gumelar', '2022-06-11', '087754635467'),
(5, 'robin', 'kretek', '2022-06-14', '087724107959'),
(6, 'toni', 'paguyangan', '2022-06-10', '087724107763'),
(9, 'ibnu', 'taraban', '2022-06-16', '087724107763'),
(10, 'revan', 'bumiayu', '2022-06-10', '087724107959'),
(11, 'roy', 'bumiayu', '2022-06-10', '087724107959'),
(12, 'fitrah', 'bumiayu', '2022-06-10', '087724107959');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `nama`, `alamat`, `no_telpon`) VALUES
(1, 'nizar', 'pagojengan', '085234567465'),
(2, 'riyan', 'paguyangan', '082346759876'),
(3, 'bayu', 'pagojengan', '085234567465'),
(4, 'akmal', 'bumiayu', '085234567465'),
(5, 'aklip', 'paguyangan', '085234567465'),
(6, 'baynu', 'pagojengan', '085234567465'),
(7, 'danendra', 'bumiayu', '082346759876'),
(8, 'baqi', 'pagojengan', '085234567465'),
(9, 'aska', 'pagojengan', '085229518906'),
(10, 'anggi', 'taraban', '085234758690');

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id` int(11) NOT NULL,
  `nama_resep` varchar(64) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `harga` char(13) NOT NULL,
  `id_penulis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id`, `nama_resep`, `tanggal_dibuat`, `harga`, `id_penulis`) VALUES
(1, 'resep alamiah', '2022-06-16', '100.000', 1),
(2, 'resep manjur', '2022-06-11', '200.000', 2),
(3, 'ramuan herbal', '2022-06-09', '150.000', 3),
(4, 'resep jeruk nipis', '2022-06-09', '13.000', 4),
(5, 'resep kunir', '2022-06-17', '10.000', 5),
(6, 'resep daun kumis kucing', '2022-06-02', '50.000', 6),
(7, 'resep jahe', '2022-06-09', '10.000', 7),
(8, 'resep kapulaga', '2022-06-02', '13.000', 8),
(9, 'resep daun jambu klutuk', '2022-06-10', '13.000', 9),
(10, 'resep kayu manis', '2022-06-10', '5.000', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat_2`
--
ALTER TABLE `obat_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lionel` (`id_pembeli`);

--
-- Indexes for table `pembeli_obat`
--
ALTER TABLE `pembeli_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_metal` (`id_penulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat_2`
--
ALTER TABLE `obat_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembeli_obat`
--
ALTER TABLE `pembeli_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat_2`
--
ALTER TABLE `obat_2`
  ADD CONSTRAINT `fk_lionel` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli_obat` (`id`);

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `fk_metal` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
