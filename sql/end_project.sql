-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 27 juin 2019 à 19:55
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `end_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `address` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `name`, `birthday`, `phone`, `is_admin`, `address`) VALUES
(1, 'admzerzerzein@the.net', '25f9e794323b453885f5181f1b624d0b', 'gfhjk', 'fgh', '2019-06-20', 30909090, 0, 'dsds'),
(2, 'admzerzerzein@the.net', '25f9e794323b453885f5181f1b624d0b', 'gfhjk', 'fgh', '2019-06-20', 30909090, 0, 'dsds'),
(24, 'admzerzerzein@the.net', '25f9e794323b453885f5181f1b624d0b', 'gfhjk', 'fgh', '2019-06-20', 30909090, 0, 'dsds'),
(25, 'sam@sam.fr', '65f67958c127ca71935ac5e11c6c2760', 'sam', 'cloa', '2019-06-14', 630011520, 1, 'dsds');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
