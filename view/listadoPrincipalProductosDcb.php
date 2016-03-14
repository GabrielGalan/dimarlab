<?php 
include '../controller/php/clase.php';
			
			$dcb = $_GET['dcb'];

	    	$oConectar = new conectorDB; 
	    	$consulta = "SELECT producto.idProducto, producto.nomComercial, producto.codigoBarra, producto.codigoReferencia, producto.observacion, producto.claveCuadroBasico, producto.descripcionCuadroBasico, tbl_marca.idProducto, tbl_marca.marca, tbl_proveedores.idProducto, tbl_proveedores.proveedor FROM producto JOIN ( tbl_marca, tbl_proveedores ) where producto.descripcionCuadroBasico LIKE '%$dcb%' and producto.idProducto = tbl_marca.idProducto and producto.idProducto = tbl_proveedores.idProducto";

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