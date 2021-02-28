<?php


  session_start(); 


  include 'dbh.php';
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


<header>
        <div id="header">
                    <ul class="nav navbar-nav">

                        <li><a class="btn btn-primary btn-lg" href="../contabilidad.php">SALIR</a></li>
    
                            
                    </ul>
        </div>  

    </header>

<body class="mainBody">
<div class="logoContornoWhite">
            <div class="logo">
                <div class="nombreEmpresa">
                    <?php echo 'EMPRESA: '.'"'.$_SESSION['empresa.nombre'].'"';?>
                    <br>
                    <br>
                    <?php echo 'USUARIO: '.'"'.$_SESSION['usuario'].'"';?>
                    
                </div>
            </div>
        </div>


  <link href="/estilos/estilos.css">
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

                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">  
                                <div class="input-group">
                                <label class="labelWhite">Ingresar para listar Asientos: </label>
                                <br><br>
                                  <div class="input-daterange input-group fj-date" id="datepicker">   
                                    <span class="input-group-addon">Desde: </span>  
                                    <input id="asiento1" type="text" class="input-sm form-control" name="start" size="2"/>
                                    <span class="input-group-addon">hasta: </span>
                                    <input id="asiento2" type="text" class="input-sm form-control" name="end" size="2"/>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-3">
                  <button id="numSeat" type="text" class="btn btn-success btn-lg">Filtrar</button>
                </div>


</body>
</html>



<script type="text/javascript">
         
 $(document).ready(function () {

  // $('.fj-date').datepicker({
  //     format: "yyyy/mm/dd",
  //     maxViewMode: 2,
  //     calendarWeeks: true
  // });



  $('#numSeat').click(function () {
  // $('#modal-date').modal();
      asiento1 = $('#asiento1').val(); 
      asiento2 = $('#asiento2').val(); 

      console.log(asiento1);
      console.log(asiento2);

      cadena = "asiento1=" + asiento1 + 
               "&asiento2=" + asiento2;

              
      $.ajax({
        type: "GET",
        url: "setAsientos.php",
        data: cadena,
        })
        .done(function(resultado){

          res = JSON.parse(resultado);

          console.log(res);
          window.location.href = "salidaListadoAsientos.php";
   
              // $.get( "salidaListadoAsientos.php", function(dataHTML) {
              //   $('#listarAsientos').empty().html(dataHTML);

              //   });
        })
        .fail(function(resultado){
          console.log('UN PROBLEMIN')
        });


    
     
   });
 



});

</script>
