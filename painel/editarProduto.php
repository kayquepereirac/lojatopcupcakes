<?php
 
ob_start();
session_start();

require('../sheep_core/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br" >
<head >
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Loja Top Cupcake</title>
        <link rel="stylesheet" href="../painel/assets/css/app.min.css">
        <link rel="stylesheet" href="../painel/assets/css/style.css">
        
</head>
<body>


 
<div align="center" style="padding:20px; margin-top:120px;" >
 
          <div class="col-md-10"> 
          <section class="section" >


           <br>
          
          <form action="filtros/finalizar.php" method="post" enctype="multipart/form-data">
         <div class="section-body" >
          <div class="row" >
            <div class="col-md-12">
              <div class="card">
                  
                    
                <div class="card-header">
                  <h4>Edite o produto</h4><br>
                 
                </div>
                <div class="card-body">
         
                  <div class="form-group row mb-4">
                   
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="nomeprod" placeholder="Nome do produto">
                    </div>
                    
                  </div>

                  <div class="form-group row mb-4">
                   
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="valor" placeholder="Valor do produto">
                    </div>
                  </div> 
                  <input type="hidden" name="ip" value="<?=$_SESSION['ip']?>">
                  <input type="hidden" name="valor" value="<?=$_SESSION['valor']?>">

                  <div class="form-group row mb-4">
                   
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-lg btn-primary"  style="width:100%;" name="Finalizar" >Finalizar</button>
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

 
                  </div>
                </div>
              </div>
            </div>

</body>
</html>

<?php
ob_end_flush();
?>