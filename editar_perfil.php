<?php
    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>LOG-IN</title>
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
                            <h1 class="text-white display-3 mt-lg-5 py-3">Actualiza tu información</h1>
                            <div class="d-inline-flex align-items-center text-white">
                            </div>
                        </div>
                    </div>
                </div>

        </div>


    <!-- Contact Start -->
    <div class="container-fluid py-1">
        <div class="container py-1">
            
            <div class="row justify-content-center">
                
                <div class="col-lg-6">
                    
                    <h1 class="section-title position-relative text-center mb-5">ACTUALIZA TUS DATOS!</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="contact-form bg-light rounded p-5">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate" onsubmit="return validarFormulario()" 
                            action="controlador_editarUsuario.php?id=<?php echo $id;?>" method="post">
                            <div class="control-group">
                                <input type="text" onkeydown="return soloLetras(event);" class="form-control p-4"
                                    id="nombre" name="nombre" maxlength="50" placeholder="Nombre"
                                    required="required" title="No se permiten números en este campo"
                                    data-validation-required-message="Digite su nombre completo:" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="usuario" name="usuario"
                                    placeholder="Nombre de usuario" required="required"
                                    data-validation-required-message="Please enter your user name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" class="form-control p-4" id="edad" name="edad" placeholder="Edad"
                                    required="required" min="10" max="100"
                                    data-validation-required-message="Digite su edad" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" class="form-control p-4" id="altura" name="altura"
                                    placeholder="altura (cm)" min="100" max="250" required="required"
                                    data-validation-required-message="Please enter your height" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" class="form-control p-4" id="peso" name="peso"
                                    placeholder="Peso actual" required="required" min="1" max="200"
                                    data-validation-required-message="Ingrese su peso en Kilogramos" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <p style="text-align: center;">Por favor ingresa tu sexo!</p>
                                <select class="form-control p-1" id="categoria" name="sexo" placeholder="gender"
                                    required="required" data-validation-required-message="Selecciona tu sexo"
                                    style="height: 3rem;">
                                    <option disabled selected> </option>
                                    <option value="M"> Mujer</option>
                                    <option value="H"> Hombre</option>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <p style="text-align: center;">Que tan activo eres ?</p>
                                <select class="form-control p-1" id="subcategoria" name="af" placeholder="actividad"
                                    required="required" data-validation-required-message="Selecciona una actividad"
                                    style="height: 3rem;">
                                    <option disabled selected> </option>
                                    <option value="1"> Sedentaria (No realiza actividad fisica) </option>
                                    <option value="2"> Liviana (Tres horas semanales de actividad fisica)</option>
                                    <option value="3"> Moderada (seis horas semanales de actividad fisica)</option>
                                    <option value="4"> Intensa (cuatro a cinco horas diarias de actividad fisica)
                                    </option>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>


                            <div class="control-group">
                                <p style="text-align: center;">Fijate un objetivo !</p>
                                <input type="number" class="form-control p-4" id="meta" name="meta"
                                    placeholder="Peso deseado" required="required"
                                    data-validation-required-message="Please enter your desired weight" />
                                <p class="help-block text-danger"></p>
                            </div><br><br>
                            <div>
                            <button class="btn btn-primary btn-block py-2 px-2" type="submit" id="sign-in" 
                                style="font-size: 20px; font-style: bold;">- Actualizar -</button>
                            </div>
                        </form>

                        <script>
                            function soloLetras(e) {
                                var key = e.keyCode || e.which;
                                var tecla = String.fromCharCode(key).toLowerCase();
                                var letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                                var especiales = [8, 37, 39, 46];

                                var tecla_especial = false;
                                for (var i in especiales) {
                                    if (key == especiales[i]) {
                                        tecla_especial = true;
                                        break;
                                    }
                                }

                                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                                    return false;
                                }
                            }
                        
                            document.getElementById("contactForm").addEventListener("submit", function (event) {
                                var nombre = document.getElementById("nombre").value;
                                var usuario = document.getElementById("usuario").value;
                                var edad = document.getElementById("edad").value;
                                var password = document.getElementById("password").value;
                                var altura = document.getElementById("altura").value;
                                var peso = document.getElementById("peso").value;
                                var sexo = document.getElementById("categoria").value;
                                var actividad = document.getElementById("subcategoria").value;
                                var meta = document.getElementById("meta").value;

                                // Validar que no haya campos vacíos
                                if (
                                    nombre.trim() === "" ||
                                    usuario.trim() === "" ||
                                    edad.trim() === "" ||
                                    password.trim() === "" ||
                                    altura.trim() === "" ||
                                    peso.trim() === "" ||
                                    sexo.trim() === "" ||
                                    actividad.trim() === "" ||
                                    meta.trim() === ""
                                )   {
                                        alert("Todos los campos son obligatorios");
                                        event.preventDefault();
                                        return;
                                    }
                            
                                    // Validar que el nombre solo contenga letras
                                    var regexNombre = /^[a-zA-Z\s]+$/;
                                    if (!regexNombre.test(nombre)) {
                                        alert("El nombre solo debe contener letras");
                                        event.preventDefault();
                                        return;
                                    }
                            
                                    // Validar que la edad sea menor o igual a 100
                                    if (parseInt(edad) > 100) {
                                        alert("La edad no puede ser mayor a 100 años");
                                        event.preventDefault();
                                        return;
                                    }

                                    if (parseInt(edad) < 7) {
                                        alert("Debes ser mayor de 7 años");
                                        event.preventDefault();
                                        return ;
                                    }
                            
                                    // Validar que la altura sea menor o igual a 250
                                    if (parseInt(altura) > 250) {
                                        alert("La altura no puede ser mayor a 250 cm");
                                        event.preventDefault();
                                        return;
                                    }

                                    if (parseInt(altura) < 100) {
                                        alert("La altura no puede ser menor a 100 cm");
                                        event.preventDefault();
                                        return ;
                                    }
                                    if (parseInt(peso) < 20) {
                                        alert("El peso actual no puede ser menor a 20 kg");
                                        event.preventDefault();
                                        return ;
                                    }
                                    var pesoDeseado = parseInt(meta);
                                    if (parseInt(peso) < 50) {
                                        if (pesoDeseado < 30 || pesoDeseado > 60) {
                                            alert("No deberias querer bajar mas de 15 kg o querer subir mas de 10");
                                            event.preventDefault();
                                            return ;
                                        }
                                    } else {
                                        if (pesoDeseado === parseInt(peso) - 30 || pesoDeseado === parseInt(peso) + 20) {
                                            alert("No deberias de bajar mas 30 kg en lapso corto de tiempo o subir mas de 20 kg");
                                            event.preventDefault();
                                            return ;
                                        }
                                    }
                                });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <br><br><br><a href="pagina_inicio_usuario.php"  class="btn btn-primary py-3 px-5" style="margin-left: 46%;" >- Volver -</a><br><br><br><br>

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