<?php
include("clase.php");
error_reporting(E_ALL ^ E_NOTICE);
    $idProducto = $_POST["idProducto"];
    $nombreComercial = $_POST["nombreComercial"];
    $codigoBarra = $_POST["codigoBarra"];
    $codigoReferencia = $_POST["codigoReferencia"];
    $observacion = $_POST["observacion"];
    $claveCuadroBasico = $_POST["claveCuadroBasico"];
    $descripcionCuadroBasico = $_POST["descripcionCuadroBasico"];
    $descripcionImagen = $_POST["descripcionImagen"];

    if ($_POST["marca"]!=null) {
        $marcas = $_POST["marca"]; 
        $marca = implode(", ", $marcas);
    }else{
        $marca = $_POST["marcaH"];
    }


    $salud = $_POST["salud"];
    $claveSalud = $_POST["claveSalud"];
    $descripcionSalud = $_POST["descripcionSalud"];

    $proveedor = $_POST["proveedor"];


    if ($_FILES["imagenes"]["name"]!=null) {

        $ruta = 'imagenes';
        $tmp_name = $_FILES['imagenes']['tmp_name'];  
        $name = $_FILES["imagenes"]["name"];

        $fileParts = pathinfo($_FILES['imagenes']['name']);
        move_uploaded_file($tmp_name, "$ruta/$name");
        $direccion=utf8_encode("controller/php/".$ruta."/".$name);

        }else{
           $direccion = $_POST["imagenesH"];
        }

   $accion = new Guardar;
   $registro = $accion->update($idProducto, $nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $marca, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $salud, $claveSalud, $descripcionSalud, $proveedor);

    class Guardar{
    public function update($idProducto, $nombreComercial, $codigoBarra, $codigoReferencia, $observacion, $marca, $claveCuadroBasico, $descripcionCuadroBasico, $direccion, $descripcionImagen, $salud, $claveSalud, $descripcionSalud, $proveedor){

        $oConexion = new conectorDB; 
        $registrar = false; 
        $consulta = "UPDATE producto SET nomComercial = '$nombreComercial', codigoBarra = '$codigoBarra', codigoReferencia = '$codigoReferencia', observacion = '$observacion', claveCuadroBasico = '$claveCuadroBasico', descripcionCuadroBasico = '$descripcionCuadroBasico' WHERE idProducto = '$idProducto'";
        $registrar = $oConexion->consultarBD($consulta);
        

       // SE INSERTA LOS VALORES DE MARCAS 
            
        $insertaMarca = "UPDATE   tbl_marca SET marca = '$marca' WHERE idProducto = '$idProducto'";
        $registrar = $oConexion->consultarBD($insertaMarca);


        // VAOLORES DE PROVEEDORES DE PRODUCTOS

        $insertaProveedor = "UPDATE  tbl_proveedores SET proveedor = '$proveedor' WHERE idProducto = '$idProducto'";
        $registrar = $oConexion->consultarBD($insertaProveedor);


        // SE INSERTA LOS VALORES DEL SECTOR SALUD

        $insertaSalud = "UPDATE tbl_salud SET nombreInstitucion = '$salud', claveSalud = '$claveSalud', descripcionSalud = '$descripcionSalud' WHERE idProducto = '$idProducto'";

        $registrar = $oConexion->consultarBD($insertaSalud);


          $insertaFoto = "UPDATE imagen SET   direccion = '$direccion', tituloFoto = '$descripcionImagen' WHERE idProducto = '$idProducto'";
        $registrar = $oConexion->consultarBD($insertaFoto);
        

        if($registrar !== false){
            return true;
            $oConexion = null;
        }
        else{
            return false;
        }
    } 
  }
/*echo" <SCRIPT LANGUAGE='javascript'>"
                 . "    location.href = '../../administrador.php';"
                 . "    </SCRIPT>"
                 ."";     */
?> 