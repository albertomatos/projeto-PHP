<?php
include_once 'Salao.php';
include_once '../tipo_festa/TipoFesta.php';

$salao = new Salao();
$arSalao = $salao->recuperarDados();

$arrTipoFesta = (new TipoFesta())->recuperarDados();

if (!empty($_GET['id_salao'])) {
    $salao->carregarPorId($_GET['id_salao']);
}

include_once '../cabecalho.php';

if (!empty($_GET)) {
    echo "<h1 class='text-center'>Atualizar Salao</h1>";
} else
    echo "<h1 class='text-center'>Novo Salao</h1>";

?>

    <div class="container">

        <form class="form-horizontal" action="processamento.php?acao=salvar" method="post">
            <input type="hidden" name="id_salao" value="<?= $salao->getIdSalao(); ?>">

            <div class="form-group">
                <label for="cep" class="col-sm-2 control-label">CEP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cep" name="cep"
                           value="<?= $salao->getCep(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="logradouro" class="col-sm-2 control-label">Logradouro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="logradouro" name="logradouro"
                           value="<?= $salao->getLogradouro(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="uf" class="col-sm-2 control-label">UF</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="uf" name="uf"
                           value="<?= $salao->getUf(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bairro" class="col-sm-2 control-label">Bairro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bairro" name="bairro"
                           value="<?= $salao->getBairro(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="id_tipo_festa" class="col-sm-2 control-label">Tipo de Festa</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_tipo_festa" id="id_tipo_festa" required>
                        <option selected disabled>Selecione</option>

                        <?php foreach ($arrTipoFesta as $tipo): ?>
                            <?php $checked = $tipo['id_tipo_festa'] == $salao->getIdTipoFesta() ? 'selected' : ''; ?>
                            <option <?= $checked ?>
                                    value="<?= $tipo['id_tipo_festa'] ?>"><?= $tipo['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="/index.php" class="btn btn-danger">Voltar</a>
                </div>
            </div>

        </form>
    </div>
    <script>
        $(function () {
            $("#cep").change(function () {
                var cep = $(this).val();

                if (cep.length == 9 && cep.length > 0) {
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/", function (data) {
                        $("#uf").val(data.uf);
                        $("#bairro").val(data.bairro);
                        $("#cidade").val(data.localidade);
                        $("#logradouro").val(data.logradouro);
                    });
                }
            });
        });
    </script>
<?php
include_once '../rodape.php';
