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
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>

    </style>


    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="./css/pricing.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c1fc52637c.js" crossorigin="anonymous"></script>
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
            <a class="navbar-brand d-lg-none" href="#"><img src="./img/LOGO DEFINITIVO.png " lt=" " width="300" /></a>           
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-fluid">

                <div class="collapse navbar-collapse nav-center flex-column" id="navbarCollapse">
                    <ul class="navbar-nav mx-auto mb-2 mb-md-0 d-lg-none">

                        <li class="nav-item ">
                            <a class="nav-link" href="sobremi.html">
                                Sobre mi
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

                        <li> <a class="nav-link" href="faq.html">Preguntas frecuentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="contacto.php">Contacto</a>
                        </li>

                    </ul>
                    <!--Barra Navegación para web -->
                    <ul class="navbar-nav mx-auto mb-2 mb-md-0 navbar-brand d-none d-lg-flex">

                        <li class="nav-item m-4">
                            <a class="nav-link" href="sobremi.html">
                                Sobre mi
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
                            <a class="nav-link disabled " href="blog.php">Blog</a>
                        </li>

                        <a class="navbar-brand d-none d-lg-block" href="index.html"> <img src="./img/LOGO DEFINITIVO.png " lt=" " width="300" />
                        </a>

                        <li> <a class="nav-link m-4" href="faq.html">Preguntas frecuentes</a>
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
    <div id="myCarousel " class="carousel slide " data-bs-ride="carousel ">

</div>
        


        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
        
    
        <section class="details-card">
    <div class="container">
    <h1 class="text-center">Blog</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/nature" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>   
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/animals" alt="">
                        <span><h4>heading2</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading2</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>   
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/tech" alt="">
                        <span><h4>heading3</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading3</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>   
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/nature" alt="">
                        <span><h4>heading</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>   
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/animals" alt="">
                        <span><h4>heading2</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading2</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>   
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <img src="https://placeimg.com/380/230/tech" alt="">
                        <span><h4>heading3</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>Heading3</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, voluptatum! Dolor quo, perspiciatis
                            voluptas totam</p>
                            <a href="#" class="btn-card">Read</a>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
        <br>

        <style>
            section{
    padding: 100px 0;
}
.details-card {
	background: #ecf0f1;
}

.card-content {
	background: #ffffff;
	border: 4px;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
}

.card-img {
	position: relative;
	overflow: hidden;
	border-radius: 0;
	z-index: 1;
}

.card-img img {
	width: 100%;
	height: auto;
	display: block;
}

.card-img span {
	position: absolute;
    top: 15%;
    left: 12%;
    background: #1ABC9C;
    padding: 6px;
    color: #fff;
    font-size: 12px;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    transform: translate(-50%,-50%);
}
.card-img span h4{
        font-size: 12px;
        margin:0;
        padding:10px 5px;
         line-height: 0;
}
.card-desc {
	padding: 1.25rem;
}

.card-desc h3 {
	color: #000000;
    font-weight: 600;
    font-size: 1.5em;
    line-height: 1.3em;
    margin-top: 0;
    margin-bottom: 5px;
    padding: 0;
}

.card-desc p {
	color: #747373;
    font-size: 14px;
	font-weight: 400;
	font-size: 1em;
	line-height: 1.5;
	margin: 0px;
	margin-bottom: 20px;
	padding: 0;
	font-family: 'Raleway', sans-serif;
}
.btn-card{
	background-color: #1ABC9C;
	color: #fff;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    padding: .84rem 2.14rem;
    font-size: .81rem;
    -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    -o-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    margin: 0;
    border: 0;
    -webkit-border-radius: .125rem;
    border-radius: .125rem;
    cursor: pointer;
    text-transform: uppercase;
    white-space: normal;
    word-wrap: break-word;
    color: #fff;
}
.btn-card:hover {
    background: orange;
}
a.btn-card {
    text-decoration: none;
    color: #fff;
}
/* End card section */
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
                                <a class="navbar-brand colormio" href="mailto:mrubio.psico@gmail.com"><i class="fa fa-envelope"></i>mrubio.psico@gmail.com</a>
                            </li>
                            <li>
                                <a class="navbar-brand colormio" href="mailto:mrubio.psico@gmail.com"><i class="fa fa-envelope"></i>mrubio.psico@copao.com</a>

                            </li>
                            <br>
                            <li>
                                <b>Nº col AO11885</b>
                            </li>



                        </ul>

                    </div>


                    <div class="col-lg-4 col-md-6 ">
                        <h3>Redes Sociales</h3>
                        <ul class="list-unstyled socila-list ">
                            <li><img src="./img/facebook.png " alt=" " width="48 " height="48 " /></li>
                            <li><img src="./img/instagram.png " alt=" " width="48 " height="48 " /></li>

                        </ul>

                    </div>

                    <div class="col-lg-4 ">
                        <h3>Información</h3>
                        <ul class="list-unstyled one-column ">
                            <li>Aviso legal</li>
                            <li>Política de privacidad</li>
                            <li>Política de cookies</li>
                            <li>Más información sobre cookies</li>


                        </ul>
                    </div>

                </div>
            </div>
            <div class="copyright text-center ">

                <span>Copyright &copy; 2021  Marta Rubio Lara</span>
            </div>
        </footer>
    </main>


    <script src="./js/popper.min.js"></script>
    <!-- Always remember to call the above files first before calling the bootstrap.min.js file -->
    <script src="./js/bootstrap4/bootstrap.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js "></script>



</body>

</html>

</html>