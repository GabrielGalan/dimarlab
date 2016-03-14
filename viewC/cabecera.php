<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Cotizaciones DIMARLAB</title>
	<link rel="stylesheet" type="text/css" href="viewC/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="viewC/css/shCore.css">
	<link rel="stylesheet" type="text/css" href="viewC/css/demo.css">
	<link rel="stylesheet" type="text/css" href="viewC/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="viewC/css/style.css">

	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" language="javascript" src="viewC/libjs/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="viewC/libjs/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="viewC/libjs/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="viewC/libjs/script.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
	</script>
</head>
<header>
	<div id="menu">
    <img id="logoDimarlab" src="view/img/logoDimarlab.png">
		<div class="titulo">
			<h3>Sistema de consulta de cotizaciones DIMARLAB</h3>
		</div>
	<div id="ingresarCotizacion"><button id="idlogAdmin" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="logadmin">Ingresar cotización</button></div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modaltitle" id="exampleModalLabel">Nueva cotización</h4>
      </div>
      <div class="modalbody">
        <form>
          <div class="form-group">
            <label for="nProducto" class="control-label">Nombre del producto:</label>
            <input type="text" class="form-control" id="nProducto">
          </div>
          <div class="form-group">
            <label for="nContacto" class="control-label">Nombre del contacto:</label>
            <input type="text" class="form-control" id="nContacto">
          </div>
           <div class="form-group">
            <label for="nEmpresa" class="control-label">Empresa:</label>
            <input type="text" class="form-control" id="nEmpresa">
          </div>
           <div class="form-group">
            <label for="precio" class="control-label">Precio:</label>
            <input type="text" class="form-control" id="precio">
          </div>
           <div class="form-group">
            <label for="telefono" class="control-label">Teléfono:</label>
            <input type="text" class="form-control" id="telefono">
          </div>
           <div class="form-group">
            <label for="direccion" class="control-label">Dirección:</label>
            <input type="text" class="form-control" id="direccion">
          </div>
           <div class="form-group">
            <label for="marca" class="control-label">Marca:</label>
            <input type="text" class="form-control" id="marca">
          </div>
           <div class="form-group">
            <label for="correo" class="control-label">Correo:</label>
            <input type="text" class="form-control" id="correo">
          </div>
          <div class="form-group">
            <label for="imagen" class="control-label">Imagen:</label>
            <input type="file" class="form-control" id="imagen">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="registrarCotizacion" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
</div>
</header>
<body>

