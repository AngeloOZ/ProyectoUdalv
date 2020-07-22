<?php 
require_once "../modelos/modelos.login.php";
class AjaxFormularios{
    
    public $emailRegister;

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

if(isset($_POST["validarEmail"]) && !empty($_POST["validarEmail"])){
    $valEmail = new AjaxFormularios();
    $valEmail ->emailRegister = $_POST["validarEmail"];
    $valEmail->ctrAjaxValidarEmail();
}