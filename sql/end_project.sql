-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 02 juil. 2019 à 22:01
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
  `name` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `user_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bills`
--

INSERT INTO `bills` (`id`, `price`, `date`, `services`, `name`, `file`, `user_id`) VALUES
(1, '44555445', '2019-06-15', 'qsdqsdqs', 'qsdqsdqsdq', '15597308711268915719.pdf', 2),
(2, '44555445', '2019-06-15', 'qsdqsdqs', 'qsdqsdqsdq', '1559730984353850037.pdf', 2),
(3, '544545', '2019-06-20', 'trdyguih', 'fhgvjbk', '15597310122043181877.pdf', 1),
(4, '544545', '2019-06-20', 'trdyguih', 'fhgvjbk', '1559731038959639999.pdf', 1),
(5, '544545', '2019-06-20', 'trdyguih', 'fhgvjbk', '1559731073694301765.pdf', 1),
(6, '544545', '2019-06-20', 'trdyguih', 'fhgvjbk', '1559731112212838962.pdf', 1),
(7, '5656', '2019-06-07', 'sfsfsdf', 'sdfsdf', '1559736454598429120.pdf', 1),
(8, '+5656', '2019-06-20', 'rdgd', 'dfgdfg', '1559736510130175417.pdf', 2),
(9, '55', '2019-06-07', 'ERIF', 'ma premiere facture', '1559775417684748850.pdf', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `content`, `title_picture`, `secondary_picture`, `posted_at`, `is_published`) VALUES
(49, 'sdfsd', '  fsdfs  ', '<p>sdfsdf<em>fsdfsdfd<strong>sdfsdf</strong>sdfsdf</em>sdfsdfsdfsdfsdf</p>', '1562024103754556925.png', NULL, '2019-07-01', 1),
(48, 'HEy', '   fsdfs   ', '<p>ddsfsdfsd<strong>sdfsdfsdfsd</strong>dfsdfsdfsdf</p>', '15620240171920308624.jpg', NULL, '2019-07-01', 1),
(52, 'k,k,', '    gfyughjghjgjhgjhgh    ', '<p>fgfghfhgf</p>', '1562022358161293919.jpg', NULL, '2019-07-01', 1),
(50, 'wesh', '   fdgdfg   ', '<p>ddfgdfg</p>', '15620240231587356150.png', NULL, '2019-07-01', 1),
(51, 'dfgdfgd', '  fgdfgdf  ', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>', '15620240311717979023.png', NULL, '2019-07-01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` tinytext NOT NULL,
  `answer` text NOT NULL,
  `sector_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `sector_id`) VALUES
(1, 'hey ?', 'oui', 2),
(2, 'hey ?', 'oui', 2),
(3, 'dfgd', 'fgdfgdfg', 2),
(4, 'dfgd', 'fgdfgdfg', 2),
(5, 'dfgd', 'fgdfgdfg', 2),
(6, 'dfgd', 'fgdfgdfg', 2),
(7, 'dfgd', 'fgdfgdfg', 2),
(8, 'dfgdgf', 'dgdfg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `content` longtext NOT NULL,
  `object` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `email`, `content`, `object`) VALUES
(90, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(89, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(88, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(87, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(86, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(85, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(84, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(83, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(82, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(81, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(80, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(79, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(78, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(77, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', '13'),
(93, 'dfgdfgdf@gdfgdfg.fr', 'dfgdfgdfg', '1'),
(94, 'sam@sam.fr', 'hjgjhgjgjgj', '8'),
(95, 'sam@sam.fr', 'y_uuiyui', '8'),
(96, 'sam@sam.fr', 'ertert', '5'),
(97, 'sam@sam.fr', 'zerzerzerzerzezer', 'yrtyrty'),
(98, 'sam@sam.fr', 'zerzerzerzerzezer', 'yrtyrty'),
(99, 'sam@sam.fr', 'zerzerzerzerzezer', 'yrtyrty'),
(100, 'sam@sam.fr', 'zerzerzerzerzezer', 'jhjkhkjhkj'),
(101, 'sam@sam.fr', 'kljlkjkj', 'panneaux directionnels'),
(102, 'sam@sam.fr', 'kljlkjkj', 'panneaux directionnels'),
(103, 'sam@sam.fr', 'gjhjg', 'parcs'),
(104, 'sam@sam.fr', 'gjhjg', 'utytuy'),
(105, 'sam@sam.fr', 'rretertre', 'feux tricolores'),
(106, 'sam@sam.fr', 'qdsf', 'panneaux directionnels'),
(107, 'sam@sam.fr', 'qdsf', 'panneaux directionnels'),
(108, 'sam@sam.fr', 'qdsf', 'panneaux directionnels'),
(109, 'sam@sam.fr', 'qdsf', 'panneaux directionnels'),
(110, 'sam@sam.fr', 'qdsf', 'panneaux directionnels'),
(111, 'sam@sam.fr', 'qdsf', 'panneaux directionnels'),
(112, 'sam@sam.fr', 'qdsf', 'panneaux directionnels'),
(113, 'sam@sam.fr', 'test test test', 'Demande de modification d\'information de profil');

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
-- Structure de la table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `subject`
--

INSERT INTO `subject` (`id`, `sector_id`, `name`) VALUES
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
  `firstname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `address` tinytext NOT NULL,
  `is_confirm` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `name`, `birthday`, `phone`, `is_admin`, `address`, `is_confirm`) VALUES
(3, 'admzerzerzein@the.net', '25f9e794323b453885f5181f1b624d0b', 'gfhjk', 'fgh', '2019-06-20', 30909090, 0, 'dsds', 0),
(2, 'admzerzerzein@the.net', '25f9e794323b453885f5181f1b624d0b', 'gfhjk', 'fgh', '2019-06-20', 30909090, 0, 'dsds', 0),
(24, 'admzerzerzein@the.net', '25f9e794323b453885f5181f1b624d0b', 'gfhjk', 'fgh', '2019-06-20', 30909090, 0, 'dsds', 0),
(4, 'sam@sam.fr', '25f9e794323b453885f5181f1b624d0b', 'sam', 'cloa', '2019-06-14', 630011520, 1, 'dsds', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
