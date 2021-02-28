

<?php


// LE DOY A SESSION Y LUEGO CARGO ESO QUE ESTA HECHO ...ES COMO FILTROCUENTAS

session_start(); 

$asiento1 =  isset($_GET['asiento1']) ? $_GET['asiento1'] : "";
$asiento2 =  isset($_GET['asiento2']) ? $_GET['asiento2'] : "";

$_SESSION['asiento1'] = $asiento1; 
$_SESSION['asiento2'] = $asiento2; 

echo json_encode($asiento2); 
