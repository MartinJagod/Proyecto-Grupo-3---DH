<?php


  if ($_POST) {
    $errores=[];
    $pass='';
    $email='';

      if(!isset($_POST["password"]) || !isset($_POST["email"])){
          return "Debes completar los campos";
        }

        $pass=$_POST['password'];
        $email=$_POST['email'];

        if (empty($_POST['password'])){
          $errores[]= "Debes completar password";
        }

        if (empty($_POST['email'])){
          $errores[]="Debes completar el email";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
          $errores[]="Debes completar email valido";
        }

        if (empty ($errores))
          {
            $usuarios = file_get_contents("usuarios.json");
            $arrayUsuarios = json_decode($usuarios,true);
          foreach ($arrayUsuarios as $value) {
            if ( $value["email"]==$email && password_verify($pass, $value["pass"] )){
              session_start();
              $_SESSION=$value;
              return header("Location:./home.php");
             }
           }
         }
            $_POST=[];
       return header ('Location:./registrar.php');
          }
 ?>
