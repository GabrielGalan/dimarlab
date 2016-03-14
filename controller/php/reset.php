<?php
/**   
 * @author Programas dany
 * @copyright 2014
*/
ini_set("session_use_trans_sid",'0'); // para abilitar las session_use_cookies 
ini_set("session_use_cookies",'1');  // especifica si el módulo sólo usará cookies para almacenar el id de sesión en el cliente. Al habilitar esta opción, se impide ataques involucrados pasando identificadores de sesión en las URL. Este ajuste fue agregado en PHP 4.3.0. El valor predeterminado es 1 (habilitado) a partir de PHP 5.3.0.
ini_set("session_use_only_cookies",'1');
ini_set("register_globals",'Off');
ini_set("display_errors",'Off');
ini_set("log_errors","On");
ini_set("error_log','error/php_errors.log");
class Seguridad
		{
	    public static function remplazo($texto){
        $cambiar= str_replace( "'", " ", $texto );
        $cambiar= str_replace( "xp_", " ", $cambiar );
        $cambiar= str_replace( "XP_", " ", $cambiar );
        $cambiar= str_replace( "%", " ", $cambiar );
        $cambiar= str_replace( "like", " ", $cambiar );
        $cambiar= str_replace( "LIKE", " ", $cambiar );
        $cambiar= str_replace( "SCRIPT", " ", $cambiar );
        $cambiar= str_replace( "OBJECT", " ", $cambiar );
        $cambiar= str_replace( "APPLET", " ", $cambiar );
        $cambiar= str_replace( "EMBED", " ", $cambiar );
		$cambiar= str_replace( "CHAR", " ", $cambiar );
        $cambiar= str_replace( "-", " ", $cambiar );
        $cambiar= str_replace( "/*", " ", $cambiar );
        $cambiar= str_replace( "*/", " ", $cambiar );
        $cambiar= str_replace( "...", " ", $cambiar );
        $cambiar= str_replace( ";", " ", $cambiar );
        $cambiar= str_replace( "[", " ", $cambiar );
        $cambiar= str_replace( "]", " ", $cambiar );
        $cambiar= str_replace( "(", " ", $cambiar );
        $cambiar= str_replace( ")", " ", $cambiar );
        $cambiar= str_replace( "DROP", " ", $cambiar );
        $cambiar= str_replace( "TABLE", " ", $cambiar );
        $cambiar= str_replace( "DELETE", " ", $cambiar );
        $cambiar= str_replace( "INTO", " ", $cambiar );
        $cambiar= str_replace( "INSERT", " ", $cambiar );
        $cambiar= str_replace( "JOIN", " ", $cambiar );
        $cambiar= str_replace( ">", " ", $cambiar );
        $cambiar= str_replace( "<", " ", $cambiar );
        $cambiar= str_replace( "UPDATE", " ", $cambiar );
		$cambiar= str_replace( "ORDER", " ", $cambiar );
        return $cambiar;
    }
	public static function remplazopass($passw){
        $pass= str_replace( "'", " ", $passw );
        $pass= str_replace( "xp_", " ", $pass );
        $pass= str_replace( "XP_", " ", $pass );
        $pass= str_replace( "%", " ", $pass );
        $pass= str_replace( "like", " ", $pass );
        $pass= str_replace( "LIKE", " ", $pass );
        $pass= str_replace( "SCRIPT", " ", $pass );
        $pass= str_replace( "OBJECT", " ", $pass );
        $pass= str_replace( "APPLET", " ", $pass );
        $pass= str_replace( "EMBED", " ", $pass );
		$pass= str_replace( "CHAR", " ", $pass );
        $pass= str_replace( "-", " ", $pass );
        $pass= str_replace( "/*", " ", $pass );
        $pass= str_replace( "*/", " ", $pass );
        $pass= str_replace( "...", " ", $pass );
        $pass= str_replace( ";", " ", $pass );
        $pass= str_replace( "[", " ", $pass );
        $pass= str_replace( "]", " ", $pass );
        $pass= str_replace( "(", " ", $pass );
        $pass= str_replace( ")", " ", $pass );
        $pass= str_replace( "DROP", " ", $pass );
        $pass= str_replace( "TABLE", " ", $pass );
        $pass= str_replace( "DELETE", " ", $pass );
        $pass= str_replace( "INTO", " ", $pass );
        $pass= str_replace( "INSERT", " ", $pass );
        $pass= str_replace( "JOIN", " ", $pass );
        $pass= str_replace( ">", " ", $pass );
        $pass= str_replace( "<", " ", $pass );
        $pass= str_replace( "UPDATE", " ", $pass );
		$pass= str_replace( "ORDER", " ", $pass );		
        return $pass;
    }
}
?>