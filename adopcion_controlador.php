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
  require_once("../modelo/Adopcion.php");
  require_once("../modelo/Animal.php");
  require_once("../modelo/Usuario.php");
 
  $adopcion = new Adopcion();
  $animal = new Animal();
  $usuario = new Usuario();
  
  if(isset($_POST['borrar'])){
    $adopcion->borrar($_POST['borrar']);
}
if (isset($_POST['animal']) && $_POST['animal'] != "") {

  $adopcion->idAnimal = $_POST['animalI'];
  $adpocion->idUsuario = $_POST['usuarioI'];
  $adopcion->fecha = $_POST['fechaI'];
  $adopcion->razon = $_POST['razonI'];
  $adopcion->crear();
}
if (isset($_POST['idM'])) {

  $adopcion->idAnimal = $_POST['animal'];
  $adpocion->idUsuario = $_POST['usuario'];
  $adopcion->fecha = $_POST['fecha'];
  $adopcion->razon = $_POST['razon'];
  $adopcion->actualizar();
}
if(isset($_POST['Bid'])){

  if($_POST['Bid'] == ""){
      $datos = $adopcion->obtieneTodos();
      
  }else{
      $datos = $adopcion->obtieneDeID($_POST['Bid']);
  }

  require_once("../vista/adopcion_vista.php");

}else{
  if($datos = $adopcion->obtieneTodos()) { 
      require_once("../vista/adopcion_vista.php");
      
  }else{
      echo "Error al cargar los datos de la base de datos";
  }
}



?>
</body>
</html>