-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 17 Ιαν 2015 στις 17:27:04
-- Έκδοση διακομιστή: 5.6.15
-- Έκδοση PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση δεδομένων: `edu`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, '1. Νηπιαγωγεία, Δημοτικά Σχολεία, Δημοτικά Ειδικά Σχολεία', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2. Γυμνάσια, ΕΕΕΕΚ, ΣΔΕ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '3. Γενικά Λύκεια, ΕΠΑΛ, ΕΚ, ΤΕΕ Ειδικής Αγωγής', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '4. Υποστηρικτικές δομές εκπαίδευσης', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '5. Διοικητικές μονάδες Διευθύνσεων Εκπαίδευσης και Περιφερειακών Διευθύνσεων Εκπαίδευσης', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '6. Προσωπικοί και ομαδικοί διαδικτυακοί τόποι εκπαιδευτικών', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `district_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Άδειασμα δεδομένων του πίνακα `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 'Αττική', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Βόρειο Αιγαίο', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Νότιο Αιγαίο', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Δυτική Ελλάδα', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Θεσσαλία', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Ήπειρος', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Ιόνιο', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Κρήτη', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Ανατολική Μακεδονία και Θράκη', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Δυτική Μακεδονία', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Κεντρική Μακεδονία', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Πελοπόννησος', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Στερεά Ελλάδα', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Άλλη...', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `graders`
--

CREATE TABLE IF NOT EXISTS `graders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `grader_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grader_last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district_id` tinyint(4) DEFAULT NULL,
  `grader_district_text` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_id` tinyint(4) DEFAULT NULL,
  `from_who` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_who_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `past_grader` tinyint(4) DEFAULT NULL,
  `past_grader_more` tinyint(4) NOT NULL DEFAULT '100',
  `site_1` int(11) NOT NULL DEFAULT '0',
  `site_2` int(11) NOT NULL DEFAULT '0',
  `has_agreed` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wants_to_be_grader_b` tinyint(4) NOT NULL DEFAULT '100',
  `languages` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `languages_level` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desired_category` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Άδειασμα δεδομένων του πίνακα `graders`
--

INSERT INTO `graders` (`id`, `user_id`, `grader_name`, `grader_last_name`, `district_id`, `grader_district_text`, `cat_id`, `from_who`, `from_who_email`, `past_grader`, `past_grader_more`, `site_1`, `site_2`, `has_agreed`, `created_at`, `updated_at`, `wants_to_be_grader_b`, `languages`, `languages_level`, `desired_category`) VALUES
(11, 77, 'Alan', 'Chris', 3, NULL, 4, 'Yellow Blue', 'me@yellowblue.eu', 0, 1, 0, 0, 0, '2015-01-15 23:08:14', '2015-01-16 11:34:54', 1, 'Αγγλικά', 'Proficiency', 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `grader_site`
--

CREATE TABLE IF NOT EXISTS `grader_site` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grader_id` int(10) unsigned NOT NULL,
  `site_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `grader_site_grader_id_index` (`grader_id`),
  KEY `grader_site_site_id_index` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Άδειασμα δεδομένων του πίνακα `grader_site`
--

INSERT INTO `grader_site` (`id`, `grader_id`, `site_id`, `created_at`, `updated_at`) VALUES
(11, 11, 13, '2015-01-15 23:08:14', '2015-01-15 23:08:14');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `migrations`
--

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
('2015_01_10_175124_create_role_user_table', 5),
('2015_01_14_112549_add_some_fields_to_sites_table', 6),
('2015_01_14_114207_create_districts_table', 7),
('2015_01_15_182335_create_categories_table', 8),
('2015_01_15_214017_add_grader_last_name_to_sites_table', 9),
('2015_01_15_214541_add_grader_last_name_to_graders_table', 9);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `twitter_username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Άδειασμα δεδομένων του πίνακα `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'site', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'grader', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

--
-- Άδειασμα δεδομένων του πίνακα `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(78, 1, 76, '2015-01-15 22:53:04', '2015-01-15 22:53:04'),
(79, 2, 77, '2015-01-15 23:08:14', '2015-01-15 23:08:14');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `site_url` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `district_id` tinyint(4) NOT NULL,
  `district_text` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `county` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsible` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsible_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grader_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grader_last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grader_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `grader_district` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grader_district_text` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notify_grader` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `restricted_access` tinyint(4) NOT NULL DEFAULT '0',
  `restricted_access_details` text COLLATE utf8_unicode_ci,
  `received_permission` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Άδειασμα δεδομένων του πίνακα `sites`
--

INSERT INTO `sites` (`id`, `user_id`, `site_url`, `title`, `cat_id`, `district_id`, `district_text`, `county`, `creator`, `responsible`, `responsible_type`, `contact_name`, `contact_email`, `phone`, `mobile_phone`, `grader_name`, `grader_last_name`, `grader_email`, `grader_district`, `grader_district_text`, `notify_grader`, `created_at`, `updated_at`, `restricted_access`, `restricted_access_details`, `received_permission`) VALUES
(13, 76, 'http://www.yellowblue.eu', 'Yellow Blue', 4, 3, '', NULL, 'YB', 'YB', 'qwerty', 'YB', 'chalatz@yahoo.gr', '2424', '43345', 'Alan', 'Chris', 'chralatz@gmail.com', '3', NULL, 1, '2015-01-15 23:08:14', '2015-01-15 23:08:14', 0, '', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `confirmed`, `remember_token`, `created_at`, `updated_at`, `confirmation_string`, `has_site`) VALUES
(76, 'me@yellowblue.eu', '$2y$10$9Vr6b.LRlUGvgKZXsybBJe4tFd2bo/nQrbkIBqH155MX6ezLxs9fW', 'site', 1, 'ZpTMPrNZrYZMD2pGmPlBTR6UnHFbzKQ4L044Ht057VkO3E6aQy0l5SeLzkwG', '2015-01-15 22:53:04', '2015-01-15 23:11:32', 'S5cfqPDnR1G2QocRRsI70h1gps5wbo37rjbhNvxh', 1),
(77, 'chralatz@gmail.com', '$2y$10$yNJwPtRG7Wm0HHCAPYGXeeEENoP.2kVO.9fHTWdCMsDMZsOFgjjeu', 'grader', 1, 'sxAtwpAFaPflBdnTiz6MznRklSDQ2XAsn9ek2WPBz8mW4DWo1f6HhfiTx7ul', '2015-01-15 23:08:14', '2015-01-16 11:39:09', 'yRd5UG8oaBe8fsXvkdBW1R3ZrPoQh9ankKWUAo9p', 0);

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `grader_site`
--
ALTER TABLE `grader_site`
  ADD CONSTRAINT `grader_site_grader_id_foreign` FOREIGN KEY (`grader_id`) REFERENCES `graders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grader_site_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Περιορισμοί για πίνακα `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
