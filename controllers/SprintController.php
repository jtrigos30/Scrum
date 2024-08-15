<?php

class SprintController {

    public function __construct() {
        require_once 'models/Scrumteams.php';
        require_once 'helper/SessionHelp.php';
        require_once 'models/Sprint.php';
    }

    public function index() {

        SessionHelp::verificarSession();
        $sprint = new Sprint();
        $data['sprints'] = $sprint->listar();
        $data['titulo'] = "Lista de Sprints";
        // Cargar la vista
        require_once "views/sprints/index.php";
    }

    // Mostrar la vista para crear un nuevo registro (Proyecto)
    public function insert() {
        $team = new Scrumteams();
        $data['scrumteams'] = $team->listar();
        $data['titulo'] = "Crear nuevo sprint";
        // Cargar la vista
        require_once "views/sprints/insert.php";
    }

    // Guardar el registo
    public function store() {
        $team = new Scrumteams();
        $data['scrumteams'] = $team->listar();

        // Recibir los datos del formulario
        $idSteams = $_POST['idSteams'];
        $numsprint = $_POST['numsprint'];
        $fechai = $_POST['fechaini'];
        $fechaf = $_POST['fechafin'];
        $estado = $_POST['estado'];

        // Guardando el registro
        $sprint = new Sprint();
        $sprint->insert($idSteams, $numsprint, $fechai, $fechaf, $estado);

        // Enviar a la vista del index
        $this->index();

    }

    // Visualizar la información de un registro
    public function view($idSprint) {
        $team = new Scrumteams();
        $data['scrumteams'] = $team->listar();
        $sprint = new Sprint();
        $data['titulo'] = "Sprints";
        $data['sprint'] = $sprint->getSprint($idSprint);
        require_once "views/sprints/view.php";
    }

    // Mostrar la vista para actualizar un registro (Proyecto)
    public function edit($idSprint) {
        $team = new Scrumteams();
        $data['scrumteams'] = $team->listar();
        $sprint = new Sprint();
        $data['idSprint'] = $idSprint;
        $data['sprint'] = $sprint->getSprint($idSprint);
        $data['titulo'] = "Actualizar Sprint";
        require_once "views/sprints/edit.php";
    }

    // Actualizar el registro
    public function update() {
        $team = new Scrumteams();
        $data['scrumteams'] = $team->listar();

        $idSprint = $_POST['idSprint'];
        $idSteams = $_POST['idSteams'];
        $numsprint = $_POST['numsprint'];
        $fechai = $_POST['fechaini'];
        $fechaf = $_POST['fechafin'];
        $estado = $_POST['estado'];


        $sprint = new Sprint();
        $sprint->update($idSprint, $idSteams, $numsprint, $fechai, $fechaf, $estado);
        $this->index();
    }

    // Elimina un proyecto
    public function delete($idSprint) {
        $sprint = new Sprint();
        $sprint->delete($idSprint);
        $this->index();
    }

}

?>