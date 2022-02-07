<?php
    session_start();
    if(!(isset($_SESSION["rol"]) && $_SESSION["rol"] == "alumno")){
        header('Location: index.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Alumno - Asignaturas ASIR</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/InfoFuture.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"> 
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/styles-vistas.css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
    
    <body id="page-top">
        <nav class="header navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="nav navbar-nav navbar-left">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="nav navbar-nav navbar-center text-center">
                    <a class="navbar-brand" href="index.html" id="infoFuture"><b><img id="logo" src="img/InfoFuture blanco sin texto.svg" alt="logo"/> InfoFuture</b></a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="nav navbar-nav navbar-right">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-right">
                        <li class="nav-item">
                            <a class="navbar-brand" href="logout.php" id="cerrarSesion"><b>CERRAR SESIÓN </b><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </nav>
        
        <br><br><br><br><br>

        <div class="container-fluid">
            <div class="row gx-5">
                <div class="col-lg-1 col-md-3 col-sm-12"></div>
                <div class="col-lg-2 col-md-2 col-sm-12"></div>
                
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="p-3 bg-light">
                        <h1>Asignaturas del grado superior en Administración de Sistemas Informáticos en Redes</h1>
                        <hr>
                        <p></p>
                        <p>Este profesional será capaz de: </p>
                        <p style="text-align: justify;">Configurar, administrar y mantener sistemas informáticos, garantizando la funcionalidad, la integridad de los recursos y 
                            servicios del sistema, con la calidad exigida y cumpliendo la reglamentación vigente. Ejercerá su actividad en el área 
                            informática de entidades que dispongan de sistemas para la gestión de datos e infraestructuras de redes, (intranet,
                            internet y/o extranet). Entre los puestos de trabajo que puede desempeñar destacan los siguientes: técnico en Administración
                            de sistemas, responsable de informática, técnico en servicios de internet, técnico en servicios de mensajería electrónica, 
                            personal de apoyo y soporte técnico, técnico en teleasistencia, técnico en administración de bases de datos, técnico en 
                            redes, supervisor de sistemas o técnico en entornos web.
                        </p>
                        <hr>
                        <h1>1º CURSO</h1>
                        <table id="tabla">
                            <tr>
                                <th>Nombre de la asignatura</th>
                                <th>Horas curriculares</th>
                                <th>Horas/semana</th>
                            </tr>
                            <tr>
                                <td id="nombre">Bases de datos</td>
                                <td>205 h</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td id="nombre">Entornos de desarrollo</td>
                                <td>90 h</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td id="nombre">Formación y orientación laboral</td>
                                <td>90 h</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td id="nombre">Lenguaje de marcas y sistemas de gestión de la información</td>
                                <td>140 h</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td id="nombre">Programación</td>
                                <td>270 h</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td id="nombre">Sistemas informáticos</td>
                                <td>205</td>
                                <td>6</td>
                            </tr>
                        </table>
                        <br>
                        <hr>
                        <h1>2º CURSO</h1>
                        <table id="tabla">
                            <tr>
                                <th>Nombre de la asignatura</th>
                                <th>Horas curriculares</th>
                                <th>Horas/semana</th>
                            </tr>
                            <tr>
                                <td id="nombre">Administración de sistemas gestores de bases de datos</td>
                                <td>60 h</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td id="nombre">Administración de sistemas operativos</td>
                                <td>120 h</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td id="nombre">Empresa e iniciativa emprendedora</td>
                                <td>65 h</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td id="nombre">Implantación de aplicaciones web</td>
                                <td>100 h</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td id="nombre">Inglés técnico para grado superior</td>
                                <td>40 h</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td id="nombre">Seguridad y alta disponibilidad</td>
                                <td>100 h</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td id="nombre">Servicios de red e internet</td>
                                <td>80 h</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td id="nombre">Sistemas de gestión empresarial</td>
                                <td>95 h</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td id="nombre">PROYECTO DE ADMINISTRACIÓN DE SISTEMAS INFORMÁTICOS EN REDES</td>
                                <td>30 h</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td id="nombre">FORMACIÓN EN CENTROS DE TRABAJO</td>
                                <td>370 h</td>
                                <td></td>
                            </tr>
                        </table>
                        <br>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-12"></div>
                <div class="col-lg-1 col-md-3 col-sm-12"></div>
            </div>
        </div>

        <br>
        <br>
        <br>
        
        <footer class="bg-secondary text-white py-2 fixed-bottom">
            <div class="container px-3 px-lg-5">
                <div class="medium text-center">Copyright &copy; 2021 - <b>InfoFuture</b>&nbsp;&nbsp;&nbsp;<img id="logoFooter" src="img/InfoFuture blanco sin texto.svg" alt="logo"/></div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script>
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 50) {
                    $(".header").addClass("active");
                    console.log("1");
                } else {
                    //remove the background property so it comes transparent again (defined in your css)
                    $(".header").removeClass("active");
                    console.log("2")
                }
            });
        </script>
    </body>
</html>
 