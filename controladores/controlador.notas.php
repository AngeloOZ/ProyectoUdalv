<?php
class ControladorNotas{
    public static function ctrListarNotas($filtro){
        $token = $_SESSION['tokenUser'];
        $tabla="notas";
        $respuesta = ModeloNotas::mdlListarNota($tabla, $token, null);
        
        $contenido = '';
        if(!empty($respuesta)){
            foreach($respuesta as $valor){
                $contenido .= '
                <div class="nota" atributoidnota="'.Seguridad::encryption($valor["id"]).'">
                    <i id="crossN" class="far fa-times-circle"></i>
                    <i id="erraiserN" class="fas fa-eraser"></i>
                    <h3>'.$valor["title"].'</h3>
                    <p>'.$valor["description"].'</p>
                </div>
                ';
            }
            return $contenido;          
        }
    }

/* -------------------------------------------------------------------------- */
/*                          Controlador Agregar Notas                         */
/* -------------------------------------------------------------------------- */

    public function ctrAgregarNotas(){
        if(isset($_POST["insertarNota"])){
            if(!empty($_POST["insertarNota"]) && !empty($_POST["insertarDescripcion"])){
                $nombre = htmlspecialchars($_POST["insertarNota"]);
                $descripcion = htmlspecialchars($_POST["insertarDescripcion"]);
                $token  = $_SESSION["tokenUser"];
                $id = $_SESSION["idUser"];
                $tabla = "notas";

                $datos = array(
                    "nombre" => $nombre,
                    "descripcion" => $descripcion,
                    "token" => $token,
                    "id" => $id
                );
                $respuesta = ModeloNotas::mdlAgregarNota($tabla, $datos);
                if($respuesta == "ok"){
                    AlertaSuccessNotas("La nota se agrego correctamente","Registrado");
                }else{
                    $error = "$respuesta[1]: $respuesta[2]";
                    AlertaErrorNotas($error);
                }
            }else{
                AlertaErrorNotas("No se permite valores vacíos");
            }
        }
    }

    public function ctrActualizarNotas(){
        if(isset($_POST["insertarDescripcion"])){
            if(!empty($_POST["insertarNota"]) && !empty($_POST["insertarDescripcion"]) && !empty($_POST["editarID"])){
                $nombre = htmlspecialchars($_POST["insertarNota"]);
                $descripcion = htmlspecialchars($_POST["insertarDescripcion"]);
                $token  = $_SESSION["tokenUser"];
                $idNota = Seguridad::decryption($_POST["editarID"]);

                $tabla = "notas";
                $datos = array(
                    "nombre" => $nombre,
                    "descripcion" => $descripcion,
                    "token" => $token,
                    "idnota" => $idNota
                );
                $respuesta = ModeloNotas::mdlActualizarNota($tabla, $datos);
                if($respuesta == "ok"){
                    AlertaSuccessNotas("Se actualizo la nota ","Actualizado");
                }else{
                    $err = "$respuesta[1]: $respuesta[2]";
                    AlertaErrorNotas($err);
                }
            }else{
                AlertaErrorNotas("no valores vacios");
            }
        }
    }

    public function ctrEliminarNota(){
        if(isset($_POST["idNota"]) && !empty($_POST["idNota"])){
            $id = Seguridad::decryption($_POST["idNota"]);
            $tabla = "notas";
            $respuesta = ModeloNotas::mdlEliminarNota($tabla, $id);

            if($respuesta == "ok"){
                AlertaSuccessNotas("Se elimino la nota correctamente","Eliminado");
            }else{
                $error =  "$respuesta[1]: $respuesta[2]";
                AlertaErrorNotas($error);
            }
        }
    }
}
function AlertaErrorNotas($sms){
    $resp = array("RespType"=>"error","sms"=>$sms, "sms2"=>"Oops...");
    echo json_encode($resp);
}
function AlertaSuccessNotas($sms, $sms2){
    $resp = array("RespType"=>"success","sms"=>$sms, "sms2"=>$sms2);
    echo json_encode($resp);
}
if(isset($_POST["operacionEnlace"])){
    session_start();
    require_once "../modelos/modelos.notas.php";
    require_once "controlador.security.php";
    $op = $_POST["operacionEnlace"];
    switch($op){
        case "create":
            $crear = new ControladorNotas();
            $crear->ctrAgregarNotas();
            break;
        case "read":
            echo ControladorNotas::ctrListarNotas(null);
            break;
        case "update":
            $delete = new ControladorNotas();
            $delete->ctrActualizarNotas();
            break;
        case "delete":
            $eliminar = new ControladorNotas();
            $eliminar->ctrEliminarNota();
            break;
    }
}