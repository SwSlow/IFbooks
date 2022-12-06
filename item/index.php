<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
include("../db/config.php");

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

$sql_code = "SELECT COUNT(value), AVG(value) FROM evaluation WHERE itemID=$id";
$sql_query_evaluation = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item["evaluation"] = $sql_query_evaluation->fetch_assoc();

$userID = $_SESSION["userID"];
$sql_code = "SELECT * FROM itemUser WHERE itemID=$id AND userID=$userID;";
$sql_query_favorites = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item["isFavorite"] = $sql_query_favorites->num_rows == 1 ? true : false;


global $item;
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/StylePrincipal.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>
<meta charset="utf-8">

<title>Página do Livro</title>

<body>

<header class="nav-down">
    <img class="logoBib" src="../imagens/Logo.png">

    <div class="dropDownIMG">

      <img class="UserBib" src="../imagens/User.png">

      <div class="dropdownContent">
        <a onclick="sairAlert()">LogOff</a>
        <a onclick="controlPanel()">Painel de Controle</a>
      </div>
    </div>
    <div class="search-box">
      <input class="search-txt" type="text" name="" placeholder="Digite sua pesquisa">
      <a class="search-btn" href="#">
        <i class="fas fa-search"></i>
      </a>
    </div>

    <div class="dropdown">
      <button onclick="window.location.href = 'index.php'" class="dropbtn">Voltar</button>
     
    </div>
  </header>
  <br><br><br><br><br>

  <div class="DivLivro">

  <img class="cover" src="../imagens/example.PNG">

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

<h12>Rating do livro: </h12><h12 id="counter">0</h12>

<br>



<script>

let like_flag = false;
let dislike_flag = false;
function liked(event) {
  let counter = parseFloat(document.getElementById('counter').innerHTML);
  var button = event.target.innerText;
  switch(button){
    case 'like':
        if (like_flag==false && dislike_flag==false) {
        counter++;
        like_flag=true;
      } else if (like_flag==false && dislike_flag==true) {
        counter = counter + 1; //changed this to 1 instead of 2
        like_flag=true;
        dislike_flag=false;
      } else {
        counter--;
        like_flag=false;
      }
    break;
    case 'dislike':
        if (dislike_flag==false && like_flag==false) {
        counter--;
        dislike_flag=true;
      } else if (dislike_flag==false && like_flag==true) {
        counter = counter - 1; //changed this to 1 instead of 2
        dislike_flag=true;
        like_flag=false;
      } else {
        counter++;
        dislike_flag=false;
      }
    break;
  }
  console.log('the button '+button+' was pressed');
  
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
  <h7>Call of Cthulu</h7>
   <!-- autor -->
  <h8>H.P Lovecraft</h8>
  <br>
  <!-- keywords -->
  <h13>Categorias:  </h13><h8>Terror</h8>
  <br>
  <!-- sinópse -->
  <h14>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non augue non est rutrum vestibulum. Morbi nec dolor faucibus, laoreet justo et, lobortis leo. Phasellus tempor nisl ac sapien tempus scelerisque. Etiam fermentum volutpat viverra. Morbi molestie mattis leo. Nunc porta leo commodo sapien scelerisque elementum. Sed et sem tristique, volutpat lacus quis, ullamcorper libero. Cras sit amet bibendum neque. Pellentesque nisi elit, dignissim quis maximus non, sollicitudin nec risus. Nullam sed euismod nibh. Suspendisse varius elit eget metus tempus, porta viverra est interdum. </h14>
  <br><br><br>

  <!-- quantidades/status -->

  <h13>Status: </h13> <h8>Disponivel</h8> 
  <br>
  <h13>Quantidade: </h13><h8>3</h8>

  <button class="EbookBaixar">
  <i class="fa-solid fa-download fa-2x"></i> <h15>Baixar Ebook</h15>
  </button>

  </div>
  </div>

</body>
</html>