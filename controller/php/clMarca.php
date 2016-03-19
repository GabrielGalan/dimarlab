<<<<<<< HEAD
<?php
include ("clase.php");
error_reporting(E_ALL^E_NOTICE);

class clMarca 
{
	public function insert($marca) 
	{
		
		$oConexion = new conectorDB;
		$registrar = false;
		$query  = "INSERT INTO tbl_marca(marca)
                    VALUES (:marca)";
		$valores = array(
			"marca"		=> $marca);
			
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
		
	public function update($marca, $idMarca) 
	{
		$oConexion 	= new conectorDB;
		$registrar 	= false;
		$query  	= "UPDATE tbl_marca SET marca=:marca WHERE id = :idMarca";
		
		$valores 	= array(
			"marca"		=> $marca,
			"idMarca"	=> $idMarca);
			
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
	
	public function delete($idMarca) 
	{
		$oConexion 	= new conectorDB;
		$registrar 	= false;
		$query  	= "DELETE FROM tbl_marca WHERE id=:idMarca";
		
		$valores 	= array(
			"idMarca"	=> $idMarca);
			
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

=======
<?php
include ("clase.php");

error_reporting(E_ALL^E_NOTICE);

class clMarca 
{
	public function insert($marca) 
	{
		
		$oConexion = new conectorDB;
		$registrar = false;
		$query  = "INSERT INTO tbl_marca(marca)
                    VALUES (:marca)";
		$valores = array(
			"marca"		=> $marca);
			
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
		
	public function update($marca, $idMarca) 
	{
		$oConexion 	= new conectorDB;
		$registrar 	= false;
		$query  	= "UPDATE tbl_marca SET marca=:marca WHERE id = :idMarca";
		
		$valores 	= array(
			"marca"		=> $marca,
			"idMarca"	=> $idMarca);
			
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
	
	public function delete($idMarca) 
	{
		$oConexion 	= new conectorDB;
		$registrar 	= false;
		$query  	= "DELETE FROM tbl_marca WHERE id=:idMarca";
		
		$valores 	= array(
			"idMarca"	=> $idMarca);
			
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

>>>>>>> master
?>