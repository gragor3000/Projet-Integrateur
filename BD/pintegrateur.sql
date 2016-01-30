-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 30 Janvier 2016 à 20:41
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
  `Name` varchar(56) NOT NULL COMMENT 'nom de l''entreprise',
  `Adress` varchar(128) NOT NULL COMMENT 'Adresse de l''entreprise',
  `Postal` varchar(6) NOT NULL COMMENT 'code postal de l''entreprise',
  `City` varchar(128) NOT NULL COMMENT 'ville de l''entreprise',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table contenant toutes les entreprises ayant au moins eu un projet' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `evals`
--

CREATE TABLE IF NOT EXISTS `evals` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
  `InternID` int(11) NOT NULL COMMENT 'clé étrangère du stagiaire',
  `Path` varchar(256) NOT NULL COMMENT 'chemin d''accès vers le rapport',
  `ProjectID` int(11) NOT NULL COMMENT 'clé étrangère du projet',
  `Date` date NOT NULL COMMENT 'date de la création du projet',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Rapport fait par les superviseurs' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `paths`
--

CREATE TABLE IF NOT EXISTS `paths` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
  `path` varchar(512) NOT NULL COMMENT 'chemin d''accès du fichier',
  `userID` int(11) NOT NULL COMMENT 'clé étrangère vers l''étudiant à qui appartient le fichier',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='contient tous les chemins d''accès des fichiers en lien avec les étudiants' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
  `SubDate` int(11) NOT NULL COMMENT 'date de soumission',
  `ValDate` int(11) NOT NULL COMMENT 'date de validation',
  `Title` varchar(32) NOT NULL COMMENT 'titre du projet',
  `Description` varchar(512) NOT NULL COMMENT 'description du projet',
  `CoordID` int(11) DEFAULT NULL COMMENT 'clé étrangère du coordonateur',
  `InternID` int(11) DEFAULT NULL COMMENT 'clé étrangère du stagiaire',
  `SupID` int(11) DEFAULT NULL COMMENT 'clé étrangère du superviseur',
  `Address` varchar(128) NOT NULL COMMENT 'adresse du projet',
  `Postal` varchar(6) NOT NULL COMMENT 'code postal du projet',
  `entreprisesID` int(11) NOT NULL COMMENT 'clé étrangère qui pointe vers l''entreprises dans laquelle ce passe le projet',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='projet de stage' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
  `Score` int(11) NOT NULL COMMENT 'score mis a un projet',
  `InternID` int(11) NOT NULL COMMENT 'clé étrangère du stagiaire',
  `ProjectID` int(11) NOT NULL COMMENT 'clé étrangère du projet',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='évaluation donnée par le stagiaire sur un projet' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire',
  `FirstName` varchar(32) NOT NULL COMMENT 'Prénom',
  `LastName` varchar(64) NOT NULL COMMENT 'Nom',
  `Password` varchar(32) NOT NULL COMMENT 'Mot de passe',
  `Email` varchar(64) NOT NULL COMMENT 'Courriel',
  `Tel` varchar(10) NOT NULL COMMENT 'numéro de téléphone',
  `Type` int(11) DEFAULT NULL COMMENT '0=stagiaire,1=superviseur,2=Coordonateur ',
  `ValDate` datetime NOT NULL COMMENT 'date de validation',
  `Access` tinyint(1) NOT NULL DEFAULT '0',
  `Token` varchar(32) NOT NULL COMMENT 'Token d''identification de l''utilsateur',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
