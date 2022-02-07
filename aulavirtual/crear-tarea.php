<?php
    require("conexion.php");
    $sql = "INSERT INTO tareas (titulo, descripcion, fecha, asignatura) VALUES ('".$_POST["titulo"]."','".$_POST["descripcion"]."','".$_POST["fecha"]."', '".$_POST["asignatura"]."')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: vista-profesor.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        
    $conn->close();
?>
