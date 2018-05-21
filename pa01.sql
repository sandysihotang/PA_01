-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Mei 2018 pada 09.22
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id` varchar(50) NOT NULL,
  `username` varbinary(50) NOT NULL,
  `password` varbinary(50) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`) VALUES
('1', 0x61646d696e, 0x3231323332663239376135376135613734333839346130653461383031666333, 2),
('1212032011980001', 0x73616e6479, 0x6261383533633535306131363837643363633931326165663739663835376333, 1),
('122421341', 0x656b6f, 0x6535656139623664373130383664666566336131356637323661626363356266, 1),
('124234', 0x746f70616c, 0x6538373530396530366337393463333637346166343164613331663366663036, 1),
('2', 0x6b61736972, 0x6337393131616633616462643132613033356232383935353664393634373061, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `all_pemesanan`
--

CREATE TABLE `all_pemesanan` (
  `id` varchar(200) NOT NULL,
  `tanggal_ambil` datetime DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `pelanggan` varchar(200) NOT NULL,
  `metode_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(300) DEFAULT NULL,
  `status_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `all_pemesanan`
--

INSERT INTO `all_pemesanan` (`id`, `tanggal_ambil`, `total_harga`, `pelanggan`, `metode_bayar`, `bukti_bayar`, `status_bayar`) VALUES
('141568f0485542fec3cb95c92769b228', '2018-05-15 12:45:00', 61600000, '1212032011980001', 1, NULL, 'Belum dibayar'),
('579cac72ff6c998fa5ab2787f4f81636', '2018-05-29 12:12:00', 2147483647, '1212032011980001', 1, NULL, 'Belum dibayar'),
('bae830851e6914b7b1bc8d24542c49dc', '2018-05-30 12:12:00', 189154993, '1212032011980001', 1, NULL, 'Belum dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_meja`
--

CREATE TABLE `booking_meja` (
  `id_pemesanan` varchar(50) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `no_meja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `Deskripsi` text NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galery`
--

INSERT INTO `galery` (`id`, `Deskripsi`, `img`) VALUES
(1, 'Gastro Sijabu Jabu', 'galery-091842IMG-20180511-WA0002.jpg'),
(2, 'Makanan Yang Enak', 'galery-052202IMG-20180507-WA0024.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `idmenu` int(11) NOT NULL,
  `nama_makanan` varchar(100) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `Harga` int(100) NOT NULL,
  `status` int(100) DEFAULT NULL,
  `status_promosi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`idmenu`, `nama_makanan`, `gambar`, `Harga`, `status`, `status_promosi`) VALUES
(12, 'Ayam Krispi', 'makanan-090144IMG-20180421-WA0015.jpg', 1232, 1, 'Promosikan'),
(13, 'Ayam golek', 'makanan-085733makanan-113143makanan-061552IMG-20180507-WA0031.jpg', 50000, 1, 'Promosikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `no_meja` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `volume` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id` int(11) NOT NULL,
  `cara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `metode_bayar`
--

INSERT INTO `metode_bayar` (`id`, `cara`) VALUES
(1, 'Cash'),
(2, 'ATM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minuman`
--

CREATE TABLE `minuman` (
  `id_minum` int(11) NOT NULL,
  `nama_minuman` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_promosi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `minuman`
--

INSERT INTO `minuman` (`id_minum`, `nama_minuman`, `gambar`, `harga`, `status`, `status_promosi`) VALUES
(10, 'Air Kelapa', 'makanan-090503IMG-20180507-WA0033.jpg', 1423, 2, 'Promosikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `nik` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`nik`, `firstname`, `lastname`, `tlp`, `alamat`) VALUES
('1212032011980001', 'Sandy', 'Sihotang', '082361631346', 'Perdagangan'),
('122421341', 'Eko', 'Naldi', '091221841', 'Sibolga'),
('124234', 'topal', 'asdfas', '23423', 'ASfknsn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_makanan`
--

CREATE TABLE `pemesanan_makanan` (
  `id_pemesanan` varchar(100) DEFAULT NULL,
  `id_menu` int(11) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_makanan`
--

INSERT INTO `pemesanan_makanan` (`id_pemesanan`, `id_menu`, `id_pelanggan`, `jumlah_pesanan`, `status_bayar`, `total_harga`) VALUES
('579cac72ff6c998fa5ab2787f4f81636', 12, '1212032011980001', 1234567543, 'Belum dibayar', 2147483647),
('bae830851e6914b7b1bc8d24542c49dc', 12, '1212032011980001', 12234, 'Belum dibayar', 15072288),
('141568f0485542fec3cb95c92769b228', 13, '1212032011980001', 1232, 'Belum dibayar', 61600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_minuman`
--

CREATE TABLE `pemesanan_minuman` (
  `id_pemesanan` varchar(200) DEFAULT NULL,
  `Id_menu_minum` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_minuman`
--

INSERT INTO `pemesanan_minuman` (`id_pemesanan`, `Id_menu_minum`, `id_pelanggan`, `jumlah_pesanan`, `status_bayar`, `total_harga`) VALUES
('bae830851e6914b7b1bc8d24542c49dc', 10, '1212032011980001', 122335, 'Belum dibayar', 174082705);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `deskripsi`) VALUES
(1, 'Pelanggan'),
(2, 'Administrator'),
(3, 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_makanan_minuman`
--

CREATE TABLE `status_makanan_minuman` (
  `id` int(11) NOT NULL,
  `varchar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_makanan_minuman`
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
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `no_meja` (`no_meja`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`idmenu`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

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
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `pemesanan_minuman`
--
ALTER TABLE `pemesanan_minuman`
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
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `no_meja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id_minum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`);

--
-- Ketidakleluasaan untuk tabel `all_pemesanan`
--
ALTER TABLE `all_pemesanan`
  ADD CONSTRAINT `all_pemesanan_ibfk_1` FOREIGN KEY (`pelanggan`) REFERENCES `pelanggan` (`nik`),
  ADD CONSTRAINT `all_pemesanan_ibfk_2` FOREIGN KEY (`metode_bayar`) REFERENCES `metode_bayar` (`id`);

--
-- Ketidakleluasaan untuk tabel `booking_meja`
--
ALTER TABLE `booking_meja`
  ADD CONSTRAINT `booking_meja_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`nik`),
  ADD CONSTRAINT `booking_meja_ibfk_2` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`);

--
-- Ketidakleluasaan untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status_makanan_minuman` (`id`);

--
-- Ketidakleluasaan untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD CONSTRAINT `minuman_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status_makanan_minuman` (`id`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `account` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemesanan_makanan`
--
ALTER TABLE `pemesanan_makanan`
  ADD CONSTRAINT `pemesanan_makanan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `makanan` (`idmenu`),
  ADD CONSTRAINT `pemesanan_makanan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`nik`),
  ADD CONSTRAINT `pemesanan_makanan_ibfk_4` FOREIGN KEY (`id_pemesanan`) REFERENCES `all_pemesanan` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemesanan_minuman`
--
ALTER TABLE `pemesanan_minuman`
  ADD CONSTRAINT `pemesanan_minuman_ibfk_1` FOREIGN KEY (`Id_menu_minum`) REFERENCES `minuman` (`id_minum`),
  ADD CONSTRAINT `pemesanan_minuman_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`nik`),
  ADD CONSTRAINT `pemesanan_minuman_ibfk_4` FOREIGN KEY (`id_pemesanan`) REFERENCES `all_pemesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
