CREATE TABLE `usuarios` (
    `id_usuario` int NOT NULL AUTO_INCREMENT,
    `nome` varchar(220) NOT NULL,
    `num_matricula` varchar(11) NOT NULL,
    `num_cpf` varchar(11) NOT NULL,
    `email` varchar(100) NOT NULL,
    `curso` varchar(100) NOT NULL,
    `biblioteca` varchar (100) NOT NULL,
    `situacao` varchar (10) NOT NULL,
    `tipo_usuario` int NOT NULL,
    `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
);