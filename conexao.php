<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "users";    
    //Criar a conexao
    $con = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if(!$con){
        die("Falha na conexao: " . mysqli_connect_error());
    }else{
        //echo "Conexao realizada com sucesso";
    }      
?> 