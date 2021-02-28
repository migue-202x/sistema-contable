<?php

session_start();


    $tipo_asiento =  isset($_POST['tipo_asiento']) ? $_POST['tipo_asiento'] : ""; 

    $fecha_contable =  isset($_POST['fecha_contable']) ? $_POST['fecha_contable'] : "";       
    $descripcion =  isset($_POST['descripcion']) ? $_POST['descripcion'] : "";    
    $fecha_op =  isset($_POST['fecha_op']) ? $_POST['fecha_op'] : "";  
    $fecha_vto =  isset($_POST['fecha_vto']) ? $_POST['fecha_vto'] : "";  


    $id =  isset($_POST['id']) ? $_POST['id'] : "";

    $id_sw =  isset($_POST['id_sw']) ? $_POST['id_sw'] : "";

    // $cuenta =  isset($_POST['cuenta']) ? $_POST['cuenta'] : "";
    $name =  isset($_POST['name']) ? $_POST['name'] : "";
    $debe =  isset($_POST['debe']) ? $_POST['debe'] : "";
    $haber =  isset($_POST['haber']) ? $_POST['haber'] : "";
    $cargado =  isset($_POST['cargado']) ? $_POST['cargado'] : "";

    $esteDebe = str_replace(',', "", $debe);

    $esteHaber = str_replace(',', "", $haber);

    // $okCarga = 0; 

//     ---------------------------------------------------------------------------------------------------------------
// $f = explode('/', $fecha_contable);
// $fecha_contableOk = $f[2]."-".$f[0]."-".$f[1];


// $f = explode('/', $fecha_op);
// $fecha_opOK = $f[2]."-".$f[0]."-".$f[1];


// $f = explode('/', $fecha_vto);
// $fecha_vtoOk = $f[2]."-".$f[0]."-".$f[1];







//     --------------------------------------------------------------------------------------------------------------------

    // RETOMANDO ASIENTO = donde el asiento ya se cual es porque esta en SESSION y el renglon a guardar el mayor + 1 

    if (isset($_SESSION['asiento'])){

            $num_asiento = $_SESSION['asiento'];

                    //CONSULTO num_renglon MAYOR RESPECTO A ESE NUMERO DE ASIENTO 
            $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
            $stament = $conn->prepare("SELECT MAX(num_renglon) AS mayor FROM asientoborrador WHERE num_asiento =:num_asiento");
        
            $stament->bindParam(':num_asiento', $num_asiento);
            $stament->execute();

            $res = $stament->fetch();
            
            $num_renglon = $res['mayor'] + 1;

            $stament = null; 

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
            $stament = $conn->prepare('INSERT INTO asientoborrador (id_sw, num_asiento, num_renglon, fecha_contable, cuenta, tipo_asiento, fecha_vto, fecha_op, descripcion, debe, haber) VALUES (:id_sw, :num_asiento, :num_renglon, :fecha_contable, :cuenta, :tipo_asiento, :fecha_vto, :fecha_op, :descripcion, :debe, :haber)');
            $stament->bindParam(':id_sw', $id_sw);
            $stament->bindParam(':num_asiento', $num_asiento);
            $stament->bindParam(':num_renglon', $num_renglon);
            $stament->bindParam(':fecha_contable', $fecha_contable);
            $stament->bindParam(':cuenta', $id);
            $stament->bindParam(':tipo_asiento', $tipo_asiento);
            $stament->bindParam(':fecha_vto', $fecha_vto);
            $stament->bindParam(':fecha_op', $fecha_op);
            $stament->bindParam(':descripcion', $descripcion);
            $stament->bindParam(':debe', $esteDebe);
            $stament->bindParam(':haber', $esteHaber);
            echo $stament->execute();
            $stament = null;

    }else{

//NUEVO ASIENTO = por lo que tengo qye buscar el asiento mayor y guardar el mismo + 1. Y el renglon el mayor de ese asiento + 1 


            $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
            $stament = $conn->prepare("SELECT MAX(num_asiento) AS mayor FROM asientoborrador");
            $stament->execute();

            $res = $stament->fetch();

            $num_asiento = $res['mayor'] + 1;

            $_SESSION['asiento'] = $num_asiento;

            $stament = null; 

            ///////////////////////////////////////////////////////////////////////////////////////////////

            $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
            $stament = $conn->prepare("SELECT MAX(num_renglon) AS mayor FROM asientoborrador WHERE num_asiento =:num_asiento");

            $stament->bindParam(':num_asiento', $num_asiento);
            $stament->execute();

            $res = $stament->fetch();

            $num_renglon = $res['mayor'] + 1;

            $stament = null; 


            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
            $stament = $conn->prepare('INSERT INTO asientoborrador (id_sw, num_asiento, num_renglon, fecha_contable, cuenta, tipo_asiento, fecha_vto, fecha_op, descripcion, debe, haber) VALUES (:id_sw, :num_asiento, :num_renglon, :fecha_contable, :cuenta, :tipo_asiento, :fecha_vto, :fecha_op, :descripcion, :debe, :haber)');
            $stament->bindParam(':id_sw', $id_sw);
            $stament->bindParam(':num_asiento', $num_asiento);
            $stament->bindParam(':num_renglon', $num_renglon);
            $stament->bindParam(':fecha_contable', $fecha_contable);
            $stament->bindParam(':cuenta', $id);
            $stament->bindParam(':tipo_asiento', $tipo_asiento);
            $stament->bindParam(':fecha_vto', $fecha_vto);
            $stament->bindParam(':fecha_op', $fecha_op);
            $stament->bindParam(':descripcion', $descripcion);
            $stament->bindParam(':debe', $esteDebe);
            $stament->bindParam(':haber', $esteHaber);
            echo $stament->execute();
            $stament = null;

        
    }


    // $querySaldo =  "UPDATE asientoborrador SET asientoborrador.okcarga = (SELECT (SUM(haber)-SUM(debe)) FROM asientoborrador WHERE num_asiento= $num_asiento)=0 WHERE num_asiento=$num_asiento";

    // $conn = null;
    // $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    // $stament = $conn->prepare($querySaldo);
    // echo $stament->execute();

    
    // echo $stament->execute();
 




?>





