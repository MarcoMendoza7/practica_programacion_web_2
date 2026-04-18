<?php
class Usuario {
    public $id;
    public $nombre;
    public $email;
    private $password;

    public function __construct($nombre, $email, $password, $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
    }

    public static function validarAcceso($id, $nombre, $email, $password, $conn) {
        $id = mysqli_real_escape_string($conn, $id);
        $nombre = mysqli_real_escape_string($conn, $nombre);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "SELECT * FROM usuarios WHERE 
                  id = '$id' AND 
                  nombre = '$nombre' AND 
                  email = '$email' AND 
                  password = '$password' 
                  LIMIT 1";
                  
        $result = mysqli_query($conn, $query);
        
        if ($user = mysqli_fetch_assoc($result)) {
            return $user; 
        }
        
        return false;
    }

    public function guardar($conn) {
        $sql = "INSERT INTO usuarios (nombre, email, password) 
                VALUES ('$this->nombre', '$this->email', '$this->password')";
        return mysqli_query($conn, $sql);
    }
}
?>