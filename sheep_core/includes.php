<?php

 
define('SHEEP_IMG', './../sheep_temas/sheep-imagens/');

define('SHEEP_IMG_LOGO', '../../../sheep_temas/sheep-imagens-logo/');

 
define('SHEEP_IMG_PAINEL', './sheep_temas/sheep-imagens/');

 
define('SHEEP_AUDIO', '../../../sheep_temas/sheep-midias/');

 
define('SHEEP_VERSAO','Versão: [ 1.0.0 ] - <b>Atualizado dia: 11/10/2023</b>');

 
 
function sheep_classes($sheepClasses) {

    $sheepDiretorio = ['diretor', 'funcionarios',  'gerentes_operacionais', 'gerentes'];
    $sheepFiscaliza = null;

    foreach ($sheepDiretorio as $sheepNomeDiretorio):
        if (!$sheepFiscaliza && file_exists(__DIR__ . '/' ."{$sheepNomeDiretorio}" . '/' ."{$sheepClasses}.php") && !is_dir(__DIR__  . '/' . "{$sheepNomeDiretorio}" . '/' ."{$sheepClasses}.php")):
            include_once (__DIR__  . '/' . "{$sheepNomeDiretorio}" . '/' ."{$sheepClasses}.php");
            $sheepFiscaliza = true;
        endif;
    endforeach;

    if (!$sheepFiscaliza):
        echo "Não foi possível incluir {$sheepClasses}.php";
        exit();
    endif;
}

spl_autoload_register("sheep_classes");


 


 
if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ) {
     
         $https = 'https://';
        
    }else{
         $https = 'http://';
    }
    
     
    define('HOME', $https. SHEEP_URL); 	
    define('PASTA_DO_PAINEL', '/sheep_painel/'); 	
    define('URL_CAMINHO_PAINEL', HOME.'/'.PASTA_DO_PAINEL); 	
    define('SHEEP_LAYOUT', 'site');
    
    
     
    define('CAMINHO_TEMAS', HOME . '/' . 'sheep_temas' . '/' . SHEEP_LAYOUT);
    define('SOLICITAR_TEMAS', 'sheep_temas' . '/' . SHEEP_LAYOUT);
    define('MODELO', 'sheep_temas' . '/' . SHEEP_LAYOUT);
    


define('FILTROS','sheep.php?m=');

 
define('SHEEP_TITULO_PAINEL', 'Painel de Controle Sheep PHP - lojatopcupcake.com.br');

 
define('SHEEP_RODAPE_PAINEL', '<a href="https://lojatopupcake.com.br/" SHEEP PHP</a>');


 

$ipsheep =filter_input(INPUT_SERVER, 'SERVER_ADDR', FILTER_SANITIZE_STRIPPED);
if($ipsheep == '::1' || $ipsheep == '127.0.0.1'){
 null;
}else{
     

}



?>