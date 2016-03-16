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

 Date: 03/16/2016 23:36:42 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `payments`
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `payment_number` int(11) DEFAULT NULL,
  `LMI_HASH` varchar(255) DEFAULT NULL,
  `LMI_MERCHANT_ID` varchar(255) DEFAULT NULL,
  `LMI_PAYMENT_NO` varchar(255) DEFAULT NULL,
  `LMI_SYS_PAYMENT_ID` varchar(255) DEFAULT NULL,
  `LMI_SYS_PAYMENT_DATE` varchar(255) DEFAULT NULL,
  `LMI_PAYMENT_AMOUNT` varchar(255) DEFAULT NULL,
  `LMI_CURRENCY` varchar(255) DEFAULT NULL,
  `LMI_PAID_AMOUNT` varchar(255) DEFAULT NULL,
  `LMI_PAID_CURRENCY` varchar(255) DEFAULT NULL,
  `LMI_PAYMENT_SYSTEM` varchar(255) DEFAULT NULL,
  `LMI_SIM_MODE` varchar(255) DEFAULT NULL,
  `LMI_SECRET_KEY` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

SET FOREIGN_KEY_CHECKS = 1;
