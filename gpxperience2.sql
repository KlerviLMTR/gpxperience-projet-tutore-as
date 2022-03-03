-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 mars 2022 à 13:27
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gpxperience2`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id_activite` int(11) NOT NULL AUTO_INCREMENT,
  `discipline` varchar(50) DEFAULT NULL,
  `date_act` date DEFAULT NULL,
  `nom_act` varchar(50) DEFAULT NULL,
  `favori_act` bit(1) DEFAULT NULL,
  `label_act` varchar(50) DEFAULT NULL,
  `distance_act` decimal(8,2) DEFAULT NULL,
  `duree_act` int(11) DEFAULT NULL,
  `vitesse_act` decimal(15,2) DEFAULT NULL,
  `ascension_act` varchar(50) DEFAULT NULL,
  `difficulte_act` int(11) DEFAULT NULL,
  `id_uti` int(11) NOT NULL,
  PRIMARY KEY (`id_activite`),
  KEY `id_uti` (`id_uti`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `discipline`, `date_act`, `nom_act`, `favori_act`, `label_act`, `distance_act`, `duree_act`, `vitesse_act`, `ascension_act`, `difficulte_act`, `id_uti`) VALUES
(1, 'Randonnée', '2022-03-09', 'Randonnée dans le Pays de Touc', b'1', 'vert', '12.00', 3, '9.50', '502', 3, 1),
(2, 'Randonnée', '2021-03-10', 'Randonnée sur Coruscant', b'0', 'bleu', '25.00', 12, '8.20', '150', 5, 2),
(3, 'Course à poney', '2021-05-13', 'Derby de la Comté avec Bill', b'1', 'rouge', '60.00', 1, '35.00', '52', 8, 1),
(4, 'Course de Pods', '2021-04-14', 'Pod-racing sur Tatooine', b'1', 'Jaune', '120.00', 2, '85.00', '32', 8, 2),
(5, 'Spéléologie', '2021-09-15', 'Sortie Spéléo dans la Moria', b'0', 'rouge', '14.00', 21, '2.50', '802', 10, 1),
(6, 'Marche', '2022-02-09', 'Promenade sur le plateau de Yavin', b'1', NULL, '12.00', 2, '5.60', '23', 2, 2),
(7, 'Course à pieds', '2015-03-18', 'Course de fond à Minas Morgul', b'0', 'rouge', '21.00', 3, '15.60', '154', 10, 1),
(8, 'Marche', '2021-10-20', 'Sortie avec les Ewoks', b'1', 'vert', '15.00', 5, '3.20', '156', 5, 2),
(9, 'Hiking', '2011-07-13', 'Ascension du Col de Caradhras', b'0', NULL, '12.00', 15, '1.20', '1514', 10, 1),
(10, 'Course de vaisseaux', '2010-04-16', 'Grand Prix X-Wing', b'1', 'vert', '56844.00', 2, '1056.50', '', 10, 2),
(11, 'Marche', '2021-04-14', 'Promenade à Fondcombe', b'1', 'null', '5.60', 3, '2.50', '156', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_uti` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_uti`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_uti`, `login`, `password`) VALUES
(1, 'Samsagace', 'Bill'),
(2, 'Anakin', 'Tatooine');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
