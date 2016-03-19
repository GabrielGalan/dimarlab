<?php
include ("clase.php");

error_reporting(E_ALL^E_NOTICE);

class clSalud 
{
	public function insert($nombreInstitucion, $claveSalud, $descripcionSalud) 
	{
		$oConexion = new conectorDB;
		$registrar = false;
		$query  = "INSERT INTO tbl_salud(nombreInstitucion, claveSalud, descripcionSalud)
                    VALUES (:nombreInstitucion, :claveSalud, :descripcionSalud)";
		$valores = array(
			"nombreInstitucion"		=> $nombreInstitucion,
			"claveSalud"			=> $claveSalud,
			"descripcionSalud"		=> $descripcionSalud);
			
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
		
	public function update($nombreInstitucion, $claveSalud, $descripcionSalud,$idSalud) 
	{
		$oConexion 	= new conectorDB;
		$registrar 	= false;
		$query  	= "UPDATE tbl_salud SET nombreInstitucion=:nombreInstitucion, claveSalud=:claveSalud, 				descripcionSalud=:descripcionSalud WHERE id=:idSalud";
		
		$valores 	= array(
			"nombreInstitucion"		=> $nombreInstitucion,
			"claveSalud"			=> $claveSalud,
			"descripcionSalud"		=> $descripcionSalud,
			"idSalud"				=> $idSalud);
			
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
	
	public function delete($idSalud) 
	{
		$oConexion 	= new conectorDB;
		$registrar 	= false;
		$query  	= "DELETE FROM tbl_salud WHERE id=:idSalud";
		
		$valores 	= array(
			"idSalud"	=> $idSalud);
			
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