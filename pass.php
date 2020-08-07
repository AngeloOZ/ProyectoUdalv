<?php 

define('METHOD','AES-256-CBC');
define('SECRET_KEY','@U&D#A%L^V20@$20');
define('SECRET_IV','030318');
class SED {
    public static function encryption($string){
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }
    public static function decryption($string){
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }
}
$id = $_GET["dato"];
echo "ID: $id <br>";
$encryp = SED::encryption($id);
$decryp = SED::decryption($encryp);
echo "Encriptacion: $encryp <br>";
echo "Decriptacion: $decryp <br>";