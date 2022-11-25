<html>

<head>
    <title>Upload de imagens</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2><strong>Envio de imagens</strong></h2>
        <hr>

        <form method="POST" action="auth/addBookConfig.php" enctype="multipart/form-data">
            <label for="conteudo">Enviar imagem:</label>
            <input type="file" name="cover" accept="image/*" class="form-control">

            <div align="center">
                <button type="submit" class="btn btn-success">Enviar imagem</button>
            </div>
        </form>
    </div>

    <body>

</html>