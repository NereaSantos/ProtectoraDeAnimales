<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Animales</title>
</head>

<body>
    <?php

    require_once("../modelo/Animal.php");

    $animal = new Animal();

    if (isset($_POST['borrar'])) {

        $animal->borrar($_POST['borrar']);

    }

    if (isset($_POST['nombreI']) && $_POST['nombreI'] != "") {
        
        $animal->nombre = $_POST['nombreI'];
        $animal->especie = $_POST['especieI'];
        $animal->raza = $_POST['razaI'];
        $animal->genero = $_POST['generoI'];
        $animal->color = $_POST['colorI'];
        $animal->edad = $_POST['edadI'];
        $animal->crear();
    }

    if (isset($_POST['idM'])) {
        
        $animal->nombre = $_POST['nombre'];
        $animal->especie = $_POST['especie'];
        $animal->raza = $_POST['raza'];
        $animal->genero = $_POST['genero'];
        $animal->color = $_POST['color'];
        $animal->edad = $_POST['edad'];
        $animal->actualizar();
    }

    if (isset($_POST['Bid'])) {

        if ($_POST['Bid'] == "") {
            $datos = $animal->obtieneTodos();

        } else {
            $datos = $animal->obtieneDeID($_POST['Bid']);
        }

        require_once("../vistas/animales_vista.php");

    } else {
        if ($datos = $animal->obtieneTodos()) {
            require_once("../vistas/animales_vista.php");

        } else {
            echo "Error al cargar los datos de la base de datos";
        }
    }

    ?>
</body>

</html>