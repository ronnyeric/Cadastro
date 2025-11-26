<?php

abstract class Conta {	
	private $numero;
	private $saldo;
	
	public function getNumero(){
		return $this->numero;
	}
	
	public function setNumero($numero){
		$this->numero = $numero;
	}
	
	public function criarConta($numero){
		$this->numero = $numero;
		$this->saldo = 0.0; 
	}
	
	public function setSaldo($saldo){
		$this->saldo = (float)$saldo;
	}
	
	public function getSaldo(){
		return $this->saldo;
	}

	public function depositar($valor) {
		$valor = (float)$valor;
		
		if($valor <= 0 ){
			return false;
		} 
		
		$this->saldo += $valor;
		
		return true;
	}

	public function sacar($valor) {
		$valor = (float)$valor;
		
		if($valor <= 0 ){
			return 1; // Valor inválido
		}

		if($valor > $this->saldo ){
			return 2; // Saldo insuficiente
		}		
		
		$this->saldo -= $valor;
		
		return 3; // Sucesso
	}

	public function transferir($contaTransferencia, $valor) {
		
		$resSaque = $this->sacar($valor);
		
		if ($resSaque != 3){
			return false;
		}
		
		$resDeposito = $contaTransferencia->depositar($valor);
		
		if (!$resDeposito){
			// Reverte o saque se o depósito falhar
			$this->saldo += (float)$valor; 
			return false; 
		}
		
		return true;
	}	
}
?>