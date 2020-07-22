<?php 
class ControladorFormularios{

//* -------------------------------------------------------------------------- */
//*                      Controlador Seleccionar registro                      */
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
                            "password"=>$password
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
}


function MsgError($sms){
    echo '<script>
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "$sms"
      })
    </script>';
}
function MsgSuccess($sms){
    echo '
        <script>
            Swal.fire({
                icon: "success",
                title: "El usuario se registro correctamente",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    ';
}
function LimpiarCache(){
    echo '<script>
        if(window.history.replaceState){
            window.history.replaceState(null,null, window.location.href);
        }
    </script>';
}
