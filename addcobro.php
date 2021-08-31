<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';
$id = mysqli_real_escape_string($conn, (strip_tags($_GET["id"], ENT_QUOTES)));
      $sql = mysqli_query($conn, "SELECT * FROM db_usuarios_cobrar WHERE codigo='$id'");
       $row = mysqli_fetch_assoc($sql);

?>
<!-- DataTables -->

<section class="content-header">
  <h1>
    Ventas
    <!-- <a class="btn btn-success btn-flat pull-right" href="" title="Agregar" data-toggle="modal" data-target="#agregarusuarios"><i class="fa fa-plus"></i> Agregar</a> -->
  </h1>
</section>
<?php include("pages/usuarios/agregar_usuario.php");?>
<section class="content">
  <div class="row">
    <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
    <div class="col-md-12">

<div class="box box-success">
  <div class="box-body">
    <!-- Date dd/mm/yyyy -->
    <div class="form-group">
    <div class="row">
<div class="col-md-3">
  <label><b>CODIGO</b></label>
    <input type="text" class="form-control" value="<?php echo $row['codigo']; ?>" readonly>
  </div>
  <div class="col-md-3">
    <label><b>NOMBRES</b></label>
    <input type="text" class="form-control" value="<?php echo $row['nombres']; ?>" readonly>
  </div>
  <div class="col-md-3">
    <label><b>APELLIDOS</b></label>
    <input type="text" class="form-control" value="<?php echo $row['apellidos']; ?>" readonly>
  </div>
  <div class="col-md-3">
    <label><b>DIRECCION</b></label>
    <input type="text" class="form-control" value="<?php echo $row['direccion']; ?>" readonly>
  </div>
  </div>
</div>
<div class="form-group">
<div class="row">
  <div class="col-md-3">
    <label><b>ESTADO</b></label>
    <input type="text" class="form-control" value="<?php echo $row['estado']; ?>" readonly>
  </div>
  <div class="col-md-3">
  <label><b>CREDITO</b></label>
  <div class="input-group">
                              <span class="input-group-addon">$</span>
                              <input value="<?php echo number_format($row['prestado']); ?>" readonly  class="form-control">
                          </div>
                          </div>
  <div class="col-md-3">
  <label><b>RECAUDAR</b></label>
  <div class="input-group">
                              <span class="input-group-addon">$</span>
                              <input value="<?php echo number_format($row['acobrar']); ?>" readonly  class="form-control">
                          </div>
                          </div>
  <div class="col-md-3">
  <label><b>RECIBIDO</b></label>
  <div class="input-group">
                              <span class="input-group-addon">$</span>
                              <input  value="<?php echo number_format($row['recibido']); ?>" readonly class="form-control">
                          </div>
                          </div>

</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-sm-4">
    <label><b>FECHA ENTREGA</b></label>
    <input type="date" class="form-control" value="<?php echo $row['fecha_entrega']; ?>" readonly>
  </div>
  <div class="col-sm-4">
    <label><b>FECHA PRIMERA CUOTA</b></label>
    <input type="date" class="form-control" value="<?php echo $row['fechapc']; ?>" readonly>
  </div>
  <div class="col-sm-4">
    <label><b>FECHA ULTIMA CUOTA</b></label>
    <input type="date" class="form-control" value="<?php echo $row['fechauc']; ?>" readonly>
  </div>
</div>
</div>

<div class="form-group text-center">
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-9">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
            <b><span class="info-box-text">ABONO RECIBIDO</span></b>
              <span class="info-box-number">$ <?php echo number_format($row['recibido']); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
             <b> <span class="info-box-text">RECAUDAR</span></b>
              <span class="info-box-number">$ <?php echo number_format($row['acobrar']-$row['recibido']); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </div>
        <!-- /.col -->
      </div>

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

</div>
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<div class="form-group text-center">
<div class="row">
<a class="btn btn-success btn-flat" href="" title="Agregar" data-toggle="modal" data-target="#add-pago" data-codigo="<?php echo $row['codigo']?>" ><i class="fa fa-plus"></i> Agregar Pago</a>
<a style="margin-left: 20px;" class="btn btn-flat btn-danger" href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Regresar</a>
</div>
</div>
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<?php  
$query = "SELECT * FROM db_cuotas_pagadas WHERE codigo='$id'";
            $resultado = mysqli_query($conn, $query) or die('error: ' . mysqli_error($conn));
            $row_datos = array();
    while ($row = $resultado->fetch_assoc()) {
      $row_datos[]= $row;
    }
       
            ?>
    <div class="col-md-12">
<div class="box box-success">
  <div class="box-body">
  <div class="box-header">
        <h3 class="box-title">Citas Registradas</h3>
        <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
      </div>
  <div class="box-body">
  <div class="table-responsive">
          <table id="tablacobro" class="table table-bordered table-striped">
            <thead>
              <tr>
              <th class="text-center">Codigo</th>
                <th class="text-center">usuario</th>
                <th class="text-center">Abono</th>
                <th class="text-center">Fecha de Abono</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Ver</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                for ($i = 0; $i < sizeof($row_datos); $i++) {
                  $row_datos[$i]
                ?>
                  <td class="text-center"><?php echo $row_datos[$i]['codigo'] ?></td>
                  <td class="text-center"><?php echo $row_datos[$i]['usuario'] ?></td>
                  <td class="text-center">$ <?php echo number_format($row_datos[$i]['recibido']) ?></td>
                  <td class="text-center"><?php echo $row_datos[$i]['fecha_pago'] ?></td>
                  <td class="text-center">
                  <?php
                    if ($row_datos[$i]['estado'] == 'Pagada') {
                      echo '<span class="label label-success">Pagada</span>';
                    } else if ($row_datos[$i]['estado'] == 'PENDIENTE') {
                      echo '<span class="label label-success">PENDIENTE</span>';
                    }
                    ?>
                </td>
                  <td class="text-center">
                  <?php
                    if ($row_datos[$i]['estado'] == 'Pagada') {
                      echo '<a type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#iniciard'. $row_datos[$i]['id_cuotas'].'" ><i class="fa fa-edit"></i></a>';
                    } else if ($row_datos[$i]['estado'] == 'Debe') {
                      echo '';
                    }
                    ?>
                  <?php
                    if ($row_datos[$i]['estado'] == 'Debe') {
                      echo '<a type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#imprimir'. $row_datos[$i]['id_cuotas'].'" ><i class="fa fa-edit"></i></a>';
                    } else if ($row_datos[$i]['estado'] == 'Pagada') {
                      echo '';
                    }
                    ?>
                  
                </td>
              </tr>
              
            <?php
                }
            ?>
            </tbody>
            
          </table>
          
  </div>
        </div>
</div>
</div>
  </div>

    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

 <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
			   @@@@@@@@@@@@@@@@@@@@@@ MODAL DE COMENTARIO @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
			   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
         <form class="form-horizontal" name="crear-pago" id="crear-pago" method="POST" action="acciones/productos/modelo_pagos.php">
                <!-- Modal -->
                <div id="add-pago" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div  class="modal-header box box-success">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Sumar Pago</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Codigo</label>
                                            <input id="codigo" name="codigo" class="form-control" value="<?php echo $row['codigo']; ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                <label><b>Cuota a Pagar</b></label>
                <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="number" id="recibido" name="recibido"  class="form-control number" require>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Estado</label>
                                            <input type="text" class="form-control" id="estado" name="estado" value="Pagada" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Fecha de Pago</label>
                                            <input type="date" class="form-control" id="fecha_pago" name="fecha_pago">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $_SESSION['nombre']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <input type="hidden" name="pago_registro" value="nuevo_pago">
            <center>
              <button type="submit" id="save_data" class="btn btn-flat btn-success"><i class="fa fa-floppy-o"></i> Agregar</button>
              <a style="margin-left: 20px;" class="btn btn-flat btn-danger" href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Regresar</a>
            </center>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->


<?php include('includes/footer.php'); ?>
<script src="ajax/productos/productos.js"></script>