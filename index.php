<?php 

    //*Controladores
    require_once "controladores/controlador.plantilla.php";
    require_once "controladores/controlador.enlaces.php";
    require_once "controladores/controladores.formularios.php";
    require_once "controladores/controlador.security.php";
    // require_once "controladores/controlador.ajax.php";
    //*Modelos
    require_once "modelos/modelos.login.php";
    require_once "modelos/modelos.enlaces.php";

    $plantilla = new ControladorPlantilla();
    $plantilla->ctrTraerPlantilla();
    //hola