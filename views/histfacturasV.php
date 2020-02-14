<?php

if($visualizaciones){
    foreach ($visualizaciones as $visualizacion) {

        echo 'invoiceId: '.$visualizacion['InvoiceId'].' || Fecha: '.$visualizacion['InvoiceDate'].' || TotalCompra: '.$visualizacion['Total'].'</br>';

    }
}
else{
    echo 'EL CLIENTE NO TIENE COMPRAS ENTRE ESTAS FECHAS';
}

?>