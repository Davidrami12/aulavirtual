<?php
    require("conexion.php");
    
    if(isset($_GET["id"])){
        $sql = "DELETE FROM tareas WHERE id = ".$_GET["id"];

        if ($conn->query($sql) === TRUE) {
            header('Location: vista-profesor.php?mensaje=Tarea eliminada correctamente');
        } else {
            header('Location: vista-profesor.php?mensaje=No se ha podido eliminar la tarea');
        }
          
        $conn->close();
    }
?>