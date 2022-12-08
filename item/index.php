<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
include("../db/config.php");
include("../auth/protect.php");

$path = '.';
global $path;

$id = $mysqli->real_escape_string($_GET['item']);

$sql_code = "SELECT * FROM item WHERE itemID=$id";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item = $sql_query->fetch_assoc();

$sql_code = "SELECT * FROM tag INNER JOIN itemtag ON itemTag.tagID=tag.tagID WHERE itemtag.itemID=$id;";
$sql_query_tag = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item["tags"] = $sql_query_tag;

$sql_code = "SELECT * FROM author INNER JOIN itemAuthor ON itemAuthor.authorID=author.authorID WHERE itemAuthor.itemID=$id";
$sql_query_author = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item["authors"] = $sql_query_author;

$sql_code = "SELECT * FROM comment WHERE itemID=$id";
$sql_query_comment = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item["comments"] = $sql_query_comment;

global $item;


if (isset($_POST['qntd'])) {
  
  $qntd = $mysqli->real_escape_string($_POST['qntd']);

  $sqlCode = "UPDATE item
  SET inventory = '$qntd'
  WHERE itemID = '$id'";
  $sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

  header("Refresh:0");
}
?>
<!DOCTYPE html>
<html>

<script>
  function sairAlert() {
    location.href = "../auth/logout.php";
    alert("Deslogado com sucesso!")
  }

  function controlPanel() {
    location.href = "../controlPanel.php";
  }
</script>

<head>
  <link rel="stylesheet" href="../css/StylePrincipal.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>
<meta charset="utf-8">

<title>Página do Livro</title>

<body>

  <header class="nav-down">
    <img class="logoBib" src="../imagens/Logo.png">

    <div class="dropDownIMG">

      <img class="UserBib" src="../imagens/User.png">

      <?php
      if ($_SESSION['permissionLevel'] == 'admin') {

        $dropMenu = "
        <div class=\"dropdownContent\">
        <a href = \"../controlPanel.php\">Painel de Controle</a>
        <a href = \"../auth/logout.php\" onclick=\"sairAlert()\">LogOff</a>
        </div>";
      } else {
        $dropMenu = "
        <div class=\"dropdownContent\">
        <a href=\"../user/?user=$id\">Perfil</a>
        <a href = \"../auth/logout.php\" onclick=\"sairAlert()\">LogOff</a>
        </div>";
      }

      echo ($dropMenu)
      ?>
      
    </div>
    <div class="search-box">
      <input class="search-txt" type="text" name="" placeholder="Digite sua pesquisa">
      <a class="search-btn" href="#">
        <i class="fas fa-search"></i>
      </a>
    </div>

    <div class="dropdown">
      <button onclick="window.location.href = '../index.php'" class="dropbtn">Voltar</button>
    </div>
  </header>
  <br><br><br><br><br>

  <div class="DivLivro">

    <img src="<?= $path . $item["cover"] ?>" alt="Capa do Livro">

    <br>

    <i id="thumbsU" class="fa-solid fa-thumbs-up fa-3x"></i>
    <button class="likeC" id="like" onclick="liked(event)">

      <h100>like</h100>

    </button>

    <i id="thumbsD" class="fa-solid fa-thumbs-down fa-3x"></i>
    <button class="dislikeC" id="dislike" onclick="liked(event)">

      <h100>dislike</h100>

    </button>

    <br>

    <h12>Rating do livro: </h12>
    <h12 id="counter">0</h12>

    <br>



    <script>
      let like_flag = false;
      let dislike_flag = false;

      function liked(event) {
        let counter = parseFloat(document.getElementById('counter').innerHTML);
        var button = event.target.innerText;
        switch (button) {
          case 'like':
            if (like_flag == false && dislike_flag == false) {
              counter++;
              like_flag = true;
            } else if (like_flag == false && dislike_flag == true) {
              counter = counter + 1; //changed this to 1 instead of 2
              like_flag = true;
              dislike_flag = false;
            } else {
              counter--;
              like_flag = false;
            }
            break;
          case 'dislike':
            if (dislike_flag == false && like_flag == false) {
              counter--;
              dislike_flag = true;
            } else if (dislike_flag == false && like_flag == true) {
              counter = counter - 1; //changed this to 1 instead of 2
              dislike_flag = true;
              like_flag = false;
            } else {
              counter++;
              dislike_flag = false;
            }
            break;
        }
        console.log('the button ' + button + ' was pressed');

        document.getElementById('counter').innerHTML = counter;

      }

      // like


      like.addEventListener('click', function onClick() {

        like.style.backgroundColor = '#302d2a';

        const likeIcon = document.getElementById('thumbsU');

        thumbsU.style.color = '#eb5e28';

      });

      // dislike


      dislike.addEventListener('click', function onClick() {

        dislike.style.backgroundColor = '#302d2a';

        const dislikeIcon = document.getElementById('thumbsD');

        thumbsD.style.color = '#eb5e28';

      });
    </script>

    <!-- area de informações -->

    <div class="DivInformations">
      <!-- titulo -->
      <h7><?= $item["title"] ?></h7>
      <!-- autor -->
      <?php
      $authors = [];
      while ($author = $item["authors"]->fetch_assoc()) {
        $name = $author["name"];
        $link = "$name";
        array_push($authors, $link);
      }

      $authors = implode(", ", $authors);


      echo ("<h8>$authors</h8>");
      ?>
      <br>
      <!-- keywords -->
      <h13>Categorias: </h13>
      <?php
      while ($tag = $item["tags"]->fetch_assoc()) {
        $name = $tag["name"];
        $link = "<h8>$name, </h8>";
        echo ($link);
      }
      ?>
      <br>
      <!-- sinópse -->
      <h14><?= $item["synthesis"] ?></h14>
      <br><br><br>

      <!-- quantidades/status -->
      <?php

      $buttons = "";

      if ($item['isDigital']) {
        $url = $item["url"];
        $buttons = "
        <button class=\"EbookBaixar\">
          <i class=\"fa-solid fa-download fa-2x\"></i>
          <h15>Leia agora</h15>
        </button>";
      } else {
        if ($_SESSION['permissionLevel'] == 'admin') {
          if ($item['inventory'] > 0) {

            $qntd = $item['inventory'];

            $buttons = "
            <h13>Status: </h13>
            <h8>Disponivel</h8>
            <br>
            <h13>Quantidade: </h13>
            <h8> $qntd </h8>
            <form method=\"post\">
            <input name=\"qntd\" id=\"qntd\" class=\"alterQntd\" value=\"$qntd\">
            <button class=\"butCadastroLivro\" type=\"submit\">
              <h10>Atualizar</h10>
            </button>
            </form>";
          } else {
            $buttons = "
          <h13>Status: </h13>
          <h8>Indisponível</h8>
          <form method=\"post\">
          <input name=\"qntd\" id=\"qntd\" class=\"alterQntd\" value=\"0\">
          <button class=\"butCadastroLivro\" type=\"submit\">
            <h2>Atualizar</h2>
          </button>
          </form>
          <br>";
          }
        } else {
          if ($item['inventory'] >= 1) {

            $qntd = $item['inventory'];

            $buttons = "
            <h13>Status: </h13>
            <h8>Disponivel</h8>
            <br>
            <h13>Quantidade: </h13>
            <h8> $qntd </h8>
            ";
          } else {
            $buttons = "
          <h13>Status: </h13>
          <h8>Indisponível</h8>
          <br>";
          }
        }
      }

      echo ($buttons);

      ?>

    </div>
  </div>

  <br>
  <br>

  <!-- comentários -->
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  <h16>Comentários</h16>



  <div class="coms" id="respond">

    <form action="post_comment.php" method="post" id="commentform">

      <label for="comment_author" class="required">
        <h14>Seu nome</h14>
      </label>
      <br><br>
      <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">

      <br><br>

      <label for="email" class="required">
        <h14>Seu Email</h14>
      </label>
      <br><br>

      <input type="email" name="email" id="email" value="" tabindex="2" required="required">

      <br><br>


      <label for="comment" class="required">
        <h14>Sua mensagem</h14>
      </label>
      <br><br>
      <textarea name="comment" id="comment" rows="10" tabindex="4" required="required"></textarea>

      <br><br><br> <br><br><br> <br><br><br>

      <!-- comment_post_ID value hard-coded as 1  -->
      <input type="hidden" name="comment_post_ID" value="1" id="comment_post_ID" />
      <input class="submitCom" name="submit" type="submit" value="Submit comment" />

    </form>

  </div>

</body>

</html>