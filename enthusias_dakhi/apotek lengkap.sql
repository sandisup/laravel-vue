-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2022 pada 05.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

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
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_obat`, `id_penjualan`) VALUES
(1, 3, 1),
(2, 1, 2),
(3, 5, 3),
(4, 8, 4),
(5, 6, 5),
(6, 2, 6),
(7, 1, 7),
(8, 9, 8),
(9, 4, 9),
(10, 7, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_supplier`
--

CREATE TABLE `detail_supplier` (
  `id` int(11) NOT NULL,
  `agama` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_supplier`
--

INSERT INTO `detail_supplier` (`id`, `agama`, `alamat`, `id_supplier`) VALUES
(1, 'islam', 'jalan kebahagiaan nomor 7', 2),
(2, 'konghucu', 'jalan jalan nomor 13', 3),
(3, 'islam', 'jalan pramuka no.2233', 3),
(4, 'islam', 'jalan senen no.900', 5),
(5, 'buddha', 'jalan shiwa no.989', 6),
(6, 'kristen', 'jalan pentakosta no.087', 7),
(7, 'islam', 'jalan pegangsaan no.567', 8),
(8, 'islam', 'jalan dalam no.098', 9),
(9, 'katolik', 'jalan santa no.436', 10),
(10, 'islam', 'jalan merdeka no.504', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(32) NOT NULL,
  `jenis_obat` varchar(32) DEFAULT NULL,
  `harga_obat` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `jenis_obat`, `harga_obat`, `id_supplier`) VALUES
(1, 'paramex', 'obat sakit kepala', 2500, 2),
(2, 'oskadon', 'obat pegal linu', 3000, 3),
(3, 'bodrek', 'obat sakit kepala', 4000, 2),
(4, 'kalpanak', 'obat kurap', 3500, 11),
(5, 'insto', 'obat sakit mata', 7000, 6),
(6, 'eyecare', 'obat sakit mata', 8000, 6),
(7, 'jamu temulawak', 'jamu', 9000, 8),
(8, 'madu hitam', 'obat tradisional', 15000, 9),
(9, 'phi kang suang', 'obat cina', 6000, 10),
(10, 'bye bye fever', 'obat demam', 5000, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(32) NOT NULL,
  `waktu_penjualan` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_barang` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `nama_obat`, `waktu_penjualan`, `jumlah_barang`) VALUES
(1, 'bodrek', '2022-06-07 08:33:22', '21'),
(2, 'paramek', '2022-06-12 14:17:04', '31'),
(3, 'insto', '2022-06-08 14:18:36', '25'),
(4, 'madu hitam', '2022-06-03 09:52:34', '43'),
(5, 'eyecare', '2022-06-09 15:13:37', '67'),
(6, 'oskadon', '2022-06-01 10:29:37', '55'),
(7, 'paramex', '2022-06-11 13:11:37', '22'),
(8, 'phi kang suang', '2022-06-09 14:18:37', '32'),
(9, 'kalpanak', '2022-06-09 14:21:37', '90'),
(10, 'jamu temulawak', '2022-06-09 10:29:37', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jenis_supplier` varchar(32) NOT NULL,
  `perusahaan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `jenis_supplier`, `perusahaan`) VALUES
(2, 'suroto', 'supplier obat sakit kepala', 'PT. Koyo'),
(3, 'doni', 'supplier obat pegal linu', 'PT. obat mujarab'),
(4, 'mato', 'supplier obat demam', 'PT. obat panas'),
(5, 'beni', 'supplier obat luar', 'PT. obat luar'),
(6, 'deni', 'supplier obat mata', 'PT. obat mata'),
(7, 'tino', 'supplier obat merah', 'PT. obat merah'),
(8, 'yono', 'supplier jamu', 'PT. jamu'),
(9, 'yanta', 'supplier obat tradisonal', 'PT. obat tradisonal'),
(10, 'soni', 'supplier obat cina', 'PT. obat cina'),
(11, 'tatang', 'supplier obat kurap', 'PT. obat kurap');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penjualan` (`id_penjualan`),
  ADD KEY `fk_obat` (`id_obat`);

--
-- Indeks untuk tabel `detail_supplier`
--
ALTER TABLE `detail_supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail` (`id_supplier`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `detail_supplier`
--
ALTER TABLE `detail_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_supplier`
--
ALTER TABLE `detail_supplier`
  ADD CONSTRAINT `fk_detail` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
