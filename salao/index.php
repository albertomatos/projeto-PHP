<?php
include_once 'Salao.php';

$salao = new Salao();
$arSalao = $salao->recuperarDados();

include_once '../cabecalho.php';
?>

    <h1 class="text-center">Salões</h1>

    <a class="btn btn-primary" href=formulario.php>Novo Salão</a>

    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td>Tipo de Festa</td>
            <td>Endereço</td>
            <td>CEP</td>
            <td align="center">Ações</td>
        </tr>
        <?php foreach ($arSalao as $salao): ?>
            <tr>
                <td><?= $salao['nome_tipo_festa'] ?> </td>
                <td><?= $salao['logradouro'] ?> </td>
                <td><?= $salao['cep'] ?> </td>
                <td style='width: 151px'>
                    <a href="processamento.php?acao=excluir&id_salao=<?= $salao['id_salao'] ?>"
                       class="btn btn-danger">Excluir
                    </a>
                    <a href="formulario.php?id_salao=<?= $salao['id_salao'] ?>"
                       class="btn btn-warning">Alterar
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

<?php include_once '../rodape.php';
