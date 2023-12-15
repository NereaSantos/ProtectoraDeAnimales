<?php
// Clase Usuario.php
class Usuario extends Crud {
    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $direccion;
    private $telefono;
    private $edad;

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
        $query = "INSERT INTO {$this->tabla} (nombre, apellido, sexo, direccion, telefono, edad) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssssi", $this->nombre, $this->apellido, $this->sexo, $this->direccion, $this->telefono, $this->edad);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar() {
        $query = "UPDATE {$this->tabla} SET nombre = ?, apellido = ?, sexo = ?, direccion = ?, telefono = ?, edad = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssssii", $this->nombre, $this->apellido, $this->sexo, $this->direccion, $this->telefono, $this->edad, $this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
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
        $stmt->bind_param("i", $id);
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
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>