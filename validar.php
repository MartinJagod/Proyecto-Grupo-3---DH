<?php


  if ($_POST) {
    $errores=[];
    $pass='';
    $email='';

    echo"validando";
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
            $usuarios = file_get_contents("archivoTemporal.json");
            $arrayUsuarios = json_decode($usuarios,true);
          foreach ($arrayUsuarios as $value) {
            if ( $value["email"]==$email && password_verify($pass, $value["password"] )){
               include ("./home.php");}
            }

            }
            exit;
          }

 ?>
