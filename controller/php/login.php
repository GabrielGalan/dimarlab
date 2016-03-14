<?php
//error_reporting(E_ALL ^ E_NOTICE);
require_once("reset.php");
require_once("clase.php");

ini_set("session_use_trans_sid",'0');
ini_set("session_use_cookies",'1');
ini_set("session_use_only_cookies",'1');
ini_set("register_globals",'Off');
ini_set("display_errors",'Off');
ini_set("log_errors","Off");

   $oConectar = new conectorDB; //instanciamos conector

ini_set('error_log','error/php_errors.log');

$usuario = $_POST['usuario'];
$pass = $_POST['contrasena'];
  //reemplazo caracteres
  $usuario=Seguridad::remplazo($usuario);
  $pass=Seguridad::remplazopass($pass);
  //encriptado
  $parseEncript = '3dd#ce#DVCD#SSE#d24';
  $password = hash('sha256', $parseEncript . $pass);

 $consulta = "SELECT at_user, at_pass, id_usuario, at_nombre FROM tbl_user WHERE at_user = '".$usuario."' AND at_pass = '".$password."'";
    $valores = null;
                                            
       $Vconsulta = $oConectar->consultarBD($consulta); 

if ($Vconsulta!=null) {
    session_start(); 
    foreach ($Vconsulta as $rows) { 
      $_SESSION['Usuario'] = $rows['at_user'];
      $_SESSION['idUsuario'] = $rows['id_usuario'];

         echo" <SCRIPT LANGUAGE='javascript'>"
                 . "    location.href = '../../administrador.php';"
                 . "    </SCRIPT>"
                 .""; 
    }
}else{
  echo" <SCRIPT LANGUAGE='javascript'>"."location.href = '../../index.php';"."</SCRIPT>"." ";
} 