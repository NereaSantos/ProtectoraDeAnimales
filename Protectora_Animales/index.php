<?php

include "conexion.php";
include "Animal.php";
include "Adopcion.php";
include "Usuario.php";


// Crear 3 animales
$animal1 = new Animal();
$animal1->nombre = "Rex";
$animal1->especie = "Perro";
$animal1->raza = "Labrador";
$animal1->genero = "Macho";
$animal1->color = "Marrón";
$animal1->edad = 3;
$animal1->crear();

$animal2 = new Animal();
$animal2->nombre = "Luna";
$animal2->especie = "Gato";
$animal2->raza = "Siames";
$animal2->genero = "Hembra";
$animal2->color = "Blanco";
$animal2->edad = 2;
$animal2->crear();

$animal3 = new Animal();
$animal3->nombre = "Nemo";
$animal3->especie = "Pez";
$animal3->raza = "N/A";
$animal3->genero = "N/A";
$animal3->color = "Anaranjado";
$animal3->edad = 1;
$animal3->crear();

// Borrar un animal (suponiendo que el animal 3 fue el que se creó más recientemente)
$animal3->borrar($animal3->id);

// Actualizar un animal (suponiendo que el animal 1 será actualizado cambiando su color)
$animal1->color = "Negro";
$animal1->actualizar();

// Crear 3 usuarios
$usuario1 = new Usuario();
$usuario1->nombre = "Juan";
$usuario1->apellido = "Pérez";
$usuario1->sexo = "Masculino";
$usuario1->direccion = "Calle Principal 123";
$usuario1->telefono = "123456789";
$usuario1->edad = 30;
$usuario1->crear();

$usuario2 = new Usuario();
$usuario2->nombre = "María";
$usuario2->apellido = "González";
$usuario2->sexo = "Femenino";
$usuario2->direccion = "Avenida Secundaria 456";
$usuario2->telefono = "987654321";
$usuario2->edad = 25;
$usuario2->crear();

$usuario3 = new Usuario();
$usuario3->nombre = "Carlos";
$usuario3->apellido = "Sánchez";
$usuario3->sexo = "Masculino";
$usuario3->direccion = "Plaza Central 789";
$usuario3->telefono = "567891234";
$usuario3->edad = 28;
$usuario3->crear();

// Borrar un usuario (suponiendo que el usuario 3 fue el que se creó más recientemente)
$usuario3->borrar($usuario3->id);

// Actualizar un usuario (suponiendo que el usuario 1 será actualizado cambiando su edad)
$usuario1->edad = 35;
$usuario1->actualizar();

// Crear 3 adopciones
$adopcion1 = new Adopcion();
$adopcion1->idAnimal = 1; // Suponiendo que el animal 1 (Rex) es adoptado
$adopcion1->idUsuario = 2; // Suponiendo que el usuario 2 (María) adopta a Rex
$adopcion1->fecha = date("Y-m-d");
$adopcion1->razon = "Adopción feliz";
$adopcion1->crear();

$adopcion2 = new Adopcion();
$adopcion2->idAnimal = 2; // Suponiendo que el animal 2 (Luna) es adoptado
$adopcion2->idUsuario = 1; // Suponiendo que el usuario 1 (Juan) adopta a Luna
$adopcion2->fecha = date("Y-m-d");
$adopcion2->razon = "Nueva compañera";
$adopcion2->crear();

$adopcion3 = new Adopcion();
$adopcion3->idAnimal = 3; // Suponiendo que el animal 3 (Nemo) es adoptado
$adopcion3->idUsuario = 3; // Suponiendo que el usuario 3 (Carlos) adopta a Nemo
$adopcion3->fecha = date("Y-m-d");
$adopcion3->razon = "Amante de los peces";
$adopcion3->crear();

// Borrar una adopción (suponiendo que la adopción 3 fue la más reciente)
$adopcion3->borrar($adopcion3->id);

// Actualizar una adopción (suponiendo que la adopción 1 será actualizada cambiando la razón)
$adopcion1->razon = "Adopción muy especial";
$adopcion1->actualizar();

?>