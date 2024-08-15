<?php

class TareaController {

    public function __construct() {
        require_once 'models/Tarea.php';
        require_once 'models/Usuario.php';
        require_once 'models/Sprint.php';
        require_once 'models/Desarrollador.php';
        require_once 'models/ProductBacklog.php';
        require_once 'helper/SessionHelp.php';
    }

    public function index() {

        SessionHelp::verificarSession();
        $tarea = new Tarea();
        $data['tareas'] = $tarea->listar();
        $data['titulo'] = "Lista de Tareas";
        // Cargar la vista
        require_once "views/tareas/index.php";
    }

    // Mostrar la vista para crear un nuevo registro (Proyecto)
    public function insert() {
        $sprint = new Sprint();
        $data['sprint'] = $sprint->listar();
        $develop = new Desarrollador();
        $data['desarrollador'] = $develop->listar();
        $back = new ProductBacklog();
        $data['productbacklog'] = $back->listar();
        $data['titulo'] = "Añadir Nueva Tarea";
        // Cargar la vista
        require_once "views/tareas/insert.php";
    }

    // Guardar el registo
    public function store() {
        $sprint = new Sprint();
        $data['sprint'] = $sprint->listar();
        $develop = new Desarrollador();
        $data['desarrollador'] = $develop->listar();
        $back = new ProductBacklog();
        $data['productbacklog'] = $back->listar();

        // Recibir los datos del formulario
        $idSprint = $_POST['idSprint'];
        $idBacklog = $_POST['idBacklog'];
        $idDevelop = $_POST['idDevelop'];
        $estado = $_POST['estado'];
        $prioridad = $_POST['prioridad'];
        $descrip = $_POST['descrip'];
        $horas = $_POST['horas'];

        // Guardando el registro
        $tarea = new Tarea();
        $tarea->insert($idSprint, $idBacklog, $idDevelop, $estado, $prioridad, $descrip, $horas);

        // Enviar a la vista del index
        $this->index();

    }

    // Visualizar la información de un registro
    public function view($idTarea) {
        $sprint = new Sprint();
        $data['sprint'] = $sprint->listar();
        $develop = new Desarrollador();
        $data['desarrollador'] = $develop->listar();
        $back = new ProductBacklog();
        $data['productbacklog'] = $back->listar();
        $user = new Usuario();
        $data['usuario'] = $user->listar();

        $tarea = new Tarea();
        $data['titulo'] = "Detalle de Tarea";
        $data['tarea'] = $tarea->getTarea($idTarea);
        require_once "views/tareas/view.php";
    }

    // Mostrar la vista para actualizar un registro (Proyecto)
    public function edit($idTarea) {
        $sprint = new Sprint();
        $data['sprint'] = $sprint->listar();
        $develop = new Desarrollador();
        $data['desarrollador'] = $develop->listar();
        $back = new ProductBacklog();
        $data['productbacklog'] = $back->listar();

        $tarea = new Tarea();
        $data['idTarea'] = $idTarea;
        $data['tarea'] = $tarea->getTarea($idTarea);
        $data['titulo'] = "Actualizar Tarea";
        require_once "views/tareas/edit.php";
    }

    // Actualizar el registro
    public function update() {
        $sprint = new Sprint();
        $data['sprint'] = $sprint->listar();
        $develop = new Desarrollador();
        $data['desarrollador'] = $develop->listar();
        $back = new ProductBacklog();
        $data['productbacklog'] = $back->listar();


        $idTarea = $_POST['idTarea'];
        $idSprint = $_POST['idSprint'];
        $idBacklog = $_POST['idBacklog'];
        $idDevelop = $_POST['idDevelop'];
        $estado = $_POST['estado'];
        $prioridad = $_POST['prioridad'];
        $descrip = $_POST['descrip'];
        $horas = $_POST['horas'];

        $tarea = new Tarea();
        $tarea->update($idTarea, $idSprint, $idBacklog, $idDevelop, $estado, $prioridad, $descrip, $horas);
        $this->index();
    }

    // Elimina un proyecto
    public function delete($idTarea) {
        $tarea = new Tarea();
        $tarea->delete($idTarea);
        $this->index();
    }

}

?>