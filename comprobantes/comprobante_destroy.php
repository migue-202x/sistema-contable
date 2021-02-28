<?php


   $num_comprobante =  isset($_POST['num_comprobante']) ? $_POST['num_comprobante'] : "";


   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
   $stament = $conn->prepare('DELETE renglones_factura_borrador.* FROM renglones_factura_borrador');
   echo $stament->execute();




    

?>
