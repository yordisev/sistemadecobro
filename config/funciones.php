<?php

function db(){



    return $conn = new mysqli('localhost', 'root', '', 'prestamos_db');

}



function productos(){

    $conn = db();

    $ejecutar = "SELECT * FROM db_usuarios_cobrar WHERE estado='Activo'";

    $resultado = $conn->query($ejecutar);

    $datos = array();



    while ($row = $resultado->fetch_assoc()) {

      $datos[]= $row;

    }

    return $datos;

  }



  function usuarios_pagos(){

    $conn = db();

    $ejecutar = "SELECT * FROM db_usuarios_cobrar WHERE estado='Inactivo'";

    $resultado = $conn->query($ejecutar);

    $datos = array();



    while ($row = $resultado->fetch_assoc()) {

      $datos[]= $row;

    }

    return $datos;

  }



  function proveedor(){

    $conn = db();

    $ejecutar = "SELECT * FROM proveedor_db";

    $resultado = $conn->query($ejecutar);

    $datos = array();



    while ($row = $resultado->fetch_assoc()) {

      $datos[]= $row;

    }

    return $datos;

  }



  function saldo_total(){

    $conn = db();

    $query = mysqli_query($conn, "SELECT * FROM saldo_db  WHERE id_saldo = 2021")

    or die('Error ' . mysqli_error($conn));

$data = mysqli_fetch_assoc($query);

return $data;

  }



  function saldo_total_prestado(){

    $conn = db();

    $query = mysqli_query($conn, "SELECT SUM(acobrar) sumatotal FROM db_usuarios_cobrar  WHERE estado = 'Activo'")

    or die('Error ' . mysqli_error($conn));

$data = mysqli_fetch_assoc($query);

return $data;

  }





  function historial_cobro(){

    $conn = db();

    if (isset($_GET['id'])) {

  

      $id = mysqli_real_escape_string($conn, (strip_tags($_GET["id"], ENT_QUOTES)));

      $sql = mysqli_query($conn, "SELECT * FROM db_usuarios_cobrar WHERE codigo='$id'");

       $row = mysqli_fetch_assoc($sql);

    return $row;

    }

  }



  function consulta_historial($id){

    $conn = db();

    $query = "SELECT * FROM db_cuotas_pagadas WHERE codigo='$id'";

            $resultado = mysqli_query($conn, $query) or die('error: ' . mysqli_error($conn));

            $row_datos = array();

    while ($row = $resultado->fetch_assoc()) {

      $row_datos[]= $row;

    }

    return $row_datos;

  

  }



?>