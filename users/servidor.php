<?php
session_start();

echo "Id: " . $_SESSION['idUsuario'], "<br>";
echo "Usuário: " . $_SESSION['nomeUsuario'], "<br>";
echo "Matrícula: " . $_SESSION['num_matricula'], "<br>";
echo "Email: " . $_SESSION['usuarioEmail'], "<br>";
echo "Curso: " . $_SESSION['curso'], "<br>";
echo "Biblioteca: " . $_SESSION['bibioteca'], "<br>";
echo "Situação: " . $_SESSION['situação'], "<br>";


//verifica se há algum usuário logado 
if (!isset($_SESSION["idUsuario"]) || !isset($_SESSION["nomeUsuario"])) {
  // Usuário não logado! Redireciona para a página de login
  header("Location: ../index.php");
  // Notifica o usuário que não há nenhuma sessão iniciada
  $_SESSION['loginErro'] = "<script>alert('Faça login para acessar a página!');</script>";
  exit;
}

if ($_SESSION["usuarioNiveisAcessoId"] != 1) {
  $_SESSION['userErro'] = "<script>alert('Acesso negado!');</script>";
  header("location: estudante.php");
  exit;
}

if (isset($_SESSION['userErro'])) {
  echo $_SESSION['userErro'];
  unset($_SESSION['userErro']);
}

?>
<br>
<p>Você é um SERVIDOR</p>
<button onclick="sairAlert()">Sair</button>
<script>
  function sairAlert() {
    location.href = "../sair.php";
    alert("Deslogado com sucesso!")
  }
</script>