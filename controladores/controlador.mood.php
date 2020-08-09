<?php
class ControladorMood
{
    public function ctrRegistrarMood()
    {
        if (isset($_POST["estadoAnimo"])) {
            if (!empty($_POST["estadoAnimo"])) {
                $tabla = "estado";
                $token = $_SESSION["tokenUser"];
                $idUser = $_SESSION["idUser"];
                $estado = $_POST["estadoAnimo"];
                $fecha = date("Y-m-d");
                $datos = array(
                    "name" => $estado,
                    "token_user" => $token,
                    "id_user" => $idUser,
                    "mood_day" => $fecha
                );
                $respuesta = ModeloMood::mdlRegistrarMood($tabla, $datos);
                if ($respuesta == "Ok") {
                    echo "Guardado Exitoso";
                    LimpiarCache();
                } else {
                    echo "Error $respuesta[1]: $respuesta[2]<br>";
                    LimpiarCache();
                }
            } else {
                echo "No seleccionaste nada";
            }
        }
    }
    public static function ctrMostrarEstado()
    {
        // session_start();
        $token = $_SESSION["tokenUser"];
        $tabla = "estado";
        $resultado = ModeloMood::mdlMostrarEstado($tabla, $token);
        echo json_encode($resultado);
    }
}


if (isset($_POST["operacionMood"])) {
    session_start();
    require_once "../modelos/modelos.mood.php";
    $post = $_POST["operacionMood"];
    switch ($post) {
        case "read": {
                $leer = new ControladorMood();
                $leer->ctrMostrarEstado();
                break;
            }
    }
}
