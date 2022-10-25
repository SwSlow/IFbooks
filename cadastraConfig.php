<?php
include("config.php");
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

$result = "INSERT INTO usuarios(nome,num_matricula,cpf, email, curso, biblioteca,situacao, niveis_acesso_id,user, senha) 
                VALUES('$nome','$matricula','$cpf','$email', '$curso','$biblioteca', '$situacao','$acesso','$user', '$senha')";

//verifica se os campos de 
if (null == ([$matricula] || [$cpf])) {
    header("location: cadastro.php");
    $_SESSION['cadErro'] = "<script>alert('Erro ao cadastrar!');</script>";
    exit;
} else {

    "SELECT * FROM usuarios WHERE num_matricula = '$matricula' && cpf = '$cpf'";

    //obtém a matrícuça dos usuários
    $sqlMatricula = "SELECT * FROM usuarios WHERE num_matricula='$matricula'";
    $queryMatricula = mysqli_query($conn, $sqlMatricula);
    $buscaMatricula = mysqli_num_rows($queryMatricula);

    //obtém o cpf dos usuários
    $sqlCpf = "SELECT * FROM usuarios WHERE cpf='$cpf'";
    $queryCpf = mysqli_query($conn, $sqlCpf);
    $buscaCpf = mysqli_num_rows($queryCpf);

    //verifica se não há usuários com a mesma matrícula ou cpf
    if (($buscaMatricula || $buscaCpf) == '0') {
        $result = "INSERT INTO usuarios(num_matricula, email, biblioteca, niveis_acesso_id, senha, nome, cpf, curso, situacao, user) 
        VALUES('$matricula','$email', '$biblioteca', '$acesso', '$senha', '$nome', '$cpf', '$curso', '$situacao', '$user')";

        //insere os dados na tabela se não haver cpf ou matrícula iguais
        $insert = mysqli_query($conn, $result) or die(" O sistema não foi capaz de realizar a operação!");    //pois se foi 0, não encontrou nenhum registro igual
    } else {

        //erro caso ja exista um cpf ou matrícula igual
        $_SESSION['cadErro'] = "<script>alert('Usuário ja cadastrado!');</script>";
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