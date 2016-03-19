<?php
include ("clProducto.php");

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
$claveInstitucion  		 = $_POST["claveInstitucion"];
$descripcionInstitucion	 = $_POST["descripcionInstitucion"];
$idInstitucion			 = $_POST["institucion"];
$idProveedor 			 = $_POST["proveedor"];
$terminado 				 = 1;
$idMarca 				 = $_POST["marca"];
$idProveedor 			 = $_POST["proveedor"];
$img 					 = $_FILES["imagenes"];


$clProcuto  = new clProducto;
$registro = $clProcuto->insert($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $idInstitucion, $idProveedor, $terminado,$descripcionInstitucion,$claveInstitucion,$idMarca,$idProveedor,$img,$descripcionImagen);
		


	if ($registrar !== false) 
	{
		return true;
		$oConexion = null;
	} 
	else 
	{
		return false;
	}
		echo " <SCRIPT LANGUAGE='javascript'>"
		."    location.href = '../../administrador.php';"
		."    </SCRIPT>"
		."";

?>