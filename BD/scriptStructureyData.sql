-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: saboresydelicias
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `cedula` int NOT NULL,
  `area` varchar(45) NOT NULL,
  `empleado_id_empleado1` int NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_cliente_empleado1_idx` (`empleado_id_empleado1`),
  CONSTRAINT `fk_cliente_empleado1` FOREIGN KEY (`empleado_id_empleado1`) REFERENCES `empleado` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (10,'felipe','moreno','felipem@gmail.com','2024-05-24','312879653',1097678456,'comercial',1001),(11,'alonso','prieto','alonsop@gmail.com','2024-05-24','311765345',1095345987,'mantenimiento',1002),(12,'dylan','castañeda','dylancast@gmail.com','2024-05-24','316734567',24580001,'software',1001);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleado` (
  `id_empleado` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `e-mail` varchar(255) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `tienda_id_tienda` int NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `fk_empleado_tienda1_idx` (`tienda_id_tienda`),
  CONSTRAINT `fk_empleado_tienda1` FOREIGN KEY (`tienda_id_tienda`) REFERENCES `tienda` (`id_tienda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1001,'pablo','diaz','312678909','pablod@gmail.com','admin',1),(1002,'suly','mosquera','321456789','sulym@gmail.com','empleado tienda',1),(1003,'carlos','perez','321895345','carlosp@gmail.com','contador',1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventario` (
  `id_inventario` int NOT NULL,
  `cantidad` int NOT NULL,
  `producto_id_producto` int NOT NULL,
  PRIMARY KEY (`id_inventario`),
  KEY `fk_inventario_producto1_idx` (`producto_id_producto`),
  CONSTRAINT `fk_inventario_producto1` FOREIGN KEY (`producto_id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (1,20,123678),(2,40,987654),(3,34,345677);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `id_pedido` int NOT NULL,
  `cliente_id_cliente` int NOT NULL,
  `producto_id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `valor total` float NOT NULL,
  `estado` enum('1','2','3','4') NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `fk_pedido_cliente_idx` (`cliente_id_cliente`),
  KEY `fk_pedido_producto1_idx` (`producto_id_producto`),
  CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `fk_pedido_producto1` FOREIGN KEY (`producto_id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (50001,10,123678,2,15600,'1','2024-05-23'),(50002,11,345677,3,6000,'1','2024-05-23'),(50003,12,987654,6,6800,'1','2024-05-23');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentacion`
--

DROP TABLE IF EXISTS `presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `presentacion` (
  `id_presentacion` int NOT NULL,
  `presentacion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_presentacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentacion`
--

LOCK TABLES `presentacion` WRITE;
/*!40000 ALTER TABLE `presentacion` DISABLE KEYS */;
INSERT INTO `presentacion` VALUES (309,'litro'),(310,'paquete individual'),(311,'paquete familiar');
/*!40000 ALTER TABLE `presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id_producto` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `precio_compra` float NOT NULL,
  `img` varchar(40) DEFAULT NULL,
  `presentacion_id_presentacion` int NOT NULL,
  `precio_venta` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_producto_presentacion1_idx` (`presentacion_id_presentacion`),
  CONSTRAINT `fk_producto_presentacion1` FOREIGN KEY (`presentacion_id_presentacion`) REFERENCES `presentacion` (`id_presentacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (123678,'papas','margarita',7000,'imgproductos/papas.png',311,'7800','papas','ideal para compartir'),(345677,'uva','postobon',2000,'imgproductos/uva.png',309,'2500','gasesosa','calma tu sed'),(987654,'chococorramo','ramo',1000,'imgproductos/chocorramo.png',310,'1700','ponques','deliciosos ponques');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_has_proveedor`
--

DROP TABLE IF EXISTS `producto_has_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto_has_proveedor` (
  `producto_id_producto` int NOT NULL,
  `proveedor_id_proveedor` int NOT NULL,
  PRIMARY KEY (`producto_id_producto`,`proveedor_id_proveedor`),
  KEY `fk_producto_has_proveedor_proveedor1_idx` (`proveedor_id_proveedor`),
  KEY `fk_producto_has_proveedor_producto1_idx` (`producto_id_producto`),
  CONSTRAINT `fk_producto_has_proveedor_producto1` FOREIGN KEY (`producto_id_producto`) REFERENCES `producto` (`id_producto`),
  CONSTRAINT `fk_producto_has_proveedor_proveedor1` FOREIGN KEY (`proveedor_id_proveedor`) REFERENCES `proveedor` (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_has_proveedor`
--

LOCK TABLES `producto_has_proveedor` WRITE;
/*!40000 ALTER TABLE `producto_has_proveedor` DISABLE KEYS */;
INSERT INTO `producto_has_proveedor` VALUES (123678,345),(345677,456),(987654,477);
/*!40000 ALTER TABLE `producto_has_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `id_proveedor` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (345,'distribuidora picaso','317890987','cra 30 # 45-07','distripicaso@gmail.com'),(456,'distibuidora americana','312908765','cll 15 # 23-34','distriamericana@gmail.com'),(477,'distritodo','312890765','cra 56 # 23-23','distritodo@gmail.com');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tienda`
--

DROP TABLE IF EXISTS `tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tienda` (
  `id_tienda` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tienda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tienda`
--

LOCK TABLES `tienda` WRITE;
/*!40000 ALTER TABLE `tienda` DISABLE KEYS */;
INSERT INTO `tienda` VALUES (1,'centro','cr 17 # 42-33','313567890');
/*!40000 ALTER TABLE `tienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta` (
  `id_venta` int NOT NULL,
  `fecha` date NOT NULL,
  `empleado_id_empleado` int NOT NULL,
  `pedido_id_pedido` int NOT NULL,
  `valor_total` int NOT NULL,
  `valor_productos` int NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `fk_venta_empleado1_idx` (`empleado_id_empleado`),
  KEY `fk_venta_pedido1_idx` (`pedido_id_pedido`),
  CONSTRAINT `fk_venta_empleado1` FOREIGN KEY (`empleado_id_empleado`) REFERENCES `empleado` (`id_empleado`),
  CONSTRAINT `fk_venta_pedido1` FOREIGN KEY (`pedido_id_pedido`) REFERENCES `pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (200001,'2024-05-23',1001,50001,15600,7800),(200002,'2024-05-23',1002,50002,6000,2000),(200003,'2024-05-23',1003,50003,6800,1700);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-01 10:36:58
