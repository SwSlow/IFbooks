<?php
<<<<<<< HEAD

define('BD_USER', 'root'); // USE O TEU USU�RIO DE BANCO DE DADOS
define('BD_PASS', 'usbw'); // USE A TUA SENHA DO BANCO DE DADOS
define('BD_NAME', 'users'); // USE O NOME DO TEU BANCO DE DADOS

mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);


// define('BD_USER', 'anatolibras'); // USE O TEU USU�RIO DE BANCO DE DADOS
// define('BD_PASS', 'Y6ds6r3'); // USE A TUA SENHA DO BANCO DE DADOS
// define('BD_NAME', 'anatolibras'); // USE O NOME DO TEU BANCO DE DADOS

// mysql_connect('localhost', BD_USER, BD_PASS);
// mysql_select_db(BD_NAME);



?>
=======
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "system";  

    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if(!$conn){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        // echo "Conexao realizada com sucesso";
    }      
?> 
>>>>>>> 196f3bb3b3b3f8a2b4fe494f7be591f5047606d2
