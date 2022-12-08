<?php
session_start();
include('./auth/protect.php');

if ($_SESSION['permissionLevel'] != "admin") {
  header("Location: ../index.php");
  $_SESSION['loginErro'] = "<script>alert('Você não ter permissão para acessar está página!');</script>";
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./css/Style.css" />
</head>
<meta charset="utf-8">

<title>Acervo</title>

<body>

  <button class="voltar" onclick="window.location.href = './controlPanel.php'">
    <h2>Voltar</h2>
  </button>

  <img class="logoIff" src="./imagens/IFF.png">

  <div class="UserPermissions">

    <table>
      <tr>
        <td>
          <h13>ID<h13>
        </td>
        <td>
          <h13>Nome do Livro<h13>
        </td>
        <td>
          <h13>Seção<h13>
        </td>
        <td>
          <h13>ISBN<h13>
        </td>
      </tr>

      <?php
      include('./db/config.php');

      $sqlCode = "SELECT * FROM item ORDER BY itemID DESC LIMIT 18";
      $sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

      while ($item = $sql_query->fetch_assoc()) {
        $id = $item["itemID"];
        $name = $item["title"];
        $isbn = $item["isbn"];
        if($item['isDigital'] == 0){
          $section = $item["section"];
        }else{
          $url = $item["url"];
          $section ="<a href=\"\">LINK</a>";
        };

        $itemArticle = "
        <tr>
        <td><h14>$id<h14></td>
        <td><h14>$name<h14></td>
        <td><h14>$section<h14></td>
        <td><h14>$isbn<h14></td>
        <td><a href=\"./user/?user=$id\"><button class=\"Confirm2\"><h15>Editar</h15></button></a></td>
        <td><a href=\"./deleteBook/?item=$id\"><button class=\"butDelete2\"><h15>Deletar</h15></button></a></td>
        </tr>";

        echo ($itemArticle);
      };
      ?>

    </table>

  </div>
  <button onclick="window.location.href = './CadastroLivro.php'" class="addUserPanel">
    <img class = "imgPlus" src="./imagens/plus.png" alt="">
  </button>
</body>



</html>