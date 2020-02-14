<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web compras</title>
</head>

<body>
<h1>ENTRAR</h1>
<?php
session_start();
include ".././db/conexion.php";

echo '<form action="" method="post">';

?>
<!--Aplicacion-->
<div>
EMAIL DEL USUARIO <input type="text" name="email" placeholder="email" class="form-control"><p>bjorn.hansen@yahoo.no</p>
</div>
<div>
CLAVE <input type="text" name="clave" placeholder="clave" class="form-control"><p>Hansen</p>
</div></br>
<input type="submit" value="ENTRAR">	
</BR>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST") { 

	require_once(".././models/pe_login2.php");
	
}
?>

</body>

</html>