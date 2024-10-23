<!DOCTYPE html>
<html lang="en">

<body class="select-none">
    <header>
        <input
            type="button"
            onclick="window.location='/fotografias/criar_form.html';"
            value="Cadastrar nova imagem"
        />
    </header>
    <main>
        <table style="width: 100%">
          <tr>
            <th>Descrição</th>
            <th>Ver imagem</th>
            <th>Apagar imagem</th>
          </tr>
          <?php
          include_once "conexao.php";
          $query = mysqli_query(
              $conexao,
              "SELECT * FROM galeria ORDER BY `id` DESC"
          );
          $query_array = mysqli_fetch_all($query);

          // for each index in the array, create a card

          foreach ($query_array as $post) {
              echo "<tr>";
              echo "<td>" . $post[1] . "</td>";
              echo '<td><a href="/fotografias/foto.php?id=' .
                  $post[0] .
                  '"><img src="/fotografias/estatico/lupa.png" height="50" width="50"></a></td>';
              echo '<td><a href="/fotografias/excluir.php?id=' .
                  $post[0] .
                  '"><img src="/fotografias/estatico/excluir.png" height="50" width="50"></a></td>';
              echo "</tr>";
          }
          ?>
        </table>
    </main>

</body>

</html>
