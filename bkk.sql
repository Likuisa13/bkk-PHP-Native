/*
SQLyog Ultimate v10.42 
MySQL - 5.6.24 : Database - bkk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bkk` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bkk`;

/*Table structure for table `t_canaker` */

DROP TABLE IF EXISTS `t_canaker`;

CREATE TABLE `t_canaker` (
  `id_canaker` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kode_desa` int(11) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tinggi_badan` double NOT NULL,
  `berat_badan` double NOT NULL,
  `nilai_mtk` double DEFAULT NULL,
  `rata_raport` double DEFAULT NULL,
  PRIMARY KEY (`id_canaker`),
  KEY `id_user` (`id_user`),
  KEY `kode_desa` (`kode_desa`),
  CONSTRAINT `t_canaker_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`),
  CONSTRAINT `t_canaker_ibfk_5` FOREIGN KEY (`kode_desa`) REFERENCES `t_desa` (`kode_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `t_canaker` */

insert  into `t_canaker`(`id_canaker`,`id_user`,`jenis_kelamin`,`asal_sekolah`,`jurusan`,`kode_desa`,`alamat`,`tempat_lahir`,`tgl_lahir`,`agama`,`email`,`no_telp`,`tinggi_badan`,`berat_badan`,`nilai_mtk`,`rata_raport`) values (1,2,'L','SMK NEGERI 1 BUKATEJA','TKJ',7,'Jl. Merpati','Purbalingga','1996-05-30','Islam','likuisa13@gmail.com','098619200224',168,66,90,84.23),(2,3,'L','SMA Negeri 1 Bukateja','TKJ',5,'Jl. jambon','purbalingga','2018-02-11','Islam','lik@yahoo.com','020202',167,66,80.5,81),(6,6,'L','SMK Negeri 1 Bukateja','Teknik Komputer dan Jaringan',4,'Jl. Dipokusumo','Purbalingga','2018-08-07','Islam','likuisa13@gmail.com','08282882028',168,77,100,80.23),(9,10,'L','SMK Negeri 1 Bukateja','Teknik Komputer dan Jaringan',2,'Jl. Dipokusumo','Purbalingga','2018-07-29','Katholik','likuisqqq@gmail.com','02020222233',144,44,80.5,81),(10,11,'L','SMK N 1 BUKATEJA','TKR',1,'jl dr wahidin','yogyakarta','1999-06-16','Islam','coba@aaaa.com','080808808',165,55,75,80.5);

/*Table structure for table `t_desa` */

DROP TABLE IF EXISTS `t_desa`;

CREATE TABLE `t_desa` (
  `kode_desa` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kec` int(11) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_desa`),
  KEY `kode_kec` (`kode_kec`),
  CONSTRAINT `t_desa_ibfk_1` FOREIGN KEY (`kode_kec`) REFERENCES `t_kec` (`kode_kec`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `t_desa` */

insert  into `t_desa`(`kode_desa`,`kode_kec`,`nama_desa`) values (1,1,'Bukateja'),(2,1,'Karangcengis'),(3,1,'Cipawon'),(4,1,'Kembangan'),(5,1,'Bajong'),(6,3,'Kejobong'),(7,3,'Kedarpan'),(8,3,'Langgar'),(9,3,'Pangempon'),(10,3,'Timbang'),(12,2,'Panican');

/*Table structure for table `t_hasilseleksi` */

DROP TABLE IF EXISTS `t_hasilseleksi`;

CREATE TABLE `t_hasilseleksi` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `id_lowongan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_tutup` date NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_hasil`),
  KEY `id_lowongan` (`id_lowongan`),
  CONSTRAINT `t_hasilseleksi_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `t_lowongan` (`id_lowongan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `t_hasilseleksi` */

insert  into `t_hasilseleksi`(`id_hasil`,`id_lowongan`,`deskripsi`,`tgl_tutup`,`file`,`url`) values (3,2,'Menurut Sutabri (2014), informasi adalah hasil pemrosesan, manipulasi, dan pengorganisasian/penataan dari sekelompok data yang mempunyai nilai pengetahuan bagi penggunanya.  Menurut Djahir dan Pratita (2015), informasi adalah hasil dari pengolahan data menjdai bentuk yang lebih berguna bagi yang menerimanya yang menggambarkan suatu kejadian-kejadian nyata dan dapat digunakan sebagai alat bantu untuk pengambilan suatu keputusan.','2018-08-17','Template Naskah Laporan KP - Revised Januari 2018.docx','../../files/Template Naskah Laporan KP - Revised Januari 2018.docx'),(12,19,'Selamat dan Sukses Untuk Meneruskan seleksi ke tahap berikutnya','2018-08-18','818-1805-1-SM.pdf','../../files/818-1805-1-SM.pdf'),(17,2,'aaaa','2018-08-01','BAB II.pdf','../../files/BAB II.pdf'),(18,19,'grfdg','2018-08-16','Flowchart.pdf','../../files/Flowchart.pdf'),(19,20,'se','2018-08-17','BAB II.pdf','../../files/BAB II.pdf'),(20,1,'aaa','2018-08-15','Ari Lasso - Hampa.mp3','../../files/Ari Lasso - Hampa.mp3');

/*Table structure for table `t_kab` */

DROP TABLE IF EXISTS `t_kab`;

CREATE TABLE `t_kab` (
  `kode_kab` int(11) NOT NULL AUTO_INCREMENT,
  `kode_prov` int(11) NOT NULL,
  `nama_kab` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kab`),
  KEY `kode_prov` (`kode_prov`),
  CONSTRAINT `t_kab_ibfk_1` FOREIGN KEY (`kode_prov`) REFERENCES `t_prov` (`kode_prov`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `t_kab` */

insert  into `t_kab`(`kode_kab`,`kode_prov`,`nama_kab`) values (1,1,'Sleman'),(2,1,'Bantul'),(3,2,'Purbalingga'),(5,2,'Pemalang'),(6,2,'Banjarnegara'),(7,2,'Purwokerto'),(8,2,'Cilacap'),(10,3,'Cianjur');

/*Table structure for table `t_kec` */

DROP TABLE IF EXISTS `t_kec`;

CREATE TABLE `t_kec` (
  `kode_kec` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kab` int(11) NOT NULL,
  `nama_kec` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kec`),
  KEY `kode_kab` (`kode_kab`),
  CONSTRAINT `t_kec_ibfk_1` FOREIGN KEY (`kode_kab`) REFERENCES `t_kab` (`kode_kab`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `t_kec` */

insert  into `t_kec`(`kode_kec`,`kode_kab`,`nama_kec`) values (1,3,'Bukateja'),(2,3,'Kemangkon'),(3,3,'Kejobong'),(4,3,'Kaligondang'),(5,3,'Purbalingga'),(6,3,'Bojongsari'),(7,3,'Bobotsari'),(8,1,'Mlati'),(9,2,'Tempel'),(10,3,'Karang Moncol'),(11,1,'Godean');

/*Table structure for table `t_lowongan` */

DROP TABLE IF EXISTS `t_lowongan`;

CREATE TABLE `t_lowongan` (
  `id_lowongan` int(11) NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(11) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `tgl_buka` date DEFAULT NULL,
  `tgl_tutup` date DEFAULT NULL,
  `biaya_pendaftaran` double DEFAULT NULL,
  `deskripsi` text,
  `persyaratan` text,
  PRIMARY KEY (`id_lowongan`),
  KEY `id_perusahaan` (`id_perusahaan`),
  CONSTRAINT `t_lowongan_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `t_perusahaan` (`id_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `t_lowongan` */

insert  into `t_lowongan`(`id_lowongan`,`id_perusahaan`,`posisi`,`tgl_buka`,`tgl_tutup`,`biaya_pendaftaran`,`deskripsi`,`persyaratan`) values (1,2,'Operator','2018-07-18','2018-08-09',30000,'Detail e apa ya??','Sehat jasmani dan rohani'),(2,3,'Manajer','2018-07-19','2018-08-24',20000,'kirim email aja','nilai UN 8,0'),(19,17,'Admin','2019-01-01','2019-01-02',30000,'Testing','Uji Coba'),(20,21,'manajer','2018-08-15','2018-08-18',20000,'hggjhg','gjgjgj');

/*Table structure for table `t_pendaftaran` */

DROP TABLE IF EXISTS `t_pendaftaran`;

CREATE TABLE `t_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_lowongan` int(11) NOT NULL,
  `id_canaker` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status_pembayaran` enum('LUNAS','BELUM LUNAS') NOT NULL DEFAULT 'BELUM LUNAS',
  PRIMARY KEY (`id_pendaftaran`),
  KEY `id_lowongan` (`id_lowongan`),
  KEY `id_canaker` (`id_canaker`),
  CONSTRAINT `t_pendaftaran_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `t_lowongan` (`id_lowongan`),
  CONSTRAINT `t_pendaftaran_ibfk_2` FOREIGN KEY (`id_canaker`) REFERENCES `t_canaker` (`id_canaker`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `t_pendaftaran` */

insert  into `t_pendaftaran`(`id_pendaftaran`,`id_lowongan`,`id_canaker`,`tgl_daftar`,`status_pembayaran`) values (18,1,2,'2018-08-03','BELUM LUNAS'),(23,2,1,'2018-08-10','LUNAS'),(24,19,1,'2019-01-01','BELUM LUNAS'),(25,2,10,'2018-08-15','BELUM LUNAS');

/*Table structure for table `t_perusahaan` */

DROP TABLE IF EXISTS `t_perusahaan`;

CREATE TABLE `t_perusahaan` (
  `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(50) NOT NULL,
  `kode_desa` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`),
  KEY `kode_desa` (`kode_desa`),
  CONSTRAINT `t_perusahaan_ibfk_4` FOREIGN KEY (`kode_desa`) REFERENCES `t_desa` (`kode_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `t_perusahaan` */

insert  into `t_perusahaan`(`id_perusahaan`,`nama_perusahaan`,`kode_desa`,`alamat`,`no_telp`,`kode_pos`) values (1,'PT Maju Makmur',4,'Jl. Kencana wungu','01010110','433221'),(2,'Alhamdulillah Dadi',5,'Jl. Kejaksaan','101010101','232323'),(3,'PT ABC',6,'Jl. Kembangan','11111111','111111'),(17,'PT Colakut',5,'Jl. Kejobong','3424','23123'),(20,'Uji Coba',3,'Jl. Dipokusumo','1111','2222'),(21,'pt maju jaya',9,'jl kemuning','33334','78778');

/*Table structure for table `t_profil` */

DROP TABLE IF EXISTS `t_profil`;

CREATE TABLE `t_profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nama_smk` varchar(50) NOT NULL,
  `nama_bkk` varchar(50) NOT NULL,
  `motto` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fb` varchar(50) NOT NULL,
  `ig` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `jam_kerja` varchar(100) NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_profil` */

insert  into `t_profil`(`id_profil`,`nama_smk`,`nama_bkk`,`motto`,`alamat`,`no_telp`,`email`,`fb`,`ig`,`twitter`,`jam_kerja`) values (1,'SMK Negeri 1 Bukateja','Jaya Abadi','Mengantar ke Jenjang Kesuksesan dan Dunia Kerja','JL. Purwandaru, Kecamatan Bukateja, Kabupaten Purbalingga, Jawa Tengah 53382','(0273) 321569','bkksmk@gmail.com','https://www.facebook.com/bkkjayaabadi','https://www.instagram.com/bkkjayabadi','https://www.twitter.com/bkkjayaabadi','Monday - Saturday');

/*Table structure for table `t_prov` */

DROP TABLE IF EXISTS `t_prov`;

CREATE TABLE `t_prov` (
  `kode_prov` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prov` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_prov`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `t_prov` */

insert  into `t_prov`(`kode_prov`,`nama_prov`) values (1,'Yogyakarta'),(2,'Jawa Tengah'),(3,'Jawa Barat'),(4,'Jawa Timur');

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `no_induk` varchar(20) DEFAULT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pasword` varchar(150) NOT NULL,
  `level` enum('1','2') NOT NULL DEFAULT '2',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `t_user` */

insert  into `t_user`(`id_user`,`no_induk`,`nama_lengkap`,`username`,`pasword`,`level`) values (1,'00','Administrator','admin','*4ACFE3202A5FF5CF467898FC58AAB1D615029441','1'),(2,'112','Dwiki Likuisa','dwiki','*C50DB90032812780F21E802F0D4438F8B4545024','2'),(3,'100','Doni Saputra','doni','*860FF880F5A95B8F5A2FFE08E5E6A47C72226B42','2'),(5,'546','fikoh','fi','*90E07C425E1A4E6FF26D088C85EECFC5E5A45536','2'),(6,'1','Uji Coba','uji','*CD78DD1CAC05111F9683B30D8C16F52B34928ADF','2'),(10,'112','My Mine','mimin','*2E8D8B1942C5057C59CA3151CCC9AA9C5A96990C','2'),(11,'111','dwiki','coba','*FD64E348EC9DCCE6525B358693A9CFDC733F5184','2'),(12,'113','Fikoh Indriana','Fikoh Indriana','*6B83318CCE1341170954334E55F09B1487A047BE','2'),(16,'121','Alhamdulillah','al','*667F407DE7C6AD07358FA38DAED7828A72014B4E','2');

/* Procedure structure for procedure `cariPerusahaan` */

/*!50003 DROP PROCEDURE IF EXISTS  `cariPerusahaan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `cariPerusahaan`(in cari VARCHAR(20))
BEGIN
 SELECT t_perusahaan.`id_perusahaan`, t_perusahaan.`nama_perusahaan`, t_perusahaan.`alamat`, t_prov.`nama_prov`,
	t_kab.`nama_kab`, t_kec.`nama_kec`, t_desa.`nama_desa`, t_perusahaan.`no_telp`, t_perusahaan.`kode_pos`
	FROM t_prov, t_kab, t_kec, t_desa, t_perusahaan 
	WHERE t_prov.`kode_prov`=t_kab.`kode_prov` AND t_kab.`kode_kab`=t_kec.`kode_kab` 
	AND t_kec.`kode_kec`=t_desa.`kode_kec` AND t_desa.`kode_desa`=t_perusahaan.`kode_desa` 
	AND (t_perusahaan.`nama_perusahaan` LIKE CONCAT('%',cari,'%') OR t_perusahaan.`alamat` LIKE CONCAT('%',cari,'%') OR t_perusahaan.`kode_pos` LIKE CONCAT('%',cari,'%')
	OR t_perusahaan.`no_telp` LIKE concat('%',cari,'%') OR t_prov.`nama_prov` LIKE CONCAT('%',cari,'%') OR t_kab.`nama_kab` LIKE CONCAT('%',cari,'%')
	OR t_kec.`nama_kec` LIKE CONCAT('%',cari,'%') OR t_desa.`nama_desa` LIKE CONCAT('%',cari,'%') );
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
