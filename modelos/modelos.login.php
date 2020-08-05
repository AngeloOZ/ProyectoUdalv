<?php 
    require_once "conexion.php";
class ModelosFormularios{

//* -------------------------------------------------------------------------- */
//?                        Modelos Seleccionar Registro                        */
//* -------------------------------------------------------------------------- */

    static public function mdlSeleccionarRegistros($tabla, $columna, $datos){
        if($columna == null && $datos == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            if($stmt->execute()){
                return ($stmt->fetchAll());
            }else{
                return ($stmt->errorInfo());
            }
            $stmt = null;
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $columna = :$columna");

            $stmt->bindParam(":".$columna, $datos, PDO::PARAM_STR);

            if($stmt->execute()){
                return ($stmt->fetch());
            }else{
                return ($stmt->errorInfo());
            }
            $stmt = null;
        }
    }
//* -------------------------------------------------------------------------- */
//?                          Modelos Registrar Usuario                         */
//* -------------------------------------------------------------------------- */
    public static function mdlRegistrarUsuario($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(token, name, lastname,password, email) VALUES(:token, :name, :lastname, :password, :email)");

        $stmt->bindParam(":token", $datos['token'], PDO::PARAM_STR);
        $stmt->bindParam(":name", $datos['name'], PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $datos['lastname'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return ($stmt->errorInfo());
        }
    }

}