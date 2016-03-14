function Buscador(){var xmlhttp=false; try {xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {try {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}catch (E) {xmlhttp = false;}} if (!xmlhttp && typeof XMLHttpRequest!='undefined') {xmlhttp = new XMLHttpRequest();} return xmlhttp;}


function agregaUsuariosjs(){
	$('.aUsuarios').slideToggle(800);
	document.getElementById("aausuario").style.display="flex"
	document.getElementById("fondo-atenuar").style.display = "block"; 
	} 

function loginDes(){
	$('#login').slideToggle(800);
	document.getElementById("login").style.display = "block"; 
	} 

function cerrar() {
	$('.aUsuarios').slideToggle(0);
	document.getElementById("fondo-atenuar").style.display = "none";
}
function cerrarFormModifica(){
	$('#contModificar').slideToggle(0);
	document.getElementById("fondo-atenuar").style.display = "none";
}

function eliminar(q){
    a = document.getElementById('contEliminar');
    if (confirm("¿Desea eliminar el usuario?") == true) {
        ajax = Buscador();
		ajax.open("GET","eliminarUsuario.php?q="+q);
		ajax.onreadystatechange = function(){
		if (ajax.readyState == 4){
			a.innerHTML = ajax.responseText;
		}
	}
	 ajax.send(document.location.reload(true))
    }
    ajax.send(document.location.reload(true))
}

function cerrarEliminar(){
	$('#contEliminar').slideToggle(0);
	document.getElementById("fondo-atenuar").style.display = "none";
}

// FUNCION PARA ENVIAR ID DEL PRODUCTO Y RECIBIR LOS PRODUCTOS DE LA BD

function buscarProducto(q){

		$('#aausuario').slideToggle(800);
		document.getElementById("fondo-atenuar").style.display = "block";
		a = document.getElementById('aausuario');
		ajax = Buscador();
		ajax.open("GET","view/descripcionProducto.php?q="+q);
		ajax.onreadystatechange = function(){
		if (ajax.readyState == 4){
			a.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
    }


// BUSCAR POR CODIGO DE REFERENCIA

function BuscarCodigoReferencia() {
	codigoReferencia = document.getElementById('valorCodigoReferencia').value;
	c = document.getElementById('productos');
	ajax = Buscador();
		ajax.open("GET","view/listadoPrincipalProductosB.php?codigoReferencia="+codigoReferencia);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4){
				c.innerHTML = ajax.responseText;
			}
		}
		ajax.send(null); 
		}
// BUSCAR POR NOMBRE COMERCIAL		

function BuscarNombreComercial() {
	nombreComercial = document.getElementById('valorNombreComercial').value;
	c = document.getElementById('productos');
	ajax = Buscador();
		ajax.open("GET","view/listadoPrincipalProductosNomC.php?nombreComercial="+nombreComercial);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4){
				c.innerHTML = ajax.responseText;
			}
		}
		ajax.send(null); 
}  
// BUSCAR POR DESCRIPCION CUADRO BASICO

function BuscarDCB(){
	dcb = document.getElementById('valorDCB').value;
	c = document.getElementById('productos');
	ajax = Buscador();
		ajax.open("GET","view/listadoPrincipalProductosDcb.php?dcb="+dcb);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4){
				c.innerHTML = ajax.responseText;
			}
		}
		ajax.send(null); 
} 
// BUSCAR POR DESCRIPCION SECTOR SALUD

function BuscarDS(){
	ds = document.getElementById('valorDS').value;
	c = document.getElementById('productos');
	ajax = Buscador();
		ajax.open("GET","view/listadoPrincipalProductosDS.php?ds="+ds);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4){
				c.innerHTML = ajax.responseText;
			}
		}
		ajax.send(null); 
} 

// BUSCAR POR CODIGO DE BARRA


function  BuscarCodigoBarra(){
	valorCodigoBarra = document.getElementById('valorCodigoBarra').value;
	c = document.getElementById('productos');
	ajax = Buscador();
		ajax.open("GET","view/listadoPrincPCodigoBarra.php?valorCodigoBarra="+valorCodigoBarra);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4){
				c.innerHTML = ajax.responseText;
			}
		}
		ajax.send(null); 
}

// BUSCAR PRODUCTOS DESDE EL ADMINISTRADOR POR CODIGO DE BARRA PARA EDITAR EL REGISTRO

function buscarProductoAdminActualizar(){
	valorCodigoBarraA = document.getElementById('valorCodigoBarraAdA').value;
	c = document.getElementById('principalActualizar');
	ajax = Buscador();
		ajax.open("GET","controller/php/listadoProductoActualiza.php?valorCodigoBarraA="+valorCodigoBarraA);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4){
				c.innerHTML = ajax.responseText;
			}
		}
		ajax.send(null); 
}

// BUSCAR PRODUCTOS DESDE EL ADMINISTRADOR POR CODIGO DE BARRA PARA INGRESAR NUEVA DESCRIPCION DE GOBIERNO
function buscarProductoAdminIngresaNDescripcion(){
	valorCodigoBarra = document.getElementById('valorCodigoBarraND').value;
	c = document.getElementById('principalIngresaNDescripcion');
	ajax = Buscador();
		ajax.open("GET","controller/php/listadoProductoNDescripcion.php?valorCodigoBarra="+valorCodigoBarra);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4){
				c.innerHTML = ajax.responseText;
			}
		}
		ajax.send(null); 
} 

// BUSCAR PRODUCTOS DESDE EL ADMINISTRADOR POR CODIGO DE BARRA PARA INGRESAR NUEVA IMAGEN AL PRODUCTO
function buscarProductoAdminIngresaNImagen(){
	valorCodigoBarra = document.getElementById('valorCodigoBarraNI').value;
	c = document.getElementById('principalIngresaNImagen');
	ajax = Buscador();
		ajax.open("GET","controller/php/listadoproductoNImagen.php?valorCodigoBarra="+valorCodigoBarra);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4){
				c.innerHTML = ajax.responseText;
			}
		}
		ajax.send(null); 
}  


// FUNCION PARA ELIMINAR LA IMAGEN DE UN PRODUCTO
function eliminaImagenR(q) {
	var r = confirm("¿Desea eliminar la imagen?");
	if (r == true) {
	    idImagenEliminar = q;

	    c = document.getElementById('principalActualizar');
	ajax = Buscador();
		ajax.open("GET","imagenEliminar.php?idImagenEliminar="+idImagenEliminar);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4){
				c.innerHTML = ajax.responseText;
			}
		}
		ajax.send(null); 
	} else {
	   
	}	
}

// FUNCION PARA ELIMINAR UN PRODUCTO DE LA BD
function buscarProductoAdminEliminaProducto(q) {
	var r = confirm("¿Desea eliminar el producto?");
	if (r == true) {
	    idProductoEliminar = q;

	    c = document.getElementById('principalEliminarProducto');
	ajax = Buscador();
		ajax.open("GET","ProductoEliminar.php?idProductoEliminar="+idProductoEliminar);
		ajax.onreadystatechange = function(){
			if(ajax.readyState == 4){
				c.innerHTML = ajax.responseText;
			}
		}
		ajax.send(null); 
	} else {
	   
	}	
}







