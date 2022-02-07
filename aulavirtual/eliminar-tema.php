<?php
    require("conexion.php");
    if(isset($_GET["id"])){
        $sql = "DELETE FROM temas WHERE id = ".$_GET["id"];

        if ($conn->query($sql) === TRUE) {
            header('Location: vista-profesor.php?mensaje=Tema eliminado correctamente');
        } else {
            header('Location: vista-profesor.php?mensaje=No se ha podido eliminar el tema');
        }
          
        $conn->close();
    }
?>