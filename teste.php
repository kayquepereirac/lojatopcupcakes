<?php

ob_start();
require('../../sheep_core/config.php');

class FinalizaPg {
    public function EnviaPedido($id) {
        // Implemente a lógica para enviar o pedido
    }

    public function getResultado() {
        // Implemente a lógica para obter o resultado
    }
}

$enviarCompras = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (isset($enviarCompras)) {
    $salvar = new FinalizaPg();
    $salvar->EnviaPedido($enviarCompras);

    if ($salvar->getResultado()) {
        header("Location: " . HOME . "/painel/clientes.php?sucesso=true");
    } else {
        header("Location: " . HOME . "/painel/clientes.php?erro=true");
    }
}
?>

   
            <input type="hidden" name="id" value="0">
            <input type="hidden" name="foto" value="xxx">
            <input type="hidden" name="titulo" value="Cupscakes">
            <input type="hidden" name="valor" value="1525">
            <input type="hidden" name="total" value="<?=$_SESSION['valor']?>">
            <input type="hidden" name="id_cliente" value="<?=$_SESSION['ip']?>">
            <input type="hidden" name="status" value="xablau">
            <input type="hidden" name="ip" value="1525">
            <input type="hidden" name="numero_pedido" value="fufuco">
            <input type="hidden" name="boleto" value="44">
            <input type="hidden" name="data" value="18/14/1993">
            
            <?php
             $vendaCadastro = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            ?>
