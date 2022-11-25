<?php
 if(isset($_FILES['cover']))
 {
    $ext = strtolower(substr($_FILES['cover']['name'],-4)); //Pegando extensão do arquivo
    $new_name = uniqid() . $ext; //Definindo um novo nome para o arquivo
    $dir = '../db/covers/'; //Diretório para uploads 
    move_uploaded_file($_FILES['cover']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
 } 
?>