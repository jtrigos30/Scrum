<?php

class Logeo {

    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    public function store($cedula, $nombre, $email, $contrasenia) {
        // Encriptar contraseña
        $password = password_hash($contrasenia, PASSWORD_BCRYPT);

        $sql = "INSERT INTO logeo(cedula, nombre, email, contrasenia)
                VALUES ('$cedula', '$nombre', '$email', '$password')";

        $this->db->query($sql);
    }

    public function consultarUsuario($cedula) {
        $sql = "SELECT * FROM logeo
                WHERE cedula = '$cedula'";
        $consulta = $this->db->query($sql);
        $objetoUsuario = $consulta->fetch_assoc();
        return $objetoUsuario;
    }


}




?>  