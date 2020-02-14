<html>

<body>
<h1>DESCARGAR MUSICA</h1>
<?php
session_start();
include ".././db/conexion.php";

require_once(".././models/obtenerCanciones.php");
$canciones=obtenerCanciones($db);

echo '<form action="" method="post">';

?>
<!--Aplicacion-->
<div>
CANCIONES:
<select name="cancion">
		<?php foreach($canciones as $cancion) : ?>
					<option> <?php echo $cancion ?> </option>
				<?php endforeach; ?></select><br>
		</select>
</div></br>
<input type="submit" value="Añadir al Carrito">	
</BR></BR>
<input type="button" value="INICIO" onclick="window.location.href='.././controllers/pe_inicio.html'"></BR></BR>
<?php

if(!isset($_POST) || empty($_POST)){ //primera visualizacion sin pulsar nada

    require_once(".././views/visualizarCarrito.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") { //después de submit
   
	require_once(".././models/carrito.php");
	require_once(".././views/visualizarCarrito.php");
}
?>

</body>

</html>
