<?php
include '../controller/php/clase.php';
$idProducto       = $_GET['q'];
$Conectar         = new conectorDB;//instanciamos conector
$consultaProducto = "SELECT producto.idProducto, producto.nomComercial, producto.codigoBarra, producto.codigoReferencia, producto.observacion, producto.claveCuadroBasico, producto.descripcionCuadroBasico, tbl_marca.idProducto, tbl_marca.marca, tbl_proveedores.idProducto, tbl_proveedores.proveedor FROM producto JOIN ( tbl_marca, tbl_proveedores) where producto.idProducto = '$idProducto' AND  producto.idProducto = tbl_marca.idProducto and producto.idProducto = tbl_proveedores.idProducto";

$ConsultaP = $Conectar->consultarBD($consultaProducto);

$consultaImagen  = "SELECT direccion, tituloFoto FROM imagen where idProducto = '$idProducto'";
$ConsultaRImagen = $Conectar->consultarBD($consultaImagen);
?>
<input id="cerrar" type="submit" style="cursor:pointer;" onclick="cerrar()">
	<div class="contImagen">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>
		  <!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
<?php
$contador = 1;
foreach ($ConsultaRImagen as $rowss) {
	$contadorActive = $contador++;
	if ($contadorActive == 1 or $contadorActive == "1") {
		$active = "active";
	} else {
		$active = "";
	}
	?>
	    <div class="item <?php print($active);?>">
	      <img src="<?php print($rowss['direccion']);?>" alt="...">
	      <div class="carousel-caption">
	        <p><?php print($rowss['tituloFoto']);?></p>
	      </div>
	    </div>
	<?php }?>
		    <?php
$consultaSalud  = "SELECT nombreInstitucion, claveSalud, descripcionSalud FROM tbl_salud where idProducto = '$idProducto'";
$ConsultaRSalud = $Conectar->consultarBD($consultaSalud);
?>
</div>

<!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Anterior</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Siguiente</span>
		  </a>
		</div>
	</div>

	<div class="descripProducto">
<?php foreach ($ConsultaP as $rows) {?>
		<h5 class="desh5">Nombre Comercial</h5>
		<p><?php print($rows['nomComercial']);?></p>
		<h5 class="desh5">Código de referencia</h5>
		<p><?php print($rows['codigoReferencia']);?></p>
		<h5 class="desh5">Código de barra</h5>
		<p><?php print($rows['codigoBarra']);?></p>
		<h5 class="desh5">Clave cuadro básico</h5>
		<p><?php print($rows['claveCuadroBasico']);?></p>
		<h5 class="desh5">Descripción cuadro básico</h5>
		<p><?php print($rows['descripcionCuadroBasico']);?></p>
	<?php foreach ($ConsultaRSalud as $row) {?>
				<h5 class="desh5">Descripción salud</h5>
				<p><?php print($row['nombreInstitucion']);?></p>
				<h5 class="desh5">Clave <?php print($row['nombreInstitucion']);?></h5>
				<p><?php print($row['claveSalud']);?></p>
				<h5 class="desh5">Descripción <?php print($row['nombreInstitucion']);?></h5>
				<p><?php print($row['descripcionSalud']);?></p>
		<?php }?>
		<h5 class="desh5">Proveedor del producto</h5>
		<p><?php print($rows['proveedor']);?></p>
		<h5 class="desh5">Marca</h5>
		<p><?php print($rows['marca']);?></p>
		<h5 class="desh5">Observaciones</h5>
		<p><?php print($rows['observacion']);?>
			<?php }?>
	</div>