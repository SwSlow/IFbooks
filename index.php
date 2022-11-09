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
        <a onclick="addLivroPag()">Painel de Controle</a>
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

  <br><br><br><br>


 
  
<h4 class="swiper-title">Sua lista</h4>

<div class="form">

<section class="swiper-container">

   <div class="swiper mySwiper">
      <div class="swiper-wrapper">


        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>
        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>

      </div>

      </div>
    </div>


    </section>


    <!-- <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
       -->
    </div>
   
  </div>


   <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
  
  

  <br><BR>

  <h4 class="swiper-title">Recomendações</h4>

<div class="form">

<section class="swiper-container">

   <div class="swiper mySwiper">
      <div class="swiper-wrapper">


        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>

        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>
      </div>
        <div class="swiper-slide"><img src="imagens/example.PNG">
        <h6>Call of Cthulu</h6>

      </div>

      </div>
    </div>

    </section>

      <!-- <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
       -->
    </div>
   
  </div>


    <!-- swiper script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
      
      var swiper = new Swiper(".mySwiper",  {
        
        slidesPerView: 6,
        autoResize: false,
        spaceBetween: 70,
        centeredSlides: true,
        loop: true,
        longSwipes: false,
        setWrapperSize: true,
        followFinger: true,
        setWrapperSize: true,
        slidesPerGroup: 3,
        speed: 800,
        grabCursor: true,

        keyboard: {
    enabled: true,
    onlyInViewport: true,
  },
      
        breakpoints: {
    320: {
      slidesPerView: 2,
      spaceBetween: 20
    },
   600: {
      slidesPerView: 3,
      spaceBetween: 30
    },
    900: {
      slidesPerView: 4,
      spaceBetween: 40
    },

    1300: {
      slidesPerView: 6,
      spaceBetween: 70
    },

    1500: {
      slidesPerView: 7,
      spaceBetween: 70
    },

    1800: {
      slidesPerView: 8,
      spaceBetween: 75
    },
   
    
  },
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',

      },

      });


   
      
</script>



</body>

<footer>
  <img class="fundos" src="imagens/ondaas.PNG" width="100%" height="50%"> 
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