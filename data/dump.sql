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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

/*Data for the table `banco` */

insert  into `banco`(`id`,`nome`,`agencia`,`familia_id`,`status`,`data_criacao`,`data_edicao`) values (39,'Itauuf1234','666',12,1,'2015-10-06 22:57:45',NULL),(40,'Alterado','1234',12,1,'2015-10-06 22:57:45',NULL),(42,'BB','666',19,1,'2015-10-06 22:57:45',NULL),(46,'Nome do banco a ser criado','123',19,1,'2015-10-06 22:57:45',NULL),(48,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(49,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(50,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(51,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(52,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(53,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(54,'Nome do banco a ser criado','123',17,1,'2015-10-06 22:57:45',NULL),(55,'123','123',19,0,'2015-10-06 22:57:45',NULL),(57,'oooo','123',19,0,'2015-10-06 22:57:45',NULL),(58,'123123','123123',19,1,'2015-10-06 22:57:45',NULL),(59,'Novo','1',12,0,'2015-10-06 22:57:45',NULL),(60,'teste','1233',12,0,'2015-10-06 22:57:45',NULL),(61,'tyeste2','123',12,0,'2015-10-06 22:57:45',NULL),(62,'Teste','123',44,0,'2015-10-06 22:57:45',NULL),(63,'lala1','1234',45,1,'2015-10-06 22:57:45',NULL),(64,'kaka','12345',45,1,'2015-10-06 22:57:45',NULL),(65,'caixa','135',47,1,'2015-10-06 22:57:45',NULL),(66,'caixa2','1234',47,1,'2015-10-06 22:57:45',NULL),(67,'12','12',57,1,'2015-10-06 22:57:45',NULL),(68,'Brasil','1234123123',60,0,'2015-10-06 22:57:45',NULL),(69,'teste','123',60,1,'2015-10-06 22:57:45',NULL),(70,'Banco1 - update','3215',62,1,'2015-10-06 22:57:45',NULL),(71,'Teste','654',62,0,'2015-10-06 22:57:45',NULL),(72,'Banco do Brasil','666',63,1,'2015-10-06 23:46:58',NULL),(73,'BBB','12',64,0,'2015-10-10 21:42:07',NULL),(74,'CFE','666',64,1,'2015-10-10 21:42:54',NULL),(75,'Brasil','32131',64,1,'2015-10-10 22:34:14',NULL),(76,'CEF','12',65,1,'2015-10-12 00:54:24',NULL),(77,'Teste12','123',12,0,'2015-10-21 22:54:46',NULL);

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

insert  into `categorias`(`id`,`categoria`,`tipo`,`familias_Id`,`data_criacao`,`data_edicao`,`status`) values (1,'Alimentação',0,12,'2015-10-06 22:57:46',NULL,0),(2,'nova',1,12,'2015-10-06 22:57:46',NULL,0),(3,'Teste',0,12,'2015-10-13 02:33:01',NULL,1),(4,'Teste2',0,12,'2015-10-13 02:37:18',NULL,1),(5,'Teste',0,12,'2015-10-13 02:39:10',NULL,1),(6,'Teste123',1,12,'2015-10-13 02:46:49',NULL,1),(7,'Traipam molhada',0,12,'2015-10-13 02:48:54',NULL,1),(8,'Salario',1,12,'2015-10-13 03:01:00',NULL,1),(9,'Testando',1,12,'2015-10-13 03:11:26',NULL,1);

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
  PRIMARY KEY (`id`),
  KEY `fk_contas_bancos1_idx` (`banco_id`),
  KEY `fk_contas_familia1_idx` (`familia_id`),
  CONSTRAINT `fk_contas_bancos1` FOREIGN KEY (`banco_id`) REFERENCES `banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `contas` */

insert  into `contas`(`id`,`numero`,`banco_id`,`familia_id`,`status`,`data_criacao`,`data_edicao`) values (1,'123',39,12,0,'2015-10-06 22:57:46',NULL),(2,'321',40,12,0,'2015-10-06 22:57:46',NULL),(5,'666',40,12,0,'2015-10-06 22:57:46',NULL),(6,'123',39,12,0,'2015-10-06 22:57:46',NULL),(7,'9999999',40,12,0,'2015-10-06 22:57:46',NULL),(8,'996699',40,12,0,'2015-10-06 22:57:46',NULL),(9,'696969',39,12,0,'2015-10-06 22:57:46',NULL),(10,'696969',39,12,0,'2015-10-06 22:57:46',NULL),(11,'13654',39,12,1,'2015-10-06 22:57:46',NULL),(12,'969696',40,12,1,'2015-10-06 22:57:46',NULL),(13,'987987',39,12,1,'2015-10-06 22:57:46',NULL),(14,'123',39,12,1,'2015-10-06 22:57:46',NULL),(15,'00000',39,12,0,'2015-10-06 22:57:46',NULL),(16,'1111',63,45,1,'2015-10-06 22:57:46',NULL),(17,'1234',69,60,1,'2015-10-06 22:57:46',NULL),(18,'6666-9',70,62,1,'2015-10-06 22:57:46',NULL),(19,'321',70,62,0,'2015-10-06 22:57:46',NULL),(21,'124',74,64,0,'2015-10-10 21:50:25',NULL),(22,'6666987987',74,64,0,'2015-10-10 21:50:43',NULL),(23,'123',74,64,1,'2015-10-10 22:03:38',NULL),(24,'6666',75,64,1,'2015-10-10 22:34:37',NULL),(25,'96996',75,64,1,'2015-10-10 22:35:10',NULL),(26,'98582967',76,65,1,'2015-10-12 00:54:52',NULL),(27,'3214',39,12,0,'2015-10-21 22:56:39',NULL);

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
  PRIMARY KEY (`id`),
  KEY `fk_despesas_contas1_idx` (`contas_id`),
  KEY `fk_despesas_categorias1_idx` (`categorias_id`),
  KEY `fk_despesas_user1_idx` (`user_id`),
  CONSTRAINT `fk_despesas_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesas_contas1` FOREIGN KEY (`contas_id`) REFERENCES `contas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_despesas_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `despesas` */

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1 COMMENT='Tabela para referencia de todas as familias cadastradas no sistema.';

/*Data for the table `familia` */

insert  into `familia`(`id`,`nome`,`qtdMembros`,`status`,`data_criacao`,`date_edicao`) values (12,'Alves',123,1,'2015-10-06 22:57:47',NULL),(14,'Atualizada',999,1,'2015-10-06 22:57:47',NULL),(17,'Criando atualizado',999,1,'2015-10-06 22:57:47',NULL),(19,'Teste123',671,1,'2015-10-06 22:57:47',NULL),(20,'teste',0,NULL,'2015-10-06 22:57:47',NULL),(21,'teste',0,NULL,'2015-10-06 22:57:47',NULL),(22,'teste',0,1,'2015-10-06 22:57:47',NULL),(23,'teste',0,1,'2015-10-06 22:57:47',NULL),(24,'teste',0,3,'2015-10-06 22:57:47',NULL),(25,'teste',1,1,'2015-10-06 22:57:47',NULL),(26,'teste',1,1,'2015-10-06 22:57:47',NULL),(27,'teste',99,1,'2015-10-06 22:57:47',NULL),(29,'Fritando',123123,1,'2015-10-06 22:57:47',NULL),(30,'Teste',123123,1,'2015-10-06 22:57:47',NULL),(31,'Teste 123',123123,1,'2015-10-06 22:57:47',NULL),(32,'re',1,1,'2015-10-06 22:57:47',NULL),(33,'rere',1,1,'2015-10-06 22:57:47',NULL),(34,'teste',1,1,'2015-10-06 22:57:47',NULL),(35,'teste',0,1,'2015-10-06 22:57:47',NULL),(36,'teste 0',1,1,'2015-10-06 22:57:47',NULL),(37,'testekey',1,1,'2015-10-06 22:57:47',NULL),(38,'teste',1,1,'2015-10-06 22:57:47',NULL),(39,'teste',1,1,'2015-10-06 22:57:47',NULL),(40,'teste111',1,1,'2015-10-06 22:57:47',NULL),(41,'testessss',123,1,'2015-10-06 22:57:47',NULL),(42,'Teste',1,1,'2015-10-06 22:57:47',NULL),(43,'Treraear',2,1,'2015-10-06 22:57:47',NULL),(44,'Nova',123,1,'2015-10-06 22:57:47',NULL),(45,'Fomenko',4,1,'2015-10-06 22:57:47',NULL),(46,'Alves',2,1,'2015-10-06 22:57:47',NULL),(47,'Palhacitos',3,1,'2015-10-06 22:57:47',NULL),(48,'Alvers',12,1,'2015-10-06 22:57:47',NULL),(49,'teste',1,1,'2015-10-06 22:57:47',NULL),(50,'teste',1,1,'2015-10-06 22:57:47',NULL),(51,'Teste',123,1,'2015-10-06 22:57:47',NULL),(52,'teste',122,1,'2015-10-06 22:57:47',NULL),(53,'Testandoi',1,1,'2015-10-06 22:57:47',NULL),(54,'Teste',7,1,'2015-10-06 22:57:47',NULL),(55,'TEsteTeste',1,1,'2015-10-06 22:57:47',NULL),(56,'TEste',1,1,'2015-10-06 22:57:47',NULL),(57,'TEste',1,1,'2015-10-06 22:57:47',NULL),(58,'Teste',12,1,'2015-10-06 22:57:47',NULL),(59,'tet',1,1,'2015-10-06 22:57:47',NULL),(60,'Maoeei',1,1,'2015-10-06 22:57:47',NULL),(61,'Criando',12,1,'2015-10-06 22:57:47',NULL),(62,'Criando update',12,1,'2015-10-06 22:57:47',NULL),(63,'Nova Familia',2,1,'2015-10-06 23:45:44',NULL),(64,'Tripa Podre',12,1,'2015-10-10 21:40:32',NULL),(65,'nova familia',12,1,'2015-10-12 00:53:11',NULL);

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
  PRIMARY KEY (`id`),
  KEY `fk_orcamento_contas1_idx` (`contas_id`),
  KEY `fk_orcamento_user1_idx` (`user_id`),
  KEY `fk_orcamento_familia1_idx` (`familia_id`),
  CONSTRAINT `fk_orcamento_contas1` FOREIGN KEY (`contas_id`) REFERENCES `contas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orcamento_familia1` FOREIGN KEY (`familia_id`) REFERENCES `familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orcamento_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `orcamento` */

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`password`,`nome`,`familia_id`,`status`,`data_criacao`,`perfil_id`) values (6,'t@t.com','12','teste',12,NULL,'2015-10-06 23:03:33',0),(7,'ti@t.com','12','teste',NULL,NULL,'2015-10-06 23:03:33',0),(8,'1','1','1',NULL,1,'2015-10-06 23:03:33',0),(9,'2','1','1',NULL,1,'2015-10-06 23:03:33',0),(10,'teste@teste.com','1','Tiago Alves',12,1,'2015-10-06 23:03:33',0),(11,'t@tt.com','1','Tiago',12,1,'2015-10-06 23:03:33',0),(12,'r@r.com','1','roberto',12,1,'2015-10-06 23:03:33',0),(13,'t@ttt.com','1','teste',12,1,'2015-10-06 23:03:33',0),(14,'tx@tx.com','1','teixeta',12,1,'2015-10-06 23:03:33',0),(15,'t','t','t',NULL,NULL,'2015-10-06 23:03:33',0),(16,'tttt@tttt.com','1','t',NULL,1,'2015-10-06 23:03:33',0),(17,'m@m.com','123','Michele',NULL,1,'2015-10-06 23:03:33',0),(18,'m@mm.com','123','michele',62,1,'2015-10-06 23:03:33',0),(19,'mi@mi.com','1234','Michele Fomenko Assuero',54,1,'2015-10-06 23:03:33',0),(20,'ff@ff.com','1234','Michele',60,1,'2015-10-06 23:03:33',0),(21,'ff@ff.com','1234','Michele',57,1,'2015-10-06 23:03:33',0),(22,'t@teste.com','123','123123',NULL,1,'2015-10-06 23:03:33',0),(23,'tt@teste.com','123','123123',62,1,'2015-10-06 23:03:33',0),(24,'tr@te.com','123','tripa',62,1,'2015-10-06 23:03:33',0),(25,'tt@t123este.com','123','123123',62,1,'2015-10-06 23:03:33',0),(26,'tt333@t123este.com','Aep4o3','123123',62,1,'2015-10-06 23:03:33',0),(27,'tt3312312333@t123este.com','5qfLLP','123123',62,1,'2015-10-06 23:03:33',0),(28,'t333@t123este.com','VEKkCi','123123',62,1,'2015-10-06 23:03:33',0),(29,'ahola@t123este.com','kdakB5','123123',62,1,'2015-10-06 23:03:33',0),(30,'1234312@t123este.com','uiktuj','123123',62,1,'2015-10-06 23:03:33',0),(31,'999@t123este.com','QUJv2A','123123',62,1,'2015-10-06 23:03:33',0),(32,'tcristianoalves@outlook.com','Rx2Zot','teste',62,1,'2015-10-06 23:03:33',0),(33,'123123@outlook.com','SrAtrG','123123',62,1,'2015-10-06 23:03:33',0),(34,'123@outlook.com','0kqbux','123123',62,1,'2015-10-06 23:03:33',0),(35,'98/7@outlook.com','9GlbOj','123123',62,1,'2015-10-06 23:03:33',0),(36,'98/7@ouatlook.com','IJmalc','123123',62,1,'2015-10-06 23:03:33',0),(37,'98/7@ouat4look.com','JGTThj','123123',62,1,'2015-10-06 23:03:33',0),(38,'98/7s@ouat4look.com','n32LfC','123123',62,1,'2015-10-06 23:03:33',0),(39,'918/7s@ouat4look.com','uqcnTU','123123',62,1,'2015-10-06 23:03:33',0),(40,'918/7s@rouat4look.com','pdjzGY','123123',62,1,'2015-10-06 23:03:33',0),(41,'918/7s@rouawt4look.com','gy3TM6','123123',62,1,'2015-10-06 23:03:33',0),(42,'ab@ab.com','Wunbfi','Abobora',62,1,'2015-10-06 23:03:33',0),(43,'teste@testeste.com','6C7OCE','testeste',62,1,'2015-10-06 23:03:33',0),(44,'teste@teste123.com','senha123','teste@teste.com',63,1,'2015-10-06 23:44:21',0),(45,'fulano@fulano.com','iahrSK','Fulano',63,1,'2015-10-06 23:46:24',0),(46,'12@qw.com','1','1',64,1,'2015-10-10 21:39:47',0),(47,'te@tetas.com','VRjNXQ','Fulano',64,1,'2015-10-10 22:04:58',0),(48,'tretas@tretas.com','UNFCve','Treta',64,1,'2015-10-10 22:09:44',0),(49,'ttttt@testettt.com','Zfe665','teste',64,1,'2015-10-10 22:12:25',0),(50,'32131231@testettt.com','tpABBk','23123123123',64,1,'2015-10-10 22:16:49',0),(51,'3123123@testettt.com','C0LPKu','23123123123',64,1,'2015-10-10 22:21:01',0),(52,'loollloo@testettt.com','UPJI8f','lololo',64,1,'2015-10-10 22:30:57',0),(53,'bola_mole@testettt.com','PS1NmK','boquinha',64,1,'2015-10-10 22:32:28',0),(54,'bilongs@testettt.com','8K4SDW','bilongs',64,1,'2015-10-10 22:36:05',0),(55,'tca@tca.com','1','tiago alves',65,1,'2015-10-12 00:52:35',0),(56,'pedro@pedro.com','01RjWS','pedro',65,1,'2015-10-12 00:57:39',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
