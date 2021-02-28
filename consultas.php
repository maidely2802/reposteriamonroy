<?php
$mysqli = new mysqli("localhost", "root", "", "minisuper_vale");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

$mysqli = new mysqli("127.0.0.1", "root", "", "minisuper_vale", 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$clientes = utf8_decode($_POST['clientes']);
$empleados = utf8_decode($_POST['empleados']);
$productos = utf8_decode($_POST['productos']);
$proveedores = utf8_decode($_POST['proveedores']);
$ventas = utf8_decode($_POST['ventas']);

if ($clientes != "" && $empleados =="" &&$productos=="" &&$proveedores==""&&$ventas=="") {
	$consulta = "SELECT nombre_cliente FROM clientes WHERE id_cliente = '$clientes'";
	if ($resultado = $mysqli->query($consulta)) {

	    /* obtener el array de objetos */
	    while ($fila = $resultado->fetch_row()) {
	        printf ("%s\n", $fila[0]);
	    }

	    /* liberar el conjunto de resultados */
	    $resultado->close();
	    /* cerrar la conexión */
		$mysqli->close();
	}
}else if ($clientes == "" && $empleados !=""&&$productos==""&&$proveedores==""&&$ventas=="") {
	$consulta = "SELECT nombre_empleado FROM empleados WHERE id_empleado = '$empleados'";
		if ($resultado = $mysqli->query($consulta)) {

    /* obtener el array de objetos */
    while ($fila = $resultado->fetch_row()) {
        printf ("%s\n", $fila[0]);
    }

    /* liberar el conjunto de resultados */
    $resultado->close();
	}
}if ($clientes == "" && $empleados ==""&&$productos!=""&&$proveedores==""&&$ventas=="") {
	$consulta = "SELECT nombre_producto FROM productos WHERE id_producto = '$productos'";
			if ($resultado = $mysqli->query($consulta)) {

		    /* obtener el array de objetos */
		    while ($fila = $resultado->fetch_row()) {
		        printf ("%s\n", $fila[0]);
		    }

		    /* liberar el conjunto de resultados */
		    $resultado->close();
		/* cerrar la conexión */
		$mysqli->close();
		}
}if ($clientes == "" && $empleados ==""&&$productos==""&&$proveedores!=""&&$ventas=="") {
	$consulta = "SELECT nombre_proveedor FROM proveedores WHERE id_proveedor = '$proveedores'";
				if ($resultado = $mysqli->query($consulta)) {

				    /* obtener el array de objetos */
				    while ($fila = $resultado->fetch_row()) {
				        printf ("%s\n", $fila[0]);
				    }

				    /* liberar el conjunto de resultados */
				    $resultado->close();
				
				/* cerrar la conexión */
				$mysqli->close();
			}
}if ($clientes == "" && $empleados ==""&&$productos==""&&$proveedores==""&&$ventas!="") {
	$consulta = "SELECT fecha_compra FROM ventas WHERE id_venta = '$ventas'";

				if ($resultado = $mysqli->query($consulta)) {

				    /* obtener el array de objetos */
				    while ($fila = $resultado->fetch_row()) {
				        printf ("%s\n", $fila[0]);
				    }

				    /* liberar el conjunto de resultados */
				    $resultado->close();
				
				/* cerrar la conexión */
				$mysqli->close();
				}
}else{
echo "Ningún campo esta seleccionado";
}


?>