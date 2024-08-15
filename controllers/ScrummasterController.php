<?php

class ScrummasterController {

    public function __construct() {
        require_once 'models/Scrummaster.php';
        require_once 'models/Usuario.php';
        require_once 'helper/SessionHelp.php';
    }

    public function index() {

        SessionHelp::verificarSession();
        $scrummaster = new Scrummaster();
        $data['scrummasters'] = $scrummaster->listar();
        $data['titulo'] = "Lista Scrum Master";
        // Cargar la vista
        require_once "views/scrummasters/index.php";
    }

    // Mostrar la vista para crear un nuevo registro (Proyecto)
    public function insert() {
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $data['titulo'] = "Asignar Nuevo Scrum Master a Usuario";
        // Cargar la vista
        require_once "views/scrummasters/insert.php";
    }

    // Guardar el registo
    public function store() {
        $user = new Usuario();
        $data['usuario'] = $user->listar();

        // Recibir los datos del formulario
        $idUser = $_POST['idUser'];
        $cert = $_POST['certificado'];

        // Guardando el registro
        $scrummaster = new Scrummaster();
        $scrummaster->insert($idUser, $cert);

        // Enviar a la vista del index
        $this->index();

    }

    // Visualizar la información de un registro
    public function view($idSmaster) {
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $scrummaster = new Scrummaster();
        $data['titulo'] = "Detalle del Scrum Master";
        $data['scrummaster'] = $scrummaster->getScrum($idSmaster);
        require_once "views/scrummasters/view.php";
    }

    // Mostrar la vista para actualizar un registro (Proyecto)
    public function edit($idSmaster) {
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $scrummaster = new Scrummaster();
        $data['idSmaster'] = $idSmaster;
        $data['scrummaster'] = $scrummaster ->getScrum($idSmaster);
        $data['titulo'] = "Actualizar Scrum Master";
        require_once "views/scrummasters/edit.php";
    }

    // Actualizar el registro
    public function update() {
        $user = new Usuario();
        $data['usuario'] = $user->listar();

        $idUser = $_POST['idUser'];
        $idSmaster = $_POST['idSmaster'];
        $cert = $_POST['certificado'];

        $scrummaster = new Scrummaster();
        $scrummaster->update($idSmaster, $idUser, $cert);
        $this->index();
    }

    // Elimina un proyecto
    public function delete($idSmaster) {
        $scrummaster = new Scrummaster();
        $scrummaster->delete($idSmaster);
        $this->index();
    }

}

?>