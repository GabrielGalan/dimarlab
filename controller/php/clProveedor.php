<?php
include ("clase.php");

error_reporting(E_ALL^E_NOTICE);

$nombreInstitucion 	= $_POST["nombreInstitucion"];
$claveSalud			= $_POST["claveSalud"];
$descripcionSalud	= $_POST["descripcionSalud"];

/*$inserta  = new clSalud;
$registro = $inserta->insert($nombreInstitucion, $claveSalud, $descripcionSalud);*/


class clProveedores 
{
	public function insert($proveedor) 
	{
		
		$oConexion = new conectorDB;
		$registrar = false;
		$query  = "INSERT INTO tbl_proveedores(proveedor)
                    VALUES (:proveedor)";
		$valores = array(
			"proveedor"		=> $proveedor);
			
			$registrar = $oConexion->consultarBD($query, $valores);
		
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
		
	public function update($proveedor, $idProveedor) 
	{
		$oConexion 	= new conectorDB;
		$registrar 	= false;
		$query  	= "UPDATE tbl_proveedores SET proveedor=:proveedor WHERE id=:idProveedor";
		
		$valores 	= array(
			"proveedor"		=> $proveedor,
			"idProveedor"	=> $idProveedor);
			
			$registrar = $oConexion->consultarBD($query, $valores);
		
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
	
	public function delete($idProveedor) 
	{
		$id_salud	= $_POST["idSalud"];
		$oConexion 	= new conectorDB;
		$registrar 	= false;
		$query  	= "DELETE FROM tbl_proveedores WHERE id=:idProveedor";
		
		$valores 	= array(
			"idProveedor"	=> $idProveedor);
			
			$registrar = $oConexion->consultarBD($query, $valores);
		
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
?>