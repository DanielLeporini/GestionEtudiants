-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 25 Février 2016 à 00:44
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestion_etudiants`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `etud_id` int(11) NOT NULL AUTO_INCREMENT,
  `etud_prenom` varchar(50) NOT NULL,
  `etud_nom` varchar(50) NOT NULL,
  PRIMARY KEY (`etud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`etud_id`, `etud_prenom`, `etud_nom`) VALUES
(1, 'Albert', 'Einstein'),
(2, 'Werner', 'Heisenberg'),
(3, 'Erwin', 'Schrodinger');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `matiere_id` int(11) NOT NULL AUTO_INCREMENT,
  `matiere_nom` varchar(50) NOT NULL,
  PRIMARY KEY (`matiere_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`matiere_id`, `matiere_nom`) VALUES
(1, 'Chimie'),
(2, 'Maths'),
(3, 'Physique');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `note_idetudiant` int(11) NOT NULL,
  `note_idmatiere` int(11) NOT NULL,
  `note_note` float NOT NULL,
  `note_coef` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`note_idetudiant`, `note_idmatiere`, `note_note`, `note_coef`) VALUES
(1, 1, 15, 2),
(1, 3, 18, 1),
(2, 2, 13, 2),
(3, 1, 14, 2),
(3, 1, 12, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
