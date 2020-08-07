<?php 
    class Conexion{
        public static function conectar(){
            try{
                $link = new PDO("mysql:host=localhost; dbname=bdd_udalv","root","");
                return $link;
            }
            catch(PDOException $e){
                print($e->getMessage());
            }
        }
        public static function conectar2(){
            
        }    
    }
