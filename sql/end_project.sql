-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  sam. 22 juin 2019 à 10:03
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `published_at` date NOT NULL,
  `is_published` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `article_media`
--

CREATE TABLE `article_media` (
  `id` int(11) NOT NULL,
  `priority` int(5) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `article_id` int(255) NOT NULL,
  `youtube_link` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `services` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `content` longtext NOT NULL,
  `title_picture` varchar(255) NOT NULL,
  `secondary_picture` varchar(255) DEFAULT NULL,
  `posted_at` date DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `content`, `title_picture`, `secondary_picture`, `posted_at`, `is_published`) VALUES
(37, 'sdfsfdf', 'sdfdsfsd', 'sdfsdfsdf', '15583498251311307060.jpg', NULL, '2019-05-19', 1),
(36, 'dsfvdfv', '       fdvvdfv       ', 'vdfvdfv', '15580469981533302465.jpg', NULL, '2019-05-19', 1),
(38, 'dsfds', '  sdfsdf  ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda autem dolores ea eligendi excepturi perspiciatis unde. Debitis deserunt earum enim error laudantium mollitia, obcaecati omnis qui quis quisquam voluptas.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda autem dolores ea eligendi excepturi perspiciatis unde. Debitis deserunt earum enim error laudantium mollitia, obcaecati omnis qui quis quisquam voluptas.', '1558363509878232424.jpg', NULL, '2019-05-11', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `content` longtext NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `email`, `content`, `test_id`) VALUES
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
(77, 'sam@sam.fr', 'fsdfsdfsdfsdfsddf', 13),
(93, 'dfgdfgdf@gdfgdfg.fr', 'dfgdfgdfg', 1),
(94, 'ihjoij@kjnljn.fr', 'k', 2),
(95, 'sam@sam.fr', 'sqsdqsd', 2),
(96, 'sam@sam.fr', 'sefsdfsd', 2),
(97, 'sam@sam.fr', 'sefsdfsd', 2),
(98, 'sam@sam.fr', 'sefsdfsd', 2);

-- --------------------------------------------------------

--
-- Structure de la table `sectors`
--

CREATE TABLE `sectors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `is_admin`) VALUES
(1, 'sam@sam.fr', '25f9e794323b453885f5181f1b624d0b', 1),
(2, 'sam@sam', '25f9e794323b453885f5181f1b624d0b', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_media`
--
ALTER TABLE `article_media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `article_media`
--
ALTER TABLE `article_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
