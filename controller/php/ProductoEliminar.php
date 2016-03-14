<?php 
include 'clase.php';
error_reporting(E_ALL ^ E_NOTICE);
 $idImagenEliminar = $_GET['idImagenEliminar'];

 $direccion = "SIN URL";
 $descripcionImagen = "SIN DESCRIPCION";

	$EliminaImagen = new Guardar;
   $registro = $EliminaImagen->registrar($idImagenEliminar, $direccion ,$descripcionImagen);

    class Guardar{
      public function registrar($idImagenEliminar, $direccion ,$descripcionImagen){

          $oConexion = new conectorDB; 
          $imagenServidor = "SELECT direccion FROM imagen WHERE idProducto = '$idImagenEliminar'"; 
          $cImagenServidor = $oConexion->consultarBD($imagenServidor);
           foreach ($cImagenServidor as $rows){ 
             $imagenServidorEliminar = $rows['direccion'];
             echo $imagenServidorEliminar;
              rmdir($imagenServidorEliminar);
           }
            $elimina = "UPDATE imagen SET   direccion = '$direccion', tituloFoto = '$descripcionImagen' WHERE idProducto = '$idImagenEliminar'";
          $registrar = $oConexion->consultarBD($elimina);

          if($registrar !== false){
              return true;
              $oConexion = null;
          }
          else{
              return false;
          }
      } 
   }