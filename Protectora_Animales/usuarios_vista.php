<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>

<button onclick="window.location.href = '../vista/tablas.php'"><</button>
    <h1>GESTIÓN DE Usuarios</h1>
    <h2>Añadir usuario</h2>
    <table class="tablaA">
    <form method="post" action="">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Sexo</th>
            <th>Direccion</th>
            <th>Teléfono</th>
        </tr>
        <tr>
            <td><input class="buscar" type="text" name="nombre"/></td>
            <td><input class="buscar" type="text" name="apellido"/></td>
            <td><input class="buscar" type="text" name="sexo"/></td>
            <td><input class="buscar" type="text" name="direccion"/></td>
            <td><input class="buscar" type="text" name="telefono"/></td>
            <td><input class="boton" type="submit" name="btnBuscar" value="Añadir" /></td>
        </tr>
    </form>
</table>

<h2>Buscar Usuario</h2>

    <table>
        <tr><td>Buscar Usuario Por ID: </td>
        <td>
            <form method="post">
            <input type="text" name="Bid" />
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
            <th>Apellido</th>
            <th>Sexo</th>
            <th>Direccion</th>
            <th>Teléfono</th>
            </tr>";
    
            foreach ($datos as $row) {
                echo "<tr>
                <td>".$row->id."</td>
                <td>".$row->nombre."</td>
                <td>".$row->apellido."</td>
                <td>".$row->sexo."</td>
                <td>".$row->direccion."</td>
                <td>".$row->telefono."</td>
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