
<?php

include 'dbh.php';
// include_once 'componentes/value.php';

session_start(); 

  
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
<!-- 
    
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">  
    <link rel="stylesheet" type="text/css" href="../librerias/fonts/glyphicons-halflings-regular.woff2">
    <script src="../lib/jquery/jquery-1.9.1.min.js"></script> 
    <script src="../estilos/estilos.css"></script> -->

      <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <script src="../lib/jquery/jquery-1.9.1.min.js"></script> 

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <link rel="stylesheet" href="../estilos/estilos.css">

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">

    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

    <script src="../librerias/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="../librerias/bootstrap-datepicker/css/bootstrap-datepicker.css">

        <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <link rel="stylesheet" href="../librerias/datetimepicker/css/bootstrap-datetimepicker.css">

    <script src="../librerias/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>



    
</head>



<body>
    <link href="/estilos/estilos.css">
    <h1 style="text-align:center;">Balance</h1>
     
    <style>
    th{
      padding-right: 20px;
    }  
    td{
        padding-right: 20px;
        overflow: hidden;
        }
    .td1{
      size: 300px;
    }
    body{
      max-width: 1000px;
    }
  </style>



    <?php
    //Filtros para buscar asiento desde hasta

    if (isset($_SESSION['fechaBal1'])) {
            $desdefecha = $_SESSION['fechaBal1'];
            $hastafecha = $_SESSION['fechaBal2'];
   
    } 


    // echo $desdefecha;
    // echo $hastafecha; 

    $fech = "2006-17-08";
    $fecha = explode("-", $fech);
    $dia = $fecha[1];
    $mes = $fecha[2];
    $anno = $fecha[0];
    
    /////////////////////////////////////////////////////////////////////////////////////

    // $desdefecha='2019-01-01';
    // $hastafecha='2019-01-11';

    echo "<p style='text-align:center;'>Desde: ".$desdefecha." Hasta: ".$hastafecha."</p>";
    echo "<table> <tr>";
    echo "<th>Cta.</th> <th>Codigo</th> <th>Nombre</th> <th>S. Inicial</th> <th>Debitos</th> <th>Creditos</th> <th>Sdo. acum.</th> <th>S. Cierre</th> </tr>";
    echo "<hr>";
    //Query de plan de plandecuenta
    $sql1 = "SELECT id, codigo, nombre FROM plandecuenta ORDER BY codigo";
    $result1 = mysqli_query($conn,$sql1);
    while ($row1 = mysqli_fetch_assoc($result1)){
        //Query de saldo inicial
        $codActual=$row1['codigo'];
        $sql2 = "SELECT SUM(asientodefinitivo.debe), SUM(asientodefinitivo.haber) FROM asientodefinitivo INNER JOIN plandecuenta ON asientodefinitivo.cuenta=plandecuenta.id 
        WHERE asientodefinitivo.tipo_asiento='Asiento Apertura' AND plandecuenta.codigo LIKE '$codActual%' AND asientodefinitivo.fecha_contable BETWEEN '$desdefecha' AND '$hastafecha'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $sdoIni=round($row2['SUM(asientodefinitivo.debe)']-$row2['SUM(asientodefinitivo.haber)'],2,PHP_ROUND_HALF_UP);
        //Query de debitos y creditos
        $sql3 = "SELECT SUM(asientodefinitivo.debe), SUM(asientodefinitivo.haber) FROM asientodefinitivo INNER JOIN plandecuenta ON asientodefinitivo.cuenta=plandecuenta.id 
        WHERE asientodefinitivo.tipo_asiento='Asiento Normal' AND plandecuenta.codigo LIKE '$codActual%' AND asientodefinitivo.fecha_contable BETWEEN '$desdefecha' AND '$hastafecha'";
        $result3 = mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_assoc($result3);
        //Calculo saldo acumulado y cierre
        $sdoAcum=round($row3['SUM(asientodefinitivo.debe)']-$row3['SUM(asientodefinitivo.haber)'],2,PHP_ROUND_HALF_UP);
        $scierre=round($sdoIni+$sdoAcum,2,PHP_ROUND_HALF_UP);
        //Muestro
        echo "<tr>";
        echo "<td>".$row1['id']."</td>";
        echo "<td>".$row1['codigo']."</td>";
        echo "<td>".$row1['nombre']."</td>";
        echo "<td align='right'>".$sdoIni."</td>";
        echo "<td align='right'>".round($row3['SUM(asientodefinitivo.debe)'],2,PHP_ROUND_HALF_UP)."</td>";
        echo "<td align='right'>".round($row3['SUM(asientodefinitivo.haber)'],2,PHP_ROUND_HALF_UP)."</td>";
        echo "<td align='right'>".$sdoAcum."</td>";
        echo "<td align='right'>".$scierre."</td>";
        echo "</tr>";
      }
      echo "</table>";
  ?>     
</body>
</html>






















