<?php
    session_start();   
    unset(  
        $_SESSION['userID'],
        $_SESSION['type']

    );   
    //redirecionar o usuario para a página de login
    header("Location: login.php");
?>
