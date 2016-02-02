-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 02 Février 2016 à 02:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pintegrateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE IF NOT EXISTS `entreprises` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
  `address` varchar(52) NOT NULL COMMENT 'addresse de l''entreprises',
  `city` varchar(32) NOT NULL COMMENT 'ville',
  `tel` varchar(25) NOT NULL COMMENT 'téléphone et extension',
  `email` varchar(52) NOT NULL COMMENT 'addresse courriel',
  `account` int(11) NOT NULL COMMENT 'compte donnée',
  `status` tinyint(1) NOT NULL COMMENT '0= en attente 1= approuvée',
  PRIMARY KEY (`ID`),
  KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='entreprises' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `names`
--

CREATE TABLE IF NOT EXISTS `names` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
  `name` varchar(64) NOT NULL COMMENT 'nom de l''utilisateur',
  `userID` int(11) NOT NULL COMMENT 'id de l''utilisateur',
  PRIMARY KEY (`ID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='nom des utilisateurs' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
  `title` varchar(64) NOT NULL COMMENT 'titre',
  `supName` varchar(64) NOT NULL COMMENT 'Nom du superviseur',
  `supTitle` varchar(32) NOT NULL COMMENT 'titre du superviseur',
  `supEmail` varchar(52) NOT NULL COMMENT 'email du superviseur',
  `supTel` varchar(25) NOT NULL COMMENT 'téléphone du superviseur',
  `desc` varchar(512) NOT NULL COMMENT 'description',
  `equip` varchar(512) NOT NULL COMMENT 'equipement',
  `extra` varchar(512) NOT NULL COMMENT 'exigence ',
  `info` varchar(512) NOT NULL COMMENT 'info supplémentaire',
  `status` tinyint(1) NOT NULL COMMENT '0=en attente 1= approuvée',
  `internID` int(11) NOT NULL COMMENT 'stagiaire affecté au projet',
  `entID` int(11) NOT NULL COMMENT 'entreprise du projet',
  PRIMARY KEY (`ID`),
  KEY `internID` (`internID`),
  KEY `entID` (`entID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='projet de stage' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
  `score` int(11) NOT NULL COMMENT 'note d''appréciation',
  `internID` int(11) NOT NULL COMMENT 'clé étrangère du stagiaire',
  `projectID` int(11) NOT NULL COMMENT 'clé étrangère vers le projet',
  PRIMARY KEY (`ID`),
  KEY `internID` (`internID`),
  KEY `projectID` (`projectID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='appréciation des projets' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
  `user` varchar(24) NOT NULL COMMENT 'nom d''utilisateur',
  `pw` varchar(24) NOT NULL COMMENT 'mot de passe ',
  `token` varchar(32) DEFAULT NULL COMMENT 'numéro d''authentification',
  `rank` int(11) NOT NULL COMMENT '0=coordonateur,1=entreprise,2= stagiaire',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='utilisateurs' AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD CONSTRAINT `fk_account` FOREIGN KEY (`account`) REFERENCES `users` (`ID`);

--
-- Contraintes pour la table `names`
--
ALTER TABLE `names`
  ADD CONSTRAINT `fk_NUserID` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Contraintes pour la table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_PInternID` FOREIGN KEY (`internID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `fk_entID` FOREIGN KEY (`entID`) REFERENCES `entreprises` (`ID`);

--
-- Contraintes pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_RInternID` FOREIGN KEY (`internID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `fk_projectID` FOREIGN KEY (`projectID`) REFERENCES `projects` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
