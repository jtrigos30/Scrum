<?php

class Sprint {

    private $db;
    private $sprints;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->sprints = array();
    }

    public function listar() {
        $sql = "SELECT * FROM sprint";
        if(!$resultado = $this->db->query($sql)) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
        }

        while($fila = $resultado->fetch_assoc()) {
            $this->sprints[] = $fila;
        }

        return $this->sprints;
    }

    public function insert($idSteams, $numsprint, $fechai, $fechaf, $estado) {
        $sql = "INSERT INTO sprint(idSteams, numsprint, fechaini, fechafin, estado)
                VALUES($idSteams, $numsprint, '$fechai', '$fechaf', '$estado')";
        
        $this->db->query($sql);
    }

    public function getSprint($idSprint) {
        $sql = "SELECT sprint.*, scrumteams.nomteam as nombreEquipo
                FROM `sprint` 
                INNER JOIN scrumteams 
                ON sprint.idSteams = scrumteams.idSteams 
                WHERE sprint.idSprint = $idSprint";
        
        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        return $registro;
    }

    public function update($idSprint, $idSteams, $numsprint, $fechai, $fechaf, $estado) {
        $sql = "UPDATE sprint
                SET idSteams = $idSteams, numsprint = $numsprint, fechaini = '$fechai', fechafin = '$fechaf', estado = '$estado'
                WHERE idSprint = $idSprint";

        $this->db->query($sql);
    }

    

    public function delete($idSprint) {
        $sql = "DELETE FROM sprint
                WHERE idSprint = $idSprint";
        $this->db->query($sql);
    }

}

?>