<?php
  $x = (int) $_POST['x'];

  echo "
  <style>
  th, td {
    border: 0px solid;
    aspect-ratio: 1;
  }
  table {
    aspect-ratio: 1;
    height: 100%;
    border: 1px solid;
    table-layout: fixed;
  }
  </style>
  ";

  echo '<table>'; 

  for ($i = 0; $i < $x; $i++) {
    echo '<tr>';
    if ($i == 0 || $i == $x - 1) for ($j = 0; $j < $x; $j++) echo '<th>*</th>';
    else {
      echo '<th>*</th>';
      for ($j = 0; $j < $x - 2; $j++) echo '<th></th>';
      echo '<th>*</th>';
    }
    echo '</tr>';
  }

  echo '</table>';