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

# private String id;
# private String theme;
# private String content;
# private ContactPO founder;
# private Date receiveTime;
# private Date startTime;
# private Date endTime;
# private ArrayList<ContactPO> contacts;
# private int right;//对外可见的权限
# 默认可见
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(50) DEFAULT NULL,
  `content` TEXT DEFAULT NULL,
  `founder_id` SMALLINT(6) NOT NULL,
  `receive_time` DATETIME NOT NULL,
  `begin_time` DATETIME NOT NULL,
  `end_time` DATETIME NOT NULL,
  `contacts_id` TEXT DEFAULT NULL,
  `right` SMALLINT(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user_relation`;
CREATE TABLE `user_relation` (
  `id` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `user1_id` SMALLINT(6) NOT NULL ,
  `user2_id` SMALLINT(6) NOT NULL,
  `right` SMALLINT(1) NOT NULL,
  `tip` varchar(15) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `user_activity_relation`;
CREATE TABLE `user_activity_relation` (
  `user_id` SMALLINT(6) NOT NULL ,
  `activity_id` SMALLINT(6) NOT NULL
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


