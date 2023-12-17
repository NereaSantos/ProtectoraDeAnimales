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
if (isset($_POST['animalI']) && $_POST['animalI'] != "") {

  $adopcion->idAnimal = $_POST['animalI'];
  $adopcion->idUsuario = $_POST['usuarioI'];
  $adopcion->fecha = $_POST['fechaI'];
  $adopcion->razon = $_POST['razonI'];
  $adopcion->crear();
}
if (isset($_POST['idM'])) {

  $adopcion->idAnimal = $_POST['animal'];
  $adopcion->idUsuario = $_POST['usuario'];
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

  require_once("../vistas/adopcion_vista.php");

}else{
  $datos = $adopcion->obtieneTodos();
   require_once("../vistas/adopcion_vista.php");
      
  }



?>
</body>
</html>