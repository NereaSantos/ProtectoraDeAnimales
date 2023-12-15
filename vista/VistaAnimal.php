<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>
</head>
<body>
 
<button onclick="window.location.href = '../vista/tablas.php'"><</button>
    <h1>gestión de Animales</h1>
    <h2>Añadir animales</h2>
    <table class="tablaA">
    <form method="post" action="">
        <tr>
            <th>Nombre</th>
            <th>Especie</th>
            <th>Raza</th>
            <th>Genero</th>
            <th>Color</th>
            <th>Edad</th>
        </tr>
        <tr>
            <td><input class="buscar" type="text" name="nombre"/></td>
            <td><input class="buscar" type="text" name="especie"/></td>
            <td><input class="buscar" type="text" name="raza"/></td>
            <td><input class="buscar" type="text" name="genero"/></td>
            <td><input class="buscar" type="text" name="color"/></td>
            <td><input class="buscar" type="text" name="edad"/></td>
            <td><input class="boton" type="submit" name="btnBuscar" value="Añadir" /></td>
        </tr>
    </form>
</table>

<h2>Buscar Animales</h2>

    <table>
        <tr><td>Buscar Animales Por ID: </td>
        <td>
            <form method="post">
            <input type="text" name="mostrar" />
            <input class="boton" type="submit" name="btnBuscar" value="Buscar" />
            </form>
        </td></tr>
    </table>   


<?php      
        try {
            echo "<table border='1px solid black'>
            <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Especie</th>
            <th>Raza</th>
            <th>Genero</th>
            <th>Color</th>
            th>Edad</th>
            </tr>";
    
            foreach ($datos as $row) {
                echo "<tr>
                <td>".$row->id."</td>
                <td>".$row->nombre."</td>
                <td>".$row->especie."</td>
                <td>".$row->raza."</td>
                <td>".$row->genero."</td>
                <td>".$row->color."</td>
                <td>".$row->edad."</td>
                <td>
                    <form action='' method='post'>
                        <input type='hidden' name='modificar' value='".$row->id."'>
                        <button class='boton' type='submit'>Modificar</button>
                    </form>
                    <form action='' method='post'>
                        <input type='hidden' name='borrar' value='".$row->id."'>
                        <button class='boton' type='submit'>Borrar</button>
                    </form>
                </td>
                </tr>";
            }
            echo "</table>";

        } catch (PDOException $e) {
            echo "Conexion fallida: " . $e->getMessage();
        }
    ?>
 </body>
</html>
