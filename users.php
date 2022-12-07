<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/style.css" />
</head>
<meta charset="utf-8">

<title>Permissões</title>

<body>

  <script>
    function onlyOne(checkbox) {
      var checkboxes = document.getElementsByName('check')
      checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
      })
    }
  </script>


  <button class="voltar" onclick="window.location.href = 'index.php'">
    <h2>Voltar</h2>
  </button>

  <img class="logoIff" src="imagens/IFF.png">

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

      while ($user = $sql_query->fetch_assoc()) {
        $name = $user["name"];
        $registration = $user["registration"];
        $id = $user["userID"];

        if ($user['permissionLevel'] == 'admin') {
          $permission = "Administrador";
        }
        if ($user['permissionLevel'] == 'employee') {
          $permission = "Funcionário";
        }
        if ($user['permissionLevel'] == 'moderator') {
          $permission = "Moderador";
        }
        if ($user['permissionLevel'] == 'reader') {
          $permission = "Leitor";
        }
        
        $users = "      
        <tr>
        <td>
        <h14>$id<h14>
      </td>
        <td>
          <h14>$name<h14>
        </td>
        <td>
          <h14>$registration<h14>
        </td>
        <td>
          <h14>$permission<h14>
        </td>
      </tr>";
      }
      echo ($users)
      ?>

    </table>

  </div>

</body>



</html>