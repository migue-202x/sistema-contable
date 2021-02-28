<?php

    $cod_art =  isset($_POST['cod_art']) ? $_POST['cod_art'] : "";  

    $descripcion =  isset($_POST['descripcion']) ? $_POST['descripcion'] : "";    
 
    $unidades =  isset($_POST['unidades']) ? $_POST['unidades'] : "";
    
    $costo_unitario =  isset($_POST['costo_unitario']) ? $_POST['costo_unitario'] : "";
    
    $precio_neto =  isset($_POST['precio_neto']) ? $_POST['precio_neto'] : "";
    
    $tipos_tasas_id =  isset($_POST['tipos_tasas_id']) ? $_POST['tipos_tasas_id'] : "";
    
    $impuesto_interno =  isset($_POST['impuesto_interno']) ? $_POST['impuesto_interno'] : "";
    
    $bonificacion =  isset($_POST['bonificacion']) ? $_POST['bonificacion'] : "";


   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
   $stament = $conn->prepare('INSERT INTO stock (cod_art, descripcion, unidades, costo_unitario, precio_neto, tipos_tasas_id, impuesto_interno, bonificacion) VALUES (:cod_art, :descripcion, :unidades, :costo_unitario, :precio_neto, :tipos_tasas_id, :impuesto_interno, :bonificacion)');
   $stament->bindParam(':cod_art', $cod_art);
   $stament->bindParam(':descripcion', $descripcion);
   $stament->bindParam(':unidades', $unidades);
   $stament->bindParam(':costo_unitario', $costo_unitario);
   $stament->bindParam(':precio_neto', $precio_neto);
   $stament->bindParam(':tipos_tasas_id', $tipos_tasas_id);
   $stament->bindParam(':impuesto_interno', $impuesto_interno);
   $stament->bindParam(':bonificacion', $bonificacion);
   echo $stament->execute();
   $stament = null;


 

?>





