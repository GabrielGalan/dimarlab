<?php
include ("clase.php");

error_reporting(E_ALL^E_NOTICE);

class clInstitucion 
{
	public function insert($nombre, $direccion, $telefono) 
	{
		$oConexion = new conectorDB;
		$registrar = false;
		$query  = "INSERT INTO instituciones(nombre, direccion, telefono)
                    VALUES (:nombre, :direccion, :telefono)";
		$valores = array(
			"nombre"		=> $nombre,
			"direccion"		=> $direccion,
			"telefono"		=> $telefono);
			
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
		
	public function update($nombre, $direccion, $telefono,$id) 
	{
		$oConexion 	= new conectorDB;
		$registrar 	= false;
		$query  	= "UPDATE instituciones SET nombre=:nombre, direccion=:direccion, 				telefono=:telefono WHERE id=:id";
		
		$valores 	= array(
			"nombre"		=> $nombre,
			"direccion"		=> $direccion,
			"telefono"		=> $telefono,
			"id"			=> $id);
			
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
	
	public function delete($id) 
	{
		$oConexion 	= new conectorDB;
		$registrar 	= false;
		$query  	= "DELETE FROM instituciones WHERE id=:id";
		
		$valores 	= array(
			"id"	=> $id);
			
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