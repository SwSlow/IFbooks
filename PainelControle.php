<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/stylePrincipal.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>
<meta charset="utf-8">

<title>Painel de Controle</title>

<body>

<button class="voltar" onclick="window.location.href = 'index.php'">
        <h11>Voltar</h11>
    </button>

    <br><br><br>


  <div class="flex-parent-element">
    
  <div class="flex-child-element slide"><h10 class="usuarioLabel">Usuários</h10>  <img class="userImg" src="imagens/2pessoas.PNG"> 

  <h2>246 Usuários Cadastrados</h2>

</div>
  <div class="flex-child-element slide2"><h10 class="equipeLabel">Equipe</h10> <img class="equipeImg" src="imagens/equipe.PNG">
  <h3>2 Administradores</h3>
  <h3>1 Funcionário</h3>
  <h3>1 Bibliotecário</h3>

</div>
</div>

<br><br> <p style="margin:10px;"></p>

<div class="flex-parent-element">
  <a href="CadastroLivro.php" class="flex-child-element slide"><h10 class="acervoLabel">Acervo</h10> <img class="acervoImg" src="imagens/acervo.PNG"> 
  <h2>9786 Itens cadastrados</h2>
</a>
  <div class="flex-child-element slide2"><h10 class="avaliacoesLabel">Avaliações</h10> <img class="avaliacoesImg" src="imagens/coracao.PNG">
  <h2>453 Obras avaliadas</h2>
</div>
</div>

<br><br> <p style="margin:10px;"></p>

<div class="flex-parent-element">
  <div class="flex-child-element slide"><h10 class="comentariosLabel">Comentários</h10> <img class="comentariosImg" src="imagens/comentarios1.PNG"> 
  <h5 class="com">432 Comenatários aprovados</h5>
</div>
  <div class="flex-child-element slide2"><h10 class="forumLabel">Comentários</h10> <img class="forumImg" src="imagens/comentarios2.PNG"> 
  <h5>5 Comentários pendentes</h5>
</div>
</div>

    
</body>
</html>