<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/stylePrincipal.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>
<meta charset="utf-8">

<title>Painel de Controle</title>

<body>

<header class="nav-down">
    <img class="logoBib" src="imagens/Logo.png">

    <div class="dropDownIMG">

      <img class="UserBib" src="imagens/User.png">

      <div class="dropdownContent">
        <a onclick="sairAlert()">LogOff</a>
        <a onclick="addLivroPag()">Painel de Controle</a>
      </div>
    </div>
    <div class="search-box">
      <input class="search-txt" type="text" name="" placeholder="Digite sua pesquisa">
      <a class="search-btn" href="#">
        <i class="fas fa-search"></i>
      </a>
    </div>

 


    </div>
  </header>


  <br><br><br>

    <div class="divPainel">

      
    </div>
     
    <br><br><br><br><br><br><br><br>



    <div class="divPainel">

      
    </div>

    


</body>
</html>