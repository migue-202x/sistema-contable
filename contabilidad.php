<?php


session_start(); 

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <title>Contabilidad</title>
    
    <link rel="stylesheet" href="estilos/estiloscontabilidad.css">


</head>



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

	<header>

        <li><a class="a" href="plandecuenta/index_pdc.php">
            <div class="contenedor" id="uno">
                <img class="icon" src="imagenes/planContableee.png">
                <p class="texto">PLAN CONTABLE</p>
            </div>
        </a></li>
		


        <li><a class="a" href="asiento/index_asiento.php">
            <div class="contenedor" id="dos">
                <img class="icon" src="imagenes/Unasiento.png">
                <p class="texto">ASIENTOS</p>
            </div>
        </a></li>
		



        <li><a class="a" href="salidas/MayoresCuentas.php">
            <div class="contenedor" id="tres">
                <img class="icon" src="imagenes/listadoMayor.png">
                <p class="texto">Listado Mayores</p>
            </div>
        </a></li>
		



        <li><a class="a" href="salidas/ListadoAsientos.php">
            <div class="contenedor" id="cuatro">
                <img class="icon" src="imagenes/ListarAsientos.png">
                <p class="texto">Listado Asientos</p>
            </div>
        </a></li>
		



        <li><a class="a" href="salidas/ListadoBalances.php">
            <div class="contenedor" id="cinco">
                <img class="icon" src="imagenes/balance.png">
                <p class="texto">Listado Balances</p>
            </div>
        </a></li>
	

        

        <li><a class="a" href="salidas/ListadoLibroDiario.php">
            <div class="contenedor" id="seis">
                <img class="icon" src="imagenes/cuaderno.png">
                <p class="texto">Listado Libro Diario</p>
            </div>
        </a></li>
        
        <li><a class="a" href="index.php">
            <div class="contenedor" id="siete">
                <img class="icon" src="imagenes/salir.png">
                <p class="texto">SALIR</p>
            </div>
        </a></li>
		

	</header>

	

</body>
</html>



 <!-- <ul id="numSeat" class="dropdown-menu">
                                            <li><a class="a" href="salidas/MayoresCuentas.php">LISTADOS MAYORES</a></li>
                                            <li><a class="a" href="salidas/ListadoAsientos.php">LISTADOS ASIENTOS</a></li>
                                            <li><a class="a" href="salidas/ListadoBalances.php">LISTADOS BALANCES</a></li>
                                            <li><a class="a" href="salidas/ListadoLibroDiario.php">LISTADOS LIBRO DIARIO</a>
                                        </ul>

 -->

