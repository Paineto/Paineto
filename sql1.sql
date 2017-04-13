/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.1.33-community-log : Database - inventory
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inventory`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `accid` int(50) DEFAULT NULL,
  `acctype` varchar(50) NOT NULL DEFAULT '',
  `account` decimal(20,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`id`,`accid`,`acctype`,`account`) values (12,51,'2','10100'),(3,54,'1','400'),(9,27,'1','346');

/*Table structure for table `authteam` */

DROP TABLE IF EXISTS `authteam`;

CREATE TABLE `authteam` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `teamname` varchar(25) NOT NULL DEFAULT '',
  `teamlead` varchar(25) NOT NULL DEFAULT '',
  `status` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `teamname` (`teamname`,`teamlead`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

/*Data for the table `authteam` */

insert  into `authteam`(`id`,`teamname`,`teamlead`,`status`) values (1,'administrator','','active'),(3,'suppliers','administrator','active'),(2,'members','administrator','active');

/*Table structure for table `categorie` */

DROP TABLE IF EXISTS `categorie`;

CREATE TABLE `categorie` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `categorie` */

insert  into `categorie`(`id`,`description`) values (1,'Fruits and vegetables'),(2,'cosmetics'),(3,'Cans'),(4,'Nutrition'),(5,'Meat And chicken'),(6,'others');

/*Table structure for table `creditinfo` */

DROP TABLE IF EXISTS `creditinfo`;

CREATE TABLE `creditinfo` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(4) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `number` int(20) DEFAULT NULL,
  `total` decimal(50,0) DEFAULT NULL,
  `expirydate` int(11) DEFAULT NULL,
  `code` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`,`pid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `creditinfo` */

insert  into `creditinfo`(`id`,`pid`,`name`,`number`,`total`,`expirydate`,`code`) values (56,27,'mike',12132,'66',11,111),(57,27,'rtret',34535,'533',33,211),(58,27,'rtret',34535,'56',33,211),(59,27,'rtret',34535,'0',33,211),(60,27,'rtret',34535,'23',33,211),(61,27,'rtret',34535,'23',33,211),(62,27,'rtret',34535,'46',33,211),(63,27,'rtret',34535,'46',33,211),(64,27,'rtret',34535,'46',33,211),(65,27,'rtret',34535,'46',33,211),(66,27,'rtret',34535,'46',33,211),(67,27,'rtret',34535,'46',33,211),(68,27,'rtret',34535,'46',33,211),(69,27,'rtret',34535,'46',33,211),(70,27,'rtret',34535,'46',33,211),(71,27,'rtret',34535,'46',33,211),(72,27,'rtret',34535,'46',33,211),(73,27,'rtret',34535,'46',33,211),(74,27,'rtret',34535,'46',33,211),(75,27,'rtret',34535,'46',33,211),(76,27,'rtret',34535,'46',33,211),(77,27,'rtret',34535,'0',33,211),(78,27,'rtretkkk',34535,'23',33,211),(79,27,'rtretkkk',34535,'0',33,211),(80,27,'rtret',34535,'161',33,211),(81,27,'rtret',34535,'0',33,211),(82,27,'rtret',34535,'0',33,211),(83,27,'rtret',34535,'0',33,211),(84,27,'rtret',34535,'161',33,211),(85,27,'rtret',34535,'0',33,211),(86,27,'rtret',34535,'0',33,211),(87,27,'rtret',34535,'0',33,211),(88,27,'rtret',34535,'0',33,211),(89,27,'rtret',34535,'0',33,211),(90,27,'mimo',123456,'125',11,123),(91,27,'mimo',123456,'240',11,123),(92,27,'mimo',123456,'0',11,123),(93,27,'mimo',123456,'2024',11,123),(94,27,'mimo',123456,'207',11,123),(95,27,'mimo',123456,'0',11,123);

/*Table structure for table `invoice` */

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(200) DEFAULT NULL,
  `TransDate` varchar(10) DEFAULT NULL,
  `whouse` smallint(2) DEFAULT NULL,
  `pid` varchar(25) DEFAULT NULL,
  `typeid` int(2) unsigned NOT NULL,
  `qty` int(200) DEFAULT NULL,
  `Discount` decimal(5,0) DEFAULT NULL,
  `Total` decimal(9,0) DEFAULT NULL,
  PRIMARY KEY (`id`,`typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `invoice` */

insert  into `invoice`(`id`,`item`,`TransDate`,`whouse`,`pid`,`typeid`,`qty`,`Discount`,`Total`) values (72,'sdfsf','11-11-11',0,'54',1,10,NULL,'100'),(75,'sdfsf','11-11-1999',0,'27',1,10,NULL,'100'),(76,'sdfsf','11-11-1999',0,'27',1,10,NULL,'100'),(77,'sdfsf','11-11-1999',0,'27',1,10,NULL,'100'),(78,'sdfsf','11-11-11',0,'51',2,500,NULL,'5000'),(79,'sdfsf','11-11-11',6,'51',2,10,NULL,'100'),(80,'sdfsf','11-11-11',0,'51',2,10,NULL,'100'),(81,'sdfsf','11-11-11',0,'51',2,10,NULL,'100'),(82,'sdfsf','11-11-11',0,'51',2,10,NULL,'100'),(83,'sdfsf','11-11-11',0,'51',2,10,NULL,'100'),(84,'sdfsf','11-11-11',0,'51',2,10,NULL,'100'),(85,'sdfsf','11-11-11',0,'51',2,10,NULL,'100'),(86,'sdfsf','11-11-11',0,'51',2,10,NULL,'100'),(87,'xcxc','11-11-11',0,'51',2,1000,NULL,'10000');

/*Table structure for table `invoicetype` */

DROP TABLE IF EXISTS `invoicetype`;

CREATE TABLE `invoicetype` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `invoicetype` */

insert  into `invoicetype`(`id`,`description`) values (1,'credit'),(2,'debit');

/*Table structure for table `people` */

DROP TABLE IF EXISTS `people`;

CREATE TABLE `people` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `accid` int(4) DEFAULT NULL,
  `uname` varchar(255) NOT NULL DEFAULT '',
  `passwd` varchar(255) NOT NULL DEFAULT '',
  `Company` varchar(255) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Discount` decimal(9,0) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dateofbirth` varchar(20) DEFAULT NULL,
  `level` int(4) NOT NULL DEFAULT '0',
  `team` varchar(10) NOT NULL DEFAULT '',
  `status` varchar(10) NOT NULL DEFAULT '',
  `lastlogin` datetime DEFAULT NULL,
  `logincount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `people` */

insert  into `people`(`id`,`fullname`,`accid`,`uname`,`passwd`,`Company`,`Phone`,`Address`,`Discount`,`email`,`dateofbirth`,`level`,`team`,`status`,`lastlogin`,`logincount`) values (27,'maarouf karakeh',1,'maarouf','0cc175b9c0f1b6a831c399e269772661','ghjghj',NULL,NULL,NULL,NULL,NULL,1,'1','','2009-08-17 14:08:42',NULL),(54,'aaaaa aaa',1,'yuiyi','c74fe7c6ba2963d7f2f4304226a6fb4a','iuiyi','yiyui','uyiuyi',NULL,'hanaahage@hotmail.com','yiuuyi',0,'2','Active','0000-00-00 00:00:00',0),(51,'SDSD',2,'','','SDS','DSD','SDS',NULL,NULL,'DSD',0,'3','Active','0000-00-00 00:00:00',0);

/*Table structure for table `stock` */

DROP TABLE IF EXISTS `stock`;

CREATE TABLE `stock` (
  `stockid` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `whouse` varchar(10) DEFAULT NULL,
  `sn` int(13) DEFAULT NULL,
  `categorie` varchar(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `package` int(4) DEFAULT NULL,
  `cost` decimal(10,0) DEFAULT NULL,
  `pix` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`stockid`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `stock` */

insert  into `stock`(`stockid`,`name`,`info`,`whouse`,`sn`,`categorie`,`qty`,`package`,`cost`,`pix`) values (13,'xcxc','xcvfxv ','sdfsf',232323,'2',990,0,'23','../my/images/Green Sea Turtle.jpg'),(66,'sdfsf','sadfsffffffffffffffffffffffffffffs\r\nsdfdsf\r\nsfsf\r\nsfsf\r\nsfsf ','sdsfsdf',334,'1',436,1,'33','../my/images/inventorycontrol.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
