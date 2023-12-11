<?php
include 'Usuario.php'; // Incluir la clase Usuario

class UsuarioController {
    public function listarUsuarios() {
        // Crear una instancia de la clase Usuario (modelo)
        $usuarioModel = new Usuario();

        // Obtener todos los usuarios
        $usuarios = $usuarioModel->obtieneTodos();

        // Incluir la vista
        include 'Usuarios_vista.php';
    }
}

// Crear una instancia del controlador y llamar al método para listar usuarios
$controller = new UsuarioController();
$controller->listarUsuarios();
?>
