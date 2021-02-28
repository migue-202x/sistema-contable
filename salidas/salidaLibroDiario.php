

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
    <h1 style="text-align:center;">Libro Diario</h1>
     
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


    if (isset($_SESSION['fechaLibDiario2'])) {
      // $desdefecha = $_SESSION['fechaLibDiario1'];
      $fechaing = $_SESSION['fechaLibDiario2'];

    }  


    $sqlejer = "SELECT empresas.* FROM empresas";
    $resultejer = mysqli_query($conn2, $sqlejer);
    $rowejer = mysqli_fetch_assoc($resultejer);

    // echo $rowejer['nombre']." ".$rowejer['fecha_Ini']." ".$rowejer['fecha_Fin'];
    $fechaini = $rowejer['fecha_Ini'];
    $fechafin = $rowejer['fecha_Fin'];

    //Query para ver ultimo ren
    $sqlmayor = "SELECT DATE_ADD(ult_fecha, INTERVAL 1 day) AS Desde, ult_renglon FROM mayor";
    $resultmayor = mysqli_query($conn, $sqlmayor);
    $rowmayor = mysqli_fetch_assoc($resultmayor);

    $renglon=$rowmayor['ult_renglon'];
    $desdefecha=$rowmayor['Desde'];

    //FECHA QUE INGRESO
    // $fechaing='2019-01-20';


    if ($fechafin>$fechaini) {
      if ($fechaing>$fechafin) {
        $hastafecha=$fechafin;
      }else{
        $hastafecha=$fechaing;
      }
    } else{
      $hastafecha=$fechaing;
    }


    //Query para traer asientoborrador
    $sql1 = "SELECT DISTINCT num_asiento, fecha_contable FROM asientodefinitivo WHERE fecha_contable BETWEEN '$desdefecha' AND '$hastafecha' ORDER BY fecha_contable";
    $result1 = mysqli_query($conn,$sql1);
    //Muestro asientoborrador
    
    while ($row1 = mysqli_fetch_assoc($result1)){
      echo "<hr>";
      echo "<table> <tr>";
      echo "<td><b>Fecha contable: </b>".$row1['fecha_contable']."</td>";
      echo "<td><b>Nro Asiento: </b>".$row1['num_asiento']."</td>";
      echo "</tr></table>";

      echo "<table>";
      echo "<tr> <th>N Reg</th> <th>Cta</th> <th>Nombre</th> <th>Su</th> <th>Se</th> <th>F. Vto</th> <th>Comp</th> <th>Leyenda</th> <th>Debe</th> <th>Haber</th> </tr>";
      //Tomo asiento para buscar renglones
      $nasiento=$row1['num_asiento'];
      //Query para traer renglones
      $sql2 = "SELECT asientodefinitivo.*, plandecuenta.nombre FROM asientodefinitivo INNER JOIN plandecuenta
       ON asientodefinitivo.cuenta=plandecuenta.id
       WHERE asientodefinitivo.num_asiento='$nasiento'";
      $result2 = mysqli_query($conn,$sql2);
      //Muestro renglones
      while ($row2 = mysqli_fetch_assoc($result2)){
        echo "<tr>";
        echo "<td>".$renglon++."</td>";
        echo "<td>".$row2['cuenta']."</td>";
        echo "<td>".$row2['nombre']."</td>";
        echo "<td>".$row2['cod_sucursal']."</td>";
        echo "<td>".$row2['cod_seccion']."</td>";
        echo "<td>".$row2['fecha_vto']."</td>";
        echo "<td>".$row2['comprobante']."</td>";
        echo "<td>".$row2['descripcion']."</td>";
        echo "<td align='right'>".round($row2['debe'],2,PHP_ROUND_HALF_UP)."</td>";
        echo "<td align='right'>".round($row2['haber'],2,PHP_ROUND_HALF_UP)."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    echo "<hr>";
    echo "<table>";
    $sqltransp = "SELECT SUM(debe), SUM(haber) FROM asientodefinitivo";
    $resulttransp = mysqli_query($conn, $sqltransp);
    $rowtrans = mysqli_fetch_assoc($resulttransp);
    echo "<tr> <td>--------------------------------------------------------
    <b>TRANSPORTE:</b> Debe ".round($rowtrans['SUM(debe)'],2,PHP_ROUND_HALF_UP)." </td> <td>Haber ".round($rowtrans['SUM(haber)'],2,PHP_ROUND_HALF_UP)."</tr>";
    echo "</table>";
    $sqlupdreng= "UPDATE mayor SET ult_fecha ='$hastafecha', ult_renglon='$renglon' WHERE mayor.id = 1";
    $conn->query($sqlupdreng);
   ?>
</body>
</html>

<!-- $sdoAcum=round($row3['SUM(asientodefinitivo.debe)']-$row3['SUM(asientodefinitivo.haber)'],2,PHP_ROUND_HALF_UP); -->





















