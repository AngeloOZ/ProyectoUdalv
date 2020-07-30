<?php 
class Seguridad{
    public static $tokenName;

    static public function CrearToken($token){
        self::$tokenName = $token;
        if(!isset($_SESSION["tokenCsrf_".$token]) || empty($_SESSION["tokenCsrf_".$token])){
            $_SESSION["tokenCsrf_".$token] = bin2hex(random_bytes(32));
        }
        return password_hash($_SESSION["tokenCsrf_".$token],PASSWORD_DEFAULT);
    }
    static public function VerificarToken($hash){
        $name = self::$tokenName;
        $resp = password_verify($_SESSION["tokenCsrf_".$name], $hash);
        $_SESSION["tokenCsrf_".$name] = null;
        unset($_SESSION["tokenCsrf_".$name]);
        return $resp;
    }
}