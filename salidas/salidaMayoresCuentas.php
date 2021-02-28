
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
    <h1 style="text-align:center;">Mayores de cuentas</h1>
     
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

    if (isset($_SESSION['fecha1'])) {
            $desdefecha = $_SESSION['fecha1'];
            $hastafecha = $_SESSION['fecha2'];
   
    } 


    // $f = explode('-', $esta_FechaContable);
    // $fecha_contable = $f[2]."-".$f[1]."-".$f[0];






    echo "<p style='text-align:center;'>Desde: ".$desdefecha." Hasta: ".$hastafecha."</p>";
    
    //Query para traer plandecuenta
    $sql1 = "SELECT id, codigo, nombre FROM plandecuenta WHERE Tipo='1'";
    $result1 = mysqli_query($conn,$sql1);
    //Muestro plandecuenta
    while ($row1 = mysqli_fetch_assoc($result1)){
      echo "<hr>";
      echo "<table> <div style='background-color:gray;'> <tr>";
      echo "<td><b>N cta: </b>".$row1['id']."</td>";
      echo "<td><b>Cuenta: </b>".$row1['codigo']." ".$row1['nombre']."</td>"; 
      echo "</tr></div></table>";
      echo "<table><tr>";
      echo "<th>As</th> <th>Re</th> <th>Fecha con</th> <th>Fecha vto</th> <th>Comprob</th> <th>Su</th> <th>Se</th> <th>Leyenda</th> <th>Debitos</th> <th>Creditos</th> <th>Saldo</th> </tr>";

      //Tomo el id de la cuenta para buscar sus asientoborrador
      $idcuenta=$row1['id'];
      //Query para traer asientoborrador
      $sql2 = "SELECT * FROM asientodefinitivo WHERE cuenta='$idcuenta' AND fecha_contable BETWEEN '$desdefecha' AND '$hastafecha' ORDER BY fecha_contable";
      $result2 = mysqli_query($conn,$sql2);
      //Query para traer subtotal/total de periodo
      $sql2a = "SELECT SUM(debe), SUM(haber) FROM asientodefinitivo WHERE cuenta='$idcuenta' AND fecha_contable BETWEEN '$desdefecha' AND '$hastafecha' ORDER BY fecha_contable";
      $result2a = mysqli_query($conn,$sql2a);
      $row2a = mysqli_fetch_assoc($result2a);
      //Query para traer saldo anterior
      $sqla = "SELECT SUM(debe), SUM(haber) FROM asientoborrador WHERE cuenta='$idcuenta' AND fecha_contable<'$desdefecha'";
      $resulta = mysqli_query($conn,$sqla);
      $rowa = mysqli_fetch_assoc($resulta);
      $saldo=$rowa['SUM(debe)']-$rowa['SUM(haber)'];
      //Si hay saldo anterior lo muestro
      if ($rowa['SUM(debe)'] !== null or $rowa['SUM(haber)'] !== null) {
        echo "<tr> <td></td><td></td><td>".$desdefecha."</td> <td></td><td></td><td></td><td></td><td>Saldo anterior</td> <td align='right'>".$rowa['SUM(debe)']."</td><td align='right'>".$rowa['SUM(haber)']."</td><td align='right'>".$saldo."</td> </tr>";
      }
      //Muestro asiento
      while ($row2 = mysqli_fetch_assoc($result2)){
        $saldo=$saldo+$row2['debe']-$row2['haber'];
        echo "<tr>";
        echo "<td>".$row2['num_asiento']."</td>";
        echo "<td>".$row2['num_renglon']."</td>";
        echo "<td>".$row2['fecha_contable']."</td>";
        echo "<td>".$row2['fecha_vto']."</td>";
        echo "<td>".$row2['comprobante']."</td>";
        echo "<td>".$row2['cod_sucursal']."</td>";
        echo "<td>".$row2['cod_seccion']."</td>";
        echo "<td>".$row2['descripcion']."</td>";
        echo "<td align='right'>".round($row2['debe'],2,PHP_ROUND_HALF_UP)."</td>";
        echo "<td align='right'>".round($row2['haber'],2,PHP_ROUND_HALF_UP)."</td>";
        echo "<td align='right'>".round($saldo,2,PHP_ROUND_HALF_UP)."</td>";
        echo "</tr>";
      }
      //Muestro subtotal y total dependiendo de si hubo o no saldo anterior
      $dif=round($row2a['SUM(debe)']-$row2a['SUM(haber)'],2,PHP_ROUND_HALF_UP);
      if ($rowa['SUM(debe)'] !== null or $rowa['SUM(haber)'] !== null) {
        echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>SUBTOTAL</td><td align='right'>".round($row2a['SUM(debe)'],2,PHP_ROUND_HALF_UP)."</td><td align='right'>".round($row2a['SUM(haber)'],2,PHP_ROUND_HALF_UP)."</td><td align='right'>".$dif."</td></tr>";
        $totaldebe=$row2a['SUM(debe)']+$rowa['SUM(debe)'];
        $totalhaber=$row2a['SUM(haber)']+$rowa['SUM(haber)'];
      } else {
        $totaldebe=round($row2a['SUM(debe)'],2,PHP_ROUND_HALF_UP);
        $totalhaber=round($row2a['SUM(haber)'],2,PHP_ROUND_HALF_UP);
      }
      $total=round($totaldebe-$totalhaber,2,PHP_ROUND_HALF_UP);
        echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>TOTAL</td><td align='right'>".$totaldebe."</td><td align='right'>".$totalhaber."</td><td align='right'>".$total."</td></tr>";
      echo "</table>";
    }
  ?>  
</body>
</html>



<!-- $sdoAcum=round($row3['SUM(asientodefinitivo.debe)']-$row3['SUM(asientodefinitivo.haber)'],2,PHP_ROUND_HALF_UP); -->


















