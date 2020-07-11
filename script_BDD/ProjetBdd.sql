-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 11 juil. 2020 à 11:44
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_final`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(255) NOT NULL,
  `sport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `sport`) VALUES
(7, 'Sport Collectif'),
(8, 'Sport Individuel');

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE `histoire` (
  `id` int(255) NOT NULL,
  `id_utilisateur` int(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `histoire`
--

INSERT INTO `histoire` (`id`, `id_utilisateur`, `titre`, `date_creation`) VALUES
(25, 1, 'La campagne', '2020-07-09'),
(26, 2, 'La montagne', '2020-07-10'),
(28, 2, 'OUI MONSIEUR2', '2020-07-10'),
(29, 2, 'OUI MONSIEUR3', '2020-07-10'),
(30, 1, 'Aled', '2020-07-11');

-- --------------------------------------------------------

--
-- Structure de la table `histoire_categorie`
--

CREATE TABLE `histoire_categorie` (
  `id_histoire` int(255) NOT NULL,
  `id_categorie` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `histoire_categorie`
--

INSERT INTO `histoire_categorie` (`id_histoire`, `id_categorie`) VALUES
(25, 7),
(26, 8),
(28, 8),
(29, 7),
(30, 7);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(255) NOT NULL,
  `note` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `note`) VALUES
(1, 0),
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `paragraphe`
--

CREATE TABLE `paragraphe` (
  `id` int(255) NOT NULL,
  `id_histoire` int(255) NOT NULL,
  `emplacement` varchar(255) NOT NULL,
  `texte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paragraphe`
--

INSERT INTO `paragraphe` (`id`, `id_histoire`, `emplacement`, `texte`) VALUES
(5, 25, '1', 'paragraphe1'),
(6, 25, '2', 'paragraphe2'),
(7, 25, '2', 'paragraphe3'),
(8, 26, '1', 'sdfsdfsdfsdf'),
(9, 28, '1', 'sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdf'),
(10, 29, '1', 'sdsdfsdfsdfsd sdfsdfsdfsdfsdf sdsdfsdfsdfsd sdfsdfsdfsdfsdf sdsdfsdfsdfsd sdfsdfsdfsdfsdf sdsdfsdfsdfsd sdfsdfsdfsdfsdf sdsdfsdfsdfsd sdfsdfsdfsdfsdf sdsdfsdfsdfsd sdfsdfsdfsdfsdf sdsdfsdfsdfsd sdfsdfsdfsdfsdf sdsdfsdfsdfsd sdfsdfsdfsdfsdf sdsdfsdfsdfsd sdfsdfsdfsdfsdf sdsdfsdfsdfsd sdfsdfsdfsdfsdf '),
(11, 30, '1', 'Aled');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id` int(255) NOT NULL,
  `id_histoire` int(255) NOT NULL,
  `emplacement` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `id_histoire`, `emplacement`, `source`) VALUES
(14, 25, '1', 'assets/imghistoire/1.png'),
(15, 25, '2', 'assets/imghistoire/2.png'),
(16, 25, '2', 'assets/imghistoire/3.png'),
(17, 26, '1', 'assets/imghistoire/chef.png'),
(19, 28, '1', 'assets/imghistoire/php-leader1.png'),
(20, 29, '1', 'assets/imghistoire/net-MVC.png'),
(21, 30, '1', 'assets/imghistoire/d9006.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `mail`, `pseudo`, `mdp`) VALUES
(1, 'oui@oui.fr', 'Papi', '$2y$10$uEGYGj63WnPLR76x6vF0veuRx5aLvUEi0aEUZIH.Wc2jFpj6sXwdW'),
(2, 'non@non.fr', '0Papi', '$2y$10$eoiD6QdB2bmsbeJFtt3u1udytt2a1sbuc.s3X.hQInKICsg7PrVUy');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_histoire_note`
--

CREATE TABLE `utilisateur_histoire_note` (
  `id_histoire` int(255) NOT NULL,
  `id_utilisateur` int(255) NOT NULL,
  `id_note` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histoire` (`id_utilisateur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `histoire_categorie`
--
ALTER TABLE `histoire_categorie`
  ADD KEY `id_histoire` (`id_histoire`,`id_categorie`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paragraphe`
--
ALTER TABLE `paragraphe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_histoire` (`id_histoire`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_histoire` (`id_histoire`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur_histoire_note`
--
ALTER TABLE `utilisateur_histoire_note`
  ADD KEY `id_histoire` (`id_histoire`,`id_utilisateur`,`id_note`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_note` (`id_note`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `paragraphe`
--
ALTER TABLE `paragraphe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD CONSTRAINT `histoire_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `histoire_categorie`
--
ALTER TABLE `histoire_categorie`
  ADD CONSTRAINT `histoire_categorie_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `histoire_categorie_ibfk_2` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paragraphe`
--
ALTER TABLE `paragraphe`
  ADD CONSTRAINT `paragraphe_ibfk_1` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `utilisateur_histoire_note`
--
ALTER TABLE `utilisateur_histoire_note`
  ADD CONSTRAINT `utilisateur_histoire_note_ibfk_1` FOREIGN KEY (`id_histoire`) REFERENCES `histoire` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `utilisateur_histoire_note_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `utilisateur_histoire_note_ibfk_3` FOREIGN KEY (`id_note`) REFERENCES `note` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;