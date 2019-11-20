<?php
include_once 'Orcamento.php';

$orcamento = new Orcamento();
$arOrcamento = $orcamento->recuperarDados();

include_once '../cabecalho.php';
?>

    <h1 class="text-center">Orçamentos</h1>

    <a class="btn btn-primary" href=formulario.php>Novo Orçamento</a>

    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td>Cliente</td>
            <td>Tipo de Festa</td>
            <td>Orçamento</td>
            <td>Endereço</td>
            <td>Nº Convidados</td>
            <td align="center">Ações</td>
        </tr>
        <?php foreach ($arOrcamento as $orcamento): ?>
            <tr>
                <td><?= $orcamento['nome_cliente'] ?> </td>
                <td><?= $orcamento['nome_tipo_festa'] ?> </td>
                <td>R$ <?= number_format($orcamento['valor_orcamento'], 2, ',', '.') ?> </td>
                <td><?= $orcamento['logradouro'] ?> </td>
                <td><?= $orcamento['qt_convidados'] ?> </td>
                <td style='width: 151px'>
                    <a href="processamento.php?acao=excluir&id_orcamento=<?= $orcamento['id_orcamento'] ?>"
                       class="btn btn-danger">Excluir
                    </a>
                    <a href="formulario.php?id_orcamento=<?= $orcamento['id_orcamento'] ?>"
                       class="btn btn-warning">Alterar
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

<?php include_once '../rodape.php';
