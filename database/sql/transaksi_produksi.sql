/*
 Navicat Premium Data Transfer

 Source Server         : laragon
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : transaksi_produksi

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 05/11/2021 19:59:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for achivements
-- ----------------------------
DROP TABLE IF EXISTS `achivements`;
CREATE TABLE `achivements`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of achivements
-- ----------------------------
INSERT INTO `achivements` VALUES (1, 'A001', '07:31:00', '08:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (2, 'A002', '08:31:00', '09:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (3, 'A003', '09:31:00', '10:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (4, 'A004', '10:31:00', '11:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (5, 'A005', '11:31:00', '12:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (6, 'A006', '12:31:00', '13:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (7, 'A007', '13:31:00', '14:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (8, 'A008', '14:31:00', '15:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (9, 'A009', '15:31:00', '16:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (10, 'A010', '16:31:00', '17:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (11, 'A011', '17:31:00', '18:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (12, 'A012', '18:31:00', '19:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `achivements` VALUES (13, 'A013', '19:31:00', '20:30:00', '2021-11-05 19:59:13', '2021-11-05 19:59:13');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_item` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES (1, 'M001', 'Bolpen', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `items` VALUES (2, 'M002', 'Pensil', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `items` VALUES (3, 'M003', 'Penghapus', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `items` VALUES (4, 'M004', 'Spidol', '2021-11-05 19:59:13', '2021-11-05 19:59:13');

-- ----------------------------
-- Table structure for karyawans
-- ----------------------------
DROP TABLE IF EXISTS `karyawans`;
CREATE TABLE `karyawans`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `npk` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of karyawans
-- ----------------------------
INSERT INTO `karyawans` VALUES (1, '10001', 'Agus', 'Jakarta', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `karyawans` VALUES (2, '10002', 'Asep', 'Purbalingga', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `karyawans` VALUES (3, '10003', 'Jajang', 'Subang', '2021-11-05 19:59:13', '2021-11-05 19:59:13');

-- ----------------------------
-- Table structure for lokasis
-- ----------------------------
DROP TABLE IF EXISTS `lokasis`;
CREATE TABLE `lokasis`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lokasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lokasis
-- ----------------------------
INSERT INTO `lokasis` VALUES (1, 'L001', 'Lokasi 1', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `lokasis` VALUES (2, 'L002', 'Lokasi 2', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `lokasis` VALUES (3, 'L003', 'Lokasi 3', '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `lokasis` VALUES (4, 'L004', 'Lokasi 4', '2021-11-05 19:59:13', '2021-11-05 19:59:13');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_11_04_082450_create_karyawans_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_11_04_082715_create_items_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_11_04_082856_create_lokasis_table', 1);
INSERT INTO `migrations` VALUES (8, '2021_11_04_083018_create_achivements_table', 1);
INSERT INTO `migrations` VALUES (9, '2021_11_04_083207_create_plannings_table', 1);
INSERT INTO `migrations` VALUES (10, '2021_11_04_083351_create_transaksis_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for plannings
-- ----------------------------
DROP TABLE IF EXISTS `plannings`;
CREATE TABLE `plannings`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `waktu_target` double(11, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `plannings_item_id_foreign`(`item_id`) USING BTREE,
  CONSTRAINT `plannings_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of plannings
-- ----------------------------
INSERT INTO `plannings` VALUES (1, 1, 10, 20.00, '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `plannings` VALUES (2, 2, 15, 30.00, '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `plannings` VALUES (3, 3, 12, 24.00, '2021-11-05 19:59:13', '2021-11-05 19:59:13');
INSERT INTO `plannings` VALUES (4, 4, 14, 28.00, '2021-11-05 19:59:13', '2021-11-05 19:59:13');

-- ----------------------------
-- Table structure for transaksis
-- ----------------------------
DROP TABLE IF EXISTS `transaksis`;
CREATE TABLE `transaksis`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `lokasi_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaksis_karyawan_id_foreign`(`karyawan_id`) USING BTREE,
  INDEX `transaksis_lokasi_id_foreign`(`lokasi_id`) USING BTREE,
  INDEX `transaksis_item_id_foreign`(`item_id`) USING BTREE,
  CONSTRAINT `transaksis_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transaksis_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transaksis_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasis` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksis
-- ----------------------------
INSERT INTO `transaksis` VALUES (1, 1, '2021-11-05', 1, 1, 10, '2021-11-05 19:59:13', '2021-11-05 19:59:13', NULL);
INSERT INTO `transaksis` VALUES (2, 1, '2021-11-05', 1, 1, 50, '2021-11-05 19:59:13', '2021-11-05 19:59:13', NULL);
INSERT INTO `transaksis` VALUES (3, 1, '2021-11-05', 2, 2, 90, '2021-11-05 19:59:13', '2021-11-05 19:59:13', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@gmail.com', NULL, '$2y$10$FVIRN3RaTjFybcP4WYc9luvetfIN8169siPIhj9ayK.2x.O0pwJFm', NULL, '2021-11-05 19:59:13', '2021-11-05 19:59:13');

SET FOREIGN_KEY_CHECKS = 1;
