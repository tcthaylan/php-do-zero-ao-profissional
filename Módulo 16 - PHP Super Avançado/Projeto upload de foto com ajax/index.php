<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload de fotos com ajax</title>
</head>
<body>
    <h1>Envie uma foto com ajax</h1>
    <form method="POST" enctype="multipart/form-data" id="form-foto">
        Nome: <br>
        <input type="text" id="nome" name="nome"><br><br>
        Foto: <br>
        <input type="file" id="foto" name="foto">

        <input type="submit" value="Enviar">
    </form>

    <script src="jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>