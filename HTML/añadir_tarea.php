<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vistas/css/inicio.css">
    <link rel="stylesheet" type="text/css" href="../vistas/css/añadir_tarea.css">
    <script src="https://kit.fontawesome.com/736596057b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <title>Añadir_Tarea</title>
</head>
<body>
    <div class="menu-lateral">
        <div class="datos">
            <span><i class="fas fa-user-ninja"></i></span>
            <p>Angello Ordonez</p>
            <p>angelo-mjz7@hotmail.com</p>
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
            <a href="#" class="opcion">
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
        hola
    </script>



<div class="task-box">
      <h1>Tarea</h1>
      <form action="config.inc.php" method="post">
        <label for="name">Nombre</label>
        <input type="text" placeholder="Tarea" name="name">
        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="fecha"  value="<?php echo date("Y-m-d");?>">
        <input type="submit" value="Guardar">
      </form>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="#" class="float" target="_blank">
    <i id="add" class="fas fa-undo-alt"></i>
</body>
</html>