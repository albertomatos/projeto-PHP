<?php
include_once 'Orcamento.php';
include_once '../salao/Salao.php';
include_once '../cliente/Cliente.php';

$orcamento = new Orcamento();
$arOrcamento = $orcamento->recuperarDados();

$arrSalao = (new Salao())->recuperarDados();
$arrCliente = (new Cliente())->recuperarDados();

if (!empty($_GET['id_orcamento'])) {
    $orcamento->carregarPorId($_GET['id_orcamento']);
}

include_once '../cabecalho.php';

if (!empty($_GET)) {
    echo "<h1 class='text-center'>Atualizar Orcamento</h1>";
} else
    echo "<h1 class='text-center'>Novo Orcamento</h1>";

?>

    <div class="container">

        <form class="form-horizontal" action="processamento.php?acao=salvar" method="post">
            <input type="hidden" name="id_orcamento" value="<?= $orcamento->getIdOrcamento(); ?>">

            <div class="form-group">
                <label for="id_cliente" class="col-sm-2 control-label">Cliente</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_cliente" id="id_cliente" required>
                        <option selected disabled>Selecione</option>

                        <?php foreach ($arrCliente as $cliente): ?>
                            <?php $checked = $cliente['id_cliente'] == $orcamento->getIdCliente() ? 'selected' : ''; ?>
                            <option <?= $checked ?>
                                    value="<?= $cliente['id_cliente'] ?>"><?= $cliente['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="id_salao" class="col-sm-2 control-label">Salão</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_salao" id="id_salao" required>
                        <option selected disabled>Selecione</option>

                        <?php foreach ($arrSalao as $salao): ?>
                            <?php $checked = $salao['id_salao'] == $orcamento->getIdSalao() ? 'selected' : ''; ?>
                            <option <?= $checked ?>
                                    value="<?= $salao['id_salao'] ?>"><?= $salao['nome_tipo_festa'] ?> / <?= $salao['logradouro'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="qt_convidados" class="col-sm-2 control-label">Qtd de Convidados</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="qt_convidados" name="qt_convidados"
                           value="<?= $orcamento->getQtConvidados(); ?>" maxlength="5">
                </div>
            </div>
            <div class="form-group">
                <label for="valor_orcamento" class="col-sm-2 control-label">Valor do Orçamento</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="valor_orcamento" name="valor_orcamento"
                           value="<?= $orcamento->getValorOrcamento(); ?>" maxlength="10">
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
