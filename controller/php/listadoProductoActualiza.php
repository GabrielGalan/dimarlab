<?php
include 'clase.php';
error_reporting(E_ALL^E_NOTICE);
$valorCodigoBarraA = $_GET['valorCodigoBarraA'];

$oConectar = new conectorDB;
$consulta  = "SELECT  producto.idProducto, producto.nomComercial, producto.codigoBarra, producto.codigoReferencia, producto.observacion, producto.claveCuadroBasico, producto.descripcionCuadroBasico, tbl_marca.idProducto, tbl_marca.marca, tbl_proveedores.idProducto, tbl_proveedores.proveedor, imagen.idProducto, imagen.direccion, imagen.tituloFoto FROM producto JOIN ( tbl_marca, imagen, tbl_proveedores ) where producto.codigoBarra LIKE '%$valorCodigoBarraA%' and producto.idProducto = tbl_marca.idProducto and producto.idProducto = tbl_proveedores.idProducto and producto.idProducto = imagen.idProducto LIMIT 1";

$Consulta = $oConectar->consultarBD($consulta);
?>
<div class="table-responsive">
      <table class="table">
        <tr>
<?php foreach ($Consulta as $rows) {
	?>
			          <td>
			            <div id="idProducto"  class="agregaP">
			              <img src="<?php print($rows['direccion']);?>">
			              <p id="pNombre"><?php print($rows['nomComercial']);?></p>
			            </div>
			              <div class="btn-group dropup">
			                <button type="button" class="btn btn-primary">Menú de opciones</button>
			                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                  <span class="caret"></span>
			                  <span class="sr-only">Menú de opciones</span>
			                </button>
			                <ul class="dropdown-menu">
			                  <li style="cursor:pointer;" class="menuOpciones" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Actualizar datos</li>
			                  <div style="cursor:pointer;" class="menuOpciones" id="eliminaImagenR" onclick="eliminaImagenR('<?php print($rows['idProducto']);?>')" >Eliminar imagen</div>
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
        <button type="button" onclick="closeActualiza()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Actualizar datos de producto</h4>
      </div>
      <div class="modal-body-actualiza">
      <!-- INICIO DEL FORMULARIO -->
        <form action="controller/php/actualizaProductos.php"  name="alta_frm" method="post" enctype="multipart/form-data">
             <div class="form-group">
              <input type="hidden" name="idProducto" id="idProducto" value="<?php print($rows['idProducto']);?>"  class="form-control"  required>
                <label for="codigoBarra" class="control-label">Código de barra</label>
                <input type="text" name="codigoBarra" id="codigoBarra" value="<?php print($rows['codigoBarra']);?>"  class="form-control">
              </div>
              <div class="form-group">
                <label for="nombreComercial" class="control-label">Nombre comercial</label>
                <TEXTAREA type="text" name="nombreComercial" id="nombreComercial"  value="<?php print($rows['nomComercial']);?>" class="form-control"  required><?php print($rows['nomComercial']);
?></TEXTAREA>
              </div>
              <div class="form-group">
                <label for="codigoReferencia" class="control-label">Código de referencia</label>
                <input type="text" name="codigoReferencia" id="codigoReferencia"  value="<?php print($rows['codigoReferencia']);?>" class="form-control" >
              </div>
             <div class="form-group">
                <label for="claveCuadroBasico" class="control-label">Clave cuadro básico</label>
                <TEXTAREA type="text" name="claveCuadroBasico" id="claveCuadroBasico"  value="<?php print($rows['claveCuadroBasico']);?>" class="form-control" ><?php print($rows['claveCuadroBasico']);
?></TEXTAREA>
              </div>
              <div class="form-group">
                <label for="descripcionCuadroBasico" class="control-label">Descripción cuadro básico</label> <!--  -->
                <textarea type="text" name="descripcionCuadroBasico" id="descripcionCuadroBasico"  value="<?php print($rows['descripcionCuadroBasico']);?>" class="form-control" ><?php print($rows['descripcionCuadroBasico']);
?></textarea>
              </div>

              <div id="descripSalud">
                <div class="form-group desEsp">
                  <label for="salud" class="control-label">Descripción salud</label>
                  <select  class= "form-control" name="salud" id="salud"  value="<?php print($rows['nombreInstitucion']);?>" >
                    <option><?php print($rows['nombreInstitucion']);?></option>
                  <option> Juan Graham </option>
                  <option> Rovirosa </option>
                  <option> Laboratorio regional de salud </option>
                  <option> Almecen secretaria de salud </option>
                  </select>
                  <br>
                  <TEXTAREA  type="text" name="claveSalud" id="claveSalud"  value="<?php print($rows['claveSalud']);?>" placeholder="Clave " class="form-control" ><?php print($rows['claveSalud']);
?></TEXTAREA>
                  <br>
                    <TEXTAREA type="text" name="descripcionSalud" id="descripcionSalud"  value="<?php print($rows['descripcionSalud']);?>" title="Descripción" placeholder="Descripción" class="form-control" ><?php print($rows['descripcionSalud']);
?></TEXTAREA>
                </div>
               </div>
                <div class="form-group">
                  <label for="proveedor" class="control-label">Proveedor del producto</label>
                  <input type="text" name="proveedor" id="proveedor" class="form-control"  value="<?php print($rows['proveedor']);?>"  >
                </div>
                <div class="form-group">
                  <label for="marca" class="control-label">Marca</label>
                   <input id="marcaH" value="<?php print($rows['marca']);?>" name="marcaH" type="hidden">
                    <select class="select" multiple data-live-search="true" name="marca[]" id="marca">
                        <option><?php print($rows['marca']);?></option>
                        <option>BD</option>
                        <option>ROCHE</option>
                        <option>SENSIMEDICAL</option>
                        <option>PROTEC</option>
                        <option>HERGOM</option>
                        <option>AMBIDERM</option>
                        <option>LEROY</option>
                        <option>HYCEL</option>
                        <option>TUK</option>
                        <option>BIO-RAD</option>
                        <option>LICON</option>
                        <option>INSTRUMENTATION LABORATORY</option>
                        <option>SPINREACT</option>
                        <option>COVIDIEN</option>
                        <option>BARD</option>
                        <option>MEDTRONIC</option>
                        <option>FENWAL</option>
                        <option>WESTMED</option>
                        <option>HUDSON</option>
                        <option>AMBU</option>
                        <option>VENDALASTIC</option>
                        <option>VIGON</option>
                        <option>HOLY</option>
                        <option>LIDES</option>
                        <option>CURASPON</option>
                        <option>ALKAZYME</option>
                        <option>DUODERM CGF (CONVATEC)</option>
                        <option>KENDALL</option>
                        <option>ESTERIPHARMA</option>
                        <option>SKINPROT</option>
                        <option>ALTAMIRANO</option>
                        <option>RESPIFIX</option>
                        <option>CORNING</option>
                        <option>NEDMED</option>
                        <option>COVERPLAST</option>
                        <option>BETACHEK</option>
                        <option>CONMED</option>
                        <option>COPAN</option>
                        <option>GINEMED S.C</option>
                        <option>GE HEALTH CARE</option>
                        <option>DIAGNOSTICA INTERNACIONAL</option>
                        <option>STANDARD DIAGNOSTICS</option>
                        <option>CLINIS TEST</option>
                        <option>MICRO ESSENTIAL</option>
                        <option>KIMAX</option>
                        <option>KIMETEC</option>
                        <option>DIP-MAC</option>
                        <option>PRODUCTOS PRACTICOS DE MADERA</option>
                        <option>INDUSTRIAS RUIZ SANCHEZ</option>
                        <option>STAGO</option>
                        <option>EPOC</option>
                        <option>KOVA INTERNACIONAL</option>
                        <option>PISA</option>
                        <option>DIAGMEX</option>
                        <option>ATRAMAT</option>
                        <option>QUIRMEX</option>
                        <option>DL</option>
                        <option>ARROW</option>
                        <option>ALTRATEC</option>
                        <option>PROCOMSA</option>
                        <option>SYM LABORATORIOS</option>
                        <option>SHIRLEY</option>
                        <option>BIOMED</option>
                        <option>AFFELTIVE</option>
                        <option>DIAPRO</option>
                        <option>DURACELL</option>
                        <option>PHILIPS</option>
                        <option>MADESA</option>
                        <option>DRAGUER</option>
                        <option>DEGASA</option>
                        <option>DIBICO</option>
                        <option>SYSMEX</option>
                        <option>3M</option>
                        <option>TERUMO</option>
                        <option>BAXTER</option>
                        <option>ST JUDE MEDICAL</option>
                        <option>PROMAT</option>
                        <option>NACIONAL</option>
                        <option>HS TRANSFER</option>
                        <option>BIOXON</option>
                        <option>CARE FUSION</option>
                        <option>ARGON</option>
                        <option>SUR</option>
                        <option>MMQ</option>
                        <option>DERMO CLEEN CBD</option>
                        <option>DERMO CLEEN</option>
                        <option>DKT MEXICO</option>
                        <option>SODA SORB</option>
                        <option>ANTISEPSIA CENTRAL</option>
                        <option>LABORATORIOS SOPHIA</option>
                        <option>TRACOE</option>
                        <option>BIRMEX</option>
                        <option>LEUKOPLAST</option>
                        <option>PDM</option>
                        <option>CITO FIX</option>
                        <option>SCOTIA</option>
                        <option>ADEX</option>
                        <option>HARMONY</option>
                        <option>DRENOVAL</option>
                        <option>BEMIS</option>
                        <option>VIRESA</option>
                        <option>BIOMERIEUX</option>
                        <option>RUIZ SANCHEZ</option>
                        <option>MEGALAB</option>
                        <option>LOMOTIL</option>
                        <option>TAKEDA</option>
                        <option>LEFERPAL MD</option>
                        <option>MOVARTIS</option>
                        <option>PYREX</option>
                        <option>AZTRA ZENECA</option>
                        <option>SANOFI</option>
                        <option>EPPENDORF</option>
                        <option>REPRESENTACIONES E INVESTIGACIONES MEDICAS S.A. DE C.V.</option>
                        <option>WRITE</option>
                        <option>BLUMEN</option>
                        <option>COMODIN</option>
                        <option>OCULUS</option>
                        <option>CUEVAS</option>
                        <option>ESTAFETA MEXICANA S.A. DE C.V.</option>
                        <option>HRDRION</option>
                        <option>NOVO NORDISK</option>
                        <option>FPIZER</option>
                        <option>RAUMD</option>
                        <option>COVIDIEN</option>
                        <option>MENEN</option>
                        <option>KOTEX</option>
                        <option>CTK BIOTECH</option>
                        <option>HANITA OBELIS S.A.</option>
                        <option>LABORATORIOS  SILANES S.A. DE C.V.</option>
                        <option>COOK</option>
                        <option>BOSTON SCIENTIFIC</option>
                        <option>RAFI SYSTEMS INC</option>
                        <option>SEQUI S.A. DE C.V.</option>
                        <option>ESPECIALISTAS EN ESTERILIZACIONES Y ENVASES</option>
                        <option>ABBOTT</option>
                        <option>KORTEX</option>
                        <option>JHONSON & JHONSON</option>
                        <option>PFIZER</option>
                        <option>MAVI FARMACEUTICA</option>
                        <option>DELMED</option>
                        <option>AMSA LABORATORIOS</option>
                        <option>FACIA BOND</option>
                        <option>GOLDEN BELL</option>
                        <option>ABRAXIS</option>
                        <option>B BRAUN</option>
                        <option>LEXEL</option>
                        <option>TECNICA MEDICAL</option>
                        <option>WOLD LAB</option>
                        <option>PLASTIC WORLD</option>
                        <option>RAPIDVIEW</option>
                        <option>ENSTANT-VIEW</option>
                        <option>GLAXO SMITH KLINE</option>
                        <option>BAYER</option>
                        <option>BRISTOL-MYERS SQUIBB</option>
                        <option>LIOMONT</option>
                        <option>BOEHRINGER INGELHEIM</option>
                        <option>LABORATORIOS JALOMA</option>
                        <option>ALCOHOLERA MORELOS</option>
                        <option>BOSSOCAT</option>
                        <option>W & H</option>
                        <option>LABORATORIOS ZEYCO</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="observacion" class="control-label">Observaciones</label>
                  <input type="text" name="observacion" id="observaciones"  value="<?php print($rows['observacion']);?>" class="form-control" >
                </div>
                <div class="form-group">
                  <label class="imagenes">Seleccionar imagen</label>
                      <input id="imagenes" name="imagenes" type="file"  class="file">
                      <input type="text" title="Descripción de imagen"  placeholder="Descripción de imagen" name="descripcionImagen" id="descripcionImagen" class="form-control" >
                      <input id="imagenesH" value="<?php print($row['direccion']);?>" name="imagenesH" type="hidden">
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