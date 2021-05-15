-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 mai 2021 à 09:47
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18
DROP DATABASE IF EXISTS FFX;

CREATE DATABASE IF NOT EXISTS FFX;
USE FFX;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ffx`
--

-- --------------------------------------------------------

--
-- Structure de la table `a`
--

DROP TABLE IF EXISTS `a`;
CREATE TABLE IF NOT EXISTS `a` (
  `Id_Page` int(11) NOT NULL,
  `Id_Page_1` int(11) NOT NULL,
  PRIMARY KEY (`Id_Page`,`Id_Page_1`),
  KEY `Id_Page_1` (`Id_Page_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `a`
--

INSERT INTO `a` (`Id_Page`, `Id_Page_1`) VALUES
(65, 57),
(56, 66);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `Id_Commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `Text_Commentaire` varchar(255) DEFAULT NULL,
  `Date_Commentaire` datetime,
  `Id_Page` int(11) DEFAULT NULL,
  `Id_Commentaire_1` int(11) DEFAULT NULL,
  `Id_Compte` int(11) NOT NULL,
  PRIMARY KEY (`Id_Commentaire`),
  UNIQUE KEY `Id_Commentaire_1` (`Id_Commentaire_1`),
  KEY `Id_Page` (`Id_Page`),
  KEY `Id_Compte` (`Id_Compte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `Id_Compte` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo_Compte` varchar(255) DEFAULT NULL,
  `Mdp_Compte` varchar(255) DEFAULT NULL,
  `Email_Compte` varchar(255) DEFAULT NULL,
  `Droit_Compte` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Compte`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`Id_Compte`, `Pseudo_Compte`, `Mdp_Compte`, `Email_Compte`, `Droit_Compte`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '5head@gmail.com', 1),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'abcdefg@gmail.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `elementaire`
--

DROP TABLE IF EXISTS `elementaire`;
CREATE TABLE IF NOT EXISTS `elementaire` (
  `Id_Elementaire` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Elementaire` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Elementaire`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `elementaire`
--

INSERT INTO `elementaire` (`Id_Elementaire`, `Nom_Elementaire`) VALUES
(1, 'Feu'),
(2, 'Glace'),
(3, 'Foudre'),
(4, 'Eau');

-- --------------------------------------------------------

--
-- Structure de la table `item_clef`
--

DROP TABLE IF EXISTS `item_clef`;
CREATE TABLE IF NOT EXISTS `item_clef` (
  `Id_Page` int(11) NOT NULL,
  `Id_Location` int(11) NOT NULL,
  PRIMARY KEY (`Id_Page`),
  KEY `Id_Location` (`Id_Location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `item_clef`
--

INSERT INTO `item_clef` (`Id_Page`, `Id_Location`) VALUES
(67, 57),
(69, 57);

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `Id_Page` int(11) NOT NULL,
  PRIMARY KEY (`Id_Page`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`Id_Page`) VALUES
(57),
(66);

-- --------------------------------------------------------

--
-- Structure de la table `monstre`
--

DROP TABLE IF EXISTS `monstre`;
CREATE TABLE IF NOT EXISTS `monstre` (
  `Id_Page` int(11) NOT NULL,
  `Hp_Monstre` int(11) DEFAULT NULL,
  `Accuracy_Monstre` int(11) DEFAULT NULL,
  `Chance_Monstre` int(11) DEFAULT NULL,
  `Defence_Monstre` int(11) DEFAULT NULL,
  `DefenceMagique_Monstre` int(11) DEFAULT NULL,
  `Agi_Monstre` varchar(50) DEFAULT NULL,
  `Esquive_Monstre` varchar(50) DEFAULT NULL,
  `Mp_Monstre` int(11) DEFAULT NULL,
  `Force_Monstre` int(11) DEFAULT NULL,
  `Magie_Monstre` int(11) DEFAULT NULL,
  `Overkill_Monstre` int(11) DEFAULT NULL,
  `Gil_Monstre` int(11) DEFAULT NULL,
  `XP_Monstre` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Page`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `monstre`
--

INSERT INTO `monstre` (`Id_Page`, `Hp_Monstre`, `Accuracy_Monstre`, `Chance_Monstre`, `Defence_Monstre`, `DefenceMagique_Monstre`, `Agi_Monstre`, `Esquive_Monstre`, `Mp_Monstre`, `Force_Monstre`, `Magie_Monstre`, `Overkill_Monstre`, `Gil_Monstre`, `XP_Monstre`) VALUES
(56, 6000, 0, 15, 1, 40, '18', '0', 480, 38, 26, 4060, 1100, 1300),
(65, 750, 10, 15, 15, 5, '15', '15', 10, 10, 8, 300, 100, 3);

-- --------------------------------------------------------

--
-- Structure de la table `ont`
--

DROP TABLE IF EXISTS `ont`;
CREATE TABLE IF NOT EXISTS `ont` (
  `Id_Page` int(11) NOT NULL,
  `Id_Elementaire` int(11) NOT NULL,
  `Id_Variante` int(11) NOT NULL,
  PRIMARY KEY (`Id_Page`,`Id_Elementaire`,`Id_Variante`),
  KEY `Id_Elementaire` (`Id_Elementaire`),
  KEY `Id_Variante` (`Id_Variante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ont`
--

INSERT INTO `ont` (`Id_Page`, `Id_Elementaire`, `Id_Variante`) VALUES
(56, 1, 2),
(65, 1, 2),
(56, 2, 2),
(65, 2, 2),
(56, 3, 4),
(65, 3, 2),
(56, 4, 4),
(65, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `Id_Page` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Page` varchar(50) DEFAULT NULL,
  `Image_Page` varchar(50) DEFAULT NULL,
  `Description_Page` mediumtext,
  PRIMARY KEY (`Id_Page`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`Id_Page`, `Nom_Page`, `Image_Page`, `Description_Page`) VALUES
(56, 'Couguar', 'monstre_56.webp', 'Le Couguar est un ennemi de Final Fantasy X rencontrÃ© sur la plaine FÃ©licitÃ© et dans la grotte du Priant volÃ©.'),
(57, 'Besaid', 'location_57.webp', 'La premiÃ¨re visite de l\'Ã®le de Besaid se situe au dÃ©but du jeu, aprÃ¨s que la barge des Al Bheds se fasse attaquer par Sin. Tidus se rÃ©veille dans l\'eau, prÃ¨s de la plage oÃ¹ l\'Ã©quipe des Besaid Aurochs s\'entraÃ®ne. AprÃ¨s une dÃ©monstration de blitzball, Tidus fait la connaissance de Wakka, capitaine et entraineur de l\'Ã©quipe.. Ce dernier l\'emmÃ¨ne au village et lui prÃ©sente l\'Ã®le.\r\n\r\nUne fois arrivÃ©, Wakka quitte Tidus. Ce dernier visite alors le village, rencontre Luzzu et Gatta, les Bannisseurs et s\'endort chez Wakka. Ã€ son rÃ©veil, Tidus entend parler d\'un Invokeur qui n\'est pas encore revenu du temple. Il se rend dans la salle de l\'Ã©preuve, contre l\'avis de Wakka et des prÃªtres. AprÃ¨s l\'avoir parcourue, il se retrouve dans l\'antichambre oÃ¹ il rencontre Lulu et Kimahri, deux gardiens.'),
(65, 'Kimahri', 'monstre_65.webp', 'Kimahri Ronso est un personnage jouable dans Final Fantasy X et un personnage non-jouable dans Final Fantasy X-2. Membre de la tribu des Ronsos, il est taciturne, Ã  cause de la honte d\'avoir eu sa corne brisÃ©e par un autre Ronso. Protecteur de Yuna depuis son enfance, il devient un Gardien pendant son pÃ¨lerinage.'),
(66, 'Plaine FÃ©licitÃ©', 'location_66.webp', 'C\'est une vaste Ã©tendue bordÃ©e Ã  l\'est et Ã  l\'ouest par des falaises, au nord par un prÃ©cipice et au sud par la forÃªt de Macalania. Ã€ partir de la sortie de la forÃªt on y accÃ¨de par un large chemin qui descend en pente douce. Un chemin Ã©troit et encaissÃ© au nord-est de la plaine mÃ¨ne Ã  la grotte du Priant volÃ© et au mont Gagazet.\r\n\r\nC\'est une plaine dÃ©solÃ©e oÃ¹ Ã©mergent Ã§Ã  et lÃ  des aiguilles en pierre. Dans Final Fantasy X la seule implantation humaine est un campement au centre de la plaine, oÃ¹ se situe un magasin pour les voyageurs. On y trouve Ã©galement une Ã©leveuse de chocobos qui peut prÃªter un chocobo et organise un entrainement pour apprendre Ã  le monter. Dans Final Fantasy X-2 le comptoir bleu et le comptoir argent y organisent des jeux.'),
(67, 'Livre Al Bhed II', 'item_clef_67.webp', 'Translates Y to A'),
(69, 'Symbole Lunaire', 'item_clef_69.webp', 'Active partiellement le Nirvana de Yuna. TrouvÃ© sur la plage de Besaid');

-- --------------------------------------------------------

--
-- Structure de la table `varianteelem`
--

DROP TABLE IF EXISTS `varianteelem`;
CREATE TABLE IF NOT EXISTS `varianteelem` (
  `Id_Variante` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Variante` mediumtext NOT NULL,
  PRIMARY KEY (`Id_Variante`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `varianteelem`
--

INSERT INTO `varianteelem` (`Id_Variante`, `Nom_Variante`) VALUES
(1, 'Faible'),
(2, 'Normal'),
(3, 'Puissante'),
(4, 'Immunisé');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `a`
--
ALTER TABLE `a`
  ADD CONSTRAINT `a_ibfk_1` FOREIGN KEY (`Id_Page`) REFERENCES `monstre` (`Id_Page`),
  ADD CONSTRAINT `a_ibfk_2` FOREIGN KEY (`Id_Page_1`) REFERENCES `location` (`Id_Page`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`Id_Page`) REFERENCES `page` (`Id_Page`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`Id_Commentaire_1`) REFERENCES `commentaire` (`Id_Commentaire`),
  ADD CONSTRAINT `commentaire_ibfk_3` FOREIGN KEY (`Id_Compte`) REFERENCES `compte` (`Id_Compte`);

--
-- Contraintes pour la table `item_clef`
--
ALTER TABLE `item_clef`
  ADD CONSTRAINT `item_clef_ibfk_1` FOREIGN KEY (`Id_Page`) REFERENCES `page` (`Id_Page`),
  ADD CONSTRAINT `item_clef_ibfk_2` FOREIGN KEY (`Id_Location`) REFERENCES `location` (`Id_Page`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`Id_Page`) REFERENCES `page` (`Id_Page`);

--
-- Contraintes pour la table `monstre`
--
ALTER TABLE `monstre`
  ADD CONSTRAINT `monstre_ibfk_1` FOREIGN KEY (`Id_Page`) REFERENCES `page` (`Id_Page`);

--
-- Contraintes pour la table `ont`
--
ALTER TABLE `ont`
  ADD CONSTRAINT `ont_ibfk_1` FOREIGN KEY (`Id_Page`) REFERENCES `monstre` (`Id_Page`),
  ADD CONSTRAINT `ont_ibfk_2` FOREIGN KEY (`Id_Elementaire`) REFERENCES `elementaire` (`Id_Elementaire`),
  ADD CONSTRAINT `ont_ibfk_3` FOREIGN KEY (`Id_Variante`) REFERENCES `varianteelem` (`Id_Variante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
