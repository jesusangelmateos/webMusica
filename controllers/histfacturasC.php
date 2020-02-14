<html>
<body>
<h1>HISTORIAL FACTURAS</h1>
<?php
session_start();
include ".././db/conexion.php";

require_once(".././models/histfacturasM.php");

require_once(".././views/histfacturasV.php");

?>
</BR></BR>
<input type="button" value="INICIO" onclick="window.location.href='.././controllers/pe_inicio.html'"></BR></BR>
</body>
</html>