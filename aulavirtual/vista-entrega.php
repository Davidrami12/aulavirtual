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
        <title>Alumno - Subir tarea</title>
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
    
    <body class="bg-dark">
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

        <br><br><br><br><br><br><br>
        <div class="container-fluid">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-2 col-sm-12"></div>
                <div class="col-lg-4 col-md-6 col-sm-12">

                    <?php
                        session_start();
                        require "conexion.php";
                        
                        $idEntrega = $_GET["id"];
                        $email = $_SESSION["email"];
                        $sql = "SELECT * FROM `entregas` WHERE id_tarea = $idEntrega AND email = '$email'";
                        $result = $conn->query($sql);
                        $entregado = false;

                        if ($result->num_rows > 0) {
                            $entregado = true;
                        }
                        echo '
                        <form action="subir-tarea.php" method="POST" id="formulario" enctype="multipart/form-data">
                        <div class="p-3 mb-2 bg-light text-dark" id="contenido">
                            <br>
                            <div>
                                <input type="hidden" name="id_tarea" value="'.$idEntrega.'">
                                <input type="hidden" name="email" value="'.$email.'">';
                                if($entregado){
                                    echo '<input type="hidden" name="entregado" value="1">';
                                }
                            echo '
                            </div>
                            <div>
                                <label for="documento"><b>Seleccione el documento</b></label>
                                <input type="file" id="documento" name="documento">
                            </div>
                            <div class="button">
                                <button type="submit" class="btn btn-outline-dark" id="subir">Subir tarea</button>
                            </div>
                        </div>
                        </form>';
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-2 col-sm-12"></div>
        </div>
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