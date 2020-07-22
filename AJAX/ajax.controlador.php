<?php 
class AjaxFormularios{
    
    public $emailRegister;

    public function ctrAjaxValidarEmail(){
        $tabla = "usuario";
        $columna = "email";
        $dato = $this->emailRegister;
        $respuesta = ModelosFormularios::mdlSeleccionarRegistros($tabla, $columna, $dato);
        echo json_encode($respuesta);
    } 
}

if(isset($_POST["validarEmail"]) && !empty($_POST["validarEmail"])){
    $valEmail = new AjaxFormularios();
    $valEmail ->emailRegister = $_POST["validarEmail"];
    $valEmail->ctrAjaxValidarEmail();
}