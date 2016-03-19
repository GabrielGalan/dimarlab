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
$terminado = 1;

/*if ($checkboxSuccess != null or $checkboxSuccess != "") {
	$terminado = $checkboxSuccess;
} elseif ($checkboxError != null or $checkboxError != "") {
	$terminado = $checkboxError;
} else {
	$terminado = "";
}*/

/*if ($_POST["marca"] != null or $_POST["marca"] != "") {
	$idMarca = $_POST["marca"];
	$idMarca  = implode(", ", $idMarca);
} else {
	$idMarca = "";
}*/
//$idMarca	= $_POST["marca"];

$idSalud	= $_POST["salud"];

$idProveedor = $_POST["proveedor"];

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
$registro = $inserta->registrar($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $idSalud, $idProveedor, $terminado);


class Guardar {
	public function registrar($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $idSalud, $idProveedor, $terminado) {
		
		$oConexion = new conectorDB;
		$registrar = false;
		$consulta  = "INSERT INTO producto(nomComercial, codigoBarra, codigoReferencia, observacion, claveCuadroBasico, descripcionCuadroBasico,terminado)
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

		/* 
			SE BUSCA EL ULTIMO REGISTRO INSERTADO PARA OBTENER EL IDPRODUCTO 
			PARA INSERTAR EN LAS DEMAS TABLAS DE MUCHOS A MUCHOS
		 */
		$idAgregado = "SELECT MAX(idProducto) as idProducto FROM producto";
		$Vconsulta  = $oConexion->consultarBD($idAgregado);
		foreach ($Vconsulta as $rows) {
			$idProducto = $rows['idProducto'];
		}

		/*
			SE INSERTA LOS VALORES DE MARCAS EN PRODUCTO_MARCAS
		*/ 
		$idMarca = $_POST["marca"];
		for ($i=0;$i<count($idMarca);$i++)    
		{     
			$insertProductoMarca = "INSERT INTO producto_marcas(idProducto, idMarca)
						VALUES (:idProducto, :idMarca)";
			$valoresMarca = array(
				"idProducto"	=> $idProducto,
				"idMarca"		=> $idMarca[$i]);		
			$registrar = $oConexion->consultarBD($insertProductoMarca, $valoresMarca);
		}    		
		/*
			SE INSERTA LOS VALORES DE MARCAS EN PRODUCTO_PROVEEDORES
		*/
		$idProveedor = $_POST["proveedor"];
		for ($i=0;$i<count($idProveedor);$i++)    
		{     
		$insertaProveedor = "INSERT INTO producto_proveedores(idProducto, idProveedor)
                    VALUES (:idProducto,:idProveedor)";
		$valoresProveedor = array(
			"idProducto"	=> $idProducto,
			"idProveedor"	=> $idProveedor[$i]);
		$registrar = $oConexion->consultarBD($insertaProveedor, $valoresProveedor);
		}
		
		/*
			SE INSERTAN LOS VALORES DE IMAGENES DE PRODUCTOS
		*/
		$insertaFoto = "INSERT INTO imagen(idProducto, direccion, tituloFoto)
                    VALUES (:idProducto, :direccion, :tituloFoto)";
		$valoresFoto = array(
			"idProducto" => $idProducto,
			"direccion"  => $direccion,
			"tituloFoto" => $descripcionImagen);
		$registrar = $oConexion->consultarBD($insertaFoto, $valoresFoto);
		
		if ($registrar !== false) 
		{
			return true;
			$oConexion = null;
		} 
		else 
		{
			return false;
		}
		
	}
}
/*		echo " <SCRIPT LANGUAGE='javascript'>"
		."    location.href = '../../administrador.php';"
		."    </SCRIPT>"
		."";
*/
?>