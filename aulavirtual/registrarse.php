<?php
    require "conexion.php";

    if ($conn->connect_error) {
        die("Fallo de conexion: " . $conn->connect_error);
    }

    if(isset($_POST["email"])){
        $sql = "insert into usuarios (nombre, apellidos, telefono, email, contraseña, curso) values ('".$_POST["nombre"]."', '".$_POST["apellidos"]."', 
        ".$_POST["telefono"].", '".$_POST["email"]."', '".password_hash($_POST["contraseña"],PASSWORD_BCRYPT)."', '".$_POST["curso"]."')";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: iniciarsesion.php');
    } else {
        header('Location: registro.php?error=El usuario ya está siendo utilizado, lo sentimos');
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>