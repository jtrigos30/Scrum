<?php

class UsuarioController {

    public function __construct() {
        require_once 'models/Usuario.php';
        require_once 'helper/SessionHelp.php';
    }

    public function index() {

        SessionHelp::verificarSession();
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $data['titulo'] = "Usuarios Por Asignar";
        // Cargar la vista
        require_once "views/usuarios/index.php";
    }

    // Mostrar la vista para crear un nuevo registro (Proyecto)
    public function insert() {
        $user = new Usuario();
        $data['usuario'] = $user->listar();
        $data['titulo'] = "Nuevo Usuario";
        // Cargar la vista
        require_once "views/usuarios/insert.php";
    }

    // Guardar el registo
    public function store() {

        // Recibir los datos del formulario
        $nomuser = $_POST['nomuser'];
        $contuser = $_POST['contuser'];

        // Guardando el registro
        $user = new Usuario();
        $user->insert($nomuser, $contuser);

        // Enviar a la vista del index
        $this->index();

    }

    // Visualizar la información de un registro
    public function view($idUser) {
        $user = new Usuario();
        $data['titulo'] = "Detalle del Usuario";
        $data['usuario'] = $user->getUsuario($idUser);
        require_once "views/usuarios/view.php";
    }

    // Mostrar la vista para actualizar un registro (Proyecto)
    public function edit($idUser) {
        $user = new Usuario();
        $data['idUser'] = $idUser;
        $data['usuario'] = $user->getUsuario($idUser);
        $data['titulo'] = "Actualizar Usuario";
        require_once "views/usuarios/edit.php";
    }

    // Actualizar el registro
    public function update() {
        $idUser = $_POST['idUser'];
        $nomuser = $_POST['nomuser'];
        $contuser = $_POST['contuser'];

        $user = new Usuario();
        $user->update($idUser, $nomuser, $contuser);
        $this->index();
}

    // Elimina un proyecto
    public function delete($idUser) {
        $user = new Usuario();
        $user->delete($idUser);
        $this->index();
    }

}

?>