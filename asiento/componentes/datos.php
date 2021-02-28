

<?php


function getCodName(){
        
    $codigo =  isset($_POST['code']) ? $_POST['code'] : "";


    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare('SELECT * FROM plandecuenta WHERE codigo=:codigo');
    $stament->bindParam(':codigo', $codigo);
    $stament->execute();

    $arrayView = array();
     
    while ($row = $stament->fetch()) {

        array_push($arrayView, $row);
    }


    return  json_encode($arrayView);
}

echo getCodName();