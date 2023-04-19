<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perímetros formas geométricas</title>
    </head>
    <body>
        <h1>Calcular perímetros das formas geométricas</h1>
        <h2>Escolha uma forma geométrica: </h2>
        <?php
            $action = 'perimetros.php';
            $forma = '';
            $btn_name = 'Escolher forma';

            if (isset($_POST['forma'])) {
                $action = 'perimetros_funcs.php';
                $forma = $_POST['forma'];
                $btn_name = 'Calcular perimetro';
            }

            $retangulo_selected = $forma == 'retangulo' ? 'checked' : '';
            $quadrado_selected = $forma == 'quadrado' ? 'checked' : '';
            $paralelogramo_selected = $forma == 'paralelogramo' ? 'checked' : '';
            $trapezio_selected = $forma == 'trapezio' ? 'checked' : '';

            echo "<form method=\"POST\" action=\"$action\" >";
            echo "<input type=\"radio\" name=\"forma\" value=\"retangulo\" required $retangulo_selected>";
            echo '<label for="retangulo">Retângulo</label><br>';
            echo "<input type=\"radio\" name=\"forma\" value=\"quadrado\" required $quadrado_selected>";
            echo '<label for="quadrado">Quadrado</label><br>';
            echo "<input type=\"radio\" name=\"forma\" value=\"paralelogramo\" required $paralelogramo_selected>";
            echo '<label for="paralelogramo">Paralelogramo</label><br>';
            echo "<input type=\"radio\" name=\"forma\" value=\"trapezio\" required $trapezio_selected>";
            echo '<label for="retangulo">Trapézio</label><br><br><br>';

            if ($forma == 'retangulo') {
                // <!-- Retangulo -->
                echo '<label for="base">Base</label><br>';
                echo '<input type="number" name="base" value="0" min="0" step="0.01"><br><br>';
                echo '<label for="altura">Altura</label><br><br>';
                echo '<input type="number" name="altura" value="0" min="0" step="0.01"><br>';
                // <!-- Retangulo -->
            }

            if ($forma == 'quadrado') {
                // <!-- Quadrado -->
                echo '<label for="lado">Lado</label><br>';
                echo '<input type="number" name="lado" value="0" min="0" step="0.01"><br><br>';
                // <!-- Quadrado -->
            }

            if ($forma == 'paralelogramo') {
                // <!-- Paralelogramo -->
                echo '<label for="base">Base</label><br>';
                echo '<input type="number" name="base" value="0" min="0" step="0.01"><br><br>';
                echo '<label for="altura">Altura</label><br>';
                echo '<input type="number" name="altura" value="0" min="0" step="0.01"><br><br>';
                // <!-- Paralelogramo -->
            }

            if ($forma == 'trapezio') {
                // <!-- Trapézio -->
                echo '<label for="base_maior">Base maior</label><br>';
                echo '<input type="number" name="base_maior" value="0" min="0" step="0.01"><br><br>';
                echo '<label for="base_menor">Base menor</label><br>';
                echo '<input type="number" name="base_menor" value="0" min="0" step="0.01"><br><br>';
                echo '<label for="lado1">Lado 1</label><br>';
                echo '<input type="number" name="lado1" value="0" min="0" step="0.01"><br><br>';
                echo '<label for="lado2">Lado 2</label><br>';
                echo '<input type="number" name="lado2" value="0" min="0" step="0.01"><br><br>';
                // <!-- Trapézio -->
            }

            echo "<input type=\"submit\" value=\"$btn_name\">";
            echo '</form>';
        ?>

        <br><br><br><br>
        <form action="perimetros.php" method="post">
            <input type="submit" value="Resetar escolha">
        </form>
    </body>
</html>