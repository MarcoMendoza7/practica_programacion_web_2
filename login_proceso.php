<?php
// Incluimos la conexión y la clase Usuario
include 'config/conexion.php';
include 'models/Usuario.php';

// Iniciamos sesión para guardar datos del usuario si el login es exitoso
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = $_POST['password'];

    // Usamos el método estático de la clase Usuario que creamos antes
    $user_data = Usuario::validarAcceso($email, $pass, $conn);

    if ($user_data) {
        // Si los datos son correctos, guardamos el nombre en la sesión
        $_SESSION['usuario_nombre'] = $user_data['nombre'];
        
        // Redirigimos a la página de "Ver Usuarios" (Punto 3.4)
        header("Location: usuarios.php");
        exit();
    } else {
        // Si falló, regresamos al login con un error
        header("Location: index.php?error=1");
        exit();
    }
}
?>