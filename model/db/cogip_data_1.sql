-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 sep. 2020 à 13:52
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cogip_data`
--

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `VAT` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `company_type_id` int(11) NOT NULL,
  PRIMARY KEY (`company_id`),
  KEY `company_type_id` (`company_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`company_id`, `name`, `VAT`, `country`, `company_type_id`) VALUES
(1, 'becode', 983156789, 'Belgique', 1),
(2, 'Odoo', 583156489, 'Belgique', 1),
(3, 'Pied Piper', 157349458, 'USA', 1),
(4, 'CGI', 851349458, 'Belgique', 2),
(5, 'Vough', 257459677, 'Allemagne', 2),
(6, 'Pythano', 254245541, 'Belgique', 2);

-- --------------------------------------------------------

--
-- Structure de la table `company_type`
--

DROP TABLE IF EXISTS `company_type`;
CREATE TABLE IF NOT EXISTS `company_type` (
  `company_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_type` varchar(50) NOT NULL,
  PRIMARY KEY (`company_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `company_type`
--

INSERT INTO `company_type` (`company_type_id`, `company_type`) VALUES
(1, 'Clients'),
(2, 'Suppliers');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `firstname`, `lastname`, `email`, `phone`, `company_id`) VALUES
(1, 'Stephane', 'Kalonji', 'kalo@hotmail.com', '555-6547', 1),
(2, 'Peter', ' Gregory', 'peter.gregory@odoo.com', '555-4859', 2),
(3, 'Taylor', 'Swift', 'Taylor.swift@gmail.com', '555-4857', 3),
(4, 'Kaizen', 'Dang', 'Kaizen.Dang@wang.com', '555-3419', 4),
(5, 'Francois', 'Damien', 'Fdams@hotmail.com', '555-3249', 5);

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `contact_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  UNIQUE KEY `company_id` (`company_id`),
  KEY `contact_id` (`contact_id`),
  KEY `contact_id_2` (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_number`, `date`, `contact_id`, `company_id`) VALUES
(1, 'RF23-09-09-2020', '2020-09-09', 1, 1),
(2, 'RF21-10-09-2020', '2020-10-09', 2, 2),
(3, 'RF21-10-09-2020', '2020-10-09', 3, 3),
(5, 'RF18-10-09-2020', '2020-10-09', 4, 4),
(6, 'RF17-10-09-2020', '2020-10-09', 5, 5);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`company_type_id`) REFERENCES `company_type` (`company_type_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_3` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`contact_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
