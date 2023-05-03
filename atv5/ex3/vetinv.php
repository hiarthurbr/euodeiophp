<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vetor Inverso</title>
</head>
<body>
  <h1>Vetor Inverso</h1>
  <?php
    $arr = [];
    
    while (count($arr) < 10)
    array_push($arr, mt_rand(1, 100));
    
    echo "<ul>";
    foreach ($arr as $key => $value) {
      echo "<li>$value</li>";
    }
    echo "</ul>";

    $arr2 = array_reverse($arr);
    
    echo "<ul>";
    foreach ($arr2 as $key => $value) {
      echo "<li>$value</li>";
    }
    echo "</ul>";
  ?>
</body>
</html>