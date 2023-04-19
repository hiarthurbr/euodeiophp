<?php

if ($_POST["forma"] == "retangulo") {
  echo Retangulo ($_POST["base"], $_POST["altura"]);
}
if ($_POST["forma"] == "quadrado") {
  echo Quadrado ($_POST["lado"]);
}

if ($_POST["forma"] == "paralelogramo") {
  echo Paralelogramo ($_POST["base"], $_POST["altura"]);
}

if ($_POST["forma"] == "trapezio") {
  echo Trapezio ($_POST["base_maior"], $_POST["base_menor"], $_POST["lado1"], $_POST["lado2"]);
}

function Retangulo($base, $altura) {
  return 2 * ($base + $altura);
}

function Quadrado($lado) {
  return 4 * $lado;
}

function Paralelogramo ($base, $altura) {
  return 2 * ($base + $altura);
}
function Trapezio($baseMaior, $baseMenor, $lado1, $lado2) {
  return $baseMaior + $baseMenor + $lado1 + $lado2;
}
?>