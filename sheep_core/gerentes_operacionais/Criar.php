<?php
 
class Criar extends Conexao {

    private $Tabela;
    private $Dados;
    private $Resultado;
    private $Criar;
    private $Conexao;

     
    public function Criacao($Tabela, array $Dados) {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;

        
        $this->getLogica();
        $this->Execute();
    }

     

    public function getResultado() {
        return $this->Resultado;
    }

     
    private function Conectar() {
        $this->Conexao = parent::getCanectar();
        $this->Criar = $this->Conexao->prepare($this->Criar);
        
    }

      
    private function getLogica() {
        $Fileds = implode(', ', array_keys($this->Dados));
        $Places = ':' . implode(', :', array_keys($this->Dados));
        $this->Criar = "INSERT IGNORE INTO {$this->Tabela} ({$Fileds}) VALUES ({$Places})";
    
    }

      
    private function Execute() {
        $this->Conectar();
        
        try {
            $this->Criar->execute($this->Dados);
            $this->Resultado = $this->Conexao->lastInsertId();
        } catch (Exception $wt) {
            $this->Resultado = null;
            print "<b>Erro ao cadastrar: {$wt->getMessage()} {$wt->getCode()}</b> ";
        }
    }

}
