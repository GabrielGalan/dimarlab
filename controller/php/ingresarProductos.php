<?php
include ("clase.php");

error_reporting(E_ALL^E_NOTICE);
$nombreComercial         = $_POST["nombreComercial"];
$codigoBarra             = $_POST["codigoBarra"];
$codigoReferencia        = $_POST["codigoReferencia"];
$observacion             = $_POST["observacion"];
$claveCuadroBasico       = $_POST["claveCuadroBasico"];
$descripcionCuadroBasico = $_POST["descripcionCuadroBasico"];
$descripcionImagen       = $_POST["descripcionImagen"];
$checkboxSuccess         = $_POST["checkboxSuccess"];
$checkboxError           = $_POST["checkboxError"];

if ($checkboxSuccess != null or $checkboxSuccess != "") {
	$terminado = $checkboxSuccess;
} elseif ($checkboxError != null or $checkboxError != "") {
	$terminado = $checkboxError;
} else {
	$terminado = "";
}

if ($_POST["marca"] != null or $_POST["marca"] != "") {
	$marcas = $_POST["marca"];
	$marca  = implode(", ", $marcas);
} else {
	$marca = "";
}

$salud            = $_POST["salud"];
$claveSalud       = $_POST["claveSalud"];
$descripcionSalud = $_POST["descripcionSalud"];

$proveedor = $_POST["proveedor"];

if ($_FILES["imagenes"]["name"] != null) {
	$ruta     = 'imagenes';
	$tmp_name = $_FILES['imagenes']['tmp_name'];
	$name     = $_FILES["imagenes"]["name"];

	$fileParts = pathinfo($_FILES['imagenes']['name']);
	move_uploaded_file($tmp_name, "$ruta/$name");
	$direccion = utf8_encode("controller/php/".$ruta."/".$name);

} else {
	$direccion = null;
}

$inserta  = new Guardar;
$registro = $inserta->registrar($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $marca, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $salud, $claveSalud, $descripcionSalud, $proveedor, $terminado);

class Guardar {
	public function registrar($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $marca, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $salud, $claveSalud, $descripcionSalud, $proveedor, $terminado) {

		$oConexion = new conectorDB;
		$registrar = false;
		$consulta  = "INSERT INTO producto(nomComercial, codigoBarra, codigoReferencia, observacion, claveCuadroBasico, descripcionCuadroBasico, terminado)
                    VALUES (:nomComercial, :codigoBarra, :codigoReferencia, :observacion, :claveCuadroBasico, :descripcionCuadroBasico, :terminado)";
		$valores = array(
			"nomComercial"            => $nombreComercial,
			"codigoBarra"             => $codigoBarra,
			"codigoReferencia"        => $codigoReferencia,
			"observacion"             => $observacion,
			"claveCuadroBasico"       => $claveCuadroBasico,
			"descripcionCuadroBasico" => $descripcionCuadroBasico,
			"terminado"               => $terminado);

		$registrar = $oConexion->consultarBD($consulta, $valores);

		$idAgregado = "SELECT MAX(idProducto) as idProducto FROM producto";
		$Vconsulta  = $oConexion->consultarBD($idAgregado);
		foreach ($Vconsulta as $rows) {
			$idAgregadoNuevo = $rows['idProducto'];
		}

		// SE INSERTA LOS VALORES DE MARCAS

		$insertaMarca = "INSERT INTO tbl_marca(idProducto, marca)
                    VALUES (:idProducto, :marca)";
		$valoresMarca = array(
			"idProducto" => $idAgregadoNuevo,
			"marca"      => $marca);
		$registrar = $oConexion->consultarBD($insertaMarca, $valoresMarca);

		// VAOLORES DE PROVEEDORES DE PRODUCTOS

		$insertaProveedor = "INSERT INTO tbl_proveedores(idProducto, proveedor)
                    VALUES (:idProducto, :proveedor)";
		$valoresProveedor = array(
			"idProducto" => $idAgregadoNuevo,
			"proveedor"  => $proveedor);
		$registrar = $oConexion->consultarBD($insertaProveedor, $valoresProveedor);

		// SE INSERTA LOS VALORES DEL SECTOR SALUD

		$insertaSalud = "INSERT INTO tbl_salud(idProducto, nombreInstitucion, claveSalud, descripcionSalud)
                    VALUES (:idProducto, :nombreInstitucion, :claveSalud, :descripcionSalud)";
		$valoresSalud = array(
			"idProducto"        => $idAgregadoNuevo,
			"nombreInstitucion" => $salud,
			"claveSalud"        => $claveSalud,
			"descripcionSalud"  => $descripcionSalud);
		$registrar = $oConexion->consultarBD($insertaSalud, $valoresSalud);

		// SE INSERTAN LOS VALORES DE IMAGENES DE PRODUCTOS

		$insertaFoto = "INSERT INTO imagen(idProducto, direccion, tituloFoto)
                    VALUES (:idProducto, :direccion, :tituloFoto)";
		$valoresFoto = array(
			"idProducto" => $idAgregadoNuevo,
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