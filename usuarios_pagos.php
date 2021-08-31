<?php include('includes/header.php');
include_once 'acciones/sessiones.php';
include 'config/database.php';
?>
<!-- DataTables -->

<section class="content-header">
  <h1>
    Afiliados
    <a class="btn btn-success btn-flat pull-right" href="" title="Agregar" data-toggle="modal" data-target="#agregarproductos"><i class="fa fa-plus"></i> Agregar</a>
  </h1>
</section>
<?php include("pages/productos/agregar_productos.php");?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Datos de Usuarios</h3>
        </div>
        <div class="box-body">
            <div class="table-responsive">
              <table id="dt_cliente" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">CODIGO DE COBRO</th>
                  <th class="text-center">NOMBRE</th>
                  <th class="text-center">ESTADO</th>
                  <th class="text-center">PRESTADO</th>
                  <th class="text-center">POR COBRAR</th>
                  <th class="text-center">RECIBIDO</th>
                  <th class="text-center">FECHA ENTREGA</th>
                  <th class="text-center">ACCIONES</th>
                </tr>
                </thead>
              </table>
            </div>
            </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="modal fade" id="editarproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header box box-success">
		  <h5 class="modal-title" id="exampleModalLabel"> Editar Proveedor </h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
  
		<form class="form-horizontal" name="editar-proveedor" id="editar-proveedor" method="POST" action="acciones/proveedor/modelo_proveedor.php" enctype="multipart/form-data" >
		  <div class="modal-body">
  
  
  <div class="row">
  <div class="col-md-12">
  
  <div class="box box-success">
	<div class="box-body">
	  <!-- Date dd/mm/yyyy -->
	  <div class="form-group">
		<div class="row">
		  <div class="col-xs-6">
			<label>CODIGO</label>
			<input type="text" class="form-control" name="codigo" id="codigo">
		  </div>
		  <div class="col-xs-6">
			<label>PROVEEDOR</label>
			<input type="text" class="form-control" name="proveedor" id="proveedor">
		  </div>
		</div>
	  </div>
	  <div class="form-group">
		<div class="row">
		  <div class="col-xs-12">
			<label>TIPO</label>
			<input type="text" class="form-control" name="tipo" id="tipo">
		  </div>
		</div>
	  </div>
	  <div class="form-group">
		<div class="row">
		  <div class="col-xs-6">
			<label>NOMBRE</label>
			<input type="text" class="form-control" name="nombre" id="nombre">
		  </div>
		  <div class="col-xs-6">
			<label>APELLIDO</label>
			<input type="text" class="form-control" name="apellido" id="apellido">
		  </div>
		</div>
	  </div>
	  <div class="form-group">
		<div class="row">
		  <div class="col-xs-6">
			<label>NIT</label>
			<input type="text" class="form-control" name="nit" id="nit">
		  </div>
		  <div class="col-xs-6">
			<label>ESTADO</label>
			<input type="text" class="form-control" name="estado" id="estado">
		  </div>
		</div>
	  </div>
	</div>
	<!-- /.box-body -->
  </div>
  <!-- /.box -->
  
  
  </div>
  
	<input type="text" class="form-control" name="codigo" id="codigo">
	<input type="hidden" name="registro" value="actualizar">
	<center>
	  <button type="submit" id="save_data" class="btn btn-flat btn-success"><i class="fa fa-floppy-o"></i> Actualizar</button>
	  <a style="margin-left: 20px;" class="btn btn-flat btn-danger" href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Regresar</a>
	</center>
	<!-- /.col (right) -->
  </div>
  </div>
		  </form>
  
	  </div>
	</div>
  </div>
</section>


<?php include('includes/footer.php'); ?>
<script src="ajax/productos/datatable_ajax.js"></script>