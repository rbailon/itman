
--
-- Table structure for table `tb_centers`
--

DROP TABLE IF EXISTS `tb_centers`;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_centers` (
   `id` int(11) NOT NULL AUTO_INCREMENT
  ,`center` varchar(255) COLLATE utf8_unicode_ci NOT NULL
  ,`phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
  ,`fax` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
  ,PRIMARY KEY (`id`)
  ,UNIQUE KEY `center` (`center`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_centers`
--

LOCK TABLES `tb_centers` WRITE;
/*!40000 ALTER TABLE `tb_centers` DISABLE KEYS */;
INSERT INTO `tb_centers` VALUES (1,'Casa Consistorial','928833619',''),(2,'Edificio Cultura y Deportes','928833675',''),(3,'Biblioteca de Tías','928834378',''),(4,'Biblioteca de Puerto del Carmen','928513013',''),(5,'El Fondeadero','',''),(6,'Oficina de Turismo','',''),(7,'Oficina de Inmigración','',''),(8,'Oficina de la Mujer','',''),(9,'Casa Señor Justo','',''),(10,'Nave cementerio','',''),(11,'Bienestar Social y Familia','928524466','');
/*!40000 ALTER TABLE `tb_centers` ENABLE KEYS */;
UNLOCK TABLES;




--
-- Table structure for table `tb_departaments`
--

DROP TABLE IF EXISTS `tb_departaments`;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_departaments` (
   `id` int(11) NOT NULL AUTO_INCREMENT
  ,`departament` varchar(255) COLLATE utf8_unicode_ci NOT NULL
  ,PRIMARY KEY (`id`)
  ,UNIQUE KEY `departament` (`departament`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_departaments`
--

LOCK TABLES `tb_departaments` WRITE;
/*!40000 ALTER TABLE `tb_departaments` DISABLE KEYS */;
INSERT INTO `tb_departaments` VALUES (1,'Informática'),(2,'Intervención'),(3,'Información'),(4,'Alcaldía'),(5,'Vias y Obras'),(6,'Estadística'),(7,'Secretaría'),(8,'Tesorería'),(9,'SAC'),(10,'UGI'),(11,'Turismo'),(12,'Menores y Familia'),(13,'Oficina Técnica'),(14,'Deportes'),(15,'Servicios Sociales'),(16,'RRHH'),(17,'Contratación'),(18,'Juventud'),(19,'Festejos'),(20,'Concejalía'),(21,'Cultura'),(22,'Urbanismo'),(23,'Protocolo'),(24,'Medio Ambiente'),(27,'Prensa');
/*!40000 ALTER TABLE `tb_departaments` ENABLE KEYS */;
UNLOCK TABLES;






--
-- Dumping data for table `tb_persons`
--

DROP TABLE IF EXISTS `tb_persons`;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `tb_persons` (
   `id` int(11) NOT NULL AUTO_INCREMENT
  ,`user` varchar(80) COLLATE utf8_unicode_ci NOT NULL
  ,`pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
  ,`name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
  ,`surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
  ,`phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
  ,`departament` int(11) NOT NULL DEFAULT '0'
  ,`center` int(11) NOT NULL DEFAULT '0'
  ,`rol` int(11) NOT NULL DEFAULT '0'
  ,`state` varchar(1) NOT NULL
  ,`last_login` datetime DEFAULT NULL
  ,`date_discharge` datetime DEFAULT NULL
  ,`user_discharge` int(11) NOT NULL DEFAULT '0'
  ,`date_mod` datetime DEFAULT NULL
  ,`user_mod` int(11) NOT NULL DEFAULT '0'
  ,PRIMARY KEY (`id`)
  ,UNIQUE KEY `unicity` (`user`)
  ,KEY `name` (`name`)
  ,KEY `surname` (`surname`)
  ,KEY `state` (`state`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;
INSERT INTO `tb_persons` VALUES 
(1,'admin','21232f297a57a5a743894a0e4a801fc3','Administrator','','',0,0,1,'A',NULL,CURRENT_TIMESTAMP,0,CURRENT_TIMESTAMP,0)
,(2,'guest','084e0343a0486ff05530df6c705c8bb4','Guest','','',0,0,2,'A',NULL,CURRENT_TIMESTAMP,0,CURRENT_TIMESTAMP,0)
;
/*!40000 ALTER TABLE `tb_persons` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Dumping data for table `tb_rols`
--


DROP TABLE IF EXISTS `tb_rols`;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `tb_rols` (
   `id` int(11) NOT NULL AUTO_INCREMENT
  ,`name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
  ,`authorization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
  ,`date_discharge` datetime DEFAULT NULL
  ,`user_discharge` int(11) NOT NULL DEFAULT '0'
  ,`date_mod` datetime DEFAULT NULL
  ,`user_mod` int(11) NOT NULL DEFAULT '0'
  ,PRIMARY KEY (`id`)
  ,KEY `name` (`name`)
  ,KEY `date_mod` (`date_mod`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_rols`
--

LOCK TABLES `tb_rols` WRITE;
/*!40000 ALTER TABLE `tb_rols` DISABLE KEYS */;
INSERT INTO `tb_rols` VALUES 
(1,'Admin','111111111111111111111111111111111',CURRENT_TIMESTAMP,0,CURRENT_TIMESTAMP,0)
,(2,'guest','100010001000100010001000100010000',CURRENT_TIMESTAMP,0,CURRENT_TIMESTAMP,0)
;
/*!40000 ALTER TABLE `tb_rols` ENABLE KEYS */;
UNLOCK TABLES;