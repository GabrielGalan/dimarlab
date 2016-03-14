<?php include '../controller/php/clase.php';
			
			$ds = $_GET['ds'];

	    	$oConectar = new conectorDB; 
	    	$consulta = "SELECT * FROM  tbl_salud where descripcionSalud LIKE '%$ds%' ";

	    	 $Consulta = $oConectar->consultarBD($consulta);  
	     ?>
<div class="table-responsive">
		  <table class="table">
		    <tr>
		    	<?php foreach ($Consulta as $rows){ 
	     	 	$consultaProducto = "SELECT * FROM producto where idProducto = '$rows[idProducto])'";
	     	 	$ConsultaRProducto = $oConectar->consultarBD($consultaProducto);  

	     	 		foreach ($ConsultaRProducto as $roww){
	     	 		}
	     	 	$consultaImagen = "SELECT * FROM imagen where idProducto = '$rows[idProducto])'";
	     	 			$ConsultaRImagen = $oConectar->consultarBD($consultaImagen);  

	     	 		foreach ($ConsultaRImagen as $row){}
		    	?>   
		    	<td>
			    	<div id="idProducto" onclick="buscarProducto(<?php print($rows['idProducto']);?>);" class="agregaP" style="cursor:pointer;">
			    		<img src="<?php print($row['direccion']);?>">
			    		<p id="pNombre"><?php print($roww['nomComercial']);?></p>
			    	</div>
		    	</td>
		    	<?php
		    		}
		    	?>
		    </tr>
		  </table>
		</div>