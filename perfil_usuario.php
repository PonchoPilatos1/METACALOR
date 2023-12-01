<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>REGISTRO-ALIMENTO</title>
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
                    <img class="w-100" src="img/banner-6.jpg" alt="Image" style="height: 1000px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                        <div class="p-3" style="max-width: 900px; margin-top: 6%;">
                            <div class="rounded bg-light" >
                                <img class="navbar-brand mx-7 " src="img/logo.png"
                                    style="object-fit: cover; width: 80%; height: 80%;" />
                            </div>
                        </div>
                        <div class="container text-center py-4">

                        <h1 class="text-white display-3 mt-lg-5 py-4">Mira Tu Perfil</h1>
            <div class="d-inline-flex align-items-center text-white">
                <h2 class="m-0"><a class="text-white font" href="pagina_inicio_usuario.php">VOLVER</a></h2>

            </div>

                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <!-- Carousel End -->
        <?php
          if (session_status() === PHP_SESSION_NONE) {
              session_start();
          }

          if (isset($_SESSION["username"])) {
              $nombreUsuario = $_SESSION["username"];
              $id = $_SESSION["user_id"];
          } else {
          }
        ?>


    <!-- Perfil-->
    <div class="container-fluid ">
      <div class="container py-3">
      <h1 class="section-title position-relative text-center mb-5">Información Del Perfil :</h1>

        <div class="container-fluid py-5 bg-light rounded">
          <div class="container_profil py-5" style="text-align:center;">

          <?php
            include "Auth.php";
            $Auth = new Auth();
            if ($Auth->GetInformacionUsuario($id)) {
                $respuesta = $Auth->GetInformacionUsuario($id);
                echo "<h2>Nombre:</h2><h3>" . $respuesta['nombre'] . "</h3><br>";
                echo "<h2>Edad:</h2><h3>" . $respuesta['edad'] . "</h3><br>";
                echo "<h2>Sexo:</h2><h3>" . $respuesta['sexo'] . "</h3><br>";
                echo "<h2>Altura:</h2><h3>" . $respuesta['altura'] . "</h3><br>";
                echo "<h2>Peso:</h2><h3>" . $respuesta['peso'] . "</h3><br>";
                echo "<h2>Calorías meta:</h2><h3>" . $respuesta['caloriasMeta'] . "</h3><br>";
                echo "<h2>Calorias de mantenimiento:</h2><h3>" . $respuesta['kcalMantenimiento'] . "</h3><br>";
                echo "<h2>Indice de Masa Corporal:</h2><h3>" . $respuesta['imc'] . "</h3><br>";
                echo "<h2>Puntaje:</h2><h3>" . $respuesta['puntaje'] . "</h3><br>";

            } else {
                return 0;
            }

          ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Perfil-->
    
    <div class="container-fluid py-5">
      <div class="container py-5">
      <div class="col-12 text-center">
                <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3 mx-auto">
                    <div class="bg-primary mt-n5 py-3" style="width: 80px;"></div>
                    <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3"
                        style="width: 150px; height: 150px;">
                        <img class="rounded-circle w-100 h-100" src="img/editar.jpg" style="object-fit: cover;">
                    </div>
                    <h5 class="font-weight-bold mb-4">Editar Pefril</h5>
                    <a href="editar_perfil.php?id=<?php echo $id;?>" class="btn btn-sm btn-secondary">Vamos!</a>
                </div>
                
            </div>
      </div>
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