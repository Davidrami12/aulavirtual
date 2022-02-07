<?php
    session_start();
    if(!(isset($_SESSION["rol"]) && $_SESSION["rol"] == "profesor")){
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
        <title>Bienvenido profesor</title>
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/styles-vistas.css" rel="stylesheet"/>
        <script src="js/calendario.js"></script>
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
                <div class="col-lg-1 col-md-0 col-sm-0"></div>
                <div class="col-lg-2 col-md-4 col-sm-12" id="funciones">
                    <div class="p-3 bg-primary text-white" id="centrar">
                        <h3>Funciones perfil profesor</h3>
                        <br>
                        <button type="button" class="btn btn-outline-light" id="funcionPerfil" onclick="location.href='vista-crear-tema.php'"><i class="far fa-newspaper"></i>&nbsp;&nbsp;CREAR TEMA</button>
                        <br>
                        <button type="button" class="btn btn-outline-light" id="funcionPerfil" onclick="location.href='vista-crear-post.php'"><i class="fas fa-paste"></i>&nbsp;&nbsp;AÑADIR POST</button>
                        <br>
                        <button type="button" class="btn btn-outline-light" id="funcionPerfil" onclick="location.href='vista-crear-tarea.php'"><i class="fab fa-stack-overflow"></i>&nbsp;&nbsp;CREAR TAREA</button>
                        <br>
                        <button type="button" class="btn btn-outline-light" id="funcionPerfil" onclick="location.href='vista-listar-entregas.php'"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;CALIFICAR TAREAS</button>              
                    </div>
                </div>
                
                <div class="col-lg-5 col-md-8 col-sm-12" id="contenidoCentral">
                    <div class="p-3 bg-light">
                        <?php
                            if(isset($_GET["mensaje"])){
                                echo '<div class="alert alert-primary" role="alert">
                                    '.$_GET["mensaje"].'
                                </div>';
                            }
                        ?>
                        <h1><i class='fas fa-chalkboard-teacher' style='font-size:36px'></i> <?php echo $_SESSION["nombre"]." ".$_SESSION["apellidos"]?></h1>
                        <p></p>
                        
                        <?php
                            require("conexion.php");

                            $sql = "SELECT * FROM temas";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <div id="tarjetaTema">
                                        <h3 id="tituloTema">'.$row["titulo"].'
                                            <a id="basura" href="eliminar-tema.php?id='.$row["id"].'"> <i class="fas fa-trash-alt" id="basura"></i>
                                            </a>
                                        </h3>
                                        <div id="contenidoTema">
                                            <p>'.$row["descripcion"].'</p>
                                            ';

                                            $sql = "SELECT * FROM posts WHERE id_tema = ".$row["id"];
                                            $resultPost = $conn->query($sql);
                                            if ($resultPost->num_rows > 0) {
                                                
                                                while ($rowPost = $resultPost->fetch_assoc()) {
                                                    echo '
                                                    <hr><h6><i class="fas fa-file-alt"></i>'."&nbsp;&nbsp;".$rowPost["titulo"]."&nbsp;&nbsp;".'<a href="eliminar-post.php?id='.$rowPost["id"].'"><i class="fas fa-trash-alt"></i></a></h6>
                                                    <h6><a href="'.$rowPost["documento"].'">'.str_replace("posts/", "", $rowPost["documento"]).'</a><h6>
                                                    ';
                                                }
                                            }
                                        echo '</div>
                                    </div>
                                    <br>';
                                    
                                }
                            }else {
                                echo "<hr><h4 id='centrar'>Todavía no se ha creado ningún tema</h4><hr>";
                            }



                            $sql = "SELECT * FROM tareas";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    

                                    <div id="tarjetaTarea">
                                    <h4><i class="fas fa-graduation-cap" style="color:#f4623a;"></i>'." ".'<u>'."Tarea: ".$row["titulo"].'</u></h4>
                                        <p><i>'.$row["descripcion"].'</i></p>
                                        <h6 id="asignatura">ASIGNATURA: '.$row["asignatura"].'</h6>
                                        <h6>'."Fecha de entrega: ".$row["fecha"].'</h6><br>
                                        
                                        <div class="btn-group mb-3" id="entrega">
                                            
                                            <div id="botonEntrega">
                                                <a href="vista-editar-tarea.php?id='.$row["id"].'" class="text-decoration-none btn btn-warning">
                                                    Editar
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                                    </svg>
                                                </a>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="eliminar-tarea.php?id='.$row["id"].'" class="text-decoration-none btn btn-danger">
                                                    Eliminar
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    
                                    ';
                                }
                            
                            }else {
                                echo "<hr><h4 id='centrar'>No hay ninguna tarea creada</h4><hr>";
                            }

                            $conn->close();
                        ?>
                        <br>
                        
                    </div>
                    <br>
                </div>
                
                
                
                
                <!--<div class="col-lg-3 col-md-6 col-sm-12">
                    
                </div>-->
                    
            
            <div class="col-lg-3 col-md-4 col-sm-12" id="calendario">
                    <div class="p-3 bg-dark text-white" id="centrar">
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
            <div class="col-lg-1 col-md-0 col-sm-0"></div>
            </div>
           
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
