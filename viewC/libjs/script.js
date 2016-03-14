jQuery(document).ready(function() {
	$("#registrarCotizacion").click(function() {
       var nProducto = $("#nProducto").val();
       var nContacto = $("#nContacto").val();
       var nEmpresa = $("#nEmpresa").val();
       var precio = $("#precio").val();
       var telefono = $("#telefono").val();
       var direccion = $("#direccion").val();
       var marca = $("#marca").val();
       var correo = $("#correo").val();
       var imagen = $("#imagen").val();

       datos = {nProducto: nProducto, nContacto: nContacto, nEmpresa: nEmpresa, precio: precio, telefono: telefono, direccion: direccion, marca: marca, correo: correo, imagen: imagen}

       $.ajax({
       	  method: "POST",
		  url: "viewC/insertaCotizacion.php",
		  data: datos,
		  cache: false
		})
		  .done(function(result) {
		  	location.reload();
		  });
		});
});

function idC(q) {
	idCotizacion = q;
	data = {idCotizacion: idCotizacion}

	$.ajax({
       	  method: "POST",
		  url: "viewC/consultaCotizacion.php",
		  data: data,
		  cache: false
		})
		  .done(function(result) {
		  	if (result != null) {
		  		$('#myModal').modal('show');  
		  		$( ".modal-title" ).html("Cotización "+ result.nombreProducto);

		  		$( ".modal-body" ).html("<div id='consultaCentrar'>"+"<h4>"+"Nombre producto: "+"</h4>"+result.nombreProducto
		  		+"<h4>"+"Contacto: "+"</h4>"+ result.nombreContacto
		  		+"<h4>"+"Empresa: "+"</h4>"+ result.empresa
		  		+"<h4>"+"Precio: "+"</h4>"+ result.precio
		  		+"<h4>"+"Dirección: "+"</h4>"+ result.direccion
		  		+"<h4>"+"Marca: "+"</h4>"+ result.marca
		  		+"<h4>"+"Correo: "+"</h4>"+ result.correo
		  		+"<h4>"+"Fecha de registro: "+"</h4>"+ result.fecha + "</div>");
		  	}
		  });
	};
