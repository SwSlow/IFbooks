<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css"/>

</head>
<meta charset="utf-8"> 

<title>Cadastro</title>    

<body>
<img class="fundos" src="imagens/fundo.png">
<img class="logoIff" src="imagens/IFF.png">


<!-- painel login -->

<div class="div_cadastro">


<!-- <img class="logo" src="imagens/Vector.png"> -->

<h1>Nome completo</h1>

<input type="text" placeholder="nome">

<h1>Numero de Matrícula</h1>

<input type="text" placeholder="Num_matrícula">

<h1>CPF</h1>

<input type="number" placeholder="CPF">

<h1>Email Institucional</h1>

<input type="email" placeholder="Email">

<h1 class="positionCurso">Curso</h1>

<div class="cursos">
<select name="Curso">
<option selected disabled class="opNon">Indique seu curso</option>
  <option value="valor1">Valor 1</option>
  <option value="valor2" selected>Valor 2</option>
  <option value="valor3">Valor 3</option>
</select>
</div>

<h1 class="positionCampus">Campus</h1>

<div class="BibVinc">
<select name="Biblioteca">
<option selected disabled class="opNon">Indique seu campus</option>
  <option value="valor1">Valor 1</option>
  <option value="valor2" selected>Valor 2</option>
  <option value="valor3">Valor 3</option>
</select>
</div>

<h1 class="positionSituacao">Categoria de usuário</h1>


<div class="formSituacao">

<input class="raioUser" type="radio" id="afastado" name="tipo_user" value="afastado">
<label class="labelUser" for="afastado">Afastado</label>
<input class="raioUser1" type="radio" id="regular" name="tipo_user" value="regular">
<label class="labelUser1" for="regular">Regular</label>
</div>

<h1 class="positionUserC">Categoria de usuário</h1>

<div class="formUser">

<input class="raioUser" type="radio" id="servidor" name="tipo_user" value="servidor">
<label class="labelUser" for="servidor">Servidor</label>
<input class="raioUser1" type="radio" id="estudante" name="tipo_user" value="estudante">
<label class="labelUser1" for="estudante">Estudante</label>
</div>

</div>



</div>

<!-- botões -->

<button class="entrar2" onclick="window.location.href = 'index.php'"><h2>Entrar</h2></button> 
<button class="cadastrar2"><h2>Cadastrar</h2></button>

<?php


?>


</body>
 
<footer>
<img src="imagens/ondaas.PNG"  width="100%" height="50%">
</footer>
 
</html>