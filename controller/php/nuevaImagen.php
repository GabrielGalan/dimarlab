<?php
include ("clase.php");
//error_reporting(E_ALL ^ E_NOTICE);
$idProducto        = $_POST['idProducto'];
$descripcionImagen = $_POST['descripcionImagen'];

if ($_FILES["imagenes"]["name"] != null) {
	$ruta      = 'imagenes';
	$tmp_name  = $_FILES['imagenes']['tmp_name'];
	$name      = $_FILES["imagenes"]["name"];
	$fileParts = pathinfo($_FILES['imagenes']['name']);
	move_uploaded_file($tmp_name, "$ruta/$name");
	$direccion         = utf8_encode("controller/php/".$ruta."/".$name);
} else { $direccion = null;}

$inserta  = new Guardar;
$registro = $inserta->registrar($idProducto, $direccion, $descripcionImagen);
class Guardar {
	public function registrar($idProducto, $direccion, $descripcionImagen) {

		$oConexion   = new conectorDB;
		$registrar   = false;
		$insertaFoto = "INSERT INTO imagen(idProducto, direccion, tituloFoto)
                    VALUES (:idProducto, :direccion, :tituloFoto)";
		$valoresFoto = array(
			"idProducto" => $idProducto,
			"direccion"  => $direccion,
			"tituloFoto" => $descripcionImagen);
		$registrar = $oConexion->consultarBD($insertaFoto, $valoresFoto);

		if ($registrar !== false) {
			return true;
			$oConexion = null;
		} else {
			return false;
		}
	}
}
echo " <SCRIPT LANGUAGE='javascript'>"
."    location.href = '../../administrador.php';"
."    </SCRIPT>"
."";

?>