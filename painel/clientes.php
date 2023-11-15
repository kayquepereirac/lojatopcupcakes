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
                           
                            <th>Criado</th>
                          
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Whatsapp</th>
                            <th>Mais</th>
                            <th>Enviar Pedido</th>
                           
                           
                          </tr>
                        </thead>
                        <tbody>


                        <?php
                            $ler = new Ler();
                            $ler->Leitura('cliente', "ORDER BY data DESC");
                            if($ler->getResultado()){
                                foreach($ler->getResultado() as $cliente){
                                $cliente = (object) $cliente;

                            ?>
                            
                          
                          <tr>
                            <td><?=$cliente->id?></td>
                           
                            <td><?= date('d/m/Y', strtotime($cliente->data)) ?></td>
                            <td><?=$cliente->nome?></td>
                            <td><?=$cliente->cpf?></td>
                            <td><?=$cliente->whatsapp?></td>
                            
                            <td><a href="#" data-toggle="modal" data-target="#ver<?=$cliente->id?>">Ver</a></td>
                                                   
                
                            <td>
                                <form action="filtros/enviar.php" method="post">
                                 <input type="hidden" name="id" value="<?=$cliente->id?>">
                                 <button type="submit" class="btn btn-icon btn-success">Enviar Pedido</button>
                                 </form>
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

    <?php
                            $ler = new Ler();
                            $ler->Leitura('cliente', "ORDER BY data DESC");
                            if($ler->getResultado()){
                                foreach($ler->getResultado() as $cliente){
                                $cliente = (object) $cliente;

                            ?>
                            
    
                           
        <div class="modal fade" id="ver<?=$cliente->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FFF.COM.BR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 
                    
                            <p>Criado(a): <?= date('d/m/Y', strtotime($cliente->data)) ?></p>
                            <p>Nome: <?=$cliente->nome?></p>   
                            <p>CPF: <?=$cliente->cpf?></p>   
                            <p>Whats: <?=$cliente->whatsapp?></p>   
                            <p>E-mail: <?=$cliente->email?></p>   
                            <p>Endereço: <?=$cliente->endereco?></p>   
                            <p>CEP: <?=$cliente->cep?></p>   
                            <p>Estado: <?=$cliente->estado?>/p>   
                            <p>Cidade: <?=$cliente->cidade?></p>   
                        
                      
              </div>
              <div class="modal-footer bg-whitesmoke br">
           
                <button type="button" class="btn btn-danger" data-dismiss="modal">x</button>
              </div>
            </div>
          </div>
        </div>
       
 
<?php
                                }
                            }
                           ?>           

  <script src="assets/js/custom.js"></script>
  <script src="assets/js/app.min.js"></script>
 
  

</body>
</html>

<?php
ob_end_flush();
?>