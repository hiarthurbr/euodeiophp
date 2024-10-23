<?php
if (!isset($_GET["id"])) {
    echo "ID não informado";
    die();
    // header("Location: /fotografias/");
    // exit();
}

$id = $_GET["id"];

include_once "conexao.php";

$query = mysqli_query($conexao, "SELECT * FROM galeria WHERE `id` = $id");
$post = mysqli_fetch_assoc($query);

if (!$post) {
    print_r($post);
    die();
    // header("Location: /fotografias/");
    // exit();
}

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Imagem</title>";
echo "</head>";
echo "<body>";
echo "<img src='/fotografias/imagens/" .
    $post["imagem"] .
    "' alt='Imagem' style='width: 100%'>";
echo "<p>" . $post["descricao"] . "</p>";
echo "</body>";
echo "</html>";
?>
