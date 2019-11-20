<?php
include_once 'TipoFesta.php';

$tipoFesta = new TipoFesta();

switch ($_GET['acao']) {
    case 'salvar';
        # Se o id não estiver vazio ele altera, senão ele cria um novo.
        if (!empty($_POST['id_tipo_festa'])) {
            $tipoFesta->alterar($_POST);
        } else {
            $tipoFesta->inserir($_POST);
        }
        break;
    case 'excluir';
        $tipoFesta->excluir($_GET['id_tipo_festa']);
        break;
}

header('location: index.php');
