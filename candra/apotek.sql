-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2022 pada 09.41
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

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
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `produksi` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_pasokan` int(11) DEFAULT NULL,
  `kadaluwarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `merk`, `produksi`, `stok`, `id_pasokan`, `kadaluwarsa`) VALUES
(3, 'Amoxilin', 'PT Kimia Farma', 50, 1, '2022-07-15'),
(4, 'Paracetamol', 'PT Kimia Farma', 50, 2, '2022-07-20'),
(5, 'Alprazolam', 'PT Kimia Farma', 50, 3, '2022-07-13'),
(6, 'Ambroxol', 'PT Kimia Farma', 50, 4, '2022-07-21'),
(7, 'Cetrixine', 'PT Kimia Farma', 50, 5, '2022-07-27'),
(8, 'CTM', 'PT Kimia Farma', 60, 6, '2022-07-26'),
(9, 'Dexamethasone', 'PT Kimia Farma', 50, 7, '2022-07-28'),
(10, 'Penicilin', 'PT Kimia Farma', 60, 8, '2022-07-12'),
(11, 'Insulin', 'PT Kimia Farma', 60, 9, '2022-07-19'),
(12, 'Lasix', 'PT Kimia Farma', 50, 10, '2022-06-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `telepon`) VALUES
(1, 'Agus', 'Jl. Bumitara No. 21 Palembang', '085283857746'),
(2, 'Bimo', 'Jl. Bumitara No. 22 Palembang', '089827468388'),
(3, 'Cahyo', 'Jl. Bumitara No. 23 Palembang', '082477253792'),
(4, 'Dodi', 'Jl. Bumitara No. 24 Palembang', '082733758375'),
(5, 'Edi', 'Jl. Bumitara No. 25 Palembang', '089726334627'),
(6, 'Firna', 'Jl. Bumitara No. 26 Palembang', '086543663484'),
(7, 'Gery', 'Jl. Bumitara No. 27 Palembang', '087364927488'),
(8, 'Heni', 'Jl. Bumitara No. 28 Palembang', '086377763894'),
(9, 'Indah', 'Jl. Bumitara No. 29 Palembang', '084622246354'),
(10, 'Jeni', 'Jl. Bumitara No. 30 Palembang', '079372859385');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id` int(11) NOT NULL,
  `pemasok` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id`, `pemasok`, `tanggal`, `jumlah`) VALUES
(1, 'PT Artara', '2022-06-19', 29),
(2, 'PT Bio', '2022-06-20', 25),
(3, 'PT Cahaya', '2022-06-21', 25),
(4, 'PT Diofa', '2022-06-22', 30),
(5, 'PT Ekatama', '2022-06-23', 30),
(6, 'PT Firma', '2022-06-24', 30),
(7, 'PT Gram', '2022-06-25', 20),
(8, 'PT Hex', '2022-06-26', 35),
(9, 'PT Ion', '2022-06-27', 40),
(10, 'PT Jex', '2022-06-28', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `resep_obat` varchar(100) NOT NULL,
  `dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id`, `id_pelanggan`, `resep_obat`, `dokter`) VALUES
(1, 1, 'Obat Demam', 'Dr. Frost'),
(2, 2, 'Obat Jantung', 'Dr. Frost'),
(3, 3, 'Obat Penenang', 'Dr. Frost'),
(4, 4, 'Obat Sakit kepala', 'Dr. Frost'),
(5, 5, 'Obat Dalam', 'Dr. Frost'),
(6, 6, 'Obat Pereda nyeri', 'Dr. Frost'),
(7, 7, 'Obat Diare', 'Dr. Frost'),
(8, 8, 'Obat pencernaan', 'Dr. Frost'),
(9, 9, 'Obat sakit gigi', 'Dr. Frost'),
(10, 10, 'Obat Tidur', 'Dr. Frost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `harga` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_pelanggan`, `id_obat`, `harga`) VALUES
(3, 1, 3, 50000),
(4, 2, 4, 50000),
(5, 3, 5, 20000),
(6, 4, 6, 30000),
(7, 5, 7, 25000),
(8, 6, 8, 30000),
(9, 7, 9, 30000),
(10, 8, 10, 30000),
(11, 9, 11, 35000),
(12, 10, 12, 30000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pemasok` (`id_pasokan`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resep` (`id_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obat` (`id_obat`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_pemasok` FOREIGN KEY (`id_pasokan`) REFERENCES `pemasok` (`id`);

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `fk_resep` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
