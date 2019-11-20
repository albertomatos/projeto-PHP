<?php
include_once 'Festa.php';

$festa = new Festa();

switch ($_GET['acao']) {
    case 'salvar';
        # Se o id não estiver vazio ele altera, senão ele cria um novo.
        if (!empty($_POST['id_festa'])) {
            $festa->alterar($_POST);
        } else {
            $festa->inserir($_POST);
        }
        break;
    case 'excluir';
        $festa->excluir($_GET['id_festa']);
        break;
}

header('location: index.php');
