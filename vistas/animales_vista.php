<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Animales</title>
</head>

<body>
    <h1>Gestión de Animales</h1>
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
                <td><input class="buscar" type="text" name="nombreI" /></td>
                <td><input class="buscar" type="text" name="especieI" /></td>
                <td><input class="buscar" type="text" name="razaI" /></td>
                <td><input class="buscar" type="text" name="generoI" /></td>
                <td><input class="buscar" type="text" name="colorI" /></td>
                <td><input class="buscar" type="text" name="edadI" /></td>
                <td><input class="boton" type="submit" name="btnBuscar" value="Añadir" /></td>
            </tr>
        </form>
    </table>

    <h2>Buscar Animales</h2>

    <table>
        <tr>
            <td>Buscar Animales Por ID: </td>
            <td>
                <form method="post">
                    <input type="text" name="Bid" />
                    <input class="boton" type="submit" name="btnBuscar" value="Buscar" />
                </form>
            </td>
        </tr>
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
            <th>Edad</th>
            </tr>
            <form method='post' action=''>";

                foreach ($datos as $row) {
                    echo "<tr>
                    <td><input class='buscar' type='text' name='idM' value='" . $row->id . "' readonly/></td>
                    <td><input class='buscar' type='text' name='nombre' value='" . $row->nombre . "'/></td>
                    <td><input class='buscar' type='text' name='especie' value='" . $row->especie . "'/></td>
                    <td><input class='buscar' type='text' name='raza' value='" . $row->raza . "'/></td>
                    <td><input class='buscar' type='text' name='genero' value='" . $row->genero . "'/></td>
                    <td><input class='buscar' type='text' name='color' value='" . $row->color . "'/></td>
                    <td><input class='buscar' type='text' name='edad' value='" . $row->edad . "'/></td>
                    <td>
                        <button class='boton' type='submit'>Modificar</button>
                        </form>
                        <form action='' method='post'>
                            <input type='hidden' name='borrar' value='" . $row->id . "'>
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