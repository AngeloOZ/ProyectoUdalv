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
                <div class="nota">
                    <h3>'.$valor["title"].'</h3>
                    <p>'.$valor["description"].'</p>
                    <a href="#" target="_blank">Leer mas<i class="fas fa-angle-double-right"></i></a>
                </div>
                ';
            }
            return $contenido;          
        }
    }
    public function ctrAgregarNotas(){
        if(isset($_POST["nombre"])){
            if(!empty($_POST["nombre"]) && !empty($_POST["descripcion"])){
                $nombre = htmlspecialchars($_POST["nombre"]);
                $descripcion = htmlspecialchars($_POST["descripcion"]);
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
                    echo "se guardo";
                }else{
                    echo "$respuesta[1]: $respuesta[2]";
                }
            }else{
                echo "no valores vacios";
            }
        }
    }
    public function ctrEliminarNota(){
        if(isset($_POST["idNota"]) && !empty($_POST["idNota"])){
            $tabla = "notas";
            $respuesta = ModeloNotas::mdlEliminarNota($tabla, $_POST["idNota"]);

            if($respuesta == "ok"){
                echo "se elimino";
            }else{
                echo "$respuesta[1]: $respuesta[2]";
            }
        }
    }
}
?>