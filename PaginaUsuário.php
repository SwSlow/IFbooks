<?php
session_start();
include('./db/config.php');
include('./auth/protect.php');



?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./css/Style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>
<meta charset="utf-8">

<title>Página do Usuário</title>

<body>

<label class="labelForm" for="div_cadastro">Seu perfil</label>
<div class="div_cadastro">

    <div class="form">
      <form method="post" action="auth/cadastroConfig.php"> 
        <h1>Nome completo</h1>
        <input type="text" name="name" id="name" placeholder="Seu nome" required>

        <h1>Matrícula/CIAP</h1>
        <input type="text" minlength="7" maxlength="10" name="registration" id="registration" placeholder="0123456789" required>

        <h1>CPF</h1>
        <input type="text" pattern="([0-9]{2}[\.]?[0-9]{3}[\.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2})|([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})" name="cpf" id="cpf" placeholder="000.000.000-00" required>

        <h1>Email Institucional</h1>
        <input type="email" name="email" id="email" placeholder="seuemail@aluno.iffar.edu.br" pattern=".*@(?:iffar|aluno\.iffar|iffarroupilha)\.edu\.br">

        <h1>Senha</h1>
        <input type="password" name="password" id="password" placeholder="********">

        <h1 class="positionCurso">Curso</h1>

        <div class="cursos">
          <select name="course" id="course">
            <option selected disabled class="opNon">Indique seu curso</option>
            <option value="Técnico em Agropecuária">Técnico em Agropecuária</option>
            <option value="Técnico em Informática">Técnico em Informática</option>
            <option value="Técnico em Administração">Técnico em Administração</option>
            <option value="Graduação em Administração">Graduação em Administração</option>
            <option value="Graduação em Medicina Veterinária">Graduação em Medicina Veterinária</option>
            <option value="Graduação em Ciências da Computação">Graduação em Ciências da Computação</option>
            <option value="Licenciatura em Matemática">Licenciatura em Matemática</option>
          </select>
        </div>

        <h1 class="positionUserC">Curso</h1>

        <div class="BibVinc" id="campus">
          <select name="campus" id="campus" required>
            <option selected disabled class="opNon">Indique seu campus</option>
            <option value="Campus Frederico Westphalen">Campus Frederico Westphalen</option>
            <option value="Campus Alegrete">Campus Alegrete</option>
            <option value="Reitoria(Santa Maria)">Reitoria(Santa Maria)</option>
            <option value="Campus Jaguari">Campus Jaguari</option>
            <option value="Campus Júlio de Castilhos">Campus Júlio de Castilhos</option>
            <option value="Campus Santa Rosa">Campus Santa Rosa</option>
            <option value="Campus Jaguari">Campus Jaguari</option>
            <option value="Campus Júlio de Castilhos">Campus Júlio de Castilhos</option>
            <option value="Campus Panambi">Campus Panambi</option>
            <option value="Campus Santa Rosa">Campus Santa Rosa</option>
          </select>
        </div>

        <h1 class="positionSituacao">situação</h1>

        <div class="formSituacao" id="situation">
        <input class="raioUser1" type="radio" id="regular" name="situation" value="1">
          <label class="labelUser1" for="regular">Regular</label>
          <input class="raioUser" type="radio" id="afastado" name="situation" value="2">
          <label class="labelUser" for="afastado">Afastado</label>
        </div>

        <h1 class="positionCampus">Categoria de usuário</h1>

        <div class="formUser" id="type">
          <input class="raioUser" type="radio" id="servidor" name="type" value="1">
          <label class="labelUser" for="servidor">Servidor</label>
          <input class="raioUser1" type="radio" id="estudante" name="type" value="2">
          <label class="labelUser1" for="estudante">Estudante</label>
        </div>
        <br><br>

        <button class="butCadastro" type="submit">
          <h2>Atualizar Informações</h2>
        </button>
    </div>
    <p class="erro_cadastro">
      <?php
      //Recuperando o valor da variável global, os erro de login.
      if (isset($_SESSION['cadErro'])) {
        echo $_SESSION['cadErro'];
        unset($_SESSION['cadErro']);
      } ?>
    </p>
    </form>
  </div>

  <!-- botões -->

  
  <button class="cadastrar2"  onclick="window.location.href = 'index.php'">
    <h2>Voltar</h2>
  </button>
  

</body>

</html>