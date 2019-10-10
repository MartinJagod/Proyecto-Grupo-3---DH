<?php
   function cargarUsuarios(){
     $ideaux=1;

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
            "estado" => "1"
        ];
        session_start();
        $_SESSION=$usuario;




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







    return $errores;

   }
?>
