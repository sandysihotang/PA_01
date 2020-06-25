-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 03:57 PM
-- Server version: 10.5.2-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pa01`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` varchar(50) NOT NULL,
  `email` varchar(191) NOT NULL DEFAULT 'test@gmail.com',
  `username` varbinary(50) NOT NULL,
  `password` varbinary(1000) NOT NULL,
  `state_change_password` tinyint(1) NOT NULL DEFAULT 0,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `username`, `password`, `state_change_password`, `role`) VALUES
('01212345678', 'yuliantisimatupang@gmail.com', 0x79756c69616e7469, 0x6539353039663934393233333338323865313762663533636231353362336337, 0, 1),
('01293912423', 'sandysihotang12@gmail.com', 0x6a756c69616e7479, 0x3865316130373065396230333430646132623065613466313933633137326630, 0, 1),
('1', 'test@gmail.com', 0x61646d696e, 0x3231323332663239376135376135613734333839346130653461383031666333, 0, 2),
('1212032011980001', 'test@gmail.com', 0x73616e6479, 0x6261383533633535306131363837643363633931326165663739663835376333, 0, 1),
('1212088726263563', 'sandysihotang12@gmail.com', 0x7361726168, 0x3865316130373065396230333430646132623065613466313933633137326630, 0, 1),
('122421341', 'test@gmail.com', 0x656b6f, 0x6535656139623664373130383664666566336131356637323661626363356266, 0, 1),
('123512423', 'sandysihotang868@gmail.com', 0x73616472, 0x3865316130373065396230333430646132623065613466313933633137326630, 1, 1),
('123543', 'test@gmail.com', 0x747269736e61, 0x6262333636376335323231643638356431383130613339656438616630323235, 0, 1),
('124234', 'test@gmail.com', 0x746f70616c, 0x6538373530396530366337393463333637346166343164613331663366663036, 0, 1),
('132e23', 'test@gmail.com', 0x736f746172646f6b3132, 0x6436383661353366623836613663333166613666616131643933333332363765, 0, 1),
('1452010', 'test@gmail.com', 0x77696e6461, 0x6165643261656334316266643764646235356232316633636532303663363662, 0, 1),
('2', 'test@gmail.com', 0x6b61736972, 0x6337393131616633616462643132613033356232383935353664393634373061, 0, 3),
('3443543456677', 'test@gmail.com', 0x726f6e616c646f737467, 0x3162643732303938363264383163333334373238663833656432363936653466, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `activity_user`
--

CREATE TABLE `activity_user` (
  `id` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `type_activity` int(11) NOT NULL DEFAULT 0,
  `Activity` text NOT NULL,
  `current_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_user`
--

INSERT INTO `activity_user` (`id`, `id_user`, `type_activity`, `Activity`, `current_create`) VALUES
(1, '123512423', 1, 'Change Password', '2019-12-24 14:09:26'),
(2, '123512423', 1, 'Change Password', '2020-01-09 09:00:08'),
(3, '124234', 0, 'Telah melakukan pemesanan makanan dengan NO Order: GS-00001 dengan metode bayar: ATM', '2020-01-10 07:33:01'),
(4, '124234', 0, 'Telah melakukan pemesanan makanan dengan NO Order: GS-00001 dengan metode bayar: ATM', '2020-01-10 07:33:04'),
(5, '123512423', 1, 'Change Password', '2020-01-10 08:54:39'),
(6, '124234', 0, 'Telah melakukan pemesanan makanan dengan NO Order: GS-00001 dengan metode bayar: ATM', '2020-01-12 10:39:28'),
(7, '124234', 0, 'Telah melakukan pemesanan makanan dengan NO Order: GS-00001 dengan metode bayar: ATM', '2020-01-12 10:50:59'),
(8, '123512423', 1, 'Change Password', '2020-01-13 13:18:37'),
(9, '1212032011980001', 0, 'Telah melakukan pemesanan makanan dengan NO Order: GS-00007 dengan metode bayar: ATM', '2020-01-13 13:28:52'),
(10, '1212032011980001', 0, 'Telah melakukan pemesanan makanan dengan NO Order: GS-00007 dengan metode bayar: ATM', '2020-01-13 13:28:56'),
(11, '01293912423', 1, 'Change Password', '2020-01-13 13:34:04'),
(12, '01212345678', 1, 'Change Password', '2020-01-14 03:23:02'),
(13, '01212345678', 0, 'Telah melakukan pemesanan makanan dengan NO Order: GS-00016 dengan metode bayar: ATM', '2020-01-14 04:06:39'),
(14, '01212345678', 0, 'Telah melakukan pemesanan makanan dengan NO Order: GS-00016 dengan metode bayar: ATM', '2020-01-14 06:19:34'),
(15, '01212345678', 1, 'Change Password', '2020-01-14 07:50:36'),
(16, '01212345678', 1, 'Change Password', '2020-01-14 08:14:01'),
(17, '01212345678', 0, 'Telah melakukan pemesanan makanan dengan NO Order: GS-00016 dengan metode bayar: ATM', '2020-01-14 08:20:20'),
(18, '01212345678', 0, 'Telah melakukan pemesanan makanan dengan NO Order: 1924022ac23e03195d0ff26d779f86b8 dengan metode bayar: ATM', '2020-01-15 03:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `all_pemesanan`
--

CREATE TABLE `all_pemesanan` (
  `id` varchar(200) NOT NULL,
  `tanggal_ambil` datetime DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `pelanggan` varchar(200) NOT NULL,
  `metode_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(300) DEFAULT NULL,
  `status_bayar` varchar(100) NOT NULL,
  `tanggal_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_pemesanan`
--

INSERT INTO `all_pemesanan` (`id`, `tanggal_ambil`, `total_harga`, `pelanggan`, `metode_bayar`, `bukti_bayar`, `status_bayar`, `tanggal_selesai`) VALUES
('GS-00001', '2018-06-26 12:21:00', 2147483647, '124234', 2, 'asf', 'Selesai', '2018-06-30 06:19:11'),
('GS-00002', '2018-07-01 22:50:00', 49039000, '2', 1, NULL, 'Selesai', '2018-07-01 23:05:19'),
('GS-00003', '2018-07-01 22:50:26', 49039000, '2', 1, NULL, 'Selesai', '2018-07-01 23:05:22'),
('GS-00004', '2018-07-01 23:01:45', 49039000, '2', 1, NULL, 'Selesai', '2018-07-01 23:05:24'),
('GS-00005', '2018-07-01 23:04:29', 49039000, '2', 1, NULL, 'Selesai', '2018-07-01 23:05:26'),
('GS-00006', '2018-07-01 23:07:34', 9686000, '2', 1, NULL, 'Selesai', '2018-07-01 23:08:45'),
('GS-00007', '2018-07-31 12:12:00', 1845000, '1212032011980001', 2, 'bukti-air mineral.jpg', 'Selesai', '2018-07-03 10:38:28'),
('GS-00008', '2018-07-02 17:19:48', 4372000, '2', 1, NULL, 'Selesai', '2018-07-02 17:20:38'),
('GS-00009', '2018-07-25 12:12:00', 3347000, '1212032011980001', 2, 'bukti-minuman-043533chocolate frappe.jpg', 'Selesai', '2018-07-03 10:41:40'),
('GS-00010', '2018-07-03 10:42:28', 1222930000, '2', 1, NULL, 'Selesai', '2018-07-03 10:43:08'),
('GS-00011', '2020-01-10 21:21:00', 136000, '1212088726263563', 2, 'bukti-ny-meme.png', 'Selesai', '2020-01-10 14:33:04'),
('GS-00012', '2020-01-13 12:12:00', 989000, '1212088726263563', 2, 'bukti-ny-meme.png', 'Selesai', '2020-01-12 17:39:28'),
('GS-00013', '2020-01-20 12:12:00', 492000, '1212088726263563', 2, 'bukti-ny-meme.png', 'Selesai', '2020-01-12 17:50:59'),
('GS-00014', '2020-01-14 09:01:00', 1008000, '1212088726263563', 2, 'bukti-ny-meme.png', 'Selesai', '2020-01-13 20:28:56'),
('GS-00015', '2020-01-13 23:23:00', 205000, '123512423', 2, 'bukti-ny-meme.png', 'Selesai', '2020-01-13 20:28:52'),
('GS-00016', '2020-01-14 12:12:00', 533000, '01212345678', 2, 'bukti-ny-meme.png', 'Selesai', '2020-01-14 11:06:39'),
('GS-00017', '2020-01-14 13:31:00', 41000, '01212345678', 2, 'bukti-ny-meme.png', 'Selesai', '2020-01-14 13:19:34'),
('GS-00018', '2020-01-15 12:12:00', 86000, '01212345678', 2, 'bukti-itdel.jpg', 'Konfirmasi', NULL),
('GS-00019', '2020-01-16 12:02:00', 82000, '01212345678', 2, 'bukti-itdel.jpg', 'Selesai', '2020-01-14 15:20:20'),
('GS-00020', '2020-01-15 11:11:00', 86000, '01212345678', 2, 'bukti-itdel.jpg', 'Selesai', '2020-01-15 10:55:45'),
('GS-00021', '2020-02-27 15:00:00', 125000, '1452010', 2, 'bukti-itdel.jpg', 'Konfirmasi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_meja`
--

CREATE TABLE `booking_meja` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `tangal_pemakaian` datetime NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) NOT NULL,
  `volume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_meja`
--

INSERT INTO `booking_meja` (`id_pemesanan`, `id_pelanggan`, `tangal_pemakaian`, `status`, `jenis`, `volume`) VALUES
(1, '1212032011980001', '2018-05-22 12:12:00', 'Selesai', 'Party', 1),
(2, '1212032011980001', '2018-05-09 12:12:00', 'Selesai', 'Party', 1),
(3, '1212032011980001', '2018-05-14 12:12:00', 'Selesai', 'Party', 1),
(4, '1212032011980001', '2018-05-23 12:21:00', 'Selesai', 'Party', 1),
(5, '1212032011980001', '2018-06-12 12:12:00', 'Selesai', 'Party', 1),
(6, '1452010', '2018-06-28 12:12:00', 'Selesai', 'Biasa', 4),
(7, '3443543456677', '2018-06-29 13:00:00', 'Selesai', 'Pertemuan', 10);

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `Deskripsi` text NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`id`, `Deskripsi`, `img`) VALUES
(1, 'Gastro Sijabu Jabu', 'galery-091842IMG-20180511-WA0002.jpg'),
(3, 'Pemilik Cafe Gastro', 'galery-051854galery-112259gastro1.jpg'),
(5, 'Pelanggan yang sedang berfoto', 'galery-162216WhatsApp Image 2018-06-27 at 16.56.36.jpeg'),
(7, 'Pemandangan Cafe di malam hari.', 'galery-162328WhatsApp Image 2018-06-27 at 16.56.00.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `deskripsi` text NOT NULL,
  `Judul` varchar(500) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `gambar`, `deskripsi`, `Judul`, `date`) VALUES
(3, 'informasi-050543logo.jpg', 'Gastro??? \r\nMungkin dalam benak para pelanggan, Kenapa namanya Gastro?\r\nSementara jika dilihat dari bangunan cafe, cafe ini memiliki tampilan bangunan yang klasik berbeda dengan namanya.\r\nCafe ini diberi nama gastro karena kakak dari pemilik cafe ini merupakan seorang yang bekerja pada bidang kesehatan. Dimana, gastro yang berarti lambung dan dikaitkankanlah lambung tersebut dengan makanan. Lambung akan terasa nyaman ketika makanan yang disantap nikmat dan sehat. ', 'Sejarah nama Cafe Gastro', '2018-06-21 10:05:43'),
(5, 'informasi-051408informasi-051304IMG_20180621_100810.jpg', 'Pemilik dari cafe gastro ini ialah sepasang kekasih yang bernama Ticno Nababan dan Trisna Manurung.', 'Pemilik Cafe', '2018-06-21 10:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_komentar` varchar(200) NOT NULL,
  `komentar` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_komentar`, `komentar`, `date`) VALUES
(7, '1212032011980001', 'Lumayan lah\r\n', '2018-05-24 09:10:37'),
(9, '1', 'Makasih komentarnya\r\n', '2018-05-24 09:14:13'),
(12, '1212032011980001', 'Masakannya kok Agak gosong ya\r\n', '2018-05-24 16:09:52'),
(13, '1', 'maaf ya @sandy sihotang \r\nakan kami perbaiki', '2018-05-24 16:10:41'),
(14, '1212032011980001', 'ok Bos gastro', '2018-05-24 16:11:13'),
(15, '3443543456677', 'Makanannya enak. Kami sangat puas. terus murah lagi . Terima kasih atas layanannya', '2018-06-27 23:47:45'),
(16, '1', 'Trima kasih mas Ronaldo . ', '2018-06-27 23:49:32'),
(17, '1452010', 'apaan sih mas kok nasigoreng nya pake kuah,, aku', '2018-06-28 01:19:56'),
(18, '122421341', 'alah,, enak kali lah minuman kau ini lae, sor kali aku, ga nyesal lah aku ngutang ya...', '2018-06-28 01:24:46'),
(19, '1212088726263563', 'Makanan Nya enak\r\n', '2018-06-28 08:16:33'),
(20, '1', 'Terimakasih @sarah', '2018-06-28 08:17:29'),
(21, '123543', 'Makanan nya enak', '2018-06-28 09:20:22'),
(22, '1', 'Terimakasih @trisna\r\n', '2018-06-28 09:21:19'),
(23, '1212088726263563', '<button>sandy</button>', '2020-01-09 16:33:20'),
(24, '1212088726263563', '333333', '2020-01-10 10:43:48'),
(25, '1212088726263563', '333333', '2020-01-10 10:45:16'),
(26, '1212088726263563', '', '2020-01-10 10:46:48'),
(27, '1212088726263563', 'dvgdvg', '2020-01-10 10:48:20'),
(28, '1212088726263563', 'dvgdvg', '2020-01-10 10:50:27'),
(29, '1212088726263563', '?vfulswAdohuw+*vvv*,?2vfulswA', '2020-01-10 10:52:29'),
(30, '1212088726263563', '?exwwrqAVDQG?2exwwrqA', '2020-01-10 10:53:02'),
(31, '1212088726263563', '?exwwrqAVDQG?2exwwrqA', '2020-01-10 10:53:17'),
(32, '1212088726263563', '?exwwrqAVDQG|?2exwwrqA', '2020-01-10 10:53:37'),
(33, '1212088726263563', 'gdevgdvng#dmvgq#dv#ndvgvd', '2020-01-10 10:58:16'),
(34, '01212345678', '?vfulswAdohuw+kd|,>?2vfulswA', '2020-01-14 10:44:01'),
(35, '01212345678', 'pdndqdq#q|d#hqdn', '2020-01-14 10:44:24'),
(36, '01212345678', 'asdas', '2020-01-14 13:26:09'),
(37, '01212345678', 'dvegmdv*', '2020-01-14 13:27:12'),
(38, '01212345678', '*', '2020-01-14 15:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `idmenu` int(11) NOT NULL,
  `nama_makanan` varchar(100) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `Harga` int(100) NOT NULL,
  `status` int(100) DEFAULT NULL,
  `status_promosi` varchar(30) NOT NULL,
  `tgl_tambah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`idmenu`, `nama_makanan`, `deskripsi`, `gambar`, `Harga`, `status`, `status_promosi`, `tgl_tambah`) VALUES
(17, 'Chicken Steak Chrispy', 'Ayam Steak dengan Taburan crispi yang lezat', 'makanan-123316makanan-032619IMG-20180511-WA0007.jpg', 43000, 1, 'Promosikan', '2018-07-02 17:33:16'),
(18, 'Chicken Katsu Teriyaki', 'Makanan yang khas dari negara tirai Bambu', 'makanan-123357IMG-20180421-WA0012.jpg', 41000, 1, 'Promosikan', '2018-07-02 17:33:57'),
(19, 'Ayam Geprek Tristic', '', 'makanan-042042IMG-20180421-WA0013.jpg', 27000, 1, 'Tidak dipromosikan', '2018-07-05 00:00:00'),
(20, 'Onion Ring', '', 'makanan-042110IMG-20180421-WA0015.jpg', 17000, 1, 'Tidak dipromosikan', '2018-07-06 00:00:00'),
(21, 'Nasi Bistik Ayam', '', 'makanan-042205bistik ayam.jpg', 26000, 1, 'Tidak dipromosikan', '2018-07-07 00:00:00'),
(22, 'Dimsum Ayam', '', 'makanan-042254dimsum ayam.jpg', 23000, 1, 'Tidak dipromosikan', '2018-07-08 00:00:00'),
(23, 'Dimsum Udang', '', 'makanan-042325dim udang.jpg', 28000, 1, 'Tidak dipromosikan', '2018-07-09 00:00:00'),
(24, 'Dimsum Rumput Laut', '', 'makanan-042406dim rumput laut.jpg', 25000, 1, 'Tidak dipromosikan', '2018-07-10 00:00:00'),
(25, 'Lumpia Goreng', '', 'makanan-042436lumpia goreng.jpg', 27000, 1, 'Tidak dipromosikan', '2018-07-11 00:00:00'),
(26, 'French Fries', '', 'makanan-042507french fries.jpg', 16000, 1, 'Tidak dipromosikan', '2018-07-12 00:00:00'),
(27, 'Nugget Stick', '', 'makanan-042607makanan-130025nugget.jpg', 16000, 1, 'Tidak dipromosikan', '2018-07-13 00:00:00'),
(28, 'Cumi Tepung', '', 'makanan-042649cumi tepung.jpg', 31000, 1, 'Tidak dipromosikan', '2018-07-14 00:00:00'),
(29, 'Ayam Cabe Hijau', '', 'makanan-042709ayam cabe hijau.jpg', 29000, 1, 'Tidak dipromosikan', '2018-07-15 00:00:00'),
(30, 'Nasi Putih', '', 'makanan-043040Nasi Putih.jpg', 7000, 1, 'Tidak dipromosikan', '2018-07-16 00:00:00'),
(31, 'Smoothies Bowl', '', 'makanan-043157smoothies bowl.jpg', 40000, 1, 'Tidak dipromosikan', '2018-07-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id` int(11) NOT NULL,
  `cara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`id`, `cara`) VALUES
(1, 'Cash'),
(2, 'ATM');

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id_minum` int(11) NOT NULL,
  `nama_minuman` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_promosi` varchar(100) NOT NULL,
  `tgl_tambah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id_minum`, `nama_minuman`, `deskripsi`, `gambar`, `harga`, `status`, `status_promosi`, `tgl_tambah`) VALUES
(13, 'Taro Frappe', '', 'makanan-043349makanan-112845taro frappe.jpg', 29000, 1, 'Promosikan', '2018-07-01 00:00:00'),
(14, 'Bubble Gum Frappe', 'Minuman Rasa Permen Karet', 'makanan-161420bubble frappe.jpg', 27000, 1, 'Promosikan', '2018-07-02 00:00:00'),
(15, 'Chocolate Frappe', '', 'makanan-044742chocolate frappe.jpg', 29000, 1, 'Tidak dipromosikan', '2018-07-03 00:00:00'),
(16, 'Hazelnut Frappe', '', 'makanan-044807hazelnut frappe.jpg', 27000, 1, 'Tidak dipromosikan', '2018-07-04 00:00:00'),
(17, 'Vanilla Oreo Frappe', '', 'minuman-043722minuman-131229vanilla oreo frappe.jpg', 28000, 1, 'Tidak dipromosikan', '2018-07-05 00:00:00'),
(18, 'Green Tea Latte', '', 'minuman-043831minuman-131315green tea latte.jpg', 20000, 1, 'Tidak dipromosikan', '2018-07-06 00:00:00'),
(19, 'Taro Latte', '', 'minuman-043915minuman-113214taro latte.jpg', 22000, 1, 'Tidak dipromosikan', '2018-07-07 00:00:00'),
(21, 'Sweet Tea(P)', '', 'minuman-044204minuman-131824teh panas.jpg', 8000, 1, 'Tidak dipromosikan', '2018-07-09 00:00:00'),
(22, 'Black Coffee(P)', '', 'minuman-044240kopi panas.jpg', 10000, 1, 'Tidak dipromosikan', '2018-07-10 00:00:00'),
(23, 'Sweet Tea(D)', '', 'minuman-044727minuman-131915teh dingin.jpg', 8000, 1, 'Tidak dipromosikan', '2018-07-11 00:00:00'),
(24, 'Black Coffee(D)', '', 'minuman-044810minuman-132117kopi dingin.jpg', 10000, 1, 'Tidak dipromosikan', '2018-07-12 00:00:00'),
(25, 'Lemon Tea(P)', '', 'minuman-044928minuman-132211lemon panas.jpg', 17000, 1, 'Tidak dipromosikan', '2018-07-13 00:00:00'),
(26, 'Lychee Tea', '', 'minuman-045059lychee tea.jpg', 18000, 1, 'Tidak dipromosikan', '2018-07-14 00:00:00'),
(28, 'Sprite', '', 'minuman-045210minuman-132442sprite.jpg', 9000, 1, 'Tidak dipromosikan', '2018-07-16 00:00:00'),
(29, 'Fanta', '', 'minuman-045230fanta.jpg', 9000, 1, 'Tidak dipromosikan', '2018-07-17 00:00:00'),
(30, 'Teh Botol', '', 'minuman-045307minuman-132550teh botol.jpg', 9000, 1, 'Tidak dipromosikan', '2018-07-18 00:00:00'),
(31, 'Sop Buah', '', 'minuman-045359sop buah.jpg', 16000, 1, 'Tidak dipromosikan', '2018-07-19 00:00:00'),
(33, 'Coca-cola', 'Minuman Bersoda', 'makanan-125155coca cola.jpg', 9000, 1, 'Tidak dipromosikan', '2018-07-02 17:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `nik` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`nik`, `firstname`, `lastname`, `tlp`, `alamat`) VALUES
('01212345678', 'Yulianti', 'Simatupang', '082134567890', 'Medan'),
('01293912423', 'Julianty', 'Simatupang', '1234324', 'Bandar'),
('1212032011980001', 'Sandy', 'Sihotang', '082361631346', 'Perdagangan'),
('1212088726263563', 'sarah', 'simanjuntak', '082167856754', 'Laguboti'),
('122421341', 'Eko', 'Naldi', '091221841', 'Sibolga'),
('123512423', 'asndjan', 'jnaskjdn', 'asdas', 'asdas'),
('123543', 'Trisna', 'Manurung', '083242', 'Medan'),
('124234', 'topal', 'asdfas', '23423', 'ASfknsn'),
('132e23', 'asdsf', 'dsfsdf', '1234324', 'dfdsf'),
('1452010', 'Winda', 'Tampu', '0892318', 'Medan'),
('2', 'Kasir', 'Kasir', '4385230239', 'Siborong borong'),
('3443543456677', 'Ronaldo', 'Sitanggang', '0864367876', 'Medan');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_makanan`
--

CREATE TABLE `pemesanan_makanan` (
  `id` int(11) NOT NULL,
  `id_pemesanan` varchar(100) DEFAULT NULL,
  `id_menu` int(11) NOT NULL,
  `id_pelanggan` varchar(50) DEFAULT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_makanan`
--

INSERT INTO `pemesanan_makanan` (`id`, `id_pemesanan`, `id_menu`, `id_pelanggan`, `jumlah_pesanan`, `status_bayar`, `total_harga`) VALUES
(19, 'GS-00007', 18, '1212032011980001', 45, 'Sudah Bayar', 1845000),
(20, 'GS-00008', 18, '2', 34, 'Sudah Bayar', 1394000),
(21, 'GS-00008', 19, '2', 54, 'Sudah Bayar', 1458000),
(22, 'GS-00009', 18, '1212032011980001', 12, 'Sudah Bayar', 492000),
(23, 'GS-00009', 22, '1212032011980001', 65, 'Sudah Bayar', 1495000),
(24, 'GS-00010', 19, '2', 32, 'Sudah Bayar', 864000),
(25, 'GS-00010', 27, '2', 543, 'Sudah Bayar', 8688000),
(26, 'GS-00011', 18, '1212088726263563', 2, 'Sudah Bayar', 82000),
(28, 'GS-00012', 17, '1212088726263563', 23, 'Sudah Bayar', 989000),
(29, 'GS-00013', 18, '1212088726263563', 12, 'Sudah Bayar', 492000),
(30, 'GS-00014', 17, '1212088726263563', 12, 'Sudah Bayar', 516000),
(31, 'GS-00014', 18, '1212088726263563', 12, 'Sudah Bayar', 492000),
(32, 'GS-00015', 18, '123512423', 5, 'Sudah Bayar', 205000),
(33, 'GS-00016', 18, '01212345678', 12, 'Sudah Bayar', 492000),
(34, 'GS-00016', 18, '01212345678', 1, 'Sudah Bayar', 41000),
(35, 'GS-00017', 18, '01212345678', 1, 'Sudah Bayar', 41000),
(39, 'GS-00018', 17, '01212345678', 1, 'Belum dibayar', 43000),
(40, 'GS-00018', 17, '01212345678', 1, 'Belum dibayar', 43000),
(41, 'GS-00019', 18, '01212345678', 2, 'Sudah Bayar', 82000),
(42, 'GS-00020', 17, '01212345678', 2, 'Sudah Bayar', 86000),
(43, 'GS-00021', 18, '1452010', 2, 'Belum dibayar', 82000),
(44, 'GS-00021', 17, '1452010', 1, 'Belum dibayar', 43000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_minuman`
--

CREATE TABLE `pemesanan_minuman` (
  `id` int(11) NOT NULL,
  `id_pemesanan` varchar(200) DEFAULT NULL,
  `Id_menu_minum` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan_minuman`
--

INSERT INTO `pemesanan_minuman` (`id`, `id_pemesanan`, `Id_menu_minum`, `id_pelanggan`, `jumlah_pesanan`, `status_bayar`, `total_harga`) VALUES
(9, 'GS-00006', 13, '2', 334, 'Sudah Bayar', 9686000),
(10, 'GS-00008', 18, '2', 76, 'Sudah Bayar', 1520000),
(11, 'GS-00009', 15, '1212032011980001', 32, 'Sudah Bayar', 928000),
(12, 'GS-00009', 21, '1212032011980001', 54, 'Sudah Bayar', 432000),
(13, 'GS-00010', 19, '2', 53443, 'Sudah Bayar', 1175746000),
(14, 'GS-00010', 31, '2', 2352, 'Sudah Bayar', 37632000),
(15, 'GS-00011', 14, '1212088726263563', 2, 'Sudah Bayar', 54000);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `deskripsi`) VALUES
(1, 'Pelanggan'),
(2, 'Administrator'),
(3, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `status_makanan_minuman`
--

CREATE TABLE `status_makanan_minuman` (
  `id` int(11) NOT NULL,
  `varchar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_makanan_minuman`
--

INSERT INTO `status_makanan_minuman` (`id`, `varchar`) VALUES
(1, 'Tersedia'),
(2, 'Tidak Tersedia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `activity_user`
--
ALTER TABLE `activity_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_user_id` (`id_user`);

--
-- Indexes for table `all_pemesanan`
--
ALTER TABLE `all_pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan` (`pelanggan`),
  ADD KEY `metode_bayar` (`metode_bayar`);

--
-- Indexes for table `booking_meja`
--
ALTER TABLE `booking_meja`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_ibfk_1` (`id_komentar`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`idmenu`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minum`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pemesanan_makanan`
--
ALTER TABLE `pemesanan_makanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `pemesanan_minuman`
--
ALTER TABLE `pemesanan_minuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_menu_minum` (`Id_menu_minum`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_makanan_minuman`
--
ALTER TABLE `status_makanan_minuman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_user`
--
ALTER TABLE `activity_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking_meja`
--
ALTER TABLE `booking_meja`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id_minum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pemesanan_makanan`
--
ALTER TABLE `pemesanan_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pemesanan_minuman`
--
ALTER TABLE `pemesanan_minuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`);

--
-- Constraints for table `activity_user`
--
ALTER TABLE `activity_user`
  ADD CONSTRAINT `fk_foreign_user_id` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`);

--
-- Constraints for table `all_pemesanan`
--
ALTER TABLE `all_pemesanan`
  ADD CONSTRAINT `all_pemesanan_ibfk_1` FOREIGN KEY (`pelanggan`) REFERENCES `pelanggan` (`nik`),
  ADD CONSTRAINT `all_pemesanan_ibfk_2` FOREIGN KEY (`metode_bayar`) REFERENCES `metode_bayar` (`id`);

--
-- Constraints for table `booking_meja`
--
ALTER TABLE `booking_meja`
  ADD CONSTRAINT `booking_meja_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`nik`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_komentar`) REFERENCES `account` (`id`);

--
-- Constraints for table `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status_makanan_minuman` (`id`);

--
-- Constraints for table `minuman`
--
ALTER TABLE `minuman`
  ADD CONSTRAINT `minuman_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status_makanan_minuman` (`id`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `account` (`id`);

--
-- Constraints for table `pemesanan_makanan`
--
ALTER TABLE `pemesanan_makanan`
  ADD CONSTRAINT `pemesanan_makanan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `makanan` (`idmenu`),
  ADD CONSTRAINT `pemesanan_makanan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`nik`),
  ADD CONSTRAINT `pemesanan_makanan_ibfk_4` FOREIGN KEY (`id_pemesanan`) REFERENCES `all_pemesanan` (`id`);

--
-- Constraints for table `pemesanan_minuman`
--
ALTER TABLE `pemesanan_minuman`
  ADD CONSTRAINT `pemesanan_minuman_ibfk_1` FOREIGN KEY (`Id_menu_minum`) REFERENCES `minuman` (`id_minum`),
  ADD CONSTRAINT `pemesanan_minuman_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`nik`),
  ADD CONSTRAINT `pemesanan_minuman_ibfk_4` FOREIGN KEY (`id_pemesanan`) REFERENCES `all_pemesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
