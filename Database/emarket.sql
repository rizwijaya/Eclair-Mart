-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 22 Des 2020 pada 15.39
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emarket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_distributor` int(11) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `photo_barang` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_distributor`, `nama_barang`, `jumlah`, `harga`, `photo_barang`) VALUES
(3, 1, 'sikat', 100, 15000, 'default.jpg'),
(4, 2, 'meja', 100, 100000, 'default.jpg'),
(5, 1, 'sabun', 100, 10000, 'default.jpg'),
(6, 2, 'kursi', 100, 85000, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

DROP TABLE IF EXISTS `distributor`;
CREATE TABLE IF NOT EXISTS `distributor` (
  `id_distributor` int(11) NOT NULL AUTO_INCREMENT,
  `nama_distributor` varchar(100) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `data_updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_distributor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

DROP TABLE IF EXISTS `grup`;
CREATE TABLE IF NOT EXISTS `grup` (
  `id_grup` int(11) NOT NULL AUTO_INCREMENT,
  `nama_grup` varchar(50) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`id_grup`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`id_grup`, `nama_grup`, `date_created`) VALUES
(1, 'pemilik', '2020-12-22'),
(2, 'pegawai', '2020-12-22'),
(3, 'pelanggan', '2020-12-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `alamat_pegawai` varchar(200) DEFAULT NULL,
  `no_telp_pegawai` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `no_telp_pelanggan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

DROP TABLE IF EXISTS `pemilik`;
CREATE TABLE IF NOT EXISTS `pemilik` (
  `id_pemilik` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pemilik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_grup` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `date_created` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_grup`, `nama`, `email`, `password`, `date_created`) VALUES
(1, 3, 'Pelanggan 1', 'pelanggan@gmail.com', '$2y$10$lKbhoHUExeFONB.t6yVASutWMYOmo9e7wSDOvXYedd9.F0mmSIFry', '2020-12-22'),
(2, 1, 'Pemilik', 'pemilik@gmail.com', '$2y$10$gUXPIGBGnduJLziOVJNB3.P90ovqw.2DphvQb.drKj5Airw7E22tW', '2020-12-22'),
(3, 2, 'Pegawai', 'pegawai@gmail.com', '$2y$10$6H9u.vCSOo7CAR1EkF.GIu.MKh.wlv8C5hbMu1SD55SdV.XBVz0Pu', '2020-12-22'),
(4, 3, 'Pelanggan 2', 'test@gmail.com', '$2y$10$WqtTpmaL6g6ouMS3c/qnK.IigJ/YMEAUaaZti5w9RqTJkbcXplLku', '2020-12-22');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `PEGAWAI_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `PELANGGAN_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD CONSTRAINT `PEMILIK_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `TRANSAKSI_BARANG` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `TRANSAKSI_PEGAWAI` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `TRANSAKSI_PELANGGAN` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `USER_GRUP` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id_grup`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
