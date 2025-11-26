CAIXA ELETRONICO<hr>
<form method="post" action="../controller/front-controller.php">

  Nº Conta: 
  <input type="text" name="conta"><br>

  Valor:
  <input type="text" name="valor"  value="0,00"><br>
  
   Nº Conta Para transferencia: 
  <input type="text" name="contaTransferencia"><br>

  Operação:
  <select name="operacao">
    <option value="criar">criar</option>
	<option value="sacar">sacar</option>
	<option value="depositar">depositar</option>
	<option value="transferencia">transferencia</option>
	<option value="dadosConta">exibir saldo</option>
	<option value="listarContas">Listar contas</option>
  </select>
  
  Tipo de Conta:
  <select name="tipo">
    <option value="salario">salario</option>
	<option value="corrente">corrente</option>
  </select>
  
  <input type="submit" name="confirmar" value="confirmar"><br>
</form>

<hr>
<h2>Acesse o CRUD de Alunos</h2>
<a href="aluno-form.php">Voltar para *Alunos*</a>
<hr>