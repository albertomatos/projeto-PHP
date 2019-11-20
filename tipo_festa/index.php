<?php
include_once 'TipoFesta.php';

$tipo_festa = new TipoFesta();
$arrTipoFesta = $tipo_festa->recuperarDados(); // Array de tipoFesta.

include_once '../cabecalho.php';
?>
    <h1 class="text-center">Tipo de Festa</h1>

    <a class="btn btn-primary" href="formulario.php">Novo Tipo de Festa</a>

    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td>Nome</td>
            <td>Descrição</td>
            <td align="center">Ações</td>
        </tr>

        <?php foreach ($arrTipoFesta as $tipo_festa): ?>
            <tr>
                <td><?= $tipo_festa['nome'] ?></td>
                <td><?= $tipo_festa['descricao'] ?></td>
                <td style="width: 151px">
                    <a href="formulario.php?id_tipo_festa=<?= $tipo_festa['id_tipo_festa'] ?>" class="btn btn-warning">Alterar</a>
                    <a href="processamento.php?acao=excluir&id_tipo_festa= <?= $tipo_festa['id_tipo_festa'] ?>"
                       class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

<?php
include_once '../rodape.php';
