<?php
session_start();
include('../db/config.php');
include('../auth/protect.php');

$id = $mysqli->real_escape_string($_GET['item']);

$sqlCode = "DELETE FROM itemauthor WHERE ItemID=$id";
$sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

$sqlCode = "DELETE FROM itemtag WHERE ItemID=$id";
$sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

$sqlCode = "DELETE FROM itemtranslator WHERE ItemID=$id";
$sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

$sqlCode = "DELETE FROM item WHERE ItemID=$id";
$sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

header('Location: ../controlPanel.php');
?>
