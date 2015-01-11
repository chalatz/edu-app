-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21-1~dotdeb.1 - (Debian)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table edu.graders
CREATE TABLE IF NOT EXISTS `graders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `grader_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district_id` tinyint(4) DEFAULT NULL,
  `cat_id` tinyint(4) DEFAULT NULL,
  `from_who` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `past_grader` tinyint(4) NOT NULL,
  `site_1` int(11) NOT NULL DEFAULT '0',
  `site_2` int(11) NOT NULL DEFAULT '0',
  `has_agreed` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.graders: ~0 rows (approximately)
/*!40000 ALTER TABLE `graders` DISABLE KEYS */;
/*!40000 ALTER TABLE `graders` ENABLE KEYS */;


-- Dumping structure for table edu.grader_site
CREATE TABLE IF NOT EXISTS `grader_site` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grader_id` int(10) unsigned NOT NULL,
  `site_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `grader_site_grader_id_index` (`grader_id`),
  KEY `grader_site_site_id_index` (`site_id`),
  CONSTRAINT `grader_site_grader_id_foreign` FOREIGN KEY (`grader_id`) REFERENCES `graders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `grader_site_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.grader_site: ~0 rows (approximately)
/*!40000 ALTER TABLE `grader_site` DISABLE KEYS */;
/*!40000 ALTER TABLE `grader_site` ENABLE KEYS */;


-- Dumping structure for table edu.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_12_07_171147_create_posts_table', 1),
	('2014_12_08_182027_create_users_table', 1),
	('2014_12_11_094259_create_profiles_table', 1),
	('2014_12_13_180923_add_confirmed_to_users_table', 1),
	('2014_12_14_130645_add_type_to_users_table', 1),
	('2014_12_14_173517_create_sites_table', 1),
	('2014_12_15_200453_add_has_site_to_users_table', 1),
	('2014_12_16_072725_create_graders_table', 2),
	('2014_12_19_102022_create_grader_site_table', 3),
	('2015_01_10_173757_create_roles_table', 4),
	('2015_01_10_175124_create_role_user_table', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table edu.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table edu.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `twitter_username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.profiles: ~0 rows (approximately)
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;


-- Dumping structure for table edu.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'site', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'grader', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table edu.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.role_user: ~4 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;


-- Dumping structure for table edu.sites
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `site_url` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `district_id` tinyint(4) NOT NULL,
  `creator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsible` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `grader_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grader_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `notify_grader` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.sites: ~1 rows (approximately)
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;


-- Dumping structure for table edu.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'site',
  `confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `confirmation_string` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `has_site` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
