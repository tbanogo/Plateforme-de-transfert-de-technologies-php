-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 28 jan. 2022 à 11:00
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetesi2021`
--

-- --------------------------------------------------------

--
-- Structure de la table `identifiants`
--

CREATE TABLE `identifiants` (
  `id_membre` int(3) NOT NULL,
  `identifiant` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `identifiants`
--

INSERT INTO `identifiants` (`id_membre`, `identifiant`) VALUES
(5, 'N01234'),
(3, 'N12345'),
(4, 'N12354'),
(6, 'N12435');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `identifiant` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `identifiant`, `pseudo`, `nom`, `prenom`, `mdp`, `email`) VALUES
(13, 'N01234', 'BSerge', 'Banogo', 'Serge', 'bserge', 'bothebng@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `technologie`
--

CREATE TABLE `technologie` (
  `id_techn` int(3) NOT NULL,
  `designation` varchar(1000) NOT NULL,
  `auteurs` varchar(1000) NOT NULL,
  `cultures` varchar(1000) NOT NULL,
  `documents` varchar(1000) NOT NULL,
  `villes` varchar(250) NOT NULL,
  `date_enre` varchar(50) NOT NULL,
  `date_publication` varchar(30) NOT NULL,
  `publicateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `identifiants`
--
ALTER TABLE `identifiants`
  ADD PRIMARY KEY (`id_membre`),
  ADD UNIQUE KEY `identifiant` (`identifiant`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `technologie`
--
ALTER TABLE `technologie`
  ADD PRIMARY KEY (`id_techn`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `identifiants`
--
ALTER TABLE `identifiants`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `technologie`
--
ALTER TABLE `technologie`
  MODIFY `id_techn` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
