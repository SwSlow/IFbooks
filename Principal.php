<?php
session_start();

//verifica se há algum usuário logado 
if (!isset($_SESSION["idUsuario"]) || !isset($_SESSION["nomeUsuario"])) {
  // Usuário não logado! Redireciona para a página de login
  header("Location: ./index.php");
  // Notifica o usuário que não há nenhuma sessão iniciada
  $_SESSION['loginErro'] = "<script>alert('Faça login para acessar a página!');</script>";
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/stylePrincipal.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>
<meta charset="utf-8">

<title>| Página Principal</title>



<body>
  <header class="cabecalho">
    <img class="logoBib" src="imagens/Logo.png">

    <div class="dropDownIMG">

      <img class="UserBib" src="imagens/User.png">

      <div class="dropdownContent">

        <a onclick="sairAlert()">LogOff</a>

      </div>
    </div>
    <div class="search-box">
      <input class="search-txt" type="text" name="" placeholder="Digite sua pesquisa">
      <a class="search-btn" href="#">
        <i class="fas fa-search"></i>
      </a>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Categorias</button>
      <div class="dropdown-content">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div>


    </div>
  </header>


</body>

<footer>
  <img src="imagens/ondaas.PNG" width="100%" height="50%">
</footer>

</html>
<script>
  function sairAlert() {
    location.href = "./sair.php";
    alert("Deslogado com sucesso!")
  }
</script>