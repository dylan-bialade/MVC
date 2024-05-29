-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 27 mai 2024 à 12:22
-- Version du serveur :  5.7.24
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `base_garbadge`
--
DROP DATABASE IF EXISTS `base_garbadge`;
CREATE DATABASE IF NOT EXISTS `base_garbadge` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `base_garbadge`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Compagnie'),
(2, 'Organisation'),
(3, 'Ville'),
(4, 'Sécurité'),
(5, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` int(4) NOT NULL,
  `date` date NOT NULL,
  `periode` varchar(4) NOT NULL,
  `valide` tinyint(4) NOT NULL,
  `utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur` (`utilisateur`),
  KEY `session` (`session`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`id`, `session`, `date`, `periode`, `valide`, `utilisateur`) VALUES
(1, 2024, '2024-08-13', 'soir', 1, 1),
(2, 2024, '2024-08-14', 'midi', 1, 1),
(3, 2024, '2024-08-14', 'soir', 1, 1),
(4, 2024, '2024-08-15', 'midi', 1, 1),
(5, 2024, '2024-08-15', 'soir', 1, 1),
(6, 2024, '2024-08-16', 'midi', 1, 1),
(7, 2024, '2024-08-16', 'soir', 1, 1),
(8, 2024, '2024-08-17', 'midi', 1, 1),
(9, 2024, '2024-08-15', 'midi', 1, 2),
(10, 2024, '2024-08-15', 'soir', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `annee` int(4) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`annee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`annee`, `dateDebut`, `dateFin`) VALUES
(2024, '2024-08-14', '2024-08-17');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `motdepasse` varchar(25) NOT NULL,
  `categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `categorie` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `motdepasse`, `categorie`) VALUES
(1, 'DESTRUEL', 'Jean-Philippe', 'jp.destruel@eclat.fr', 'sio15@ECLAT', 2),
(2, 'PARRA', 'Jérôme', 'j.parra@eclat.fr', 'SISR@15sio', 2),
(3, 'SENNETON', 'Aurélie', 'a.senneton@securitas.fr', 'df15J45!oui96', 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `repas`
--
ALTER TABLE `repas`
  ADD CONSTRAINT `repas_ibfk_1` FOREIGN KEY (`utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `repas_ibfk_2` FOREIGN KEY (`session`) REFERENCES `session` (`annee`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
