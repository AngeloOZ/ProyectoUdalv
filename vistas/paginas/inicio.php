<?php 
    if(!isset($_SESSION["validarSession"])){
        header("location: login");
        return;
    }else{
        if($_SESSION["validarSession"] != "ok"){
            header("location: login");
            return;
        }
    }
?>
<h1>Hola Bienvenido</h1>
<a href="salir">Cerrar Sesión</a>