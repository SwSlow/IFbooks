<?php
include("../db/config.php");
session_start();

$registration = $mysqli->real_escape_string($_POST['registration']);
$email = $mysqli->real_escape_string($_POST['email']);
$campus = $mysqli->real_escape_string($_POST['campus']);
$type = $mysqli->real_escape_string($_POST['type']);
$password = $mysqli->real_escape_string($_POST['password']);
$name = $mysqli->real_escape_string($_POST['name']);
$cpf = $mysqli->real_escape_string($_POST['cpf']);
$course = $mysqli->real_escape_string($_POST['course']);
$situation = $mysqli->real_escape_string($_POST['situation']);
$password = md5($password);

//verifica se os campos de 
if (null == [$registration]) {
    header("location: cadastro.php");
    $_SESSION['cadErro'] = "<script>alert('Preencha os campos corretamente');</script>";
    exit;
} else {

    "SELECT * FROM person WHERE registration = '$registration' && cpf = '$cpf'";

    //obtém a matrícuça dos usuários
    $sqlRegistration = "SELECT * FROM user WHERE registration = '$registration'";
    $queryRegistration = mysqli_query($mysqli, $sqlRegistration);
    $searchRegistration = mysqli_num_rows($queryRegistration);

    //verifica se não há usuários com a mesma matrícula ou cpf
    if ($searchRegistration == '0') {
        $sqlCode = "INSERT INTO `user` (`name`, `registration`, `cpf`, `email`, `password`, `course`, `campus`, `situation`, `type`)  VALUES('$name','$registration','$cpf','$email', '$password', '$course','$campus', '$situation','$type')";
        $sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

    } else {

        //erro caso ja exista um cpf ou matrícula igual
        $_SESSION['cadErro'] = "Usuário ja cadastrado!";
        header("location: ../cadastro.php");
    }
}
?>
<!-- página de sucesso -->
<html>

<head>
    <meta charset="utf-8" />
    <title>| Usuário cadastrado</title>
    <link rel="stylesheet" href="../css/style.css" />

    <meta http-equiv="refresh" content="2; URL='../login.php'" />
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