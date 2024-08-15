<?php

class Desarrollador {

    private $db;
    private $desarrolladores;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->desarrolladores = array();
    }

    public function listar() {
        $sql = "SELECT * FROM desarrollador";
        if(!$resultado = $this->db->query($sql)) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
        }

        while($fila = $resultado->fetch_assoc()) {
            $this->desarrolladores[] = $fila;
        }

        return $this->desarrolladores;
    }

    public function insert($idUser, $habilidad) {
        $sql = "INSERT INTO desarrollador(idUser, habilidad)
                VALUES($idUser, '$habilidad')";
        
        $this->db->query($sql);
    }

    public function getDesarrollador($idDevelop) {
        $sql = "SELECT desarrollador.*, usuario.nomuser as nombreUsuario
                FROM `desarrollador` 
                INNER JOIN usuario 
                ON desarrollador.idUser = usuario.idUser 
                WHERE desarrollador.idDevelop = $idDevelop";
        
        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        return $registro;
    }

    public function update($idDevelop, $idUser, $habilidad) {
        $sql = "UPDATE desarrollador
                SET idUser = $idUser, habilidad = '$habilidad'
                WHERE idDevelop = $idDevelop";

        $this->db->query($sql);
    }

    public function delete($idDevelop) {
        $sql = "DELETE FROM desarrollador 
                WHERE idDevelop = $idDevelop";
        $this->db->query($sql);
    }

}

?>