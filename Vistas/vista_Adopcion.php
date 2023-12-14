<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Nueva Adopcion</h2>
    <form action='' method="post">
      <lable


    </form>
    <?php
    $resultados = $adopcion->obtieneTodos();
        
        if (!empty($resultados)) {
            echo "<table border='1'>";
            
            // Cabecera de la tabla 
            echo "<tr>";
            foreach ($resultados[0] as $columna => $valor) {
                echo "<th>$columna</th>";
            }
            echo "</tr>";

            // Filas de la tabla 
            foreach ($resultados as $fila) {
                echo "<tr>";
                foreach ($fila as $valor) {
                    echo "<td>$valor</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
        ?>
</body>
</html>