<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Multiplo de Arquivos</title>
</head>
<body>
    <?php

    if (isset($_FILES["arquivos"]["tmp_name"]) && !empty($_FILES["arquivos"]["tmp_name"])) {

        if (count($_FILES["arquivos"]["tmp_name"] > 0)) {
            $file = $_FILES["arquivos"];
            
            for ($i = 0; count($file["tmp_name"]) > $i; $i++) {

                $filename = md5(time(). rand(0, 999)) .".jpg";

                move_uploaded_file($file["tmp_name"][$i], "arquivos/".$filename);
            }
        }
    }

    ?>
    <form method="POST" enctype="multipart/form-data" >
        <input type="file" name="arquivos[]" multiple>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>