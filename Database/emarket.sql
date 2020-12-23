-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2020 pada 01.19
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_distributor` int(11) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `photo_barang` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_distributor`, `nama_barang`, `jumlah`, `harga`, `id_kategori`, `photo_barang`) VALUES
(3, 1, 'sikat', 100, 15000, 0, 'default.jpg'),
(4, 2, 'meja', 100, 100000, 0, 'default.jpg'),
(5, 1, 'sabun', 100, 10000, 0, 'default.jpg'),
(6, 2, 'kursi', 100, 85000, 0, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(100) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `data_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `date_created`, `data_updated`) VALUES
(1, 'PT Unilever Indonesia', '2020-12-23 00:09:10', '2020-12-23 00:08:39'),
(2, 'PT Coca Cola', '2020-12-23 00:09:10', '2020-12-23 00:08:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE `grup` (
  `id_grup` int(11) NOT NULL,
  `nama_grup` varchar(50) DEFAULT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`id_grup`, `nama_grup`, `date_created`) VALUES
(1, 'pemilik', '2020-12-22'),
(2, 'pegawai', '2020-12-22'),
(3, 'pelanggan', '2020-12-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `alamat_pegawai` varchar(200) DEFAULT NULL,
  `no_telp_pegawai` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `no_telp_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_grup` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `date_created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_grup`, `nama`, `email`, `password`, `date_created`) VALUES
(1, 3, 'Pelanggan 1', 'pelanggan@gmail.com', '$2y$10$lKbhoHUExeFONB.t6yVASutWMYOmo9e7wSDOvXYedd9.F0mmSIFry', '2020-12-22'),
(2, 1, 'Pemilik', 'pemilik@gmail.com', '$2y$10$gUXPIGBGnduJLziOVJNB3.P90ovqw.2DphvQb.drKj5Airw7E22tW', '2020-12-22'),
(3, 2, 'Pegawai', 'pegawai@gmail.com', '$2y$10$6H9u.vCSOo7CAR1EkF.GIu.MKh.wlv8C5hbMu1SD55SdV.XBVz0Pu', '2020-12-22'),
(4, 3, 'Pelanggan 2', 'test@gmail.com', '$2y$10$WqtTpmaL6g6ouMS3c/qnK.IigJ/YMEAUaaZti5w9RqTJkbcXplLku', '2020-12-22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indeks untuk tabel `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id_grup`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `PEGAWAI_USER` (`id_user`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `PELANGGAN_USER` (`id_user`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD KEY `PEMILIK_USER` (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `TRANSAKSI_BARANG` (`id_barang`),
  ADD KEY `TRANSAKSI_PEGAWAI` (`id_pegawai`),
  ADD KEY `TRANSAKSI_PELANGGAN` (`id_pelanggan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `USER_GRUP` (`id_grup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `grup`
--
ALTER TABLE `grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
