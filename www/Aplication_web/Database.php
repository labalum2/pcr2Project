<?php

function __construct($sLanguage) {
//
}
/**
 * Funcion connect, permite establecer la conexión con la base de datos.
 * @return la conexion
 */
public function connect(){
	$error = 'No se puede conectar a la BD';
	$connection=mysql_connect("localhost","root","") or die($error);
        mysql_select_db("11_myped_2",$connection) or die($error);
	return $connection;
}
		
/**
 * Función disconnect, cierra la conexión con la base de datos.
 * @param connection es la conexión que se desea cerrar.
 */
public function disconnect($connection){
	mysql_close($connection);
}
		
/**
 * Función consultation, sirve para obtener información de la base de datos.
 * El tipo de operación es la siguiente: SELECT <campo> from <tabla> [where ...]
 * @param consultation es la consulta que se desea realizar a la base de datos.
 * @param connection es la conexión establecida.
 * @return información de la base de datos.
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
 * Función modify, sirve para modificar información de la base de datos. 
 * Se pueden borrar datos: DELETE FROM <tabla> WHERE (<campo1> = <valor1> && <campo2> = <valor2> && ..)
 * insertar nuevos: INSERT INTO <tabla> <campo1, campo2 ..> VALUES <valor1, valor2 ..>
 * modificar antiguos: UPDATE <nombre_tabla> SET  <campo1> = <valor1>{[,<campo2> = <valor2>,...,<campoN> = <valorN>]}[ WHERE <condicion>]; 
 * @param sentence es la acción que se desea realizar a la base de datos.
 * @param connection es la conexión establecida.
 * @return result de la operación.
 */
public function modify($sentence, $connection){
	$result = mysql_query($sentence,$connection);
	return $result;
}
		
?>
