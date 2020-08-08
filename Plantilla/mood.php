<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon"
        href="https://img2.freepng.es/20180331/eow/kisspng-computer-icons-user-clip-art-user-5abf13db298934.2968784715224718991702.jpg"
        type="image/x-icon">
    <link rel="stylesheet" href="./inicio.css">
    <link rel="stylesheet" href="./mood.css">
    <link rel="stylesheet" href="GRAFI.css"/>
    <script src="https://kit.fontawesome.com/736596057b.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;800&display=swap"
        rel="stylesheet">
    <title>Inicio</title>

    <script src="./TabPanel.js"></script>

</head>

<body>
    <div class="menu-lateral">
        <div class="datos">
            <span><i class="fas fa-user-ninja"></i></span>
            <p>Angello Ordonez</p>
            <p>angelo-mjz7@hotmail.com</p>
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
                <span class="icono-opcion"><i class="fas fa-moon"></i></span>
                <span class="texto-opcion">Mood Tracker</span>
            </div>
            <div class="opcion">
                <span class="icono-opcion"><i class="fas fa-link"></i></span>
                <span class="texto-opcion">Enlaces</span>
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
    <main class="contenedor-tab">
        <div class="tab">Tab Usuarios</div>
        <div class="tab ">Tab Calendario</div>
        <div class="tab">Tab Tareas</div>
        <div class="tab visible-tab">
            <div class="contenedor_principal_mood">
                <div class="contenedor_registro_mood">
                    <form>
                        <h2 class="Titulito"> ¿Cómo te sientes hoy?
                        </h2>
                        <div class="contenedor_opciones">
                            <div class="form-group-radios">
                                <input type="radio" name="estadoAnimo" id="estadoMuyBien">
                                <label class="label" for="estadoMuyBien"><span>Muy Bien</span><img src="./img/Emoji svg/1 muyBueno (2).svg" alt=""></label>
                            </div>
                            <div class="form-group-radios">
                                <input type="radio" name="estadoAnimo" id="estadoBien">
                                <label class="label" for="estadoBien"><span>Bien</span><img src="./img/Emoji svg/2 bueno (2).svg" alt=""></label>
                            </div>
                            <div class="form-group-radios">
                                <input type="radio" name="estadoAnimo" id="estadoRegular">
                                <label class="label" for="estadoRegular"><span>Regular</span><img src="./img/Emoji svg/3 regular (2).svg" alt=""></label>
                            </div>
                            <div class="form-group-radios">
                                <input type="radio" name="estadoAnimo" id="estadoMalo">
                                <label class="label" for="estadoMalo"><span>Malo</span><img src="./img/Emoji svg/4 malo (2).svg" alt=""></label>
                            </div>
                            <div class="form-group-radios">
                                <input type="radio" name="estadoAnimo" id="estadoMuyMalo">
                                <label class="label" for="estadoMuyMalo"><span>Muy Malo</span><img src="./img/Emoji svg/5 muyMaloV2 (2).svg" alt=""></label>
                            </div>
                        </div>
                        <input type="hidden" name="tokenUserMode">
                        <input type="hidden" name="idUser">
                        <input type="submit" value="Guardar">
                    </form>
                </div>
                <div class="contenedor_grafico_principal">
                    <div class="contenedor_botones">

                        <a href="#" class="btngrafica">
                            <span> Semanal 1
                            </span>
                        </a>
                        <a href="#" class="btngrafica">
                            <span> Mensual
                            </span>
                        </a>
                        <a href="#" class="btngrafica">
                            <span> Todos
                            </span>
                        </a>
                    </div>
                    <div class="contenedor_grafica">
                        <div class="circulo">
                            <div id="chartdiv"></div>
                            <script src="core.js"></script>
                            <script src="charts.js"></script>
                            <script src="animated.js"></script>
                            <script src="grafi.js"></script>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="tab "></div>

        </div>
    </main>

    <script src="./main.js"></script>

</body>

</html>