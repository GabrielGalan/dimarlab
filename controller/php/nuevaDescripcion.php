<?php
include("clase.php");
    //error_reporting(E_ALL ^ E_NOTICE);
    $idProducto = $_POST['idProducto'];
    $salud = $_POST["salud"];
    $claveSalud = $_POST["claveSalud"];
    $descripcionSalud = $_POST["descripcionSalud"];


   $inserta = new Guardar;
   $registro = $inserta->registrar($idProducto, $salud, $claveSalud, $descripcionSalud);

    class Guardar{
    public function registrar($idProducto, $salud, $claveSalud, $descripcionSalud){

        $oConexion = new conectorDB; 
        $registrar = false; 
        $insertaSalud = "INSERT INTO tbl_salud(idProducto, nombreInstitucion, claveSalud, descripcionSalud)
                    VALUES (:idProducto, :nombreInstitucion, :claveSalud, :descripcionSalud)";
        $valoresSalud = array(
                        "idProducto"=>$idProducto,
                        "nombreInstitucion"=>$salud,
                        "claveSalud"=>$claveSalud,
                        "descripcionSalud"=>$descripcionSalud);
        $registrar = $oConexion->consultarBD($insertaSalud, $valoresSalud);

        if($registrar !== false){
            return true;
            $oConexion = null;
        }
        else{
            return false;
        }
    } 
  }
  echo" <SCRIPT LANGUAGE='javascript'>"
                 . "    location.href = '../../administrador.php';"
                 . "    </SCRIPT>"
                 ."";   

?> 