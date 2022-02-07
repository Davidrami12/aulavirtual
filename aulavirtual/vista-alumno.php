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
        <title>Bienvenido alumno</title>
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
        <script src="js/calendario.js"></script>
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
            <div class="row">
                <div class="col-lg-1 col-md-0 col-sm-0"></div>
                <div class="col-lg-2 col-md-4 col-sm-12" id="funciones">
                    <div class="p-3 bg-primary text-white" id="centrar">
                        <h3>Funciones perfil alumno</h3>
                        <br>
                        <button type="button" id="funcionPerfil" class="btn btn-outline-light" onclick="location.href='asignaturas.php'"><i class="fas fa-book-open"></i>&nbsp;&nbsp;MIS ASIGNATURAS</button>
                        <br>
                        <br>
                        <br>
                    </div>
                    
                </div>
                
                <div class="col-lg-5 col-md-8 col-sm-12" id="contenidoCentral">
                    <div class="p-3 bg-light">
                        <h1><i class='fas fa-user-graduate' style='font-size:36px'></i> <?php echo $_SESSION["nombre"]." ".$_SESSION["apellidos"]?></h1>
                        <h2 id="curso"><i class="fas fa-laptop-code"></i>&nbsp;<?php echo $_SESSION["curso"];?></h2>
                        <br>
                        <?php
                            require("conexion.php");

                            $sql = "SELECT * FROM temas";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <div id="tarjetaTema">
                                    <h3 id="tituloTema">'.$row["titulo"].'</h3>
                                    <div id="contenidoTema">
                                    <p>'.$row["descripcion"].'</p>
                                    ';

                                    $sql = "SELECT * FROM posts WHERE id_tema = ".$row["id"];
                                    $resultPost = $conn->query($sql);
                                    if ($resultPost->num_rows > 0) {
                                        
                                        while ($rowPost = $resultPost->fetch_assoc()) {
                                            echo '
                                            <hr><h6><i class="fas fa-file-alt"></i>'.'&nbsp;'.$rowPost["titulo"].'</h6>
                                            <a href="'.$rowPost["documento"].'">'.str_replace("posts/", "", $rowPost["documento"]).'</a><h6>
                                            ';
                                        }
                                    }
                                    echo '</div></div><br>';
                                    
                                }
                            }else {
                                echo "<hr><h3>Aún no hay temario disponible</h3><hr>";
                    
                            }

                            $sql = "SELECT id_tarea, nota, anotacion FROM entregas WHERE email = '".$_SESSION["email"]."'";
                            $result = $conn->query($sql);
                            $tareas_entregadas = array();
                            $notas = array();
                            $anotaciones = array();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if($row["nota"] != null){
                                        array_push($tareas_entregadas, $row["id_tarea"]);
                                        array_push($notas, $row["nota"]);
                                        array_push($anotaciones, $row["anotacion"]);
                                    }
                                    
                                }
                            }
                            
                            $sql = "SELECT * FROM tareas";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <div id="tarjetaTarea">
                                        <h4><i class="fas fa-graduation-cap" style="color:#f4623a;"></i>'." ".'<u>'."Tarea: ".$row["titulo"].'</u></h4>
                                        <p><i>'.$row["descripcion"].'</i></p>
                                        <h6 id="asignatura">ASIGNATURA: '.$row["asignatura"].'</h6>';
                                        
                                        $hoy = date('Y-m-d');
                                        $timestamp = strtotime($hoy);
                                        $actual = date('d/m/Y', $timestamp);
                                        

                                        $fecha = date($row["fecha"]);
                                        $timestamp1 = strtotime($fecha);
                                        $entrega = date('d/m/Y', $timestamp1);
                                        

                                        if(in_array($row["id"], $tareas_entregadas)){
                                            $index = array_search($row["id"], $tareas_entregadas);
                                            if($notas[$index] >= 5){
                                                echo '
                                                <h6>'."Fecha de entrega: ".$row["fecha"].'</h6>
                                                <div id="retroalimentacionPositiva">
                                                    <h6><i class="fas fa-calendar-check" style="color:blue;"></i>'."&nbsp;&nbsp;"."Nota: ".$notas[$index].'<h6>
                                                    <h6>'."Anotación del profesor: ".$anotaciones[$index].'<h6>
                                                </div>';
                                            }else if($notas[$index] < 5){
                                                echo '
                                                <h6>'."Fecha de entrega: ".$row["fecha"].'</h6>
                                                <div id="retroalimentacionNegativa">
                                                    <h6><i class="fas fa-calendar-check" style="color:red;"></i>'."&nbsp;&nbsp;"."Nota: ".$notas[$index].'<h6>
                                                    <h6>'."Anotación del profesor: ".$anotaciones[$index].'<h6>
                                                </div>';
                                            }
                                            
                                        }else if($actual <= $entrega){
                                            echo '
                                            <h6>'."Fecha de entrega: ".$entrega.'</h6>
                                            <div class="btn-group mb-3" id="entrega">
                                                <div id="botonEntrega">
                                                    <a href="vista-entrega.php?id='.$row["id"].'"class="btn btn-primary" role="button"><i class="fas fa-cloud-upload-alt"></i>&nbsp;&nbsp;Subir entrega</a></button>
                                                </div>
                                            </div>';
                                        }else if($actual >= $entrega){
                                            echo '
                                            <h6 id="entregaTarde">'."Fecha de entrega: ".$entrega.'</h6>
                                            <div class="btn-group mb-3" id="entrega">
                                                <div id="botonEntrega">
                                                    <a href="vista-entrega.php?id='.$row["id"].'"class="btn btn-primary disabled" role="button"><i class="fas fa-times"></i>&nbsp;&nbsp;Subir entrega</a></button>
                                                </div>
                                            </div>';
                                        }
                                    echo '
                                    </div>
                                    
                                    <br>
                                    ';
                                }
                            
                            }else {
                                echo "<h3>No hay tareas disponibles</h3><hr>";
                            }

                            $conn->close();
                        ?>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-4 col-sm-12" id="calendario">
                    <div class="p-3 bg-dark">
                        <h3 id="tituloCalendario"><b><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;CALENDARIO ESCOLAR</b></h3>
                        <br>
                        <div class="calendario">
                            <div id="cabeza">
                                <div id="anterior"><i class="fa fa-angle-left fa-2x" aria-hidden="true"></i></div>
                                <h3 id="titulos"></h3>
                                <div id="posterior"><i class="fa fa-angle-right fa-2x" aria-hidden="true"></i></div>
                            </div>
                            <table id="diasc">
                                <tr id="fila0"><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
                                <tr id="fila1"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                <tr id="fila2"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                <tr id="fila3"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                <tr id="fila4"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                <tr id="fila5"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                <tr id="fila6"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
                    
                </div>
                <div class="col-lg-1 col-md-0 col-sm-0"></div>
            </div>
        </div>
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
