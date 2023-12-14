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
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":especie", $this->especie);
        $stmt->bindParam(":raza", $this->raza);
        $stmt->bindParam(":genero", $this->genero);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar() {
        $query = "UPDATE {$this->tabla} SET nombre = :nombre, especie = :especie, raza = :raza, genero = :genero, color = :color, edad = :edad WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":especie", $this->especie);
        $stmt->bindParam(":raza", $this->raza);
        $stmt->bindParam(":genero", $this->genero);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}


?>
