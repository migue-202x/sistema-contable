/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : claves

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 22/12/2020 15:14:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for claves
-- ----------------------------
DROP TABLE IF EXISTS `claves`;
CREATE TABLE `claves`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contrasenia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uso` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of claves
-- ----------------------------
INSERT INTO `claves` VALUES (1, '6272', 'false');
INSERT INTO `claves` VALUES (2, '6196', 'false');
INSERT INTO `claves` VALUES (3, '9796', 'true');
INSERT INTO `claves` VALUES (4, '4470', 'true');
INSERT INTO `claves` VALUES (5, '4761', 'true');
INSERT INTO `claves` VALUES (6, '8460', 'true');
INSERT INTO `claves` VALUES (7, '4172', 'true');
INSERT INTO `claves` VALUES (8, '9366', 'true');
INSERT INTO `claves` VALUES (9, '6187', 'true');
INSERT INTO `claves` VALUES (10, '3335', 'true');
INSERT INTO `claves` VALUES (11, '3642', 'true');
INSERT INTO `claves` VALUES (12, '9674', 'true');
INSERT INTO `claves` VALUES (13, '7080', 'true');
INSERT INTO `claves` VALUES (14, '8497', 'true');
INSERT INTO `claves` VALUES (15, '5871', 'true');
INSERT INTO `claves` VALUES (16, '7657', 'true');
INSERT INTO `claves` VALUES (17, '4137', 'true');
INSERT INTO `claves` VALUES (18, '5806', 'true');
INSERT INTO `claves` VALUES (19, '6735', 'true');
INSERT INTO `claves` VALUES (20, '4386', 'true');
INSERT INTO `claves` VALUES (21, '9186', 'true');
INSERT INTO `claves` VALUES (22, '4581', 'true');
INSERT INTO `claves` VALUES (23, '7776', 'true');
INSERT INTO `claves` VALUES (24, '4444', 'true');
INSERT INTO `claves` VALUES (25, '4444', 'true');

SET FOREIGN_KEY_CHECKS = 1;
