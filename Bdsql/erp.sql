-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2016 at 03:05 AM
-- Server version: 5.7.12-0ubuntu1
-- PHP Version: 7.0.4-7ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse_livraison_client`
--

CREATE TABLE `adresse_livraison_client` (
  `id` int(11) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `code_postal` int(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `raisonsocial` varchar(30) NOT NULL,
  `id_client` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adresse_livraison_client`
--

INSERT INTO `adresse_livraison_client` (`id`, `adresse`, `code_postal`, `ville`, `pays`, `raisonsocial`, `id_client`) VALUES
(2, 'dlfkdln', 2, 'dlnfbnj', 'dlfbnj', 'e', 40),
(3, 'Sfax ,Cite El BAhri', 3154, 'Sfax', 'Tunis', 'Etudiant', 41);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(30) NOT NULL,
  `statut` varchar(30) NOT NULL,
  `civilite` varchar(30) NOT NULL,
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
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `statut`, `civilite`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `pays`, `telephone`, `mobile`, `fax`, `email`, `activite`, `code_ape`, `date_creation`) VALUES
(40, 'client', 'Mr', 'srkljb', 'alja', 'ddd@ff.com', 22222, 'dlvfbfljn', 'dlvkjfblf', 222, 222, 222, 'admin@admin.com', 'dlmrngrl', 22222, '2016-06-02 22:13:30'),
(41, 'prospect', 'Mr', 'anoir', 'gu', 'Sfax ,cite El BAhri', 3150, 'Sfax', 'Tunis', 27635381, 27635381, 27635381, 'guesmianoir@gmail.com', 'Etudiant', 12345, '2016-06-03 00:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `societe_Inf`
--

CREATE TABLE `societe_Inf` (
  `id` int(11) NOT NULL DEFAULT '1',
  `nom` varchar(20) NOT NULL,
  `form_juridique` varchar(30) NOT NULL,
  `raison_social` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` int(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `n_tva_intra` int(40) NOT NULL,
  `code_ape` int(40) NOT NULL,
  `rcs` varchar(50) NOT NULL,
  `n_siret` int(14) NOT NULL,
  `n_tel_fix` int(50) NOT NULL,
  `n_tel_mobil` int(30) NOT NULL,
  `n_fax` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `societe_Inf`
--

INSERT INTO `societe_Inf` (`id`, `nom`, `form_juridique`, `raison_social`, `adresse`, `code_postal`, `ville`, `n_tva_intra`, `code_ape`, `rcs`, `n_siret`, `n_tel_fix`, `n_tel_mobil`, `n_fax`, `email`, `logo`) VALUES
(1, 'tesdvlkdfbt', 'test', 'test', 'etst', 222, 'shsh', 2222, 2222222, '22222', 2147483647, 8888, 888888, 888888, 'fff@ff.com', '1405531627-2022360812.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(23) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
