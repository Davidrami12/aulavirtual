<?php
    require "conexion.php";

    if ($conn->connect_error) {
        die("Fallo de conexion: " . $conn->connect_error);
    }

    $sql = "SELECT nombre, apellidos, rol, contraseña, curso FROM usuarios WHERE curso = '".$_POST["curso"]."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        if($_SESSION["curso"] == "DAW"){
            header('Location: daw.php');
        }else if($_SESSION["curso"] == "DAM"){
            header('Location: dam.php');
        }else if($_SESSION["curso"] == "ASIR"){
            header('Location: asir.php');
        }else{
            header('Location: vista-alumno.php');
        }
    
        var_dump($_SESSION);
    }else{
        header('Location: iniciarsesion.php?error=Usuario o contraseña incorrectos');
    }
?>