/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : contable

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 22/12/2020 15:14:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for asientoborrador
-- ----------------------------
DROP TABLE IF EXISTS `asientoborrador`;
CREATE TABLE `asientoborrador`  (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `id_sw` int(255) NULL DEFAULT NULL,
  `num_asiento` int(30) NOT NULL,
  `num_renglon` int(30) NOT NULL,
  `fecha_contable` date NOT NULL,
  `cuenta` int(11) NOT NULL,
  `tipo_asiento` int(1) NOT NULL,
  `fecha_vto` date NOT NULL,
  `fecha_opera` date NOT NULL,
  `cod_sucursal` int(11) NOT NULL,
  `cod_seccion` int(11) NOT NULL,
  `comprobante` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descripcion` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `debe` double NOT NULL,
  `haber` double NOT NULL,
  `inflacion` tinyint(1) NOT NULL,
  `okcarga` tinyint(1) NOT NULL,
  `registrado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cuenta`(`cuenta`) USING BTREE,
  CONSTRAINT `asientoborrador_ibfk_1` FOREIGN KEY (`cuenta`) REFERENCES `plandecuenta` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 250 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asientoborrador
-- ----------------------------
INSERT INTO `asientoborrador` VALUES (31, 429, 3, 2, '0000-00-00', 11, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 2.22, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (35, 866, 5, 2, '0000-00-00', 4, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 88, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (37, 539, 6, 2, '0000-00-00', 4, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 22, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (39, 365, 7, 2, '0000-00-00', 4, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 23, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (43, 849, 9, 2, '0000-00-00', 4, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 78, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (45, 903, 10, 2, '0000-00-00', 3, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 12, 0, 1, 0);
INSERT INTO `asientoborrador` VALUES (49, 119, 12, 2, '0000-00-00', 3, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 22, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (51, 439, 13, 2, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 3, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (55, 960, 15, 2, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 23, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (71, 449, 16, 4, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 5, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (89, 986, 24, 2, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 22, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (105, 462, 24, 4, '0000-00-00', 4, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 6, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (121, 1, 3, 3, '0000-00-00', 2, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 20, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (128, 0, 3, 4, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 22.22, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (132, 0, 5, 3, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (147, 1, 8, 1, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 12, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (148, 1, 22, 1, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 6666, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (149, 383, 22, 2, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 5.55, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (153, 0, 5, 4, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 87, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (154, 0, 5, 5, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (155, 0, 8, 2, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (156, 0, 24, 5, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 28, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (157, 0, 6, 3, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 22, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (158, 1, 25, 1, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 10, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (159, 525, 25, 2, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 10, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (160, 0, 3, 5, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (161, 1, 26, 1, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 9, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (162, 237, 26, 2, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 9, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (163, 1, 27, 1, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 12, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (164, 0, 26, 3, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (165, 0, 26, 4, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (166, 0, 26, 5, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 2, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (167, 0, 27, 2, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 12, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (168, 0, 27, 3, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (169, 0, 27, 4, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (170, 0, 27, 5, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (171, 0, 27, 6, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (172, 0, 27, 7, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (173, 0, 27, 8, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (174, 0, 27, 9, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (175, 0, 27, 10, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (176, 0, 27, 11, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (177, 0, 27, 12, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (178, 0, 27, 13, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (179, 0, 27, 14, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (180, 0, 27, 15, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (181, 0, 27, 16, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (182, 0, 27, 17, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (183, 0, 27, 18, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (184, 0, 27, 19, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (185, 0, 27, 20, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (186, 0, 27, 21, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (187, 0, 27, 22, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (188, 0, 27, 23, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (189, 0, 27, 24, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (190, 0, 27, 25, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (191, 0, 27, 26, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (192, 0, 27, 27, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (193, 0, 27, 28, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (194, 0, 27, 29, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (195, 0, 27, 30, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 2, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (196, 0, 3, 6, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (197, 0, 3, 7, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (198, 504, 3, 8, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (199, 0, 3, 9, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (200, 578, 3, 10, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (201, 0, 3, 11, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 2, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (202, 0, 3, 12, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 2, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (203, 0, 3, 13, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (204, 0, 3, 14, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (205, 0, 3, 15, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 6, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (206, 0, 3, 16, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (207, 0, 3, 17, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (208, 0, 3, 18, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 2, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (209, 0, 27, 31, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 25, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (210, 0, 27, 32, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (211, 0, 27, 33, '0000-00-00', 8, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (212, 0, 3, 19, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (213, 0, 3, 20, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (214, 0, 27, 34, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (215, 0, 5, 6, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (216, 0, 7, 3, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 23, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (217, 0, 7, 4, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (218, 0, 7, 5, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (219, 0, 7, 6, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (220, 0, 7, 7, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (221, 0, 7, 8, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (222, 0, 7, 9, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (223, 0, 7, 10, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (224, 0, 7, 11, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 1, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (225, 0, 7, 12, '0000-00-00', 4, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 10, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (226, 0, 7, 13, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 10, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (227, 0, 7, 14, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 10, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (228, 0, 7, 15, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 10, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (229, 0, 7, 16, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 20, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (230, 0, 7, 17, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (231, 1, 28, 1, '0000-00-00', 2, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 22, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (232, 1, 29, 1, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 12, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (233, 499, 29, 2, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 0, 12, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (234, 1, 29, 3, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 12, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (235, 1, 29, 4, '0000-00-00', 6, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 11, 0, 0, 0, 0);
INSERT INTO `asientoborrador` VALUES (240, 0, 10, 3, '0000-00-00', 7, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 12, 0, 0, 1, 0);
INSERT INTO `asientoborrador` VALUES (242, 0, 3, 21, '0000-00-00', 9, 0, '0000-00-00', '0000-00-00', 0, 0, '', '', 1, 0, 0, 0, 0);

-- ----------------------------
-- Table structure for asientodefinitivo
-- ----------------------------
DROP TABLE IF EXISTS `asientodefinitivo`;
CREATE TABLE `asientodefinitivo`  (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `num_asiento` int(30) NOT NULL,
  `num_renglon` int(30) NOT NULL,
  `fecha_contable` date NOT NULL,
  `cuenta` int(11) NOT NULL,
  `tipo_asiento` int(1) NOT NULL,
  `fecha_vto` date NOT NULL,
  `fecha_opera` date NOT NULL,
  `cod_sucursal` int(11) NOT NULL,
  `cod_seccion` int(11) NOT NULL,
  `comprobante` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descripcion` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `debe` double NOT NULL,
  `haber` double NOT NULL,
  `inflacion` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ID_Cuenta`(`cuenta`) USING BTREE,
  CONSTRAINT `asientodefinitivo_ibfk_1` FOREIGN KEY (`cuenta`) REFERENCES `plandecuenta` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asientodefinitivo
-- ----------------------------
INSERT INTO `asientodefinitivo` VALUES (1, 1, 1, '2019-01-01', 2, 1, '2019-01-01', '2019-01-01', 0, 0, 'Contrato So 0', 'Apertura del ejercicio', 30000, 0, 0);
INSERT INTO `asientodefinitivo` VALUES (2, 1, 2, '2019-01-01', 3, 1, '2019-01-01', '2019-01-01', 0, 0, 'Contrato So 0', 'Apertura del ejercicio', 15000, 0, 0);
INSERT INTO `asientodefinitivo` VALUES (3, 1, 3, '2019-01-01', 4, 1, '2019-01-01', '2019-01-12', 0, 0, 'Contrato So 0', 'Apertura del ejercicio', 15000, 0, 0);
INSERT INTO `asientodefinitivo` VALUES (4, 1, 4, '2019-01-01', 5, 1, '2019-01-01', '2019-01-01', 0, 0, 'Contrato So 0', 'Apertura del ejercicio', 0, 60000, 0);
INSERT INTO `asientodefinitivo` VALUES (5, 2, 1, '2019-01-03', 6, 2, '2019-01-03', '2019-01-03', 0, 0, 'BD 05423', 'Depósito en efectivo', 2500, 0, 0);
INSERT INTO `asientodefinitivo` VALUES (8, 2, 2, '2019-01-03', 2, 2, '2019-01-03', '2019-01-03', 0, 0, 'BD 05423', 'Depósito en efectivo', 0, 2500, 0);

-- ----------------------------
-- Table structure for asientodefinitivo2
-- ----------------------------
DROP TABLE IF EXISTS `asientodefinitivo2`;
CREATE TABLE `asientodefinitivo2`  (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `num_asiento` int(30) NOT NULL,
  `num_renglon` int(30) NOT NULL,
  `fecha_contable` date NOT NULL,
  `cuenta` int(11) NOT NULL,
  `tipo_asiento` int(1) NOT NULL,
  `fecha_vto` date NOT NULL,
  `fecha_opera` date NOT NULL,
  `cod_sucursal` int(11) NOT NULL,
  `cod_seccion` int(11) NOT NULL,
  `comprobante` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descripcion` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `debe` double NOT NULL,
  `haber` double NOT NULL,
  `inflacion` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ID_Cuenta`(`cuenta`) USING BTREE,
  CONSTRAINT `asientodefinitivo2_ibfk_1` FOREIGN KEY (`cuenta`) REFERENCES `plandecuenta` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for mayor
-- ----------------------------
DROP TABLE IF EXISTS `mayor`;
CREATE TABLE `mayor`  (
  `id` int(11) NOT NULL,
  `ult_renglon` int(11) NOT NULL,
  `ult_fecha` date NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for plandecuenta
-- ----------------------------
DROP TABLE IF EXISTS `plandecuenta`;
CREATE TABLE `plandecuenta`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `Codigo`(`codigo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of plandecuenta
-- ----------------------------
INSERT INTO `plandecuenta` VALUES (1, '1', 1, 'ACTIVO', 0);
INSERT INTO `plandecuenta` VALUES (2, '1.1.01.01', 4, 'Caja', 1);
INSERT INTO `plandecuenta` VALUES (3, '1.1.05.01', 4, 'Socio 1 cuenta', 0);
INSERT INTO `plandecuenta` VALUES (4, '1.1.05.02', 4, 'Socio 2 cuenta', 1);
INSERT INTO `plandecuenta` VALUES (5, '3.1.01', 3, 'Capital social', 1);
INSERT INTO `plandecuenta` VALUES (6, '1.1.01.02.01', 5, 'Banco Provincia c.c.', 1);
INSERT INTO `plandecuenta` VALUES (7, '1.1.01.02.02', 5, 'Banco Nacion c. de a', 1);
INSERT INTO `plandecuenta` VALUES (8, '1.1.02.01', 4, 'Deudores en c.c.', 1);
INSERT INTO `plandecuenta` VALUES (9, '1.1.01.03', 4, 'Valores a depositar', 1);
INSERT INTO `plandecuenta` VALUES (10, '1.1', 2, 'ACTIVO CORRIENTE', 0);
INSERT INTO `plandecuenta` VALUES (11, '1.1.01', 3, 'DISPONIBILIDADES', 0);
INSERT INTO `plandecuenta` VALUES (12, '1.1.01.02', 4, 'BANCOSsss', 0);
INSERT INTO `plandecuenta` VALUES (13, '1.1.02', 3, 'CUENTAS POR COBRAR', 0);
INSERT INTO `plandecuenta` VALUES (14, '1.1.05', 3, 'OTROS CREDITOS', 0);
INSERT INTO `plandecuenta` VALUES (15, '3', 1, 'PATRIMONIO NETO', 0);
INSERT INTO `plandecuenta` VALUES (16, '3.1', 2, 'CAPITAL', 0);
INSERT INTO `plandecuenta` VALUES (17, '2', 1, 'PASIVO', 0);
INSERT INTO `plandecuenta` VALUES (18, '4', 1, 'RESULTADO POSITIVO', 0);
INSERT INTO `plandecuenta` VALUES (19, '5', 1, 'RESULTADO NEGATIVO', 0);
INSERT INTO `plandecuenta` VALUES (20, '1.1.01.02.03', 5, 'Otro Banco', 1);

SET FOREIGN_KEY_CHECKS = 1;
