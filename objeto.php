<?php
   function cargarUsuarios(){
     $ideaux=1;
    
     $foto="img/usuarios/anonymous.png";
     //  echo "<script>alert('".$_FILES["foto"]["error"]."');</script>";
      if(isset($_FILES["foto"]) && $_FILES["foto"]["error"]==0 && $_FILES["foto"]["size"] < 151000){
        $nombrefoto = $_FILES["foto"]["name"];
        $tmpfoto= $_FILES["foto"]["tmp_name"];
        $ext = pathinfo($nombrefoto, PATHINFO_EXTENSION);
        $nomfoto=rand(1,1000).$_POST["nomusu"];
        $foto="img/usuarios/".$nomfoto.".".$ext;
        move_uploaded_file($tmpfoto, $foto);
          
      }

    $usuarios = file_get_contents("usuarios.json");
    $listadoUs=json_decode($usuarios, true);
    if (!empty($listadoUs)){
      $ideaux=count($listadoUs)+1;
    }
    $hash=password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $usuario = 
        [
            "nombre" => $_POST["nomusu"],
            "email" => $_POST["mail"],
            "pass" => $hash,
            "id" => $ideaux,
            "estado" => "1",
            "foto" => $foto
        ];
       
  


     $listadoUs[] = $usuario;
    $jusuario= json_encode($listadoUs);
    file_put_contents("usuarios.json", $jusuario,true);
    

     

   }


   function validarExistencia($errores){
    $jusuario = file_get_contents("usuarios.json");
    $usuarios=json_decode($jusuario, true);
 
     foreach ($usuarios as $usuario){
     
       if ($usuario["email"]==$_POST["mail"]){
             
          $errores[]="ya existe un usuario con ese email";
             
       }

     }

     if (empty($errores)){
         $errores[]="El usuario se grabo con exito!!";
     }
    return($errores);
   }
  
   

   function validarForm($errores){
     
      if(empty($_POST['nomusu'])){
          $errores[]='El nombre debe llevar algun valor';
          $s=1;
      }

      if(empty($_POST['mail'])){
          $errores[]='El mail no puede  estar vacio';
          $s=1;
      }
      

      if(empty($_POST['pass'])){
        $errores[]='La contraseña no debe estar vacia';
        $s=1;
      }else if(!ctype_upper($_POST['pass'][0])){
        $errores[]="La contraseña debe comenzar con una Letra mayuscula";
        $s=1;
      }

      if(strlen($_POST['pass']) < 6){
        $errores[]="La contraseña debe tener 6 o mas caracteres";
        $s=1;
      }

     
      if($_FILES["foto"]["size"] > 150000){
        $errores[]="La imagen supera el tamaño sugerido";
      
      }

       echo $_FILES["foto"]["size"];
      
      
     

    
    return $errores;
      
   }


   
?>