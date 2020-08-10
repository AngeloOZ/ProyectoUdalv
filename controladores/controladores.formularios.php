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
            if(!Seguridad::VerificarToken($_POST["tokenCSRF"],"login")){
                MsgError("Error: 500 Parece que hubo un error al conectar con el servidor recarga le página");
                LimpiarCache();
                die();
            }
            $email =  trim($_POST["registrarCorreo"]);
            $nombreCompleto = trim($_POST["registrarNombre"]);
            $password = trim($_POST["registrarPwd"]);
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
                            "password"=>password_hash($password, PASSWORD_BCRYPT),
                            "avatar" => "fas fa-user"
                        );
                        $respuesta = ModelosFormularios::mdlRegistrarUsuario($tabla,$datos);
                        if($respuesta == "ok"){
                            MsgSuccess("El usuario se registro Correctamente");
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
            if(!Seguridad::VerificarToken($_POST["tokenCSRF"],"login")){
                MsgError("Error: 500 Parece que hubo un error al conectar con el servidor recarga le página");
                LimpiarCache();
                die();
            }
            $email = $_POST["ingresarEmail"];
            $password = $_POST["ingresarPwd"];
            if(!empty($email) && !empty($password)){
                $tabla = "usuario";
                $respuesta = ModelosFormularios::mdlSeleccionarRegistros($tabla,"email",$email);
                if(!empty($respuesta)){
                    if($email == $respuesta["email"] && password_verify($password,$respuesta["password"])){
                        Seguridad::destruirToken("login");
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
    public function ctrEditarInformacionUsuario(){
        if(isset($_POST["editUserName"])){
            $nombre = trim($_POST["editUserName"]);
            $apellido = trim($_POST["editUserLast"]);
            $fecha = $_POST["editUserDate"];
            $avatar = $_POST["editarUserAvatar"];
            if(!empty($nombre) && !empty($apellido) && !empty($fecha)){
                if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚÑñ]+$/',$nombre) &&
                   preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚÑñ]+$/',$apellido) &&
                   preg_match('/^([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})/',$fecha)
                ){
                    $tabla = 'usuario';
                    $datos = array(
                        "nombre" => $nombre,
                        "apellido" => $apellido,
                        "fecha" => $fecha,
                        "avatar" => $avatar,
                        "id" => $_SESSION["idUser"],
                    );
                    $respuesta = ModelosFormularios::mdlEditarInformacionUsuario($tabla, $datos);

                    if($respuesta == "ok"){
                        MsgSuccess("Se actualizo los datos correctamente");
                    }else{
                        echo "$respuesta[1]: $respuesta[2]";
                        MsgError("Error");
                    }
                    LimpiarCache();
                }else{
                    MsgError("Los caracteres especiales no son permitidos");
                }
            }else{
                MsgError("Parece que falto llenar un campo");
            }
        }
    }
    public function ctrEditarPassword(){
        if(isset($_POST["editPassActual"])){
            $passActual = $_POST["editPassActual"];
            $passNew = $_POST["editPassnew"];
            $passNewCon = $_POST["editPassnewCon"];
            if(!empty($passActual) && !empty($passNew) && !empty($passNewCon)){
                if(preg_match('/^[0-9a-zA-Z@#.$%&]+$/',$passActual) &&
                   preg_match('/^[0-9a-zA-Z@#.$%&]+$/',$passNew) &&
                   preg_match('/^[0-9a-zA-Z@#.$%&]+$/',$passNewCon)
                ){
                    if((strlen($passNew) <= 20 && strlen($passNew) >= 4) && ($passNew == $passNewCon)){
                        $id = $_SESSION["idUser"];
                        $tabla = 'usuario';
                        
                        $conf = ModelosFormularios::mdlSeleccionarRegistros($tabla,"id", $id);
                        if(!empty($conf)){
                            if(password_verify($passActual,$conf["password"])){
                                $pass = password_hash($passNew, PASSWORD_BCRYPT);
                                $respuesta = ModelosFormularios::ctrEditarPassword($tabla, $id, $pass);
                                if($respuesta["state"] == "ok"){
                                    MsgSuccess("Contraseña actualizada Correctamente");
                                }else{
                                    MsgError("Ups... parece que hubo un error");
                                }
                                LimpiarCache();
                            }
                        }else{
                            MsgError("La contraseña actual no coincide");
                        }
                    }else{
                        MsgError("Las contraseñas no coinciden o la longitud no es correcta de 4 a 20 caracteres");
                    }
                }else{
                    MsgError("No se permite ciertos caracteres especiales");
                }
            }else{
                MsgError("Todos los campos son requeridos");
            }
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
            setTimeout(()=>{
                location.reload();
            },2001);
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
if(isset($_POST["validarEmail"]) && !empty($_POST["validarEmail"])){
    require_once "../modelos/modelos.login.php";
    $valEmail = new ControladorFormularios();
    $valEmail ->emailRegister = $_POST["validarEmail"];
    $valEmail->ctrAjaxValidarEmail();
}