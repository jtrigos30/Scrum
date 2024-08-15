<?php

class Usuario {

    private $db;
    private $usuarios;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->usuarios = array();
    }

    public function listar() {
        $sql = "SELECT * FROM usuario";
        if(!$resultado = $this->db->query($sql)) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
        }

        while($fila = $resultado->fetch_assoc()) {
            $this->usuarios[] = $fila;
        }

        return $this->usuarios;
    }

    public function insert($nomuser, $contuser) {
        $sql = "INSERT INTO usuario(nomuser, contuser)
                VALUES('$nomuser', '$contuser')";
        
        $this->db->query($sql);
    }

    public function getUsuario($idUser) {
        $sql = "SELECT *
                FROM usuario
                WHERE idUser = $idUser";
        
        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        return $registro;
    }

    public function update($idUser, $nomuser, $contuser) {
        $sql = "UPDATE usuario
                SET nomuser = '$nomuser', contuser = '$contuser'
                WHERE idUser = $idUser";

        $this->db->query($sql);
    }

    public function delete($idUser) {
        $sql = "DELETE FROM usuario
                WHERE idUser = $idUser";
        $this->db->query($sql);
    }


}

?>