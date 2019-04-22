/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table majstar_basket.delivery_charge
CREATE TABLE IF NOT EXISTS `delivery_charge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `min_amount` decimal(10,2) NOT NULL,
  `max_amount` decimal(10,2) DEFAULT NULL,
  `charge` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table majstar_basket.delivery_charge: ~3 rows (approximately)
/*!40000 ALTER TABLE `delivery_charge` DISABLE KEYS */;
INSERT INTO `delivery_charge` (`id`, `min_amount`, `max_amount`, `charge`) VALUES
	(1, 0.00, 49.99, 4.95),
	(2, 50.00, 89.99, 2.95),
	(3, 90.00, NULL, 0.00);
/*!40000 ALTER TABLE `delivery_charge` ENABLE KEYS */;


-- Dumping structure for table majstar_basket.migration_versions
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table majstar_basket.migration_versions: ~4 rows (approximately)
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
	('20190421160219', '2019-04-21 16:08:16'),
	('20190421202249', '2019-04-21 20:32:00'),
	('20190421203657', '2019-04-21 20:42:42'),
	('20190421234808', '2019-04-21 23:49:28');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;


-- Dumping structure for table majstar_basket.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table majstar_basket.product: ~3 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `code`, `price`) VALUES
	(1, 'Red Widget', 'R01', 32.95),
	(2, 'Green Widget', 'G01', 24.95),
	(3, 'Blue Widget', 'B01', 7.95);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


-- Dumping structure for table majstar_basket.special_offer
CREATE TABLE IF NOT EXISTS `special_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `regular_price_product_qty` int(11) NOT NULL,
  `discounted_price_product_qty` int(11) NOT NULL,
  `discount_multiplier` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table majstar_basket.special_offer: ~1 rows (approximately)
/*!40000 ALTER TABLE `special_offer` DISABLE KEYS */;
INSERT INTO `special_offer` (`id`, `product_id`, `regular_price_product_qty`, `discounted_price_product_qty`, `discount_multiplier`) VALUES
	(1, 1, 1, 1, 0.50);
/*!40000 ALTER TABLE `special_offer` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
