<?php

//Funciones
function obtenerCanciones($db){
    $canciones = array();

    $sql = "SELECT Name FROM track limit 10";

    $resultado = mysqli_query($db, $sql);
    if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$canciones[] = $row['Name'];
		}
	}
	return $canciones;
}

?>