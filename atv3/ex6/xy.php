<?php
  $x = (int) $_POST['x'];
  $y = (int) $_POST['y'];

  $x++;
  $sum = 0;
  echo "<p>";
  for (; $x < $y; $x++) {
    echo "$x";
    if ($x < $y - 1) echo ", ";
    if ($x % 2 == 1) $sum += $x;
  }

  echo "</p><br><br>Soma dos ímpares: $sum";