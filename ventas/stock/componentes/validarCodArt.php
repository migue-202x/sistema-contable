<?php



 function getListasRep(){

    $cod_art =  isset($_POST['cod_art']) ? $_POST['cod_art'] : "";    
 

   $conn1 = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
   $stament = $conn1->prepare('SELECT COUNT(*) AS csntidad FROM stock WHERE stock.cod_art =:cod_art');
   $stament->bindParam(':cod_art', $cod_art);
   $stament->execute();
   
   $res = $stament->fetch();
   
   $cantidad = $res['csntidad'];
      
   return json_encode($cantidad);

 }
 
 echo getListasRep();
   
?>





