/*
Navicat MySQL Data Transfer

Source Server         : swe3613_db05
Source Server Version : 50535
Source Host           : swe3613.com:3306
Source Database       : swe3613_db05p2

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-11-23 10:53:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_degrees`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_degrees`;
CREATE TABLE `tbl_degrees` (
  `degree_id` int(11) NOT NULL,
  `degree_name` varchar(45) NOT NULL,
  PRIMARY KEY (`degree_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_degrees
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_messages`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_messages`;
CREATE TABLE `tbl_messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_text` varchar(5000) NOT NULL,
  `message_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_messages
-- ----------------------------
INSERT INTO `tbl_messages` VALUES ('0', 'hello', '2014-11-22 21:57:34');
INSERT INTO `tbl_messages` VALUES ('1', 'world', '2014-11-22 21:57:38');
INSERT INTO `tbl_messages` VALUES ('2', '!', '2014-11-22 21:57:40');
INSERT INTO `tbl_messages` VALUES ('3', 'This is not18@gmail.com', '2014-11-22 21:30:35');
INSERT INTO `tbl_messages` VALUES ('4', 'This is another test... This is going from Ashley to Tim', '2014-11-22 21:50:59');

-- ----------------------------
-- Table structure for `tbl_mutual_tickles`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mutual_tickles`;
CREATE TABLE `tbl_mutual_tickles` (
  `initiator_id` int(11) NOT NULL,
  `reciprocator_id` int(11) NOT NULL,
  `initiation_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reciprocation_timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`initiator_id`,`reciprocator_id`),
  KEY `fk_mutual_tickles_users_02_idx` (`reciprocator_id`),
  CONSTRAINT `fk_mutual_tickles_users_01` FOREIGN KEY (`initiator_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mutual_tickles_users_02` FOREIGN KEY (`reciprocator_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_mutual_tickles
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_persuits`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_persuits`;
CREATE TABLE `tbl_persuits` (
  `user_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`program_id`,`degree_id`),
  KEY `fk_tbl_persuits_02_idx` (`program_id`),
  KEY `fk_tbl_persuits_03_idx` (`degree_id`),
  CONSTRAINT `fk_tbl_persuits_01` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_persuits_02` FOREIGN KEY (`program_id`) REFERENCES `tbl_programs` (`program_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_persuits_03` FOREIGN KEY (`degree_id`) REFERENCES `tbl_degrees` (`degree_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_persuits
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_programs`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_programs`;
CREATE TABLE `tbl_programs` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(255) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_programs
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_recipients`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_recipients`;
CREATE TABLE `tbl_recipients` (
  `message_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  KEY `fk_tbl_messages_01_idx` (`message_id`),
  CONSTRAINT `fk_tbl_recipients_01` FOREIGN KEY (`message_id`) REFERENCES `tbl_messages` (`message_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_recipients
-- ----------------------------
INSERT INTO `tbl_recipients` VALUES ('0', '2', '1');
INSERT INTO `tbl_recipients` VALUES ('1', '1', '2');

-- ----------------------------
-- Table structure for `tbl_runs`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_runs`;
CREATE TABLE `tbl_runs` (
  `runner_id` int(11) NOT NULL,
  `runee_id` int(11) NOT NULL,
  PRIMARY KEY (`runner_id`,`runee_id`),
  KEY `fk_run_user_02_idx` (`runee_id`),
  CONSTRAINT `fk_runs_users_01` FOREIGN KEY (`runner_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_runs_users_02` FOREIGN KEY (`runee_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_runs
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_tickles`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tickles`;
CREATE TABLE `tbl_tickles` (
  `tickler_id` int(11) NOT NULL,
  `ticklee_id` int(11) NOT NULL,
  `tickle_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tickler_id`,`ticklee_id`),
  KEY `fk_tickle_user_02_idx` (`ticklee_id`),
  CONSTRAINT `fk_tickles_users_01` FOREIGN KEY (`tickler_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tickles_users_02` FOREIGN KEY (`ticklee_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_tickles
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` enum('female','male') NOT NULL,
  `age` int(11) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `male_friend` bool NOT NULL,
  `female_friend` bool NOT NULL,
  `male_date` bool NOT NULL,
  `female_date` bool NOT NULL,
  `about_me` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES ('1', 'mbyrd@spsu.edu', 'pass', 'male', '22', 'Mitchell', 'Byrd', '1', '1', '0', '1', 'I do all my own laundry');
INSERT INTO `tbl_users` VALUES ('2', 'tzuspan@spsu.edu', 'pass', 'male', '35', 'Tim', 'Zuspan', '1', '1', '1', '1', 'I do all my own stunts.');
INSERT INTO `tbl_users` VALUES ('3', 'ASmith@yahoo.com', 'Smith123', 'female', '23', 'Ashley', 'Smith', '0', '1', '1', '0', 'I love to play video games');
INSERT INTO `tbl_users` VALUES ('4', 'not18@gmail.com', 'not18', 'male', '18', 'Andre', 'Banker', '1', '1', '0', '1', 'I\'m not really 18');
INSERT INTO `tbl_users` VALUES ('5', 'TJackson@yahoo.com', 'password123', 'female', '32', 'Tiffany', 'Jackson', '1', '0', '1', '1', 'I love to get go out and have fun');
INSERT INTO `tbl_users` VALUES ('6', 'Rbarner@spsu.edu', 'tester01', 'male', '23', 'Ronnie', 'Barner', '1', '1', '0', '1', 'I love to play xbox one and travel');
INSERT INTO `tbl_users` VALUES ('7', 'BobCommander@yahoo.com', 'army01', 'male', '23', 'Bob', 'Commander', '1', '1', '0', '0', 'Enjoying hauting, fishing, and outdoor sports.');
INSERT INTO `tbl_users` VALUES ('8', 'JohnSmith@spsu.edu', 'John Test', 'male', '18', 'John', 'Smith', '0', '0', '0', '1', 'Enjoy chilling with friends.');
INSERT INTO `tbl_users` VALUES ('9', 'Deon@spsu.edu', 'Johnson', 'male', '29', 'Deon', 'Johnson', '1', '0', '1', '1', 'Like spending time with my son.');
INSERT INTO `tbl_users` VALUES ('10', 'JessicaThompson@gmail.com', 'JThompson', 'female', '22', 'Jessica', 'Thompson', '1', '1', '1', '0', 'Love to party.');
INSERT INTO `tbl_users` VALUES ('11', 'TimLee@spsu.edu', 'TimLee1', 'female', '19', 'Tim', 'Lee', '1', '1', '1', '0', 'I like to sing for the church.');
