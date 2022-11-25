    <?php
    session_start(); 
        //Incluindo a conexão com banco de dados   
    include_once("config.php");    
    //O campo usuário e senha preenchido entra no if para validar
    if((isset($_POST['registration'])) && (isset($_POST['password']))){
        $user = mysqli_real_escape_string($conn, $_POST['registration']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = md5($password);
            
        //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
        $result_user = "SELECT * FROM user WHERE registration = '$user' && password = '$password' LIMIT 1";
        $result_user = mysqli_query($conn, $result_user);
        $result = mysqli_fetch_assoc($result_user);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($result)){
            $_SESSION['userID'] = $result['userID'];
            $_SESSION['type'] = $result['type'];
            $_SESSION['permissionLevel'] = $result['permissionLevel'];

            header("Location: ../index.php");

            //redireciona o usuario para a página de login
            }else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: ../login.php");
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha inválido";
        header("Location: login.php");
    }
