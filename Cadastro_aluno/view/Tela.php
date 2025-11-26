<?php

class Tela {	

   public function exibir($view) {
	   
	  $view .= ".php"; 

	  // Nota: Em um projeto real, você incluiria headers e footers aqui
	  include($view);
   }
}
?>