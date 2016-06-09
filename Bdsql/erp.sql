-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2016 at 02:32 PM
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
(1, 'Sfax ,Cite El BAhri', -3, 'dlnfbnj', 'dlfbnj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bonliv`
--

CREATE TABLE `bonliv` (
  `id` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` int(30) NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `numerobonliv` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bonlivraison`
--

CREATE TABLE `bonlivraison` (
  `id` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` int(30) NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bonlivraisonpermanat`
--

CREATE TABLE `bonlivraisonpermanat` (
  `numerobonliv` int(50) NOT NULL,
  `datebon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(30) NOT NULL,
  `id_bon` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'client', 'Mr', 'anoir', 'gu', 'Sfax ,cite El BAhri', 4, 'Sfax', 'TUNISIE', 0, 0, 0, '', 'test', 4, '2016-06-09 10:31:46', 'capitol soft');

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE `devis` (
  `id` int(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` int(30) NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `numerodevis` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devis`
--

INSERT INTO `devis` (`id`, `designation`, `prixvente`, `quantite`, `id_client`, `numerodevis`) VALUES
(1, 'gouchou', 23, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `devispermanant`
--

CREATE TABLE `devispermanant` (
  `numerodevis` int(30) NOT NULL,
  `datedevis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(30) NOT NULL,
  `id_devis` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devispermanant`
--

INSERT INTO `devispermanant` (`numerodevis`, `datedevis`, `id_client`, `id_devis`) VALUES
(1, '2016-06-09 11:05:59', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `devistemporaire`
--

CREATE TABLE `devistemporaire` (
  `id` int(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` int(30) NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id` int(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` int(30) NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `numerofacture` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facturepermanant`
--

CREATE TABLE `facturepermanant` (
  `numerofacture` int(30) NOT NULL,
  `datefacture` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(30) NOT NULL,
  `id_facture` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facturetemporaire`
--

CREATE TABLE `facturetemporaire` (
  `id` int(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` int(30) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_client` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'anoir', 'guesmi', 'Etudiant', 'Sfax ,cite El BAhri', 19, 'TUNISIE', 'Sfax', 11, 4, 4, 'admin@admin.com', '2016-06-09 10:39:40');

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
(1, 'gouchou', '20', '18', '0', '23.6', 8, 1, '', '2016-06-09 10:41:41', 22222);

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
(1, 'test', 'test', 18, 18, 239);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

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
  ADD PRIMARY KEY (`numerobonliv`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `devispermanant`
--
ALTER TABLE `devispermanant`
  ADD PRIMARY KEY (`numerodevis`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `devistemporaire`
--
ALTER TABLE `devistemporaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `facturepermanant`
--
ALTER TABLE `facturepermanant`
  ADD PRIMARY KEY (`numerofacture`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `facturetemporaire`
--
ALTER TABLE `facturetemporaire`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bonliv`
--
ALTER TABLE `bonliv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bonlivraisonpermanat`
--
ALTER TABLE `bonlivraisonpermanat`
  MODIFY `numerobonliv` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `devispermanant`
--
ALTER TABLE `devispermanant`
  MODIFY `numerodevis` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `devistemporaire`
--
ALTER TABLE `devistemporaire`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `facturepermanant`
--
ALTER TABLE `facturepermanant`
  MODIFY `numerofacture` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `facturetemporaire`
--
ALTER TABLE `facturetemporaire`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- Constraints for table `bonliv`
--
ALTER TABLE `bonliv`
  ADD CONSTRAINT `bonliv_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `bonliv_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

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
-- Constraints for table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `devis_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Constraints for table `devispermanant`
--
ALTER TABLE `devispermanant`
  ADD CONSTRAINT `devispermanant_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `devispermanant_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Constraints for table `facturepermanant`
--
ALTER TABLE `facturepermanant`
  ADD CONSTRAINT `facturepermanant_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
