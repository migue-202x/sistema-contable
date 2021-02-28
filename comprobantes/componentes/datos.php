

<?php


function getCodName(){
        
    $codigo =  isset($_POST['code']) ? $_POST['code'] : "";


    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare('SELECT stock.*, tipos_tasas.porcentaje AS tipo_tasa FROM stock 
    INNER JOIN tipos_tasas ON stock.tipos_tasas_id = tipos_tasas.id WHERE cod_art=:codigo');
    $stament->bindParam(':codigo', $codigo);
    $stament->execute();

    $arrayView = array();
     
    while ($row = $stament->fetch()) {

        array_push($arrayView, $row);
    }


    return  json_encode($arrayView);
}

echo getCodName();