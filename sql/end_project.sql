-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 juin 2019 à 20:38
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `end_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `services` varchar(255) NOT NULL,
  `name` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `content` longtext NOT NULL,
  `title_picture` varchar(255) NOT NULL,
  `secondary_picture` varchar(255) DEFAULT NULL,
  `posted_at` date DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `content`, `title_picture`, `secondary_picture`, `posted_at`, `is_published`) VALUES
(37, 'sdfsfdf', 'sdfdsfsd', 'sdfsdfsdf', '15583498251311307060.jpg', NULL, '2019-05-19', 1),
(36, 'dsfvdfv', '       fdvvdfv       ', 'vdfvdfv', '15580469981533302465.jpg', NULL, '2019-05-19', 1),
(38, 'dsfds', 'sdfsdf', 'sfdfsdf', '1558363509878232424.jpg', NULL, '2019-05-11', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `content` longtext NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `email`, `content`, `test_id`) VALUES
(91, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(90, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(89, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(88, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(87, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(86, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(85, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(84, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(83, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(82, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(81, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(80, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(79, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(78, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(77, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13);

-- --------------------------------------------------------

--
-- Structure de la table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
CREATE TABLE IF NOT EXISTS `sectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sectors`
--

INSERT INTO `sectors` (`id`, `name`) VALUES
(1, 'Voirie'),
(2, 'Signalisation'),
(3, 'Espace vert'),
(4, 'Propreté'),
(5, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `sector_id`, `name`) VALUES
(1, 1, 'mobiliers'),
(2, 1, 'revetement'),
(3, 1, 'signalisation au sol'),
(4, 2, 'feux tricolores'),
(5, 2, 'panneaux directionnels'),
(6, 2, 'pannneaux sectorisations'),
(7, 3, 'parcs'),
(8, 3, 'espace ornementaux'),
(9, 3, 'squares'),
(10, 3, 'aires de jeu'),
(11, 4, 'poubelles'),
(12, 4, 'ramassages'),
(13, 4, 'dégradations'),
(14, 4, 'propreté de la voirie');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `is_admin`) VALUES
(1, 'sam@sam.fr', '25f9e794323b453885f5181f1b624d0b', 1),
(2, 'sam@sam', '25f9e794323b453885f5181f1b624d0b', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
