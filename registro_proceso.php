<?php
include 'config/conexion.php';
include 'models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $nuevoUsuario = new Usuario($nombre, $email, $pass);

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$pass')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?msg=Registrado");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>