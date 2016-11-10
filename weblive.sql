/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - weblive
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`weblive` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `weblive`;

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `usercomment` */

CREATE TABLE `usercomment` (
  `ucid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `liveid` int(11) DEFAULT NULL COMMENT '关联weblive表的liveid',
  `ucomment` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '评论内容',
  `ctime` datetime DEFAULT NULL COMMENT '发布时间',
  `uid` int(11) DEFAULT NULL COMMENT 'cutv用户id号',
  `nickname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '昵称',
  `mobile` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机号码',
  `useravatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户头像',
  `localrecord` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户标志',
  `userip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户ip',
  `delflag` int(11) DEFAULT NULL COMMENT '删除标志（0是不删除，1是已删除）',
  `verifyflag` int(11) DEFAULT NULL COMMENT '审核标志（0为不通过，1为通过）',
  PRIMARY KEY (`ucid`),
  KEY `delflag` (`delflag`),
  KEY `verifyflag` (`verifyflag`),
  KEY `liveid` (`liveid`),
  KEY `ctime` (`ctime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `usercomment` */

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'admin','admin@olive.cn','$2y$10$m9xJhT0HRrx8KYFEbk1xVussDducIC/EQ9iofM0dah2QgbIdf5fh6',NULL,'2016-10-26 08:27:43','2016-10-26 08:27:43');

/*Table structure for table `viewrecord` */

CREATE TABLE `viewrecord` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `liveid` int(11) DEFAULT NULL COMMENT '关联weblive表liveid',
  `localrecord` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户标志',
  `userip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户ip',
  `userphone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户手机号码',
  `viewtime` datetime DEFAULT NULL COMMENT '首次观看时间',
  PRIMARY KEY (`id`),
  KEY `liveid` (`liveid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `viewrecord` */

insert  into `viewrecord`(`id`,`liveid`,`localrecord`,`userip`,`userphone`,`viewtime`) values (7,1,'2016102711070867445','::1',NULL,'2016-10-31 10:11:43');

/*Table structure for table `webifo` */

CREATE TABLE `webifo` (
  `ifoid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `liveid` int(11) DEFAULT NULL COMMENT '关联weblive表的liveid',
  `ifotitle` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '小标题',
  `ifocontent` text COLLATE utf8_unicode_ci COMMENT '内容',
  `ifotime` datetime DEFAULT NULL COMMENT '发布时间',
  `delflag` int(4) DEFAULT '0' COMMENT '删除标志（0为未删除，1为删除）',
  PRIMARY KEY (`ifoid`),
  KEY `liveid` (`liveid`),
  KEY `delflag` (`delflag`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `webifo` */

insert  into `webifo`(`ifoid`,`liveid`,`ifotitle`,`ifocontent`,`ifotime`,`delflag`) values (1,1,'豆腐干豆腐干豆腐干豆腐干豆','fgjhfghfghfghfgh山东分公司的分公司的分公司的分公司的风格山东分公司的分公司的分公司的分公司的分公司的风格山东分公司的风格','2016-10-25 15:40:13',0),(2,1,'678','gkjkgjkghjkgjkjh<img src=\"1.jpg\">','2016-10-26 10:58:12',0),(3,1,'23234','34234234','2016-10-28 09:47:22',0),(4,1,'222','3333','2016-10-29 17:04:33',0),(5,1,'333','345345345345345','2016-10-30 09:28:39',0),(6,1,'4444','56456456456456456','2016-10-30 10:28:55',0),(7,1,'55555','dfgdfgfgfdg','2016-10-30 11:29:14',0),(13,1,'666','22222','2016-10-30 12:28:55',0),(18,1,'7777','777777777777777','2016-11-01 16:41:39',0);

/*Table structure for table `weblive` */

CREATE TABLE `weblive` (
  `liveid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `livetitle` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标题(必填)',
  `livetime` datetime DEFAULT NULL COMMENT '发送时间',
  `liveimg` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '封面图片',
  `livecontent` text COLLATE utf8_unicode_ci COMMENT '内容简介',
  `pnum` int(11) DEFAULT '0' COMMENT '观看人数',
  `readnum` int(11) DEFAULT '0' COMMENT '点击次数',
  `commentflag` int(4) DEFAULT '0' COMMENT '评论标志（0无评论，1有评论）',
  PRIMARY KEY (`liveid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `weblive` */

insert  into `weblive`(`liveid`,`livetitle`,`livetime`,`liveimg`,`livecontent`,`pnum`,`readnum`,`commentflag`) values (1,'123','2016-10-25 15:35:45',NULL,'asdfasdfasdf',6,201,1),(2,'234','2016-10-28 16:45:36',NULL,NULL,0,3,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
