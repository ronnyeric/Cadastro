<?php

class AlunoController {	
	
	private function initSession() {
		if (!isset($_SESSION['alunos'])) {
			$_SESSION['alunos'] = [];
		}
	}

	private function validarMatricula($matricula) {
		return (strlen($matricula) === 8 && preg_match('/^[a-zA-Z]{8}$/', $matricula));
	}

	public function criarAluno($matricula, $nome, $curso){
		$this->initSession();
		
		if (!$this->validarMatricula($matricula)) {
			echo "ERRO: Matrícula deve ter 8 caracteres e somente letras.";
			return false;
		}

		if (isset($_SESSION['alunos'][$matricula])) {
			echo "ERRO: Matrícula já existe.";
			return false;
		}
		
		$aluno = new Aluno($matricula, $nome, $curso);
		$_SESSION['alunos'][$matricula] = serialize($aluno);
		echo "Aluno **" . $nome . "** criado com sucesso! Matrícula: **" . $matricula . "**";
		return true;
	}
	
	public function listarAlunos() {
		$this->initSession();
		
		$alunos = [];
		foreach ($_SESSION['alunos'] as $matricula => $alunoSerializado) {
			$alunos[$matricula] = unserialize($alunoSerializado);
		}
		return $alunos;
	}

	public function buscarAluno($matricula) {
		$this->initSession();

		if (isset($_SESSION['alunos'][$matricula])) {
			return unserialize($_SESSION['alunos'][$matricula]);
		}
		return null;
	}

	public function editarAluno($matricula, $nome, $curso) {
		$this->initSession();
		
		if (isset($_SESSION['alunos'][$matricula])) {
			$aluno = $this->buscarAluno($matricula);
			$aluno->setNome($nome);
			$aluno->setCurso($curso);
			
			$_SESSION['alunos'][$matricula] = serialize($aluno);
			echo "Aluno de matrícula **" . $matricula . "** editado com sucesso.";
			return true;
		}
		
		echo "ERRO: Aluno com matrícula **" . $matricula . "** não encontrado para edição.";
		return false;
	}

	public function excluirAluno($matricula) {
		$this->initSession();
		
		if (isset($_SESSION['alunos'][$matricula])) {
			unset($_SESSION['alunos'][$matricula]);
			echo "Aluno de matrícula **" . $matricula . "** excluído com sucesso.";
			return true;
		}
		
		echo "ERRO: Aluno com matrícula **" . $matricula . "** não encontrado para exclusão.";
		return false;
	}
}
?>