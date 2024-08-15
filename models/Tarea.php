<?php

class Tarea {

    private $db;
    private $tareas;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->tareas = array();
    }

    public function listar() {
        $sql = "SELECT * FROM tarea";
        if(!$resultado = $this->db->query($sql)) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
        }

        while($fila = $resultado->fetch_assoc()) {
            $this->tareas[] = $fila;
        }

        return $this->tareas;
    }

    public function insert($idSprint, $idBacklog, $idDevelop, $estado, $prioridad, $descrip, $horas) {
        $sql = "INSERT INTO tarea(idSprint, idBacklog, idDevelop, estado, prioridad, descrip , horas)
                VALUES($idSprint, $idBacklog, $idDevelop, '$estado', '$prioridad', '$descrip', $horas)";
        
        $this->db->query($sql);
    }

    public function getTarea($idTarea) {
        $sql = "SELECT tarea.*,
                        productbacklog.nomback as nombreBacklog,
                        usuario_desarrollador.nomuser as nombreDesarrollador,
                        desarrollador.idDevelop as idDevelop
                FROM `tarea` 
            INNER JOIN desarrollador ON desarrollador.idDevelop = tarea.idDevelop
            INNER JOIN usuario as usuario_desarrollador ON desarrollador.idUser = usuario_desarrollador.idUser
            INNER JOIN productbacklog ON productbacklog.idBacklog = tarea.idBacklog
            WHERE tarea.idTarea = $idTarea";
        
        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        return $registro;
    }

    public function obtenerTiempoPlaneado($idTarea) {
        $sql = "SELECT SUM(horas) as tiempo_planeado
                    FROM `tarea`
                WHERE idTarea = $idTarea AND estado = 'Pendiente'";

        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        return $registro;
    }
    

    public function update($idTarea, $idSprint, $idBacklog, $idDevelop, $estado, $prioridad, $descrip, $horas) {
        $sql = "UPDATE tarea
                SET idSprint = $idSprint, idBacklog = $idBacklog, idDevelop = $idDevelop, estado = '$estado', prioridad = '$prioridad', descrip = '$descrip', horas = $horas
                WHERE idTarea = $idTarea";

        $this->db->query($sql);
    }

    public function delete($idTarea) {
        $sql = "DELETE FROM tarea
                WHERE idTarea = $idTarea";
        $this->db->query($sql);
    }

}

?>