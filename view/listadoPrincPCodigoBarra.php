<?php 
include '../controller/php/clase.php';
			$valorCodigoBarra = $_GET['valorCodigoBarra'];

	    	$oConectar = new conectorDB; 
	    	$consulta = "SELECT producto.idProducto, producto.nomComercial, producto.codigoBarra, producto.codigoReferencia, producto.observacion, producto.claveCuadroBasico, producto.descripcionCuadroBasico, producto_marcas.idProducto, producto_marcas.idMarca, producto_proveedores.idProducto, producto_proveedores.idProveedor FROM producto JOIN ( producto_marcas, producto_proveedores) where producto.codigoBarra LIKE '%$valorCodigoBarra%' and producto.idProducto = producto_marcas.idProducto and producto.idProducto = producto_proveedores.idProducto";

	    	 $Consulta = $oConectar->consultarBD($consulta);  
	     ?>

<div class="table-responsive">
		  <table class="table">
		    <tr>
		    	<?php foreach ($Consulta as $rows){ 

		    		$consultaImagen = "SELECT * FROM imagen where idProducto = '$rows[idProducto])'";
	     	 		$ConsultaRImagen = $oConectar->consultarBD($consultaImagen);  

	     	 		foreach ($ConsultaRImagen as $row){ }		
		    	?>   
		    	<td>
			    	<div id="idProducto" onclick="buscarProducto(<?php print($rows['idProducto']);?>);" class="agregaP" style="cursor:pointer;">
			    		<img src="<?php print($row['direccion']);?>">
			    		<p id="pNombre"><?php print($rows['nomComercial']);?></p>
			    	</div>
		    	</td>
		    	<?php
		    		}
		    	?>
		    </tr>
		  </table>
		</div>