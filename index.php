<?php
ob_start();
session_start();
require('./sheep_core/config.php');


$ip = $_SERVER['REMOTE_ADDR'];
$_SESSION['ip'] = $ip;

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
$cart = new Ler();
$cart->Leitura('carrinho', "WHERE ip = :ip", "ip={$ip}");

?>

   

    <div class="header">
        <p class="logo">Loja Top Cupcakes <br>
         <small > <a href="ver_pedido.php" style="font-size:15px!important; color:#fff; text-decoration:none;">Meus Pedidos</a></small>
    
    </p>
       
        <div class="cart"><i class="fa fa-shopping-cart"></i>
            <p><?=$cart->getContaLinhas() > 0 ? $cart->getContaLinhas() : 0?></p>
        </div>
    </div>

     

    <div class="container">

        

        <div class="linha-produtos">

            <?php
            $ler = new Ler();
            $ler->Leitura('produtos', "ORDER BY data DESC");
            if ($ler->getResultado()) {
                foreach ($ler->getResultado() as $produto) {
                    $produto = (object) $produto;


            ?>

                     
                    <form action="filtros/criar.php" method="post">
                        <div class="corpoProduto">
                            <div class="imgProduto">
                                <img src="<?=HOME?>/uploads/<?=$produto->capa?>" alt="<?=$produto->nome?>" class="produtoMiniatura" />
                            </div>
                            <div class="titulo">
                                <p><?=$produto->nome?></p>
                                <h2>R$ <?=number_format($produto->valor, 2,',','.')?></h2>
                                <input type="hidden" name="id_produto" value="<?=$produto->id?>">
                                <input type="hidden" name="valor" value="<?=$produto->valor?>">
                                <input type="hidden" name="ip" value="<?=$ip?>">
                                <button type="submit" class="button" name="addcarrinho">Adicionar ao carrinho</button>
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
                <p>Meu Carrinho</p>
            </div>

            

              <?php
               
                if($cart->getContaLinhas() > 0){
                foreach($cart->getResultado() as $carts){


                    $ler = new Ler();
                    $ler->Leitura('produtos', "WHERE id = :id ORDER BY data DESC", "id={$carts['id_produto']}");
                    if($ler->getResultado()) {
                        foreach ($ler->getResultado() as $produto) {
                            $produto = (object) $produto;
        
                  ?>
            
            <div class="item-carrinho">

                <div class="linha-da-imagem">
                    <img src="<?=HOME?>/uploads/<?=$produto->capa?>" alt="<?=$produto->nome?>" class="img-carrinho">
                </div>
                <p style="font-size:12px;"><?=$produto->nome?></p>
                <h2 style="font-size:14px;">R$ <?=$produto->valor?></h2>
                <form action="filtros/excluir.php" method="post">
                    <input type="hidden" name="id_produto" value="<?=$produto->id?>">
                    <button type="submit" style="border:none; background:none;"> <i class="fa fa-trash-o"></i> </button>
                </form>


            </div>

            
            <?php 
                        } 
                    }
              } 
            }else{
            ?>
              <div class="item-carrinho-vazio">Seu carrinho está vazio!</div>
              <?php
            }

            ?>

            <?php
            $totalCarrinho = new Ler();
            $totalCarrinho->LeituraCompleta("SELECT SUM(valor) as total FROM carrinho");
            if($totalCarrinho->getResultado()){
              $totalCompras = number_format($totalCarrinho->getResultado()[0]['total'], 2,',','.');
              $_SESSION['valor'] = $totalCarrinho->getResultado()[0]['total'];
            }else{
              $totalCompras = 0;
            }
            ?>
         

            <div class="rodape">
                <h3>Total</h3>
                <h2>R$ <?=$totalCompras?></h2>
               
            </div>

           <br>
           <?php if($cart->getContaLinhas() > 0){ ?>
                <a href="<?=HOME ?>/finaliza-compras.php" class="button btn-final">Finalizar Pedido</a>
          <?php }?>

        </div>

         

    </div>

     




</body>

</html>