<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Positivo ou Negativo</title>
</head>
<body>
  <?php
    $i = (int) $_POST["num"];
    function PositivoNegativo($num) {
      if ($num > 0) return "P";
      return "N";
    }

    if (isset($_POST["num"])) echo PositivoNegativo($i);

    else echo '<form action="pn.php" method="post">
      <label for="num">Digite um número: </label>
      <input type="number" name="num" id="num">
      <input type="submit" value="Verificar">
    </form>';
  ?>
</body>
</html>