<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>PAGINA_PRINCIPAL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style_inicio.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3 d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">

                </div>
                <div class="col-md-6 text-center text-lg-right ">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-white pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar ">
        <div class="container-lg  " style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div></div>
                    <img class="navbar-brand mx-5" src="img/logo.jpg"
                        style="object-fit: cover; width: 30%; height: 30%;" />
                    <div></div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header bg-secondary" style="margin-bottom: 90px;">
    <div class="container text-center py-5 ">
        <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION["username"])) {
                $nombreUsuario = $_SESSION["username"];
                $id = $_SESSION["user_id"];
                echo "<h1 class='text-black display-3 mt-lg-5 py-5'>Hola, $nombreUsuario!</h1>";
                include "auth.php"; 
                $auth = new Auth();
                $posicionPuntajeUsuario = $auth->getPosicionPuntajeUsuario($id);
                $posicionUsuario = $auth->getPosicionUsuario($id);

                if ($posicionPuntajeUsuario !== false && $posicionUsuario !== false) {
                    echo '<div class="col-lg-6 bg-light" style="margin: auto; text-align: center; border-radius: 50px;">';
                    echo '<h4 class="font-weight-bold rank_h4">Posición: ' . $posicionUsuario . '#</h4>';
                    echo '<h4 class="font-weight-bold rank_h4">' . $posicionPuntajeUsuario['puntaje'] . ' Puntos </h4>';
                    echo '</div>';
                } else {
                    echo 'No se pudo obtener la posición y los puntos del usuario.';
                }
            } else {
                echo "<h1 class='text-white display-3 mt-lg-5 py-3'>¡Bienvenido!</h1>";
            }
        ?>
    </div>
</div>

    <!-- Header End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">Que Haremos Hoy ?</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 pb-2">
                    <div
                        class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                        <div class="bg-primary mt-n5 py-3" style="width: 80px;">

                        </div>
                        <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3"
                            style="width: 150px; height: 150px;">
                            <img class="rounded-circle w-100 h-100" src="img/usuario.png" style="object-fit: cover;">
                        </div>
                        <h5 class="font-weight-bold mb-4">Ver Perfil</h5>
                        <a href="perfil_usuario.php?id=<?php echo $id;?>" class="btn btn-sm btn-secondary">Vamos!</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 pb-2">
                    <div
                        class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                        <div class="bg-primary mt-n5 py-3" style="width: 80px;">

                        </div>
                        <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3"
                            style="width: 150px; height: 150px;">
                            <img class="rounded-circle w-100 h-100" src="img/actividad.png" style="object-fit: cover;">
                        </div>
                        <h5 class="font-weight-bold mb-4">Registrar Actividad </h5>
                        <a href="registrar_actividad.php?id=<?php echo $id;?>" class="btn btn-sm btn-secondary">Vamos!</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 pb-2">
                    <div
                        class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                        <div class="bg-primary mt-n5 py-3" style="width: 80px;">

                        </div>
                        <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3"
                            style="width: 150px; height: 150px;">
                            <img class="rounded-circle w-100 h-100" src="img/alimento.jpeg" style="object-fit: cover;">
                        </div>
                        <h5 class="font-weight-bold mb-4">Registrar Alimento</h5>
                        <a href="registrar_alimento.php?id=<?php echo $id;?>" class="btn btn-sm btn-secondary">Vamos!</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 pb-2">
                    <div
                        class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                        <div class="bg-primary mt-n5 py-3" style="width: 80px;">

                        </div>
                        <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3"
                            style="width: 150px; height: 150px;">
                            <img class="rounded-circle w-100 h-100" src="img/ranking.jpeg" style="object-fit: cover;">
                        </div>
                        <h5 class="font-weight-bold mb-4">Ranking Global</h5>
                        <a href="ranking_usuario.php" class="btn btn-sm btn-secondary">Vamos!</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 pb-2">

                </div>
                <div class="col-lg-3 col-md-6 mb-4 pb-2">
                    <div
                        class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                        <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                            
                        </div>
                        <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3"
                            style="width: 150px; height: 150px;">
                            <img class="rounded-circle w-100 h-100" src="img/status.png" style="object-fit: cover;">
                        </div>
                        <h5 class="font-weight-bold mb-4">Verificar Status</h5>
                        <a href="controlador_reporteDiario.php?id=<?php echo $id;?>" class="btn btn-sm btn-secondary">Vamos!</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 pb-2">
                    <div
                        class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                        <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                            
                        </div>
                        <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3"
                            style="width: 150px; height: 150px;">
                            <img class="rounded-circle w-100 h-100" src="img/salir.jpeg" style="object-fit: cover;">
                        </div>
                        <h5 class="font-weight-bold mb-4">Cerrar Sesion</h5>
                        <a href="logout.php" class="btn btn-sm btn-secondary">Vamos!</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 pb-2">

                </div>
                <div class="col-12 text-center">
     

                    
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
<!-- Promotion Start -->
<div class="container-fluid my-5 py-5 px-0">
        <div class="row bg-primary m-0">
            <div class="col-md-6 px-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="img/promotion_2.jpg" style="object-fit: cover;">
                    <button type="button" class="btn-play" data-toggle="modal" data-src="https://www.youtube.com/watch?v=L9bgPICulxs&pp=ygUScmVjZXRhcyBudXRyaXRpdmFz"
                    data-target="#videoModal" >
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="col-md-6 py-5 py-md-0 px-0">
                <div class="h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                    <div class="d-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                        style="width: 100px; height: 100px;">
                        <h3 class="font-weight-bold text-secondary mb-0">Ideas?</h3>
                    </div>
                    <h3 class="font-weight-bold text-white mt-3 mb-4">Recomendación:</h3>
                    <h4 class="text-white mb-4">Si buscas inspirarte o descubrir nuevos platillos,
                        Siempre tendrás disponible nuestras recomendaciones de desayunos saludables
                        que puedes elaborar con 5 simples ingtredientes, 
                        pero, sobre todo Deliciosos !
        </h4>
                    <a href="https://www.youtube.com/watch?v=L9bgPICulxs&pp=ygUScmVjZXRhcyBudXRyaXRpdmFz" class="btn btn-secondary py-3 px-5 mt-2">Estoy interesado</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Promotion End -->
    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->
  <!-- Portfolio Start -->
  <div class="container-fluid my-5 py-5 px-0">
        <div class="row justify-content-center m-0">
            <div class="col-lg-5">
                <h1 class="section-title position-relative text-center mb-5">¿ Buscas Algo Delicioso ?</h1>
            </div>
        </div>
        <div class="row m-0 portfolio-container">
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="img/gallery-1.jpg" alt="">
                    <a class="portfolio-btn" href="img/gallery-1.jpg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100 " src="img/gallery-2.jpg" alt="" style="height: 411px;">
                    <a class="portfolio-btn" href="img/gallery-2.jpg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100 " src="img/gallery-3.jpg" alt="" style="height: 411px;">
                    <a class="portfolio-btn" href="img/gallery-3.jpg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100 h-100" src="img/gallery-4.jpeg" alt="" style="height: 411px;">
                    <a class="portfolio-btn" href="img/gallery-4.jpeg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="img/gallery-5.jpg" alt="" style="height: 411px;">
                    <a class="portfolio-btn" href="img/gallery-5.jpg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 p-0 portfolio-item">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="img/gallery-6.jpeg" alt="" style="height: 411px;">
                    <a class="portfolio-btn" href="img/gallery-6.jpeg" data-lightbox="portfolio">
                        <i class="fa fa-plus text-primary" style="font-size: 60px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio End -->
    <!-- Footer Start -->
    <div class="container-fluid footer bg-light py-1" style="margin-top: 30px;">
        <div class="container text-center py-2">
            <div class="row">
                <div class="col-12 mb-4">
                    <a href="login.html" class="navbar-brand m-0">
                        <img src="img/logo.jpg" style=" width: 30%; height: 30%;" />
                    </a>
                </div>
                <div class="col-12 mb-4">
                    <a class="btn btn-outline-secondary btn-social mr-2" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-secondary btn-social mr-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary btn-social mr-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-secondary btn-social" href=""><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-12 mt-2 mb-4">
                    <div class="row">
                        <div class="col-sm-6 text-center text-sm-right border-right mb-3 mb-sm-0">
                            <h5 class="font-weight-bold mb-2">Mantente En Contacto</h5>
                            <p class="mb-2">Guadalajara, Jal.</p>
                            <p class="mb-0">Siguenos en redes sociales</p>
                        </div>
                        <div class="col-sm-6 text-center text-sm-left">
                            <h5 class="font-weight-bold mb-2">Horas De Soporte</h5>
                            <p class="mb-2">Es una plataforma que trabaja</p>
                            <p class="mb-0">24 / 7 horas al día</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <p class="m-0">&copy; <a style="color: #84DCC6;">Domain</a>. All Rights Reserved. Designed by <a
                            style="color: #84DCC6;">Gerudo team</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary px-2 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>