-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table lskit_lms.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.categories: ~2 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `slug`, `img`, `created_at`, `updated_at`) VALUES
	(12, 'Class Five', 'class-five', '1629087209-35004.jpg', '2021-08-16 03:43:11', '2021-08-16 04:13:29'),
	(14, 'gozavihi@mailinator.com', 'jukom@mailinator.com', '1629085410-45886.jpg', '2021-08-16 03:43:30', '2021-08-16 03:43:30');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.ch_favorites
DROP TABLE IF EXISTS `ch_favorites`;
CREATE TABLE IF NOT EXISTS `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.ch_favorites: ~0 rows (approximately)
DELETE FROM `ch_favorites`;
/*!40000 ALTER TABLE `ch_favorites` DISABLE KEYS */;
/*!40000 ALTER TABLE `ch_favorites` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.ch_messages
DROP TABLE IF EXISTS `ch_messages`;
CREATE TABLE IF NOT EXISTS `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.ch_messages: ~116 rows (approximately)
DELETE FROM `ch_messages`;
/*!40000 ALTER TABLE `ch_messages` DISABLE KEYS */;
INSERT INTO `ch_messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
	(1646913490, 'groups', 33, 13, 'hello f', NULL, 0, '2021-10-02 07:26:04', '2021-10-02 07:26:04'),
	(1647330950, 'group', 33, 777773, 'wwwwwww', NULL, 0, '2021-10-13 05:06:55', '2021-10-13 05:06:55'),
	(1655208715, 'groups', 31, 13, 'www', NULL, 0, '2021-10-03 06:27:39', '2021-10-03 06:27:39'),
	(1686797881, 'Teacher', 33, 31, 'uuuuughjfghj', NULL, 1, '2021-10-03 06:11:17', '2021-10-03 06:11:22'),
	(1688381057, 'groups', 31, 13, 'iii', NULL, 0, '2021-10-03 06:31:50', '2021-10-03 06:31:50'),
	(1708512329, 'Student', 12, 33, 'dfgsdfgdfgfdgdfg', NULL, 1, '2021-09-04 07:24:56', '2021-09-04 07:24:56'),
	(1714627720, 'user', 12, 31, 'dfhdfghsfhsfgh', NULL, 1, '2021-09-04 04:44:41', '2021-09-04 07:26:06'),
	(1739655327, 'group', 38, 777773, 'pppp', NULL, 0, '2021-10-13 05:08:54', '2021-10-13 05:08:54'),
	(1745816791, 'groups', 38, 8888813, 'uuuuu', NULL, 0, '2021-10-13 05:09:09', '2021-10-13 05:09:09'),
	(1783466336, 'user', 12, 33, 'r hgsd', NULL, 1, '2021-09-04 04:46:30', '2021-09-04 07:23:16'),
	(1785853500, 'groups', 35, 13, 'ertgwertg', NULL, 0, '2021-10-02 07:37:32', '2021-10-02 07:37:32'),
	(1790092487, 'groups', 33, 13, 'pp', NULL, 0, '2021-10-03 06:19:05', '2021-10-03 06:19:05'),
	(1804564464, 'group', 38, 777773, 'hello', NULL, 0, '2021-10-13 04:46:34', '2021-10-13 04:46:34'),
	(1811697313, 'groups', 31, 13, 'ki koro', NULL, 0, '2021-10-03 06:14:28', '2021-10-03 06:14:28'),
	(1825427807, 'groups', 33, 13, 'ppp', NULL, 0, '2021-10-03 06:17:03', '2021-10-03 06:17:03'),
	(1830443844, 'Student', 33, 36, 'asdfdsf', NULL, 0, '2021-09-05 05:03:17', '2021-09-05 05:03:17'),
	(1830557258, 'Teacher', 33, 31, 'ppp', NULL, 1, '2021-10-03 06:07:19', '2021-10-03 06:08:14'),
	(1850481640, 'groups', 33, 13, 'hello', NULL, 0, '2021-10-02 07:19:33', '2021-10-02 07:19:33'),
	(1852210039, 'groups', 33, 13, 'hi', NULL, 0, '2021-10-02 06:58:54', '2021-10-02 06:58:54'),
	(1889894778, 'Student', 33, 35, 'asdfsf', NULL, 0, '2021-09-05 05:03:22', '2021-09-05 05:03:22'),
	(1891718945, 'Student', 33, 36, 'rt', NULL, 0, '2021-09-05 04:58:45', '2021-09-05 04:58:45'),
	(1891856789, 'user', 12, 31, 'trh', NULL, 1, '2021-09-04 04:44:34', '2021-09-04 07:26:06'),
	(1893350304, 'Teacher', 33, 31, 'ppppp', NULL, 1, '2021-10-03 06:10:55', '2021-10-03 06:10:55'),
	(1897680055, 'groups', 38, 13, 'ima heere', NULL, 0, '2021-10-02 07:28:42', '2021-10-02 07:28:42'),
	(1898703283, 'groups', 33, 13, 'ppppp', NULL, 0, '2021-10-03 06:17:01', '2021-10-03 06:17:01'),
	(1911413517, 'Teacher', 33, 31, 'hrllo', NULL, 1, '2021-10-03 06:10:33', '2021-10-03 06:10:41'),
	(1915827197, 'user', 12, 33, 'hs\r\nd', NULL, 1, '2021-09-04 04:46:31', '2021-09-04 07:23:16'),
	(1921453479, 'groups', 31, 13, 'yyyy', NULL, 0, '2021-10-03 06:09:51', '2021-10-03 06:09:51'),
	(1926339324, 'groups', 38, 8888813, 'dfgdfrgsd', NULL, 0, '2021-10-13 04:59:45', '2021-10-13 04:59:45'),
	(1927750293, 'user', 12, 33, 'drf hgsdrf gs\r\nd', NULL, 1, '2021-09-04 04:46:27', '2021-09-04 07:23:16'),
	(1932407758, 'group', 38, 777773, 'dfghdfgh', NULL, 0, '2021-10-13 04:53:18', '2021-10-13 04:53:18'),
	(1935140489, 'Teacher', 33, 31, 'luyffo', NULL, 1, '2021-09-05 06:00:05', '2021-09-18 05:05:51'),
	(1938507352, 'user', 12, 31, 'thdfgh', NULL, 1, '2021-09-04 04:44:37', '2021-09-04 07:26:06'),
	(1959915963, 'Teacher', 33, 31, 'ppp', NULL, 1, '2021-10-03 06:08:05', '2021-10-03 06:08:14'),
	(1966649931, 'groups', 33, 13, 'ppp', NULL, 0, '2021-10-03 06:17:04', '2021-10-03 06:17:04'),
	(1973545518, 'user', 12, 31, 'hi', NULL, 1, '2021-09-04 04:43:39', '2021-09-04 07:26:06'),
	(1986007313, 'user', 12, 31, 'fth f', NULL, 1, '2021-09-04 04:44:36', '2021-09-04 07:26:06'),
	(1988025464, 'groups', 33, 13, '', '{"new_name":"bf4ebcf8-d433-476a-bfb9-bf73a61f6176.jpg","old_name":"5bbc11d7852485126c992135005efd9d.jpg"}', 0, '2021-10-03 06:32:28', '2021-10-03 06:32:28'),
	(2013659574, 'group', 33, 3, 'hello man', NULL, 0, '2021-10-12 07:47:30', '2021-10-12 07:47:30'),
	(2018441246, 'groups', 33, 13, 'kisuna', NULL, 0, '2021-10-03 06:14:37', '2021-10-03 06:14:37'),
	(2021684527, 'group', 38, 777773, 'tttttt', NULL, 0, '2021-10-13 04:58:11', '2021-10-13 04:58:11'),
	(2026230761, 'groups', 31, 13, 'iiii', NULL, 0, '2021-10-03 06:25:14', '2021-10-03 06:25:14'),
	(2033301010, 'user', 12, 33, 'frg s\r\nd', NULL, 1, '2021-09-04 04:46:25', '2021-09-04 07:23:16'),
	(2040205921, 'groups', 33, 13, 'ppp', NULL, 0, '2021-10-03 06:17:19', '2021-10-03 06:17:19'),
	(2040636616, 'group', 33, 777773, 'yyyy', NULL, 0, '2021-10-13 05:03:34', '2021-10-13 05:03:34'),
	(2045599058, 'groups', 31, 13, 'ok', NULL, 0, '2021-10-03 06:32:09', '2021-10-03 06:32:09'),
	(2046725217, 'Teacher', 31, 31, 'ii', NULL, 1, '2021-09-05 05:07:13', '2021-09-05 05:07:14'),
	(2062874286, 'Admin', 33, 12, 'gh', NULL, 1, '2021-09-04 07:24:41', '2021-09-04 07:24:42'),
	(2073467362, 'groups', 31, 13, 'mm', NULL, 0, '2021-10-03 06:29:50', '2021-10-03 06:29:50'),
	(2076427406, 'Teacher', 35, 31, 'rrrr', NULL, 1, '2021-09-04 07:31:00', '2021-09-04 07:31:01'),
	(2093982306, 'Admin', 31, 12, 'knb', NULL, 1, '2021-09-05 05:08:25', '2021-09-18 05:04:53'),
	(2095108773, 'user', 12, 31, 'fshsfhsfhshsfhsfthsfthgsth\r\ns', NULL, 1, '2021-09-04 04:44:46', '2021-09-04 07:26:06'),
	(2099361420, 'group', 38, 777773, 'pppp', NULL, 0, '2021-10-13 05:04:03', '2021-10-13 05:04:03'),
	(2104977509, 'group', 33, 777773, 'yyyyy', NULL, 0, '2021-10-13 04:57:27', '2021-10-13 04:57:27'),
	(2110982057, 'group', 33, 777773, 'fghdfghdfghgfhfghgfhfghfdghdfghdfghfghg', NULL, 0, '2021-10-13 04:53:13', '2021-10-13 04:53:13'),
	(2114837138, 'user', 12, 31, 'sfghsfghsfhtsfthsfh', NULL, 1, '2021-09-04 04:44:43', '2021-09-04 07:26:06'),
	(2124922014, 'user', 12, 12, 'df', NULL, 1, '2021-09-04 04:45:55', '2021-09-04 04:45:56'),
	(2131229175, 'Student', 33, 35, 'pp', NULL, 0, '2021-10-03 05:54:36', '2021-10-03 05:54:36'),
	(2131948258, 'user', 12, 31, 'sththst', NULL, 1, '2021-09-04 04:44:57', '2021-09-04 07:26:06'),
	(2132972336, 'Teacher', 35, 31, 'hh', NULL, 1, '2021-09-04 07:30:48', '2021-09-04 07:30:49'),
	(2150072460, 'Admin', 33, 12, 'sdfsdf', NULL, 1, '2021-09-04 07:24:19', '2021-09-04 07:24:19'),
	(2153316932, 'user', 12, 31, 'darrgdg', NULL, 1, '2021-09-04 04:48:15', '2021-09-04 07:26:06'),
	(2159329134, 'Student', 31, 35, 'dfgsdg', NULL, 1, '2021-09-04 07:31:05', '2021-09-04 07:31:06'),
	(2161583504, 'groups', 31, 13, 'fghnmdghndghndghn', NULL, 0, '2021-10-03 06:11:59', '2021-10-03 06:11:59'),
	(2180493300, 'groups', 33, 8888813, 'retyrty', NULL, 0, '2021-10-13 04:57:50', '2021-10-13 04:57:50'),
	(2182238985, 'user', 12, 31, 'hgdfghfgh', NULL, 1, '2021-09-04 04:44:38', '2021-09-04 07:26:06'),
	(2214146271, 'user', 12, 33, 'rfhsd\r\nf', NULL, 1, '2021-09-04 04:46:30', '2021-09-04 07:23:16'),
	(2214870081, 'Admin', 31, 12, 'ffff', NULL, 1, '2021-09-18 05:05:26', '2021-09-18 05:05:28'),
	(2256089805, 'groups', 33, 13, 'hello', NULL, 0, '2021-10-03 06:14:17', '2021-10-03 06:14:17'),
	(2266010183, 'Student', 33, 35, '', '{"new_name":"e8acad1d-df97-46c0-a5ba-99cf4eadca03.png","old_name":"image-2.png"}', 0, '2021-09-16 05:14:19', '2021-09-16 05:14:19'),
	(2266465457, 'group', 33, 777773, 'oooo', NULL, 0, '2021-10-13 05:09:00', '2021-10-13 05:09:00'),
	(2266751894, 'Admin', 33, 12, 'oi', NULL, 1, '2021-09-04 07:23:21', '2021-09-04 07:23:31'),
	(2288433070, 'Student', 33, 35, 'hello', NULL, 0, '2021-09-05 04:56:33', '2021-09-05 04:56:33'),
	(2295509949, 'user', 12, 31, '', '{"new_name":"90fb9b6d-042d-4c52-ab1c-5b8e373043b3.png","old_name":"Untitled-1.png"}', 1, '2021-09-04 05:17:21', '2021-09-04 07:26:06'),
	(2301858307, 'user', 12, 33, 'f hg\r\ns', NULL, 1, '2021-09-04 04:46:32', '2021-09-04 07:23:16'),
	(2306298084, 'Student', 31, 35, 'ke', NULL, 1, '2021-09-04 07:30:38', '2021-09-04 07:30:39'),
	(2316327656, 'groups', 38, 8888813, 'kkkk', NULL, 0, '2021-10-13 05:09:26', '2021-10-13 05:09:26'),
	(2316805620, 'user', 12, 31, 'sthsthsthsth', NULL, 1, '2021-09-04 04:44:59', '2021-09-04 07:26:06'),
	(2318434316, 'user', 12, 31, 'drfg', NULL, 1, '2021-09-04 06:33:06', '2021-09-04 07:26:06'),
	(2320523730, 'groups', 33, 8888813, 'dfgdg', NULL, 0, '2021-10-13 04:59:38', '2021-10-13 04:59:38'),
	(2320678845, 'Admin', 33, 12, 'asdfsf', NULL, 1, '2021-09-05 05:03:27', '2021-10-02 05:26:42'),
	(2337431750, 'Student', 12, 33, 'ki', NULL, 1, '2021-09-04 07:23:39', '2021-09-04 07:23:40'),
	(2339053866, 'user', 12, 31, 'shsthsthsth', NULL, 1, '2021-09-04 04:45:01', '2021-09-04 07:26:06'),
	(2370144948, 'groups', 33, 13, 'ppp', NULL, 0, '2021-10-03 06:29:31', '2021-10-03 06:29:31'),
	(2384606425, 'user', 12, 23, 'hjihuihu', NULL, 0, '2021-09-04 04:48:58', '2021-09-04 04:48:58'),
	(2389168168, 'user', 12, 31, '', '{"new_name":"a46e2dd1-371f-420c-aa03-dd5409120104.jpg","old_name":"JGyXMn.jpg"}', 1, '2021-09-04 05:16:52', '2021-09-04 07:26:06'),
	(2392564624, 'group', 33, 777773, 'rtyrtyrt', NULL, 0, '2021-10-13 04:57:11', '2021-10-13 04:57:11'),
	(2396755880, 'groups', 31, 13, 'tttt', NULL, 0, '2021-10-03 05:50:53', '2021-10-03 05:50:53'),
	(2417895314, 'groups', 33, 13, 'llllll', NULL, 0, '2021-10-03 06:25:40', '2021-10-03 06:25:40'),
	(2419590045, 'groups', 35, 13, '', '{"new_name":"582942d2-3bcf-44f6-b777-362373c10c67.jpg","old_name":"Big+Banner+(3)-1.jpg"}', 0, '2021-10-02 07:29:33', '2021-10-02 07:29:33'),
	(2423768395, 'Student', 31, 35, 'fddfg', NULL, 0, '2021-09-04 07:32:21', '2021-09-04 07:32:21'),
	(2431900542, 'user', 12, 31, 'sthshsthsth', NULL, 1, '2021-09-04 04:44:56', '2021-09-04 07:26:06'),
	(2441795490, 'group', 38, 777773, 'rtgerr', NULL, 0, '2021-10-13 04:57:08', '2021-10-13 04:57:08'),
	(2445027165, 'groups', 35, 13, 'hello', NULL, 0, '2021-10-02 07:03:22', '2021-10-02 07:03:22'),
	(2451630015, 'user', 12, 31, 'sthsthsthsthsthsth\r\nst', NULL, 1, '2021-09-04 04:44:51', '2021-09-04 07:26:06'),
	(2477459266, 'user', 12, 33, 'fh g\r\ns', NULL, 1, '2021-09-04 04:46:26', '2021-09-04 07:23:16'),
	(2480860274, 'Student', 31, 35, 'ihb', NULL, 0, '2021-09-05 05:08:19', '2021-09-05 05:08:19'),
	(2484669664, 'user', 12, 31, 'hsthsthhsthsthsthth', NULL, 1, '2021-09-04 04:44:54', '2021-09-04 07:26:06'),
	(2504957155, 'group', 38, 777773, 'ertyrtyty', NULL, 0, '2021-10-13 04:56:55', '2021-10-13 04:56:55'),
	(2505512710, 'groups', 33, 13, 'pppppp', NULL, 0, '2021-10-03 06:19:10', '2021-10-03 06:19:10'),
	(2507306590, 'Student', 31, 35, 'gjhgjg', NULL, 0, '2021-09-04 07:33:09', '2021-09-04 07:33:09'),
	(2519186643, 'group', 31, 777773, 'opopo', NULL, 0, '2021-10-12 08:00:20', '2021-10-12 08:00:20'),
	(2531339679, 'groups', 33, 13, 'pppp', NULL, 0, '2021-10-03 06:17:07', '2021-10-03 06:17:07'),
	(2535102624, 'user', 12, 31, '', '{"new_name":"780fc7c2-d88f-48b1-9fc4-bf08952bd695.jpg","old_name":"Big+Banner+(3)-1.jpg"}', 1, '2021-09-04 04:43:55', '2021-09-04 07:26:06'),
	(2537716209, 'Student', 31, 35, 'dfgdfg', NULL, 0, '2021-09-04 07:31:53', '2021-09-04 07:31:53'),
	(2547127921, 'groups', 33, 13, 'vvvv', NULL, 0, '2021-10-03 06:27:56', '2021-10-03 06:27:56'),
	(2547826357, 'groups', 33, 8888813, 'yyy', NULL, 0, '2021-10-13 05:09:20', '2021-10-13 05:09:20'),
	(2557857464, 'user', 12, 33, 'dsfgsdfgdf rd drfgsd rg \r\nsd', NULL, 1, '2021-09-04 04:46:24', '2021-09-04 07:23:16'),
	(2559124424, 'groups', 38, 8888813, 'iiii', NULL, 0, '2021-10-13 04:59:58', '2021-10-13 04:59:58'),
	(2564951439, 'group', 33, 1, 'hrr', NULL, 0, '2021-10-12 07:47:51', '2021-10-12 07:47:51'),
	(2581165831, 'Student', 31, 35, 'n', NULL, 0, '2021-09-05 05:08:39', '2021-09-05 05:08:39'),
	(2593524871, 'group', 33, 777773, 'dfgdfg', NULL, 0, '2021-10-12 07:54:57', '2021-10-12 07:54:57'),
	(2600975595, 'groups', 33, 13, 'p', NULL, 0, '2021-10-03 06:32:01', '2021-10-03 06:32:01'),
	(2614325708, 'user', 12, 31, 'htshtsthsthsthsrthsthsths\r\nh', NULL, 1, '2021-09-04 04:44:49', '2021-09-04 07:26:06'),
	(2620620049, 'Teacher', 35, 31, 'hello', NULL, 1, '2021-09-04 07:30:15', '2021-09-04 07:30:35'),
	(2622737890, 'groups', 31, 13, 'oooo', NULL, 0, '2021-10-03 06:21:36', '2021-10-03 06:21:36');
/*!40000 ALTER TABLE `ch_messages` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.contacts
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `massage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.contacts: ~2 rows (approximately)
DELETE FROM `contacts`;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `name`, `email`, `massage`, `read_at`, `created_at`, `updated_at`) VALUES
	(3, 'Todd Buckley', 'cynupuj@mailinator.com', 'Cupidatat quidem et', '2021-11-21', '2021-08-24 07:03:14', '2021-11-21 17:19:57'),
	(18, 'Luke Pennington', 'puvowok@mailinator.com', 'Omnis id aliqua Vel', '2021-10-24', '2021-08-28 03:45:32', '2021-10-24 16:06:48');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.courses
DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.courses: ~2 rows (approximately)
DELETE FROM `courses`;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `title`, `description`, `img`, `created_at`, `updated_at`, `status`) VALUES
	(13, 'MBA', 'MBA ugf aiusfhiuasf iouagdsfoiudfg oiugdsfu dfiuagsdf', '1629695670-91126.jpg', '2021-08-23 05:14:30', '2021-11-21 16:54:05', 1),
	(14, 'JSC', 'JSC student will get guide from expert', '1629777609-7882.jpg', '2021-08-24 04:00:09', '2021-08-24 06:14:40', 1),
	(20, 'BA', 'sdafsadfsadfsffsd', '1638160315-26232.jpg', '2021-11-29 04:31:55', '2021-11-29 04:31:55', NULL);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.group_chats
DROP TABLE IF EXISTS `group_chats`;
CREATE TABLE IF NOT EXISTS `group_chats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `own` int(11) NOT NULL,
  `member` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.group_chats: ~0 rows (approximately)
DELETE FROM `group_chats`;
/*!40000 ALTER TABLE `group_chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_chats` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.group_messeges
DROP TABLE IF EXISTS `group_messeges`;
CREATE TABLE IF NOT EXISTS `group_messeges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `body` int(11) NOT NULL,
  `attachment` int(11) NOT NULL,
  `seen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.group_messeges: ~0 rows (approximately)
DELETE FROM `group_messeges`;
/*!40000 ALTER TABLE `group_messeges` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_messeges` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.menus
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_id` int(11) DEFAULT NULL,
  `dropdown` int(11) DEFAULT NULL,
  `is_sub` int(11) DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.menus: ~9 rows (approximately)
DELETE FROM `menus`;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `title`, `main_id`, `dropdown`, `is_sub`, `status`, `url`, `created_at`, `updated_at`) VALUES
	(17, 'Home', NULL, 0, 0, 1, NULL, '2021-08-31 05:44:09', '2021-10-24 16:07:36'),
	(23, 'Career', NULL, 0, 0, 1, 'career', '2021-08-31 06:06:49', '2021-10-24 16:07:43'),
	(24, 'Contact', NULL, 0, 0, 1, 'contact', '2021-08-31 06:07:07', '2021-10-24 16:07:51'),
	(25, 'Login', NULL, 0, 0, 1, 'login', '2021-08-31 06:07:40', '2021-10-24 16:07:57'),
	(26, 'Menu', NULL, 1, 0, 1, '#', '2021-08-31 06:10:15', '2021-08-31 06:10:15'),
	(27, 'Item 1', 26, 0, 1, 1, '#', '2021-08-31 06:10:34', '2021-08-31 06:24:28'),
	(28, 'Item 2', 26, 0, 1, 1, '#', '2021-08-31 06:15:20', '2021-08-31 06:15:20'),
	(29, 'Item 3', 26, 0, 1, 1, '#', '2021-08-31 06:15:34', '2021-08-31 06:15:34'),
	(30, 'Item 4', 26, 0, 1, 1, '#', '2021-08-31 06:24:45', '2021-08-31 06:24:45');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.messenger_groups
DROP TABLE IF EXISTS `messenger_groups`;
CREATE TABLE IF NOT EXISTS `messenger_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) DEFAULT NULL,
  `member` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.messenger_groups: ~2 rows (approximately)
DELETE FROM `messenger_groups`;
/*!40000 ALTER TABLE `messenger_groups` DISABLE KEYS */;
INSERT INTO `messenger_groups` (`id`, `name`, `admin`, `member`, `created_at`, `updated_at`) VALUES
	(3, 'Groupe', 24, '["31","37","38","39","36","35","40","33"]', '2021-10-11 06:09:50', '2021-10-12 07:09:38'),
	(4, 'Class Hall', 31, '["24","31","33","35","36","37","38","39","40"]', '2021-10-13 05:34:13', '2021-10-13 05:43:33');
/*!40000 ALTER TABLE `messenger_groups` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.migrations: ~29 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(6, '2021_08_07_053106_create_role_user_table', 1),
	(7, '2021_08_08_061526_create_categories_table', 2),
	(8, '2021_08_16_042734_create_courses_table', 3),
	(9, '2021_08_16_043219_create_subjects_table', 3),
	(11, '2021_08_17_042109_add_description_to_subjects_table', 4),
	(12, '2021_08_17_041904_add_description_to_courses_table', 5),
	(14, '2021_08_07_052901_create_roles_table', 6),
	(16, '2014_10_12_000000_create_users_table', 7),
	(17, '2021_08_21_045449_add_address_to_users_table', 7),
	(18, '2021_08_21_064026_add_super_admin_to_users_table', 8),
	(19, '2021_08_24_033929_add_role_name_to_users_table', 9),
	(20, '2021_08_24_053427_add_status_to_courses_table', 10),
	(21, '2021_08_24_053453_add_status_to_subjects_table', 10),
	(24, '2021_08_24_063335_create_contacts_table', 11),
	(25, '2021_08_29_043744_create_options_table', 12),
	(26, '2021_08_30_055956_create_menus_table', 13),
	(27, '2019_09_22_192348_create_messages_table', 14),
	(28, '2019_10_16_211433_create_favorites_table', 14),
	(29, '2019_10_18_223259_add_avatar_to_users', 14),
	(30, '2019_10_20_211056_add_messenger_color_to_users', 14),
	(31, '2019_10_22_000539_add_dark_mode_to_users', 14),
	(32, '2019_10_25_214038_add_active_status_to_users', 14),
	(33, '2021_09_07_054439_create_reviews_table', 15),
	(34, '2021_09_16_052905_create_group_chats_table', 16),
	(35, '2021_09_16_053246_create_group_messeges_table', 16),
	(36, '2021_10_10_061916_create_messenger_groups_table', 17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.options
DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logoimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `navmenu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.options: ~14 rows (approximately)
DELETE FROM `options`;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` (`id`, `type`, `title`, `logoimg`, `width`, `height`, `content`, `status`, `url`, `navmenu`, `header`, `footer`, `created_at`, `updated_at`) VALUES
	(5, 'css', 'test', NULL, NULL, NULL, 'body{\r\n   background-color  : red ;\r\n\r\n}', '0', NULL, NULL, NULL, NULL, '2021-08-30 04:30:37', '2021-08-30 06:44:50'),
	(6, 'css', 'ppp', NULL, NULL, NULL, 'h3{\r\n font-size : 50px;\r\n}', '0', NULL, NULL, NULL, NULL, '2021-08-30 04:32:47', '2021-08-30 06:44:57'),
	(15, 'page', 'Home Page', NULL, NULL, NULL, '<p>asdjfhjiasd asudhf asuidhf aisdug asud asd <img style="width: 50%;" src="http://127.0.0.1:8000/images/page_builder_img/2021-09-0181275271.jpg"><br></p>', '1', 'Home_Page', NULL, '1', '1', '2021-09-01 06:14:48', '2021-09-02 05:10:29'),
	(16, 'page', 'Home Page 2', NULL, NULL, NULL, '<p>fgbh fdt stdh&nbsp; <img style="width: 474px;" src="http://127.0.0.1:8000/images/page_builder_img/2021-09-017897419.jpg"><img style="width: 1021px;" src="http://127.0.0.1:8000/images/page_builder_img/2021-09-0176697797.jpg"><br></p>', '1', 'Home_Page_2', NULL, '1', '1', '2021-09-01 06:16:02', '2021-09-02 05:10:18'),
	(19, 'page', 'Eum sed odio nemo am', NULL, NULL, NULL, 'ttttt', '1', 'Eum_sed_odio_nemo_am', NULL, '1', '1', '2021-09-02 03:55:47', '2021-09-02 04:10:47'),
	(20, 'page', 'Consequatur volupta', NULL, NULL, NULL, '<p>In et soluta sint, q.<img style="width: 1021px;" src="http://127.0.0.1:8000/images/page_builder_img/2021-09-0236169271.png"></p>', '1', 'Consequatur_volupta', NULL, '1', '1', '2021-09-02 04:11:13', '2021-09-02 04:11:56'),
	(21, 'page', 'newpage', NULL, NULL, NULL, '<h1>Some text<br></h1>', '1', 'newpage', NULL, '1', '1', '2021-09-02 04:50:19', '2021-09-02 05:19:32'),
	(22, 'footer', NULL, NULL, NULL, NULL, '<div class="col-lg-3 col-md-6 col-sm-12 course">\r\n  <div class="logo">\r\n    <img src="assets/images/default/logo.png" alt="Footer Logo">\r\n  </div>\r\n\r\n  <div class="description">\r\n    <p>This is the first item\'s accordion body. It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes.</p>\r\n  </div>\r\n</div>', '1', NULL, NULL, NULL, NULL, '2021-09-02 06:17:24', '2021-09-02 06:49:14'),
	(23, 'footer', NULL, NULL, NULL, NULL, '<div class="col-lg-3 col-md-6 col-sm-12 course">\r\n  <div class="heading">\r\n    <h3>Links</h3>\r\n  </div>\r\n  <div class="links">\r\n    <a href="#">This is Link 1</a>\r\n    <a href="#">This is Link 2</a>\r\n    <a href="#">This is Link 3</a>\r\n    <a href="#">This is Link 4</a>\r\n    <a href="#">This is Link 5</a>\r\n  </div>\r\n</div>', '2', NULL, NULL, NULL, NULL, '2021-09-02 06:19:46', '2021-09-07 07:15:17'),
	(24, 'footer', NULL, NULL, NULL, NULL, '<div class="col-lg-3 col-md-6 col-sm-12 course">\r\n  <div class="heading">\r\n    <h3>Contact Us</h3>\r\n  </div>\r\n  <div class="contact">\r\n    <a href="tel:+88-012-345-6789"><i class="bi bi-phone"></i> +88-012-345-6789</a>\r\n    <a href="mailto:example@gmail.com"><i class="bi bi-envelope"></i> example@gmail.com</a>\r\n    <p><i class="bi bi-geo-alt"></i> This is the first item\'s accordion body. </p>\r\n  </div>\r\n</div>', '3', NULL, NULL, NULL, NULL, '2021-09-02 06:20:11', '2021-09-02 06:49:38'),
	(25, 'footer', NULL, NULL, NULL, NULL, '<div class="col-lg-3 col-md-6 col-sm-12 course">\r\n  <div class="heading">\r\n    <h3>Follow Us</h3>\r\n  </div>\r\n  <div class="social">\r\n    <a href="#"><i class="bi bi-google"></i></a>\r\n    <a href="#"><i class="bi bi-facebook"></i></a>\r\n    <a href="#"><i class="bi bi-twitter"></i></a>\r\n    <a href="#"><i class="bi bi-instagram"></i></a>\r\n    <a href="#"><i class="bi bi-youtube"></i></a>\r\n  </div>\r\n  <div class="applications">\r\n    <img src="assets/images/default/icon-app-store.svg" alt="Apple Logo">\r\n    <img src="assets/images/default/icon-play-store.svg" alt="Androied Logo">\r\n  </div>\r\n</div>', '4', NULL, NULL, NULL, NULL, '2021-09-02 06:20:21', '2021-09-02 06:49:53'),
	(26, 'footer', NULL, NULL, NULL, NULL, '<div class="copyright">\r\n  <div class="container text-center">\r\n    <p>&copy; All right reserved in 2021 | Powerd by <a href="#">LSKIT</a></p>\r\n  </div>\r\n</div>', '5', NULL, NULL, NULL, NULL, '2021-09-02 06:48:21', '2021-11-18 21:25:08'),
	(27, 'logo', NULL, '1630997320-38317.png', '350px', '80px', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-07 06:48:40'),
	(28, 'lesson', NULL, NULL, NULL, NULL, '<div class="mt-5"></div>\r\n    <div class="title a-h1">\r\n        <h1>Popular Lessons</h1>\r\n    </div>\r\n    <section class="pupular-lesson">\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-md-12">\r\n                    <ul class="lessons">\r\n                        <li class="lesson">Macebth</li>\r\n                        <li class="lesson">Hamlet</li>\r\n                        <li class="lesson">Preface to Shakespeare</li>\r\n                        <li class="lesson">Robinson Crusoe</li>\r\n                        <li class="lesson">Pilgrims Progress</li>\r\n                        <li class="lesson">A Doll\'s House</li>\r\n                        <li class="lesson">Pygmalion</li>\r\n                        <li class="lesson">Heart Of Darkness</li>\r\n                        <li class="lesson">Metamorphosis</li>\r\n                        <li class="lesson">The Dumb Waiter</li>\r\n                        <li class="lesson">Arms and the men</li>\r\n                        <li class="lesson">Riders to the sea</li>\r\n                    </ul>\r\n                </div>\r\n            </div>\r\n        </div>\r\n</section>', '1', NULL, NULL, NULL, NULL, '2021-09-08 06:15:41', '2021-09-08 06:33:20'),
	(29, 'chat_plugin', NULL, NULL, NULL, NULL, '<!-- Messenger Chat Plugin Code -->\r\n    <div id="fb-root"></div>\r\n\r\n    <!-- Your Chat Plugin code -->\r\n    <div id="fb-customer-chat" class="fb-customerchat">\r\n    </div>\r\n\r\n    <script>\r\n      var chatbox = document.getElementById(\'fb-customer-chat\');\r\n      chatbox.setAttribute("page_id", "883696575301602");\r\n      chatbox.setAttribute("attribution", "biz_inbox");\r\n\r\n      window.fbAsyncInit = function() {\r\n        FB.init({\r\n          xfbml            : true,\r\n          version          : \'v12.0\'\r\n        });\r\n      };\r\n\r\n      (function(d, s, id) {\r\n        var js, fjs = d.getElementsByTagName(s)[0];\r\n        if (d.getElementById(id)) return;\r\n        js = d.createElement(s); js.id = id;\r\n        js.src = \'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js\';\r\n        fjs.parentNode.insertBefore(js, fjs);\r\n      }(document, \'script\', \'facebook-jssdk\'));\r\n    </script>', NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-29 06:08:28'),
	(30, 'chat_plugin', NULL, NULL, NULL, NULL, 'hellosa', '1', NULL, NULL, NULL, NULL, '2021-11-29 06:00:19', '2021-11-29 06:00:56'),
	(31, 'chat_plugin', NULL, NULL, NULL, NULL, 'hellop', '1', NULL, NULL, NULL, NULL, '2021-11-29 06:00:29', '2021-11-29 06:00:29');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.reviews
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.reviews: ~3 rows (approximately)
DELETE FROM `reviews`;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` (`id`, `title`, `subtitle`, `img`, `body`, `status`, `created_at`, `updated_at`) VALUES
	(4, 'Amy Adams', 'CEO, Apino', '1630998537-72011.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem', 1, '2021-09-07 06:51:11', '2021-09-07 07:08:57'),
	(5, 'Amy Adams', 'CEO, Apino', '1630997507-55454.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem', 1, '2021-09-07 06:51:47', '2021-09-07 06:54:03'),
	(6, 'Amy Adams', 'CEO, Apino', '1630997542-12966.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem', 1, '2021-09-07 06:52:22', '2021-09-07 06:54:10');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.roles: ~4 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
	(2, 'Admin', '["1","2","3","4","6","7","8"]', '2021-08-18 04:47:09', '2021-08-26 05:31:38'),
	(5, 'Student', '["9","13","43","44","47","48"]', '2021-08-18 05:36:53', '2021-10-24 16:12:39'),
	(7, 'Teacher', '["1","5","9","12","17","21","25","29","33","35","39","43","44","45","46","47","48","49","53"]', '2021-08-21 04:10:55', '2021-10-13 05:35:38'),
	(10, 'Administator', '["1","2","3","4","5","6","7","8","9","10","11","12","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","47"]', '2021-09-13 05:59:17', '2021-09-13 06:02:24');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.role_user
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.role_user: ~22 rows (approximately)
DELETE FROM `role_user`;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(10, 1, 7, NULL, NULL),
	(11, 2, 5, NULL, NULL),
	(12, 3, 7, NULL, NULL),
	(13, 4, 7, NULL, NULL),
	(14, 5, 7, NULL, NULL),
	(15, 6, 5, NULL, NULL),
	(16, 7, 7, NULL, NULL),
	(17, 8, 7, NULL, NULL),
	(18, 9, 3, NULL, NULL),
	(19, 10, 2, NULL, NULL),
	(20, 11, 2, NULL, NULL),
	(21, 12, 3, NULL, NULL),
	(22, 13, 3, NULL, NULL),
	(23, 14, 3, NULL, NULL),
	(24, 15, 3, NULL, NULL),
	(25, 16, 3, NULL, NULL),
	(26, 17, 3, NULL, NULL),
	(27, 18, 3, NULL, NULL),
	(28, 19, 3, NULL, NULL),
	(29, 20, 3, NULL, NULL),
	(30, 21, 7, NULL, NULL),
	(31, 22, 3, NULL, NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.subjects
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.subjects: ~2 rows (approximately)
DELETE FROM `subjects`;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `course_id`, `title`, `description`, `img`, `created_at`, `updated_at`, `status`) VALUES
	(23, 14, 'Bangla 1ST Part', 'Bangla subject is important for all.', NULL, '2021-08-24 04:00:51', '2021-08-24 06:10:22', 1),
	(25, 14, 'Math', 'qojetery@mailinator.com', '1629785509-91122.jpg', '2021-08-24 06:11:50', '2021-08-24 06:14:58', 1);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Dumping structure for table lskit_lms.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentPhone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expertIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `super_admin` int(11) NOT NULL DEFAULT '0',
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lskit_lms.users: ~18 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `phone`, `parentPhone`, `course`, `img`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `expertIn`, `eq`, `cv`, `Address`, `note`, `super_admin`, `role_name`, `avatar`, `messenger_color`, `dark_mode`, `active_status`) VALUES
	(12, 'Israfil Hossain', 'admin@admin.com', '12345678954', NULL, '2', '1631167471-76398.jpg', NULL, '$2a$12$PiVVkFu3Poro3ms.NLx.4.3.PiZCKtnetTjUdzh4KRefvxFkeSBeK', '5wpJWGvQ3eUnOKyROjME5zdM7K8ehTNUK5Lj3w0etHLarEbGckZtO02Pnrv3', '2021-08-21 07:28:08', '2021-11-11 22:36:56', '', NULL, NULL, NULL, NULL, 1, 'Admin', '93b48689-02db-4eb4-bec5-7d6ca86fd03e.jpg', '#3F51B5', 0, 0),
	(23, 'Quinn Hurley', 'kugizati@mailinator.com', '0123654879', NULL, '14', NULL, NULL, '$2y$10$kTW8ybwjLHVQqiLSNHaRgOJPvxk11iK8Wd2713m9qokgMq2UZqMFe', NULL, '2021-08-24 04:23:44', '2021-11-29 04:31:16', '', NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(24, 'Jeremy Neal', 't2@t.t', '01236547898', NULL, '', NULL, NULL, '$2y$10$aO.9SsK8QRrSGDz6h8uRDOQF1WMyHhJgK6l8Ejbf5k79UODqkufva', NULL, '2021-08-24 04:24:31', '2021-10-03 05:52:31', '["13","14"]', 'BBA', '1629779070-57849.jpg', 'Cumque dicta eu cons', 'Ea facere qui iure v', 0, 'Teacher', 'avatar.png', '#2180f3', 0, 0),
	(31, 'Mahbub', 't@t.t', '01236547895', NULL, '', '1630989825-29852.jpg', NULL, '$2y$10$aO.9SsK8QRrSGDz6h8uRDOQF1WMyHhJgK6l8Ejbf5k79UODqkufva', NULL, '2021-08-24 05:07:20', '2021-10-03 06:31:43', '["13","14"]', 'MBA', '1629781639-4588.jpg', 'shiromoni', 'sdfhgsdf sdfhgsdf sdfhg', 0, 'Teacher', 'avatar.png', '#2180f3', 0, 1),
	(33, 'Sofiq ali', 's@s.s', '012365478987', '01236544777', '13', '1630988972-23854.jpg', NULL, '$2y$10$jGZpfSSCu/CKZICASIZey.tD2txnLK4Yligzf9u0nNCsNw812uGVq', NULL, '2021-08-24 05:08:18', '2021-10-13 05:06:24', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#4CAF50', 0, 1),
	(34, 'Admin', 'a@a.a', '1234567899', NULL, '', NULL, NULL, '$2y$10$L3qtQAPi4KsSlIxuuoEBsesH941OPn8tkjjSrNGGrZrV.QqInPA0W', NULL, '2021-08-24 05:15:32', '2021-09-07 05:08:28', '', NULL, NULL, NULL, NULL, 0, 'Admin', 'avatar.png', '#2180f3', 0, 0),
	(35, 'Stydent 2', 's2@s.s', '01236547898', NULL, '13', NULL, NULL, '$2y$10$/10HdobXOqNP4TbPfBoDseFsEnyEP97IDm1r/cdfgDa0MmNlfrufy', NULL, '2021-09-04 07:29:14', '2021-10-02 07:20:10', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 1),
	(36, 'Germaine Case', 'qecefyk@mailinator.com', '01236547898', NULL, '13', NULL, NULL, '$2y$10$EV75tVCOFJw1qIhAzQxMgOeFMUZu5yOVYK3H9XU9Lmuf3t1afrrK6', NULL, '2021-09-05 04:43:32', '2021-09-05 04:43:32', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(37, 'Emma Clemons', 'tunuziluz@mailinator.com', '01236547899', NULL, '13', NULL, NULL, '$2y$10$b.bhJaAEp7ZlpNMqhUzGuuSlqDEPK8Xxr4qN7ZVoBcjdA49lDRzeK', NULL, '2021-09-05 04:44:00', '2021-09-05 04:44:00', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(38, 'Lareina Wiggins', 's3@s.s', '01236547898', NULL, '13', NULL, NULL, '$2y$10$/10HdobXOqNP4TbPfBoDseFsEnyEP97IDm1r/cdfgDa0MmNlfrufy', NULL, '2021-09-05 04:44:40', '2021-10-13 05:13:23', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(39, 'Mona Swanson', 'vepimyjobe@mailinator.com', '01236547898', NULL, '13', NULL, NULL, '$2y$10$CaWRUu4elvXbGgPCkDM4U.bUhIpDGGhIcdvkIpZw3r9JcT/T1m3Xu', NULL, '2021-09-16 03:55:22', '2021-09-16 03:55:22', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(40, 'Lucian Pittman', 'fovynu@mailinator.com', '01236547894', '01234567898', '14', NULL, NULL, '$2y$10$jMjm7hcys9iyb42IxInHTOqd6tv0BwyDwqC/L4TEk4bOG6Yri5kg2', NULL, '2021-09-16 05:03:38', '2021-09-16 05:04:17', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(41, 'Reagan Bird', 'bofyhuk@mailinator.com', '01234567898', NULL, NULL, NULL, NULL, '$2y$10$iGYDIJFewUQYz82aE5Q.x.vhaPJjVSfsXiEk.bI6vkF2In6renRum', NULL, '2021-09-16 05:05:11', '2021-09-16 05:05:11', NULL, NULL, NULL, NULL, NULL, 0, 'Admin', 'avatar.png', '#2180f3', 0, 0),
	(42, 'mehedi', 'mdmh1209@gmail.com', '01620480961', NULL, '13', '1635577026-62421.jpg', NULL, '$2y$10$WyUJny0EHjgfpzJY2FS86eiuOSX3LpWdsw2hzproA2.Lsx9pkc5Gi', NULL, '2021-10-30 16:45:25', '2021-10-30 16:57:07', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(43, 'Melinda Ellis', 'racugyb@mailinator.com', '1567 3748711', NULL, '13', NULL, NULL, '$2y$10$q0Jiq0mvIojU2f33ipq0D.RhcT4MbJ6QNyABj4Bcxc5FS0WhIzYQq', NULL, '2021-11-13 15:30:57', '2021-11-13 15:30:57', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(44, 'Arthur Vang', 'wicem@mailinator.com', '13774736276', NULL, '14', NULL, NULL, '$2y$10$IUA2QGDkUI5K.Vit95wFQuewNYG7054tJevGNeXbkuTvQ65.a/3WS', NULL, '2021-11-13 15:47:01', '2021-11-13 15:47:01', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(45, 'Rylee Frederick', 'zyxe@mailinator.com', '15054812838', NULL, '13', NULL, NULL, '$2y$10$ab.je9S9qhwhzYCWINEFNOH8rHSNT39o2OIhK/l226aahyGYPHX9.', NULL, '2021-11-13 16:18:19', '2021-11-13 16:18:19', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(46, 'Khalilur Rahman', 'pollob@lskit.com', '916701578', NULL, '13', NULL, NULL, '$2y$10$Cbv/ZwG1zpFyMvkUHTQrvuueIcEMq7Mfux9JyPzmeGX97bv0ooZH2', NULL, '2021-11-15 18:19:05', '2021-11-15 18:19:05', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0),
	(47, 'shakil', 'std@gmail.com', '01969290200', NULL, '13', NULL, NULL, '$2y$10$p9xAlhcFIHmz1yVMIU3kQevVWZlCESVjWCEyswE58VES6uI94sTwC', NULL, '2021-11-29 04:23:54', '2021-11-29 04:23:54', NULL, NULL, NULL, NULL, NULL, 0, 'Student', 'avatar.png', '#2180f3', 0, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
