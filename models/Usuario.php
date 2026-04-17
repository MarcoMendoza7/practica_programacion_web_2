<?php
class Usuario {
    public $nombre;
    public $email;
    private $password;

    public function __construct($nombre, $email, $password) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
    }

    // Método para validar acceso (Punto 1 de tu práctica)
    public static function validarAcceso($email, $password, $conn) {
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        
        if ($user = mysqli_fetch_assoc($result)) {
            // En una app real usarías password_verify
            if ($password == $user['password']) {
                return $user;
            }
        }
        return false;
    }
}
?>