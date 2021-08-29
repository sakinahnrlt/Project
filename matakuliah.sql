-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2021 pada 11.18
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itb-stikomambon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(11) NOT NULL,
  `Kode_Mk` varchar(10) NOT NULL,
  `Nama_Mk` varchar(50) NOT NULL,
  `Kelas` varchar(10) NOT NULL,
  `Dosen_Pengajar` varchar(50) NOT NULL,
  `Ruang` varchar(20) NOT NULL,
  `Hari` varchar(10) NOT NULL,
  `SKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `Kode_Mk`, `Nama_Mk`, `Kelas`, `Dosen_Pengajar`, `Ruang`, `Hari`, `SKS`) VALUES
(1, '21231', 'Pengembangan Web', 'SI4C', 'Subhan Rumadhani', 'Ruang 203', 'Selasa', 3),
(2, '21211', 'Praktikum Pengembangan Web', 'SI4C', 'Subhan Rumadhani', 'Ruang 302B', 'Selasa', 1),
(3, '20137', 'Pemograman Basis Data', 'SI4C', 'Fadli Husein Wattiheluw', 'Ruang 402B', 'Jumat', 3),
(4, '20117', 'Praktikum Pemograman Basis Data', 'SI4C', 'Fadli Husein Wattiheluw', 'Ruang 401B', 'Jumat', 1),
(5, '21120', 'Pemodelan Sistem Informasi', 'SI4C', 'Andrianto', 'Ruang 203', 'Selasa', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
