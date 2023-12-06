<?php

class Adopcion extends Crud {
    private $id;
    private $idAnimal;
    private $idUsuario;
    private $fecha;
    private $razon;

    const TABLA = "adopciones";

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
        $query = "INSERT INTO {$this->tabla} (idAnimal, idUsuario, fecha, razon) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("iiss", $this->idAnimal, $this->idUsuario, $this->fecha, $this->razon);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar() {
        $query = "UPDATE {$this->tabla} SET idAnimal = ?, idUsuario = ?, fecha = ?, razon = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("iissi", $this->idAnimal, $this->idUsuario, $this->fecha, $this->razon, $this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}


?>