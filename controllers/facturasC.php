<html>
<body>
<h1>HISTORIAL FACTURAS ENTRE DOS FECHAS</h1>
<?php
session_start();
include ".././db/conexion.php";

?>
<form action="" method="POST">
    <div>
        <label for="fechaIni">FECHA DESDE:</label>
        <input type="date" name="fechaDesde" placeholder="fecha de inicio">
    </div>
    <div></br>
        <label for="fechaFin">FECHA HASTA:</label>
        <input type="date" name="fechaHasta" placeholder="fecha de fin">
    </div></br>
<input type="submit" value="MOSTRAR"></form>

<?php

$visualizaciones=array();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require_once(".././models/facturasM.php");

    require_once(".././views/histfacturasV.php");
}



?>
</BR></BR>
<input type="button" value="INICIO" onclick="window.location.href='.././controllers/pe_inicio.html'"></BR></BR>
</body>
</html>