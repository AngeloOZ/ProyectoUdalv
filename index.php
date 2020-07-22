<?php 

    //*Controladores
    require_once "controladores/controlador.plantilla.php";
    //*Modelos
    require_once "modelos/modelos.login.php";

    $plantilla = new ControladorPlantilla();
    $plantilla->ctrTraerPlantilla();