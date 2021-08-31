<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';
 $ejecutar = "SELECT * FROM db_egresos";
    $resultado = $conn->query($ejecutar);
    $productos = array();

    while ($row = $resultado->fetch_assoc()) {
      $productos[]= $row;
    }
?>
<!-- DataTables -->

<section class="content-header">
  <h1>
    Egresos Realizados
  </h1>
</section>
<?php include("pages/productos/agregar_productos.php");?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos Generales</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Motivo</th>
                  <th class="text-center">Cantidad</th>
                  <th class="text-center">Fecha</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                foreach($productos as $x => $productos) {
                        ?>
                  <td class="text-center"><?php echo $productos['motivo'] ?></td>
                  <td class="text-center">$.<?php echo number_format($productos['cantidad']) ?></td>
                  <td class="text-center"><?php echo $productos['fecha'] ?></td>
                  
                </tr>
                <?php
                        }
                        ?>
                </tbody>
              </table>
              
            </div>
            </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>


<?php include('includes/footer.php'); ?>
<script src="ajax/productos/productos.js"></script>