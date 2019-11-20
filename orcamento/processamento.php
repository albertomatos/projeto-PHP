<?php
include_once 'Orcamento.php';

$orcamento = new Orcamento();

switch ($_GET['acao']) {
    case 'salvar';
        # Se o id não estiver vazio ele altera, senão ele cria um novo.
        if (!empty($_POST['id_orcamento'])) {
            $orcamento->alterar($_POST);
        } else {
            $orcamento->inserir($_POST);
        }
        break;
    case 'excluir';
        $orcamento->excluir($_GET['id_orcamento']);
        break;
}

header('location: index.php');
