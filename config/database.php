<?php

class Conexion {

    public static function conectar() {
        $conexion = new mysqli("127.0.0.1", "root", "", "scrum");
        if(!$conexion) {
            die("Conexión fallida: " . mysqli_connect_error());
        }
        return $conexion;
    }

}

?>