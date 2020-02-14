<?php
$customerId = $_SESSION['customer'];

$fechaDesde=strtotime($_REQUEST["fechaDesde"]);
$fechaDesde=date("Y-m-d", $fechaDesde);

$fechaHasta=strtotime($_REQUEST["fechaHasta"]);
$fechaHasta=date("Y-m-d", $fechaHasta);

echo "<h2>Para el cliente $customerId</h2>";

$select="SELECT InvoiceId, invoiceDate, Total from invoice, customer where invoice.customerId=customer.customerId and customer.customerId='$customerId' and DATE_FORMAT(invoiceDate,'%Y-%m-%d')>='$fechaDesde' AND DATE_FORMAT(invoiceDate,'%Y-%m-%d')<='$fechaHasta'";  
$resultado=mysqli_query($db, $select);//el resultado no es valido, hay que tratarlo
//$row=mysqli_fetch_assoc($resultado);

if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $invoiceId=$row['InvoiceId'];
        $invoiceDate=$row['invoiceDate'];
        
        $Total=$row['Total'];

        $visualizaciones[]=[
            "InvoiceId"=>$invoiceId, 
            "InvoiceDate"=>$invoiceDate,
            "Total"=>$Total];
    }
}
?>