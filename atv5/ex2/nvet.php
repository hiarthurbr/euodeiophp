<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>N Vetor</title>
</head>
<body>
  <h1>N Vetor</h1>
  <form action="" method="post">
    <label for="n">N:</label>
    <input type="number" name="n" id="n" min="1" required>
    <button type="submit">Enviar</button>
  </form>
  <?php
    if (isset($_POST['n'])) {
      $n = $_POST['n'];
      $arr = [];
      $pares = 0;
      $impares = 0;

      while (count($arr) < $n)
        array_push($arr, mt_rand(1, 100));

      echo "<ul>";
      foreach ($arr as $key => $value) {
        if ($value % 2 == 0) {
          echo "<li>$value é par</li>";
          $pares++;
        } else {
          echo "<li>$value é impar</li>";
          $impares++;
        }
      }
      echo "</ul>";
      echo "<p>Quantidade de pares: $pares</p>";
      echo "<p>Quantidade de impares: $impares</p>";
    }
  ?>
</body>
</html>