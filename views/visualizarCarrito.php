<html>
<body>
<?php
	echo "<h2>CARRITO</h2>";

	$totalCompra=0;


	foreach ($_SESSION['carrito'] as $idCancion => $nombreCancion){

		$select="SELECT unitPrice from track where trackId='$idCancion'";  
		$resultado=mysqli_query($db, $select);//el resultado no es valido, hay que tratarlo
		$row=mysqli_fetch_assoc($resultado);
		$precio=$row['unitPrice'];

		$totalCompra=$totalCompra+$precio;

		echo 'Cancion: '.$nombreCancion.' || ID-Cancion: '.$idCancion.' || Precio: '.$precio.'</br></br>';
   
	}
	echo "Totla Compra: $totalCompra";
	
	$_SESSION['totalCompra']=$totalCompra;
    var_dump($_SESSION["carrito"]);

?>
	<!--<form action="resumenCompra.php" method="post">
		<input type="submit" value="FINALIZAR COMPRA">
	</form>-->
	<input type="button" value="FINALIZAR COMPRA" onclick="window.location.href='.././controllers/resumenCompraC.php'">
</body>
</html>