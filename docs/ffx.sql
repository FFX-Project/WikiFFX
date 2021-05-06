-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 25 mars 2021 à 16:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9
DROP DATABASE IF EXISTS FFX;

CREATE DATABASE IF NOT EXISTS FFX;
USE FFX;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ffx`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `Id_Commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `Text_Commentaire` varchar(255) DEFAULT NULL,
  `Id_Page` int(11) DEFAULT NULL,
  `Id_Commentaire_1` int(11) DEFAULT NULL,
  `Id_Compte` int(11) NOT NULL,
  PRIMARY KEY (`Id_Commentaire`),
  UNIQUE KEY `Id_Commentaire_1` (`Id_Commentaire_1`),
  KEY `Id_Page` (`Id_Page`),
  KEY `Id_Compte` (`Id_Compte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO compte VALUES
(1,"admin","21232f297a57a5a743894a0e4a801fc3","5head@gmail.com",1),
(2,"user","ee11cbb19052e40b07aac0ca060c23ee","abcdefg@gmail.com",0);

-- --------------------------------------------------------

--
-- Structure de la table `elementaire`
--

DROP TABLE IF EXISTS `elementaire`;
CREATE TABLE IF NOT EXISTS `elementaire` (
  `Id_Elementaire` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Elementaire` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Elementaire`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `Id_Page` int(11) NOT NULL,
  PRIMARY KEY (`Id_Page`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`Id_Page`) VALUES
(1),
(2);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `monstre`
--

INSERT INTO `monstre` (`Id_Page`, `Hp_Monstre`, `Accuracy_Monstre`, `Chance_Monstre`, `Defence_Monstre`, `DefenceMagique_Monstre`, `Agi_Monstre`, `Esquive_Monstre`, `Mp_Monstre`, `Force_Monstre`, `Magie_Monstre`, `Overkill_Monstre`, `Gil_Monstre`, `XP_Monstre`) VALUES
(3, 1000, 2, 3, 4, 5, '6', '7', 8, 9, 10, 11, 12, 13),
(4, 1, 1, 1, 1, 1, '1', '1', 1, 1, 1, 1, 1, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ont`
--

INSERT INTO `ont` (`Id_Page`, `Id_Elementaire`, `Id_Variante`) VALUES
(3, 1, 2),
(4, 2, 1),
(4, 2, 2),
(3, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `Id_Page` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Page` varchar(50) DEFAULT NULL,
  `Image_Page` varchar(50) DEFAULT NULL,
  `Description_Page` TEXT DEFAULT NULL,
  PRIMARY KEY (`Id_Page`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`Id_Page`, `Nom_Page`, `Image_Page`, `Description_Page`) VALUES
(1, 'NOM DE LA PAGE', 'IMAGE', 'CESTLADESCRIPTIONHEHE'),
(2, 'PAGE2', 'IMAGEOUI', 'AA'),
(3, 'juliett', 'oui.jpg', 'le seul lunique 5head hiih'),
(4, 'gwendall', 'gwen.jpp', 'ouihihi');

-- --------------------------------------------------------

--
-- Structure de la table `varianteelem`
--

DROP TABLE IF EXISTS `varianteelem`;
CREATE TABLE IF NOT EXISTS `varianteelem` (
  `Id_Variante` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Variante` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Variante`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
