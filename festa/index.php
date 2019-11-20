<?php
include_once 'Festa.php';

$festa = new Festa();
$arFesta = $festa->recuperarDados();

include_once '../cabecalho.php';
?>

    <h1 class="text-center">Festas</h1>

    <a class="btn btn-primary" href=formulario.php>Nova Festa</a>

    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td>Cliente</td>
            <td>Data da Festa</td>
            <td>Nº Convidados</td>
            <td>Valor Festa</td>
            <td align="center">Ações</td>
        </tr>
        <?php foreach ($arFesta as $festa): ?>
            <tr>
                <td><?= $festa['nome_cliente'] ?> </td>
                <td><?= $festa['data'] ?> </td>
                <td><?= $festa['qt_convidados'] ?> </td>
                <td>R$ <?= number_format($festa['valor_orcamento'], 2, ',', '.') ?> </td>
                <td style='width: 151px'>
                    <a href="processamento.php?acao=excluir&id_festa=<?= $festa['id_festa'] ?>"
                       class="btn btn-danger">Excluir
                    </a>
                    <a href="formulario.php?id_festa=<?= $festa['id_festa'] ?>"
                       class="btn btn-warning">Alterar
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

<?php include_once '../rodape.php';
