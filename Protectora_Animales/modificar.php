<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../controlador/style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
            echo '<form method="post" action="">'; 
            echo "<table border='1px solid black'>";
            foreach ($usu as $row) {
            echo"<tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>Dirección</th>
                <th>Teléfono</th>
            </tr>";

            echo "<tr>
            <td><input class='buscar' type='text' name='idM' value='" . $row->id . "' readonly/></td>
            <td><input class='buscar' type='text' name='nombre' value='" . $row->nombre . "'/></td>
            <td><input class='buscar' type='text' name='apellido' value='" . $row->apellido . "'/></td>
            <td><input class='buscar' type='text' name='sexo' value='" . $row->sexo . "'/></td>
            <td><input class='buscar' type='text' name='direccion' value='" . $row->direccion . "'/></td>
            <td><input class='buscar' type='text' name='telefono' value='" . $row->telefono . "'/></td>
            <td><input type='submit' name='btnBuscar' value='Guardar Cambios' />
            <button onclick='window.location.href = './usuarios_controlador.php'>Cancelar</button></td></td>
            </tr>";
            }
        
        echo "</table>";
?>