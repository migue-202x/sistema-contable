<?php

 session_start(); 

    $id =  isset($_POST['id']) ? $_POST['id'] : "";
    $codigo =  isset($_POST['codigo']) ? $_POST['codigo'] : "";
    $numero =  isset($_POST['numero']) ? $_POST['numero'] : "";
    $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $tipo =  isset($_POST['tipo']) ? $_POST['tipo'] : "";

    
    $conn1 = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn1->prepare('UPDATE plandecuenta SET codigo=:codigo, numero=:numero, nombre=:nombre WHERE id=:id');
    $stament->bindParam(':codigo', $codigo);
    $stament->bindParam(':numero', $numero);
    $stament->bindParam(':nombre', $nombre);
    $stament->bindParam(':id', $id);
    echo $stament->execute();
    $stament = null;
//   -------------------------------------------------------------------------------------------------------------------------------
//      date_default_timezone_set('America/Argentina/Buenos_Aires');
//
//    $fecha=date("Y-m-d");
//    $hora=date("H:i:s");  
//    $usuario = $_SESSION['usuario'];
//    $accion = 'ACTUALIZAR';
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

 
//   ----------------------------------------------------------------------------------------------------------------------------
    
 
   
   
?>