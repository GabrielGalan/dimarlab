<?php 
include 'controller/php/clase.php';
error_reporting(E_ALL ^ E_NOTICE);
 $idImagenEliminar = $_GET['idImagenEliminar'];

	$EliminaImagen = new Guardar;
   $registro = $EliminaImagen->registrar($idImagenEliminar);

    class Guardar{
      public function registrar($idImagenEliminar){

          $oConexion = new conectorDB; 
          $imagenServidor = "SELECT direccion FROM imagen WHERE idProducto = '$idImagenEliminar'"; 
          $cImagenServidor = $oConexion->consultarBD($imagenServidor);
           foreach ($cImagenServidor as $rows){ 
             $imagenServidorElimina = $rows['direccion'];

               if (!unlink($imagenServidorElimina)){
                   echo "no se pudo borrar el archivo :".$imagenServidorElimina;
                }
           }
            $elimina = "DELETE FROM imagen WHERE idProducto = '$idImagenEliminar'";
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