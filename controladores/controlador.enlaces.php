<?php 
class ControladorEnlace{
    public static function ctrListarEnlace($filtro){
        $token = $_SESSION["tokenUser"];
        $tabla = "enlace";
        if($filtro == null){
            $enlaces = ModeloEnalce::mdlListarEnlaces($tabla, $token, null);
        }else{
            $enlaces = ModeloEnalce::mdlListarEnlaces($tabla,$token,$filtro);
        }
        $table = "";
        if(!empty($enlaces)){
            $table.='
            <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Url</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody> 
            ';
            $con = 1;
            foreach($enlaces as $td){
                $table.='
                <tr>
                    <td atributeId="'.Seguridad::encryption($td['id']).'">'.($con++).'</td>
                    <td class="name-td"><span><i class="'.$td['icon'].'"></i></span>'.$td['name'].'</td>
                    <td><a class="link" href="'.$td['link'].'" target="_blank">'.$td['link'].'</a></td>
                    <td class="operaciones">
                        <div class="btn btn-edit"><i class="fas fa-pencil-alt"></i></div>
                        <div class="btn btn-delete"><i class="fas fa-trash-alt"></i></div>
                    </td>
                </tr>
                ';
            }
            $table.='
                </tbody>
                </table>
            ';
            return $table;
        }
    }
    public function ctrRegistratEnlace(){
        if(isset($_POST["ingresarNombreEnlace"])){
            $nombreEnlace = filtrarInput($_POST["ingresarNombreEnlace"]);
            $icono = $_POST["ingresarIcono"];
            $url = filter_var($_POST["ingresarUrl"], FILTER_SANITIZE_URL);
            $tokens = array(
                "id" => $_SESSION["idUser"], 
                "token" => $_SESSION["tokenUser"]
            );

            if(!empty($nombreEnlace) && !empty($icono) && !empty($url) && !empty($tokens)){
                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ ,.-_=+%$#@!?¿¡)(]+$/',$nombreEnlace) &&
                   filter_var($url, FILTER_VALIDATE_URL)
                ){
                    $tabla = "enlace";
                    $datos = array(
                        "name" => $nombreEnlace, 
                        "icon" => $icono,
                        "link" => $url,
                        "id_user" => $tokens["id"],
                        "token_user" => $tokens["token"]
                    );
                    $respuesta = ModeloEnalce::mdlRegistrarEnlace($tabla, $datos);
                    if($respuesta == "ok"){
                        AlertaSuccess("Se registro el enlace correctamente","Registrado!");
                    }else{
                        $error = "Hubo errores de Conexión: $respuesta[1]: $respuesta[2]";
                        AlertaError($error);
                    }
                }else{
                    AlertaError("Algunos caracteres especiales no son permitidos (<, >, /, |, \)");
                }
            }else{
                AlertaError("Todos los campos son requeridos");
            }   
        }
    }
    public function ctrEditarEnlace(){
        if(isset($_POST["ingresarNombreEnlace"])){
            $nombreEnlace = filtrarInput($_POST["ingresarNombreEnlace"]);
            $icono = $_POST["ingresarIcono"];
            $url = filter_var($_POST["ingresarUrl"], FILTER_SANITIZE_URL);
            $idEnlace = Seguridad::decryption($_POST["hiddenIdLink"]);
            if(!empty($nombreEnlace) && !empty($icono) && !empty($url) && !empty($idEnlace)){
                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ ,.-_=+%$#@!?¿¡)(]+$/',$nombreEnlace) && filter_var($url, FILTER_VALIDATE_URL)
                ){
                    $tabla = "enlace";
                    $token = $_SESSION["tokenUser"];
                    $comprobacionDatos = ModeloEnalce::mdlSelecionarEnlaceEspecifico($tabla,$token,$idEnlace);
                    $datos = array(
                        "id" => $idEnlace,
                        "name" => $nombreEnlace, 
                        "icon" => $icono,
                        "link" => $url,
                        "token_user" => $token
                    );
                    if($comprobacionDatos["resp"] == "ok" && !empty($comprobacionDatos["consulta"])){
                        $respuesta = ModeloEnalce::mdlActualizarEnalce($tabla, $datos);
                        if($respuesta == "ok"){
                            AlertaSuccess("Su enlace fue actualizado correctamente","Actualizado!");
                        }else{
                            $error = "Hubo errores de conexion: $respuesta[1]: $respuesta[2]";
                            AlertaError($error);
                        }
                    }else{
                        AlertaError("Parece que hubo un error, intentalo más tarde");
                    }
                }else{
                    AlertaError("Algunos caracteres especiales no son permitidos (<, >, /, |, \)");
                }
            }else{
                AlertaError("Todos los campos son requeridos");
            }   
        }
    }
    public function ctrEliminarEnlace(){
        if(isset($_POST["idEnlaceDelete"])){
            $tabla = "enlace";
            $id = Seguridad::decryption($_POST["idEnlaceDelete"]);
            $respuesta = ModeloEnalce::mdlEliminarEnlace($tabla, $id);
            if($respuesta == "ok"){
                AlertaSuccess("Su enlace ha sido eliminado","Eliminado!");
            }else{
                $error = "Hubo errores de conexion: $respuesta[1]: $respuesta[2]";
                AlertaError($error);
            }
        }
    }
}
function filtrarInput($text){
    return htmlspecialchars(trim($text),ENT_QUOTES, 'UTF-8');
}
function AlertaError($sms){
    $resp = array("RespType"=>"error","sms"=>$sms, "sms2"=>"Oops...");
    echo json_encode($resp);
}
function AlertaSuccess($sms, $sms2){
    $resp = array("RespType"=>"success","sms"=>$sms, "sms2"=>$sms2);
    echo json_encode($resp);
}


if(isset($_POST['operacionEnlace']) && !empty($_POST['operacionEnlace'])){
    session_start();
    require_once "../modelos/modelos.enlaces.php";
    require_once "controlador.security.php";
    
    $operacion = $_POST['operacionEnlace'];
    $filter = null;

    if(isset($_POST['FilterSearch'])){
        $filter = $_POST['FilterSearch'];
    }
    
    switch($operacion){
        case 'read':
            echo  ControladorEnlace::ctrListarEnlace($filter);
            break;
        case 'create':
            $add = new ControladorEnlace();
            $add->ctrRegistratEnlace();
            break;
        case 'update':
            $update = new ControladorEnlace();
            $update->ctrEditarEnlace();
            break;
        case 'delete':
            $delete = new ControladorEnlace();
            $delete->ctrEliminarEnlace();
            break;
    }       
}
