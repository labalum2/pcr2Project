<?php

function __construct($sLanguage) {
//
}
/**
 * Funcion connect, permite establecer la conexi�n con la base de datos.
 * @return la conexion
 */
public function connect(){
	$error = 'No se puede conectar a la BD';
	$connection=mysql_connect("localhost","root","") or die($error);
        mysql_select_db("11_myped_2",$connection) or die($error);
	return $connection;
}
		
/**
 * Funci�n disconnect, cierra la conexi�n con la base de datos.
 * @param connection es la conexi�n que se desea cerrar.
 */
public function disconnect($connection){
	mysql_close($connection);
}
		
/**
 * Funci�n consultation, sirve para obtener informaci�n de la base de datos.
 * El tipo de operaci�n es la siguiente: SELECT <campo> from <tabla> [where ...]
 * @param consultation es la consulta que se desea realizar a la base de datos.
 * @param connection es la conexi�n establecida.
 * @return informaci�n de la base de datos.
 */
public function consultation($consultation, $connection){
	$error = 'Operacion fallida:';
	$result=mysql_query($consultation,$connection) or die($error.':'.$consultation);
	if(mysql_num_rows($result)==0){   
		$result = "";
	}
        return $result;		
}

/**
 * Funci�n modify, sirve para modificar informaci�n de la base de datos. 
 * Se pueden borrar datos: DELETE FROM <tabla> WHERE (<campo1> = <valor1> && <campo2> = <valor2> && ..)
 * insertar nuevos: INSERT INTO <tabla> <campo1, campo2 ..> VALUES <valor1, valor2 ..>
 * modificar antiguos: UPDATE <nombre_tabla> SET  <campo1> = <valor1>{[,<campo2> = <valor2>,...,<campoN> = <valorN>]}[ WHERE <condicion>]; 
 * @param sentence es la acci�n que se desea realizar a la base de datos.
 * @param connection es la conexi�n establecida.
 * @return result de la operaci�n.
 */
public function modify($sentence, $connection){
	$result = mysql_query($sentence,$connection);
	return $result;
}
		
?>
