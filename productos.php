<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';
 $ejecutar = "SELECT * FROM db_usuarios_cobrar WHERE estado='Activo'";
    $resultado = $conn->query($ejecutar);
    $productos = array();

    while ($row = $resultado->fetch_assoc()) {
      $productos[]= $row;
    }

    $fecha = date("Y-m-d");

    
?>
<!-- DataTables -->

<section class="content-header">
  <h1>
    Personal Activo
    <a class="btn btn-success btn-flat pull-right" href="" title="Agregar" data-toggle="modal" data-target="#agregarproductos"><i class="fa fa-plus"></i> Agregar</a>
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
                  <th class="text-center">CODIGO DE COBRO</th>
                  <th class="text-center">NOMBRE</th>
                  <th class="text-center">ESTADO</th>
                  <th class="text-center">CREDITO</th>
                  <th class="text-center">POR RECAUDAR</th>
                  <th class="text-center">RECIBIDO</th>
                  <th class="text-center">RESTA</th>
                  <th class="text-center">FECHA ENTREGA</th>
                  <th class="text-center">CORTE</th>
                  <th class="text-center">FECHA U.C</th>
                  <th class="text-center">ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                foreach($productos as $x => $productos) {
                        ?>
                  <td class="text-center"><a href="addcobro.php?id=<?php echo $productos['codigo'] ?>"><span class="fa fa-dollar" aria-hidden="true"></span><?php echo $productos['codigo']; ?></a></td>
                  <td class="text-center"><?php echo $productos['nombres'] ?> <?php echo $productos['apellidos'] ?></td>
                  <td class="text-center">
                  <?php 
      if ($productos['estado'] == 'Activo') {
        echo '<span class="label label-success">Activo</span>';
      } else if ($productos['estado'] == 'Inactivo') {
        echo '<span class="label label-danger">Inactivo</span>';
      } 
      ?>
                  </td>
                  <td class="text-center">$.<?php echo number_format($productos['prestado']) ?></td>
                  <td class="text-center">$.<?php echo number_format($productos['acobrar']) ?></td>
                  <td class="text-center">$.<?php echo number_format($productos['recibido']) ?></td>
                  <td class="text-center">$.<?php echo number_format($productos['acobrar'] - $productos['recibido']) ?></td>
                  <td class="text-center"><?php echo $productos['fecha_entrega'] ?></td>
                  <td class="text-center"><?php if ($fecha >= $productos['fechauc']){
      echo '<span class="label label-danger">Plazo Vencido</span>';
    } else {
      echo '<span class="label label-primary">A tiempo</span>';
    }?></td>
                  <td class="text-center"><?php echo $productos['fechauc'] ?></td>
                  <td class="text-center">
                  <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#editarproducto"  
                  data-codigo="<?php echo $productos['codigo']?>" 
                  data-nombres="<?php echo $productos['nombres']?>" 
                  data-estado="<?php echo $productos['estado']?>" 
                  data-apellidos="<?php echo $productos['apellidos']?>" 
                  data-direccion="<?php echo $productos['direccion']?>" 
                  data-prestado="<?php echo $productos['prestado']?>"
                  data-acobrar="<?php echo $productos['acobrar']?>"
                  data-recibido="<?php echo $productos['recibido']?>"
                  data-fecha_entrega="<?php echo $productos['fecha_entrega']?>"
                  data-fechapc="<?php echo $productos['fechapc']?>"
                  data-fechauc="<?php echo $productos['fechauc']?>"
                  data-ganancias="<?php echo $productos['ganancias']?>"><i class="fa fa-edit"></i></button>
                 
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
              
              <?php include("pages/productos/editar_productos.php");?>
              
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