<?php

function Calc($forma, $base, $altura, $lado, $base_maior, $base_menor, $lado1, $lado2) {
  if ($forma == "retangulo") {
    return 2 * ($base + $altura);
  }
  if ($forma == "quadrado") {
    return 4 * $lado;
  }
  
  if ($forma == "paralelogramo") {
    return 2 * ($base + $altura);
  }
  
  if ($forma == "trapezio") {
    return $base_maior + $base_menor + $lado1 + $lado2;
  }
}

echo Calc($_POST["forma"], $_POST["base"], $_POST["altura"], $_POST["lado"], $_POST["base_maior"], $_POST["base_menor"], $_POST["lado1"], $_POST["lado2"]);

?>