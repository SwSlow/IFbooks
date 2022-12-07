<?php
session_start();
include('./db/config.php');
include('./auth/protect.php');

if ($_SESSION['permissionLevel'] != "admin") {
  header("Location: ./index.php");
  $_SESSION['loginErro'] = "<script>alert('Você não ter permissão está página!');</script>";
  exit;
}

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./css/StylePrincipal.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>
<meta charset="utf-8">

<title>Painel de Controle</title>

<body>

  <button class="voltar" onclick="window.location.href = 'index.php'">
    <h11>Voltar</h11>
  </button>

  <br><br><br>


  <div class="flex-parent-element">

    <div class="flex-child-element slide">
      <h10 class="usuarioLabel">Usuários</h10> <img class="userImg" src="imagens/2pessoas.PNG">

      <h2>
        <?php
        include('./db/config.php');

        $total = 0;
        $sql = "SELECT COUNT(userID) AS user FROM user";
        $sql = $mysqli->query($sql);
        $sql = $sql->fetch_assoc();
        $total = $sql['user'];

        echo ($total . " Usuários Cadastrados")
        ?>
      </h2>

    </div>
    <div class="flex-child-element slide2">
      <h10 class="equipeLabel">Equipe</h10> <img class="equipeImg" src="imagens/equipe.PNG">
      <?php
      include('./db/config.php');

      $totalAdmin = 0;
      $sql = "SELECT COUNT(userID) AS user FROM user WHERE permissionLevel = 'admin'";
      $sql = $mysqli->query($sql);
      $sql = $sql->fetch_assoc();
      $totalAdmin = $sql['user'];

      $totalModerator = 0;
      $sql = "SELECT COUNT(userID) AS user FROM user WHERE permissionLevel = 'moderator'";
      $sql = $mysqli->query($sql);
      $sql = $sql->fetch_assoc();
      $totalModerator = $sql['user'];

      $admins = "<h3>$totalAdmin Bibliotecários</h3>";
      $moderators = "<h3>$totalModerator Moderadores</h3>";


      echo ($admins);
      echo ($moderators);
      echo ($usersEmployee);
      ?>


    </div>
  </div>

  <br><br>
  <p style="margin:10px;"></p>

  <div  class="flex-parent-element">
    
    <a href="CadastroLivro.php" class="flex-child-element slide">
      <h10 class="acervoLabel">Acervo</h10> <img class="acervoImg" src="imagens/acervo.PNG">
      <h2>
        <?php
        include('./db/config.php');

        $total = 0;
        $sql = "SELECT COUNT(itemID) AS item FROM item";
        $sql = $mysqli->query($sql);
        $sql = $sql->fetch_assoc();
        $total = $sql['item'];

        echo ($total . " itens Cadastrados")
        ?>
      </h2>
    </a>
    <div class="flex-child-element slide2">
      <h10 class="avaliacoesLabel">Avaliações</h10> <img class="avaliacoesImg" src="imagens/coracao.PNG">
      <h2>453 Obras avaliadas</h2>
    </div>
  </div>

  <br><br>
  <p style="margin:10px;"></p>

  <div class="flex-parent-element">
    <div class="flex-child-element slide">
      <h10 class="comentariosLabel">Comentários</h10> <img class="comentariosImg" src="imagens/comentarios1.PNG">
      <h5 class="com">432 Comenatários aprovados</h5>
    </div>
    <div class="flex-child-element slide2">
      <h10 class="forumLabel">Comentários</h10> <img class="forumImg" src="imagens/comentarios2.PNG">
      <h5>5 Comentários pendentes</h5>
    </div>
  </div>


</body>

</html>