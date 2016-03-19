<?php 
session_start();
require_once("controller/php/clase.php");

if(isset($_SESSION['Usuario']) && empty($_POST['idUsuario'])){
  $nombre = $_SESSION['Usuario'];

  ini_set("session_use_trans_sid",'0');
  ini_set("session_use_cookies",'1');
  ini_set("session_use_only_cookies",'1');
  ini_set("register_globals",'Off');
  ini_set("display_errors",'Off');
  ini_set("log_errors","On");
  ini_set("error_log','error/php_errors.log");

  $usuario = $_SESSION['Usuario'];
  $idUsuario = $_POST['idUsuario'];
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema de consulta de productos DIMARLAB</title>
<link href="view/css/fileinput.min.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
 <link rel="stylesheet" href="dist/css/bootstrap-select.css">
<link href="view/css/style.css" rel="stylesheet"> 
<script src="view/js/jquery-1.11.3.min.js"></script>
<script src="dist/js/bootstrap-select.js"></script> 
<script src="view/js/bootstrap.min.js"></script>
<script src="view/js/script.js"></script>
<script src="model/js/script.js"></script>
<script>
    function ordenarSelect(id_componente)
    {
      var selectToSort = jQuery('#' + id_componente);
      var optionActual = selectToSort.val();
      selectToSort.html(selectToSort.children('option').sort(function (a, b) {
        return a.text === b.text ? 0 : a.text < b.text ? -1 : 1;
      })).val(optionActual);
    }
    $(document).ready(function () {
      ordenarSelect('marca');
    });
  </script>
  <script type="text/javascript">
  function closeActualiza () {
    location.reload();
  }

  </script>
</head>
<?php 
 include 'view/cotenidoAdmin.php';

 }else{
  echo" <SCRIPT LANGUAGE='javascript'>"
            . "		location.href = 'index.php';"
            . "		</SCRIPT>"
            ."";
 }
  ?>