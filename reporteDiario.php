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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    <img class="w-100" src="img/banner-5.jpg" alt="Image" style="height: 1000px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                        <div class="p-3" style="max-width: 900px; margin-top: 6%;">
                            <div class="rounded bg-light" >
                                <img class="navbar-brand mx-7 " src="img/logo.png"
                                    style="object-fit: cover; width: 80%; height: 80%;" />
                            </div>
                        </div>
                        <div class="container text-center py-4">
                        <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION["username"])) {
                $nombreUsuario = $_SESSION["username"];
                $id = $_SESSION["user_id"];
                echo "<h1 class='text-white display-3 mt-lg-5 py-0'>$nombreUsuario,Mira Tus Logros!</h1>";
                
                include "auth.php"; }
                ?>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <!-- Carousel End -->
    <?php
        $fila = $_GET["variable"];
        $fila2 = json_decode(urldecode($fila), true);
    ?>

    <div class="container-fluid py-3 bg-light rounded">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">Reporte Diario</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="reporte-item">
                        <h4 class="reporte-label text-center">Proteína consumida: <?php echo $fila2['proteina']?> </h4>
                        <p class="reporte-dato text-center"></p>
                    </div>
                    <div class="reporte-item">
                        <h4 class="reporte-label text-center">Carbohidratos consumidos: <?php echo $fila2['carbohidratos']?> </h4>
                    </div>
                    <div class="reporte-item">
                        <h4 class="reporte-label text-center">Lípidos consumidos: <?php echo $fila2['lipidos']?> </h4>
                        <p class="reporte-dato text-center"></p>
                    </div>
                    <div class="reporte-item">
                        <h4 class="reporte-label text-center">Kcal consumidas: <?php echo $fila2['kcalconsumidas']?> </h4>
                        <p class="reporte-dato text-center"></p>
                    </div>
                    <div class="reporte-item">
                        <h4 class="reporte-label text-center">Kcal quemadas: <?php echo $fila2['kcalgastadas']?> </h4>
                        <p class="reporte-dato text-center"></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 text-center">
        <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3 mx-auto">
            <canvas id="graficoConsumo"></canvas>
            <script>
                // Obtén los datos de PHP y pásalos a JavaScript
                var proteinaConsumida = <?php echo $fila2['proteina']; ?>;
                var carbohidratosConsumidos = <?php echo $fila2['carbohidratos']; ?>;
                var lipidosConsumidos = <?php echo $fila2['lipidos']; ?>;

                // Configuración del gráfico
                var ctx = document.getElementById('graficoConsumo').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Proteína', 'Carbohidratos', 'Lípidos'],
                        datasets: [{
                            label: 'Consumo',
                            data: [proteinaConsumida, carbohidratosConsumidos, lipidosConsumidos],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.8)', // Rojo
                                'rgba(255, 206, 86, 0.8)', // Amarillo
                                'rgba(75, 192, 192, 0.8)', // Verde (por ejemplo)
                            ],
                            borderColor: [
                                'rgba(255, 255, 255, 1)', // Color del borde
                                'rgba(255, 255, 255, 1)',
                                'rgba(255, 255, 255, 1)',
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                labels: {
                                    fontSize: 50 // Aumenta el tamaño de la fuente de las etiquetas
                                }
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
        <br><a href="pagina_inicio_usuario.php"  class="btn btn-primary py-4 px-6" style="margin-left: 46.5%;" >- Volver -</a><br><br>
    </div>
    
    

</body>

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

</html>