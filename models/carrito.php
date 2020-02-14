<html>

<body>
<?php

    $cancion=$_REQUEST["cancion"];

    $sql="SELECT trackId, Name from track where Name= '$cancion'";//Ponerle un alias para el SUM
    $resultado=mysqli_query($db, $sql);//el resultado no es valido, hay que tratarlo
	$row=mysqli_fetch_assoc($resultado);
    $idCancion=$row['trackId'];
    $nombreCancion=$row['Name'];

    $_SESSION["carrito"][$idCancion]=$nombreCancion;

?>

</body>

</html>
