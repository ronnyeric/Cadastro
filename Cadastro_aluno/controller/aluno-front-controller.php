<?php
session_start();

include("../view/Tela.php");
include("AlunoController.php");
include("../Model/Aluno.php"); 

$matricula = $_POST['matricula'] ?? '';
$nome = $_POST['nome'] ?? '';
$curso = $_POST['curso'] ?? '';
$operacao = $_POST['operacao'] ?? '';
?>

<h1>LISTA DE ALUNOS</h1>
<hr>

<?php

if (empty($operacao)) {
	echo "ERRO: Nenhuma operação selecionada.";
	include("../view/aluno-form.php"); 
	exit;
}

$controller = new AlunoController();
$tela = new Tela();

echo "Operação: " . $operacao . " | Matrícula: " . $matricula . "<br><br>";

switch ($operacao) {
	
	case "criar":
		$controller->criarAluno($matricula, $nome, $curso);
		break;
	
	case "editar":
		$controller->editarAluno($matricula, $nome, $curso);
		break;
	
	case "excluir":
		$controller->excluirAluno($matricula);
		break;
	
	case "listar":
		echo "LISTANDO ALUNOS";
		$alunos = $controller->listarAlunos();
		include("../view/alunos-lista.php");
		break;
		
	default:
		echo "Operação desconhecida.";
		break;
}
?>
<br><hr>
<p><a href="../view/aluno-form.php">Voltar ao Formulário de Alunos</a></p>