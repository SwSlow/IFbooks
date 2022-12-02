<?php
include('../db/config.php');

if (!isset($_SESSION)) {
    session_start();
}

// if (!isset($_SESSION['id'])) {
//     if (!$_SESSION['permission'] == 'Administrador') {
//         header('Location: ../index.php');
//     }
// }

    $title = $mysqli->real_escape_string($_POST['title']);
    $subtitle = $mysqli->real_escape_string($_POST['subtitle']);
    $collection = $mysqli->real_escape_string($_POST['collection']);
    $isbn = $mysqli->real_escape_string($_POST['isbn']);
    $publisher = $mysqli->real_escape_string($_POST['publisher']);
    $year = $mysqli->real_escape_string($_POST['year']);
    $edition = $mysqli->real_escape_string($_POST['edition']);
    $place = $mysqli->real_escape_string($_POST['place']);
    $synthesis = $mysqli->real_escape_string($_POST['synthesis']);
    $tags = $mysqli->real_escape_string($_POST['tags']);
    $authors = $mysqli->real_escape_string($_POST['authors']);
    $translators = $mysqli->real_escape_string($_POST['translators']);

    $library = $mysqli->real_escape_string($_POST['library']);
    $section = $mysqli->real_escape_string($_POST['section']);
    $isDigital = $mysqli->real_escape_string($_POST['isDigital']);
    $number = $mysqli->real_escape_string($_POST['number']);
    $classification = $mysqli->real_escape_string($_POST['classification']);
    $physicalDescription = $mysqli->real_escape_string($_POST['physicalDescription']);

    // Handle Cover
    function saveCover()
    {
        $file = $_FILES['cover']['name'];
        $path = pathinfo($file);
        $ext = $path['extension'];
        $temp_name = $_FILES['cover']['tmp_name'];
        $permanent_name = uniqid() . "." . $ext;
        $store_at = getcwd() . '/../db/uploads/covers' . $permanent_name;
        move_uploaded_file($temp_name, $store_at);
        $cover = '../db/uploads/covers' . $permanent_name;
        return $cover;
    }

    $cover = saveCover();


    // Handle Collection
    if ($collection == '+') {
        $newCollection = $mysqli->real_escape_string($_POST['newCollection']);
        $cdu = $mysqli->real_escape_string($_POST['cdu']);

        $sqlCode = "INSERT INTO `collection` (`name`, `cdu`) VALUES ('$newCollection', '$cdu')";

        $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);
        $sql_query = $mysqli->query("SELECT LAST_INSERT_ID()") or die("Falha na execução do código SQL: " . $mysqli);
        $collection = $sql_query->fetch_assoc();
        $collection = $collection["LAST_INSERT_ID()"];
    }

    // Handle type
    $inventory = 0;
    $url = null;

    $isDigital = $isDigital == "true" ? true : false;

    if ($isDigital) {
        $url = $mysqli->real_escape_string($_POST['url']);
    } else {
        $inventory = $mysqli->real_escape_string($_POST['inventory']);
    }


    // Create Item
    $sqlCode = "INSERT INTO `item`(`isbn`, `title`, `subtitle`, `edition`, `publisher`, `year`, `section`, `synthesis`, `place`, `inventory`, `library`, `physicalDescription`, `classification`, `isDigital`, `url`, `number`, `cover`, `collectionID`) VALUES ('$isbn','$title','$subtitle','$edition','$publisher','$year','$section','$synthesis','$place','$inventory','$library','$physicalDescription','$classification','$isDigital','$url','$number','$cover','$collection')";

    $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);
    $sql_query = $mysqli->query("SELECT LAST_INSERT_ID()") or die("Falha na execução do código SQL: " . $mysqli);
    $createdItem = $sql_query->fetch_assoc();
    $createdItem = $createdItem["LAST_INSERT_ID()"];


    // Handle n:n Relationships
    $entityType = "";
    function createTagIfNotExists($entity)
    {
        include('../db/config.php');
        global $entityType;

        $entity = ucwords(trim($entity));
        $entityID = $entityType . "ID";

        $sqlCode = "SELECT `$entityID` from `$entityType` WHERE name='$entity'";
        $sql_query = $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);
        $rows = $sql_query->num_rows;

        if ($rows == 1) {
            $entity = $sql_query->fetch_assoc();
            return $entity[$entityID];
        } else {
            $sqlCode = "INSERT INTO $entityType (`name`) VALUES ('$entity')";
            $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);

            $sql_query = $mysqli->query("SELECT LAST_INSERT_ID()") or die("Falha na execução do código SQL: " . $mysqli);
            $entity = $sql_query->fetch_assoc();

            return $entity["LAST_INSERT_ID()"];
        }
    }

    function relateItemEntity($entity, $item)
    {
        include('../db/config.php');
        global $entityType;

        $tableName = "Item" . ucfirst($entityType);
        $entityColumn = $entityType . "ID";

        $sqlCode = "INSERT INTO `$tableName` (itemID, $entityColumn) VALUES ($item, $entity)";
        $mysqli->query($sqlCode) or die("Falha na execução do código SQL: " . $mysqli);
    }

    // Handle Tags
    $entityType = "tag";
    $tags = explode(",", $tags);
    $tags = array_map('createTagIfNotExists', $tags);
    $tags = array_unique($tags);
    foreach ($tags as $tag) {
        relateItemEntity($tag, $createdItem);
    }

    // Handle Authors
    $entityType = "author";
    $authors = explode(",", $authors);
    $authors = array_map('createTagIfNotExists', $authors);
    $authors = array_unique($authors);
    foreach ($authors as $author) {
        relateItemEntity($author, $createdItem);
    }

    // Handle Translators
    $entityType = "translator";
    $translators = explode(",", $translators);
    $translators = array_map('createTagIfNotExists', $translators);
    $translators = array_unique($translators);
    foreach ($translators as $translator) {
        relateItemEntity($translator, $createdItem);
    }

    header("Location: ../index.php");

?>
<html>

<head>
    <meta charset="utf-8" />
    <title>| Acervo cadastrado</title>
    <link rel="stylesheet" href="../css/style.css" />

    <meta http-equiv="refresh" content="2; URL='../login.php'" />
</head>
<meta charset="utf-8">

<title>| Sucesso</title>

<body>
    <img class="fundos" src="imagens/fundo.png">
    <img class="logoIff" src="imagens/IFF.png">

    <div class="div_cadastro_sucess">
        <h5>Acervo cadastrado com sucesso!</h5>

        <img class="imgCheck" src="imagens/check.png">
        <br><br><br><br>
    </div>

</body>

<footer>
    <img src="imagens/ondaas.PNG" width="100%" height="50%">
</footer>

</html>