<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli </title>

<body>
	<h3>CRUD - PHP com mysqli - Alteração</h3>
	<?php
 include_once "conexao.php";
 // recuperando
 $codigo = $_POST["codigo"];
 $produto = $_POST["produto"];
 $descricao = $_POST["descricao"];
 $data = $_POST["data"];
 $valor = $_POST["valor"];
 $imagem = $_FILES["imagem"];

 // movendo a imagem para a pasta imagens
 $nome_imagem = $imagem["name"];
 $nome_temporario = $imagem["tmp_name"];
 $destino = "imagens/" . $nome_imagem;
 move_uploaded_file($nome_temporario, $destino);

 // criando a linha do  UPDATE
 $sqlupdate = "update tabelaimg set produto='$produto', descricao='$descricao',data='$data',valor=$valor,imagem='$nome_imagem' where codigo=$codigo";

 // executando instru��o SQL
 $resultado = @mysqli_query($conexao, $sqlupdate);
 if (!$resultado) {
     echo '<input type="button" onclick="window.location=' .
         "'index.php'" .
         ';" value="Voltar"><br><br>';
     die("<b>Query Inválida:</b>" . @mysqli_error($conexao));
 } else {
     echo "Registro Alterado com Sucesso";
 }
 mysqli_close($conexao);
 ?>
	<br><br>
	<input type='button' onclick="window.location='alteracao.php';" value="Voltar">
</body>

</html>
