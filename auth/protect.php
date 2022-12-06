<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['userID'])) {
    header("Location: ./login.php");
    $_SESSION['loginErro'] = "<script>alert('Faça login para acessar a página!');</script>";
    exit;
}
