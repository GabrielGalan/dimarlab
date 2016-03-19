<?php
include ("clase.php");

error_reporting(E_ALL^E_NOTICE);

class clProducto 
{
	public function insert($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $idInstitucion, $idProveedor, $terminado,$descripcionInstitucion,$claveInstitucion,$idMarca,$idProveedor,$img,$descImg) 
		{
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
						
			$clProducto = new clProducto;
			$idProducto = $clProducto->getMax();
			$clProducto->insertarDebilesProductos($claveInstitucion,$descripcionInstitucion,$idInstitucion,$idProducto,$idMarca,$idProveedor);
			$clProducto->insertImg($img,$descImg,$idProducto);
		}
		
	public function update($nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $idInstitucion, $idProveedor, $terminado,$descripcionInstitucion,$claveInstitucion,$idProducto,$idMarca,$idProveedor) 
		{
		
		$oConexion = new conectorDB;
		$registrar = false;
		$query  = "UPDATE producto SET nomComercial=:nomComercial, codigoBarra=:codigoBarra, codigoReferencia=:codigoReferencia, observacion=:observacion, claveCuadroBasico=:claveCuadroBasico, descripcionCuadroBasico=:descripcionCuadroBasico,terminado=:terminado WHERE idProducto=:idProducto";
		$valores = array(
			"nomComercial"            => $nombreComercial,
			"codigoBarra"             => $codigoBarra,
			"codigoReferencia"        => $codigoReferencia,
			"observacion"             => $observacion,
			"claveCuadroBasico"       => $claveCuadroBasico,
			"descripcionCuadroBasico" => $descripcionCuadroBasico,
			"terminado"               => $terminado,
			"idProducto"			  => $idProducto);
			
			$registrar = $oConexion->consultarBD($query, $valores);
			
			$clProducto = new clProducto;
			$clProducto->limpiarDebilesProductos($idProducto);
			$clProducto->insertarDebilesProductos($claveInstitucion,$descripcionInstitucion,$idInstitucion,$idProducto,$idMarca,$idProveedor);
		}
	
	public function delete($idProducto) 
		{
		
		$oConexion = new conectorDB;
		$registrar = false;
		 
		this.limpiarDebilesProductos($idProducto);
		/*EIMINAMOS DE PRODUCTOS*/
		$query  = "DELETE FROM producto WHERE idProducto=:idProducto";
		$valores = array(
			"idProducto"	=> $idProducto);
		$registrar = $oConexion->consultarBD($query, $valores);
		
		}
		
	public function limpiarDebilesProductos($idProducto) 
		{
		
		$oConexion = new conectorDB;
		$registrar = false;
		 
		 /*ELIMINAMOS DE PROVEEDORES*/
		$query = "DELETE FROM producto_proveedores WHERE idProducto=:idProducto)";
		$valoresProveedor = array(
			"idProducto"	=> $idProducto);
		$registrar = $oConexion->consultarBD($query, $valoresProveedor);
		
		/*ELIMINAMOS DE MARCAS*/
		$query = "DELETE FROM producto_marcas WHERE idProducto=:idProducto)";
		$valoresMarca = array(
			"idProducto"	=> $idProducto);		
		$registrar = $oConexion->consultarBD($query, $valoresMarca);
			
		/*ELIMINAMOS DE CLAVES-DESCRIPCIONES*/
		$query = "DELETE FROM clavesdescripciones idProducto=:idProducto)";
		$valoresMarca = array(
			"idProducto"	=> $idProducto);		
		$registrar = $oConexion->consultarBD($query, $valoresMarca);
		
		/*EIMINAMOS DE PRODUCTOS*/
		$query  = "DELETE FROM producto WHERE idProducto=:idProducto";
		$valores = array(
			"idProducto"	=> $idProducto);
		$registrar = $oConexion->consultarBD($query, $valores);
		
		}
		
		/*idMarca y idProveedor deben ser arreglos*/
	public function insertarDebilesProductos($claveInstitucion,$descripcionInstitucion,$idInstitucion,$idProducto,$idMarca,$idProveedor)
	{
		$oConexion = new conectorDB;
		$registrar = false;
		/*
			SE INSERTA LOS VALORES DE CLAVES-DESCRIPCIONES
		*/ 
			$insertClaveDesc = "INSERT INTO clavesdescripciones(claveInstitucion, descripcionInstitucion, idInstitucion,idProducto)
						VALUES (:claveInstitucion, :descripcionInstitucion, :idInstitucion,:idProducto)";
			$valoresMarca = array(
				"claveInstitucion"			=> $claveInstitucion,
				"descripcionInstitucion"	=> $descripcionInstitucion,
				"idInstitucion"				=> $idInstitucion,
				"idProducto"				=> $idProducto);		
			$registrar = $oConexion->consultarBD($insertClaveDesc, $valoresMarca);

		/*
			SE INSERTA LOS VALORES DE MARCAS EN PRODUCTO_MARCAS
		*/ 
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
		for ($i=0;$i<count($idProveedor);$i++)    
		{     
		$insertaProveedor = "INSERT INTO producto_proveedores(idProducto, idProveedor)
                    VALUES (:idProducto,:idProveedor)";
		$valoresProveedor = array(
			"idProducto"	=> $idProducto,
			"idProveedor"	=> $idProveedor[$i]);
		$registrar = $oConexion->consultarBD($insertaProveedor, $valoresProveedor);
		}
	}
	public function insertImg($img,$descripcion,$idProducto) 
	{
		if ($img["name"] != null) 
		{
			$ruta     = 'imagenes';
			$tmp_name = $img['tmp_name'];
			$name     = $img["name"];
			
			$fileParts = pathinfo($img['name']);
			move_uploaded_file($tmp_name, "$ruta/$name");
			$direccion = utf8_encode("controller/php/".$ruta."/".$name);
		} 
		else 
		{
			$direccion = null;
		}

		/*
			SE INSERTAN LOS VALORES DE IMAGENES DE PRODUCTOS
		*/
				$oConexion = new conectorDB;
		$registrar = false;
		$insertaFoto = "INSERT INTO imagen(idProducto, direccion, tituloFoto)
                    VALUES (:idProducto, :direccion, :tituloFoto)";
		$valoresFoto = array(
			"direccion"  => $direccion,
			"tituloFoto" => $descripcion,
			"idProducto" => $idProducto);
		$registrar = $oConexion->consultarBD($insertaFoto, $valoresFoto);	
	}
		
	public function getMax() 
	{
		/* 
			SE BUSCA EL ULTIMO REGISTRO INSERTADO PARA OBTENER EL IDPRODUCTO 
			PARA INSERTAR EN LAS DEMAS TABLAS DE MUCHOS A MUCHOS
		*/
		$oConexion = new conectorDB;
		$idAgregado = "SELECT MAX(idProducto) as idProducto FROM producto";
		$Vconsulta  = $oConexion->consultarBD($idAgregado);
		foreach ($Vconsulta as $rows) 
		{
			$idProducto = $rows['idProducto'];
		}
		return $idProducto;
	}
}
?>