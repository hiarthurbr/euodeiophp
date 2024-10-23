<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli </title>

<body>
	<h3>CRUD - PHP com mysqli - Alteração</h3>
	<?php
 include_once "conexao.php";
 // recuperando
 $codigo = $_POST["codigo"];

 // criando a linha do  SELECT
 $sqlconsulta = "select * from tabelaimg where codigo = $codigo";

 // executando instru��o SQL
 $resultado = @mysqli_query($conexao, $sqlconsulta);
 if (!$resultado) {
     echo '<input type="button" onclick="window.location=' .
         "'index.php'" .
         ';" value="Voltar"><br><br>';
     die("<b>Query Inválida:</b>" . @mysqli_error($conexao));
 } else {
     $num = @mysqli_num_rows($resultado);
     if ($num == 0) {
         echo "<b>Código: </b>não localizado !!!!<br><br>";
         echo '<input type="button" onclick="window.location=' .
             "'alteracao.php'" .
             ';" value="Voltar"><br><br>';
         exit();
     } else {
         $dados = mysqli_fetch_array($resultado);
     }
 }
 mysqli_close($conexao);
 ?>
	<form name="produto" action="alterar.php" method="post" enctype="multipart/form-data">
		<b>Código:</b> <input type="number" name="codigo" value='<?php echo $dados[
      "codigo"
  ]; ?>' readonly><br><br>
		<b>Produto:</b> <input type="text" name="produto" maxlength='80' style="width:550px"
			value='<?php echo $dados["produto"]; ?>'><br><br>
		<b>Descrição: </b><br><textarea name="descricao" rows='3' cols='100'
			style="resize: none;"><?php echo $dados["descricao"]; ?></textarea><br><br>
		<b>Data: </b> <input type="date" name="data" value='<?php echo $dados[
      "data"
  ]; ?>'><br><br>
		<b>Valor: R$ </b><input type="number" step="0.01" name="valor" value='<?php echo $dados[
      "valor"
  ]; ?>'> <br><br>
		<b>Imagem: </b><br><img src="imagens/<?php echo $dados[
      "imagem"
  ]; ?>" width="100" height="100"><br><br>
		<b>Alterar imagem para: </b><input type="file" name="imagem" accept="image/*"><br><br>
		<input type="submit" value="Ok">&nbsp;&nbsp;
		<input type="reset" value="Limpar">
		<input type='button' onclick="window.location='alteracao.php';" value="Voltar">
	</form>
</body>

</html>
