
<?php

// Clase abstracta Crud.php
abstract class Crud extends Conexion {
    private $tabla;
    protected $conexion;

    public function __construct($tabla) {
        $this->tabla = $tabla;
        $this->conexion = $this->conectar();
    }

    public function obtieneTodos() {
        $query = "SELECT * FROM {$this->tabla}";
        $result = $this->conexion->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function obtieneDeID($id) {
        $query = "SELECT * FROM {$this->tabla} WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param(1, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function borrar($id) {
        $query = "DELETE FROM {$this->tabla} WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param(1, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    abstract public function crear();
    abstract public function actualizar();
}

?>