<?php

class Productowner {

    private $db;
    private $productowners;

    public function __construct() {
        $this->db = Conexion::conectar();
        $this->productowners = array();
    }

    public function listar() {
        $sql = "SELECT * FROM productowner";
        if(!$resultado = $this->db->query($sql)) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
        }

        while($fila = $resultado->fetch_assoc()) {
            $this->productowners[] = $fila;
        }

        return $this->productowners;
    }

    public function insert($idUser, $exper) {
        $sql = "INSERT INTO productowner(idUser, experiencia)
                VALUES($idUser, '$exper')";
        
        $this->db->query($sql);
    }

    public function getOwner($idProduct) {
        $sql = "SELECT productowner.*, usuario.nomuser as nombreUsuario
                FROM `productowner` 
                INNER JOIN usuario 
                ON productowner.idUser = usuario.idUser 
                WHERE productowner.idProduct = $idProduct";
        
        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        return $registro;
    }

    public function update($idProduct, $idUser, $exper) {
        $sql = "UPDATE productowner
                SET idUser = $idUser, experiencia = '$exper'
                WHERE idProduct = $idProduct";

        $this->db->query($sql);
    }

    public function delete($idProduct) {
        $sql = "DELETE FROM productowner 
                WHERE idProduct = $idProduct";
        $this->db->query($sql);
    }

}

?>