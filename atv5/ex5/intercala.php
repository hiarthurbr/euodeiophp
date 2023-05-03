<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Intercalada</title>
</head>
<body>
  <h1>Intercalada</h1>
  <?php
    $arr1 = [];
    $arr2 = [];
    $arr3 = [];
    
    while (count($arr1) < 10)
      array_push($arr1, mt_rand(1, 100));
    
    while (count($arr2) < 10)
      array_push($arr2, mt_rand(1, 100));
    
    echo "<ul>";
    foreach ($arr1 as $key => $value) {
      echo "<li>$value</li>";
    }
    echo "</ul>";
    
    echo "<ul>";
    foreach ($arr2 as $key => $value) {
      echo "<li>$value</li>";
    }
    echo "</ul>";
    
    for ($i=0; $i < 10; $i++) { 
      array_push($arr3, $arr1[$i]);
      array_push($arr3, $arr2[$i]);
    }
    
    echo "<ul>";
    foreach ($arr3 as $key => $value) {
      echo "<li>$value</li>";
    }
    echo "</ul>";
  ?>
</body>
</html>