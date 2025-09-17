-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Sep 2025 pada 14.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_farhat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_krs`
--

CREATE TABLE `tb_krs` (
  `id_krs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_krs` enum('draft','confirm','lunas') NOT NULL DEFAULT 'draft',
  `total_sks` int(11) NOT NULL,
  `total_harga` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tanggal_bayar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_krs`
--

INSERT INTO `tb_krs` (`id_krs`, `id_user`, `status_krs`, `total_sks`, `total_harga`, `tanggal_bayar`) VALUES
(7, 10, 'lunas', 6, 1800000.00, '2025-09-16 07:11:49'),
(8, 11, 'confirm', 8, 2400000.00, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_krs_detail`
--

CREATE TABLE `tb_krs_detail` (
  `id_detail` int(11) NOT NULL,
  `id_krs` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `harga` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_krs_detail`
--

INSERT INTO `tb_krs_detail` (`id_detail`, `id_krs`, `id_mk`, `sks`, `harga`) VALUES
(14, 7, 15, 3, 900000.00),
(15, 7, 17, 3, 900000.00),
(16, 8, 16, 3, 900000.00),
(17, 8, 17, 3, 900000.00),
(18, 8, 18, 2, 600000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mk`
--

CREATE TABLE `tb_mk` (
  `id_mk` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_mk`
--

INSERT INTO `tb_mk` (`id_mk`, `kode`, `nama`, `sks`) VALUES
(15, 'IF36243', 'Linux', 3),
(16, 'IF23103', 'Statistik', 3),
(17, 'IF35103', 'Keamanan Data', 3),
(18, 'IF44012', 'Etika Profesi', 2),
(19, 'IF33044', 'Rekayasa Perangkat Lunak', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `level` enum('admin','mhs') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `npm`, `nama`, `email`, `kata_sandi`, `level`) VALUES
(9, '', 'admin', '', '$2y$10$wET2m7PIsg/pyMkkAGnHz.XPFCMCOeluBsaCQ/nPbrfhh1W7dNL0y', 'admin'),
(10, '07351911098', 'Muhammad Maulana', 'muhammadmaulana@gmail.com', '$2y$10$18i7kv1e048GEshs8LzS0efq6GdDcYeucXGMBD/GuqP7qBwnrnPai', 'mhs'),
(11, '07351911107', 'Asrul S salasa', 'asrulssalasa@gmail.com', '$2y$10$5DFdNJ16NV8ajY7qb2aQ3.DL2ZyzbyGccmX6U59GVdaQlcgSBkyzC', 'mhs'),
(12, '07351911130', 'Rizky Ihtisamul Tsaqif', 'rizkyihtisamultsaqif@gmail.com', '$2y$10$C9HaHmCQNXtzxZVhnszH/.J1SIruDQNGHxtt4ZdY4.THkXKTO6e96', 'mhs');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indeks untuk tabel `tb_krs_detail`
--
ALTER TABLE `tb_krs_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tb_mk`
--
ALTER TABLE `tb_mk`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_krs`
--
ALTER TABLE `tb_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_krs_detail`
--
ALTER TABLE `tb_krs_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_mk`
--
ALTER TABLE `tb_mk`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
