<?php

namespace Moovin\Job\Backend;

abstract class conta
{
    protected $saldoConta;
    

    public function __construct()
    {
        $this->saldoConta = (float) 0;
    }

    /**
     * Função que retorna o saldo de uma conta
     */

    public function getSaldoConta()
    {
        return $this->saldoConta; 
    }

    /**
     * Função que recebe um valor a ser depositado em uma conta
     */

     public function deposito($valor)
     {
         $this->saldoConta += $valor;
     }

     /**
     * Função que efetua um saque da conta validando se há saldo 
     * suficiente e se não foi excedido o limite da conta
     */

    public function saque($valor)
    {
        //verifica o saldo atual da conta
        $saldoAtual = $this->getSaldoConta(); 
        
        if($valor <= $this->limiteSaque && ($valor + $this->taxaOp) <= $saldoAtual)
        {
            $this->saldoConta -= ($valor + $this->taxaOp);
        }else{
            echo "\n\n Saldo insuficiente ou limite excedido para efetuar o saque de B$ " .number_format($valor,2,",","."). ". O seu limite de saque é: B$ " .number_format($this->limiteSaque,2,",",".");
        }
    }

     /**
     * Função que transfere um valor de uma conta oara outra
     */

    public function transferencia($conta, $valor)
    {
         //verifica o saldo atual da conta
         $saldoAtual = $this->getSaldoConta();

         //Verifica se há saldo suficiente para fazer a transferencia
         if($valor <= $saldoAtual)
         {
            $this->saldoConta -= $valor;
            $conta->deposito($valor);
         }else{
             echo  "\n\n Não há saldo suficiente para realizar a transferêcia";
         }
    }
    
}