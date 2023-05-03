<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiplos de 6</title>
</head>
<body>
  <h1>Lista dos multiplos de 6 entre 1 e 100</h1>
  <?php
    $arr = [];

    while (count($arr) < 30)
      array_push($arr, mt_rand(1, 100));

    echo "<ul>";
    foreach ($arr as $key => $value) {
      if ($value % 6 == 0) echo "<li>$value</li>";
    }
    echo "</ul>";
  ?>
</body>
</html>