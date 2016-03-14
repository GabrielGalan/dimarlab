
<body>
<header>
	<div id="menu">
    <img id="logoDimarlab" src="view/img/logoDimarlab.png">
		<div class="titulo">
			<h3>Sistema de consulta de productos DIMARLAB</h3>
		</div>
		<div id="administradorSalir">
			<a id="idlogAdmin" onclick="loginDes();" class="logadmin" href="controller/php/salirAdmin.php">Salir</a>
		</div>
	</div>
</header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar">
        </span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DIMALAB</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
        <button type="button" class="btn btn-primary btn-agragar" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar producto</button>
      </ul>
    </div><!-- /.navbar-collapse -->
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Actualizar producto</a></li>
        <li><a data-toggle="tab" href="#menu1">Ingresar nueva descripcion gobierno</a></li>
        <li><a data-toggle="tab" href="#menu2">Ingresar nueva imagen</a></li>
        <li><a data-toggle="tab" href="#menu2">Eliminar producto</a></li>
      </ul>
<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" id="valorCodigoBarraAdA" placeholder="Código del producto">
        </div>
        <button type="submit" onclick="buscarProductoAdminActualizar()" class="btn btn-default">Buscar</button>
      </div>
        <!-- SE MOSTRARA LA CONSULTA PARA CREAR LA ACTUALIZACION DE LOS PRODUCTOS EN ESTE SECCION SE IMPRIMIRA EL RESULTADO TRAIDO DEL AJAX QUE CONTIENE EL ARCHIVO listadoPrincPCodigoBarra.php EL ARCHIVO ENVIA EL FORMULARIO AL ARCHIVO actualizaProductos.php -->
        <section id="principalActualizar"></section>
  </div>
  <div id="menu1" class="tab-pane fade">
   <div id="home" class="tab-pane fade in active">
    <div class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" id="valorCodigoBarraND" placeholder="Código del producto">
        </div>
        <button type="submit" onclick="buscarProductoAdminIngresaNDescripcion()" class="btn btn-default">Buscar</button>
      </div>
        <!-- SE MOSTRARA LA CONSULTA PARA INGRESAR UN NUEVA DESCRIPCION DE GOBIERNO AL PRODUCTO-->
        <section id="principalIngresaNDescripcion"></section>
  </div>
  </div>
  <div id="menu2" class="tab-pane fade">
    <div id="home" class="tab-pane fade in active">
    <div class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" id="valorCodigoBarraNI" placeholder="Código del producto">
        </div>
        <button type="submit" onclick="buscarProductoAdminIngresaNImagen()" class="btn btn-default">Buscar</button>
      </div>
        <!-- SE MOSTRARA LA CONSULTA PARA INGRESAR UN NUEVA IMAGEN AL PRODUCTO -->
        <section id="principalIngresaNImagen"></section>
  </div>
  </div>
  <div id="menu3" class="tab-pane fade">
    <div id="home" class="tab-pane fade in active">
    <div class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" id="valorCodigoBarraNI" placeholder="Código del producto">
        </div>
        <button type="submit" onclick="buscarProductoAdminEliminaProducto()" class="btn btn-default">Buscar</button>
      </div>
        <!-- SE MOSTRARA LA CONSULTA PARA INGRESAR UN NUEVA IMAGEN AL PRODUCTO -->
        <section id="principalEliminarProducto"></section>
  </div>
  </div>
</div>
  </div><!-- /.container-fluid -->
</nav>
<section id="principal">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onclick="closeActualiza()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h4>
      </div>

      <div class="modal-body-ingresaProductos">

			<!-- INICIO DEL FORMULARIO -->
        <form action="controller/php/ingresarProductos.php"  name="alta_frm" method="post" enctype="multipart/form-data">
             <div class="form-group">
                <label for="codigoBarra" class="control-label">Código de barra</label>
                <input type="text" name="codigoBarra" id="codigoBarra" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="nombreComercial" class="control-label">Nombre comercial</label>
                <TEXTAREA type="text" name="nombreComercial" id="nombreComercial" class="form-control" id="recipient-name" required></TEXTAREA>
              </div>
              <div class="form-group">
                <label for="codigoReferencia" class="control-label">Código de referencia</label>
                <input type="text" name="codigoReferencia" id="codigoReferencia" class="form-control" id="recipient-name" >
              </div>
             <div class="form-group">
                <label for="claveCuadroBasico" class="control-label">Clave cuadro básico</label>
                <TEXTAREA type="text" name="claveCuadroBasico" id="claveCuadroBasico" class="form-control" id="recipient-name" ></TEXTAREA>
              </div>
              <div class="form-group">
                <label for="descripcionCuadroBasico" class="control-label">Descripción cuadro básico</label> <!--  -->
                <textarea type="text" name="descripcionCuadroBasico" id="descripcionCuadroBasico" class="form-control" id="recipient-name" ></textarea>
              </div>
                <div class="form-group desEsp">
      	        	<label for="salud" class="control-label">Descripción salud</label>
      	        	<select  class= "form-control" name="salud" id="salud" >
                  <option> -- -- -- -- </option>
      			  		<option> Juan Graham </option>
      			  		<option> Rovirosa </option>
      			  		<option> Laboratorio regional de salud </option>
      			  		<option> Almecen secretaria de salud </option>
          				</select>
          				<br>
          				<TEXTAREA  type="text" name="claveSalud" id="claveSalud" placeholder="Clave " class="form-control" id="recipient-name" ></TEXTAREA>
          				<br>
      	            <TEXTAREA type="text" name="descripcionSalud" id="descripcionSalud" title="Descripción" placeholder="Descripción" class="form-control" id="recipient-name" ></TEXTAREA>
      	        </div>
                <div class="form-group">
                  <label for="proveedor" class="control-label">Proveedor del producto</label>
                  <input type="text" name="proveedor" id="proveedor" class="form-control" id="recipient-name" >
                </div>
                <div class="form-group">
                  <label for="marca" class="control-label">Marca</label>
                    <select class="selectpicker" multiple data-live-search="true" name="marca[]" id="marca" >
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
                  <input type="text" name="observacion" id="observaciones" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                	<label class="imagenes">Seleccionar imagen</label>
                  <input id="imagenes" name="imagenes" type="file"  class="file" data-show-upload="false" data-show-caption="true">
               <!--    <input id="imagenes" name="imagenes" type="file"  class="file" data-show-upload="false" data-show-caption="true"> -->
                  <input type="text" title="Descripción de imagen" placeholder="Descripción de imagen" name="descripcionImagen" id="descripcionImagen" class="form-control" id="recipient-name" >
      		      </div>
                <div class="has-success">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="checkboxSuccess" id="checkboxSuccess" value="1">
                        Producto completo
                    </label>
                  </div>
                </div>
                <div class="has-error">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="checkboxError" id="checkboxError" value="0">
                        Producto incompleto
                    </label>
                  </div>
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
</section>

</body>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>