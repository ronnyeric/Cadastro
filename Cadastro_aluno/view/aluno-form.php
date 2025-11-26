<hr>
<h2> MATRICULA DE ALUNOS </h2>
<form method="post" action="../controller/aluno-front-controller.php">

  Matrícula :
  <input type="text" name="matricula" maxlength="8" required><br>

  Nome do Aluno:
  <input type="text" name="nome"><br>
  
  Curso: 
  <input type="text" name="curso"><br>
  
  Operação:
  <select name="operacao" required>
    <option value="criar">1. Criar Aluno</option>
	<option value="editar">2. Editar Aluno (usa matrícula, nome e curso)</option>
	<option value="excluir">3. Excluir Aluno (usa apenas matrícula)</option>
	<option value="listar">4. Listar Alunos</option>
  </select>
  
  <input type="submit" name="confirmar" value="Confirmar Operação"><br>
</form>
<hr>
<p><a href="form.php">Voltar ao Caixa Eletrônico</a></p>
