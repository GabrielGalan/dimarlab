<?php
include '../controller/php/clase.php';
$idProducto       = $_GET['q'];
$Conectar         = new conectorDB;//instanciamos conector
$consultaProducto = "SELECT * FROM producto p where idProducto=".$idProducto."";

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
$queryInstituciones  = "SELECT c.*,i.* FROM producto p
 INNER JOIN clavesdescripciones c on c.idProducto = p.idProducto
 INNER JOIN instituciones i on i.id = c.idInstitucion
 WHERE p.idProducto=".$idProducto."";
$ConsultaRSalud = $Conectar->consultarBD($queryInstituciones);
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
		<h5 class="desh5">Instituciones de salud</h5>
        <table>
        <tr>
        	<td>Nombre</td>
            <td>Clave</td>
            <td>Desc.</td>
        </tr>
	<?php foreach ($ConsultaRSalud as $row) {?>
    <tr>
				<td><?php print($row['nombre']);?></td>
<!--				<h5 class="desh5">Clave</h5>-->
				<td><?php print($row['claveInstitucion']);?></td>
<!--				<h5 class="desh5"></h5>-->
				<td><?php print($row['descripcionInstitucion']);?></td>
                </tr>
		<?php }?>
        </table>
		<?php
			$queryProveedores  = " SELECT * FROM proveedores p
 INNER JOIN producto_proveedores pp on p.id = pp.idProveedor
 WHERE pp.idProducto=".$idProducto.";";
			$ResultProveedores = $Conectar->consultarBD($queryProveedores);
        ?>
		<h5 class="desh5">Proveedor(es) del producto</h5>
        	<?php foreach ($ResultProveedores as $row) {?>
				<p>*<?php print($row['proveedor']);?></p>
		<?php }?>
		<?php
			$queryProveedores  = "SELECT * FROM marcas m
 INNER JOIN producto_marcas pp on m.id = pp.idMarca
 WHERE pp.idProducto=".$idProducto.";";
			$ResultProveedores = $Conectar->consultarBD($queryProveedores);
        ?>
		<h5 class="desh5">Marca(s)</h5>
        	<?php foreach ($ResultProveedores as $row) {?>
				<p>*<?php print($row['marca']);?></p>
		<?php }?>
		<h5 class="desh5">Observaciones</h5>
		<p><?php print($rows['observacion']);?>
			<?php }?>
	</div>