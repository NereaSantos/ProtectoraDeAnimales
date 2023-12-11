<?php

abstract class Crud extends Conexion{

    private $tabla;
    private $conexion;

    abstract function crear();
    abstract function actualizar();

    function __construct($nomTabla){

        $this->tabla = $nomTabla;
        $this->conexion = $this->realizarConexion();
    }

    function obtieneTodos(){

        try{
            $select = $this->conexion->prepare("SELECT * FROM $this->tabla");
            $select->execute();
            return $select->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            return false;
        }
    }

    function obtieneDeID($id){

        try{
            $select = $conexion->prepare("SELECT * FROM  $this->tabla WHERE id = ?");
            $select->bindParam(1, $id);
            $select->execute();
            return $select->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            return false;
        }
    }

    function borrar($id){
        try{
            $borrar=$conn->prepare("DELETE FROM $this->tabla WHERE id = ?");
            $borrar->bindParam(1, $id);
            $borrar->execute();

        } catch (PDOException $e) {
            return false;
        }
    }




}


?>