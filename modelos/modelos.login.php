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
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(token, name, lastname,password, email, username) VALUES(:token, :name, :lastname, :password, :email, :avatar)");

        $stmt->bindParam(":token", $datos['token'], PDO::PARAM_STR);
        $stmt->bindParam(":name", $datos['name'], PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $datos['lastname'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        $stmt->bindParam(":avatar", $datos['avatar'], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return ($stmt->errorInfo());
        }
    }
//* -------------------------------------------------------------------------- */
//?                          Modelos Registrar Usuario                         */
//* -------------------------------------------------------------------------- */
    public static function mdlEditarInformacionUsuario($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name = :name, lastname = :lastname, username = :avatar, birthday = :date WHERE id = :id");

        $stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);
        $stmt->bindParam(":name", $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $datos['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":avatar", $datos['avatar'], PDO::PARAM_STR);
        $stmt->bindParam(":date", $datos['fecha'], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return ($stmt->errorInfo());
        }
        $stmt = null;
    }

    public static function ctrEditarPassword($tabla ,$id, $pass){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password = :pass WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);

        if($stmt->execute()){
            $datos = $stmt->fetch();
            $info = array("state"=>"ok", "info"=>$datos);
            return $info;
        }else{
            $info = array("state"=>"error", "info" => $stmt->errorInfo());
            return $info;
        }
    }
}