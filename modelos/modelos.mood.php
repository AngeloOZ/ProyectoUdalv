<?php 
require_once "conexion.php";
class ModeloMood {
    public static function mdlRegistrarMood($table,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $table(name,mood_day,token_user,id_user) VALUES(:name,:dia,:token,:user)");
        $stmt->bindParam(":name",$datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":token",$datos["token_user"], PDO::PARAM_STR);
        $stmt->bindParam(":user",$datos["id_user"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "Ok";
        }
        else{
            return $stmt->errorInfo();
        }
    }
}