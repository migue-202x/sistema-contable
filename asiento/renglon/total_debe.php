
<?php


session_start();


function getCodName(){

    //ESTOY ELIMINANDO CON SESSION..... Y JAMAZ TENGP SESSOPM SI NUNCA RETOME !!!!!!!!! 

    // $asiento = isset($_GET['numSeat'])? $_GET['numSeat']: "";

    $asiento = $_SESSION['asiento'];

    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare("SELECT SUM(debe) AS total FROM asientoborrador WHERE num_asiento= :num_asiento");
    $stament->bindParam(':num_asiento', $asiento);
    $stament->execute();


 
    $res = $stament->fetch();

    $total = $res['total'];

    $tot = round($total, 2, PHP_ROUND_HALF_ODD); 


    return  json_encode($tot);



}

echo getCodName();