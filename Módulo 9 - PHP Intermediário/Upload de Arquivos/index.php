<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload de Arquivos</title>
</head>
<body>
    <form method="POST" action="recebedor.php" enctype="multipart/form-data">
        <input type="file" name="arquivo">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>