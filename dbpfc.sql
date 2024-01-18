/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.1.38-community : Database - dbpfc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbpfc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbpfc`;

/*Table structure for table `cargos` */

DROP TABLE IF EXISTS `cargos`;

CREATE TABLE `cargos` (
  `cg_cod` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Código do Cargo',
  `cg_desc` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Descrição do Cargo',
  PRIMARY KEY (`cg_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `cargos` */

insert  into `cargos`(`cg_cod`,`cg_desc`) values (1,'Gerente'),(2,'Tecnico'),(3,'Operador'),(60,'Cliente');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `cl_cod` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Código do Cliente',
  `tpc_cod` int(1) NOT NULL COMMENT 'Código do Tipo do Cliente',
  `cl_nm_rs` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Razão Social / Nome',
  `cl_sn_nf` char(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Nome Fantasia / Sobrenome',
  `cl_cp_cn` char(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'CNPJ/CPF',
  `cl_rg_ie` char(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Inscrição Estadual/RG',
  `cl_tel` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Telefone do Cliente',
  `cl_cel` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Celular do Cliente',
  `cl_email` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'E-mail do Cliente',
  `st_cod` int(1) NOT NULL COMMENT 'Código do Status do Cliente',
  PRIMARY KEY (`cl_cod`),
  KEY `FK_cl_tpc` (`tpc_cod`),
  KEY `FK_cl_st` (`st_cod`),
  CONSTRAINT `FK_clientes_end` FOREIGN KEY (`cl_cod`) REFERENCES `endereco` (`cl_cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cl_st` FOREIGN KEY (`st_cod`) REFERENCES `status` (`st_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_cl_tpc` FOREIGN KEY (`tpc_cod`) REFERENCES `tipo_cliente` (`tpc_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

insert  into `clientes`(`cl_cod`,`tpc_cod`,`cl_nm_rs`,`cl_sn_nf`,`cl_cp_cn`,`cl_rg_ie`,`cl_tel`,`cl_cel`,`cl_email`,`st_cod`) values (1,1,'Jose Antonio','da Silva','12365479801','4267809546','1144335522','1199887733','dddddd@hhhhh',2),(2,2,'Umbrella Corporation','G-Virus','059096054000123','43564765','555466636','87687686','umbrella@virus.com',1),(3,2,'Universidade Mogi das Cruzes','UMC','000.111.222.333','15243','1122765432','1199887766','umc@umc.br',2),(4,1,'Ching Ling S/A','Law Kim Shon Chen','117277728772877','00000000005543K','1121123367','1199884455','chingling@chen.cn',1),(5,1,'Antonio','Nunes','12365479801','427789906','1121123367','1199884455','antonionunes@panico.com',3);

/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `cl_cod` int(1) NOT NULL COMMENT 'Código do Cliente',
  `ec_rua` char(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Rua',
  `ec_num` char(5) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Número',
  `ec_bairro` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Bairro',
  `ec_cidade` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Cidade',
  `ec_estado` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Estado',
  `ec_cep` char(8) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'CEP',
  `ec_pais` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'País',
  UNIQUE KEY `FK_ec_cl` (`cl_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `endereco` */

insert  into `endereco`(`cl_cod`,`ec_rua`,`ec_num`,`ec_bairro`,`ec_cidade`,`ec_estado`,`ec_cep`,`ec_pais`) values (1,'Rua do Bosque','25','centro','São Paulo','sp','08999939','Brasil'),(2,'AV. Umbrela','666','b2','Polo','SP','09876544','USA'),(3,'Rua do Forum','1','socorro','Mogi das Cruzes','SP','08790000','Brasil'),(4,'Rua Vinte e Cinco de Março','666','Centro','São Paulo','SP','01023470','Brasil'),(5,'Rua Nova Iorque','12','Jardins','São Paulo','SP','01435000','Brasil');

/*Table structure for table `endereco_func` */

DROP TABLE IF EXISTS `endereco_func`;

CREATE TABLE `endereco_func` (
  `fc_cod` int(1) NOT NULL COMMENT 'Código do Funcionário',
  `ec_rua` char(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Rua',
  `ec_num` char(5) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Número',
  `ec_bairro` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Bairro',
  `ec_cidade` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Cidade',
  `ec_estado` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Estado',
  `ec_cep` char(8) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'CEP',
  `ec_pais` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Pais',
  PRIMARY KEY (`fc_cod`),
  KEY `FK_ecf_fc` (`fc_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `endereco_func` */

insert  into `endereco_func`(`fc_cod`,`ec_rua`,`ec_num`,`ec_bairro`,`ec_cidade`,`ec_estado`,`ec_cep`,`ec_pais`) values (1,'Rua Aniz Tanuz Rezek','70','Cocuera','Mogi das Cruzes','SP','08793020','Brasil'),(2,'rua do aruja','66','a','aruja','','07000000','Brasil'),(3,'Rua c','20','a','sp','','0000111','Alemanha'),(4,'rua do bruce','1','b','Mogi das Cruzes','sp','77777777','Bulgaria'),(5,'Rua Sem Nome','98','Brooklin','Rio de Janeiro','','21345765','Brasil'),(6,'Rua Dr Botelho P. Junior','67','Jd, Pele','São Paulo','SP','01254398','Brasil'),(7,'Rua Hammlet','24','Teste','Mogi das Cruzes','SP','21345765','Brasil');

/*Table structure for table `eventos_os` */

DROP TABLE IF EXISTS `eventos_os`;

CREATE TABLE `eventos_os` (
  `ev_cod` int(5) NOT NULL COMMENT 'Codigo evento',
  `os_cod` int(1) NOT NULL COMMENT 'codigo os',
  `ev_desc` varchar(3000) DEFAULT NULL COMMENT 'descrição evento',
  `ev_data` datetime DEFAULT NULL COMMENT 'Data',
  `st_cod` int(1) NOT NULL COMMENT 'status',
  `fc_cod` int(5) DEFAULT NULL COMMENT 'funcionario',
  KEY `FK_eventos_os` (`ev_cod`),
  KEY `FK_eventos_os_st` (`st_cod`),
  KEY `FK_eventos` (`os_cod`),
  KEY `FK_eventos_os_fc` (`fc_cod`),
  CONSTRAINT `FK_eventos` FOREIGN KEY (`os_cod`) REFERENCES `os` (`os_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_eventos_os_fc` FOREIGN KEY (`fc_cod`) REFERENCES `funcionarios` (`fc_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `eventos_os` */

insert  into `eventos_os`(`ev_cod`,`os_cod`,`ev_desc`,`ev_data`,`st_cod`,`fc_cod`) values (1,1,'computador não liga','2010-09-24 20:20:28',1,1),(2,1,'Encaminhado para: 2','2010-09-24 20:30:00',3,1),(3,1,'formatado e reinstalado o sistema  Fechado por: mat_1','2010-09-24 20:31:10',2,3),(4,1,'Encaminhado para: 2','2010-09-24 20:32:09',3,1),(5,1,'Recebido por: mat_1','2010-09-24 20:32:43',4,1),(1,2,'falha no registro','2010-09-25 10:09:47',1,1),(1,3,'o computador não liga','2010-09-29 18:55:33',1,1),(2,3,'lguei na tomada  Fechado por: mat_1','2010-09-29 18:56:47',2,4),(1,4,'pc não funciona','2010-09-29 19:42:32',1,1),(1,5,'internet muito lenta','2010-10-01 20:01:04',1,1),(2,5,'Recebido por: mat_1','2010-10-01 20:01:39',4,1),(3,5,'Encaminhado para: 2','2010-10-01 20:02:28',3,1),(4,5,'foi realizado reparo nos registros e limpeza de rquivos temporarios  Fechado por: mat_1','2010-10-01 20:03:16',2,2),(1,6,'Maquina desligando constantemente','2010-10-27 20:19:06',1,3),(2,6,'Recebido por: mat_3','2010-10-27 20:20:24',4,3),(3,6,'Recebido por: mat_3','2010-10-27 20:20:59',4,3),(4,6,'Encaminhado para: 5','2010-10-27 20:21:43',3,3),(5,6,'Feito todos os testes, trocado o Cooler  Fechado por: mat_3','2010-10-27 20:22:59',2,5),(1,7,'internet lenta','2010-11-04 19:34:28',1,1),(1,8,'Sistema Travado','2010-11-13 11:22:04',1,3),(2,8,'Fechado, realizado testes  Fechado por: mat_3','2010-11-13 13:06:31',2,4),(1,9,'Sistema Lento','2010-11-17 19:34:10',1,3);

/*Table structure for table `funcionarios` */

DROP TABLE IF EXISTS `funcionarios`;

CREATE TABLE `funcionarios` (
  `fc_cod` int(5) NOT NULL COMMENT 'Código do Funcionário',
  `fc_nome` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Nome do Funcionário',
  `fc_cpf` char(11) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'CPF do Funcionário',
  `fc_rg` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'RG do Funcionário',
  `fc_tel` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Telefone do Funcionário',
  `fc_cel` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Celular do Funcionário',
  `fc_email` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'E-mail do Funcionário',
  `cg_cod` int(1) NOT NULL COMMENT 'Código do Cargo',
  PRIMARY KEY (`fc_cod`),
  KEY `FK_fc_cg` (`cg_cod`),
  CONSTRAINT `FK_fc_cg` FOREIGN KEY (`cg_cod`) REFERENCES `cargos` (`cg_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_funcionarios_end` FOREIGN KEY (`fc_cod`) REFERENCES `endereco_func` (`fc_cod`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `funcionarios` */

insert  into `funcionarios`(`fc_cod`,`fc_nome`,`fc_cpf`,`fc_rg`,`fc_tel`,`fc_cel`,`fc_email`,`cg_cod`) values (1,'Danilo','6787699612','66667766','777788669','75313395','danilo@teste.com.br',3),(2,'Solter Bernardo','4536377288','','44444444','77777777','solter@solter.com',2),(3,'William','45345','','765456','7899887','b@r',1),(4,'bruce','99999999999','8888888888','4444444444','7777777777','bruce@yahoo.com',2),(5,'Antonio Carlos','4352534176','','2143565423','2135467466','carlito@rj.com.br',2),(6,'Edson Arantes do Nascimento','00987234562','0191919','1199228833','2135467466','eara@globo.com',2),(7,'William Shakespeare','10020030040','102938465','2143565423','2135467466','teste@teste.com.br',2);

/*Table structure for table `hardware` */

DROP TABLE IF EXISTS `hardware`;

CREATE TABLE `hardware` (
  `hw_cod` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Código do Hardware',
  `hw_nome` char(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Nome do Hardware',
  `hw_marca` char(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Marca do Hardware',
  `hw_modelo` char(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Modelo do Hardware',
  `hw_num_serie` char(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Número de Série do Hardware',
  `hw_des` varchar(2000) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Descrição Detalahada do Hardware',
  `cl_cod` int(5) NOT NULL COMMENT 'Código do Cliente',
  `hw_valor` float(6,2) DEFAULT NULL COMMENT 'Valor Unitário do Hardware',
  PRIMARY KEY (`hw_cod`),
  KEY `FK_hardware` (`cl_cod`),
  CONSTRAINT `FK_hardware` FOREIGN KEY (`cl_cod`) REFERENCES `clientes` (`cl_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hardware` */

insert  into `hardware`(`hw_cod`,`hw_nome`,`hw_marca`,`hw_modelo`,`hw_num_serie`,`hw_des`,`cl_cod`,`hw_valor`) values (1,'Notebook','POSITIVO','P003','SND64537TR','hd 120 gb\r\nMemoria 4g\r\nprocessador core2duo 1600 ghz',1,1000.00),(2,'Computador','DELL','dl2','345red','hd 200gb\r\nprocessador core i7\r\nmemoria 4g',2,2000.00),(3,'Computador','Sony','s3344','5654','processador core i3\r\nmemoria ddr 3gb\r\nhd 320gb\r\nplaca de vided 512 mb',3,2300.00);

/*Table structure for table `itens_pedido` */

DROP TABLE IF EXISTS `itens_pedido`;

CREATE TABLE `itens_pedido` (
  `pd_num` int(3) NOT NULL COMMENT 'numero do pedido',
  `pd_item` int(3) NOT NULL COMMENT 'item',
  `pd_quant` int(3) NOT NULL COMMENT 'quantidade',
  `pd_desc` varchar(30) NOT NULL COMMENT 'descrição',
  KEY `FK_itens_pedido_item` (`pd_num`),
  CONSTRAINT `FK_itens_pedido_item` FOREIGN KEY (`pd_num`) REFERENCES `pedidos` (`pd_num`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `itens_pedido` */

insert  into `itens_pedido`(`pd_num`,`pd_item`,`pd_quant`,`pd_desc`) values (1,1,3,'cooler'),(1,2,9,'PLACA DE REDE'),(2,1,3,'hd'),(2,2,5,'modem'),(3,1,1,'Memoria de 1GB'),(3,2,4,'placa de video'),(3,3,5,'mouses'),(3,4,5,'teclados');

/*Table structure for table `os` */

DROP TABLE IF EXISTS `os`;

CREATE TABLE `os` (
  `os_cod` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Código da OS',
  `os_desc` varchar(2000) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Descrição da OS',
  `cl_cod` int(5) NOT NULL COMMENT 'Código do Cliente',
  `fc_cod` int(5) DEFAULT NULL COMMENT 'Código do Funcionário que Abriu a OS',
  `tos_cod` int(1) NOT NULL COMMENT 'Código do Tipo de OS',
  `sc_cod` int(2) NOT NULL COMMENT 'Código do Serviço',
  `st_os` int(2) NOT NULL COMMENT 'status da OS',
  PRIMARY KEY (`os_cod`),
  KEY `FK_os_cl` (`cl_cod`),
  KEY `FK_os_fc` (`fc_cod`),
  KEY `FK_os_tos` (`tos_cod`),
  KEY `FK_os_sc` (`sc_cod`),
  KEY `FK_os_st` (`st_os`),
  CONSTRAINT `FK_os_cl` FOREIGN KEY (`cl_cod`) REFERENCES `clientes` (`cl_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_os_fc` FOREIGN KEY (`fc_cod`) REFERENCES `funcionarios` (`fc_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_os_sc` FOREIGN KEY (`sc_cod`) REFERENCES `servico` (`sc_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_os_st` FOREIGN KEY (`st_os`) REFERENCES `os_status` (`st_os_cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_os_tos` FOREIGN KEY (`tos_cod`) REFERENCES `tipo_os` (`tos_cod`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `os` */

insert  into `os`(`os_cod`,`os_desc`,`cl_cod`,`fc_cod`,`tos_cod`,`sc_cod`,`st_os`) values (1,'computador não liga',2,1,1,1,1),(2,'falha no registro',1,1,1,2,1),(3,'o computador não liga',1,1,1,3,2),(4,'pc não funciona',2,1,1,3,1),(5,'internet muito lenta',3,1,1,3,2),(6,'Maquina desligando constantemente',2,3,1,2,2),(7,'internet lenta',3,1,1,2,1),(8,'Sistema Travado',5,3,1,5,2),(9,'Sistema Lento',5,3,1,8,1);

/*Table structure for table `os_status` */

DROP TABLE IF EXISTS `os_status`;

CREATE TABLE `os_status` (
  `st_os_cod` int(1) NOT NULL COMMENT 'Codigo Status OS',
  `st_os_status` char(12) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Status da OS',
  PRIMARY KEY (`st_os_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `os_status` */

insert  into `os_status`(`st_os_cod`,`st_os_status`) values (1,'Aberta'),(2,'Fechada'),(3,'Encaminhada'),(4,'Recebida');

/*Table structure for table `pedidos` */

DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos` (
  `pd_num` int(3) NOT NULL COMMENT 'Numero do pedido',
  `pd_data` datetime NOT NULL COMMENT 'data do pedido',
  `cl_cod` int(3) NOT NULL COMMENT 'cliente',
  PRIMARY KEY (`pd_num`),
  KEY `FK_pd_cl` (`pd_data`),
  KEY `FK_pedidos_cli` (`cl_cod`),
  CONSTRAINT `FK_pedidos_cli` FOREIGN KEY (`cl_cod`) REFERENCES `clientes` (`cl_cod`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pedidos` */

insert  into `pedidos`(`pd_num`,`pd_data`,`cl_cod`) values (1,'2010-09-10 20:23:55',1),(2,'2010-09-11 10:01:00',2),(3,'2010-11-13 11:13:28',5);

/*Table structure for table `servico` */

DROP TABLE IF EXISTS `servico`;

CREATE TABLE `servico` (
  `sc_cod` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Código do Serviço',
  `sc_des` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Descrição do Serviço',
  PRIMARY KEY (`sc_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `servico` */

insert  into `servico`(`sc_cod`,`sc_des`) values (1,'Formatação'),(2,'Remoção de Virus'),(3,'Reparo no Registro'),(4,'Substituição de Placa'),(5,'Manutenção no Servidor'),(6,'Manutenção na Rede Física'),(7,'Manutenção do Roteador'),(8,'Outros Serviços');

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `st_cod` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Código do Status do Cliente',
  `st_desc` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Descrição do Status do Cliente',
  PRIMARY KEY (`st_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `status` */

insert  into `status`(`st_cod`,`st_desc`) values (1,'Master'),(2,'Premium'),(3,'Basico'),(4,'Inativo');

/*Table structure for table `tipo_cliente` */

DROP TABLE IF EXISTS `tipo_cliente`;

CREATE TABLE `tipo_cliente` (
  `tpc_cod` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Código do Tipo de Cliente',
  `tpc_desc` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Descrição do Tipo de Cliente',
  PRIMARY KEY (`tpc_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_cliente` */

insert  into `tipo_cliente`(`tpc_cod`,`tpc_desc`) values (1,'Pessoa Fisica'),(2,'Pessoa Juridica');

/*Table structure for table `tipo_os` */

DROP TABLE IF EXISTS `tipo_os`;

CREATE TABLE `tipo_os` (
  `tos_cod` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Código do Tipo de OS',
  `tos_desc` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Descrição do Tipo de OS',
  PRIMARY KEY (`tos_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_os` */

insert  into `tipo_os`(`tos_cod`,`tos_desc`) values (1,'Corretiva'),(2,'Preventiva');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `us_login` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Login do Usúario',
  `us_senha` char(8) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Senha do Usúario',
  `fc_cod` int(5) NOT NULL COMMENT 'Código do Funcionário',
  PRIMARY KEY (`fc_cod`),
  KEY `FK_us_fc` (`fc_cod`),
  CONSTRAINT `FK_us_fc` FOREIGN KEY (`fc_cod`) REFERENCES `funcionarios` (`fc_cod`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`us_login`,`us_senha`,`fc_cod`) values ('operador','senha',1),('tecnico','senha',2),('gerente','senha',3);

/*Table structure for table `usuario_cli` */

DROP TABLE IF EXISTS `usuario_cli`;

CREATE TABLE `usuario_cli` (
  `login` varchar(10) NOT NULL COMMENT 'login do cliente',
  `senha` varchar(10) NOT NULL COMMENT 'senha do cliente',
  `cl_cod` int(1) NOT NULL COMMENT 'codigo cliente',
  PRIMARY KEY (`cl_cod`),
  CONSTRAINT `FK_usuario_cli_cli` FOREIGN KEY (`cl_cod`) REFERENCES `clientes` (`cl_cod`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario_cli` */

insert  into `usuario_cli`(`login`,`senha`,`cl_cod`) values ('cliente','senha',1);

/*Table structure for table `relatorio_os` */

DROP TABLE IF EXISTS `relatorio_os`;

/*!50001 DROP VIEW IF EXISTS `relatorio_os` */;
/*!50001 DROP TABLE IF EXISTS `relatorio_os` */;

/*!50001 CREATE TABLE `relatorio_os` (
  `os_cod` int(5) NOT NULL DEFAULT '0' COMMENT 'Código da OS',
  `os_desc` varchar(2000) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Descrição da OS',
  `dabert` datetime DEFAULT NULL COMMENT 'Data',
  `ev_data` datetime DEFAULT NULL COMMENT 'Data',
  `st_os_status` char(12) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL COMMENT 'Status da OS',
  `cl_cod` int(5) NOT NULL COMMENT 'Código do Cliente',
  `cl_nm_rs` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Razão Social / Nome',
  `fc_cod` int(5) DEFAULT NULL COMMENT 'Código do Funcionário que Abriu a OS',
  `fc_nome` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Nome do Funcionário'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `relatorio_pedido` */

DROP TABLE IF EXISTS `relatorio_pedido`;

/*!50001 DROP VIEW IF EXISTS `relatorio_pedido` */;
/*!50001 DROP TABLE IF EXISTS `relatorio_pedido` */;

/*!50001 CREATE TABLE `relatorio_pedido` (
  `pd_num` int(3) NOT NULL COMMENT 'Numero do pedido',
  `cl_cod` int(3) NOT NULL COMMENT 'cliente',
  `cl_nm_rs` char(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL COMMENT 'Razão Social / Nome',
  `pd_item` int(3) NOT NULL COMMENT 'item',
  `pd_desc` varchar(30) NOT NULL COMMENT 'descrição',
  `pd_quant` int(3) NOT NULL COMMENT 'quantidade',
  `pd_data` datetime NOT NULL COMMENT 'data do pedido'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view relatorio_os */

/*!50001 DROP TABLE IF EXISTS `relatorio_os` */;
/*!50001 DROP VIEW IF EXISTS `relatorio_os` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `relatorio_os` AS (select `os`.`os_cod` AS `os_cod`,`os`.`os_desc` AS `os_desc`,`ev`.`ev_data` AS `dabert`,`ev2`.`ev_data` AS `ev_data`,`ost`.`st_os_status` AS `st_os_status`,`os`.`cl_cod` AS `cl_cod`,`cl`.`cl_nm_rs` AS `cl_nm_rs`,`os`.`fc_cod` AS `fc_cod`,`fc`.`fc_nome` AS `fc_nome` from (((((`os` left join `eventos_os` `ev` on(((`os`.`os_cod` = `ev`.`os_cod`) and (`ev`.`st_cod` = 1)))) join `clientes` `cl` on((`os`.`cl_cod` = `cl`.`cl_cod`))) join `funcionarios` `fc` on((`os`.`fc_cod` = `fc`.`fc_cod`))) left join `eventos_os` `ev2` on(((`os`.`os_cod` = `ev2`.`os_cod`) and (`ev2`.`st_cod` = 2)))) join `os_status` `ost` on((`os`.`st_os` = `ost`.`st_os_cod`))) group by `os`.`os_cod` order by `os`.`os_cod`) */;

/*View structure for view relatorio_pedido */

/*!50001 DROP TABLE IF EXISTS `relatorio_pedido` */;
/*!50001 DROP VIEW IF EXISTS `relatorio_pedido` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `relatorio_pedido` AS (select `pd`.`pd_num` AS `pd_num`,`pd`.`cl_cod` AS `cl_cod`,`cl`.`cl_nm_rs` AS `cl_nm_rs`,`it`.`pd_item` AS `pd_item`,`it`.`pd_desc` AS `pd_desc`,`it`.`pd_quant` AS `pd_quant`,`pd`.`pd_data` AS `pd_data` from ((`pedidos` `pd` join `itens_pedido` `it` on((`pd`.`pd_num` = `it`.`pd_num`))) join `clientes` `cl` on((`cl`.`cl_cod` = `pd`.`cl_cod`))) order by `pd`.`pd_num`,`it`.`pd_item`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
