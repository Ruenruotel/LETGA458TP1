-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Jeu 12 Novembre 2015 à 00:59
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `churches_missionaries`
--

INSERT INTO `churches_missionaries` (`id`, `church_id`, `missionary_id`) VALUES
(2, 3, 1),
(3, 3, 2),
(6, 1, 2),
(8, 3, 4),
(9, 1, 6),
(10, 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Afrique du Sud'),
(3, 'Albanie'),
(4, 'Algérie'),
(5, 'Allemagne'),
(6, 'Andorre'),
(7, 'Angola'),
(8, 'Antigua et Barbuda'),
(9, 'Arabie saoudite'),
(10, 'Argentine'),
(11, 'Arménie'),
(12, 'Australie'),
(13, 'Autriche'),
(14, 'Azerbaïdjan'),
(15, 'Bahamas'),
(16, 'Bahrein'),
(17, 'Bangladesh'),
(18, 'Barbade'),
(19, 'Belgique'),
(20, 'Bélize'),
(21, 'Benin'),
(22, 'Bhoutan'),
(23, 'Biélorussie'),
(24, 'Bolivie'),
(25, 'Bosnie-Herzégovine'),
(26, 'Botswana'),
(27, 'Brésil'),
(28, 'Brunei'),
(29, 'Bulgarie'),
(30, 'Burkina Faso'),
(31, 'Burundi'),
(32, 'Cambodge'),
(33, 'Cameroun'),
(34, 'Canada'),
(35, 'Cap Vert'),
(36, 'Centrafrique'),
(37, 'Chili'),
(38, 'Chine'),
(39, 'Chypre'),
(40, 'Colombie'),
(41, 'Comores'),
(42, 'Congo démocratique'),
(43, 'Congo'),
(44, 'Corée du Nord'),
(45, 'Corée du Sud'),
(46, 'Costa Rica'),
(47, 'Côte d''Ivoire'),
(48, 'Croatie'),
(49, 'Cuba'),
(50, 'Danemark'),
(51, 'Djibouti'),
(52, 'Dominique'),
(53, 'République Dominicaine'),
(54, 'Egypte'),
(55, 'Emirats Arabes Unis'),
(56, 'Equateur'),
(57, 'Erythrée'),
(58, 'Espagne'),
(59, 'Estonie'),
(60, 'Etats-Unis'),
(61, 'Ethiopie'),
(62, 'Fidji'),
(63, 'Finlande'),
(64, 'France'),
(65, 'Gabon'),
(66, 'Gambie'),
(67, 'Géorgie'),
(68, 'Ghana'),
(69, 'Grèce'),
(70, 'Grenade'),
(71, 'Groenland'),
(72, 'Guatémala'),
(73, 'Guinée'),
(74, 'Guinée Bissau'),
(75, 'Guinée équatoriale'),
(76, 'Guyana'),
(77, 'Haïti'),
(78, 'Honduras'),
(79, 'Hong Kong'),
(80, 'Hongrie'),
(81, 'Inde'),
(82, 'Indonésie'),
(83, 'Irak'),
(84, 'Iran'),
(85, 'Irlande'),
(86, 'Islande'),
(87, 'Israël'),
(88, 'Italie'),
(89, 'Jamaïque'),
(90, 'Japon'),
(91, 'Jordanie'),
(92, 'Kazakhstan'),
(93, 'Kenya'),
(94, 'Kirghizstan'),
(95, 'Kiribati'),
(96, 'Koweït'),
(97, 'Laos'),
(98, 'Lesotho'),
(99, 'Lettonie'),
(100, 'Liban'),
(101, 'Liberia'),
(102, 'Libye'),
(103, 'Liechtenstein'),
(104, 'Lituanie'),
(105, 'Luxembourg'),
(106, 'Macédoine'),
(107, 'Madagascar'),
(108, 'Malaisie'),
(109, 'Malawi'),
(110, 'Maldives'),
(111, 'Mali'),
(112, 'Malte'),
(113, 'Maroc'),
(114, 'Marshall'),
(115, 'Maurice'),
(116, 'Mauritanie'),
(117, 'Mexique'),
(118, 'Micronésie'),
(119, 'Moldavie'),
(120, 'Monaco'),
(121, 'Mongolie'),
(122, 'Mozambique'),
(123, 'Myanmar'),
(124, 'Namibie'),
(125, 'Népal'),
(126, 'Nicaragua'),
(127, 'Niger'),
(128, 'Nigeria'),
(129, 'Norvège'),
(130, 'Nouvelle Zélande'),
(131, 'Oman'),
(132, 'Ouganda'),
(133, 'Ouzbekistan'),
(134, 'Pakistan'),
(135, 'Palau'),
(136, 'Palestine'),
(137, 'Panama'),
(138, 'Papouasie - Nouvelle Guinée'),
(139, 'Paraguay'),
(140, 'Pays-Bas'),
(141, 'Pérou'),
(142, 'Philippines'),
(143, 'Pologne'),
(144, 'Porto Rico'),
(145, 'Portugal'),
(146, 'Qatar'),
(147, 'Roumanie'),
(148, 'Royaume-Uni'),
(149, 'Russie'),
(150, 'Rwanda'),
(151, 'Saint Christophe et Nevis'),
(152, 'Saint Vincent et les Grenadines'),
(153, 'Sainte Lucie'),
(154, 'Salomon'),
(155, 'Salvador'),
(156, 'Samoa'),
(157, 'São Tomé et Príncipe'),
(158, 'Sénégal'),
(159, 'Seychelles'),
(160, 'Sierra Leone'),
(161, 'Singapour'),
(162, 'Slovaquie'),
(163, 'Slovénie'),
(164, 'Somalie'),
(165, 'Somaliland'),
(166, 'Soudan'),
(167, 'Sri Lanka'),
(168, 'Suède'),
(169, 'Suisse'),
(170, 'Surinam'),
(171, 'Syrie'),
(172, 'Swaziland'),
(173, 'Tadjikistan'),
(174, 'Taïwan'),
(175, 'Tanzanie'),
(176, 'Tchad'),
(177, 'Tchéquie'),
(178, 'Thaïlande'),
(179, 'Tibet'),
(180, 'Timor Oriental'),
(181, 'Togo'),
(182, 'Tonga'),
(183, 'Trinité et Tobago'),
(184, 'Tunisie'),
(185, 'Turkmenistan'),
(186, 'Turquie'),
(187, 'Tuvalu'),
(188, 'Ukraine'),
(189, 'Uruguay'),
(190, 'Vanuatu'),
(191, 'Vatican'),
(192, 'Vénézuéla'),
(193, 'Vietnam'),
(194, 'Yémen'),
(195, 'Yougoslavie'),
(196, 'Zambie'),
(197, 'Zimbabwe');

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
  `profile_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `subreligion_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `missionaries`
--

INSERT INTO `missionaries` (`id`, `name`, `details`, `email`, `profile_picture`, `created`, `modified`, `user_id`, `subreligion_id`, `country_id`) VALUES
(1, 'Bob the admin missionary', 'Details unknown.', 'bob@rekt.com', 'uploads/cool batman.png', '2015-09-25 21:26:19', '2015-11-06 21:41:28', 2, 1, 1),
(2, 'Albert the member missionary', 'A missionary.', 'albert@bruh.com', 'uploads/b99-terrysmile.jpg', '2015-10-06 04:01:11', '2015-10-22 21:49:19', 1, 1, 1),
(4, 'Matthew McConaughey  ', 'Alright alright alright!', 'alright@alright.alright', 'uploads/alright 3.png', '2015-10-22 21:24:48', '2015-10-22 21:51:34', 1, 1, 1),
(6, 'Florent Picard', 'FLORENT PICARRRRRRRRRRRRD', 'florent.picard@cmontmorency.qc.ca', 'uploads/florent.jpg', '2015-10-22 21:50:05', '2015-10-22 21:50:05', 2, 1, 1),
(10, 'Albert the member missionary', 'Alright alright alright !', 'shsh@SJ.DUDN', NULL, '2015-11-11 15:42:17', '2015-11-11 16:07:42', 2, 10, 64);

-- --------------------------------------------------------

--
-- Structure de la table `religions`
--

CREATE TABLE `religions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `religions`
--

INSERT INTO `religions` (`id`, `name`) VALUES
(1, 'Judaïsme'),
(2, 'Christianisme'),
(3, 'Islam'),
(4, 'Satanisme'),
(5, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `subreligions`
--

CREATE TABLE `subreligions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `religion_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `subreligions`
--

INSERT INTO `subreligions` (`id`, `name`, `religion_id`) VALUES
(1, 'Sionisme religieux', 1),
(2, 'Hassidisme', 1),
(3, 'Catholicisme', 2),
(4, 'Orthodoxie', 2),
(5, 'Protestantisme', 2),
(6, 'Anglicanisme', 2),
(7, 'Méthodisme', 2),
(8, 'Évangélisme', 2),
(9, 'Luthéranisme', 2),
(10, 'Chiisme', 3),
(11, 'Hanafisme', 3),
(12, 'Salafisme', 3),
(13, 'Wahhabisme', 3),
(14, 'Sunnisme', 3),
(15, 'Luciférisme', 4),
(16, 'Église de Satan', 4),
(17, 'Satanisme religieux', 4),
(18, 'Scientologie', 5),
(19, 'Raëllisme', 5),
(20, 'Nazisme', 5);

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
  `modified` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`, `active`, `email`) VALUES
(1, 'member', '$2a$10$8vzYEbg1/k1FsfzrH6926ukBpUhycnSLGqEPWrZHdECmY9TRbS9Ty', 'member', '2015-09-25', '2015-11-12', 0, 'gaelletourneur2@hotmail.com'),
(2, 'admin', '$2a$10$RX1opzoTJWt7tXoxu3Yo4OlhwMQtrXszNTiaqMxS7sIsB/BihYKHm', 'admin', '2015-09-25', '2015-10-01', 1, ''),
(16, 'Gael', '$2a$10$V3P.uln0S/bHwdWakLleqec752p1NsQdq/grdTWfRmlBZB89RTCui', 'member', '2015-11-12', '2015-11-12', 0, 'gaelletourneur2@hotmail.com');

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
-- Index pour la table `countries`
--
ALTER TABLE `countries`
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
-- Index pour la table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subreligions`
--
ALTER TABLE `subreligions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `churches_missionaries`
--
ALTER TABLE `churches_missionaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT pour la table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `missionaries`
--
ALTER TABLE `missionaries`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `subreligions`
--
ALTER TABLE `subreligions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
