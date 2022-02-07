<?php
    require "conexion.php";

    if(isset($_POST["id"])){
        $sql = "UPDATE entregas SET anotacion = '".$_POST["anotacion"]."', nota = ".$_POST["nota"]." WHERE id = ".$_POST["id"]."";

        if ($conn->query($sql) === TRUE) {
            header('Location: vista-profesor.php?mensaje=Entrega calificada correctamente');
        } else {
            header('Location: vista-profesor.php?mensaje=No se ha podido calificar la entrega');
        }
    
        $conn->close();
    }
?>