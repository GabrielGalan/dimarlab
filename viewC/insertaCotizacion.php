<?php

include '../controller/php/clase.php';

error_reporting(E_ALL^E_NOTICE);
$estatus   = "0";
$nProducto = $_POST['nProducto'];
$nContacto = $_POST['nContacto'];
$nEmpresa  = $_POST['nEmpresa'];
$precio    = $_POST['precio'];
$telefono  = $_POST['telefono'];
$direccion = $_POST['direccion'];
$marca     = $_POST['marca'];
$correo    = $_POST['correo'];
$imagen    = $_POST['imagen'];

$oConexion = new conectorDB;
$insert    = "INSERT INTO tbl_cotizacion (estatus, nombreProducto, nombreContacto, empresa, precio, telefono, direccion, marca, correo, imagen, fecha) VALUES ('$estatus', '$nProducto', '$nContacto', '$nEmpresa', '$precio', '$telefono', '$direccion','$marca', '$correo','$imagen', NOW())";

$registrar = $oConexion->consultarBD($insert);

?>