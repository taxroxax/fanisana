/*
SQLyog Ultimate v9.10 
MySQL - 5.6.17 : Database - db_anosizato
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `evenement` */

DROP TABLE IF EXISTS `evenement`;

CREATE TABLE `evenement` (
  `IdEvent` int(11) NOT NULL AUTO_INCREMENT,
  `DateEvenement` datetime DEFAULT NULL,
  `PlaceEvenement` varchar(50) DEFAULT NULL,
  `NumeroMembre1` varchar(10) DEFAULT NULL,
  `NumeroMembre2` varchar(10) DEFAULT NULL,
  `DescriptionEvenement` varchar(240) DEFAULT NULL,
  `IdEventCateg` int(11) NOT NULL,
  PRIMARY KEY (`IdEvent`),
  KEY `FK_EVENEMENT_IdEventCateg` (`IdEventCateg`),
  CONSTRAINT `FK_EVENEMENT_IdEventCateg` FOREIGN KEY (`IdEventCateg`) REFERENCES `event_categorie` (`IdEventCateg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `evenement` */

/*Table structure for table `event_categorie` */

DROP TABLE IF EXISTS `event_categorie`;

CREATE TABLE `event_categorie` (
  `IdEventCateg` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleEventCategorie` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IdEventCateg`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `event_categorie` */

insert  into `event_categorie`(`IdEventCateg`,`LibelleEventCategorie`) values (1,'Batisa'),(2,'Fanasan\'ny Tompo'),(3,'Mariazy');

/*Table structure for table `famille` */

DROP TABLE IF EXISTS `famille`;

CREATE TABLE `famille` (
  `IdFamille` int(11) NOT NULL AUTO_INCREMENT,
  `IdChefFamille` varchar(10) DEFAULT NULL,
  `AdresseFamille` varchar(50) DEFAULT NULL,
  `CodePostal` varchar(10) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `CodePays` varchar(10) DEFAULT NULL,
  `Telephone` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `IdQuartier` int(11) NOT NULL,
  PRIMARY KEY (`IdFamille`),
  KEY `FK_FAMILLE_IdQuartier` (`IdQuartier`),
  CONSTRAINT `FK_FAMILLE_IdQuartier` FOREIGN KEY (`IdQuartier`) REFERENCES `quartier` (`IdQuartier`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `famille` */

insert  into `famille`(`IdFamille`,`IdChefFamille`,`AdresseFamille`,`CodePostal`,`Ville`,`CodePays`,`Telephone`,`Email`,`IdQuartier`) values (1,'6124','Mahazoarivo','12450','antananarivo','101','+261320710106','razafinimanana@gmail.com',1);

/*Table structure for table `membre` */

DROP TABLE IF EXISTS `membre`;

CREATE TABLE `membre` (
  `IdMembre` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroMembre` varchar(10) DEFAULT NULL,
  `NomMembre` varchar(50) DEFAULT NULL,
  `PrenomMembre` varchar(100) DEFAULT NULL,
  `DateNaissance` datetime DEFAULT NULL,
  `LieuNaissance` varchar(100) DEFAULT NULL,
  `GenderMembre` int(1) DEFAULT NULL,
  `StatusMembre` int(2) DEFAULT NULL,
  `IdFamille` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdMembre`),
  KEY `FK_MEMBRE_IdFamille` (`IdFamille`),
  CONSTRAINT `FK_MEMBRE_IdFamille` FOREIGN KEY (`IdFamille`) REFERENCES `famille` (`IdFamille`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `membre` */

insert  into `membre`(`IdMembre`,`NumeroMembre`,`NomMembre`,`PrenomMembre`,`DateNaissance`,`LieuNaissance`,`GenderMembre`,`StatusMembre`,`IdFamille`) values (2,'6124','Razafinimanana','Nirina','1966-07-05 00:00:00','Mahamasina',1,1,1),(3,'6125','Rasoavelonoro','Aimée','1963-10-01 00:00:00','Mahamasina',0,NULL,1),(4,'6128','Razafinimanana','Norosoa','1995-12-02 00:00:00','Mahamasina',0,NULL,1),(15,'85467','teste 2','teste 2','2018-07-04 00:00:00','teste 2',1,NULL,1),(16,'85494','teste 3','teste 3','2017-06-27 00:00:00','antananarivo',0,NULL,1),(17,'8958','lili','narivony','2018-07-10 00:00:00','teste',1,NULL,1);

/*Table structure for table `participer` */

DROP TABLE IF EXISTS `participer`;

CREATE TABLE `participer` (
  `IdMembre` int(11) NOT NULL AUTO_INCREMENT,
  `IdEvent` int(11) NOT NULL,
  PRIMARY KEY (`IdMembre`,`IdEvent`),
  KEY `FK_PARTICIPER_IdEvent` (`IdEvent`),
  CONSTRAINT `FK_PARTICIPER_IdEvent` FOREIGN KEY (`IdEvent`) REFERENCES `evenement` (`IdEvent`),
  CONSTRAINT `FK_PARTICIPER_IdMembre` FOREIGN KEY (`IdMembre`) REFERENCES `membre` (`IdMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `participer` */

/*Table structure for table `quartier` */

DROP TABLE IF EXISTS `quartier`;

CREATE TABLE `quartier` (
  `IdQuartier` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleQuartier` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IdQuartier`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `quartier` */

insert  into `quartier`(`IdQuartier`,`LibelleQuartier`) values (1,'FARITRA 1'),(2,'FARITRA 2'),(3,'FARITRA 3'),(4,'FARITRA 4'),(5,'FARITRA 5'),(6,'FARITRA 6'),(7,'ZANAKA AM-PIELEZANA');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
