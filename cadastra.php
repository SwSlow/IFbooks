<?php
include("conexao.php");
session_start();

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

if (null == ([$matricula] || [$cpf])) {
    header("location: cadastro.php");
    $_SESSION['cadErro'] = "<script>alert('Erro ao cadastrar!');</script>";
    exit;
} else {
    $result = "INSERT INTO usuarios(num_matricula, email, bibioteca, niveis_acesso_id, senha, nome, cpf, curso, situação, user) 
                VALUES('$matricula','$email', '$biblioteca', '$acesso', '$senha', '$nome', '$cpf', '$curso', '$situacao', '$user')";

    $insert = mysqli_query($conn, $result) or die(" O sistema não foi capaz de realizar a operação!");
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>| Usuário cadastrado</title>
    <link rel="stylesheet" href="css/style.css" />

    <meta http-equiv="refresh" content="3; URL='./index.php'" />
</head>
<meta charset="utf-8">

<title>| Sucesso</title>

<body>
    <img class="fundos" src="imagens/fundo.png">
    <img class="logoIff" src="imagens/IFF.png">

    <div class="div_cadastro_sucess">
        <h5>Usuário Cadastrado com sucesso!</h5>

        <img class="imgCheck" src="imagens/check.png">
        <br><br><br><br>
    </div>

</body>

<footer>
    <img src="imagens/ondaas.PNG" width="100%" height="50%">
</footer>

</html>