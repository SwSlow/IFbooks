<?php
include ("conexao.php");
$matricula = $_POST['num_matricula'];
$email = $_POST['email'];
$biblioteca = $_POST['biblioteca'];
$acesso = $_POST['tipo_acesso'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$curso = $_POST['curso'];
$situacao = $_POST['situacao'];
$user = $_POST['tipo_acesso'];
$senha = md5($senha);
 
/*echo $result = "INSERT INTO usuarios(nome,num_matricula,cpf, email, curso,bibioteca,situacao, niveis_acesso_id,user, senha) 
                VALUES('$nome','$matricula','$cpf','$email', '$curso','$biblioteca', '$situacao','$acesso','$user', '$senha')";
*/

echo $result = "INSERT INTO usuarios(num_matricula,email,bibioteca,niveis_acesso_id,senha,nome,cpf,curso,situação,user) 
                VALUES('$matricula','$email', '$biblioteca', '$acesso', '$senha', '$nome', '$cpf', '$curso', '$situacao', '$user')";

$insert = mysqli_query($conn, $result) or die(" O sistema não foi capaz de realizar a operação!");

?>

<head>
    <meta charset="utf-8" />
    <title>Usuário cadastrado</title>
    <meta http-equiv="refresh" content="5; URL='./index.php'" />

</head>

<body>
    Usuário Cadastrado... Redirecionando
</body>

</html>