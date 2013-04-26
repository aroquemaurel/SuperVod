-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 23 Avril 2013 à 22:41
-- Version du serveur: 5.1.66-0+squeeze1
-- Version de PHP: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `superVod`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `cc` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `daten` date DEFAULT NULL,
  `pays` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`cc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`cc`, `nom`, `prenom`, `daten`, `pays`) VALUES
(1, 'Aztakes', 'Helene', '1990-10-01', 'France'),
(2, 'Assein', 'Marc', '1989-09-04', 'Angleterre'),
(3, 'Teste', 'Olivier', '1975-10-03', 'France'),
(4, 'Sauvagnat', 'Karen', '1978-04-09', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `episodes`
--

CREATE TABLE IF NOT EXISTS `episodes` (
  `ce` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  `cs` tinyint(4) DEFAULT NULL,
  `numero` decimal(2,0) DEFAULT NULL,
  `annee` decimal(4,0) DEFAULT NULL,
  `saison` decimal(2,0) DEFAULT NULL,
  `realisateur` varchar(20) DEFAULT NULL,
  `de` decimal(6,0) DEFAULT NULL,
  `lim` decimal(2,0) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ce`),
  KEY `fk_episodes_series` (`cs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Contenu de la table `episodes`
--

INSERT INTO `episodes` (`ce`, `titre`, `cs`, `numero`, `annee`, `saison`, `realisateur`, `de`, `lim`, `image`) VALUES
(1, 'Noel mortel', 1, '1', '1990', '1', 'David Silverman', '1500', '0', 'images/image1.jpg'),
(2, 'Bart le genie', 1, '2', '1990', '1', 'David Silverman', '1500', '0', 'images/image2.jpg'),
(3, 'Un atome de bon sens', 1, '3', '1990', '1', 'David Silverman', '1500', '0', 'images/image3.jpg'),
(4, 'Aide toi le ciel t aidera', 1, '1', '1991', '2', 'David Silverman', '1500', '0', 'images/image4.jpg'),
(5, 'Simpson et Delila', 1, '2', '1991', '2', 'David Silverman', '1500', '0', 'images/image5.jpg'),
(6, 'Mon pote Michael Jackson', 1, '1', '1992', '3', 'David Silverman', '1500', '0', 'images/image6.jpg'),
(7, 'Phyllis Reaches Out to Sharon', 2, '99', '2010', '37', 'Jack Smith', '2700', '0', 'images/image7.jpg'),
(8, 'Victor Confesses to Nikki', 2, '99', '2010', '37', 'Jack Smith', '2700', '0', 'images/image8.jpg'),
(9, 'Collleen s celebration of life', 2, '99', '2010', '37', 'Jack Smith', '2700', '0', 'images/image9.jpg'),
(10, 'Sharon and Nick Say Good-bye to Faith', 2, '99', '2010', '37', 'Jack Smith', '2700', '0', 'images/image10.jpg'),
(11, 'Jack Helps Sharon Move on With Her Life ', 2, '99', '2010', '37', 'Jack Smith', '2700', '0', 'images/image11.jpg'),
(12, 'Gloria Learns She Has Been Conned ', 2, '99', '2010', '37', 'Jack Smith', '2700', '0', 'images/image12.jpg'),
(13, 'Ironie du sort', 3, '1', '2004', '1', 'Charles McDougall', '2400', '10', 'images/image13.jpg'),
(14, 'Premier round', 3, '2', '2004', '1', 'Larry Shaw', '2400', '10', 'images/image14.jpg'),
(15, 'Le retour de la mamie', 3, '1', '2005', '2', 'Larry Shaw', '2400', '10', 'images/image15.jpg'),
(16, 'Donne l oseille et tire-toi', 3, '2', '2005', '2', 'David Grossman', '2400', '10', 'images/image16.jpg'),
(17, 'Deux en un', 4, '1', '2006', '1', 'James Manos Jr', '2800', '12', 'images/image17.jpg'),
(18, 'les larmes du crocodile', 4, '2', '2006', '1', 'James Manos Jr', '2800', '12', 'images/image18.jpg'),
(19, 'La toute premiere fois', 4, '3', '2006', '1', 'James Manos Jr', '2800', '12', 'images/image19.jpg'),
(20, 'L ombre d un doute', 4, '1', '2007', '2', 'James Manos Jr', '2800', '12', 'images/image20.jpg'),
(21, 'Ete sanglant', 4, '2', '2007', '2', 'James Manos Jr', '2800', '10', NULL),
(47, 'Un nouveau dÃ©part', 28, '1', '1999', '1', 'Dieu', '1500', '0', ''),
(48, 'Aux urgences', 28, '2', '1999', '1', '', '0', '0', 'images/04f0c.jpg'),
(49, 'An Unearthly Child', 10, '1', '1963', '1', 'Waris Hussein', '0', '0', ''),
(50, 'truc', 30, '42', '2012', '1', '', '0', '0', ''),
(51, 'sdf', 29, '4', '2013', '1', '', '0', '0', ''),
(52, 'szqer', 29, '23', '2013', '1', '', '0', '0', ''),
(53, 'sdf', 30, '1', '2013', '3', '', '0', '0', ''),
(54, '321', 31, '2', '2013', '3', '', '0', '0', ''),
(55, 'chouette', 31, '42', '2013', '3', '', '0', '0', 'images/de852.png');

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

CREATE TABLE IF NOT EXISTS `fichiers` (
  `cf` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ce` tinyint(4) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `prix` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`cf`),
  KEY `fk_fichiers_episodes` (`ce`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `fichiers`
--

INSERT INTO `fichiers` (`cf`, `ce`, `type`, `prix`) VALUES
(2, 1, 'L', '0.99'),
(3, 1, 'A', '2.99'),
(4, 2, 'S', '0.50'),
(5, 2, 'L', '0.99'),
(6, 2, 'A', '2.99'),
(7, 3, 'S', '0.50'),
(8, 3, 'L', '0.99'),
(9, 3, 'A', '2.99'),
(10, 4, 'S', '0.50'),
(11, 4, 'L', '0.99'),
(12, 4, 'A', '2.99'),
(13, 5, 'S', '0.50'),
(14, 5, 'L', '0.99'),
(15, 5, 'A', '2.99'),
(16, 6, 'S', '0.50'),
(17, 6, 'L', '0.99'),
(18, 6, 'A', '2.99'),
(20, 12, 'L', '1.20'),
(22, 11, 'L', '1.20'),
(24, 10, 'L', '1.20'),
(25, 9, 'L', '1.20'),
(26, 8, 'L', '1.20'),
(27, 7, 'L', '1.20'),
(29, 13, 'L', '1.50'),
(30, 13, 'A', '4.00'),
(31, 14, 'L', '1.50'),
(32, 14, 'A', '4.00'),
(33, 15, 'L', '1.50'),
(34, 15, 'A', '4.00'),
(35, 16, 'L', '1.50'),
(36, 16, 'A', '4.00'),
(38, 17, 'L', '2.00'),
(39, 17, 'A', '4.00'),
(40, 18, 'L', '2.00'),
(41, 18, 'A', '4.00'),
(42, 19, 'L', '2.00'),
(43, 49, 'L', '1.50'),
(44, 49, 'S', '0.90'),
(45, 50, 'L', '12.00');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE IF NOT EXISTS `series` (
  `cs` tinyint(4) NOT NULL AUTO_INCREMENT,
  `noms` varchar(20) DEFAULT NULL,
  `types` char(1) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `series`
--

INSERT INTO `series` (`cs`, `noms`, `types`, `image`) VALUES
(1, 'Les Simpson', 'A', 'images/serie1.jpg'),
(2, 'Les feux de l amour', 'F', 'images/serie2.jpg'),
(3, 'Desesperate Housewiv', 'F', 'images/serie3.jpg'),
(4, 'Dexter', 'P', 'images/serie4.jpg'),
(10, 'Doctor Who', 'F', ''),
(28, 'PokÃ©mon', 'A', 'images/3a567.jpg'),
(29, 'tgest', 'P', 'images/f5fe4.png'),
(30, 'tgest', 'P', 'images/57581.png'),
(31, 'machin', 'F', 'images/7160f.png');

-- --------------------------------------------------------

--
-- Structure de la table `telecharger`
--

CREATE TABLE IF NOT EXISTS `telecharger` (
  `cc` tinyint(4) NOT NULL DEFAULT '0',
  `cf` tinyint(4) NOT NULL DEFAULT '0',
  `datet` date NOT NULL DEFAULT '0000-00-00',
  `dtel` decimal(7,0) DEFAULT NULL,
  PRIMARY KEY (`cc`,`cf`,`datet`),
  KEY `fk_telecharger_fichiers` (`cf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `telecharger`
--

INSERT INTO `telecharger` (`cc`, `cf`, `datet`, `dtel`) VALUES
(1, 2, '2010-02-17', '173'),
(1, 5, '2010-02-18', '232'),
(2, 32, '2010-03-10', '653'),
(2, 42, '2010-02-19', '406'),
(3, 27, '2010-03-16', '256');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `fk_episodes_series` FOREIGN KEY (`cs`) REFERENCES `series` (`cs`);

--
-- Contraintes pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD CONSTRAINT `fk_fichiers_episodes` FOREIGN KEY (`ce`) REFERENCES `episodes` (`ce`);

--
-- Contraintes pour la table `telecharger`
--
ALTER TABLE `telecharger`
  ADD CONSTRAINT `fk_telecharger_clients` FOREIGN KEY (`cc`) REFERENCES `clients` (`cc`),
  ADD CONSTRAINT `fk_telecharger_fichiers` FOREIGN KEY (`cf`) REFERENCES `fichiers` (`cf`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
