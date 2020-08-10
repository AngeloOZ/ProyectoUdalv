<?php 
define("SECRET_TOKEN","Security@#12$20%");
class ControladorFormularios{
    public $tokenComplement = "Security@#12$20%";
    public $emailRegister;
//* -------------------------------------------------------------------------- */
//*                      Controlador Registrar registro                      */
//* -------------------------------------------------------------------------- */
    public function ctrRegistrarUsuario(){
        if(isset($_POST["registrarCorreo"])){
            $email =  $_POST["registrarCorreo"];
            $nombreCompleto = $_POST["registrarNombre"];
            $password = $_POST["registrarPwd"];
            if(!empty($email) && !empty($nombreCompleto) && !empty($password)){
                if(filter_var($email,FILTER_VALIDATE_EMAIL) &&
                preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚÑñ ,]+$/',$nombreCompleto) &&
                preg_match('/^[0-9a-zA-Z@#.$%&]+$/',$password)){
                    $tabla = "usuario";
                    $existeEmail = ModelosFormularios::mdlSeleccionarRegistros($tabla,"email",$email);
                    if(empty($existeEmail)){
                         list($name, $lastname) = explode(" ",$nombreCompleto);
                        $token = password_hash("$email+$this->tokenComplement",PASSWORD_DEFAULT);
                        $datos = array(
                            "token" => $token,
                            "name"=>$name,
                            "lastname" => $lastname,
                            "email"=>$email,
                            "password"=>password_hash($password, PASSWORD_BCRYPT)
                        );
                        $respuesta = ModelosFormularios::mdlRegistrarUsuario($tabla,$datos);
                        if($respuesta == "ok"){
                            MsgSuccess("El usuario se registro Correctamente");
                            estadoAnimo();
                            LimpiarCache();
                        }else{
                            MsgError("$respuesta[1]: $respuesta[2]");
                            LimpiarCache();
                        }
                    }else{
                        $text = 'Esté email ya está registrado';
                        echo $text;
                        MsgError($text);
                    }
                }else{
                    MsgError("Algunos campos contienen caracteres especiales");
                }
            }else{
                MsgError("Los campos no pueden ser enviados vacíos");
            }
        }
    }
//* -------------------------------------------------------------------------- */
//*                         Controlador Iniciar Sesión                         */
//* -------------------------------------------------------------------------- */
    public function ctrIniciarSession(){
        if(isset($_POST["ingresarEmail"])){
            if(!Seguridad::VerificarToken($_POST["tokenCSRF"])){
                MsgError("Error: 500 Parece que hubo un error al conectar con el servidor");
                LimpiarCache();
                return;
            }
            $email = $_POST["ingresarEmail"];
            $password = $_POST["ingresarPwd"];
            if(!empty($email) && !empty($password)){
                $tabla = "usuario";
                $respuesta = ModelosFormularios::mdlSeleccionarRegistros($tabla,"email",$email);
                if(!empty($respuesta)){
                    if($email == $respuesta["email"] && password_verify($password,$respuesta["password"])){
                        $_SESSION["validarSession"] = "ok";
                        $_SESSION["tokenUser"] = $respuesta["token"];
                        $_SESSION["idUser"] = $respuesta["id"];
  
                        header("location: inicio");
                        LimpiarCache();
                    }else{
                        MsgError("El correo o la contraseña no son correctos");
                        LimpiarCache();
                    }
                }else{
                    MsgError("El correo no esta registrado en nuestros datos");
                    LimpiarCache();
                }
            }else{
                MsgError("Error");
            }
        }
    }

//* -------------------------------------------------------------------------- */
//*                      Controlador obtener datos usuario                     */
//* -------------------------------------------------------------------------- */
    public static function ctrObtenerDatosUser(){
        $tabla = "usuario";
        $columna  = "token";
        if(isset($_SESSION["tokenUser"])){
            $dato = $_SESSION["tokenUser"];
        }else{
            $dato = null;
        }
        $respuesta = ModelosFormularios::mdlSeleccionarRegistros($tabla,$columna,$dato);
        return $respuesta;
    }
    public function ctrAjaxValidarEmail(){
        $tabla = "usuario";
        $columna = "email";
        $dato = $this->emailRegister;
        $respuesta = ModelosFormularios::mdlSeleccionarRegistros($tabla, $columna, $dato);
        if(empty($respuesta)){
            echo "disponible";
        }else{
            echo "ocupado";
        }
    }
}

//todo -------------------------------------------------------------------------- */
//todo                       Funciones de utiles repetitivas                      */
//todo -------------------------------------------------------------------------- */

function MsgError($sms){
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '".$sms."'
        })
    </script>";
}
function MsgSuccess($sms){
    echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: '".$sms."',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    ";
}
function LimpiarCache(){
    echo '<script>
        if(window.history.replaceState){
            window.history.replaceState(null,null, window.location.href);
        }
    </script>';
}
function estadoAnimo(){
    $tabla = "estado";
    $datos = array(
        "name" => "Muy Bien",
        "token_user" => $_SESSION["tokenUser"],
        "id_user" => $_SESSION["idUser"],
        "mood_day" => "2012-05-05"
    );
    $respuesta = ModeloMood::mdlRegistrarMood($tabla, $datos);
    $datos2 = array(
        "name" => "Bien",
        "token_user" => $_SESSION["tokenUser"],
        "id_user" => $_SESSION["idUser"],
        "mood_day" => "2012-05-06"
    );
    $respuesta = ModeloMood::mdlRegistrarMood($tabla, $datos2);
    $datos3 = array(
        "name" => "Regular",
        "token_user" => $_SESSION["tokenUser"],
        "id_user" => $_SESSION["idUser"],
        "mood_day" => "2012-05-07"
    );
    $respuesta = ModeloMood::mdlRegistrarMood($tabla, $datos3);
    $datos4 = array(
        "name" => "Mal",
        "token_user" => $_SESSION["tokenUser"],
        "id_user" => $_SESSION["idUser"],
        "mood_day" => "2012-05-08"
    );
    $respuesta = ModeloMood::mdlRegistrarMood($tabla, $datos4);
    $datos5 = array(
        "name" => "Muy Mal",
        "token_user" => $_SESSION["tokenUser"],
        "id_user" => $_SESSION["idUser"],
        "mood_day" => "2012-05-09"
    );
    $respuesta = ModeloMood::mdlRegistrarMood($tabla, $datos5);
}

if(isset($_POST["validarEmail"]) && !empty($_POST["validarEmail"])){
    require_once "../modelos/modelos.login.php";
    $valEmail = new ControladorFormularios();
    $valEmail ->emailRegister = $_POST["validarEmail"];
    $valEmail->ctrAjaxValidarEmail();
}