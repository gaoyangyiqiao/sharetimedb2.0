SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE shareTime2;

DROP TABLE IF EXISTS `st_user`;
CREATE TABLE `st_user` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(15)  NOT NULL,
  `photopath` VARCHAR(32) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `st_activity`;
CREATE TABLE `st_activity` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` TEXT DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `userRelation`;
CREATE TABLE `userRelation` (
  `user1_id` SMALLINT(6) NOT NULL ,
  `user2_id` SMALLINT(6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


