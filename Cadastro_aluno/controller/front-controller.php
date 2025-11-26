<?php
session_start();

include("../view/Tela.php");
include("ContaController.php");
include("../Model/Conta.php"); 
include("../Model/ContaCorrente.php");
include("../Model/ContaSalario.php");

$conta = null;

$numeroConta = $_POST['conta'] ?? '';
$valor = $_POST['valor'] ?? '';
$operacao = $_POST['operacao'] ?? '';
$tipoConta = $_POST['tipo'] ?? '';
$contaTransferencia = $_POST['contaTransferencia'] ?? '';


echo "Nº Conta: " . $numeroConta . "<br>";
echo "Valor: " . $valor . "<br>";
echo "Operação: " . $operacao . "<br>";
?>

<br>

<?php

  $controller = new ContaController();
  
  $valor = str_replace(",", ".", $valor);
  


  switch ($operacao) {
	  
	  case "criar":
	    echo "CRIANDO";
		
		$controller->criarConta($numeroConta, $valor, $tipoConta);
	
		break;
	  
	  case "sacar":
	    echo "SACANDO";

		$controller->sacar($numeroConta, $valor);
		
	  break;
	  
	  case "depositar":
	    echo "DEPOSITANDO";
		
		$controller->depositar($numeroConta, $valor);
		
	  break;
	  
	  case "transferencia":
	    echo "TRANSFERINDO";
	
		$controller->transferir($numeroConta, $contaTransferencia, $valor);
		
	  break;
	  
	  case "dadosConta":
	    $controller->show($numeroConta);
	  break;
	  
	  case "listarContas":
	    $tela = new Tela();
		$tela->exibir('contas');	  
	  break;
	}
?>