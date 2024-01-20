-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 12 jan. 2024 à 12:52
-- Version du serveur : 8.0.35
-- Version de PHP : 8.2.10-2ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `emploi`
--

-- --------------------------------------------------------

--
-- Structure de la table `a_contrat`
--

CREATE TABLE `a_contrat` (
  `id_entreprise` int NOT NULL,
  `id_contrat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `a_secteur_active`
--

CREATE TABLE `a_secteur_active` (
  `id_entreprise` int NOT NULL,
  `id_secteur_activite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `id_candidat` int NOT NULL,
  `civilite` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom_candidat` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numero` decimal(12,0) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'profile.jpeg',
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_niveau_etude` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formation` json DEFAULT NULL,
  `exp_pro` json DEFAULT NULL,
  `id_exp` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_metier` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_contrat` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nationnalite` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Burkinabé'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id_candidat`, `civilite`, `nom_candidat`, `prenom`, `numero`, `email`, `image`, `password`, `id_niveau_etude`, `formation`, `exp_pro`, `id_exp`, `id_metier`, `type_contrat`, `adresse`, `nationnalite`) VALUES
(1, '', 'Achraf Kouanda', 'Kouanda', 12345678, 'Kouandaachraf04@gmail.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(2, 'Mr', 'ODG', 'Achraf', 12345678, 'kouandaachraf02@gmail.com', 'f8edbff1-f966-4fb7-986e-97004252189d.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'Bac+1', '[{\"titre\": [\"vz\"], \"date_fin\": [\"2024-01\"], \"date_debut\": [\"2024-01\"], \"description\": [\"mmmmmmmmmmmmmmmmmmmm\"]}, {\"titre\": [\"vz\", \"iuyhtrg\"], \"date_fin\": [\"2024-01\", \"2025-06\"], \"date_debut\": [\"2024-01\", \"2024-12\"], \"description\": [\"srgtrrrrrrrr\", \"jythrgefw\"]}, {\"titre\": [\"vz\", \"aafa\"], \"date_fin\": [\"2024-01\", \"2024-11\"], \"date_debut\": [\"2024-01\", \"2024-06\"], \"description\": [\"sfsfs\", \"fvsfvsfv\"]}, {\"titre\": [\"vz\", \"aafa\"], \"date_fin\": [\"2024-01\", \"2024-11\"], \"date_debut\": [\"2024-01\", \"2024-06\"], \"description\": [\"sfsfs\", \"fvsfvsfv\"]}, {\"titre\": [\"vz\", \"iuyhtrg\"], \"date_fin\": [\"2024-01\", \"2025-06\"], \"date_debut\": [\"2024-01\", \"2024-12\"], \"description\": [\"srgtrrrrrrrr\", \"jythrgefw\"]}, {\"titre\": [\"vz\", \"iuyhtrg\"], \"date_fin\": [\"2024-01\", \"2025-06\"], \"date_debut\": [\"2024-01\", \"2024-12\"], \"description\": [\"srgtrrrrrrrr\", \"jythrgefw\"]}, {\"titre\": [\"vz\", \"iuyhtrg\"], \"date_fin\": [\"2024-01\", \"2025-06\"], \"date_debut\": [\"2024-01\", \"2024-12\"], \"description\": [\"srgtrrrrrrrr\", \"jythrgefw\"]}]', '[{\"titre\": [\"vz\"], \"date_fin\": [\"2024-01\"], \"date_debut\": [\"2024-01\"], \"description\": [\"mmmmmmmmmmmmmmmmmmmm\"]}, {\"titre\": [\"vz\", \"iuyhtrg\"], \"date_fin\": [\"2024-01\", \"2025-06\"], \"date_debut\": [\"2024-01\", \"2024-12\"], \"description\": [\"srgtrrrrrrrr\", \"jythrgefw\"]}, {\"titre\": [\"vz\", \"aafa\"], \"date_fin\": [\"2024-01\", \"2024-11\"], \"date_debut\": [\"2024-01\", \"2024-06\"], \"description\": [\"sfsfs\", \"fvsfvsfv\"]}, {\"titre\": [\"vz\", \"aafa\"], \"date_fin\": [\"2024-01\", \"2024-11\"], \"date_debut\": [\"2024-01\", \"2024-06\"], \"description\": [\"sfsfs\", \"fvsfvsfv\"]}, {\"titre\": [\"vz\", \"iuyhtrg\"], \"date_fin\": [\"2024-01\", \"2025-06\"], \"date_debut\": [\"2024-01\", \"2024-12\"], \"description\": [\"srgtrrrrrrrr\", \"jythrgefw\"]}, {\"titre\": [\"vz\", \"iuyhtrg\"], \"date_fin\": [\"2024-01\", \"2025-06\"], \"date_debut\": [\"2024-01\", \"2024-12\"], \"description\": [\"srgtrrrrrrrr\", \"jythrgefw\"]}, {\"titre\": [\"vz\", \"iuyhtrg\"], \"date_fin\": [\"2024-01\", \"2025-06\"], \"date_debut\": [\"2024-01\", \"2024-12\"], \"description\": [\"srgtrrrrrrrr\", \"jythrgefw\"]}]', 'Expérience entre 5 ans et 10 ans', 'Juridique', 'Stage', NULL, 'Burkinabé'),
(9, 'Mr', 'ODG', 'Achraf', 12345678, 'kouandaachraf03@gmail.com', 'f8edbff1-f966-4fb7-986e-97004252189d.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'Bac+5 et plus', '[{\"titre\": [\"bdsd d\"], \"date_fin\": [\"2024-02\"], \"date_debut\": [\"2024-01\"], \"description\": [\"ikkkkkkkkkk\"]}]', 'null', '', 'Informatique, nouvelles technologies', 'Temps partiel', NULL, 'Burkinabé'),
(10, 'Mr', 'knd', 'Achraf', 12345678, 'kouandaachraf01@gmail.com', '3b6885e2-a81f-47ca-88dc-a618873ae43c.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'Bac+1', '[{\"titre\": [\"fsdmfg\"], \"date_fin\": [\"2024-07\"], \"date_debut\": [\"2024-01\"], \"description\": [\"ssssssssssssssss\"]}, {\"titre\": [\"fsdmfg\"], \"date_fin\": [\"2024-07\"], \"date_debut\": [\"2024-01\"], \"description\": [\"qawerth\"]}]', '[{\"titre\": null, \"date_fin\": [\"2024-10\"], \"date_debut\": [\"2024-07\"], \"description\": [\"p/oiyt\"]}]', 'Débutant < 2 ans', 'Achats', 'Statuaire', NULL, 'Burkinabé'),
(11, 'Mr', 'KABORE', 'Romaric', 12345678, 'romaricKbr@gmail.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(18, 'Mr', 'Doe1', 'John1', 1234567891, 'john1.doe@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(19, 'Mme', 'Smith2', 'Alice2', 987654322, 'alice2.smith@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(20, 'Mr', 'Doe3', 'John3', 1234567893, 'john3.doe@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(21, 'Mme', 'Smith4', 'Alice4', 987654324, 'alice4.smith@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(22, 'Mr', 'Doe5', 'John5', 1234567895, 'john5.doe@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(23, 'Mme', 'Smith50', 'Alice50', 987654350, 'alice50.smith@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(24, 'Mr', 'Kaboré1', 'Ousmane1', 12345678911, 'ousmane1.kabore@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(25, 'Mme', 'Traoré2', 'Aminata2', 9876543222, 'aminata2.traore@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(26, 'Mr', 'Ouédraogo3', 'Sékou3', 12345678933, 'sekou3.ouedraogo@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(27, 'Mme', 'Yaméogo4', 'Fanta4', 9876543244, 'fanta4.yameogo@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(28, 'Mr', 'Sanou5', 'Issa5', 12345678955, 'issa5.sanou@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(29, 'Mme', 'Bamogo50', 'Adjaratou50', 98765435050, 'adjaratou50.bamogo@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(30, 'Mr', 'Zongo', 'Seydou', 12345678911, 'seydou.zongo@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(31, 'Mme', 'Kaboré', 'Aminata', 9876543222, 'aminata.kabore@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(32, 'Mr', 'Sanou', 'Issouf', 12345678933, 'issouf.sanou@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(33, 'Mme', 'Traoré', 'Adjaratou', 9876543244, 'adjaratou.traore@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(34, 'Mr', 'Ouédraogo', 'Boukary', 12345678955, 'boukary.ouedraogo@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(35, 'Mme', 'Bamogo', 'Fanta', 98765435050, 'fanta.bamogo@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(36, 'Mr', 'Ouedraogo', 'Sidi', 12345678911, 'sidi.ouedraogo1@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(37, 'Mme', 'Kone', 'Mariam', 9876543222, 'mariam.kone2@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(38, 'Mr', 'Bamogo', 'Issouf', 12345678933, 'issouf.bamogo3@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(39, 'Mme', 'Sanogo', 'Fanta', 9876543244, 'fanta.sanogo4@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(40, 'Mr', 'Lingani', 'Adama', 12345678955, 'adama.lingani5@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(41, 'Mme', 'Traore', 'Nathalie', 98765435050, 'nathalie.traore50@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(42, 'Mr', 'Kouamé', 'Sékou', 12345678911, 'sekou.kouame1@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(43, 'Mme', 'Traoré', 'Aminata', 9876543222, 'aminata.traore2@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(44, 'Mr', 'Diabaté', 'Issouf', 12345678933, 'issouf.diabate3@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(45, 'Mme', 'Koné', 'Aïcha', 9876543244, 'aicha.kone4@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(46, 'Mr', 'Yao', 'Abdoulaye', 12345678955, 'abdoulaye.yao5@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(47, 'Mme', 'Cissé', 'Nathalie', 98765435050, 'nathalie.cisse50@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(48, 'Mr', 'Diop', 'Sékou', 12345678911, 'sekou.diop1@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(49, 'Mme', 'Ndiaye', 'Aminata', 9876543222, 'aminata.ndiaye2@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(50, 'Mr', 'Sow', 'Issouf', 12345678933, 'issouf.sow3@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(51, 'Mme', 'Fall', 'Aïcha', 9876543244, 'aicha.fall4@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(52, 'Mr', 'Ba', 'Abdoulaye', 12345678955, 'abdoulaye.ba5@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(53, 'Mme', 'Diallo', 'Nathalie', 98765435050, 'nathalie.diallo50@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(54, 'Mr', 'Sani', 'Sékou', 12345678911, 'sekou.sani1@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(55, 'Mme', 'Diallo', 'Aminata', 9876543222, 'aminata.diallo2@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(56, 'Mr', 'Issa', 'Issouf', 12345678933, 'issouf.issa3@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(57, 'Mme', 'Adamou', 'Aïcha', 9876543244, 'aicha.adamou4@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(58, 'Mr', 'Mahamadou', 'Abdoulaye', 12345678955, 'abdoulaye.mahamadou5@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(59, 'Mme', 'Abdou', 'Nathalie', 98765435050, 'nathalie.abdou50@example.com', 'profile.jpeg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé'),
(60, '', 'Achraf Kouanda', 'Kouanda', 112234566666, 'Kouandaachraf05@gmail.com', 'profile.jpeg', 'fe703d258c7ef5f50b71e06565a65aa07194907f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Burkinabé');

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id_contrat` int NOT NULL,
  `type` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id_contrat`, `type`) VALUES
(1, 'CDI'),
(2, 'CDD'),
(3, 'Intérim'),
(4, 'Stage'),
(5, 'Freelance'),
(6, 'Statuaire'),
(7, 'Alternance'),
(8, 'Temps partiel');

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `id_emploi` int NOT NULL,
  `id_entreprise` int NOT NULL,
  `poste` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `contrat` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` int NOT NULL,
  `Description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `competence` text COLLATE utf8mb4_general_ci NOT NULL,
  `localite` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secteur_activite` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `niveau` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_publication` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`id_emploi`, `id_entreprise`, `poste`, `contrat`, `nombre`, `Description`, `competence`, `localite`, `image`, `secteur_activite`, `niveau`, `date_publication`, `date_modification`, `views`) VALUES
(1, 3, 'Aide macon', 'CDD', 2, 'pour aider dans la constrution d\'un immeuble', 'pas de competences requises', 'Ouagadougou', 'WhatsApp Image 2023-12-28 at 02.07.13.jpeg', 'BTP, construction', 'Qualification avant bac', '2024-01-10 16:53:35', '2024-01-10 16:53:35', 5),
(2, 3, 'Ingenieure en systeme d\'information et reseau', 'CDI', 2, 'Pour etre un administrateur de base de donnes', 'Avoir une licence en systeme d\'information et reseau', 'Ouagadougou', 'WhatsApp Image 2023-12-28 at 02.07.13.jpeg', 'Informatique, SSII, Internet', 'Bac+3', '2024-01-10 17:09:50', '2024-01-10 17:09:50', 1),
(3, 4, 'Enseignant en Merise', 'Temps partiel', 2, 'Le métier d’enseignant en Merise consiste à enseigner la méthode de conception de systèmes d’information Merise à des étudiants. Les compétences requises pour être un enseignant en Merise sont variées et peuvent être classées en deux grandes catégories : compétences techniques et compétences interpersonnelles 1. Les enseignants en Merise doivent avoir des compétences techniques solides en informatique, notamment en programmation, en base de données, en réseaux, en sécurité informatique, etc. Ils doivent également être capables de communiquer efficacement avec les étudiants, de les motiver, de les aider à résoudre les problèmes, de les encourager à travailler en équipe, etc. En outre, les enseignants en Merise doivent être passionnés par leur travail, être patients, être organisés, être créatifs, être capables de travailler sous pression, etc', 'Les enseignants en Merise doivent avoir des compétences techniques solides en informatique, notamment en programmation, en base de données, en réseaux, en sécurité informatique, etc', 'Ouagadougou', '', 'Éducation, formation', '', '2024-01-11 16:38:24', '2024-01-11 16:38:24', 9),
(4, 4, 'Enseignant en devellopement mobile', 'CDI', 1, 'Le développeur d’application mobile est un expert en création d’applications destinées à des supports mobiles, comme la tablette, le smartphone, ou encore les objets connectés. Il doit être parfaitement à l’aise avec les calculs d’algorithmes, la création de tests, et doit attester de solides connaissances en informatique et en mathématiques 1. En plus de ces compétences techniques, le professeur d’application mobile doit également posséder des compétences pédagogiques pour transmettre ses connaissances aux étudiants. Il doit faire preuve de pédagogie et adapter son discours à ses interlocuteurs. L’autonomie, l’imagination, la réactivité, l’écoute, la rigueur, la précision et la logique sont des qualités indispensables pour ce métier .', 'maitriser les langages de programmation les plus couramment utilisés pour le développement d’applications mobiles sont Java, Swift, Objective-C, Kotlin, C#, JavaScript, HTML, CSS, Python 23.', 'Ouagadougou', '', 'Éducation, formations', 'Bac+5', '2024-01-11 21:00:19', '2024-01-11 21:00:19', 92),
(5, 4, 'Ingenieure en systeme d\'information et reseau', 'Stage', 1, 'Il semble que vous ayez mentionné votre domaine d\'études ou de travail en tant qu\'ingénieur en systèmes d\'information et réseau. C\'est un domaine passionnant qui englobe la conception, le déploiement et la gestion de systèmes informatiques et de réseaux au sein d\'une organisation. Les ingénieurs en systèmes d\'information et réseau peuvent être impliqués dans divers aspects, tels que la conception de l\'architecture réseau, la sécurité informatique, la gestion des bases de données, la virtualisation, la gestion de projet, et bien plus encore.', 'Compétences techniques :\r\n\r\nArchitecture réseau : Comprendre la conception, la mise en œuvre et la maintenance des infrastructures réseau.\r\nAdministration système : Gérer les systèmes d\'exploitation, les serveurs et les services associés.\r\nSécurité informatique : Protéger les systèmes et réseaux contre les menaces potentielles.\r\nVirtualisation : Maîtriser les technologies de virtualisation pour optimiser les ressources informatiques.\r\nGestion des bases de données : Connaître les bases de données et leurs opérations.\r\nDéveloppement de scripts/automatisation : Utiliser des langages de script pour automatiser des tâches répétitives.\r\nDépannage réseau : Identifier et résoudre les problèmes réseau.\r\nCompétences non techniques :\r\n\r\nGestion de projet : Planifier, exécuter et superviser des projets liés aux systèmes d\'information.\r\nCommunication : Excellentes compétences en communication pour expliquer des concepts techniques aux non-techniciens.\r\nAnalyse et résolution de problèmes : Identifier et résoudre efficacement les problèmes complexes.\r\nTravail d\'équipe : Collaborer avec des collègues, d\'autres départements et des parties prenantes externes.\r\nApprentissage continu : Les technologies évoluent rapidement, la capacité à apprendre de nouvelles compétences est essentielle.\r\nCompétences spécifiques au domaine :\r\n\r\nGestion de la mobilité : Pour les ingénieurs travaillant sur des réseaux sans fil et la connectivité mobile.\r\nCloud computing : Comprendre et travailler avec des services basés sur le cloud.\r\nInternet des objets (IoT) : Pour ceux impliqués dans des projets liés à l\'IoT.', 'Koudougou', 'banner3.jpg', 'Informatique, SSII, Internet', 'Bac+3', '2024-01-12 12:48:47', '2024-01-12 12:48:47', 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int NOT NULL,
  `nom_entreprise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse_entreprise` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_entreprise` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_entreprise` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo_entreprise` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `site` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ville` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `code_postal` int DEFAULT NULL,
  `nom` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fonction` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom_entreprise`, `adresse_entreprise`, `email_entreprise`, `password_entreprise`, `logo_entreprise`, `site`, `ville`, `code_postal`, `nom`, `prenom`, `fonction`, `numero`) VALUES
(1, 'Kouanda Achraf Kouanda', 'Ouagadougou,Somgande', 'kouandaachraf@gmail.com', 'dvsgfsg', 'dss', 'sdfrsdr', 'grgsr', 1234, 'gsrgse', 'rgsrgse', 'rgsrgs', 1234),
(2, 'knd', 'Ouagadougou,Somgande', 'odg@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', '', ' www.site.bf', 'Ouagadougou', 12345, 'odg', 'vzrgsr', '', 12345678),
(3, 'Achra KND', 'Burkina Faso, Ouahigouya, secteur 15(Gourga)', 'knd@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'IMG_20210519_103835_4.jpg', ' www.site.bf', 'Ouahigouya', 12345, 'odg', 'vzrgsr', '', 12345678),
(4, 'ESTA', 'Ouagadougou,Somgande', 'compaore@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'banner3.jpg', 'www.esta.bf', 'Ouagadougou', 12345, 'COMPAORE', 'EZECKIEL', 'charge de communication et des relations exterierure', 64149097);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id_exp` int NOT NULL,
  `experience` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id_exp`, `experience`) VALUES
(1, 'Étudiant, jeune diplômé'),
(2, 'Débutant < 2 ans'),
(3, 'Expérience entre 2 ans et 5 ans'),
(4, 'Expérience entre 5 ans et 10 ans'),
(5, 'Expérience > 10 ans');

-- --------------------------------------------------------

--
-- Structure de la table `metier`
--

CREATE TABLE `metier` (
  `id_metier` int NOT NULL,
  `description_metier` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `metier`
--

INSERT INTO `metier` (`id_metier`, `description_metier`) VALUES
(1, 'Achats'),
(2, 'Commercial, vente'),
(3, 'Gestion, comptabilité, finance'),
(4, 'Informatique, nouvelles technologies'),
(5, 'Juridique'),
(6, 'Management, direction générale'),
(7, 'Marketing, communication'),
(8, 'Métiers de la santé et du social'),
(9, 'Métiers des services'),
(10, 'Métiers du BTP'),
(11, 'Production, maintenance, qualité'),
(12, 'R&D, gestion de projets'),
(13, 'RH, formation'),
(14, 'Secrétariat, assistanat'),
(15, 'Télémarketing, téléassistance'),
(16, 'Tourisme, hôtellerie, restauration'),
(17, 'Transport, logistique');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id_exp` int NOT NULL,
  `id_niveau_etude` int NOT NULL,
  `id_candidat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau_etude`
--

CREATE TABLE `niveau_etude` (
  `id_niveau_etude` int NOT NULL,
  `niveau` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau_etude`
--

INSERT INTO `niveau_etude` (`id_niveau_etude`, `niveau`) VALUES
(1, 'Qualification avant bac'),
(2, 'Bac'),
(3, 'Bac+1'),
(4, 'Bac+2'),
(5, 'Bac+3'),
(6, 'Bac+4'),
(7, 'Bac+5 et plus');

-- --------------------------------------------------------

--
-- Structure de la table `password_forget`
--

CREATE TABLE `password_forget` (
  `id` int NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `password_forget`
--

INSERT INTO `password_forget` (`id`, `email`, `token`) VALUES
(2, 'Kouandaachraf01@gmail.com', 'd3f45da6729685b15bb5b36523004907'),
(3, 'Kouandaachraf01@gmail.com', '689e2c1be9f0f6778649572e0be7ac70'),
(4, 'Kouandaachraf01@gmail.com', '53fab5a86ad5aa9808e503e20086565c'),
(5, 'Kouandaachraf01@gmail.com', 'a34dbfc5d1f4102f7e13ab1bdc6bbdb7'),
(6, 'Kouandaachraf01@gmail.com', '1798bdcf88bb8f5e3ed8398f906fa380'),
(7, 'Kouandaachraf01@gmail.com', '208fab086cebf4d4ad0ddf3b435695af'),
(8, 'Kouandaachraf01@gmail.com', '44a4208665f91ec4f838c8e5db370ba2'),
(9, 'Kouandaachraf01@gmail.com', 'e132cf05827c89d7ada643d3ac2b9744'),
(10, 'Kouandaachraf01@gmail.com', '03e323e0d37a9be60b2fb607d9640a40'),
(11, 'kouandaachraf02@gmail.com', '8b1c31b88b4f5296a29f05a844549dba'),
(12, 'Kouandaachraf01@gmail.com', 'bf7433ce182f636f08cc15b0f9e0a78c'),
(13, 'kouandaachraf02@gmail.com', 'e30c7a346b3f206875d174db2a00df74'),
(14, 'Kouandaachraf05@gmail.com', '5f1c29db854a1db953350b470d716389'),
(15, 'Kouandaachraf04@gmail.com', '5b11bd5b8cea351a3cc23eee1c7a1982'),
(16, 'kouandaachraf02@gmail.com', '2fa8e3dc674a52f5a0fd3d809fc3f44f'),
(17, 'Kouandaachraf01@gmail.com', '7dfd08bacbb665ba4540f60b8df0818d'),
(18, 'knd@gmail.com', 'b572e63e7d720cb4b2a792fa61dd5890'),
(19, 'knd@gmail.com', 'ff238c3da7aa9c3963bdbfada722e0d8'),
(20, 'knd@gmail.com', 'bd5d49b629f9e7ec3b0499ac308fff09'),
(21, 'knd@gmail.com', 'fc87e09ce0d3d7cdd4a8e5ba104a9084'),
(22, 'knd@gmail.com', '2f9207e96f0fa1cfe63864598d6f924c'),
(23, 'knd@gmail.com', '1515c72feff8687a0451ad722ca19e3c'),
(24, 'knd@gmail.com', '10d1ac26137c5dacba3b8586d410182f'),
(25, 'knd@gmail.com', '351d0a6ca89d9c3daf512c76475e9b95'),
(26, 'knd@gmail.com', 'f3a424691e0297824996f1a06cefccb2'),
(27, 'knd@gmail.com', 'c80d6ccac9ec6804b96fcc672e969e42'),
(28, 'knd@gmail.com', 'ac43a9f0d18dc3834a6f441e04479ac5'),
(29, 'kouandaachraf01@gmail.com', '3effbaf249a89d11148657468b75114f');

-- --------------------------------------------------------

--
-- Structure de la table `postuler`
--

CREATE TABLE `postuler` (
  `id_postuler` int NOT NULL,
  `id_emploi` int NOT NULL,
  `id_candidat` int NOT NULL,
  `id_entreprise` int NOT NULL,
  `cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_publication` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postuler`
--

INSERT INTO `postuler` (`id_postuler`, `id_emploi`, `id_candidat`, `id_entreprise`, `cv`, `date_publication`) VALUES
(2, 4, 2, 4, 'reportage-odess_mosan-startupbrics_vf2-1.pdf', '2024-01-12 00:53:44'),
(7, 4, 10, 4, 'reportage-odess_mosan-startupbrics_vf2-1.pdf', '2024-01-12 00:54:06'),
(8, 3, 2, 4, 'reportage-odess_mosan-startupbrics_vf2-1.pdf', '2024-01-12 00:54:17'),
(9, 1, 2, 3, 'reportage-odess_mosan-startupbrics_vf2-1.pdf', '2024-01-12 00:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

CREATE TABLE `proposer` (
  `id_entreprise` int NOT NULL,
  `id_emploi` int NOT NULL,
  `date_proposer` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `publier_offre`
--

CREATE TABLE `publier_offre` (
  `id_entreprise` int NOT NULL,
  `id_emploi` int NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

CREATE TABLE `recherche` (
  `id_candidat` int NOT NULL,
  `id_metier` int NOT NULL,
  `id_secteur_activite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `secteur_activite`
--

CREATE TABLE `secteur_activite` (
  `id_secteur_activite` int NOT NULL,
  `dsc_secteur_activite` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `secteur_activite`
--

INSERT INTO `secteur_activite` (`id_secteur_activite`, `dsc_secteur_activite`) VALUES
(1, 'Activités associatives'),
(2, 'Administration publique'),
(3, 'Aéronautique, navale'),
(4, 'Agriculture, pêche, aquaculture'),
(5, 'Agroalimentaire'),
(6, 'Ameublement, décoration'),
(7, 'Automobile, matériels de transport, réparation'),
(8, 'Banque, assurance, finances'),
(9, 'BTP, construction'),
(10, 'Centres d´appel, hotline, call center'),
(11, 'Chimie, pétrochimie, matières premières, mines'),
(12, 'Conseil, audit, comptabilité'),
(13, 'Distribution, vente, commerce de gros'),
(14, 'Édition, imprimerie'),
(15, 'Éducation, formation'),
(16, 'Electricité, eau, gaz, nucléaire, énergie'),
(17, 'Environnement, recyclage'),
(18, 'Equip. électriques, électroniques, optiques, précision'),
(19, 'Equipements mécaniques, machines'),
(20, 'Espaces verts, forêts, chasse'),
(21, 'Évènementiel, hôte(sse), accueil'),
(22, 'Hôtellerie, restauration'),
(23, 'Immobilier, architecture, urbanisme'),
(24, 'Import, export'),
(25, 'Industrie pharmaceutique'),
(26, 'Industrie, production, fabrication, autres'),
(27, 'Informatique, SSII, Internet'),
(28, 'Ingénierie, études développement'),
(29, 'Intérim, recrutement'),
(30, 'Location'),
(31, 'Luxe, cosmétiques'),
(32, 'Maintenance, entretien, service après vente'),
(33, 'Manutention'),
(34, 'Marketing, communication, médias'),
(35, 'Métallurgie, sidérurgie'),
(36, 'Nettoyage, sécurité, surveillance'),
(37, 'Papier, bois, caoutchouc, plastique, verre, tabac'),
(38, 'Produits de grande consommation'),
(39, 'Qualité, méthodes'),
(40, 'Recherche et développement'),
(41, 'Santé, pharmacie, hôpitaux, équipements médicaux'),
(42, 'Secrétariat'),
(43, 'Services aéroportuaires et maritimes'),
(44, 'Services autres'),
(45, 'Services collectifs et sociaux, services à la personne'),
(46, 'Sport, action culturelle et sociale'),
(47, 'Télécom'),
(48, 'Textile, habillement, cuir, chaussures'),
(49, 'Tourisme, loisirs'),
(50, 'Transports, logistique, services postaux');

-- --------------------------------------------------------

--
-- Structure de la table `zone_geo`
--

CREATE TABLE `zone_geo` (
  `id_zone_geo` int NOT NULL,
  `lieu` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `zone_geo`
--

INSERT INTO `zone_geo` (`id_zone_geo`, `lieu`) VALUES
(1, 'Banfora'),
(2, 'Bobo Dioulasso'),
(3, 'Dédougou'),
(4, 'Dori'),
(5, 'Fada N\'Gourma'),
(6, 'Gaoua'),
(7, 'Kaya'),
(8, 'Koudougou'),
(9, 'Manga'),
(10, 'Ouagadougou'),
(11, 'Ouahigouya'),
(12, 'Tenkodogo'),
(13, 'Ziniaré');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `a_contrat`
--
ALTER TABLE `a_contrat`
  ADD KEY `id_entreprise` (`id_entreprise`),
  ADD KEY `id_contrat` (`id_contrat`);

--
-- Index pour la table `a_secteur_active`
--
ALTER TABLE `a_secteur_active`
  ADD KEY `id_entreprise` (`id_entreprise`),
  ADD KEY `id_secteur_activite` (`id_secteur_activite`);

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id_candidat`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id_contrat`);

--
-- Index pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`id_emploi`),
  ADD KEY `id_zone_geo` (`localite`),
  ADD KEY `contrat` (`contrat`),
  ADD KEY `secteur_activite` (`secteur_activite`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`),
  ADD UNIQUE KEY `nom_entreprise` (`nom_entreprise`),
  ADD UNIQUE KEY `email_entreprise` (`email_entreprise`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_exp`);

--
-- Index pour la table `metier`
--
ALTER TABLE `metier`
  ADD PRIMARY KEY (`id_metier`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD KEY `id_exp` (`id_exp`),
  ADD KEY `id_niveau_etude` (`id_niveau_etude`),
  ADD KEY `id_candidat` (`id_candidat`);

--
-- Index pour la table `niveau_etude`
--
ALTER TABLE `niveau_etude`
  ADD PRIMARY KEY (`id_niveau_etude`);

--
-- Index pour la table `password_forget`
--
ALTER TABLE `password_forget`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD PRIMARY KEY (`id_postuler`),
  ADD KEY `id_emploi` (`id_emploi`),
  ADD KEY `id_candidat` (`id_candidat`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- Index pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD PRIMARY KEY (`id_entreprise`,`id_emploi`),
  ADD KEY `FK_proposer_id_emploi` (`id_emploi`);

--
-- Index pour la table `publier_offre`
--
ALTER TABLE `publier_offre`
  ADD KEY `id_entreprise` (`id_entreprise`),
  ADD KEY `id_emploi` (`id_emploi`);

--
-- Index pour la table `recherche`
--
ALTER TABLE `recherche`
  ADD KEY `id_candidat` (`id_candidat`),
  ADD KEY `id_metier` (`id_metier`),
  ADD KEY `id_secteur_activite` (`id_secteur_activite`);

--
-- Index pour la table `secteur_activite`
--
ALTER TABLE `secteur_activite`
  ADD PRIMARY KEY (`id_secteur_activite`);

--
-- Index pour la table `zone_geo`
--
ALTER TABLE `zone_geo`
  ADD PRIMARY KEY (`id_zone_geo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id_candidat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id_contrat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `id_emploi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_exp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `metier`
--
ALTER TABLE `metier`
  MODIFY `id_metier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `niveau_etude`
--
ALTER TABLE `niveau_etude`
  MODIFY `id_niveau_etude` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `password_forget`
--
ALTER TABLE `password_forget`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `postuler`
--
ALTER TABLE `postuler`
  MODIFY `id_postuler` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `proposer`
--
ALTER TABLE `proposer`
  MODIFY `id_entreprise` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `secteur_activite`
--
ALTER TABLE `secteur_activite`
  MODIFY `id_secteur_activite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `zone_geo`
--
ALTER TABLE `zone_geo`
  MODIFY `id_zone_geo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `a_contrat`
--
ALTER TABLE `a_contrat`
  ADD CONSTRAINT `a_contrat_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`),
  ADD CONSTRAINT `a_contrat_ibfk_2` FOREIGN KEY (`id_contrat`) REFERENCES `contrat` (`id_contrat`);

--
-- Contraintes pour la table `a_secteur_active`
--
ALTER TABLE `a_secteur_active`
  ADD CONSTRAINT `a_secteur_active_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`),
  ADD CONSTRAINT `a_secteur_active_ibfk_2` FOREIGN KEY (`id_secteur_activite`) REFERENCES `secteur_activite` (`id_secteur_activite`);

--
-- Contraintes pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

--
-- Contraintes pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `niveau_ibfk_1` FOREIGN KEY (`id_exp`) REFERENCES `experience` (`id_exp`),
  ADD CONSTRAINT `niveau_ibfk_2` FOREIGN KEY (`id_niveau_etude`) REFERENCES `niveau_etude` (`id_niveau_etude`),
  ADD CONSTRAINT `niveau_ibfk_3` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`);

--
-- Contraintes pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD CONSTRAINT `postuler_ibfk_1` FOREIGN KEY (`id_emploi`) REFERENCES `emploi` (`id_emploi`),
  ADD CONSTRAINT `postuler_ibfk_2` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`),
  ADD CONSTRAINT `postuler_ibfk_3` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `FK_proposer_id_emploi` FOREIGN KEY (`id_emploi`) REFERENCES `emploi` (`id_emploi`),
  ADD CONSTRAINT `FK_proposer_id_entreprise` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

--
-- Contraintes pour la table `publier_offre`
--
ALTER TABLE `publier_offre`
  ADD CONSTRAINT `publier_offre_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`),
  ADD CONSTRAINT `publier_offre_ibfk_2` FOREIGN KEY (`id_emploi`) REFERENCES `emploi` (`id_emploi`);

--
-- Contraintes pour la table `recherche`
--
ALTER TABLE `recherche`
  ADD CONSTRAINT `recherche_ibfk_1` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`),
  ADD CONSTRAINT `recherche_ibfk_2` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`id_metier`),
  ADD CONSTRAINT `recherche_ibfk_3` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`),
  ADD CONSTRAINT `recherche_ibfk_4` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`id_metier`),
  ADD CONSTRAINT `recherche_ibfk_5` FOREIGN KEY (`id_secteur_activite`) REFERENCES `secteur_activite` (`id_secteur_activite`),
  ADD CONSTRAINT `recherche_ibfk_6` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`),
  ADD CONSTRAINT `recherche_ibfk_7` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`id_metier`),
  ADD CONSTRAINT `recherche_ibfk_8` FOREIGN KEY (`id_secteur_activite`) REFERENCES `secteur_activite` (`id_secteur_activite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;