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
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/stylePrincipal.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- swiper link -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>


</head>
<meta charset="utf-8">

<title>| Bem-Vindo!</title>



<body>
  <header class="cabecalho">
    <img class="logoBib" src="imagens/Logo.png">

    <div class="dropDownIMG">

      <img class="UserBib" src="imagens/User.png">

      <div class="dropdownContent">
        <a onclick="sairAlert()">LogOff</a>
        <a onclick="addLivroPag()">Adicionar livro</a>
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

  <br><br><br><br><br><br>

<section class="swiper-container">

   <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
      </div>
      <div class="swiper-pagination"></div>
    </div>


    </section>

    <!-- swiper script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 35,
        centeredSlides: true,
        loop: true,

        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>

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

  function addLivroPag(){
    location.href = "/adicionarLivro.php";
  }
</script>