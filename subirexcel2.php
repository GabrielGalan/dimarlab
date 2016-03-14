<?php 
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("dimarlab",$conexion);

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>subir excel</title>
 </head>
 <body>
 	<div align="center">
 		<form action="" method="POST" enctype="multipart/form-data" name="form1">
 			<table width="90%" border="0">
 				<tr>
 					<td>
 						<strong>Agregar archivo excel [Productos]</strong>

 						<input type="file" name="archivo" id="archivo">
 						<input type="submit" name="button" class="btn" id="button" value="Actualizar base de datos">
 					</td>
 				</tr>
 			</table>
 		</form>
 		<?php 
 				$nameExcel = $_FILES['archivo']['name'];
 				$tmpExcel = $_FILES['archivo']['tmp_name'];
 				$extExcel = pathinfo($nameExcel);
 				$urlNueva = "xls/empleados.xls";

 				if (is_uploaded_file($tmpExcel)) {
 					copy($tmpExcel, $urlNueva);

 					echo "Datos actualizados con exito";
 				} 
 		 ?> 
 	</div>
 </body>

 <?php 
 		require_once 'PHPExcel_1.8.0_doc/Classes/PHPExcel/IOFactory.php';

 		$objPHPExcel = PHPExcel_IOFactory::load('xls/empleados.xls'); 
 		$objHoja = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true);

 		foreach ($objHoja as $iIndice => $objCelda) {
 			
 		$cBarra	= $objCelda['B'];
		$nombreP = $objCelda['C'];
 		$cCuadroB = $objCelda['D'];
 		$descripBasica = $objCelda['E'];	

 			$sql= "INSERT INTO producto (nomComercial, codigoBarra, codigoReferencia, observacion, claveCuadroBasico, descripcionCuadroBasico) VALUES ('$nombreP', '$cBarra', null, null, '$cCuadroB', '$descripcionCuadroBasico')";

 			mysql_query($sql);
 		}
  ?>
 </html>










