/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50727
 Source Host           : 127.0.0.1:3309
 Source Schema         : ambulancia

 Target Server Type    : MySQL
 Target Server Version : 50727
 File Encoding         : 65001

 Date: 15/02/2020 12:43:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ambulancias
-- ----------------------------
DROP TABLE IF EXISTS `ambulancias`;
CREATE TABLE `ambulancias`  (
  `id_ambulancia` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kilometraje` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gasolina` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_chofer` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_ambulancia`) USING BTREE,
  INDEX `IX_Relationship4`(`id_chofer`) USING BTREE,
  CONSTRAINT `un chofer conduce una ambulancia` FOREIGN KEY (`id_chofer`) REFERENCES `choferes` (`id_chofer`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ambulancias
-- ----------------------------
INSERT INTO `ambulancias` VALUES (1, 'ASD-09-22', '50,000', '30 L', NULL);
INSERT INTO `ambulancias` VALUES (2, 'QWE-50-70', '70,000', '25 L', NULL);

-- ----------------------------
-- Table structure for choferes
-- ----------------------------
DROP TABLE IF EXISTS `choferes`;
CREATE TABLE `choferes`  (
  `id_chofer` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellidop` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellidom` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `celular` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_chofer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of choferes
-- ----------------------------
INSERT INTO `choferes` VALUES (1, 'Daniel', 'Eb ', 'Ek ', '9991345680');
INSERT INTO `choferes` VALUES (2, 'Jorge', 'Ek ', 'Chan', '9889662345');

-- ----------------------------
-- Table structure for destinos
-- ----------------------------
DROP TABLE IF EXISTS `destinos`;
CREATE TABLE `destinos`  (
  `id_destino` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `distancia` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_destino`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of destinos
-- ----------------------------
INSERT INTO `destinos` VALUES (1, 'IMMS Izamal', '20 Km');
INSERT INTO `destinos` VALUES (2, 'IMMS Motul', '30 Km');
INSERT INTO `destinos` VALUES (3, 'O\'Horan-Mérida', '44 Km');
INSERT INTO `destinos` VALUES (4, 'T1-Mérida', '50 Km');
INSERT INTO `destinos` VALUES (5, 'Juárez-Mérida', '63 Km');

-- ----------------------------
-- Table structure for solicitantes
-- ----------------------------
DROP TABLE IF EXISTS `solicitantes`;
CREATE TABLE `solicitantes`  (
  `curp` varchar(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellidop` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellidom` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `referencia` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto_credencial` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto_curp` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto_recibo_luz` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`curp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of solicitantes
-- ----------------------------
INSERT INTO `solicitantes` VALUES ('EXEJ991227HYNKKN03', 'Juan ', 'Ek ', 'Ek ', 'Calle 19 x 8 y 10 ', 'De la esquina de Tanque a media cuadra', 'mdkmvfkm', 'mdfmdmfdk', 'dmfdmf');
INSERT INTO `solicitantes` VALUES ('MACD000130HYNCHVA3', 'David ', 'Macías', 'Chan', 'Calle 17 #30-A x 8 y 10', 'En frente del carnicero Nandín', 'ewrer', 'sdff', 'dfvfdv');
INSERT INTO `solicitantes` VALUES ('NOPM980107MYNVTR08', 'Gabriela', 'Novelo ', 'Pat', 'Calle 17 #30-A x 8 y 10', 'En frente del carnicero Nandín', 'dfdsf', 'frefre', 'mfekrf');

-- ----------------------------
-- Table structure for solicitudes
-- ----------------------------
DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE `solicitudes`  (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_solicitud` date NOT NULL,
  `hora_solicitud` time(0) NOT NULL,
  `fecha_uso` date NOT NULL,
  `hora_uso` time(0) NOT NULL,
  `id_destino` int(11) NULL DEFAULT NULL,
  `estatus_solicitud` tinyint(4) NOT NULL DEFAULT 1,
  `curp` varchar(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_solicitud`) USING BTREE,
  INDEX `IX_Relationship3`(`curp`) USING BTREE,
  INDEX `IX_Relationship1`(`id_destino`) USING BTREE,
  CONSTRAINT `un solicitante puede hacer una o varias solicitudes` FOREIGN KEY (`curp`) REFERENCES `solicitantes` (`curp`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `una solicitud tiene un destino` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id_destino`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of solicitudes
-- ----------------------------
INSERT INTO `solicitudes` VALUES (1, '2020-02-02', '11:30:00', '2020-02-18', '08:30:00', 4, 1, 'EXEJ991227HYNKKN03');
INSERT INTO `solicitudes` VALUES (2, '2020-01-28', '10:20:27', '2020-02-18', '07:00:00', 3, 1, 'MACD000130HYNCHVA3');
INSERT INTO `solicitudes` VALUES (3, '2020-01-30', '11:21:14', '2020-02-19', '10:00:00', 5, 1, 'NOPM980107MYNVTR08');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellidop` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellidom` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `celular` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rol` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_cuenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'David Gabriel', 'Macías', 'Chan', '9992976052', 'Calle 17 #30-A x 8 y 10', 'admin', '12345', 'Administrador');

-- ----------------------------
-- Table structure for viajes
-- ----------------------------
DROP TABLE IF EXISTS `viajes`;
CREATE TABLE `viajes`  (
  `id_viaje` int(11) NOT NULL AUTO_INCREMENT,
  `personas` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_destino` int(11) NULL DEFAULT NULL,
  `id_ambulancia` int(11) NULL DEFAULT NULL,
  `id_chofer` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_viaje`) USING BTREE,
  INDEX `IX_Relationship5`(`id_destino`) USING BTREE,
  INDEX `IX_Relationship6`(`id_ambulancia`) USING BTREE,
  INDEX `IX_Relationship1`(`id_chofer`) USING BTREE,
  CONSTRAINT `un chofer va a un viaje` FOREIGN KEY (`id_chofer`) REFERENCES `choferes` (`id_chofer`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `un destino tiene un viaje` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id_destino`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `una ambulancia puede hacer uno o varios viajes` FOREIGN KEY (`id_ambulancia`) REFERENCES `ambulancias` (`id_ambulancia`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of viajes
-- ----------------------------
INSERT INTO `viajes` VALUES (1, '2', 1, 1, 1);
INSERT INTO `viajes` VALUES (2, '4', 2, 2, 2);
INSERT INTO `viajes` VALUES (3, '5', 3, 1, 2);

SET FOREIGN_KEY_CHECKS = 1;
