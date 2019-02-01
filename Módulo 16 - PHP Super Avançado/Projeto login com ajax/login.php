<?php
try {
    $conn = new PDO('mysql:dbname=projeto_loginajax;host=localhost', 'root', '');
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}

if (!empty($_POST['email'] && !empty($_POST['password']))) {

    $email = addslashes($_POST['email']);
    $password = md5($_POST['password']);

    $sql = $conn->prepare('SELECT * FROM usuario WHERE email = :email AND senha = :senha');
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $password);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        echo 'Login realizado com sucesso';
    } else {
        echo 'Email e/ou senha incorreto(s)';
    }
} else {
    echo 'Preencha todos os campos!';
}