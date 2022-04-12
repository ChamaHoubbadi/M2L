-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 avr. 2022 à 14:34
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `id` int(11) NOT NULL,
  `offre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`id`, `offre`, `description`, `date`, `type`) VALUES
(86, 'Hôtesse d\'accueil H/F', ' Type d\'emploi : CDD d\'un an<br />\r\n30h/semaine (possibilité d\'un contrat en 35h/semaine)<br />\r\nBasé à la maison des ligues de lorraine.<br />\r\nEn tant qu’hôtesse d’accueil, vous assurez l’accueil physique et téléphonique de la maison des ligues de lorraine.<br />\r\nA ce titre, vous gérez les flux d’appels entrants et les RDV physiques. Première interface de notre clientèle, vous devez être capable de vous exprimer avec fluidité et d’appréhender le vocabulaire juridique et les habitudes de travail des notaires pour diriger efficacement nos clients.<br />\r\nVous menez en parallèle des tâches notariales de type copie d’actes ou d’attestations, affranchissement du courrier… Vos tâches seront évolutives en fonction de vos capacités d’apprentissage.<br />\r\nL’amplitude horaire prévue est comprise entre 13h30 à 19h30 soit un total de 30 heures hebdomadaire. Possibilité de réaliser 35h hebdomadaire sur l’amplitude 12h30-19h30.<br />\r\nIssu d’une formation de niveau Bac professionnel à BTS, idéalement acquis dans le domaine de l’accueil, vous justifiez d’une première expérience réussie dans les métiers de l’assistanat, de l’accueil ou encore en call center. Vous possédez une excellente présentation, un sens de la courtoisie à toute épreuve et le goût du contact.<br />\r\nRémunération sur 13 mois négociable fonction de votre niveau d’expérience.', '2020-04-18', 'cdi'),
(87, 'Coach sportif H/F', ' Type d\'emploi : CDI<br />\r\n35h/semaine<br />\r\nNous recherchons des animateurs sportifs / spécialiste coaching pour nos différentes ligues (situées un peu partout en Lorraine)<br />\r\nVous souhaitez travailler dans une ambiance jeune et sportive au sein d’une structure nationale. Vous avez une expérience dans la relation clientèle réussie ou vous débutez et avez un goût prononcé pour le commerce. Vous faites preuve d’un fort dynamisme, d’une belle énergie et la notion du service client est quelque chose de primordial pour vous. Vous avez de l’ambition et vous adorez le sport.<br />\r\nVous êtes passionné de sport, au service des clients pour animer, motiver et les accompagner dans leur projet sportif. L’objectif est de les encourager et leur faire aimer la pratique du sport dans une ambiance saine et très positive. La qualité et la justesse des informations données par le coach est primordial pour nos clubs et ses clients.<br />\r\nLe Coach développe également les ventes auprès de la clientèle dans tout le réseau en Lorraine. Il assure les cours collectifs, les cours en small groupes mais aussi l’accueil, le premier contact, conseille, oriente et aide le choix du client. Il assure également le traitement, le suivi des dossiers d’inscription, le paiement et respecte les procédures d’inscription établies.<br />\r\nVous devrez assurer l\'accueil des clients et donnez des informations justes et précises. Vous devrez représenter la M2L et transmettre ses valeurs fondamentales à savoir : le professionnalisme, le savoir faire, la qualité, la convivialité.<br />\r\nDe formation de type BPJEPS / métiers du sport avec une expérience réussie d’au moins 1 an dans un poste similaire. Vous avez un bon sens de l’organisation et une rigueur dans le travail.<br />\r\nRémunération sur 13 mois négociable fonction de votre niveau d’expérience.', '2020-04-30', 'cdd');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(25) NOT NULL,
  `description` char(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `cout` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `description`, `date_debut`, `date_fin`, `cout`) VALUES
(12, 'Apprendre le fair-play\r\n', '2020-03-04', '2024-02-26', 120),
(17, 'Comment ne plus avoir peur de la balle ?', '2020-05-20', '2020-06-12', 400),
(23, 'Comment devenir coach sportif ?	', '2020-04-20', '2020-04-30', 230),
(24, 'Apprendre le fair-play\r\n', '2020-03-04', '2020-05-26', 120),
(25, 'Apprendre le self-control\r\n', '2020-04-04', '2020-05-26', 300),
(26, 'L\'esprit d\'équipe, comment le développer ?	', '2020-04-10', '2020-05-05', 250);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `username`, `mail`, `password`, `isAdmin`) VALUES
(33, 'f2i', 'F2I@gmail.com', '123', 1),
(36, 'Chama', 'wissalchama2@gmail.com', 'Chama', 0);

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `id_formation` int(25) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idr` int(25) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `idsalle` int(25) NOT NULL,
  `temps` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idr`, `date`, `username`, `idsalle`, `temps`) VALUES
(23, '2020-04-08', 'f2i', 2, 'a'),
(26, '2020-04-11', 'anas', 4, 'm');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `num` int(25) NOT NULL,
  `salle` varchar(255) NOT NULL,
  `evenement` varchar(255) NOT NULL,
  `date_ajoute` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `num`, `salle`, `evenement`, `date_ajoute`) VALUES
(1, 1, 'salle lamour', 'football ', '2020-03-28'),
(2, 22, 'salle majorelle', 'basketball', '2020-04-17'),
(3, 3, 'salle corbin', 'volley-ball', '2020-05-28'),
(4, 5, 'salle baccarat', 'rugby', '2020-02-27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD KEY `id` (`id`),
  ADD KEY `id_formation` (`id_formation`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idr`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idr` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`id`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
