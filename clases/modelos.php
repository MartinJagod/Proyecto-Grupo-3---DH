<?php 

 class ModeloTablas{

    static public function mostrarSectores($tabla, $item, $valor){
           
           
            if($item != null){
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();

            }else{
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                
                $stmt -> execute();
                return $stmt -> fetchAll();
            }
        

    }


    static public function mdlIngresoUsuarios($tabla,$datos){
     
        $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,email,passw,foto,estado) values (:nomusu,:email,:passwo,:fotito,:esta)");
        $stmt->bindParam(":nomusu", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":passwo", $datos["pass"], PDO::PARAM_STR);
        $stmt->bindParam(":fotito", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":esta", $datos["estado"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
            
        }else{
            return "error";
        }

        $stmt->close();
        $stmt=null;

    }


    static public function mdlEditarSectores($tabla, $dato, $id){
     
     
        $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET nombre_sector = :nombre WHERE id_sector = :mId");
        $stmt -> bindParam(":nombre", $dato, PDO::PARAM_STR);
        $stmt -> bindParam(":mId", $id, PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


        $stmt->close();
        $stmt=null;
    }

    static public function MostrarInternos($tabla, $item, $valor){

        
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();
            return $stmt -> fetch();

        }else{
            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla");
        
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
      
    }
 }

?>