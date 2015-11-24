/*
SQLyog Ultimate v11.52 (64 bit)
MySQL - 5.6.26-log : Database - controlefinanceiro
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `banco` */

insert  into `banco`(`id`,`nome`,`agencia`,`familia_id`,`status`,`data_criacao`,`data_edicao`) values (1,'Bradesco','123',1,1,'2015-11-24 17:01:32',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `categorias` */

insert  into `categorias`(`id`,`categoria`,`tipo`,`familias_Id`,`data_criacao`,`data_edicao`,`status`) values (1,'Alimentação',0,1,'2015-11-24 18:02:04',NULL,1),(2,'Moradia',0,1,'2015-11-24 18:02:18',NULL,1),(3,'Salário',0,1,'2015-11-24 18:02:34',NULL,1),(4,'Medicamentos',0,1,'2015-11-24 18:48:35',NULL,1),(5,'Vestimentas',0,1,'2015-11-24 18:49:34',NULL,1),(6,'Lazer',0,1,'2015-11-24 19:10:27',NULL,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `contas` */

insert  into `contas`(`id`,`numero`,`banco_id`,`familia_id`,`status`,`data_criacao`,`data_edicao`,`saldo`) values (1,'123',1,1,1,'2015-11-24 17:01:50',NULL,4550),(2,'321',1,1,1,'2015-11-24 17:11:36',NULL,950);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `despesas` */

insert  into `despesas`(`id`,`valor`,`data_vencimento`,`data_criacao`,`data_edicao`,`pago`,`contas_id`,`categorias_id`,`user_id`,`descricao`,`status`,`familia_id`) values (1,1000,'2015-12-05 00:00:00','2015-11-24 18:05:32',NULL,1,1,2,1,'Aluguel',1,1),(2,5,'2015-11-24 00:00:00','2015-11-24 18:06:48',NULL,1,1,1,1,'Café',1,1),(3,25,'2015-11-24 00:00:00','2015-11-24 18:08:02',NULL,1,1,1,1,'Almoço',1,1),(4,200,'2015-11-24 00:00:00','2015-11-24 18:08:24',NULL,1,1,1,1,'Conta de luz',1,1),(5,50,'2015-12-05 00:00:00','2015-11-24 18:10:32',NULL,1,1,2,1,'Conta Aguá',1,1),(6,50,'2015-11-24 00:00:00','2015-11-24 18:12:05',NULL,1,1,1,1,'Jantar',1,1),(7,50,'2015-11-24 00:00:00','2015-11-24 18:12:26',NULL,1,1,1,1,'Mercado',1,1),(8,60,'2015-11-24 00:00:00','2015-11-24 18:13:05',NULL,1,1,1,1,'Teste',1,1),(9,50,'2015-11-24 00:00:00','2015-11-24 18:13:36',NULL,1,2,1,1,'Teste 2',1,1),(10,10,'2015-11-24 00:00:00','2015-11-24 18:17:27',NULL,1,1,1,3,'Usuario2Despesas',1,1),(11,50,'2015-11-24 00:00:00','2015-11-24 18:30:12',NULL,1,1,2,3,'usuario2NovaDespesa',1,1),(12,50,'2015-11-24 00:00:00','2015-11-24 18:48:57',NULL,1,1,4,3,'Remedios',1,1),(13,150,'2015-11-24 00:00:00','2015-11-24 18:49:57',NULL,1,1,5,3,'Roupas',1,1),(14,50,'2015-11-24 00:00:00','2015-11-24 19:10:51',NULL,1,1,6,3,'Cinema',1,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Tabela para referencia de todas as familias cadastradas no sistema.';

/*Data for the table `familia` */

insert  into `familia`(`id`,`nome`,`qtdMembros`,`status`,`data_criacao`,`date_edicao`) values (1,'Tcc',2,1,'2015-11-24 17:01:05',NULL);

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

insert  into `orcamento`(`id`,`objetivo`,`duracao`,`valor`,`data_criacao`,`data_edicao`,`status`,`contas_id`,`user_id`,`familia_id`,`total_atingido`) values (1,'Tv Nova',12,1500,'2015-11-24 18:05:59',NULL,1,2,1,1,0);

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `perfil` */

insert  into `perfil`(`id`,`perfil`,`status`) values (1,'Familiar',1),(2,'Administrador',2);

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
  `familia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_receitas_contas1_idx` (`contas_id`),
  KEY `fk_receitas_user1_idx` (`user_id`),
  KEY `fk_receitas_categorias1_idx` (`categorias_id`),
  KEY `fk_receitas_familia` (`familia_id`),
  CONSTRAINT `fk_receitas_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receitas_contas1` FOREIGN KEY (`contas_id`) REFERENCES `contas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_receitas_familia` FOREIGN KEY (`familia_id`) REFERENCES `familia` (`id`),
  CONSTRAINT `fk_receitas_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `receitas` */

insert  into `receitas`(`id`,`descricao`,`data_criacao`,`valor`,`data_edicao`,`status`,`contas_id`,`user_id`,`categorias_id`,`familia_id`) values (1,'Salario','2015-11-24 18:04:43',5000,NULL,1,1,1,3,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`password`,`nome`,`familia_id`,`status`,`data_criacao`,`perfil_id`) values (1,'t@t.com','1','Tcc',1,1,'2015-11-24 17:00:30',1),(2,'f@f.com','uAbsHl','fulano',1,1,'2015-11-24 17:03:09',2),(3,'c@c.com.br','4514IU','ciclano',1,1,'2015-11-24 17:04:09',2),(4,'ts@ts.com','oM1YJv','Teste',1,1,'2015-11-24 17:53:32',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
