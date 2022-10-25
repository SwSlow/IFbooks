CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(220) NOT NULL,
    `num_matricula` int(11) NOT NULL,
    `cpf` int(11) NOT NULL,
    `email` varchar(520) NOT NULL,
    `curso` varchar(520) NOT NULL,
    `biblioteca` varchar (520) NOT NULL,
    `situacao` varchar (32) NOT NULL,
    `niveis_acesso_id` int(11) NOT NULL,
    `user` varchar(32) NOT NULL,
    `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

  CREATE TABLE IF NOT EXISTS `niveis_acessos` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
  )