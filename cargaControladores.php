<?php

//Funcion para cargar los controladores 
function cargarControladores($classname){
    include 'controladores/' . $classname . '.php'; 
}

spl_autoload_register('cargarControladores')

?>