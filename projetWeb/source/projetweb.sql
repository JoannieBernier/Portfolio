-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 déc. 2020 à 13:58
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `newletters`
--

CREATE TABLE `newletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `type` varchar(155) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `titre`, `type`, `description`, `image`, `audio`) VALUES
(30, 'Aime moi comme tu french', 'Bande Sonore', 'Gabriel Forion compose la musique du film « Aime-moi comme tu french » d’Andrée Forcée. Il puise ses inspirations dans les courants musicaux des années 1980 tout en y ajoutant une touche plus moderne. Cette exquise combinaison bien dosée, ajoute au coté tant humoristique que dramatique du film, tout en y ajoutant nostalgie.', 'source/Images/AimeFrench.png', 'source/Trames/MadamRazzal.mp3'),
(31, 'Madam Razal', 'Bande sonore', 'Gabriel Forion signe notamment la musique de « Madam Razzal » (mettant en vedette ABDUL GALEF), film de RÉJEAN GRANEAU nominé pour un Oscar dans la catégorie Best Foreign Language Film, pour lequel il remporte au Québec le Jutra Meilleure musique originale en 2012. On qualifie l’œuvre d’essentielle et capitale au succès du film.', 'source/Images/MadamRazzal.png', 'source/Trames/MadamRazzal.mp3'),
(33, 'La vie d’Alex Joset ', 'Bande sonore', 'Gabriel Forion réalise une bande originale de film ici pour un documentaire. On y retrouve plusieurs compositions épiques qui mettent de l’avant le côté extraordinaire du documentaire. Bien sûr, on notera les ambiances aussi planantes et quelques peu dépressive lors des scènes catastrophes.', 'source/Images/AlexJoset.png', 'source/Trames/documentaire-AlexJoset.mp3'),
(34, 'Sic Sic Sic', 'Bande sonore', 'Gabriel Forion fait équipe avec son vieux partenaire Daniel Laitue pour réaliser la musique du court métrage « Sic Sic Sic ». Une comédie sur l’attachement parental face au bagage génétique et autres projection personnelles de ceux-ci. Le court métrage a remporté le premier prix au festival du court métrage de Toronto.', 'source/Images/SicSicSic.png', 'source/Trames/SicSicSic.mp3');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'julien', '81dc9bdb52d04dc20036dbd8313ed055', 'djulien@gmail.com'),
(9, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newletters`
--
ALTER TABLE `newletters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `newletters`
--
ALTER TABLE `newletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
