<?php

class SessionHelp {
    public static function verificarSession() {
        session_start();
        // Establecer tiempo de vida de la sesión en segundos
        $inactividad = 900;
        // Comprobar si $_SESSION["timeout"] está establecida
        if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
            $sessionTTL = time() - $_SESSION["timeout"];
            if($sessionTTL > $inactividad){
                session_destroy();
                header("Location: index.php?controlador=usuario&accion=verLogin");
            }
        }
        // El siguiente key se crea cuando se inicia sesión
        $_SESSION["timeout"] = time();
    }
}


?>