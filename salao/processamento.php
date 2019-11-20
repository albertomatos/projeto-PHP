<?php
include_once 'Salao.php';

$salao = new Salao();

switch ($_GET['acao']) {
    case 'salvar';
        # Se o id não estiver vazio ele altera, senão ele cria um novo.
        if (!empty($_POST['id_salao'])) {
            $salao->alterar($_POST);
        } else {
            $salao->inserir($_POST);
        }
        break;
    case 'excluir';
        $salao->excluir($_GET['id_salao']);
        break;
}

header('location: index.php');
