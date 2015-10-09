-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Jeu 08 Octobre 2015 à 02:04
-- Version du serveur :  5.5.44
-- Version de PHP :  5.4.43

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_letgae458tp1`
--

-- --------------------------------------------------------

--
-- Structure de la table `churches`
--

CREATE TABLE `churches` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` tinytext NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `churches`
--

INSERT INTO `churches` (`id`, `name`, `details`, `user_id`, `created`, `modified`) VALUES
(1, 'Admin church', 'This is an admin church.', 2, '2015-09-25 21:01:50', '2015-10-08 01:59:50'),
(3, 'Member church', 'This is a member church.', 1, '2015-10-06 03:03:05', '2015-10-06 03:03:05');

-- --------------------------------------------------------

--
-- Structure de la table `churches_missionaries`
--

CREATE TABLE `churches_missionaries` (
  `id` int(11) NOT NULL,
  `church_id` int(11) NOT NULL,
  `missionary_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `churches_missionaries`
--

INSERT INTO `churches_missionaries` (`id`, `church_id`, `missionary_id`) VALUES
(2, 3, 1),
(3, 3, 2),
(6, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `church_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `donations`
--

INSERT INTO `donations` (`id`, `church_id`, `amount`, `date`, `created`, `modified`) VALUES
(1, 1, 42, '2027-05-08 05:23:00', '2015-09-25 21:27:04', '2015-09-25 21:27:04'),
(2, 1, 65, '2015-02-27 12:59:00', '2015-10-02 20:45:14', '2015-10-02 20:45:14'),
(3, 3, 50, '2015-10-06 17:48:00', '2015-10-06 17:48:40', '2015-10-06 17:48:40');

-- --------------------------------------------------------

--
-- Structure de la table `missionaries`
--

CREATE TABLE `missionaries` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `details` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `missionaries`
--

INSERT INTO `missionaries` (`id`, `name`, `details`, `email`, `created`, `modified`, `user_id`) VALUES
(1, 'Bob the admin missionary', 'Details unknown.', 'bob@rekt.com', '2015-09-25 21:26:19', '2015-10-02 21:52:15', 2),
(2, 'Albert the member missionary', 'A missionary.', 'albert@bruh.com', '2015-10-06 04:01:11', '2015-10-06 04:01:11', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'member', '$2a$10$8vzYEbg1/k1FsfzrH6926ukBpUhycnSLGqEPWrZHdECmY9TRbS9Ty', 'member', '2015-09-25', '2015-10-01'),
(2, 'admin', '$2a$10$RX1opzoTJWt7tXoxu3Yo4OlhwMQtrXszNTiaqMxS7sIsB/BihYKHm', 'admin', '2015-09-25', '2015-10-01'),
(5, 'memberB', '$2a$10$q17cglfELq2.pgmCuKMaauHLBvjFXoOMhwObw4VbrMuYmOpljcBke', 'member', '2015-10-07', '2015-10-07'),
(6, 'Foreveralone2', '$2a$10$Mn/62FyQJF.38XN/q7bBuekTgC7bKxL0wVnd7bh25MkE2GRbtNIbe', 'member', '2015-10-07', '2015-10-08');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `churches`
--
ALTER TABLE `churches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `churches_missionaries`
--
ALTER TABLE `churches_missionaries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `missionaries`
--
ALTER TABLE `missionaries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `churches`
--
ALTER TABLE `churches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `churches_missionaries`
--
ALTER TABLE `churches_missionaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `missionaries`
--
ALTER TABLE `missionaries`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
