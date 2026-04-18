<?php
include 'config/conexion.php';
include 'models/Usuario.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_form     = $_POST['id_usuario'];
    $nombre_form = $_POST['nombre'];
    $email_form  = $_POST['email'];
    $pass_form   = $_POST['password'];
    $user_data = Usuario::validarAcceso($id_form, $nombre_form, $email_form, $pass_form, $conn);

    if ($user_data) {
        $_SESSION['usuario_nombre'] = $user_data['nombre'];
        $_SESSION['usuario_id']     = $user_data['id'];
        
        header("Location: usuarios.php");
        exit();
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}
?>