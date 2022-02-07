<?php
    session_start();
    require "conexion.php";
    if(isset($_POST["entregado"])){
        $sql = "SELECT * FROM `entregas` WHERE id_tarea = ".$_POST["id_tarea"]." AND email = '".$_POST["email"]."'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $firstrow = $result->fetch_assoc();
        if (file_exists($firstrow["documento"])) {
            unlink($firstrow["documento"]); //eliminar
            
        }
        $sql = "DELETE FROM entregas WHERE id_tarea = ".$_POST["id_tarea"]." AND email = '".$_POST["email"]."'" ;
        $conn->query($sql); //aquí se borra en la bbdd
    }

    $target_dir = "entregas/"; //directorio para tareas
    $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
    $extension  = pathinfo( $_FILES["documento"]["name"], PATHINFO_EXTENSION ); // jpg
    $basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

    $source       = $_FILES["documento"]["tmp_name"];
    $destination  = "entregas/{$basename}";

    /* move the file */
    if(move_uploaded_file( $source, $destination)){
        $sql = "INSERT INTO `entregas`(`id_tarea`, `email`, `anotacion`, `documento`) VALUES (".$_POST["id_tarea"].",'".$_POST["email"]."','".$_POST["anotacion"]."', '".$destination."')";
        if ($conn->query($sql) === TRUE) {
            header('Location: vista-alumno.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        header('Location: vista-alumno.php?mensaje=Ha habido un problema subiendo tu fichero');
    }

?>