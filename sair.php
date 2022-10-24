<?php
    session_start();   
    unset(
        $_SESSION['idUsuario'],
        $_SESSION['nomeUsuario'],
        $_SESSION['num_matricula'],
        $_SESSION['usuarioEmail'],
        $_SESSION['curso'],
        $_SESSION['bibioteca'],
        $_SESSION['situação'],
    );   
    //redirecionar o usuario para a página de login
    header("Location: index.php");
?>
