-- MySQL dump 10.13  Distrib 5.6.26, for osx10.8 (x86_64)
--
-- Host: localhost    Database: biobankapps
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `criterion`
--

DROP TABLE IF EXISTS `criterion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criterion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `question` varchar(300) NOT NULL,
  `weight` int(11) NOT NULL,
  `evaluation_method` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterion`
--

LOCK TABLES `criterion` WRITE;
/*!40000 ALTER TABLE `criterion` DISABLE KEYS */;
INSERT INTO `criterion` VALUES (4,'test','is ok',3,'F1 = func(nb_areas_covered){ >=5: 4; >=3 : 3; >=1: 2; 0 : 1; }'),(5,'test2','22@',2,'Estimate on which areas of the biobanks activities the tool will be useful.Available areas are : Sampling, Storage, Quality Management, Genomic data, Clinical data, Biological data, Imagin data .func(nb_areas_covered){ >=5: 4; >=3 : 3; >=1: 2; 0 : 1; }');
/*!40000 ALTER TABLE `criterion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_evaluation` datetime NOT NULL,
  `grade` varchar(3) DEFAULT NULL,
  `software_id` int(11) NOT NULL,
  `software_version` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluation`
--

LOCK TABLES `evaluation` WRITE;
/*!40000 ALTER TABLE `evaluation` DISABLE KEYS */;
INSERT INTO `evaluation` VALUES (98,1,'2016-03-17 20:03:27','A',0,''),(99,1,'2016-03-17 20:03:09','D',0,''),(100,1,'2016-03-17 20:03:07','D',0,''),(101,1,'2016-03-18 17:03:37','C',0,''),(102,1,'2016-03-18 17:03:54','C',0,''),(103,1,'2016-04-07 15:04:04',NULL,0,''),(104,1,'2016-04-07 16:04:56',NULL,0,''),(105,1,'2016-04-07 16:04:10',NULL,0,''),(106,1,'2016-04-07 16:04:03',NULL,0,''),(107,1,'2016-04-07 16:04:26','B',0,''),(108,1,'2016-04-07 16:04:21','B',5,'1.2'),(109,1,'2016-04-07 17:04:26','B',5,'3.4'),(110,1,'2016-04-07 21:04:48','A',21,'2.8'),(111,1,'2016-04-21 20:04:16','A',1,''),(112,1,'2016-04-21 20:04:56','C',1,'1.1'),(113,1,'2016-04-21 21:04:39','D',1,'');
/*!40000 ALTER TABLE `evaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluation_criterion`
--

DROP TABLE IF EXISTS `evaluation_criterion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluation_criterion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `criterion_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `weight` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `evaluation_method` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluation_criterion`
--

LOCK TABLES `evaluation_criterion` WRITE;
/*!40000 ALTER TABLE `evaluation_criterion` DISABLE KEYS */;
INSERT INTO `evaluation_criterion` VALUES (8,98,4,1,'domain oriented - cover',3,'How much the software cover the functional areas of biobanking?',''),(9,98,4,2,'test',2,'q2',''),(10,99,4,1,'domain oriented - cover',3,'How much the software cover the functional areas of biobanking?',''),(11,99,4,2,'test',2,'q2',''),(12,100,4,1,'domain oriented - cover',3,'How much the software cover the functional areas of biobanking?',''),(13,100,1,2,'test',2,'q2',''),(14,101,1,1,'domain oriented - cover',3,'How much the software cover the functional areas of biobanking?',''),(15,101,1,2,'test',2,'q2',''),(16,101,4,3,'usability',2,'can i easily understand how it\'s work?',''),(17,102,1,1,'domain oriented - cover',3,'How much the software cover the functional areas of biobanking?',''),(18,102,1,2,'test',2,'q2',''),(19,102,4,3,'usability',2,'can i easily understand how it\'s work?',''),(20,107,3,4,'test',3,'is ok',''),(21,108,4,4,'test',3,'is ok',''),(22,109,4,4,'test',3,'is ok',''),(23,110,4,4,'test',3,'is ok',''),(24,112,2,4,'test',3,'is ok','F1 = func(nb_areas_covered){ >=5: 4; >=3 : 3; >=1: 2; 0 : 1; }'),(25,113,2,4,'test',3,'is ok','F1 = func(nb_areas_covered){ >=5: 4; >=3 : 3; >=1: 2; 0 : 1; }'),(26,113,1,5,'test2',2,'22@','Estimate on which areas of the biobanks activities the tool will be useful.Available areas are : Sampling, Storage, Quality Management, Genomic data, Clinical data, Biological data, Imagin data .func(nb_areas_covered){ >=5: 4; >=3 : 3; >=1: 2; 0 : 1; }');
/*!40000 ALTER TABLE `evaluation_criterion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m160422_150258_create_review_table',1462262234),('m160509_123322_add_user_id_to_software',1462799548),('m160509_135134_create_quick_analysis',1462805851);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quick_analysis`
--

DROP TABLE IF EXISTS `quick_analysis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quick_analysis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `software_id` int(11) NOT NULL,
  `goals` text,
  `main_features` text,
  `helpful_tool` text,
  `value_added` text,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quick_analysis`
--

LOCK TABLES `quick_analysis` WRITE;
/*!40000 ALTER TABLE `quick_analysis` DISABLE KEYS */;
INSERT INTO `quick_analysis` VALUES (1,1,1,'test','1','2','3','2016-05-09 15:05:11'),(2,9,1,'Ok c\'est.','zzz','bien bien','what s up','2016-05-10 15:05:04');
/*!40000 ALTER TABLE `quick_analysis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `software_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `comment` text,
  `date_review` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,1,1,4,'Parfait','ça marche?','2016-05-03 08:05:52'),(2,9,2,3,'ok','then','2016-05-09 13:05:19'),(3,73,1,3,'the best','ok','2016-05-17 15:05:19');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `url_company` varchar(200) NOT NULL,
  `url_software` varchar(200) NOT NULL,
  `license` varchar(200) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `descriptif_fr` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `screenshot_1` varchar(50) DEFAULT NULL COMMENT 'nom du fichier stocke',
  `screenshot_2` varchar(50) DEFAULT NULL,
  `screenshot_3` varchar(50) DEFAULT NULL,
  `screenshot_4` varchar(50) DEFAULT NULL,
  `screenshot_5` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL COMMENT 'nom du fichier stocke',
  `keywords_fr` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `contact_email` varchar(128) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `language_fr` tinyint(1) DEFAULT NULL,
  `language_en` tinyint(1) DEFAULT NULL,
  `language_others` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `software`
--

LOCK TABLES `software` WRITE;
/*!40000 ALTER TABLE `software` DISABLE KEYS */;
INSERT INTO `software` VALUES (1,'ebiose','biosoftware factory','www.biosoftwarefactory.com','http://www.biosoftwarefactory.com/index.php?option=com_content&view=article&id=50&Itemid=61','LGPL version 3',100,'Logiciel de gestion d\'échantillons et activités\r\nPermet la gestion du processus Patient > Prélevement > Echantillons\r\nPlanning de réservation de machines\r\nGestion des unités de stockage','Management software of samples\r\nManage Patient > Resection> Samples\r\nPlanner\r\nStorage','sc_1_1.png','sc_1_2.jpg','sc_1_3.jpg',NULL,'sc_1_5.jpg','logo_1.jpg','echantillons stockage planning','samples storage planning','n.malservet@biosoftwarefactory.com','+33 647920113',1,1,0,9),(2,'Stocky','Génopole','www.genethon.fr','www.genethon.fr','NC',0,'Logiciel de gestion des échantillons biologiques.\r\nGestion des annotations.\r\nAnonymisation du patient.\r\n','Management software for samples.\r\nManage annotations.\r\nAnonymized patient.',NULL,NULL,NULL,NULL,NULL,NULL,'échantillons gestion patient','samples management patient','NC','NC',1,0,0,74),(3,'TumoroteK','Hopital Saint Louis','http://ghparis10.aphp.fr/','http://193.48.40.7/','Ministère de la santé',0,'Du patient à l\'utilisation des échantillons pour la recherche, TumoroteK® est un outil précieux pour la gestion des collections. Initialement développé pour les tumorothèques (30 équipées à ce jour), il est aujourd\'hui aussi utilisé par plusieurs Centres de Ressources Biologiques certifiés selon la norme NF S96-900.','The patient in the use of samples for research, Tumorotek ® is a valuable tool for managing collections. Originally developed for tumor banks (30 equipped to date), it is now also used by several Biological Resource Centres certified according to the standard NF S96-900.','sc_3_1.png','sc_3_2.png','sc_3_3.png',NULL,'sc_3_5.png',NULL,'échantillons gestion collections','samples management system collections','NC','NC',1,1,1,75),(4,'oBiBa','oBiBa team','http://www.obiba.org/node/73','http://www.obiba.org/','Open Source',0,'OBiBa software consists of functional modules corresponding to typical biobank activities','OBiBa software consists of functional modules corresponding to typical biobank activities',NULL,NULL,NULL,NULL,NULL,NULL,'study scheduling enrolment assesment','study scheduling enrolment assesment','info@obiba.org','NC',0,1,0,76),(5,'DataBiotec','oriam','http://www.oriam.com','http://www.oriam.com/oriam/Produits/DataBiotec.html','Propriétaire',NULL,'Des données complètes\r\n    Gestion multi-sites / multi-collections\r\n    Cuves et Conteneurs\r\n    Données cliniques personnalisables\r\n    Traçabilité des échantillons\r\nDes fonctionnalités puissantes\r\n    Déplacement et clônage des échantillons\r\n    Gestion des étiquettes à codes barres et scanners\r\n    Importations simples et paramétrables\r\n    Interrogations puissantes et exportables\r\nUne utilisation simple\r\n    Vision arborescente des données\r\n    Profils de création rapide d’échantillons','Des données complètes\r\n    Gestion multi-sites / multi-collections\r\n    Cuves et Conteneurs\r\n    Données cliniques personnalisables\r\n    Traçabilité des échantillons\r\nDes fonctionnalités puissantes\r\n    Déplacement et clônage des échantillons\r\n    Gestion des étiquettes à codes barres et scanners\r\n    Importations simples et paramétrables\r\n    Interrogations puissantes et exportables\r\nUne utilisation simple\r\n    Vision arborescente des données\r\n    Profils de création rapide d’échantillons',NULL,NULL,NULL,NULL,NULL,'logo_5.jpg','échantillons management conteneurs','samples  management container','contact.databiotec@oriam.com','+33.1.41.02.89.20',1,0,0,77),(6,'molgenis','University Medical Center Groningen  UMCG, Groningen Bioinformatics Center  GBIC, European Bioinformatics Institute  EBI and the Netherlands Bioinformatics Center','http://www.molgenis.org/','http://www.molgenis.org/','open source',0,' MOLGENIS is two things:\r\n\r\n    For biologists MOLGENIS is a suite of web databases for genotype, phenotype, QTL and analysis pipelines.\r\n    For bioinformaticians MOLGENIS is software generator to rapidly build web databases that make your biologists happy. \r\n\r\nEach MOLGENIS has nice web user interfaces as well as scriptable interfaces to plug-in R, Java and web services. ',' MOLGENIS is two things:\r\n\r\n    For biologists MOLGENIS is a suite of web databases for genotype, phenotype, QTL and analysis pipelines.\r\n    For bioinformaticians MOLGENIS is software generator to rapidly build web databases that make your biologists happy. \r\n\r\nEach MOLGENIS has nice web user interfaces as well as scriptable interfaces to plug-in R, Java and web services. ',NULL,NULL,NULL,NULL,NULL,'logo_6.png','biology generator r webapp','biology generator r webapp','','',0,1,0,78),(7,'catissue','krishagni','http://www.krishagni.com/','http://catissueplus.org/','open source',0,'caTissue is a Comprehensive Biobanking LIMS application developed with funding from National Cancer Institute(U. S. A) and further enhanced by Krishagni under the caTissue Plus project. caTissue tracking specimen inventory from collection to utilization across multiple projects, collecting biospecimen annotations, and multiple reporting options.','caTissue is a Comprehensive Biobanking LIMS application developed with funding from National Cancer Institute(U. S. A) and further enhanced by Krishagni under the caTissue Plus project. caTissue tracking specimen inventory from collection to utilization across multiple projects, collecting biospecimen annotations, and multiple reporting options.',NULL,NULL,NULL,NULL,NULL,'logo_7.png','biobank collection annotation','biobank collection annotation','','',0,1,1,79),(8,'MBioLIMS','MODUL-BIO','http://www.modul-bio.com','http://www.modul-bio.com/nos-solutions/mbiolims/','Propriétaire',NULL,'Logiciel 100% Web spécifiquement conçu pour les biobanques et les projets de cohorte\r\nGestion des échantillons biologiques et des données associées, généalogie complète des échantillons, génération de codes barres uniques, traçabilité exhaustive des échantillons de la réception à la distribution,MBioLIMS, disponible en monosite ou en multisites est  une solution complète, modulable et évolutive qui s’adapte à votre CRB et à votre process.','100% Web-based software designed specifically for biobanks and cohort projects\r\nManagement of biological samples and associated data, complete genealogy of samples, generate unique barcode - complete traceability of samples from receipt to distribution.MBioLIMS, available as single-site or multi-sites licence, is a complete modular and scalable solution that best fits your BRC and your process.','sc_8_1.png','sc_8_2.png',NULL,NULL,NULL,'logo_8.png','CRB, stockage, étiquettes, codes barres, gestion échantillons, traçabilité, multi-sites, biobanques','BRC, storage, labels, barcode, samples management, traceability, multi-site, biobank, collection','info@modul-bio.com','+33 (0)4 91 82 82 50',1,1,1,80),(9,'TD-Biobank','TECHNIDATA','www.technidata-web.com/fr','http://france.technidata-web.com/solutions/gestion-de-laboratoire/gestion-des-crb','Propriétaire',NULL,'TD-Biobank vous permet de valoriser vos ressources biologiques par des annotations clinico-biologiques et d\'optimiser leur traçabilité. Ce module offre de nombreux avantages grâce à sa gestion multisites, ses réponses aux exigences de la certification NFS96-900 et son haut niveau de traçabilité. Il permet de qualifier et valoriser vos ressources biologiques et collections de façon optimale et s’adresse à l’ensemble des acteurs de CRB.','TD-Biobank adds value to your biological specimens using biological annotations, and optimizes traceability.\r\nThe TD-Biobank module offers many advantages thanks to a multisite management, responses to legal requirements, and high level of traceability. It allows to maximize value to stored biological specimens and collections.\r\n',NULL,NULL,NULL,NULL,NULL,'logo_9.jpg','Biobanque, CRB, gestion stockage, gestion échantillon, traçabilité, NFS 96-900, multi-sites','Specimen bank, biobank, multisite management, storage, traceability, legal requirements','france@technidata-web.com','+33(0) 4 76 04 13 00',1,1,1,81),(10,'BRC-LIMS','FBRCMi','http://www.fbrcmi.fr/','http://brclims.web.pasteur.fr/brcWeb/information/demo/demo_brclims_beta/index.html','non renseigné',NULL,'Logiciel de gestion de Centre de Resources Biologiques de micro-organismes','Application for the management of Biological Resource Centre of Microorganisms','sc_10_1.PNG',NULL,NULL,NULL,NULL,'logo_10.PNG','CRB, management de données','BRC, Data management','sylvain.demey@pasteur.fr','',1,0,0,82),(11,'FBRCMi-catalog','FBRCMi','www.fbrcmi.fr','http://brclims.web.pasteur.fr/brcWeb/','non renseigné',NULL,'Application Web FBRCMi-catalog faisant office de catalogue commun à tous les CRB microbiens participant au projet.','Web application FBRCMi-catalog acting as a common catalog to all French BRCs of microorganisms participating in the project','sc_11_1.PNG','sc_11_2.PNG','sc_11_3.PNG',NULL,NULL,'logo_11.png','CRB, micro-organismes, catalogue commun, application web','BRC, micro-organisms, common catalog, web application','sylvain.demey@pasteur.fr','',1,1,0,83),(12,'I2b2 software','i2b2','https://www.i2b2.org','https://www.i2b2.org/software/index.html','I2b2 Open Source License',0,'The i2b2 Center is developing a scalable computational framework to address the bottleneck limiting the translation of genomic findings and hypotheses in model systems relevant to human health. New computational paradigms (Core 1) and methodologies (Cores 3) are being developed and tested in several diseases (airways disease, hypertension, type 2 diabetes mellitus, Huntington’s Disease, rheumatoid arthritis, major depressive disorder, inflammatory bowel disease, multiple sclerosis) (Core 2 Drivi','The i2b2 Center is developing a scalable computational framework to address the bottleneck limiting the translation of genomic findings and hypotheses in model systems relevant to human health. New computational paradigms (Core 1) and methodologies (Cores 3) are being developed and tested in several diseases (airways disease, hypertension, type 2 diabetes mellitus, Huntington’s Disease, rheumatoid arthritis, major depressive disorder, inflammatory bowel disease, multiple sclerosis) (Core 2 Drivi','sc_12_1.png',NULL,NULL,NULL,NULL,'logo_12.png','genomique','genomic','','',0,1,0,84),(13,'Biotracker Biobanking','Ocimum Biosolutions','www.lims.ocimumbio.com','http://lims.ocimumbio.com/biobanking','Propriétaire',199,'Fruit de 13 années d’expérience du LIMS BiotrackerTM, Biotracker BiobankingTM est une solution standard conçue spécifiquement pour répondre aux besoins des biobanques et des banques de tissus biologiques.\r\n\r\nBiotracker Biobanking vous permet de facilement collecter, stocker, traiter, rechercher et distribuer vos échantillons biologiques au sein de votre organisation.\r\n\r\nDisponible en SaaS à partir de 199€ par mois - \r\nPrix des licences sur demande\r\nalex.l@ocimumbio.com','Evolved from 13+ years of experience on the Biotracker LIMS platform - BiotrackerTM Biobanking LIMS, an off the shelf product designed specifically for the needs of Biorepositories and Biobanks.\r\n\r\nOcimum Biosolutions’ BiotrackerTM Biobanking LIMS allows your organization to \"collect, store, process, search and distribute\" biological materials easily in your biorepositories and Biobanks. \r\n\r\nAvailable in SaaS mode from 199€ a month - \r\nLicenses prices on request\r\nalex.l@ocimumbio.com','sc_13_1.jpg','sc_13_2.jpg','sc_13_3.jpg','sc_13_4.jpg',NULL,'logo_13.jpg','LIMS Standard Biobanques','LIMS Standard Biobanking','alex.l@ocimumbio.com','0651111616',1,1,0,85),(14,'LabCollector','AgileBio SARL','http://www.agilebio.com/index.php?page=accueil','http://labcollector.com/','Propriétaire',2500,'LabCollector est un progiciel web/internet dédié à la gestion et à la traçabilité des échantillons et de l\'information au sein des laboratoires de recherche. Construit autour de 13 modules (cellules, échantillons,  plasmides, primers, séquences,  produits et réactifs, anticorps, animaux…) entièrement personnalisables pouvant interagir les uns avec les autres, LabCollector permet de gérer tous types d’échantillons biologiques ainsi que les données associées : stockage,codes-barres...','LabCollector is a full-web application dedicated to the management and traceability of samples and information in research laboratories. Built around 13 modules (strains and cells, samples, plasmids, primers, sequences, products and reagents, antibodies, animals ...) completely customizable interacting with each other, LabCollector can manage all types of biological samples and associated data: storage, barcode label generation...','sc_14_1.jpg','sc_14_2.jpg','sc_14_3.jpg','sc_14_4.jpg',NULL,'logo_14.jpg','Echantillons, collections, traçabilité, codes-barres, étiquettes, stockage, biobanques','Samples, collection, traceability, barcode, labels, storage, biobank','sales@agilebio.com','0175430661',1,1,1,86),(15,'ebiobanques','biosoftware Factory','www.biosoftwarefactory.com','www.ebiobanques.fr','NC',NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,'','','','',1,0,0,87),(16,'BARCdb','BBMRI.se','www.bbmri.se','www.barcdb.org','Service',NULL,'','BARCdb, the Biobanking Analysis Resource Catalogue (www.barcdb.org), is a freely available web resource, listing expertise and molecular resource capabilities available at research centres and biotech companies in Europe. The database is designed for researchers who require information about how to make best use of valuable biospecimens from biobanks and other sample collections, focusing on choice of analysis techniques and the demands they make on the type of samples, pre-analytical preparatio','sc_16_1.png',NULL,NULL,NULL,NULL,'logo_16.png','','Genomics, Proteomics, Metabolomics, Imaging, Core facility, Analysis platform, Resource provider','joakim.galli@igp.uu.se','',0,1,0,88),(17,'mirthconnect','mirthcorp','http://www.mirthcorp.com','http://www.mirthcorp.com/products/mirth-connect','Mozilla Public LIcense 1.1',0,'Transformation de données depuis des sources hétérogènes ( HL7, DICOM, xls, csv...)\r\nEntrepôt de données\r\nMonitoring des flux','Transform heterogeneous data (HL7, DICOM, xls, csv...)\r\nStorage into a datawarehouse\r\nMonitoring','sc_17_1.png',NULL,NULL,NULL,NULL,'logo_17.png','ETL transform entrepôt','ETL tETL transform datawarehouseransform datawarehouse','','',0,1,0,89),(18,'redcap','vanderbilt university','http://www.project-redcap.org/','http://www.project-redcap.org/','propriété venderbilt university',NULL,'REDCap (Research Electronic Data Capture) is a secure web application for building and managing online surveys and databases. Using REDCap\'s stream-lined process for rapidly developing projects, you may create and design projects using 1) the online method from your web browser using the Online Designer; and/or 2) the offline method by constructing a \'data dictionary\' template file in Microsoft Excel, which can be later uploaded into REDCap. ','REDCap (Research Electronic Data Capture) is a secure web application for building and managing online surveys and databases. Using REDCap\'s stream-lined process for rapidly developing projects, you may create and design projects using 1) the online method from your web browser using the Online Designer; and/or 2) the offline method by constructing a \'data dictionary\' template file in Microsoft Excel, which can be later uploaded into REDCap. ',NULL,NULL,NULL,NULL,NULL,'logo_18.png','ecrf','ecrf','','',1,1,1,90),(19,'openclinica','openclinica','https://www.openclinica.com/','https://www.openclinica.com/','open source LGPL 2.1',0,'e-CRF\r\nEtudes cliniques\r\nMonitoring\r\nAlertes','eCRF\r\nClinical studies\r\nMonitoring\r\nAlerts','sc_19_1.png','sc_19_2.png',NULL,NULL,NULL,'logo_19.png','ecrf','ecrf','','',0,1,0,91),(20,'labkey','doriane','http://www.doriane.com/','http://www.doriane.com/index2.php?pages=produit','propriétaire',NULL,'LABKEY gère les experiences en laboratoire. Il permet de consolider les informations sur le matériel génétique des différents laboratoires du département de recherche.\r\n\r\n    Production des analyses à haut débit et contrôle des flux d\'échantillons.\r\n    Analyses qualité, pathologie, culture in vitro, haplodiploidisation.\r\n    Pilotage des automates et appareils de laboratoire.\r\n    Accès instantané aux informations décisionnelles.','LABKEY gère les experiences en laboratoire. Il permet de consolider les informations sur le matériel génétique des différents laboratoires du département de recherche.\r\n\r\n    Production des analyses à haut débit et contrôle des flux d\'échantillons.\r\n    Analyses qualité, pathologie, culture in vitro, haplodiploidisation.\r\n    Pilotage des automates et appareils de laboratoire.\r\n    Accès instantané aux informations décisionnelles.',NULL,NULL,NULL,NULL,NULL,NULL,'agronomie biologie génétique laboratoire','agronomie biologie génétique laboratoire','','',1,1,0,92),(21,'ARX','community','http://arx.deidentifier.org/','http://arx.deidentifier.org/','open source',0,'outil pour déidentifier des données et mesurer les risques','ARX is a comprehensive open source software for anonymizing sensitive personal data. It has been designed from the ground up to provide high scalability, ease of use and a tight integration of the many different aspects relevant to data anonymization. Its highlights include:\r\n\r\n    Risk-based anonymization\r\n    Syntactic privacy criteria, such as k-anonymity, ?-diversity, t-closeness and ?-presence',NULL,NULL,NULL,NULL,NULL,NULL,'anonmyzation','anonymization deidentification','','',0,1,0,93),(22,'BBMRI-ERIC Directory','BBMRI-ERIC','http://www.bbmri-eric.eu','http://www.bbmri-eric.eu','GPL/BSD',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'directory of biobanks, BBMRI-ERIC, BBMRI','petr.holub@bbmri-eric.eu','',0,1,0,94),(23,'Mainzelliste','Universitätsmedizin Mainz','www.unimedizin-mainz.de','www.mainzelliste.de','AGPLv3',0,NULL,'Mainzelliste is a web-based first-level pseudonymisation service. It allows for the creation of personal identifiers (PID) from identifying attributes (IDAT), and thanks to the record linkage functionality, this is even possible with poor quality identifying data. The functions are available through a REST interface and can thereby be easily used in web applications and accessed from a web browser. See the publication http://www.biomedcentral.com/1472-6947/15/2 for details.',NULL,NULL,NULL,NULL,NULL,'logo_23.png',NULL,'pseudonymization rest record linkage data protection','info@mainzelliste.de','',0,1,1,95),(24,'SLims','Genohm','www.genohm.com','http://www.genohm.com/slims/','named or concurrent',NULL,NULL,'SLims, a flexible and customizable platform integrating a complete and compliant laboratory information management solutions (LIMS or BIMS for Biobanks) with an electronic lab notebook (ELN) and an ordering module (requests to the lab) and much more.\r\nFor biobanks, diagnostic, clinical, production and manufacturing settings.\r\nA connectivity platform,  linking different software, instruments, tools and more. Protocol versioning, auditing, chain of custody. Automation, track and trace,.....\r\n','sc_24_1.png',NULL,NULL,NULL,NULL,'logo_24.png',NULL,'LIMS, BIMS, ELN, order management, Biobanks, NGS, Biotech ','nicole@genohm.com','+41 79 953 40 66 ',1,1,1,96),(25,'my software','bsf','http://bsf.com','truc','bidule',111,NULL,'ma desc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'biobank test','nic@mals.com','1234567',NULL,1,0,97),(26,'test','nicos','nicos.com','nicolas.com','lgpl',0,NULL,'ok c bon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'truc muche','nicos@email.com','',NULL,1,0,73);
/*!40000 ALTER TABLE `software` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1' COMMENT '1= software editor, 2 = author, 3= admin',
  `name` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'nicolas@malservet.eu','dbtest2016','email4test@hotmail.com',3,'malservet','nicolas'),(75,'barthelemy','dbtest2016','email4test@hotmail.com',1,'barthelemy','mathieu'),(74,'larmonier','dbtest2016','email4test@hotmail.com',1,'larmonier','thierry'),(73,'nmalservet','dbtest2016','email4test@hotmail.com',1,'malservet','nicolas'),(9,'bad','dbtest2016','email4test@hotmail.com',1,'bad','ass'),(76,'ferretti','dbtest2016','email4test@hotmail.com',1,'ferretti','vincent'),(77,'oriam','dbtest2016','email4test@hotmail.com',1,'oriam','oriam'),(78,'molgenis','dbtest2016','email4test@hotmail.com',1,'molgenis','molgenis'),(79,'krishagni','dbtest2016','email4test@hotmail.com',1,'krishagni','krishagni'),(80,'MODULBIO','dbtest2016','email4test@hotmail.com',1,'MODUL-BIO','biobankapps admin'),(81,'technidata','dbtest2016','email4test@hotmail.com',1,'TECHNIDATA','biobankapps admin'),(82,'sdemey','dbtest2016','email4test@hotmail.com',1,'DEMEY','Sylvain'),(83,'demey','dbtest2016','email4test@hotmail.com',1,'DEMEY','Sylvain'),(84,'i2b2','dbtest2016','email4test@hotmail.com',1,'i2b2','biobankapps admin'),(85,'aleglise','dbtest2016','email4test@hotmail.com',1,'Léglise','Alexandre'),(86,'agilebio','dbtest2016','email4test@hotmail.com',1,'Rodrigues','Pierre'),(87,'matth','dbtest2016','email4test@hotmail.com',1,'biobankapps admin','biobankapps admin'),(88,'jgallibarcdb','dbtest2016','email4test@hotmail.com',1,'Joakim','Galli'),(89,'nicolas','dbtest2016','email4test@hotmail.com',1,'biobankapps admin','biobankapps admin'),(90,'vanderbilt','dbtest2016','email4test@hotmail.com',1,'biobankapps admin','biobankapps admin'),(91,'openclinica','dbtest2016','email4test@hotmail.com',1,'biobankapps admin','biobankapps admin'),(92,'doriane','dbtest2016','email4test@hotmail.com',1,'biobankapps admin','biobankapps admin'),(93,'arxdeid','dbtest2016','email4test@hotmail.com',1,'biobankapps admin','biobankapps admin'),(94,'hopet','dbtest2016','email4test@hotmail.com',1,'Holub','Petr'),(95,'mainzelliste','dbtest2016','email4test@hotmail.com',1,'biobankapps admin','biobankapps admin'),(96,'NCGrieder','dbtest2016','email4test@hotmail.com',1,'Grieder','Nicole '),(97,'nmals','dbtest2016','email4test@hotmail.com',1,'nic','mals'),(98,'nicolas','dbtest2016','email4test@hotmail.com',1,'nicolas','nicolas'),(99,'nicolas2','dbtest2016','email4test@hotmail.com',1,'ni','ni');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-31 15:13:51
