-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour antoine_cinema
CREATE DATABASE IF NOT EXISTS `antoine_cinema` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `antoine_cinema`;

-- Listage de la structure de table antoine_cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Listage des données de la table antoine_cinema.acteur : ~44 rows (environ)
REPLACE INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(1, 1),
	(2, 3),
	(4, 4),
	(3, 5),
	(5, 6),
	(6, 8),
	(7, 9),
	(8, 11),
	(9, 12),
	(10, 13),
	(11, 14),
	(12, 15),
	(13, 16),
	(14, 17),
	(15, 18),
	(16, 19),
	(17, 20),
	(18, 21),
	(19, 22),
	(20, 23),
	(21, 24),
	(22, 25),
	(23, 26),
	(24, 27),
	(25, 28),
	(26, 29),
	(27, 30),
	(28, 31),
	(29, 32),
	(30, 33),
	(31, 34),
	(32, 36),
	(33, 37),
	(34, 38),
	(35, 40),
	(36, 41),
	(37, 42),
	(41, 45),
	(42, 46),
	(43, 48),
	(44, 49),
	(45, 50),
	(46, 51),
	(47, 52);

-- Listage de la structure de table antoine_cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table antoine_cinema.casting : ~52 rows (environ)
REPLACE INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 1),
	(2, 1, 1),
	(3, 1, 7),
	(1, 2, 2),
	(2, 2, 2),
	(1, 3, 3),
	(5, 3, 27),
	(2, 4, 4),
	(2, 5, 6),
	(3, 6, 8),
	(3, 7, 9),
	(3, 8, 10),
	(3, 9, 11),
	(3, 10, 12),
	(3, 11, 13),
	(3, 12, 14),
	(3, 13, 15),
	(3, 14, 16),
	(3, 15, 17),
	(4, 16, 18),
	(4, 17, 19),
	(4, 18, 20),
	(4, 19, 21),
	(4, 20, 22),
	(4, 21, 23),
	(4, 22, 24),
	(5, 22, 24),
	(4, 23, 25),
	(4, 24, 26),
	(5, 25, 28),
	(5, 26, 29),
	(5, 27, 30),
	(5, 28, 31),
	(5, 29, 32),
	(5, 30, 33),
	(5, 31, 34),
	(6, 32, 35),
	(6, 33, 36),
	(6, 34, 37),
	(7, 35, 38),
	(7, 36, 39),
	(7, 37, 40),
	(8, 41, 41),
	(8, 42, 42),
	(9, 43, 43),
	(10, 43, 43),
	(9, 44, 44),
	(10, 44, 44),
	(9, 45, 45),
	(9, 46, 46),
	(10, 46, 46),
	(9, 47, 47);

-- Listage de la structure de table antoine_cinema. categoriser
CREATE TABLE IF NOT EXISTS `categoriser` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `categoriser_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `categoriser_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table antoine_cinema.categoriser : ~15 rows (environ)
REPLACE INTO `categoriser` (`id_film`, `id_genre`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(9, 1),
	(10, 1),
	(3, 2),
	(4, 2),
	(5, 2),
	(1, 3),
	(2, 3),
	(6, 4),
	(7, 4),
	(8, 5);

-- Listage de la structure de table antoine_cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre_film` varchar(50) NOT NULL,
  `date_sortie` date NOT NULL,
  `duree` int NOT NULL,
  `synopsis` text,
  `note` int DEFAULT NULL,
  `affiche` varchar(255) DEFAULT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table antoine_cinema.film : ~10 rows (environ)
REPLACE INTO `film` (`id_film`, `titre_film`, `date_sortie`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'Terminator', '1984-10-26', 107, NULL, NULL, NULL, 1),
	(2, 'Terminator 2 : Le Jugement dernier', '1991-07-03', 137, NULL, NULL, NULL, 1),
	(3, 'Predator', '1987-06-12', 107, NULL, NULL, NULL, 2),
	(4, 'Alien, Le Huitième Passager', '1979-05-25', 117, NULL, NULL, NULL, 3),
	(5, 'Aliens, le retour', '1986-07-18', 137, NULL, NULL, NULL, 1),
	(6, 'Godzilla (1954)', '1954-11-03', 97, NULL, NULL, NULL, 4),
	(7, 'Shin Godzilla', '2016-01-29', 120, NULL, NULL, NULL, 5),
	(8, 'Le Dictateur', '1940-10-15', 124, NULL, NULL, NULL, 6),
	(9, 'Dune ', '2021-09-15', 155, NULL, NULL, NULL, 7),
	(10, 'Dune, deuxième partie', '2024-02-28', 166, NULL, NULL, NULL, 7);

-- Listage de la structure de table antoine_cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table antoine_cinema.genre : ~0 rows (environ)
REPLACE INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Science Fiction'),
	(2, 'Horreur'),
	(3, 'Action'),
	(4, 'Kaiju'),
	(5, 'Comédie');

-- Listage de la structure de table antoine_cinema. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- Listage des données de la table antoine_cinema.personne : ~50 rows (environ)
REPLACE INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `date_naissance`, `photo`) VALUES
	(1, 'Schwarzenegger', 'Arnold', 'H', '1947-06-30', NULL),
	(2, 'Cameron', 'James', 'H', '1954-08-16', NULL),
	(3, 'Hamilton', 'Linda', 'F', '1956-09-26', NULL),
	(4, 'Patrick', 'Robert', 'H', '1958-11-05', NULL),
	(5, 'Biehn', 'Michael', 'H', '1956-07-31', NULL),
	(6, 'Furlong', 'Edward', 'H', '1977-08-02', NULL),
	(7, 'McTiernan', 'John', 'H', '1951-01-08', NULL),
	(8, 'Peter Hall', 'Kevin', 'H', '1955-05-09', NULL),
	(9, 'Weathers', 'Carl', 'H', '1948-01-14', NULL),
	(10, 'Scott', 'Ridley', 'H', '1937-11-30', NULL),
	(11, 'Carrillo', 'Elpidia', 'F', '1961-08-16', NULL),
	(12, 'Duke', 'Bill', 'H', '1943-02-26', NULL),
	(13, 'Landham', 'Sonny', 'H', '1941-02-11', NULL),
	(14, 'Chaves', 'Richard', 'H', '1951-10-09', NULL),
	(15, 'Ventura', 'Jesse', 'H', '1951-07-15', NULL),
	(16, 'Black', 'Shane', 'H', '1961-12-16', NULL),
	(17, 'Armstrong', 'R. G.', 'H', '1917-04-07', NULL),
	(18, 'Thorsen', 'Sven-Ole', 'H', '1944-09-24', NULL),
	(19, 'Cartwright', 'Veronica', 'F', '1949-04-20', NULL),
	(20, 'Holm', 'Ian', 'H', '1931-09-12', NULL),
	(21, 'Hurt', 'John', 'H', '1940-01-22', NULL),
	(22, 'Kotto', 'Yaphet', 'H', '1939-11-15', NULL),
	(23, 'Skerritt', 'Tom', 'H', '1933-08-25', NULL),
	(24, 'Stanton', 'Harry Dean', 'H', '1926-07-14', NULL),
	(25, 'Weaver', 'Sigourney', 'F', '1949-10-08', NULL),
	(26, 'Badejo', 'Bolaji', 'H', '1953-08-23', NULL),
	(27, 'Horton', 'Helen', 'F', '1923-11-21', NULL),
	(28, 'Reiser', 'Paul', 'H', '1956-03-30', NULL),
	(29, 'Henriksen', 'Lance', 'H', '1940-05-05', NULL),
	(30, 'Henn', 'Carrie', 'F', '1976-05-07', NULL),
	(31, 'Paxton', 'Bill', 'H', '1955-05-17', NULL),
	(32, 'Goldstein', 'Jenette', 'F', '1960-02-04', NULL),
	(33, 'Hope', 'William', 'H', '1955-03-02', NULL),
	(34, 'Matthews', 'Al', 'H', '1942-11-21', NULL),
	(35, 'Honda', 'Ishirou', 'H', '1911-05-07', NULL),
	(36, 'Takarada', 'Akira', 'H', '1634-04-29', NULL),
	(37, 'Kouchi', 'Momoko', 'F', '1932-03-07', NULL),
	(38, 'Hirata', 'Akihiko', 'H', '1927-12-26', NULL),
	(39, 'Anno', 'Hideaki', 'H', '1960-05-22', NULL),
	(40, 'Hasegawa', 'Hiroki', 'H', '1977-03-07', NULL),
	(41, 'Ishihara', 'Satomi ', 'F', '1986-12-24', NULL),
	(42, 'Takenouchi', 'Yutaka', 'H', '1971-01-02', NULL),
	(45, 'Chaplin', 'Charlie', 'H', '1889-04-16', NULL),
	(46, 'Goddard', 'Paulette', 'F', '1910-06-03', NULL),
	(47, 'Villeneuve', 'Denis', 'H', '1967-10-03', NULL),
	(48, 'Chalamet', 'Timothée', 'H', '1995-12-27', NULL),
	(49, 'Ferguson', 'Rebecca', 'F', '1983-10-19', NULL),
	(50, 'Isaac', 'Oscar', 'H', '1979-03-09', NULL),
	(51, 'Coleman', 'Zendaya', 'F', '1996-09-01', NULL),
	(52, 'Momoa', 'Jason', 'H', '1979-08-01', NULL);

-- Listage de la structure de table antoine_cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table antoine_cinema.realisateur : ~7 rows (environ)
REPLACE INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 2),
	(2, 7),
	(3, 10),
	(4, 35),
	(5, 39),
	(6, 45),
	(7, 47);

-- Listage de la structure de table antoine_cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Listage des données de la table antoine_cinema.role : ~46 rows (environ)
REPLACE INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'T-800'),
	(2, 'Sarah Connor'),
	(3, 'Kyle Reese'),
	(4, 'T-1000'),
	(6, 'John Connor'),
	(7, 'Major Alan "Dutch" Schaefer'),
	(8, 'le Predator'),
	(9, 'George Dillon'),
	(10, 'Anna Goncalves'),
	(11, 'Sgt. Mac Elliot'),
	(12, 'Billy Sole'),
	(13, 'Jorge "Poncho" Ramirez'),
	(14, 'Blain Cooper'),
	(15, 'Rick Hawkins'),
	(16, 'Général Homer Phillips'),
	(17, 'le conseiller militaire soviétique'),
	(18, 'la navigatrice Joan Marie Lambert'),
	(19, 'l\'officier scientifique Ash'),
	(20, 'l\'officier en second Gilbert Ward « Thomas » Kane'),
	(21, 'le chef-ingénieur Dennis Monroe Parker'),
	(22, 'le capitaine Arthur Koblenz Dallas'),
	(23, 'le technicien Samuel Elias Brett'),
	(24, 'le lieutenant Ellen Louise Ripley'),
	(25, 'le Xenomorph'),
	(26, 'l\'ordinateur de bord "Maman" (voix)'),
	(27, 'le caporal Dwayne Hicks'),
	(28, 'Carter J. Burke'),
	(29, 'l’androïde Bishop (341-B)'),
	(30, 'Rebecca "Newt" Jorden'),
	(31, 'le 1re classe Hudson'),
	(32, 'la 1re classe Vasquez'),
	(33, 'le lieutenant Gorman'),
	(34, 'le sergent Apone'),
	(35, 'Hideto Ogata'),
	(36, 'Emiko Yamane'),
	(37, 'le professeur Daisuke Serizawa'),
	(38, 'Rando Yaguchi'),
	(39, 'Kayoko Ann Patterson'),
	(40, 'Hideki Akasaka'),
	(41, 'Adenoïd Hynkel'),
	(42, 'Hannah'),
	(43, 'Paul Atréides'),
	(44, 'Dame Jessica'),
	(45, 'Leto Atréides'),
	(46, 'Chani'),
	(47, 'Duncan Idaho');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
