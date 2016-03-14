<body>
<header>
	<div id="menu">
		<div class="titulo">
			<h3>Sistema de consulta de productos DIMARLAB</h3>
		</div>
		<div id="administrador">
			<a id="idlogAdmin" onclick="loginDes();" class="logadmin" href="#">Admin</a>
		</div>

		<div id="login">
			<form action="controller/php/login.php" method="POST">
				<label for="usuario">Usuario</label>
		    	<input class="form-control" type="text" placeholder="Usuario" name="usuario" id="usuario" required >
		    	<label for="contrasena">Contraseña</label>
		    	<input class="form-control" type="password" placeholder="Contraseña" name="contrasena" id="contrasena" required>
		    	<button id="subLogin" type="submit"  value="Enviar" class="btn btn-default">Enviar</button>
			</form>
		</div>
	</div>
</header>
<section id="principal">
	<div id="fondo-atenuar">
	</div>
	<div class="aUsuarios" id="aausuario">
	</div>
	<section id="organizar">
	<div class="organiazaAbc">
		<label for="selectOrganizar">Organizar por</label>
		<select class="form-control" id="selectOrganizar">
		  <option>Alfabéticamente A - Z</option>
		  <option>Alfabéticamente Z - A</option>
		  <option>Numérico ascendente</option>
		  <option>Numérico descendente</option>
		</select>
	</div>
	</section>
	<section id="busqueda">
	<h5>METODOS DE BUSQUEDAS</h5>
		<form>
		  <div class="form-group">
		    <label for="codigoReferencia">Código de barra</label>
		    <input class="form-control" type="text" onkeyup="BuscarCodigoBarra();" id="valorCodigoBarra" placeholder="Código de referencia" id="codigoReferencia">
		  </div>
		  <div class="form-group">
		    <label for="codigoReferencia">Código de referencia</label>
		    <input class="form-control" type="text" onkeyup="BuscarCodigoReferencia();" id="valorCodigoReferencia" placeholder="Código de referencia" id="codigoReferencia">
		  </div>
		  <div class="form-group">
		    <label for="nComercial">Nombre comercial</label>
		    <input class="form-control" type="text" onkeyup="BuscarNombreComercial();" id="valorNombreComercial" placeholder="Nombre comercial" id="nComercial">
		  </div>
		  <div class="form-group">
		    <label for="codigoReferencia">Descripción cuadro básico</label>
		    <input class="form-control" type="text" onkeyup="BuscarDCB();" id="valorDCB" placeholder="Descripción cuadro básico" id="codigoReferencia">
		  </div>
		  <div class="form-group">
		    <label for="codigoReferencia">Descripción secretaria de salud</label>
		    <input class="form-control" type="text" onkeyup="BuscarDS();" id="valorDS" placeholder="Descripción salubridad" id="codigoReferencia">
		  </div>
		  <h5 id="mcent">MARCA</h5>
	    </form>
	</section>

	<section id="productos">
<?php include 'view/listadoPrincipalProductos.php';?>
</section>
</section>

</body>
