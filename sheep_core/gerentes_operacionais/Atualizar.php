<?php
 
class Atualizar extends Conexao {

    private $Banco;
    private $Dados;
    private $SQL;
    private $Locais;
    private $Resultado;

     
    private $Atualizar;

     
    private $Conexao;

     
    public function Atualizando($Banco, array $Dados, $SQL, $Adicionais) {
        $this->Tabela = (string) $Banco;
        $this->Dados = $Dados;
        $this->Termos = (string) $SQL;
        
        parse_str($Adicionais, $this->Locais);
        $this->getSyntax();
        $this->Execute();
    }

     
    public function getResultado() {
        return $this->Resultado;
    }

    
    public function getContaLinhas() {
        return $this->Atualizar->rowCount();
    }

     
    public function setLocais($Adicionais) {
        parse_str($Adicionais, $this->Locais);
        $this->getSyntax();
        $this->Execute();
    }

     

     
    private function Canectar() {

        $this->Conexao = parent::getCanectar();
        $this->Atualizar = $this->Conexao->prepare($this->Atualizar);
  
    }

     
    private function getSyntax() {
        foreach ($this->Dados as $key => $Value):
            $Locais[] = $key .  ' = :' . $key;
        endforeach;
        
        $Locais = implode(', ', $Locais);
        $this->Atualizar = "UPDATE {$this->Tabela} SET {$Locais} {$this->Termos}";
    }

     
    private function Execute() {
        $this->Canectar();

        try {
            $this->Atualizar->execute(array_merge($this->Dados, $this->Locais));
            $this->Resultado = true;
        } catch (Exception $wt) {
            $this->Resultado = null;
            echo "<b>Erro ao Atulizar: {$wt->getMessage()}</b> - {$wt->getCode()}" ;
        }
    }

}
