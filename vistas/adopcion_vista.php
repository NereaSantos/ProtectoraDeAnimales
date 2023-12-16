<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<button onclick="window.location.href = '../index.php'"><</button>
    <div>
    <h1>GESTIÓN DE ADOPCIONES</h1>
    <h2>Añadir adopcion</h2>
    <table class="tablaAD">
        <form method="post" action="">
            <tr>
                <th>Animal</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Razon</th>
            </tr>
            <tr>
                <td><select class="buscar" id='Animal' name='animalI'>
                        <?php
                        try {
                            foreach ($animal->obtieneTodos() as $rows) {
                                ?>
                                <option value=' <?= $rows->id ?>'>
                                    <?= $rows->nombre ?>
                                    </option>
                                <?php }
                        } catch (PDOException $e) {
                            echo "Conexion fallida" . $e->getMessage();
                        }
                        ?>
                    </select>
                </td>
                <td><select class="buscar" id='Usuario' name='usuarioI'>
                        <?php try {
                            foreach ($usuario->obtieneTodos() as $rows) {
                                ?>
                                <option value=' <?= $rows->id ?>'>
                                    <?= $rows->nombre ?>
                                    </option>
                                <?php }
                        } catch (PDOException $e) {
                            echo "Conexion fallida" . $e->getMessage();
                        }
                        ?>
                    </select>
                </td>
                <td><input class="buscar" type="date" name="fechaI" value=" <?php echo date('Y-m-d'); ?>" /></td>
                <td><input class="buscar" type="text" name="razonI" /></td>

                <td><input class="boton" type="submit" name="btnAñadir" value="Añadir" /></td>
            </tr>
        </form>
                    </div>
        <h2>Buscar Usuario</h2>

        <table>
            <tr>
                <td>Buscar Adopcion Por ID: </td>
                <td>
                    <form method="post">
                        <input type="text" name="Bid" />
                        <input class="boton" type="submit" name="btnBuscar" value="Buscar" />
                    </form>
                </td>
            </tr>
        </table>
        <table border='1px solid black'>
            <tr>
                <th>ID</th>
                <th>Animal</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Razon</th>
            </tr>

            <form method="post" action="">
                <?php foreach ($datos as $row) { ?>
                    <td> <input class="buscar" type="text" name="idM" value="<?= $row->id ?>" /></td>
                    <td> <select class="buscar" name="animal" value=" <?= $animal->obtieneDeID($row->idAnimal)->nombre?>">
                    <?php
                        try {
                            foreach ($animal->obtieneTodos() as $rows) {
                                ?>
                                <option value=' <?= $rows->nombre ?>'>
                                    <?= $rows->nombre ?>
                                    </option>
                                <?php }
                        } catch (PDOException $e) {
                            echo "Conexion fallida" . $e->getMessage();
                        }
                        ?>
                        </select>
                    </td>
                    <td> <select class="buscar" name="usuario" value=" <?= $usuario->obtieneDeID($row->idUsuario)->nombre ?>">
                        <?php
                         try {
                            foreach ($usuario->obtieneTodos() as $rows) {
                                ?>
                                <option value=' <?= $rows->nombre ?>'>
                                    <?= $rows->nombre ?>
                                    </option>
                                <?php }
                        } catch (PDOException $e) {
                            echo "Conexion fallida" . $e->getMessage();
                        }
                        ?>                        
                    </td>
                    <td> <input class="buscar" type="text" name="fecha" value="<?= $row->fecha ?>" /></td>
                    <td> <input class="buscar" type="text" name="razon" value="<?= $row->razon ?>" /></td>
                    <td>
                    <button class='boton' type='submit'>Modificar</button>
                    </form>
                    <form action='' method='post'>
                        <input type='hidden' name='borrar' value=" <?= $row->id ?>">
                        <button class='boton' type='submit'>Borrar</button>
                    </form>
                </td>
                    </tr>
                <?php }
                ?> </table>
</body>

</html>