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
    $usuario = ControladorFormularios::ctrObtenerDatosUser();
?> 
<div class="menu-lateral">
    <div class="datos">
        <span><i class="<?php echo $usuario["avatar"] ?>"></i></span>
        <p><?php echo $usuario["name"] ?></p>
        <p><?php echo $usuario["email"] ?></p>
    </div>
    <div class="opciones" id="tabs">
        <div class="opcion">
            <span class="icono-opcion"><i class="fas fa-user-edit"></i></span>
            <span class="texto-opcion">Editar Usuario</span>
        </div>
        <div class="opcion active-tab">
            <span class="icono-opcion"><i class="fas fa-calendar-alt"></i></span>
            <span class="texto-opcion">Calendario</span>
        </div>
        <div class="opcion">
            <span class="icono-opcion"><i class="fas fa-tasks"></i></i></span>
            <span class="texto-opcion">Tareas</span>
        </div>
        <div class="opcion">
            <span class="icono-opcion"><i class="fas fa-sticky-note"></i></span>
            <span class="texto-opcion">Notas</span>
        </div>
        <div class="opcion">
            <span class="icono-opcion"><i class="fas fa-moon"></i></span>
            <span class="texto-opcion">Mood Tracker</span>
        </div>
        <div class="opcion">
            <span class="icono-opcion"><i class="fas fa-link"></i></span>
            <span class="texto-opcion">Enlaces</span>
        </div>
        <a href="salir" class="opcion">
            <span class="icono-opcion"><i class="fas fa-sign-out-alt"></i></span>
            <span class="texto-opcion">Cerrar Session</span>
        </a>
    </div>
</div>
<header class="header-inicio">
    <nav class="nav">
        <div class="logo">UDALV</div>
        <div class="profile" onclick="BarraLateral()">
            <i id="user" class="fas fa-user-circle"></i>
        </div>
    </nav>
</header>
<main class="contenedor-tab">
       <div class="tab"><?php require_once "./vistas/paginas/modulos/usuario.php"; ?></div>
       <div class="tab"><?php require_once "./vistas/paginas/modulos/calendario.php"; ?></div>
       <div class="tab"><?php require_once "./vistas/paginas/modulos/tareas.php"; ?></div>
       <div class="tab"><?php require_once "./vistas/paginas/modulos/notas.php"; ?></div>
       <div class="tab"><?php require_once "./vistas/paginas/modulos/mod.php"; ?></div>
       <div class="tab"><?php require_once "./vistas/paginas/modulos/enlaces.php"; ?></div>
</main>
<script>
    TabPanel();
</script>    