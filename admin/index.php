
<?php

include ('../claseDB.php');
// Destruimos sesión por si hay alguna abierta
session_start();
session_unset();
session_destroy();
if (isset($_POST['enviar'])){
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
      
    if (empty($usuario) || empty($clave)){
        $error= "Debe introducir un nombre de usuario y una contraseña";
    } else{
        
        // Si esta bloqueado
        
        // Como pides en el foro no meto el usuario administrador en la Base de Datos los compruebo en el código
        if (DB::compruebaUsuario($usuario,$clave)){
            session_start();
                       // Creamoslas variables de usuario y hora
                       $_SESSION['usuario']=$usuario;
                       $_SESSION['hora']=date( "H:i:s");
                       //Enviamos a pagina usuarios.php
                       header("Location: correo.php?leido=0");
        }
        else {
            $error="Usuario no es correcto";
       }
          
        
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Administración Web</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="../fontawesome/css/all.css" rel="stylesheet">
   
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .form-control {
        padding-right: 30px;
      }

      .form-control + .glyphicon {
        position: absolute;
        right: 0;
        padding: 9px 27px;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="mx-auto">
<form action="index.php" method="post">
    <img class="bd-placeholder-img rounded-circle" src="../img/inicio.png" alt="" width="120" height="120">
    <h1 class="h3 mb-3 fw-normal">Panel control web</h1>
    
    <input type="text" name="usuario" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
    
    <!--input type="password" name="clave" id="inputPassword" class="form-control" placeholder="Password" required-->
   
          <div class="input-group">
      <input name="clave" id="txtPassword" type="Password" class="form-control" placeholder="Password" required>
      <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
          </div>
    </div>
    <div style="text-align: center;"><span class="mensaje"><?php echo (isset($error)? $error: ""); ?></span></div>
    <br>
    <button class="w-100 btn btn-lg btn-primary"  id="boton_login" name="enviar" value="enviar"
                    type="submit" formmethod="post">Acceder</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
  </form>
</main>

<script>
       function mostrarPassword(){
        var cambio = document.getElementById("txtPassword");
        if(cambio.type == "password"){
          cambio.type = "text";
          $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
          cambio.type = "password";
          $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 
	
	
    </script>
  </body>

</html>
