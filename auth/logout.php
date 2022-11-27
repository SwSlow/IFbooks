<?php
if(!isset($_SESSION)) {
    session_start();
}

session_destroy(); 
    //redirecionar o usuario para a página de login
    header("Location: ../login.php");
?>
