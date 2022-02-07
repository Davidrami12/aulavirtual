<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

</head>
<body>
    <h3></h3>

    <?php

		$conexion = mysqli_connect("localhost", "root", "") or die("Error en la conexión".mysqli_error($conexion));
		mysqli_select_db($conexion, "tienda");

		$query = "UPDATE productos1
                    SET stock = stock + 20
                    WHERE cod_producto = (SELECT cod_producto
                                            FROM ventas1 
                                            WHERE unidades = (SELECT MAX(unidades)
                                                                FROM ventas1))";

		$resultado = mysqli_query($conexion, $query) or die("Error con la consulta:".mysqli_error($conexion));

		while ($fila = mysqli_fetch_row($resultado)) {
			foreach ($fila as $value) {
				print $value." ";
			}
		}

		mysqli_close($conexion);

		/*
			SOLUCIÓN
			
		*/
		
    ?>
            
</body>
</html>