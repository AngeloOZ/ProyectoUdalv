<?php 
class ControladorEnlace{
    public static function ctrListarEnlace($token, $filtro){
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
                    <td>'.($con++).'</td>
                    <td class="name-td"><span><i class="'.$td['icon'].'"></i></span>'.$td['name'].'</td>
                    <td><a class="link" href="'.$td['link'].'" target="_blank">'.$td['link'].'</a></td>
                    <td class="operaciones">
                        <div atributeId="'.$td['id'].'" class="btn btn-edit"><i class="fas fa-pencil-alt"></i></div>
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
            $tokens = array("id"=>$_POST["hiddenIdUsuario"], "token" => $_POST["hiddenTokenUsuario"]);
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
                        echo "Se registro el enlace correctamente";
                    }else{
                        echo "$respuesta[0]: $respuesta[1]: $respuesta[2]";
                    }
                }else{
                    echo "Algunos caracteres especiales no son permitidos (<, >, /, |, \)";
                }
            }else{
                echo "Todos los campos son requeridos";
            }   
        }
    }
    public function ctrEditarEnlace(){
        if(isset($_POST["ingresarNombreEnlace"])){
            $nombreEnlace = filtrarInput($_POST["ingresarNombreEnlace"]);
            $icono = $_POST["ingresarIcono"];
            $url = filter_var($_POST["ingresarUrl"], FILTER_SANITIZE_URL);
            $tokens = array("idEnlace"=>$_POST["ingresarIdEnlace"], "token" => $_POST["ingresarTokenEnlace"], "idUser"=>$_POST["ingresarIdUser"]);
            if(!empty($nombreEnlace) && !empty($icono) && !empty($url) && !empty($tokens)){
                if(preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚÑñ ,.-_=+%$#@!?¿¡)(]+$/',$nombreEnlace) &&
                   filter_var($url, FILTER_VALIDATE_URL)
                ){
                    $tabla = "enlaces";
                    $comprobacionDatos = ModeloEnalce::mdlSelecionarEnlaceEspecifico($tabla,$tokens);
                    if(!empty($comprobacionDatos)){
                        $datos = array(
                            "name" => $nombreEnlace, 
                            "icon" => $icono,
                            "link" => $url,
                            "id_user" => $tokens["idUser"],
                            "token_user" => $tokens["token"]
                        );
                        $respuesta = ModeloEnalce::mdlActualizarEnalce($tabla, $datos);
                        if($respuesta == "ok"){
                            MsgSuccess("Enlace registrado exitosamente");
                        }else{
                            MsgError("$respuesta[1]: $respuesta[2]");
                        }
                    }else{
                        MsgError("Ups parece que hubo un error, intentalo más tarde");
                    }
                }else{
                    MsgError("Algunos caracteres especiales no son permitidos (<, >, /, |, \)");
                }
            }else{
                MsgError("Todos los campos son requeridos");
            }   
        }
    }
}
function filtrarInput($text){
    return htmlspecialchars(trim($text),ENT_QUOTES, 'UTF-8');
}
if(isset($_POST['operacionEnlace']) && !empty($_POST['operacionEnlace'])){
    require_once "../modelos/modelos.enlaces.php";
    $operacion = $_POST['operacionEnlace'];
    $token = $_POST['TokenUserEnlace'];
    $id = $_POST['idUserEnlace'];
    $filter = null;

    if(isset($_POST['FilterSearch'])){
        $filter = $_POST['FilterSearch'];
    }
    
    switch($operacion){
        case 'read':
            $tabla = ControladorEnlace::ctrListarEnlace($token, $filter);
            echo $tabla; 
            break;
        case 'create':
            $add = new ControladorEnlace();
            $add->ctrRegistratEnlace();
            break;
        case 'update':
            echo 'papita';
            break;
        case 'delete':
            echo 'papita';
            break;
    }       
}
