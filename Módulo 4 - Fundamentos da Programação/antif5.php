<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Email: <br>
        <input type="text" name="email"><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>


<?php

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    
    $email = $_POST["email"];

    file_put_contents("teste.txt", $email, FILE_APPEND);

    header("Location: antif5.php");
}

?>
