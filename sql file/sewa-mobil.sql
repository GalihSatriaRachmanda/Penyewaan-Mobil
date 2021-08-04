-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2021 pada 02.07
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa-mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kr` int(255) NOT NULL,
  `nama_kr` varchar(50) NOT NULL,
  `alamat_kr` varchar(50) NOT NULL,
  `kontak` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_kr`, `nama_kr`, `alamat_kr`, `kontak`, `username`, `password`) VALUES
(1, 'Galih', 'awd', 123, 'galih_satria', '027dc74f0bbf09a61a36ec7f0d9e08ca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mb` int(255) NOT NULL,
  `nm_mb` varchar(30) NOT NULL,
  `id_kr` int(255) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `thn_pb` varchar(30) NOT NULL,
  `biaya_per_hari` int(50) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `tersewa` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mb`, `nm_mb`, `id_kr`, `merk`, `jenis`, `warna`, `thn_pb`, `biaya_per_hari`, `picture`, `tersewa`) VALUES
(1, 'awdawd', 1, 'awd', 'awdd', 'awdawawdaw', '123123', 243456, '1-786.JPG', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pl` int(255) NOT NULL,
  `nama_pl` varchar(50) NOT NULL,
  `alamat_pl` varchar(50) NOT NULL,
  `kontak` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pl`, `nama_pl`, `alamat_pl`, `kontak`, `username`, `password`) VALUES
(1, 'galih', 'qwsrfse', 1234476, 'galih_satria', '027dc74f0bbf09a61a36ec7f0d9e08ca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sw` varchar(255) NOT NULL,
  `id_mb` int(255) NOT NULL,
  `id_kr` int(255) NOT NULL,
  `id_pl` int(255) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `biaya_sewa` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sw`, `id_mb`, `id_kr`, `id_pl`, `tgl_sewa`, `tgl_kembali`, `biaya_sewa`) VALUES
('2147483647', 1, 1, 1, '2021-08-05', '2021-08-20', 3651840),
('2147483647', 1, 1, 1, '2021-08-04', '2021-08-26', 5356032),
('2147483647', 1, 1, 1, '2021-08-04', '2021-08-05', 243456),
('7604082021', 1, 1, 1, '2021-08-04', '2021-08-07', 730368);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
