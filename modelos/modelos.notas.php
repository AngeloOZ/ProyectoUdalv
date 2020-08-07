<?php
require_once "conexion.php";

class ModeloNotas{
    public static function mdlAgregarNota($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(description, token_user,id_user) VALUES(:description, :token, :id)");

        $stmt->bindParam(":description",$datos["descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);
        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return ($stmt->errorInfo());
        }
        $stmt = null;
    }

}