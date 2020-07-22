<?php 
class ControladorFormularios{

//* -------------------------------------------------------------------------- */
//*                      Controlador Seleccionar registro                      */
//* -------------------------------------------------------------------------- */
    public function ctrSeleccionarRegistros($tabla){
        if(isset($_POST["registrarCorreo"])){
            $email = $_POST["registrarCorreo"];
            $nombre = $_POST["registrarNombre"];
            $password = $_POST["registrarPwd"];
        }
    }

}