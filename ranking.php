<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Ranking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">



    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<div class="col-md-6 text-center text-lg-right " style="z-index: 1000; ">
    <div class="d-inline-flex align-items-center " style="margin-top: 10%;">
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
<body>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 pb-5">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.png" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                        <div class="p-3" style="max-width: 900px; margin-top: 9%;">
                            <div class="rounded bg-light" >
                                <img class="navbar-brand mx-7 " src="img/logo.png"
                                    style="object-fit: cover; width: 80%; height: 80%;" />
                            </div>
                        </div>
                        <div class="container text-center py-5">
                            <h1 class="text-white display-3 mt-lg-5 py-3">RANKING 🏅</h1>
                            <div class="d-inline-flex align-items-center text-white">
                                <p class="m-0"><a class="text-white font display-4" href="pagina_inicio.html">INICIO</a>
                                </p>
                                <i class="fa fa-circle px-3"></i>
                                <p class="m-0"><a class="text-white font display-4"
                                        href="login.html">INICIAR SESIÓN</a></p>
                            </div>
                        </div>
                    </div>
                </div>

        </div>


   
    <!-- Contact End -->

    <br><br>
    <h1 class="section-title position-relative text-center mb-5">Echa Un Vistazo Al Ranking Global !</h1>
    <div class="col-lg-6 bg-light" style="margin: auto; text-align: center; border-radius: 50px;">
        <?php
            include "auth.php"; 
            $auth = new Auth();
            $usuarios = $auth->getTop50Usuarios();

            if (!empty($usuarios)) {
                echo '<div class="col-lg-6 bg-light" style="margin: auto; text-align: center; border-radius: 50px;">';

                // Ordenar los usuarios por puntaje de forma descendente
                usort($usuarios, function($a, $b) {
                    return $b['puntaje'] - $a['puntaje'];
                });

                $prevPuntaje = null;
                $prevPosicion = null;

                foreach ($usuarios as $index => $usuario) {
                    // Verificar si el puntaje es el mismo que el usuario anterior
                    if ($usuario['puntaje'] === $prevPuntaje) {
                        // Tienen el mismo puntaje, asignar la misma posición
                        $posicion = $prevPosicion;
                    } else {
                        // Tienen puntajes diferentes, asignar la posición actual
                        $posicion = $index + 1;
                    }

                    echo '<h4 class="font-weight-bold rank_h4">' . $posicion . '# ' . $usuario['nombre'] . ' ' . $usuario['puntaje'] . 'Puntos </h4>';

                    // Actualizar los valores previos
                    $prevPuntaje = $usuario['puntaje'];
                    $prevPosicion = $posicion;
                }

                echo '</div>';
            } else {
                echo 'No hay usuarios con puntaje.';
            }
        ?>
    </div>

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