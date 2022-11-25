<?php
session_start();

// verifica se há algum usuário logado 
if (!isset($_SESSION["userID"])) {
    // Usuário não logado! Redireciona para a página de login
   header("Location: ./login.php");
    // Notifica o usuário que não há nenhuma sessão iniciada
   $_SESSION['loginErro'] = "<script>alert('Faça login para acessar a página!');</script>";
   exit;
  }
  $id = $_SESSION['userID'];
  $permissionLevel = $_SESSION['permissionLevel'];
    
echo ($id);
print_r($permissionLevel);