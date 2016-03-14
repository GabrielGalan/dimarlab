<?php
header('Content-Type: application/json');
include '../controller/php/clase.php';
error_reporting(E_ALL^E_NOTICE);

$oConectar    = new conectorDB;
$idCotizacion = $_POST['idCotizacion'];
$consulta     = "SELECT *FROM tbl_cotizacion WHERE estatus = '0' AND idCotizacion = '$idCotizacion '";

$Consulta = $oConectar->consultarBD($consulta);

foreach ($Consulta as $rows) {
	echo json_encode(array('nombreProducto' => $rows['nombreProducto'], 'nombreContacto' => $rows['nombreContacto'], 'empresa' => $rows['empresa'], 'precio' => $rows['precio'], 'telefono' => $rows['telefono'], 'direccion' => $rows['direccion'], 'marca' => $rows['marca'], 'correo' => $rows['correo'], 'fecha' => $rows['fecha']));
}
?>