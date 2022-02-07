<?php

    require "conexion.php";

    if ($conn->connect_error) {
        die("Fallo de conexion: " . $conn->connect_error);
    }

    if(isset($_POST["email"])){
        $sql = "SELECT nombre, apellidos, rol, contraseña, curso FROM usuarios WHERE email = '".$_POST["email"]."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            session_start();
            // creamos la sesión
            // guardamos los datos del usuario que inicia sesión
            while($row = $result->fetch_assoc()) {
                if(password_verify($_POST["password"], $row["contraseña"])){
                    $_SESSION["nombre"] = $row["nombre"];
                    $_SESSION["apellidos"] = $row["apellidos"];
                    $_SESSION["email"] = $_POST["email"];
                    $_SESSION["rol"] = $row["rol"];
                    $_SESSION["curso"] = $row["curso"];
                }else{
                    header('Location: iniciarsesion.php?error=Contraseña incorrecta');
                }
                
            }
            if($_SESSION["rol"] == "profesor"){
                header('Location: vista-profesor.php');
            }else if($_SESSION["rol"] == "alumno"){
                header('Location: vista-alumno.php');
            }else{
                header('Location: iniciarsesion.php?error=Usuario o contraseña incorrectos');
            }
            var_dump($_SESSION);
        }else{
            header('Location: iniciarsesion.php?error=Usuario no registrado');
        }
    }

?>