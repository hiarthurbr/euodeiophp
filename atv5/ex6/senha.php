<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Senha</title>
  <script type="text/javascript">
    "use strict";
    async function copyToClipboard(text) {
      async function returnQueryOnState(state) {
        try {
          const result = await navigator.permissions.query({ name: "clipboard-write" });
          return result.state === state;
        }
        catch (_a) {
          return false;
        }
      }
      if (await returnQueryOnState("denied")) {
        console.log("Permission to clipboard denied, trying legacy method...");
        try {
          const result = copyFromElement(text);
          if (result)
            console.log('Content copied to clipboard: "', text + '"');
          else
            throw result;
          return result;
        }
        catch (_a) {
          console.log("Failed to copy, giving up.");
          return false;
        }
      }
      else if (typeof navigator.clipboard !== "undefined")
        try {
          await navigator.clipboard.writeText(text);
          console.log('Content copied to clipboard: "', text + '"');
          return true;
        }
        catch (err) {
          console.log("Failed to copy, verifying permission...");
          if (!(await returnQueryOnState("denied")))
            return copyFromElement(text);
          else
            return false;
        }
      else
        return false;
    }
    function copyFromElement(text) {
      try {
        console.warn("This method may return true even if the content was not copied.");
        const input = document.createElement('textarea');
        input.setAttribute('readonly', '');
        input.setAttribute('hidden', '');
        input.value = text;
        document.body.appendChild(input);
        input.select();
        document.execCommand('copy');
        document.body.removeChild(input);
        const result = document.createElement('textarea');
        result.setAttribute('readonly', '');
        result.setAttribute('hidden', '');
        document.body.appendChild(result);
        result.select();
        document.execCommand('paste');
        const copied = result.value;
        document.body.removeChild(result);
        return copied === text;
      }
      catch (_a) {
        return false;
      }
    }
  </script>
</head>

<body>
  <h1>Gerador de senha</h1>
  <?php
  if (isset($_POST['tamanho']) && isset($_POST['primeiro'])) {
    $tamanho = (int) $_POST['tamanho'];
    $first = $_POST['primeiro'];
    $seguintes = isset($_POST['seguintes']) ? $_POST['seguintes'] : [];

    $numeros = range(0, 9);
    $maiusculas = range('A', 'Z');
    $minusculas = range('a', 'z');
    $simbolos = str_split('#$%!@&*');

    $senha = '';

    $p_letra = '';
    $p_letra .= $first == 'numero' ? $numeros[array_rand($numeros)] : '';
    $p_letra .= $first == 'maiuscula' ? $maiusculas[array_rand($maiusculas)] : '';
    $p_letra .= $first == 'minuscula' ? $minusculas[array_rand($minusculas)] : '';
    $p_letra .= $first == 'simbolo' ? $simbolos[array_rand($simbolos)] : '';

    while (strlen($senha) < $tamanho) {
      foreach ($seguintes as $key => $value) {
        $senha .= $value == 'numero' ? $numeros[array_rand($numeros)] : '';
        $senha .= $value == 'maiuscula' ? $maiusculas[array_rand($maiusculas)] : '';
        $senha .= $value == 'minuscula' ? $minusculas[array_rand($minusculas)] : '';
        $senha .= $value == 'simbolo' ? $simbolos[array_rand($simbolos)] : '';
      }
    }

    $senha = str_shuffle($senha);
    $senha = $p_letra . substr($senha, 0, $tamanho - 1);

    echo "<p>$senha</p><button onclick=\"copyToClipboard('$senha')\">Copiar</button>";
  }
  $form = explode("\n", "
        <form action='senha.php' method='post'>
        <label for='tamanho'>Tamanho da senha:</label>
        <input type='number' name='tamanho' id='tamanho' min='8' required" . (isset($tamanho) ? ' value=' . $tamanho : '') . ">
        <br>
        <label for='primeiro'>Primeiro caractere:</label>
        <select name='primeiro' id='primeiro'>
          <option value='numero'" . (isset($first) && $first === "numero" ? ' selected' : '') . ">Número</option>
          <option value='maiuscula'" . (isset($first) && $first === "maiuscula" ? ' selected' : '') . ">Maiúscula</option>
          <option value='minuscula'" . (isset($first) && $first === "minuscula" ? ' selected' : '') . ">Minúscula</option>
          <option value='simbolo'" . (isset($first) && $first === "simbolo" ? ' selected' : '') . ">Símbolo</option>
        </select>
        <br>
        <label for='seguintes'>Seguintes:</label>
        <input type='checkbox' name='seguintes[]' id='numero' value='numero'" . (isset($seguintes) && in_array("numero", $seguintes) ? ' checked' : '') . ">
        <label for='numero'>Número</label>
        <input type='checkbox' name='seguintes[]' id='maiuscula' value='maiuscula'" . (isset($seguintes) && in_array("maiuscula", $seguintes) ? ' checked' : '') . ">
        <label for='maiuscula'>Maiúscula</label>
        <input type='checkbox' name='seguintes[]' id='minuscula' value='minuscula'" . (isset($seguintes) && in_array("minuscula", $seguintes) ? ' checked' : '') . ">
        <label for='minuscula'>Minúscula</label>
        <input type='checkbox' name='seguintes[]' id='simbolo' value='simbolo'" . (isset($seguintes) && in_array("simbolo", $seguintes) ? ' checked' : '') . ">
        <label for='simbolo'>Símbolo</label>
        <br>
        <button type='submit'>Enviar</button>
      </form>");
  foreach ($form as $index => $line)
    $form[$index] = str_replace("'", '"', trim($line));
  echo implode('', $form);
  ?>
</body>
</html>