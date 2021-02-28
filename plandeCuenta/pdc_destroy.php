<?php

    $id =  isset($_POST['id']) ? $_POST['id'] : "";
   
   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');

   $stament = $conn->prepare('DELETE plandecuenta.* FROM plandecuenta where id=:id');
   $stament->bindParam(':id', $id);
   echo $stament->execute();
   $stament = null;
   
//-----------------------------------------------------------------------------------------------------------------------

//    $connect = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
//    $stament = $connect->prepare('SELECT * FROM plandecuenta WHERE id=:id');
//    $stament->bindParam(':id', $id);
//    $stament->execute();
//    
//
//    $res = $stament->fetch();
//  
//    $codigo = $res['codigo'];
//    $numero =  $res['numero'];
//    $nombre =  $res['nombre'];
//    $tipo =  $res['tipo'];
//
//    $stament = null;
////   -------------------------------------------------------------------------------------------------------------------------------
//    date_default_timezone_set('America/Argentina/Buenos_Aires');
//
//    $fecha=date("Y-m-d");
//    $hora=date("H:i:s");  
//    $usuario = $_SESSION['usuario'];
//    $accion = 'ELIMINAR';
//    
//    
//    $conn2 = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
//    $stament = $conn2->prepare('INSERT INTO auditoria_plandecuenta (codigo, numero, nombre, tipo, usuario, accion, fecha, hora) VALUES (:codigo, :numero, :nombre, :tipo, :usuario, :accion, :fecha, :hora)');
//    $stament->bindParam(':codigo', $codigo);
//    $stament->bindParam(':numero', $numero);
//    $stament->bindParam(':nombre', $nombre);
//    $stament->bindParam(':tipo', $tipo);
//    $stament->bindParam(':usuario', $usuario);
//    $stament->bindParam(':accion', $accion);
//    $stament->bindParam(':fecha', $fecha);
//    $stament->bindParam(':hora', $hora);
//    $stament->execute();
//    $stament = null;

// -------------------------------------------------------------------------------------------------------------------------
    

?>
