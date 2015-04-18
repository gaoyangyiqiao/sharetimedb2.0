SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE shareTime;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(15)  NOT NULL,
  `photopath` VARCHAR(32) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` TEXT DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `userRelation`;
CREATE TABLE `userRelation` (
  `user1_id` SMALLINT(6) NOT NULL ,
  `user2_id` SMALLINT(6) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `add_contact`;
CREATE TABLE `add_contact` (
  `id` SMALLINT(6)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `sender_id` SMALLINT(6) NOT NULL ,
  `receiver_id` SMALLINT(6) NOT NULL,
  `content` TEXT DEFAULT NULL ,
  `is_passed` INT DEFAULT 0
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `invitation`;
CREATE TABLE `invitation` (
  `id` SMALLINT(6)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `sender_id` SMALLINT(6) NOT NULL ,
  `receiver_id` SMALLINT(6) NOT NULL,
  `activity_id` SMALLINT(6) NOT NULL ,
  `is_passed` INT DEFAULT 0
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


