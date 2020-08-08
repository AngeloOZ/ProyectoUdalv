<?php
class ControladorMood{
    public function ctrRegistrarMood(){
        if(isset($_POST["estadoAnimo"])){
            if(!empty($_POST["estadoAnimo"])){
                $tabla = "estado";
                $token = $_SESSION["tokenUser"];
                $idUser = $_SESSION["idUser"];
                $estado = $_POST["estadoAnimo"];
                $fecha = date("Y-M-D");
                $datos = array(
                    "name"=> $estado,
                    "token_user" =>$token,
                    "id_user" => $idUser,
                    "mood_day" => $fecha
                );
                $respuesta = ModeloMood::mdlRegistrarMood($tabla,$datos);
                if($respuesta=="Ok"){
                    echo "Guardado Exitoso";
                    LimpiarCache();
                }
                else{
                    echo "Error $respuesta[1]: $respuesta[2]<br>";
                    LimpiarCache();
                }
            }
            else
            {
                echo "No seleccionaste nada";
            }
        }

        
    }
}