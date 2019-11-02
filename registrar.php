<?php
  require_once('objeto.php');
  include('conexion.php');
 
  $errores=[];
  
  
  $nomus="";
  $emailes="";
  $passw="";

  if($_POST){

    $errore=validarForm($errores);
    $errore=validarExistencia($errore);
    var_dump($errore);

    if ($errore[0]=="El usuario se grabo con exito!!"){
        
        echo "<script>alert('Hola');</script>";
         cargarUsuarios();
         echo "<script>
               $('#errores').modal('show');
         
         </script>";
         header('Location: http://localhost/Proyecto-Grupo-3---DH/registrar.php');

        

        
        
    }
   
   }
   if($_GET){
    $nomus = $_GET["nomus"];
    $emailes=$_GET["emailes"];
   }
        
   

    //   echo "<script>alert('hola');</script>";
  
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   
      
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
         <link href="css/styles.css" rel="stylesheet">
         <script src="https://kit.fontawesome.com/d771485d91.js" crossorigin="anonymous"></script>
        



    </head>


    <body class="fondoBodyModal">
   
           
          <div class="modal" tabindex="-1" role="dialog" id="errores">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="d-flex justify-content-center">Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                   
                      
                       <ul style="list-style:none;" class="d-flex flex-column justify-content-center">
                        <?php foreach($errore as $error){
                        
                        if($error!="El usuario se grabo con exito!!"){?>
                           <li class="text-danger"><i class="fas fa-exclamation"></i><?=$error?></li>
                        <?php 
                          }else{
                                echo '<li class="text-success"><i class="fas fa-check"></i>'.$error.'</li>';
                             }
                        }
                      
                       
                        ?></ul>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-danger"  id="cerrar">Close</button>
                    
                </div>
                </div>
            </div>
         </div>

       
           <div class="modal" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form role="form" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <img src="img\logo1.jpg" class="img-fluid" alt="Responsive image">
                            <!--<h5 class="modal-title">Modal title</h5>-->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        

                                    <div class="form-group">
                                       
                                        <label for="ejenomusuario">Nombre</label>
                                        <input type="text" class="form-control" id="ejemnomusuario" aria-describedby="emailHelp" placeholder="Ingrese nombre de Usuario" name="nomusu" value=<?=$nomus?>>
                                        <small id="emailHelp" class="form-text text-muted">Aqui va el nombre de Usuario</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Direccion de Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su E-mail" name="mail" value=<?=$emailes?>>
                                        <small id="emailHelp" class="form-text text-muted">El e-mail es necesario</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Contraseña</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
                                        <small id="passHelp" class="form-text text-muted">Debe tener mas de 6 caracteres y comenzar con mayuscula</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Elegir una imagen de Perfil</label>
                                        <input type="file" class="form-control btn btn-primary" id="foto"  name="foto">
                                        <img src="img/usuarios/anonymous.png" class="img-thumbnail" width="100px">
                                        <small id="passHelp" class="form-text text-muted">La imagen debe ser de un tamaño maximo de 150kb</small>
                                    </div>
                                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                        <button type="submit" class="btn btn-primary" id="guardar">Registrar</button>
                                     
                                    
                                    </div>
                            </form>
                    </div>
                    
                </div>
            <!-- </div> -->
           </div>
           <!-- final del modal de ingreso -->
          


           <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
       
    </body>
</html>



 
<?php 
  
    if(!isset($_POST['nomusu'])){
   
        echo " <script>
                    
                 $('#myModal').modal('show');
        
               </script>";        
              
    }else{

        echo "<script>
                $('#myModal').modal('hide');
                $('#errores').modal('show');
                
            </script>";
         

    }
    
      
        
?>
<script>
    $(document).ready(function(){
        $('#cerrar').on('click',function(){
           $('#errores').modal('hide');
           $('#myModal').modal('show');
        });



    });
</script>