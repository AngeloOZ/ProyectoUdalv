<?php 
    session_set_cookie_params(60*60*24);
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UDALV</title>
    <!-- Links de tipografias -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <!-- Links de css locales -->
    <link rel="stylesheet" type="text/css" href="./vistas/css/notas.css">
    <link rel="stylesheet" type="text/css" href="./vistas/css/mood.css">
    <link rel="stylesheet" type="text/css" href="./vistas/css/GRAFI.css">
    <link rel="stylesheet" type="text/css" href="./vistas/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="./vistas/css/tareas.css">
    <link rel="stylesheet" href="./vistas/css/sweetalert2.min.css">
    <link rel="stylesheet" href="./vistas/css/style.css">
    <!-- Link de Fontawesome -->
    <script src="https://kit.fontawesome.com/736596057b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- scripts propios locales-->
    <script src="vistas/js/sweetalert2.all.min.js"></script>
    <script src="vistas/js/inicio.js"></script>
    <script src='./vistas/js/calendar.js'></script>
</head>
<body>
    <?php 
        if(isset($_GET['pagina'])){
            if($_GET['pagina'] == 'login' ||
               $_GET['pagina'] == 'inicio' ||
               $_GET['pagina'] == 'prueba' ||
               $_GET['pagina'] == 'prueba' ||
               $_GET['pagina'] == 'salir'
            ){
                include "paginas/".$_GET['pagina'].".php";
            }else{
                echo "error 404";
            }
        }else{
            include "paginas/login.php";
        }
    ?>
</body>
</html>