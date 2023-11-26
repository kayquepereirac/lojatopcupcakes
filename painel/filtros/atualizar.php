<?php
ob_start();
require('../../sheep_core/config.php');

$atualizar = filter_input_array(INPUT_POST,  FILTER_DEFAULT);

if (isset($atualizar['upProduto'])) {

    unset($atualizar['upProduto']);
    $atualizar['capa'] = ($_FILES['capa']['tmp_name'] ? $_FILES['capa'] : null);
    $remover = new Produtos();
    $remover->upProduto($atualizar['id'], $atualizar);

    var_dump($remover);
    if ($remover->getResultado()) {
        header("Location: " . HOME . "/painel/index.php?sucesso=true");
    } else {
        header("Location: " . HOME . "/painel/index.php?erro=true");
    }
}
