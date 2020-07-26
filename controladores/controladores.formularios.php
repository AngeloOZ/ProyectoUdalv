<?php 
class ControladorFormularios{

//* -------------------------------------------------------------------------- */
//*                      Controlador Registrar registro                      */
//* -------------------------------------------------------------------------- */
    public function ctrRegistrarUsuario(){
        if(isset($_POST["registrarCorreo"])){
            $email =  $_POST["registrarCorreo"];
            $nombre = $_POST["registrarNombre"];
            $password = $_POST["registrarPwd"];
            if(!empty($email) && !empty($nombre) && !empty($password)){
                if(filter_var($email,FILTER_VALIDATE_EMAIL) &&
                preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚÑñ ,]+$/',$nombre) &&
                preg_match('/^[0-9a-zA-Z@#.$%&]+$/',$password)){
                    $tabla = "usuario";
                    $existeEmail = ModelosFormularios::mdlSeleccionarRegistros($tabla,"email",$email);
                    if(empty($existeEmail)){
                        $datos = array(
                            "name"=>$nombre,
                            "email"=>$email,
                            "password"=>password_hash($password, PASSWORD_BCRYPT)
                        );
                        $respuesta = ModelosFormularios::mdlRegistrarUsuario($tabla,$datos);
                        if($respuesta == "ok"){
                            MsgSuccess("El usuario se registro Correctamente");
                            LimpiarCache();
                        }else{
                            MsgError("Parece que ocurrio un error, intentalo más tarde");
                            LimpiarCache();
                        }
                    }else{
                        MsgError("Esté email ya está registrado");
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
                MsgError("Estas intentando hackear el sitio");
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
                        $_SESSION["emailUser"] = $respuesta["email"];
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
        $columna  = "email";
        $dato = $_SESSION["emailUser"];
        $respuesta = ModelosFormularios::mdlSeleccionarRegistros($tabla,$columna,$dato);
        return $respuesta;
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
