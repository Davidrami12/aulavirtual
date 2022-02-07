<?php
    require("conexion.php");
    $sql = "INSERT INTO temas (titulo, descripcion) VALUES ('".$_POST["titulo"]."','".$_POST["descripcion"]."')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: vista-profesor.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
        
    $conn->close();
?>