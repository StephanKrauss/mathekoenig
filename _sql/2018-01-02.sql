/*
SQLyog Ultimate v12.01 (64 bit)
MySQL - 10.1.22-MariaDB : Database - mathekoenig
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mathekoenig` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mathekoenig`;

/*Table structure for table `adel` */

DROP TABLE IF EXISTS `adel`;

CREATE TABLE `adel` (
  `id` smallint(2) NOT NULL AUTO_INCREMENT,
  `maennlich` varchar(50) NOT NULL,
  `weiblich` varchar(50) NOT NULL,
  `punkte` mediumint(10) NOT NULL,
  `gruppe` enum('1','2','3') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `adel` */

insert  into `adel`(`id`,`maennlich`,`weiblich`,`punkte`,`gruppe`) values (1,'König','Königin',0,'3'),(2,'Prinz','Prinzessin',0,'3'),(3,'Ritter','Burgfräulein',0,'3'),(4,'Erzherzog','Erzherzogin',500,'2'),(5,'Großherzog','Großherzogin',400,'2'),(6,'Herzog','Herzogin',300,'2'),(7,'Großfürst','Großfürstin',200,'2'),(8,'Kurfürst','Kurfürstin',150,'2'),(9,'Fürst','Fürstin',120,'2'),(10,'Baron','Baroness',100,'2'),(11,'Markgraf','Markgräfin',90,'2'),(12,'Graf','Gräfin',80,'2'),(13,'Pfalzgraf','Pfalzgräfin',70,'2'),(14,'Reichsgraf','Reichsgräfin',60,'1'),(15,'Landgraf','Landgräfin',50,'1'),(16,'Rheingraf','Rheingräfin',40,'1'),(17,'Freiherr','Freifrau',30,'1'),(18,'Edler','Edle',20,'1'),(19,'Junker','Fräulein',10,'1'),(20,'Bürger','Bürgerin',0,'1');

/*Table structure for table `benutzer` */

DROP TABLE IF EXISTS `benutzer`;

CREATE TABLE `benutzer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `benutzername` varchar(30) NOT NULL,
  `adel_id` smallint(2) DEFAULT NULL,
  `passwort` varchar(30) NOT NULL,
  `geschlecht` enum('1','2') NOT NULL DEFAULT '1',
  `alias` varchar(30) DEFAULT NULL,
  `schatz` mediumint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `adel_id` (`adel_id`),
  CONSTRAINT `adel_id` FOREIGN KEY (`adel_id`) REFERENCES `adel` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `benutzer` */

insert  into `benutzer`(`id`,`benutzername`,`adel_id`,`passwort`,`geschlecht`,`alias`,`schatz`) values (1,'Stephan123',9,'Polygon123','1','Stephan',140),(2,'Mustermann',5,'Mustermann','2',NULL,900),(3,'Hülsensack',6,'Hülsensack','1',NULL,800),(4,'Pumpelhuber',4,'Pumpelhuber','1',NULL,700),(5,'Kneipel',18,'Kneipel','1',NULL,600),(7,'Mustereule',20,'Mustereule','1',NULL,0);

/*Table structure for table `benutzer_konigreich` */

DROP TABLE IF EXISTS `benutzer_konigreich`;

CREATE TABLE `benutzer_konigreich` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `benutzer_id` int(5) NOT NULL,
  `koenigreich_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `benutzerId` (`benutzer_id`),
  KEY `koenigreichId` (`koenigreich_id`),
  CONSTRAINT `benutzerId` FOREIGN KEY (`benutzer_id`) REFERENCES `benutzer` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `koenigreichId` FOREIGN KEY (`koenigreich_id`) REFERENCES `koenigreich` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `benutzer_konigreich` */

insert  into `benutzer_konigreich`(`id`,`benutzer_id`,`koenigreich_id`) values (1,1,1);

/*Table structure for table `koenigreich` */

DROP TABLE IF EXISTS `koenigreich`;

CREATE TABLE `koenigreich` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `koenigreich` varchar(100) NOT NULL COMMENT 'Name des Königreiches',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `koenigreich` */

insert  into `koenigreich`(`id`,`koenigreich`) values (1,'OSBS'),(2,'Irgendwo'),(3,'Nirgendwo');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
