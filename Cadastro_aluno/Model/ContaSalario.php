<?php

class ContaSalario extends Conta {	

   private $cnpj = null;
   
   public function getCNPJ() {
	   return $this->cnpj;
   }
   
   public function setCNPJ($cnpj) {
	   $this->cnpj = $cnpj;
   }
}
?>