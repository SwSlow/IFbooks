<?php
    session_start();
    echo "Usuário: ". $_SESSION['usuarioNome'];    
?>
<br>
<p>Você é um ESTUDANTE</p>
<button onclick="sairAlert()">Sair</button>
<script>
function sairAlert() {
  location.href="../sair.php";
  alert("Deslogado com sucesso!")
}
</script>