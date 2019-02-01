<?php
require_once("contato.class.php");
$contato = new Contato();

if (!empty($_GET["id"])) {
    $id = addslashes($_GET["id"]);    
    $info = $contato->getInfo($id);

    if (empty($info)) {
        header("Location: index.php");
        exit;
    }

    if (!empty($_POST["nome"])) {
        $nome   = addslashes($_POST["nome"]);
        $email  = addslashes($_POST["email"]);
        $contato->editar($id, $nome, $email);
        header("Location: index.php");
        exit;
    }

} else {
    header("Location: index.php");
    exit;
}
?>

<h1>Alterar Nome</h1>
<form method="POST">
    Novo nome: <br>
    <input type="text" name="nome" required placeholder="<?php echo $info["nome"]; ?>"><br><br>
    Novo email: <br>
    <input type="text" name="email" required placeholder="<?php echo $info["email"]; ?>"><br><br>
    <input type="submit" value="Salvar">
</form>