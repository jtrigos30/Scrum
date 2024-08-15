<?php

class ProductBacklog {

    private $db;
    private $products;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->products = array();
    }

    public function listar() {
        $sql = "SELECT * FROM productbacklog";
        if(!$resultado = $this->db->query($sql)) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
        }

        while($fila = $resultado->fetch_assoc()) {
            $this->products[] = $fila;
        }

        return $this->products;
    }

    public function insert($nomback, $estado, $desc, $fechai, $fechaf) {
        $sql = "INSERT INTO productbacklog(nomback, estado, descripcion, fechaInicial, fechaFinal)
                VALUES('$nomback', '$estado', '$desc', '$fechai', '$fechaf')";
        
        $this->db->query($sql);
    }

    public function getProduct($idBacklog) {
        $sql = "SELECT *
                FROM productbacklog
                WHERE idBacklog=$idBacklog";
        
        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        return $registro;
    }

    public function update($idBacklog, $nomback, $estado, $desc, $fechai, $fechaf) {
        $sql = "UPDATE productbacklog
                SET nomback = '$nomback', estado = '$estado', descripcion = '$desc', fechaInicial = '$fechai', fechaFinal = '$fechaf'
                WHERE idBacklog = $idBacklog";

        $this->db->query($sql);
    }

    public function delete($idBacklog) {
        $sql = "DELETE FROM productbacklog
                WHERE idBacklog = $idBacklog";
        $this->db->query($sql);
    }

}

?>