
<div class="contenedor_principal_mood">
    <div class="contenedor_registro_mood">
        <form action="" method="POST">
            <h2 class="Titulito"> ¿Cómo te sientes hoy?
            </h2>
            <div class="contenedor_opciones">
                <div class="form-group-radios">
                    <input type="radio" name="estadoAnimo" value="Muy Bien" id="estadoMuyBien">
                    <label class="label" for="estadoMuyBien"><span>Muy Bien</span><img src="./img/Emoji svg/1 muyBueno (2).svg" alt=""></label>
                </div>
                <div class="form-group-radios">
                    <input type="radio" name="estadoAnimo" value="Bien" id="estadoBien">
                    <label class="label" for="estadoBien"><span>Bien</span><img src="./img/Emoji svg/2 bueno (2).svg" alt=""></label>
                </div>
                <div class="form-group-radios">
                    <input type="radio" name="estadoAnimo" value="Regular" id="estadoRegular">
                    <label class="label" for="estadoRegular"><span>Regular</span><img src="./img/Emoji svg/3 regular (2).svg" alt=""></label>
                </div>
                <div class="form-group-radios">
                    <input type="radio" name="estadoAnimo" value="Malo" id="estadoMalo">
                    <label class="label" for="estadoMalo"><span>Malo</span><img src="./img/Emoji svg/4 malo (2).svg" alt=""></label>
                </div>
                <div class="form-group-radios">
                    <input type="radio" name="estadoAnimo" value="Muy Malo" id="estadoMuyMalo">
                    <label class="label" for="estadoMuyMalo"><span>Muy Malo</span><img src="./img/Emoji svg/5 muyMaloV2 (2).svg" alt=""></label>
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