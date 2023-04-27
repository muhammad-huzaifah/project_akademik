-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: akademik
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tabel_agama`
--

DROP TABLE IF EXISTS `tabel_agama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_agama` (
  `kd_agama` varchar(2) NOT NULL,
  `nama_agama` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_agama`
--

LOCK TABLES `tabel_agama` WRITE;
/*!40000 ALTER TABLE `tabel_agama` DISABLE KEYS */;
INSERT INTO `tabel_agama` VALUES ('01','ISLAM'),('02','KRISTEN/PROTESTAN'),('03','KATHOLIK'),('04','HINDU'),('05','BUDHA'),('06','KHONG HU CHU'),('99','LAIN LAIN');
/*!40000 ALTER TABLE `tabel_agama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_guru`
--

DROP TABLE IF EXISTS `tabel_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nuptk` varchar(16) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` enum('P','W') NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_guru`
--

LOCK TABLES `tabel_guru` WRITE;
/*!40000 ALTER TABLE `tabel_guru` DISABLE KEYS */;
INSERT INTO `tabel_guru` VALUES (1,'870470182','Mama Ina','W'),(2,'0183204','Kakak Ira','W'),(3,'2452354','Ayah ujeb','P'),(4,'2525','Adek Iru','P');
/*!40000 ALTER TABLE `tabel_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_jadwal`
--

DROP TABLE IF EXISTS `tabel_jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_tahun_akademik` int(11) NOT NULL,
  `kd_jurusan` varchar(6) NOT NULL,
  `kelas` int(11) NOT NULL,
  `kd_mapel` varchar(4) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jam` varchar(14) DEFAULT NULL,
  `kd_ruangan` varchar(4) NOT NULL,
  `semester` int(11) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `id_rombel` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_jadwal`
--

LOCK TABLES `tabel_jadwal` WRITE;
/*!40000 ALTER TABLE `tabel_jadwal` DISABLE KEYS */;
INSERT INTO `tabel_jadwal` VALUES (40,2,'RPL',1,'TIK',3,'','01B',1,'',1),(41,2,'RPL',1,'TIK',2,'','01B',1,'',2),(42,2,'RPL',1,'MTK',2,'','011',1,'',1),(43,2,'RPL',1,'MTK',2,'','011',1,'',2),(44,2,'RPL',1,'IPA',2,'','011',1,'',1),(45,2,'RPL',1,'IPA',2,'','011',1,'',2);
/*!40000 ALTER TABLE `tabel_jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_jenjang_sekolah`
--

DROP TABLE IF EXISTS `tabel_jenjang_sekolah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_jenjang_sekolah` (
  `id_jenjang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenjang` varchar(10) NOT NULL,
  `jumlah_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_jenjang_sekolah`
--

LOCK TABLES `tabel_jenjang_sekolah` WRITE;
/*!40000 ALTER TABLE `tabel_jenjang_sekolah` DISABLE KEYS */;
INSERT INTO `tabel_jenjang_sekolah` VALUES (1,'TK/KB',7),(2,'SD/MI',6),(3,'SMP/MTS',3),(4,'SMA/SMK',3);
/*!40000 ALTER TABLE `tabel_jenjang_sekolah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_jurusan`
--

DROP TABLE IF EXISTS `tabel_jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_jurusan` (
  `kd_jurusan` varchar(4) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_jurusan`
--

LOCK TABLES `tabel_jurusan` WRITE;
/*!40000 ALTER TABLE `tabel_jurusan` DISABLE KEYS */;
INSERT INTO `tabel_jurusan` VALUES ('RPL','REKAYASA PERANGKAT LUNAK'),('TKJ','TEKNIK KOMPUTER JARINGAN');
/*!40000 ALTER TABLE `tabel_jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_kurikulum`
--

DROP TABLE IF EXISTS `tabel_kurikulum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_kurikulum` (
  `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kurikulum` varchar(30) NOT NULL,
  `is_aktif` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_kurikulum`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_kurikulum`
--

LOCK TABLES `tabel_kurikulum` WRITE;
/*!40000 ALTER TABLE `tabel_kurikulum` DISABLE KEYS */;
INSERT INTO `tabel_kurikulum` VALUES (1,'Kurikulum 2016','Y'),(3,'Kurikulum 2019','N');
/*!40000 ALTER TABLE `tabel_kurikulum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_kurikulum_detail`
--

DROP TABLE IF EXISTS `tabel_kurikulum_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_kurikulum_detail` (
  `id_kurikulum_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_kurikulum` int(11) NOT NULL,
  `kd_mapel` varchar(11) NOT NULL,
  `kd_jurusan` varchar(4) NOT NULL,
  `kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kurikulum_detail`),
  KEY `id_kurikulum` (`id_kurikulum`),
  KEY `kd_mapel` (`kd_mapel`),
  KEY `kd_jurusan` (`kd_jurusan`),
  CONSTRAINT `tabel_kurikulum_detail_ibfk_1` FOREIGN KEY (`id_kurikulum`) REFERENCES `tabel_kurikulum` (`id_kurikulum`),
  CONSTRAINT `tabel_kurikulum_detail_ibfk_2` FOREIGN KEY (`kd_mapel`) REFERENCES `tabel_mapel` (`kd_mapel`),
  CONSTRAINT `tabel_kurikulum_detail_ibfk_3` FOREIGN KEY (`kd_jurusan`) REFERENCES `tabel_jurusan` (`kd_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_kurikulum_detail`
--

LOCK TABLES `tabel_kurikulum_detail` WRITE;
/*!40000 ALTER TABLE `tabel_kurikulum_detail` DISABLE KEYS */;
INSERT INTO `tabel_kurikulum_detail` VALUES (1,1,'BID','RPL',3),(4,1,'TIK','RPL',2),(7,1,'MTK','RPL',2),(8,1,'IPA','RPL',1);
/*!40000 ALTER TABLE `tabel_kurikulum_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_mapel`
--

DROP TABLE IF EXISTS `tabel_mapel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_mapel` (
  `kd_mapel` varchar(4) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_mapel`
--

LOCK TABLES `tabel_mapel` WRITE;
/*!40000 ALTER TABLE `tabel_mapel` DISABLE KEYS */;
INSERT INTO `tabel_mapel` VALUES ('BID','Bahasa Indonesia'),('IPA','Ilmu Pengetahuan Alam'),('IPS','Ilmu Pengetahuan Sosial'),('MTK','Matematika'),('TIK','Teknik Informasi Komputer');
/*!40000 ALTER TABLE `tabel_mapel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_menu`
--

DROP TABLE IF EXISTS `tabel_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_menu`
--

LOCK TABLES `tabel_menu` WRITE;
/*!40000 ALTER TABLE `tabel_menu` DISABLE KEYS */;
INSERT INTO `tabel_menu` VALUES (1,'Database Siswa','siswa','fa fa-users',0),(2,'Database Guru','guru','fa fa-graduation-cap',0),(3,'Data Sekolah','sekolah','fa fa-building',0),(9,'Data Master','#','fa fa-bars',0),(10,'Mata Pelajaran','mapel','fa fa-book',9),(11,'Ruangan Kelas','ruangan','fa fa-building',9),(12,'Jurusan','jurusan','fa fa-th-large',9),(13,'Tahun Akademik','tahunakademik','fa fa-calendar-o',9),(14,'Jadwal Pelajaran','jadwal','fa fa-calendar',0),(15,'Rombongan Belajar','rombel','fa fa-users',9),(16,'Laporan Nilai','nilai','fa fa-file-excel-o',0),(17,'Pengguna Sistem','users','fa fa-cubes',0),(19,'Kurikulum','kurikulum','fa fa-newspaper-o',9),(20,'Wali Kelas','walikelas','fa fa-users',0),(21,'Form Pembayaran','keuangan/form','fa fa-shopping-cart',0),(22,'Peserta Didik','siswa/siswa_aktif','fa fa-graduation-cap',0),(23,'Jenis Pembayaran','jenis_pembayaran','fa fa-credit-card',0),(24,'Setup Biaya','keuangan/setup','fa fa-graduation-cap',0),(25,'Raport Online','raport','fa fa-graduation-cap',0),(26,'SMS Gateway','sms','fa fa-envelope-o',0),(27,'Phonebook','sms_group','fa fa-book',26),(28,'Form SMS','sms','fa fa-keyboard-o',26);
/*!40000 ALTER TABLE `tabel_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_rombel`
--

DROP TABLE IF EXISTS `tabel_rombel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_rombel` (
  `id_rombel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rombel` varchar(30) DEFAULT NULL,
  `kelas` int(11) NOT NULL,
  `kd_jurusan` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_rombel`),
  KEY `tabel_rombel_tabel_jurusan_kd_jurusan_fk` (`kd_jurusan`),
  CONSTRAINT `tabel_rombel_tabel_jurusan_kd_jurusan_fk` FOREIGN KEY (`kd_jurusan`) REFERENCES `tabel_jurusan` (`kd_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_rombel`
--

LOCK TABLES `tabel_rombel` WRITE;
/*!40000 ALTER TABLE `tabel_rombel` DISABLE KEYS */;
INSERT INTO `tabel_rombel` VALUES (1,'RPL1A',1,'RPL'),(2,'RPL1B',1,'RPL'),(3,'RPL2A',2,'RPL'),(4,'RPL2B',2,'RPL'),(5,'RPL1C',1,'RPL'),(9,'RPL 3C ',3,'RPL');
/*!40000 ALTER TABLE `tabel_rombel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_ruangan`
--

DROP TABLE IF EXISTS `tabel_ruangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_ruangan` (
  `kd_ruangan` varchar(4) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_ruangan`
--

LOCK TABLES `tabel_ruangan` WRITE;
/*!40000 ALTER TABLE `tabel_ruangan` DISABLE KEYS */;
INSERT INTO `tabel_ruangan` VALUES ('011','Default'),('01A','Ruangan Kelas 1 A'),('01B','Ruangan Kelas 1 B'),('01C','Ruangan Kelas 1 C'),('01D','Ruangan Kelas 1 D');
/*!40000 ALTER TABLE `tabel_ruangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_siswa`
--

DROP TABLE IF EXISTS `tabel_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_siswa` (
  `nim` varchar(11) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `gender` enum('P','W') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `kd_agama` varchar(2) NOT NULL,
  `foto` text DEFAULT NULL,
  `id_rombel` int(11) NOT NULL,
  PRIMARY KEY (`nim`),
  KEY `foreign_key_name` (`kd_agama`),
  CONSTRAINT `tabel_siswa_ibfk_1` FOREIGN KEY (`kd_agama`) REFERENCES `tabel_agama` (`kd_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_siswa`
--

LOCK TABLES `tabel_siswa` WRITE;
/*!40000 ALTER TABLE `tabel_siswa` DISABLE KEYS */;
INSERT INTO `tabel_siswa` VALUES ('T102137','Rina','W','2022-12-15','Jakarta','01','IMG_20220626_122031.jpg',1),('T102138','Khaira Bishry','W','2022-12-22','Medan','01','1077926.jpg',1),('T120139','MUHAMMAD HUZAIFAH, S.Kom.','P','2022-12-13','Medan','01','pas_photo_terbaru.jpg',1),('TIM102317','Abang Ujeb keren','P','2022-12-15','Medan','01','IMG_20220626_122319.jpg',1),('TIM102318','Muhammad Khairu Mubarak Huzaifah','P','2022-12-04','Bekasi','01','IMG_20220827_073532.jpg',1);
/*!40000 ALTER TABLE `tabel_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_tahun_akademik`
--

DROP TABLE IF EXISTS `tabel_tahun_akademik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_tahun_akademik` (
  `id_tahun_akademik` int(4) NOT NULL AUTO_INCREMENT,
  `tahun_akademik` varchar(10) NOT NULL,
  `is_aktif` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_tahun_akademik`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_tahun_akademik`
--

LOCK TABLES `tabel_tahun_akademik` WRITE;
/*!40000 ALTER TABLE `tabel_tahun_akademik` DISABLE KEYS */;
INSERT INTO `tabel_tahun_akademik` VALUES (1,'2017/2019','N'),(2,'2019/2020','Y'),(5,'2021/2022',''),(6,'2017/2018','N'),(7,'2015/2016','Y'),(8,'2013/2014','Y'),(9,'2016/2017','Y');
/*!40000 ALTER TABLE `tabel_tahun_akademik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_sekolah_info`
--

DROP TABLE IF EXISTS `table_sekolah_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_sekolah_info` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `id_jenjang_sekolah` int(11) NOT NULL,
  `alamat_sekolah` text DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `Telepon` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_sekolah`),
  KEY `id_jenjang_sekolah` (`id_jenjang_sekolah`),
  CONSTRAINT `table_sekolah_info_ibfk_1` FOREIGN KEY (`id_jenjang_sekolah`) REFERENCES `tabel_jenjang_sekolah` (`id_jenjang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_sekolah_info`
--

LOCK TABLES `table_sekolah_info` WRITE;
/*!40000 ALTER TABLE `table_sekolah_info` DISABLE KEYS */;
INSERT INTO `table_sekolah_info` VALUES (1,'TK Baiturrahim',4,'Jl. Surya Raya, Bekasi','tkbaiturrahim@gmail.com','02123456');
/*!40000 ALTER TABLE `table_sekolah_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_master_rombel`
--

DROP TABLE IF EXISTS `v_master_rombel`;
/*!50001 DROP VIEW IF EXISTS `v_master_rombel`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_master_rombel` (
  `id_rombel` tinyint NOT NULL,
  `nama_rombel` tinyint NOT NULL,
  `kelas` tinyint NOT NULL,
  `kd_jurusan` tinyint NOT NULL,
  `nama_jurusan` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_master_rombel`
--

/*!50001 DROP TABLE IF EXISTS `v_master_rombel`*/;
/*!50001 DROP VIEW IF EXISTS `v_master_rombel`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_master_rombel` AS select `tr`.`id_rombel` AS `id_rombel`,`tr`.`nama_rombel` AS `nama_rombel`,`tr`.`kelas` AS `kelas`,`tr`.`kd_jurusan` AS `kd_jurusan`,`tj`.`nama_jurusan` AS `nama_jurusan` from (`tabel_rombel` `tr` join `tabel_jurusan` `tj`) where `tj`.`kd_jurusan` = `tr`.`kd_jurusan` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-26 16:31:20
