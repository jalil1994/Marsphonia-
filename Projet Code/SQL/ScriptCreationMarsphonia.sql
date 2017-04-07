-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 19 Février 2017 à 21:23
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `marsphonia`
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
  `Code_Postal` int(11) DEFAULT NULL,
  `numClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`ville`, `pays`, `rue`, `numero_porte`, `Code_Postal`, `numClient`) VALUES
('marseille', 'france', '12 rue de labbé', 12, 13005, 1),
('marseille', 'france', '62 bis avenue St-Charles', 13, 13003, 2),
('marseille', 'france', '14 rue castellane', 20, 13006, 3);


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
  `IdPanier` int(11) DEFAULT NULL,
  `Points` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`emailClient`, `numClient`, `motdepasse`, `nomClient`, `prenomClient`, `etatCivile`, `num_Tel`, `Points`, `IdPanier`) VALUES
('ghani@yahoo.fr', 1, '01jan', 'mebarki', 'abdelghani', 1, 781842396, 0, NULL),
('hakopedro@gmail.com', 2, '01fev', 'kouachi', 'abdeldjallil', 1, 616887831, 0, NULL),
('stefan@yahoo.fr', 3, '01mars', 'gualandi', 'stefan', 1, 646523990, 0, NULL),
('admin@yahoo.fr', 4, 'admin', 'admin', 'admin', 1, 123456789, 0, NULL);
-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL,
  `confirmationPaiement` tinyint(1) DEFAULT NULL,
  `prix_total` int(11) DEFAULT NULL,
  `dateCommande` date DEFAULT NULL,
  `IdPanier` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `confirmationPaiement`, `prix_total`, `dateCommande`, `IdPanier`) VALUES
(1, 1, 150, '2017/01/02' 1),
(2, 0, 200, '2016/03/02' 2),
(3, 1, 250, '2017/03/02' 3),
(4, 1, 350, '2017/03/03' 4);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `numFacture` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`numFacture`, `idCommande`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `IdPanier` int(11) NOT NULL,
  `numClient` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`IdPanier`, `numClient`) VALUES
(1, 1),
(2, 2),
(3, 3);


-- --------------------------------------------------------

--
-- Structure de la table `LignePanier`
--

CREATE TABLE IF NOT EXISTS `LignePanier` (
  `IdLignePanier` int(11) NOT NULL,
  `IdProduit` int(11) NOT NULL,
  `PrixduProduit` int(11) NOT NULL,
  `IdPanier` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



--
-- Contenu de la table `LignePanier`
--

INSERT INTO `LignePanier` (`IdLignePanier`, `IdProduit`, `quantite`, `PrixduProduit`, `IdPanier`) VALUES 
(1, 2, 3, 200, 3),
(2, 1, 1, 150, 2),
(3, 3, 1, 250, 3);


-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `nomProduit` varchar(25) ,
  `numProduit` int(11) NOT NULL,
  `NombredeVente` int(11) DEFAULT NULL,
  `promo` double DEFAULT NULL,
  `Couleur` varchar(25) DEFAULT NULL,
  `Marque` varchar(25) DEFAULT NULL,
  `Ecran` float DEFAULT NULL,
  `editionLimite` int(11) DEFAULT NULL,
  `prixduproduit` int(11) DEFAULT NULL,
  `datesortie` date DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `foncTexte` longtext
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`nomProduit`,`numProduit`, `NombredeVente`, `promo`, `Couleur`, `Marque`, `Ecran`, `editionLimite`, `prixduproduit`, `datesortie`, `quantite`, `foncTexte`) VALUES
('Iphone 9', 1, 0, NULL,'rouge', 'Apple', 5.5, 0, 150, '2017-02-01', 58, 'caméra '),
('Slide', 2, 0, NULL,'rouge', 'Wiko', 7.3, 0, 200, '2017-02-02', 73, 'photos'),
('S3', 3, 0, 20,'rouge', 'Samsung', 2.5, 500, 250, '2017-02-03', 49, 'camera et photos');



-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `idImage` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `lienImage` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `wishlist`
--

INSERT INTO `images` (`idImage`, `idProduit`, `lienImage`) VALUES
(1, 1, 'img/img1.jpg' ),
(2, 2, 'img/img2.jpg'),
(3, 3, 'img/img3.jpg');


  
-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `NumWishlist` int(11) NOT NULL,
  `numClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `wishlist`
--

INSERT INTO `wishlist` (`NumWishlist`, `numClient`) VALUES
(1, 1),
(2, 2),
(3, 3);


-- --------------------------------------------------------

--
-- Structure de la table `LigneWishlist`
--

CREATE TABLE IF NOT EXISTS `LigneWishlist` (
  `IdLigneWishlist` int(11) NOT NULL,
  `IdProduit` int(11) NOT NULL,
  `IdWishlist` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


--
-- Contenu de la table `LignePanier`
--

INSERT INTO `LigneWishlist` (`IdLigneWishlist`, `IdProduit`, `quantite`, `IdWishlist`) VALUES 
(1, 2, 3, 3),
(2, 1, 1, 2),
(3, 3, 1, 3);


--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`numClient`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`emailClient`), ADD UNIQUE KEY `numClient` (`numClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`numFacture`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`IdPanier`);

--
-- Index pour la table `LignePanier`
--
ALTER TABLE `LignePanier`
  ADD PRIMARY KEY (`IdLignePanier`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`numProduit`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`NumWishlist`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `numClient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `numFacture` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `IdPanier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `LignePanier`
--
ALTER TABLE `LignePanier`
  MODIFY `IdLignePanier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;  
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `numProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
