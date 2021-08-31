<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';
$query = mysqli_query($conn, "SELECT * FROM saldo_db  WHERE id_saldo = 2021")
    or die('Error ' . mysqli_error($conn));
$data1 = mysqli_fetch_assoc($query);
$query = mysqli_query($conn, "SELECT SUM(acobrar) sumatotal FROM db_usuarios_cobrar  WHERE estado = 'Activo'")
    or die('Error ' . mysqli_error($conn));
$data = mysqli_fetch_assoc($query);

$query2 = mysqli_query($conn, "SELECT SUM(recibido) SUMrecibido FROM db_usuarios_cobrar WHERE estado='Activo'")
                or die('Error ' . mysqli_error($conn));
            $data2 = mysqli_fetch_assoc($query2);

            $ejecutar = "SELECT u.nombres, u.apellidos, c.recibido, c.fecha_pago, c.estado, c.usuario
            FROM db_cuotas_pagadas c
            INNER JOIN db_usuarios_cobrar u WHERE c.codigo = u.codigo
            AND DATE_FORMAT(c.fecha_pago, '%Y-%m-%d') = CURDATE() order BY c.fecha_pago asc ";
    $resultado = $conn->query($ejecutar);
    $productos = array();
    while ($row = $resultado->fetch_assoc()) {
      $productos[]= $row;
    }

?>
<!-- DataTables -->
<section class="content-header">
  <h1>
    Total
    <a class="btn btn-success btn-flat pull-right" href="" title="Agregar" data-toggle="modal" data-target="#agregaregreso"><i class="fa fa-plus"></i> Agregar</a>
  </h1>
</section>
<?php include("pages/egresos/egresos.php");?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos Generales</h3>
        </div>
        <div class="box-body">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>$ 500,000</h3>

              <p>Invertido</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>$ <?php echo number_format($data1['saldo_en_caja']+$data['sumatotal']-$data2['SUMrecibido']); ?><sup style="font-size: 20px"></sup></h3>

              <p>Total</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>$ <?php echo number_format($data1['saldo_en_caja']); ?></h3>

              <p>Saldo en Caja</p>
            </div>
            <div class="icon">
              <i class="fa  fa-btc"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>$ <?php echo number_format($data['sumatotal']-$data2['SUMrecibido']); ?></h3>

              <p>Total a Cobrar</p>
            </div>
            <div class="icon">
              <i class="fa  fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      
      </div>
        <!-- /.box-body -->
      </div>

      <div class="table-responsive">
              <table id="tablacobro" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">PERSONA</th>
                  <th class="text-center">USUARIO</th>
                  <th class="text-center">RECIBIDO</th>
                  <th class="text-center">ESTADO</th>
                  <th class="text-center">FECHA</th>
                  <th class="text-center">ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                foreach($productos as $x => $productos) {
                        ?>
                  <td class="text-center"><?php echo $productos['nombres'] ?> <?php echo $productos['apellidos'] ?></td>
                  <td class="text-center"><?php echo $productos['usuario'] ?></td>
                  <td class="text-center">$.<?php echo number_format($productos['recibido']) ?></td>
                  <td class="text-center">
                  <?php 
      if ($productos['estado'] == 'Pagada') {
        echo '<span class="label label-success">Activo</span>';
      } else if ($productos['estado'] == 'Inactivo') {
        echo '<span class="label label-danger">Inactivo</span>';
      } 
      ?>
                  </td>
                  <td class="text-center"><?php echo $productos['fecha_pago'] ?></td>
                  <td class="text-center">
                 
                  <a data-codigo="<?php echo $productos['codigo']?>" 
                  data-producto="<?php echo $productos['producto']?>"
                  href="#" class="btn btn-danger btn-xs borrar_registro" 
                   ><i class="fa  fa-trash-o"></i></a>
                  
                  </td>
                  
                </tr>
                <?php
                        }
                        ?>
                </tbody>
              </table>
              
            </div>

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php include('includes/footer.php'); ?>
<script src="ajax/egresos/egresos.js"></script>