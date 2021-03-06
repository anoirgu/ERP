-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 03 Octobre 2016 à 23:05
-- Version du serveur :  5.7.15-0ubuntu0.16.04.1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `erp`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse_livraison_client`
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
-- Contenu de la table `adresse_livraison_client`
--

INSERT INTO `adresse_livraison_client` (`id`, `adresse`, `code_postal`, `ville`, `pays`, `id_client`) VALUES
(1, 'Sfax ,Cite El BAhri', -3, 'dlnfbnj', 'dlfbnj', 1),
(2, '', 0, '', '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `boncommande`
--

CREATE TABLE `boncommande` (
  `id` int(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` float NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `numeroboncommande` int(30) NOT NULL,
  `remise` int(30) NOT NULL,
  `prixht` float NOT NULL,
  `prixtotalttc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `boncommande`
--

INSERT INTO `boncommande` (`id`, `designation`, `prixvente`, `quantite`, `id_client`, `numeroboncommande`, `remise`, `prixht`, `prixtotalttc`) VALUES
(0, 'buiscuit', 23.6, 2, 1, 0, 0, 20, 47.2);

-- --------------------------------------------------------

--
-- Structure de la table `boncommandepermanant`
--

CREATE TABLE `boncommandepermanant` (
  `numeroboncommande` int(30) NOT NULL,
  `dateboncommande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(30) NOT NULL,
  `id_boncommande` int(30) NOT NULL,
  `id_admin` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `boncommandepermanant`
--

INSERT INTO `boncommandepermanant` (`numeroboncommande`, `dateboncommande`, `id_client`, `id_boncommande`, `id_admin`) VALUES
(0, '2016-10-03 20:56:40', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `boncommandetemporaire`
--

CREATE TABLE `boncommandetemporaire` (
  `id` int(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` float NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `remise` int(30) NOT NULL,
  `prixht` double NOT NULL,
  `prixtotalttc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bonliv`
--

CREATE TABLE `bonliv` (
  `id` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` float NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `numerobonliv` int(30) NOT NULL,
  `remise` int(30) NOT NULL DEFAULT '0',
  `prixht` float NOT NULL,
  `prixtotalttc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bonliv`
--

INSERT INTO `bonliv` (`id`, `designation`, `prixvente`, `quantite`, `id_client`, `numerobonliv`, `remise`, `prixht`, `prixtotalttc`) VALUES
(1, 'buiscuit', 23.6, 3, 1, 1, 0, 20, 70.8),
(2, 'buiscuit', 23.6, 2, 1, 1, 0, 20, 47.2),
(3, 'buiscuit', 23.6, 10, 1, 1, 0, 20, 236),
(4, 'dddddddddddddddddddddddddddddd', 27.14, 2, 1, 2, 0, 23, 54.28),
(5, 'buiscuit', 23.6, 2, 1, 3, 0, 20, 47.2),
(6, 'dddddddddddddddddddddddddddddd', 27.14, 1, 1, 3, 0, 23, 27.14),
(7, 'dddddddddddddddddddddddddddddd', 27.14, 1, 1, 4, 0, 23, 27.14),
(8, 'dddddddddddddddddddddddddddddd', 27.14, 1, 1, 4, 0, 23, 27.14),
(9, 'dddddddddddddddddddddddddddddd', 27.14, 3, 1, 5, 0, 23, 81.42),
(10, 'dddddddddddddddddddddddddddddd', 27.14, 3, 1, 6, 0, 23, 81.42),
(11, 'buiscuit', 23.6, 3, 1, 7, 0, 20, 70.8);

-- --------------------------------------------------------

--
-- Structure de la table `bonlivraison`
--

CREATE TABLE `bonlivraison` (
  `id` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` float NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `remise` int(30) NOT NULL DEFAULT '0',
  `prixht` float NOT NULL,
  `prixtotalttc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bonlivraisonpermanat`
--

CREATE TABLE `bonlivraisonpermanat` (
  `numerobonliv` int(50) NOT NULL,
  `datebon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(30) NOT NULL,
  `id_bon` int(30) NOT NULL,
  `id_admin` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bonlivraisonpermanat`
--

INSERT INTO `bonlivraisonpermanat` (`numerobonliv`, `datebon`, `id_client`, `id_bon`, `id_admin`) VALUES
(1, '2016-06-21 22:07:19', 1, 1, 0),
(2, '2016-06-21 22:30:20', 1, 1, 3),
(3, '2016-06-21 22:32:41', 1, 1, 3),
(4, '2016-06-21 22:43:13', 1, 1, 0),
(5, '2016-06-24 22:30:14', 1, 1, 4),
(6, '2016-06-24 22:46:29', 1, 1, 4),
(7, '2016-06-24 22:47:10', 1, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `client`
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
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `statut`, `civilite`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `pays`, `telephone`, `mobile`, `fax`, `email`, `activite`, `code_ape`, `date_creation`, `raisonsocial`) VALUES
(1, 'client', 'Mr', 'anoir', 'gu', 'Sfax ,cite El BAhri', 4, 'Sfax', 'TUNISIE', 0, 0, 0, '', 'test', 4, '2016-06-09 10:31:46', 'capitol soft'),
(2, 'client', 'Mr', '', '', '', 0, '', '', 0, 0, 0, '', '', 0, '2016-06-22 11:03:49', '');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id` int(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` float NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `numerodevis` int(30) NOT NULL,
  `remise` int(30) NOT NULL DEFAULT '0',
  `prixht` float NOT NULL,
  `prixtotalttc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`id`, `designation`, `prixvente`, `quantite`, `id_client`, `numerodevis`, `remise`, `prixht`, `prixtotalttc`) VALUES
(1, 'gouchou', 23, 2, 1, 1, 0, 0, 0),
(6, 'buiscuit', 23.6, 2, 1, 6, 0, 20, 47.2),
(7, 'buiscuit', 23.6, 2, 1, 7, 0, 20, 47.2),
(8, 'dddddddddddddddddddddddddddddd', 27.14, 2, 1, 8, 0, 23, 54.28);

-- --------------------------------------------------------

--
-- Structure de la table `devispermanant`
--

CREATE TABLE `devispermanant` (
  `numerodevis` int(30) NOT NULL,
  `datedevis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(30) NOT NULL,
  `id_devis` int(30) NOT NULL,
  `id_admin` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `devispermanant`
--

INSERT INTO `devispermanant` (`numerodevis`, `datedevis`, `id_client`, `id_devis`, `id_admin`) VALUES
(1, '2016-06-09 11:05:59', 1, 1, 3),
(6, '2016-06-13 23:32:32', 1, 1, 0),
(7, '2016-06-13 23:35:13', 1, 1, 0),
(8, '2016-06-22 10:41:26', 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `devistemporaire`
--

CREATE TABLE `devistemporaire` (
  `id` int(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` float NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `remise` int(30) NOT NULL DEFAULT '0',
  `prixht` float NOT NULL,
  `prixtotalttc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` float NOT NULL,
  `quantite` int(30) NOT NULL,
  `id_client` int(30) NOT NULL,
  `numerofacture` int(30) NOT NULL,
  `remise` int(30) NOT NULL DEFAULT '0',
  `prixht` float NOT NULL,
  `prixtotalttc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`id`, `designation`, `prixvente`, `quantite`, `id_client`, `numerofacture`, `remise`, `prixht`, `prixtotalttc`) VALUES
(3, 'buiscuit', 21.6, 2, 1, 3, 2, 18.3051, 0),
(4, 'buiscuit', 23.6, 2, 1, 4, 0, 20, 47.2),
(5, 'dddddddddddddddddddddddddddddd', 27.14, 2, 1, 5, 0, 23, 54.28),
(6, 'buiscuit', 21.6, 1, 1, 6, 2, 18.3051, 21.6);

-- --------------------------------------------------------

--
-- Structure de la table `facturepermanant`
--

CREATE TABLE `facturepermanant` (
  `numerofacture` int(30) NOT NULL,
  `datefacture` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(30) NOT NULL,
  `id_facture` int(30) NOT NULL,
  `id_admin` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `facturepermanant`
--

INSERT INTO `facturepermanant` (`numerofacture`, `datefacture`, `id_client`, `id_facture`, `id_admin`) VALUES
(3, '2016-06-13 22:41:10', 1, 1, 3),
(4, '2016-06-13 23:15:20', 1, 1, 3),
(5, '2016-06-22 10:41:55', 1, 1, 0),
(6, '2016-09-23 22:03:27', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `facturetemporaire`
--

CREATE TABLE `facturetemporaire` (
  `id` int(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `prixvente` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_client` int(30) NOT NULL,
  `remise` int(30) NOT NULL DEFAULT '0',
  `prixht` float NOT NULL,
  `prixtotalttc` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
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
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `prenom`, `raisonsocial`, `adresse`, `code_postal`, `pays`, `ville`, `telephone`, `mobile`, `fax`, `email`, `date_creation`) VALUES
(1, 'anoir', 'guesmi', 'Etudiant', 'Sfax ,cite El BAhri', 19, 'TUNISIE', 'Sfax', 11, 4, 4, 'admin@admin.com', '2016-06-09 10:39:40');

-- --------------------------------------------------------

--
-- Structure de la table `product`
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
-- Contenu de la table `product`
--

INSERT INTO `product` (`idp`, `designation`, `prix_achat`, `marge_ht`, `taxe`, `prixventettc`, `quantite`, `id_fournisseur`, `logo`, `date_creation`, `reference`) VALUES
(4, 'gouchou', '20', '18', '0', '23.6', 0, 1, '', '2016-06-13 00:39:35', 22),
(5, 'buiscuit', '20', '18', '0', '23.6', 3, 1, '', '2016-06-13 22:03:22', 22222),
(6, 'dddddddddddddddddddddddddddddddddddddddd', '23', '18', '0', '27.14', 3, 1, '', '2016-06-21 22:30:04', 22);

-- --------------------------------------------------------

--
-- Structure de la table `setting`
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
-- Contenu de la table `setting`
--

INSERT INTO `setting` (`id`, `pieddevis`, `piedfacture`, `defaulttva`, `defaulttax`, `fraisport`) VALUES
(1, 'test', 'test', 18, 18, 239);

-- --------------------------------------------------------

--
-- Structure de la table `societe_Inf`
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
-- Contenu de la table `societe_Inf`
--

INSERT INTO `societe_Inf` (`id`, `nom`, `form_juridique`, `raison_social`, `adresse`, `code_postal`, `ville`, `n_tva_intra`, `code_ape`, `rcs`, `n_siret`, `n_tel_fix`, `n_tel_mobil`, `n_fax`, `email`, `logo`) VALUES
(1, 'GPR hammami', 'test', 'test', 'etst', 222, 'shsh', 2222, 2222222, '22222', 2147483647, 8888, 888888, 888888, 'fff@ff.com', '9_260.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(23) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '1',
  `sysadmin` int(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`, `sysadmin`) VALUES
(1, 'admin', 'admin@admin.com', '011c945f30ce2cbafc452f39840f025693339c42', 1, 1),
(3, 'anoirgu', 'anoirboss@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42', 1, 0),
(4, 'guesmi anoir', '', '011c945f30ce2cbafc452f39840f025693339c42', 1, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse_livraison_client`
--
ALTER TABLE `adresse_livraison_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `boncommande`
--
ALTER TABLE `boncommande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `boncommandepermanant`
--
ALTER TABLE `boncommandepermanant`
  ADD PRIMARY KEY (`numeroboncommande`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `boncommandetemporaire`
--
ALTER TABLE `boncommandetemporaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bonliv`
--
ALTER TABLE `bonliv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `bonlivraisonpermanat`
--
ALTER TABLE `bonlivraisonpermanat`
  ADD PRIMARY KEY (`numerobonliv`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `devispermanant`
--
ALTER TABLE `devispermanant`
  ADD PRIMARY KEY (`numerodevis`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `devistemporaire`
--
ALTER TABLE `devistemporaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `facturepermanant`
--
ALTER TABLE `facturepermanant`
  ADD PRIMARY KEY (`numerofacture`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `facturetemporaire`
--
ALTER TABLE `facturetemporaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `id_fournisseur` (`id_fournisseur`);

--
-- Index pour la table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `societe_Inf`
--
ALTER TABLE `societe_Inf`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse_livraison_client`
--
ALTER TABLE `adresse_livraison_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `bonliv`
--
ALTER TABLE `bonliv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `bonlivraisonpermanat`
--
ALTER TABLE `bonlivraisonpermanat`
  MODIFY `numerobonliv` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `devispermanant`
--
ALTER TABLE `devispermanant`
  MODIFY `numerodevis` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `devistemporaire`
--
ALTER TABLE `devistemporaire`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `facturepermanant`
--
ALTER TABLE `facturepermanant`
  MODIFY `numerofacture` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `facturetemporaire`
--
ALTER TABLE `facturetemporaire`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `idp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse_livraison_client`
--
ALTER TABLE `adresse_livraison_client`
  ADD CONSTRAINT `adresse_livraison_client_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `boncommande`
--
ALTER TABLE `boncommande`
  ADD CONSTRAINT `boncommande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `boncommandepermanant`
--
ALTER TABLE `boncommandepermanant`
  ADD CONSTRAINT `boncommandepermanant_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `bonliv`
--
ALTER TABLE `bonliv`
  ADD CONSTRAINT `bonliv_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `bonliv_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  ADD CONSTRAINT `bonlivraison_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `bonlivraisonpermanat`
--
ALTER TABLE `bonlivraisonpermanat`
  ADD CONSTRAINT `bonlivraisonpermanat_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `devis_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `devispermanant`
--
ALTER TABLE `devispermanant`
  ADD CONSTRAINT `devispermanant_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `devispermanant_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `facturepermanant`
--
ALTER TABLE `facturepermanant`
  ADD CONSTRAINT `facturepermanant_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
