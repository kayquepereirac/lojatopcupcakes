<?php
ob_start();
require('../../sheep_core/config.php');

$excluir = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (isset($excluir)) {


    $remover = new Produtos();
    $remover->excluirProduto($excluir);
    if ($remover->getResultado()) {
        header("Location: " . HOME . "/painel/index.php?sucesso=true");
    } else {
        header("Location: " . HOME . "/painel/index.php?erro=true");
    }
}
