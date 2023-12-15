<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    require_once "../modelo/animal.php";
    
    $animal = new Animal();

    if(isset($_POST['borrar'])){

        $animal->borrar($_POST['borrar']);

    }

    if(isset($_POST['modificar'])){

        $animal1 = $animal->obtieneDeID($_POST['modificar']);

        require_once "../vista/modificar.php";

    }

    if(isset($_POST['actualizar'])){

        $usuario->nombre = $_POST['nombre'];
        $animal->especie = $_POST['especie'];
        $usuario->raza = $_POST['raza'];
        $animal->genero = $_POST['genero'];
        $usuario->color = $_POST['color'];
        $animal->edad = $_POST['edad'];

        $animal->actualizar();

    }

    if(isset($_POST['mostrar'])){

        if($_POST['actualizar'] == ""){

            $info = $animal->obtieneTodos();

        }else{

            $info = $animal->obtieneTdos($_POST['mostrar']);

        }

        require_once "../vista/VstaAnimales.php";
        
    }else{

        if($info = $animal->obtieneTodos()){

            require_once "../vista/VistaAnimales.php";

        }else{

            echo "Error al cargar la base de datos";

        }

    }   

    ?>
</body>
</html>