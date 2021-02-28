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
//echo $mysqli->host_info . "\n";
$nombre = utf8_decode($_POST['nombre']);
$correo = utf8_decode($_POST['correo']);
$telefono = utf8_decode($_POST['tel']);
$colonia = utf8_decode($_POST['col']);
$id = 78;
/*echo $nombre;
echo $correo;
echo $telefono;
echo $colonia;
*/

$query = "INSERT INTO clientes(nombre_cliente,direccion_cliente,email,telefono) VALUES (?,?,?,?)";

$stmt = $mysqli-> prepare($query);
$stmt -> bind_param("sssi",$nombre,$colonia,$correo,$telefono);

$stmt -> execute();
//mysqli_query($mysqli, $query);
printf ("Nuevo registro con el id %d.\n", mysqli_insert_id($mysqli));


/* close connection */
mysqli_close($mysqli);
?>