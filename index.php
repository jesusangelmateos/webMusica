<?php
session_start();

include "./db/conexion.php";

// Llamada al controlador
if(isset($_SESSION['customer'])){ //si existe sesion iniciada
    header("Location: ./controllers/pe_inicio.html");
}
else{
    header("Location: ./controllers/pe_login.php");
}

?>