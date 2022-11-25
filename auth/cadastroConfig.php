<?php
include("config.php");
session_start();

$registration = $_POST['registration'];
$email = $_POST['email'];
$campus = $_POST['campus'];
$type = $_POST['type'];
$password = $_POST['password'];
$name = $_POST['name'];
$cpf = $_POST['cpf'];
$course = $_POST['course'];
$situation = $_POST['situation'];
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
    $queryRegistration = mysqli_query($conn, $sqlRegistration);
    $searchRegistration = mysqli_num_rows($queryRegistration);

    // //obtém o cpf dos usuários
    // $sqlCpf = "SELECT * FROM user WHERE cpf = '$cpf'";
    // $queryCpf = mysqli_query($conn, $sqlCpf);
    // $searchCpf = mysqli_num_rows($queryCpf);

    //verifica se não há usuários com a mesma matrícula ou cpf
    if ($searchRegistration == '0') {
        $result = "INSERT INTO user (name, registration, cpf, email, password, course, campus, situation, type) 
        VALUES('$name','$registration','$cpf','$email', '$password', '$course','$campus', '$situation','$type')";

        //insere os dados na tabela se não haver cpf ou matrícula iguais
        $insert = mysqli_query($conn, $result) or die(" O sistema não foi capaz de realizar a operação!");    //pois se foi 0, não encontrou nenhum registro igual
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
    <link rel="stylesheet" href="css/style.css" />

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