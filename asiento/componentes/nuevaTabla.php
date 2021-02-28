<?php

session_start(); 

// unset($_SESSION['typeApertura']);
//
// unset($_SESSION['typeCierre']);

  

?>





<html>


    <body>
    
<div class="col-sm-12">

                      
    <h2 align="center">DETALLE DE CUENTAS</h2>

    <div class="row">
    <table class="table table-condensed table-bordered classTable" id="tablaDinamicaLoad">
        <thead>
            <tr>
                <td hidden>ID</td>
                <!-- <td>Nº RENGLON</td> -->
                <td>CUENTA</td>
                <td></td>
                <td>NOMBRE DE CUENTA</td>
                <td>DESCRIPCIÓN</td>
                <td>FECHA OPERACIÓN</td>
                <td>FECHA VENCIMIENTO</td>
                <td>DEBE</td>
                <td>HABER</td>
                <td></td>
            </tr>
        </thead>
        
        <tbody>


                                <!-- ROW DE LA TABLA QUE NO SE DESPLIEGA -->
                                <tr id="row_first">
                                
                    
                                    <td hidden>
                                        <input type="text"  id="id_first" value="" disabled class="inpWhite">
                                    </td>

                                    <!-- <td>
                                        <input type="text"  id="renglon_first" value="" disabled size="4" class="inpGreen">
                                    </td> -->
                        
                                    <td>
                                        <input type="text" id="deploy_first" value="" onkeyup="functionDeploy('first')">
                                    
                                    </td>
                                    <td>
                                        <button id="plusRow_first" class="btn btn-info btn-lg active" onclick="FirstRowNew()"><span class="glyphicon glyphicon-plus"></span></button>
                                    </td>
                                    <td>
                                        <input type="text"  id="name_first" value="" disabled class="inpGreen">
                                    </td>
                                    <td>
                                        <input type="text"  id="descripcion_first" value="" size="44" placeholder="descripción...">
                                    </td>
                                    <td>
                                    <!-- ---------------------------------------- -->
                                        <input id="fechaOp_first" min="" value="" type="date" class="form-control input-lg" size="17">
                                                                    
                                        <!-- ----------------------------------------------- -->
                                    </td>
                                    <td>
                                    <!-- ---------------------------------------- -->
                                        <input id="fechaVto_first" min="" value="" type="date" class="form-control input-lg" size="15">
                                                                    
                                        <!-- ----------------------------------------------- -->
                                    </td>
                                    <td>
                                        <input type="text"  id="debe_first" value="" onclick="disableFirstHaber()" class="inpWhite">
                                    </td>
                                    <td>
                                        <input type="text"  id="haber_first" value="" onclick="disableFirstDebe()" class="inpWhite">
                                    </td>
                                    <td>
                                        <button id="minusRow" class="btn btn-danger btn-lg active" onclick="subtractrowFirst()"><span class="glyphicon glyphicon-minus"></span></button>
                                    </td>

                                </tr>
                            
                                
                                    <!-- <div id="plusRow"></div> -->

        </tbody>
    </table>

    </div>
    </div>
    <!-- </div> -->
    <!-- class int         -->
    <table class="table">

        
        <tbody>
                                <!-- ROW DE LA TABLA QUE NO SE DESPLIEGA -->
                                <tr class="classGray">
                            
                                    <td class="colorTot">
                                        <input class="colorTot" type="text" value="TOTALES $$" disabled size="13">
                                    </td>
                                    <td>
                                        <input id="inpDebe" type="text" class="inpResultTotales" value="" disabled size="11">
                                    </td>
                                    <td>
                                        <input id="inpHaber" type="text" class="inpResultTotales" value="" disabled size="11">
                                    </td>
                                    <td>
                                        ..........
                                    </td>

                                </tr>
                            
                                    <!-- <div id="plusRow"></div> -->

        </tbody>
    </table>

    <table class="table">

        
        <tbody>
                                <!-- ROW DE LA TABLA QUE NO SE DESPLIEGA -->
                                <tr class="classGray">
                                    <td class="colorDif">
                                        <input class="colorDif" type="text" value="DIFERENCIA $$" disabled size="13">
                                    
                                    </td>
                                    <td>
                                        <input id="totalDebe" type="text" class="inpResulDiferencia" value="" disabled size="11">
                                    </td>
                                    <td>
                                        <input id="totalHaber" type="text" class="inpResulDiferencia" value="" disabled size="11">
                                    </td>
                                    <td>
                                        ..........
                                    </td>

                                </tr>
                            
                                    <!-- <div id="plusRow"></div> -->

        </tbody>
    </table>

    <br>


    <br>
    <!-- class ext         -->

    <!-- BOTONOES DE REGISTRAR Y LIMPIAR -->

    <!-- <div  class="container classext"> -->
    <div class="form-inline">
    <div class="form-group">  
        <div class="input-group">
            <button id="" class="btn btn-success btn-lg" onclick="saveSeat()">Cargar <span class="glyphicon glyphicon-ok"></span></button>
        </div>

        <div class="input-group">
            <button id="" class="btn btn-primary btn-lg" onclick="preguntarRegisterOk()" style="margin-left: 40px">Registrar <span class="glyphicon glyphicon-upload"></span></button>
        </div>

        <div class="input-group" id="adherir">
            <button id="cancelReload" class="btn btn-danger btn-lg" onclick="pregutarSiNo()" style="margin-left: 40px">Cancelar <span class="glyphicon glyphicon-repeat"></span></button>
        </div>
    </div>
    </div>    
    <!-- </div> -->
    <br>

</body>
</html>

