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
    <link rel="stylesheet" href="./vistas/css/style.css">
    <link rel="stylesheet" type="text/css" href="./vistas/css/tareas.css">
    <link rel="stylesheet" type="text/css" href="./vistas/css/mood.css">
    <link rel="stylesheet" type="text/css" href="./vistas/css/GRAFI.css">
    <link rel="stylesheet" type="text/css" href="./vistas/css/calendar.css">

    <link rel="stylesheet" href="./vistas/css/sweetalert2.min.css">
    <!-- Link de Fontawesome -->
    <script src="https://kit.fontawesome.com/736596057b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- scripts propios locales-->
    <script src="vistas/js/sweetalert2.all.min.js"></script>
    <script src="vistas/js/inicio.js"></script>
<script src='./vistas/js/calendar.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },

      displayEventTime: false, // don't show the time column in list view

      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',

      // US Holidays
      events: 'en.usa#holiday@group.v.calendar.google.com',

      eventClick: function(arg) {
        // opens events in a popup window
        window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

        arg.jsEvent.preventDefault() // don't navigate in main tab
      },

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }

    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
      height: 450px;
    width: 1200px;
    margin: 0 auto;
  }

</style>
</head>
<body>
    <?php 
        if(isset($_GET['pagina'])){
            if($_GET['pagina'] == 'login' ||
               $_GET['pagina'] == 'inicio' ||
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
        // echo '<pre>';
        // echo '$_SESSION: ';
        // var_dump($_SESSION);
    ?>
</body>
</html>