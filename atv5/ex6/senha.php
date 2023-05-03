<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Senha</title>
</head>
<body>
  <h1>Gerador de senha</h1>
  <form action="senha.php" method="post">
    <label for="tamanho">Tamanho da senha:</label>
    <input type="number" name="tamanho" id="tamanho" min="8" required>
    <br>
    <label for="primeiro">Primeiro caractere:</label>
    <select name="primeiro" id="primeiro">
      <option value="numero">Número</option>
      <option value="maiuscula">Maiúscula</option>
      <option value="minuscula">Minúscula</option>
      <option value="simbolo">Símbolo</option>
    </select>
    <br>
    <label for="seguintes">Seguintes:</label>
    <input type="checkbox" name="seguintes[]" id="numero" value="numero">
    <label for="numero">Número</label>
    <input type="checkbox" name="seguintes[]" id="maiuscula" value="maiuscula">
    <label for="maiuscula">Maiúscula</label>
    <input type="checkbox" name="seguintes[]" id="minuscula" value="minuscula">
    <label for="minuscula">Minúscula</label>
    <input type="checkbox" name="seguintes[]" id="simbolo" value="simbolo">
    <label for="simbolo">Símbolo</label>
    <br>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if (isset($_POST['tamanho'])) {
      $tamanho = $_POST['tamanho'];
      $primeiro = $_POST['primeiro'];
      $seguintes = $_POST['seguintes'];

      $numeros = range(0, 9);
      $maiusculas = range('A', 'Z');
      $minusculas = range('a', 'z');
      $simbolos = str_split('#$%!@&*');

      $senha = '';
      $senha .= $primeiro == 'numero' ? $numeros[array_rand($numeros)] : '';
      $senha .= $primeiro == 'maiuscula' ? $maiusculas[array_rand($maiusculas)] : '';
      $senha .= $primeiro == 'minuscula' ? $minusculas[array_rand($minusculas)] : '';
      $senha .= $primeiro == 'simbolo' ? $simbolos[array_rand($simbolos)] : '';

      foreach ($seguintes as $key => $value) {
        $senha .= $value == 'numero' ? $numeros[array_rand($numeros)] : '';
        $senha .= $value == 'maiuscula' ? $maiusculas[array_rand($maiusculas)] : '';
        $senha .= $value == 'minuscula' ? $minusculas[array_rand($minusculas)] : '';
        $senha .= $value == 'simbolo' ? $simbolos[array_rand($simbolos)] : '';
      }

      $senha = str_shuffle($senha);
      $senha = substr($senha, 0, $tamanho);

      echo "<p>$senha</p>";
    }
  ?>

</body>
</html>