<?php
  $num = (int) $_POST["num"];
  $rng = mt_rand(0, 10);
  $res = $num + $rng;

  $iseven = $res % 2 == 0;
  if ($_POST["poi"] == "par" && $iseven)
    echo "Você venceu!";
  elseif ($_POST["poi"] == "impar" && !$iseven)
    echo "Você venceu!";
  else
    echo "PHP venceu!";

  echo "<br>";
  echo "Você escolheu: ";
  if ($_POST["poi"] == "par") echo "Par";
  else echo "Ímpar";
  echo "<br>";
  echo "Você jogou: $num";
  echo "<br>";
  echo "PHP jogou: $rng";
  echo "<br><br>";
  echo "Resultado: $res"." (".($iseven ? "Par" : "Ímpar").")";

  echo "<br><br><a href='poi.html'>Jogar novamente</a>";