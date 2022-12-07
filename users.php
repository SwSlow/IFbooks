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

<title>Usuários</title>

<body>

  <script>
    function onlyOne(checkbox) {
      var checkboxes = document.getElementsByName('check')
      checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
      })
    }
  </script>


  <button class="voltar" onclick="window.location.href = './index.php'">
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
          <h13>Nome De Usuário<h13>
        </td>
        <td>
          <h13>Matrícula/CIAP<h13>
        </td>
        <td>
          <h13>Permissão<h13>
        </td>
      </tr>

      <?php
      include('./db/config.php');

      $sqlCode = "SELECT * FROM user ORDER BY userID DESC LIMIT 18";
      $sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

      while ($item = $sql_query->fetch_assoc()) {
        $id = $item["userID"];
        $name = $item["name"];
        $registration = $item["registration"];

        if ($item["permissionLevel"] == 'admin') {
          $permission = 'Administrador';
        };
        if ($item["permissionLevel"] == 'employee') {
          $permission = 'Funcionário';
        };
        if ($item["permissionLevel"] == 'moderator') {
          $permission = 'Moderador';
        };
        if ($item["permissionLevel"] == 'reader') {
          $permission = 'Leitor';
        };

        $itemArticle = "
        <tr>
        <td><h14>$id<h14></td>
        <td><h14>$name<h14></td>
        <td><h14>$registration<h14></td>
        <td><h14>$permission<h14></td>
        <td><a href=\"./user/?user=$id\"><button class=\"Confirm\"><h15>Editar</h15></button></a></td>

  
        </tr>";

        echo ($itemArticle);
      };
      ?>

    </table>

  </div>

</body>



</html>