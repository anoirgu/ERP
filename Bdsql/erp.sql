-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2016 at 12:45 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse_livraison_client`
--

CREATE TABLE IF NOT EXISTS `adresse_livraison_client` (
`id` int(11) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `code_postal` int(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `id_client` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`id` int(30) NOT NULL,
  `statut` varchar(30) NOT NULL,
  `civilite` varchar(30) NOT NULL,
  `raison_social` varchar(50) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `code_postal` int(50) NOT NULL,
  `ville` varchar(40) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `telephone` int(50) NOT NULL,
  `mobile` int(50) NOT NULL,
  `fax` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `activite` varchar(40) NOT NULL,
  `code_ape` int(30) NOT NULL,
  `tva_intra` int(50) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `societe_Inf`
--

CREATE TABLE IF NOT EXISTS `societe_Inf` (
`id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `form_juridique` varchar(30) NOT NULL,
  `raison_social` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` int(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `n_tva _intra` int(40) NOT NULL,
  `code_ape` int(40) NOT NULL,
  `rcs` varchar(50) NOT NULL,
  `n_siret` int(14) NOT NULL,
  `n_tel_fix` int(50) NOT NULL,
  `n_tel_mobil` int(30) NOT NULL,
  `n_fax` int(30) NOT NULL,
  `emai` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(23) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `admin`) VALUES
(1, 'admin@admin.com', '011c945f30ce2cbafc452f39840f025693339c42', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresse_livraison_client`
--
ALTER TABLE `adresse_livraison_client`
 ADD PRIMARY KEY (`id`), ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `societe_Inf`
--
ALTER TABLE `societe_Inf`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresse_livraison_client`
--
ALTER TABLE `adresse_livraison_client`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `societe_Inf`
--
ALTER TABLE `societe_Inf`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(23) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresse_livraison_client`
--
ALTER TABLE `adresse_livraison_client`
ADD CONSTRAINT `adresse_livraison_client_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
