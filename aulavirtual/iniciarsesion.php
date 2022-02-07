<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags and Bootstrap CSS-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="img/InfoFuture.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar sesión</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/registro.css" rel="stylesheet" />
</head>
<body class="p-3 mb-2 bg-dark text-white">
    <?php
        session_start();
        if(isset($_SESSION["rol"])){
            if($_SESSION["rol"] == "alumno"){
                header('Location: vista-alumno.php');
            }else if($_SESSION["rol"] == "profesor"){
                header('Location: vista-profesor.php');
            }
            
        }else{
            if(isset($_GET["error"])){
                echo '<div class="alert alert-danger text-center" role="alert">
                '.$_GET["error"].'
                </div>';
            }
            echo '
            <br><br><br>
            <h1><img id="logo" src="img/InfoFuture original1.svg" alt="logo"/></h1>
            <br>
            <div class="container-fluid">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-2 col-sm-0"></div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <form method="POST" action="login.php" id="formulario">
                            <div class="p-3 mb-2 bg-light text-dark" id="contenido">
                                <div>
                                    <h1>¡Inicia sesión!</h1>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" id="email" name="email" placeholder="tu@correo.es" required class="form-control">
                                    <label for="email"><b>E-mail:</b></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" id="contraseña" name="password" placeholder="***********" required class="form-control">
                                    <label for="contraseña"><b>Contraseña:</b></label>
                                </div>
                                <br>
                                <div class="button">
                                    <button type="submit" class="btn btn-outline-dark">Iniciar sesión</button>
                                </div>
                                <div id="centrar">
                                    <a href="registro.php">¿Todavía no te has registrado?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-2 col-sm-0"></div>
                </div>
            </div>';
        }
    ?>
    
</body>
</html>