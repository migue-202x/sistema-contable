
<?php

  session_start();

  unset($_SESSION['consulta']);

?>


<html>
    <head>
    <meta charset="UTF-8">
        
        <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
        
        <link rel="stylesheet" type="text/css" href="../librerias/datatable/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="../librerias/fonts/glyphicons-halflings-regular.woff2">
        
        <link rel="stylesheet" type="text/css" href="../librerias/select2/js/jquery-ui.css">
        
        
         
    
        <script src="../lib/jquery/jquery-1.9.1.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="../librerias/bootstrap/js/bootstrap.js"></script>
        <script src="../librerias/alertifyjs/alertify.js"></script>
        <script src="../librerias/select2/js/select2.js"></script>
        <script src="../librerias/datatable/jquery.dataTables.min.js"></script>
        
        <script src="../librerias/datatable/dataTables.bootstrap.min.js"></script>
        
        <script src="../librerias/select2/js/jquery-ui.js"></script>
   
        
       

    </head>
    <body>
  
        

    <form class="form-inline">
        <label class="sr-only" for="inlineFormInputName2">Name</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
        <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text">@</div>
          </div>
          <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
        </div>

        <div class="form-check mb-2 mr-sm-2">
          <input class="form-check-input" type="checkbox" id="inlineFormCheck">
          <label class="form-check-label" for="inlineFormCheck">
            Remember me
          </label>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
        
        
        
        
        
        
    </body>
    
</html>


