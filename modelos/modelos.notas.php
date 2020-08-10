<?php
require_once "conexion.php";

class ModeloNotas{
    
    public static function mdlListarNota($tabla, $token, $filtro){
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
    
    public static function mdlAgregarNota($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(title, description, token_user, id_user) VALUES(:nombre, :description, :token, :id)");

        $stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":description",$datos["descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(":token",$datos["token"],PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"],PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return ($stmt->errorInfo());
        }
        $stmt = null;
    }

    public static function mdlActualizarNota($tabla, $datos){
        try{
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET title = :nombre, description = :descripcion WHERE id = :id");
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STMT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STMT);
            $stmt->bindParam(":id", $datos["idnota"], PDO::PARAM_INT);
            if($stmt->execute()){
                return "ok";
            }else{
                return ($stmt->errorInfo());
            }
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    public static function mdlEliminarNota($tabla, $id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "ok";
        }else{
            return ($stmt->errorInfo());
        }
    }

}