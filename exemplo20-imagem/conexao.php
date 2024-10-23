<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$banco = "mysql";

$conexao = @mysqli_connect($host, $user, $pass, $banco)
	or die("Problemas com a conexão do Banco de Dados");
?>
