<?php
  include 'dbh.php';

  session_start(); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 

    
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">  
    <link rel="stylesheet" type="text/css" href="../librerias/fonts/glyphicons-halflings-regular.woff2">
    <script src="../lib/jquery/jquery-1.9.1.min.js"></script> 
    <script src="../estilos/estilos.css"></script>

      <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <!-- <script src="../lib/jquery/jquery-1.9.1.min.js"></script>  -->

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <!-- <link rel="stylesheet" href="../estilos/estilos.css">  -->

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <!-- <link rel="stylesheet" href="../librerias/bootstrap/css/bootstrap.min.css">

    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

    <script src="../librerias/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="../librerias/bootstrap-datepicker/css/bootstrap-datepicker.css"> -->

        <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <!-- <link rel="stylesheet" href="../librerias/datetimepicker/css/bootstrap-datetimepicker.css">

    <script src="../librerias/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> -->

<body>
  
<link href="/estilos/estilos.css">
  <h1 style="text-align:center;">Listado de asientos</h1>
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

    if (isset($_SESSION['asiento1'])) {
        $desdeasiento = $_SESSION['asiento1'];
        $hastaasiento = $_SESSION['asiento2'];

    } 


    //Filtros para buscar asiento desde hasta
    // $desdeasiento=1;
    // $hastaasiento=8;
    $okcarga = ''; 

    echo "<p style='text-align:center;'>Desde asiento: ".$desdeasiento." Hasta asiento: ".$hastaasiento."</p>";
    //Query para traer asientoborrador
    $sql1 = "SELECT DISTINCT num_asiento, fecha_contable, okcarga, registrado, tipo_asiento FROM Asientoborrador WHERE num_asiento BETWEEN '$desdeasiento' AND '$hastaasiento'";
    $result1 = mysqli_query($conn,$sql1);
    //Muestro asiento
    while ($row1 = mysqli_fetch_assoc($result1)){
      if ($row1['okcarga']!=0) {
        $okcarga='Ok';
      } else {
        $okcarga='No';
      }
      if ($row1['registrado']!=0) {
        $registrado="Si";
      } else {
        $registrado='No';
      }
      if ($row1['tipo_asiento']==1) {
        $tipoasto="Apertura";
      } else {
        if ($row1['tipo_asiento']==2) {
          $tipoasto="Normal";
        } else {
          $tipoasto='Cierre';
        }
      }
      echo "<hr>";
      echo "<table> <tr>";
      echo "<td><b>Nro Asiento: </b>".$row1['num_asiento']."</td>";
      echo "<td><b>Fecha contable: </b>".$row1['fecha_contable']."</td>";
      echo "<td><b>Cargado: </b>".$okcarga."</td>";
      echo "<td><b>Registrado: </b>".$registrado."</td>";
      echo "<td><b>Tipo: </b>".$tipoasto."</td>";
      echo "</tr></table>";

      echo "<table> <tr>";
      echo "<th>Reng.</th> <th>N Cta</th> <th>Nombre Cta</th> <th>F. op</th><th>F. vto</th> <th>Comprob</th> <th>Su</th> <th>Se</th> <th>Leyenda</th> <th>Debe</th> <th>Haber</th> </tr>";
      //Tomo asiento para buscar renglones
      $nasiento=$row1['num_asiento'];
      //Query para traer renglones
      $sql2 = "SELECT * FROM asientoborrador INNER JOIN plandecuenta ON asientoborrador.cuenta=plandecuenta.id
       WHERE asientoborrador.num_asiento='$nasiento'";
      $result2 = mysqli_query($conn,$sql2);
      //Muestro renglones
      while ($row2 = mysqli_fetch_assoc($result2)){
        echo "<tr>";
        echo "<td>".$row2['num_renglon']."</td>";
        echo "<td>".$row2['cuenta']."</td>";
        echo "<td class='td1'>".$row2['nombre']."</td>";
        echo "<td>".$row2['fecha_op']."</td>";
        echo "<td>".$row2['fecha_vto']."</td>";
        echo "<td>".$row2['comprobante']."</td>";
        echo "<td>".$row2['cod_sucursal']."</td>";
        echo "<td>".$row2['cod_seccion']."</td>";
        echo "<td>".$row2['descripcion']."</td>";
        echo "<td align='right'>".round($row2['debe'],2,PHP_ROUND_HALF_UP)."</td>";
        echo "<td align='right'>".round($row2['haber'],2,PHP_ROUND_HALF_UP)."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
  ?>  


</body>
</html>


<!-- echo "<td align='right'>".round($row3['SUM(asientodefinitivo.debe)'],2,PHP_ROUND_HALF_UP)."</td>"; -->