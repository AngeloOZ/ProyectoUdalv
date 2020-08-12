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
                    AlertaSuccessMood('Registraste tu estado de ánimo!','Bien Hecho!');
                   
                } else {
                    AlertaErrorMood('Ya registraste anteriormente tu estado de ánimo este día');
                    
                }
            } 
        }
        else {
            AlertaErrorMood('No seleccionaste tu estado de ánimo');
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
    public static function ctrMostrarEstadoSemanal()
    {
        // session_start();
        $token = $_SESSION["tokenUser"];
        $tabla = "estado";
        $resultado = ModeloMood::mdlMostrarEstadoSemanal($tabla, $token);
        echo json_encode($resultado);
    }
    public static function ctrMostrarEstadoMensual()
    {
        // session_start();
        $token = $_SESSION["tokenUser"];
        $tabla = "estado";
        $resultado = ModeloMood::mdlMostrarEstadoMensual($tabla, $token);
        echo json_encode($resultado);
    }
}
function AlertaErrorMood($sms){
    $resp = array("RespType"=>"error","sms"=>$sms, "sms2"=>"Oops...");
    echo json_encode($resp);
}
function AlertaSuccessMood($sms, $sms2){
    $resp = array("RespType"=>"success","sms"=>$sms, "sms2"=>$sms2);
    echo json_encode($resp);
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
        case "insert":{
            $insertar =new ControladorMood();
            $insertar->ctrRegistrarMood();
        break;
        }
    }
}
if (isset($_POST["operacionMood1"])) {
    session_start();
    require_once "../modelos/modelos.mood.php";
    $post = $_POST["operacionMood1"];
    switch ($post) {
        case "read": {
                $leer = new ControladorMood();
                $leer->ctrMostrarEstadoSemanal();
                break;
            }
        }
    }
    if (isset($_POST["operacionMood2"])) {
        session_start();
        require_once "../modelos/modelos.mood.php";
        $post = $_POST["operacionMood2"];
        switch ($post) {
            case "read": {
                    $leer = new ControladorMood();
                    $leer->ctrMostrarEstadoMensual();
                    break;
                }
            }
        }

