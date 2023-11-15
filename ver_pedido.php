<?php
ob_start();
session_start();
require('./sheep_core/config.php');


$ip = $_SERVER['REMOTE_ADDR'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Top Cupcake</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php
date_default_timezone_set('America/Sao_Paulo');
$dataHoje = date('Y-m-d');
$cart = new Ler();
$cart->Leitura('compras', "WHERE ip = :ip AND data = :data", "ip={$ip}&data={$dataHoje}");
foreach($cart->getResultado() as $total);
$total = (object) $total;

if($total->total == null){
  header("Location: index.php");
}

?>

    

    <div class="header">
        <p class="logo">Meus Pedidos <br>
         <small > <a href="index.php" style="font-size:15px!important; color:#fff; text-decoration:none;">Volta a loja</a></small>
    
    </p>
       
        <div class="cart"><i class="fa fa-shopping-cart"></i>
            <p><?= $cart->getContalinhas() > 0 ? $cart->getContalinhas() : 0?></p>
        </div>
    </div>

    

    <div class="container">

         

        <div class="linha-produtos">

            <?php
            $ler = new Ler();
            $ler->Leitura('compras', "WHERE ip = :ip AND data = :data", "ip={$ip}&data={$dataHoje}");
            if ($ler->getResultado()) {
                foreach ($ler->getResultado() as $produto) {
                    $produto = (object) $produto;


            ?>

                    
                    <form action="filtros/criar.php" method="post">
                        <div class="corpoProduto">
                            <div class="imgProduto">
                                <img src="<?=HOME?>/uploads/<?=$produto->foto?>" alt="<?=$produto->titulo?>" class="produtoMiniatura" />
                            </div>
                            <div class="titulo">
                                <p><?=$produto->titulo?></p>
          
                            </div>
                        </div>
                    </form>
                     

            <?php
                }
            }
            ?>

        </div>
         
        <div class="barraLateral">

            <div class="topoCarrinho">
                <p>Status da Entrega Nº <?=$total->numero_pedido?></p>
            </div>
           
             
                <?php if($total->status == 'N'){ ?>
                    <div class="item-carrinho-vazio">Seu pedido está sendo processado</div>
                <br>
                <a href="<?=$total->boleto?>" class="button btn-final" target="_blank">Gerar Boleto / PIX</a>
                <?php }else{ ?>
                    <div class="item-carrinho-vazio">Saiu para Entrega</div>
                <?php }?>
    
            <div class="rodape">
                <h3>Total</h3>
                <h2>R$ <?=number_format($total->total, 2,',','.')?></h2>
               
            </div>

          </div>

        

    </div>

    




</body>

</html>