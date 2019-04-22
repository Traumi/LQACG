-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 19 avr. 2019 à 17:04
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lolquests`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `LOGIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `LOL_ACCOUNT` varchar(100) DEFAULT NULL,
  `PROFIL` int(11) NOT NULL DEFAULT '0',
  `INSCRIPTION` date NOT NULL,
  `TPC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`LOGIN`, `PASSWORD`, `LOL_ACCOUNT`, `PROFIL`, `INSCRIPTION`, `TPC`) VALUES
('Test', '$2y$12$WmZW/G1800BtIcqcqJKr4eFlDYHYCEGUDwxPdTEoOUyzb.eOB3A4y', NULL, 0, '2019-04-08', '532ea-eb95bb342d3ee3d0'),
('Traumination', '$2y$12$w1ojIQOUwqXmtO6RQJM0ouSdP6iaEaKkaeee3PQNvPKL0XDOE.VoO', 'Traumination', 4, '2019-04-03', 'd4551-3f20833efb38c70a'),
('VCTNitro', '$2y$12$XCgAMpx.cWwl.y6xuXY0sOl.ZgOHzo6b/GNsQwuImlvB1Xr/ZWD4O', 'VCTNïtro', 0, '2019-04-12', '32af6-ec6058c2a2e664e3');

-- --------------------------------------------------------

--
-- Structure de la table `lol_profile`
--

CREATE TABLE `lol_profile` (
  `PSEUDO` varchar(100) NOT NULL,
  `LAST_UPDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `GAMES` int(11) NOT NULL,
  `WIN` int(11) NOT NULL,
  `PENTA` int(11) NOT NULL,
  `FARM` int(11) NOT NULL,
  `QUADRA` int(11) NOT NULL,
  `TRIPLE_KILL` int(11) NOT NULL,
  `DOUBLE_KILL` int(11) NOT NULL,
  `SIMPLE_KILL` int(11) NOT NULL,
  `DEATH` int(11) NOT NULL,
  `ASSIST` int(11) NOT NULL,
  `TOWER` int(11) NOT NULL,
  `INHIB` int(11) NOT NULL,
  `TANK` int(11) NOT NULL,
  `SUPPORT` int(11) NOT NULL,
  `MARKSMAN` int(11) NOT NULL,
  `MAGE` int(11) NOT NULL,
  `FIGHTER` int(11) NOT NULL,
  `ASSASSIN` int(11) NOT NULL,
  `T_RiftHerald` int(11) NOT NULL,
  `T_Drake` int(11) NOT NULL,
  `T_Baron` int(11) NOT NULL,
  `T_Vilemaw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lol_profile`
--

INSERT INTO `lol_profile` (`PSEUDO`, `LAST_UPDATE`, `GAMES`, `WIN`, `PENTA`, `FARM`, `QUADRA`, `TRIPLE_KILL`, `DOUBLE_KILL`, `SIMPLE_KILL`, `DEATH`, `ASSIST`, `TOWER`, `INHIB`, `TANK`, `SUPPORT`, `MARKSMAN`, `MAGE`, `FIGHTER`, `ASSASSIN`, `T_RiftHerald`, `T_Drake`, `T_Baron`, `T_Vilemaw`) VALUES
('Traumination', '2019-04-19 12:07:04', 499, 269, 0, 47944, 2, 26, 217, 2577, 2553, 5072, 391, 74, 256, 123, 70, 216, 257, 34, 93, 507, 153, 0),
('VCTNïtro', '2019-04-12 21:05:44', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `quests`
--

CREATE TABLE `quests` (
  `ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(1000) NOT NULL,
  `XP` int(11) NOT NULL,
  `EXPIRE` date DEFAULT NULL,
  `VALIDATED` tinyint(1) NOT NULL DEFAULT '0',
  `HIDDEN` tinyint(1) NOT NULL DEFAULT '0',
  `COND` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quests`
--

INSERT INTO `quests` (`ID`, `DESCRIPTION`, `XP`, `EXPIRE`, `VALIDATED`, `HIDDEN`, `COND`) VALUES
(1, 'Avoir plus de 100 de farm à une partie', 5, NULL, 1, 1, ''),
(2, 'Faire un Pentakill', 100, NULL, 1, 1, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`LOGIN`),
  ADD UNIQUE KEY `LOL_ACCOUNT` (`LOL_ACCOUNT`);

--
-- Index pour la table `lol_profile`
--
ALTER TABLE `lol_profile`
  ADD PRIMARY KEY (`PSEUDO`);

--
-- Index pour la table `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `quests`
--
ALTER TABLE `quests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
