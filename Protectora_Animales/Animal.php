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
        $query = "INSERT INTO {$this->tabla} (nombre, especie, raza, genero, color, edad) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssssi", $this->nombre, $this->especie, $this->raza, $this->genero, $this->color, $this->edad);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar() {
        $query = "UPDATE {$this->tabla} SET nombre = ?, especie = ?, raza = ?, genero = ?, color = ?, edad = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssssii", $this->nombre, $this->especie, $this->raza, $this->genero, $this->color, $this->edad, $this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}


?>