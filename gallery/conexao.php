<?php
$host = "localhost";
$user = "Kj7732w8zAcyVSUiDfJKJXXsNnhSXbmn";
$pass = "vsiwlluFaJbhtbnzQjFmUrYJczq7SI8Q";
$banco = "euodeiophp";

$conexao = @mysqli_connect($host, $user, $pass, $banco)
  or die("Problemas com a conexão do Banco de Dados");

mysqli_query($conexao, "DELETE FROM session WHERE expires_at < " . time());