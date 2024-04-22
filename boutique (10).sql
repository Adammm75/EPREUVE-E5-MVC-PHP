-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 22 avr. 2024 à 20:52
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idAdministrateur` char(3) NOT NULL,
  `login` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `motdepasse` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idAdministrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idAdministrateur`, `login`, `motdepasse`) VALUES
('1', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda'),
('2', 'admin2', 'c84258e9c39059a89ab77d846ddab909');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` char(32) NOT NULL,
  `libelle` char(32) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelle`) VALUES
('acc', 'accessoire'),
('ordi', 'ordinateur'),
('tel', 'téléphone');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` char(32) NOT NULL,
  `dateCommande` date DEFAULT NULL,
  `nomPrenomClient` char(32) DEFAULT NULL,
  `adresseRueClient` char(32) DEFAULT NULL,
  `cpClient` char(5) DEFAULT NULL,
  `villeClient` char(32) DEFAULT NULL,
  `mailClient` char(50) DEFAULT NULL,
  PRIMARY KEY (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `nomPrenomClient`, `adresseRueClient`, `cpClient`, `villeClient`, `mailClient`) VALUES
('1', '2024-04-22', 'asaad lar', '3 rue auber', '75013', 'paris', 'amekkiou@lerebours.org'),
('2', '2024-04-22', 'asaad lar', '3 rue auber', '75013', 'paris', 'amekkiou@lerebours.org'),
('3', '2024-04-22', 'asaad lar', '3 rue auber', '75013', 'paris', 'amekkiou@lerebours.org'),
('4', '2024-04-22', 'asaad lar', '3 rue auber', '75013', 'paris', 'amekkiou@lerebours.org');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `idCommande` char(32) NOT NULL,
  `idProduit` char(32) NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`idCommande`,`idProduit`),
  KEY `I_FK_CONTENIR_COMMANDE` (`idCommande`),
  KEY `I_FK_CONTENIR_Produit` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`idCommande`, `idProduit`, `quantite`) VALUES
('1', '2', 1),
('3', '2', 2),
('4', '2', 4);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` char(32) NOT NULL,
  `description` char(50) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `image` char(32) DEFAULT NULL,
  `idCategorie` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `prixAchat` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idProduit`),
  KEY `I_FK_Produit_CATEGORIE` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `description`, `prix`, `image`, `idCategorie`, `prixAchat`) VALUES
('2', 'Ordinateur Gamer', 1000.00, 'images/ordinateur/iphone.jpg', 'ordi', 750.00);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`),
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
