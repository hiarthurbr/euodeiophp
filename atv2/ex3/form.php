<?php
  $sexo = $_POST["sexo"];
  $idade = (int) $_POST["idade"];

  if ($sexo == "m" && $idade >= 21)
    echo "$_POST[nome], Você foi ACEITO !";
  else echo "$_POST[nome], Você NÃO foi ACEITO !!!";