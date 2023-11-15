<?php

 
class Google {

    private $File;
    private $Link;
    private $Data;
    private $Tags;

     
    private $seoTags;
    private $seoData;

    function __construct($File, $Link) {
        $this->File = strip_tags(trim($File));
        $this->Link = strip_tags(trim($Link));
    }

    
    public function getTags() {
        $this->checkData();
        return $this->seoTags;
    }
 
    public function getData() {
        $this->checkData();
        return $this->seoData;
    }

   
    private function checkData() {
        if (!$this->seoData):
            $this->getSeo();
        endif;
    }

 
    private function getSeo() {
        $sheep = new Ler;
        
        switch ($this->File):
            
 
            case 'index':
                $this->Data = [GOOGLE_TITULO . ' - '.GOOGLE_DESC, GOOGLE_TAGS, HOME, CAMINHO_TEMAS . SHEEP_IMG_LOGO];
                

   
            default :
                $this->Data = [SITENAME . ' - 404 Oppsss, Nada encontrado!', SITEDESC, HOME . '/404', CAMINHO_TEMAS  . SHEEP_IMG_LOGO];

        endswitch;

        if ($this->Data):
            $this->setTags();
        endif;
    }

 
    private function setTags() {
        $this->Tags['Title'] = $this->Data[0];
        $this->Tags['Content'] = Formata::LimitaTextos(html_entity_decode($this->Data[1]), 45);
        $this->Tags['Link'] = $this->Data[2];
        $this->Tags['Image'] = $this->Data[3];

        $this->Tags = array_map('strip_tags', $this->Tags);
        $this->Tags = array_map('trim', $this->Tags);

        $this->Data = null;

  
        $this->seoTags = '<title>' . $this->Tags['Title'] . '</title> ' . "\n";
        $this->seoTags .= '<meta name="description" content="' . $this->Tags['Content'] . '"/>' . "\n";
        $this->seoTags .= '<meta name="keywords" content="'.GOOGLE_DESC.'" />' . "\n";
        $this->seoTags .= '<meta name="robots" content="index, follow" />' . "\n";
        $this->seoTags .= '<meta name=url content='.HOME.' />' . "\n";
        $this->seoTags .= '<meta name=author content="Webtec Technologies" />' . "\n";
        $this->seoTags .= '<meta name=company content="'.SITENAME.'" />' . "\n";
        $this->seoTags .= '<meta name=revisit-after content="1 week" />' . "\n";
        $this->seoTags .= '<meta name=reply-to content=mailto:'.EMAIL.' />' . "\n";
        $this->seoTags .= '<meta name=copyright content="'.RODAPE.''.date("Y").'" />' . "\n";
        $this->seoTags .= '<meta name=made content=mailto:contato@webtecpr.com.br />' . "\n";
        $this->seoTags .= '<meta name=google-site-verification content='.GOOGLE_VERIFY.' />' . "\n";
        $this->seoTags .= '<link rel="canonical" href="' . $this->Tags['Link'] . '">' . "\n";
        $this->seoTags .= "\n";

 
        $this->seoTags .= '<meta property="og:site_name" content="' . SITENAME . '" />' . "\n";
        $this->seoTags .= '<meta property="og:locale" content="pt_BR" />' . "\n";
        $this->seoTags .= '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
        $this->seoTags .= '<meta http-equiv="content-type" content="text/html; charset=utf-8">' . "\n";
        $this->seoTags .= '<meta property="og:title" content="' . $this->Tags['Title'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:description" content="' . $this->Tags['Content'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:image" content="' . $this->Tags['Image'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:image:width" content="600" />' . "\n";
        $this->seoTags .= '<meta property="og:image:height" content="600" />' . "\n";
        $this->seoTags .= '<meta property="og:url" content="' . $this->Tags['Link'] . '" />' . "\n";
        $this->seoTags .= '<meta property="fb:app_id" content="' . $this->Tags['Link'] . '" />' . "\n";
        $this->seoTags .= '<meta property="article:author" content="' . $this->Tags['Link'] . '" />' . "\n";
        $this->seoTags .= '<meta property="article:publisher" content="' . $this->Tags['Link'] . '" />' . "\n";
        $this->seoTags .= '<meta name="author" content="'.SHEEP_IMG.'">' . "\n";
        $this->seoTags .= '<meta property="og:type" content="article" />' . "\n";
        $this->seoTags .= "\n";


 
        $this->seoTags .= '<meta itemprop="name" content="' . $this->Tags['Title'] . '">' . "\n";
        $this->seoTags .= '<meta itemprop="description" content="' . $this->Tags['Content'] . '">' . "\n";
        $this->seoTags .= '<meta itemprop="url" content="' . $this->Tags['Link'] . '">' . "\n";

        $this->Tags = null;
    }

}
