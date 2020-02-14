<?php

$fechaSolicitud=date("Y-m-d H:m:s");

$customerId = $_SESSION['customer'];
$totalCompra=$_SESSION['totalCompra'];

$select="SELECT max(InvoiceId) as maximo from invoice";  
$resultado=mysqli_query($db, $select);//el resultado no es valido, hay que tratarlo
$row=mysqli_fetch_assoc($resultado);
$invoiceId=$row['maximo']+1;

$sql="INSERT INTO invoice (InvoiceId, CustomerId, InvoiceDate, Total) VALUES ('$invoiceId','$customerId','$fechaSolicitud', '$totalCompra')";
if(mysqli_query($db, $sql)){
    echo 'INSERTADO EN TABLA invoice CORRECTAMENTE</br>';
}
else{
    echo "Error: ".$sql."<br>".mysqli_error($db)."<br>";
}

$canciones = array();//canciones de la compra
foreach ($_SESSION['carrito'] as $idCancion => $nombreCancion){
    
    $canciones[] = $idCancion;
    
}
//var_dump($canciones);

$cancionesPrecio=array();//array asociativo de cancion con precio
foreach ($canciones as $cancion){

    $select="SELECT unitPrice from track where trackId='$cancion'";  
    $resultado=mysqli_query($db, $select);//el resultado no es valido, hay que tratarlo
    $row=mysqli_fetch_assoc($resultado);
    $unitPrice=$row['unitPrice'];

    $cancionesPrecio["$cancion"] = $unitPrice;
    
}
//var_dump( $cancionesPrecio);

$select="SELECT max(InvoiceLineId) as maximo from invoiceLine";  
    $resultado=mysqli_query($db, $select);//el resultado no es valido, hay que tratarlo
    $row=mysqli_fetch_assoc($resultado);
    $InvoiceLineId=$row['maximo']+1;

foreach ($cancionesPrecio as $idCancion => $unitPrice){
    $sql="INSERT INTO InvoiceLine (InvoiceLineId, InvoiceId, TrackId, UnitPrice, Quantity) VALUES ('$InvoiceLineId','$invoiceId','$idCancion', '$unitPrice', '1')";

    $InvoiceLineId++;

    if(mysqli_query($db, $sql)){
        echo 'Registro INSERTADO EN TABLA InvoiceLine</br>';
    }
    else{
        echo "Error: ".$sql."<br>".mysqli_error($db)."<br>";
    }
}

//vaciar la cesta
$_SESSION["carrito"]=array();

?>