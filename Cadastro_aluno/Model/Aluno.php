<?php

class Aluno {	
	private $matricula;
	private $nome;
	private $curso;
	
	public function __construct($matricula, $nome, $curso) {
		$this->matricula = $matricula;
		$this->nome = $nome;
		$this->curso = $curso;
	}

	public function getMatricula(){
		return $this->matricula;
	}
	
	public function setMatricula($matricula){
		$this->matricula = $matricula;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getCurso(){
		return $this->curso;
	}
	
	public function setCurso($curso){
		$this->curso = $curso;
	}
}
?>