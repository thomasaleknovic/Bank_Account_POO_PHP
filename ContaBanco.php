<?php

function println(string $string = '')
{
    print($string . PHP_EOL);
}

class ContaBanco {

    // Atributos
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;

     // Métodos especiais
    public function __construct(){
        $this->saldo = 0;
        $this->status = true;
    }

    public  function getNumConta() {
        return $this->numConta;
    }
    public  function setNumConta($num) {
         $this->numConta = $num;
    }
    public  function getTipo() {
        return $this->tipo;
    }
    public  function setTipo($tipo) {
         $this->tipo = $tipo;
    }
    public  function getDono() {
        return $this->dono;
    }
    public  function setDono($dono) {
         $this->dono = $dono;
    }
    public  function getSaldo() {
        return $this->saldo;
    }
    public  function setSaldo($saldo) {
         $this->saldo = $saldo;
    }
    public  function getStatus() {
        return $this->status;
        
    }
    public  function setStatus($status) {
         $this->status = $status;
    }


     // Métodos

    public  function abrirConta($tipo) {

        $this->setTipo($tipo);
        $this->setStatus(true);
        
        if($tipo === "CC") {
            $this->setSaldo(50);
        } elseif ($tipo === "CP") {
            $this->setSaldo(150);
        } else {
            println("Insira um tipo de conta válido.");
        }

        return println("Conta criada com sucesso!");
    }

    public  function fecharConta() {
        
        if ($this->getStatus()) {
            
            if ($this->getSaldo() > 0) {
                println("Conta com dinheiro");
            } elseif ($this->getSaldo() < 0) {
                println("Conta em débito");
            } else {
                $this->setStatus(false);
                println("Conta número $this->numConta encerrada com sucesso!");
            }
        } else {
            println("Conta inexistente");
        }
    }
    public  function depositar($valor) {
        
        if($this->getStatus()) {
            $this->setSaldo($this->getSaldo() + $valor);
            return println("Depósito de $valor na conta de $this->dono");
        } else {
            println("Conta inexistente");
        }
    }
    public  function sacar($valor) {
            
        if($this->getStatus()) {
            
            if ($this->getSaldo() >= $valor) {

                $this->setSaldo($this->getSaldo() - $valor);
                return println("Saque de $valor autorizado na conta de $this->dono");
                
            } else {
                
                println("Saldo insuficiente");
        }
        } else {
            println("Conta inexistente");
        }
    }
    public  function pagarMensal() {
        $custo = 0;

        if ($this->getTipo() === "CC") {
            $custo = 12;
        } elseif ($this->getTipo() === "CP") {
            $custo = 20;
        } else {
            println("Conta inexistente");
        }

        if($this->getStatus()) {
            if($this->getSaldo() > $custo) {
                $this->setSaldo($this->getSaldo() - $custo);
                println("Mensalidade de R$ $custo debitada na conta de $this->dono");
            } else {
                println("Saldo insuficiente");
            }
        } else {
            println("Conta inexistente");
        }
    }
   
    
    

};  