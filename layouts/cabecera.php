<?php
echo '
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
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>

    </style>


    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="./css/pricing.css" rel="stylesheet">

    <link href="./fontawesome/css/all.css" rel="stylesheet">
    <script src="./js/jquery/jquery-3.5.1.min.js"></script>
    <!-- Para botón de subir a principio página-->
    <script type="text/javascript">
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $("#scroll").fadeIn();
                } else {
                    $("#scroll").fadeOut();
                }
            });
            $("#scroll").click(function() {
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
        <nav class="navbar navbar-expand-md navbar-light fixed-top">
            <!--Logo para móvil-->
            <a class="navbar-brand d-lg-none" href="index.html"><img src="./img/LOGO DEFINITIVO.png " lt=" " width="300" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-fluid">

                <div class="collapse navbar-collapse nav-center flex-column" id="navbarCollapse">
                    <ul class="navbar-nav mx-auto mb-2 mb-md-0 d-lg-none">

                        <li class="nav-item ">
                            <a class="nav-link" href="sobremi.html">
                                Sobre mí
                            </a>
                        </li>


                        <li class="nav-item  dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Terapias
                            </a>
                            <div class="dropdown-menu dropmio" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="terapias.html">Terapias</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="individual.html">Individual</a>
                                <a class="dropdown-item" href="pareja.html">Pareja</a>
                                <a class="dropdown-item" href="familiar.html">Familar</a>


                            </div>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="blog.php">Blog</a>
                        </li>

                        <a class="navbar-brand d-none d-lg-block" href="#"> <img src="./img/LOGO DEFINITIVO.png " lt=" " width="300" />
                        </a>

                        <li> <a class="nav-link" href="faq.php">Preguntas frecuentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contacto.php">Contacto</a>
                        </li>

                    </ul>
                    <!--Barra Navegación para web -->
                    <ul class="navbar-nav mx-auto mb-2 mb-md-0 navbar-brand d-none d-lg-flex">

                        <li class="nav-item m-4">
                            <a class="nav-link" href="sobremi.html">
                                Sobre mí
                            </a>
                        </li>


                        <li class="nav-item m-4 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Terapias
                            </a>
                            <div class="dropdown-menu dropmio" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="terapias.html">Terapias</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item disabled" href="individual.html">Individual</a>
                                <a class="dropdown-item" href="pareja.html">Pareja</a>
                                <a class="dropdown-item" href="familiar.html">Familar</a>


                            </div>

                        </li>
                        <li class="nav-item m-4">
                            <a class="nav-link  " href="blog.php">Blog</a>
                        </li>

                        <a class="navbar-brand d-none d-lg-block" href="index.html"> <img src="./img/LOGO DEFINITIVO.png " lt=" " width="300" />
                        </a>

                        <li> <a class="nav-link m-4" href="faq.php">Preguntas frecuentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-4" href="contacto.php">Contacto</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>';