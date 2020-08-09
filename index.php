<?php 

    //*Controladores
    require_once "controladores/controlador.plantilla.php";
    require_once "controladores/controladores.formularios.php";
    require_once "controladores/controlador.security.php";
    require_once "controladores/controlador.mood.php";
    require_once "controladores/controlador.notas.php";
    // require_once "controladores/controlador.enlaces.php";
    //*Modelos
    require_once "modelos/modelos.login.php";
    require_once "modelos/modelos.enlaces.php";
    require_once "modelos/modelos.mood.php";
    require_once "modelos/modelos.notas.php";

    $plantilla = new ControladorPlantilla();
    $plantilla->ctrTraerPlantilla();