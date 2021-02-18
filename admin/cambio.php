<?php
    // Comprobamos que hay sesión abierta
    session_start();
    if (!isset($_SESSION['usuario'])){
        header("location:index.php");
    }
    // metemos en una variable si los correos deben ser leidos 1 o no leidos 0
// y printeamos con otra variable 
    /*if (isset($_GET['leido'])){
        $leido = $_GET['leido'];
        if ($leido == 1){
            $printleido = 'Correos Leidos';
        }
        elseif ($leido == 0){
            $printleido ='Correos no Leidos';
        }else{
            header('location: index.php');
        }
    }*/
    //http://192.168.1.154/admin/correo.php?leido=0
    $usuario=$_SESSION['usuario'];

?>
<!doctype html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Creaciones Web Sitios">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Marta Rubio - Psicología</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">



    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap413/bootstrap.min.css" rel="stylesheet">
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"-->

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">

    <style>

    </style>


    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">
    <link href="../css/pricing.css" rel="stylesheet">
<link href="../fontawesome/css/all.css" rel="stylesheet">    <link rel="stylesheet" href="../css/alertify/alertify.css">
    <link rel="stylesheet" href="../css/alertify/themes/bootstrap.rtl.min.css" />
    <script src="../js/jquery/jquery-3.5.1.min.js"></script>
    <script src="./ckeditor/ckeditor.js"></script>
    

    <!-- Para botón de subir a principio página-->
    <script>
function mostrarPassword(){
		var cambio = document.getElementById("passwordrepite");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
        var cambio2 = document.getElementById("passwordanterior");
		if(cambio2.type == "password"){
			cambio2.type = "text";
		}else{
			cambio2.type = "password";
		}
        var cambio3= document.getElementById("passwordnuevo");
		if(cambio3.type == "password"){
			cambio3.type = "text";
		}else{
			cambio3.type = "password";
		}
	} 
	
	
</script>
    <style>
 

    </style>

</head>

<body>
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <a class="navbar-brand" href="#">Cambiar Password</a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="#"><b>Administración</b></a>
                        <input type="text" id="usuario" value = "<?php echo $usuario;?>" hidden>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Correos
                        </a>
                        <div class="dropdown-menu dropmio" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="correo.php?leido=0">No leídos</a>
                            <a class="dropdown-item" href="correo.php?leido=1">Leídos</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Blog
                    </a>
                    <div class="dropdown-menu dropmio" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item disabled" href="blog.php">Entradas Blog</a>
                        <a class="dropdown-item" href="comentario.php">Comentarios</a>
                        <a class="dropdown-item" href="comentarioPen.php">Comentarios Pendientes</a>
                        
                    </div>
                </li>
                <li class="nav-item ">
                        <a class="nav-link " href="faq.php">FAQ</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="cambio.php">Cambiar contraseña</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="index.php">Cerrar sesión</a>
                    </li>
                   
                </ul>
                
                <!--button class="addBlog navbar-brand tn btn-ttc">
                    Añadir Entrada
                    </button-->
                <form class="form-inline my-2 my-lg-0">
                    <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <!-- Con Botón -->
                    <!--button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button-->
                    <select class="form-control" id="filtro">
                        <option value="titulo">Titulo</option>
                        <option value="fecha">Fecha</option>
                    </select>
                </form>
            </div>
        </nav>
    </header>


    <main class="mx-auto">
<form id="formulario">
    
    
    <input type="Password" name="passwordanterior" id="passwordanterior" class="form-control" placeholder="Password Anterior" required autofocus>
    <br>
    <input type="Password" name="passwordnuevo" id="passwordnuevo" class="form-control" placeholder="Password Nuevo" required autofocus>
    <!--input type="password" name="clave" id="inputPassword" class="form-control" placeholder="Password" required-->
   <br>
         
      <input name="clave" id="passwordrepite" type="Password" class="form-control" placeholder="Repita Password" required>
     <br>
    <button id="show_password" class="w-100 btn-lg btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
    <br>
    <br>
    <button class="w-100 btn btn-lg btn-success"  id="boton_login" name="enviar" value="enviar"
                    type="submit" formmethod="post"><i class="fas fa-save"></i>
                                                                                Grabar</button>
   
  </form>
</main>
        
      
        
  


    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap4/bootstrap.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js "></script>
    <script src="../js/alertify/alertify.js"></script>
    <script src="./js/funcionesCambio.js"></script>


</body>

</html>