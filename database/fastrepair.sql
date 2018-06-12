/*
Navicat MySQL Data Transfer

Source Server         : fastrepair
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : fastrepair

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2018-06-13 03:14:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sub_co` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `if_specialist` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_permission` int(11) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', 'Arthur', 'Washington', 'CoDeR', 'Not Specialist', '123456', '1');
INSERT INTO `employee` VALUES ('2', 'Lois', 'New York', 'AutoR', 'Not Specialist', '123456', '1');
INSERT INTO `employee` VALUES ('3', 'Catty', 'Florida', 'AppR', 'Not Specialist', '123456', '1');
INSERT INTO `employee` VALUES ('4', 'Bob', 'HQ', 'null', 'Not Specialist', '123456', '2');

-- ----------------------------
-- Table structure for personal_bo_re
-- ----------------------------
DROP TABLE IF EXISTS `personal_bo_re`;
CREATE TABLE `personal_bo_re` (
  `no` bigint(20) NOT NULL AUTO_INCREMENT,
  `tool` varchar(50) DEFAULT NULL,
  `hand_time` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personal_bo_re
-- ----------------------------
INSERT INTO `personal_bo_re` VALUES ('1', 'CoDeR_Tool_01', '2018-06-12', 'Borrowed', '1');
INSERT INTO `personal_bo_re` VALUES ('3', 'CoDeR_Tool_01', '2018-06-12', 'Returned', '1');

-- ----------------------------
-- Table structure for tool
-- ----------------------------
DROP TABLE IF EXISTS `tool`;
CREATE TABLE `tool` (
  `tool_id` int(11) NOT NULL AUTO_INCREMENT,
  `tool_name` varchar(255) DEFAULT NULL,
  `sub_co` varchar(255) DEFAULT NULL,
  `tool_type` varchar(255) DEFAULT NULL,
  `if_price_over_200` varchar(5) DEFAULT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `tool_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`tool_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tool
-- ----------------------------
INSERT INTO `tool` VALUES ('1', 'CoDeR_Tool_01', 'Washington', 'CoDeR', 'No', '1', 'lent');
INSERT INTO `tool` VALUES ('2', 'CoDeR_Tool_01', 'New York', 'AutoR', 'No', null, 'online');
