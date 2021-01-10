-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2019 pada 03.28
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
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(75) NOT NULL,
  `kode_kategori` varchar(15) NOT NULL,
  `stock` int(5) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `max_stock` int(5) NOT NULL,
  `min_stock` int(5) NOT NULL,
  `harga_jual` varchar(25) NOT NULL,
  `harga_beli` varchar(25) NOT NULL,
  `kode_diskon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `kode_kategori`, `stock`, `satuan`, `max_stock`, `min_stock`, `harga_jual`, `harga_beli`, `kode_diskon`) VALUES
('BR521102019001', 'CocaCola', '1h1zuxr3afesckw', 106, 'Kotak', 55, 15, '3500', '3000', '14746ajs1fesgcw'),
('BR522102019002', 'Freastea', '1h1zuxr3afesckw', 20, 'Botol', 15, 5, '3500', '3000', '112345'),
('BR522102019003', 'Tea Jus', '1h1zuxr3afesckw', 20, 'Buah', 51, 15, '3500', '3000', '112345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transkeluar`
--

CREATE TABLE `detail_transkeluar` (
  `urut` int(15) NOT NULL,
  `no_faktur` varchar(15) NOT NULL,
  `harga` int(10) NOT NULL,
  `sub_total` int(10) NOT NULL,
  `kode_barang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `kode_diskon` varchar(15) NOT NULL,
  `nama_diskon` varchar(55) NOT NULL,
  `type_diskon` enum('1','2','3') NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `persen` char(15) NOT NULL,
  `ketentuan` varchar(25) NOT NULL,
  `item` char(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`kode_diskon`, `nama_diskon`, `type_diskon`, `tgl_awal`, `tgl_akhir`, `persen`, `ketentuan`, `item`, `keterangan`) VALUES
('112345', 'dont delete', '3', '0000-00-00', '0000-00-00', '0', '0', '0', ''),
('14746ajs1fesgcw', 'test free item', '1', '2019-10-21', '2019-10-24', '0', '5', '2', ''),
('1pyphkwjfdpcgs', 'test', '2', '2019-10-01', '2019-10-31', '50', '0', '0', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('1h1zuxr3afesckw', 'Minuman'),
('e95r8v11fcowo8', 'Makanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluar`
--

CREATE TABLE `transaksi_keluar` (
  `no_faktur` varchar(15) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kode_user` varchar(15) NOT NULL,
  `total_transaksi` int(15) NOT NULL,
  `kembalian` int(15) NOT NULL,
  `bayar` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_keluar`
--

INSERT INTO `transaksi_keluar` (`no_faktur`, `tgl_transaksi`, `kode_user`, `total_transaksi`, `kembalian`, `bayar`) VALUES
('TR525102019002', '2019-10-25', '1jneyu8j1fhcock', 17500, 2500, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_masuk`
--

CREATE TABLE `transaksi_masuk` (
  `id_transaksi` varchar(15) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `jumlah_beli` int(5) NOT NULL,
  `tgl_transaksi` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_masuk`
--

INSERT INTO `transaksi_masuk` (`id_transaksi`, `kode_barang`, `jumlah_beli`, `tgl_transaksi`) VALUES
('1443okoa1f9c8go', 'BR517102019003', 100, 'Thursday, 2019-10-17'),
('253aq0kcafhck08', 'BR522102019003', 10, 'Thursday, 2019-10-24'),
('29dgxecgsfggcsw', 'BR521102019001', 10, 'Friday, 2019-10-25'),
('2iffzjjs1fggs0g', 'BR522102019002', 10, 'Thursday, 2019-10-24'),
('5sfxn7ejfgw8wk', 'BR521102019001', 10, 'Thursday, 2019-10-24'),
('dm6xn7ejfhcg04', 'BR521102019001', 10, 'Thursday, 2019-10-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(15) NOT NULL,
  `username` varchar(55) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(85) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `level`) VALUES
('1jneyu8j1fhcock', 'kasir', 'Sigit Pambudi ', 'c7911af3adbd12a035b289556d96470a', '2'),
('iu6a8as1fhcgcw', 'admin', 'Sigit', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `detail_transkeluar`
--
ALTER TABLE `detail_transkeluar`
  ADD PRIMARY KEY (`urut`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`kode_diskon`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indeks untuk tabel `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transkeluar`
--
ALTER TABLE `detail_transkeluar`
  MODIFY `urut` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
