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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Marta Rubio - Psicología</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">



    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap413/bootstrap.min.css" rel="stylesheet">
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"-->

    <link href="../css/style.css" rel="stylesheet">

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
    <script type='text/javascript'>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#scroll').fadeIn();
                } else {
                    $('#scroll').fadeOut();
                }
            });
            $('#scroll').click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 600);
                return false;
            });
        });
    </script>
</head>

<body>
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <a class="navbar-brand" href="#">Blog</a>
            
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

    <main>

        <br>
        <div class="container-fluid">
            <div class="row p-2" >
                <!-- TABLA  -->
                <div class="col-md-6">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr class="info">
                                <!--td>Código</td -->
                                <th>Imagen</th>
                                <th>Titulo</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Acciones</th>
                            
                            </tr>
                        </thead>
                        <tbody id="tabla"></tbody>
                    </table>
                </div>
                <div class="col-md-6" id="formulario">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr class="info">
                                <!--td>Código</td -->
                                <th>Nombre</th>
                                <th>email</th>
                                <th>Comentario</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            
                            </tr>
                        </thead>
                        <tbody id="tabla2"></tbody>
                    </table>
                </div>
            </div>

        </div>
        
  
    </main>


    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap4/bootstrap.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js "></script>
    <script src="../js/alertify/alertify.js"></script>
    <script src="./js/funcionesComentario.js"></script>


</body>

</html>