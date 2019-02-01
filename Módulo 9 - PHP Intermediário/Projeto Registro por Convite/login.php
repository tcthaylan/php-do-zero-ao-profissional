<?php

session_start();

if (isset($_POST["email"]) && !empty($_POST["email"])) {

    require_once("config.php");
    
    $email = addslashes($_POST["email"]); 
    $senha = md5(addslashes($_POST["senha"]));  

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");

    $stmt->execute(array(
        $email,
        $senha
    ));

    if ($stmt->rowCount() > 0) {
        
        $_SESSION["id"] = session_id();

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $dados) {
            
            $_SESSION["email"] = $dados["email"];
            $_SESSION["senha"] = $dados["senha"];
            $_SESSION["codigo"] = $dados["codigo"];
        }

        header("Location: index.php");
    } else {

        echo "Email ou/e senha incorreto(s).";
    }
}

?>

<h1>Área de Login</h1>
<form method="POST">
    Email: <br>
    <input type="text" name="email"> <br><br>
    Senha: <br>
    <input type="password" name="senha"> <br><br>
    <input type="submit" value="Entrar">
</form>

