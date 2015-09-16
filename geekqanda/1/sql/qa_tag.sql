/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : geekqanda

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2014-10-22 21:54:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `qa_tag`
-- ----------------------------
DROP TABLE IF EXISTS `qa_tag`;
CREATE TABLE `qa_tag` (
  `qa_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qa_tag
-- ----------------------------
