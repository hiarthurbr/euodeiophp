<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soma & Media</title>
</head>
<body>
  <h1>Soma & Media</h1>
  <?php
    $arr = explode(",", $_POST["array"]);
    foreach ($arr as $i => $v) {
      $arr[$i] = (int) $v;
    }

    function Soma($array) {
      return array_sum($array);
    }

    function Media($array) {
      return Soma($array) / count($array);
    }

    if (!isset($_POST["array"])) {
      echo '<form action="sm.php" method="post" id="form">';
      echo '<label for="num">Adicionar número: </label>';
      echo '<input type="number" name="num" id="num">';
      echo '<input type="button" value="Adicionar" onclick="add(document.getElementById(\'num\').value)">';
  
      echo '<br><br>';
      echo '<label for="nums">Números adicionados: </label>';
      echo '<input type="text" name="nums" id="nums" readonly>';
  
      echo '<br><br>';
      echo '<input type="submit" value="Resolver">';
      echo '<input type="hidden" value="" id="hidden" name="array">';
      echo '</form>';
    }
    else {
      echo "Soma: " . Soma($arr) . "<br>";
      echo "Media: " . Media($arr) . "<br>";
      echo '<form action="sm.php" method="post">';
      echo '<input type="submit" value="Voltar">';
      echo '</form>';
    }
  ?>
  <script>
    const nums = [];
    const num = document.getElementById("num")
    const hidden = document.getElementById("hidden")
    const form = document.getElementById("form")

    form.addEventListener("submit", e => {
      e.preventDefault();
      if (nums.length < 3) return alert("Adicione pelo menos 3 números");
      form.removeChild(num)
      form.removeChild(document.getElementById("nums"))
      form.submit();
    })

    function add(n) {
      n = Number(n);
      if (typeof n !== "number" || isNaN(n)) return
      nums.push(n);
      if (nums.length >= 3) num.required = false;
      document.getElementById("nums").value = nums.toString();
      document.getElementById("hidden").value = nums;
    }
  </script>
</body>
</html>