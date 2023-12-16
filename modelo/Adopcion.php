<?php
require_once("Crud.php");
class Adopcion extends Crud {
    private $id;
    private $idAnimal;
    private $idUsuario;
    private $fecha;
    private $razon;

    const TABLA = "adopcion";

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
        $query = "INSERT INTO " . self::TABLA . " (idAnimal, idUsuario, fecha, razon) VALUES (?,?,?,?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(1, $this->idAnimal);
        $stmt->bindParam(2, $this->idUsuario);
        $stmt->bindParam(3, $this->fecha);
        $stmt->bindParam(4, $this->razon);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar() {
        $query = "UPDATE " . self::TABLA . " SET idAnimal = ?, idUsuario = ?, fecha = ?, razon = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(1, $this->idAnimal);
        $stmt->bindParam(2, $this->idUsuario);
        $stmt->bindParam(3, $this->fecha);
        $stmt->bindParam(4, $this->razon);
        $stmt->bindParam(5, $this->id);
        
        

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}


?>
