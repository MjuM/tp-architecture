-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage des données de la table flights.flights : ~4 rows (environ)
/*!40000 ALTER TABLE `flights` DISABLE KEYS */;
INSERT INTO `flights` (`id`, `prix`, `nb_places`, `origin`, `destination`, `travel_time`, `travel_duration`) VALUES
	(1, 250, 23, 'CDG', 'JFK', '7', 10),
	(2, 300, 49, 'CDG', 'JFK', '10', 11),
	(3, 231, 15, 'DTW', 'JFK', '11', 11),
	(4, 500, 15, 'DTW', 'CDG', '8', 8),
	(5, 426, 0, 'JFK', 'DTW', '12', 3),
	(6, 785, 36, 'JFK', 'CDG', '5', 12);
/*!40000 ALTER TABLE `flights` ENABLE KEYS */;

-- Listage des données de la table flights.users : ~52 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `mail`, `id_reservation`) VALUES
	(1, 'maju', 3),
	(2, 'david', 4),
	(20, 'lohan', 3),
	(49, 'luiz', 4),
	(58, 'mathis', 2),
	(59, 'adam', 4),
	(60, 'esiea', 5),
	(98, '42', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage des données de la table flights.ville : ~3 rows (environ)
/*!40000 ALTER TABLE `ville` DISABLE KEYS */;
INSERT INTO `ville` (`id`, `nom_airport`, `ville`) VALUES
	(1, 'JFK', 'New York'),
	(2, 'DTW', 'Ontario'),
	(3, 'CDG', 'Paris');
/*!40000 ALTER TABLE `ville` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
