<?php

class Scrummaster {

    private $db;
    private $scrummasters;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->scrummasters = array();
    }

    public function listar() {
        $sql = "SELECT * FROM scrummaster";
        if(!$resultado = $this->db->query($sql)) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
        }

        while($fila = $resultado->fetch_assoc()) {
            $this->scrummasters[] = $fila;
        }

        return $this->scrummasters;
    }

    public function insert($idUser, $cert) {
        $sql = "INSERT INTO scrummaster(idUser, certificado)
                VALUES($idUser, '$cert')";
        
        $this->db->query($sql);
    }

    public function getScrum($idSmaster) {
        $sql = "SELECT scrummaster.*, usuario.nomuser as nombreUsuario
                FROM `scrummaster` 
                INNER JOIN usuario 
                ON scrummaster.idUser = usuario.idUser 
                WHERE scrummaster.idSmaster = $idSmaster";
        
        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        return $registro;
    }

    public function update($idSmaster, $idUser, $cert) {
        $sql = "UPDATE scrummaster
                SET idUser = $idUser, certificado = '$cert'
                WHERE idSmaster = $idSmaster";

        $this->db->query($sql);
    }

    public function delete($idSmaster) {
        $sql = "DELETE FROM scrummaster 
                WHERE idSmaster = $idSmaster";
        $this->db->query($sql);
    }

}

?>