<?php
$customerId = $_SESSION['customer'];

echo "<h2>Para el cliente $customerId</h2>";

$select="SELECT InvoiceId, invoiceDate, Total from invoice, customer where invoice.customerId=customer.customerId and customer.customerId='$customerId'";  
$resultado=mysqli_query($db, $select);//el resultado no es valido, hay que tratarlo
$row=mysqli_fetch_assoc($resultado);

if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $invoiceId=$row['InvoiceId'];
        $invoiceDate=$row['invoiceDate'];
        $Total=$row['Total'];

        $visualizaciones[]=[
            "InvoiceId"=>$invoiceId, 
            "InvoiceDate"=>$invoiceDate,
            "Total"=>$Total];

        //echo "invoiceId: $invoiceId || Fecha: $invoiceDate || TotalCompra: $Total</br>";
    }
}
?>