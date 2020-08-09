
<div class="contenedor_principal_mood">
    <div class="contenedor_registro_mood">
        <form action="" method="POST">
            <h2 class="Titulito"> ¿Cómo te sientes hoy?
            </h2>
            <div class="contenedor_opciones">
                <div class="form-group-radios">
                    <input type="radio" name="estadoAnimo" value="Muy Bien" id="estadoMuyBien">
                    <label class="label" for="estadoMuyBien"><span>Muy Bien</span><img src="vistas/img/Emoji svg/1 muyBueno (2).svg" alt=""></label>
                </div>
                <div class="form-group-radios">
                    <input type="radio" name="estadoAnimo" value="Bien" id="estadoBien">
                    <label class="label" for="estadoBien"><span>Bien</span><img src="vistas/img/Emoji svg/2 bueno (2).svg" alt=""></label>
                </div>
                <div class="form-group-radios">
                    <input type="radio" name="estadoAnimo" value="Regular" id="estadoRegular">
                    <label class="label" for="estadoRegular"><span>Regular</span><img src="vistas/img/Emoji svg/3 regular (2).svg" alt=""></label>
                </div>
                <div class="form-group-radios">
                    <input type="radio" name="estadoAnimo" value="Malo" id="estadoMalo">
                    <label class="label" for="estadoMalo"><span>Malo</span><img src="vistas/img/Emoji svg/4 malo (2).svg" alt=""></label>
                </div>
                <div class="form-group-radios">
                    <input type="radio" name="estadoAnimo" value="Muy Malo" id="estadoMuyMalo">
                    <label class="label" for="estadoMuyMalo"><span>Muy Malo</span><img src="vistas/img/Emoji svg/5 muyMaloV2 (2).svg" alt=""></label>
                </div>
            </div>
            <?php 
                $estado = new ControladorMood();
                $estado->ctrRegistrarMood();
            ?>
            <input type="submit" value="Guardar">
        </form>
    </div>
    <div class="contenedor_grafico_principal">
        <div class="contenedor_botones">

            <a id="boton_semanal" href="#" class="btngrafica">
                <span> Semanal <i class="fas fa-calendar-week"></i>
                </span>
            </a>
            <a id="boton_mensual" href="#" class="btngrafica">
                <span> Mensual <i class="fas fa-calendar-alt"></i>
                </span>
            </a>
            <a id="boton_todo" href="#" class="btngrafica">
                <span> Todos <i class="fas fa-border-all"></i>
                </span>
            </a>
        </div>
        <script src="./vistas/js/ajaxmood.js"></script>
        <div class="contenedor_grafica">
            <div class="circulo">
<<<<<<< HEAD:vistas/modulos/mod.php
                <div id="chartdiv"></div>
                <script src="./vistas/js/core.js"></script>
                <script src="./vistas/js/charts.js"></script>
                <script src="./vistas/js/animated.js"></script>
                <script src="./vistas/js/grafi.js"></script>
=======
                <!-- <div id="chartdiv"></div>
                <script src="core.js"></script>
                <script src="charts.js"></script>
                <script src="animated.js"></script>
                <script src="grafi.js"></script> -->
>>>>>>> 9ec27488c729f060021dff38819a8a6a32477783:vistas/paginas/modulos/mod.php
            </div>

        </div>
    </div>
</div>