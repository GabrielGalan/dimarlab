/*$(document).ready(function() {
    $("#registrarProductoSer").click(enviar);


function enviar(){
            var codigoBarra = $("#codigoBarra").val()
            var nombreComercial = $("#nombreComercial").val()
            var codigoReferencia = $("#codigoReferencia").val()
            var claveCuadroBasico = $("#claveCuadroBasico").val()
            var descripcionCuadroBasico = $("#descripcionCuadroBasico").val()
            var salud = $("#salud").val()
            var claveSalud = $("#claveSalud").val()
            var descripcionSalud = $("#descripcionSalud").val()
            var marca = $("#marca").val() 

           var data = {
                    "codigoBarra" : codigoBarra,
                    "nombreComercial" : nombreComercial,
                    "codigoReferencia" : codigoReferencia,
                    "claveCuadroBasico" : claveCuadroBasico,
                    "descripcionCuadroBasico" : descripcionCuadroBasico,
                    "salud" : salud,
                    "claveSalud" : claveSalud,
                    "descripcionSalud" : descripcionSalud,
                    "marca" : marca
                };
            $.ajax({
              type: "POST",
              url: "../controller/php/ingresarProductos.php",
              data: data,
              success:  function (response) {
                        document.getElementById ("demo").innerHTML = response;
                }
            });
        }
}); */