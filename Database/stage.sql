-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 nov. 2023 à 14:52
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stage`
--

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

CREATE TABLE `archive` (
  `Matricule` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenoms` varchar(50) NOT NULL,
  `Naissance` varchar(50) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Poste` varchar(50) NOT NULL,
  `Demission` varchar(50) NOT NULL,
  `Motif` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conger`
--

CREATE TABLE `conger` (
  `Matricule` varchar(10) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenoms` varchar(50) NOT NULL,
  `Motif` varchar(20) NOT NULL,
  `Prise` int(11) NOT NULL,
  `Restant` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `conger`
--

INSERT INTO `conger` (`Matricule`, `Nom`, `Prenoms`, `Motif`, `Prise`, `Restant`) VALUES
('1', 'NOMENJANAHARY', 'Henri Canisius', 'vide', 0, 60),
('2', 'MAMIZARA', 'Henri Canisius', 'vide', 0, 60);

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`Email`, `Password`) VALUES
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `Num_contrat` int(11) NOT NULL,
  `Matricule` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenoms` varchar(50) NOT NULL,
  `CNI` varchar(12) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Salaire` int(11) NOT NULL,
  `Debut` date NOT NULL,
  `Fin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`Num_contrat`, `Matricule`, `Nom`, `Prenoms`, `CNI`, `Type`, `Salaire`, `Debut`, `Fin`) VALUES
(1, 1, 'NOMENJANAHARY', 'Henri Canisius', '117331112558', 'CDD', 2000000, '2023-11-19', '2025-12-19'),
(3, 2, 'MAMIZARA', 'Henri Canisius', '301541257964', 'CDD', 1000, '2023-11-20', '2023-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

CREATE TABLE `employer` (
  `Matricule` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenoms` varchar(50) NOT NULL,
  `Naissance` date NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `cni` varchar(12) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `Poste` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `employer`
--

INSERT INTO `employer` (`Matricule`, `Nom`, `Prenoms`, `Naissance`, `lieu`, `cni`, `Telephone`, `Poste`) VALUES
(1, 'NOMENJANAHARY', 'Dieudonné Fils', '2003-04-24', 'Fianarantsoa', '117331112558', '0348095034', 'Stagiaire'),
(2, 'MAMIZARA', 'Henri Canisius', '2003-12-12', 'Mananjary', '301541257964', '0345878596', 'Stagiaire'),
(3, 'MALALATIANA', 'Alicia', '2001-07-11', 'Antananarivo', '117542587445', '0345879658', 'Stagiaire'),
(4, 'rakotonirina', 'Marie Daniela', '2000-02-28', 'Antananarivo', '117842587695', '0348759620', 'Stagiaire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`Matricule`);

--
-- Index pour la table `conger`
--
ALTER TABLE `conger`
  ADD PRIMARY KEY (`Matricule`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`Email`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`Num_contrat`),
  ADD UNIQUE KEY `Matricule` (`Matricule`);

--
-- Index pour la table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`Matricule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `Num_contrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `employer`
--
ALTER TABLE `employer`
  MODIFY `Matricule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
