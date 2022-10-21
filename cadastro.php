<?php
session_start();
//Recuperando o valor da variável global, os erro de login.
if (isset($_SESSION['cadErro'])) {
  echo $_SESSION['cadErro'];
  unset($_SESSION['cadErro']);
} ?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/style.css" />

</head>
<meta charset="utf-8">

<title>| Cadastro</title>

<body>
  <img class="fundos" src="imagens/fundo.png">
  <img class="logoIff" src="imagens/IFF.png">

  <!-- painel login -->

  <div class="div_cadastro">

    <div class="form">
      <form method="post" action="cadastroConfig.php">
        <h1>Nome completo</h1>
        <input type="text" name="nome" id="nome" placeholder="Nome completo" required>

        <h1>Número matrícula</h1>
        <input type="number" name="num_matricula" id="num_matricula" placeholder="Matrícula" required>

        <h1>CPF</h1>
        <input type="number" name="cpf" id="cpf" placeholder="CPF" required>

        <h1>Email Institucional</h1>
        <input type="email" name="email" id="email" placeholder="Email" required>

        <h1>Senha</h1>
        <input type="password" name="senha" id="senha" placeholder="Senha" required>

        <h1 class="positionCurso">Campus</h1>

        <div class="cursos">
          <select required name="curso" id="curso">
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

        <div class="BibVinc" id="biblioteca">
          <select name="biblioteca" id="biblioteca" required>
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

        <h1 class="positionSituacao">Atual</h1>

        <div class="formSituacao" id="situacao" required>
          <input class="raioUser" type="radio" id="afastado" name="situacao" value="afastado">
          <label class="labelUser" for="afastado">Afastado</label>
          <input class="raioUser1" type="radio" id="regular" name="situacao" value="regular">
          <label class="labelUser1" for="regular">Regular</label>
        </div>

        <h1 class="positionCampus">Categoria de usuário</h1>

        <div class="formUser" id="user" required>
          <input class="raioUser" type="radio" id="servidor" name="tipo_acesso" value="1">
          <label class="labelUser" for="servidor">Servidor</label>
          <input class="raioUser1" type="radio" id="estudante" name="tipo_acesso" value="2">
          <label class="labelUser1" for="estudante">Estudante</label>
        </div>
        <br><br>

        <button class="butCadastro" type="submit">
          <h2>Cadastrar</h2>
        </button>
      </form>



    </div>



  </div>

  <!-- botões -->

  <button class="entrar2" onclick="window.location.href = 'index.php'">
    <h2>Entrar</h2>
  </button>
  <button class="cadastrar2">
    <h2>Cadastrar</h2>
  </button>

</body>

<footer>
  <img src="imagens/ondaas.PNG" width="100%" height="50%">
</footer>

</html>