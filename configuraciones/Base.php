<?php

class Base {

    //Funcion para conectar con la base de datos
    public static function conectar() {
        
        //$conexion = new mysqli('localhost', 'u747487397_takeda', 'T4ked4$Electr0nic', 'u747487397_takeda_uno')or die("Error en la conexion");
        $conexion = new mysqli('localhost', 'root', '', 'proyectotakeda')or die("Error en la conexion");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }

}

?>

