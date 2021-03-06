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
        <title>Alumno - Asignaturas DAW</title>
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
                            <a class="navbar-brand" href="logout.php" id="cerrarSesion"><b>CERRAR SESI??N </b><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </nav>
        
        <br><br><br><br><br>

        <div class="container-fluid">
            <div class="row gx-5">
                <div class="col-lg-3 col-md-1 col-sm-12"></div>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <div class="p-3 bg-light">
                        <h1>Asignaturas del grado superior en Desarrollo de Aplicaciones Web</h1>
                        <hr>
                        <p></p>
                        <p>Este profesional ser?? capaz de: </p>
                        <p>Desarrollar, implantar, y mantener aplicaciones web, con independencia del modelo empleado y utilizando tecnolog??as 
                            espec??ficas, garantizando el acceso a los datos de forma segura y cumpliendo los criterios de accesibilidad, 
                            usabilidad y calidad exigidas por los est??ndares establecidos.
                        </p>
                        <hr>
                        <h1>1?? CURSO</h1>
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
                                <td id="nombre">Formaci??n y orientaci??n laboral</td>
                                <td>90 h</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td id="nombre">Lenguaje de marcas y sistemas de gesti??n de la informaci??n</td>
                                <td>140 h</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td id="nombre">Programaci??n</td>
                                <td>270 h</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td id="nombre">Sistemas inform??ticos</td>
                                <td>205</td>
                                <td>6</td>
                            </tr>
                        </table>
                        <br>
                        <hr>
                        <h1>2?? CURSO</h1>
                        <table id="tabla">
                            <tr>
                                <th>Nombre de la asignatura</th>
                                <th>Horas curriculares</th>
                                <th>Horas/semana</th>
                            </tr>
                            <tr>
                                <td id="nombre">Desarrollo web en entorno cliente</td>
                                <td>115 h</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td id="nombre">Desarrollo web en entorno servidor</td>
                                <td>180 h</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <td id="nombre">Despliegue de aplicaciones web</td>
                                <td>85 h</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td id="nombre">Dise??o de interfaces web</td>
                                <td>115 h</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td id="nombre">Empresa e iniciativa emprendedora</td>
                                <td>65 h</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td id="nombre">Ingl??s t??cnico para grado superior</td>
                                <td>40 h</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td id="nombre">PROYECTO DE DESARROLLO DE APLICACIONES WEB</td>
                                <td>30 h</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td id="nombre">FORMACI??N EN CENTROS DE TRABAJO</td>
                                <td>370 h</td>
                                <td></td>
                            </tr>
                        </table>
                        <br>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-1 col-sm-12"></div>
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
