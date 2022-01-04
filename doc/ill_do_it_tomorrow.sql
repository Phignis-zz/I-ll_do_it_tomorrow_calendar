-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2022 at 10:20 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ill_do_it_tomorrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `listetache`
--

DROP TABLE IF EXISTS `listetache`;
CREATE TABLE IF NOT EXISTS `listetache` (
  `idListe` int(11) NOT NULL AUTO_INCREMENT,
  `nomListe` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proprietaire` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idListe`),
  KEY `pseudoProprietaire` (`proprietaire`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listetache`
--

INSERT INTO `listetache` (`idListe`, `nomListe`, `proprietaire`) VALUES
(12, 'tachePublique1Exemple', NULL),
(13, 'premiereTachePrivee', 'userDefault');

-- --------------------------------------------------------

--
-- Table structure for table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `idTache` int(11) NOT NULL AUTO_INCREMENT,
  `intituleTache` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estTermine` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `idListe` int(11) NOT NULL,
  PRIMARY KEY (`idTache`),
  KEY `idListe` (`idListe`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tache`
--

INSERT INTO `tache` (`idTache`, `intituleTache`, `date`, `description`, `estTermine`, `idListe`) VALUES
(29, '1ereTachePubliqueExemple', '04/01/2022', 'tache d\'exemple a faire', 0, 12),
(30, 'premiereTachePrivee', '04/01/2022', 'premiÃ¨re tache privÃ©e', 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `pseudo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateNaissance` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '01/01/1970',
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`pseudo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo`, `email`, `dateNaissance`, `password`) VALUES
('raccoonLove', 'inlove.raccoon@raccoon.rc', '27/10/2002', '$2y$10$p2e8w0ZA0630PzAAb5u7KOhqdhrYv6NJEe1jjD8JDH4ttyxK73ec.'),
('userDefault', 'userDefault@service.domaine', '01/01/1970', '$2y$10$2dvXKhCo675dZqZphp3ZB.dd3MeYbD8Hz.qlBQC9B/S3svFdIzGUu');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listetache`
--
ALTER TABLE `listetache`
  ADD CONSTRAINT `FK_prop_liste` FOREIGN KEY (`proprietaire`) REFERENCES `utilisateur` (`pseudo`) ON DELETE SET NULL;

--
-- Constraints for table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `FK_LISTE_prop` FOREIGN KEY (`idListe`) REFERENCES `listetache` (`idListe`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
