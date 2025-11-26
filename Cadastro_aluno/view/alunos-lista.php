<?php 
// Variável $alunos é definida no front-controller

echo "<h2>Lista de Alunos Cadastrados</h2>";

if (empty($alunos)) {
	echo "<p>Nenhum aluno cadastrado.</p>";
} else {
	echo "<table border='1'>";
	echo "<tr><th>Matrícula</th><th>Nome</th><th>Curso</th></tr>";
	
	foreach ($alunos as $aluno) {
		echo "<tr>";
		echo "<td>" . $aluno->getMatricula() . "</td>";
		echo "<td>" . $aluno->getNome() . "</td>";
		echo "<td>" . $aluno->getCurso() . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
<hr>
<p><a href="../view/aluno-form.php">Formulário de Alunos</a></p>