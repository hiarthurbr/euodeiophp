<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title> CRUD - PHP com mysqli </title>
<body>
<h3>CRUD - PHP com mysqli - Inclusão</h3>
<?php
include_once "conexao.php";
// recuperando
$descricao = $_POST["descricao"];
$imagem = $_FILES["imagem"];

// movendo a imagem para a pasta imagens
$nome_imagem =
    bin2hex(random_bytes(8)) .
    "." .
    strtolower(pathinfo($imagem["name"], PATHINFO_EXTENSION));
$nome_temporario = $imagem["tmp_name"];
$destino = "imagens/" . $nome_imagem;
move_uploaded_file($nome_temporario, $destino);

// criando a linha de INSERT
$sqlinsert = "insert into galeria (descricao, imagem) values ('$descricao', '$nome_imagem')";

// executando instru��o SQL
$resultado = @mysqli_query($conexao, $sqlinsert);
if (!$resultado) {
    echo '<input type="button" onclick="window.location=' .
        "'index.php'" .
        ';" value="Voltar"><br><br>';
    die("<b>Query Inválida:</b>" . @mysqli_error($conexao));
} else {
    echo "Registro Cadastrado com Sucesso";
}
mysqli_close($conexao);
?>
<br><br>
<input type='button' onclick="window.location='index.php';" value="Voltar">
</body>
</html>
