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

    /**
     * Método para validar acceso
     * Punto 1 de la práctica: Acceso con clase Usuario
     */
    public static function validarAcceso($email, $password, $conn) {
        // Limpiamos los datos para evitar Inyección SQL básica
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // Consultamos si existe el usuario con ese correo y esa contraseña
        $query = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password' LIMIT 1";
        $result = mysqli_query($conn, $query);
        
        // Verificamos si la consulta devolvió algún registro
        if ($user = mysqli_fetch_assoc($result)) {
            return $user; // Retorna el array con los datos del usuario
        }
        
        return false; // Retorna falso si no coinciden las credenciales
    }

    /**
     * Punto 1.4: Implementar guardar objeto
     */
    public function guardar($conn) {
        $sql = "INSERT INTO usuarios (nombre, email, password) 
                VALUES ('$this->nombre', '$this->email', '$this->password')";
        return mysqli_query($conn, $sql);
    }
}
?>