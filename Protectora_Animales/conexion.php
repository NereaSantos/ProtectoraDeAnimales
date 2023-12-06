<?php

class conexion
{

    private $server = "localhost:3333";
    private $userName = "root";
    private $password = "";
    private $bdName = "protectora_animales";
    private $conn;

    protected function RealizarConexion($server, $userName, $password, $bdName)
    {
        try {
            $this->conn = new PDO("mysql:host=$server;dbname=$bdName;charset=utf8", $userName, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($this->conn !== null) {

                return $this->conn;

            } else {

                echo "Error al conectar con la base de datos.";

            }
        } catch (PDOException $e) {
            echo "Error al conectar con la base de datos: " . $e->getMessage();
            return null; // Return null on connection failure
        }
    }

}

?>