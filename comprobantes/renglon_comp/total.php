
<?php


function getCodName(){

    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare("SELECT SUM(subtotal) AS total FROM renglones_factura_borrador");
    $stament->execute();

    $res = $stament->fetch();

    $total = $res['total'];

    $tot = round($total, 2, PHP_ROUND_HALF_ODD); 


    return  json_encode($tot);



}

echo getCodName();