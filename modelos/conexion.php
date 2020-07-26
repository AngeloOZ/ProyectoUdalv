<?php 
    class Conexion{
        public static function conectar(){
            try{
                $link = new PDO("mysql:host=localhost; dbname=udalv","root","");
                return $link;
            }
            catch(PDOException $e){
                print ($e->getMessage());
            }
        }
        public static function conectarRemote(){

        }
    }

