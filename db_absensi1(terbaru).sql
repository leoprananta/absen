-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jan 2021 pada 02.49
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `tgl`, `waktu`, `keterangan`, `id_user`) VALUES
(4, '2019-07-25', '07:21:53', 'Masuk', 6),
(5, '2019-07-26', '09:00:47', 'Masuk', 6),
(6, '2019-07-26', '16:01:03', 'Pulang', 6),
(7, '2019-07-25', '17:01:28', 'Pulang', 6),
(8, '2021-01-14', '08:55:43', 'Masuk', 13),
(9, '2021-01-14', '08:56:11', 'Pulang', 13),
(10, '2021-01-14', '09:01:01', 'Masuk', 13),
(11, '2021-01-14', '09:33:24', 'Masuk', 15),
(12, '2021-01-14', '10:50:46', 'Pulang', 15),
(13, '2021-01-15', '07:51:01', 'Masuk', 15),
(14, '2021-01-15', '14:34:37', 'Pulang', 15),
(112, '2021-02-16', '11:00:00', 'Masuk', 6),
(1221, '2021-01-19', '07:00:00', 'Masuk', 15),
(1222, '2021-01-19', '16:00:00', 'Pulang', 15),
(12336, '2021-01-17', '17:46:39', 'Masuk', 16),
(12337, '2021-01-17', '17:46:49', 'Pulang', 16),
(12338, '2021-01-18', '10:44:48', 'Masuk', 15),
(12339, '2021-01-18', '10:45:02', 'Pulang', 15),
(12340, '2021-01-18', '10:46:10', 'Masuk', 16),
(12341, '2021-01-18', '10:46:15', 'Pulang', 16),
(12342, '2021-01-18', '06:00:38', 'Masuk', 17),
(12343, '2021-01-18', '06:00:55', 'Pulang', 17),
(12344, '2021-01-20', '17:30:57', 'Masuk', 15),
(12345, '2021-01-20', '17:31:14', 'Pulang', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` smallint(3) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Kantor'),
(2, 'Museum Kretek'),
(3, 'Museum Patiayam'),
(4, 'Taman Krida'),
(5, 'Colo'),
(6, 'Taman Budaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `id_jam` tinyint(1) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `keterangan` enum('Masuk','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`id_jam`, `start`, `finish`, `keterangan`) VALUES
(1, '06:00:00', '07:00:00', 'Masuk'),
(2, '15:15:00', '15:15:00', 'Pulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` smallint(5) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(20) DEFAULT 'no-foto.png',
  `divisi` smallint(5) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('Manager','Karyawan') NOT NULL DEFAULT 'Karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nik`, `nama`, `telp`, `email`, `foto`, `divisi`, `username`, `password`, `level`) VALUES
(1, '12312312332123', 'Ahmad Fadillah 1', '08139212092', 'ahm.fadil@mail.com', '1564316194.png', NULL, 'ahmad', '$2y$10$UwqloCX7PFLM3aQvgQxh6e9UgifqwQOZiF1zdogtLF6iVDR7Yr7IW', ''),
(8, '8931289124891', 'Manager 1', '', '', 'no-foto.png', NULL, 'manager_1', '$2y$10$XtMY01KEOd5I065s8Exs0OcQ373RvRNG1JznORr6TmmBNWnZ3vjjK', ''),
(9, '1231231238900', 'Manager 2', '', '', 'no-foto.png', NULL, 'manager_2', '$2y$10$iJWUOXDznGEmxo.bqnhtmeFL51jN5130LfDlKg8VROfoEmlgC.cFW', ''),
(10, '908121310291', 'Manager 3', '', '', 'no-foto.png', NULL, 'manager_3', '$2y$10$uGsLvgl.6ji2iZ7tWkNvPelTwZdLQ6QA81Yawa20wsLairCXqV8BO', ''),
(11, '123801204012', 'Manager 4', '', '', 'no-foto.png', NULL, 'master_4', '$2y$10$Kot81WNqrho4WlcYI13kT.Y5V2sMg1ZSAXcITrp8cj3dqHpbl4vrS', ''),
(14, '1234567890', 'Bergas C Penanggungan', '123456789', 'disbudpar@kuduskab.go.id', 'no-foto.png', NULL, 'Kepala', '$2y$10$UKoPT05w7MynpelVbPk4yO.j4w45nTAy2TYtBSN9KUJUmKeUGzGN6', 'Manager'),
(15, '', 'M Sarifuddin', '085743728770', 'msarifuddin21@gmail.com', 'no-foto.png', 5, 'Sarif', '$2y$10$2NXPzdgWfiF6GeQA5Nzx4u/UnsikhUx5hpgporm9ycrXXAg7glR3.', 'Karyawan'),
(16, '123021312', 'Mansurudin', '012312', 'air@2.c', 'no-foto.png', 5, 'mansur', '$2y$10$ZixyNJrtmcnySsRq8.bcn.Nh8eX.kLpRt.UuAjnzbfojOrq.IMJY6', 'Karyawan'),
(17, 'firdaus', 'Muhammad Firdaus Nuzula', '0123', 'nusula@al.c', 'no-foto.png', 5, 'daus', '$2y$10$84bz6gnfDemN1T3dIa54pOyRW1MxaBD2033DoxvhxUSq2lM9VOz3u', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;
--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
