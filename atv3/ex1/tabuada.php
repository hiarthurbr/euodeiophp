<?php
  $x = (int) $_POST['x'];

  for ($i = 1; $i <= 10; $i++) {
    $r = $x * $i;
    echo "$i x $x = $r<br>";
  }