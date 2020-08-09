<?php
class ControladorTareas{
    public static function ctrListarTareas($filtro){
        $token = $_SESSION['tokenUser'];
        $tabla="notas";
        $respuesta = ModeloTareas::mdlListarTarea($tabla, $token, null);
        
        $contenido = '';
        if(!empty($respuesta)){
            foreach($respuesta as $valor){
                $contenido .= '
                <div class="nota2">
                    <h3>Lorem ipsum dolor sit </h3>
                    <i id="clock" class="far fa-clock"></i>
                  <label class="fecha">2020-12-12</label>
                <label class="fecha">| 12:20</label>
                <a href="#" target="_blank">Editar<i class="fas fa-angle-double-right"></i></a>
              </div>
                ';
            }
            return $contenido;          
        }
    }
}
?>
