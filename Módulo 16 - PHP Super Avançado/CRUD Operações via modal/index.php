<?php
require('config.php');
require('classes/contato.class.php');
$c = new Contato($conn);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD modal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Contatos</h1>
    <a href="adicionar-contato.php" class="modal_ajax">Adicionar Contato</a>
    <table border="1" width="500">
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>E-MAIL</th>  
            <th>AÇÕES</th>
        </thead>
        <tbody>
            <?php
            $contatos = $c->getContatos();
            foreach ($contatos as $contato): ?>
                <tr>
                    <td><?php echo $contato['id']; ?></td>
                    <td><?php echo $contato['nome']; ?></td>
                    <td><?php echo $contato['email']; ?></td>
                    <td>
                        <a href="editar-contato.php" class="modal_ajax">Editar</a> | 
                        <a href="excluir-contato.php" class="modal_ajax">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal-bg">
        <div class="modal">
        </div>
    </div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>