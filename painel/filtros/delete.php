<?php


ob_start();
require('../../sheep_core/config.php');

$produtoId = filter_input(INPUT_POST, 'idDelete', FILTER_VALIDATE_INT);

if ($produtoId>=0) {
    $remover = new Produtos();
    $remover->RemoverProduto($produtoId);

    if ($remover->getResultado()) {
        header("Location: " . HOME . "/painel/index.php?sucesso=true");
    } else {
        header("Location: " . HOME . "/painel/index.php?erro=true");
    }
} else {
     
    header("Location: " . HOME . "/painel/index.php?erro=true");
}



?>