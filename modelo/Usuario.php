<?php
// Clase Usuario.php
require_once("Crud.php");

class Usuario extends Crud {
    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $direccion;
    private $telefono;

    const TABLA = "usuarios";

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
        try {
            $query = "INSERT INTO ".self::TABLA." (nombre, apellido, sexo, direccion, telefono) VALUES (?,?,?,?,?)";
            $stmt = $this->conexion->prepare($query);
        
            $stmt->bindParam(1, $this->nombre);
            $stmt->bindParam(2, $this->apellido);
            $stmt->bindParam(3, $this->sexo);
            $stmt->bindParam(4, $this->direccion);
            $stmt->bindParam(5, $this->telefono);
        
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "No se pudo insertar: " . $e->getMessage();
        }
    }
    
    public function actualizar() {
        try {

            $query = "UPDATE " . self::TABLA . " SET nombre = ?, apellido = ?, sexo = ?, direccion = ?, telefono = ? WHERE id = ?";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(1, $this->nombre);
            $stmt->bindParam(2, $this->apellido);
            $stmt->bindParam(3, $this->sexo);
            $stmt->bindParam(4, $this->direccion);
            $stmt->bindParam(5, $this->telefono);
            $stmt->bindParam(6, $this->id);
            $stmt->execute();
            

        } catch (PDOException $e) {
            echo "No se pudo actualizar: " . $e->getMessage();
        }
    }
    
}

?>