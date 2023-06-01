-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2023 pada 17.02
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_mvc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id_member` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `join_date` varchar(255) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id_member`, `name`, `email`, `phone`, `join_date`, `id_tim`, `id_role`) VALUES
(1, 'Bintang Fajar S', 'btgfajar@gmail.com', '0858888888', '15 Februari 2023', 1, 1),
(7, 'IGOY', 'igoyganteng@gmail.com', '08555555', '17 Maret 2019', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id_role`, `nama_role`) VALUES
(1, 'Roamer'),
(2, 'Midlaner'),
(3, 'Explaner'),
(4, 'Jungler'),
(7, 'Goldlaner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim`
--

CREATE TABLE `tim` (
  `id_tim` int(11) NOT NULL,
  `nama_tim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tim`
--

INSERT INTO `tim` (`id_tim`, `nama_tim`) VALUES
(1, 'Semicolon'),
(2, 'RRQ'),
(3, 'Evos Legends');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `id_tim` (`id_tim`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tim`
--
ALTER TABLE `tim`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id_tim`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
