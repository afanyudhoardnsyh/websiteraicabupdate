-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2024 pada 12.22
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
-- Database: `raicab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_a1`
--

CREATE TABLE `berkas_a1` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filesize` int(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_a2`
--

CREATE TABLE `berkas_a2` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filesize` int(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_a3`
--

CREATE TABLE `berkas_a3` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filesize` int(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kwarran`
--

CREATE TABLE `kwarran` (
  `id` int(10) NOT NULL,
  `nama_kwarran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(10) NOT NULL,
  `kwarran` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `nominal` int(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filesize` int(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `golongan` varchar(255) NOT NULL,
  `bpjs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `golongan` varchar(255) NOT NULL,
  `bpjs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_level`) VALUES
(1, 'Arfian Nugroho', 'dion@gmail.com', '123457', 99),
(2, 'Afan Yudho Ardiansyah', 'afan@gmail.com', '123458', 99),
(3, 'Kwarcab Kota Depok', 'kwarcab@raicab3.com', 'Admin-RaicabIII-Kwarcab', 1),
(4, 'DKC Kota Depok', 'dkckotadepok@raicab3.com', 'Admin-RaicabIII-Dkc', 2),
(5, 'Sangker Raicab Kota Depok', 'sangker@raicab3.com', 'Admin-RaicabIII-Sangker', 3),
(6, 'Kwarran Pancoran Mas', 'pancoranmas@raicab3.com', 'RaicabIII_Panmas', 4),
(7, 'Kwarran Cipayung', 'cipayung@raicab3.com', 'RaicabIII_cipayung', 5),
(8, 'Kwarran Sawangan', 'sawangan@raicab3.com', 'RaicabIII_Sawangan', 6),
(9, 'Kwarran Bojongsari', 'bojongsari@raicab3.com', 'RaicabIII_bojogsari', 7),
(10, 'Kwarran Cinere', 'cinere@raicab3.com', 'RaicabIII_Cinere', 8),
(11, 'Kwarran Limo', 'limo@raicab3.com', 'RaicabIII_limo', 9),
(12, 'Kwarran Beji', 'beji@raicab3.com', 'RaicabIII_Beji', 10),
(13, 'Kwarran Cimanggis', 'cimanggis@raicab3.com', 'RaicabIII_cimanggis', 11),
(14, 'Kwarran Tapos', 'tapos@raicab3.com', 'RaicabIII_Tapos', 12),
(15, 'Kwarran Sukmajaya', 'sukmajaya@raicab3.com', 'RaicabIII_sukmajaya', 13),
(16, 'Kwarran Cilodong', 'cilodong@raicab3.com', 'RaicabIII_Cilodong', 14);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas_a1`
--
ALTER TABLE `berkas_a1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas_a2`
--
ALTER TABLE `berkas_a2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas_a3`
--
ALTER TABLE `berkas_a3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kwarran`
--
ALTER TABLE `kwarran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `berkas_a1`
--
ALTER TABLE `berkas_a1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `berkas_a2`
--
ALTER TABLE `berkas_a2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `berkas_a3`
--
ALTER TABLE `berkas_a3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `unsur_kontingen`
--
ALTER TABLE `unsur_kontingen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
