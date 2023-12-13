<?php
require_once("Adopcion.php");

class Controlador {
    public function listarAdopciones(Adopcion $adopcion){
       $resultados = $adopcion->obtieneTodos();
        
        if (!empty($resultados)) {
            echo "<table border='1'>";
            
            // Cabecera de la tabla 
            echo "<tr>";
            foreach ($resultados[0] as $columna => $valor) {
                echo "<th>$columna</th>";
            }
            echo "</tr>";

            // Filas de la tabla 
            foreach ($resultados as $fila) {
                echo "<tr>";
                foreach ($fila as $valor) {
                    echo "<td>$valor</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
        
    }
    public function listarAnimales(Animal $animal){
        $resultados = $animal->obtieneTodos();
         
         if (!empty($resultados)) {
             echo "<table border='1'>";
             
             // Cabecera de la tabla 
             echo "<tr>";
             foreach ($resultados[0] as $columna => $valor) {
                 echo "<th>$columna</th>";
             }
             echo "</tr>";
 
             // Filas de la tabla 
             foreach ($resultados as $fila) {
                 echo "<tr>";
                 foreach ($fila as $valor) {
                     echo "<td>$valor</td>";
                 }
                 echo "</tr>";
             }
 
             echo "</table>";
         } else {
             echo "No se encontraron resultados.";
         }
         
     }
     public function listarUsuarios(Usuario $usuario){
        $resultados = $usuario->obtieneTodos();
         
         if (!empty($resultados)) {
             echo "<table border='1'>";
             
             // Cabecera de la tabla 
             echo "<tr>";
             foreach ($resultados[0] as $columna => $valor) {
                 echo "<th>$columna</th>";
             }
             echo "</tr>";
 
             // Filas de la tabla 
             foreach ($resultados as $fila) {
                 echo "<tr>";
                 foreach ($fila as $valor) {
                     echo "<td>$valor</td>";
                 }
                 echo "</tr>";
             }
 
             echo "</table>";
         } else {
             echo "No se encontraron resultados.";
         }
         
     }
}

?>