/*
SQLyog Community v12.5.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - pa01
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pa01` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pa01`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `id` varchar(50) NOT NULL,
  `username` varbinary(50) NOT NULL,
  `password` varbinary(1000) NOT NULL,
  `role` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `role` (`role`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`id`,`username`,`password`,`role`) values 
('-1970545340','admin2','c84258e9c39059a89ab77d846ddab909',2),
('1','admin','21232f297a57a5a743894a0e4a801fc3',2),
('1212032011980001','sandy','ba853c550a1687d3cc912aef79f857c3',1),
('122421341','eko','e5ea9b6d71086dfef3a15f726abcc5bf',1),
('124234','topal','e87509e06c794c3674af41da31f3ff06',1),
('2','kasir','c7911af3adbd12a035b289556d96470a',3);

/*Table structure for table `all_pemesanan` */

DROP TABLE IF EXISTS `all_pemesanan`;

CREATE TABLE `all_pemesanan` (
  `id` varchar(200) NOT NULL,
  `tanggal_ambil` datetime DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `pelanggan` varchar(200) NOT NULL,
  `metode_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(300) DEFAULT NULL,
  `status_bayar` varchar(100) NOT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pelanggan` (`pelanggan`),
  KEY `metode_bayar` (`metode_bayar`),
  CONSTRAINT `all_pemesanan_ibfk_1` FOREIGN KEY (`pelanggan`) REFERENCES `pelanggan` (`nik`),
  CONSTRAINT `all_pemesanan_ibfk_2` FOREIGN KEY (`metode_bayar`) REFERENCES `metode_bayar` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `all_pemesanan` */

insert  into `all_pemesanan`(`id`,`tanggal_ambil`,`total_harga`,`pelanggan`,`metode_bayar`,`bukti_bayar`,`status_bayar`,`tanggal_selesai`) values 
('3c3c9a45920282cef7db2c75d205a6ee','2018-06-20 12:12:00',292452636,'1212032011980001',1,NULL,'Selesai','2018-06-12 17:43:12'),
('f46d935e78fddb254f2d3b2b4876d62b','2018-06-12 20:19:00',1153455105,'1212032011980001',2,'bukti-IMG-20180507-WA0025.jpg','Selesai','2018-06-12 17:52:56');

/*Table structure for table `booking_meja` */

DROP TABLE IF EXISTS `booking_meja`;

CREATE TABLE `booking_meja` (
  `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(50) NOT NULL,
  `tangal_pemakaian` datetime NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) NOT NULL,
  `volume` int(11) NOT NULL,
  PRIMARY KEY (`id_pemesanan`),
  KEY `id_pelanggan` (`id_pelanggan`),
  CONSTRAINT `booking_meja_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `booking_meja` */

insert  into `booking_meja`(`id_pemesanan`,`id_pelanggan`,`tangal_pemakaian`,`status`,`jenis`,`volume`) values 
(1,'1212032011980001','2018-05-22 12:12:00','Selesai','Party',1),
(2,'1212032011980001','2018-05-09 12:12:00','Selesai','Party',1),
(3,'1212032011980001','2018-05-14 12:12:00','Selesai','Party',1),
(4,'1212032011980001','2018-05-23 12:21:00','Selesai','Party',1),
(5,'1212032011980001','2018-06-12 12:12:00','Selesai','Party',1);

/*Table structure for table `galery` */

DROP TABLE IF EXISTS `galery`;

CREATE TABLE `galery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Deskripsi` text NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `galery` */

insert  into `galery`(`id`,`Deskripsi`,`img`) values 
(1,'Gastro Sijabu Jabu','galery-091842IMG-20180511-WA0002.jpg'),
(2,'Makanan Yang Enak','galery-052202IMG-20180507-WA0024.jpg');

/*Table structure for table `informasi` */

DROP TABLE IF EXISTS `informasi`;

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(500) NOT NULL,
  `deskripsi` text NOT NULL,
  `Judul` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `informasi` */

insert  into `informasi`(`id`,`gambar`,`deskripsi`,`Judul`,`date`) values 
(2,'informasi-161616IMG-20180507-WA0020.jpg','Setelah selesai langkah selanjutnya yang harus anda lakukan adalah melakukan koneksi ke database. Untuk melakukan koneksi di PHP adalah menggunakan function mysql_connect(db_host, db_user, db_pass) yang mempunyai 3 parameter, yaitu : db_host adalah nama server atau host tempat database disimpan, jika database anda berada pada komputer anda sendiri anda akan mengisi parameter ini dengan localhost, db_user adalah user dari database MySQL, dan db_pass password dari user database MySQL. Contoh di bawah adalah contoh untuk melakukan koneksi database db_contact_us, dimana user database MySQL dikomputer saya adalah root dan passwordnya adalah root:','Anak orang','2018-05-23 21:16:16');

/*Table structure for table `komentar` */

DROP TABLE IF EXISTS `komentar`;

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_komentar` varchar(200) NOT NULL,
  `komentar` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `komentar_ibfk_1` (`id_komentar`),
  CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_komentar`) REFERENCES `account` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `komentar` */

insert  into `komentar`(`id`,`id_komentar`,`komentar`,`date`) values 
(7,'1212032011980001','Lumayan lah\r\n','2018-05-24 09:10:37'),
(9,'1','Makasih komentarnya\r\n','2018-05-24 09:14:13'),
(12,'1212032011980001','Masakannya kok Agak gosong ya\r\n','2018-05-24 16:09:52'),
(13,'1','maaf ya @sandy sihotang \r\nakan kami perbaiki','2018-05-24 16:10:41'),
(14,'1212032011980001','ok Bos gastro','2018-05-24 16:11:13');

/*Table structure for table `makanan` */

DROP TABLE IF EXISTS `makanan`;

CREATE TABLE `makanan` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_makanan` varchar(100) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `Harga` int(100) NOT NULL,
  `status` int(100) DEFAULT NULL,
  `status_promosi` varchar(30) NOT NULL,
  PRIMARY KEY (`idmenu`),
  KEY `status` (`status`),
  CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status_makanan_minuman` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `makanan` */

insert  into `makanan`(`idmenu`,`nama_makanan`,`deskripsi`,`gambar`,`Harga`,`status`,`status_promosi`) values 
(17,'Ayam goreng','Makanan Yang dibumbui dengan tepung','makanan-151410IMG-20180507-WA0031.jpg',12456787,1,'Promosikan'),
(18,'Roti Coklat','Makanan dengan coklat diatasnya','makanan-152525IMG-20180507-WA0015.jpg',14922,1,'Promosikan');

/*Table structure for table `metode_bayar` */

DROP TABLE IF EXISTS `metode_bayar`;

CREATE TABLE `metode_bayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cara` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `metode_bayar` */

insert  into `metode_bayar`(`id`,`cara`) values 
(1,'Cash'),
(2,'ATM');

/*Table structure for table `minuman` */

DROP TABLE IF EXISTS `minuman`;

CREATE TABLE `minuman` (
  `id_minum` int(11) NOT NULL AUTO_INCREMENT,
  `nama_minuman` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_promosi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_minum`),
  KEY `status` (`status`),
  CONSTRAINT `minuman_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status_makanan_minuman` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `minuman` */

insert  into `minuman`(`id_minum`,`nama_minuman`,`deskripsi`,`gambar`,`harga`,`status`,`status_promosi`) values 
(13,'White Coffe','Kopi Unggulan di Siborong borong','minuman-151513IMG-20180507-WA0022.jpg',2343567,1,'Promosikan'),
(14,'Es Kelapa Muda','Minuman Yng sehat','minuman-124453IMG-20180507-WA0017.jpg',3345,1,'Promosikan');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `nik` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`nik`),
  CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `account` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`nik`,`firstname`,`lastname`,`tlp`,`alamat`) values 
('1212032011980001','Sandy','Sihotang','082361631346','Perdagangan'),
('122421341','Eko','Naldi','091221841','Sibolga'),
('124234','topal','asdfas','23423','ASfknsn');

/*Table structure for table `pemesanan_makanan` */

DROP TABLE IF EXISTS `pemesanan_makanan`;

CREATE TABLE `pemesanan_makanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` varchar(100) DEFAULT NULL,
  `id_menu` int(11) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_menu` (`id_menu`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_pemesanan` (`id_pemesanan`),
  CONSTRAINT `pemesanan_makanan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `makanan` (`idmenu`),
  CONSTRAINT `pemesanan_makanan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`nik`),
  CONSTRAINT `pemesanan_makanan_ibfk_4` FOREIGN KEY (`id_pemesanan`) REFERENCES `all_pemesanan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pemesanan_makanan` */

insert  into `pemesanan_makanan`(`id`,`id_pemesanan`,`id_menu`,`id_pelanggan`,`jumlah_pesanan`,`status_bayar`,`total_harga`) values 
(4,'3c3c9a45920282cef7db2c75d205a6ee',18,'1212032011980001',124,'Belum dibayar',1850328),
(5,'f46d935e78fddb254f2d3b2b4876d62b',18,'1212032011980001',23,'Belum dibayar',343206);

/*Table structure for table `pemesanan_minuman` */

DROP TABLE IF EXISTS `pemesanan_minuman`;

CREATE TABLE `pemesanan_minuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` varchar(200) DEFAULT NULL,
  `Id_menu_minum` int(11) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Id_menu_minum` (`Id_menu_minum`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_pemesanan` (`id_pemesanan`),
  CONSTRAINT `pemesanan_minuman_ibfk_1` FOREIGN KEY (`Id_menu_minum`) REFERENCES `minuman` (`id_minum`),
  CONSTRAINT `pemesanan_minuman_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`nik`),
  CONSTRAINT `pemesanan_minuman_ibfk_4` FOREIGN KEY (`id_pemesanan`) REFERENCES `all_pemesanan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `pemesanan_minuman` */

insert  into `pemesanan_minuman`(`id`,`id_pemesanan`,`Id_menu_minum`,`id_pelanggan`,`jumlah_pesanan`,`status_bayar`,`total_harga`) values 
(1,'3c3c9a45920282cef7db2c75d205a6ee',13,'1212032011980001',124,'Belum dibayar',290602308),
(2,'f46d935e78fddb254f2d3b2b4876d62b',13,'1212032011980001',123,'Belum dibayar',288258741),
(3,'f46d935e78fddb254f2d3b2b4876d62b',14,'1212032011980001',23,'Belum dibayar',76935),
(4,'f46d935e78fddb254f2d3b2b4876d62b',13,'1212032011980001',123,'Belum dibayar',288258741),
(5,'f46d935e78fddb254f2d3b2b4876d62b',13,'1212032011980001',123,'Belum dibayar',288258741),
(6,'f46d935e78fddb254f2d3b2b4876d62b',13,'1212032011980001',123,'Belum dibayar',288258741);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`id`,`deskripsi`) values 
(1,'Pelanggan'),
(2,'Administrator'),
(3,'Kasir');

/*Table structure for table `status_makanan_minuman` */

DROP TABLE IF EXISTS `status_makanan_minuman`;

CREATE TABLE `status_makanan_minuman` (
  `id` int(11) NOT NULL,
  `varchar` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_makanan_minuman` */

insert  into `status_makanan_minuman`(`id`,`varchar`) values 
(1,'Tersedia'),
(2,'Tidak Tersedia');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
