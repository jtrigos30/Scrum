<?php

class LogeoController {

    public function __construct() {
        require_once "models/Logeo.php";
        session_start();
    }

    public function register() {

        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $contrasenia = $_POST['contrasenia'];

        if($cedula == null || $nombre == null || $email == null || $contrasenia == null) {
            $data['titulo'] = "Registro de usuario";
            $data['error'] = "Ingrese datos validos";
            require_once "views/logeos/registro.php";
        } else {
            $logeo = new Logeo();
            $logeo->store($cedula, $nombre, $email, $contrasenia);
            header('Location: index.php?controlador=logeo&accion=verLogin');
        }
    }
    
    public function verLogin() {
        $data['titulo'] = "Iniciar sesion";
        require_once "views/logeos/login.php";
    }

    public function verRegistro() {
        $data['titulo'] = "Registro de usuario";
        require_once "views/logeos/registro.php";
    }

    public function login() {
        $cedula = $_POST['cedula'];
        $contrasenia = $_POST['contrasenia'];

        $modeloLogeo = new Logeo();
        $logeo = $modeloLogeo->consultarUsuario($cedula);

        // var_dump($usuario);

        if($logeo == null) {
            $data['titulo'] = "Iniciar sesion";
            $data['error'] = "No existe un usuario con ese número de documento";
            require_once "views/logeos/login.php";
        } else {
            // Verificar contraseña
            if(password_verify($contrasenia, $logeo['contrasenia'])) {
                $_SESSION["cedula"] = $logeo['cedula'];
                header("Location: index.php");
            } else {
                $data['titulo'] = "Iniciar sesion";
                $data['error'] = "Contraseña incorrecta";
                require_once "views/logeos/login.php";
            }
        }
    }

    public function logout() {
        unset($_SESSION['cedula']);
        header('Location: index.php?controlador=logeo&accion=verLogin');
    }

}



?>