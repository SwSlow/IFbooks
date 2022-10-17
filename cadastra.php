<html>
<?php
include_once("conexao.php");

$nome = $_POST['nome'];
$matricula = $_POST['num_matricula'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$curso = $_POST['curso'];
$biblioteca = $_POST['biblioteca'];
$situacao = $_POST['situacao'];
$acesso = $_POST['acesso'];
$user = $_POST['tipo_user'];
$senha = $_POST['senha'];

?>


<?php echo $nome; ?> <br>
<?php echo $matricula; ?><br>
<?php echo $cpf; ?><br>
<?php echo $email; ?><br>
<?php echo $curso; ?><br>
<?php echo $biblioteca; ?><br>
<?php echo $situacao; ?><br>
<?php echo $acesso; ?><br>
<?php echo $user; ?><br>
<?php echo $senha; ?><br><br>

<?php
$result = "INSERT INTO usuarios (nome, num_matricula, cpf, email, curso, bibioteca, situação, niveis_acesso_id, user, senha) 
                       VALUES ('$nome', '$matricula', '$cpf', '$email', '$curso, '$biblioteca', '$situacao', '$acesso', '$user', '$senha')";

$insert = mysqli_query($conn, $result) or die(" O sistema não foi capaz de realizar a operação!");

?>

</html>