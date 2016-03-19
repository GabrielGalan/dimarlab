<?php 
  $Conectar = new conectorDB;//instanciamos conector

  $consultaMarcas = "SELECT * FROM marcas";
  $marcas = $Conectar->consultarBD($consultaMarcas);
 ?>
<body>
<header>
	<div id="menu">
    <img id="logoDimarlab" src="view/img/logoDimarlab.png">
		<div class="titulo">
			<h3>Sistema de consulta de productos DIMARLAB</h3>
		</div>
		<div id="administradorSalir">
			<a id="idlogAdmin" onClick="loginDes();" class="logadmin" href="controller/php/salirAdmin.php">Salir</a>
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
        <button type="submit" onClick="buscarProductoAdminActualizar()" class="btn btn-default">Buscar</button>
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
        <button type="submit" onClick="buscarProductoAdminIngresaNDescripcion()" class="btn btn-default">Buscar</button>
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
        <button type="submit" onClick="buscarProductoAdminIngresaNImagen()" class="btn btn-default">Buscar</button>
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
        <button type="submit" onClick="buscarProductoAdminEliminaProducto()" class="btn btn-default">Buscar</button>
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
        <button type="button" onClick="closeActualiza()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h4>
      </div>

      <div class="modal-body-ingresaProductos">

			<!-- INICIO DEL FORMULARIO -->
        <form action="controller/php/insertProductos.php"  name="alta_frm" method="post" enctype="multipart/form-data">
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
      			  		<option value="1"> Juan Graham</option>
      			  		<option value="2"> Rovirosa</option>
      			  		<option value="3"> Laboratorio regional de salud</option>
      			  		<option value="4"> Almecen secretaria de salud</option>
          				</select>
          				<br>
          				<TEXTAREA  type="text" name="claveSalud" id="claveSalud" placeholder="Clave " class="form-control" id="recipient-name" ></TEXTAREA>
          				<br>
      	            <TEXTAREA type="text" name="descripcionSalud" id="descripcionSalud" title="Descripción" placeholder="Descripción" class="form-control" id="recipient-name" ></TEXTAREA>
      	        </div>
                <div class="form-group">
                  <label for="proveedor" class="control-label">Proveedor del producto</label>
                    <input type="text" name="proveedor" id="proveedor" class="form-control" id="recipient-name" >
                    <!-- crear la consulta de todos los proveedores -->
                </div>
                <div class="form-group">
                  <label for="marca" class="control-label">Marca</label>
                    <select class="selectpicker" multiple data-live-search="true" name="marca[]" id="marca" >
                       
                    <!-- Crear la consulta para todas las marcas -->
                       <?php foreach ($marcas as $rowMarcas) {?>
                        <option value="<?php print($rowMarcas['id']); ?>"><?php print($rowMarcas['marca']);?></option>
                      <?php } ?>
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
                      <input type="radio" name="radio" id="checkboxSuccess" value="1">
                        Producto completo
                    </label>
                  </div>
                </div>
                <div class="has-error">
                  <div class="checkbox">
                    <label>
                      <input type="radio" name="radio" id="checkboxError" value="0">
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
