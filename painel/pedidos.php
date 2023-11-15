<?php
 
ob_start();

require('../sheep_core/config.php');

?>
<!DOCTYPE html>
<html lang="pt-br" >
<head >
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Loja Top Cupcake</title>
        <link rel="stylesheet" href="assets/css/app.min.css">
      
        <link rel="stylesheet" href="assets/css/style.css">
         
</head>
<body>


 
<div align="center" style="padding:20px; margin-top:120px;" >
 
        <div class="col-md-10"> 
      <section class="section" >


             
            <?php
            
            require_once('topo.php');

            ?>
      
              


           <br>
          
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Ativos</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                            <th>Nº</th>  
                            <th>Capa</th>
                            <th>Criado</th>
                          
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Cliente</th>
                            <th>Nº Pedido</th>
                            <th>Status</th>
                            <th>-</th>
                            <th>-</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $ler = new Ler();
                            $ler->Leitura('compras', "ORDER BY data DESC");
                            if($ler->getResultado()){
                             foreach($ler->getResultado() as $compras){
                              $compras = (object) $compras;

                              $ler->Leitura('cliente', "WHERE id = :id", "id={$compras->id_cliente}");
                              $usuarios = Formata::Resultado($ler);
                              if($usuarios){
                                foreach($ler->getResultado() as $cliente);
                                $cliente = (object) $cliente;

                              }
                            

                            ?>
                          
                          <tr>
                            <td><?= $compras->id?></td>
                            <td><img src="<?=HOME?>/uploads/<?=$compras->foto?>" alt="" style="width:50px;"></td>
                            <td><?= date('d/m/Y', strtotime($compras->data)) ?></td>
                            <td><?= $compras->titulo?></td>
                            <td>R$ <?= $compras->valor?></td>
                            <td><?=$cliente->nome?></td>
                            <td><?= $compras->numero_pedido?></td>
                            <td> 
                              <?= $compras->status == 'N' ? 'Pendente' : 'Finalizado'?>
                            </td>
                                                   
                            <td>-</td>
                            <td>-</td>
                          </tr>

                          <?php
                             }
                            }
                          ?>
                          
                         

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
       
      </section>
      </div>
        
       
    </div>

  <script src="assets/js/custom.js"></script>

    </div>
  </div>
  </div>
 </div>
  

</body>
</html>

<?php
ob_end_flush();
?>