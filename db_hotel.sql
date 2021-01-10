-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Feb 2020 pada 16.51
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
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` varchar(15) NOT NULL,
  `tgl_checkin` date NOT NULL,
  `tgl_booking` date NOT NULL,
  `id_penghuni` int(15) NOT NULL,
  `id_kamar` int(10) NOT NULL,
  `status` enum('B','C','I','CK') NOT NULL,
  `id_karyawan` varchar(15) NOT NULL,
  `lama_tinggal` int(3) NOT NULL,
  `total_bayar` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `tgl_checkin`, `tgl_booking`, `id_penghuni`, `id_kamar`, `status`, `id_karyawan`, `lama_tinggal`, `total_bayar`) VALUES
('BK514022020001', '2020-02-14', '2020-02-14', 19, 1, 'CK', 'awdwd3ad2', 5, 1750000),
('BK514022020002', '2020-02-14', '2020-02-14', 20, 3, 'CK', 'awdwd3ad2', 15, 5250000),
('BK514022020003', '2020-02-14', '2020-02-22', 20, 9, 'CK', 'awdwd3ad2', 5, 1750000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(15) NOT NULL,
  `id_tipekamar` varchar(15) NOT NULL,
  `persentase` int(5) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_tipekamar`, `persentase`, `tgl_mulai`, `tgl_selesai`) VALUES
(5, '1hn808v11oys8ks', 50, '2020-02-01', '2020-02-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(15) NOT NULL,
  `nama_fasilitas` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
(3, 'Kasur'),
(4, 'Televisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_tipekamer`
--

CREATE TABLE `fasilitas_tipekamer` (
  `id_fasilitastambahan` int(15) NOT NULL,
  `tipekamar` varchar(15) NOT NULL,
  `jumlah_fasilitas` int(15) NOT NULL,
  `fasilitas` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_tipekamer`
--

INSERT INTO `fasilitas_tipekamer` (`id_fasilitastambahan`, `tipekamar`, `jumlah_fasilitas`, `fasilitas`) VALUES
(9, '1hn808v11oys8ks', 4, 3),
(10, '1hn808v11oys8ks', 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_kamar`
--

CREATE TABLE `harga_kamar` (
  `id_hargakamar` int(15) NOT NULL,
  `id_tipekamar` varchar(15) NOT NULL,
  `harga_kamar` int(15) NOT NULL,
  `pajak` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `harga_kamar`
--

INSERT INTO `harga_kamar` (`id_hargakamar`, `id_tipekamar`, `harga_kamar`, `pajak`) VALUES
(4, '27touhas1p0kok0', 3000000, 15),
(5, '1hn808v11oys8ks', 500000, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(15) NOT NULL,
  `nomor_kamar` varchar(15) NOT NULL,
  `lantai` int(5) NOT NULL,
  `tipekamar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nomor_kamar`, `lantai`, `tipekamar`) VALUES
(1, 'A001', 1, '1hn808v11oys8ks'),
(2, 'A002', 1, '1hn808v11oys8ks'),
(3, 'A003', 1, '1hn808v11oys8ks'),
(4, 'A004', 1, '1hn808v11oys8ks'),
(5, 'A005', 1, '1hn808v11oys8ks'),
(6, 'A006', 1, '1hn808v11oys8ks'),
(7, 'A007', 1, '1hn808v11oys8ks'),
(8, 'A008', 1, '1hn808v11oys8ks'),
(9, 'A009', 1, '1hn808v11oys8ks'),
(10, 'A010', 1, '1hn808v11oys8ks'),
(11, 'A011', 1, '1hn808v11oys8ks'),
(12, 'A012', 1, '1hn808v11oys8ks'),
(13, 'A013', 1, '1hn808v11oys8ks'),
(14, 'A014', 1, '1hn808v11oys8ks'),
(15, 'A015', 1, '1hn808v11oys8ks'),
(16, 'A016', 1, '1hn808v11oys8ks'),
(17, 'A017', 1, '1hn808v11oys8ks'),
(18, 'A018', 1, '1hn808v11oys8ks'),
(19, 'A019', 1, '1hn808v11oys8ks'),
(20, 'A020', 1, '1hn808v11oys8ks'),
(21, 'A021', 1, '1hn808v11oys8ks'),
(22, 'A022', 1, '1hn808v11oys8ks'),
(23, 'A023', 1, '1hn808v11oys8ks'),
(24, 'A024', 1, '1hn808v11oys8ks'),
(25, 'A025', 1, '1hn808v11oys8ks'),
(26, 'A026', 1, '1hn808v11oys8ks'),
(27, 'A027', 1, '1hn808v11oys8ks'),
(28, 'A028', 1, '1hn808v11oys8ks'),
(29, 'A029', 1, '1hn808v11oys8ks'),
(30, 'A030', 1, '1hn808v11oys8ks'),
(31, 'A031', 1, '1hn808v11oys8ks'),
(32, 'A032', 1, '1hn808v11oys8ks'),
(33, 'A033', 1, '1hn808v11oys8ks'),
(34, 'A034', 1, '1hn808v11oys8ks'),
(35, 'A035', 1, '1hn808v11oys8ks'),
(36, 'A036', 1, '1hn808v11oys8ks'),
(37, 'A037', 1, '1hn808v11oys8ks'),
(38, 'A038', 1, '1hn808v11oys8ks'),
(39, 'A039', 1, '1hn808v11oys8ks'),
(40, 'A040', 1, '1hn808v11oys8ks'),
(41, 'A041', 1, '1hn808v11oys8ks'),
(42, 'A042', 1, '1hn808v11oys8ks'),
(43, 'A043', 1, '1hn808v11oys8ks'),
(44, 'A044', 1, '1hn808v11oys8ks'),
(45, 'A045', 1, '1hn808v11oys8ks'),
(46, 'A046', 1, '1hn808v11oys8ks'),
(47, 'A047', 1, '1hn808v11oys8ks'),
(48, 'A048', 1, '1hn808v11oys8ks'),
(49, 'A049', 1, '1hn808v11oys8ks'),
(50, 'A050', 1, '1hn808v11oys8ks'),
(51, 'A051', 1, '1hn808v11oys8ks'),
(52, 'A052', 1, '1hn808v11oys8ks'),
(53, 'A053', 1, '1hn808v11oys8ks'),
(54, 'A054', 1, '1hn808v11oys8ks'),
(55, 'A055', 1, '1hn808v11oys8ks'),
(56, 'A056', 1, '1hn808v11oys8ks'),
(57, 'A057', 1, '1hn808v11oys8ks'),
(58, 'A058', 1, '1hn808v11oys8ks'),
(59, 'A059', 1, '1hn808v11oys8ks'),
(60, 'A060', 1, '1hn808v11oys8ks'),
(61, 'A061', 1, '1hn808v11oys8ks'),
(62, 'A062', 1, '1hn808v11oys8ks'),
(63, 'A063', 1, '1hn808v11oys8ks'),
(64, 'A064', 1, '1hn808v11oys8ks'),
(65, 'A065', 1, '1hn808v11oys8ks'),
(66, 'A066', 1, '1hn808v11oys8ks'),
(67, 'A067', 1, '1hn808v11oys8ks'),
(68, 'A068', 1, '1hn808v11oys8ks'),
(69, 'A069', 1, '1hn808v11oys8ks'),
(70, 'A070', 1, '1hn808v11oys8ks'),
(71, 'A071', 1, '1hn808v11oys8ks'),
(72, 'A072', 1, '1hn808v11oys8ks'),
(73, 'A073', 1, '1hn808v11oys8ks'),
(74, 'A074', 1, '1hn808v11oys8ks'),
(75, 'A075', 1, '1hn808v11oys8ks'),
(76, 'A076', 1, '1hn808v11oys8ks'),
(77, 'A077', 1, '1hn808v11oys8ks'),
(78, 'A078', 1, '1hn808v11oys8ks'),
(79, 'A079', 1, '1hn808v11oys8ks'),
(80, 'A080', 1, '1hn808v11oys8ks'),
(81, 'A081', 1, '1hn808v11oys8ks'),
(82, 'A082', 1, '1hn808v11oys8ks'),
(83, 'A083', 1, '1hn808v11oys8ks'),
(84, 'A084', 1, '1hn808v11oys8ks'),
(85, 'A085', 1, '1hn808v11oys8ks'),
(86, 'A086', 1, '1hn808v11oys8ks'),
(87, 'A087', 1, '1hn808v11oys8ks'),
(88, 'A088', 1, '1hn808v11oys8ks'),
(89, 'A089', 1, '1hn808v11oys8ks'),
(90, 'A090', 1, '1hn808v11oys8ks'),
(91, 'A091', 1, '1hn808v11oys8ks'),
(92, 'A092', 1, '1hn808v11oys8ks'),
(93, 'A093', 1, '1hn808v11oys8ks'),
(94, 'A094', 1, '1hn808v11oys8ks'),
(95, 'A095', 1, '1hn808v11oys8ks'),
(96, 'A096', 1, '1hn808v11oys8ks'),
(97, 'A097', 1, '1hn808v11oys8ks'),
(98, 'A098', 1, '1hn808v11oys8ks'),
(99, 'A099', 1, '1hn808v11oys8ks'),
(100, 'A100', 1, '1hn808v11oys8ks'),
(101, 'B101', 2, 'rt7fzv11oxcs8c'),
(102, 'B102', 2, 'rt7fzv11oxcs8c'),
(103, 'B103', 2, 'rt7fzv11oxcs8c'),
(104, 'B104', 2, 'rt7fzv11oxcs8c'),
(105, 'B105', 2, 'rt7fzv11oxcs8c'),
(106, 'B106', 2, 'rt7fzv11oxcs8c'),
(107, 'B107', 2, 'rt7fzv11oxcs8c'),
(108, 'B108', 2, 'rt7fzv11oxcs8c'),
(109, 'B109', 2, 'rt7fzv11oxcs8c'),
(110, 'B110', 2, 'rt7fzv11oxcs8c'),
(111, 'B111', 2, 'rt7fzv11oxcs8c'),
(112, 'B112', 2, 'rt7fzv11oxcs8c'),
(113, 'B113', 2, 'rt7fzv11oxcs8c'),
(114, 'B114', 2, 'rt7fzv11oxcs8c'),
(115, 'B115', 2, 'rt7fzv11oxcs8c'),
(116, 'B116', 2, 'rt7fzv11oxcs8c'),
(117, 'B117', 2, 'rt7fzv11oxcs8c'),
(118, 'B118', 2, 'rt7fzv11oxcs8c'),
(119, 'B119', 2, 'rt7fzv11oxcs8c'),
(120, 'B120', 2, 'rt7fzv11oxcs8c'),
(121, 'B121', 2, 'rt7fzv11oxcs8c'),
(122, 'B122', 2, 'rt7fzv11oxcs8c'),
(123, 'B123', 2, 'rt7fzv11oxcs8c'),
(124, 'B124', 2, 'rt7fzv11oxcs8c'),
(125, 'B125', 2, 'rt7fzv11oxcs8c'),
(126, 'B126', 2, 'rt7fzv11oxcs8c'),
(127, 'B127', 2, 'rt7fzv11oxcs8c'),
(128, 'B128', 2, 'rt7fzv11oxcs8c'),
(129, 'B129', 2, 'rt7fzv11oxcs8c'),
(130, 'B130', 2, 'rt7fzv11oxcs8c'),
(131, 'B131', 2, 'rt7fzv11oxcs8c'),
(132, 'B132', 2, 'rt7fzv11oxcs8c'),
(133, 'B133', 2, 'rt7fzv11oxcs8c'),
(134, 'B134', 2, 'rt7fzv11oxcs8c'),
(135, 'B135', 2, 'rt7fzv11oxcs8c'),
(136, 'B136', 2, 'rt7fzv11oxcs8c'),
(137, 'B137', 2, 'rt7fzv11oxcs8c'),
(138, 'B138', 2, 'rt7fzv11oxcs8c'),
(139, 'B139', 2, 'rt7fzv11oxcs8c'),
(140, 'B140', 2, 'rt7fzv11oxcs8c'),
(141, 'B141', 2, 'rt7fzv11oxcs8c'),
(142, 'B142', 2, 'rt7fzv11oxcs8c'),
(143, 'B143', 2, 'rt7fzv11oxcs8c'),
(144, 'B144', 2, 'rt7fzv11oxcs8c'),
(145, 'B145', 2, 'rt7fzv11oxcs8c'),
(146, 'B146', 2, 'rt7fzv11oxcs8c'),
(147, 'B147', 2, 'rt7fzv11oxcs8c'),
(148, 'B148', 2, 'rt7fzv11oxcs8c'),
(149, 'B149', 2, 'rt7fzv11oxcs8c'),
(150, 'B150', 2, 'rt7fzv11oxcs8c'),
(151, 'B151', 2, 'rt7fzv11oxcs8c'),
(152, 'B152', 2, 'rt7fzv11oxcs8c'),
(153, 'B153', 2, 'rt7fzv11oxcs8c'),
(154, 'B154', 2, 'rt7fzv11oxcs8c'),
(155, 'B155', 2, 'rt7fzv11oxcs8c'),
(156, 'B156', 2, 'rt7fzv11oxcs8c'),
(157, 'B157', 2, 'rt7fzv11oxcs8c'),
(158, 'B158', 2, 'rt7fzv11oxcs8c'),
(159, 'B159', 2, 'rt7fzv11oxcs8c'),
(160, 'B160', 2, 'rt7fzv11oxcs8c'),
(161, 'B161', 2, 'rt7fzv11oxcs8c'),
(162, 'B162', 2, 'rt7fzv11oxcs8c'),
(163, 'B163', 2, 'rt7fzv11oxcs8c'),
(164, 'B164', 2, 'rt7fzv11oxcs8c'),
(165, 'B165', 2, 'rt7fzv11oxcs8c'),
(166, 'B166', 2, 'rt7fzv11oxcs8c'),
(167, 'B167', 2, 'rt7fzv11oxcs8c'),
(168, 'B168', 2, 'rt7fzv11oxcs8c'),
(169, 'B169', 2, 'rt7fzv11oxcs8c'),
(170, 'B170', 2, 'rt7fzv11oxcs8c'),
(171, 'B171', 2, 'rt7fzv11oxcs8c'),
(172, 'B172', 2, 'rt7fzv11oxcs8c'),
(173, 'B173', 2, 'rt7fzv11oxcs8c'),
(174, 'B174', 2, 'rt7fzv11oxcs8c'),
(175, 'B175', 2, 'rt7fzv11oxcs8c'),
(176, 'B176', 2, 'rt7fzv11oxcs8c'),
(177, 'B177', 2, 'rt7fzv11oxcs8c'),
(178, 'B178', 2, 'rt7fzv11oxcs8c'),
(179, 'B179', 2, 'rt7fzv11oxcs8c'),
(180, 'B180', 2, 'rt7fzv11oxcs8c'),
(181, 'B181', 2, 'rt7fzv11oxcs8c'),
(182, 'B182', 2, 'rt7fzv11oxcs8c'),
(183, 'B183', 2, 'rt7fzv11oxcs8c'),
(184, 'B184', 2, 'rt7fzv11oxcs8c'),
(185, 'B185', 2, 'rt7fzv11oxcs8c'),
(186, 'B186', 2, 'rt7fzv11oxcs8c'),
(187, 'B187', 2, 'rt7fzv11oxcs8c'),
(188, 'B188', 2, 'rt7fzv11oxcs8c'),
(189, 'B189', 2, 'rt7fzv11oxcs8c'),
(190, 'B190', 2, 'rt7fzv11oxcs8c'),
(191, 'B191', 2, 'rt7fzv11oxcs8c'),
(192, 'B192', 2, 'rt7fzv11oxcs8c'),
(193, 'B193', 2, 'rt7fzv11oxcs8c'),
(194, 'B194', 2, 'rt7fzv11oxcs8c'),
(195, 'B195', 2, 'rt7fzv11oxcs8c'),
(196, 'B196', 2, 'rt7fzv11oxcs8c'),
(197, 'B197', 2, 'rt7fzv11oxcs8c'),
(198, 'B198', 2, 'rt7fzv11oxcs8c'),
(199, 'B199', 2, 'rt7fzv11oxcs8c'),
(200, 'B200', 2, 'rt7fzv11oxcs8c'),
(201, 'E001', 6, '1hn808v11oys8ks'),
(202, 'E002', 6, '1hn808v11oys8ks'),
(203, 'E003', 6, '1hn808v11oys8ks'),
(204, 'E004', 6, '1hn808v11oys8ks'),
(205, 'E005', 6, '1hn808v11oys8ks'),
(206, 'E006', 6, '1hn808v11oys8ks'),
(207, 'E007', 6, '1hn808v11oys8ks'),
(208, 'E008', 6, '1hn808v11oys8ks'),
(209, 'E009', 6, '1hn808v11oys8ks'),
(210, 'E010', 6, '1hn808v11oys8ks'),
(211, 'E011', 6, '1hn808v11oys8ks'),
(212, 'E012', 6, '1hn808v11oys8ks'),
(213, 'E013', 6, '1hn808v11oys8ks'),
(214, 'E014', 6, '1hn808v11oys8ks'),
(215, 'E015', 6, '1hn808v11oys8ks'),
(216, 'E016', 6, '1hn808v11oys8ks'),
(217, 'E017', 6, '1hn808v11oys8ks'),
(218, 'E018', 6, '1hn808v11oys8ks'),
(219, 'E019', 6, '1hn808v11oys8ks'),
(220, 'E020', 6, '1hn808v11oys8ks'),
(221, 'E021', 6, '1hn808v11oys8ks'),
(222, 'E022', 6, '1hn808v11oys8ks'),
(223, 'E023', 6, '1hn808v11oys8ks'),
(224, 'E024', 6, '1hn808v11oys8ks'),
(225, 'E025', 6, '1hn808v11oys8ks'),
(226, 'E026', 6, '1hn808v11oys8ks'),
(227, 'E027', 6, '1hn808v11oys8ks'),
(228, 'E028', 6, '1hn808v11oys8ks'),
(229, 'E029', 6, '1hn808v11oys8ks'),
(230, 'E030', 6, '1hn808v11oys8ks'),
(231, 'E031', 6, '1hn808v11oys8ks'),
(232, 'E032', 6, '1hn808v11oys8ks'),
(233, 'E033', 6, '1hn808v11oys8ks'),
(234, 'E034', 6, '1hn808v11oys8ks'),
(235, 'E035', 6, '1hn808v11oys8ks'),
(236, 'E036', 6, '1hn808v11oys8ks'),
(237, 'E037', 6, '1hn808v11oys8ks'),
(238, 'E038', 6, '1hn808v11oys8ks'),
(239, 'E039', 6, '1hn808v11oys8ks'),
(240, 'E040', 6, '1hn808v11oys8ks'),
(241, 'E041', 6, '1hn808v11oys8ks'),
(242, 'E042', 6, '1hn808v11oys8ks'),
(243, 'E043', 6, '1hn808v11oys8ks'),
(244, 'E044', 6, '1hn808v11oys8ks'),
(245, 'E045', 6, '1hn808v11oys8ks'),
(246, 'E046', 6, '1hn808v11oys8ks'),
(247, 'E047', 6, '1hn808v11oys8ks'),
(248, 'E048', 6, '1hn808v11oys8ks'),
(249, 'E049', 6, '1hn808v11oys8ks'),
(250, 'E050', 6, '1hn808v11oys8ks'),
(251, 'E051', 6, '1hn808v11oys8ks'),
(252, 'E052', 6, '1hn808v11oys8ks'),
(253, 'E053', 6, '1hn808v11oys8ks'),
(254, 'E054', 6, '1hn808v11oys8ks');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(15) NOT NULL,
  `nama_karyawan` varchar(55) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(75) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `username`, `password`, `status`) VALUES
('1l8ix80njphc4ck', 'Fadjhar', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0'),
('awdwd3ad2', 'demo', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghuni`
--

CREATE TABLE `penghuni` (
  `id_penghuni` int(15) NOT NULL,
  `nama_penghuni` varchar(100) NOT NULL,
  `no_ktp` int(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `nama_penghuni`, `no_ktp`, `email`, `nomor_hp`) VALUES
(19, 'Fadjhar', 2147483647, 'fadjharganteng123@gmail.com', '08752425555'),
(20, 'demo', 2147483647, 'demo@example.com', '08932645327');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan_kamar`
--

CREATE TABLE `perbaikan_kamar` (
  `id_perbaikan` int(15) NOT NULL,
  `id_kamar` int(15) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `catatan` text NOT NULL,
  `id_karyawan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perbaikan_kamar`
--

INSERT INTO `perbaikan_kamar` (`id_perbaikan`, `id_kamar`, `tgl_mulai`, `tgl_selesai`, `catatan`, `id_karyawan`) VALUES
(9, 2, '2020-02-14', '2020-02-20', 'renovasi ', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_hari`
--

CREATE TABLE `tipe_hari` (
  `id_tipehari` int(15) NOT NULL,
  `nama_tipehari` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipekamar` varchar(15) NOT NULL,
  `nama_tipekamar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipekamar`, `nama_tipekamar`) VALUES
('1hn808v11oys8ks', 'Deluxe'),
('27touhas1p0kok0', 'tayo'),
('rt7fzv11oxcs8c', 'Premium');

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id_option` int(15) NOT NULL,
  `nama_hotel` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlpn` char(15) NOT NULL,
  `salam` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `website`
--

INSERT INTO `website` (`id_option`, `nama_hotel`, `alamat`, `no_tlpn`, `salam`) VALUES
(1, 'Fadjhar Hotel Melati', 'Jl Wahidin No 169 Belakang Smk Wahidin ', '08211231232', 'Thank you for your visit we hope you will come back someday');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `fasilitas_tipekamer`
--
ALTER TABLE `fasilitas_tipekamer`
  ADD PRIMARY KEY (`id_fasilitastambahan`);

--
-- Indeks untuk tabel `harga_kamar`
--
ALTER TABLE `harga_kamar`
  ADD PRIMARY KEY (`id_hargakamar`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`);

--
-- Indeks untuk tabel `perbaikan_kamar`
--
ALTER TABLE `perbaikan_kamar`
  ADD PRIMARY KEY (`id_perbaikan`);

--
-- Indeks untuk tabel `tipe_hari`
--
ALTER TABLE `tipe_hari`
  ADD PRIMARY KEY (`id_tipehari`);

--
-- Indeks untuk tabel `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipekamar`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_option`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_tipekamer`
--
ALTER TABLE `fasilitas_tipekamer`
  MODIFY `id_fasilitastambahan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `harga_kamar`
--
ALTER TABLE `harga_kamar`
  MODIFY `id_hargakamar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT untuk tabel `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `perbaikan_kamar`
--
ALTER TABLE `perbaikan_kamar`
  MODIFY `id_perbaikan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tipe_hari`
--
ALTER TABLE `tipe_hari`
  MODIFY `id_tipehari` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `website`
--
ALTER TABLE `website`
  MODIFY `id_option` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
