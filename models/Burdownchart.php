<?php

class Burdownchart {

    private $db;
    private $owners;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->owners = array();
    }

    public function listar() {
        $sql = "SELECT * FROM burdownchart";
        if(!$resultado = $this->db->query($sql)) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
        }

        while($fila = $resultado->fetch_assoc()) {
            $this->owners[] = $fila;
        }

        return $this->owners;
    }

    public function insert($idBacklog, $idSprint) {
        $sql = "INSERT INTO burdownchart(idBacklog, idSprint)
                VALUES($idBacklog, $idSprint)";
        
        $this->db->query($sql);
    }


    public function getChart($idChart) {
        $sql = "SELECT burdownchart.*,
                        productbacklog.nomback as nomBacklog,
                        sprint.numsprint as numSprint
                FROM `burdownchart` 
                INNER JOIN productbacklog
                ON burdownchart.idBacklog = productbacklog.idBacklog
                INNER JOIN sprint 
                ON burdownchart.idSprint = sprint.idSprint
                WHERE burdownchart.idChart = $idChart";
        
        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        return $registro;
    }
    public function getFechaInicial($idChart) {
        $sql = "SELECT sprint.fechaini as fechai
                FROM `burdownchart`
                INNER JOIN sprint ON burdownchart.idSprint = sprint.idSprint
                WHERE burdownchart.idChart = $idChart";
    
        $resultado = $this->db->query($sql);
        return $resultado->fetch_assoc()['fechai'];
    }
    
    public function getFechaFinal($idChart) {
        $sql = "SELECT sprint.fechafin as fechaf
                FROM `burdownchart`
                INNER JOIN sprint ON burdownchart.idSprint = sprint.idSprint
                WHERE burdownchart.idChart = $idChart";
    
        $resultado = $this->db->query($sql);
        return $resultado->fetch_assoc()['fechaf'];
    }
    
    public function obtenerTiempoPlaneado($idChart) {
        $sql = "SELECT SUM(tarea.horas) as tiempo_planeado

                    FROM `burdownchart`
                    INNER JOIN sprint ON sprint.idSprint = burdownchart.idSprint
                    INNER JOIN tarea ON tarea.idSprint = sprint.idSprint
                WHERE burdownchart.idChart = $idChart";

        $resultado = $this->db->query($sql);
        return $resultado->fetch_assoc()['tiempo_planeado'];
    }

    public function update($idChart, $idBacklog, $idSprint) {
        $sql = "UPDATE burdownchart
                SET idBacklog = $idBacklog, idSprint = $idSprint
                WHERE idChart = $idChart";

        $this->db->query($sql);
    }

    public function delete($idChart) {
        $sql = "DELETE FROM burdownchart
                WHERE idChart = $idChart";
        $this->db->query($sql);
    }

    // Modifica la función construirTablaBurndown en el modelo BurndownChart

    public function construirTablaBurndown($idChart, $fechaInicial, $fechaFinal, $diferenciaDias, $tiempoPlaneado) {

        // Crear la tabla con las fechas, tiempo planeado, tiempo real y diferencia
        $tablaBurdown = [];
        $fechaActual = $fechaInicial;
        $tiempoPlaneadoTotal = 40; 

        for ($diasTranscurridos = 0; $diasTranscurridos <= $diferenciaDias; $diasTranscurridos++) {
            $tiempoReal = 40 - $diasTranscurridos * 5; 
            $diferencia = $tiempoPlaneado - $tiempoReal;
            
            $fechaActualStr = $fechaActual->format('Y-m-d');
            $tablaBurndown[$fechaActualStr] = [
                'tiempo_planeado' => $tiempoPlaneado,
                'tiempo_real' => $tiempoReal,
                'diferencia' => $diferencia
            ];
            

            // Avanzar un día
            
            $fechaActual->modify('+1 day');
        }

        return $tablaBurndown;
    }

    // Agrega esta función en el modelo BurndownChart
    public function calcularDiferenciaDias($fechaInicial, $fechaFinal) {
        $diferencia = $fechaFinal->diff($fechaInicial);
        return $diferencia->days;
    }



}

?>