<?php
    session_start();
    echo "Usuario: ". $_SESSION['usuarioNome'];    
?>
<br>
<p>Você é um ADMINISTRADOR</p>
<button onclick="sairAlert()">Sair</button>
<script>
function sairAlert() {
  location.href="../sair.php";
  alert("Deslogado com sucesso!")
}
</script>