<?php

    $id =  isset($_POST['id']) ? $_POST['id'] : "";
   

   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');

   $stament = $conn->prepare('DELETE stock.* FROM stock where id=:id');
   $stament->bindParam(':id', $id);
   echo $stament->execute();
   $stament = null;


?>
