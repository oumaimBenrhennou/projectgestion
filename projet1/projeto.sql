-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 avr. 2021 à 00:03
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projeto`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `code`, `filiere`) VALUES
(27, '2ITE2', 20),
(28, '2ITE3', 20),
(29, 'ISIC1', 21),
(32, '2AP1', 24),
(33, '1AP1', 23),
(34, 'GI1', 22),
(36, 'GI3', 22),
(37, '2ITE1', 20),
(38, 'ISIC2', 21),
(40, 'aaa', 21),
(41, 'aaa', 21),
(42, 'aaa', 21),
(43, '', 20);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `cin` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(50) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `departement` int(11) NOT NULL,
  `fonction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`cin`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `password`, `role`, `photo`, `departement`, `fonction`) VALUES
('EE55021', 'Amezzane', 'Youssef', 'yamezzane11@gmail.com', '0687862800', 'Berradi 3', '09f96867a8dc816a021fd861f200abef', 'Admin', 'youssef.jpg', 0, 0),
('EE819349', 'Barhoum', 'Abdellah', 'iambarhoum@gmail.com', '0659778996', 'SYBA', 'ab4f63f9ac65152575886860dde480a1', 'Directeur', '73022302012b2e215e935b1639464707.jpeg', 0, 0),
('M604971', 'benrhennou', 'oumaima', 'oumaima_benrhennou@hotmail.com', '0678468657', 'el jadida', 'ab4f63f9ac65152575886860dde480a1', 'Admin', '1ea72174d8063872c4776e122803f0f4.JPG', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id`, `code`, `libelle`) VALUES
(20, '2ITE', 'Ingénierie Informatique et Technologie Emergente'),
(21, 'ISIC', 'Ingénierie des Systèmes d\'Information et de Commun'),
(22, 'GI', 'Genie Industrielle'),
(23, '1AP', 'Premire Annee Preparatoire'),
(24, '2AP', 'Deuxieme Annee Preparatoire');

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

CREATE TABLE `pointage` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `etat` varchar(50) NOT NULL,
  `employe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `pointageh`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `pointageh` (
`nom` varchar(50)
,`prenom` varchar(50)
,`date` date
,`cin` varchar(50)
,`heure_entrer` time
,`heure_sortie` time
,`heure` int(2)
,`minute` int(2)
);

-- --------------------------------------------------------

--
-- Structure de la vue `pointageh`
--
DROP TABLE IF EXISTS `pointageh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY INVOKER VIEW `pointageh`  AS SELECT `e`.`nom` AS `nom`, `e`.`prenom` AS `prenom`, cast(`p1`.`date` as date) AS `date`, `p1`.`employe` AS `cin`, cast(`p1`.`date` as time) AS `heure_entrer`, cast(`p2`.`date` as time) AS `heure_sortie`, hour(timediff(`p2`.`date`,`p1`.`date`)) AS `heure`, minute(timediff(`p2`.`date`,`p1`.`date`)) AS `minute` FROM ((`pointage` `p1` join `pointage` `p2` on(`p1`.`employe` = `p2`.`employe`)) join `employe` `e` on(`e`.`cin` = `p1`.`employe`)) WHERE cast(`p1`.`date` as date) = cast(`p2`.`date` as date) AND `p1`.`id` < `p2`.`id` GROUP BY cast(`p1`.`date` as date), `p1`.`employe`, `e`.`nom`, `e`.`prenom` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`filiere`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pointage`
--
ALTER TABLE `pointage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employe` (`employe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `pointage`
--
ALTER TABLE `pointage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`filiere`) REFERENCES `filiere` (`id`);

--
-- Contraintes pour la table `pointage`
--
ALTER TABLE `pointage`
  ADD CONSTRAINT `pointage_ibfk_1` FOREIGN KEY (`employe`) REFERENCES `employe` (`cin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
