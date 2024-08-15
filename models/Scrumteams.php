<?php

class Scrumteams {

    private $db;
    private $scrumteams;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->scrumteams = array();
    }

    public function listar() {
        $sql = "SELECT * FROM scrumteams";
        if(!$resultado = $this->db->query($sql)) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
        }

        while($fila = $resultado->fetch_assoc()) {
            $this->scrumteams[] = $fila;
        }

        return $this->scrumteams;
    }

    public function insert($idSmaster, $idProduct, $idDevelop, $nombre, $sprintact) {
        $sql = "INSERT INTO scrumteams(idSmaster, idProduct, idDevelop, nomteam, sprintact)
                VALUES($idSmaster, $idProduct, $idDevelop, '$nombre', '$sprintact')";
        
        $this->db->query($sql);
    }

    public function getTeam($idSteams) {
        $sql = "SELECT scrumteams.*,
                        usuario_scrummaster.nomuser as nombreScrumMaster,
                        usuario_productowner.nomuser as nombreProductOwner,
                        usuario_desarrollador.nomuser as nombreDesarrollador,
                        desarrollador.idDevelop as idDevelop,
                        scrummaster.idSmaster as idSmaster,
                        productowner.idProduct as idProduct
                FROM `scrumteams` 
            INNER JOIN desarrollador ON desarrollador.idDevelop = scrumteams.idDevelop
            INNER JOIN usuario as usuario_desarrollador ON desarrollador.idUser = usuario_desarrollador.idUser
            INNER JOIN scrummaster ON scrumteams.idSmaster = scrummaster.idSmaster
            INNER JOIN usuario as usuario_scrummaster ON scrummaster.idUser = usuario_scrummaster.idUser
            INNER JOIN productowner ON scrumteams.idProduct = productowner.idProduct
            INNER JOIN usuario as usuario_productowner ON productowner.idUser = usuario_productowner.idUser
            WHERE scrumteams.idSteams = $idSteams";
        
        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        return $registro;
    }
    

    public function update($idSteams, $idSmaster, $idProduct, $idDevelop, $nombre, $sprintact) {
        $sql = "UPDATE scrumteams
                SET idSmaster = $idSmaster, idProduct = $idProduct, idDevelop = $idDevelop, nomteam = '$nombre', sprintact = '$sprintact'
                WHERE idSteams = $idSteams";

        $this->db->query($sql);
    }

    public function delete($idSteams) {
        $sql = "DELETE FROM scrumteams 
                WHERE id = $idSteams";
        $this->db->query($sql);
    }

}

?>