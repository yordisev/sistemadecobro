<?php
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if ($_POST['registro'] == 'nuevo'){
    $codigo = $_POST["codigo"]; //Escanpando caracteres 
    $nombres = $_POST["nombres"]; //Escanpando caracteres 
    $apellidos = $_POST["apellidos"]; //Escanpando caracteres 
    $direccion = $_POST["direccion"]; //Escanpando caracteres 
    $estado =$_POST["estado"]; //Escanpando caracteres 
    $prestado = $_POST["prestado"]; //Escanpando caracteres 
    $interes = $_POST["interes"]; //Escanpando caracteres 
    $acobrar = $_POST["acobrar"]; //Escanpando caracteres 
    $recibido = $_POST["recibido"]; //Escanpando caracteres 
    $fecha_entrega = $_POST["fecha_entrega"]; //Escanpando caracteres 
    $fechapc = $_POST["fechapc"]; //Escanpando caracteres 
    $fechauc =$_POST["fechauc"]; //Escanpando caracteres 
    $id_saldo = 2021;
    require_once('../../config/database.php');
   try {
    $stmt = $conn->prepare("SELECT saldo_en_caja FROM saldo_db WHERE id_saldo = ? ");
    $stmt -> bind_param('i', $id_saldo);
$stmt -> execute();
$stmt -> store_result();
$stmt -> bind_result($saldo_en_caja);
$stmt -> fetch();
$dato = $saldo_en_caja - $prestado;
$ejecutar = $conn->prepare("INSERT INTO db_usuarios_cobrar (codigo,nombres,apellidos,direccion,estado,prestado,interes,acobrar,recibido,fecha_entrega,fechapc,fechauc) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
$ejecutar->bind_param("ssssssssssss", $codigo,$nombres,$apellidos,$direccion,$estado,$prestado,$interes,$acobrar,$recibido,$fecha_entrega,$fechapc,$fechauc);
$ejecutar->execute();
$ejecutar1 = $conn->prepare("UPDATE  saldo_db  SET saldo_en_caja = ? WHERE id_saldo = ?");
$ejecutar1->bind_param("si", $dato, $id_saldo);
$ejecutar1->execute();
// print_r($ejecutar);
$id_registro = $ejecutar->id;
if ($id_registro > 0 ){
    $respuesta = array(
        'respuesta' => 'exito',
        'id_saldo' => $id_registro
    );
}else {
    $respuesta = array(
        'respuesta' => 'error',
    );
}
$ejecutar->close();
$conn->close();
   } catch (Exception $e) {
       echo " Error " . $e->getMessage();
   }
   die(json_encode($respuesta));
}
if ($_POST['registro'] == 'actualizar'){
    $codigo = $_POST["codigo"]; //Escanpando caracteres 
    $nombres = $_POST["nombres"]; //Escanpando caracteres 
    $apellidos = $_POST["apellidos"]; //Escanpando caracteres 
    $direccion = $_POST["direccion"]; //Escanpando caracteres 
    $estado =$_POST["estado"]; //Escanpando caracteres 
    $prestado = $_POST["prestado"]; //Escanpando caracteres 
    $acobrar = $_POST["acobrar"]; //Escanpando caracteres 
    $recibido = $_POST["recibido"]; //Escanpando caracteres 
    $fecha_entrega = $_POST["fecha_entrega"]; //Escanpando caracteres 
    $fechapc = $_POST["fechapc"]; //Escanpando caracteres 
    $fechauc =$_POST["fechauc"]; //Escanpando caracteres 
    require_once('../../config/database.php');
   try {
$ejecutar = $conn->prepare("UPDATE  db_usuarios_cobrar  SET nombres = ?, apellidos = ?, direccion = ?, estado = ?, prestado = ?, acobrar = ?, recibido = ?, fecha_entrega = ?, fechapc = ?, fechauc = ? WHERE codigo = ?");
$ejecutar->bind_param("sssssssssss", $nombres,$apellidos,$direccion,$estado,$prestado,$acobrar,$recibido,$fecha_entrega,$fechapc,$fechauc, $codigo);
$ejecutar->execute();
if ($ejecutar->affected_rows){
    $respuesta = array(
        'respuesta' => 'exitoso',
        'id_actualizado' => $ejecutar->insert_id
    );
}else {
    $respuesta = array(
        'respuesta' => 'error'
    );
}
$ejecutar->close();
$conn->close();
   } catch (Exception $e) {
       echo " Error " . $e->getMessage();
   }
   die(json_encode($respuesta));
}
if ($_POST['registro'] == 'eliminar'){
    $codigo = $_POST['codigo'];
   require_once('../../config/database.php');
  try {
$ejecutar = $conn->prepare("DELETE FROM   productos_db  WHERE codigo = ?");
$ejecutar->bind_param("s", $codigo);
$ejecutar->execute();
if ($ejecutar-> affected_rows ){
   $respuesta = array(
       'respuesta' => 'exitoso',
       'id_eliminado' => $codigo
   );
}else {
   $respuesta = array(
       'respuesta' => 'error'
   );
}
$ejecutar->close();
$conn->close();
  } catch (Exception $e) {
      echo " Error " . $e->getMessage();
  }
  die(json_encode($respuesta));
}