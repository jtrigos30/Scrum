<?php

class ProductownerController {

    public function __construct() {
        require_once 'models/Productowner.php';
        require_once 'models/Usuario.php';
        require_once 'helper/SessionHelp.php';
    }

    public function index() {

        SessionHelp::verificarSession();
        $productowner = new Productowner();
        $data['productowner'] = $productowner->listar();
        $data['titulo'] = "Lista Product Owner";
        // Cargar la vista
        require_once "views/productowners/index.php";
    }

    // Mostrar la vista para crear un nuevo registro (Proyecto)
    public function insert() {
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $data['titulo'] = "Asignar Nuevo Product Owner a Usuario";
        // Cargar la vista
        require_once "views/productowners/insert.php";
    }

    // Guardar el registo
    public function store() {
        $user = new Usuario();
        $data['usuario'] = $user->listar();

        // Recibir los datos del formulario
        $idUser = $_POST['idUser'];
        $exper = $_POST['experiencia'];

        // Guardando el registro
        $productowner = new Productowner();
        $productowner->insert($idUser, $exper);

        // Enviar a la vista del index
        $this->index();

    }

    // Visualizar la información de un registro
    public function view($idProduct) {
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $productowner = new Productowner();
        $data['titulo'] = "Detalle del Product Owner";
        $data['productowner'] = $productowner->getOwner($idProduct);
        require_once "views/productowners/view.php";
    }

    // Mostrar la vista para actualizar un registro (Proyecto)
    public function edit($idProduct) {
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $productowner = new Productowner();
        $data['idProduct'] = $idProduct;
        $data['productowner'] = $productowner ->getOwner($idProduct);
        $data['titulo'] = "Actualizar Product Owner";
        require_once "views/productowners/edit.php";
    }

    // Actualizar el registro
    public function update() {
        $user = new Usuario();
        $data['usuario'] = $user->listar();

        $idUser = $_POST['idUser'];
        $idProduct = $_POST['idProduct'];
        $exper = $_POST['experiencia'];

        $productowner = new Productowner();
        $productowner->update($idProduct, $idUser, $exper);
        $this->index();
    }

    // Elimina un proyecto
    public function delete($idProduct) {
        $productowner = new Productowner();
        $productowner->delete($idProduct);
        $this->index();
    }

}

?>