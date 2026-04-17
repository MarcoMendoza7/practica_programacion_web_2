<?php
$host = "localhost";
$user = "marco";    
$pass = "12345";    
$db   = "practica_web";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>