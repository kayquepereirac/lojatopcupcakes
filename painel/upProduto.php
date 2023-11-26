<?php


ob_start();
require('../sheep_core/config.php');
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$atualizaProdutos = new Ler();
$atualizaProdutos->Leitura('produtos', "WHERE id = :id", "id={$id}");
if($atualizaProdutos->getResultado()){
   foreach($atualizaProdutos->getResultado() as $produto);
   $produto = (object) $produto;
}

?>
<!DOCTYPE html>
<html lang="pt-br" >
<head >
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Top cupcakes</title>
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
        
          <form action="filtros/atualizar.php" method="post" enctype="multipart/form-data">


         <div class="section-body" >
          <div class="row" >
            <div class="col-md-12">
              <div class="card">
                  
                    
                <div class="card-header">
                  <h4>Produtos</h4><br>
                 
                </div>
                <div class="card-body">

                <div class="form-group row mb-4">
                   
                    <div class="col-md-12">
                      <input type="file" class="form-control" name="capa">
                    </div>
                    
                  </div>
         

                  <div class="form-group row mb-4">
                   
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="nome" placeholder="Título do Produto" value="<?=$produto->nome ? $produto->nome : null?>">
                    </div>
                    
                  </div>

                  <div class="form-group row mb-4">
                   
                   <div class="col-md-12">
                     <input type="text" class="form-control" name="valor" placeholder="Valor" value="<?=$produto->valor ? $produto->valor : null?>">
                   </div>
                   
                 </div>

                  <input type="hidden" name="id" value="<?=$produto->id?>">
                  <div class="form-group row mb-4">
                   
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-lg btn-primary"  style="width:100%;" name="upProduto" >Salvar</button>
                    </div>

                  </div>
                   
                </div>
              </div>
            </div>
          </div>
        </div>
            </form>
       
      </section>
      </div>
        
       
    </div>

  <script src="assets/js/custom.js"></script>

 
  

</body>
</html>

<?php
ob_end_flush();
?>