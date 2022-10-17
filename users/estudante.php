<?php
    session_start();
    echo "Usuário: ".$_SESSION['usuarioNome'], "<br>";   
    echo "Matrícula: ".$_SESSION['num_matricula'], "<br>"; 
    echo "Email: ".$_SESSION['usuarioEmail'], "<br>"; 
    echo "Curso: ".$_SESSION['curso'], "<br>"; 
    echo "Biblioteca: ".$_SESSION['bibioteca'], "<br>";
    echo "Situação: ".$_SESSION['situação'], "<br>"; 

?>
<br>
<p>Você é um ALUNO</p>
<button onclick="sairAlert()">Sair</button>
<script>
function sairAlert() {
  location.href="../sair.php";
  alert("Deslogado com sucesso!")
}
</script>