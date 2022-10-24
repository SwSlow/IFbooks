<?php

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