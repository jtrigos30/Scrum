<?php

class BurdownchartController {

    public function __construct() {
        require_once 'models/Sprint.php';
        require_once 'helper/SessionHelp.php';
        require_once 'models/ProductBacklog.php';
        require_once 'models/Burdownchart.php';
        require_once 'models/Tarea.php';
    }

    public function index() {

        SessionHelp::verificarSession();
        $chart = new Burdownchart();
        $data['burdownchart'] = $chart->listar();
        $data['titulo'] = "Lista de Tablas Burdown Chart";
        // Cargar la vista
        require_once "views/burdowncharts/index.php";
    }

    // Mostrar la vista para crear un nuevo registro (Proyecto)
    public function insert() {
        $sprint = new Sprint();
        $data['sprint'] = $sprint->listar();
        $back = new ProductBacklog();
        $data['productbacklog'] = $back->listar();

        $data['titulo'] = "Crear nueva tabla";
        // Cargar la vista
        require_once "views/burdowncharts/insert.php";
    }

    // Guardar el registo
    public function store() {
        $sprint = new Sprint();
        $data['sprint'] = $sprint->listar();
        $back = new ProductBacklog();
        $data['productbacklog'] = $back->listar();

        // Recibir los datos del formulario
        $idBacklog = $_POST['idBacklog'];
        $idSprint = $_POST['idSprint'];
        

        // Guardando el registro
        $chart = new Burdownchart();
        $chart->insert($idSprint, $idBacklog);

        // Enviar a la vista del index
        $this->index();

    }

    // Visualizar la información de un registro
    public function view($idChart) {
        $sprint = new Sprint();
        $data['sprint'] = $sprint->listar();
        $back = new ProductBacklog();
        $data['productbacklog'] = $back->listar();
        $tarea = new Tarea();
        $data['tarea'] = $tarea->listar();


        $chart = new Burdownchart();
        $data['titulo'] = "Burdown Charts";
        $data['burdownchart'] = $chart->getChart($idChart);
        require_once "views/burdowncharts/view.php";
    }




    // Mostrar la vista para actualizar un registro (Proyecto)
    public function edit($idChart) {
        
        $sprint = new Sprint();
        $data['sprint'] = $sprint->listar();
        $back = new ProductBacklog();
        $data['productbacklog'] = $back->listar();


        $chart = new Burdownchart();
        $data['idChart'] = $idChart;
        $data['burdownchart'] = $chart->getChart($idChart);
        $data['titulo'] = "Actualizar Datos de la tabla";
        require_once "views/burdowncharts/edit.php";
    }

    // Actualizar el registro
    public function update() {
        $sprint = new Sprint();
        $data['sprint'] = $sprint->listar();
        $back = new ProductBacklog();
        $data['productbacklog'] = $back->listar();

        $idChart = $_POST['idChart'];
        $idBacklog = $_POST['idBacklog'];
        $idSprint = $_POST['idSprint'];


        $chart = new Burdownchart();
        $chart->update($idChart, $idSprint, $idBacklog);
        $this->index();
    }

    // Elimina un proyecto
    public function delete($idChart) {
        $chart = new Burdownchart();
        $chart->delete($idChart);
        $this->index();
    }

    public function tabla($idChart) {

        $chart = new Burdownchart();
        $fechaInicial = new DateTime($chart->getFechaInicial($idChart));
        $fechaFinal = new DateTime($chart->getFechaFinal($idChart));
        $diferenciaDias = $chart->calcularDiferenciaDias($fechaInicial, $fechaFinal);
        $tiempoPlaneado = $chart->obtenerTiempoPlaneado($idChart);
        $tablaBurdown = $chart->construirTablaBurndown($idChart, $fechaInicial, $fechaFinal, $diferenciaDias, $tiempoPlaneado);
        $this->indexTabla(['tablaBurdown' => $tablaBurdown]);
    }

    public function indexTabla($tablaBurdown) {

        //SessionHelp::verificarSession();
        $data['titulo'] = "Tabla Burdown Chart";
        // Cargar la vista
        require_once "views/burdowncharts/tabla.php";
    }





}

?>