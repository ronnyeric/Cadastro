<?php

class ContaCorrente extends Conta {	

   private $limiteChequeEspecial = null;
   
   public function getLimiteChequeEspecial() {
	   return $this->limiteChequeEspecial;
   }
   
   public function setLimiteChequeEspecial($limite) {
	   $this->limiteChequeEspecial = $limite;
   }
}
?>