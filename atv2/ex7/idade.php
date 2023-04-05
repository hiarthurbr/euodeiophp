<?php
  $idade = (int) $_POST["idade"];
  if ($idade >= 18)
    echo "Maior de idade";
  elseif ($idade > 65) echo "Maior de 65 anos";
  else echo "Menor de idade";
?>