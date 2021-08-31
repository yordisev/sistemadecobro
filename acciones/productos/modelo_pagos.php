<?php 
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

if ($_POST['pago_registro'] == 'nuevo_pago'){

    

    $codigo = $_POST["codigo"]; //Escanpando caracteres 
    $usuario = $_POST["usuario"]; //Escanpando caracteres
    $recibido = str_ireplace(['-','.'],['',''], $_POST["recibido"]); 
    // $recibido = str_ireplace("-","",$_POST["recibido"]);
    // $recibido = $_POST["recibido"]; //Escanpando caracteres 
    $estado =$_POST["estado"]; //Escanpando caracteres 
    $fecha_pago =$_POST["fecha_pago"]; //Escanpando caracteres 
    $id_saldo = 2021;
    
    require_once('../../config/database.php');
   try {
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sumar saldo en caja @@@@@@@@@@@@@@@@@@@@
    $stmt = $conn->prepare("SELECT saldo_en_caja FROM saldo_db WHERE id_saldo = ? ");
    $stmt -> bind_param('i', $id_saldo);
$stmt -> execute();
$stmt -> store_result();
$stmt -> bind_result($saldo_en_caja);
$stmt -> fetch();

$dato = $saldo_en_caja + $recibido;
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ sumar a lo recibido @@@@@@@@@@@@@@@@@@
$stmt1 = $conn->prepare("SELECT recibido, codigo, acobrar FROM db_usuarios_cobrar WHERE codigo = ? ");
$stmt1 -> bind_param('s', $codigo);
$stmt1 -> execute();
$stmt1 -> store_result();
$stmt1 -> bind_result($recibido1,$codigo1,$acobrar1);
$stmt1 -> fetch();


$dato1 = $recibido1 + $recibido;
$dato2 = $acobrar1 - $recibido1;

if ($recibido <= $dato2){
   
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ insertar cuota pagada@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$ejecutar = $conn->prepare("INSERT INTO db_cuotas_pagadas (codigo,usuario,recibido,estado,fecha_pago) VALUES (?,?,?,?,?)");
$ejecutar->bind_param("sssss", $codigo,$usuario,$recibido,$estado,$fecha_pago);
$ejecutar->execute();
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@actualizar saldo en caja @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$ejecutar1 = $conn->prepare("UPDATE  saldo_db  SET saldo_en_caja = ? WHERE id_saldo = ?");
$ejecutar1->bind_param("si", $dato, $id_saldo);
$ejecutar1->execute();
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@actualizar lo recibido por el usuario@@@@@@@@@@@@@@@@@@@@@@@@@
$ejecutar2 = $conn->prepare("UPDATE  db_usuarios_cobrar  SET recibido = ? WHERE codigo = ?");
$ejecutar2->bind_param("ss", $dato1, $codigo1);
$ejecutar2->execute();
// print_r($recibido);
$id_registro = $ejecutar->id;
if ($id_registro > 0 ){
    $respuesta = array(
        'respuesta' => 'exito',
        'id_saldo' => $id_registro
    );
}else{
     
    $respuesta = array(
        'respuesta' => 'error',
    );

}
$ejecutar->close();
$conn->close();





}else {
    $respuesta = array(
        'respuesta' => 'error1',
    );
}



   } catch (Exception $e) {
       echo " Error " . $e->getMessage();
   }

   die(json_encode($respuesta));
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
?>