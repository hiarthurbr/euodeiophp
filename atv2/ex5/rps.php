<?php
  // Rock Paper Scissors
  // 1 = Rock, 2 = Paper, 3 = Scissors
  $player1 = (int) $_POST["weapon"];
  $player2 = rand(1, 3);
  
  if ($player1 == $player2)
    echo "Empate!";
  elseif ($player1 == 1 && $player2 == 2)
    echo "PHP Venceu!";
  elseif ($player1 == 1 && $player2 == 3)
    echo "Você venceu!";
  elseif ($player1 == 2 && $player2 == 1)
    echo "Você venceu!";
  elseif ($player1 == 2 && $player2 == 3)
    echo "PHP Venceu!";
  elseif ($player1 == 3 && $player2 == 1)
    echo "PHP Venceu!";
  elseif ($player1 == 3 && $player2 == 2)
    echo "Você venceu!";

  echo "<br>";
  echo "Você escolheu: ";
  if ($player1 == 1) echo "Pedra";
  elseif ($player1 == 2) echo "Papel";
  elseif ($player1 == 3) echo "Tesoura";
  echo "<br>";
  echo "PHP escolheu: ";
  if ($player2 == 1) echo "Pedra";
  elseif ($player2 == 2) echo "Papel";
  elseif ($player2 == 3) echo "Tesoura";

  echo "<br><br><a href='rps.html'>Jogar novamente</a>"
?>