<?php

class ScrumteamsController {

    public function __construct() {
        require_once 'models/Scrumteams.php';
        require_once 'models/Desarrollador.php';
        require_once 'models/Scrummaster.php';
        require_once 'models/Productowner.php';
        require_once 'models/Usuario.php';
        require_once 'helper/SessionHelp.php';
    }

    public function index() {

        SessionHelp::verificarSession();
        $steam = new Scrumteams();
        $data['scrumteams'] = $steam->listar();
        $data['titulo'] = "Lista de Equipos Scrum";
        // Cargar la vista
        require_once "views/scrumteams/index.php";
    }

    // Mostrar la vista para crear un nuevo registro (Proyecto)
    public function insert() {
        $scrum = new Scrummaster();
        $data['scrummaster'] = $scrum->listar();
        $develop = new Desarrollador();
        $data['desarrollador'] = $develop->listar();
        $owner = new Productowner();
        $data['productowner'] = $owner->listar();
        $data['titulo'] = "Agregar Equipos";
        // Cargar la vista
        require_once "views/scrumteams/insert.php";
    }

    // Guardar el registo
    public function store() {
        $scrum = new Scrummaster();
        $data['scrummaster'] = $scrum->listar();
        $develop = new Desarrollador();
        $data['desarrollador'] = $develop->listar();
        $owner = new Productowner();
        $data['productowner'] = $owner->listar();

        // Recibir los datos del formulario
        $idSmaster = $_POST['idSmaster'];
        $idProduct = $_POST['idProduct'];
        $idDevelop = $_POST['idDevelop'];
        $nombre = $_POST['nomteam'];
        $sprintact = $_POST['sprintact'];


        // Guardando el registro
        $steam = new Scrumteams();
        $steam->insert($idSmaster, $idProduct, $idDevelop, $nombre, $sprintact);

        // Enviar a la vista del index
        $this->index();

    }

    // Visualizar la información de un registro
    public function view($idSteams) {
        
        $scrum = new Scrummaster();
        $data['scrummaster'] = $scrum->listar();
        $develop = new Desarrollador();
        $data['desarrollador'] = $develop->listar();
        $owner = new Productowner();
        $data['productowner'] = $owner->listar();
        $user = new Usuario();
        $data['usuario'] = $user->listar();


        $steam = new Scrumteams();
        $data['titulo'] = "Detalle del Equipo";
        $data['scrumteams'] = $steam->getTeam($idSteams);
        require_once "views/scrumteams/view.php";
    }

    // Mostrar la vista para actualizar un registro (Proyecto)
    public function edit($idSteams) {
        
        $scrum = new Scrummaster();
        $data['scrummaster'] = $scrum->listar();
        $develop = new Desarrollador();
        $data['desarrollador'] = $develop->listar();
        $owner = new Productowner();
        $data['productowner'] = $owner->listar();
        

        $steam = new Scrumteams();
        $data['idSteams'] = $idSteams;
        $data['scrumteams'] = $steam->getTeam($idSteams);
        $data['titulo'] = "Actualizar Equipo";
        require_once "views/scrumteams/edit.php";
    }

    // Actualizar el registro
    public function update() {
        $scrum = new Scrummaster();
        $data['scrummaster'] = $scrum->listar();
        $develop = new Desarrollador();
        $data['desarrollador'] = $develop->listar();
        $owner = new Productowner();
        $data['productowner'] = $owner->listar();

        $idSteams = $_POST['idSteams'];
        $idSmaster = $_POST['idSmaster'];
        $idProduct = $_POST['idProduct'];
        $idDevelop = $_POST['idDevelop'];
        $nombre = $_POST['nomteam'];
        $sprintact = $_POST['sprintact'];

        $steam = new Scrumteams();
        $steam->update($idSteams, $idSmaster, $idProduct, $idDevelop, $nombre, $sprintact);
        $this->index();
    }

    // Elimina un proyecto
    public function delete($idSteams) {
        $steam = new Scrumteams();
        $steam->delete($idSteams);
        $this->index();
    }

}

?>