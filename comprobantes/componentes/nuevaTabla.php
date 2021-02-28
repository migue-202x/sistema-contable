<?php

session_start(); 

?>





<html>


    <body>
    
<div class="col-sm-12 classint">

                      
    <h2 align="center">DETALLE DE CUENTAS</h2>

    <div class="row">
    <table class="table table-condensed table-bordered classTable" id="tablaDinamicaLoad">
        <thead>
            <tr>
                <td hidden>ID</td>
                <!-- <td>Nº RENGLON</td> -->
                <td>Código</td>
                <td></td>
                <td>Descripción Art.</td>
                <td>Precio Unitario</td>
                <td>Cantidad</td>
                <td>% Bonificación</td>
                <td>Tasa IVA</td>
                <td>Imp. internos</td>
                <td>Subtotales</td>
                <td></td>
            </tr>
        </thead>
        
        <tbody>


                                <!-- ROW DE LA TABLA QUE NO SE DESPLIEGA -->
                                <tr id="row_first">
                                
                    
                                    <td hidden>
                                        <input type="text"  id="id_first" value="" disabled class="inpWhite">
                                    </td>
                        
                                    <td>
                                        <input type="text" id="deploy_first" value="" onkeyup="functionDeploy('first')">
                                    
                                    </td>
                                    <td>
                                        <button id="plusRow_first" class="btn btn-info btn-lg active" onclick="FirstRowNewComp()"><span class="glyphicon glyphicon-plus"></span></button>
                                    </td>
                                    <td>
                                        <input type="text"  id="descripcion_first" value="" size="44" disabled class="inpGreen">
                                    </td>
                                    <td>
                                        <input type="text"  id="precioUnit_first" value="" disabled class="inpGreen">
                                    </td>
                                    <td>
                                    <!-- ---------------------------------------- -->
                                            <input id="cantidad_first" value="" type="text" class="form-control input-lg" size="17">
<!--                                        <input id="cantidad_first" value="" type="text" class="form-control input-lg" size="17" onkeyup="focusPrimerCantidad()">-->
                                                                    
                                        <!-- ----------------------------------------------- -->
                                    </td>
                                    <td>
                                    <!-- ---------------------------------------- -->
                                        <input id="bonificacion_first" value="" type="text" size="15" disabled class="inpGreen">
                                                                    
                                        <!-- ----------------------------------------------- -->
                                    </td>
                                    <td>
                                        <input type="text"  id="tasaIVA_first" value="" disabled class="inpGreen">
                                    </td>
                                    <td>
                                        <input type="text"  id="impInternos_first" value="" disabled class="inpGreen">
                                    </td>
                                    <td>
                                        <input type="text"  id="subtotales_first" value="" disabled class="inpGreen">
                                    </td>
                                    <td>
                                        <button id="minusRow" class="btn btn-danger btn-lg" onclick="subtractrowFirst()"><span class="glyphicon glyphicon-minus"></span></button>
                                    </td>

                                </tr>
                            
                                
                                    <!-- <div id="plusRow"></div> -->

        </tbody>
    </table>

    </div>
    </div>
    <!-- </div> -->
    <!-- class int -->
    <table class="table containerInt">

        
        <tbody>
                                <!-- ROW DE LA TABLA QUE NO SE DESPLIEGA -->
                                <tr class="classGray">
                            
                                    <td>
                                        <input type="text" class="form-control input-lg colorTot" value="TOTAL" disabled>
                                    </td>
                                    <td>
                                        <input id="inpTotal" type="text" class="form-control input-lg inpResultTotales" value="" disabled size="11">
                                    </td>
                                </tr>
                            
                                    <!-- <div id="plusRow"></div> -->

        </tbody>
    </table>

    <!-- class ext         -->

    <!-- BOTONOES DE REGISTRAR Y LIMPIAR -->

    <!-- <div  class="container classext"> -->
    <div class="form-inline">
    <div class="form-group">  
        <div class="input-group">
            <button class="btn btn-success btn-lg active" onclick="saveComprobante()">EMITIR COMPROBANTE <span class="glyphicon glyphicon-ok"></span></button>
        </div>

<!--        <div class="input-group">
            <button id="" class="btn btn-primary btn-lg" onclick="preguntarRegisterOk()" style="margin-left: 40px">Registrar <span class="glyphicon glyphicon-upload"></span></button>
        </div>-->

        <div class="input-group" id="adherir">
            <button id="cancelReload" class="btn btn-danger btn-lg" onclick="pregutarSiNo()" style="margin-left: 50px">Cancelar <span class="glyphicon glyphicon-repeat"></span></button>
        </div>
         <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    </div>    
    <!-- </div> -->

</body>
</html>
