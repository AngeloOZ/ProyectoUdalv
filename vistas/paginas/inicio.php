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
        <span><i class="fas fa-user-ninja"></i></span>
        <p><?php echo $usuario["name"] ?></p>
        <p><?php echo $usuario["email"] ?></p>
    </div>
    <div class="opciones">
        <div class="opcion">
            <span class="icono-opcion"><i class="fas fa-user-edit"></i></span>
            <span class="texto-opcion">Editar Usuario</span>
        </div>
        <div class="opcion">
            <span class="icono-opcion"><i class="fas fa-link"></i></span>
            <span class="texto-opcion">Enlaces</span>
        </div>
        <div class="opcion">
            <span class="icono-opcion"><i class="fas fa-tasks"></i></i></span>
            <span class="texto-opcion">Tareas</span>
        </div>
        <div class="opcion">
            <span class="icono-opcion"><i class="fas fa-calendar-alt"></i></span>
            <span class="texto-opcion">Calendario</span>
        </div>
        <div class="opcion">
            <span class="icono-opcion"><i class="fas fa-moon"></i></span>
            <span class="texto-opcion">Mood Tracker</span>
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
<script>
    user = document.getElementById("user");
    body = document.querySelector('body');
    function BarraLateral(){
        body.classList.toggle('active-barra');
        if(body.classList.contains('active-barra')){
            user.classList.remove('fa-user-circle');
            user.classList.remove('fas')
            user.classList.add('fa-times-circle');
            user.classList.add('far');
        }else{
            user.classList.add('fa-user-circle')
            user.classList.add('fas')
            user.classList.remove('fa-times-circle');
            user.classList.remove('far');
        }
    }
</script>    