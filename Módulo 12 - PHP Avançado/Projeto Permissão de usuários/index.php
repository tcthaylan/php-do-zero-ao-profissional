<?php
session_start();
require_once("config.php");
require_once("classes/usuarios.class.php");
require_once("classes/documentos.class.php");

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

$usuario = new Usuarios($conn);
$usuario->setUser($_SESSION["id"]);

$documento = new Documentos($conn);
$lista = $documento->getDocumentos();
?>

<h1>Sistema</h1>
<p>Email: <?php echo $usuario->getEmail(); ?></p>

<?php if ($usuario->temPermissao("ADD")): ?>
<a href="">Adicionar Documento</a><br>
<?php endif; ?>

<?php if ($usuario->temPermissao("SECRET")): ?>
<a href="secreto.php">Página Secreta</a>
<?php endif; ?>
<br><br>
<table border="1" width="600">
    <tr>
        <th>Nome do arquivo</th>
        <th>Ações</th>
    </tr>
    <?php
    foreach ($lista as $value): 
        ?>
        <tr>
            <td><?php echo $value["titulo"]; ?></td>
            <td>
                <?php if ($usuario->temPermissao("EDIT")): ?> 
                <a href="editar.php?id=<?php echo $value["id"]; ?>">Editar</a>
                <?php endif; ?>

                <?php if ($usuario->temPermissao("DEL")): ?>
                <a href="excluir.php?id=<?php echo $value["id"]; ?>">Excluir</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php
    endforeach;
    ?>
</table>
<br>
<a href="sair.php">Sair</a>