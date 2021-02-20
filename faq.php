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

<link href="./fontawesome/css/all.css" rel="stylesheet">    <script src="./js/jquery/jquery-3.5.1.min.js"></script>
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

                        <!--li class="nav-item">
                            <a class="nav-link" href="#">Terapias</a>
                        </li-->
                        <!--li><img src="./img/twiter.png " alt=" " width="48" height="48" /></li-->
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

                        <!--li class="nav-item">
                            <a class="nav-link" href="#">Terapias</a>
                        </li-->
                        <!--li><img src="./img/twiter.png " alt=" " width="48" height="48" /></li-->
                        <li class="nav-item m-4 dropdown">
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
                        <li class="nav-item m-4">
                            <a class="nav-link  " href="blog.php">Blog</a>
                        </li>

                        <a class="navbar-brand d-none d-lg-block" href="index.html"> <img src="./img/LOGO DEFINITIVO.png " lt=" " width="300" />
                        </a>

                        <li> <a class="nav-link m-4 disabled" href="faq.php">Preguntas frecuentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-4" href="contacto.php">Contacto</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

        </div>


        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <br>

            <div class="container" id="accordion">
                <div>
                    <br>
                    <h2>Preguntas frecuentes</h2>

                </div>
                <div id="preguntas">
                    <!--div class="card">


                        <div class="card-header ">
                            <h4 class="card-header micolorfaq">
                                <a class="nav-link micolorfaq" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Is account registration required?</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="card-block p-3">
                                Account registration at <strong>PrepBootstrap</strong> is only required if you will be selling or buying themes. This ensures a valid communication channel for all parties involved in any transactions.
                            </div>
                        </div>
                    </div-->

                </div>
                
                
            </div>
        </div>
        <br>

        <style>

        </style>


        <!-- /.container -->



        <!-- FOOTER >
        <footer class="container ">
            <p class="float-end "><a href="# ">Back to top</a></p>
            <p>&copy; 2017-2020 Company, Inc. &middot; <a href="# ">Privacy</a> &middot; <a href="# ">Terms</a></p>
        </footer-->
        <footer>
            <div class="container ">
                <div class="row ">

                    <div class="col-lg-4 col-md-6 ">
                        <h3>Contacto</h3>
                        <ul class="list-unstyled one-column ">

                            <li>
                                <a class="navbar-brand colormio" href="tel:+34644107668"><i class="fa fa-phone"></i>+34 644107668</a>
                            </li>
                            <li>
                                <a class="navbar-brand colormio" href="mailto:contacto@martarubiopsicologosmalaga.com"><i class="fa fa-envelope"></i>contacto@martarubiopsicologosmalaga.com</a>
                            </li>
                            
                            <br>
                            <li>
                                <b>Nº col AO11885</b>
                            </li>



                        </ul>

                    </div>


                    <div class="col-lg-4 col-md-6 ">
                        <h3>Redes Sociales</h3>
                        <ul class="list-unstyled socila-list mx-auto">
                            <li>
                                <a href="https://www.facebook.com/MartaRubioTherapy">
                                    <img src=" ./img/facebook.png " alt=" " width="48 " height="48 " /></li>

                            </a>



                            <li>
                                <a href="https://www.instagram.com/martarubio_therapy/">
                                    <img src="./img/instagram.png " alt=" " width="48 " height="48 " />

                                </a>
                            </li>

                        </ul>

                    </div>

                    <div class="col-lg-4 ">
                        <h3>Información</h3>
                        <ul class="list-unstyled one-column ">
                            <li>Aviso legal</li>
                            <li>Política de privacidad</li>
                            <li>Política de cookies</li>
                            

                        </ul>
                    </div>

                </div>
            </div>
            <div class="copyright text-center ">

<span>Copyright &copy; 2021  Marta Rubio Lara.
                Diseño por: <a  href="https://creacioneswebsitios.es">creacioneswebsitios.es</a></span>            </div>
        </footer>
    </main>


    <script src="./js/popper.min.js"></script>
    <!-- Always remember to call the above files first before calling the bootstrap.min.js file -->
    <script src="./js/bootstrap4/bootstrap.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js "></script>
    <script src="js/funcionesFaq.js "></script>




</body>

</html>

</html>