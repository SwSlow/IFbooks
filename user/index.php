<?php
session_start();
include('../db/config.php');
include('../auth/protect.php');

if ($_SESSION['permissionLevel'] != "admin") {
    header("Location: ../index.php");
    $_SESSION['loginErro'] = "<script>alert('Você não ter permissão para acessar está página!');</script>";
    exit;
}

$id = $mysqli->real_escape_string($_GET['user']);

$sql_code = "SELECT * FROM user WHERE userID=$id";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$item = $sql_query->fetch_assoc();
$password = $item['password'];
$password = md5($password);

global $item;
?>
<!DOCTYPE html>
<html>


<head>
    <link rel="stylesheet" href="../css/Style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>
<meta charset="utf-8">

<title>Página do Usuário</title>

<body>

    <label class="labelForm" for="div_alter">Seu perfil</label>
    <div class="div_alter">

        <div class="form">
            <form method="post" action="../auth/atualizarCadastro.php">
                <input id="id" name="id" value="<?php echo $id ?>" type="hidden">

                <h1>Nome completo</h1>
                <input type="text" name="name" id="name" placeholder="Seu nome" value="<?php echo $item['name'] ?>" required>

                <h1>Matrícula/CIAP</h1>
                <input type="text" minlength="7" maxlength="10" name="registration" id="registration" placeholder="0123456789" value="<?php echo $item['registration'] ?>" required>

                <h1>CPF</h1>
                <input type="text" pattern="([0-9]{2}[\.]?[0-9]{3}[\.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2})|([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})" name="cpf" id="cpf" placeholder="000.000.000-00" value="<?php echo $item['cpf'] ?>" required>

                <h1>Email Institucional</h1>
                <input type="email" name="email" id="email" placeholder="seuemail@aluno.iffar.edu.br" pattern=".*@(?:iffar|aluno\.iffar|iffarroupilha)\.edu\.br" value="<?php echo $item['email'] ?>">

                <h1>Senha</h1>
                <input type="password" name="password" id="password" placeholder="********" value="<?php $password ?>">

                <h1 class="positionPermission">Permissão</h1>
                
                <div class="permissionVinc" id="permission">
                    <select name="permission" id="permission" required>
                        <option selected disabled class="opNon">Indique a permissão</option>
                        <option value="admin">Administrador</option>
                        <option value="employee">Funcionário</option>
                        <option value="moderator">Moderador</option>
                        <option value="reader">Leitor</option>
                    </select>
                </div>
                
                <h1 class="positionSituacao2">Situação</h1>

                <div class="formSituacao2" id="situation">
                    <input class="raioUser1" type="radio" id="regular" name="situation" value="1">
                    <label class="labelUser1" for="regular">Regular</label>
                    <input class="raioUser" type="radio" id="afastado" name="situation" value="2">
                    <label class="labelUser" for="afastado">Afastado</label>
                </div>

                <button class="butAlter" type="submit">
                    <h2>Atualizar Informações</h2>
                </button>
        </div>
        <p class="erro_cadastro">
            <?php
            //Recuperando o valor da variável global, os erro de login.
            if (isset($_SESSION['loginErro'])) {
                echo $_SESSION['loginErro'];
                unset($_SESSION['loginErro']);
            } ?>

            <?php
            //Recuperando o valor da variável global, deslogado com sucesso.
            if (isset($_SESSION['logindeslogado'])) {
                unset($_SESSION['logindeslogado']);
            }
            ?>
        </p>
        </form>
    </div>

    <!-- botões -->


    <button class="cadastrar2" onclick="window.location.href = 'index.php'">
        <h2>Voltar</h2>
    </button>


</body>

</html>