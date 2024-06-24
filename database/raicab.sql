-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2024 pada 14.20
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
  `filetype` varchar(255) NOT NULL
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

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `kwarran`, `jumlah`, `nominal`, `filename`, `filesize`, `filetype`, `upload_date`) VALUES
(48, 'Sawangan', 3, 200000, 'logo_cn.png', 398369, 'image/png', '2024-04-27 14:15:17'),
(49, 'Pancoran Mas', 2, 350000, 'Spotify.png', 13588, 'image/png', '2024-05-02 10:40:46'),
(50, 'Tapos', 7, 825000, 'Bootstrap.jpeg', 6698, 'image/jpeg', '2024-05-06 15:03:58'),
(51, 'Beji', 2, 350000, 'Mie Tek-tek Goreng.jpeg', 40186, 'image/jpeg', '2024-05-08 01:49:30'),
(53, 'Tapos', 5, 875000, 'Loho Web.png', 60303, 'image/png', '2024-05-08 01:54:29'),
(54, 'Pancoran Mas', 5, 875000, '1.png', 126171, 'image/png', '2024-06-10 09:04:10'),
(55, 'Tapos', 1, 175000, 'bg-time.png', 155225, 'image/png', '2024-06-10 09:08:54'),
(56, 'Cimanggis', 8, 1400000, 'logo_cn.png', 387466, 'image/png', '2024-06-10 09:09:48'),
(57, 'Sukmajaya', 20, 3500000, 'bg-time.png', 155225, 'image/png', '2024-06-10 09:23:44');

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
  `sfh` varchar(255) NOT NULL,
  `bpjs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `ttl`, `kategori`, `kwarran`, `jenis_kelamin`, `nohp`, `ukuran_kaos`, `golongan`, `sfh`, `bpjs`) VALUES
(30, 'Afan Yudho Ardiansyah', 'Garut, 20 Januari 2000', 'Peserta', 'Pancoran Mas', 'Laki-Laki', '0987654321112', 'S', 'Penegak', 'unpam.png', 'Mie Tek-tek rebus.jpeg'),
(32, 'Muhammad Agung Nugroho', 'Tegal. 12 Mei 2002', 'Peserta', 'Pancoran Mas', 'Laki-Laki', '082176528982', 'M', 'Penegak', '1.png', 'logo_cn.png'),
(33, 'Muhammad Rizki Ansyah', 'Jakarta, 18 Desember 2000', 'Peserta', 'Cimanggis', 'Laki-Laki', '087798702134', 'XL', 'Penegak', 'bg-time.png', 'logo_cn.png'),
(34, 'Mawar Indah', 'Jakarta, 18 Desember 2000', 'Peserta', 'Cimanggis', 'Perempuan', '087767765432', 'L', 'Penegak', 'logo_cn.png', '1.png');

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
  `sfh` varchar(255) NOT NULL,
  `bpjs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unsur_kontingen`
--

INSERT INTO `unsur_kontingen` (`id`, `nama`, `ttl`, `kategori`, `kwarran`, `jenis_kelamin`, `nohp`, `ukuran_kaos`, `golongan`, `sfh`, `bpjs`) VALUES
(3, 'Arfian Nugroho Puta', 'Bali, 27 Desember 2002', 'Peserta', 'Pancoran Mas', 'Laki-Laki', '082189817652', 'M', 'Penegak', 'gambarr.jpg', 'Bukber.jpg'),
(4, 'Muhammad Rizki', 'Garut, 20 Januari 2000', 'Bindamping', 'Tapos', 'Laki-Laki', '087654321235', 'M', 'Pandega', 'facebook.png', 'Loho Web.png'),
(5, 'Rizki Nu Agung', 'Malang, 21 Mei 2001', 'Bindamping', 'Sawangan', 'Laki-Laki', '089723345441', 'M', 'Pandega', 'Bakso Aci.jpeg', 'Kwetiau Goreng.jpeg'),
(6, 'Bagus Rizki', 'Surabaya, 17 Desember 1999', 'Bindamping', 'Cimanggis', 'Laki-Laki', '082133447788', 'L', 'Pandega', 'Mie Tek-tek Goreng.jpeg', 'Pisang keju.jpeg'),
(7, 'dion', 'Jakarta, 21 Januari 2000', 'Bindamping', 'Limo', 'Laki-Laki', '098976543211', 'S', 'Pandega', 'images.png', 'instagram.png'),
(8, 'Muhammad Rizki', 'Tegal. 12 Mei 2002', 'Bindamping', 'Beji', 'Laki-Laki', '082198021346', 'S', 'Pandega', 'Ekskul.png', 'google.png'),
(9, 'Melati Sukma', 'Jakarta, 21 Januari 2000', 'Bindamping', 'Sawangan', 'Perempuan', '089765432112', 'L', 'Pandega', 'logo_cn.png', 'Ekskul.png');

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
(6, 'dion', 'dion@gmail.com', '123456'),
(11, 'DKC Kota Depok', 'dkckotadepok@gmail.com', 'RaicabIII');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `unsur_kontingen`
--
ALTER TABLE `unsur_kontingen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
