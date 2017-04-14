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
('marseille', 'france', '14 rue castellane', 20, 13006, 3),
('Paris', 'france', '12 Champs Elysés', 6, 97000, 4),
('Trets', 'france', '2360 chemin perdu', 2360, 13658, 5),
('Hyeres', 'france', '486 rue galinette', 486, 83400, 6),
('La crau', 'france', '25 rue du bled', 25, 83614, 7);


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
  `Points` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`emailClient`, `numClient`, `motdepasse`, `nomClient`, `prenomClient`, `etatCivile`, `num_Tel`, `Points`) VALUES
('ghani@yahoo.fr', 1, '01jan', 'mebarki', 'abdelghani', 1, 781842396, 20),
('hakopedro@gmail.com', 2, '01fev', 'kouachi', 'abdeldjallil', 1, 616887831, 40),
('stefan@yahoo.fr', 3, '01mars', 'gualandi', 'stefan', 1, 646523990, 0),
('george@yahoo.fr', 5, 'george', 'Dupond', 'george', 1, 0652369874, 0),
('david@yahoo.fr', 6, 'david', 'Hollande', 'david', 1, 0789451220, 20),
('francoise@yahoo.fr', 7, 'francoise', 'Melanchon', 'francoise', 0, 0632659845, 0),
('admin@yahoo.fr', 4, 'admin', 'admin', 'admin', 1, 123456789, 0);
-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL,
  `confirmationPaiement` tinyint(1) DEFAULT NULL,
  `prix_total` int(11) DEFAULT NULL,
  `dateCommande` date DEFAULT NULL,
  `IdClient` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `confirmationPaiement`, `prix_total`, `dateCommande`, `IdClient`) VALUES
(1, 1, 909, '2017-01-02', 1),
(2, 0, 909, '2016-03-02', 2),
(3, 1, 450, '2017-03-02', 3),
(4, 1, 350, '2017-03-30', 4),
(5, 0, 439, '2017-04-02', 5),
(6, 1, 668, '2016-01-02', 6),
(7, 1, 200, '2017-02-22', 7),
(8, 1, 80, '2017-03-12', 2),
(9, 0, 250, '2017-04-10', 5),
(10, 1, 857, '2016-12-25', 3);

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
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);
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
(5, 5),
(4, 4),
(6, 6),
(7, 7);


-- --------------------------------------------------------

--
-- Structure de la table `LignePanier`
--

CREATE TABLE IF NOT EXISTS `LignePanier` (
  `IdLignePanier` int(11) NOT NULL,
  `IdProduit` int(11) NOT NULL,
  `IdPanier` int(11) NOT NULL,
  `numCommande` BIGINT DEFAULT NULL,  
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



--
-- Contenu de la table `LignePanier`
--

INSERT INTO `LignePanier` (`IdLignePanier`, `IdProduit`, `quantite`, `IdPanier`, `numCommande`) VALUES 
(1, 2, 3, 3, NULL),
(2, 10, 7, 5, NULL),
(4, 8, 6, 8, NULL),
(5, 5, 3, 6, NULL),
(6, 7, 4, 6, NULL),
(7, 4, 8, 2, NULL),
(8, 4, 6, 1, NULL),
(9, 3, 4, 9, NULL),
(10, 9, 1, 4, NULL),
(11, 2, 1, 7, NULL),
(12, 10, 1, 10, NULL),
(13, 6, 2, 10, NULL),
(3, 3, 5, 3, NULL);


-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `nomProduit` varchar(25) ,
  `numProduit` int(11) NOT NULL,
  `NombredeVente` int(11) DEFAULT NULL,
  `promo` int ,
  `Couleur` varchar(25) DEFAULT NULL,
  `Marque` varchar(25) DEFAULT NULL,
  `Ecran` float DEFAULT NULL,
  `editionLimite` int(11) DEFAULT NULL,
  `prixduproduit` Double DEFAULT NULL,
  `datesortie` date DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `foncTexte` longtext
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`nomProduit`,`numProduit`, `NombredeVente`, `promo`, `Couleur`, `Marque`, `Ecran`, `editionLimite`, `prixduproduit`, `datesortie`, `quantite`, `foncTexte`) VALUES
('Galaxy S8+', 4, 20, 15,'Argenté', 'Samsung', 6.2, 20000, 850, '2017-04-20', 150, 'caméra 12 mégapixels, 8 coeurs, 4Go de RAM, Connexion 4G '),
('8 Premium', 5, 32, 0,'Or', 'Honor', 5.2, 0, 418, '2017-03-18', 62, 'Processeur 4*2.3Ghz,  Photo 12Mp + Frontal 8Mp,  Wifi,  Bluetooth, Capteur d empreinte digitale, Double SIM '),
('Galaxy A5', 6, 12, 10,'Bleu', 'Samsung', 5.2, 0, 450, '2016-12-25', 42, 'caméra 16 mégapixels, 1.9 GHz - 8 coeurs, mémoire interne : 32 Go, Android 6.0.1'),
('K6 Note', 7, 25, 0,'Or', 'Lenovo', 5.5, 150000, 250, '2017-01-01', 74, 'Ecran Full HD IPS, batterie 4000 mAh, 1.4 GHz - 8 coeurs, RAM : 3 Go'),
('Freddy', 8, 22, 0,'Orange', 'Wiko', 5, 0, 80, '2017-02-10', 150, 'caméra 5 mégapixels, mémoire interne : 8 Go, 1.1 GHz - Quadruple coeur, RAM : 1 Go'),
('Zenfone Go', 9, 11, 10,'Mauve', 'ASUS', 4.5, 30000, 225, '2017-03-21', 200, 'caméra 13 mégapixels, batterie 2600 mAh, mémoire interne : 16 Go, Quadruple coeur'),
('U Play', 10, 28, 0,'Noir Nacré', 'HTC', 6.5, 0, 439, '2017-02-23', 124, 'caméra 12 mégapixels, batterie 2600 mAh, 2 GHz - 8 coeurs, Protection : Verre Corning Gorilla'),
('Slide', 2, 2, 0,'rouge', 'Wiko', 7.3, 0, 200, '2017-02-02', 73, 'photos'),
('Rainbow', 1, 5, 0,'gris', 'Wiko', 5.3, 0, 174, '2017-03-30', 64, '4G, photo 10 Mp, radio, Bluetooth, appel, sms'),
('S3', 3, 1, 20,'rouge', 'Samsung', 2.5, 500, 300, '2017-02-03', 49, 'camera et photos');



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
(4, 4, 'img/img4.jpg'),
(5, 5, 'img/img5.jpg'),
(6, 6, 'img/img6.jpg'),
(7, 7, 'img/img7.jpg'),
(8, 8, 'img/img8.jpg'),
(9, 9, 'img/img9.jpg'),
(10, 10, 'img/img10.jpg'),
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
