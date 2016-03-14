<?php
include 'controller/php/clase.php';
error_reporting(E_ALL^E_NOTICE);
$valorCodigoBarraA = $_GET['valorCodigoBarraA'];

$oConectar = new conectorDB;
$consulta  = "SELECT  *FROM tbl_cotizacion WHERE estatus = '0'";

$Consulta = $oConectar->consultarBD($consulta);
?>
<div class="container" id="containerT">
		<section>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Producto</th>
						<th>Empresa</th>
						<th>Nombre contacto</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Fecha</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Producto</th>
						<th>Empresa</th>
						<th>Nombre contacto</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Dirección</th>
					</tr>
				</tfoot>
				<tbody>
<?php foreach ($Consulta as $rows) {?>
				<tr onclick="idC(<?php print($rows['idCotizacion'])?>)" style="cursor:pointer;" >
					<td><?php print($rows['nombreProducto'])?></td>
					<td><?php print($rows['empresa'])?></td>
					<td><?php print($rows['nombreContacto'])?></td>
					<td><?php print($rows['telefono'])?></td>
					<td><?php print($rows['correo'])?></td>
					<td><?php print($rows['fecha'])?></td>
				</tr>
	<?php }?>
</tbody>
			</table>
		</section>
	</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
