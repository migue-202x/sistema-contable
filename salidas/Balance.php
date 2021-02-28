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

    <title>Balance</title>
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
    $desdefecha='2019-01-01';
    $hastafecha='2019-01-11';

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
        WHERE asientodefinitivo.tipo_asiento='1' AND plandecuenta.codigo LIKE '$codActual%' AND asientodefinitivo.fecha_contable BETWEEN '$desdefecha' AND '$hastafecha'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $sdoIni=$row2['SUM(asientodefinitivo.debe)']-$row2['SUM(asientodefinitivo.haber)'];
        //Query de debitos y creditos
        $sql3 = "SELECT SUM(asientodefinitivo.debe), SUM(asientodefinitivo.haber) FROM asientodefinitivo INNER JOIN plandecuenta ON asientodefinitivo.cuenta=plandecuenta.id 
        WHERE asientodefinitivo.tipo_asiento='2' AND plandecuenta.codigo LIKE '$codActual%' AND asientodefinitivo.fecha_contable BETWEEN '$desdefecha' AND '$hastafecha'";
        $result3 = mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_assoc($result3);
        //Calculo saldo acumulado y cierre
        $sdoAcum=$row3['SUM(asientodefinitivo.debe)']-$row3['SUM(asientodefinitivo.haber)'];
        $scierre=$sdoIni+$sdoAcum;
        //Muestro
        echo "<tr>";
        echo "<td>".$row1['id']."</td>";
        echo "<td>".$row1['codigo']."</td>";
        echo "<td>".$row1['nombre']."</td>";
        echo "<td>".$sdoIni."</td>";
        echo "<td>".$row3['SUM(asientodefinitivo.debe)']."</td>";
        echo "<td>".$row3['SUM(asientodefinitivo.haber)']."</td>";
        echo "<td>".$sdoAcum."</td>";
        echo "<td>".$scierre."</td>";
        echo "</tr>";
      }
      echo "</table>";
  ?>     
</body>
</html>