<?php 
    session_start(); 
    include('conexion.php'); // incluímos los datos de acceso a la BD 
    // comprobamos que se haya iniciado la sesión 
    if(isset($_SESSION['Usuario'])) { 
        session_destroy(); 
        echo" <SCRIPT LANGUAGE='javascript'>"
            . "		location.href = '../../index.php';"
            . "		</SCRIPT>"
            ."";
    }else { 
        echo "Operación incorrecta."; 
    } 
?> 