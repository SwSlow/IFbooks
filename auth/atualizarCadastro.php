<?php
session_start();
include('../db/config.php');
include('../auth/protect.php');

$id = $mysqli->real_escape_string($_POST['id']);

$sql_code = "SELECT * FROM user WHERE userID=$id";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item = $sql_query->fetch_assoc();

global $item;

    $registration = $mysqli->real_escape_string($_POST['registration']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $name = $mysqli->real_escape_string($_POST['name']);
    $cpf = $mysqli->real_escape_string($_POST['cpf']);
    $situation = $mysqli->real_escape_string($_POST['situation']);
    $permission = $mysqli->real_escape_string($_POST['permission']);
    $password = md5($password);


    $sqlCode = "UPDATE user
    SET name = '$name',
    registration = '$registration',
    cpf = '$cpf',
    email = '$email',
    password = '$password',
    situation = '$situation',
    permissionLevel = '$permission'
    WHERE userID ='$id'";

    $sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>| Usuário atualizado</title>
    <link rel="stylesheet" href="../css/style.css" />

    <meta http-equiv="refresh" content="2; URL='../index.php'" />
</head>
<meta charset="utf-8">

<title>| Sucesso</title>

<body>
    <img class="fundos" src="../imagens/fundo.png">
    <img class="logoIff" src="../imagens/IFF.png">

    <div class="div_cadastro_sucess">
        <h5>Usuário atuzalizado com sucesso!</h5>

        <img class="imgCheck" src="../imagens/check.png">
        <br><br><br><br>
    </div>

</body>

<footer>
    <img src="../imagens/ondaas.PNG" width="100%" height="50%">
</footer>

</html>