-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 15 août 2021 à 22:08
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionelection`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `registration_date`) VALUES
(0, 'Nouha Dianko Badji', 'nouhadiankod@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '770897269', '2021-08-12'),
(0, 'Sidy Lamine Badji', 'diankoessyl@gmail.com', 'c33367701511b4f6020ec61ded352059', '771498358', '2021-08-12'),
(0, 'Ndeye gnanga', 'hbdzjh@dfjnk.com', '202cb962ac59075b964b07152d234b70', '770542314', '2021-08-12'),
(0, 'cgvhbjnk,l', 'wdxfcghvjbkp@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '771234580', '2021-08-12'),
(0, 'Mamadou L Diouf', 'mldiouf231@gmail.com', 'lamine', '773966943', '2021-08-14'),
(0, 'Ameth Diouf', 'mldshop7@gmail.com', '0a105960b5aef32bbf0f194417257a53', '0773966943', '2021-08-14');

-- --------------------------------------------------------

--
-- Structure de la table `bureau`
--

DROP TABLE IF EXISTS `bureau`;
CREATE TABLE IF NOT EXISTS `bureau` (
  `s_id` int NOT NULL,
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bureau`
--

INSERT INTO `bureau` (`s_id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `id_candidat` int NOT NULL AUTO_INCREMENT,
  `nom_candidat` varchar(50) NOT NULL,
  `prenom_candidat` varchar(50) NOT NULL,
  `nom_partie` varchar(50) NOT NULL,
  `profession` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `matricule` varchar(50) NOT NULL,
  PRIMARY KEY (`id_candidat`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id_candidat`, `nom_candidat`, `prenom_candidat`, `nom_partie`, `profession`, `matricule`) VALUES
(10, 'SALL', 'ISSA', 'PUR', 'INFORMATICIEN', 'SALLISSA'),
(7, 'SONKO', 'OUSMANE', 'PASTEF', 'INSPECTEUR', 'SONKOOUSMANE'),
(6, 'SALL', 'MACKY', 'APR', 'GEOLOGUE', 'SALLMACKY'),
(9, 'NIANG', 'MADICK', 'TODJ radiakh', 'AVOCAT', 'NIANGMADICKE'),
(13, 'SECK', 'IDRISSA', 'REWMI', 'CONSULTANT AUDITEUR', 'SECKIDRISSA');

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(155) NOT NULL,
  `s_id` int NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`id`, `city_name`, `s_id`, `time_stamp`) VALUES
(1, 'GUEULE TAPEE FASS COLOBANE	', 1, '2019-12-05 16:31:42'),
(2, 'FANN-POINT-E-AMITIE', 1, '2019-12-05 16:31:42'),
(3, 'Assainies-Parcelles-Assainies', 2, '2019-12-05 16:32:49'),
(4, 'DIEUPPEUL-DERKLE', 5, '2019-12-05 16:32:49'),
(5, 'BISCUITERIE', 5, '2019-12-05 17:03:01'),
(6, '-GOREE', 1, '2021-08-10 15:16:03'),
(7, 'MEDINA', 1, '2021-08-10 15:16:03'),
(8, 'Grand-YOFF', 2, '2021-08-10 15:17:09'),
(9, 'PATTE D OIE', 2, '2021-08-10 15:17:09'),
(10, 'HANN BEL AIR', 5, '2021-08-10 15:21:22'),
(11, 'SICAP LIBERTE', 5, '2021-08-10 15:21:22'),
(12, 'YOFF', 6, '2021-08-10 15:24:46'),
(13, 'NGOR', 6, '2021-08-10 15:24:46'),
(14, 'OUAKAM', 6, '2021-08-10 15:24:46'),
(15, 'MERMOZ SACRE COEUR', 6, '2021-08-10 15:24:46'),
(16, 'DALIFORT', 7, '2021-08-10 15:29:36'),
(17, 'DJIDA THIAROYE KAO', 7, '2021-08-10 15:29:36'),
(19, 'GUINAW-RAIL-SUD', 7, '2021-08-10 15:29:36'),
(20, 'GUINAW RAIL NORD', 7, '2021-08-10 15:29:36'),
(21, 'Pikine EST', 7, '2021-08-10 15:29:36'),
(22, 'Pikine NORD', 7, '2021-08-10 15:29:36'),
(23, 'Pikine OUEST', 7, '2021-08-10 15:29:36'),
(24, 'MALIKA	\r\n		\r\n', 8, '2021-08-10 15:32:29'),
(25, 'YEUMBEUL SUD', 8, '2021-08-10 15:32:29'),
(26, 'YEUMBEUL NORD', 8, '2021-08-10 15:32:29');

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country_name` varchar(155) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id`, `country_name`, `time_stamp`) VALUES
(1, 'Dakar', '2019-12-05 16:29:16'),
(2, 'Pikine', '2019-12-05 16:29:16'),
(3, 'Guediawaye', '2019-12-05 16:29:44'),
(4, 'Rufisque', '2019-12-05 16:29:44');

-- --------------------------------------------------------

--
-- Structure de la table `ele`
--

DROP TABLE IF EXISTS `ele`;
CREATE TABLE IF NOT EXISTS `ele` (
  `id_electeur` int NOT NULL AUTO_INCREMENT,
  `num_electeur` int NOT NULL,
  `cni_election` int NOT NULL,
  `nomelecteur` varchar(50) NOT NULL,
  `prenomelecteur` varchar(50) NOT NULL,
  `nompere` varchar(50) NOT NULL,
  `nommere` varchar(50) NOT NULL,
  `datenaissance` date NOT NULL,
  `lieudenaissance` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `arrondissement` int NOT NULL,
  `commune` varchar(50) NOT NULL,
  `bureau` int NOT NULL,
  PRIMARY KEY (`id_electeur`),
  UNIQUE KEY `num_electeur` (`num_electeur`)
) ENGINE=InnoDB AUTO_INCREMENT=588 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ele`
--

INSERT INTO `ele` (`id_electeur`, `num_electeur`, `cni_election`, `nomelecteur`, `prenomelecteur`, `nompere`, `nommere`, `datenaissance`, `lieudenaissance`, `mdp`, `departement`, `arrondissement`, `commune`, `bureau`) VALUES
(576, 19956785, 1654897, 'FALL', 'ASTOU', 'ABDOULAYE', 'DIOUF', '2021-04-09', 'FASS', 'PASSE', '1', 1, 'Dakar', 6),
(577, 2378190, 98765489, 'Diouf', 'Mamadou Lamine ', 'Mamadou', 'Diouf', '2021-07-31', 'FASS', 'LAISSE', '2', 7, 'DALIFORT', 1),
(578, 987654, 173903, 'DIOP', 'NOHINE', 'LAMINE', 'DIOUF', '2006-06-12', 'DIOURBEL', 'NOHINE', '1', 2, 'Grand-YOFF', 4),
(580, 9876544, 67920202, 'DIOP', 'AWA', 'BAYTIR', 'NDIAYE', '2021-08-14', 'SAINT LOUIS', 'PASSE', '2', 7, 'GUINAW', 3),
(581, 99, 123986, 'MBAYE', 'NDEYE GNAGNA', 'MAMADOU ', 'NDIAYE', '2000-06-13', 'KEUR MASSAR', '12345', '1', 2, 'PATTE', 3),
(582, 789, 876543, 'MBAYE', 'NDEYE PENDA', 'LAMINE', 'DIOU', '2021-08-13', 'ESTEL', 'NDEYE', '1', 6, 'OUAKAM', 5),
(583, 345, 1234567, 'ANNE', 'BAYTIR', 'CHEIKH', 'FALL', '2007-06-13', 'YOFF', '12345', '1', 6, 'OUAKAM', 3),
(585, 999, 987654, 'NOUHA', 'BADJI', 'LAMINE', 'DIOIUF', '2021-08-13', 'DAKAR', '12345', '1', 1, 'FANN-POINT-E-AMITIE', 5),
(586, 199, 123985, 'FAYE', 'FALLOU', 'ABDOU', 'FALL', '2004-06-15', 'THIAROYE', 'FALLOU', '2', 0, 'Selection commune', 1),
(587, 219, 4299872, 'NDIAYE', 'CHEIKH', 'PAPE', 'DIOP', '2021-08-27', 'RUFISQUE', 'PAPE', '1', 1, 'FANN-POINT-E-AMITIE', 6);

-- --------------------------------------------------------

--
-- Structure de la table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` int NOT NULL AUTO_INCREMENT,
  `state_name` varchar(155) NOT NULL,
  `c_id` int NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `state`
--

INSERT INTO `state` (`id`, `state_name`, `c_id`, `time_stamp`) VALUES
(1, 'Dakar Plateau', 1, '2019-12-05 16:30:15'),
(2, 'Parcelles Assainies', 1, '2019-12-05 16:30:15'),
(5, 'Grand Dakar', 1, '2019-12-05 17:02:22'),
(6, 'Almadies', 1, '2019-12-05 17:02:22'),
(7, 'Pikine Dagoudane', 2, '2021-08-10 14:51:59'),
(8, 'Niayes', 2, '2021-08-10 14:51:59'),
(9, 'Thiaroye', 2, '2021-08-10 14:55:01'),
(10, 'GOLF SUD', 3, '2021-08-10 14:57:43'),
(11, 'MEDINA GOUNASS', 3, '2021-08-10 14:58:09'),
(12, 'NDIAREME', 3, '2021-08-10 14:58:59'),
(13, 'SAM NOTAIRE', 3, '2021-08-10 14:58:59'),
(14, 'Rufisque', 4, '2021-08-10 15:07:05'),
(15, 'Sangalkam', 4, '2021-08-10 15:07:05');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id_vote` int NOT NULL AUTO_INCREMENT,
  `id_electeur` int NOT NULL,
  `nom_electeur` varchar(50) NOT NULL,
  `prenom_electeur` varchar(50) NOT NULL,
  `id_candidat` int NOT NULL,
  `commune` varchar(50) NOT NULL,
  `bureau` int NOT NULL,
  PRIMARY KEY (`id_vote`),
  UNIQUE KEY `id_electeur` (`id_electeur`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`id_vote`, `id_electeur`, `nom_electeur`, `prenom_electeur`, `id_candidat`, `commune`, `bureau`) VALUES
(4, 580, 'DIOP', 'AWA', 6, 'GUINAW', 3),
(5, 581, 'MBAYE', 'NDEYE GNAGNA', 7, 'PATTE', 3),
(7, 582, 'MBAYE', 'NDEYE PENDA', 6, 'OUAKAM', 5),
(10, 583, 'ANNE', 'BAYTIR', 7, 'OUAKAM', 3),
(12, 585, 'NOUHA', 'BADJI', 10, 'FANN-POINT-E-AMITIE', 5),
(13, 577, 'Diouf', 'Mamadou Lamine ', 9, 'DALIFORT', 1),
(14, 576, 'FALL', 'ASTOU', 11, 'Dakar', 6),
(15, 578, 'DIOP', 'NOHINE', 7, 'Grand-YOFF', 4),
(16, 586, 'FAYE', 'FALLOU', 13, 'Selection commune', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
