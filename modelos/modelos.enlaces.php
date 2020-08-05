<?php
// https://dev.mysql.com/doc/mysql-errors/8.0/en/server-error-reference.html
// https://manuales.guebs.com/mysql-5.0/error-handling.html
require_once "conexion.php";
class ModeloEnalce{
    public static function mdlListarEnlaces($tabla, $token, $filtro){
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
    public static function mdlRegistrarEnlace($tabla, $datos){       
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(name, icon, link, id_user, token_user) VALUES(:name, :icon, :link, :id_user, :token_user)");

        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STMT);
        $stmt->bindParam(":icon", $datos["icon"], PDO::PARAM_STMT);
        $stmt->bindParam(":link", $datos["link"], PDO::PARAM_STMT);
        $stmt->bindParam(":id_user", $datos["id_user"], PDO::PARAM_INT);
        $stmt->bindParam(":token_user", $datos["token_user"], PDO::PARAM_STMT);

        if($stmt->execute()){
            return "ok";
        }else{
            return ($stmt->errorInfo());
        }
        $stmt = null;
    }
    public static function mdlActualizarEnalce($tabla, $datos){
        try{
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name = :name, icon = :icon, link=:link WHERE id = :id");
            $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STMT);
            $stmt->bindParam(":icon", $datos["icon"], PDO::PARAM_STMT);
            $stmt->bindParam(":link", $datos["link"], PDO::PARAM_STMT);
            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
            if($stmt->execute()){
                return "ok";
            }else{
                return ($stmt->errorInfo());
            }
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    public static function mdlEliminarEnlace($tabla, $id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "ok";
        }else{
            return ($stmt->errorInfo());
        }
    }
    public static function mdlSelecionarEnlaceEspecifico($tabla, $tokens){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :idEnlace AND token_user = :token AND id_user = :idUser");

        $stmt->bindParam(":idEnlace", $tokens["idEnlace"], PDO::PARAM_INT);
        $stmt->bindParam(":token", $tokens["token"], PDO::PARAM_INT);
        $stmt->bindParam(":idUser", $tokens["idUser"], PDO::PARAM_INT);

        if($stmt->execute()){
            return $stmt->fetch();
        }else{
            return $stmt->errorInfo();
        }
    }
}