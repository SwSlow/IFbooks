<?php
session_start();
include('../db/config.php');
include('../auth/protect.php');

$id = $mysqli->real_escape_string($_GET['user']);

$sqlCode = "DELETE FROM user WHERE userID=$id";
$sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

header('Location: ./index.php');
exit;
?>
