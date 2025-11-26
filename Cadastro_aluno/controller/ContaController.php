<?php

class ContaController {	

	public function criarConta($numeroConta, $valor, $tipoConta){
		$this->numeroConta = $numeroConta;
		
		if($tipoConta == "salario") {
			$conta = new ContaSalario();
		} else {
			$conta = new ContaCorrente();
		}
				
		$conta->criarConta($numeroConta);
		$conta->setSaldo($valor);
	
		$_SESSION[$numeroConta] = serialize($conta);
	}
	
	public function depositar($numeroConta, $valor) {
		
		$conta = unserialize($_SESSION[$numeroConta]);
		
		$res = $conta->depositar($valor);
		
		if($res){
			echo "Valor de " . $valor . " depositado com sucesso";
		} else {
			echo "Valor inválido";
		}  
		
		$_SESSION[$numeroConta] = serialize($conta);
	}

	public function sacar($numeroConta, $valor) {
		
		echo "Sacando pelo controller";
		
		$conta = unserialize($_SESSION[$numeroConta]);
		
		$res = $conta->sacar($valor);
		
		if($res == 3){
			echo "Valor de " . $valor . " sacado com sucesso";
		} else {
			echo "Valor inválido Cod.: " . $res;
		}  
				
		$_SESSION[$numeroConta] = serialize($conta);
	}

	public function transferir($numeroConta, $contaTransferencia, $valor) {
			
	
		$conta = unserialize($_SESSION[$numeroConta]);
		$contaTransferenciaObj = unserialize($_SESSION[$contaTransferencia]);
		
		$res = $conta->transferir($contaTransferenciaObj, $valor);

		if($res){
			echo "Valor de " . $valor . " transferido com sucesso";
		} else {
			echo "Erro ao transferir";
		}  
		
		$_SESSION[$numeroConta] = serialize($conta);
		$_SESSION[$contaTransferencia] = serialize($contaTransferenciaObj);

	}
	
	public function show($numeroConta){
		echo "## 📊 Saldo da Conta: **" . $numeroConta . "** ##<br>"; 
		
		if (!isset($_SESSION[$numeroConta])) {
			echo "ERRO: Conta não encontrada na sessão.";
			return;
		}
		
		$conta = unserialize($_SESSION[$numeroConta]);
		
		echo "Seu Saldo Atual é: **R$ " . number_format($conta->getSaldo(), 2, ',', '.') . "**";   
	}
}
?>