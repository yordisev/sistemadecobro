<?php 
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

if ($_POST['agregar_egreso'] == 'nuevo_egreso'){

    

    $motivo = $_POST["motivo"]; //Escanpando caracteres 
    $cantidad = str_ireplace(['-','.'],['',''], $_POST["cantidad"]); 
    $fecha =$_POST["fecha"]; //Escanpando caracteres 
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

$dato = $saldo_en_caja - $cantidad;

if ($cantidad <= $saldo_en_caja){
   
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ insertar cuota pagada@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$ejecutar = $conn->prepare("INSERT INTO db_egresos (motivo,cantidad,fecha) VALUES (?,?,?)");
$ejecutar->bind_param("sss", $motivo,$cantidad,$fecha);
$ejecutar->execute();
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@actualizar saldo en caja @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$ejecutar1 = $conn->prepare("UPDATE  saldo_db  SET saldo_en_caja = ? WHERE id_saldo = ?");
$ejecutar1->bind_param("si", $dato, $id_saldo);
$ejecutar1->execute();
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@actualizar lo recibido por el usuario@@@@@@@@@@@@@@@@@@@@@@@@@
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