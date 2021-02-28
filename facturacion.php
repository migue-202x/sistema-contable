<?php


session_start(); 

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <title>Contabilidad</title>
    
    <link rel="stylesheet" href="estilos/estilosfacturacion.css">


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

            <li><a class="a" href="ventas/clientes/clientes_index.php">
            <div class="contenedor" id="uno">
                <img class="icon" src="imagenes/planContableee.png">
                <p class="texto">CLIENTES</p>
            </div>
        </a></li>
		


        <li><a class="a" href="ventas/stock/stock_index.php">
            <div class="contenedor" id="dos">
                <img class="icon" src="imagenes/Unasiento.png">
                <p class="texto">STOCK</p>
            </div>
        </a></li>
		

        <li><a class="a" href="comprobantes/index_comprobante.php">
            <div class="contenedor" id="tres">
                <img class="icon" src="imagenes/Unasiento.png">
                <p class="texto">COMPROBANTES</p>
            </div>
        </a></li>
        


        <li><a class="a" href="comprobantes/salida_Libro_iva/Libroiva_index.php">
            <div class="contenedor" id="cuatro">
                <img class="icon" src="imagenes/ListarAsientos.png">
                <p class="texto">LISTADO L.IVA VTAS.</p>
            </div>
        </a></li>
		



<!--        <li><a class="a" href="">
            <div class="contenedor" id="cinco">
                <img class="icon" src="imagenes/balance.png">
                <p class="texto">Listado Balances</p>
            </div>
        </a></li>-->
	

        

<!--        <li><a class="a" href="">
            <div class="contenedor" id="seis">
                <img class="icon" src="imagenes/cuaderno.png">
                <p class="texto">Listado Libro Diario</p>
            </div>
        </a></li>-->
        
        <li><a class="a" href="index.php">
            <div class="contenedor" id="siete">
                <img class="icon" src="imagenes/salir.png">
                <p class="texto">SALIR</p>
            </div>
        </a></li>
		

	</header>

	

</body>
</html>



