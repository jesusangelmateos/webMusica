<?php

if($visualizaciones){
    foreach ($visualizaciones as $visualizacion) {

        echo 'Name: '.$visualizacion['Name'].' || Quantity: '.$visualizacion['Quantity'].'</br>';

    }
}
else{
    echo 'NO HAY DESCARGAS ENTRE ESTAS FECHAS';
}

?>