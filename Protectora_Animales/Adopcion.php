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
        $query = "INSERT INTO {$this->tabla} (idAnimal, idUsuario, fecha, razon) VALUES (:idAnimal, :idUsuario, :fecha, :razon)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param(":idAnimal", $this->idAnimal);
        $stmt->bind_param(":idUsuario", $this->idUsuario);
        $stmt->bind_param(":fecha", $this->fecha);
        $stmt->bind_param(":razon", $this->razon);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar() {
        $query = "UPDATE {$this->tabla} SET idAnimal = :idAnimal, idUsuario = :idUsuario, fecha = :fecha, razon = :razon WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param(":idAnimal", $this->idAnimal);
        $stmt->bind_param(":idusuario", $this->idUsuario);
        $stmt->bind_param(":fecha", $this->fecha);
        $stmt->bind_param(":razon", $this->razon);
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