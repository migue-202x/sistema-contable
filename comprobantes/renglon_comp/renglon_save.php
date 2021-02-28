<?php
    session_start();
    
    $id_sw =  isset($_POST['id_sw']) ? $_POST['id_sw'] : ""; 
    $stock_id =  isset($_POST['id']) ? $_POST['id'] : ""; 
    $precio_neto =  isset($_POST['precio_neto']) ? $_POST['precio_neto'] : "";        
    $cantidad =  isset($_POST['cantidad']) ? $_POST['cantidad'] : ""; 
    $bonificacion =  isset($_POST['bonificacion']) ? $_POST['bonificacion'] : "";
    $iva =  isset($_POST['iva']) ? $_POST['iva'] : "";  
    $impuesto_interno =  isset($_POST['impuesto_interno']) ? $_POST['impuesto_interno'] : "";
    $subtotal =  isset($_POST['subtotal']) ? $_POST['subtotal'] : "";
    
    
//    $EsteSubtotal = str_replace(',', "", $subtotal);

    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare('INSERT INTO renglones_factura_borrador (id_sw, stock_id, precio_neto, cantidad, bonificacion, iva, impuesto_interno, subtotal) VALUES (:id_sw, :stock_id, :precio_neto, :cantidad, :bonificacion, :iva, :impuesto_interno, :subtotal)');
    $stament->bindParam(':id_sw', $id_sw);
    $stament->bindParam(':stock_id', $stock_id);
    $stament->bindParam(':precio_neto', $precio_neto);
    $stament->bindParam(':cantidad', $cantidad);
    $stament->bindParam(':bonificacion', $bonificacion);
    $stament->bindParam(':iva', $iva);
    $stament->bindParam(':impuesto_interno', $impuesto_interno);
    $stament->bindParam(':subtotal', $subtotal);
    echo $stament->execute();
    $stament = null;
    
//   ------------------------------------------------------------------------------------------------------
    
    $conn2 = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn2->prepare("SELECT MAX(encabezado_pie.id) AS mayor FROM encabezado_pie");
    $stament->execute();
    
    $res = $stament->fetch();
    $encabezado_pie_id = $res['mayor'] + 1;
    
//    -------------------------------------------------------------------------------------------------------
    
    $conn3 = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn3->prepare("UPDATE renglones_factura_borrador SET encabezado_pie_id=:encabezado_pie_id");
    $stament->bindParam(':encabezado_pie_id', $encabezado_pie_id);
    $stament->execute();

    $_SESSION['encabezado_pie_id'] = $encabezado_pie_id;
?>





