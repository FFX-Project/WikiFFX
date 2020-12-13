-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 13 déc. 2020 à 13:39
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

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

CREATE TABLE `a` (
  `Id_Monstre` int(11) NOT NULL,
  `Id_Location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `Id_Commentaire` int(11) NOT NULL,
  `Id_Compte` int(11) NOT NULL,
  `LibelleC` varchar(255) DEFAULT NULL,
  `Id_Item_Clef` int(11) NOT NULL,
  `Id_Location` int(11) NOT NULL,
  `Id_Monstre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `Id_Compte` int(11) NOT NULL,
  `Pseudo` varchar(255) DEFAULT NULL,
  `Mdp` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Droit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `elementaire`
--

CREATE TABLE `elementaire` (
  `Id_Elementaire` int(11) NOT NULL,
  `NomElem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `item_clef`
--

CREATE TABLE `item_clef` (
  `Id_Item_Clef` int(11) NOT NULL,
  `NomItemC` varchar(50) DEFAULT NULL,
  `DescriptionItemC` varchar(50) DEFAULT NULL,
  `ImageItemC` varchar(50) DEFAULT NULL,
  `Id_Location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `Id_Location` int(11) NOT NULL,
  `NomLoc` varchar(255) DEFAULT NULL,
  `ImageLoc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `monstre`
--

CREATE TABLE `monstre` (
  `Id_Monstre` int(11) NOT NULL,
  `NomM` varchar(50) DEFAULT NULL,
  `HpM` int(11) DEFAULT NULL,
  `Accuracy` int(11) DEFAULT NULL,
  `Chance` int(11) DEFAULT NULL,
  `Defence` int(11) DEFAULT NULL,
  `DefenceMagique` int(11) DEFAULT NULL,
  `Agi` varchar(50) DEFAULT NULL,
  `esquive` varchar(50) DEFAULT NULL,
  `MpM` int(11) DEFAULT NULL,
  `strength` int(11) DEFAULT NULL,
  `Magie` int(11) DEFAULT NULL,
  `Overkill` int(11) DEFAULT NULL,
  `ImageM` varchar(255) DEFAULT NULL,
  `Gil` int(11) DEFAULT NULL,
  `XP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ont`
--

CREATE TABLE `ont` (
  `Id_Monstre` int(11) NOT NULL,
  `Id_Elementaire` int(11) NOT NULL,
  `Id_Variante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `varianteelem`
--

CREATE TABLE `varianteelem` (
  `Id_Variante` int(11) NOT NULL,
  `NomVarianteElem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `a`
--
ALTER TABLE `a`
  ADD PRIMARY KEY (`Id_Monstre`,`Id_Location`),
  ADD KEY `Id_Location` (`Id_Location`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`Id_Commentaire`,`Id_Compte`),
  ADD KEY `Id_Compte` (`Id_Compte`),
  ADD KEY `Id_Item_Clef` (`Id_Item_Clef`),
  ADD KEY `Id_Location` (`Id_Location`),
  ADD KEY `Id_Monstre` (`Id_Monstre`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`Id_Compte`);

--
-- Index pour la table `elementaire`
--
ALTER TABLE `elementaire`
  ADD PRIMARY KEY (`Id_Elementaire`);

--
-- Index pour la table `item_clef`
--
ALTER TABLE `item_clef`
  ADD PRIMARY KEY (`Id_Item_Clef`),
  ADD KEY `Id_Location` (`Id_Location`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Id_Location`);

--
-- Index pour la table `monstre`
--
ALTER TABLE `monstre`
  ADD PRIMARY KEY (`Id_Monstre`);

--
-- Index pour la table `ont`
--
ALTER TABLE `ont`
  ADD PRIMARY KEY (`Id_Monstre`,`Id_Elementaire`,`Id_Variante`),
  ADD KEY `Id_Elementaire` (`Id_Elementaire`),
  ADD KEY `Id_Variante` (`Id_Variante`);

--
-- Index pour la table `varianteelem`
--
ALTER TABLE `varianteelem`
  ADD PRIMARY KEY (`Id_Variante`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `Id_Commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `Id_Compte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `elementaire`
--
ALTER TABLE `elementaire`
  MODIFY `Id_Elementaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `item_clef`
--
ALTER TABLE `item_clef`
  MODIFY `Id_Item_Clef` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `Id_Location` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `monstre`
--
ALTER TABLE `monstre`
  MODIFY `Id_Monstre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `varianteelem`
--
ALTER TABLE `varianteelem`
  MODIFY `Id_Variante` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `a`
--
ALTER TABLE `a`
  ADD CONSTRAINT `a_ibfk_1` FOREIGN KEY (`Id_Monstre`) REFERENCES `monstre` (`Id_Monstre`),
  ADD CONSTRAINT `a_ibfk_2` FOREIGN KEY (`Id_Location`) REFERENCES `location` (`Id_Location`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`Id_Compte`) REFERENCES `compte` (`Id_Compte`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`Id_Item_Clef`) REFERENCES `item_clef` (`Id_Item_Clef`),
  ADD CONSTRAINT `commentaire_ibfk_3` FOREIGN KEY (`Id_Location`) REFERENCES `location` (`Id_Location`),
  ADD CONSTRAINT `commentaire_ibfk_4` FOREIGN KEY (`Id_Monstre`) REFERENCES `monstre` (`Id_Monstre`);

--
-- Contraintes pour la table `item_clef`
--
ALTER TABLE `item_clef`
  ADD CONSTRAINT `item_clef_ibfk_1` FOREIGN KEY (`Id_Location`) REFERENCES `location` (`Id_Location`);

--
-- Contraintes pour la table `ont`
--
ALTER TABLE `ont`
  ADD CONSTRAINT `ont_ibfk_1` FOREIGN KEY (`Id_Monstre`) REFERENCES `monstre` (`Id_Monstre`),
  ADD CONSTRAINT `ont_ibfk_2` FOREIGN KEY (`Id_Elementaire`) REFERENCES `elementaire` (`Id_Elementaire`),
  ADD CONSTRAINT `ont_ibfk_3` FOREIGN KEY (`Id_Variante`) REFERENCES `varianteelem` (`Id_Variante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
