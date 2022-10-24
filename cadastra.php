<html>
<?php
include ("config.php");

$nome = $_POST['nome'];
$matricula = $_POST['num_matricula'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$curso = $_POST['curso'];
$biblioteca = $_POST['biblioteca'];
$situacao = $_POST['situacao'];
$acesso = $_POST['tipo_user'];
$user = $_POST['tipo_user'];
$senha = $_POST['senha'];
 

echo $result = "INSERT INTO  `usuários` (`nome`, `num_matricula`, `cpf`, `email`, `curso`, `biblioteca`, `situacao`, `niveis_acesso_id`, `user`, `senha`)
                         VALUES('{$nome}', '{$matricula}', '{$cpf}', '{$email}', '{$curso}', '{$biblioteca}', '{$situacao}', '{$user}', '{$senha}')";

// INSERT INTO `usuarios` (`nome`, `num_matricula`, `cpf`, `email`, `curso`, `biblioteca`, `situacao`, `niveis_acesso_id`, `user`, `senha`) 
//             VALUES (NULL, 'Luis', '2020303019', '55555555', 'ascascasc', 'info', 'FW', 'regular', '2', '2', '123');

$insert = mysqli_query($conn, $result) or die(" O sistema não foi capaz de realizar a operação!");

?>

</html>