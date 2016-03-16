/*
 Navicat Premium Data Transfer

 Source Server         : odnoplatniki.net
 Source Server Type    : MySQL
 Source Server Version : 50545
 Source Host           : odnoplatniki.net
 Source Database       : c7674_new

 Target Server Type    : MySQL
 Target Server Version : 50545
 File Encoding         : utf-8

 Date: 03/16/2016 23:36:28 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=cp1251;

SET FOREIGN_KEY_CHECKS = 1;
