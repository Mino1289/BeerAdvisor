-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 oct. 2022 à 18:03
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `beeradvisor`
--

-- --------------------------------------------------------

--
-- Structure de la table `beer`
--

CREATE TABLE `beer` (
  `ID_beer` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `ID_color` int(11) DEFAULT NULL,
  `strength` decimal(3,2) DEFAULT NULL,
  `ID_taste` int(11) DEFAULT NULL,
  `brewery` varchar(50) DEFAULT NULL,
  `ID_category` int(11) DEFAULT NULL,
  `ID_hops` int(11) DEFAULT NULL,
  `ID_grains` int(11) DEFAULT NULL,
  `IBU` decimal(6,2) DEFAULT NULL,
  `clarity` decimal(3,1) DEFAULT NULL,
  `calories` decimal (4, 1) DEFAULT NULL,
  `carbohydrates` decimal (4, 1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `beer`
--

INSERT INTO `beer` (`ID_beer`, `name`, `location`, `ID_color`, `strength`, `ID_taste`, `brewery`, `ID_category`) VALUES
(1, '1664 Kronenbourg', 'Strasbourg, France', 3, '6.00', 2, 'Kronenbourg', 2),
(2, 'Grimbergen', 'Waarlos, Belgium', 2, '6.40', 2, 'Maes', 3),
(3, '3 monts', 'St Sylvestre Cappel, France', 3, '4.80', 2, 'St Sylvestre', 8),
(64, 'Adelscott', 'Schiltigheim, France', 4, '6.60', 1, 'Fisher', 8);

-- --------------------------------------------------------

--
-- Structure de la table `beer_user`
--

CREATE TABLE `beer_user` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_beer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `ID_category` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`ID_category`, `category_name`) VALUES
(1, 'unknown'),
(2, 'lager'),
(3, 'ale'),
(4, 'lambic'),
(5, 'stout'),
(6, 'pilsner'),
(7, 'abbay'),
(8, 'special'),
(9, 'cellar');

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `ID_color` int(11) NOT NULL,
  `color_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`ID_color`, `color_name`) VALUES
(1, 'unknown'),
(2, 'white'),
(3, 'blonde'),
(4, 'amber'),
(5, 'brown'),
(6, 'black');

-- --------------------------------------------------------

--
-- Structure de la table `hops`
--

CREATE TABLE `hops` (
  `ID_hops` int(11) NOT NULL,
  `hops_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `hops`
--

INSERT INTO `hops` (`ID_hops`, `hops_name`) VALUES
(1, 'unknown'),
(2, 'chinook'),
(3, 'citra');

-- --------------------------------------------------------

--
-- Structure de la table `grains`
--

CREATE TABLE `grains` (
  `ID_grains` int(11) NOT NULL,
  `grains_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `grains`
--

INSERT INTO `grains` (`ID_grains`, `grains_name`) VALUES
(1, 'unknown'),
(2, 'malted barley'),
(3, 'though wheat'),
(4, 'corn'),
(5, 'rice');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `ID_comment` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_beer` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `grade` decimal(2,1) NOT NULL,
  `date_publication` date NOT NULL DEFAULT current_timestamp(),
  `date_drinking` date NOT NULL,
  `picture` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

CREATE TABLE `follow` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_followed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rank`
--

CREATE TABLE `rank` (
  `ID_rank` int(11) NOT NULL,
  `rank_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rank`
--

INSERT INTO `rank` (`ID_rank`, `rank_name`) VALUES
(1, 'novice'),
(2, 'amateur'),
(3, 'intermediate'),
(4, 'expert'),
(5, 'professional');

-- --------------------------------------------------------

--
-- Structure de la table `taste`
--

CREATE TABLE `taste` (
  `ID_taste` int(11) NOT NULL,
  `taste_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `taste`
--

INSERT INTO `taste` (`ID_taste`, `taste_name`) VALUES
(1, 'unknown'),
(2, 'apple'),
(3, 'cherry'),
(4, 'lemon'),
(5, 'grass');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `profile_picture` longblob DEFAULT NULL,
  `password` text NOT NULL,
  `ID_rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `beer`
--
ALTER TABLE `beer`
  ADD PRIMARY KEY (`ID_beer`),
  ADD KEY `ID_category` (`ID_category`),
  ADD KEY `ID_color` (`ID_color`),
  ADD KEY `ID_taste` (`ID_taste`);

--
-- Index pour la table `grains`
--
ALTER TABLE `grains`
  ADD PRIMARY KEY (`ID_grains`);

--
-- Index pour la table `hops`
--
ALTER TABLE `hops`
  ADD PRIMARY KEY (`ID_hops`);

--
-- Index pour la table `beer_user`
--
ALTER TABLE `beer_user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_beer` (`ID_beer`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_category`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`ID_color`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID_comment`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_beer` (`ID_beer`);

--
-- Index pour la table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_followed` (`ID_followed`);

--
-- Index pour la table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`ID_rank`);

--
-- Index pour la table `taste`
--
ALTER TABLE `taste`
  ADD PRIMARY KEY (`ID_taste`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `ID_rank` (`ID_rank`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `beer`
--
ALTER TABLE `beer`
  MODIFY `ID_beer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `beer_user`
--
ALTER TABLE `beer_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `ID_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `ID_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `follow`
--
ALTER TABLE `follow`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `rank`
--
ALTER TABLE `rank`
  MODIFY `ID_rank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `taste`
--
ALTER TABLE `taste`
  MODIFY `ID_taste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `hops`
--
ALTER TABLE `hops`
  MODIFY `ID_hops` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `taste`
--
ALTER TABLE `grains`
  MODIFY `ID_grains` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `beer`
--
ALTER TABLE `beer`
  ADD CONSTRAINT `beer_ibfk_1` FOREIGN KEY (`ID_category`) REFERENCES `category` (`ID_category`),
  ADD CONSTRAINT `beer_ibfk_2` FOREIGN KEY (`ID_color`) REFERENCES `color` (`ID_color`),
  ADD CONSTRAINT `beer_ibfk_3` FOREIGN KEY (`ID_taste`) REFERENCES `taste` (`ID_taste`),
  ADD CONSTRAINT `beer_ibfk_4` FOREIGN KEY (`ID_hops`) REFERENCES `hops` (`ID_hops`),
  ADD CONSTRAINT `beer_ibfk_5` FOREIGN KEY (`ID_grains`) REFERENCES `grains` (`ID_grains`);

--
-- Contraintes pour la table `beer_user`
--
ALTER TABLE `beer_user`
  ADD CONSTRAINT `beer_user_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`),
  ADD CONSTRAINT `beer_user_ibfk_2` FOREIGN KEY (`ID_beer`) REFERENCES `beer` (`ID_beer`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`ID_beer`) REFERENCES `beer` (`ID_beer`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`);

--
-- Contraintes pour la table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`ID_followed`) REFERENCES `user` (`ID_user`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_rank`) REFERENCES `rank` (`ID_rank`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
