<?php
class ControladorTareas{
    public static function ctrListarTask($filtro){
        $token = $_SESSION['tokenUser'];
        $tabla="tarea";
        $respuesta = ModeloTareas::mdlListarTarea($tabla, $token, null);
        
        $contenido = '';
        if(!empty($respuesta)){
            foreach($respuesta as $valor){
                $contenido .= '
                <div class="nota2" atributoidtask="'.Seguridad::encryption($valor["id"]).'">
                    <i id="cross" class="far fa-times-circle"></i>
                    <i id="erraiser" class="fas fa-eraser"></i>
                    <h3>'.$valor["name_task"].'</h3>
                    <i id="clock" class="far fa-clock"></i>
                    <label class="fecha">'.$valor["date"].'</label>
                </div>
                ';
            }
            return $contenido;          
        }
    }

/* -------------------------------------------------------------------------- */
/*                          Controlador Agregar Tareas                         */
/* -------------------------------------------------------------------------- */

    public function ctrAgregarTask(){
        if(isset($_POST["name"])){
            if(!empty($_POST["name"]) && !empty($_POST["fecha"])){
                $nombre = htmlspecialchars($_POST["name"]);
                $fecha = htmlspecialchars($_POST["fecha"]);
                $token  = $_SESSION["tokenUser"];
                $id = $_SESSION["idUser"];
                $tabla = "tarea";

                $datos = array(
                    "name_task" => $nombre,
                    "date" => $fecha,
                    "token" => $token,
                    "id" => $id
                );
                $respuesta = ModeloTareas::mdlAgregarTarea($tabla, $datos);
                if($respuesta == "ok"){
                    AlertaSuccessTask("La tarea se agrego correctamente","Registrado");
                }else{
                    $error = "$respuesta[1]: $respuesta[2]";
                    AlertaErrorTask($error);
                }
            }else{
                AlertaErrorTask("No se permite valores vacíos");
            }
        }
    }

    public function ctrActualizarTask(){
        if(isset($_POST["fecha"])){
            if(!empty($_POST["name"]) && !empty($_POST["fecha"]) && !empty($_POST["editarIDTask"])){
                $nombre = htmlspecialchars($_POST["name"]);
                $fecha = htmlspecialchars($_POST["fecha"]);
                $token  = $_SESSION["tokenUser"];
                $idTask = Seguridad::decryption($_POST["editarIDTask"]);

                $tabla = "tarea";
                $datos = array(
                    "name_task" => $nombre,
                    "date" => $fecha,
                    "idTask" => $idTask,
                    "state_task" => 0

                );
                $respuesta = ModeloTareas::mdlActualizarTarea($tabla, $datos);
                if($respuesta == "ok"){
                    AlertaSuccessTask("Se actualizo la tarea ","Actualizado");
                }else{
                    $err = "$respuesta[1]: $respuesta[2]";
                    AlertaErrorTask($err);
                }
            }else{
                AlertaErrorTask("no valores vacios");
            }
        }
    }

    public function ctrEliminarTask(){
        if(isset($_POST["idTask"]) && !empty($_POST["idTask"])){
            $id = Seguridad::decryption($_POST["idTask"]);
            $tabla = "tarea";
            $respuesta = ModeloTareas::mdlEliminarTarea($tabla, $id);

            if($respuesta == "ok"){
                AlertaSuccessTask("Se elimino la tarea correctamente","Eliminado");
            }else{
                $error =  "$respuesta[1]: $respuesta[2]";
                AlertaErrorTask($error);
            }
        }
    }




}

function AlertaErrorTask($sms){
    $resp = array("RespType"=>"error","sms"=>$sms, "sms2"=>"Oops...");
    echo json_encode($resp);
}
function AlertaSuccessTask($sms, $sms2){
    $resp = array("RespType"=>"success","sms"=>$sms, "sms2"=>$sms2);
    echo json_encode($resp);
}
if(isset($_POST["operacionEnlace"])){
    session_start();
    require_once "../modelos/modelos.tareas.php";
    require_once "controlador.security.php";
    $op = $_POST["operacionEnlace"];
    switch($op){
        case "create":
            $crear = new ControladorTareas();
            $crear->ctrAgregarTask();
            break;
        case "read":
            echo ControladorTareas::ctrListarTask(null);
            break;
        case "update":
            $delete = new ControladorTareas();
            $delete->ctrActualizarTask();
            break;
        case "delete":
            $eliminar = new ControladorTareas();
            $eliminar->ctrEliminarTask();
            break;
    }
}
