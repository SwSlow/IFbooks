<?php
  session_start()
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

    <form method="post" action="auth/cadLivroConfig.php">

      <h8>Cadastro de Acervo</h8>

      <br>

      <div class="TipoAcervo" id="Acervo">
        <select name="Tipo de Acervo" id="acervo" required>
          <option selected disabled class="opNon">Tipo de Acervo</option>
          <option value="Livro">Livro</option>
          <option value="Ebook">Ebook</option>
          <option value="Revista">Revista</option>

        </select>
      </div>



      <br><br>

      <h1>Biblioteca Pertencente</h1>

      <div class="TipoAcervo" id="Biblioteca Pertencente">
        <select name="campus" id="campus" required>
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

      <br><br>

      <h1>Título da Obra</h1>
      <input type="text" maxlength="300" name="Titulo" id="title" placeholder="Nome da Obra" required>

      <h1>Subtítulo da Obra</h1>
      <input type="text" maxlength="300" name="Subitulo" id="subtitle" placeholder="Subtítulo da Obra" required>

      <h1>Edição</h1>
      <input type="text" maxlength="50" name="Edicao" id="edition" placeholder="Edição da Obra" required>

      <h1>Autor</h1>
      <input type="text" maxlength="300" name="Autor" id="autor" placeholder="Nome do autor ou autores" required>

      <h1>Editora</h1>
      <input type="text" maxlength="100" name="Edicao" id="editora" placeholder="Editora da Obra" required>

      <h1>Ano de Publicação</h1>
      <input type="date" name="Ano" id="ano" required>

      <h1>Tradutor</h1>
      <input type="text" maxlength="300" name="Tradutor" id="tradutor" placeholder="Nome do autor ou autores" required>

      <h1>Descrição Física</h1>
      <input type="text" maxlength="300" name="DescFisica" id="descFisica" placeholder="Descrição Física" required>

      <h1>Classificação</h1>
      <input type="number" maxlength="300" name="Class" id="classificacao" placeholder="Numero da Etiqueta do Livro" required>

      <h1>Palavras Chave</h1>
      <input type="text" maxlength="300" name="Keyword" id="palavrasChave" placeholder="Keywords">

      <h1>Lugar</h1>
      <input type="text" maxlength="50" name="Edicao" id="lugar" placeholder="Localização da Obra" required>

      <h1>Nº do Livro</h1>
      <input type="text" maxlength="100" name="Edicao" id="numLivro" placeholder="Numero do Livro" required>

      <h1>Número de série ISBN</h1>
      <input type="text" maxlength="300" name="ISBN" id="ISBN" placeholder="ISBN" required>

      <h1>Capa<h1>

          <label for="file-upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload"></i> Insira uma Imagem
          </label>
          <input id="file-upload" type="file" name="cover" accept="image/*">

          <h1>Livro Eletrônico</h1>
          <textarea class="ResInput" type="text" maxlength="300" name="Resumo" id="Resumo" placeholder="Link do Livro Eletrônico"></textarea>

          <h1>Resumo</h1>
          <textarea class="ResInput" type="text" maxlength="300" name="Resumo" id="Resumo" placeholder="Resumo da Obra" required spellcheck="true"></textarea>

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