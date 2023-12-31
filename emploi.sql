-- Adminer 4.8.1 MySQL 8.0.35-0ubuntu0.23.10.1 dump

SET NAMES utf8; SET time_zone = '+00:00'; SET foreign_key_checks = 0; SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `a_contrat`; CREATE TABLE `a_contrat` (
  `id_entreprise` int NOT NULL, `id_contrat` int NOT NULL, KEY `id_entreprise` (`id_entreprise`), KEY `id_contrat` 
  (`id_contrat`), CONSTRAINT `a_contrat_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`), 
  CONSTRAINT `a_contrat_ibfk_2` FOREIGN KEY (`id_contrat`) REFERENCES `contrat` (`id_contrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `a_secteur_active`; CREATE TABLE `a_secteur_active` (
  `id_entreprise` int NOT NULL, `id_secteur_activite` int NOT NULL, KEY `id_entreprise` (`id_entreprise`), KEY 
  `id_secteur_activite` (`id_secteur_activite`), CONSTRAINT `a_secteur_active_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES 
  `entreprise` (`id_entreprise`), CONSTRAINT `a_secteur_active_ibfk_2` FOREIGN KEY (`id_secteur_activite`) REFERENCES 
  `secteur_activite` (`id_secteur_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `candidat`; CREATE TABLE `candidat` (
  `id_candidat` int NOT NULL AUTO_INCREMENT, `civilite` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, 
  `nom_candidat` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, `prenom` varchar(250) CHARACTER SET 
  utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, `numero` decimal(12,0) NOT NULL, `email` varchar(250) CHARACTER SET utf8mb4 
  COLLATE utf8mb4_general_ci NOT NULL, `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 
  'profile.jpeg', `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, `id_niveau_etude` int 
  DEFAULT NULL, `formation` json DEFAULT NULL, `id_exp` int DEFAULT NULL, `id_metier` int DEFAULT NULL, `id_secteur_activite` 
  int DEFAULT NULL, `id_zone_geo` int DEFAULT NULL, `type_contrat` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL, 
  PRIMARY KEY (`id_candidat`), UNIQUE KEY `email` (`email`), KEY `id_metier` (`id_metier`), KEY `id_secteur_activite` 
  (`id_secteur_activite`), KEY `id_zone_geo` (`id_zone_geo`), KEY `id_niveau_etude` (`id_niveau_etude`), KEY `id_exp` 
  (`id_exp`), CONSTRAINT `candidat_ibfk_3` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`id_metier`), CONSTRAINT 
  `candidat_ibfk_4` FOREIGN KEY (`id_secteur_activite`) REFERENCES `secteur_activite` (`id_secteur_activite`), CONSTRAINT 
  `candidat_ibfk_5` FOREIGN KEY (`id_zone_geo`) REFERENCES `zone_geo` (`id_zone_geo`), CONSTRAINT `candidat_ibfk_6` FOREIGN KEY 
  (`id_niveau_etude`) REFERENCES `niveau_etude` (`id_niveau_etude`), CONSTRAINT `candidat_ibfk_7` FOREIGN KEY (`id_exp`) 
  REFERENCES `experience` (`id_exp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `contrat`; CREATE TABLE `contrat` (
  `id_contrat` int NOT NULL AUTO_INCREMENT, `type` varchar(250) COLLATE utf8mb4_general_ci NOT NULL, PRIMARY KEY (`id_contrat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `contrat` (`id_contrat`, `type`) VALUES (1, 'CDI'), (2, 'CDD'), (3, 'Intérim'), (4, 'Stage'), (5, 'Freelance'), (6, 
'Statuaire'), (7, 'Alternance'), (8, 'Temps partiel');

DROP TABLE IF EXISTS `emploi`; CREATE TABLE `emploi` (
  `id_emploi` int NOT NULL AUTO_INCREMENT, `poste` varchar(250) COLLATE utf8mb4_general_ci NOT NULL, `id_contrat` int NOT NULL, 
  `Description` longtext COLLATE utf8mb4_general_ci NOT NULL, `competence` json NOT NULL, `id_zone_geo` int NOT NULL, 
  `date_publication` timestamp NOT NULL, PRIMARY KEY (`id_emploi`), KEY `id_zone_geo` (`id_zone_geo`), KEY `id_contrat` 
  (`id_contrat`), CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`id_zone_geo`) REFERENCES `zone_geo` (`id_zone_geo`), CONSTRAINT 
  `emploi_ibfk_2` FOREIGN KEY (`id_contrat`) REFERENCES `contrat` (`id_contrat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `entreprise`; CREATE TABLE `entreprise` (
  `id_entreprise` int NOT NULL AUTO_INCREMENT, `nom_entreprise` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL, 
  `adresse_entreprise` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL, `email_entreprise` varchar(250) COLLATE 
  utf8mb4_general_ci DEFAULT NULL, `password_entreprise` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL, 
  `logo_entreprise` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL, `civilite` varchar(250) CHARACTER SET utf8mb4 COLLATE 
  utf8mb4_general_ci DEFAULT NULL, `id_secteur_activite` int DEFAULT NULL, `code_postal` int DEFAULT NULL, `nom` varchar(250) 
  COLLATE utf8mb4_general_ci DEFAULT NULL, `prenom` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL, `fonction` 
  varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL, `numero` json DEFAULT NULL, PRIMARY KEY (`id_entreprise`), UNIQUE KEY 
  `nom_entreprise` (`nom_entreprise`), UNIQUE KEY `email_entreprise` (`email_entreprise`), KEY `id_secteur_activite` 
  (`id_secteur_activite`), CONSTRAINT `entreprise_ibfk_1` FOREIGN KEY (`id_secteur_activite`) REFERENCES `secteur_activite` 
  (`id_secteur_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `experience`; CREATE TABLE `experience` (
  `id_exp` int NOT NULL AUTO_INCREMENT, `experience` varchar(250) COLLATE utf8mb4_general_ci NOT NULL, PRIMARY KEY (`id_exp`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `experience` (`id_exp`, `experience`) VALUES (1, 'Étudiant, jeune diplômé'), (2, 'Débutant < 2 ans'), (3, 
'Expérience entre 2 ans et 5 ans'), (4, 'Expérience entre 5 ans et 10 ans'), (5, 'Expérience > 10 ans');

DROP TABLE IF EXISTS `metier`; CREATE TABLE `metier` (
  `id_metier` int NOT NULL AUTO_INCREMENT, `description_metier` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci 
  DEFAULT NULL, PRIMARY KEY (`id_metier`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `metier` (`id_metier`, `description_metier`) VALUES (1, 'Achats'), (2, 'Commercial, vente'), (3, 'Gestion, 
comptabilité, finance'), (4, 'Informatique, nouvelles technologies'), (5, 'Juridique'), (6, 'Management, direction générale'), 
(7, 'Marketing, communication'), (8, 'Métiers de la santé et du social'), (9, 'Métiers des services'), (10, 'Métiers du BTP'), 
(11, 'Production, maintenance, qualité'), (12, 'R&D, gestion de projets'), (13, 'RH, formation'), (14, 'Secrétariat, 
assistanat'), (15, 'Télémarketing, téléassistance'), (16, 'Tourisme, hôtellerie, restauration'), (17, 'Transport, logistique');

DROP TABLE IF EXISTS `niveau`; CREATE TABLE `niveau` (
  `id_exp` int NOT NULL, `id_niveau_etude` int NOT NULL, `id_candidat` int NOT NULL, KEY `id_exp` (`id_exp`), KEY 
  `id_niveau_etude` (`id_niveau_etude`), KEY `id_candidat` (`id_candidat`), CONSTRAINT `niveau_ibfk_1` FOREIGN KEY (`id_exp`) 
  REFERENCES `experience` (`id_exp`), CONSTRAINT `niveau_ibfk_2` FOREIGN KEY (`id_niveau_etude`) REFERENCES `niveau_etude` 
  (`id_niveau_etude`), CONSTRAINT `niveau_ibfk_3` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `niveau_etude`; CREATE TABLE `niveau_etude` (
  `id_niveau_etude` int NOT NULL AUTO_INCREMENT, `niveau` varchar(250) COLLATE utf8mb4_general_ci NOT NULL, PRIMARY KEY 
  (`id_niveau_etude`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `niveau_etude` (`id_niveau_etude`, `niveau`) VALUES (1, 'Qualification avant bac'), (2, 'Bac'), (3, 'Bac+1'), (4, 
'Bac+2'), (5, 'Bac+3'), (6, 'Bac+4'), (7, 'Bac+5 et plus');

DROP TABLE IF EXISTS `proposer`; CREATE TABLE `proposer` (
  `id_entreprise` int NOT NULL AUTO_INCREMENT, `id_emploi` int NOT NULL, `date_proposer` timestamp NULL DEFAULT NULL, PRIMARY 
  KEY (`id_entreprise`,`id_emploi`), KEY `FK_proposer_id_emploi` (`id_emploi`), CONSTRAINT `FK_proposer_id_emploi` FOREIGN KEY 
  (`id_emploi`) REFERENCES `emploi` (`id_emploi`), CONSTRAINT `FK_proposer_id_entreprise` FOREIGN KEY (`id_entreprise`) 
  REFERENCES `entreprise` (`id_entreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `recherche`; CREATE TABLE `recherche` (
  `id_candidat` int NOT NULL, `id_metier` int NOT NULL, `id_secteur_activite` int NOT NULL, KEY `id_candidat` (`id_candidat`), 
  KEY `id_metier` (`id_metier`), KEY `id_secteur_activite` (`id_secteur_activite`), CONSTRAINT `recherche_ibfk_1` FOREIGN KEY 
  (`id_candidat`) REFERENCES `candidat` (`id_candidat`), CONSTRAINT `recherche_ibfk_2` FOREIGN KEY (`id_metier`) REFERENCES 
  `metier` (`id_metier`), CONSTRAINT `recherche_ibfk_3` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`), 
  CONSTRAINT `recherche_ibfk_4` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`id_metier`), CONSTRAINT `recherche_ibfk_5` 
  FOREIGN KEY (`id_secteur_activite`) REFERENCES `secteur_activite` (`id_secteur_activite`), CONSTRAINT `recherche_ibfk_6` 
  FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`), CONSTRAINT `recherche_ibfk_7` FOREIGN KEY (`id_metier`) 
  REFERENCES `metier` (`id_metier`), CONSTRAINT `recherche_ibfk_8` FOREIGN KEY (`id_secteur_activite`) REFERENCES 
  `secteur_activite` (`id_secteur_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `secteur_activite`; CREATE TABLE `secteur_activite` (
  `id_secteur_activite` int NOT NULL AUTO_INCREMENT, `description_secteur_activite` varchar(250) COLLATE utf8mb4_general_ci 
  DEFAULT NULL, PRIMARY KEY (`id_secteur_activite`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `secteur_activite` (`id_secteur_activite`, `description_secteur_activite`) VALUES (1, 'Activités associatives'), 
(2, 'Administration publique'), (3, 'Aéronautique, navale'), (4, 'Agriculture, pêche, aquaculture'), (5, 'Agroalimentaire'), 
(6, 'Ameublement, décoration'), (7, 'Automobile, matériels de transport, réparation'), (8, 'Banque, assurance, finances'), (9, 
'BTP, construction'), (10, 'Centres d´appel, hotline, call center'), (11, 'Chimie, pétrochimie, matières premières, mines'), 
(12, 'Conseil, audit, comptabilité'), (13, 'Distribution, vente, commerce de gros'), (14, 'Édition, imprimerie'), (15, 
'Éducation, formation'), (16, 'Electricité, eau, gaz, nucléaire, énergie'), (17, 'Environnement, recyclage'), (18, 'Equip. 
électriques, électroniques, optiques, précision'), (19, 'Equipements mécaniques, machines'), (20, 'Espaces verts, forêts, 
chasse'), (21, 'Évènementiel, hôte(sse), accueil'), (22, 'Hôtellerie, restauration'), (23, 'Immobilier, architecture, 
urbanisme'), (24, 'Import, export'), (25, 'Industrie pharmaceutique'), (26, 'Industrie, production, fabrication, autres'), (27, 
'Informatique, SSII, Internet'), (28, 'Ingénierie, études développement'), (29, 'Intérim, recrutement'), (30, 'Location'), (31, 
'Luxe, cosmétiques'), (32, 'Maintenance, entretien, service après vente'), (33, 'Manutention'), (34, 'Marketing, communication, 
médias'), (35, 'Métallurgie, sidérurgie'), (36, 'Nettoyage, sécurité, surveillance'), (37, 'Papier, bois, caoutchouc, 
plastique, verre, tabac'), (38, 'Produits de grande consommation'), (39, 'Qualité, méthodes'), (40, 'Recherche et 
développement'), (41, 'Santé, pharmacie, hôpitaux, équipements médicaux'), (42, 'Secrétariat'), (43, 'Services aéroportuaires 
et maritimes'), (44, 'Services autres'), (45, 'Services collectifs et sociaux, services à la personne'), (46, 'Sport, action 
culturelle et sociale'), (47, 'Télécom'), (48, 'Textile, habillement, cuir, chaussures'), (49, 'Tourisme, loisirs'), (50, 
'Transports, logistique, services postaux');

DROP TABLE IF EXISTS `zone_geo`; CREATE TABLE `zone_geo` (
  `id_zone_geo` int NOT NULL AUTO_INCREMENT, `lieu` varchar(250) COLLATE utf8mb4_general_ci NOT NULL, PRIMARY KEY 
  (`id_zone_geo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `zone_geo` (`id_zone_geo`, `lieu`) VALUES (1, 'Banfora'), (2, 'Bobo Dioulasso'), (3, 'Dédougou'), (4, 'Dori'), (5, 
'Fada N\'Gourma'), (6, 'Gaoua'), (7, 'Kaya'), (8, 'Koudougou'), (9, 'Manga'), (10, 'Ouagadougou'), (11, 'Ouahigouya'), (12, 
'Tenkodogo'), (13, 'Ziniaré');

-- 2023-12-31 12:15:26
