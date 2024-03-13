<?php
  
    include "progress_class.php";
    
    class chamaprogress extends progress
    {

            var $ws = "chamaprogress"; // Letra Minuscula por causa do progress
         
            function executarprogress($acao,$novaentrada,$pf=null,$propath=null)
            {
                  
                    $dadosConexao = defineConexaoProgress();
                    $progresscfg    = $dadosConexao['progresscfg'];
                    $dlc            = $dadosConexao['dlc'];
                    $tmp            = $dadosConexao['tmp'];
                    $proginicial    = $dadosConexao['proginicial'];
                    if ($pf == null ) {
                        $pf             = $dadosConexao['pf'];
                    } 
                    if ($propath == null) {
                        $propath        = $dadosConexao['propath'];
                    }
                    
                    $this->progress($dlc,$pf,$propath,$progresscfg,$tmp);

                    $this->parametro = "TERM!ws!acao!entrada!tmp!";

                    //  echo $propath;
                    $this->acao = $acao; // 09082022 helio -  para colocar como -param 

                    $this->parametros = "ansi!" . $this->ws . "!" . $acao . "!"  . $novaentrada . "!" . $tmp . "!";
                  
                    $this->executa($proginicial);

                    return $this->progress;

            }

    }
    
    
?>
