-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 02 Novembre 2016 à 16:59
-- Version du serveur :  5.7.12-0ubuntu1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hackathon`
--

-- --------------------------------------------------------

--
-- Structure de la table `Inscrits`
--

CREATE TABLE `Inscrits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `metier` varchar(255) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Inscrits`
--

INSERT INTO `Inscrits` (`id`, `nom`, `prenom`, `email`, `metier`, `message`) VALUES
(1, 'MACCIO', 'Rebecca', 'rebeccamaccio@gmail.com', 'Developpeur web', ''),
(2, 'marcel', 'ronald', 'ronald.marcel.mr@gmail.com', 'Developpeur web', ''),
(13, 'ARRAB', 'Ghaffar', 'arrab.ghaffar@gmail.com', 'Big Data', NULL),
(14, 'St Jalmes', 'Juliette', 'juliette@stjalmes.com', 'Developpeur web', 'sfsdfsdfsdfs'),
(15, 'MOPI', 'Solene', 'mopi.solene@gmail.com', 'Developpeur web', 'sfsdfsdfsdfs'),
(16, 'Jessus', 'Antoine', 'jessusantoine@gourou.com', 'Developpeur web', 'Je suis le dieu du codage et puis c\'est tout!!!!'),
(17, 'BIONIC', 'Oreille', 'oreillebionic@son.fr', 'Developpeur web', 'Pardon, j\'ai pas bien entendu'),
(18, 'Rasho', 'Bernarabdul', 'bernaradbul@fransyrien.com', 'Developpeur web', 'Vive la psychologie!'),
(19, 'Sanceo', 'Thomas', 'judokadeouf@kameamea.com', 'Developpeur web', 'Pas comme la cafetiÃ¨re'),
(20, 'Susset', 'Valentin', 'sussetvalentin@seducteur.com', 'Developpeur web', 'SÃ©ducteur dans lâ€™Ã¢me, adepte de la danse de la sÃ©duction '),
(21, 'CHETOUI', 'Youness', 'younesschetoui@wesh.com', 'Developpeur web', 'Moi c\'est Youn\'s et je suis trop de la balle!!'),
(22, 'GUERNON', 'Patrice', 'patrice.guernon@messac.fr', 'Big Data', 'J\'ADORE COURIR APRÃˆS LES ENFANTS LE WEEK END !!! HEHEHEHEHEHEHEH    8===>(y)'),
(23, 'DUCLOS', 'Erwann', 'thecodeur@profamitemps.com', 'Designer', 'Enseigne le code a des dÃ©biles qui ne savent pas comptÃ© jusquâ€™Ã  10, j\'suis dans la merde, a CAUSE d\'eux j\'ai presque plus de cheveux!!!'),
(24, 'POIRIER', 'Lise', 'poirierlise@gmail.com', 'Designer', 'Et alors!!!!'),
(25, 'NINJA', 'Nabil', 'nabilninja@caillou.com', 'Designer', 'Attention aux cailloux du Pakistanais'),
(26, 'MENAGER', 'Ange', 'angemenager@gmail.com', 'Designer', 'Je suis dÃ©veloppeur par aide mÃ©nagÃ¨re !!!! ATTENTION'),
(27, 'BABAR', 'Celeste', 'celeste.babar@trompe.com', 'Big Data', 'Bah oui Big Data pour un Ã©lÃ©phant Ã§a coule de source ...');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Inscrits`
--
ALTER TABLE `Inscrits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Inscrits`
--
ALTER TABLE `Inscrits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
