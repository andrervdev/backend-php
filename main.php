<?php

require_once __DIR__ . '/vendor/autoload.php';

use Moovin\Job\Backend\contaCorrente as contaCorrente; 
use Moovin\Job\Backend\contaPoupanca as contaPoupanca; 

$contaCorrente = new contaCorrente();
$contaPoupanca = new contaPoupanca();

$contaCorrente->deposito(2000);
$contaPoupanca->deposito(1000);  

echo "\n O Saldo atual da conta Corrente é: B$ ". number_format($contaCorrente->getSaldoConta(),2,",",".");
echo "\n\n O Saldo atual da conta Poupanca é: B$ ".number_format($contaPoupanca->getSaldoConta(),2,",",".");

$contaPoupanca->transferencia($contaCorrente, 500);

echo "\n\n O Saldo atual da conta Poupanca após a transferência de B$ 500,00  é: B$ ".number_format($contaPoupanca->getSaldoConta(),2,",",".");
echo "\n\n O Saldo atual da conta Corrente apos receber a transferência de B$ 500,00 é: B$ ". number_format($contaCorrente->getSaldoConta(),2,",",".");

$contaCorrente->saque(50);
$contaPoupanca->saque(100);

echo "\n\n O Saldo atual da conta Corrente após o saque de B$ 50,00 é: B$ ". number_format($contaCorrente->getSaldoConta(),2,",",".");
echo "\n\n O Saldo atual da conta Poupanca após o saque de B$ 100,00 é: B$ ".number_format($contaPoupanca->getSaldoConta(),2,",",".");

//Transferencia sem limite suficiente na conta
$contaPoupanca->transferencia($contaCorrente, 700);

//Saque sem limite suficiente na conta Poupança
$contaCorrente->saque(650);

//Saque sem limite suficiente na conta Poupança
$contaPoupanca->saque(1050);

