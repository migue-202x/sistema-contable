

<?php


// LE DOY A SESSION Y LUEGO CARGO ESO QUE ESTA HECHO ...ES COMO FILTROCUENTAS

session_start(); 

$fecha1 =  isset($_GET['fecha1']) ? $_GET['fecha1'] : "";
$fecha2 =  isset($_GET['fecha2']) ? $_GET['fecha2'] : "";

$_SESSION['fecha1'] = $fecha1; 
$_SESSION['fecha2'] = $fecha2; 

echo json_encode($cadena); 
