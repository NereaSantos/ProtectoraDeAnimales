<?php

class Animal extends Crud {
    private $id;
    private $nombre;
    private $especie;
    private $raza;
    private $genero;
    private $color;
    private $edad;

    const TABLA = "animales";

    public function __construct() {
        parent::__construct(self::TABLA);
        $this->conexion = $this->RealizarConexion(); 
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function crear() {
        $query = "INSERT INTO {$this->tabla} (nombre, especie, raza, genero, color, edad) VALUES (:nombre, :especie, :raza, :genero, :color, :edad)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param(":nombre", $this->nombre);
        $stmt->bind_param(":especie", $this->especie);
        $stmt->bind_param(":raza", $this->raza);
        $stmt->bind_param(":genero", $this->genero);
        $stmt->bind_param(":color", $this->color);
        $stmt->bind_param(":edad", $this->edad);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar() {
        $query = "UPDATE {$this->tabla} SET nombre = :nombre, especie = :especie, raza = :raza, genero = :genero, color = :color, edad = :edad WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param(":nombre", $this->nombre);
        $stmt->bind_param(":especie", $this->especie);
        $stmt->bind_param(":raza", $this->raza);
        $stmt->bind_param(":genero", $this->genero);
        $stmt->bind_param(":color", $this->color);
        $stmt->bind_param(":edad", $this->edad);
        $stmt->bind_param(":id", $this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}


?>