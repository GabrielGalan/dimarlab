<?php
include 'controller/php/clase.php';

$oConectar = new conectorDB;
$consulta  = "SELECT * FROM producto";
$Consulta  = $oConectar->consultarBD($consulta);

?>
<div class="table-responsive">
	<table id="my-table" class="table">
		<tr>
<?php foreach ($Consulta as $rows) {

	$consultaImagen  = "SELECT * FROM imagen where idProducto = '$rows[idProducto])'";
	$ConsultaRImagen = $oConectar->consultarBD($consultaImagen);
	foreach ($ConsultaRImagen as $row) {}

	$consultaMarca  = "SELECT * FROM producto_marcas where idProducto = '$rows[idProducto])'";
	$ConsultaRMarca = $oConectar->consultarBD($consultaMarca);
	foreach ($ConsultaRMarca as $rowm) {}

	if ($rows['terminado'] == '0' or $rows['terminado'] == null) {
		$banner = "banner incompleto";
		$estado = "INCOMPLETO";
	} elseif ($rows['terminado'] == '1') {
		$banner = "banner completo";
		$estado = "COMPLETO";
	}
	?>
		<td>
			<div id="idProducto" onclick="buscarProducto(<?php print($rows['idProducto']);?>);" class="agregaP" style="cursor:pointer;">
				<img src="<?php print($row['direccion']);?>">
				<div class="<?php print($banner);?>"><font><?php print($estado);
	?></font></div>
				<p class="consultaParrafo p-marca"><?php print($rows['nomComercial']);?></p>
				<p class="consultaParrafo">Código referencia: <?php print($rows['codigoReferencia']);?></p>
				<p class="consultaParrafo">Marca: <?php print($rowm['marca']);?></p>
			</div>
		</td>
	<?php }?>
		</tr>
	</table>
	</div>