-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 11 nov. 2024 à 14:30
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scolarite`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `IdClasse` int(10) NOT NULL,
  `NomClasse` varchar(60) NOT NULL,
  `Faculte` varchar(30) NOT NULL,
  `Capacite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`IdClasse`, `NomClasse`, `Faculte`, `Capacite`) VALUES
(12, 'INFO', 'QSD', 32);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(30) NOT NULL,
  `nom_cours` varchar(150) NOT NULL,
  `desc_cours` text NOT NULL,
  `id_prof` varchar(30) NOT NULL,
  `IdClasse` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `matricule` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `tel` int(8) NOT NULL,
  `ddn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`matricule`, `nom`, `prenom`, `sexe`, `tel`, `ddn`) VALUES
('12345', 'mdkds', 'jfkdk', 'H', 2345678, '2024-10-30');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--
CREATE TABLE IF NOT EXISTS user (
    idp INT PRIMARY KEY AUTO_INCREMENT,
    compte VARCHAR(20) UNIQUE NOT NULL,
    nomPrenom VARCHAR(20) NOT NULL,
    email VARCHAR(25) UNIQUE NOT NULL,
    motpasse VARCHAR(25) NOT NULL
);

insert into user VALUES(1,"Draken","Moussa Djibrillou Omar",'rmoussa098@gmail.com','Omar098');
CREATE TABLE `professeur` (
  `id_prof` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` int(8) NOT NULL,
  `faculte` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`IdClasse`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `IdClasse` (`IdClasse`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id_prof`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `IdClasse` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
