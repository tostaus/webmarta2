<!doctype html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Creaciones Web Sitios">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Marta Rubio - Psicología</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon-16x16.png">
    <link rel="manifest" href="./site.webmanifest">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <style>

    </style>


    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="./css/pricing.css" rel="stylesheet">
 <link href="./fontawesome/css/all.css" rel="stylesheet">  
  <link rel="stylesheet" href="./css/alertify/alertify.css">
    <link rel="stylesheet" href="./css/alertify/themes/bootstrap.rtl.min.css" />
    <script src="./js/jquery/jquery-3.5.1.min.js"></script>

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

                        <li> <a class="nav-link m-4" href="faq.php">Preguntas frecuentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mt-4 disabled" href="contacto.php">Contacto</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <div id="myCarousel " class="carousel slide " data-bs-ride="carousel ">

        </div>


        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">




            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider ">

            <div class="row featurette " >
            <div class="col-lg-4 col-md-6 dropmio" data-aos="flip-right" data-aos-delay="100">
                        <h3>Contacto</h3>
                        <ul class="list-unstyled one-column ">

                            <li>
                                <a class="navbar-brand colormio" href="tel:+34644107668"><i class="fa fa-phone"></i>+34 644107668</a>
                            </li>
                            <li>
                                <a class="sinSubrayado colormio" href="mailto:contacto@martarubiopsicologosmalaga.com"><i class="fa fa-envelope"></i>contacto@martarubiopsicologosmalaga.com</a>
                            </li>
                            
                            <br>
                            



                        </ul>

                    </div>
                <div class="col-md-1 ">

                </div>
                <div class="col-md-7 border" data-aos="flip-left" data-aos-delay="100">
                    <hr>
                    <form id="registro-form" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="nombre">Nombre:<span class="red">*</span></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="email">Email:<span class="red">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="asunto">Asunto:</label>
                                <input type="text" class="form-control" id="asunto" name="asunto" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje:<span class="red">*</span></label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="3" min="25" required></textarea>
                        </div>
                        <hr>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="privacidad">
                            <label class="form-check-label" for="flexCheckDefault">
                                Acepto la política de  <a class="sinSubrayado colormio" href="privacidad.html">privacidad</a>
                            </label>
                        </div>
                        <div class="form-group">
                            <button class="w-100 btn btn-ttc" type="submit" name="submit">Enviar</button>
                        </div>
                        <hr> 
                        
                    </form>
                </div>
            </div>

            <hr class="featurette-divider ">



            <!-- /END THE FEATURETTES -->

        </div>

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
                                <a class="sinSubrayado colormio" href="mailto:contacto@martarubiopsicologosmalaga.com"><i class="fa fa-envelope"></i>contacto@martarubiopsicologosmalaga.com</a>

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
                            <li><a class="colormio sinSubrayado" href="avisolegal.html">Aviso legal</a></li>                                                     <li><a class="colormio sinSubrayado" href="privacidad.html">Política de privacidad</a></li>
                            <li><a class="colormio sinSubrayado" href="cokies.html">Política de cookies</a></li>
                            

                        </ul>
                    </div>

                </div>
            </div>
            <div class="copyright text-center ">

            <span>Copyright &copy; 2021  Marta Rubio Lara.
                Diseño por: <a  href="https://creacioneswebsitios.es">creacioneswebsitios.es</a></span>            </div>
        </footer>
        <div id="preloader"></div>

    </main>


    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap4/bootstrap.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js "></script>
    <script src="js/alertify/alertify.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <script src="js/funcionesContacto.js"></script>


</body>

</html>