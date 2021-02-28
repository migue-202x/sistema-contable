

<?php


// LE DOY A SESSION Y LUEGO CARGO ESO QUE ESTA HECHO ...ES COMO FILTROCUENTAS

session_start(); 




$fecha1 =  isset($_POST['fecha1']) ? $_POST['fecha1'] : "";
$fecha2 =  isset($_POST['fecha2']) ? $_POST['fecha2'] : "";

$_SESSION['fechaBal1'] = $fecha1; 
$_SESSION['fechaBal2'] = $fecha2; 

echo json_encode($cadena); 
