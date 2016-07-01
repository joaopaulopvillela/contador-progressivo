create table `contador`.`tempo`( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_inicio` datetime DEFAULT NULL,
  `data_fim` datetime DEFAULT NULL,
  `duracao` int(11) NOT NULL,
   PRIMARY KEY (`id`)
 )  