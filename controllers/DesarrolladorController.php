<?php

class DesarrolladorController {

    public function __construct() {
        require_once 'models/Desarrollador.php';
        require_once 'models/Usuario.php';
        require_once 'helper/SessionHelp.php';
    }

    public function index() {

        SessionHelp::verificarSession();
        $desarrollador = new Desarrollador();
        $data['desarrolladores'] = $desarrollador->listar();
        $data['titulo'] = "Desarrolladores";
        // Cargar la vista
        require_once "views/desarrolladores/index.php";
    }

    // Mostrar la vista para crear un nuevo registro (Proyecto)
    public function insert() {
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $data['titulo'] = "Asignar Nuevo Desarrollador a Usuario";
        // Cargar la vista
        require_once "views/desarrolladores/insert.php";
    }

    // Guardar el registo
    public function store() {
        $user = new Usuario();
        $data['usuario'] = $user->listar();

        // Recibir los datos del formulario
        $idUser = $_POST['idUser'];
        $habilidad = $_POST['habilidad'];

        // Guardando el registro
        $desarrollador = new Desarrollador();
        $desarrollador->insert($idUser, $habilidad);

        // Enviar a la vista del index
        $this->index();

    }

    // Visualizar la información de un registro
    public function view($idDevelop) {
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $desarrollador = new Desarrollador();
        $data['titulo'] = "Detalle del Desarrollador";
        $data['desarrollador'] = $desarrollador->getDesarrollador($idDevelop);
        require_once "views/desarrolladores/view.php";
    }

    // Mostrar la vista para actualizar un registro (Proyecto)
    public function edit($idDevelop) {
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $desarrollador = new Desarrollador();
        $data['idDevelop'] = $idDevelop;
        $data['desarrollador'] = $desarrollador->getDesarrollador($idDevelop);
        $data['titulo'] = "Actualizar Desarrollador";
        require_once "views/desarrolladores/edit.php";
    }

    // Actualizar el registro
    public function update() {
        $user = new Usuario();
        $data['usuario'] = $user->listar();

        $idUser = $_POST['idUser'];
        $idDevelop = $_POST['idDevelop'];
        $habilidad = $_POST['habilidad'];

        $desarrollador = new Desarrollador();
        $desarrollador->update($idDevelop, $idUser, $habilidad);
        $this->index();
    }

    // Elimina un proyecto
    public function delete($idDevelop) {
        $desarrollador = new Desarrollador();
        $desarrollador->delete($idDevelop);
        $this->index();
    }

}

?>