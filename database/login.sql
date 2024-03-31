-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2024 pada 13.27
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kwarran` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `ukuran_kaos` varchar(5) NOT NULL,
  `serti` varchar(255) NOT NULL,
  `bpjs` varchar(255) NOT NULL,
  `golongan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `ttl`, `kategori`, `kwarran`, `jenis_kelamin`, `nohp`, `ukuran_kaos`, `serti`, `bpjs`, `golongan`) VALUES
(1, 'Afan Yudho Ardiansyah', 'Kendal, 21 Mei 2003', 'Peserta', 'Beji', 'Laki-Laki', '0877767767', 'M', 'Ada', 'Ada', 'Penegak'),
(2, 'Arfian Nugroho', 'Jakarta, 21 Januari 2000', 'Peserta', 'Pancoran Mas', 'Laki-Laki', '081289817337', '', 'Ada', 'Ada', 'Penegak'),
(3, 'Indah', 'Bali, 27 Desember 2002', 'Peserta', 'Pancoran Mas', 'Perempuan', '085123373125', 'L', 'Ada', 'Ada', 'Penegak'),
(9, 'Amalia', 'Depok, 21 Maret 2002', 'Peserta', 'Cipayung', 'Perempuan', '087779634884', 'L', 'Ada', 'Ada', 'Penegak'),
(10, 'Muhammad Agung Nugroho', 'Jakarta, 11 Maret 2001', 'Peserta', 'Pancoran Mas', 'Laki-Laki', '081289817667', 'M', 'Ada', 'Ada', 'Penegak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unsur_kontingen`
--

CREATE TABLE `unsur_kontingen` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `kwarran` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `ukuran_kaos` varchar(5) NOT NULL,
  `serti` varchar(255) NOT NULL,
  `bpjs` varchar(255) NOT NULL,
  `golongan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unsur_kontingen`
--

INSERT INTO `unsur_kontingen` (`id`, `nama`, `ttl`, `kategori`, `kwarran`, `jenis_kelamin`, `nohp`, `ukuran_kaos`, `serti`, `bpjs`, `golongan`) VALUES
(1, 'Bagas Sanjaya', 'Madura, 20 September 1999', 'Bindamping', 'Pancoran Mas', 'Laki-Laki', '085123327887', 'L', 'Ada', 'Ada', 'T/D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(5, 'Afan', 'afan@gmail.com', '123456'),
(6, 'dion', 'dion@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unsur_kontingen`
--
ALTER TABLE `unsur_kontingen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `unsur_kontingen`
--
ALTER TABLE `unsur_kontingen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
