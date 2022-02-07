<?php
    
    session_start();
    require "conexion.php";

    $basename   = basename($_FILES["documento"]["name"]);
            
    $source       = $_FILES["documento"]["tmp_name"];
    $destination  = "posts/{$basename}";

    /* move the file */
    if(move_uploaded_file( $source, $destination)){
        $sql = "INSERT INTO `posts`(`id_tema`, `titulo`, `documento`) VALUES (".$_POST["id_tema"].",'".$_POST["titulo"]."', '".$destination."')";
        if ($conn->query($sql) === TRUE) {
            header('Location: vista-profesor.php?mensaje=Post añadido correctamente');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        header('Location: vista-profesor.php?mensaje=Ha habido un problema creando tu post');
    }

?>