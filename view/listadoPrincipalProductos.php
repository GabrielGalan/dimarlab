<?php
include 'controller/php/clase.php';

$Conexion = new conectorDB;
$queryProducto  = "SELECT * FROM producto p";

$ResultProducto  = $Conexion->consultarBD($queryProducto);

?>
<div class="table-responsive">
	<table id="my-table" class="table">
		<tr>
<?php foreach ($ResultProducto as $rows) {

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
            <?php 
			$queryImg  = "SELECT * FROM imagen where idProducto = '$rows[idProducto])'";
			$ResultImg = $Conexion->consultarBD($queryImg);
			foreach ($ResultImg as $row) 
			{?>
            	<img src="<?php print($row['direccion']);?>">
            <?php
			break;
			}
			?>				<div class="<?php print($banner);?>"><font><?php print($estado);
	?></font></div>
				<p class="consultaParrafo p-marca"><?php print($rows['nomComercial']);?></p>
				<p class="consultaParrafo">Código referencia: <?php print($rows['codigoReferencia']);?></p>
			</div>
		</td>
	<?php }?>
		</tr>
	</table>
	</div>