<<<<<<< HEAD
<?php
include ("clase.php");

error_reporting(E_ALL^E_NOTICE);
$idProducto 			 = $_POST["idProducto"];
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
$registro = $inserta->actualizar($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $idSalud, $idProveedor, $terminado,$idProducto);


class Guardar {
	public function actualizar($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $idSalud, $idProveedor, $terminado,$idProducto) {
		
		$oConexion = new conectorDB;
		$registrar = false;
		$consulta  = "UPDATE producto SET nomComercial =:nomComercial, codigoBarra=:codigoBarra, codigoReferencia=:codigoReferencia, observacion=:observacion, claveCuadroBasico=:claveCuadroBasico, descripcionCuadroBasico=:descripcionCuadroBasico,terminad=:terminadoo,idSalud=:idSalud WHERE idProducto = :idProducto";
		$valores = array(
			"nomComercial"            => $nombreComercial,
			"codigoBarra"             => $codigoBarra,
			"codigoReferencia"        => $codigoReferencia,
			"observacion"             => $observacion,
			"claveCuadroBasico"       => $claveCuadroBasico,
			"descripcionCuadroBasico" => $descripcionCuadroBasico,
			"terminado"               => $terminado,
			"idSalud" 				  => $idSalud,
			"idProducto" 			  => $idProducto);
			
			$registrar = $oConexion->consultarBD($consulta, $valores);

		/*
			SE INSERTA LOS VALORES DE MARCAS EN PRODUCTO_MARCAS
		*/ 
		for ($i=0;$i<count($idMarca);$i++)    
		{     
			$deleteProductoMarca = "DELETE FROM producto_marcas WHERE idProducto=:idProducto";
			$valoresMarca = array(
				"idProducto"	=> $idProducto);		
			$registrar = $oConexion->consultarBD($deleteProductoMarca, $valoresMarca);
		} 
		
		$idMarca = $_POST["marca"];
		for ($i=0;$i<count($idMarca);$i++)    
		{     
			$insertProductoMarca = "INSERT INTO producto_marcas(idProducto, idSalud, idMarca)
						VALUES (:idProducto, :idSalud, :idMarca)";
			$valoresMarca = array(
				"idProducto"	=> $idProducto,
				"idSalud"		=> $idSalud,
				"idMarca"		=> $idMarca[$i]);		
			$registrar = $oConexion->consultarBD($insertProductoMarca, $valoresMarca);
		}    		
		/*
			SE INSERTA LOS VALORES DE MARCAS EN PRODUCTO_PROVEEDORES
		*/
		
		for ($i=0;$i<count($idProveedor);$i++)    
		{     
		$deleteProveedor = "DELETE FROM producto_proveedores WHERE idProducto=:idProducto";
		$valoresProveedor = array(
			"idProducto"	=> $idProducto);
		$registrar = $oConexion->consultarBD($deleteProveedor, $valoresProveedor);
		}
		
		$idProveedor = $_POST["proveedor"];
		for ($i=0;$i<count($idProveedor);$i++)    
		{     
		$insertaProveedor = "INSERT INTO producto_proveedores(idProducto, idSalud, idProveedor)
                    VALUES (:idProducto,:idSalud,:idProveedor)";
		$valoresProveedor = array(
			"idProducto"	=> $idProducto,
			"idSalud"		=> $idSalud,
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
=======
<?php
include ("clase.php");

error_reporting(E_ALL^E_NOTICE);
$idProducto 			 = $_POST["idProducto"];
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
$registro = $inserta->actualizar($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $idSalud, $idProveedor, $terminado,$idProducto);


class Guardar {
	public function actualizar($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $idSalud, $idProveedor, $terminado,$idProducto) {
		
		$oConexion = new conectorDB;
		$registrar = false;
		$consulta  = "UPDATE producto SET nomComercial =:nomComercial, codigoBarra=:codigoBarra, codigoReferencia=:codigoReferencia, observacion=:observacion, claveCuadroBasico=:claveCuadroBasico, descripcionCuadroBasico=:descripcionCuadroBasico,terminad=:terminadoo,idSalud=:idSalud WHERE idProducto = :idProducto";
		$valores = array(
			"nomComercial"            => $nombreComercial,
			"codigoBarra"             => $codigoBarra,
			"codigoReferencia"        => $codigoReferencia,
			"observacion"             => $observacion,
			"claveCuadroBasico"       => $claveCuadroBasico,
			"descripcionCuadroBasico" => $descripcionCuadroBasico,
			"terminado"               => $terminado,
			"idSalud" 				  => $idSalud,
			"idProducto" 			  => $idProducto);
			
			$registrar = $oConexion->consultarBD($consulta, $valores);

		/*
			SE INSERTA LOS VALORES DE MARCAS EN PRODUCTO_MARCAS
		*/ 
		for ($i=0;$i<count($idMarca);$i++)    
		{     
			$deleteProductoMarca = "DELETE FROM producto_marcas WHERE idProducto=:idProducto";
			$valoresMarca = array(
				"idProducto"	=> $idProducto);		
			$registrar = $oConexion->consultarBD($deleteProductoMarca, $valoresMarca);
		} 
		
		$idMarca = $_POST["marca"];
		for ($i=0;$i<count($idMarca);$i++)    
		{     
			$insertProductoMarca = "INSERT INTO producto_marcas(idProducto, idSalud, idMarca)
						VALUES (:idProducto, :idSalud, :idMarca)";
			$valoresMarca = array(
				"idProducto"	=> $idProducto,
				"idSalud"		=> $idSalud,
				"idMarca"		=> $idMarca[$i]);		
			$registrar = $oConexion->consultarBD($insertProductoMarca, $valoresMarca);
		}    		
		/*
			SE INSERTA LOS VALORES DE MARCAS EN PRODUCTO_PROVEEDORES
		*/
		
		for ($i=0;$i<count($idProveedor);$i++)    
		{     
		$deleteProveedor = "DELETE FROM producto_proveedores WHERE idProducto=:idProducto";
		$valoresProveedor = array(
			"idProducto"	=> $idProducto);
		$registrar = $oConexion->consultarBD($deleteProveedor, $valoresProveedor);
		}
		
		$idProveedor = $_POST["proveedor"];
		for ($i=0;$i<count($idProveedor);$i++)    
		{     
		$insertaProveedor = "INSERT INTO producto_proveedores(idProducto, idSalud, idProveedor)
                    VALUES (:idProducto,:idSalud,:idProveedor)";
		$valoresProveedor = array(
			"idProducto"	=> $idProducto,
			"idSalud"		=> $idSalud,
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
		echo " <SCRIPT LANGUAGE='javascript'>"
		."    location.href = '../../administrador.php';"
		."    </SCRIPT>"
		."";

>>>>>>> master
?>