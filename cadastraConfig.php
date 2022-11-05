<?php
include("config.php");
session_start();

$registration = $_POST['registration'];
$email = $_POST['email'];
$campus = $_POST['campus'];
$permissionLevel = $_POST['permissionLevel'];
$password = $_POST['password'];
$name = $_POST['name'];
$cpf = $_POST['cpf'];
$course = $_POST['course'];
$situacao = $_POST['situacao'];
$password = md5($password);

$result = "INSERT INTO usuarios(nome, registro, cpf, email, curso, biblioteca, situacao, tipo_usuario, senha) 
VALUES('$nome','$registro','$cpf','$email', '$curso','$biblioteca', '$situacao','$tipo_usuario', '$senha')";   

//verifica se os campos de 
if (null == ([$registro] || [$cpf])) {
    header("location: cadastro.php");
    $_SESSION['cadErro'] = "<scri>alert('Preencha os campos corretamente');</script>";
    exit;
} else {

    "SELECT * FROM usuarios WHERE registro = '$registro' && cpf = '$cpf'";

    //obtém a matrícuça dos usuários
    $sqlRegistro = "SELECT * FROM usuarios WHERE registro='$registro'";
    $queryRegistro = mysqli_query($conn, $sqlRegistro);
    $buscaRegistro = mysqli_num_rows($queryRegistro);

    //obtém o cpf dos usuários
    $sqlCpf = "SELECT * FROM usuarios WHERE cpf='$cpf'";
    $queryCpf = mysqli_query($conn, $sqlCpf);
    $buscaCpf = mysqli_num_rows($queryCpf);

    //verifica se não há usuários com a mesma matrícula ou cpf
    if (($buscaRegistro || $buscaCpf) == '0') {
        $result = "INSERT INTO usuarios(nome, registro, cpf, email, curso, biblioteca, situacao, tipo_usuario, senha)
        VALUES('$nome','$registro','$cpf','$email', '$curso','$biblioteca', '$situacao','$tipo_usuario', '$senha')";

        //insere os dados na tabela se não haver cpf ou matrícula iguais
        $insert = mysqli_query($conn, $result) or die(" O sistema não foi capaz de realizar a operação!");    //pois se foi 0, não encontrou nenhum registro igual
    } else {

        //erro caso ja exista um cpf ou matrícula igual
        $_SESSION['cadErro'] = "Usuário ja cadastrado!";
        header("location: cadastro.php");
    }
}
?>
<!-- página de sucesso -->
<html>

<head>
    <meta charset="utf-8" />
    <title>| Usuário cadastrado</title>
    <link rel="stylesheet" href="css/style.css" />

    <meta http-equiv="refresh" content="2; URL='./index.php'" />
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