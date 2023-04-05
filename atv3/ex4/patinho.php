<?php
  $p = (int) $_POST['x'];
  $po = (int) $_POST['x'];

  while ($p > 0) {
    $patinho = "";
    for ($i = 0; $i < $p; $i++) {
      $patinho .= "🦆";
    }

    if ($p == 1) echo "$patinho foi passear<br>";
    else echo "$patinho foram passear<br>";
    echo "
    Além das montanhas<br>
    Para brincar<br>
    A mamãe gritou: Quá, quá, quá, quá<br>";
    $p--;

    $patinho = "";
    for ($i = 0; $i < $p; $i++) {
      $patinho .= "🦆";
    }

    if ($p == 1) echo "Mas só $patinho voltou de lá.<br><br><br>";
    elseif ($p == 0) echo "Mas nenhum 🦆 voltou de lá.<br><br><br>";
    else echo "Mas só $patinho voltaram de lá.<br><br><br>";
  }

  $patinho = "";
  for ($i = 0; $i < $po; $i++) {
    $patinho .= "🦆";
  }

  echo "
  A mamãe patinha foi procurar<br>
  Além das montanhas<br>
  Na beira do mar<br>
  A mamãe gritou: Quá, quá, quá, quá<br>
  E os $patinho voltaram de lá.
  ";