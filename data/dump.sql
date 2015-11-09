/*
SQLyog Ultimate v11.52 (64 bit)
MySQL - 5.6.27-log : Database - controlefinanceiro
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`controlefinanceiro` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `controlefinanceiro`;

/*Table structure for table `banco` */

DROP TABLE IF EXISTS `banco`;

CREATE TABLE `banco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `agencia` varchar(10) DEFAULT NULL,
  `familia_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bancos_familias1_idx` (`familia_id`),
  CONSTRAINT `fk_bancos_familias1` FOREIGN KEY (`familia_id`) REFERENCES `familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

/*Data for the table `banco` */

insert  into `banco`(`id`,`nome`,`agencia`,`familia_id`,`status`,`data_criacao`,`data_edicao`) values (39,'Itauuf1234','666',12,1,'2015-10-06 22:57:45',NULL),(40,'Alterado','1234',12,1,'2015-10-06 22:57:45',NULL),(42,'BB','666',19,1,'2015-10-06 22:57:45',NULL),(46,'Nome do banco a ser criado','123',19,1,'2015-10-06 22:57:45',NULL),(48,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(49,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(50,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(51,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(52,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(53,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(54,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(55,'123','123',19,0,'2015-10-06 22:57:45',NULL),(57,'oooo','123',19,0,'2015-10-06 22:57:45',NULL),(58,'123123','123123',19,1,'2015-10-06 22:57:45',NULL),(59,'Novo','1',12,0,'2015-10-06 22:57:45',NULL),(60,'teste','1233',12,0,'2015-10-06 22:57:45',NULL),(61,'tyeste2','123',12,0,'2015-10-06 22:57:45',NULL),(62,'Teste','123',44,0,'2015-10-06 22:57:45',NULL),(63,'lala1','1234',45,1,'2015-10-06 22:57:45',NULL),(64,'kaka','12345',45,1,'2015-10-06 22:57:45',NULL),(65,'caixa','135',47,1,'2015-10-06 22:57:45',NULL),(66,'caixa2','1234',47,1,'2015-10-06 22:57:45',NULL),(67,'12','12',57,1,'2015-10-06 22:57:45',NULL),(68,'Brasil','1234123123',60,0,'2015-10-06 22:57:45',NULL),(69,'teste','123',60,1,'2015-10-06 22:57:45',NULL),(70,'Banco1 - update','3215',62,1,'2015-10-06 22:57:45',NULL),(71,'Teste','654',62,0,'2015-10-06 22:57:45',NULL),(72,'Banco do Brasil','666',63,1,'2015-10-06 23:46:58',NULL),(73,'BBB','12',64,0,'2015-10-10 21:42:07',NULL),(74,'CFE','666',64,1,'2015-10-10 21:42:54',NULL),(75,'Brasil','32131',64,1,'2015-10-10 22:34:14',NULL),(76,'CEF','12',65,1,'2015-10-12 00:54:24',NULL),(77,'Teste12','123',12,0,'2015-10-21 22:54:46',NULL),(78,'Bradesco','123',66,1,'2015-11-05 16:49:24',NULL),(79,'Itau','321',66,1,'2015-11-05 18:12:58',NULL);

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `familias_Id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_categorias_familia_idx` (`familias_Id`),
  CONSTRAINT `fk_categorias_familia` FOREIGN KEY (`familias_Id`) REFERENCES `familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `categorias` */

insert  into `categorias`(`id`,`categoria`,`tipo`,`familias_Id`,`data_criacao`,`data_edicao`,`status`) values (1,'Alimentação',0,66,'2015-10-06 22:57:46',NULL,1),(2,'nova',1,66,'2015-10-06 22:57:46',NULL,1),(3,'Teste',0,66,'2015-10-13 02:33:01',NULL,1),(4,'Teste2',0,66,'2015-10-13 02:37:18',NULL,1),(5,'Teste',0,66,'2015-10-13 02:39:10',NULL,1),(6,'Teste123',1,66,'2015-10-13 02:46:49',NULL,1),(7,'Traipam molhada',0,66,'2015-10-13 02:48:54',NULL,0),(8,'Salario',1,66,'2015-10-13 03:01:00',NULL,1),(9,'Testando',1,66,'2015-10-13 03:11:26',NULL,1);

/*Table structure for table `contas` */

DROP TABLE IF EXISTS `contas`;

CREATE TABLE `contas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) NOT NULL,
  `banco_id` int(11) NOT NULL,
  `familia_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `data_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime DEFAULT NULL,
  `saldo` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contas_bancos1_idx` (`banco_id`),
  KEY `fk_contas_familia1_idx` (`familia_id`),
  CONSTRAINT `fk_contas_bancos1` FOREIGN KEY (`banco_id`) REFERENCES `banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `contas` */

insert  into `contas`(`id`,`numero`,`banco_id`,`familia_id`,`status`,`data_criacao`,`data_edicao`,`saldo`) values (30,'666',78,66,1,'2015-11-05 16:54:30',NULL,1000);

/*Table structure for table `despesas` */

DROP TABLE IF EXISTS `despesas`;

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `data_vencimento` datetime NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime DEFAULT NULL,
  `pago` tinyint(4) NOT NULL DEFAULT '0',
  `contas_id` int(11) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `descricao` tinytext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `familia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_despesas_contas1_idx` (`contas_id`),
  KEY `fk_despesas_categorias1_idx` (`categorias_id`),
  KEY `fk_despesas_user1_idx` (`user_id`),
  KEY `fk_despesas_familia1` (`familia_id`),
  CONSTRAINT `fk_despesas_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesas_contas1` FOREIGN KEY (`contas_id`) REFERENCES `contas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesas_familia1` FOREIGN KEY (`familia_id`) REFERENCES `familia` (`id`),
  CONSTRAINT `fk_despesas_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `despesas` */

insert  into `despesas`(`id`,`valor`,`data_vencimento`,`data_criacao`,`data_edicao`,`pago`,`contas_id`,`categorias_id`,`user_id`,`descricao`,`status`,`familia_id`) values (2,100,'2015-11-05 17:54:44','2015-11-05 17:56:07',NULL,0,30,1,57,'Café',1,66);

/*Table structure for table `familia` */

DROP TABLE IF EXISTS `familia`;

CREATE TABLE `familia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `qtdMembros` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT '1' COMMENT '0-Inativo 1 - Ativo',
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_edicao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1 COMMENT='Tabela para referencia de todas as familias cadastradas no sistema.';

/*Data for the table `familia` */

insert  into `familia`(`id`,`nome`,`qtdMembros`,`status`,`data_criacao`,`date_edicao`) values (12,'Alves',123,1,'2015-10-06 22:57:47',NULL),(14,'Atualizada',999,1,'2015-10-06 22:57:47',NULL),(17,'Criando atualizado',999,1,'2015-10-06 22:57:47',NULL),(19,'Teste123',671,1,'2015-10-06 22:57:47',NULL),(20,'teste',0,NULL,'2015-10-06 22:57:47',NULL),(21,'teste',0,NULL,'2015-10-06 22:57:47',NULL),(22,'teste',0,1,'2015-10-06 22:57:47',NULL),(23,'teste',0,1,'2015-10-06 22:57:47',NULL),(24,'teste',0,3,'2015-10-06 22:57:47',NULL),(25,'teste',1,1,'2015-10-06 22:57:47',NULL),(26,'teste',1,1,'2015-10-06 22:57:47',NULL),(27,'teste',99,1,'2015-10-06 22:57:47',NULL),(29,'Fritando',123123,1,'2015-10-06 22:57:47',NULL),(30,'Teste',123123,1,'2015-10-06 22:57:47',NULL),(31,'Teste 123',123123,1,'2015-10-06 22:57:47',NULL),(32,'re',1,1,'2015-10-06 22:57:47',NULL),(33,'rere',1,1,'2015-10-06 22:57:47',NULL),(34,'teste',1,1,'2015-10-06 22:57:47',NULL),(35,'teste',0,1,'2015-10-06 22:57:47',NULL),(36,'teste 0',1,1,'2015-10-06 22:57:47',NULL),(37,'testekey',1,1,'2015-10-06 22:57:47',NULL),(38,'teste',1,1,'2015-10-06 22:57:47',NULL),(39,'teste',1,1,'2015-10-06 22:57:47',NULL),(40,'teste111',1,1,'2015-10-06 22:57:47',NULL),(41,'testessss',123,1,'2015-10-06 22:57:47',NULL),(42,'Teste',1,1,'2015-10-06 22:57:47',NULL),(43,'Treraear',2,1,'2015-10-06 22:57:47',NULL),(44,'Nova',123,1,'2015-10-06 22:57:47',NULL),(45,'Fomenko',4,1,'2015-10-06 22:57:47',NULL),(46,'Alves',2,1,'2015-10-06 22:57:47',NULL),(47,'Palhacitos',3,1,'2015-10-06 22:57:47',NULL),(48,'Alvers',12,1,'2015-10-06 22:57:47',NULL),(49,'teste',1,1,'2015-10-06 22:57:47',NULL),(50,'teste',1,1,'2015-10-06 22:57:47',NULL),(51,'Teste',123,1,'2015-10-06 22:57:47',NULL),(52,'teste',122,1,'2015-10-06 22:57:47',NULL),(53,'Testandoi',1,1,'2015-10-06 22:57:47',NULL),(54,'Teste',7,1,'2015-10-06 22:57:47',NULL),(55,'TEsteTeste',1,1,'2015-10-06 22:57:47',NULL),(56,'TEste',1,1,'2015-10-06 22:57:47',NULL),(57,'TEste',1,1,'2015-10-06 22:57:47',NULL),(58,'Teste',12,1,'2015-10-06 22:57:47',NULL),(59,'tet',1,1,'2015-10-06 22:57:47',NULL),(60,'Maoeei',1,1,'2015-10-06 22:57:47',NULL),(61,'Criando',12,1,'2015-10-06 22:57:47',NULL),(62,'Criando update',12,1,'2015-10-06 22:57:47',NULL),(63,'Nova Familia',2,1,'2015-10-06 23:45:44',NULL),(64,'Tripa Podre',12,1,'2015-10-10 21:40:32',NULL),(65,'nova familia',12,1,'2015-10-12 00:53:11',NULL),(66,'Teste',2,1,'2015-11-05 16:49:09',NULL);

/*Table structure for table `orcamento` */

DROP TABLE IF EXISTS `orcamento`;

CREATE TABLE `orcamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objetivo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `contas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `familia_id` int(11) NOT NULL,
  `total_atingido` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_orcamento_contas1_idx` (`contas_id`),
  KEY `fk_orcamento_user1_idx` (`user_id`),
  KEY `fk_orcamento_familia1_idx` (`familia_id`),
  CONSTRAINT `fk_orcamento_contas1` FOREIGN KEY (`contas_id`) REFERENCES `contas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orcamento_familia1` FOREIGN KEY (`familia_id`) REFERENCES `familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orcamento_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `orcamento` */

insert  into `orcamento`(`id`,`objetivo`,`duracao`,`valor`,`data_criacao`,`data_edicao`,`status`,`contas_id`,`user_id`,`familia_id`,`total_atingido`) values (1,'Viajem',12,1200,'2015-11-05 21:55:43',NULL,1,30,57,66,0);

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `perfil` */

insert  into `perfil`(`id`,`perfil`,`status`) values (1,'Administrador',1),(2,'Familiar',1);

/*Table structure for table `receitas` */

DROP TABLE IF EXISTS `receitas`;

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor` float NOT NULL,
  `data_edicao` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `contas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_receitas_contas1_idx` (`contas_id`),
  KEY `fk_receitas_user1_idx` (`user_id`),
  KEY `fk_receitas_categorias1_idx` (`categorias_id`),
  CONSTRAINT `fk_receitas_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receitas_contas1` FOREIGN KEY (`contas_id`) REFERENCES `contas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receitas_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `receitas` */

/*Table structure for table `regras` */

DROP TABLE IF EXISTS `regras`;

CREATE TABLE `regras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `tipos_regra_id` int(11) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_regras_tipos_regra1_idx` (`tipos_regra_id`),
  KEY `fk_regras_categorias1_idx` (`categorias_id`),
  CONSTRAINT `fk_regras_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_regras_tipos_regra1` FOREIGN KEY (`tipos_regra_id`) REFERENCES `tipos_regra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `regras` */

/*Table structure for table `tipos_regra` */

DROP TABLE IF EXISTS `tipos_regra`;

CREATE TABLE `tipos_regra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `familia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipos_regra_familia1_idx` (`familia_id`),
  CONSTRAINT `fk_tipos_regra_familia1` FOREIGN KEY (`familia_id`) REFERENCES `familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipos_regra` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `familia_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `perfil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_familias1_idx` (`familia_id`),
  KEY `fk_user_perfil1_idx` (`perfil_id`),
  CONSTRAINT `fk_user_perfil1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_familias1` FOREIGN KEY (`familia_id`) REFERENCES `familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`password`,`nome`,`familia_id`,`status`,`data_criacao`,`perfil_id`) values (57,'t@t.com','1','Teste',66,1,'2015-11-05 16:48:42',1),(58,'fulano@fulano.com','Q5u7NK','Fulano',66,1,'2015-11-05 16:55:50',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
