<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UDALV</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src="vistas/js/sweetalert2.all.min.js"></script>
    <!-- scripts propios -->
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
    ?>
</body>
</html>