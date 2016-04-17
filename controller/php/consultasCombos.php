<?php
header('content-type: application/json; charset=utf-8');
//en caso de json en vez de jsonp habría que habilitar CORS:
header("access-control-allow-origin: *");

		include 'clase.php';
		function selectMarcas()
		{
			$Conexion = new conectorDB;
			$query  = "SELECT * FROM marcas m;";
			$Result  = $Conexion->consultarBD($query);
			$cont = count($Result)-1;
			
			$stringJSON='';
			foreach ($Result as $i=>$rows) 
			{
				$stringJSON.='{"id":'.$rows["id"].',"marca":"'.$rows["marca"].'"}';
				if($cont!=$i)
				{
					$stringJSON.=',';
				}
			}
			$stringJSON.='';
			echo $stringJSON;
		}
		
		function selectInstituciones()
		{
			$Conexion = new conectorDB;
			$query  = "SELECT * FROM instituciones i;";
			$Result  = $Conexion->consultarBD($query);
			$cont = count($Result)-1;
			
			$stringJSON='{"datos":[';
			foreach ($Result as $i=>$rows) 
			{
				$stringJSON.='{"id":'.$rows["id"].',"nombre":"'.$rows["nombre"].'","direccion":"'.$rows["direccion"].'","telefono":"'.$rows["telefono"].'"}';
				if($cont!=$i)
				{
					$stringJSON.=',';
				}
			}
			$stringJSON.=']}';
			return $stringJSON;
		}
		
		function selectProovedores()
		{
			$Conexion = new conectorDB;
			$query  = "SELECT * FROM proveedores p;";
			$Result  = $Conexion->consultarBD($query);
			$cont = count($Result)-1;
			
			$stringJSON='{"datos":[';
			foreach ($Result as $i=>$rows) 
			{
				$stringJSON.='{"id":'.$rows["id"].',"proveedor":"'.$rows["proveedor"].'"}';
				if($cont!=$i)
				{
					$stringJSON.=',';
				}
			}
			$stringJSON.=']}';
			return $stringJSON;
		}
?>