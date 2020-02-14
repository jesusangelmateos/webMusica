<?php

$fechaDesde=strtotime($_REQUEST["fechaDesde"]);
$fechaDesde=date("Y-m-d", $fechaDesde);

$fechaHasta=strtotime($_REQUEST["fechaHasta"]);
$fechaHasta=date("Y-m-d", $fechaHasta);

$select="SELECT invoiceLine.TrackId from invoiceLine, invoice where invoiceLine.invoiceId=invoice.invoiceId and DATE_FORMAT(invoiceDate,'%Y-%m-%d')>='$fechaDesde' AND DATE_FORMAT(invoiceDate,'%Y-%m-%d')<='$fechaHasta' group by invoiceLine.TrackId order by sum(invoiceLine.Quantity) desc";  
$resultado=mysqli_query($db, $select);//el resultado no es valido, hay que tratarlo
$row=mysqli_fetch_assoc($resultado);

if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $canciones[]=$row['TrackId'];
    }
}

//var_dump($canciones);

if(!empty($canciones)){

    foreach ($canciones as $cancion) {
    
        $select="SELECT Track.Name, sum(invoiceLine.Quantity) as Quantity from invoiceLine, Track where Track.trackId=invoiceLine.trackId and Track.TrackId='$cancion' group by invoiceLine.TrackId";  
        $resultado=mysqli_query($db, $select);//el resultado no es valido, hay que tratarlo

        $row = mysqli_fetch_assoc($resultado); 
        $Name=$row['Name'];
        $Quantity=$row['Quantity'];

        $visualizaciones[]=[
            "Name"=>$Name, 
            "Quantity"=>$Quantity];
        

    }
}

//var_dump($visualizaciones);

//SELECT Track.Name, sum(invoiceLine.Quantity) as Quantity from invoiceLine, Track where Track.trackId=invoiceLine.trackId and Track.TrackId='1';

?>