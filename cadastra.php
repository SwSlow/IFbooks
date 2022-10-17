<?php
   include_once("conexao.php");

    $nome = $_POST['nome'];
    $matricula = $_POST['num_matricula'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];
    $biblioteca = $_POST['biblioteca'];
    $situacao = $_POST['situacao'];
    $user = $_POST['tipo_user'];


    mysqli_query($con, "INSERT INTO usuarios (nome, num_matricula, cpf, email, curso, bibioteca, situação, user) 
    VALUES ('$nome', '$matricula', '$cpf', '$email', '$curso, '$biblioteca' '$situacao' '$user')") or die("O sistema não foi capaz de realizar a operação!");
?>