<?php
    $id = $_GET['id'];
?>

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
                    <img class="w-100" src="img/banner-1.jpeg" alt="Image" style="height: 1000px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                        <div class="p-3" style="max-width: 900px; margin-top: 6%;">
                            <div class="rounded bg-light" >
                                <img class="navbar-brand mx-7 " src="img/logo.png"
                                    style="object-fit: cover; width: 80%; height: 80%;" />
                            </div>
                        </div>
                        <div class="container text-center py-5">
                        <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION["username"])) {
                $nombreUsuario = $_SESSION["username"];
                $id = $_SESSION["user_id"];
                echo "<h1 class='text-white display-3 mt-lg-5 py-4'>$nombreUsuario, Eres Deportivo</h1>";
                
                include "auth.php"; }
                ?>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <!-- Carousel End -->

    <!-- Contact Start -->
    <div class="container-fluid py-3">
        <div class="container py-3">
            
            <div class="row justify-content-center">
                
                <div class="col-lg-6">
                    
                    <h1 class="section-title position-relative text-center mb-5">NOS EJERCITAMOS HOY ?</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="contact-form bg-light rounded p-5" >
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate"
                            action="controlador_agregarActividad.php?id=<?php echo $id;?>" method="post" onsubmit="return validarFormulario()">
                            <div class="control-group">
                                <p style="text-align: center;">Que actividad realizaste ?</p>
                                <select class="form-control p-1" id="actividad" name="actividad" required="required"
                                    data-validation-required-message="Selecciona tu actividad" style="height: 3rem;">
                                    <option disabled selected> </option>
                                    <option value="Correr"> Correr</option>
                                    <option value="Natación"> Natación</option>
                                    <option value="Gimnasio"> Gimnasio</option>
                                    <option value="Fútbol"> Fútbol</option>
                                    <option value="Basquetball"> Basquetball</option>
                                    <option value="Yoga"> Yoga</option>
                                    <option value="Volleyball"> Volleyball</option>
                                    <option value="Zumba"> Zumba</option>
                                    <option value="Pilates"> Pilates</option>
                                    <option value="Baile"> Baile</option>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <p style="text-align: center;">Por cuanto tiempo ?</p>
                                <select class="form-control p-1" id="tiempo" name="tiempo" required="required"
                                    data-validation-required-message="Selecciona tu tiempo" style="height: 3rem;">
                                    <option disabled selected> </option>
                                    <option value=".30">30 min </option>
                                    <option value="1">1 hora</option>
                                    <option value="2">Más de una hora</option>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block py-2 px-2" type="submit" id="sign-in"
                                    style="font-size: 20px;font-style: bold;">- Registrar -</button>
                            </div>
                        </form>
                        <script>
                            function validarFormulario() {
                                var actividad = document.getElementById('actividad').value;
                                var tiempo = document.getElementById('tiempo').value;

                                if (actividad === "" || tiempo === "") {
                                    alert("Por favor, completa todos los campos.");
                                    return false; 
                                }

                                return true;
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <br><br><br><a href="pagina_inicio_usuario.php"  class="btn btn-primary py-4 px-6" style="margin-left: 46.5%;" >- Volver -</a><br><br><br><br>

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

    <!-- Template Javascript -->
    <script src="js/soloLetras.js"></script>


</body>

</html>