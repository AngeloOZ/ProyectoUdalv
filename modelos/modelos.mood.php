<?php 
require_once "conexion.php";
class ModeloMood {
    public static function mdlRegistrarMood($table,$datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $table(name, mood_day, token_user, id_user) VALUES(:name, :dia, :token, :user)");

        $stmt->bindParam(":name",$datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":token",$datos["token_user"], PDO::PARAM_STR);
        $stmt->bindParam(":user",$datos["id_user"], PDO::PARAM_INT);
        $stmt->bindParam(":dia",$datos["mood_day"], PDO::PARAM_STR);
        if($stmt->execute()){
            return "Ok";
        }
        else{
            return $stmt->errorInfo();
        }
    }
    public static function mdlMostrarEstado($tabla, $token){
        // mensual $stmt = Conexion::conectar()->prepare("SELECT name, COUNT(*) AS 'numero' FROM $tabla WHERE token_user = :token and (MONTH(mood_day)=MONTH(now())) GROUP BY name");
        //semanal $stmt = Conexion::conectar()->prepare("SELECT week(mood_day),name, COUNT(*) AS 'numero' FROM $tabla WHERE token_user = :token and (week(mood_day)= week(now())) GROUP BY name"); 
        $stmt = Conexion::conectar()->prepare("SELECT name, COUNT(*) AS 'numero' FROM $tabla WHERE token_user = :token GROUP BY name");

            $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return $stmt->errorInfo();
            }
            $stmt = null;
        
    
    }
    public static function mdlMostrarEstadoSemanal($tabla, $token){
        // mensual $stmt = Conexion::conectar()->prepare("SELECT name, COUNT(*) AS 'numero' FROM $tabla WHERE token_user = :token and (MONTH(mood_day)=MONTH(now())) GROUP BY name");
         $stmt = Conexion::conectar()->prepare("SELECT week(mood_day),name, COUNT(*) AS 'numero' FROM $tabla WHERE token_user = :token and (week(mood_day)= week(now())) GROUP BY name"); 
        //$stmt = Conexion::conectar()->prepare("SELECT name, COUNT(*) AS 'numero' FROM $tabla WHERE token_user = :token GROUP BY name");

            $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return $stmt->errorInfo();
            }
            $stmt = null;
        
    
    }
    public static function mdlMostrarEstadoMensual($tabla, $token){
         $stmt = Conexion::conectar()->prepare("SELECT MONTH(mood_day),name, COUNT(*) AS 'numero' FROM $tabla WHERE token_user = :token and (MONTH(mood_day)=MONTH(now())) GROUP BY name");
        //semanal $stmt = Conexion::conectar()->prepare("SELECT week(mood_day),name, COUNT(*) AS 'numero' FROM $tabla WHERE token_user = :token and (week(mood_day)= week(now())) GROUP BY name"); 
        //$stmt = Conexion::conectar()->prepare("SELECT name, COUNT(*) AS 'numero' FROM $tabla WHERE token_user = :token GROUP BY name");

            $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return $stmt->errorInfo();
            }
            $stmt = null;
        
    
    }
}