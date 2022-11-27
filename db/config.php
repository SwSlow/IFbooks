<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "IFbooks";  

    //Criar a conexao
    $mysqli = new mysqli($host, $user, $password, $database);
    
    if(!$mysqli){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        // echo "Conexao realizada com sucesso";
    }      
?> 
