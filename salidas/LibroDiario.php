<?php
  include 'dbh.php';
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
    
    <title>Libro diario</title>
</head>

<header>
        <div id="header">
            <ul class="nav navbar-nav">
           
            <li><a class="a" href="../contabilidad.php">SALIR</a></li>
                       
            </ul>
        </div>    
</header>

<body>
  <link href="/estilos/estilos.css">
  <h3 style="text-align:center;">LIBRO DIARIO</h3>
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
    $sqlmayor = "SELECT * FROM mayor";
    $resultmayor = mysqli_query($conn, $sqlmayor);
    $rowmayor = mysqli_fetch_assoc($resultmayor);

    $renglon=$rowmayor['ult_renglon'];
    $desdefecha=$rowmayor['ult_fecha'];
    $hastafecha='2019-01-11';
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
        echo "<td>".$row2['debe']."</td>";
        echo "<td>".$row2['haber']."</td>";
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
    <b>TRANSPORTE:</b> Debe ".$rowtrans['SUM(debe)']." </td> <td>Haber ".$rowtrans['SUM(haber)']."</tr>";
    echo "</table>";
    //$sqlupdreng= "UPDATE mayor SET ult_fecha ='$fecha' WHERE mayor.id = 1";
    //$conn->query($sqlupdreng);
   ?>
</body>
</html>