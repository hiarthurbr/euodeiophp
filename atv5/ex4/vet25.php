<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vetor 25</title>
</head>
<body>
  <h1>Vetor 25</h1>
  <?php
    $arr = [];
    $media = 0;
    $maior = 0;
    $menor = 0;
    $igual = 0;
    
    while (count($arr) < 25)
      array_push($arr, mt_rand(20, 40));
    
    echo "<ul>";
    foreach ($arr as $key => $value) {
      echo "<li>$value</li>";
      $media += $value;
    }
    echo "</ul>";
    $media /= 25;
    echo "<p>Média: $media</p>";
    foreach ($arr as $key => $value) {
      if ($value > $media) $maior++;
      if ($value < $media) $menor++;
      if ($value == 30) $igual++;
    }
    echo "<p>Quantidade de números maiores que a média: $maior</p>";
    echo "<p>Quantidade de números menores que a média: $menor</p>";
    echo "<p>Quantidade de números iguais a 30: $igual</p>";
  ?>
</body>
</html>