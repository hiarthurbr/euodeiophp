<?php
if (!isset($_GET["id"])) {
    header("Location: /fotografias/");
    exit();
}

$id = $_GET["id"];

include_once "conexao.php";

$query = mysqli_query($conexao, "SELECT * FROM galeria WHERE `id` = $id");
$post = mysqli_fetch_assoc($query);

if (!$post) {
    header("Location: /fotografias/");
    exit();
}

mysqli_query($conexao, "DELETE FROM galeria WHERE `id` = $id");
unlink("imagens/" . $post["imagem"]);

echo "Imagem apagada com sucesso!";
echo "<br><br>";
echo '<input type="button" onclick="window.location=\'/fotografias/criar_form.html\';" value="Cadastrar nova imagem" />';
echo "<br><br>";
echo '<input type="button" onclick="window.location=\'/fotografias\';" value="Voltar" />';

?>
