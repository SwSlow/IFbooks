<?php
session_start();
include('./db/config.php');
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/style.css" />
</head>
<meta charset="utf-8">

<title>| Cadastro</title>

<body>

  <button class="voltar" onclick="window.location.href = 'index.php'">
    <h2>Voltar</h2>
  </button>

  <img class="logoIff" src="imagens/IFF.png">

  <!-- painel login -->

  <div class="CadastroLivro">

    <form method="post" enctype="multipart/form-data" action="auth/cadLivroConfig.php">

      <h8>Cadastro de Acervo</h8>

      <br>

      <h1>Título da Obra</h1>
      <input type="text" maxlength="300" name="title" id="title" placeholder="Nome da Obra" required>

      <h1>Subtítulo da Obra</h1>
      <input type="text" maxlength="300" name="subtitle" id="subtitle" placeholder="Subtítulo da Obra">

      <h1>Autor</h1>
      <input type="text" maxlength="300" name="authors" id="authors" placeholder="Nome do autor ou autores" required>

      <h1>Tradutores</h1>
      <input type="text" maxlength="300" name="translators" id="translators" placeholder="Nome do autor ou autores" required>

      <h1>Tipo acervo</h1>
      <div class="TipoAcervo" id="Acervo">
        <select name="collection" id="collection" required>
          <option value="1" selected="Livro">Livro</option>
          <option value="2">Ebook</option>
          <option value="3">Revista</option>
        </select>
      </div>

      <br><br>

      <h1>ISBN</h1>
      <input type="text" maxlength="300" name="isbn" id="isbn" placeholder="ISBN" required>

      <h1>Editora</h1>
      <input type="text" maxlength="100" name="publisher" id="publisher" placeholder="Editora da Obra" required>

      <h1>Edição</h1>
      <input type="text" maxlength="50" name="edition" id="edition" placeholder="Edição da Obra" required>

      <h1>Ano de Publicação</h1>
      <input type="number" name="year" id="year" required>

      <h1>Local</h1>
      <input type="text" name="place" id="place" placeholder="São Paulo, Brasil" required>

      <h1>Síntese</h1>
      <textarea class="ResInput" type="text" maxlength="300" name="synthesis" id="synthesis" placeholder="Resumo da Obra" required spellcheck="true"></textarea>

      <h1>Tags</h1>
      <input type="text" maxlength="300" name="tags" id="tags" placeholder="Keywords">

      <br>

      <h1>Capa</h1>
      <div>
        <input type="file" name="cover" id="cover" class="hidden" required  >
        <label for="cover" class="">Escolher arquivo</label>
      </div>

      <h1>Biblioteca Pertencente</h1>

      <br>
      <div class="TipoAcervo" id="Biblioteca Pertencente">
        <select name="library" id="library" required>
          <option selected disabled class="opNon">Campus pertencente</option>
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

      <h1>Seção</h1>
      <input type="text" maxlength="50" name="section" id="section" placeholder="Localização da Obra" required>

      <h1>Categoria</h1>
      <div>
        <input type="radio" name="isDigital" id="digital" value="true" checked>
        <label for="digital">Obra digital</label>
        <input type="radio" name="isDigital" id="physical" value="false">
        <label for="physical">Obra Física</label>
      </div>

      <h1>URL</h1>
      <textarea class="ResInput" type="url" maxlength="300" name="url" id="url" placeholder="Link do Livro Eletrônico"></textarea>

      <h1>Estoque</h1>
      <input type="number" name="inventory" id="inventory" min="0" placeholder="2" required>

      <h1>Nº do Livro</h1>
      <input type="text" maxlength="100" name="number" id="number" placeholder="Numero do Livro" required>

      <h1>Classificação</h1>
      <input type="number" maxlength="300" name="classification" id="classification" placeholder="Numero da Etiqueta do Livro" required>

      <h1>Descrição Física</h1>
      <input type="text" maxlength="300" name="physicalDescription" id="physicalDescription" placeholder="Descrição Física" required>

      <br> <br>

      <button class="butCadastroLivro" type="submit">
        <h2>Cadastrar Acervo</h2>
      </button>

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




</body>



</html>