<?php
require_once "conexion.php";

class ModeloTareas{
    
    public static function mdlListarTarea($tabla, $token, $filtro){
        if($filtro == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE token_user = :token ORDER BY 1 desc");

            $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    
            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return "";
            }
            $stmt = null;
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE (name LIKE :filtro OR icon LIKE :filtro OR link LIKE :filtro) AND token_user = :token");
            $fil = "%$filtro%";
            $stmt->bindParam(":filtro", $fil, PDO::PARAM_STR);
            $stmt->bindParam(":token",$token, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll();
            }else{
                return print_r($stmt->errorInfo());
            }
        }
    }
    
    public static function mdlAgregarTarea($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(name_task, date, state_task, token_user,id_user) VALUES(:name_task,:date, :state_task, :token, :id)");
        
        $stmt->bindParam(":name_task",$datos["name_task"],PDO::PARAM_STR);
        $stmt->bindParam(":date",$datos["date"],PDO::PARAM_STR);
        $stmt->bindParam(":state_task",$datos["state_task"],PDO::PARAM_STR);
        $stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);
        $stmt->bindParam(":id",$datos["id"],PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return ($stmt->errorInfo());
        }
        $stmt = null;
    }
    //Actualizar

    public static function mdlActualizarTarea($tabla, $datos){
        try{
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name_task = :name_task, date = :date, state_task = :state_task  WHERE id = :id");
            
            $stmt->bindParam(":name_task", $datos["name_task"], PDO::PARAM_STMT);
            $stmt->bindParam(":date", $datos["date"], PDO::PARAM_STMT);
            $stmt->bindParam(":state_task", $datos["state_task"], PDO::PARAM_INT);
            $stmt->bindParam(":id", $datos["idTask"], PDO::PARAM_INT);
            if($stmt->execute()){
                return "ok";
            }else{
                return ($stmt->errorInfo());
            }
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    public static function mdlEliminarTarea($tabla, $id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "ok";
        }else{
            return ($stmt->errorInfo());
        }
    }

}