<?php
require("conexion.php");
    if(isset($_POST["id"])){
        $sql = "UPDATE tareas SET titulo = '".$_POST["titulo"]."', descripcion = '".$_POST["descripcion"]."', fecha = '".$_POST["fecha"]."' WHERE id = ".$_POST["id"];

        if ($conn->query($sql) === TRUE) {
            header('Location: vista-profesor.php?mensaje=Tarea editada correctamente');
        } else {
            header('Location: vista-profesor.php?mensaje=No se ha podido editar la tarea');
        }
      
    $conn->close();
}

?>