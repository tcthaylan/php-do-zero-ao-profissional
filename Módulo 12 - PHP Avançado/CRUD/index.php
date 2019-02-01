<?php
require_once("contato.class.php");
$contato = new Contato();

if (!empty($_POST["email"])) {
    $nome   = addslashes($_POST["nome"]);
    $email  = addslashes($_POST["email"]);

    $contato->adicionar($email, $nome);
}
?>
<h1>Contatos</h1>
<table border="1" width="500">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php
    $lista = $contato->getAll();
    foreach ($lista as $value): 
    ?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['nome']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $value['id']; ?>">[Editar]</a> / 
                <a href="excluir.php?id=<?php echo $value['id']; ?>">[Excluir]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br><hr>
<h2>Adicionar novo contato</h2>
<form method="POST">
    Nome: <br>
    <input type="text" name="nome" required><br><br>
    Email: <br>
    <input type="text" name="email" required><br><br>
    <input type="submit" value="Adicionar">
</form>
<br><hr>