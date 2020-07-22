<?php 

    //*Controladores
    require_once "controladores/controlador.plantilla.php";
    require_once "controladores/controladores.formularios.php";
    //*Modelos
    require_once "modelos/modelos.login.php";
    require_once "modelos/modelos.login.php";

    $plantilla = new ControladorPlantilla();
    $plantilla->ctrTraerPlantilla();
    //hola