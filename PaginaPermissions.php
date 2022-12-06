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
        <td><h13>Nome De Usuário<h13></td>
        <td><h13>Matrícula/CIAP<h13></td>
        <td><h13>Permissão<h13></td>
    </tr>
    <tr>
        <td><h14>Ted<h14></td>
        <td><h14>22456378<h14></td>
        <td>

        <form method="post" enctype="multipart/form-data" action="auth/cadLivroConfig.php">

        <input  class="box" type="checkbox" name="check" onclick="onlyOne(this)">
        <label for="check"><h14>Moderador<h14></label>
        <input  class="box" type="checkbox" name="check" onclick="onlyOne(this)">
        <label for="check"><h14>Funcionário<h14></label> 

        </form> <button class="Confirm">
        <h15>Confirmar</h15>
      </button>

        </td>
    </tr>
    <tr>
        <td><h14>Ralf<h14></td>
        <td><h14>20203049<h14></td>
        <td>

        <form method="post" enctype="multipart/form-data" action="auth/cadLivroConfig.php">

        <input  class="box" type="checkbox" name="check" onclick="onlyOne(this)">
        <label for="check"><h14>Moderador<h14></label>
        <input  class="box" type="checkbox" name="check" onclick="onlyOne(this)">
        <label for="check"><h14>Funcionário<h14></label>

        </form>  <button class="Confirm">
        <h15>Confirmar</h15>
      </button>

        </td>
    </tr>
</table>
 
  </div>

</body>



</html>