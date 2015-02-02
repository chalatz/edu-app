-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21-1~dotdeb.1 - (Debian)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table edu.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.categories: ~6 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
	(1, '1. Νηπιαγωγεία, Δημοτικά Σχολεία, Δημοτικά Ειδικά Σχολεία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(2, '2. Γυμνάσια, ΕΕΕΕΚ, ΣΔΕ', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(3, '3. Γενικά Λύκεια, ΕΠΑΛ, ΕΚ, ΤΕΕ Ειδικής Αγωγής', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(4, '4. Υποστηρικτικές δομές εκπαίδευσης **', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(5, '5. Διοικητικές μονάδες Διευθύνσεων Εκπαίδευσης και Περιφερειακών Διευθύνσεων Εκπαίδευσης', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(6, '6. Προσωπικοί ιστότοποι ατομικοί ή ομάδων εκπαιδευτικών', '2015-02-02 20:29:25', '2015-02-02 20:29:25');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table edu.counties
CREATE TABLE IF NOT EXISTS `counties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `county_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.counties: ~74 rows (approximately)
/*!40000 ALTER TABLE `counties` DISABLE KEYS */;
INSERT INTO `counties` (`id`, `county_name`, `district_id`, `district_name`, `created_at`, `updated_at`) VALUES
	(1, 'Βορείου Τομέα', 1, 'Αττική', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(2, 'Δυτικού Τομέα', 1, 'Αττική', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(3, 'Κεντρικού Τομέα', 1, 'Αττική', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(4, 'Νοτίου Τομέα', 1, 'Αττική', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(5, 'Πειραιώς', 1, 'Αττική', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(6, 'Νήσων', 1, 'Αττική', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(7, 'Ανατολικής Αττικής', 1, 'Αττική', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(8, 'Δυτικής Αττικής', 1, 'Αττική', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(9, 'Ικαρίας', 2, 'Βόρειο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(10, 'Λέσβου', 2, 'Βόρειο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(11, 'Λήμνου', 2, 'Βόρειο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(12, 'Σάμου', 2, 'Βόρειο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(13, 'Χίου', 2, 'Βόρειο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(14, 'Μυκόνου', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(15, 'Θήρας', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(16, 'Νάξου', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(17, 'Καλύμνου', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(18, 'Πάρου', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(19, 'Καρπάθου', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(20, 'Ρόδου', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(21, 'Κέας-Κύθνου', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(22, 'Σύρου', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(23, 'Κω', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(24, 'Τήνου  ', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(25, 'Άνδρου', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(26, 'Μήλου', 3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(27, 'Αιτωλοακαρνανίας', 4, 'Δυτική Ελλάδα', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(28, 'Αχαΐας', 4, 'Δυτική Ελλάδα', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(29, 'Ηλείας', 4, 'Δυτική Ελλάδα', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(30, 'Καρδίτσας', 5, 'Θεσσαλία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(31, 'Λάρισας', 5, 'Θεσσαλία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(32, 'Μαγνησίας', 5, 'Θεσσαλία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(33, 'Σποράδων', 5, 'Θεσσαλία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(34, 'Τρικάλων', 5, 'Θεσσαλία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(35, 'Άρτας', 6, 'Ήπειρος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(36, 'Θεσπρωτίας', 6, 'Ήπειρος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(37, 'Ιωαννίνων', 6, 'Ήπειρος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(38, 'Πρέβεζας', 6, 'Ήπειρος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(39, 'Ζακύνθου', 7, 'Ιόνιο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(40, 'Ιθάκης', 7, 'Ιόνιο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(41, 'Κέρκυρας', 7, 'Ιόνιο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(42, 'Κεφαλληνίας', 7, 'Ιόνιο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(43, 'Λευκάδας', 7, 'Ιόνιο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(44, 'Ηρακλείου', 8, 'Κρήτη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(45, 'Λασιθίου', 8, 'Κρήτη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(46, 'Ρεθύμνης', 8, 'Κρήτη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(47, 'Χανίων', 8, 'Κρήτη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(48, 'Δράμας', 9, 'Ανατολική Μακεδονία και Θράκη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(49, 'Έβρου', 9, 'Ανατολική Μακεδονία και Θράκη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(50, 'Θάσου', 9, 'Ανατολική Μακεδονία και Θράκη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(51, 'Καβάλας', 9, 'Ανατολική Μακεδονία και Θράκη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(52, 'Ξάνθης', 9, 'Ανατολική Μακεδονία και Θράκη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(53, 'Ροδόπης', 9, 'Ανατολική Μακεδονία και Θράκη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(54, 'Γρεβενών', 10, 'Δυτική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(55, 'Καστοριάς', 10, 'Δυτική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(56, 'Κοζάνης', 10, 'Δυτική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(57, 'Φλώρινας', 10, 'Δυτική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(58, 'Ημαθίας', 11, 'Κεντρική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(59, 'Θεσσαλονίκης', 11, 'Κεντρική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(60, 'Κιλκίς', 11, 'Κεντρική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(61, 'Πελλας', 11, 'Κεντρική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(62, 'Πιερίας', 11, 'Κεντρική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(63, 'Σερρών', 11, 'Κεντρική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(64, 'Χαλκιδικής', 11, 'Κεντρική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(65, 'Αργολίδος', 12, 'Πελοπόννησος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(66, 'Αρκαδίας', 12, 'Πελοπόννησος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(67, 'Κορινθίας', 12, 'Πελοπόννησος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(68, 'Λακωνίας', 12, 'Πελοπόννησος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(69, 'Μεσσηνίας', 12, 'Πελοπόννησος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(70, 'Βοιωτίας', 13, 'Στερεά Ελλάδα', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(71, 'Εύβοιας', 13, 'Στερεά Ελλάδα', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(72, 'Ευρυτανίας', 13, 'Στερεά Ελλάδα', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(73, 'Φθιώτιδας', 13, 'Στερεά Ελλάδα', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(74, 'Φωκίδας', 13, 'Στερεά Ελλάδα', '2015-02-02 20:29:26', '2015-02-02 20:29:26');
/*!40000 ALTER TABLE `counties` ENABLE KEYS */;


-- Dumping structure for table edu.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.countries: ~196 rows (approximately)
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `country_name`, `created_at`, `updated_at`) VALUES
	(1, 'Ελλάδα', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(2, 'Afghanistan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(3, 'Albania', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(4, 'Algeria', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(5, 'Andorra', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(6, 'Angola', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(7, 'Antigua & Deps', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(8, 'Argentina', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(9, 'Armenia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(10, 'Australia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(11, 'Austria', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(12, 'Azerbaijan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(13, 'Bahamas', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(14, 'Bahrain', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(15, 'Bangladesh', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(16, 'Barbados', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(17, 'Belarus', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(18, 'Belgium', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(19, 'Belize', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(20, 'Benin', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(21, 'Bhutan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(22, 'Bolivia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(23, 'Bosnia Herzegovina', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(24, 'Botswana', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(25, 'Brazil', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(26, 'Brunei', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(27, 'Bulgaria', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(28, 'Burkina', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(29, 'Burundi', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(30, 'Cambodia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(31, 'Cameroon', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(32, 'Canada', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(33, 'Cape Verde', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(34, 'Central African Rep', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(35, 'Chad', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(36, 'Chile', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(37, 'China', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(38, 'Colombia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(39, 'Comoros', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(40, 'Congo', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(41, 'Congo {Democratic Rep}', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(42, 'Costa Rica', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(43, 'Croatia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(44, 'Cuba', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(45, 'Cyprus', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(46, 'Czech Republic', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(47, 'Denmark', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(48, 'Djibouti', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(49, 'Dominica', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(50, 'Dominican Republic', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(51, 'East Timor', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(52, 'Ecuador', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(53, 'Egypt', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(54, 'El Salvador', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(55, 'Equatorial Guinea', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(56, 'Eritrea', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(57, 'Estonia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(58, 'Ethiopia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(59, 'Fiji', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(60, 'Finland', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(61, 'France', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(62, 'Gabon', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(63, 'Gambia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(64, 'Georgia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(65, 'Germany', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(66, 'Ghana', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(67, 'Grenada', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(68, 'Guatemala', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(69, 'Guinea', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(70, 'Guinea-Bissau', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(71, 'Guyana', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(72, 'Haiti', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(73, 'Honduras', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(74, 'Hungary', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(75, 'Iceland', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(76, 'India', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(77, 'Indonesia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(78, 'Iran', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(79, 'Iraq', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(80, 'Ireland {Republic}', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(81, 'Israel', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(82, 'Italy', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(83, 'Ivory Coast', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(84, 'Jamaica', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(85, 'Japan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(86, 'Jordan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(87, 'Kazakhstan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(88, 'Kenya', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(89, 'Kiribati', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(90, 'Korea North', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(91, 'Korea South', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(92, 'Kosovo', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(93, 'Kuwait', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(94, 'Kyrgyzstan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(95, 'Laos', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(96, 'Latvia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(97, 'Lebanon', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(98, 'Lesotho', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(99, 'Liberia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(100, 'Libya', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(101, 'Liechtenstein', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(102, 'Lithuania', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(103, 'Luxembourg', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(104, 'Macedonia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(105, 'Madagascar', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(106, 'Malawi', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(107, 'Malaysia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(108, 'Maldives', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(109, 'Mali', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(110, 'Malta', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(111, 'Marshall Islands', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(112, 'Mauritania', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(113, 'Mauritius', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(114, 'Mexico', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(115, 'Micronesia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(116, 'Moldova', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(117, 'Monaco', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(118, 'Mongolia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(119, 'Montenegro', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(120, 'Morocco', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(121, 'Mozambique', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(122, 'Myanmar, {Burma}', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(123, 'Namibia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(124, 'Nauru', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(125, 'Nepal', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(126, 'Netherlands', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(127, 'New Zealand', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(128, 'Nicaragua', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(129, 'Niger', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(130, 'Nigeria', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(131, 'Norway', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(132, 'Oman', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(133, 'Pakistan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(134, 'Palau', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(135, 'Panama', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(136, 'Papua New Guinea', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(137, 'Paraguay', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(138, 'Peru', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(139, 'Philippines', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(140, 'Poland', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(141, 'Portugal', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(142, 'Qatar', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(143, 'Romania', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(144, 'Russian Federation', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(145, 'Rwanda', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(146, 'St Kitts & Nevis', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(147, 'St Lucia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(148, 'Saint Vincent & the Grenadines', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(149, 'Samoa', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(150, 'San Marino', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(151, 'Sao Tome & Principe', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(152, 'Saudi Arabia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(153, 'Senegal', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(154, 'Serbia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(155, 'Seychelles', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(156, 'Sierra Leone', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(157, 'Singapore', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(158, 'Slovakia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(159, 'Slovenia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(160, 'Solomon Islands', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(161, 'Somalia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(162, 'South Africa', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(163, 'South Sudan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(164, 'Spain', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(165, 'Sri Lanka', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(166, 'Sudan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(167, 'Suriname', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(168, 'Swaziland', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(169, 'Sweden', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(170, 'Switzerland', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(171, 'Syria', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(172, 'Taiwan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(173, 'Tajikistan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(174, 'Tanzania', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(175, 'Thailand', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(176, 'Togo', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(177, 'Tonga', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(178, 'Trinidad & Tobago', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(179, 'Tunisia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(180, 'Turkey', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(181, 'Turkmenistan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(182, 'Tuvalu', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(183, 'Uganda', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(184, 'Ukraine', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(185, 'United Arab Emirates', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(186, 'United Kingdom', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(187, 'United States', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(188, 'Uruguay', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(189, 'Uzbekistan', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(190, 'Vanuatu', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(191, 'Vatican City', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(192, 'Venezuela', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(193, 'Vietnam', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(194, 'Yemen', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(195, 'Zambia', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(196, 'Zimbabwe', '2015-02-02 20:29:26', '2015-02-02 20:29:26');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;


-- Dumping structure for table edu.districts
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `district_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.districts: ~14 rows (approximately)
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` (`id`, `district_name`, `created_at`, `updated_at`) VALUES
	(1, 'Αττική', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(2, 'Βόρειο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(3, 'Νότιο Αιγαίο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(4, 'Δυτική Ελλάδα', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(5, 'Θεσσαλία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(6, 'Ήπειρος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(7, 'Ιόνιο', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(8, 'Κρήτη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(9, 'Ανατολική Μακεδονία και Θράκη', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(10, 'Δυτική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(11, 'Κεντρική Μακεδονία', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(12, 'Πελοπόννησος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(13, 'Στερεά Ελλάδα', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(14, 'Άλλη - Εκτός Ελλάδος', '2015-02-02 20:29:25', '2015-02-02 20:29:25');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;


-- Dumping structure for table edu.graders
CREATE TABLE IF NOT EXISTS `graders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `grader_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grader_last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `specialty` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district_id` tinyint(4) NOT NULL DEFAULT '100',
  `grader_district_text` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_id` tinyint(4) NOT NULL DEFAULT '100',
  `from_who` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_who_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `past_grader` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `past_grader_more` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_1` int(11) NOT NULL DEFAULT '0',
  `site_2` int(11) NOT NULL DEFAULT '0',
  `has_agreed` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'na',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wants_to_be_grader_b` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `languages` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `languages_level` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desired_category` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grader_district_id` tinyint(4) NOT NULL DEFAULT '100',
  `self_proposed` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `why_self_proposed` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approver` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved_at` datetime NOT NULL DEFAULT '2015-01-01 10:00:00',
  `confirmed_at` datetime NOT NULL DEFAULT '2015-01-01 10:00:00',
  `was_proposed` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proposer` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_english_check` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_english` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'na',
  `level_french_check` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_french` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'na',
  `level_german_check` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_german` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'na',
  `level_italian_check` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_italian` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'na',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.grader_site: ~0 rows (approximately)
/*!40000 ALTER TABLE `grader_site` DISABLE KEYS */;
/*!40000 ALTER TABLE `grader_site` ENABLE KEYS */;


-- Dumping structure for table edu.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.migrations: ~24 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_12_07_171147_create_posts_table', 1),
	('2014_12_08_182027_create_users_table', 1),
	('2014_12_11_094259_create_profiles_table', 1),
	('2014_12_13_180923_add_confirmed_to_users_table', 1),
	('2014_12_14_130645_add_type_to_users_table', 1),
	('2014_12_14_173517_create_sites_table', 1),
	('2014_12_15_200453_add_has_site_to_users_table', 1),
	('2014_12_16_072725_create_graders_table', 1),
	('2014_12_19_102022_create_grader_site_table', 1),
	('2015_01_10_173757_create_roles_table', 1),
	('2015_01_10_175124_create_role_user_table', 1),
	('2015_01_14_112549_add_some_fields_to_sites_table', 1),
	('2015_01_14_114207_create_districts_table', 1),
	('2015_01_15_182335_create_categories_table', 1),
	('2015_01_15_214017_add_grader_last_name_to_sites_table', 1),
	('2015_01_15_214541_add_grader_last_name_to_graders_table', 1),
	('2015_01_21_224637_create_counties_table', 1),
	('2015_01_22_095501_add_county_id_to_sites_table', 1),
	('2015_01_22_165836_add_grader_b_fields_to_graders_table', 1),
	('2015_01_28_160736_add_language_fields_to_graders_table', 1),
	('2015_01_30_104209_add_grader_agrees_field_to_sites_table', 1),
	('2015_01_31_144839_create_specialties_table', 1),
	('2015_01_31_150249_add_specialty_field_to_graders_table', 1),
	('2015_02_01_215934_create_countries_table', 1);
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
  `role_name` varchar(130) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.roles: ~5 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `role`, `role_name`, `created_at`, `updated_at`) VALUES
	(1, 'site', 'Υποψήφιος Ιστότοπος', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(2, 'grader', 'Αξιολογητής Α', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(3, 'grader_b', 'Αξιολογητής Β', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(4, 'admin', 'Διαχειριστής', '2015-02-02 20:29:25', '2015-02-02 20:29:25'),
	(5, 'user', 'Χρήστης', '2015-02-02 20:29:25', '2015-02-02 20:29:25');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.role_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;


-- Dumping structure for table edu.sites
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `site_url` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` tinyint(4) NOT NULL DEFAULT '100',
  `district_id` tinyint(4) NOT NULL DEFAULT '100',
  `district_text` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `county` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `county_id` int(11) NOT NULL DEFAULT '0',
  `creator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsible` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `responsible_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_last_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `grader_agrees` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'na',
  `grader_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grader_last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grader_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `grader_district` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grader_district_text` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notify_grader` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `restricted_access` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `restricted_access_details` text COLLATE utf8_unicode_ci,
  `received_permission` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uses_private_data` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proposes_himself` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'na',
  `purpose` text COLLATE utf8_unicode_ci,
  `country_id` int(11) NOT NULL DEFAULT '1',
  `language_id` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.sites: ~0 rows (approximately)
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;


-- Dumping structure for table edu.specialties
CREATE TABLE IF NOT EXISTS `specialties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `specialty_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.specialties: ~116 rows (approximately)
/*!40000 ALTER TABLE `specialties` DISABLE KEYS */;
INSERT INTO `specialties` (`id`, `specialty_name`, `created_at`, `updated_at`) VALUES
	(1, 'ΠΕ01 - ΘΕΟΛΟΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(2, 'ΠΕ02 - ΦΙΛΟΛΟΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(3, 'ΠΕ02.50 - ΦΙΛΟΛΟΓΟΙ ΕΙΔΙΚΗΣ ΑΓΩΓΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(4, 'ΠΕ03 - ΜΑΘΗΜΑΤΙΚΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(5, 'ΠΕ03.50 - ΜΑΘΗΜΑΤΙΚΟΙ ΕΙΔΙΚΗΣ ΑΓΩΓΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(6, 'ΠΕ04.01 - ΦΥΣΙΚΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(7, 'ΠΕ04.02 - ΧΗΜΙΚΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(8, 'ΠΕ04.03 - ΦΥΣΙΟΓΝΩΣΤΕΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(9, 'ΠΕ04.04 - ΒΙΟΛΟΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(10, 'ΠΕ04.05 - ΓΕΩΛΟΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(11, 'ΠΕ04.50 - ΦΥΣΙΚΟΙ ΕΙΔΙΚΗΣ ΑΓΩΓΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(12, 'ΠΕ05 - ΓΑΛΛΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(13, 'ΠΕ06 - ΑΓΓΛΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(14, 'ΠΕ07 - ΓΕΡΜΑΝΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(15, 'ΠΕ08 - ΚΑΛΛΙΤΕΧΝΙΚΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(16, 'ΠΕ09 - ΟΙΚΟΝΟΜΟΛΟΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(17, 'ΠΕ10 - ΚΟΙΝΩΝΙΟΛΟΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(18, 'ΠΕ11 - ΦΥΣΙΚΗΣ ΑΓΩΓΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(19, 'ΠΕ11.01 - ΦΥΣΙΚΗΣ ΑΓΩΓΗΣ ΕΙΔΙΚΗΣ ΑΓΩΓΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(20, 'ΠΕ12.01	ΠΟΛΙΤΙΚΟΙ ΜΗΧΑΝΙΚΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(21, 'ΠΕ12.02	ΑΡΧΙΤΕΚΤΟΝΕΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(22, 'ΠΕ12.03	ΤΟΠΟΓΡΑΦΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(23, 'ΠΕ12.04	ΜΗΧΑΝΟΛΟΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(24, 'ΠΕ12.05	ΗΛΕΚΤΡΟΛΟΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(25, 'ΠΕ12.06	ΗΛΕΚΤΡΟΝΙΚΟΙ ΜΗΧΑΝΙΚΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(26, 'ΠΕ12.07	ΝΑΥΠΗΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(27, 'ΠΕ12.08 - ΧΗΜ. ΜΗΧΑΝ. - ΜΕΤΑΛΛΕΙΟΛΟΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(28, 'ΠΕ12.10 - ΦΥΣΙΚΟΙ ΡΑΔΙΟΗΛΕΚΤΡΟΛΟΓΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(29, 'ΠΕ12.11 - ΜΗΧΑΝΙΚΟΙ ΠΑΡΑΓΩΓΗΣ & ΔΙΟΙΚΗΣΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(30, 'ΠΕ12.12 - ΜΗΧ. ΚΛΩΣΤΟΫΦΑΝΤΟΥΡΓΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(31, 'ΠΕ12.13 - ΠΕΡΙΒΑΛΛΟΝΤΟΛΟΓΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(32, 'ΠΕ13 - ΝΟΜΙΚΗΣ - ΠΟΛΙΤΙΚΩΝ ΕΠΙΣΤΗΜΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(33, 'ΠΕ14.01 - ΙΑΤΡΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(34, 'ΠΕ14.02 - ΟΔΟΝΤΙΑΤΡΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(35, 'ΠΕ14.03 - ΦΑΡΜΑΚΟΠΟΙΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(36, 'ΠΕ14.04 - ΓΕΩΠΟΝΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(37, 'ΠΕ14.05 - ΔΑΣΟΛΟΓΙΑΣ & ΦΥΣΙΚΟΥ ΠΕΡΙΒΑΛΛΟΝΤΟΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(38, 'ΠΕ14.06 - ΝΟΣΗΛΕΥΤΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(39, 'ΠΕ15 - ΟΙΚΙΑΚΗΣ ΟΙΚΟΝΟΜΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(40, 'ΠΕ16 - ΜΟΥΣΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(41, 'ΠΕ16.01 - ΜΟΥΣΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(42, 'ΠΕ16.02 - ΜΟΥΣΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(43, 'ΠΕ17.01  - ΠΟΛΙΤΙΚΟΙ AΣΠΑΙΤΕ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(44, 'ΠΕ17.02  - ΜΗΧΑΝΟΛΟΓΟΙ AΣΠΑΙΤΕ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(45, 'ΠΕ17.03 - ΗΛΕΚΤΡΟΛΟΓΟΙ AΣΠΑΙΤΕ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(46, 'ΠΕ17.04 - ΗΛΕΚΤΡΟΝΙΚΟΙ AΣΠΑΙΤΕ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(47, 'ΠΕ17.05 - ΠΟΛΙΤΙΚΟΙ ΤΕΙ - KATEE', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(48, 'ΠΕ17.06 - ΜΗΧΑΝΟΛΟΓΟΙ ΤΕΙ - ΝΑΥΠ. ΤΕΙ. - ΚΑΤΕΕ ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(49, 'ΠΕ17.07 - ΗΛΕΚΤΡΟΛΟΓΟΙ ΤΕΙ - KATEE', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(50, 'ΠΕ17.08 - ΗΛΕΚΤΡΟΝΙΚΟΙ ΤΕΙ - KATEE', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(51, 'ΠΕ17.09 - ΤΕΧΝΟΛΟΓΟΙ ΙΑΤΡΙΚΩΝ ΟΡΓΑΝΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(52, 'ΠΕ17.10 - ΤΕΧΝΟΛΟΓΟΙ ΕΝΕΡΓΕΙΑΚΗΣ ΤΕΧΝΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(53, 'ΠΕ17.11 - ΤΟΠΟΓΡΑΦΟΙ ΤΕΙ - KATEE', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(54, 'ΠΕ18.01 - ΓΡΑΦΙΚΩΝ ΤΕΧΝΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(55, 'ΠΕ18.02 - ΔΙΟΙΚΗΣΗΣ ΕΠΙΧΕΙΡΗΣΕΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(56, 'ΠΕ18.03 - ΛΟΓΙΣΤΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(57, 'ΠΕ18.04 - ΑΙΣΘΗΤΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(58, 'ΠΕ18.05 - ΚΟΜΜΩΤΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(59, 'ΠΕ18.06 - ΚΟΠΤΙΚΗΣ - ΡΑΠΤΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(60, 'ΠΕ18.07 - ΙΑΤΡΙΚΩΝ ΕΡΓΑΣΤΗΡΙΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(61, 'ΠΕ18.08 - ΟΔΟΝΤΟΤΕΧΝΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(62, 'ΠΕ18.09 - ΚΟΙΝΩΝΙΚΗΣ ΕΡΓΑΣΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(63, 'ΠΕ18.10 - ΝΟΣΗΛΕΥΤΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(64, 'ΠΕ18.11 - ΜΑΙΕΥΤΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(65, 'ΠΕ18.12 - ΦΥΤΙΚΗΣ ΠΑΡΑΓΩΓΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(66, 'ΠΕ18.13 - ΖΩΙΚΗΣ ΠΑΡΑΓΩΓΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(67, 'ΠΕ18.14 - ΙΧΘΥΟΚΟΜΙΑΣ - ΑΛΙΕΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(68, 'ΠΕ18.15 - ΓΕΩΡΓΙΚΩΝ ΜΗΧΑΝΩΝ & ΑΡΔΕΥΣΕΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(69, 'ΠΕ18.16 - ΔΑΣΟΠΟΝΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(70, 'ΠΕ18.17 - ΔΙΟΙΚΗΣΗΣ ΓΕΩΡΓΙΚΩΝ ΕΚΜΕΤΑΛΛΕΥΣΕΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(71, 'ΠΕ18.18 - ΟΧΗΜΑΤΩΝ ΤΕΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(72, 'ΠΕ18.19 - ΣΤΑΤΙΣΤΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(73, 'ΠΕ18.20 - ΚΛΩΣΤΟΫΦΑΝΤΟΥΡΓΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(74, 'ΠΕ18.21 - ΡΑΔΙΟΛΟΓΙΑΣ - ΑΚΤΙΝΟΛΟΓΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(75, 'ΠΕ18.22 - ΜΕΤΑΛΛΕΙΟΛΟΓΟΙ - ΤΕΧΝ. ΟΡΥΧΕΙΩΝ - ΤΕΧΝ. ΓΕΩΤΕΧΝΟΛΟΓΙΑΣ & ΠΕΡΙΒΑΛΛΟΝΤΟΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(76, 'ΠΕ18.23 - ΝΑΥΤ. ΜΑΘ. (ΠΛΟΙΑΡΧΟΙ)', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(77, 'ΠΕ18.24 - ΕΡΓΑΣΙΟΘΕΡΑΠΕΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(78, 'ΠΕ18.25 - ΦΥΣΙΟΘΕΡΑΠΕΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(79, 'ΠΕ18.26 - ΓΡΑΦΙΣΤΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(80, 'ΠΕ18.27 - ΔΙΑΚΟΣΜΗΤΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(81, 'ΠΕ18.28 - ΣΥΝΤΗΡΗΤΕΣ ΕΡΓΩΝ ΤΕΧΝΗΣ & ΑΡΧ. ΕΥΡΗΜΑΤΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(82, 'ΠΕ18.29 - ΦΩΤΟΓΡΑΦΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(83, 'ΠΕ18.30 - ΘΕΡΜΟΚΗΠΙΑΚΩΝ ΚΑΛΛΙΕΡΓΕΙΩΝ & ΑΝΘΟΚΟΜΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(84, 'ΠΕ18.31 - ΜΗΧΑΝ. ΕΜΠΟΡΙΚΟΥ ΝΑΥΤΙΚΟΥ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(85, 'ΠΕ18.32 - ΜΗΧΑΝΟΣΥΝΘ. ΑΕΡΟΣΚΑΦΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(86, 'ΠΕ18.33 - ΒΡΕΦΟΝΗΠΙΟΚΟΜΟΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(87, 'ΠΕ18.34 - ΑΡΓΥΡΟΧΡΥΣΟΧΟΪΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(88, 'ΠΕ18.35 - ΤΟΥΡΙΣΤΙΚΩΝ ΕΠΙΧΕΙΡΗΣΕΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(89, 'ΠΕ18.36 - ΤΕΧΝΟΛΟΓΟΙ ΤΡΟΦΙΜΩΝ - ΔΙΑΤΡΟΦΗΣ - ΟΙΝΟΛΟΓΙΑΣ & ΤΕΧΝ. ΠΟΤΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(90, 'ΠΕ18.37 - ΔΗΜΟΣΙΑΣ ΥΓΙΕΙΝΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(91, 'ΠΕ18.38 - ΚΕΡΑΜΙΚΗΣ ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(92, 'ΠΕ18.39 - ΕΠΙΣΚΕΠΤΕΣ ΥΓΕΙΑΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(93, 'ΠΕ18.40 - ΕΜΠΟΡΙΑΣ & ΔΙΑΦΗΜΙΣΗΣ (MARKETING)', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(94, 'ΠΕ18.41 - ΔΡΑΜΑΤΙΚΗΣ ΤΕΧΝΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(95, 'ΠΕ19 - ΠΛΗΡΟΦΟΡΙΚΗΣ ΑΕΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(96, 'ΠΕ20 - ΠΛΗΡΟΦΟΡΙΚΗΣ ΤΕΙ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(97, 'ΠΕ21 - ΛΟΓΟΘΕΡΑΠΕΥΤΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(98, 'ΠΕ22 - ΕΠΑΓΓΕΛΜΑΤΙΚΩΝ ΣΥΜΒΟΥΛΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(99, 'ΠΕ23 - ΨΥΧΟΛΟΓΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(100, 'ΠΕ24 - ΠΑΙΔΟΨΥΧΙΑΤΡΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(101, 'ΠΕ25 - ΣΧΟΛΙΚΩΝ ΝΟΣΗΛΕΥΤΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(102, 'ΠΕ26 - ΛΟΓΟΘΕΡΑΠΕΥΤΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(103, 'ΠΕ28 - ΦΥΣΙΚΟΘΕΡΑΠΕΥΤΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(104, 'ΠΕ29 - ΕΡΓΟΘΕΡΑΠΕΥΤΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(105, 'ΠΕ30 - ΚΟΙΝΩΝΙΚΩΝ ΛΕΙΤΟΥΡΓΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(106, 'ΠΕ32 - ΘΕΑΤΡΙΚΩΝ ΣΠΟΥΔΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(107, 'ΠΕ33 - ΜΕΘΟΔΟΛΟΓΙΑΣ ΙΣΤΟΡΙΑΣ & ΘΕΩΡΙΑΣ ΤΗΣ ΕΠΙΣΤΗΜΗΣ (Μ.Ι.Θ.Ε.)', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(108, 'ΠΕ34 - ΙΤΑΛΙΚΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(109, 'ΠΕ35 - ΠΑΙΔΙΑΤΡΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(110, 'ΠΕ36 - ΜΟΥΣΙΚΟΘΕΡΑΠΕΥΤΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(111, 'ΠΕ42 - ΔΡΑΜΑΤΙΚΗΣ ΤΕΧΝΗΣ - ΑΝΩΤΕΡΗΣ ΕΚΠΑΙΔΕΥΣΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(112, 'ΠΕ60 - ΝΗΠΙΑΓΩΓΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(113, 'ΠΕ61 - ΝΗΠΙΑΓΩΓΩΝ ΕΙΔΙΚΗΣ ΑΓΩΓΗΣ ΚΑΙ ΕΚΠΑΙΔΕΥΣΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(114, 'ΠΕ70 - ΔΑΣΚΑΛΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(115, 'ΠΕ71 - ΔΑΣΚΑΛΩΝ ΕΙΔΙΚΗΣ ΑΓΩΓΗΣ ΚΑΙ ΕΚΠΑΙΔΕΥΣΗΣ', '2015-02-02 20:29:26', '2015-02-02 20:29:26'),
	(116, 'ΠΕ72 - ΕΚΠΑΙΔΕΥΤΩΝ ΕΝΗΛΙΚΩΝ', '2015-02-02 20:29:26', '2015-02-02 20:29:26');
/*!40000 ALTER TABLE `specialties` ENABLE KEYS */;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table edu.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
