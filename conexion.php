<?php 

 class Conexion{
     static public function conectar(){
         $link = new PDO("mysql:host=localhost; dbname=rsocial",
         "root",
         "");

         $link->exec("set name utf8");
         return $link;
     }
 }

?>
