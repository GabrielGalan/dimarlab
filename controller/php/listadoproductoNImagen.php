<?php
include 'clase.php';
error_reporting(E_ALL^E_NOTICE);
$valorCodigoBarra = $_GET['valorCodigoBarra'];

$oConectar = new conectorDB;
$consulta  = "SELECT producto.idProducto, producto.nomComercial, producto.codigoBarra, producto.codigoReferencia, producto.observacion, producto.claveCuadroBasico, producto.descripcionCuadroBasico, tbl_marca.idProducto, tbl_marca.marca, tbl_proveedores.idProducto, tbl_proveedores.proveedor FROM producto JOIN ( tbl_marca, tbl_proveedores) where producto.codigoBarra LIKE '%$valorCodigoBarra%' and producto.idProducto = tbl_marca.idProducto and producto.idProducto = tbl_proveedores.idProducto";

$Consulta = $oConectar->consultarBD($consulta);
?>
<div class="table-responsive">
      <table class="table">
        <tr>
<?php foreach ($Consulta as $rows) {
	$consultaImagen  = "SELECT * FROM imagen where idProducto = '$rows[idProducto])'";
	$ConsultaRImagen = $oConectar->consultarBD($consultaImagen);

	foreach ($ConsultaRImagen as $row) {}
	?>
	      <td>
	        <div id="idProducto"  class="agregaP">
	          <img src="<?php print($row['direccion']);?>">
	          <p id="pNombre"><?php print($rows['nomComercial']);?></p>
	        </div>
	          <div class="btn-group dropup">
	            <button type="button" class="btn btn-primary">Menú de opciones</button>
	            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              <span class="caret"></span>
	              <span class="sr-only">Menú de opciones</span>
	            </button>
	            <ul class="dropdown-menu">
	              <li style="cursor:pointer;" class="menuOpciones" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Agregar nueva Imagen</li>
	            </ul>
	          </div>
	      </td>
	<?php
}
?>
        </tr>
      </table>
    </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeActualiza()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Actualizar datos de producto</h4>
      </div>
      <div class="modal-body-imagen">
      <!-- INICIO DEL FORMULARIO -->
        <form action="controller/php/nuevaImagen.php"  name="alta_frm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <input type="hidden" name="idProducto" value="<?php print($rows['idProducto']);?>">
                  <label class="imagenes">Seleccionar imagen</label>
                      <input id="imagenes" name="imagenes" type="file"  class="file">
                      <input type="text" title="Descripción de imagen"  placeholder="Descripción de imagen" name="descripcionImagen" id="descripcionImagen" class="form-control" >
                  </div>
             <div class="modal-footer">
             <button type="submit" name="submit" id="registrarProductoSer" class="btn btn-primary">Registrar</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </form>
        <!-- TERMINACION DEL FORMULARIO -->
      </div>
    </div>
  </div>
</div>