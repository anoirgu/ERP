-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2016 at 04:17 PM
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
  `id_client` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adresse_livraison_client`
--

INSERT INTO `adresse_livraison_client` (`id`, `adresse`, `code_postal`, `ville`, `pays`, `id_client`) VALUES
(2, 'dlfkdln', 2, 'dlnfbnj', 'dlfbnj', 40),
(3, 'Sfax ,Cite El BAhri', 3154, 'Sfax', 'Tunis', 41),
(4, 'CDC', 0, 'DC', 'DCDCDCDC', 42),
(5, 'dlfkdln', 10, 'dlnfbnj', 'dlfbnj', 43);

-- --------------------------------------------------------

--
-- Table structure for table `bonliv`
--

CREATE TABLE `bonliv` (
  `id` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixachat` int(30) NOT NULL,
  `tva` int(30) NOT NULL,
  `prixvente` int(30) NOT NULL,
  `quantite` int(30) NOT NULL,
  `numerobonlivraison` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonliv`
--

INSERT INTO `bonliv` (`id`, `designation`, `prixachat`, `tva`, `prixvente`, `quantite`, `numerobonlivraison`) VALUES
(25, 'gouchou', 20, 21, 420, 12, 2),
(26, 'test', 23, 21, 483, 4, 3),
(27, 'buiscuit', 20, 21, 420, 4, 3),
(28, 'gouchou', 20, 21, 420, 12, 3),
(29, 'gouchou', 20, 21, 420, 12, 5),
(30, 'test', 23, 21, 30, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `bonlivraison`
--

CREATE TABLE `bonlivraison` (
  `id` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixachat` int(30) NOT NULL,
  `tva` int(30) NOT NULL,
  `prixvente` int(30) NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `numerobonliv` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bonlivraisonpermanat`
--

CREATE TABLE `bonlivraisonpermanat` (
  `id` int(30) NOT NULL,
  `numerobonliv` int(50) NOT NULL,
  `datebon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(30) NOT NULL,
  `id_bon` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonlivraisonpermanat`
--

INSERT INTO `bonlivraisonpermanat` (`id`, `numerobonliv`, `datebon`, `id_client`, `id_bon`) VALUES
(17, 2, '2016-06-05 12:35:12', 40, 2),
(18, 3, '2016-06-05 12:36:11', 40, 3),
(19, 5, '2016-06-05 13:20:40', 40, 5),
(20, 6, '2016-06-05 14:11:34', 40, 6);

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
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `raisonsocial` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `statut`, `civilite`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `pays`, `telephone`, `mobile`, `fax`, `email`, `activite`, `code_ape`, `date_creation`, `raisonsocial`) VALUES
(40, 'client', 'Mr', 'srkljb', 'alja', 'ddd@ff.com', 22222, 'dlvfbfljn', 'dlvkjfblf', 222, 222, 222, 'admin@admin.com', 'dlmrngrl', 22222, '2016-06-02 22:13:30', 'capitol soft'),
(41, 'prospect', 'Mr', 'anoir', 'gu', 'Sfax ,cite El BAhri', 3150, 'Sfax', 'Tunis', 27635381, 27635381, 27635381, 'guesmianoir@gmail.com', 'Etudiant', 12345, '2016-06-03 00:01:55', 'capitol soft'),
(42, 'client', 'Mr', 'guesmi', 'anoir', 'sfax', 222222, 'sfax', 'tuniqie', 121212, 121212, 22222, 'chkzkx@hxh.fr', 'test', 2222, '2016-06-03 12:47:16', 'capitol soft'),
(43, 'client', 'Mr', 'sil9allel', ':khgiuh', 'Sfax ,cite El BAhri', 13, 'dlvfbfljn', 'dlvkjfblf', 2222, 222, 21, 'ljhgouhgk@gmail.tn', 'Etudiant', 3, '2016-06-05 13:25:24', 'hrizi');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(100) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `raisonsocial` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `code_postal` int(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `telephone` int(30) NOT NULL,
  `mobile` int(30) NOT NULL,
  `fax` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `prenom`, `raisonsocial`, `adresse`, `code_postal`, `pays`, `ville`, `telephone`, `mobile`, `fax`, `email`, `date_creation`) VALUES
(2, 'anoir', 'gu', 'Etudiant', 'Sfax ,cite El BAhri', 31, 'Tunis', 'Sfax', 5, 5, 4, 'admin@admin.com', '2016-06-03 15:22:54'),
(3, 'srkljb', 'alja', 'Etudiant', 'Sfax ,cite El BAhri', 30, 'dlvkjfblf', 'Sfax', 5, 5, 5, 'admin@admin.com', '2016-06-04 10:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idp` int(20) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `prix_achat` varchar(30) NOT NULL,
  `marge_ht` varchar(30) NOT NULL,
  `taxe` varchar(30) NOT NULL DEFAULT '0',
  `prixventettc` varchar(30) NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_fournisseur` int(30) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reference` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idp`, `designation`, `prix_achat`, `marge_ht`, `taxe`, `prixventettc`, `quantite`, `id_fournisseur`, `logo`, `date_creation`, `reference`) VALUES
(2, 'gouchou', '20', '21', '21', '20', 12, 2, 'abuo.jpg', '2016-06-04 00:51:24', 1),
(3, 'test', '23', '21', '23', '30', 4, 2, '9_260.jpg', '2016-06-04 10:21:12', 2),
(4, 'buiscuit', '20', '21', '21', '59', 4, 3, 'abuo.jpg', '2016-06-04 10:27:22', 3);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(30) NOT NULL,
  `pieddevis` varchar(50) NOT NULL,
  `piedfacture` varchar(50) NOT NULL,
  `defaulttva` int(30) NOT NULL,
  `defaulttax` int(30) NOT NULL,
  `fraisport` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `pieddevis`, `piedfacture`, `defaulttva`, `defaulttax`, `fraisport`) VALUES
(1, 'test', 'test', 21, 23, 239);

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
(1, 'tesdvlkdfbt', 'test', 'test', 'etst', 222, 'shsh', 2222, 2222222, '22222', 2147483647, 8888, 888888, 888888, 'fff@ff.com', '9_260.jpg');

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
-- Indexes for table `bonliv`
--
ALTER TABLE `bonliv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `bonlivraisonpermanat`
--
ALTER TABLE `bonlivraisonpermanat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `id_fournisseur` (`id_fournisseur`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bonliv`
--
ALTER TABLE `bonliv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `bonlivraisonpermanat`
--
ALTER TABLE `bonlivraisonpermanat`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

--
-- Constraints for table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  ADD CONSTRAINT `bonlivraison_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Constraints for table `bonlivraisonpermanat`
--
ALTER TABLE `bonlivraisonpermanat`
  ADD CONSTRAINT `bonlivraisonpermanat_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
