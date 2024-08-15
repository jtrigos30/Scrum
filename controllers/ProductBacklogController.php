<?php

class ProductBacklogController {

    public function __construct() {
        require_once 'models/ProductBacklog.php';
        require_once 'helper/SessionHelp.php';
    }

    public function index() {

        SessionHelp::verificarSession();

        $product = new ProductBacklog();
        $data['productbacklog'] = $product->listar();
        $data['titulo'] = "Lista del Backlog del Producto";
        // Cargar la vista
        require_once "views/products/index.php";
    }

    // Mostrar la vista para crear un nuevo registro (Proyecto)
    public function insert() {
        $data['titulo'] = "Crear Backlog del Producto";
        // Cargar la vista
        require_once "views/products/insert.php";
    }

    // Guardar el registo
    public function store() {

        // Recibir los datos del formulario
        $nomback = $_POST['nomback'];
        $estado = $_POST['estado'];
        $desc = $_POST['descripcion'];
        $fechai = $_POST['fechaInicial']; 
        $fechaf = $_POST['fechaFinal']; 

        // Guardando el registro
        $product = new ProductBacklog();
        $product->insert($nomback, $estado, $desc, $fechai, $fechaf);

        // Enviar a la vista del index
        $this->index();

    }

    // Visualizar la información de un registro
    public function view($idBacklog) {
        $product = new ProductBacklog();
        $data['titulo'] = "Detalle del Backlog del Producto";
        $data['productbacklog'] = $product->getProduct($idBacklog);
        require_once "views/products/view.php";
    }

    // Mostrar la vista para actualizar un registro (Proyecto)
    public function edit($idBacklog) {
        $product = new ProductBacklog();
        $data['idBacklog'] = $idBacklog;
        $data['productbacklog'] = $product->getProduct($idBacklog);
        $data['titulo'] = "Actualizar Backlog del Producto";
        require_once "views/products/edit.php";
    }

    // Actualizar el registro
    public function update() {
        $idBacklog = $_POST['idBacklog'];
        $nomback = $_POST['nomback'];
        $estado = $_POST['estado'];
        $desc = $_POST['descripcion'];
        $fechai = $_POST['fechaInicial']; 
        $fechaf = $_POST['fechaFinal'];

        $product = new ProductBacklog();
        $product->update($idBacklog, $nomback, $estado, $desc, $fechai, $fechaf);
        $this->index();
    }

    // Elimina un proyecto
    public function delete($idBacklog) {
        $product = new ProductBacklog();
        $product->delete($idBacklog);
        $this->index();
    }

}

?>