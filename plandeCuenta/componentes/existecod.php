<?php





function getListasRep(){

  $estecod =  isset($_POST['estecod']) ? $_POST['estecod'] : "";

  $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
  $stament = $conn->prepare('SELECT * FROM plandecuenta WHERE codigo =:codigo');
  $stament->bindParam(':codigo', $estecod);

  $stament->execute();
 
  
   $salida = "";
  
    if ($stament->rowCount()>0) {
        $salida .= "<span id='span' class='fas fa-times input-group'></span>";
    }else{
        $salida .= "<span id='span' class='fas fa-check'></span>";
       
    }

    
return $salida;
}

echo getListasRep();
     
     