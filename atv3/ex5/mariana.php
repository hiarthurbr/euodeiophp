
<?php
  $p = (int) $_POST['x'];
  
  $acc = "";

  for ($i = 1; $i <= $p; $i++) {
    echo "Mariana conta $i<br>";
    echo "Mariana conta $i<br>";
    
    if ($acc == "") $acc = "É 1, ";
    else $acc = "$acc é $i, ";

    echo "$acc<br>";
    echo "<br>É Ana Viva Mariana, Viva Mariana<br><br><br>";
  }