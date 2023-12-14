<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Usuarios</title>
</head>
<body>
<?php
require_once("../modelo/Usuario.php");

$usuario = new Usuario();

if(isset($_POST['borrar'])){
    $usuario->borrar($_POST['borrar']);
}


//if (isset($_POST['nombre'])) {

//    $usuario->nombre = $_POST['nombre'];
//    $usuario->apellido = $_POST['apellido'];
//    $usuario->sexo = $_POST['sexo'];
//    $usuario->direccion = $_POST['direccion'];
//    $usuario->telefono = $_POST['telefono'];

//    $usuario->crear();
//}

if (isset($_POST['modificar'])) {
    $usu = $usuario->obtieneDeID($_POST['modificar']);
    require_once("../vista/modificar.php");
}


if (isset($_POST['idM'])) {

    $usuario->nombre = $_POST['nombre'];
    $usuario->apellido = $_POST['apellido'];
    $usuario->sexo = $_POST['sexo'];
    $usuario->direccion = $_POST['direccion'];
    $usuario->telefono = $_POST['telefono'];

    $usuario->actualizar();
}





if(isset($_POST['Bid'])){
    if($_POST['Bid'] == ""){
        $datos = $usuario->obtieneTodos();
    }else{
        $datos = $usuario->obtieneDeID($_POST['Bid']);
    }
    require_once("../vista/usuarios_vista.php");
}else{
    if($datos = $usuario->obtieneTodos()) { 
        require_once("../vista/usuarios_vista.php");
        
    }else{
        echo "Error al cargar los datos de la base de datos";
    }
}

?>
</body>
</html>
