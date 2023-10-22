-- MariaDB dump 10.19  Distrib 10.5.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: akademik
-- ------------------------------------------------------
-- Server version	10.5.22-MariaDB

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_guru`
--

LOCK TABLES `tabel_guru` WRITE;
/*!40000 ALTER TABLE `tabel_guru` DISABLE KEYS */;
INSERT INTO `tabel_guru` VALUES (1,'870470182','Mama Ina','W',NULL,NULL),(2,'0183204','Kakak Ira','W',NULL,NULL),(3,'2452354','Khaira Bishry Huzaifah','W','khaira','dce42e0a59674838927a177ebf78ef51'),(4,'2525','Adek Iru','P',NULL,NULL),(6,'413414','ujeb guru','P','ujeb','cee7c6eb8e6b0a1c43519c060a8feb0b');
/*!40000 ALTER TABLE `tabel_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_history_kelas`
--

DROP TABLE IF EXISTS `tabel_history_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_history_kelas` (
  `id_history` int(11) NOT NULL AUTO_INCREMENT,
  `id_rombel` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `id_tahun_akademik` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_history`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_history_kelas`
--

LOCK TABLES `tabel_history_kelas` WRITE;
/*!40000 ALTER TABLE `tabel_history_kelas` DISABLE KEYS */;
INSERT INTO `tabel_history_kelas` VALUES (1,1,'T525235',1),(2,1,'T123098',1),(3,1,'T0123',1),(4,1,'T879234',1),(5,1,'081840',1),(6,1,'67676647',1),(7,1,'878122',1);
/*!40000 ALTER TABLE `tabel_history_kelas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_jadwal`
--

LOCK TABLES `tabel_jadwal` WRITE;
/*!40000 ALTER TABLE `tabel_jadwal` DISABLE KEYS */;
INSERT INTO `tabel_jadwal` VALUES (40,1,'RPL',1,'TIK',3,'08.00-09.00','01A',1,'Rabu',1),(41,2,'RPL',2,'TIK',2,'09.30-10.30','01B',1,'Selasa',2),(42,1,'RPL',1,'MTK',3,'10.30-11.30','01B',1,'Rabu',3),(43,2,'RPL',1,'MTK',5,'13.00-14.00','01B',1,'Kamis',4),(44,2,'TKJ',2,'IPA',2,'08.30-09.30','011',1,'Jum\'at',5),(45,2,'TKJ',3,'IPA',2,'09.30-10.30','011',1,'Senin',6);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_kurikulum_detail`
--

LOCK TABLES `tabel_kurikulum_detail` WRITE;
/*!40000 ALTER TABLE `tabel_kurikulum_detail` DISABLE KEYS */;
INSERT INTO `tabel_kurikulum_detail` VALUES (1,1,'BID','RPL',3),(4,1,'TIK','RPL',2),(7,1,'MTK','RPL',2),(8,1,'IPA','RPL',1),(9,1,'BID','RPL',1);
/*!40000 ALTER TABLE `tabel_kurikulum_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_level_user`
--

DROP TABLE IF EXISTS `tabel_level_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_level_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_level_user`
--

LOCK TABLES `tabel_level_user` WRITE;
/*!40000 ALTER TABLE `tabel_level_user` DISABLE KEYS */;
INSERT INTO `tabel_level_user` VALUES (1,'Admin'),(2,'Walikelas'),(3,'Guru'),(4,'Keuangan');
/*!40000 ALTER TABLE `tabel_level_user` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_menu`
--

LOCK TABLES `tabel_menu` WRITE;
/*!40000 ALTER TABLE `tabel_menu` DISABLE KEYS */;
INSERT INTO `tabel_menu` VALUES (0,'Raport Online','raport','fa fa-graduation-cap',0),(1,'Database Siswa','siswa','fa fa-users',0),(2,'Database Guru','guru','fa fa-graduation-cap',0),(3,'Data Sekolah','sekolah','fa fa-building',0),(9,'Data Master','#','fa fa-bars',0),(10,'Mata Pelajaran','mapel','fa fa-book',9),(11,'Ruangan Kelas','ruangan','fa fa-building',9),(12,'Jurusan','jurusan','fa fa-th-large',9),(13,'Tahun Akademik','tahunakademik','fa fa-calendar-o',9),(14,'Jadwal Pelajaran','jadwal','fa fa-calendar',0),(15,'Rombongan Belajar','rombel','fa fa-users',9),(16,'Laporan Nilai','nilai','fa fa-file-excel-o',0),(19,'Pengguna Sistem','users','fa fa-cubes',0),(20,'Kurikulum','kurikulum','fa fa-newspaper-o',0),(21,'Wali Kelas','walikelas','fa fa-users',0),(22,'Form Pembayaran','keuangan/form','fa fa-shopping-cart',0),(23,'Peserta Didik','siswa/siswa_aktif','fa fa-graduation-cap',0),(24,'Jenis Pembayaran','jenis_pembayaran','fa fa-credit-card',0),(25,'Setup Biaya','keuangan/setup','fa fa-graduation-cap',0),(26,'Raport Online','raport','fa fa-graduation-cap',0),(27,'SMS Gateway','sms','fa fa-envelope-o',0),(28,'Phonebook','sms_group','fa fa-book',0),(29,'Form SMS','sms','fa fa-keyboard-o',0),(30,'Logout','logout','fa fa-sign-out',0);
/*!40000 ALTER TABLE `tabel_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_nilai`
--

DROP TABLE IF EXISTS `tabel_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `tabel_nilai_tabel_jadwal_id_jadwal_fk` (`id_jadwal`),
  CONSTRAINT `tabel_nilai_tabel_jadwal_id_jadwal_fk` FOREIGN KEY (`id_jadwal`) REFERENCES `tabel_jadwal` (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_nilai`
--

LOCK TABLES `tabel_nilai` WRITE;
/*!40000 ALTER TABLE `tabel_nilai` DISABLE KEYS */;
INSERT INTO `tabel_nilai` VALUES (1,40,'081840',80),(2,42,'081840',70),(3,45,'878122',90),(4,41,'80789714',60),(5,43,'32545',100),(6,44,'41254325',75);
/*!40000 ALTER TABLE `tabel_nilai` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_rombel`
--

LOCK TABLES `tabel_rombel` WRITE;
/*!40000 ALTER TABLE `tabel_rombel` DISABLE KEYS */;
INSERT INTO `tabel_rombel` VALUES (1,'RPL1A',1,'RPL'),(2,'RPL1A',3,'RPL'),(3,'RPL1A',4,'RPL'),(4,'RPL1A',5,'RPL'),(5,'RPL2A',2,'RPL'),(6,'RPL1A ',6,'RPL');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_siswa`
--

LOCK TABLES `tabel_siswa` WRITE;
/*!40000 ALTER TABLE `tabel_siswa` DISABLE KEYS */;
INSERT INTO `tabel_siswa` VALUES ('081840','AYAH UJEB','P','1978-11-19','medan','01','63457.jpg',1),('67676647','ira iru','P','2016-12-12','bekasi','01','businessman-310819_1280.png',1),('878122','mama ina cantik','W','2015-07-24','Bekasi','01','',1),('T102137','Rina','W','2022-12-15','Jakarta','01','IMG_20220626_122031.jpg',1),('T120139','MUHAMMAD HUZAIFAH, S.Kom.','P','2022-12-13','Medan','01','pas_photo_terbaru.jpg',1),('TIM102317','Abang Ujeb keren','P','2022-12-15','Medan','01','IMG_20220626_122319.jpg',1),('TIM102318','Muhammad Khairu Mubarak Huzaifah','P','2022-12-04','Bekasi','01','IMG_20220827_073532.jpg',1);
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
  `semester_aktif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tahun_akademik`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_tahun_akademik`
--

LOCK TABLES `tabel_tahun_akademik` WRITE;
/*!40000 ALTER TABLE `tabel_tahun_akademik` DISABLE KEYS */;
INSERT INTO `tabel_tahun_akademik` VALUES (1,'2019/2020','Y',1),(5,'2021/2022','N',1),(7,'2015/2016','Y',NULL),(8,'2013/2014','Y',NULL),(9,'2016/2017','Y',NULL),(14,'2017/2018','N',NULL);
/*!40000 ALTER TABLE `tabel_tahun_akademik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_user`
--

DROP TABLE IF EXISTS `tabel_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `tabel_user_tabel_level_user_id_level_user_fk` (`id_level_user`),
  CONSTRAINT `tabel_user_tabel_level_user_id_level_user_fk` FOREIGN KEY (`id_level_user`) REFERENCES `tabel_level_user` (`id_level_user`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_user`
--

LOCK TABLES `tabel_user` WRITE;
/*!40000 ALTER TABLE `tabel_user` DISABLE KEYS */;
INSERT INTO `tabel_user` VALUES (30,'Muhammad Huzaifah','huzaifah','a3b3d95d700877ca07feb928683e7635',1,'businessman-310819_1280.png'),(39,'khaira bishry huzaifah','khaira','dce42e0a59674838927a177ebf78ef51',3,'IMG_20200201_111121.jpg'),(40,'Rachmah Octarina','rachmah','0aab374aa8afffd1d19f4287fd78ed96',2,'IMG_20200307_100940.jpg'),(45,'khairu_keuangan','khairu','1415c8c6613bf9573faf8f0a1212a27e',4,'businessman-310819_12801.png');
/*!40000 ALTER TABLE `tabel_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_user_rule`
--

DROP TABLE IF EXISTS `tabel_user_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_user_rule` (
  `id_rule` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) DEFAULT NULL,
  `id_level_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rule`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_user_rule`
--

LOCK TABLES `tabel_user_rule` WRITE;
/*!40000 ALTER TABLE `tabel_user_rule` DISABLE KEYS */;
INSERT INTO `tabel_user_rule` VALUES (1,21,4),(4,10,3),(5,23,4),(6,1,1),(7,2,1),(8,3,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(15,17,1),(16,19,1),(18,16,3),(19,14,3),(20,16,2),(21,20,2),(22,15,2),(27,1,2),(30,29,2),(31,29,4),(33,15,3),(34,12,3),(36,11,3),(37,15,1),(38,30,1),(40,17,3),(41,26,3),(42,14,1);
/*!40000 ALTER TABLE `tabel_user_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_walikelas`
--

DROP TABLE IF EXISTS `tabel_walikelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_walikelas` (
  `id_walikelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  PRIMARY KEY (`id_walikelas`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_walikelas`
--

LOCK TABLES `tabel_walikelas` WRITE;
/*!40000 ALTER TABLE `tabel_walikelas` DISABLE KEYS */;
INSERT INTO `tabel_walikelas` VALUES (13,3,1,1),(14,2,1,2),(15,2,1,3),(16,2,1,4),(17,2,1,5),(18,2,1,9);
/*!40000 ALTER TABLE `tabel_walikelas` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
/*!50001 CREATE VIEW `v_master_rombel` AS SELECT
 1 AS `id_rombel`,
  1 AS `nama_rombel`,
  1 AS `kelas`,
  1 AS `kd_jurusan`,
  1 AS `nama_jurusan` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_tabel_user`
--

DROP TABLE IF EXISTS `v_tabel_user`;
/*!50001 DROP VIEW IF EXISTS `v_tabel_user`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_tabel_user` AS SELECT
 1 AS `id_user`,
  1 AS `nama_lengkap`,
  1 AS `username`,
  1 AS `password`,
  1 AS `id_level_user`,
  1 AS `foto`,
  1 AS `nama_level` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_walikelas`
--

DROP TABLE IF EXISTS `v_walikelas`;
/*!50001 DROP VIEW IF EXISTS `v_walikelas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_walikelas` AS SELECT
 1 AS `nama_guru`,
  1 AS `nama_rombel`,
  1 AS `id_walikelas`,
  1 AS `id_tahun_akademik`,
  1 AS `nama_jurusan`,
  1 AS `kelas`,
  1 AS `tahun_akademik` */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_master_rombel`
--

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

--
-- Final view structure for view `v_tabel_user`
--

/*!50001 DROP VIEW IF EXISTS `v_tabel_user`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_tabel_user` AS select `tu`.`id_user` AS `id_user`,`tu`.`nama_lengkap` AS `nama_lengkap`,`tu`.`username` AS `username`,`tu`.`password` AS `password`,`tu`.`id_level_user` AS `id_level_user`,`tu`.`foto` AS `foto`,`tlu`.`nama_level` AS `nama_level` from (`tabel_user` `tu` join `tabel_level_user` `tlu`) where `tu`.`id_level_user` = `tlu`.`id_level_user` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_walikelas`
--

/*!50001 DROP VIEW IF EXISTS `v_walikelas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_walikelas` AS select `g`.`nama_guru` AS `nama_guru`,`r`.`nama_rombel` AS `nama_rombel`,`w`.`id_walikelas` AS `id_walikelas`,`w`.`id_tahun_akademik` AS `id_tahun_akademik`,`j`.`nama_jurusan` AS `nama_jurusan`,`r`.`kelas` AS `kelas`,`ta`.`tahun_akademik` AS `tahun_akademik` from ((((`tabel_walikelas` `w` join `tabel_rombel` `r`) join `tabel_guru` `g`) join `tabel_jurusan` `j`) join `tabel_tahun_akademik` `ta`) where `w`.`id_guru` = `g`.`id_guru` and `w`.`id_rombel` = `r`.`id_rombel` and `j`.`kd_jurusan` = `r`.`kd_jurusan` and `ta`.`id_tahun_akademik` = `w`.`id_tahun_akademik` */;
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

-- Dump completed on 2023-10-22 17:20:52
