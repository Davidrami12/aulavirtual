<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags and Bootstrap CSS-->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="img/InfoFuture.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/registro.css" rel="stylesheet" />
</head>
<body class="p-3 mb-2 bg-dark text-white">
    <br>
    <?php
        if(isset($_GET["error"])){
            echo '<div class="alert alert-danger text-center" role="alert">
            '.$_GET["error"].'
            </div>';
        }
    ?>
    <h1><img id="logo" src="img/InfoFuture original1.svg" alt="logo"/></h1>
    <br>
    <div class="container-fluid">
        <div class="row gx-5">
            <div class="col-lg-3 col-md-2 col-sm-0"></div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <form method="POST" action="registrarse.php" id="formulario">
                    <div class="p-3 mb-2 bg-light text-dark" id="contenido">
                        <div>
                            <h1>¡Regístrate ya!</h1>
                        </div>
                        <div> 
                            <label for="nombre"><b>Nombre:</b></label>
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control" >
                            <span id="errorNombre"></span>
                        </div>
                        <div>
                            <label for="apellidos"><b>Apellidos:</b></label>
                            <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" class="form-control" >
                            <span id="errorApellidos"></span>
                        </div>
                        <div>
                            <label for="telefono"><b>Teléfono:</b></label>
                            <input type="text" id="telefono" name="telefono" placeholder="Teléfono de contacto" class="form-control" >
                                <span id="errorTelefono"></span>
                            </div>
                            <div>
                                <label for="email"><b>E-mail:</b></label>
                                <input type="text" id="email" name="email" placeholder="tu@correo.es" class="form-control" >
                            <span id="errorEmail"></span>
                            </div>
                            <div>
                                <label for="curso"><b>Curso</b></label>
                                <table>
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="radio" id="daw" name="curso" value="DAW" checked>
                                            <label for="daw">DAW</label>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" id="dam" name="curso" value="DAM">
                                            <label for="dam">DAM</label>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" id="asir" name="curso" value="ASIR">
                                            <label for="asir">ASIR</label>
                                    </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <label for="contraseña"><b>Contraseña:</b></label>
                                <input type="password" id="contraseña" name="contraseña" placeholder="***********" class="form-control" >
                                <span id="errorContraseña"></span>
                            </div>
                            <div>
                                <label for="repetirContraseña"><b>Repetir contraseña:</b></label>
                                <input type="password" id="repetirContraseña" name="repetirContraseña" placeholder="***********" class="form-control" >
                                <span id="errorRepetirContraseña"></span>
                            </div>
                            <div class="button">
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-0"></div>
        </div>
    <script src="js/formulario.js"></script>
</body>
</html>