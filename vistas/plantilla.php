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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./vistas/css/style.css">
    <link rel="stylesheet" href="./vistas/css/sweetalert2.min.css">
    <script src="https://kit.fontawesome.com/736596057b.js" crossorigin="anonymous"></script>
    <!-- scripts propios -->
    <script src="vistas/js/sweetalert2.all.min.js"></script>
    
    <script src="vistas/js/inicio.js"></script>
</head>
<body>
    <?php 
        if(isset($_GET['pagina'])){
            if($_GET['pagina'] == 'login' ||
               $_GET['pagina'] == 'inicio' ||
               $_GET['pagina'] == 'salir'
            ){
                include "paginas/".$_GET['pagina'].".php";
            }else{
                echo "error 404";
            }
        }else{
            include "paginas/login.php";
        }
        // echo '<pre>';
        // echo '$_SESSION: ';
        // var_dump($_SESSION);
    ?>
</body>
</html>