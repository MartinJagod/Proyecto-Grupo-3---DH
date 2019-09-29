<?php
 include ("./header.php");

$errores=[];
$pass='';
$email='';

  if ($_POST) {
				include("./giratorio.html");

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
              session_start();
              $_SESSION=$value;
               include ("./home.php");}
            }} else {
							var_dump($errores);
							foreach ($errores as $value) {
							  if (isset($value)){echo $value;
							   echo"<br>";}
            }
          }}
?>

<html lang="en">
		<div class="container-fluid  col-md-12 banner principallogin ">
			<div class="row col-md-12 banner ">

				<div class=" container col-md-4 fondoGris2">

					<form role="form" method='post' >
						<div class="form-group">
							<label for="exampleInputEmail1">
								Direccion de Email
							</label>
							<input type="email" class="form-control" name="email"  id="email" value=<?=$email?>>
						</div>

						<div class="form-group">

							<label for="exampleInputPassword1">
								Password
							</label>
							<input type="password" class="form-control" name="password"  id="password" value=<?=$pass?>>
						</div>

						<button type="submit" class="btn btn-primary">
							Ingreeeesar
						</button>
					</form>
				</div>


				<div class="container shadow p-3 mb-5 bg-white rouded col-md-4 ">
					<address>
            <img class="col-12 banner " alt="Bootstrap Image" src="img/logo1.jpg" />
            <br>
						 <strong>Coordobeses, Inc.</strong><br /> Jose Baigorri 653.<br /> Cordoba, X5001AJM<br /> <abbr title="Phone">P:</abbr> (123) 456-7890
					</address>
				</div>
			</div>

</div>
