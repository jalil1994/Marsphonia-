-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 04 Mars 2017 à 22:57
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `marsphonia1`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `ville` varchar(25) DEFAULT NULL,
  `pays` varchar(25) DEFAULT NULL,
  `rue` varchar(25) DEFAULT NULL,
  `numero_porte` int(11) NOT NULL,
  `departement` varchar(25) DEFAULT NULL,
  `Code_Postal` int(11) DEFAULT NULL,
  `emailClient` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `carte_de_fidelite`
--

CREATE TABLE IF NOT EXISTS `carte_de_fidelite` (
`numCarteFidelite` int(11) NOT NULL,
  `Points` int(11) DEFAULT NULL,
  `emailClient` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `emailClient` varchar(50) NOT NULL,
`numClient` int(11) NOT NULL,
  `motdepasse` varchar(25) DEFAULT NULL,
  `nomClient` varchar(20) DEFAULT NULL,
  `prenomClient` varchar(20) DEFAULT NULL,
  `etatCivile` tinyint(1) DEFAULT NULL,
  `num_Tel` int(11) DEFAULT NULL,
  `numCarteFidelite` int(11) NOT NULL,
  `IdPanier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
`idCommande` int(11) NOT NULL,
  `confirmation` tinyint(1) DEFAULT NULL,
  `prix_total` int(11) DEFAULT NULL,
  `IdPanier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE IF NOT EXISTS `couleur` (
  `Idcouleur` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `datesortie`
--

CREATE TABLE IF NOT EXISTS `datesortie` (
  `datesortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ecran`
--

CREATE TABLE IF NOT EXISTS `ecran` (
  `modelecran` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `edition_limite`
--

CREATE TABLE IF NOT EXISTS `edition_limite` (
  `editionLimite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
`numFacture` int(11) NOT NULL,
  `adresseLivraison` varchar(25) DEFAULT NULL,
  `numero_porte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `foncTexte` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE IF NOT EXISTS `marque` (
  `Idmarque` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
`IdPanier` int(11) NOT NULL,
  `emailClient` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE IF NOT EXISTS `payement` (
  `numpayement` int(11) DEFAULT NULL,
  `date_payement` date DEFAULT NULL,
  `numFacture` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

CREATE TABLE IF NOT EXISTS `prix` (
  `prixduproduit` int(11) NOT NULL,
  `prixPromo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
`numProduit` int(11) NOT NULL,
  `NombredeVente` int(11) DEFAULT NULL,
  `dispo` tinyint(1) DEFAULT NULL,
  `promo` tinyint(1) DEFAULT NULL,
  `imgLien` varchar(50) DEFAULT NULL,
  `Quantite_stock` int(11) DEFAULT NULL,
  `Nom_produit` varchar(25) DEFAULT NULL,
  `Idcouleur` varchar(25) DEFAULT NULL,
  `Idmarque` varchar(25) DEFAULT NULL,
  `modelecran` varchar(25) DEFAULT NULL,
  `editionLimite` tinyint(1) DEFAULT NULL,
  `prixduproduit` int(11) DEFAULT NULL,
  `datesortie` date DEFAULT NULL,
  `foncTexte` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stockerpanier`
--

CREATE TABLE IF NOT EXISTS `stockerpanier` (
  `quantite_achete` int(11) DEFAULT NULL,
  `numProduit` int(11) NOT NULL,
  `IdPanier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stockewishlist`
--

CREATE TABLE IF NOT EXISTS `stockewishlist` (
  `quantite` int(11) DEFAULT NULL,
  `NumWishlist` int(11) NOT NULL,
  `numProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `NumWishlist` int(11) NOT NULL,
  `emailClient` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
 ADD PRIMARY KEY (`numero_porte`), ADD KEY `FK_ADRESSE_emailClient` (`emailClient`);

--
-- Index pour la table `carte_de_fidelite`
--
ALTER TABLE `carte_de_fidelite`
 ADD PRIMARY KEY (`numCarteFidelite`), ADD KEY `FK_CARTE_DE_FIDELITE_emailClient` (`emailClient`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`emailClient`), ADD UNIQUE KEY `numClient` (`numClient`), ADD KEY `FK_CLIENT_numCarteFidelite` (`numCarteFidelite`), ADD KEY `FK_CLIENT_IdPanier` (`IdPanier`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
 ADD PRIMARY KEY (`idCommande`), ADD KEY `FK_Commande_IdPanier` (`IdPanier`);

--
-- Index pour la table `couleur`
--
ALTER TABLE `couleur`
 ADD PRIMARY KEY (`Idcouleur`);

--
-- Index pour la table `datesortie`
--
ALTER TABLE `datesortie`
 ADD PRIMARY KEY (`datesortie`);

--
-- Index pour la table `ecran`
--
ALTER TABLE `ecran`
 ADD PRIMARY KEY (`modelecran`);

--
-- Index pour la table `edition_limite`
--
ALTER TABLE `edition_limite`
 ADD PRIMARY KEY (`editionLimite`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
 ADD PRIMARY KEY (`numFacture`), ADD KEY `FK_FACTURE_numero_porte` (`numero_porte`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
 ADD PRIMARY KEY (`foncTexte`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
 ADD PRIMARY KEY (`Idmarque`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
 ADD PRIMARY KEY (`IdPanier`), ADD KEY `FK_Panier_emailClient` (`emailClient`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
 ADD PRIMARY KEY (`numFacture`,`idCommande`), ADD KEY `FK_payement_idCommande` (`idCommande`);

--
-- Index pour la table `prix`
--
ALTER TABLE `prix`
 ADD PRIMARY KEY (`prixduproduit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
 ADD PRIMARY KEY (`numProduit`), ADD KEY `FK_PRODUIT_Idcouleur` (`Idcouleur`), ADD KEY `FK_PRODUIT_Idmarque` (`Idmarque`), ADD KEY `FK_PRODUIT_modelecran` (`modelecran`), ADD KEY `FK_PRODUIT_editionLimite` (`editionLimite`), ADD KEY `FK_PRODUIT_prixduproduit` (`prixduproduit`), ADD KEY `FK_PRODUIT_datesortie` (`datesortie`), ADD KEY `FK_PRODUIT_foncTexte` (`foncTexte`);

--
-- Index pour la table `stockerpanier`
--
ALTER TABLE `stockerpanier`
 ADD PRIMARY KEY (`numProduit`,`IdPanier`), ADD KEY `FK_stockerPanier_IdPanier` (`IdPanier`);

--
-- Index pour la table `stockewishlist`
--
ALTER TABLE `stockewishlist`
 ADD PRIMARY KEY (`NumWishlist`,`numProduit`), ADD KEY `FK_stockeWishlist_numProduit` (`numProduit`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
 ADD PRIMARY KEY (`NumWishlist`), ADD KEY `FK_WISHLIST_emailClient` (`emailClient`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `carte_de_fidelite`
--
ALTER TABLE `carte_de_fidelite`
MODIFY `numCarteFidelite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
MODIFY `numClient` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
MODIFY `numFacture` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
MODIFY `IdPanier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
MODIFY `numProduit` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
ADD CONSTRAINT `FK_ADRESSE_emailClient` FOREIGN KEY (`emailClient`) REFERENCES `client` (`emailClient`);

--
-- Contraintes pour la table `carte_de_fidelite`
--
ALTER TABLE `carte_de_fidelite`
ADD CONSTRAINT `FK_CARTE_DE_FIDELITE_emailClient` FOREIGN KEY (`emailClient`) REFERENCES `client` (`emailClient`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
ADD CONSTRAINT `FK_CLIENT_IdPanier` FOREIGN KEY (`IdPanier`) REFERENCES `panier` (`IdPanier`),
ADD CONSTRAINT `FK_CLIENT_numCarteFidelite` FOREIGN KEY (`numCarteFidelite`) REFERENCES `carte_de_fidelite` (`numCarteFidelite`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
ADD CONSTRAINT `FK_Commande_IdPanier` FOREIGN KEY (`IdPanier`) REFERENCES `panier` (`IdPanier`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
ADD CONSTRAINT `FK_FACTURE_numero_porte` FOREIGN KEY (`numero_porte`) REFERENCES `adresse` (`numero_porte`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
ADD CONSTRAINT `FK_Panier_emailClient` FOREIGN KEY (`emailClient`) REFERENCES `client` (`emailClient`);

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
ADD CONSTRAINT `FK_payement_idCommande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
ADD CONSTRAINT `FK_payement_numFacture` FOREIGN KEY (`numFacture`) REFERENCES `facture` (`numFacture`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
ADD CONSTRAINT `FK_PRODUIT_Idcouleur` FOREIGN KEY (`Idcouleur`) REFERENCES `couleur` (`Idcouleur`),
ADD CONSTRAINT `FK_PRODUIT_Idmarque` FOREIGN KEY (`Idmarque`) REFERENCES `marque` (`Idmarque`),
ADD CONSTRAINT `FK_PRODUIT_datesortie` FOREIGN KEY (`datesortie`) REFERENCES `datesortie` (`datesortie`),
ADD CONSTRAINT `FK_PRODUIT_editionLimite` FOREIGN KEY (`editionLimite`) REFERENCES `edition_limite` (`editionLimite`),
ADD CONSTRAINT `FK_PRODUIT_foncTexte` FOREIGN KEY (`foncTexte`) REFERENCES `fonction` (`foncTexte`),
ADD CONSTRAINT `FK_PRODUIT_modelecran` FOREIGN KEY (`modelecran`) REFERENCES `ecran` (`modelecran`),
ADD CONSTRAINT `FK_PRODUIT_prixduproduit` FOREIGN KEY (`prixduproduit`) REFERENCES `prix` (`prixduproduit`);

--
-- Contraintes pour la table `stockerpanier`
--
ALTER TABLE `stockerpanier`
ADD CONSTRAINT `FK_stockerPanier_IdPanier` FOREIGN KEY (`IdPanier`) REFERENCES `panier` (`IdPanier`),
ADD CONSTRAINT `FK_stockerPanier_numProduit` FOREIGN KEY (`numProduit`) REFERENCES `produit` (`numProduit`);

--
-- Contraintes pour la table `stockewishlist`
--
ALTER TABLE `stockewishlist`
ADD CONSTRAINT `FK_stockeWishlist_NumWishlist` FOREIGN KEY (`NumWishlist`) REFERENCES `wishlist` (`NumWishlist`),
ADD CONSTRAINT `FK_stockeWishlist_numProduit` FOREIGN KEY (`numProduit`) REFERENCES `produit` (`numProduit`);

--
-- Contraintes pour la table `wishlist`
--
ALTER TABLE `wishlist`
ADD CONSTRAINT `FK_WISHLIST_emailClient` FOREIGN KEY (`emailClient`) REFERENCES `client` (`emailClient`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
