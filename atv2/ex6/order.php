<?php
  $arr = explode(",", $_POST["array"]);
  foreach ($arr as $i => $v) {
    $arr[$i] = (int) $v;
  }
  sort($arr);

  $r = true;
  foreach ($arr as $i => $v) {
    if ($arr[0] != $v) {
      $r = false;
      break;
    }
  }

  echo "Array ordenado: ".implode(", ", $arr)."<br><br>";

  if ($r) echo "Todos os valores são iguais";
  else echo "Valores diferentes";