<?php
include_once 'Festa.php';

include_once '../orcamento/Orcamento.php';

$festa = new Festa();
$arFesta = $festa->recuperarDados();

$arrOrcamento = (new Orcamento())->recuperarDados();

if (!empty($_GET['id_festa'])) {
    $festa->carregarPorId($_GET['id_festa']);
}

include_once '../cabecalho.php';

if (!empty($_GET)) {
    echo "<h1 class='text-center'>Atualizar Festa</h1>";
} else
    echo "<h1 class='text-center'>Nova Festa</h1>";

?>

    <div class="container">

        <form class="form-horizontal" action="processamento.php?acao=salvar" method="post">
            <input type="hidden" name="id_festa" value="<?= $festa->getIdFesta(); ?>">

            <div class="form-group">
                <label for="id_orcamento" class="col-sm-2 control-label">Orcamento</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_orcamento" id="id_orcamento" required>
                        <option selected disabled>Selecione</option>

                        <?php foreach ($arrOrcamento as $orcamento): ?>
                            <?php $checked = $orcamento['id_orcamento'] == $festa->getIdOrcamento() ? 'selected' : ''; ?>
                            <option <?= $checked ?>
                                    value="<?= $orcamento['id_orcamento'] ?>"><?= $orcamento['nome_cliente'] ?> / <?= $orcamento['nome_tipo_festa'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="data" class="col-sm-2 control-label">Data da Festa</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="data" name="data"
                           value="<?= $festa->getData(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="/festa/index.php" class="btn btn-danger">Voltar</a>
                </div>
            </div>

        </form>
    </div>
<?php
include_once '../rodape.php';
