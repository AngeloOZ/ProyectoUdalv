<?php 
class Seguridad{
    static public function CrearToken(){
        if(empty($_SESSION["key"])){
            $_SESSION['key'] = bin2hex(random_bytes(32));
        }
        return password_hash($_SESSION["key"],PASSWORD_DEFAULT);
    }
    static public function VerificarToken($hash){

        return password_verify($_SESSION["key"], $hash);
    }
}