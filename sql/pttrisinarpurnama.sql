/*
Navicat MySQL Data Transfer

Source Server         : ServerQ
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : pttrisinarpurnama

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2016-06-30 23:41:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `divisi`
-- ----------------------------
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `divisi_nama_unique` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of divisi
-- ----------------------------
INSERT INTO `divisi` VALUES ('4', 'Customer Service');
INSERT INTO `divisi` VALUES ('2', 'HRD');
INSERT INTO `divisi` VALUES ('1', 'Marketing');
INSERT INTO `divisi` VALUES ('3', 'Personalia');

-- ----------------------------
-- Table structure for `jenis_perangkat`
-- ----------------------------
DROP TABLE IF EXISTS `jenis_perangkat`;
CREATE TABLE `jenis_perangkat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jenis_perangkat_nama_unique` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jenis_perangkat
-- ----------------------------

-- ----------------------------
-- Table structure for `karyawan`
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `hp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `divisi_id` int(10) unsigned NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_aktif` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `karyawan_nik_unique` (`nik`),
  KEY `karyawan_divisi_id_foreign` (`divisi_id`),
  CONSTRAINT `karyawan_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('1', '100022', 'Ahmad Sodiqin', 'Kediri', '1994-02-24', '08677777777', '1', 'just testing here', '1', '2016-06-30 16:32:33', '2016-06-30 16:32:33');
INSERT INTO `karyawan` VALUES ('2', '100044', 'Misbakhul Munir', 'Solo', '1989-06-21', '086111111111111', '1', 'just testing again', '1', '2016-06-30 16:33:48', '2016-06-30 16:33:48');

-- ----------------------------
-- Table structure for `kerusakan`
-- ----------------------------
DROP TABLE IF EXISTS `kerusakan`;
CREATE TABLE `kerusakan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perangkat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `divisi_id` int(10) unsigned NOT NULL,
  `progress` int(10) unsigned NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kerusakan_progress_foreign` (`progress`),
  KEY `kerusakan_divisi_id_foreign` (`divisi_id`),
  KEY `kerusakan_user_id_foreign` (`user_id`),
  CONSTRAINT `kerusakan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `kerusakan_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`),
  CONSTRAINT `kerusakan_progress_foreign` FOREIGN KEY (`progress`) REFERENCES `level_progress` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of kerusakan
-- ----------------------------
INSERT INTO `kerusakan` VALUES ('2', 'Mouse, Keyboard', '1', '3', 'Tiba-tiba mouse dan keyboard tidak berfungsi', '3', '2016-06-30 16:39:38', '2016-06-30 16:40:56');

-- ----------------------------
-- Table structure for `level_progress`
-- ----------------------------
DROP TABLE IF EXISTS `level_progress`;
CREATE TABLE `level_progress` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `progress` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of level_progress
-- ----------------------------
INSERT INTO `level_progress` VALUES ('1', 'menunggu antrian');
INSERT INTO `level_progress` VALUES ('2', 'dalam proses perbaikan');
INSERT INTO `level_progress` VALUES ('3', 'selesai');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_06_28_021646_create_level_progress_table', '1');
INSERT INTO `migrations` VALUES ('2016_06_28_025409_create_divisi_table', '1');
INSERT INTO `migrations` VALUES ('2016_06_28_025415_create_jenis_perangkat_table', '1');
INSERT INTO `migrations` VALUES ('2016_06_28_085129_create_karyawan_table', '1');
INSERT INTO `migrations` VALUES ('2016_06_28_085202_create_kerusakan_table', '1');
INSERT INTO `migrations` VALUES ('2016_06_28_085209_create_perbaikan_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `perbaikan`
-- ----------------------------
DROP TABLE IF EXISTS `perbaikan`;
CREATE TABLE `perbaikan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kerusakan_id` int(10) unsigned NOT NULL,
  `selesai` datetime NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perbaikan_kerusakan_id_foreign` (`kerusakan_id`),
  KEY `perbaikan_user_id_foreign` (`user_id`),
  CONSTRAINT `perbaikan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `perbaikan_kerusakan_id_foreign` FOREIGN KEY (`kerusakan_id`) REFERENCES `kerusakan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of perbaikan
-- ----------------------------
INSERT INTO `perbaikan` VALUES ('1', '2', '2016-06-30 16:40:56', 'ada kabel diatara mouse dan keyboard yang terputus', '1', '2016-06-30 16:40:21', '2016-06-30 16:40:56');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `level_user` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '3',
  `is_aktif` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '$2y$10$GgGSplHFmTqoDBJqiQbPoOdAZ8AddRVOD6oCkI4AePrciFG2dpM42', '1', '1', 'rgez3tykgIvhDQAkxAanjpezArQztofLmbC8XgqH7tCGNBlsb065KXtTjQUt', null, '2016-06-30 16:35:30');
INSERT INTO `users` VALUES ('2', '100022', '$2y$10$HZWkqybAWffTQBlAjMkptuPPBEhveMlupO6TlOYei6f9mWfd/hfr.', '3', '0', null, '2016-06-30 16:32:34', '2016-06-30 16:32:34');
INSERT INTO `users` VALUES ('3', '100044', '$2y$10$YOis9S7mg8ajMXzIqo6qUO7n8EA5Vy8KEZ9vOeh22euVqaYXWhhXq', '3', '1', '5VOtTgQY8FBFEk4vXdRr8jQTC2MzH4oCD68e5J68erjQr0KVGiR9C6VupkPR', '2016-06-30 16:33:48', '2016-06-30 16:39:46');
INSERT INTO `users` VALUES ('4', 'manager', '$2y$10$IoheUXxKZw/9AsCAME5x8OAImb5DTjac4zedFE8iK5sMwmSwkhNFu', '2', '1', 'JEt3rJOdDFhTR4lONtqNmwhrPtZadWD9yWed7CXalDr9ToAF0sa6EGpiPGPM', '2016-06-30 16:35:14', '2016-06-30 16:40:06');
