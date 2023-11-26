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
                           
                            <th>-</th>
                            <th>-</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ler = new Ler();
                            $ler->Leitura('produtos', "ORDER BY data DESC");
                            if($ler->getResultado()){
                             foreach($ler->getResultado() as $produto){
                              $produto = (object) $produto;
                            

                            ?>
                          
                          <tr>
                            <td><?=$produto->id?></td>
                            <td><img src="<?=HOME?>/uploads/<?=$produto->capa?>" alt="" style="width:50px;"></td>
                            <td><?= date('d/m/Y', strtotime($produto->data)) ?></td>
                            <td><?=$produto->nome?></td>
                            <td>R$ <?=$produto->valor?></td>
                                                   
                            <td>
                               -
                            </td>
                            <td>
                               -
                            </td>
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

 
  

</body>
</html>

<?php
ob_end_flush();
?>