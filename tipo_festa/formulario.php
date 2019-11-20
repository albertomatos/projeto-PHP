<?php
include_once 'TipoFesta.php';

$tipoFesta = new TipoFesta();

if (!empty($_GET['id_tipo_festa'])) {
    $tipoFesta->carregarPorId($_GET['id_tipo_festa']);
}

include_once '../cabecalho.php';

if (!empty($_GET)) {
    echo "<h1 class='text-center'>Atualizar Tipo de Festa</h1>";
} else
    echo "<h1 class='text-center'>Novo Tipo de Festa</h1>";
?>

    <div class="container">
        <form class="form-horizontal" action="processamento.php?acao=salvar" method="post">
            <input type="hidden" name="id_tipo_festa" value="<?= $tipoFesta->getIdTipoFesta(); ?>">

            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome"
                           value="<?= $tipoFesta->getNome(); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="descricao" name="descricao"
                           value="<?= $tipoFesta->getDescricao(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="/tipo_festa/index.php" class="btn btn-danger">Voltar</a>
                </div>
        </form>
    </div>

<?php
include_once '../rodape.php';
